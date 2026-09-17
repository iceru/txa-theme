<?php
/**
 * Blog index template, shared by the posts page and the Blog page template.
 *
 * @package TailPress
 */

add_filter('pre_get_document_title', fn(): string => 'Blog | Tourism Exchange Australia');

get_header();

$featured_query = new WP_Query([
    'post_type' => 'post',
    'post_status' => 'publish',
    'posts_per_page' => 4,
    'ignore_sticky_posts' => true,
]);
$featured_posts = $featured_query->posts;
$featured_ids = wp_list_pluck($featured_posts, 'ID');
$paged = max(1, (int) get_query_var('paged'), (int) get_query_var('page'));
$articles_query = new WP_Query([
    'post_type' => 'post',
    'post_status' => 'publish',
    'posts_per_page' => 9,
    'post__not_in' => $featured_ids,
    'paged' => $paged,
    'ignore_sticky_posts' => true,
]);
?>

<article class="bg-white text-near-black [font-family:'Source_Sans_Pro',sans-serif]">
    <section class="bg-surface px-4 py-12 sm:py-16 lg:px-16 lg:py-20">
        <div class="mx-auto max-w-[1312px]">
            <p class="text-sm font-bold uppercase tracking-wide text-brand">TXA Blog</p>
            <div class="mt-3 grid gap-5 lg:grid-cols-[1fr_480px] lg:items-end lg:gap-12">
                <h1
                    class="max-w-[760px] [font-family:'Hanken_Grotesk',sans-serif] text-4xl font-bold leading-tight tracking-[-.02em] text-[#151c27] sm:text-5xl">
                    Ideas for a more connected tourism industry</h1>
                <p class="max-w-[540px] text-base leading-7 text-mid-gray sm:text-lg">Explore practical perspectives on
                    connected tourism, destination technology, distribution and the Australian visitor economy.</p>
            </div>
        </div>
    </section>

    <?php if ($featured_posts && 1 === $paged):
        $lead_article = $featured_posts[0];
        $lead_categories = get_the_category($lead_article->ID);
        $lead_category = $lead_categories ? $lead_categories[0]->name : 'News'; ?>
        <section class="px-4 py-12 sm:py-14 lg:px-16 lg:py-20">
            <div class="mx-auto max-w-[1312px]">
                <div class="mb-7 flex items-center gap-3">
                    <span class="h-px w-8 bg-brand" aria-hidden="true"></span>
                    <h2 class="text-sm font-bold uppercase tracking-wide text-[#151c27]">Featured story</h2>
                </div>
                <div class="grid gap-6 lg:grid-cols-[minmax(0,1.45fr)_minmax(340px,0.8fr)] lg:gap-8">
                    <article class="group overflow-hidden rounded-2xl bg-near-black text-white shadow-xl">
                        <a href="<?php echo esc_url(get_permalink($lead_article)); ?>"
                            class="relative block min-h-[460px] overflow-hidden !no-underline sm:min-h-[540px]">
                            <img src="<?php echo esc_url(txa_article_image_url($lead_article->ID, 'full')); ?>" alt=""
                                class="absolute inset-0 h-full w-full object-cover transition duration-700 group-hover:scale-105">
                            <span class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/35 to-black/5"
                                aria-hidden="true"></span>
                            <div class="absolute inset-x-0 bottom-0 z-10 p-6 sm:p-9 lg:p-10">
                                <div class="flex flex-wrap items-center gap-3 text-xs font-bold uppercase tracking-wide">
                                    <span class="rounded-md bg-brand px-3 py-1.5 text-white"><?php echo esc_html($lead_category); ?></span>
                                    <time datetime="<?php echo esc_attr(get_the_date('c', $lead_article)); ?>"
                                        class="text-white/80"><?php echo esc_html(get_the_date('j M Y', $lead_article)); ?></time>
                                    <span class="text-white/80"><?php echo esc_html(txa_article_reading_time($lead_article->ID)); ?> min read</span>
                                </div>
                                <h2
                                    class="mt-4 max-w-[760px] [font-family:'Hanken_Grotesk',sans-serif] text-3xl font-semibold leading-tight text-white sm:text-4xl">
                                    <?php echo esc_html(get_the_title($lead_article)); ?></h2>
                                <p class="mt-4 max-w-[680px] text-sm leading-6 text-white/85 sm:text-base">
                                    <?php echo esc_html(wp_trim_words(get_the_excerpt($lead_article), 28)); ?>
                                </p>
                            </div>
                        </a>
                    </article>

                    <div class="grid gap-4 sm:grid-cols-3 lg:grid-cols-1">
                        <?php foreach (array_slice($featured_posts, 1, 3) as $article):
                            $categories = get_the_category($article->ID);
                            $category = $categories ? $categories[0]->name : 'News'; ?>
                            <article
                                class="group grid min-h-[150px] grid-cols-[120px_1fr] overflow-hidden rounded-2xl border border-line bg-white shadow-sm sm:grid-cols-1 lg:grid-cols-[150px_1fr]">
                                <a href="<?php echo esc_url(get_permalink($article)); ?>"
                                    class="block h-full overflow-hidden !no-underline">
                                    <img src="<?php echo esc_url(txa_article_image_url($article->ID, 'medium_large')); ?>"
                                        alt="" class="h-full min-h-[150px] w-full object-cover transition duration-500 group-hover:scale-105">
                                </a>
                                <div class="flex min-w-0 flex-col justify-center p-4 sm:p-5">
                                    <p class="text-[11px] font-bold uppercase tracking-wide text-brand"><?php echo esc_html($category); ?></p>
                                    <h3
                                        class="mt-2 [font-family:'Hanken_Grotesk',sans-serif] text-base font-semibold leading-5 text-[#151c27] sm:text-lg sm:leading-6">
                                        <a href="<?php echo esc_url(get_permalink($article)); ?>"
                                            class="text-inherit !no-underline group-hover:text-brand"><?php echo esc_html(get_the_title($article)); ?></a>
                                    </h3>
                                    <p class="mt-3 text-xs text-mid-gray"><?php echo esc_html(get_the_date('j M Y', $article)); ?> ·
                                        <?php echo esc_html(txa_article_reading_time($article->ID)); ?> min read</p>
                                </div>
                            </article>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php if ($articles_query->have_posts() || !$featured_posts || $paged > 1): ?>
    <section class="bg-surface px-4 py-12 sm:py-16 lg:px-16 lg:py-20">
        <div class="mx-auto max-w-[1312px]">
            <div class="flex items-end justify-between gap-6">
                <div>
                    <p class="text-xs font-bold uppercase tracking-wide text-brand">Stay informed</p>
                    <h2
                        class="mt-2 [font-family:'Hanken_Grotesk',sans-serif] text-3xl font-bold text-[#151c27] sm:text-4xl">
                        <?php echo 1 === $paged ? 'Latest stories' : 'Blog stories'; ?></h2>
                </div>
            </div>

            <?php if ($articles_query->have_posts()): ?>
                <div class="mt-8 grid gap-6 md:grid-cols-2 xl:grid-cols-3">
                    <?php while ($articles_query->have_posts()):
                        $articles_query->the_post();
                        get_template_part('template-parts/article-card', null, ['post' => get_post()]);
                    endwhile; ?>
                </div>
                <?php if ($articles_query->max_num_pages > 1): ?>
                    <?php
                    $last_page = (int) $articles_query->max_num_pages;
                    $page_numbers = array_unique(array_merge(
                        [1, $last_page],
                        range(max(1, $paged - 1), min($last_page, $paged + 1))
                    ));
                    sort($page_numbers);
                    $previous_number = 0;
                    ?>
                    <nav class="mt-10 flex flex-wrap items-center justify-center gap-2" aria-label="Blog pages">
                        <?php if ($paged > 1): ?>
                            <a href="<?php echo esc_url(get_pagenum_link($paged - 1)); ?>" class="inline-flex min-h-10 items-center rounded-lg border border-line bg-white px-4 font-semibold text-near-black !no-underline hover:border-brand hover:text-brand">← Previous</a>
                        <?php endif; ?>
                        <?php foreach ($page_numbers as $page_number): ?>
                            <?php if ($previous_number && $page_number > $previous_number + 1): ?>
                                <span class="px-2 text-mid-gray" aria-hidden="true">…</span>
                            <?php endif; ?>
                            <a href="<?php echo esc_url(get_pagenum_link($page_number)); ?>"
                                class="inline-flex size-10 items-center justify-center rounded-lg border font-semibold !no-underline <?php echo $page_number === $paged ? 'border-brand bg-brand text-white' : 'border-line bg-white text-near-black hover:border-brand hover:text-brand'; ?>"
                                <?php if ($page_number === $paged): ?>aria-current="page"<?php endif; ?>><?php echo esc_html($page_number); ?></a>
                            <?php $previous_number = $page_number; ?>
                        <?php endforeach; ?>
                        <?php if ($paged < $last_page): ?>
                            <a href="<?php echo esc_url(get_pagenum_link($paged + 1)); ?>" class="inline-flex min-h-10 items-center rounded-lg border border-line bg-white px-4 font-semibold text-near-black !no-underline hover:border-brand hover:text-brand">Next →</a>
                        <?php endif; ?>
                    </nav>
                <?php endif; ?>
            <?php else: ?>
                <div class="mt-8 rounded-2xl border border-line bg-white p-8 text-center text-mid-gray">
                    No blog posts are available yet.
                </div>
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>
        </div>
    </section>
    <?php endif; ?>
</article>

<?php get_footer();
