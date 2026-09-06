<?php
/**
 * Template Name: TXA Homepage
 *
 * @package TailPress
 */

get_header();

$hero_slides = [
    [
        'label' => 'Tourism Exchange Australia',
        'title' => "Australia's B2B Tourism Exchange",
        'copy' => 'TXA connects Australian tourism suppliers, destinations, distributors and booking systems so tourism products can be found, marketed, booked and measured online.',
        'image' => get_theme_file_uri('/images/Lavender Bay, Sydney.jpg'),
    ],
    [
        'label' => 'Connected tourism supply',
        'title' => 'Bookable product across more channels',
        'copy' => 'Help accommodation, tours, attractions, events and experiences move through destination websites, reseller networks and trade partners.',
        'image' => get_theme_file_uri('/images/Great Barrier Reef, Whitsundays.jpg'),
    ],
    [
        'label' => 'Smart destination infrastructure',
        'title' => 'Turn destination interest into bookings',
        'copy' => 'Connect local suppliers, owned digital assets, distributor pathways and visitor data through one neutral national exchange.',
        'image' => get_theme_file_uri('/images/Broome, Western Australia.jpg'),
    ],
    [
        'label' => 'Distributor-ready inventory',
        'title' => 'Australian tourism product, ready for market',
        'copy' => 'Give distributors and booking-system partners a practical way to connect with live Australian tourism supply.',
        'image' => get_theme_file_uri('/images/Baines, Northern Territory.jpg'),
    ],
];

$ecosystem = ['Suppliers', 'Booking Systems', 'TXA', 'Destinations', 'Distributors', 'Travellers'];

$audiences = [
    [
        'title' => 'Tourism Suppliers',
        'copy' => 'Connect through your booking system and make your product bookable across more channels.',
        'cta' => 'Apply Now',
        'url' => home_url('/apply-now/'),
        'image' => get_theme_file_uri('/images/Coffin Bay, Eyre Peninsula.jpg'),
    ],
    [
        'title' => 'Destinations',
        'copy' => 'Become a Smart Destination and make local supply bookable through your own digital assets.',
        'cta' => 'Explore Destinations',
        'url' => home_url('/destinations/'),
        'image' => get_theme_file_uri('/images/Twilight Beach 2, Esperance.jpg'),
    ],
    [
        'title' => 'Distributors',
        'copy' => 'Access bookable Australian tourism inventory through TXA connected supply.',
        'cta' => 'Become a Distributor',
        'url' => home_url('/distributors/'),
        'image' => get_theme_file_uri('/images/Perth 2, Western Australia.jpg'),
    ],
    [
        'title' => 'Booking Systems',
        'copy' => 'Connect your booking system to TXA and unlock distribution for your customers.',
        'cta' => 'Partner Enquiry',
        'url' => home_url('/booking-systems/'),
        'image' => get_theme_file_uri('/images/Elephant Rock, Kimberley.jpg'),
    ],
];

$smart_cards = [
    ['title' => 'Activate digital assets', 'copy' => 'Turn destination websites, apps and visitor touchpoints into conversion-ready channels.'],
    ['title' => 'Digitise local supply', 'copy' => 'Help local operators bring bookable products, pricing and availability online.'],
    ['title' => 'Connect supply to the world', 'copy' => 'Open inventory pathways to trade channels, resellers and owned destination channels.'],
    ['title' => 'Own your data', 'copy' => 'Use activity, campaign and booking signals to see what is driving outcomes.'],
];

if (!function_exists('txa_button')) {
    function txa_button(string $label, string $url, string $variant = 'primary'): string
    {
        $classes = 'inline-flex min-h-12 w-full items-center justify-center rounded-lg px-5 py-3 text-center text-sm font-bold leading-5 !no-underline transition sm:w-auto sm:px-6';

        if ('secondary' === $variant) {
            $classes .= ' border border-line bg-white text-brand hover:bg-surface';
        } elseif ('light' === $variant) {
            $classes .= ' border border-white bg-white/10 text-white hover:bg-white/20';
        } else {
            $classes .= ' bg-brand text-white hover:bg-brand-dark';
        }

        return sprintf('<a class="%s" href="%s">%s</a>', esc_attr($classes), esc_url($url), esc_html($label));
    }
}
?>

