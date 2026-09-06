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
    ['title' => 'Identifying the Need', 'copy' => 'Tourism bodies recognize the lack of digital connectivity for small operators.'],
    ['title' => 'Global Tender', 'copy' => 'A rigorous selection process to find the world\'s best exchange architecture.'],
    ['title' => 'National Backing', 'copy' => 'All STOs and Federal organizations align to support a single national standard.'],
    ['title' => 'Rapid Adoption', 'copy' => 'Thousands of suppliers connect via a growing network of booking systems.'],
    ['title' => 'Global Expansion', 'copy' => 'The underlying technology exports to international markets like the UK and US.'],
    ['title' => 'The Future Hub', 'copy' => 'Evolving with data insights to drive Australia\'s tourism productivity.'],
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
                            class="inline-flex max-w-full rounded-lg bg-brand px-5 py-3 font-bold uppercase leading-5 text-white">
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
                            <img src="<?php echo esc_url(get_theme_file_uri('/images/' . $country['icon'])); ?>"
                                alt="" class="h-5 w-auto shrink-0 brightness-0 invert" aria-hidden="true">
                        <?php endif; ?>
                        <?php echo esc_html(strtoupper($country['name'])); ?>
                    </div><?php endforeach; ?>
            </div>
        </div>
    </section>
    <section class="bg-surface px-4 py-14 sm:py-16 lg:px-16 lg:py-24">
        <div class="mx-auto max-w-[1280px]">
            <h2
                class="text-center [font-family:'Hanken_Grotesk',sans-serif] text-3xl font-bold leading-tight tracking-[-.01em] text-[#151c27]">
                How TXA became Australia’s tourism exchange</h2>
            <div class="relative mx-auto mt-10 max-w-[896px] sm:mt-12 lg:mt-16">
                <div class="absolute bottom-0 left-5 top-0 w-0.5 bg-brand/20 sm:left-6 md:left-1/2 md:-translate-x-1/2"
                    aria-hidden="true"></div>
                <div class="space-y-10 sm:space-y-12 md:space-y-24">
                    <?php foreach ($timeline as $index => $item):
                        $is_left = 0 === $index % 2; ?>
                        <div class="relative grid min-h-[56px] grid-cols-1 pl-16 sm:pl-20 md:grid-cols-2 md:gap-16 md:pl-0">
                            <div class="<?php echo $is_left ? 'md:pr-8 md:text-right' : 'md:col-start-2 md:pl-8'; ?>">
                                <h3
                                    class="[font-family:'Hanken_Grotesk',sans-serif] text-base font-semibold text-[#151c27]">
                                    <?php echo esc_html($item['title']); ?>
                                </h3>
                                <p class="mt-1 text-sm leading-5 text-mid-gray"><?php echo esc_html($item['copy']); ?></p>
                            </div><span
                                class="absolute left-0 top-0 flex size-10 items-center justify-center rounded-full border-4 border-[#e7eefe] bg-brand text-sm font-bold text-white sm:size-12 sm:text-base md:left-1/2 md:-translate-x-1/2"><?php echo esc_html($index + 1); ?></span>
                        </div><?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
</article>
<?php get_footer();
