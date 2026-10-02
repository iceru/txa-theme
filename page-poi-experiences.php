<?php

/**
 * Template Name: Destination POI and Experiences
 *
 * @package TailPress
 */

if (!function_exists('txa_poi_f')) {
    function txa_poi_f(string $name, $default = '')
    {
        $value = function_exists('get_field') ? get_field($name) : null;
        return (null === $value || '' === $value || false === $value) ? $default : $value;
    }
}

if (!function_exists('txa_poi_url')) {
    function txa_poi_url(string $name, string $default): string
    {
        $value = trim((string) txa_poi_f($name, $default));
        return (0 === strpos($value, '/') && 0 !== strpos($value, '//')) ? home_url($value) : $value;
    }
}

add_filter('pre_get_document_title', fn(): string => (string) txa_poi_f('poi_seo_title', 'Points of Interest and Experiences | Tourism Exchange Australia'));
add_action('wp_head', function (): void {
    if (is_page_template('page-poi-experiences.php')) {
        echo '<meta name="description" content="' . esc_attr(txa_poi_f('poi_seo_description', 'Help destinations connect points of interest, itineraries and bookable tourism experiences.')) . '">' . "\n";
    }
});

get_header();

$demo_url = txa_poi_url('poi_hero_button_url', home_url('/contact/'));

$feature_cards = [
    [
        'icon' => txa_poi_f('poi_card_1_icon', 'bi-image'),
        'title' => txa_poi_f('poi_card_1_title', 'Points of Interest (POIs)'),
        'copy' => txa_poi_f('poi_card_1_copy', 'Build POIs for free visitor experiences, landmarks, attractions and public places. Enrich your maps with detailed content that matters to travelers.'),
        'tags' => array_values(array_filter([
            txa_poi_f('poi_card_1_tag_1', 'Landmarks'),
            txa_poi_f('poi_card_1_tag_2', 'Public Spaces'),
            txa_poi_f('poi_card_1_tag_3', 'Natural Attractions'),
        ])),
        'featured' => true,
    ],
    [
        'icon' => txa_poi_f('poi_card_2_icon', 'bi-stars'),
        'title' => txa_poi_f('poi_card_2_title', 'Connect Content'),
        'copy' => txa_poi_f('poi_card_2_copy', 'Connect content with bookable suppliers so visitors can act on inspiration immediately.'),
        'red' => true,
    ],
    [
        'icon' => txa_poi_f('poi_card_3_icon', 'bi-calendar3'),
        'title' => txa_poi_f('poi_card_3_title', 'Themed Experiences'),
        'copy' => txa_poi_f('poi_card_3_copy', 'Create recommended experiences for seasons, regions, events or specific visitor types.'),
    ],
    [
        'icon' => txa_poi_f('poi_card_4_icon', 'bi-window-sidebar'),
        'title' => txa_poi_f('poi_card_4_title', 'Omnichannel Distribution'),
        'copy' => txa_poi_f('poi_card_4_copy', 'Use POIs and experiences in destination pages, trade pages, campaign microsites and virtual concierge journeys. Reach your audience wherever they are.'),
        'wide' => true,
    ],
];
?>

