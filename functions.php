<?php

if (is_file(__DIR__ . '/vendor/autoload_packages.php')) {
    require_once __DIR__ . '/vendor/autoload_packages.php';
}

/**
 * Escape regular ACF fields while allowing safe markup from WYSIWYG fields.
 */
function txa_field_output(string $name, $default = ''): string
{
    $value = function_exists('get_field') ? get_field($name) : null;
    if (null === $value || '' === $value || false === $value) {
        $value = $default;
    }

    $field = function_exists('get_field_object') ? get_field_object($name) : false;
    if (is_array($field) && 'wysiwyg' === ($field['type'] ?? null)) {
        return wp_kses_post((string) $value);
    }

    return esc_html((string) $value);
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
 * Load the TXGB brand layer separately so the rebrand is visible immediately
 * without requiring a Vite production build.
 */
add_action('wp_enqueue_scripts', function (): void {
    $brand_stylesheet = get_theme_file_path('/resources/css/txgb-brand.css');

    wp_enqueue_style(
        'txgb-brand',
        get_theme_file_uri('/resources/css/txgb-brand.css'),
        [],
        is_file($brand_stylesheet) ? (string) filemtime($brand_stylesheet) : null
    );
}, 30);

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
        'page-homepage.php' => ['hero_copy', 'TXGB connects British tourism suppliers, destinations, distributors and booking systems so tourism products can be found, marketed, booked and measured online.'],
        'page-suppliers.php' => ['supplier_hero_copy', 'Connect British tourism products, rates and availability to destination websites, distributors and more online channels through TXGB.'],
        'page-booking-systems.php' => ['booking_seo_description', 'Connect your booking system to Great Britain’s national tourism exchange and help operator customers access broader destination, distributor and trade channels.'],
        'page-destinations.php' => ['destination_seo_description', 'TXGB helps destination organisations move from inspiration-only marketing to connected, bookable visitor outcomes through Smart Destination infrastructure.'],
        'page-distributors.php' => ['distributor_seo_description', 'TXGB gives distributors unique access to bookable British tourism inventory through flexible commercial and technical distribution models.'],
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

    return 'Tourism Exchange Great Britain connects tourism suppliers, destinations, distributors and booking systems through a shared tourism exchange.';
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
        'page-privacy-policy.php',
        'page-terms-of-use.php',
    ], true) || is_page(['faqs', 'privacy-policy', 'terms-of-use']);

    if (!$has_template_description) {
        echo '<meta name="description" content="' . esc_attr($description) . '">' . "\n";
    }
    echo '<meta property="og:type" content="' . (is_singular('post') ? 'article' : 'website') . '">' . "\n";
    echo '<meta property="og:site_name" content="' . esc_attr(get_bloginfo('name') ?: 'Tourism Exchange Great Britain') . '">' . "\n";
    echo '<meta property="og:title" content="' . esc_attr($title) . '">' . "\n";
    echo '<meta property="og:description" content="' . esc_attr($description) . '">' . "\n";
    echo '<meta property="og:url" content="' . esc_url($url) . '">' . "\n";
    echo '<meta property="og:image" content="' . esc_url($image) . '">' . "\n";
    echo '<meta name="twitter:card" content="summary_large_image">' . "\n";
    echo '<meta name="twitter:title" content="' . esc_attr($title) . '">' . "\n";
    echo '<meta name="twitter:description" content="' . esc_attr($description) . '">' . "\n";

    $logo = get_theme_file_uri('/images/logo-with-text.png');
    $organization_id = trailingslashit(home_url('/')) . '#organization';
    $website_id = trailingslashit(home_url('/')) . '#website';
    $graph = [
        [
            '@type' => 'Organization',
            '@id' => $organization_id,
            'name' => 'Tourism Exchange Great Britain',
            'alternateName' => 'TXGB',
            'url' => home_url('/'),
            'logo' => ['@type' => 'ImageObject', 'url' => $logo],
            'description' => 'Great Britain’s open B2B tourism exchange connecting suppliers, destinations, distributors and booking systems.',
        ],
        [
            '@type' => 'WebSite',
            '@id' => $website_id,
            'url' => home_url('/'),
            'name' => get_bloginfo('name') ?: 'Tourism Exchange Great Britain',
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
 * Store connected booking systems as native WordPress content.
 */
add_action('init', function (): void {
    register_post_type('txa_booking_system', [
        'labels' => [
            'name' => __('Booking Systems', 'tailpress'),
            'singular_name' => __('Booking System', 'tailpress'),
            'add_new_item' => __('Add Booking System', 'tailpress'),
            'edit_item' => __('Edit Booking System', 'tailpress'),
            'menu_name' => __('Booking Systems', 'tailpress'),
        ],
        'public' => false,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_rest' => false,
        'menu_icon' => 'dashicons-calendar-alt',
        'supports' => ['title', 'thumbnail', 'page-attributes'],
        'hierarchical' => false,
        'has_archive' => false,
        'rewrite' => false,
        'query_var' => false,
    ]);
});

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
            <input type="text" id="txa_timeline_year" name="txa_timeline_year" value="<?php echo esc_attr($year); ?>"
                class="widefat" placeholder="2012 or Today">
        </p>
        <p>
            <label for="txa_timeline_copy"><strong><?php esc_html_e('Description', 'tailpress'); ?></strong></label><br>
            <textarea id="txa_timeline_copy" name="txa_timeline_copy" rows="4"
                class="widefat"><?php echo esc_textarea($copy); ?></textarea>
        </p>
        <p class="description">
            <?php esc_html_e('Use the Featured image panel for the timeline icon. Set the Order in the Page Attributes panel to control display position.', 'tailpress'); ?>
        </p>
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

/**
 * Store FAQ page categories and questions as native WordPress content so they
 * do not depend on ACF repeaters. The FAQs template keeps placeholder copy and
 * only switches to these entries once both types have published content.
 */
add_action('init', function (): void {
    register_post_type('txa_faq_group', [
        'labels' => [
            'name' => __('FAQ Groups', 'tailpress'),
            'singular_name' => __('FAQ Group', 'tailpress'),
            'add_new_item' => __('Add FAQ Group', 'tailpress'),
            'edit_item' => __('Edit FAQ Group', 'tailpress'),
            'menu_name' => __('FAQ Groups', 'tailpress'),
        ],
        'public' => false,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_rest' => false,
        'menu_icon' => 'dashicons-category',
        'supports' => ['title', 'page-attributes'],
        'hierarchical' => false,
        'has_archive' => false,
        'rewrite' => false,
        'query_var' => false,
    ]);

    register_post_type('txa_faq', [
        'labels' => [
            'name' => __('FAQ Questions', 'tailpress'),
            'singular_name' => __('FAQ Question', 'tailpress'),
            'add_new_item' => __('Add FAQ Question', 'tailpress'),
            'edit_item' => __('Edit FAQ Question', 'tailpress'),
            'menu_name' => __('FAQ Questions', 'tailpress'),
        ],
        'public' => false,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_rest' => false,
        'menu_icon' => 'dashicons-editor-help',
        'supports' => ['title', 'page-attributes'],
        'hierarchical' => false,
        'has_archive' => false,
        'rewrite' => false,
        'query_var' => false,
    ]);
});

add_action('add_meta_boxes_txa_faq_group', function (): void {
    add_meta_box(
        'txa_faq_group_details',
        __('Group Details', 'tailpress'),
        function (WP_Post $post): void {
            wp_nonce_field('txa_faq_group_details', 'txa_faq_group_nonce');
            $eyebrow = get_post_meta($post->ID, '_txa_faq_group_eyebrow', true);
            $intro = get_post_meta($post->ID, '_txa_faq_group_intro', true);
            $icon = get_post_meta($post->ID, '_txa_faq_group_icon', true);
            $anchor = get_post_meta($post->ID, '_txa_faq_group_anchor', true);
?>
        <p>
            <label for="txa_faq_group_eyebrow"><strong><?php esc_html_e('Eyebrow label', 'tailpress'); ?></strong></label><br>
            <input type="text" id="txa_faq_group_eyebrow" name="txa_faq_group_eyebrow"
                value="<?php echo esc_attr($eyebrow); ?>" class="widefat"
                placeholder="Tourism suppliers">
        </p>
        <p>
            <label for="txa_faq_group_intro"><strong><?php esc_html_e('Intro copy', 'tailpress'); ?></strong></label><br>
            <textarea id="txa_faq_group_intro" name="txa_faq_group_intro" rows="3"
                class="widefat" placeholder="Connecting tourism products, rates and availability to more online channels."><?php echo esc_textarea($intro); ?></textarea>
        </p>
        <p>
            <label for="txa_faq_group_icon"><strong><?php esc_html_e('Bootstrap icon class', 'tailpress'); ?></strong></label><br>
            <input type="text" id="txa_faq_group_icon" name="txa_faq_group_icon"
                value="<?php echo esc_attr($icon); ?>" class="widefat" placeholder="bi-shop-window">
        </p>
        <p>
            <label for="txa_faq_group_anchor"><strong><?php esc_html_e('Anchor slug', 'tailpress'); ?></strong></label><br>
            <input type="text" id="txa_faq_group_anchor" name="txa_faq_group_anchor"
                value="<?php echo esc_attr($anchor); ?>" class="widefat" placeholder="suppliers">
        </p>
        <p class="description">
            <?php esc_html_e('The post title is the group heading. The anchor slug sets the "#" link target on the FAQs page. Set the Order in the Page Attributes panel to control display position.', 'tailpress'); ?>
        </p>
<?php
        },
        'txa_faq_group',
        'normal',
        'default'
    );
});

add_action('save_post_txa_faq_group', function (int $post_id): void {
    if (
        !isset($_POST['txa_faq_group_nonce'])
        || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['txa_faq_group_nonce'])), 'txa_faq_group_details')
        || (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        || !current_user_can('edit_post', $post_id)
    ) {
        return;
    }

    update_post_meta($post_id, '_txa_faq_group_eyebrow', sanitize_text_field(wp_unslash($_POST['txa_faq_group_eyebrow'] ?? '')));
    update_post_meta($post_id, '_txa_faq_group_intro', sanitize_textarea_field(wp_unslash($_POST['txa_faq_group_intro'] ?? '')));
    update_post_meta($post_id, '_txa_faq_group_icon', sanitize_text_field(wp_unslash($_POST['txa_faq_group_icon'] ?? '')));
    update_post_meta($post_id, '_txa_faq_group_anchor', sanitize_title(wp_unslash($_POST['txa_faq_group_anchor'] ?? '')));
});

