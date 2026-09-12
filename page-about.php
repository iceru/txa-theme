<?php
/**
 * Template Name: About TXA
 * @package TailPress
 */

add_filter('pre_get_document_title', fn(): string => 'About TXA | Tourism Exchange Australia');
add_action('wp_head', function (): void {
    if (is_page_template('page-about.php')) {
        echo '<meta name="description" content="' . esc_attr('Learn how TXA became Australia\'s open B2B tourism exchange for suppliers, destinations, distributors and booking systems.') . '">' . "\n";
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
    ['name' => 'United Kingdom', 'icon' => 'txgb.png'],
    ['name' => 'Japan', 'icon' => 'txj.png'],
    ['name' => 'Saudi Arabia', 'icon' => null],
    ['name' => 'United States', 'icon' => 'txusa.png'],
];
$timeline = [
    ['year' => '2012', 'title' => 'The Conviction', 'copy' => 'TXA was born from a simple conviction: Australian tourism deserved a national exchange that worked for the whole industry, not just the biggest players.', 'icon' => 'bi-lightbulb'],
    ['year' => '2013', 'title' => 'Global Tender', 'copy' => 'TXA was selected through a global tender as the technology partner for Australia\'s national booking exchange.', 'icon' => 'bi-search'],
    ['year' => '2014', 'title' => 'National Support', 'copy' => 'Backed by every State and Federal Government Tourism Organisation, TXA launched as Australia\'s open, commercially neutral booking exchange.', 'icon' => 'bi-people'],
    ['year' => '2015', 'title' => 'Exchange Launched', 'copy' => 'TXA launched its platform, connecting tourism suppliers, destinations, distributors and booking systems through one shared platform.', 'icon' => 'bi-display'],
    ['year' => '2018+', 'title' => 'Global Expansion', 'copy' => 'The same exchange technology began powering tourism platforms internationally.', 'icon' => 'bi-globe2'],
    ['year' => 'Today', 'title' => 'Built Here. For Here.', 'copy' => 'TXA remains Australia\'s own: built here, run here, and designed to keep more of the value of Australian tourism circulating within the Australian visitor economy.', 'icon' => 'bi-heart'],
];
$timeline_values = [
    ['title' => 'Australia\'s Own', 'copy' => 'Proudly built and operated in Australia.', 'icon' => 'bi-geo-alt'],
    ['title' => 'For the Industry', 'copy' => 'Designed for all tourism businesses, big and small.', 'icon' => 'bi-people'],
    ['title' => 'Government Backed', 'copy' => 'Supported by every State and Federal Government Tourism Organisation.', 'icon' => 'bi-building-check'],
    ['title' => 'One Connected Platform', 'copy' => 'Connecting suppliers, destinations, distributors and booking systems seamlessly.', 'icon' => 'bi-diagram-3'],
    ['title' => 'Global Impact', 'copy' => 'Powering tourism platforms in the UK, Japan, Saudi Arabia and the United States.', 'icon' => 'bi-globe-americas'],
    ['title' => 'Value Stays in Australia', 'copy' => 'Keeping more of the value of Australian tourism circulating within the Australian visitor economy.', 'icon' => 'bi-currency-dollar'],
];
?>
<article class="bg-white text-near-black [font-family:'Source_Sans_Pro',sans-serif]">
    <section class="px-4 pb-6 pt-3 sm:pt-5 lg:px-16 lg:pb-16 lg:pt-8">
        <div class="mx-auto max-w-[1312px]">
            <div
                class="relative flex min-h-[590px] items-center overflow-hidden rounded-xl bg-near-black sm:min-h-[560px] sm:rounded-2xl lg:min-h-[600px]">
                <img src="<?php echo esc_url(get_theme_file_uri('/images/about-1.jpg')); ?>"
                    alt="Australian tourism landscape"
                    class="absolute inset-0 h-full w-full object-cover object-center">
                <div class="absolute inset-0 bg-near-black/55 sm:bg-near-black/45" aria-hidden="true"></div>
                <div
                    class="relative z-10 flex min-h-[590px] items-center px-5 py-10 sm:min-h-[560px] sm:px-8 sm:py-16 lg:min-h-[600px] lg:px-8 lg:py-24">
                    <div class="w-full max-w-[760px]">
                        <p
                            class="inline-flex w-fit max-w-full rounded-lg bg-brand px-4 py-2 text-sm font-bold sm:px-5 sm:py-3 sm:text-base uppercase leading-5 text-white">
                            About Us</p>
                        <h1
                            class="mt-4 max-w-[760px] [font-family:'Hanken_Grotesk',sans-serif] text-[34px] font-semibold leading-[1.08] text-white min-[390px]:text-4xl sm:text-5xl lg:leading-[56px]">
                            Built for Australia’s tourism industry</h1>
                        <p
                            class="mt-4 max-w-[660px] text-base font-medium leading-6 text-white sm:text-lg sm:leading-[30px]">
                            Our journey started in Australia, being selected through a global tender in 2008 to partner
                            with the Australian Tourism Data Warehouse (ATDW) and then backed by State and Federal GTOs.
                            We operate as the structural backbone that allows local operators to compete on a global
                            scale while maintaining their commercial independence.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="px-4 py-12 sm:py-14 lg:px-16 lg:py-16">
        <div class="mx-auto max-w-[1312px]">
            <h2 class="[font-family:'Hanken_Grotesk',sans-serif] text-3xl font-bold tracking-[-.01em] text-[#151c27]">
                What TXA does</h2>
            <p class="mt-4 text-base leading-7 text-[#151c27] sm:mt-6 sm:text-lg sm:leading-[29px]">Tourism Exchange
                Australia is Australia’s open B2B tourism exchange. It connects tourism suppliers, destinations,
                distributors and booking systems so live tourism products can be found, marketed, booked and measured
                online.</p>
            <div class="mt-10 grid gap-5 sm:grid-cols-2 sm:mt-12 xl:mt-16 xl:grid-cols-4 xl:gap-6">
                <?php foreach ($what_txa_does as $card): ?>
                    <article class="rounded-xl border border-[#dfc0ba]/10 bg-white p-6 shadow-sm sm:min-h-[210px] sm:p-8"><i
                            class="bi <?php echo esc_attr($card['icon']); ?> text-3xl text-brand" aria-hidden="true"></i>
                        <h3 class="mt-4 [font-family:'Hanken_Grotesk',sans-serif] text-xl font-semibold text-[#151c27]">
                            <?php echo esc_html($card['title']); ?>
                        </h3>
                        <p class="mt-2 text-sm leading-6 text-mid-gray"><?php echo esc_html($card['copy']); ?></p>
                    </article><?php endforeach; ?>
            </div>
        </div>
    </section>
    <section class="bg-brand px-4 py-12 text-white sm:py-14 lg:px-16 lg:py-16">
        <div class="mx-auto grid max-w-[1280px] gap-8 lg:grid-cols-[672px_1fr] lg:items-center lg:gap-24">
            <div>
                <h2
                    class="[font-family:'Hanken_Grotesk',sans-serif] text-3xl font-bold leading-tight tracking-[-.01em]">
                    Proven exchange technology, built for Australia</h2>
                <p class="mt-4 text-base leading-7 text-white/90 sm:mt-6 sm:text-lg sm:leading-[29px]">Today, the same
                    exchange technology powers tourism platforms in the UK, Japan, Saudi Arabia, and the US. TXA remains
                    Australia’s own—tailored for our unique geography and market dynamics.</p>
            </div>
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 sm:gap-6 lg:gap-x-8 lg:gap-y-8">
                <?php foreach ($countries as $country): ?>
                    <div
                        class="flex items-center gap-2 rounded-lg border border-white/15 bg-white/5 p-3 text-sm text-white sm:border-0 sm:bg-transparent sm:p-0 sm:text-base">
                        <?php if (!empty($country['icon'])): ?>
                            <img src="<?php echo esc_url(get_theme_file_uri('/images/' . $country['icon'])); ?>" alt=""
                                class="h-5 w-auto shrink-0 brightness-0 invert" aria-hidden="true">
                        <?php endif; ?>
                        <?php echo esc_html(strtoupper($country['name'])); ?>
                    </div><?php endforeach; ?>
            </div>
        </div>
    </section>
    <section class="bg-surface px-4 py-14 sm:py-16 lg:px-16 lg:py-24">
        <div class="mx-auto max-w-[1312px]">
            <div class="text-center">
                <h2
                    class="[font-family:'Hanken_Grotesk',sans-serif] text-3xl font-bold uppercase leading-tight tracking-[-.01em] text-[#151c27] sm:text-4xl">
                    TXA Journey</h2>
                <p class="mt-2 text-sm font-bold uppercase tracking-[.04em] text-brand sm:text-base">Built in Australia.
                    Connected to the world. Powering our industry.</p>
            </div>

            <div class="relative mx-auto mt-12 max-w-[1180px] lg:mt-16">
                <svg class="absolute inset-x-0 top-0 hidden h-[382px] w-full text-brand lg:block" viewBox="0 0 1180 382"
                    preserveAspectRatio="none" fill="none" aria-hidden="true">
                    <path d="M54 2 H1100 C1150 2 1176 38 1176 82 V297 C1176 346 1148 378 1098 378 H54" stroke="currentColor"
                        stroke-width="5" stroke-linecap="round" />
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
                        <article
                            class="relative grid grid-cols-[40px_1fr] gap-4 lg:block lg:min-h-[330px] lg:text-center <?php echo esc_attr($desktop_position); ?>">
                            <span
                                class="relative z-10 mt-1 block size-10 rounded-full border-[7px] border-surface bg-brand ring-2 ring-brand lg:absolute lg:left-1/2 lg:top-[-20px] lg:-translate-x-1/2"
                                aria-hidden="true"></span>
                            <div class="lg:pt-11">
                                <span
                                    class="ml-0 flex size-16 items-center justify-center rounded-full bg-white text-3xl text-brand shadow-sm sm:size-[72px] lg:mx-auto lg:size-20">
                                    <i class="bi <?php echo esc_attr($item['icon']); ?>" aria-hidden="true"></i>
                                </span>
                                <p class="mt-4 text-xl font-bold uppercase text-[#151c27]">
                                    <?php echo esc_html($item['year']); ?></p>
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
                    <article class="border-b border-line p-5 last:border-b-0 sm:border-r lg:p-6 xl:border-b-0">
                        <i class="bi <?php echo esc_attr($value['icon']); ?> text-3xl text-brand" aria-hidden="true"></i>
                        <h3 class="mt-3 text-xs font-bold uppercase leading-5 text-[#151c27]">
                            <?php echo esc_html($value['title']); ?>
                        </h3>
                        <p class="mt-2 text-xs leading-5 text-mid-gray"><?php echo esc_html($value['copy']); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</article>
<?php get_footer();
