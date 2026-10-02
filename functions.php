<?php

if (is_file(__DIR__ . '/vendor/autoload_packages.php')) {
    require_once __DIR__ . '/vendor/autoload_packages.php';
}

function tailpress(): TailPress\Framework\Theme
{
    return TailPress\Framework\Theme::instance()
        ->assets(
            fn($manager) => $manager
                ->withCompiler(
                    new TailPress\Framework\Assets\ViteCompiler,
                    fn($compiler) => $compiler
                        ->registerAsset('resources/css/app.css')
                        ->registerAsset('resources/js/app.js')
                        ->editorStyleFile('resources/css/editor-style.css')
                )
                ->enqueueAssets()
        )
        ->features(fn($manager) => $manager->add(TailPress\Framework\Features\MenuOptions::class))
        ->menus(fn($manager) => $manager->add('primary', __('Primary Menu', 'tailpress')))
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

/**
 * Add a consistent SEO and entity layer when a dedicated SEO plugin is not
 * active. Page templates may keep their existing title and description tags;
 * this layer fills gaps and supplies social and structured metadata.
 */
function txa_seo_plugin_is_active(): bool
{
    return defined('WPSEO_VERSION')
        || defined('RANK_MATH_VERSION')
        || defined('AIOSEO_VERSION')
        || defined('THE_SEO_FRAMEWORK_VERSION')
        || class_exists('WPSEO_Options')
        || class_exists('RankMath\\Helper')
        || class_exists('AIOSEO\\Plugin\\Common\\Main');
}

function txa_seo_page_description(): string
{
    $template_fields = [
        'page-homepage.php' => ['hero_copy', 'TXA connects Australian tourism suppliers, destinations, distributors and booking systems so tourism products can be found, marketed, booked and measured online.'],
        'page-suppliers.php' => ['supplier_hero_copy', 'Connect Australian tourism products, rates and availability to destination websites, distributors and more online channels through TXA.'],
        'page-booking-systems.php' => ['booking_seo_description', 'Connect your booking system to Australia’s national tourism exchange and help operator customers access broader destination, distributor and trade channels.'],
        'page-destinations.php' => ['destination_seo_description', 'TXA helps destination organisations move from inspiration-only marketing to connected, bookable visitor outcomes through Smart Destination infrastructure.'],
        'page-distributors.php' => ['distributor_seo_description', 'TXA gives distributors unique access to bookable Australian tourism inventory through flexible commercial and technical distribution models.'],
    ];

    $template = (string) get_page_template_slug(get_queried_object_id());
    if (isset($template_fields[$template])) {
        [$field, $fallback] = $template_fields[$template];
        $value = function_exists('get_field') ? get_field($field, get_queried_object_id()) : '';
        return trim(wp_strip_all_tags((string) ($value ?: $fallback)));
    }

    $post = get_queried_object();
    if ($post instanceof WP_Post) {
        $excerpt = has_excerpt($post) ? get_the_excerpt($post) : $post->post_content;
        $excerpt = trim(preg_replace('/\\s+/', ' ', wp_strip_all_tags(strip_shortcodes($excerpt))));
        if ('' !== $excerpt) {
            return wp_trim_words($excerpt, 30, '…');
        }
    }

    return 'Tourism Exchange Australia connects tourism suppliers, destinations, distributors and booking systems through a shared tourism exchange.';
}

function txa_seo_metadata(): void
{
    if (is_admin() || is_feed() || is_404() || txa_seo_plugin_is_active()) {
        return;
    }

    $description = txa_seo_page_description();
    $title = wp_get_document_title();
    $url = is_singular() ? get_permalink() : home_url(add_query_arg([], $GLOBALS['wp']->request ?? ''));
    $image = is_singular() && has_post_thumbnail()
        ? get_the_post_thumbnail_url(get_queried_object_id(), 'large')
        : get_theme_file_uri('/images/hero-homepage.jpg');

    // These templates already print a description tag before this shared layer.
    $template = (string) get_page_template_slug(get_queried_object_id());
    $has_template_description = in_array($template, [
        'page-about.php',
        'page-faqs.php',
        'page-destinations.php',
        'page-distributors.php',
        'page-booking-systems.php',
    ], true) || is_page('faqs');

    if (!$has_template_description) {
        echo '<meta name="description" content="' . esc_attr($description) . '">' . "\n";
    }
    echo '<meta property="og:type" content="' . (is_singular('post') ? 'article' : 'website') . '">' . "\n";
    echo '<meta property="og:site_name" content="' . esc_attr(get_bloginfo('name') ?: 'Tourism Exchange Australia') . '">' . "\n";
    echo '<meta property="og:title" content="' . esc_attr($title) . '">' . "\n";
    echo '<meta property="og:description" content="' . esc_attr($description) . '">' . "\n";
    echo '<meta property="og:url" content="' . esc_url($url) . '">' . "\n";
    echo '<meta property="og:image" content="' . esc_url($image) . '">' . "\n";
    echo '<meta name="twitter:card" content="summary_large_image">' . "\n";
    echo '<meta name="twitter:title" content="' . esc_attr($title) . '">' . "\n";
    echo '<meta name="twitter:description" content="' . esc_attr($description) . '">' . "\n";

    $logo = get_theme_file_uri('/images/logo.png');
    $organization_id = trailingslashit(home_url('/')) . '#organization';
    $website_id = trailingslashit(home_url('/')) . '#website';
    $graph = [
        [
            '@type' => 'Organization',
            '@id' => $organization_id,
            'name' => 'Tourism Exchange Australia',
            'alternateName' => 'TXA',
            'url' => home_url('/'),
            'logo' => ['@type' => 'ImageObject', 'url' => $logo],
            'description' => 'Australia’s open B2B tourism exchange connecting suppliers, destinations, distributors and booking systems.',
        ],
        [
            '@type' => 'WebSite',
            '@id' => $website_id,
            'url' => home_url('/'),
            'name' => get_bloginfo('name') ?: 'Tourism Exchange Australia',
            'publisher' => ['@id' => $organization_id],
            'inLanguage' => get_bloginfo('language') ?: 'en-AU',
        ],
    ];

    if (is_singular()) {
        $page = get_queried_object();
        if ($page instanceof WP_Post) {
            $graph[] = [
                '@type' => is_singular('post') ? 'Article' : 'WebPage',
                '@id' => trailingslashit(get_permalink($page)) . '#webpage',
                'url' => get_permalink($page),
                'name' => $title,
                'description' => $description,
                'isPartOf' => ['@id' => $website_id],
                'publisher' => ['@id' => $organization_id],
                'inLanguage' => get_bloginfo('language') ?: 'en-AU',
                ...(is_singular('post') ? [
                    'headline' => get_the_title($page),
                    'datePublished' => get_the_date('c', $page),
                    'dateModified' => get_the_modified_date('c', $page),
                    'author' => ['@type' => 'Person', 'name' => get_the_author_meta('display_name', $page->post_author)],
                    'image' => $image,
                    'mainEntityOfPage' => get_permalink($page),
                ] : []),
            ];
        }
    }

    echo '<script type="application/ld+json">' . wp_json_encode(
        ['@context' => 'https://schema.org', '@graph' => $graph],
        JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT
    ) . '</script>' . "\n";
}
add_action('wp_head', 'txa_seo_metadata', 99);

/**
 * Store About page journey entries as regular WordPress content so they do not
 * depend on ACF Pro repeaters.
 */
add_action('init', function (): void {
    register_post_type('txa_timeline', [
        'labels' => [
            'name' => __('About Timeline', 'tailpress'),
            'singular_name' => __('Timeline Entry', 'tailpress'),
            'add_new_item' => __('Add Timeline Entry', 'tailpress'),
            'edit_item' => __('Edit Timeline Entry', 'tailpress'),
            'menu_name' => __('About Timeline', 'tailpress'),
        ],
        'public' => false,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_rest' => false,
        'menu_icon' => 'dashicons-clock',
        'supports' => ['title', 'thumbnail', 'page-attributes'],
        'hierarchical' => false,
        'has_archive' => false,
        'rewrite' => false,
        'query_var' => false,
    ]);
});

add_action('add_meta_boxes_txa_timeline', function (): void {
    add_meta_box(
        'txa_timeline_details',
        __('Timeline Details', 'tailpress'),
        function (WP_Post $post): void {
            wp_nonce_field('txa_timeline_details', 'txa_timeline_nonce');
            $year = get_post_meta($post->ID, '_txa_timeline_year', true);
            $copy = get_post_meta($post->ID, '_txa_timeline_copy', true);
?>
        <p>
            <label for="txa_timeline_year"><strong><?php esc_html_e('Year or period', 'tailpress'); ?></strong></label><br>
            <input type="text" id="txa_timeline_year" name="txa_timeline_year" value="<?php echo esc_attr($year); ?>" class="widefat" placeholder="2012 or Today">
        </p>
        <p>
            <label for="txa_timeline_copy"><strong><?php esc_html_e('Description', 'tailpress'); ?></strong></label><br>
            <textarea id="txa_timeline_copy" name="txa_timeline_copy" rows="4" class="widefat"><?php echo esc_textarea($copy); ?></textarea>
        </p>
        <p class="description"><?php esc_html_e('Use the Featured image panel for the timeline icon. Set the Order in the Page Attributes panel to control display position.', 'tailpress'); ?></p>
<?php
        }
    );
});

add_action('save_post_txa_timeline', function (int $post_id): void {
    if (
        !isset($_POST['txa_timeline_nonce'])
        || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['txa_timeline_nonce'])), 'txa_timeline_details')
        || (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        || !current_user_can('edit_post', $post_id)
    ) {
        return;
    }

    update_post_meta($post_id, '_txa_timeline_year', sanitize_text_field(wp_unslash($_POST['txa_timeline_year'] ?? '')));
    update_post_meta($post_id, '_txa_timeline_copy', sanitize_textarea_field(wp_unslash($_POST['txa_timeline_copy'] ?? '')));
});

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
        '/contact/',
        '/destinations/contact/',
        '/distributors/apply/',
        '/booking-systems/partner-enquiry/',
        '/register-your-interest/',
    ];

    $normalized_path = '/' . trim($path, '/') . '/';

    return in_array($normalized_path, $placeholder_paths, true) ? '#' : $url;
}, 10, 2);

/**
 * Keep the public blog archive available if the WordPress Blog page is missing
 * or has not been assigned as the Posts page yet.
 */
add_filter('template_include', function (string $template): string {
    global $wp_query;

    if (!is_404()) {
        return $template;
    }

    $request_path = trim((string) parse_url($_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH), '/');
    if (!preg_match('#^blog(?:/page/[1-9][0-9]*)?$#', $request_path)) {
        return $template;
    }

    if ($wp_query instanceof WP_Query) {
        $wp_query->is_404 = false;
        $wp_query->is_home = true;
        if (preg_match('#^blog/page/([1-9][0-9]*)$#', $request_path, $page_match)) {
            $wp_query->set('paged', (int) $page_match[1]);
        }
    }
    status_header(200);

    return __DIR__ . '/home.php';
});

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
