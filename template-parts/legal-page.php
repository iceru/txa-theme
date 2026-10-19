<?php
/**
 * Shared presentation for legal pages.
 *
 * @package TailPress
 */

$label = $args['label'] ?? 'LEGAL';
$title = $args['title'] ?? '';
$intro = $args['intro'] ?? '';
$body = $args['body'] ?? '';
?>
<article class="bg-white text-near-black [font-family:'Source_Sans_Pro',sans-serif]">
    <section class="bg-surface px-4 py-10 sm:py-12 lg:px-16 lg:py-24">
        <div class="mx-auto max-w-[1312px]">
            <p
                class="inline-flex w-fit max-w-full rounded-lg bg-brand px-4 py-2 text-sm font-bold leading-5 text-white sm:px-5 sm:py-3 sm:text-base">
                <?php echo esc_html($label); ?>
            </p>
            <h1
                class="mt-5 max-w-[900px] [font-family:'Hanken_Grotesk',sans-serif] text-3xl font-bold leading-[1.12] tracking-[-.02em] text-brand sm:mt-6 sm:text-4xl lg:mt-8 lg:text-5xl lg:leading-[60px]">
                <?php echo esc_html($title); ?>
            </h1>
            <?php if ($intro): ?>
                <p class="mt-5 max-w-[820px] text-base leading-7 text-mid-gray sm:mt-6 sm:text-lg lg:mt-8">
                    <?php echo esc_html($intro); ?>
                </p>
            <?php endif; ?>
        </div>
    </section>

    <section class="px-4 py-10 sm:py-12 lg:px-16 lg:py-16">
        <div
            class="mx-auto max-w-[960px] rounded-2xl border border-[#dfc0ba]/20 bg-white p-5 shadow-sm sm:p-8 lg:rounded-3xl lg:p-12">
            <div
                class="text-base leading-7 text-mid-gray [&_h2]:mt-12 [&_h2]:[font-family:'Hanken_Grotesk',sans-serif] [&_h2]:text-2xl [&_h2]:font-bold [&_h2]:leading-tight [&_h2]:text-brand [&_h2:first-child]:mt-0 [&_h3]:mt-6 [&_h3]:[font-family:'Hanken_Grotesk',sans-serif] [&_h3]:text-lg [&_h3]:font-bold [&_h3]:leading-tight [&_h3]:text-near-black [&_li]:mt-2 [&_li]:first:mt-0 [&_p]:mt-4 [&_p]:first:mt-0 [&_strong]:font-semibold [&_strong]:text-near-black [&_ul]:list-disc [&_ul]:pl-6">
                <?php echo wp_kses_post((string) $body); ?>
            </div>
        </div>
    </section>
</article>