<?php
/**
 * Template Name: About TXA
 *
 * @package TailPress
 */

add_filter('pre_get_document_title', function (): string {
    return 'About TXA | Tourism Exchange Australia';
});

add_action('wp_head', function (): void {
    if (is_page_template('page-about.php')) {
        echo '<meta name="description" content="' . esc_attr('Learn how TXA became Australia\'s open B2B tourism exchange for suppliers, destinations, distributors and booking systems.') . '">' . "\n";
    }
});

get_header();

$what_txa_does = [
    [
        'title' => 'Suppliers',
        'copy' => 'Accommodation, tours, and attractions seeking global visibility.',
        'icon' => '<path d="M4 10h16l-1 10H5L4 10Z"/><path d="M7 10V7a5 5 0 0 1 10 0v3"/><path d="M8 14h.01M12 14h.01M16 14h.01"/>',
    ],
    [
        'title' => 'Destinations',
        'copy' => 'Regional tourism bodies empowering local businesses to go digital.',
        'icon' => '<path d="M4 5v14"/><path d="M4 6c3-2 5 2 8 0s5 2 8 0v11c-3 2-5-2-8 0s-5-2-8 0"/>',
    ],
    [
        'title' => 'Distributors',
        'copy' => 'Global OTAs, websites, and travel agents sourcing live inventory.',
        'icon' => '<circle cx="12" cy="12" r="8"/><path d="M4 12h16"/><path d="M12 4a12 12 0 0 1 0 16"/><path d="M12 4a12 12 0 0 0 0 16"/>',
    ],
    [
        'title' => 'Booking Systems',
        'copy' => 'Software providers connecting inventory to the national hub.',
        'icon' => '<path d="M5 7h14"/><path d="M7 7l-2 10h14L17 7"/><path d="M9 17l1-10"/><path d="M15 17l-1-10"/><path d="M8 12h8"/>',
    ],
];

$countries = ['United Kingdom', 'Japan', 'Saudi Arabia', 'United States'];

$timeline = [
    [
        'title' => 'Identifying the Need',
        'copy' => 'Tourism bodies recognize the lack of digital connectivity for small operators.',
    ],
    [
        'title' => 'Global Tender',
        'copy' => 'A rigorous selection process to find the world\'s best exchange architecture.',
    ],
    [
        'title' => 'National Backing',
        'copy' => 'All STOs and Federal organizations align to support a single national standard.',
    ],
    [
        'title' => 'Rapid Adoption',
        'copy' => 'Thousands of suppliers connect via a growing network of booking systems.',
    ],
    [
        'title' => 'Global Expansion',
        'copy' => 'The underlying technology exports to international markets like the UK and US.',
    ],
    [
        'title' => 'The Future Hub',
        'copy' => 'Evolving with data insights to drive Australia\'s tourism productivity.',
    ],
];
?>

