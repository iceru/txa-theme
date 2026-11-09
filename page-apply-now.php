<?php
/**
 * Template Name: Apply Now
 * @package TailPress
 */

add_filter('pre_get_document_title', static function (string $title): string {
    return is_page_template('page-apply-now.php')
        ? (string) txa_f('apply_seo_title', get_the_title() . ' | TXA')
        : $title;
});

add_action('wp_head', static function (): void {
    if (is_page_template('page-apply-now.php')) {
        $description = txa_f('apply_seo_description', 'Apply to connect your business or booking system with Tourism Exchange Australia.');
        echo '<meta name="description" content="' . esc_attr($description) . '">' . "\n";
    }
});

get_header();
$is_landing = 'apply-now' === (string) get_post_field('post_name', get_the_ID());
$providers = [
    ['Become a Distributor', 'distributor-apply-now'],
    ['Apply for Bookeo', 'apply-now-for-bookeo'],
    ['Apply for Booking Boss', 'apply-now-for-booking-boss'],
    ['Apply for CustomLinc', 'apply-now-for-custom-linc'],
    ['Apply for Enta', 'apply-now-for-enta'],
    ['Apply for FareHarbor', 'apply-now-for-fareharbor'],
    ['Apply for Myfidelio', 'apply-now-for-myfidelio'],
    ['Apply for Newbook', 'apply-now-for-newbook'],
    ['Apply for ResOnline', 'apply-now-for-resonline'],
    ['Apply for Respax', 'apply-now-for-respax'],
    ['Apply for Rezdy', 'apply-now-for-rezdy'],
    ['Apply for RezExpert', 'apply-now-for-rezexpert'],
    ['Apply for RMS', 'apply-now-for-rms'],
    ['Apply for RoomMaster', 'apply-now-for-roommaster'],
    ['Apply for Seekom/iBex', 'apply-now-for-seekomibex'],
    ['Apply for SiteMinder', 'apply-now-for-siteminder'],
    ['Apply for Update 247', 'apply-now-for-update-247'],
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
        <section class="px-4 py-10 sm:py-14 lg:px-16 lg:py-16">
            <div class="mx-auto grid max-w-[1312px] items-start gap-8 lg:grid-cols-[minmax(0,1fr)_minmax(360px,520px)] lg:gap-12">
                <div class="txa-apply-content min-w-0 text-base leading-7 text-mid-gray">
                    <?php the_content(); ?>
                    <?php if (have_rows('apply_steps')): ?>
                        <div class="mt-8 space-y-6">
                            <?php while (have_rows('apply_steps')): the_row(); ?>
                                <section class="rounded-2xl border border-line bg-surface p-5 sm:p-6">
                                    <h2 class="[font-family:'Hanken_Grotesk',sans-serif] text-xl font-bold text-[#151c27] sm:text-2xl"><?php echo esc_html((string) get_sub_field('heading')); ?></h2>
                                    <div class="mt-3"><?php echo wp_kses_post((string) get_sub_field('copy')); ?></div>
                                    <?php if ($url = get_sub_field('button_url')): ?>
                                        <a href="<?php echo esc_url($url); ?>"<?php echo txa_target_attr(true, $url); ?> class="mt-5 inline-flex min-h-11 items-center justify-center rounded-lg bg-brand px-5 py-3 font-bold text-white !no-underline hover:bg-brand-dark"><?php echo esc_html((string) (get_sub_field('button_label') ?: 'Continue')); ?></a>
                                    <?php endif; ?>
                                </section>
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?>
                    <?php if ($notice = txa_f('apply_notice', '')): ?>
                        <aside class="mt-8 rounded-xl border border-brand/20 bg-brand-tint p-5 text-sm leading-6 text-near-black"><?php echo wp_kses_post($notice); ?></aside>
                    <?php endif; ?>
                </div>
                <section class="rounded-2xl border border-line bg-white p-5 shadow-sm sm:p-7 lg:rounded-3xl lg:p-8">
                    <h2 class="[font-family:'Hanken_Grotesk',sans-serif] text-2xl font-bold leading-tight text-[#151c27] sm:text-3xl"><?php echo esc_html(txa_f('apply_form_heading', 'Application Form')); ?></h2>
                    <div class="txa-contact-form mt-6 [&_input]:min-h-11 [&_input]:w-full [&_select]:min-h-11 [&_select]:w-full [&_textarea]:w-full sm:mt-8">
                        <?php echo txa_gravity_form_markup(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                    </div>
                </section>
            </div>
        </section>
    <?php endif; ?>
</article>
<?php get_footer(); ?>
