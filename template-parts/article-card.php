<?php
/**
 * Reusable article card.
 *
 * @package TailPress
 */

$article = isset($args['post']) ? get_post($args['post']) : get_post();

if (!$article) {
    return;
}

$article_categories = get_the_category($article->ID);
$article_category = $article_categories ? $article_categories[0]->name : 'News';
$article_excerpt = get_the_excerpt($article);
?>

<article class="group flex h-full flex-col overflow-hidden rounded-2xl border border-line bg-white shadow-sm transition hover:-translate-y-1 hover:shadow-lg">
    <a href="<?php echo esc_url(get_permalink($article)); ?>" class="block overflow-hidden !no-underline"
        aria-label="<?php echo esc_attr(sprintf('Read %s', get_the_title($article))); ?>">
        <img src="<?php echo esc_url(txa_article_image_url($article->ID, 'large')); ?>" alt=""
            class="aspect-[16/10] w-full object-cover transition duration-500 group-hover:scale-105" loading="lazy">
    </a>
    <div class="flex flex-1 flex-col p-5 sm:p-6">
        <div class="flex flex-wrap items-center gap-x-3 gap-y-1 text-xs font-semibold uppercase tracking-wide">
            <span class="text-brand"><?php echo esc_html($article_category); ?></span>
            <span class="text-mid-gray"><?php echo esc_html(get_the_date('j M Y', $article)); ?></span>
        </div>
        <h3
            class="mt-3 [font-family:'Hanken_Grotesk',sans-serif] text-xl font-semibold leading-7 text-[#151c27]">
            <a href="<?php echo esc_url(get_permalink($article)); ?>"
                class="text-inherit !no-underline group-hover:text-brand"><?php echo esc_html(get_the_title($article)); ?></a>
        </h3>
        <p class="mt-3 text-sm leading-6 text-mid-gray">
            <?php echo esc_html(wp_trim_words($article_excerpt, 22)); ?>
        </p>
        <div class="mt-auto flex items-center justify-between gap-4 pt-5 text-sm">
            <span class="inline-flex items-center gap-2 text-mid-gray"><i class="bi bi-clock" aria-hidden="true"></i>
                <?php echo esc_html(txa_article_reading_time($article->ID)); ?> min read</span>
            <span class="font-semibold text-brand" aria-hidden="true">Read article →</span>
        </div>
    </div>
</article>
