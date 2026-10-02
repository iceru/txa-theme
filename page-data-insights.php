<?php

/**
 * Template Name: Data and Insights
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

add_filter('pre_get_document_title', fn(): string => (string) txa_f('insights_seo_title', 'Data and Insights | Tourism Exchange Australia'));
add_action('wp_head', function (): void {
    if (is_page_template('page-data-insights.php')) {
        echo '<meta name="description" content="' . esc_attr(txa_f('insights_seo_description', 'Use TXA destination data, dashboards, attribution and exports to understand visitor engagement, supplier activity and campaign performance.')) . '">' . "\n";
    }
});

get_header();

$demo_url = txa_url('insights_hero_button_url', home_url('/contact'));

$dashboard_points = array_values(array_filter([
    txa_f('insights_dashboard_point_1', 'Dynamic metric tracking'),
    txa_f('insights_dashboard_point_2', 'Visual trend analysis'),
]));

$export_formats = array_values(array_filter([
    txa_f('insights_export_format_1', 'XLSX'),
    txa_f('insights_export_format_2', 'XML'),
    txa_f('insights_export_format_3', 'JSON'),
]));
?>

<article class="bg-white text-near-black [font-family:'Source_Sans_Pro',sans-serif]">
    <section class="bg-surface px-4 py-12 sm:py-16 lg:px-16 lg:py-20 xl:py-24">
        <div class="mx-auto grid max-w-[1312px] items-center gap-10 md:grid-cols-2 md:gap-12 xl:gap-20">
            <div class="max-w-[650px] md:col-start-1 md:row-start-1">
                <p class="inline-flex w-fit max-w-full rounded-lg bg-brand px-4 py-2 text-sm font-bold sm:px-5 sm:py-3 sm:text-base uppercase leading-5 text-white">
                    <?php echo esc_html(txa_f('insights_hero_label', 'Data and Insights')); ?></p>
                <h1
                    class="mt-6 [font-family:'Hanken_Grotesk',sans-serif] text-[36px] font-bold leading-[1.15] tracking-[-.02em] text-[#151c27] sm:text-5xl lg:text-[44px] lg:leading-[1.12]">
                    <?php echo esc_html(txa_f('insights_hero_title_start', 'Use')); ?> <span class="text-brand"><?php echo esc_html(txa_f('insights_hero_title_highlight', 'destination data')); ?></span> <?php echo esc_html(txa_f('insights_hero_title_end', 'to plan and see what’s working and what’s not')); ?>
                </h1>
                <p class="mt-6 max-w-[600px] text-base leading-7 text-mid-gray sm:text-lg sm:leading-8">
                    <?php echo esc_html(txa_f('insights_hero_copy', 'TXA gives destinations the capability to build useful analytics and consumer data sets. Dashboards, attribution data and exports can help DMOs understand visitor engagement, supplier activity, campaign ROI and the economic model of tourism.')); ?></p>
                <a href="<?php echo esc_url($demo_url); ?>"
                    class="mt-7 inline-flex min-h-12 w-full items-center justify-center rounded-lg bg-brand px-7 py-3 font-bold text-white !no-underline transition hover:bg-brand-dark sm:w-auto"><?php echo esc_html(txa_f('insights_hero_button_label', 'Request a demo')); ?></a>
            </div>

            <div class="flex items-center justify-center md:col-start-2 md:row-start-1 md:justify-end">
                <img src="<?php echo esc_url(txa_img('insights_hero_image', get_theme_file_uri('/images/dashboard-2.png'))); ?>"
                    alt="<?php echo esc_attr(txa_f('insights_hero_image_alt', 'Destination website displayed on a laptop')); ?>" class="h-auto w-full max-w-[680px] object-contain">
            </div>
        </div>
    </section>

    <section class="px-4 py-14 sm:py-16 lg:px-16 lg:py-24">
        <div class="mx-auto max-w-[1312px]">
            <div class="text-center">
                <h2
                    class="[font-family:'Hanken_Grotesk',sans-serif] text-3xl font-bold leading-tight tracking-[-.01em] text-[#151c27] sm:text-4xl">
                    <?php echo esc_html(txa_f('insights_capabilities_heading', 'Comprehensive Data Capabilities')); ?></h2>
                <p class="mx-auto mt-3 max-w-[700px] text-base leading-7 text-mid-gray">
                    <?php echo esc_html(txa_f('insights_capabilities_copy', 'DMOs need evidence of marketing ROI, supplier engagement and local economic impact, but often lack real-time performance data.')); ?></p>
            </div>

            <div class="mt-10 grid gap-5 sm:mt-12 sm:gap-6 lg:grid-cols-3">
                <article
                    class="overflow-hidden rounded-2xl border border-line bg-white p-6 shadow-sm sm:p-8 lg:col-span-2">
                    <div class="flex h-full flex-col gap-8 md:flex-row md:items-center">
                        <div class="w-full md:w-1/2">
                            <span
                                class="flex size-12 items-center justify-center rounded-xl bg-brand-tint text-xl text-brand">
                                <i class="bi <?php echo esc_attr(txa_f('insights_dashboard_icon', 'bi-grid')); ?>" aria-hidden="true"></i>
                            </span>
                            <h3
                                class="mt-5 [font-family:'Hanken_Grotesk',sans-serif] text-xl font-semibold text-[#151c27] sm:text-2xl">
                                <?php echo esc_html(txa_f('insights_dashboard_title', 'Real-time Dashboard Display')); ?></h3>
                            <p class="mt-4 text-sm leading-6 text-mid-gray sm:text-base"><?php echo esc_html(txa_f('insights_dashboard_copy', 'Monitor key industry metrics as they happen. Visualise visitor flow, booking surges and market shifts through a dynamic interface designed for DMO decision makers.')); ?></p>
                            <?php if (!empty($dashboard_points)): ?>
                                <ul class="mt-5 space-y-2 text-sm text-mid-gray">
                                    <?php foreach ($dashboard_points as $point): ?>
                                        <li class="flex items-center gap-2"><i class="bi bi-check-circle text-brand"
                                                aria-hidden="true"></i><span><?php echo esc_html($point); ?></span></li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        </div>
                        <div class="w-full md:w-1/2">
                            <img src="<?php echo esc_url(txa_img('insights_dashboard_image', get_theme_file_uri('/images/dashboard.png'))); ?>"
                                alt="<?php echo esc_attr(txa_f('insights_dashboard_image_alt', 'Tourism products displayed on an interactive destination map')); ?>"
                                class="h-auto w-full object-cover">
                        </div>
                    </div>
                </article>

                <article class="flex flex-col rounded-2xl bg-brand p-6 text-white shadow-sm sm:p-8">
                    <span class="flex size-12 items-center justify-center rounded-xl bg-white/15 text-xl text-white">
                        <i class="bi <?php echo esc_attr(txa_f('insights_export_icon', 'bi-file-earmark-arrow-down')); ?>" aria-hidden="true"></i>
                    </span>
                    <h3 class="mt-5 [font-family:'Hanken_Grotesk',sans-serif] text-xl font-semibold sm:text-2xl"><?php echo esc_html(txa_f('insights_export_title', 'Export Power')); ?></h3>
                    <p class="mt-4 text-sm leading-6 text-white/90 sm:text-base"><?php echo esc_html(txa_f('insights_export_copy', 'Take your data anywhere. Export booking and consumer metrics into Excel or XML formats for deep internal auditing or offline presentation.')); ?></p>
                    <div class="mt-auto flex flex-wrap gap-3 pt-6">
                        <?php foreach ($export_formats as $format): ?>
                            <span
                                class="rounded-md border border-white/20 bg-white/10 px-4 py-1.5 text-xs font-bold text-white"><?php echo esc_html($format); ?></span>
                        <?php endforeach; ?>
                    </div>
                </article>

                <article class="rounded-2xl border border-line bg-white p-6 shadow-sm sm:p-8">
                    <span class="flex size-12 items-center justify-center rounded-xl bg-brand-tint text-xl text-brand">
                        <i class="bi <?php echo esc_attr(txa_f('insights_api_icon', 'bi-arrows-fullscreen')); ?>" aria-hidden="true"></i>
                    </span>
                    <h3
                        class="mt-5 [font-family:'Hanken_Grotesk',sans-serif] text-xl font-semibold text-[#151c27] sm:text-2xl">
                        <?php echo esc_html(txa_f('insights_api_title', 'Information API')); ?></h3>
                    <p class="mt-4 text-sm leading-6 text-mid-gray sm:text-base"><?php echo esc_html(txa_f('insights_api_copy', 'Directly pipe your TXA data into existing CRM or BI tools. Our robust Information API supports complex integrations for enterprise-level automation.')); ?></p>
                </article>

                <article class="rounded-2xl border border-line bg-white p-6 shadow-sm sm:p-8">
                    <span class="flex size-12 items-center justify-center rounded-xl bg-brand-tint text-xl text-brand">
                        <i class="bi <?php echo esc_attr(txa_f('insights_campaign_icon', 'bi-megaphone')); ?>" aria-hidden="true"></i>
                    </span>
                    <h3
                        class="mt-5 [font-family:'Hanken_Grotesk',sans-serif] text-xl font-semibold text-[#151c27] sm:text-2xl">
                        <?php echo esc_html(txa_f('insights_campaign_title', 'Campaign Attribution')); ?></h3>
                    <p class="mt-4 text-sm leading-6 text-mid-gray sm:text-base"><?php echo esc_html(txa_f('insights_campaign_copy', 'Close the loop on marketing spend. Use unique attribution codes to track exactly which campaigns triggered bookings and visitor growth.')); ?></p>
                </article>

                <article class="rounded-2xl bg-brand p-6 text-white shadow-sm sm:p-8">
                    <span class="flex size-12 items-center justify-center rounded-xl bg-white/15 text-xl text-white">
                        <i class="bi <?php echo esc_attr(txa_f('insights_governance_icon', 'bi-shield-check')); ?>" aria-hidden="true"></i>
                    </span>
                    <h3 class="mt-5 [font-family:'Hanken_Grotesk',sans-serif] text-xl font-semibold sm:text-2xl"><?php echo esc_html(txa_f('insights_governance_title', 'Secure Governance')); ?></h3>
                    <p class="mt-4 text-sm leading-6 text-white/90 sm:text-base"><?php echo esc_html(txa_f('insights_governance_copy', 'Enterprise-grade privacy. We ensure all data access adheres to strict privacy, consent and governance rules to protect industry participants.')); ?></p>
                </article>
            </div>
        </div>
    </section>
</article>

<?php get_footer();
