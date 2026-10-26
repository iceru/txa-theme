<?php

/**
 * Template Name: Pricing
 *
 * @package TailPress
 */

get_header();

$hero_apply_url = txa_url('pricing_hero_apply_url', '/apply-now/');
$hero_demo_url = txa_url('pricing_hero_demo_url', '/contact/');
$supplier_url = txa_url('pricing_path_1_url', '/suppliers/');
$destination_url = txa_url('pricing_path_2_url', '/destinations/pricing/');
$distributor_url = txa_url('pricing_path_3_url', '/distributors/');
$booking_url = txa_url('pricing_path_4_url', '/booking-systems/partner-enquiry/');

$hero_steps = [
    ['number' => '1', 'title' => txa_f('pricing_step_1_title', 'Identify your role'), 'copy' => txa_f('pricing_step_1_copy', 'Supplier, destination, distributor and booking system partner pricing are intentionally separated.')],
    ['number' => '2', 'title' => txa_f('pricing_step_2_title', 'Confirm the model'), 'copy' => txa_f('pricing_step_2_copy', 'Success fee, platform package, commercial agreement or partner enquiry depends on the pathway.')],
    ['number' => '3', 'title' => txa_f('pricing_step_3_title', 'Take the right next step'), 'copy' => txa_f('pricing_step_3_copy', 'Each pathway leads to the enquiry or application process that matches the organisation type.')],
];

$hero_paths = [
    ['icon' => 'bi-house-door', 'title' => txa_f('pricing_path_1_title', 'Suppliers'), 'copy' => txa_f('pricing_path_1_copy', '0.75% - 2.8% success fee per booking.'), 'url' => $supplier_url],
    ['icon' => 'bi-map', 'title' => txa_f('pricing_path_2_title', 'Destinations'), 'copy' => txa_f('pricing_path_2_copy', 'Packages subject to approval and scope.'), 'url' => $destination_url],
    ['icon' => 'bi-diagram-3', 'title' => txa_f('pricing_path_3_title', 'Distributors'), 'copy' => txa_f('pricing_path_3_copy', 'Pricing by agreement based on volume.'), 'url' => $distributor_url],
    ['icon' => 'bi-calendar2-check', 'title' => txa_f('pricing_path_4_title', 'Booking Systems'), 'copy' => txa_f('pricing_path_4_copy', 'Technical integration partner enquiry.'), 'url' => $booking_url],
];

$pricing_cards = [
    ['title' => txa_f('pricing_card_1_title', 'Tourism Suppliers'), 'price' => txa_f('pricing_card_1_price', '0.75%'), 'suffix' => txa_f('pricing_card_1_suffix', 'to'), 'price_end' => txa_f('pricing_card_1_price_end', '2.8%'), 'copy' => txa_f('pricing_card_1_copy', 'Success fee per booking. Perfect for hotels, tours, and attraction operators.'), 'points' => [txa_f('pricing_card_1_point_1', 'No upfront fees'), txa_f('pricing_card_1_point_2', 'Unlimited distributors')], 'cta' => txa_f('pricing_card_1_cta', 'View Details'), 'url' => txa_url('pricing_card_1_url', $supplier_url), 'featured' => true],
    ['title' => txa_f('pricing_card_2_title', 'Destinations'), 'price' => txa_f('pricing_card_2_price', 'Destination Packages'), 'copy' => txa_f('pricing_card_2_copy', 'Fixed monthly platform service packages for destination activation, supplier support, content, trade, virtual concierge and data. Publish only after package approval.'), 'cta' => txa_f('pricing_card_2_cta', 'View Packages'), 'url' => txa_url('pricing_card_2_url', $destination_url)],
    ['title' => txa_f('pricing_card_3_title', 'Distributors'), 'price' => txa_f('pricing_card_3_price', 'Commercial Base'), 'copy' => txa_f('pricing_card_3_copy', 'Free to connect. Commercial arrangements depend on the distributor model and agreement.'), 'cta' => txa_f('pricing_card_3_cta', 'Become a Distributor'), 'url' => txa_url('pricing_card_3_url', $distributor_url)],
    ['title' => txa_f('pricing_card_4_title', 'Booking Systems'), 'price' => txa_f('pricing_card_4_price', 'Partner Enquiry'), 'copy' => txa_f('pricing_card_4_copy', 'Fee to connect. Integration scope and commercial arrangements are handled through partner enquiry.'), 'cta' => txa_f('pricing_card_4_cta', 'Partner Enquiry'), 'url' => txa_url('pricing_card_4_url', $booking_url)],
];

