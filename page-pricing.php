<?php

/**
 * Template Name: Pricing
 *
 * @package TailPress
 */

get_header();

$pricing_f = static function (string $name, string $default): string {
    $value = function_exists('get_field') ? get_field('main_pricing_' . $name) : null;
    return (null === $value || '' === $value || false === $value) ? $default : (string) $value;
};
$pricing_list = static function (string $name, array $default) use ($pricing_f): array {
    $value = $pricing_f($name, implode("\n", $default));
    return array_values(array_filter(array_map('trim', preg_split('/\r\n|\r|\n/', $value))));
};

$pricing_link = static function (string $name, string $default) use ($pricing_f): array {
    $value = function_exists('get_field') ? get_field('main_pricing_' . $name . '_link') : null;
    $url = '';
    $title = '';
    $target = '';
    if (is_array($value)) {
        $url = isset($value['url']) ? trim((string) $value['url']) : '';
        $title = isset($value['title']) ? trim((string) $value['title']) : '';
        $target = isset($value['target']) ? trim((string) $value['target']) : '';
    } elseif (is_string($value) && '' !== trim($value)) {
        $url = trim($value);
    }
    if ('' === $url) {
        $url = $default;
    }
    if (0 === strpos($url, '/') && 0 !== strpos($url, '//')) {
        $url = home_url($url);
    }
    return ['url' => $url, 'title' => $title, 'target' => $target];
};
$pricing_label = static function (string $name, array $link, string $default) use ($pricing_f): string {
    $label = trim($pricing_f($name, ''));
    if ('' === $label && '' !== $link['title']) {
        $label = $link['title'];
    }
    return '' === $label ? $default : $label;
};
$pricing_target = static function (string $target): string {
    if ('' === $target) {
        return '';
    }
    $attr = ' target="' . esc_attr($target) . '"';
    if ('_blank' === strtolower($target)) {
        $attr .= ' rel="noopener"';
    }
    return $attr;
};

$hero_primary_link = $pricing_link('hero_primary', '/apply-now/');
$hero_secondary_link = $pricing_link('hero_secondary', '/contact/');
$supplier_link = $pricing_link('supplier', '/apply-now/');
$supplier_path = '/suppliers/';
$destination_path = '/destinations/pricing/';
$distributor_path = '/distributors/';
$booking_path = '/booking-systems/partner-enquiry/';

$hero_steps = [];
$hero_step_defaults = [
    ['1', 'Identify your role', 'Supplier, destination, distributor and booking-system partner pricing are intentionally separated.'],
    ['2', 'Confirm the model', 'Success fee, platform package, commercial agreement or partner enquiry depends on the pathway.'],
    ['3', 'Take the right next step', 'Each pathway leads to the enquiry or application process that matches the organisation type.'],
];
foreach ($hero_step_defaults as $i => $step) {
    $hero_steps[] = ['number' => $pricing_f("step_" . ($i + 1) . "_number", $step[0]), 'title' => $pricing_f("step_" . ($i + 1) . "_title", $step[1]), 'copy' => $pricing_f("step_" . ($i + 1) . "_copy", $step[2])];
}

$hero_path_defaults = [
    ['bi-house-door', 'Suppliers', '0.75% - 2.8% success fee per booking.', $supplier_path],
    ['bi-map', 'Destinations', 'Packages subject to approval and scope.', $destination_path],
    ['bi-diagram-3', 'Distributors', 'Pricing by agreement based on volume.', $distributor_path],
    ['bi-calendar2-check', 'Booking Systems', 'Technical integration partner enquiry.', $booking_path],
];
$hero_paths = [];
foreach ($hero_path_defaults as $i => $path) {
    $n = $i + 1;
    $path_link = $pricing_link("path_{$n}", $path[3]);
    $hero_paths[] = ['icon' => $pricing_f("path_{$n}_icon", $path[0]), 'title' => $pricing_f("path_{$n}_title", $path[1]), 'copy' => $pricing_f("path_{$n}_copy", $path[2]), 'url' => $path_link['url'], 'target' => $path_link['target']];
}

