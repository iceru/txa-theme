<?php
/**
 * Template Name: Data and Insights
 *
 * @package TailPress
 */

add_filter('pre_get_document_title', fn(): string => 'Data and Insights | Tourism Exchange Australia');
add_action('wp_head', function (): void {
    if (is_page_template('page-data-insights.php')) {
        echo '<meta name="description" content="' . esc_attr('Use TXA destination data, dashboards, attribution and exports to understand visitor engagement, supplier activity and campaign performance.') . '">' . "\n";
    }
});

get_header();

$demo_url = home_url('/request-demo/');
?>

<article class="bg-white text-near-black [font-family:'Source_Sans_Pro',sans-serif]">
    <section class="bg-surface px-4 py-12 sm:py-16 lg:px-16 lg:py-20 xl:py-24">
        <div class="mx-auto grid max-w-[1312px] items-center gap-10 md:grid-cols-2 md:gap-12 xl:gap-20">
            <div class="max-w-[650px] md:col-start-1 md:row-start-1">
                <p class="inline-flex w-fit max-w-full rounded-lg bg-brand px-4 py-2 text-sm font-bold sm:px-5 sm:py-3 sm:text-base uppercase leading-5 text-white">
                    Data and Insights</p>
                <h1
                    class="mt-6 [font-family:'Hanken_Grotesk',sans-serif] text-[36px] font-bold leading-[1.15] tracking-[-.02em] text-[#151c27] sm:text-5xl lg:text-[44px] lg:leading-[1.12]">
                    Use <span class="text-brand">destination data</span> to plan and see what’s working and what’s not
                </h1>
                <p class="mt-6 max-w-[600px] text-base leading-7 text-mid-gray sm:text-lg sm:leading-8">TXA gives
                    destinations the capability to build useful analytics and consumer data sets. Dashboards,
                    attribution data and exports can help DMOs understand visitor engagement, supplier activity,
                    campaign ROI and the economic model of tourism.</p>
                <a href="<?php echo esc_url($demo_url); ?>"
                    class="mt-7 inline-flex min-h-12 w-full items-center justify-center rounded-lg bg-brand px-7 py-3 font-bold text-white !no-underline transition hover:bg-brand-dark sm:w-auto">Request
                    a demo</a>
            </div>

            <div class="flex items-center justify-center md:col-start-2 md:row-start-1 md:justify-end">
                <img src="<?php echo esc_url(get_theme_file_uri('/images/dashboard-2.png')); ?>"
                    alt="Destination website displayed on a laptop" class="h-auto w-full max-w-[680px] object-contain">
            </div>
        </div>
    </section>

    <section class="px-4 py-14 sm:py-16 lg:px-16 lg:py-24">
        <div class="mx-auto max-w-[1312px]">
            <div class="text-center">
                <h2
                    class="[font-family:'Hanken_Grotesk',sans-serif] text-3xl font-bold leading-tight tracking-[-.01em] text-[#151c27] sm:text-4xl">
                    Comprehensive Data Capabilities</h2>
                <p class="mx-auto mt-3 max-w-[700px] text-base leading-7 text-mid-gray">DMOs need evidence of
                    marketing ROI, supplier engagement and local economic impact, but often lack real-time performance
                    data.</p>
            </div>

            <div class="mt-10 grid gap-5 sm:mt-12 sm:gap-6 lg:grid-cols-3">
                <article
                    class="overflow-hidden rounded-2xl border border-line bg-white p-6 shadow-sm sm:p-8 lg:col-span-2">
                    <div class="flex h-full flex-col gap-8 md:flex-row md:items-center">
                        <div class="w-full md:w-1/2">
                            <span
                                class="flex size-12 items-center justify-center rounded-xl bg-brand-tint text-xl text-brand">
                                <i class="bi bi-grid" aria-hidden="true"></i>
                            </span>
                            <h3
                                class="mt-5 [font-family:'Hanken_Grotesk',sans-serif] text-xl font-semibold text-[#151c27] sm:text-2xl">
                                Real-time Dashboard Display</h3>
                            <p class="mt-4 text-sm leading-6 text-mid-gray sm:text-base">Monitor key industry metrics as
                                they happen. Visualise visitor flow, booking surges and market shifts through a dynamic
                                interface designed for DMO decision makers.</p>
                            <ul class="mt-5 space-y-2 text-sm text-mid-gray">
                                <li class="flex items-center gap-2"><i class="bi bi-check-circle text-brand"
                                        aria-hidden="true"></i><span>Dynamic metric tracking</span></li>
                                <li class="flex items-center gap-2"><i class="bi bi-check-circle text-brand"
                                        aria-hidden="true"></i><span>Visual trend analysis</span></li>
                            </ul>
                        </div>
                        <div class="w-full md:w-1/2">
                            <img src="<?php echo esc_url(get_theme_file_uri('/images/dashboard.png')); ?>"
                                alt="Tourism products displayed on an interactive destination map"
                                class="h-auto w-full object-cover">
                        </div>
                    </div>
                </article>

                <article class="flex flex-col rounded-2xl bg-brand p-6 text-white shadow-sm sm:p-8">
                    <span class="flex size-12 items-center justify-center rounded-xl bg-white/15 text-xl text-white">
                        <i class="bi bi-file-earmark-arrow-down" aria-hidden="true"></i>
                    </span>
                    <h3 class="mt-5 [font-family:'Hanken_Grotesk',sans-serif] text-xl font-semibold sm:text-2xl">Export
                        Power</h3>
                    <p class="mt-4 text-sm leading-6 text-white/90 sm:text-base">Take your data anywhere. Export booking
                        and consumer metrics into Excel or XML formats for deep internal auditing or offline
                        presentation.</p>
                    <div class="mt-auto flex flex-wrap gap-3 pt-6">
                        <?php foreach (['XLSX', 'XML', 'JSON'] as $format): ?>
                            <span
                                class="rounded-md border border-white/20 bg-white/10 px-4 py-1.5 text-xs font-bold text-white"><?php echo esc_html($format); ?></span>
                        <?php endforeach; ?>
                    </div>
                </article>

                <article class="rounded-2xl border border-line bg-white p-6 shadow-sm sm:p-8">
                    <span class="flex size-12 items-center justify-center rounded-xl bg-brand-tint text-xl text-brand">
                        <i class="bi bi-arrows-fullscreen" aria-hidden="true"></i>
                    </span>
                    <h3
                        class="mt-5 [font-family:'Hanken_Grotesk',sans-serif] text-xl font-semibold text-[#151c27] sm:text-2xl">
                        Information API</h3>
                    <p class="mt-4 text-sm leading-6 text-mid-gray sm:text-base">Directly pipe your TXA data into
                        existing CRM or BI tools. Our robust Information API supports complex integrations for
                        enterprise-level automation.</p>
                </article>

                <article class="rounded-2xl border border-line bg-white p-6 shadow-sm sm:p-8">
                    <span class="flex size-12 items-center justify-center rounded-xl bg-brand-tint text-xl text-brand">
                        <i class="bi bi-megaphone" aria-hidden="true"></i>
                    </span>
                    <h3
                        class="mt-5 [font-family:'Hanken_Grotesk',sans-serif] text-xl font-semibold text-[#151c27] sm:text-2xl">
                        Campaign Attribution</h3>
                    <p class="mt-4 text-sm leading-6 text-mid-gray sm:text-base">Close the loop on marketing spend. Use
                        unique attribution codes to track exactly which campaigns triggered bookings and visitor
                        growth.</p>
                </article>

                <article class="rounded-2xl bg-brand p-6 text-white shadow-sm sm:p-8">
                    <span class="flex size-12 items-center justify-center rounded-xl bg-white/15 text-xl text-white">
                        <i class="bi bi-shield-check" aria-hidden="true"></i>
                    </span>
                    <h3 class="mt-5 [font-family:'Hanken_Grotesk',sans-serif] text-xl font-semibold sm:text-2xl">Secure
                        Governance</h3>
                    <p class="mt-4 text-sm leading-6 text-white/90 sm:text-base">Enterprise-grade privacy. We ensure all
                        data access adheres to strict privacy, consent and governance rules to protect industry
                        participants.</p>
                </article>
            </div>
        </div>
    </section>
</article>

<?php get_footer();