$supplier_types = [txa_f('pricing_supplier_type_1', 'Accommodation and Hotels'), txa_f('pricing_supplier_type_2', 'Guided Tours and Experiences'), txa_f('pricing_supplier_type_3', 'Attractions and Rentals'), txa_f('pricing_supplier_type_4', 'Event and Activity Providers')];

$partner_cards = [
    [
        'icon' => 'bi-map',
        'eyebrow' => txa_f('pricing_partner_1_eyebrow', 'Are you a Destination Manager?'),
        'title' => txa_f('pricing_partner_1_title', 'Destinations'),
        'copy' => txa_f('pricing_partner_1_copy', 'Choose a Smart Destination package matched to the scale of your visitor economy, with platform infrastructure and support for local supplier activation.'),
        'points' => [txa_f('pricing_partner_1_point_1', 'Local, Regional and State packages'), txa_f('pricing_partner_1_point_2', 'Destination website and content activation'), txa_f('pricing_partner_1_point_3', 'Trade portal and virtual concierge tools')],
        'cta' => txa_f('pricing_partner_1_cta', 'View Destination Packages'),
        'url' => txa_url('pricing_partner_1_url', $destination_url),
    ],
    [
        'icon' => 'bi-globe2',
        'eyebrow' => txa_f('pricing_partner_2_eyebrow', 'Are you a Distributor?'),
        'title' => txa_f('pricing_partner_2_title', 'Distributors'),
        'copy' => txa_f('pricing_partner_2_copy', 'TXA acts as a commercially neutral exchange, allowing distributors to connect with thousands of Australian suppliers through a single pipe.'),
        'points' => [txa_f('pricing_partner_2_point_1', 'Commercially Neutral Exchange'), txa_f('pricing_partner_2_point_2', 'Live inventory from connected booking systems'), txa_f('pricing_partner_2_point_3', 'Consolidated payment reconciliation')],
        'cta' => txa_f('pricing_partner_2_cta', 'Become a Distributor'),
        'url' => txa_url('pricing_partner_2_url', $distributor_url),
    ],
    [
        'icon' => 'bi-terminal',
        'eyebrow' => txa_f('pricing_partner_3_eyebrow', 'Are you a Booking System Vendor?'),
        'title' => txa_f('pricing_partner_3_title', 'Booking System Partners'),
        'copy' => txa_f('pricing_partner_3_copy', 'Empower your software users with instant access to state and regional tourism markets via TXA\'s integration framework.'),
        'points' => [txa_f('pricing_partner_3_point_1', 'Open API and Documentation'), txa_f('pricing_partner_3_point_2', 'Technical support for onboarding'), txa_f('pricing_partner_3_point_3', 'Value-add for your customer base')],
        'cta' => txa_f('pricing_partner_3_cta', 'Partner Enquiry'),
        'url' => txa_url('pricing_partner_3_url', $booking_url),
    ],
];
?>

