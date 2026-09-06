<?php
/**
 * Template Name: Destination Microsite Campaigns
 *
 * @package TailPress
 */

get_header();

$demo_url = home_url('/request-demo/');

$tools = [
    [
        'icon' => 'bi-share',
        'title' => 'Feature local groups, events and themes',
        'copy' => 'Can activate all digital assets for conversion including social media content and feature specific supplier groups for seasonal, industry, or special interest tourism initiatives.',
        'image' => 'dashboard.png',
        'large' => true,
        'span' => 'lg:col-span-2',
    ],
    [
        'icon' => 'bi-qr-code',
        'title' => 'Encourage Supplier Connection',
        'copy' => 'Use widgets, QR codes and campaign pages to seamlessly connect physical audiences to bookable product.',
        'cta' => 'Learn about QR integration',
        'url' => home_url('/destinations/'),
    ],
    [
        'icon' => 'bi-person-check',
        'title' => 'Supplier Opt-in',
        'copy' => 'Encourage regional supplier participation around clear, high-impact campaign opportunities with ease.',
        'red' => true,
    ],
    [
        'icon' => 'bi-bullseye',
        'title' => 'Attribution Tracking',
        'copy' => 'Precisely track campaign attribution and booking outcomes. Introduce coupon or voucher-based initiatives to drive and measure results.',
        'checks' => ['Real-time data reporting', 'ROI analysis for stakeholders', 'Voucher performance tracking'],
        'span' => 'lg:col-span-2',
    ],
];
?>

<article class="bg-white text-near-black [font-family:'Source_Sans_Pro',sans-serif]">
    <section class="bg-surface px-4 py-14 sm:py-16 lg:px-16 lg:py-24">
        <div class="mx-auto grid max-w-[1312px] gap-10 lg:grid-cols-[1fr_600px] lg:items-center lg:gap-16">
            <div>
                <p class="inline-flex rounded-lg bg-brand px-5 py-3 text-xs font-bold uppercase text-white sm:text-sm">
                    Microsite Campaigns</p>
                <h1
                    class="mt-8 max-w-[660px] [font-family:'Hanken_Grotesk',sans-serif] text-[40px] font-bold leading-[1.18] text-[#151c27] sm:text-5xl lg:text-[44px] lg:leading-[1.15]">
                    Create tactical destination microsites that <span class="text-brand">motivate and convert</span>
                </h1>
                <p class="mt-6 max-w-[620px] text-lg leading-8 text-mid-gray">TXA can support campaign-specific
                    microsites for event, seasonal, industry group or special-interest tourism initiatives.</p>
                <a href="<?php echo esc_url($demo_url); ?>"
                    class="mt-8 inline-flex min-h-12 w-full items-center justify-center rounded-lg bg-brand px-7 py-3 text-base font-bold text-white !no-underline hover:bg-brand-dark sm:w-auto">Plan
                    a campaign microsite</a>
            </div>
            <div>
                <img src="<?php echo esc_url(get_theme_file_uri('/images/laptop-1.png')); ?>"
                    alt="Destination microsite shown on a laptop" class="mx-auto w-full max-w-[620px]">
            </div>
        </div>
    </section>

    <section class="px-4 py-16 sm:py-20 lg:px-16 lg:py-24">
        <div class="mx-auto max-w-[1312px]">
            <div class="text-center">
                <h2
                    class="[font-family:'Hanken_Grotesk',sans-serif] text-3xl font-bold leading-tight text-[#151c27] sm:text-4xl">
                    Powerful tools for conversion-led campaigns</h2>
                <span class="mx-auto mt-6 block h-1 w-24 rounded-full bg-brand" aria-hidden="true"></span>
            </div>

            <div class="mt-12 grid gap-6 lg:grid-cols-3">
                <?php foreach ($tools as $tool) { ?>
                    <article
                        class="<?php echo !empty($tool['red']) ? 'bg-brand text-white shadow-xl shadow-brand/20' : 'border border-[#dfc0ba] bg-white text-[#151c27] shadow-sm'; ?> rounded-2xl p-8 sm:p-10 <?php echo !empty($tool['span']) ? esc_attr($tool['span']) : ''; ?>">
                        <?php if (!empty($tool['large'])) { ?>
                            <div class="grid gap-8 lg:grid-cols-[1fr_1.1fr] lg:items-center">
                                <img src="<?php echo esc_url(get_theme_file_uri('/images/' . $tool['image'])); ?>"
                                    alt="TXA campaign analytics dashboard" class="w-full rounded-xl">
                                <div>
                                    <span
                                        class="flex size-12 items-center justify-center rounded-lg bg-brand-tint text-2xl text-brand">
                                        <i class="bi <?php echo esc_attr($tool['icon']); ?>" aria-hidden="true"></i>
                                    </span>
                                    <h3
                                        class="mt-8 [font-family:'Hanken_Grotesk',sans-serif] text-2xl font-bold text-[#151c27]">
                                        <?php echo esc_html($tool['title']); ?>
                                    </h3>
                                    <p class="mt-5 text-base leading-8 text-mid-gray"><?php echo esc_html($tool['copy']); ?></p>
                                </div>
                            </div>
                        <?php } else { ?>
                            <span
                                class="<?php echo !empty($tool['red']) ? 'bg-white/15 text-white' : 'bg-brand-tint text-brand'; ?> flex size-12 items-center justify-center rounded-lg text-2xl">
                                <i class="bi <?php echo esc_attr($tool['icon']); ?>" aria-hidden="true"></i>
                            </span>
                            <div
                                class="<?php echo !empty($tool['checks']) ? 'grid gap-8 lg:grid-cols-[1fr_1fr] lg:items-center' : ''; ?>">
                                <div>
                                    <h3
                                        class="mt-8 [font-family:'Hanken_Grotesk',sans-serif] text-2xl font-bold <?php echo !empty($tool['red']) ? 'text-white' : 'text-[#151c27]'; ?>">
                                        <?php echo esc_html($tool['title']); ?>
                                    </h3>
                                    <p
                                        class="mt-5 max-w-[560px] text-base leading-8 <?php echo !empty($tool['red']) ? 'text-white' : 'text-mid-gray'; ?>">
                                        <?php echo esc_html($tool['copy']); ?>
                                    </p>
                                </div>
                                <?php if (!empty($tool['checks'])) { ?>
                                    <ul class="mt-8 space-y-4 lg:mt-0">
                                        <?php foreach ($tool['checks'] as $check) { ?>
                                            <li class="flex items-center gap-3 text-sm font-semibold text-[#151c27]">
                                                <i class="bi bi-check-circle-fill text-brand" aria-hidden="true"></i>
                                                <?php echo esc_html($check); ?>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                <?php } ?>
                            </div>
                            <?php if (!empty($tool['cta']) && !empty($tool['url'])) { ?>
                                <div class="mt-10 border-t border-[#dfc0ba] pt-8">
                                    <a href="<?php echo esc_url($tool['url']); ?>"
                                        class="inline-flex items-center gap-2 text-base font-bold text-brand !no-underline"><?php echo esc_html($tool['cta']); ?>
                                        <i class="bi bi-box-arrow-up-right" aria-hidden="true"></i></a>
                                </div>
                            <?php } ?>
                        <?php } ?>
                    </article>
                <?php } ?>
            </div>
        </div>
    </section>
</article>

<?php get_footer(); ?>