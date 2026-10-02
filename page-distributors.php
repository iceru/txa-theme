<?php

/**
 * Template Name: Distributors Page
 *
 * @package TailPress
 */

if (!function_exists('txa_f')) {
    function txa_f(string $name, $default = '')
    {
        $value = function_exists('get_field') ? get_field($name) : null;
        return (null === $value || '' === $value || false === $value) ? $default : $value;
    }
}

if (!function_exists('txa_img')) {
    function txa_img(string $name, string $default): string
    {
        $value = txa_f($name);
        if (is_array($value) && !empty($value['url'])) {
            return $value['url'];
        }
        if (is_numeric($value)) {
            $url = wp_get_attachment_image_url((int) $value, 'full');
            if ($url) {
                return $url;
            }
        }
        if (is_string($value) && '' !== $value) {
            return $value;
        }
        return $default;
    }
}

if (!function_exists('txa_url')) {
    function txa_url(string $name, string $default): string
    {
        $value = trim((string) txa_f($name, $default));
        if (0 === strpos($value, '/') && 0 !== strpos($value, '//')) {
            return home_url($value);
        }
        return $value;
    }
}

if (!function_exists('txa_distributor_button')) {
    function txa_distributor_button(string $label, string $url, string $variant = 'primary'): string
    {
        $classes = 'inline-flex min-h-12 w-full items-center justify-center rounded-lg px-5 py-3 font-bold !no-underline transition sm:w-auto sm:px-6';
        $classes .= 'light' === $variant
            ? ' bg-white text-brand hover:bg-surface'
            : ' bg-brand text-white hover:bg-brand-dark';
        return sprintf('<a class="%s" href="%s">%s</a>', esc_attr($classes), esc_url($url), esc_html($label));
    }
}

add_filter('pre_get_document_title', fn(): string => (string) txa_f('distributor_seo_title', 'TXA for Distributors | Access Bookable Australian Tourism Inventory'));
add_action('wp_head', function (): void {
    if (is_page_template('page-distributors.php')) {
        echo '<meta name="description" content="' . esc_attr(txa_f('distributor_seo_description', 'TXA gives distributors unique access to bookable Australian tourism inventory through flexible commercial and technical distribution models.')) . '">' . "\n";
    }
});

get_header();

$apply_url = txa_url('distributor_apply_url', home_url('/distributors/apply/'));

$benefits = [
    ['icon' => 'bi-box-seam', 'title' => 'Access live inventory', 'copy' => 'Direct access to thousands of live-booked suppliers with real-time rates and availability.'],
    ['icon' => 'bi-cash-stack', 'title' => 'Commercial flexibility', 'copy' => 'Support for multiple payment and commercial models including Net, Gross, and Commission.'],
    ['icon' => 'bi-megaphone', 'title' => 'Campaign ready', 'copy' => 'Leverage national and state tourism campaigns by distributing opt-in campaign deals.'],
    ['icon' => 'bi-link-45deg', 'title' => 'Reduced friction', 'copy' => 'Connect once to TXA and gain access to an entire ecosystem without individual integrations.'],
];

foreach ($benefits as $i => $benefit) {
    $n = $i + 1;
    $benefits[$i] = [
        'icon' => txa_f("distributor_benefit_{$n}_icon", $benefit['icon']),
        'title' => txa_f("distributor_benefit_{$n}_title", $benefit['title']),
        'copy' => txa_f("distributor_benefit_{$n}_copy", $benefit['copy']),
    ];
}