<article class="bg-white text-near-black [font-family:'Source_Sans_Pro',sans-serif]">
    <section
        class="relative min-h-[620px] overflow-hidden bg-near-black px-4 py-12 text-white sm:py-16 lg:px-16 lg:py-24">
        <img src="<?php echo esc_url(txa_img('pricing_hero_image', get_theme_file_uri('/images/pricing.jpg'))); ?>"
            alt="<?php echo esc_attr(txa_f('pricing_hero_image_alt', '')); ?>"
            class="absolute inset-0 h-full w-full object-cover">
        <div class="absolute inset-0 bg-near-black/60" aria-hidden="true"></div>
        <div
            class="relative z-10 mx-auto grid max-w-[1312px] gap-10 lg:grid-cols-[1fr_520px] lg:items-center lg:gap-16">
            <div>
                <h1
                    class="max-w-[620px] [font-family:'Hanken_Grotesk',sans-serif] text-[42px] font-bold leading-[1.1] text-white sm:text-5xl lg:text-[44px]">
                    <?php echo esc_html(txa_f('pricing_hero_title', 'TXA pricing without the guesswork.')); ?>
                </h1>
                <p class="mt-6 max-w-[650px] text-base font-semibold leading-7 text-white/90 sm:text-lg">Tell us what
                    <?php echo esc_html(txa_f('pricing_hero_copy', 'Tell us what you do and your preferred commercial model and we will help guide you.')); ?>
                </p>
                <div class="mt-8 flex flex-col gap-4 sm:flex-row">
                    <a href="<?php echo esc_url($hero_apply_url); ?>"
                        class="inline-flex min-h-12 items-center justify-center rounded-lg bg-brand px-8 py-3 text-base font-bold text-white !no-underline hover:bg-brand-dark"><?php echo esc_html(txa_f('pricing_apply_label', 'Apply Now')); ?></a>
                    <a href="<?php echo esc_url($hero_demo_url); ?>"
                        class="inline-flex min-h-12 items-center justify-center rounded-lg border border-white/70 bg-white/10 px-8 py-3 text-base font-bold text-white !no-underline hover:bg-white/20"><?php echo esc_html(txa_f('pricing_demo_label', 'Request Demo')); ?></a>
                </div>
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
                    <a href="<?php echo esc_url($path['url']); ?>"
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
                class="text-center [font-family:'Hanken_Grotesk',sans-serif] text-3xl font-bold leading-tight text-[#151c27] sm:text-4xl">
                <?php echo esc_html(txa_f('pricing_cards_heading', 'Choose the pricing model that matches your organisation')); ?>
            </h2>
            <div class="mt-12 grid gap-6 md:grid-cols-2 xl:grid-cols-4">
                <?php foreach ($pricing_cards as $card): ?>
                    <article
                        class="relative flex flex-col rounded-2xl border <?php echo !empty($card['featured']) ? 'border-2 border-brand' : 'border-line'; ?> bg-white p-8 shadow-sm md:min-h-[430px]">
                        <?php if (!empty($card['featured'])): ?>
                            <span
                                class="absolute -top-4 left-1/2 -translate-x-1/2 rounded-full bg-brand px-7 py-1.5 text-[10px] font-bold uppercase tracking-wide text-white">Most
                                <?php echo esc_html(txa_f('pricing_featured_badge', 'Most Common')); ?></span>
                        <?php endif; ?>
                        <h3 class="text-xl font-bold text-brand"><?php echo esc_html($card['title']); ?></h3>
                        <div class="mt-8">
                            <?php if (!empty($card['price_end'])): ?>
                                <p class="text-4xl font-bold leading-none text-[#151c27]">
                                    <?php echo esc_html($card['price']); ?> <span
                                        class="text-sm font-bold text-mid-gray"><?php echo esc_html($card['suffix']); ?></span>
                                    <?php echo esc_html($card['price_end']); ?>
                                </p>
                            <?php else: ?>
                                <p class="text-2xl font-bold leading-tight text-[#151c27]">
                                    <?php echo esc_html($card['price']); ?>
                                </p>
                            <?php endif; ?>
                        </div>
                        <p class="mt-6 text-sm leading-6 text-mid-gray"><?php echo esc_html($card['copy']); ?></p>
                        <?php if (!empty($card['points'])): ?>
                            <ul class="mt-6 space-y-3 text-sm font-semibold text-[#151c27]">
                                <?php foreach ($card['points'] as $point): ?>
                                    <li class="flex items-center gap-2"><i class="bi bi-check-circle text-brand"
                                            aria-hidden="true"></i><?php echo esc_html($point); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                        <a href="<?php echo esc_url($card['url']); ?>"
                            class="mt-8 inline-flex min-h-12 items-center justify-center rounded-lg <?php echo !empty($card['featured']) ? 'bg-brand text-white hover:bg-brand-dark' : 'border border-[#d7b8b3] text-[#151c27] hover:border-brand hover:text-brand'; ?> px-6 py-3 text-center font-bold !no-underline md:mt-auto"><?php echo esc_html($card['cta']); ?></a>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="bg-surface px-4 py-16 sm:py-20 lg:px-16 lg:py-24">
        <div class="mx-auto grid max-w-[1312px] gap-10 lg:grid-cols-[1fr_520px] lg:items-center lg:gap-16">
            <div>
                <p class="inline-flex rounded bg-[#ffdad4] px-4 py-1.5 text-xs font-bold uppercase text-brand">
                    <?php echo esc_html(txa_f('pricing_supplier_eyebrow', 'Are you a Supplier?')); ?></p>
                <h2
                    class="mt-7 [font-family:'Hanken_Grotesk',sans-serif] text-3xl font-bold leading-tight text-[#151c27] sm:text-4xl">
                    <?php echo esc_html(txa_f('pricing_supplier_heading', 'No booking, no fee supplier pricing')); ?>
                </h2>
                <p class="mt-6 max-w-[620px] text-base leading-8 text-mid-gray">Our model is designed to grow with you.
                    <?php echo esc_html(txa_f('pricing_supplier_copy', 'Our model is designed to grow with you. The 0.75%-2.8% success fee ensures that TXA only succeeds when your business does. We reduce manual allocation and administrative overhead, allowing you to focus on the experience.')); ?>
                </p>
                <div class="mt-8 grid gap-4 sm:grid-cols-2">
                    <?php foreach ($supplier_types as $type): ?>
                        <div class="flex items-center gap-3 text-sm font-semibold text-[#151c27]"><i
                                class="bi bi-check-lg text-brand" aria-hidden="true"></i><?php echo esc_html($type); ?>
                        </div>
                    <?php endforeach; ?>
                </div>
                <a href="<?php echo esc_url(txa_url('pricing_supplier_apply_url', $hero_apply_url)); ?>"
                    class="mt-10 inline-flex min-h-12 w-full items-center justify-center gap-3 rounded-lg bg-brand px-7 py-3 font-bold text-white !no-underline shadow-lg shadow-brand/20 hover:bg-brand-dark sm:w-auto"><?php echo esc_html(txa_f('pricing_supplier_apply_label', 'Apply Now using the TXA Get Connected Wizard')); ?>
                    <i class="bi bi-box-arrow-up-right" aria-hidden="true"></i></a>
            </div>
            <div class="rounded-2xl bg-white p-7 shadow-xl">
                <div class="flex items-center justify-between gap-4 text-sm font-bold">
                    <span
                        class="text-[#151c27]"><?php echo esc_html(txa_f('pricing_fee_label', 'Booking Success Fee')); ?></span>
                    <span class="text-brand"><?php echo esc_html(txa_f('pricing_fee_average', '1.5% Avg.')); ?></span>
                </div>
                <div class="mt-6 h-4 overflow-hidden rounded-full bg-[#f0d2ce]">
                    <div class="h-full w-[58%] rounded-full bg-brand"></div>
                </div>
                <div class="mt-4 flex justify-between text-xs font-semibold text-mid-gray">
                    <span><?php echo esc_html(txa_f('pricing_fee_min', '0.75%')); ?></span>
                    <span><?php echo esc_html(txa_f('pricing_fee_max', '2.8%')); ?></span>
                </div>
            </div>
        </div>
    </section>

    <section class="px-4 py-16 sm:py-20 lg:px-16 lg:py-24">
        <div class="mx-auto grid max-w-[1312px] gap-8 lg:grid-cols-3">
            <?php foreach ($partner_cards as $card): ?>
                <article class="rounded-2xl border border-[#dfc0ba] bg-white p-8 sm:p-10 lg:p-8">
                    <p class="inline-flex rounded bg-[#ffdad4] px-4 py-1.5 text-xs font-bold uppercase text-brand">
                        <?php echo esc_html($card['eyebrow']); ?>
                    </p>
                    <div class="mt-6 flex min-h-12 items-center gap-3">
                        <span
                            class="flex size-11 shrink-0 items-center justify-center rounded-lg bg-brand-tint text-xl text-brand"><i
                                class="bi <?php echo esc_attr($card['icon']); ?>" aria-hidden="true"></i></span>
                        <h2 class="[font-family:'Hanken_Grotesk',sans-serif] text-xl font-bold leading-6 text-[#151c27]">
                            <?php echo esc_html($card['title']); ?>
                        </h2>
                    </div>
                    <p class="mt-5 max-w-[560px] text-base leading-8 text-mid-gray"><?php echo esc_html($card['copy']); ?>
                    </p>
                    <ol class="mt-8 space-y-5">
                        <?php foreach ($card['points'] as $index => $point): ?>
                            <li class="flex items-center gap-4 text-sm font-bold text-[#151c27]"><span
                                    class="flex size-6 shrink-0 items-center justify-center rounded-full bg-brand-tint text-xs text-brand"><?php echo esc_html($index + 1); ?></span><?php echo esc_html($point); ?>
                            </li>
                        <?php endforeach; ?>
                    </ol>
                    <a href="<?php echo esc_url($card['url']); ?>"
                        class="mt-10 inline-flex min-h-12 items-center justify-center rounded-lg bg-near-black px-8 py-3 font-bold text-white !no-underline hover:bg-dark-gray"><?php echo esc_html($card['cta']); ?></a>
                </article>
            <?php endforeach; ?>
        </div>
    </section>
</article>

<?php get_footer();
