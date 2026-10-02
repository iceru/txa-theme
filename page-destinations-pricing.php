<?php

/**
 * Template Name: Destinations Pricing
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

get_header();

$packages = [
    ['name' => 'Local', 'poi' => '150', 'microsites' => '1', 'concierge' => '5', 'popular' => false],
    ['name' => 'Regional', 'poi' => '375', 'microsites' => '2', 'concierge' => '10', 'popular' => true],
    ['name' => 'State', 'poi' => '1,125', 'microsites' => '5', 'concierge' => '20', 'popular' => false],
];

foreach ($packages as $i => $package) {
    $n = $i + 1;
    $popular = function_exists('get_field') ? get_field("pricing_package_{$n}_popular") : null;
    $name = txa_f("pricing_package_{$n}_name", $package['name']);
    $packages[$i] = [
        'name' => $name,
        'poi' => txa_f("pricing_package_{$n}_poi", $package['poi']),
        'microsites' => txa_f("pricing_package_{$n}_microsites", $package['microsites']),
        'concierge' => txa_f("pricing_package_{$n}_concierge", $package['concierge']),
        'popular' => null === $popular ? $package['popular'] : (bool) $popular,
        'button' => txa_f("pricing_package_{$n}_button", 'Select ' . $name . ' Package'),
    ];
}

$feature_paas = txa_f('pricing_feature_paas', 'PaaS subscription');
$feature_poi = txa_f('pricing_feature_poi_suffix', 'POI assets input service');
$feature_dmo = txa_f('pricing_feature_dmo', '1 DMO website activation');
$feature_microsite_one = txa_f('pricing_feature_microsite_singular', 'microsite initiative p.a.');
$feature_microsite_many = txa_f('pricing_feature_microsite_plural', 'microsite initiatives p.a.');
$feature_trade = txa_f('pricing_feature_trade', '1 landing page for TXA Trade Portal');
$feature_concierge = txa_f('pricing_feature_concierge_suffix', 'Virtual Concierge initiatives');

$setup_cards = [
    ['icon' => 'bi-gear', 'title' => 'System configuration', 'copy' => "Set up around your destination's requirements."],
    ['icon' => 'bi-database', 'title' => 'Initial data import', 'copy' => 'Prepare core destination and supplier data.'],
    ['icon' => 'bi-people', 'title' => 'Hands-on training', 'copy' => 'Practical guidance for your team and suppliers.'],
];

foreach ($setup_cards as $i => $card) {
    $n = $i + 1;
    $setup_cards[$i] = [
        'icon' => txa_f("pricing_setup_{$n}_icon", $card['icon']),
        'title' => txa_f("pricing_setup_{$n}_title", $card['title']),
        'copy' => txa_f("pricing_setup_{$n}_copy", $card['copy']),
    ];
}
?>
<article class="bg-white text-near-black [font-family:'Source_Sans_Pro',sans-serif]">
    <section
        class="relative min-h-[500px] overflow-hidden px-4 py-14 text-white sm:min-h-[540px] sm:py-16 lg:min-h-[594px] lg:px-16 lg:py-24">
        <img src="<?php echo esc_url(txa_img('pricing_hero_image', get_template_directory_uri() . '/images/destination-pricing.jpg')); ?>"
            alt="<?php echo esc_attr(txa_f('pricing_hero_image_alt', 'Australian destination landscape')); ?>" class="absolute inset-0 h-full w-full object-cover">
        <div class="absolute inset-0 bg-near-black/55 sm:bg-near-black/45"></div>
        <div class="relative mx-auto flex min-h-[390px] max-w-[1312px] items-center sm:min-h-[420px] lg:min-h-0">
            <div class="max-w-[666px]">
                <p
                    class="inline-flex w-fit max-w-full rounded-lg bg-white px-4 py-2 text-sm font-bold sm:px-5 sm:py-3 sm:text-base leading-5 text-brand">
                    <?php echo esc_html(txa_f('pricing_hero_label', 'TXA FOR DESTINATIONS')); ?></p>
                <h1 class="mt-5 text-3xl font-semibold leading-[1.1] sm:mt-6 sm:text-5xl lg:leading-[56px]"><?php echo esc_html(txa_f('pricing_hero_title_line_1', 'TXA Smart Destination')); ?><br class="hidden sm:block"> <?php echo esc_html(txa_f('pricing_hero_title_line_2', 'Packages')); ?></h1>
                <p class="mt-5 text-base font-semibold leading-7 sm:mt-6 sm:text-lg sm:leading-[30px]"><?php echo esc_html(txa_f('pricing_hero_copy', 'TXA offers Smart Destination packages that match the scope and scale of your visitor economy. Each package is designed to give your destination access to platform infrastructure, supplier activation support, destination content activation and industry-facing tools without the risk of a custom technology build.')); ?></p>
                <div class="mt-6 flex flex-col gap-3 sm:flex-row sm:gap-4"><a
                        href="<?php echo esc_url(txa_url('pricing_hero_primary_url', home_url('/apply-now/'))); ?>"
                        class="inline-flex min-h-12 w-full items-center justify-center rounded-lg bg-white px-6 py-3 text-center text-base font-bold text-brand !no-underline sm:w-auto sm:px-8 sm:text-lg"><?php echo esc_html(txa_f('pricing_hero_primary_label', 'Apply Now')); ?></a><a href="<?php echo esc_url(txa_url('pricing_hero_secondary_url', home_url('/contact/'))); ?>"
                        class="inline-flex min-h-12 w-full items-center justify-center rounded-lg border border-white px-6 py-3 text-center text-base font-bold text-white !no-underline sm:w-auto sm:px-8 sm:text-lg"><?php echo esc_html(txa_f('pricing_hero_secondary_label', 'Request Demo')); ?></a></div>
            </div>
        </div>
    </section>
    <section class="px-4 py-12 sm:py-14 lg:px-16 lg:py-16">
        <div class="mx-auto max-w-[1280px]">
            <div class="text-center">
                <h2 class="[font-family:'Hanken_Grotesk',sans-serif] text-3xl font-bold leading-tight text-[#151c27]">
                    <?php echo esc_html(txa_f('pricing_scale_heading', 'Choose Your Destination Scale')); ?></h2>
                <p class="mx-auto mt-3 max-w-[640px] text-sm leading-6 text-mid-gray sm:mt-4 sm:text-base"><?php echo esc_html(txa_f('pricing_scale_copy', 'Scalable infrastructure designed for every level of the tourism ecosystem.')); ?></p>
                <p class="mt-4 text-sm font-bold uppercase tracking-wide text-brand sm:text-base"><?php echo esc_html(txa_f('pricing_includes_label', 'Destination packages include:')); ?></p>
            </div>
            <div class="mt-10 grid gap-5 sm:mt-12 sm:grid-cols-2 lg:mt-16 lg:grid-cols-3 lg:gap-8 lg:px-10">
                <?php foreach ($packages as $package): ?>
                    <article
                        class="relative rounded-2xl <?php echo !empty($package['popular']) ? 'border-2 border-brand shadow-xl' : 'border border-[#dfc0ba]/30'; ?> bg-white p-6 sm:rounded-3xl sm:p-8">
                        <?php if (!empty($package['popular'])): ?><span
                                class="absolute -top-3 left-1/2 -translate-x-1/2 whitespace-nowrap rounded-full bg-brand px-4 py-1 text-[10px] tracking-wide text-white sm:text-xs"><?php echo esc_html(txa_f('pricing_popular_badge', 'MOST POPULAR')); ?></span><?php endif; ?>
                        <h3 class="text-2xl font-semibold text-[#151c27]"><?php echo esc_html($package['name']); ?></h3>
                        <ul class="mt-6 space-y-3 text-sm leading-6 sm:mt-8 sm:space-y-4 sm:text-base">
                            <?php $features = [$feature_paas, $package['poi'] . ' ' . $feature_poi, $feature_dmo, $package['microsites'] . ' ' . ($package['microsites'] === '1' ? $feature_microsite_one : $feature_microsite_many), $feature_trade, $package['concierge'] . ' ' . $feature_concierge];
                            foreach ($features as $feature): ?>
                                <li class="flex gap-3"><span
                                        class="shrink-0 text-brand">⊙</span><span><?php echo esc_html($feature); ?></span></li>
                            <?php endforeach; ?>
                        </ul>
                        <a href="<?php echo esc_url(txa_url('pricing_package_button_url', home_url('/contact/'))); ?>"
                            class="mt-8 inline-flex min-h-12 w-full items-center justify-center rounded-lg <?php echo !empty($package['popular']) ? 'bg-brand text-white' : 'border border-brand text-brand'; ?> px-4 py-3 text-center font-semibold !no-underline sm:mt-10"><?php echo esc_html($package['button']); ?></a>
                    </article><?php endforeach; ?>
            </div>

            <section class="relative mt-12 overflow-hidden rounded-3xl border border-brand/10 bg-gradient-to-br from-[#fff7f5] via-white to-[#f7f7f5] p-6 shadow-sm sm:mt-14 sm:p-8 lg:mt-16 lg:p-12">
                <div class="pointer-events-none absolute -right-20 -top-20 size-64 rounded-full bg-brand/5 blur-3xl" aria-hidden="true"></div>
                <div class="relative grid gap-10 lg:grid-cols-[minmax(0,1.15fr)_minmax(320px,.85fr)] lg:items-center lg:gap-14">
                    <div>
                        <p class="text-xs font-bold uppercase tracking-[.18em] text-brand sm:text-sm"><?php echo esc_html(txa_f('pricing_setup_eyebrow', 'Get started with confidence')); ?></p>
                        <h2 class="mt-3 [font-family:'Hanken_Grotesk',sans-serif] text-3xl font-bold leading-tight text-[#151c27] sm:text-4xl"><?php echo esc_html(txa_f('pricing_setup_heading', 'Set up and Training')); ?></h2>
                        <p class="mt-4 max-w-[680px] text-base leading-7 text-mid-gray sm:text-lg sm:leading-8"><?php echo esc_html(txa_f('pricing_setup_copy', 'Every package includes a structured onboarding phase so your team and suppliers are ready to use the platform with confidence. We help prepare the system, organise the initial data and guide your destination team through the rollout.')); ?></p>

                        <div class="mt-8 grid gap-4 sm:grid-cols-3">
                            <?php foreach ($setup_cards as $card): ?>
                                <article class="rounded-2xl border border-brand/10 bg-white p-5 shadow-sm">
                                    <span class="flex size-11 items-center justify-center rounded-xl bg-brand-tint text-xl text-brand"><i class="bi <?php echo esc_attr($card['icon']); ?>" aria-hidden="true"></i></span>
                                    <h3 class="mt-4 text-base font-bold text-[#151c27]"><?php echo esc_html($card['title']); ?></h3>
                                    <p class="mt-1 text-sm leading-5 text-mid-gray"><?php echo esc_html($card['copy']); ?></p>
                                </article>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <div class="rounded-3xl border border-brand/15 bg-white p-6 shadow-[0_20px_45px_-28px_rgba(20,20,20,.35)] sm:p-8">
                        <div class="flex items-start gap-4">
                            <span class="flex size-12 shrink-0 items-center justify-center rounded-2xl bg-brand text-xl text-white"><i class="bi <?php echo esc_attr(txa_f('pricing_charge_icon', 'bi-credit-card')); ?>" aria-hidden="true"></i></span>
                            <div>
                                <p class="text-xs font-bold uppercase tracking-[.14em] text-mid-gray"><?php echo esc_html(txa_f('pricing_charge_eyebrow', 'Small One-time charge')); ?></p>
                                <p class="mt-2 [font-family:'Hanken_Grotesk',sans-serif] text-xl font-semibold leading-7 text-[#151c27]"><?php echo esc_html(txa_f('pricing_charge_title', 'Applied to all new package implementations')); ?></p>
                            </div>
                        </div>
                        <div class="mt-6 border-t border-line pt-6">
                            <p class="text-sm leading-6 text-mid-gray"><?php echo esc_html(txa_f('pricing_charge_copy', 'Covers the initial setup, configuration, data preparation and onboarding support required to get your destination live.')); ?></p>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </section>
</article>
<?php get_footer();
