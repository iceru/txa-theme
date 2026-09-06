<?php
/**
 * Template Name: Destination POI & Experiences
 *
 * @package TailPress
 */

get_header();

$demo_url = home_url('/request-demo/');

$feature_cards = [
    [
        'icon' => 'bi-image',
        'title' => 'Points of Interest (POIs)',
        'copy' => 'Build POIs for free visitor experiences, landmarks, attractions and public places. Enrich your maps with detailed content that matters to travelers.',
        'tags' => ['Landmarks', 'Public Spaces', 'Natural Attractions'],
        'featured' => true,
    ],
    [
        'icon' => 'bi-stars',
        'title' => 'Connect Content',
        'copy' => 'Connect content with bookable suppliers so visitors can act on inspiration immediately.',
        'cta' => 'Learn how',
        'url' => home_url('/destinations/'),
        'red' => true,
    ],
    [
        'icon' => 'bi-calendar3',
        'title' => 'Themed Experiences',
        'copy' => 'Create recommended experiences for seasons, regions, events or specific visitor types.',
    ],
    [
        'icon' => 'bi-window-sidebar',
        'title' => 'Omnichannel Distribution',
        'copy' => 'Use POIs and experiences in destination pages, trade pages, campaign microsites and virtual concierge journeys. Reach your audience wherever they are.',
        'wide' => true,
    ],
];
?>

<article class="bg-white text-near-black [font-family:'Source_Sans_Pro',sans-serif]">
    <section class="bg-surface px-4 py-14 sm:py-16 lg:px-16 lg:py-24">
        <div class="mx-auto grid max-w-[1312px] gap-10 lg:grid-cols-[1fr_600px] lg:items-center lg:gap-16">
            <div>
                <p class="inline-flex rounded-lg bg-brand px-5 py-3 text-xs font-bold uppercase text-white sm:text-sm">
                    Point of Interests &amp; Experiences</p>
                <h1
                    class="mt-8 max-w-[610px] [font-family:'Hanken_Grotesk',sans-serif] text-4xl font-bold leading-[1.18] text-[#151c27] sm:text-5xl lg:text-[56px] lg:leading-[1.15]">
                    Create destination content that <span class="text-brand">connects</span> to bookable product</h1>
                <p class="mt-6 max-w-[540px] text-lg leading-8 text-mid-gray">TXA allows a destination to add Points of
                    Interest - free things to see and do - and to create recommended experiences and suggested
                    itineraries.</p>
                <a href="<?php echo esc_url($demo_url); ?>"
                    class="mt-8 inline-flex min-h-12 w-full items-center justify-center gap-3 rounded-lg bg-brand px-7 py-3 text-base font-bold text-white !no-underline hover:bg-brand-dark sm:w-auto">Discuss
                    destination content activation <i class="bi bi-arrow-right text-xl" aria-hidden="true"></i></a>
            </div>
            <div class="overflow-hidden rounded-lg shadow-sm">
                <img src="<?php echo esc_url(get_theme_file_uri('/images/map.jpg')); ?>"
                    alt="Destination points of interest map"
                    class="aspect-[4/3] w-full object-cover lg:aspect-[600/402]">
            </div>
        </div>
    </section>

    <section class="px-4 py-16 sm:py-20 lg:px-16 lg:py-24">
        <div class="mx-auto max-w-[1312px]">
            <div class="mx-auto max-w-[720px] text-center">
                <h2
                    class="[font-family:'Hanken_Grotesk',sans-serif] text-3xl font-bold leading-tight text-[#151c27] sm:text-4xl">
                    Transforming destination assets into visitor journeys</h2>
                <p class="mt-6 text-base leading-7 text-mid-gray">A unified ecosystem to manage free landmarks alongside
                    bookable experiences.</p>
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