$models = [
    ['icon' => 'bi-code-slash', 'title' => 'API Connection', 'copy' => 'Direct JSON-based API for enterprise distributors who want total control over the booking UI and user experience.', 'points' => ['Real-time confirmation', 'Dynamic pricing support']],
    ['icon' => 'bi-window', 'title' => 'White-label Booking Pages', 'copy' => 'Branded booking widgets and search pages that integrate seamlessly into your website with minimal code.', 'points' => ['Rapid deployment', 'Mobile optimized']],
    ['icon' => 'bi-person-vcard', 'title' => 'On-account / Agent Model', 'copy' => 'Support for traditional agency models where distributors hold accounts and manage payments offline.', 'points' => ['Flexible settlement', 'Back-office reconciliation']],
    ['icon' => 'bi-signpost-split', 'title' => 'Campaign and Destination Led', 'copy' => 'Targeted distribution focused on specific regions or events as part of institutional marketing efforts.', 'points' => ['High-intent traffic', 'Curated inventory lists']],
    ['icon' => 'bi-credit-card-2-front', 'title' => 'Direct to Supplier payment option', 'copy' => "Facilitates the Supplier transaction with the supplier as merchant. Distributors don't have PCI compliance or GDPR. Supplier is the merchant but distributor still gets credited with commission.", 'points' => []],
    ['icon' => 'bi-file-earmark-check', 'title' => 'Simple and easy Supplier contracting', 'copy' => 'Simple opt-in opt-out model for contracting. Single supplier contract legally covers all suppliers. Simple, fast, efficient.', 'points' => []],
];

foreach ($models as $i => $model) {
    $n = $i + 1;
    $points = [
        txa_f("distributor_model_{$n}_point_1", $model['points'][0] ?? ''),
        txa_f("distributor_model_{$n}_point_2", $model['points'][1] ?? ''),
    ];
    $models[$i] = [
        'icon' => txa_f("distributor_model_{$n}_icon", $model['icon']),
        'title' => txa_f("distributor_model_{$n}_title", $model['title']),
        'copy' => txa_f("distributor_model_{$n}_copy", $model['copy']),
        'points' => array_values(array_filter($points)),
    ];
}
?>