add_action('add_meta_boxes_txa_faq', function (): void {
    add_meta_box(
        'txa_faq_details',
        __('FAQ Details', 'tailpress'),
        function (WP_Post $post): void {
            wp_nonce_field('txa_faq_details', 'txa_faq_nonce');
            $selected_group = (int) get_post_meta($post->ID, '_txa_faq_group_id', true);
            $answer = get_post_meta($post->ID, '_txa_faq_answer', true);
            $groups = get_posts([
                'post_type' => 'txa_faq_group',
                'post_status' => 'publish',
                'posts_per_page' => -1,
                'orderby' => ['menu_order' => 'ASC', 'date' => 'ASC', 'ID' => 'ASC'],
                'order' => 'ASC',
            ]);
?>
        <p>
            <label for="txa_faq_group_id"><strong><?php esc_html_e('FAQ group', 'tailpress'); ?></strong></label><br>
            <select id="txa_faq_group_id" name="txa_faq_group_id" class="widefat">
                <option value="0"><?php esc_html_e('— No group —', 'tailpress'); ?></option>
                <?php foreach ($groups as $group_post): ?>
                    <option value="<?php echo (int) $group_post->ID; ?>" <?php selected($selected_group, (int) $group_post->ID); ?>>
                        <?php echo esc_html(get_the_title($group_post) ?: sprintf(__('(no title #%d)', 'tailpress'), $group_post->ID)); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </p>
        <p>
            <label for="txa_faq_answer"><strong><?php esc_html_e('Answer', 'tailpress'); ?></strong></label><br>
            <textarea id="txa_faq_answer" name="txa_faq_answer" rows="5"
                class="widefat"><?php echo esc_textarea($answer); ?></textarea>
        </p>
        <p class="description">
            <?php esc_html_e('The post title is the question shown in the accordion. Create the FAQ Groups first, then publish questions and assign each one to a group. Set the Order in the Page Attributes panel to control the position within the group.', 'tailpress'); ?>
        </p>
<?php
        },
        'txa_faq',
        'normal',
        'default'
    );
});

