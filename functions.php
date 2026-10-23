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
        'page-privacy-policy.php',
        'page-terms-of-use.php',
    ], true) || is_page(['faqs', 'privacy-policy', 'terms-of-use']);

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
 * One-click importer under Tools: creates the booking systems shown on the
 * Booking Systems page and attaches the matching logos from the theme folder.
 */
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
        'Booking Boss' => 'bookingboss.png',
        'Bookeo' => 'bookeo.png',
        'CustomLinc' => 'customlinc.webp',
        'DigitalRez' => 'digitalrez.png',
        'FareHarbor' => 'fareharbor.png',
        'NewBook' => 'newbook.png',
        'Rezdy' => 'rezdy.png',
        'ResOnline' => 'resonline-logo.png',
        'Rezobx' => 'rezobx.jpg',
        'RMS' => 'rms.png',
        'RoomMaster' => 'roommaster.png',
        'Seekom' => 'seekom.png',
        'SiteMinder' => 'siteminder.png',
        'Little Hotelier' => 'little-hotelier.png',
        'Update 247' => 'update247.png',
    ];

    echo '<div class="wrap"><h1>Import Booking Systems</h1>';

    $should_run = isset($_POST['txa_import_nonce'])
        && wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['txa_import_nonce'])), 'txa_import_booking_systems');

    if ($should_run) {
        require_once ABSPATH . 'wp-admin/includes/image.php';

        echo '<ul>';

        $index = 0;

        foreach ($names as $name => $file) {
            $index++;
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

            $logo_path = get_theme_file_path('/images/networks/' . $file);

            if (!file_exists($logo_path)) {
                echo '<li>Created without logo (file not found in /images/networks): ' . esc_html($name) . '</li>';
                continue;
            }

            $basename = basename($logo_path);
            $upload = wp_upload_bits($basename, null, (string) file_get_contents($logo_path));

            if (!empty($upload['error'])) {
                echo '<li>Created without logo (upload failed): ' . esc_html($name) . ' - ' . esc_html($upload['error']) . '</li>';
                continue;
            }

            $attachment_id = wp_insert_attachment([
                'post_title' => $name . ' logo',
                'post_status' => 'inherit',
                'guid' => $upload['url'],
                'post_mime_type' => $upload['type'],
            ], $upload['file'], $post_id);

            if (is_wp_error($attachment_id)) {
                echo '<li>Created without logo (attachment failed): ' . esc_html($name) . '</li>';
                continue;
            }

            wp_update_attachment_metadata($attachment_id, wp_generate_attachment_metadata($attachment_id, $upload['file']));

            set_post_thumbnail($post_id, $attachment_id);
            echo '<li>Imported with logo from theme folder: ' . esc_html($name) . ' (' . esc_html('/images/networks/' . $basename) . ')</li>';
        }

        echo '</ul><p>Done. You can now remove this code from functions.php.</p>';
    } else {
        echo '<p>This creates ' . count($names) . ' booking systems and attaches the matching logos from the theme folder.</p>';
        echo '<form method="post">';
        wp_nonce_field('txa_import_booking_systems', 'txa_import_nonce');
        submit_button('Run import');
        echo '</form>';
    }

    echo '</div>';
}

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

/**
 * Placeholder FAQ copy. Used as the fallback by the FAQs template until both
 * FAQ Groups and FAQ Questions have published content, and doubles as the
 * source for seeding that content into the CPTs.
 */