<article class="bg-white text-near-black [font-family:'Source_Sans_Pro',sans-serif]">
    <section class="bg-surface px-4 py-14 sm:py-16 lg:px-16 lg:py-24">
        <div class="mx-auto grid max-w-[1312px] gap-10 lg:grid-cols-[1fr_600px] lg:items-center lg:gap-16">
            <div>
                <p
                    class="inline-flex w-fit max-w-full rounded-lg bg-brand px-4 py-2 text-sm font-bold sm:px-5 sm:py-3 sm:text-base uppercase leading-5 text-white">
                    <?php echo esc_html(txa_poi_f('poi_hero_label', 'Point of Interests and Experiences')); ?></p>
                <h1
                    class="mt-8 max-w-[610px] [font-family:'Hanken_Grotesk',sans-serif] text-4xl font-bold leading-[1.18] text-[#151c27] sm:text-5xl lg:text-[44px] lg:leading-[1.15]">
                    <?php echo esc_html(txa_poi_f('poi_hero_title_start', 'Create destination content that')); ?> <span class="text-brand"><?php echo esc_html(txa_poi_f('poi_hero_title_highlight', 'connects')); ?></span> <?php echo esc_html(txa_poi_f('poi_hero_title_end', 'to bookable product')); ?></h1>
                <p class="mt-6 max-w-[540px] text-lg leading-8 text-mid-gray"><?php echo esc_html(txa_poi_f('poi_hero_copy', 'TXA allows a destination to add Points of Interest - free things to see and do - and to create recommended experiences and suggested itineraries.')); ?></p>
                <a href="<?php echo esc_url($demo_url); ?>"
                    class="mt-8 inline-flex min-h-12 w-full items-center justify-center gap-3 rounded-lg bg-brand px-7 py-3 text-base font-bold text-white !no-underline hover:bg-brand-dark sm:w-auto"><?php echo esc_html(txa_poi_f('poi_hero_button_label', 'Discuss destination content activation')); ?> <i class="bi bi-arrow-right text-xl" aria-hidden="true"></i></a>
            </div>
            <div class="overflow-hidden rounded-lg shadow-sm">
                <img src="<?php echo esc_url(txa_poi_f('poi_hero_image', get_theme_file_uri('/images/map.jpg'))); ?>"
                    alt="<?php echo esc_attr(txa_poi_f('poi_hero_image_alt', 'Destination points of interest map')); ?>"
                    class="aspect-[4/3] w-full object-cover lg:aspect-[600/402]">
            </div>
        </div>
    </section>

    <section class="px-4 py-16 sm:py-20 lg:px-16 lg:py-24">
        <div class="mx-auto max-w-[1312px]">
            <div class="mx-auto max-w-[720px] text-center">
                <h2
                    class="[font-family:'Hanken_Grotesk',sans-serif] text-3xl font-bold leading-tight text-[#151c27] sm:text-4xl">
                    <?php echo esc_html(txa_poi_f('poi_features_heading', 'Transforming destination assets into visitor journeys')); ?></h2>
                <p class="mt-6 text-base leading-7 text-mid-gray"><?php echo esc_html(txa_poi_f('poi_features_copy', 'A unified ecosystem to manage free landmarks alongside bookable experiences.')); ?></p>
            </div>
            <div class="mt-12 grid gap-6 lg:grid-cols-[2fr_1fr]">
                <?php foreach ($feature_cards as $card): ?>
                    <article
                        class="<?php echo !empty($card['red']) ? 'bg-brand text-white' : 'border border-[#dfc0ba] bg-white text-[#151c27]'; ?> <?php echo !empty($card['wide']) ? 'lg:col-span-1' : ''; ?> relative overflow-hidden rounded-2xl p-8 shadow-sm sm:p-10 <?php echo !empty($card['featured']) ? 'lg:min-h-[280px]' : 'lg:min-h-[280px]'; ?>">
                        <span
                            class="<?php echo !empty($card['red']) ? 'bg-white/15 text-white' : 'bg-brand-tint text-brand'; ?> flex size-12 items-center justify-center rounded-lg text-2xl">
                            <i class="bi <?php echo esc_attr($card['icon']); ?>" aria-hidden="true"></i>
                        </span>
                        <h3
                            class="mt-8 [font-family:'Hanken_Grotesk',sans-serif] text-2xl font-bold <?php echo !empty($card['red']) ? 'text-white' : 'text-[#151c27]'; ?>">
                            <?php echo esc_html($card['title']); ?>
                        </h3>
                        <p
                            class="mt-5 max-w-[560px] text-base leading-8 <?php echo !empty($card['red']) ? 'text-white/90' : 'text-mid-gray'; ?>">
                            <?php echo esc_html($card['copy']); ?>
                        </p>

                        <?php if (!empty($card['tags'])): ?>
                            <div class="mt-7 flex flex-wrap gap-3">
                                <?php foreach ($card['tags'] as $tag): ?>
                                    <span
                                        class="rounded-full bg-slate-100 px-4 py-2 text-sm font-medium text-mid-gray"><?php echo esc_html($tag); ?></span>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>

                        <?php if (!empty($card['cta']) && !empty($card['url'])): ?>
                            <a href="<?php echo esc_url($card['url']); ?>"
                                class="mt-8 inline-flex items-center gap-2 text-base font-bold text-white !no-underline"><?php echo esc_html($card['cta']); ?>
                                <i class="bi bi-chevron-right" aria-hidden="true"></i></a>
                        <?php endif; ?>

                        <?php if (!empty($card['featured'])): ?>
                            <i class="bi bi-map absolute -bottom-7 -right-7 text-[170px] leading-none text-slate-100"
                                aria-hidden="true"></i>
                        <?php endif; ?>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</article>

<?php get_footer();