add_action('save_post_txa_faq', function (int $post_id): void {
    if (
        !isset($_POST['txa_faq_nonce'])
        || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['txa_faq_nonce'])), 'txa_faq_details')
        || (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        || !current_user_can('edit_post', $post_id)
    ) {
        return;
    }

    update_post_meta($post_id, '_txa_faq_group_id', (int) ($_POST['txa_faq_group_id'] ?? 0));
    update_post_meta($post_id, '_txa_faq_answer', sanitize_textarea_field(wp_unslash($_POST['txa_faq_answer'] ?? '')));
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

add_action('admin_menu', function (): void {
    add_management_page(
        'Import Booking Systems',
        'Import Booking Systems',
        'manage_options',
        'txa-import-booking-systems',
        'txa_import_booking_systems_page'
    );
});


function txa_import_booking_systems_page(): void
{
    if (!current_user_can('manage_options')) {
        return;
    }

    $names = [
        'Anytime Booking',
        'Bokun',
        'Bookalet',
        'Bookeo',
        'Bookinghound',
        'Caterbook',
        'DigiTickets',
        'eviivo',
        'Fareharbor',
        'FuseMetrix',
        'GemaPark',
        'OHIP',
        'Palisis',
        'Rezdy',
        'roommaster',
        'Seekom',
        'Siteminder',
        'Spektrix',
        'STAAH',
        'TicketingHub',
        'Trekksoft',
        'Vennersys',
        'Ventrata',
    ];

    echo '<div class="wrap"><h1>Import Booking Systems</h1>';

    $should_run = isset($_POST['txa_import_nonce'])
        && wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['txa_import_nonce'])), 'txa_import_booking_systems');

    if ($should_run) {
        echo '<ul>';

        foreach ($names as $index => $name) {
            $existing = get_posts([
                'post_type' => 'txa_booking_system',
                'post_status' => 'any',
                'title' => $name,
                'numberposts' => 1,
                'fields' => 'ids',
            ]);

            if (!empty($existing)) {
                echo '<li>Skipped (already exists): ' . esc_html($name) . '</li>';
                continue;
            }

            $post_id = wp_insert_post([
                'post_type' => 'txa_booking_system',
                'post_status' => 'publish',
                'post_title' => $name,
                'menu_order' => $index + 1,
            ], true);

            if (is_wp_error($post_id)) {
                echo '<li>Failed: ' . esc_html($name) . ' - ' . esc_html($post_id->get_error_message()) . '</li>';
                continue;
            }

            $attachments = get_posts([
                'post_type' => 'attachment',
                'post_status' => 'inherit',
                'title' => $name,
                'numberposts' => 1,
                'fields' => 'ids',
            ]);

            if (empty($attachments)) {
                echo '<li>Created without logo (not found in Media Library): ' . esc_html($name) . '</li>';
                continue;
            }

            set_post_thumbnail($post_id, $attachments[0]);
            echo '<li>Imported with logo: ' . esc_html($name) . '</li>';
        }

        echo '</ul><p>Done. You can now remove this code from functions.php.</p>';
    } else {
        echo '<p>This creates ' . count($names) . ' booking systems and attaches matching logos from the Media Library.</p>';
        echo '<form method="post">';
        wp_nonce_field('txa_import_booking_systems', 'txa_import_nonce');
        submit_button('Run import');
        echo '</form>';
    }

    echo '</div>';
}