$pricing_card_defaults = [
    ['title' => 'Tourism Suppliers', 'price' => '0.75%', 'suffix' => 'to', 'price_end' => '2.8%', 'copy' => 'Success fee per booking. Perfect for hotels, tours, and attraction operators.', 'points' => ['No upfront fees', 'Unlimited distributors'], 'cta' => 'View Details', 'url' => $supplier_path, 'featured' => true],
    ['title' => 'Destinations', 'price' => 'Destination Packages', 'copy' => 'Fixed monthly platform service packages for destination activation, supplier support, content, trade, virtual concierge and data. Publish only after package approval.', 'cta' => 'View Packages', 'url' => $destination_path],
    ['title' => 'Distributors', 'price' => 'Commercial Base', 'copy' => 'Free to connect. Commercial arrangements depend on the distributor model and agreement.', 'cta' => 'Become a Distributor', 'url' => $distributor_path],
    ['title' => 'Booking Systems', 'price' => 'Partner Enquiry', 'copy' => 'Fee to connect. Integration scope and commercial arrangements are handled through partner enquiry.', 'cta' => 'Partner Enquiry', 'url' => $booking_path],
];
$pricing_cards = [];
foreach ($pricing_card_defaults as $i => $card) {
    $n = $i + 1;
    $card['title'] = $pricing_f("card_{$n}_title", $card['title']);
    $card['price'] = $pricing_f("card_{$n}_price", $card['price']);
    $card['suffix'] = $pricing_f("card_{$n}_suffix", $card['suffix'] ?? '');
    $card['price_end'] = $pricing_f("card_{$n}_price_end", $card['price_end'] ?? '');
    $card['copy'] = $pricing_f("card_{$n}_copy", $card['copy']);
    $card['points'] = $pricing_list("card_{$n}_points", $card['points'] ?? []);
    $card_link = $pricing_link("card_{$n}", $card['url']);
    $card['cta'] = $pricing_label("card_{$n}_cta", $card_link, $card['cta']);
    $card['url'] = $card_link['url'];
    $card['target'] = $card_link['target'];
    $card['featured'] = function_exists('get_field') && null !== get_field("main_pricing_card_{$n}_featured")
        ? (bool) get_field("main_pricing_card_{$n}_featured")
        : !empty($card['featured']);
    $pricing_cards[] = $card;
}

$supplier_types = $pricing_list('supplier_types', ['Accommodation and Hotels', 'Guided Tours and Experiences', 'Attractions and Rentals', 'Event and Activity Providers']);

$partner_cards = [
    [
        'icon' => 'bi-map',
        'eyebrow' => 'Are you a Destination Manager?',
        'title' => 'Destinations',
        'copy' => 'Choose a Smart Destination package matched to the scale of your visitor economy, with platform infrastructure and support for local supplier activation.',
        'points' => ['Local, Regional and State packages', 'Destination website and content activation', 'Trade portal and virtual concierge tools'],
        'cta' => 'View Destination Packages',
        'url' => $destination_path,
    ],
    [
        'icon' => 'bi-globe2',
        'eyebrow' => 'Are you a Distributor?',
        'title' => 'Distributors',
        'copy' => 'TXGB acts as a commercially neutral exchange, allowing distributors to connect with thousands of British suppliers through a single pipe.',
        'points' => ['Commercially Neutral Exchange', 'Live inventory from connected booking systems', 'Consolidated payment reconciliation'],
        'cta' => 'Become a Distributor',
        'url' => $distributor_path,
    ],
    [
        'icon' => 'bi-terminal',
        'eyebrow' => 'Are you a Booking System Vendor?',
        'title' => 'Booking System Partners',
        'copy' => 'Empower your software users with instant access to state and regional tourism markets via TXGB\'s integration framework.',
        'points' => ['Open API and Documentation', 'Technical support for onboarding', 'Value-add for your customer base'],
        'cta' => 'Partner Enquiry',
        'url' => $booking_path,
    ],
];
foreach ($partner_cards as $i => &$card) {
    $n = $i + 1;
    $card_link = $pricing_link("partner_{$n}", $card['url']);
    foreach (['icon', 'eyebrow', 'title', 'copy'] as $key) {
        $card[$key] = $pricing_f("partner_{$n}_{$key}", $card[$key]);
    }
    $card['cta'] = $pricing_label("partner_{$n}_cta", $card_link, $card['cta']);
    $card['url'] = $card_link['url'];
    $card['target'] = $card_link['target'];
    $card['points'] = $pricing_list("partner_{$n}_points", $card['points']);
}
unset($card);

