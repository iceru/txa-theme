<?php
/**
 * Shared presentation for legal pages.
 *
 * @package TailPress
 */

$label = $args['label'] ?? 'LEGAL';
$title = $args['title'] ?? '';
$intro = $args['intro'] ?? '';
$sections = $args['sections'] ?? [];
?>
<article class="bg-white text-near-black [font-family:'Source_Sans_Pro',sans-serif]">
    <section class="bg-surface px-4 py-10 sm:py-12 lg:px-16 lg:py-24">
        <div class="mx-auto max-w-[1312px]">
            <p class="inline-flex w-fit max-w-full rounded-lg bg-brand px-4 py-2 text-sm font-bold leading-5 text-white sm:px-5 sm:py-3 sm:text-base">
                <?php echo esc_html($label); ?>
            </p>
            <h1 class="mt-5 max-w-[900px] [font-family:'Hanken_Grotesk',sans-serif] text-3xl font-bold leading-[1.12] tracking-[-.02em] text-[#151c27] sm:mt-6 sm:text-4xl lg:mt-8 lg:text-5xl lg:leading-[60px]">
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
        <div class="mx-auto max-w-[960px] rounded-2xl border border-[#dfc0ba]/20 bg-white p-5 shadow-sm sm:p-8 lg:rounded-3xl lg:p-12">
            <div class="space-y-10 sm:space-y-12">
                <?php foreach ($sections as $section): ?>
                    <section>
                        <h2 class="[font-family:'Hanken_Grotesk',sans-serif] text-2xl font-bold leading-tight text-[#151c27] sm:text-3xl">
                            <?php echo esc_html($section['title']); ?>
                        </h2>
                        <div class="mt-4 space-y-4 text-base leading-7 text-mid-gray sm:mt-5">
                            <?php foreach ($section['content'] as $item): ?>
                                <?php if ('list' === ($item['type'] ?? 'paragraph')): ?>
                                    <ul class="list-disc space-y-2 pl-6">
                                        <?php foreach ($item['items'] as $list_item): ?>
                                            <li><?php echo wp_kses_post($list_item); ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php else: ?>
                                    <p><?php echo wp_kses_post($item['text']); ?></p>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </section>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</article>