<article class="bg-white text-near-black">
    <section class="px-4 py-8 lg:px-8">
        <div class="container mx-auto">
            <div class="relative min-h-[520px] overflow-hidden rounded-lg bg-near-black md:min-h-[630px]">
                <img src="https://images.unsplash.com/photo-1523482580672-f109ba8cb9be?auto=format&fit=crop&w=2200&q=80"
                    alt="Sydney Harbour and city skyline"
                    class="absolute inset-0 h-full w-full object-cover">
                <div class="absolute inset-0 bg-near-black/50" aria-hidden="true"></div>
                <div class="relative z-10 flex min-h-[520px] items-center p-6 md:min-h-[630px] md:p-9">
                    <div class="max-w-3xl">
                        <p class="inline-flex rounded bg-brand px-4 py-2 text-xs font-bold uppercase tracking-wide text-white">
                            About Us
                        </p>
                        <h1 class="mt-6 max-w-2xl text-4xl font-semibold leading-tight text-white md:text-6xl">
                            Built for Australia's tourism industry
                        </h1>
                        <p class="mt-6 max-w-2xl text-base font-semibold leading-8 text-white/90 md:text-lg">
                            TXA was born from a simple conviction: Australian tourism deserved a national exchange that worked for the whole industry, providing a neutral gateway for commerce to flow freely. Selected through a global tender and backed by every State and Federal Government Tourism Organisation, we operate as the structural backbone that allows local operators to compete on a global scale while maintaining their commercial independence.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="px-4 py-10 lg:px-8 lg:py-16">
        <div class="container mx-auto">
            <div class="max-w-3xl">
                <h2 class="text-3xl font-semibold leading-tight md:text-4xl">What TXA does</h2>
                <p class="mt-7 text-base leading-8 text-near-black/80">
                    Tourism Exchange Australia is Australia's open B2B tourism exchange. It connects tourism suppliers, destinations, distributors and booking systems so live tourism products can be found, marketed, booked and measured online.
                </p>
            </div>

            <div class="mt-16 grid gap-6 md:grid-cols-2 xl:grid-cols-4">
                <?php foreach ($what_txa_does as $card): ?>
                    <article class="rounded border border-line bg-white p-7 shadow-sm">
                        <svg class="size-7 text-brand" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <?php echo $card['icon']; ?>
                        </svg>
                        <h3 class="mt-5 text-xl font-semibold"><?php echo esc_html($card['title']); ?></h3>
                        <p class="mt-3 text-sm leading-6 text-mid-gray"><?php echo esc_html($card['copy']); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="bg-brand px-4 py-14 text-white lg:px-8 lg:py-20">
        <div class="container mx-auto">
            <div class="grid gap-10 lg:grid-cols-[1fr_.9fr] lg:items-center">
                <div>
                    <h2 class="max-w-3xl text-3xl font-semibold leading-tight md:text-4xl">
                        Proven exchange technology, built for Australia
                    </h2>
                    <p class="mt-7 max-w-2xl text-base leading-8 text-white/90">
                        Today, the same exchange technology powers tourism platforms in the UK, Japan, Saudi Arabia, and the US. TXA remains Australia's own, tailored for our unique geography and market dynamics.
                    </p>
                </div>
                <div class="grid gap-x-16 gap-y-8 sm:grid-cols-2">
                    <?php foreach ($countries as $country): ?>
                        <div class="flex items-center gap-3 text-sm font-semibold uppercase tracking-wide text-white">
                            <svg class="size-6 shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <path d="M20 10c0 5-8 11-8 11S4 15 4 10a8 8 0 1 1 16 0Z"/>
                                <circle cx="12" cy="10" r="3"/>
                            </svg>
                            <?php echo esc_html($country); ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-surface px-4 py-14 lg:px-8 lg:py-24">
        <div class="container mx-auto">
            <h2 class="text-center text-3xl font-semibold leading-tight md:text-4xl">
                How TXA became Australia's tourism exchange
            </h2>

            <div class="relative mx-auto mt-16 max-w-4xl">
                <div class="absolute left-6 top-0 h-full w-px bg-brand/20 md:left-1/2 md:-translate-x-1/2" aria-hidden="true"></div>
                <div class="space-y-14">
                    <?php foreach ($timeline as $index => $item): ?>
                        <?php $is_left = 0 === $index % 2; ?>
                        <div class="relative grid gap-6 pl-20 md:grid-cols-2 md:gap-16 md:pl-0">
                            <div class="<?php echo $is_left ? 'md:text-right' : 'md:col-start-2'; ?>">
                                <h3 class="text-base font-semibold"><?php echo esc_html($item['title']); ?></h3>
                                <p class="mt-1 text-sm leading-5 text-mid-gray"><?php echo esc_html($item['copy']); ?></p>
                            </div>
                            <span class="absolute left-2 top-0 flex size-10 items-center justify-center rounded-full bg-brand text-sm font-bold text-white shadow-lg shadow-brand/25 md:left-1/2 md:-translate-x-1/2">
                                <?php echo esc_html($index + 1); ?>
                            </span>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
</article>

<?php
get_footer();
