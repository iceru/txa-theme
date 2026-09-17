<?php

if (is_file(__DIR__.'/vendor/autoload_packages.php')) {
    require_once __DIR__.'/vendor/autoload_packages.php';
}

function tailpress(): TailPress\Framework\Theme
{
    return TailPress\Framework\Theme::instance()
        ->assets(fn($manager) => $manager
            ->withCompiler(new TailPress\Framework\Assets\ViteCompiler, fn($compiler) => $compiler
                ->registerAsset('resources/css/app.css')
                ->registerAsset('resources/js/app.js')
                ->editorStyleFile('resources/css/editor-style.css')
            )
            ->enqueueAssets()
        )
        ->features(fn($manager) => $manager->add(TailPress\Framework\Features\MenuOptions::class))
        ->menus(fn($manager) => $manager->add('primary', __( 'Primary Menu', 'tailpress')))
        ->themeSupport(fn($manager) => $manager->add([
            'title-tag',
            'custom-logo',
            'post-thumbnails',
            'align-wide',
            'wp-block-styles',
            'responsive-embeds',
            'html5' => [
                'search-form',
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
            ]
        ]));
}

tailpress();

// TailPress enqueues the Vite entry as tailpress-app; its dev-server module filter misses that handle.
add_filter('script_loader_tag', function (string $tag, string $handle, string $src): string {
    if ('tailpress-app' === $handle && str_contains($src, '/resources/js/app.js')) {
        $tag = preg_replace("/\s+type=(?:\"[^\"]*\"|'[^']*')/i", '', $tag, 1);
        return preg_replace('/<script\b/i', '<script type="module"', $tag, 1);
    }

    return $tag;
}, 10, 3);

add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style(
        'bootstrap-icons',
        'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css',
        [],
        '1.11.3'
    );
});

/**
 * Keep unfinished internal CTA routes as placeholders until their final URLs are available.
 * This lets templates keep descriptive route names without sending visitors to 404 pages.
 */
add_filter('home_url', function (string $url, string $path): string {
    $placeholder_paths = [
        '/apply-now/',
        '/request-demo/',
        '/destinations/request-demo/',
        '/distributors/apply/',
        '/booking-systems/partner-enquiry/',
        '/register-your-interest/',
    ];

    $normalized_path = '/' . trim($path, '/') . '/';

    return in_array($normalized_path, $placeholder_paths, true) ? '#' : $url;
}, 10, 2);

if (!function_exists('txa_article_reading_time')) {
    /**
     * Estimate an article's reading time at 200 words per minute.
     */
    function txa_article_reading_time(int $post_id = 0): int
    {
        $post = get_post($post_id ?: get_the_ID());

        if (!$post) {
            return 1;
        }

        $content = strip_shortcodes($post->post_content);
        $content = wp_strip_all_tags($content);
        preg_match_all('/[\p{L}\p{N}\x{2019}\']+/u', html_entity_decode($content, ENT_QUOTES, get_bloginfo('charset')), $words);
        $word_count = count($words[0]);

        return max(1, (int) ceil($word_count / 200));
    }
}

if (!function_exists('txa_article_image_url')) {
    /**
     * Return a post image or a consistent local fallback.
     */
    function txa_article_image_url(int $post_id, string $size = 'large'): string
    {
        return get_the_post_thumbnail_url($post_id, $size)
            ?: get_theme_file_uri('/images/hero-homepage.jpg');
    }
}
