<?php

/**
 * Template Name: About TXGB
 * @package TailPress
 */

if (!function_exists('txa_about_field')) {
    function txa_about_field(string $name, $default = '')
    {
        $value = function_exists('get_field') ? get_field($name) : null;
        return (null === $value || '' === $value || false === $value) ? $default : $value;
    }
}

if (!function_exists('txa_about_image')) {
    function txa_about_image(string $name, string $default): string
    {
        $value = txa_about_field($name);
        if (is_array($value) && !empty($value['url'])) {
            return $value['url'];
        }
        if (is_numeric($value)) {
            return wp_get_attachment_image_url((int) $value, 'full') ?: $default;
        }
        return is_string($value) && '' !== $value ? $value : $default;
    }
}

add_filter('pre_get_document_title', fn(): string => (string) txa_about_field('about_seo_title', 'About TXGB | Tourism Exchange Great Britain'));
add_action('wp_head', function (): void {
    if (is_page_template('page-about.php')) {
        echo '<meta name="description" content="' . esc_attr(txa_about_field('about_seo_description', 'Learn how TXGB became Great Britain\'s open B2B tourism exchange for suppliers, destinations, distributors and booking systems.')) . '">' . "\n";
    }
});

get_header();

$what_txa_does = [
    ['title' => 'Suppliers', 'copy' => 'All categories, styles and sizes of accommodation, activities, experiences, and events seeking broad local and global visibility', 'icon' => 'bi-shop'],
    ['title' => 'Destinations', 'copy' => 'National, State, regional and city tourism organisations marketing and empowering local businesses to go digital.', 'icon' => 'bi-signpost-split'],
    ['title' => 'Distributors', 'copy' => 'All marketing/sales channels including global OTAs, tourism and travel and niche websites, social media and travel agents', 'icon' => 'bi-globe2'],
    ['title' => 'Booking Systems', 'copy' => 'Electronic booking and inventory management systems used in the tourism industry', 'icon' => 'bi-calendar2-check'],
];
$countries = [
    ['name' => 'Australia', 'icon' => 'txa.png'],
    ['name' => 'Japan', 'icon' => 'txj.png'],
    ['name' => 'Saudi Arabia', 'icon' => 'txsa.jpg'],
    ['name' => 'United States', 'icon' => 'txusa.png'],
];
$default_timeline = [
    ['year' => '2012', 'title' => 'The Conviction', 'copy' => 'TXGB was born from a simple conviction: British tourism deserved a national exchange that worked for the whole industry, not just the biggest players.', 'icon' => 'bi-lightbulb'],
    ['year' => '2013', 'title' => 'Global Tender', 'copy' => 'TXGB was selected through a global tender as the technology partner for Great Britain\'s national booking exchange.', 'icon' => 'bi-globe2'],
    ['year' => '2014', 'title' => 'National Support', 'copy' => 'Backed by every State and Federal Government Tourism Organisation, TXGB launched as Great Britain\'s open, commercially neutral booking exchange.', 'icon' => 'bi-people'],
    ['year' => '2015', 'title' => 'Exchange Launched', 'copy' => 'TXGB launched its platform, connecting tourism suppliers, destinations, distributors and booking systems through one shared platform.', 'icon' => 'bi-rocket-takeoff'],
    ['year' => '2018+', 'title' => 'Global Expansion', 'copy' => 'The same exchange technology began powering tourism platforms internationally.', 'icon' => 'bi-airplane'],
    ['year' => 'Today', 'title' => 'Built Here. For Here.', 'copy' => 'TXGB remains Great Britain\'s own: built here, run here, and designed to keep more of the value of British tourism circulating within the British visitor economy.', 'icon' => 'bi-house-heart'],
];
$default_timeline_values = [
    ['title' => 'Great Britain\'s Own', 'copy' => 'Proudly built and operated in Great Britain.', 'icon' => 'bi-geo-alt'],
    ['title' => 'For the Industry', 'copy' => 'Designed for all tourism businesses, big and small.', 'icon' => 'bi-people'],
    ['title' => 'Government Backed', 'copy' => 'Supported by every State and Federal Government Tourism Organisation.', 'icon' => 'bi-building-check'],
    ['title' => 'One Connected Platform', 'copy' => 'Connecting suppliers, destinations, distributors and booking systems seamlessly.', 'icon' => 'bi-diagram-3'],
    ['title' => 'Global Impact', 'copy' => 'Powering tourism platforms in the UK, Japan, Saudi Arabia and the United States.', 'icon' => 'bi-globe-americas'],
    ['title' => 'Value Stays in Great Britain', 'copy' => 'Keeping more of the value of British tourism circulating within the British visitor economy.', 'icon' => 'bi-currency-dollar'],
];
$about_hero_image = txa_about_image('about_hero_image', get_theme_file_uri('/images/new/about-us.jpg'));
foreach ($what_txa_does as $index => &$card) {
    $number = $index + 1;
    $card['title'] = txa_about_field("about_audience_{$number}_title", $card['title']);
    $card['copy'] = txa_about_field("about_audience_{$number}_copy", $card['copy']);
    $card['icon'] = txa_about_field("about_audience_{$number}_icon", $card['icon']);
}
unset($card);
foreach ($countries as $index => &$country) {
    $number = $index + 1;
    $country['name'] = txa_about_field("about_country_{$number}_name", $country['name']);
    $country['image'] = txa_about_image("about_country_{$number}_image", get_theme_file_uri('/images/' . $country['icon']));
}
unset($country);
foreach ($default_timeline_values as $index => &$value) {
    $number = $index + 1;
    $value['title'] = txa_about_field("about_value_{$number}_title", $value['title']);
    $value['copy'] = txa_about_field("about_value_{$number}_copy", $value['copy']);
    $value['icon'] = txa_about_field("about_value_{$number}_icon", $value['icon']);
}
unset($value);
$timeline_query = new WP_Query([
    'post_type' => 'txa_timeline',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'orderby' => ['menu_order' => 'ASC', 'date' => 'ASC', 'ID' => 'ASC'],
    'no_found_rows' => true,
]);
$timeline = $default_timeline;
if ($timeline_query->have_posts()) {
    $timeline = [];
    foreach ($timeline_query->posts as $timeline_post) {
        $timeline[] = [
            'year' => get_post_meta($timeline_post->ID, '_txa_timeline_year', true),
            'title' => get_the_title($timeline_post),
            'copy' => get_post_meta($timeline_post->ID, '_txa_timeline_copy', true),
            'image' => get_the_post_thumbnail_url($timeline_post, 'medium'),
            'icon' => 'bi-calendar-event',
        ];
    }
}
$timeline_values = $default_timeline_values;
?>
<article class="bg-white text-near-black [font-family:'Source_Sans_Pro',sans-serif]">
    <section class="px-4 pb-6 pt-3 sm:pt-5 lg:px-16 lg:pb-16 lg:pt-8">
        <div class="mx-auto max-w-[1312px]">
            <div
                class="relative flex min-h-[590px] items-center overflow-hidden rounded-xl bg-black/40 sm:min-h-[560px] sm:rounded-2xl lg:min-h-[600px]">
                <img src="<?php echo esc_url($about_hero_image); ?>"
                    alt="<?php echo esc_attr(txa_about_field('about_hero_image_alt', 'British tourism landscape')); ?>" class="absolute inset-0 h-full w-full object-cover object-center">
                <div class="absolute inset-0 bg-black/55 sm:bg-black/45" aria-hidden="true"></div>
                <div
                    class="relative z-10 flex min-h-[590px] items-center px-5 py-10 sm:min-h-[560px] sm:px-8 sm:py-16 lg:min-h-[600px] lg:px-8 lg:py-24">
                    <div class="w-full max-w-[760px]">
                        <p
                            class="inline-flex w-fit max-w-full rounded-lg bg-brand px-4 py-2 text-sm font-bold sm:px-5 sm:py-3 sm:text-base uppercase leading-5 text-white">
                            <?php echo esc_html(txa_about_field('about_hero_label', 'About Us')); ?></p>
                        <h1
                            class="mt-4 max-w-[760px] [font-family:'Hanken_Grotesk',sans-serif] text-[34px] font-semibold leading-[1.08] text-white min-[390px]:text-4xl sm:text-5xl lg:leading-[56px]">
                            <?php echo esc_html(txa_about_field('about_hero_title', 'Built for Great Britain’s tourism industry')); ?></h1>
                        <p
                            class="mt-4 max-w-[660px] text-base font-medium leading-6 !text-white sm:text-lg sm:leading-[30px]">
                            <?php echo wp_kses_post(txa_about_field('about_hero_copy', 'Our journey started in Great Britain, being selected through a global tender in 2008 to partner with the British Tourism Data Warehouse (ATDW) and then backed by State and Federal GTOs. We operate as the structural backbone that allows local operators to compete on a global scale while maintaining their commercial independence.')); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="px-4 py-12 sm:py-14 lg:px-16 lg:py-16">
        <div class="mx-auto max-w-[1312px]">
            <h2 class="[font-family:'Hanken_Grotesk',sans-serif] text-3xl font-bold tracking-[-.01em] text-brand">
                <?php echo esc_html(txa_about_field('about_audience_heading', 'What TXGB does')); ?></h2>
            <p class="mt-4 text-base leading-7 text-brand sm:mt-6 sm:text-lg sm:leading-[29px]"><?php echo esc_html(txa_about_field('about_audience_intro', 'Tourism Exchange
                Great Britain is Great Britain’s open B2B tourism exchange. It connects tourism suppliers, destinations,
                distributors and booking systems so live tourism products can be found, marketed, booked and measured
                online.')); ?></p>
            <div class="mt-10 grid gap-5 sm:grid-cols-2 sm:mt-12 xl:mt-16 xl:grid-cols-4 xl:gap-6">
                <?php foreach ($what_txa_does as $card): ?>
                    <article class="rounded-xl border border-[#dfc0ba]/10 bg-white p-6 shadow-sm sm:min-h-[210px] sm:p-8"><i
                            class="bi <?php echo esc_attr($card['icon']); ?> text-3xl text-brand" aria-hidden="true"></i>
                        <h3 class="mt-4 [font-family:'Hanken_Grotesk',sans-serif] text-xl font-semibold text-brand">
                            <?php echo esc_html($card['title']); ?>
                        </h3>
                        <p class="mt-2 text-sm leading-6 text-mid-gray"><?php echo esc_html($card['copy']); ?></p>
                    </article><?php endforeach; ?>
            </div>
        </div>
    </section>
    <section class="bg-brand px-4 py-12 text-white sm:py-14 lg:px-16 lg:py-16">
        <div class="mx-auto grid max-w-[1280px] gap-8 lg:grid-cols-[550px_1fr] lg:items-center lg:gap-24">
            <div>
                <h2
                    class="[font-family:'Hanken_Grotesk',sans-serif] text-3xl font-bold leading-tight tracking-[-.01em]">
                    <?php echo esc_html(txa_about_field('about_countries_heading', 'Proven exchange technology, built for Great Britain')); ?></h2>
                <p class="mt-4 text-base leading-7 text-white/90 sm:mt-6 sm:text-lg sm:leading-[29px]"><?php echo esc_html(txa_about_field('about_countries_copy', 'Today, the same
                    exchange technology powers tourism platforms in the Australia, Japan, Saudi Arabia, and the US. TXGB
                    remains
                    Great Britain’s own—tailored for our unique geography and market dynamics.')); ?></p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <?php foreach ($countries as $country): ?>
                    <div
                        class="flex flex-col items-center justify-center rounded-xl bg-white p-4 text-center text-near-black shadow-sm">
                        <?php if (!empty($country['image'])): ?>
                            <img src="<?php echo esc_url($country['image']); ?>" alt=""
                                class="mb-4 h-14 w-auto max-w-full object-contain sm:h-16" aria-hidden="true">
                        <?php endif; ?>
                        <h3 class="text-sm font-bold uppercase tracking-wide sm:text-base">
                            <?php echo esc_html($country['name']); ?>
                        </h3>
                    </div><?php endforeach; ?>
            </div>
        </div>
    </section>
    <!-- <section class="bg-surface px-4 py-14 sm:py-16 lg:px-16 lg:py-24">
        <div class="mx-auto max-w-[1312px]">
            <div class="text-center">
                <h2
                    class="[font-family:'Hanken_Grotesk',sans-serif] text-3xl font-bold uppercase leading-tight tracking-[-.01em] text-brand sm:text-4xl">
                    <?php echo esc_html(txa_about_field('about_timeline_heading', 'TXGB Journey')); ?></h2>
                <p class="txgb-accent-text mt-2 text-sm font-bold uppercase tracking-[.04em] sm:text-base"><?php echo esc_html(txa_about_field('about_timeline_subheading', 'Built in Great Britain. Connected to the world. Powering our industry.')); ?></p>
            </div>

            <div class="relative mx-auto mt-12 max-w-[1180px] lg:mt-16">
                <svg class="absolute inset-x-0 top-0 hidden h-[382px] w-full text-brand lg:block" viewBox="0 0 1180 382"
                    preserveAspectRatio="none" fill="none" aria-hidden="true">
                    <path d="M54 2 H1100 C1150 2 1176 38 1176 82 V297 C1176 346 1148 378 1098 378 H54"
                        stroke="currentColor" stroke-width="5" stroke-linecap="round" />
                </svg>

                <div class="absolute bottom-4 left-[19px] top-4 w-0.5 bg-brand lg:hidden" aria-hidden="true"></div>
                <div class="relative grid gap-9 lg:grid-cols-3 lg:gap-x-16 lg:gap-y-12">
                    <?php
                    $timeline_positions = [
                        3 => 'lg:col-start-3 lg:row-start-2',
                        4 => 'lg:col-start-2 lg:row-start-2',
                        5 => 'lg:col-start-1 lg:row-start-2',
                    ];
                    foreach ($timeline as $index => $item):
                        $desktop_position = $timeline_positions[$index] ?? ''; ?>
                        <?php
                        $timeline_image = $item['image'] ?? '';
                        $timeline_icon = $item['icon'] ?? 'bi-calendar-event';
                        ?>
                        <article
                            class="relative grid grid-cols-[40px_1fr] gap-4 lg:block lg:min-h-[330px] lg:text-center <?php echo esc_attr($desktop_position); ?>">
                            <span
                                class="relative z-10 mt-1 block size-10 rounded-full border-[7px] border-surface bg-brand ring-2 ring-brand lg:absolute lg:left-1/2 lg:top-[-20px] lg:-translate-x-1/2"
                                aria-hidden="true"></span>
                            <div class="lg:pt-11">
                                <span
                                    class="ml-0 flex size-16 items-center justify-center rounded-full bg-white text-3xl text-brand shadow-sm sm:size-[72px] lg:mx-auto lg:size-20">
                                    <?php if ($timeline_image): ?>
                                        <img src="<?php echo esc_url($timeline_image); ?>" alt=""
                                            class="h-10 w-10 object-contain sm:h-12 sm:w-12 lg:h-14 lg:w-14" loading="lazy">
                                    <?php else: ?>
                                        <i class="bi <?php echo esc_attr($timeline_icon); ?>" aria-hidden="true"></i>
                                    <?php endif; ?>
                                </span>
                                <p class="mt-4 text-xl font-bold uppercase text-brand">
                                    <?php echo esc_html($item['year']); ?>
                                </p>
                                <h3
                                    class="mt-2 inline-flex rounded-lg bg-brand px-4 py-1.5 [font-family:'Hanken_Grotesk',sans-serif] text-xs font-bold uppercase tracking-wide text-white sm:text-sm">
                                    <?php echo esc_html($item['title']); ?>
                                </h3>
                                <p class="mx-auto mt-3 max-w-[310px] text-sm leading-5 text-mid-gray">
                                    <?php echo esc_html($item['copy']); ?>
                                </p>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>

            <div
                class="mt-12 grid overflow-hidden rounded-xl border border-line bg-white shadow-sm sm:grid-cols-2 lg:mt-16 lg:grid-cols-3 xl:grid-cols-6">
                <?php foreach ($timeline_values as $value): ?>
                    <?php $value_icon = $value['icon'] ?? ''; ?>
                    <article class="border-b border-line p-5 last:border-b-0 sm:border-r lg:p-6 xl:border-b-0">
                        <?php if ($value_icon): ?><i class="bi <?php echo esc_attr($value_icon); ?> text-3xl text-brand"
                                aria-hidden="true"></i><?php endif; ?>
                        <h3 class="mt-3 text-xs font-bold uppercase leading-5 text-brand">
                            <?php echo esc_html($value['title']); ?>
                        </h3>
                        <p class="mt-2 text-xs leading-5 text-mid-gray"><?php echo esc_html($value['copy']); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section> -->
</article>
<?php get_footer();