function txa_faq_default_groups(): array
{
    return [
        'suppliers' => [
            'eyebrow' => 'Tourism suppliers',
            'title' => 'Supplier questions',
            'intro' => 'Connecting tourism products, rates and availability to more online channels.',
            'icon' => 'bi-shop-window',
            'items' => [
                ['question' => 'Do I need a booking system?', 'answer' => 'Usually TXA works through a connected booking system. If you do not have one, TXA can help you understand available options.'],
                ['question' => 'Will I have to manage another system?', 'answer' => 'The goal is to reduce manual management by using your booking system as the source of product, rates and availability.'],
                ['question' => 'Can I keep personal contact with customers?', 'answer' => 'Yes. The customer remains your customer, with booking and customer information flowing according to the relevant channel and payment model.'],
                ['question' => 'What size business is TXA designed for?', 'answer' => 'TXA is designed for tourism suppliers of different sizes across accommodation, activities, attractions, events and experiences.'],
            ],
        ],
        'destinations' => [
            'eyebrow' => 'Destinations',
            'title' => 'Destination questions',
            'intro' => 'Activating destination assets, local supply and measurable visitor journeys.',
            'icon' => 'bi-geo-alt',
            'items' => [
                ['question' => 'Does this replace our existing CMS?', 'answer' => 'No. TXA can work alongside your existing destination website or CMS by powering bookable pathways, widgets, APIs and destination-specific booking pages.'],
                ['question' => 'How much does it cost operators?', 'answer' => 'Commercial models can vary by destination. TXA is designed to support flexible destination packages and supplier pathways.'],
                ['question' => 'Is TXA an OTA (Online Travel Agent)?', 'answer' => 'No. TXA is a neutral B2B exchange connecting suppliers, destinations, distributors and booking systems.'],
            ],
        ],
        'distributors' => [
            'eyebrow' => 'Distributors',
            'title' => 'Distributor questions',
            'intro' => 'Accessing Australian tourism inventory through flexible technical and commercial models.',
            'icon' => 'bi-globe2',
            'items' => [
                ['question' => 'What inventory can distributors access through TXA?', 'answer' => 'TXA provides a pathway to Australian tourism suppliers across accommodation, tours, attractions, events and experiences.'],
                ['question' => 'How can a distributor connect to TXA?', 'answer' => 'Connection options include a direct API, white-label booking pages, an on-account or agent model, and campaign or destination-led distribution.'],
                ['question' => 'Does TXA support different commercial models?', 'answer' => 'Yes. TXA supports flexible commercial arrangements, including net, gross and commission-based models, depending on the distributor agreement.'],
            ],
        ],
        'booking-systems' => [
            'eyebrow' => 'Booking systems',
            'title' => 'Booking System questions',
            'intro' => 'Connecting operator customers to destination, distributor and trade channels.',
            'icon' => 'bi-calendar2-check',
            'items' => [
                ['question' => 'What does a TXA integration offer booking system customers?', 'answer' => 'A TXA integration can give operator customers access to broader destination, distributor and trade channels through Australia’s national tourism exchange.'],
                ['question' => 'How is product availability kept current?', 'answer' => 'Connected systems can exchange live product, pricing and availability updates so booking data remains accurate across the network.'],
                ['question' => 'Why connect once through TXA?', 'answer' => 'A single TXA integration can reduce the need to manage separate technical connections for each participating distribution relationship.'],
            ],
        ],
    ];
}

/**
 * Import the placeholder FAQ copy into the FAQ Groups and FAQ Questions CPTs.
 * Idempotent: existing groups are matched by anchor, and questions are only
 * created when the same question is missing from a group.
 */
function txa_faq_seed_placeholder_content(): array
{
    $result = ['groups_created' => 0, 'questions_created' => 0, 'skipped' => 0];
    $group_order = 0;

    foreach (txa_faq_default_groups() as $anchor => $group) {
        $existing_group = get_posts([
            'post_type' => 'txa_faq_group',
            'post_status' => 'publish',
            'posts_per_page' => 1,
            'fields' => 'ids',
            'meta_key' => '_txa_faq_group_anchor',
            'meta_value' => $anchor,
        ])[0] ?? 0;

        if (!$existing_group) {
            $created = wp_insert_post([
                'post_type' => 'txa_faq_group',
                'post_status' => 'publish',
                'post_title' => $group['title'],
                'menu_order' => $group_order,
            ], true);

            if (is_wp_error($created) || !$created) {
                $result['skipped']++;
                $group_order++;
                continue;
            }

            $existing_group = (int) $created;
            update_post_meta($existing_group, '_txa_faq_group_eyebrow', $group['eyebrow']);
            update_post_meta($existing_group, '_txa_faq_group_intro', $group['intro']);
            update_post_meta($existing_group, '_txa_faq_group_icon', $group['icon']);
            update_post_meta($existing_group, '_txa_faq_group_anchor', $anchor);
            $result['groups_created']++;
        }

        foreach ($group['items'] as $index => $item) {
            $existing_question = get_posts([
                'post_type' => 'txa_faq',
                'post_status' => ['publish', 'draft', 'pending'],
                'posts_per_page' => 1,
                'fields' => 'ids',
                'title' => $item['question'],
                'meta_key' => '_txa_faq_group_id',
                'meta_value' => $existing_group,
            ]);

            if ($existing_question) {
                $result['skipped']++;
                continue;
            }

            $created = wp_insert_post([
                'post_type' => 'txa_faq',
                'post_status' => 'publish',
                'post_title' => $item['question'],
                'menu_order' => $index,
            ], true);

            if (is_wp_error($created) || !$created) {
                $result['skipped']++;
                continue;
            }

            update_post_meta((int) $created, '_txa_faq_group_id', $existing_group);
            update_post_meta((int) $created, '_txa_faq_answer', $item['answer']);
            $result['questions_created']++;
        }

        $group_order++;
    }

    return $result;
}

