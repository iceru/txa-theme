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
        'image' => 'https://images.unsplash.com/photo-1523482580672-f109ba8cb9be?auto=format&fit=crop&w=2200&q=85',
    ],
    [
        'label' => 'Connected tourism supply',
        'title' => 'Bookable product across more channels',
        'copy' => 'Help accommodation, tours, attractions, events and experiences move through destination websites, reseller networks and trade partners.',
        'image' => 'https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?auto=format&fit=crop&w=2200&q=85',
    ],
    [
        'label' => 'Smart destination infrastructure',
        'title' => 'Turn destination interest into bookings',
        'copy' => 'Connect local suppliers, owned digital assets, distributor pathways and visitor data through one neutral national exchange.',
        'image' => 'https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=2200&q=85',
    ],
    [
        'label' => 'Distributor-ready inventory',
        'title' => 'Australian tourism product, ready for market',
        'copy' => 'Give distributors and booking-system partners a practical way to connect with live Australian tourism supply.',
        'image' => 'https://images.unsplash.com/photo-1469474968028-56623f02e42e?auto=format&fit=crop&w=2200&q=85',
    ],
];

$ecosystem = ['Suppliers', 'Booking Systems', 'TXA', 'Destinations', 'Distributors', 'Travellers'];

$audiences = [
    [
        'title' => 'Tourism Suppliers',
        'copy' => 'Connect through your booking system and make your product bookable across more channels.',
        'cta' => 'Apply Now',
        'url' => home_url('/apply-now/'),
        'image' => 'https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?auto=format&fit=crop&w=900&q=85',
    ],
    [
        'title' => 'Destinations',
        'copy' => 'Become a Smart Destination and make local supply bookable through your own digital assets.',
        'cta' => 'Explore Destinations',
        'url' => home_url('/destinations/'),
        'image' => 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=900&q=85',
    ],
    [
        'title' => 'Distributors',
        'copy' => 'Access bookable Australian tourism inventory through TXA connected supply.',
        'cta' => 'Become a Distributor',
        'url' => home_url('/distributors/'),
        'image' => 'https://images.unsplash.com/photo-1500375592092-40eb2168fd21?auto=format&fit=crop&w=900&q=85',
    ],
    [
        'title' => 'Booking Systems',
        'copy' => 'Connect your booking system to TXA and unlock distribution for your customers.',
        'cta' => 'Partner Enquiry',
        'url' => home_url('/booking-systems/'),
        'image' => 'https://images.unsplash.com/photo-1526772662000-3f88f10405ff?auto=format&fit=crop&w=900&q=85',
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
        $classes = 'inline-flex w-full items-center justify-center rounded-lg px-6 py-3 text-sm font-bold !no-underline transition sm:w-auto';

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
    <section class="px-4 pb-8 pt-7 lg:px-10 lg:pb-16 lg:pt-8">
        <div class="mx-auto max-w-[1360px]">
            <div class="txa-hero-slider relative min-h-[520px] overflow-hidden rounded-2xl bg-near-black lg:min-h-[600px]"
                data-hero-slider>
                <?php foreach ($hero_slides as $index => $slide): ?>
                    <img src="<?php echo esc_url($slide['image']); ?>" alt=""
                        class="<?php echo 0 === $index ? 'opacity-100' : 'opacity-0'; ?> absolute inset-0 h-full w-full object-cover transition-opacity duration-700"
                        data-hero-slide-image="<?php echo esc_attr($index); ?>">
                <?php endforeach; ?>
                <div class="absolute inset-0 bg-near-black/45" aria-hidden="true"></div>

                <div class="relative z-10 flex min-h-[520px] items-center px-6 py-16 sm:px-8 lg:min-h-[600px] lg:px-8 lg:py-24">
                    <div class="max-w-[780px]">
                        <p data-hero-slide-label
                            class="inline-flex rounded-lg bg-brand px-4 py-2 text-base font-bold text-white sm:text-xl">
                            <?php echo esc_html($hero_slides[0]['label']); ?>
                        </p>
                        <h1 data-hero-slide-title
                            class="mt-4 max-w-[760px] [font-family:'Hanken_Grotesk',sans-serif] text-4xl font-semibold leading-[1.12] text-white sm:text-5xl lg:text-[64px] lg:leading-[72px]">
                            <?php echo esc_html($hero_slides[0]['title']); ?>
                        </h1>
                        <p data-hero-slide-copy
                            class="mt-4 max-w-[660px] text-lg font-semibold leading-7 text-white sm:text-xl lg:text-2xl lg:leading-normal">
                            <?php echo esc_html($hero_slides[0]['copy']); ?>
                        </p>
                        <div class="mt-6 flex flex-col gap-4 sm:flex-row">
                            <?php echo txa_button('Apply Now', home_url('/apply-now/')); ?>
                            <?php echo txa_button('Request Smart Destination Demo', home_url('/request-demo/'), 'light'); ?>
                        </div>
                    </div>
                </div>

                <div class="absolute bottom-6 right-6 z-20 flex items-center gap-2 rounded-full bg-white p-3 shadow-sm lg:bottom-8 lg:right-8"
                    aria-label="Hero slides">
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

    <section class="px-4 py-10 lg:px-16 lg:py-16">
        <div class="mx-auto max-w-[1312px]">
            <div class="grid gap-10 lg:grid-cols-[1fr_1.02fr] lg:items-start lg:gap-12">
                <div class="max-w-[629px]">
                    <h2 class="[font-family:'Hanken_Grotesk',sans-serif] text-3xl font-bold leading-10 tracking-[-0.01em] text-[#151c27]">
                        Australia's national tourism exchange.<br>
                        <span class="text-brand">How TXA was built and why</span>
                    </h2>
                    <div class="mt-6 space-y-6 text-lg leading-[1.625] text-near-black">
                        <p>
                            Tourism Exchange Australia was established in partnership with ATDW (an organisation representing all Australian State and Federal Government Tourism Organisations) as the nation's open, commercially neutral booking exchange.
                        </p>
                        <p>
                            Selected through a global tender, TXA was built to give every Australian tourism supplier, regardless of category, size or booking system, fair access to ecommerce and online distribution. The same exchange technology now powers tourism platforms in the United Kingdom, Japan, the United States and Saudi Arabia. TXA remains Australia's own.
                        </p>
                    </div>
                </div>
                <div class="h-[300px] overflow-hidden rounded-lg border border-line sm:h-[368px]">
                    <img src="https://images.unsplash.com/photo-1502680390469-be75c86b636f?auto=format&fit=crop&w=1400&q=85"
                        alt="Australian coastline and beach" class="h-full w-full object-cover">
                </div>
            </div>
        </div>
    </section>

    <section class="bg-surface px-4 py-10 lg:p-16">
        <div class="mx-auto max-w-[1312px] rounded-lg bg-white px-6 py-8 shadow-[0_12px_28px_-8px_rgba(26,26,26,0.12)] lg:px-8 lg:py-[34px]">
            <div class="grid gap-9 lg:grid-cols-[450px_1fr] lg:items-center lg:gap-[71px]">
                <div>
                    <p class="text-sm uppercase leading-5 text-brand sm:text-base">Australia's own B2B tourism exchange</p>
                    <h2 class="mt-2 [font-family:'Hanken_Grotesk',sans-serif] text-3xl font-semibold leading-tight lg:text-4xl lg:leading-[44px]">
                        A connected tourism ecosystem
                    </h2>
                    <p class="mt-2 text-base leading-[30px] text-mid-gray">
                        TXA helps Australian tourism suppliers make their accommodation, tours, attractions, events and experiences bookable across more diverse channels through one open exchange.
                    </p>
                </div>
                <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3 lg:gap-x-[30px] lg:gap-y-[26px]">
                    <?php foreach ($ecosystem as $index => $node): ?>
                        <div class="<?php echo 2 === $index ? 'border-brand bg-brand-tint' : 'border-line bg-surface'; ?> flex min-h-[82px] items-center gap-[14px] rounded-lg border p-4">
                            <span class="flex size-[34px] shrink-0 items-center justify-center rounded-lg bg-brand text-sm text-white">
                                <?php echo esc_html($index + 1); ?>
                            </span>
                            <span class="text-sm leading-5 text-near-black"><?php echo esc_html($node); ?></span>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <section class="px-4 py-12 lg:px-16 lg:py-16">
        <div class="mx-auto max-w-[1312px]">
            <div class="grid gap-5 md:grid-cols-[1fr_400px] md:items-end">
                <div>
                    <p class="text-sm uppercase leading-5 text-brand">TXA pathway</p>
                    <h2 class="mt-3 [font-family:'Hanken_Grotesk',sans-serif] text-3xl font-semibold leading-tight lg:text-4xl lg:leading-[44px]">
                        How to Connect to TXA?
                    </h2>
                </div>
                <p class="text-sm leading-6 text-mid-gray">
                    Each pathway connects to the same national exchange infrastructure, with different entry points for each part of the visitor economy.
                </p>
            </div>

            <div class="mt-8 grid gap-5 sm:grid-cols-2 xl:grid-cols-4">
                <?php foreach ($audiences as $card): ?>
                    <article class="group flex min-h-[360px] flex-col overflow-hidden rounded-lg border border-line bg-white shadow-[0_12px_28px_-8px_rgba(26,26,26,0.12)]">
                        <div class="h-[180px] overflow-hidden">
                            <img src="<?php echo esc_url($card['image']); ?>" alt=""
                                class="h-full w-full object-cover transition duration-500 group-hover:scale-105">
                        </div>
                        <div class="flex grow flex-col px-6 pb-5 pt-2">
                            <h3 class="text-xl font-semibold leading-7"><?php echo esc_html($card['title']); ?></h3>
                            <p class="mt-2 grow text-sm leading-6 text-mid-gray"><?php echo esc_html($card['copy']); ?></p>
                            <a href="<?php echo esc_url($card['url']); ?>"
                                class="mt-4 inline-flex items-center gap-2 text-sm text-brand !no-underline hover:text-brand-dark">
                                <?php echo esc_html($card['cta']); ?>
                                <span aria-hidden="true">→</span>
                            </a>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="px-4 py-10 lg:px-16 lg:py-16">
        <div class="mx-auto max-w-[1312px] text-center">
            <h2 class="[font-family:'Hanken_Grotesk',sans-serif] text-3xl font-semibold leading-tight lg:text-4xl lg:leading-[44px]">
                How TXA Works
            </h2>
            <a href="<?php echo esc_url(home_url('/how-txa-works/')); ?>"
                class="group relative mt-8 block h-[360px] overflow-hidden rounded-2xl bg-near-black sm:h-[460px] lg:h-[551px]">
                <img src="https://images.unsplash.com/photo-1500534314209-a25ddb2bd429?auto=format&fit=crop&w=2200&q=85"
                    alt="How TXA works" class="h-full w-full object-cover transition duration-700 group-hover:scale-[1.02]">
                <span class="absolute inset-0 bg-black/40" aria-hidden="true"></span>
                <span class="absolute left-1/2 top-1/2 flex size-[92px] -translate-x-1/2 -translate-y-1/2 items-center justify-center rounded-full bg-white/95 shadow-lg lg:size-[114px]">
                    <svg viewBox="0 0 48 48" aria-hidden="true" class="ml-1 size-10 fill-near-black lg:size-12">
                        <path d="M17 12.5v23L36 24 17 12.5Z" />
                    </svg>
                </span>
            </a>
        </div>
    </section>

    <section class="relative overflow-hidden bg-near-black px-4 py-12 text-white lg:px-16 lg:py-16">
        <img src="https://images.unsplash.com/photo-1470770841072-f978cf4d019e?auto=format&fit=crop&w=2200&q=85" alt=""
            class="absolute inset-0 h-full w-full object-cover">
        <div class="absolute inset-0 bg-black/70" aria-hidden="true"></div>
        <div class="relative z-10 mx-auto grid max-w-[1312px] gap-10 lg:grid-cols-[554px_1fr] lg:items-center lg:gap-12">
            <div>
                <p class="inline-flex rounded-lg bg-white/10 px-4 py-2 text-sm uppercase leading-5 text-white">
                    Become a Smart Destination
                </p>
                <h2 class="mt-3 text-3xl font-semibold leading-tight lg:text-4xl lg:leading-[44px]">
                    Move destination marketing from inspiration to conversion
                </h2>
                <p class="mt-3 text-lg leading-[30px] text-white">
                    Smart Destinations use TXA as digital infrastructure for their visitor economy. It connects local suppliers, destination content, owned websites and apps, trade channels, local reseller networks and real-time data.
                </p>
                <div class="mt-6 flex flex-col gap-3 sm:flex-row">
                    <?php echo txa_button('Explore Smart Destinations', home_url('/destinations/')); ?>
                    <?php echo txa_button('Request Demo', home_url('/request-demo/'), 'light'); ?>
                </div>
            </div>
            <div class="grid gap-6 sm:grid-cols-2">
                <?php foreach ($smart_cards as $index => $card): ?>
                    <article class="rounded-lg bg-white/20 p-5 backdrop-blur-md">
                        <span class="flex size-11 items-center justify-center rounded-lg bg-brand text-base font-bold text-white">
                            <?php echo esc_html($index + 1); ?>
                        </span>
                        <h3 class="mt-4 text-xl font-bold leading-5"><?php echo esc_html($card['title']); ?></h3>
                        <p class="mt-4 text-sm leading-6 text-white"><?php echo esc_html($card['copy']); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="bg-surface px-4 py-12 lg:px-16 lg:py-[95px]">
        <div class="mx-auto grid max-w-[1312px] gap-10 lg:grid-cols-[1fr_700px] lg:items-center lg:gap-12">
            <div>
                <p class="text-sm uppercase leading-5 text-brand">Data and insights</p>
                <h2 class="mt-3 max-w-[480px] text-3xl font-semibold leading-tight lg:text-4xl lg:leading-[44px]">
                    Data that helps destinations see what is working
                </h2>
                <p class="mt-3 max-w-[500px] text-lg leading-[30px] text-mid-gray">
                    TXA helps destinations understand supplier activity, campaign performance, visitor engagement and booking outcomes through dashboards, attribution and data exports.
                </p>
                <div class="mt-6">
                    <?php echo txa_button('Learn about Data & Insights', home_url('/data-insights/'), 'secondary'); ?>
                </div>
            </div>
            <div class="flex min-h-[330px] items-center justify-center lg:min-h-[414px]">
                <div class="w-full max-w-[700px] rounded-xl border border-line bg-white p-4 shadow-[0_12px_28px_-8px_rgba(26,26,26,0.12)] sm:p-6">
                    <div class="rounded-lg bg-[#f2f4f7] p-4">
                        <div class="flex items-center justify-between border-b border-line pb-3">
                            <div>
                                <p class="text-xs font-bold uppercase tracking-wide text-brand">TXA Dashboard</p>
                                <p class="mt-1 text-sm text-mid-gray">Destination performance overview</p>
                            </div>
                            <span class="rounded bg-brand-tint px-3 py-2 text-xs font-semibold text-brand">Live</span>
                        </div>
                        <div class="mt-4 grid grid-cols-3 gap-3">
                            <div class="rounded bg-white p-3"><p class="text-xs text-mid-gray">Suppliers</p><p class="mt-1 text-xl font-bold">1,284</p></div>
                            <div class="rounded bg-white p-3"><p class="text-xs text-mid-gray">Bookings</p><p class="mt-1 text-xl font-bold">8,462</p></div>
                            <div class="rounded bg-white p-3"><p class="text-xs text-mid-gray">Channels</p><p class="mt-1 text-xl font-bold">46</p></div>
                        </div>
                        <div class="mt-3 h-36 rounded bg-white p-4">
                            <div class="flex h-full items-end gap-2">
                                <?php foreach ([42, 66, 53, 82, 61, 91, 73, 100, 78, 88] as $height): ?>
                                    <span class="grow rounded-t bg-brand/80" style="height: <?php echo esc_attr($height); ?>%"></span>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                    <div class="mx-auto h-4 w-2/3 rounded-b-xl bg-dark-gray"></div>
                </div>
            </div>
        </div>
    </section>
</article>

<?php
get_footer();