if (!function_exists('txa_cf7_require_other_detail')) {
    /**
     * Make the CF7 "Other" follow-up field conditionally required.
     *
     * Field naming convention: a text/textarea tag named "<parent>-other"
     * (e.g. "your-topic-other") must be filled whenever the parent select,
     * checkbox group or radio group tag named "<parent>" (e.g. "your-topic")
     * was set to "Other". Otherwise the follow-up is ignored.
     */
    add_filter('wpcf7_validate_text', 'txa_cf7_require_other_detail', 10, 2);
    add_filter('wpcf7_validate_text*', 'txa_cf7_require_other_detail', 10, 2);
    add_filter('wpcf7_validate_textarea', 'txa_cf7_require_other_detail', 10, 2);
    add_filter('wpcf7_validate_textarea*', 'txa_cf7_require_other_detail', 10, 2);

    function txa_cf7_require_other_detail(WPCF7_Validation $result, WPCF7_FormTag $tag)
    {
        $name = (string) ($tag->name ?? '');

        if ('' === $name || !str_ends_with($name, '-other')) {
            return $result;
        }

        $parent = substr($name, 0, -strlen('-other'));
        $parent_value = $_POST[$parent] ?? '';

        if (is_array($parent_value)) {
            $parent_value = (string) (reset($parent_value) ?: '');
        }
        $parent_value = trim((string) wp_unslash($parent_value));

        if (0 === strcasecmp($parent_value, 'Other')) {
            $detail = $_POST[$name] ?? '';

            if (is_array($detail)) {
                $detail = (string) (reset($detail) ?: '');
            }
            $detail = trim(wp_unslash((string) $detail));

            if ('' === $detail) {
                $result->invalidate($tag, 'Please tell us more, since you selected "Other".');
            }
        }

        return $result;
    }
}