/**
 * One-click trigger under Tools to seed the placeholder FAQ content.
 */
add_action('admin_menu', function (): void {
    add_management_page(
        __('FAQ placeholder import', 'tailpress'),
        __('FAQ placeholders', 'tailpress'),
        'manage_options',
        'txa-faq-seed',
        function (): void {
            $groups = (int) (wp_count_posts('txa_faq_group')->publish ?? 0);
            $questions = (int) (wp_count_posts('txa_faq')->publish ?? 0); ?>
        <div class="wrap">
            <h1><?php esc_html_e('FAQ placeholder import', 'tailpress'); ?></h1>
            <?php if (isset($_GET['groups'], $_GET['questions'])): ?>
                <div class="notice notice-success is-dismissible">
                    <p><?php
                        printf(
                            esc_html__('Created %1$d FAQ group(s) and %2$d FAQ question(s).', 'tailpress'),
                            (int) $_GET['groups'],
                            (int) $_GET['questions']
                        );
                        ?></p>
                </div>
            <?php endif; ?>
            <p>
                <?php esc_html_e('Imports the current FAQs page placeholder copy into the FAQ Groups and FAQ Questions as published content. Groups are matched by anchor slug and existing questions are skipped, so this is safe to run more than once.', 'tailpress'); ?>
            </p>
            <p class="description">
                <?php printf(esc_html__('Currently published: %1$d FAQ group(s), %2$d FAQ question(s).', 'tailpress'), $groups, $questions); ?>
            </p>
            <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
                <input type="hidden" name="action" value="txa_faq_seed_placeholder">
                <?php wp_nonce_field('txa_faq_seed_placeholder'); ?>
                <?php submit_button(__('Import placeholder FAQs', 'tailpress'), 'primary', 'submit', false); ?>
            </form>
        </div>
<?php
        }
    );
});

add_action('admin_post_txa_faq_seed_placeholder', function (): void {
    if (!current_user_can('manage_options')) {
        wp_die(__('You are not allowed to run this import.', 'tailpress'));
    }

    check_admin_referer('txa_faq_seed_placeholder');

    $result = txa_faq_seed_placeholder_content();

    wp_safe_redirect(add_query_arg([
        'page' => 'txa-faq-seed',
        'groups' => $result['groups_created'],
        'questions' => $result['questions_created'],
    ], admin_url('tools.php')));
    exit;
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


add_action('init', function () {
    register_post_type('home_slider', [
        'labels' => [
            'name' => 'Home Sliders',
            'singular_name' => 'Home Slider',
            'add_new_item' => 'Add New Home Slider',
            'edit_item' => 'Edit Home Slider',
            'menu_name' => 'Home Sliders',
        ],
        'public' => false,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_rest' => true,
        'menu_icon' => 'dashicons-images-alt2',
        'menu_position' => 20,
        'supports' => ['title', 'excerpt', 'thumbnail', 'page-attributes'],
    ]);
});

// Use the classic editor for home_slider so the WYSIWYG excerpt box below works.
add_filter('use_block_editor_for_post_type', function (bool $enabled, string $post_type): bool {
    if ('home_slider' === $post_type) {
        return false;
    }
    return $enabled;
}, 10, 2);

// Replace the plain excerpt textarea with a WYSIWYG editor (keeps saving to post_excerpt).
add_action('add_meta_boxes_home_slider', function (): void {
    remove_meta_box('postexcerpt', 'home_slider', 'normal');

    add_meta_box(
        'txa_home_slider_excerpt',
        __('Slider Copy', 'tailpress'),
        function (WP_Post $post): void {
            wp_editor($post->post_excerpt, 'home_slider_excerpt', [
                'textarea_name' => 'excerpt', // still saved as the post excerpt.
                'textarea_rows' => 8,
                'media_buttons' => false,
                'tinymce' => [
                    'toolbar1' => 'bold,italic,link,unlink,bullist,numlist,blockquote,removeformat',
                    'toolbar2' => '',
                ],
                'quicktags' => ['buttons' => 'strong,em,link,ul,li,blockquote'],
            ]);
        },
        'home_slider',
        'normal',
        'high'
    );
});