<article class="bg-white text-near-black [font-family:'Source_Sans_Pro',sans-serif]">
    <section class="px-4 pb-6 pt-3 sm:pt-5 lg:px-16 lg:pb-16 lg:pt-8">
        <div
            class="relative mx-auto min-h-[590px] max-w-[1312px] overflow-hidden rounded-xl bg-near-black sm:min-h-[560px] sm:rounded-2xl lg:min-h-[600px]">
            <img src="<?php echo esc_url(txa_img('distributor_hero_image', get_template_directory_uri() . '/images/new/distributors-hero.jpg')); ?>"
                alt="<?php echo esc_attr(txa_f('distributor_hero_image_alt', 'Australian landscape')); ?>"
                class="absolute inset-0 h-full w-full object-cover">
            <div class="absolute inset-0 bg-near-black/55 sm:bg-near-black/45" aria-hidden="true"></div>
            <div
                class="relative z-10 flex min-h-[590px] items-center px-5 py-10 sm:min-h-[560px] sm:px-8 sm:py-16 lg:min-h-[600px] lg:px-8 lg:py-24">
                <div class="w-full max-w-[760px]">
                    <p
                        class="inline-flex w-fit max-w-full rounded-lg bg-brand px-4 py-2 text-sm font-bold sm:px-5 sm:py-3 sm:text-base uppercase leading-5 text-white">
                        <?php echo esc_html(txa_f('distributor_hero_label', 'TXA for distributors')); ?></p>
                    <h1
                        class="mt-4 max-w-[760px] [font-family:'Hanken_Grotesk',sans-serif] text-[34px] font-semibold leading-[1.08] text-white min-[390px]:text-4xl sm:text-5xl lg:leading-[56px]">
                        <?php echo esc_html(txa_f('distributor_hero_title', 'Unique access to bookable Australian tourism inventory')); ?></h1>
                    <p
                        class="mt-4 max-w-[660px] text-base font-medium leading-6 text-white sm:text-lg sm:leading-[30px]">
                        <?php echo esc_html(txa_f('distributor_hero_copy', 'TXA gives distributors a pathway to Australian tourism suppliers across accommodation, tours, attractions, events and experiences. TXA offers distribution channels flexible commercial models, API or white label booking page options, and the ability to participate in destination-led campaigns and trade initiatives.')); ?></p>
                    <div class="mt-6"><?php echo txa_distributor_button(txa_f('distributor_hero_button_label', 'Become a Distributor'), $apply_url); ?></div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-surface px-4 py-9 sm:py-10 lg:p-16">
        <div class="mx-auto max-w-[1312px]">
            <div class="max-w-[680px]">
                <p class="text-xs uppercase leading-5 text-brand sm:text-sm">
                    <?php echo esc_html(txa_f('distributor_ecosystem_eyebrow', 'Connected tourism ecosystem')); ?></p>
                <h2
                    class="mt-2 [font-family:'Hanken_Grotesk',sans-serif] text-[28px] font-semibold leading-9 sm:text-3xl sm:leading-tight lg:text-4xl lg:leading-[44px]">
                    <?php echo esc_html(txa_f('distributor_ecosystem_heading', 'See where distributors connect through TXA')); ?></h2>
                <p class="mt-3 text-base leading-7 text-mid-gray sm:leading-[30px]">
                    <?php echo esc_html(txa_f('distributor_ecosystem_copy', 'TXA connects live tourism inventory with the websites and distribution channels travellers use to discover and book Australian experiences.')); ?></p>
            </div>
            <?php get_template_part('template-parts/system-diagram', null, ['highlight' => 'dmo']); ?>
        </div>
    </section>

    <section class="px-4 py-10 sm:py-12 lg:px-16 lg:py-16">
        <div class="mx-auto max-w-[1312px]">
            <div class="text-left sm:text-center">
                <h2
                    class="[font-family:'Hanken_Grotesk',sans-serif] text-[28px] font-bold leading-9 tracking-[-0.01em] text-[#151c27] sm:text-3xl">
                    <?php echo esc_html(txa_f('distributor_benefits_heading', 'Why use TXA to source Australian tourism suppliers')); ?></h2>
                <p class="mt-3 text-[15px] leading-6 text-mid-gray sm:text-base">
                    <?php echo esc_html(txa_f('distributor_benefits_copy', 'Providing the connectivity required to scale your Australian tourism portfolio efficiently.')); ?></p>
            </div>
            <div class="mt-7 grid gap-4 sm:mt-8 sm:grid-cols-2 sm:gap-6 xl:grid-cols-4">
                <?php foreach ($benefits as $index => $benefit): ?>
                    <article
                        class="rounded-xl border border-[#dfc0ba]/20 bg-white p-5 shadow-[0_4px_10px_rgba(0,0,0,0.05)] sm:min-h-[250px] sm:p-8">
                        <span
                            class="bg-[#ffdad4] flex size-11 items-center justify-center rounded-lg text-lg font-bold text-brand sm:size-12"><i
                                class="bi <?php echo esc_attr($benefit['icon']); ?>" aria-hidden="true"></i></span>
                        <h3
                            class="mt-4 [font-family:'Hanken_Grotesk',sans-serif] text-lg font-semibold leading-6 text-[#151c27] sm:mt-6 sm:text-xl sm:leading-7">
                            <?php echo esc_html($benefit['title']); ?>
                        </h3>
                        <p class="mt-2 text-[15px] leading-6 text-mid-gray sm:mt-3 sm:text-base">
                            <?php echo esc_html($benefit['copy']); ?>
                        </p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="px-4 py-8 sm:py-10 lg:px-16 lg:py-8">
        <div class="mx-auto max-w-[1312px] rounded-3xl bg-white py-2">
            <div class="max-w-[672px]">
                <h2
                    class="[font-family:'Hanken_Grotesk',sans-serif] text-[28px] font-bold leading-9 tracking-[-0.01em] text-[#151c27] sm:text-3xl">
                    <?php echo esc_html(txa_f('distributor_models_heading', 'Flexible distribution models')); ?></h2>
                <p class="mt-3 text-[15px] leading-6 text-mid-gray sm:mt-4 sm:text-base">
                    <?php echo esc_html(txa_f('distributor_models_copy', 'We provide multiple ways to consume inventory based on your technical maturity and business model.')); ?></p>
            </div>
            <div class="mt-7 grid gap-4 sm:mt-8 sm:gap-6 lg:grid-cols-2">
                <?php foreach ($models as $model): ?>
                    <article
                        class="flex flex-col gap-4 rounded-2xl border border-[#dfc0ba]/10 bg-surface p-5 sm:flex-row sm:gap-8 sm:p-8">
                        <span
                            class="flex size-12 shrink-0 items-center justify-center rounded-xl bg-white text-xl font-bold text-brand shadow-sm sm:size-16 sm:text-2xl"><i
                                class="bi <?php echo esc_attr($model['icon']); ?>" aria-hidden="true"></i></span>
                        <div>
                            <h3
                                class="[font-family:'Hanken_Grotesk',sans-serif] text-lg font-semibold leading-6 text-[#151c27] sm:text-xl sm:leading-7">
                                <?php echo esc_html($model['title']); ?>
                            </h3>
                            <p class="mt-2 text-[15px] leading-6 text-mid-gray sm:text-base">
                                <?php echo esc_html($model['copy']); ?>
                            </p>
                            <?php if (!empty($model['points'])): ?>
                                <ul class="mt-4 space-y-2 text-sm text-[#151c27]">
                                    <?php foreach ($model['points'] as $point): ?>
                                        <li class="flex items-center gap-2"><i class="bi bi-check-circle-fill text-brand"
                                                aria-hidden="true"></i><?php echo esc_html($point); ?></li><?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="px-3 py-10 sm:px-4 sm:py-14 lg:px-16 lg:py-16">
        <div
            class="relative mx-auto min-h-[390px] max-w-[1312px] overflow-hidden rounded-xl bg-near-black sm:min-h-[420px] sm:rounded-2xl lg:min-h-[526px]">
            <img src="<?php echo esc_url(txa_img('distributor_campaign_image', get_template_directory_uri() . '/images/new/distributors-2.jpg')); ?>"
                alt="<?php echo esc_attr(txa_f('distributor_campaign_image_alt', 'Australian city waterfront at night')); ?>"
                class="absolute inset-0 h-full w-full object-cover">
            <div class="absolute inset-0 bg-black/60 sm:bg-black/50" aria-hidden="true"></div>
            <div
                class="relative z-10 flex min-h-[390px] items-center px-5 py-10 sm:min-h-[420px] sm:px-7 sm:py-14 lg:min-h-[526px] lg:px-12">
                <div class="max-w-[687px]">
                    <h2
                        class="[font-family:'Hanken_Grotesk',sans-serif] text-[28px] font-bold leading-9 tracking-[-0.01em] text-white sm:text-3xl sm:leading-10">
                        <?php echo esc_html(txa_f('distributor_campaign_heading', 'Drive regional impact with destination-led campaigns')); ?></h2>
                    <p class="mt-4 text-[15px] leading-6 text-white/90 sm:mt-6 sm:text-base">
                        <?php echo esc_html(txa_f('distributor_campaign_copy', 'TXA sits at the heart of Australian tourism. We work closely with STOs and RTOs to power booking engines for state-wide initiatives. Become a partner in these high-value trade campaigns.')); ?></p>
                    <div class="mt-6">
                        <?php echo txa_distributor_button(txa_f('distributor_campaign_button_label', 'Become a TXA distributor'), $apply_url, 'light'); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php get_template_part('template-parts/participant-faqs', null, ['group' => 'distributors']); ?>

</article>

<?php get_footer();