<article class="txa-homepage bg-white text-near-black [font-family:'Source_Sans_Pro',sans-serif]">
    <section class="px-3 pb-6 pt-3 sm:px-4 sm:pt-5 lg:px-10 lg:pb-16 lg:pt-8">
        <div class="mx-auto max-w-[1360px]">
            <div class="txa-hero-slider relative min-h-[590px] overflow-hidden rounded-xl bg-near-black sm:min-h-[560px] sm:rounded-2xl lg:min-h-[600px]" data-hero-slider>
                <?php foreach ($hero_slides as $index => $slide): ?>
                    <img src="<?php echo esc_url($slide['image']); ?>" alt=""
                        class="<?php echo 0 === $index ? 'opacity-100' : 'opacity-0'; ?> absolute inset-0 h-full w-full object-cover object-center transition-opacity duration-700"
                        data-hero-slide-image="<?php echo esc_attr($index); ?>">
                <?php endforeach; ?>
                <div class="absolute inset-0 bg-near-black/55 sm:bg-near-black/45" aria-hidden="true"></div>

                <div class="relative z-10 flex min-h-[590px] items-center px-5 pb-24 pt-10 sm:min-h-[560px] sm:px-8 sm:py-16 lg:min-h-[600px] lg:px-8 lg:py-24">
                    <div class="w-full max-w-[780px]">
                        <p data-hero-slide-label class="inline-flex max-w-full rounded-lg bg-brand px-3 py-2 text-xs font-bold leading-5 text-white sm:px-4 sm:text-xl">
                            <?php echo esc_html($hero_slides[0]['label']); ?>
                        </p>
                        <h1 data-hero-slide-title class="mt-4 max-w-[760px] [font-family:'Hanken_Grotesk',sans-serif] text-[34px] font-semibold leading-[1.08] text-white min-[390px]:text-4xl sm:text-5xl lg:text-[64px] lg:leading-[72px]">
                            <?php echo esc_html($hero_slides[0]['title']); ?>
                        </h1>
                        <p data-hero-slide-copy class="mt-4 max-w-[660px] text-base font-semibold leading-6 text-white sm:text-xl sm:leading-7 lg:text-2xl lg:leading-normal">
                            <?php echo esc_html($hero_slides[0]['copy']); ?>
                        </p>
                        <div class="mt-6 flex flex-col gap-3 sm:flex-row sm:gap-4">
                            <?php echo txa_button('Apply Now', home_url('/apply-now/')); ?>
                            <?php echo txa_button('Request Smart Destination Demo', home_url('/request-demo/'), 'light'); ?>
                        </div>
                    </div>
                </div>

                <div class="absolute bottom-5 left-1/2 z-20 flex -translate-x-1/2 items-center gap-2 rounded-full bg-white p-2.5 shadow-sm sm:bottom-6 sm:left-auto sm:right-6 sm:translate-x-0 sm:p-3 lg:bottom-8 lg:right-8" aria-label="Hero slides">
                    <?php foreach ($hero_slides as $index => $slide): ?>
                        <button type="button"
                            class="<?php echo 0 === $index ? 'w-7 bg-brand' : 'w-2.5 bg-near-black/10'; ?> h-2.5 rounded-full transition-all"
                            aria-label="<?php echo esc_attr('Show slide ' . ($index + 1) . ': ' . $slide['title']); ?>"
                            aria-pressed="<?php echo 0 === $index ? 'true' : 'false'; ?>"
                            data-hero-slide-label-value="<?php echo esc_attr($slide['label']); ?>"
                            data-hero-slide-title-value="<?php echo esc_attr($slide['title']); ?>"
                            data-hero-slide-copy-value="<?php echo esc_attr($slide['copy']); ?>"
                            data-hero-slide-dot="<?php echo esc_attr($index); ?>"></button>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <section class="px-4 py-9 sm:py-10 lg:px-16 lg:py-16">
        <div class="mx-auto max-w-[1312px]">
            <div class="grid gap-8 sm:gap-10 lg:grid-cols-[1fr_1.02fr] lg:items-start lg:gap-12">
                <div class="max-w-[629px]">
                    <h2 class="[font-family:'Hanken_Grotesk',sans-serif] text-[28px] font-bold leading-9 tracking-[-0.01em] text-[#151c27] sm:text-3xl sm:leading-10">
                        Australia's national tourism exchange.<br>
                        <span class="text-brand">How TXA was built and why</span>
                    </h2>
                    <div class="mt-5 space-y-5 text-base leading-7 text-near-black sm:mt-6 sm:space-y-6 sm:text-lg sm:leading-[1.625]">
                        <p>Tourism Exchange Australia was established in partnership with ATDW (an organisation representing all Australian State and Federal Government Tourism Organisations) as the nation's open, commercially neutral booking exchange.</p>
                        <p>Selected through a global tender, TXA was built to give every Australian tourism supplier, regardless of category, size or booking system, fair access to ecommerce and online distribution. The same exchange technology now powers tourism platforms in the United Kingdom, Japan, the United States and Saudi Arabia. TXA remains Australia's own.</p>
                    </div>
                </div>
                <div class="h-[240px] overflow-hidden rounded-lg border border-line sm:h-[368px]">
                    <img src="<?php echo esc_url(get_theme_file_uri('/images/Glenelg, Adelaide.jpg')); ?>" alt="Glenelg, Adelaide" class="h-full w-full object-cover">
                </div>
            </div>
        </div>
    </section>

    <section class="bg-surface px-4 py-9 sm:py-10 lg:p-16">
        <div class="mx-auto max-w-[1312px] rounded-lg bg-white px-5 py-6 shadow-[0_12px_28px_-8px_rgba(26,26,26,0.12)] sm:px-6 sm:py-8 lg:px-8 lg:py-[34px]">
            <div class="grid gap-7 sm:gap-9 lg:grid-cols-[450px_1fr] lg:items-center lg:gap-[71px]">
                <div>
                    <p class="text-xs uppercase leading-5 text-brand sm:text-base">Australia's own B2B tourism exchange</p>
                    <h2 class="mt-2 [font-family:'Hanken_Grotesk',sans-serif] text-[28px] font-semibold leading-9 sm:text-3xl sm:leading-tight lg:text-4xl lg:leading-[44px]">A connected tourism ecosystem</h2>
                    <p class="mt-3 text-base leading-7 text-mid-gray sm:leading-[30px]">TXA helps Australian tourism suppliers make their accommodation, tours, attractions, events and experiences bookable across more diverse channels through one open exchange.</p>
                </div>
                <div class="grid gap-3 sm:grid-cols-2 sm:gap-4 lg:grid-cols-3 lg:gap-x-[30px] lg:gap-y-[26px]">
                    <?php foreach ($ecosystem as $index => $node): ?>
                        <div class="<?php echo 2 === $index ? 'border-brand bg-brand-tint' : 'border-line bg-surface'; ?> flex min-h-[68px] items-center gap-3 rounded-lg border p-3.5 sm:min-h-[82px] sm:gap-[14px] sm:p-4">
                            <span class="flex size-8 shrink-0 items-center justify-center rounded-lg bg-brand text-sm text-white sm:size-[34px]"><?php echo esc_html($index + 1); ?></span>
                            <span class="text-sm leading-5 text-near-black"><?php echo esc_html($node); ?></span>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <section class="px-4 py-10 sm:py-12 lg:px-16 lg:py-16">
        <div class="mx-auto max-w-[1312px]">
            <div class="grid gap-4 sm:gap-5 md:grid-cols-[1fr_400px] md:items-end">
                <div>
                    <p class="text-xs uppercase leading-5 text-brand sm:text-sm">TXA pathway</p>
                    <h2 class="mt-2 [font-family:'Hanken_Grotesk',sans-serif] text-[28px] font-semibold leading-9 sm:mt-3 sm:text-3xl sm:leading-tight lg:text-4xl lg:leading-[44px]">How to Connect to TXA?</h2>
                </div>
                <p class="text-sm leading-6 text-mid-gray">Each pathway connects to the same national exchange infrastructure, with different entry points for each part of the visitor economy.</p>
            </div>

            <div class="mt-7 grid gap-4 sm:mt-8 sm:grid-cols-2 sm:gap-5 xl:grid-cols-4">
                <?php foreach ($audiences as $card): ?>
                    <article class="group flex min-h-[0] flex-col overflow-hidden rounded-lg border border-line bg-white shadow-[0_12px_28px_-8px_rgba(26,26,26,0.12)] sm:min-h-[360px]">
                        <div class="h-[160px] overflow-hidden sm:h-[180px]">
                            <img src="<?php echo esc_url($card['image']); ?>" alt="" class="h-full w-full object-cover transition duration-500 group-hover:scale-105">
                        </div>
                        <div class="flex grow flex-col px-5 pb-5 pt-4 sm:px-6 sm:pt-2">
                            <h3 class="text-lg font-semibold leading-7 sm:text-xl"><?php echo esc_html($card['title']); ?></h3>
                            <p class="mt-2 grow text-sm leading-6 text-mid-gray"><?php echo esc_html($card['copy']); ?></p>
                            <a href="<?php echo esc_url($card['url']); ?>" class="mt-4 inline-flex min-h-11 items-center gap-2 text-sm font-semibold text-brand !no-underline hover:text-brand-dark">
                                <?php echo esc_html($card['cta']); ?><span aria-hidden="true">→</span>
                            </a>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="px-4 py-9 sm:py-10 lg:px-16 lg:py-16">
        <div class="mx-auto max-w-[1312px] text-center">
            <h2 class="[font-family:'Hanken_Grotesk',sans-serif] text-[28px] font-semibold leading-9 sm:text-3xl sm:leading-tight lg:text-4xl lg:leading-[44px]">How TXA Works</h2>
            <a href="<?php echo esc_url(home_url('/how-txa-works/')); ?>" class="group relative mt-6 block h-[240px] overflow-hidden rounded-xl bg-near-black sm:mt-8 sm:h-[460px] sm:rounded-2xl lg:h-[551px]">
                <img src="<?php echo esc_url(get_theme_file_uri('/images/Frame 21.png')); ?>" alt="How TXA works" class="h-full w-full object-cover transition duration-700 group-hover:scale-[1.02]">
                <span class="absolute inset-0 bg-black/40" aria-hidden="true"></span>
                <span class="absolute left-1/2 top-1/2 flex size-16 -translate-x-1/2 -translate-y-1/2 items-center justify-center rounded-full bg-white/95 shadow-lg sm:size-[92px] lg:size-[114px]">
                    <svg viewBox="0 0 48 48" aria-hidden="true" class="ml-1 size-7 fill-near-black sm:size-10 lg:size-12"><path d="M17 12.5v23L36 24 17 12.5Z" /></svg>
                </span>
            </a>
        </div>
    </section>

    <section class="relative overflow-hidden bg-near-black px-4 py-10 text-white sm:py-12 lg:px-16 lg:py-16">
        <img src="<?php echo esc_url(get_theme_file_uri('/images/Torndirrup National Park, Torndirrup.jpg')); ?>" alt="Torndirrup National Park" class="absolute inset-0 h-full w-full object-cover">
        <div class="absolute inset-0 bg-black/75 sm:bg-black/70" aria-hidden="true"></div>
        <div class="relative z-10 mx-auto grid max-w-[1312px] gap-8 sm:gap-10 lg:grid-cols-[554px_1fr] lg:items-center lg:gap-12">
            <div>
                <p class="inline-flex rounded-lg bg-white/10 px-3 py-2 text-xs uppercase leading-5 text-white sm:px-4 sm:text-sm">Become a Smart Destination</p>
                <h2 class="mt-3 text-[28px] font-semibold leading-9 sm:text-3xl sm:leading-tight lg:text-4xl lg:leading-[44px]">Move destination marketing from inspiration to conversion</h2>
                <p class="mt-3 text-base leading-7 text-white sm:text-lg sm:leading-[30px]">Smart Destinations use TXA as digital infrastructure for their visitor economy. It connects local suppliers, destination content, owned websites and apps, trade channels, local reseller networks and real-time data.</p>
                <div class="mt-6 flex flex-col gap-3 sm:flex-row">
                    <?php echo txa_button('Explore Smart Destinations', home_url('/destinations/')); ?>
                    <?php echo txa_button('Request Demo', home_url('/request-demo/'), 'light'); ?>
                </div>
            </div>
            <div class="grid gap-3 sm:grid-cols-2 sm:gap-6">
                <?php foreach ($smart_cards as $index => $card): ?>
                    <article class="rounded-lg bg-white/15 p-4 backdrop-blur-md sm:bg-white/20 sm:p-5">
                        <span class="flex size-10 items-center justify-center rounded-lg bg-brand text-sm font-bold text-white sm:size-11 sm:text-base"><?php echo esc_html($index + 1); ?></span>
                        <h3 class="mt-3 text-lg font-bold leading-6 sm:mt-4 sm:text-xl"><?php echo esc_html($card['title']); ?></h3>
                        <p class="mt-2 text-sm leading-6 text-white sm:mt-4"><?php echo esc_html($card['copy']); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="bg-surface px-4 py-10 sm:py-12 lg:px-16 lg:py-[95px]">
        <div class="mx-auto grid max-w-[1312px] gap-8 sm:gap-10 lg:grid-cols-[1fr_700px] lg:items-center lg:gap-12">
            <div>
                <p class="text-xs uppercase leading-5 text-brand sm:text-sm">Data and insights</p>
                <h2 class="mt-2 max-w-[480px] text-[28px] font-semibold leading-9 sm:mt-3 sm:text-3xl sm:leading-tight lg:text-4xl lg:leading-[44px]">Data that helps destinations see what is working</h2>
                <p class="mt-3 max-w-[500px] text-base leading-7 text-mid-gray sm:text-lg sm:leading-[30px]">TXA helps destinations understand supplier activity, campaign performance, visitor engagement and booking outcomes through dashboards, attribution and data exports.</p>
                <div class="mt-6"><?php echo txa_button('Learn about Data & Insights', home_url('/data-insights/'), 'secondary'); ?></div>
            </div>
            <div class="flex min-h-[260px] items-center justify-center sm:min-h-[330px] lg:min-h-[414px]">
                <div class="w-full max-w-[700px] rounded-xl border border-line bg-white p-3 shadow-[0_12px_28px_-8px_rgba(26,26,26,0.12)] sm:p-6">
                    <div class="rounded-lg bg-[#f2f4f7] p-3 sm:p-4">
                        <div class="flex items-start justify-between gap-3 border-b border-line pb-3 sm:items-center">
                            <div><p class="text-[10px] font-bold uppercase tracking-wide text-brand sm:text-xs">TXA Dashboard</p><p class="mt-1 text-xs text-mid-gray sm:text-sm">Destination performance overview</p></div>
                            <span class="shrink-0 rounded bg-brand-tint px-2 py-1.5 text-[10px] font-semibold text-brand sm:px-3 sm:py-2 sm:text-xs">Live</span>
                        </div>
                        <div class="mt-3 grid grid-cols-1 gap-2 min-[390px]:grid-cols-3 sm:mt-4 sm:gap-3">
                            <div class="rounded bg-white p-2.5 sm:p-3"><p class="text-[10px] text-mid-gray sm:text-xs">Suppliers</p><p class="mt-1 text-lg font-bold sm:text-xl">1,284</p></div>
                            <div class="rounded bg-white p-2.5 sm:p-3"><p class="text-[10px] text-mid-gray sm:text-xs">Bookings</p><p class="mt-1 text-lg font-bold sm:text-xl">8,462</p></div>
                            <div class="rounded bg-white p-2.5 sm:p-3"><p class="text-[10px] text-mid-gray sm:text-xs">Channels</p><p class="mt-1 text-lg font-bold sm:text-xl">46</p></div>
                        </div>
                        <div class="mt-3 h-28 rounded bg-white p-3 sm:h-36 sm:p-4">
                            <div class="flex h-full items-end gap-1.5 sm:gap-2">
                                <?php foreach ([42, 66, 53, 82, 61, 91, 73, 100, 78, 88] as $height): ?><span class="grow rounded-t bg-brand/80" style="height: <?php echo esc_attr($height); ?>%"></span><?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                    <div class="mx-auto h-3 w-2/3 rounded-b-xl bg-dark-gray sm:h-4"></div>
                </div>
            </div>
        </div>
    </section>
</article>

<?php
get_footer();