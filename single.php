<?php
/**
 * Single article template.
 *
 * @package TailPress
 */

get_header();

$posts_page_id = (int) get_option('page_for_posts');
$blog_page = $posts_page_id ? get_post($posts_page_id) : get_page_by_path('blog');
$blog_page_url = $blog_page ? get_permalink($blog_page) : home_url('/blog/');
?>

<?php if (have_posts()): ?>
    <?php while (have_posts()):
        the_post();
        $article_id = get_the_ID();
        $article_categories = get_the_category($article_id);
        $article_category = $article_categories ? $article_categories[0]->name : 'News';
        $related_articles = new WP_Query([
            'post_type' => 'post',
            'post_status' => 'publish',
            'posts_per_page' => 3,
            'post__not_in' => [$article_id],
            'ignore_sticky_posts' => true,
        ]); ?>

        <article id="post-<?php the_ID(); ?>"
            <?php post_class("bg-white text-near-black [font-family:'Source_Sans_Pro',sans-serif]"); ?>>
            <header class="bg-surface px-4 py-12 sm:py-16 lg:px-16 lg:py-20">
                <div class="mx-auto max-w-[980px] text-center">
                    <a href="<?php echo esc_url($blog_page_url); ?>"
                        class="inline-flex items-center gap-2 text-sm font-bold uppercase tracking-wide text-brand !no-underline">
                        <i class="bi bi-arrow-left" aria-hidden="true"></i> Back to blog
                    </a>
                    <p class="mt-7 text-sm font-bold uppercase tracking-wide text-brand">
                        <?php echo esc_html($article_category); ?>
                    </p>
                    <h1
                        class="mx-auto mt-3 max-w-[920px] [font-family:'Hanken_Grotesk',sans-serif] text-[36px] font-bold leading-[1.12] tracking-[-.025em] text-[#151c27] sm:text-5xl lg:text-[56px]">
                        <?php the_title(); ?>
                    </h1>
                    <?php if (has_excerpt()): ?>
                        <p class="mx-auto mt-6 max-w-[760px] text-lg leading-8 text-mid-gray sm:text-xl">
                            <?php echo esc_html(get_the_excerpt()); ?>
                        </p>
                    <?php endif; ?>
                    <div class="mt-7 flex flex-wrap items-center justify-center gap-x-5 gap-y-2 text-sm text-mid-gray">
                        <time datetime="<?php echo esc_attr(get_the_date('c')); ?>" itemprop="datePublished"
                            class="inline-flex items-center gap-2"><i class="bi bi-calendar3 text-brand"
                                aria-hidden="true"></i><?php echo esc_html(get_the_date('j F Y')); ?></time>
                        <span class="inline-flex items-center gap-2"><i class="bi bi-clock text-brand"
                                aria-hidden="true"></i><?php echo esc_html(txa_article_reading_time($article_id)); ?> min read</span>
                        <span class="inline-flex items-center gap-2"><i class="bi bi-person text-brand"
                                aria-hidden="true"></i><?php echo esc_html(get_the_author()); ?></span>
                    </div>
                </div>
            </header>

            <?php if (has_post_thumbnail()): ?>
            <div class="px-4 pt-8 sm:pt-10 lg:px-16 lg:pt-12">
                <div class="mx-auto max-w-[1312px] overflow-hidden rounded-2xl bg-surface shadow-sm">
                    <img src="<?php echo esc_url(get_the_post_thumbnail_url($article_id, 'full')); ?>"
                        alt="<?php echo esc_attr(get_the_title()); ?>"
                        class="aspect-[16/7] min-h-[260px] w-full object-cover sm:min-h-[360px]">
                </div>
            </div>
            <?php endif; ?>

            <div class="px-4 py-12 sm:py-16 lg:px-16 lg:py-20">
                <div class="entry-content mx-auto max-w-[800px] text-[#2d2d2d]">
                    <?php the_content(); ?>
                    <?php wp_link_pages(); ?>
                </div>
                <div class="mx-auto mt-12 flex max-w-[800px] flex-col gap-4 border-t border-line pt-8 sm:flex-row sm:justify-between">
                    <?php $older_post = get_previous_post(); $newer_post = get_next_post(); ?>
                    <?php if ($older_post): ?>
                        <a href="<?php echo esc_url(get_permalink($older_post)); ?>" class="max-w-sm text-sm font-semibold text-brand !no-underline hover:text-brand-dark">← Previous post<br><span class="mt-1 block text-base text-near-black"><?php echo esc_html(get_the_title($older_post)); ?></span></a>
                    <?php endif; ?>
                    <?php if ($newer_post): ?>
                        <a href="<?php echo esc_url(get_permalink($newer_post)); ?>" class="max-w-sm text-sm font-semibold text-brand !no-underline hover:text-brand-dark sm:ml-auto sm:text-right">Next post →<br><span class="mt-1 block text-base text-near-black"><?php echo esc_html(get_the_title($newer_post)); ?></span></a>
                    <?php endif; ?>
                </div>
            </div>
        </article>

        <?php if ($related_articles->have_posts()): ?>
            <section class="bg-surface px-4 py-12 sm:py-16 lg:px-16 lg:py-20">
                <div class="mx-auto max-w-[1312px]">
                    <div class="flex flex-col gap-3 sm:flex-row sm:items-end sm:justify-between">
                        <div>
                            <p class="text-xs font-bold uppercase tracking-wide text-brand">Continue reading</p>
                            <h2
                                class="mt-2 [font-family:'Hanken_Grotesk',sans-serif] text-3xl font-bold text-[#151c27] sm:text-4xl">
                                More from the blog</h2>
                        </div>
                        <a href="<?php echo esc_url($blog_page_url); ?>"
                            class="inline-flex items-center gap-2 font-semibold text-brand !no-underline">View all posts
                            <span aria-hidden="true">→</span></a>
                    </div>
                    <div class="mt-8 grid gap-6 md:grid-cols-2 xl:grid-cols-3">
                        <?php while ($related_articles->have_posts()):
                            $related_articles->the_post();
                            get_template_part('template-parts/article-card', null, ['post' => get_post()]);
                        endwhile; ?>
                    </div>
                </div>
            </section>
        <?php endif; ?>
        <?php wp_reset_postdata(); ?>
    <?php endwhile; ?>
<?php endif; ?>

<?php get_footer();
