<?php
/**
 * Template Name: Apply Now TXA
 * @package TailPress
 */

add_filter('pre_get_document_title', static function (string $title): string {
    return is_page_template('page-apply-now-txa.php')
        ? (string) txa_f('apply_seo_title', get_the_title() . ' | TXA')
        : $title;
});

add_action('wp_head', static function (): void {
    if (is_page_template('page-apply-now-txa.php')) {
        $description = txa_f('apply_seo_description', 'Apply to connect your business or booking system with Tourism Exchange Australia.');
        echo '<meta name="description" content="' . esc_attr($description) . '">' . "\n";
    }
});

get_header();
$is_landing = 'apply-now-txa' === (string) get_post_field('post_name', get_the_ID());
$providers = [
    ['Become a Distributor', 'distributor-apply-now-txa'],
    ['Apply for Bookeo', 'apply-now-for-bookeo-txa'],
    ['Apply for Booking Boss', 'apply-now-for-booking-boss-txa'],
    ['Apply for CustomLinc', 'apply-now-for-custom-linc-txa'],
    ['Apply for Enta', 'apply-now-for-enta-txa'],
    ['Apply for FareHarbor', 'apply-now-for-fareharbor-txa'],
    ['Apply for Myfidelio', 'apply-now-for-myfidelio-txa'],
    ['Apply for Newbook', 'apply-now-for-newbook-txa'],
    ['Apply for ResOnline', 'apply-now-for-resonline-txa'],
    ['Apply for Respax', 'apply-now-for-respax-txa'],
    ['Apply for Rezdy', 'apply-now-for-rezdy-txa'],
    ['Apply for RezExpert', 'apply-now-for-rezexpert-txa'],
    ['Apply for RMS', 'apply-now-for-rms-txa'],
    ['Apply for RoomMaster', 'apply-now-for-roommaster-txa'],
    ['Apply for Seekom/iBex', 'apply-now-for-seekomibex-txa'],
    ['Apply for SiteMinder', 'apply-now-for-siteminder-txa'],
    ['Apply for Update 247', 'apply-now-for-update-247-txa'],
];
?>
<article class="bg-white text-near-black [font-family:'Source_Sans_Pro',sans-serif]">
    <section class="bg-surface px-4 py-12 sm:py-16 lg:px-16 lg:py-20">
        <div class="mx-auto max-w-[1312px]">
            <p class="inline-flex w-fit rounded-lg bg-brand px-4 py-2 text-sm font-bold leading-5 text-white">
                <?php echo esc_html(txa_f('apply_hero_label', $is_landing ? 'GET CONNECTED WITH TXA' : 'TXA APPLICATION')); ?>
            </p>
            <h1 class="mt-5 max-w-4xl [font-family:'Hanken_Grotesk',sans-serif] text-3xl font-bold leading-tight text-[#151c27] sm:text-4xl lg:text-5xl">
                <?php the_title(); ?>
            </h1>
            <?php if ($intro = txa_f('apply_intro', '')): ?>
                <div class="txa-apply-intro mt-5 max-w-3xl text-base leading-7 text-mid-gray sm:text-lg">
                    <?php echo wp_kses_post($intro); ?>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <?php if ($is_landing): ?>
        <section class="px-4 py-10 sm:py-14 lg:px-16 lg:py-16">
            <div class="mx-auto max-w-[1312px]">
                <div class="mb-8 max-w-3xl text-base leading-7 text-mid-gray">
                    <?php the_content(); ?>
                </div>
                <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
                    <?php foreach ($providers as [$label, $slug]): ?>
                        <a href="<?php echo esc_url(home_url('/' . $slug . '/')); ?>" class="group rounded-2xl border border-line bg-white p-6 !no-underline shadow-sm transition hover:-translate-y-1 hover:border-brand/40 hover:shadow-lg">
                            <span class="flex size-11 items-center justify-center rounded-full bg-brand-tint text-brand"><i class="bi bi-arrow-up-right" aria-hidden="true"></i></span>
                            <span class="mt-4 block text-lg font-bold text-[#151c27] group-hover:text-brand"><?php echo esc_html($label); ?></span>
                            <span class="mt-2 block text-sm leading-6 text-mid-gray">View the application and submit your TXA connection details.</span>
                        </a>
                    <?php endforeach; ?>
                    <a href="https://www.rezobx.com/" target="_blank" rel="noopener noreferrer" class="group rounded-2xl border border-line bg-white p-6 !no-underline shadow-sm transition hover:-translate-y-1 hover:border-brand/40 hover:shadow-lg">
                        <span class="flex size-11 items-center justify-center rounded-full bg-brand-tint text-brand"><i class="bi bi-box-arrow-up-right" aria-hidden="true"></i></span>
                        <span class="mt-4 block text-lg font-bold text-[#151c27] group-hover:text-brand">Apply for Rezobx</span>
                        <span class="mt-2 block text-sm leading-6 text-mid-gray">Continue to the Rezobx application site.</span>
                    </a>
                </div>
            </div>
        </section>
    <?php else: ?>
        <section class="bg-surface/50 px-4 py-10 sm:py-14 lg:px-16 lg:py-16">
            <div class="mx-auto grid max-w-[1180px] items-start gap-8 lg:grid-cols-[minmax(280px,360px)_minmax(0,1fr)] lg:gap-10 xl:gap-14">
                <aside class="txa-apply-content min-w-0 lg:sticky lg:top-28">
                    <div class="rounded-3xl bg-[#151c27] p-6 text-white shadow-lg sm:p-8">
                        <span class="flex size-12 items-center justify-center rounded-full bg-brand text-xl text-white" aria-hidden="true">
                            <i class="bi bi-clipboard-check"></i>
                        </span>
                        <p class="mt-6 text-xs font-bold uppercase tracking-wide text-white/60">Your TXA connection</p>
                        <h2 class="mt-2 [font-family:'Hanken_Grotesk',sans-serif] text-2xl font-bold leading-tight text-white sm:text-3xl">Before you apply</h2>
                        <div class="txa-apply-copy mt-4 text-base leading-7 text-white/75">
                            <?php the_content(); ?>
                        </div>
                        <ul class="mt-7 space-y-4 text-sm leading-6 text-white/80" aria-label="Application checklist">
                            <li class="flex items-start gap-3">
                                <i class="bi bi-check-circle-fill mt-0.5 shrink-0 text-brand" aria-hidden="true"></i>
                                <span>Have your business and primary contact details ready.</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <i class="bi bi-check-circle-fill mt-0.5 shrink-0 text-brand" aria-hidden="true"></i>
                                <span>Review your information before submitting the form.</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <i class="bi bi-check-circle-fill mt-0.5 shrink-0 text-brand" aria-hidden="true"></i>
                                <span>The TXA team will contact you about the next steps.</span>
                            </li>
                        </ul>
                        <a href="<?php echo esc_url(home_url('/apply-now-txa/')); ?>" class="mt-8 inline-flex items-center gap-2 text-sm font-bold text-white !no-underline hover:text-brand">
                            <i class="bi bi-arrow-left" aria-hidden="true"></i>
                            View all applications
                        </a>
                    </div>
                    <?php $application_steps = function_exists('get_field') ? get_field('apply_steps') : []; ?>
                    <?php if (is_array($application_steps) && !empty($application_steps)): ?>
                        <div class="mt-6 space-y-4">
                            <?php foreach ($application_steps as $step): ?>
                                <section class="rounded-2xl border border-line bg-white p-5 shadow-sm sm:p-6">
                                    <h2 class="[font-family:'Hanken_Grotesk',sans-serif] text-xl font-bold text-[#151c27] sm:text-2xl"><?php echo esc_html((string) ($step['heading'] ?? '')); ?></h2>
                                    <div class="mt-3 text-sm leading-6 text-mid-gray"><?php echo wp_kses_post((string) ($step['copy'] ?? '')); ?></div>
                                    <?php if (!empty($step['button_url'])): ?>
                                        <a href="<?php echo esc_url($step['button_url']); ?>"<?php echo txa_target_attr(true, $step['button_url']); ?> class="mt-5 inline-flex min-h-11 w-full items-center justify-center rounded-lg bg-brand px-5 py-3 text-center font-bold text-white !no-underline hover:bg-brand-dark"><?php echo esc_html((string) (!empty($step['button_label']) ? $step['button_label'] : 'Continue')); ?></a>
                                    <?php endif; ?>
                                </section>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                    <?php if ($notice = txa_f('apply_notice', '')): ?>
                        <aside class="mt-8 rounded-xl border border-brand/20 bg-brand-tint p-5 text-sm leading-6 text-near-black"><?php echo wp_kses_post($notice); ?></aside>
                    <?php endif; ?>
                </aside>
                <section class="min-w-0 rounded-3xl border border-line bg-white p-5 shadow-sm sm:p-8 lg:p-10" aria-labelledby="txa-application-form-heading">
                    <p class="text-xs font-bold uppercase tracking-wide text-brand">Secure application</p>
                    <h2 id="txa-application-form-heading" class="mt-2 [font-family:'Hanken_Grotesk',sans-serif] text-2xl font-bold leading-tight text-[#151c27] sm:text-3xl"><?php echo esc_html(txa_f('apply_form_heading', 'Application Form')); ?></h2>
                    <p class="mt-3 max-w-2xl text-sm leading-6 text-mid-gray">Complete the details below to begin your connection with Tourism Exchange Australia.</p>
                    <div class="txa-contact-form mt-7 [&_input]:min-h-11 [&_input]:w-full [&_select]:min-h-11 [&_select]:w-full [&_textarea]:w-full sm:mt-9">
                        <?php echo txa_gravity_form_markup(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                    </div>
                </section>
            </div>
        </section>
    <?php endif; ?>
</article>
<?php get_footer(); ?>