$pricing_hero_image = function_exists('get_field') ? get_field('main_pricing_hero_image') : null;
$pricing_hero_image_url = is_array($pricing_hero_image) && !empty($pricing_hero_image['url'])
    ? $pricing_hero_image['url']
    : get_theme_file_uri('/images/pricing.jpg');
?>

<article class="bg-white text-near-black [font-family:'Source_Sans_Pro',sans-serif]">
    <section
        class="relative min-h-[620px] overflow-hidden bg-black/40 px-4 py-12 text-white sm:py-16 lg:px-16 lg:py-24">
        <img src="<?php echo esc_url($pricing_hero_image_url); ?>" alt="<?php echo esc_attr($pricing_f('hero_image_alt', '')); ?>"
            class="absolute inset-0 h-full w-full object-cover">
        <div class="absolute inset-0 bg-black/60" aria-hidden="true"></div>
        <div
            class="relative z-10 mx-auto grid max-w-[1312px] gap-10 lg:grid-cols-[1fr_520px] lg:items-center lg:gap-16">
            <div>
                <h1
                    class="max-w-[620px] [font-family:'Hanken_Grotesk',sans-serif] text-[42px] font-bold leading-[1.1] text-white sm:text-5xl lg:text-[44px]">
                    <?php echo esc_html($pricing_f('hero_title', 'TXGB pricing without the guesswork.')); ?></h1>
                <p class="mt-6 max-w-[650px] text-base font-semibold leading-7 text-white/90 sm:text-lg"><?php echo esc_html($pricing_f('hero_copy', 'Tell us what you do and your preferred commercial model and we will help guide you.')); ?></p>
                <div class="mt-8 flex flex-col gap-4 sm:flex-row">
                    <a href="<?php echo esc_url($hero_primary_link['url']); ?>"<?php echo $pricing_target($hero_primary_link['target']); ?>
                        class="inline-flex min-h-12 items-center justify-center rounded-lg bg-brand px-8 py-3 text-base font-bold text-white !no-underline hover:bg-brand-dark"><?php echo esc_html($pricing_label('hero_primary_label', $hero_primary_link, 'Apply Now')); ?></a>
                    <a href="<?php echo esc_url($hero_secondary_link['url']); ?>"<?php echo $pricing_target($hero_secondary_link['target']); ?>
                        class="inline-flex min-h-12 items-center justify-center rounded-lg border border-white/70 bg-white/10 px-8 py-3 text-base font-bold text-white !no-underline hover:bg-white/20"><?php echo esc_html($pricing_label('hero_secondary_label', $hero_secondary_link, 'Request Demo')); ?></a>
                </div>
                <h2 class="sr-only"><?php echo esc_html($pricing_f('steps_heading', 'How pricing works')); ?></h2>
                <div class="mt-10 grid gap-6 sm:grid-cols-3">
                    <?php foreach ($hero_steps as $step): ?>
                        <div class="max-w-[250px]">
                            <p class="text-sm font-bold text-white/75"><?php echo esc_html($step['number']); ?></p>
                            <h2 class="mt-4 text-base font-bold text-white"><?php echo esc_html($step['title']); ?></h2>
                            <p class="mt-3 text-sm leading-6 text-white/80"><?php echo esc_html($step['copy']); ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="grid gap-4">
                <?php foreach ($hero_paths as $path): ?>
                    <a href="<?php echo esc_url($path['url']); ?>"<?php echo $pricing_target($path['target']); ?>
                        class="group flex min-h-[106px] items-center justify-between gap-5 rounded-lg border border-white/10 bg-white/20 p-6 shadow-lg backdrop-blur-md !no-underline hover:bg-white/25">
                        <span>
                            <div class="flex space-x-4 items-center">
                                <i class="bi <?php echo esc_attr($path['icon']); ?> text-xl text-white"
                                    aria-hidden="true"></i>
                                <span class="block text-2xl font-bold text-white">
                                    <?php echo esc_html($path['title']); ?>
                                </span>
                            </div>
                            <span
                                class="mt-1 block text-sm font-semibold text-white/80"><?php echo esc_html($path['copy']); ?></span>
                        </span>
                        <i class="bi bi-arrow-right text-2xl text-white/70 transition group-hover:translate-x-1 group-hover:text-white"
                            aria-hidden="true"></i>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="px-4 py-16 sm:py-20 lg:px-16 lg:py-24">
        <div class="mx-auto max-w-[1312px]">
            <h2
                class="text-center [font-family:'Hanken_Grotesk',sans-serif] text-3xl font-bold leading-tight text-brand sm:text-4xl">
                <?php echo esc_html($pricing_f('cards_heading', 'Choose the pricing model that matches your organisation')); ?></h2>
            <div class="mt-12 grid gap-6 md:grid-cols-2 xl:grid-cols-4">
                <?php foreach ($pricing_cards as $card): ?>
                    <article
                        class="relative flex flex-col rounded-2xl border <?php echo !empty($card['featured']) ? 'border-2 border-brand' : 'border-line'; ?> bg-white p-8 shadow-sm md:min-h-[430px]">
                        <?php if (!empty($card['featured'])): ?>
                            <span
                                class="absolute -top-4 left-1/2 -translate-x-1/2 rounded-full bg-brand px-7 py-1.5 text-[10px] font-bold uppercase tracking-wide text-white"><?php echo esc_html($pricing_f('featured_badge', 'Most Common')); ?></span>
                        <?php endif; ?>
                        <h3 class="text-xl font-bold text-brand"><?php echo esc_html($card['title']); ?></h3>
                        <div class="mt-8">
                            <?php if (!empty($card['price_end'])): ?>
                                <p class="text-4xl font-bold leading-none text-brand">
                                    <?php echo esc_html($card['price']); ?> <span
                                        class="text-sm font-bold text-mid-gray"><?php echo esc_html($card['suffix']); ?></span>
                                    <?php echo esc_html($card['price_end']); ?>
                                </p>
                            <?php else: ?>
                                <p class="text-2xl font-bold leading-tight text-brand">
                                    <?php echo esc_html($card['price']); ?>
                                </p>
                            <?php endif; ?>
                        </div>
                        <p class="mt-6 text-sm leading-6 text-mid-gray"><?php echo esc_html($card['copy']); ?></p>
                        <?php if (!empty($card['points'])): ?>
                            <ul class="mt-6 space-y-3 text-sm font-semibold text-brand">
                                <?php foreach ($card['points'] as $point): ?>
                                    <li class="flex items-center gap-2"><i class="bi bi-check-circle text-brand"
                                            aria-hidden="true"></i><?php echo esc_html($point); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                        <a href="<?php echo esc_url($card['url']); ?>"<?php echo $pricing_target($card['target']); ?>
                            class="mt-8 inline-flex min-h-12 items-center justify-center rounded-lg <?php echo !empty($card['featured']) ? 'bg-brand text-white hover:bg-brand-dark' : 'border border-[#d7b8b3] text-brand hover:border-brand hover:text-brand'; ?> px-6 py-3 text-center font-bold !no-underline md:mt-auto"><?php echo esc_html($card['cta']); ?></a>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="bg-surface px-4 py-16 sm:py-20 lg:px-16 lg:py-24">
        <div class="mx-auto max-w-[1312px]">
            <div class="flex flex-col justify-center items-center">
                <p class="txgb-accent-text inline-flex rounded bg-[#ffdad4] px-4 py-1.5 text-xs font-bold uppercase"><?php echo esc_html($pricing_f('supplier_eyebrow', 'Are you a Supplier?')); ?></p>
                <h2
                    class="mt-7 [font-family:'Hanken_Grotesk',sans-serif] text-3xl font-bold leading-tight text-brand sm:text-4xl">
                    <?php echo esc_html($pricing_f('supplier_heading', 'No booking, no fee supplier pricing')); ?></h2>
                <p class="mt-6 max-w-[620px] text-base leading-8 text-mid-gray"><?php echo esc_html($pricing_f('supplier_copy', 'Our model is designed to grow with you. The 0.75%-2.8% success fee ensures that TXGB only succeeds when your business does. We reduce manual allocation and administrative overhead, allowing you to focus on the experience.')); ?></p>
                <div class="mt-8 grid gap-4 sm:grid-cols-2">
                    <?php foreach ($supplier_types as $type): ?>
                        <div class="flex items-center gap-3 text-sm font-semibold text-brand"><i
                                class="bi bi-check-lg text-brand" aria-hidden="true"></i><?php echo esc_html($type); ?>
                        </div>
                    <?php endforeach; ?>
                </div>
                <a href="<?php echo esc_url($supplier_link['url']); ?>"<?php echo $pricing_target($supplier_link['target']); ?>
                    class="mt-10 inline-flex min-h-12 w-full items-center justify-center gap-3 rounded-lg bg-brand px-7 py-3 font-bold text-white !no-underline shadow-lg shadow-brand/20 hover:bg-brand-dark sm:w-auto"><?php echo esc_html($pricing_label('supplier_cta', $supplier_link, 'Apply Now using the TXGB Get Connected Wizard')); ?> <i class="bi bi-box-arrow-up-right"
                        aria-hidden="true"></i></a>
            </div>
            <!-- <div class="rounded-2xl bg-white p-7 shadow-xl">
                <div class="flex items-center justify-between gap-4 text-sm font-bold">
                    <span class="text-brand"><?php echo esc_html($pricing_f('fee_label', 'Booking Success Fee')); ?></span>
                    <span class="text-brand"><?php echo esc_html($pricing_f('fee_average', '1.5% Avg.')); ?></span>
                </div>
                <div class="mt-6 h-4 overflow-hidden rounded-full bg-[#f0d2ce]">
                    <div class="h-full w-[58%] rounded-full bg-brand"></div>
                </div>
                <div class="mt-4 flex justify-between text-xs font-semibold text-mid-gray">
                    <span><?php echo esc_html($pricing_f('fee_minimum', '0.75%')); ?></span>
                    <span><?php echo esc_html($pricing_f('fee_maximum', '2.8%')); ?></span>
                </div>
            </div> -->
        </div>
    </section>

    <section class="px-4 py-16 sm:py-20 lg:px-16 lg:py-24">
        <div class="mx-auto grid max-w-[1312px] gap-8 lg:grid-cols-3">
            <?php foreach ($partner_cards as $card): ?>
                <article class="rounded-2xl border border-[#dfc0ba] bg-white p-8 sm:p-10 lg:p-8">
                    <p class="txgb-accent-text inline-flex rounded bg-[#ffdad4] px-4 py-1.5 text-xs font-bold uppercase">
                        <?php echo esc_html($card['eyebrow']); ?>
                    </p>
                    <div class="mt-6 flex min-h-12 items-center gap-3">
                        <span
                            class="flex size-11 shrink-0 items-center justify-center rounded-lg bg-brand-tint text-xl text-brand"><i
                                class="bi <?php echo esc_attr($card['icon']); ?>" aria-hidden="true"></i></span>
                        <h2 class="[font-family:'Hanken_Grotesk',sans-serif] text-xl font-bold leading-6 text-brand">
                            <?php echo esc_html($card['title']); ?>
                        </h2>
                    </div>
                    <p class="mt-5 max-w-[560px] text-base leading-8 text-mid-gray"><?php echo esc_html($card['copy']); ?>
                    </p>
                    <ol class="mt-8 space-y-5">
                        <?php foreach ($card['points'] as $index => $point): ?>
                            <li class="flex items-center gap-4 text-sm font-bold text-brand"><span
                                    class="flex size-6 shrink-0 items-center justify-center rounded-full bg-brand-tint text-xs text-brand"><?php echo esc_html($index + 1); ?></span><?php echo esc_html($point); ?>
                            </li>
                        <?php endforeach; ?>
                    </ol>
                    <a href="<?php echo esc_url($card['url']); ?>"<?php echo $pricing_target($card['target']); ?>
                        class="mt-10 inline-flex min-h-12 items-center justify-center rounded-lg bg-primary px-8 py-3 font-bold text-white !no-underline hover:bg-dark-gray"><?php echo esc_html($card['cta']); ?></a>
                </article>
            <?php endforeach; ?>
        </div>
    </section>
</article>

<?php get_footer();
