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
        'title' => 'National B2B Tourism Exchange',
        'copy' => 'TXA connects Australian tourism suppliers, destinations, distributors and booking systems so tourism products can be found, marketed, booked and measured online.',
        'image' => 'https://images.unsplash.com/photo-1523482580672-f109ba8cb9be?auto=format&fit=crop&w=2200&q=80',
    ],
    [
        'label' => 'Connected tourism supply',
        'title' => 'Bookable product across more channels',
        'copy' => 'Help accommodation, tours, attractions, events and experiences move through destination websites, reseller networks and trade partners.',
        'image' => 'https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?auto=format&fit=crop&w=2200&q=80',
    ],
    [
        'label' => 'Smart destination infrastructure',
        'title' => 'Turn destination interest into bookings',
        'copy' => 'Connect local suppliers, owned digital assets, distributor pathways and visitor data through one neutral national exchange.',
        'image' => 'https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=2200&q=80',
    ],
    [
        'label' => 'Distributor-ready inventory',
        'title' => 'Australian tourism product, ready for market',
        'copy' => 'Give distributors and booking-system partners a practical way to connect with live Australian tourism supply.',
        'image' => 'https://images.unsplash.com/photo-1469474968028-56623f02e42e?auto=format&fit=crop&w=2200&q=80',
    ],
];

$ecosystem = ['Suppliers', 'Booking Systems', 'TXA Exchange', 'Destinations', 'Distributors', 'Travellers'];

$audiences = [
    [
        'title' => 'Tourism Suppliers',
        'copy' => 'Connect through your booking system and make your product bookable across more channels.',
        'cta' => 'Apply Now',
        'url' => home_url('/apply-now/'),
        'icon' => 'S',
        'image' => 'https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?auto=format&fit=crop&w=900&q=80',
    ],
    [
        'title' => 'Destinations',
        'copy' => 'Become a Smart Destination and make local supply bookable through your own digital assets.',
        'cta' => 'Explore Destinations',
        'url' => home_url('/destinations/'),
        'icon' => 'D',
        'image' => 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=900&q=80',
    ],
    [
        'title' => 'Distributors',
        'copy' => 'Access bookable Australian tourism inventory through TXA-connected supply.',
        'cta' => 'Become a Distributor',
        'url' => home_url('/distributors/'),
        'icon' => 'R',
        'image' => 'https://images.unsplash.com/photo-1500375592092-40eb2168fd21?auto=format&fit=crop&w=900&q=80',
    ],
    [
        'title' => 'Booking Systems',
        'copy' => 'Connect your booking system to TXA and unlock distribution for your customers.',
        'cta' => 'Partner Enquiry',
        'url' => home_url('/booking-systems/'),
        'icon' => 'B',
        'image' => 'https://images.unsplash.com/photo-1526772662000-3f88f10405ff?auto=format&fit=crop&w=900&q=80',
    ],
];

$smart_cards = [
    ['title' => 'Activate digital assets', 'copy' => 'Turn destination websites, apps and visitor touchpoints into conversion-ready channels.'],
    ['title' => 'Digitise local supply', 'copy' => 'Help local operators bring bookable products, pricing and availability online.'],
    ['title' => 'Connect supply to the world', 'copy' => 'Open inventory pathways to trade channels, resellers and owned destination channels.'],
    ['title' => 'Own your data', 'copy' => 'Use activity, campaign and booking signals to see what is driving outcomes.'],
];

$insights = [
    ['title' => 'Supplier activity', 'bar' => 'w-5/12'],
    ['title' => 'Campaign performance', 'bar' => 'w-7/12'],
    ['title' => 'Visitor engagement', 'bar' => 'w-8/12'],
    ['title' => 'Booking outcomes', 'bar' => 'w-9/12'],
    ['title' => 'Data exports', 'bar' => 'w-10/12'],
];

if (!function_exists('txa_button')) {
    function txa_button(string $label, string $url, string $variant = 'primary'): string
    {
        $classes = 'inline-flex w-full items-center justify-center rounded px-5 py-3 text-sm font-semibold !no-underline transition sm:w-auto';

        if ('secondary' === $variant) {
            $classes .= ' border border-line bg-white text-near-black hover:bg-surface';
        } elseif ('light' === $variant) {
            $classes .= ' border border-white/60 bg-white/10 text-white hover:bg-white/20';
        } else {
            $classes .= ' bg-brand text-white hover:bg-brand-dark';
        }

        return sprintf('<a class="%s" href="%s">%s</a>', esc_attr($classes), esc_url($url), esc_html($label));
    }
}
?>

<article class="bg-white text-near-black">
    <section class="px-4 py-6 lg:px-8">
        <div class="container mx-auto">
            <div class="txa-hero-slider relative min-h-[440px] overflow-hidden rounded-lg bg-near-black shadow-xl shadow-near-black/15 md:min-h-[530px]"
                data-hero-slider>
                <?php foreach ($hero_slides as $index => $slide): ?>
                    <img src="<?php echo esc_url($slide['image']); ?>" alt=""
                        class="<?php echo 0 === $index ? 'opacity-100' : 'opacity-0'; ?> absolute inset-0 h-full w-full object-cover transition-opacity duration-700"
                        data-hero-slide-image="<?php echo esc_attr($index); ?>">
                <?php endforeach; ?>
                <div class="absolute inset-0 bg-near-black/50" aria-hidden="true"></div>

                <div class="relative z-10 flex min-h-[440px] items-center p-6 md:min-h-[530px] md:p-8">
                    <div class="max-w-4xl">
                        <p
                            class="inline-flex rounded bg-brand px-4 py-2 text-xs font-bold uppercase tracking-wide text-white md:text-sm">
                            Tourism Exchange Australia
                        </p>
                        <h1 class="mt-5 max-w-3xl text-4xl font-semibold leading-tight text-white md:text-6xl">
                            National B2B Tourism Exchange
                        </h1>
                        <p
                            class="mt-5 max-w-2xl text-base font-semibold leading-7 text-white/90 md:text-xl md:leading-8">
                            TXA connects Australian tourism suppliers, destinations, distributors and booking systems so
                            tourism products can be found, marketed, booked and measured online.
                        </p>
                        <div class="mt-7 flex flex-col gap-3 sm:flex-row">
                            <?php echo txa_button('Apply Now', home_url('/apply-now/')); ?>
                            <?php echo txa_button('Request Smart Destination Demo', home_url('/request-demo/'), 'light'); ?>
                        </div>
                    </div>
                </div>

                <div class="absolute bottom-8 right-8 z-20 flex items-center gap-2 rounded bg-white/95 px-3 py-2 shadow-sm"
                    aria-label="Hero slides">
                    <?php foreach ($hero_slides as $index => $slide): ?>
                        <button type="button"
                            class="<?php echo 0 === $index ? 'w-7 bg-brand' : 'w-2.5 bg-near-black/30'; ?> h-2.5 rounded-full transition-all"
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

    <section class="px-4 py-10 lg:px-8 lg:py-16">
        <div class="container mx-auto">
            <div class="grid gap-10 lg:grid-cols-2 lg:items-center">
                <div class="max-w-2xl">
                    <h2 class="text-3xl font-semibold leading-tight md:text-4xl">
                        Australia's national tourism exchange.
                        <span class="text-brand-text">How TXA was built and why</span>
                    </h2>
                    <div class="mt-7 space-y-5 text-base leading-7 text-mid-gray">
                        <p>
                            Tourism Exchange Australia was established in partnership with <strong
                                class="font-semibold text-near-black">ATDW (an organisation representing all Australian
                                State and Federal Government Tourism Organisations)</strong> as the nation's open,
                            commercially neutral booking exchange.
                        </p>
                        <p>
                            Selected through a global tender, TXA was built to give every Australian tourism supplier,
                            regardless of category, size or booking system, fair access to ecommerce and online
                            distribution. The same exchange technology now powers tourism platforms in the United
                            Kingdom, Japan and the United States. TXA remains Australia's own.
                        </p>
                    </div>
                </div>
                <div class="overflow-hidden rounded-lg shadow-sm">
                    <img src="https://images.unsplash.com/photo-1523482580672-f109ba8cb9be?auto=format&fit=crop&w=1200&q=80"
                        alt="Sydney Opera House viewed from Sydney Harbour"
                        class="h-full min-h-[280px] w-full object-cover">
                </div>
            </div>
        </div>
    </section>

    <section class="bg-surface px-4 py-10 lg:px-8 lg:py-16">
        <div class="container mx-auto">
            <div class="rounded-lg bg-white p-6 shadow-lg shadow-near-black/10 lg:p-8">
                <div class="grid gap-8 lg:grid-cols-[.75fr_1.25fr] lg:items-center">
                    <div>
                        <p class="text-xs font-bold uppercase tracking-wide text-brand-text">B2B tourism exchange</p>
                        <h2 class="mt-3 text-3xl font-semibold leading-tight md:text-4xl">A connected tourism ecosystem
                        </h2>
                        <p class="mt-5 text-base leading-7 text-mid-gray">
                            TXA helps Australian tourism suppliers make accommodation, tours, attractions, events and
                            experiences bookable across more channels through one open exchange.
                        </p>
                    </div>
                    <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
                        <?php foreach ($ecosystem as $index => $node): ?>
                            <div
                                class="<?php echo 2 === $index ? 'border-brand bg-brand-tint' : 'border-line bg-surface'; ?> rounded border p-5">
                                <div class="flex items-center gap-4">
                                    <span
                                        class="flex size-9 shrink-0 items-center justify-center rounded bg-brand text-xs font-bold text-white">
                                        <?php echo esc_html($index + 1); ?>
                                    </span>
                                    <h3 class="text-sm font-semibold"><?php echo esc_html($node); ?></h3>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="px-4 py-10 lg:px-8 lg:py-16">
        <div class="container mx-auto">
            <div class="mb-8 grid gap-6 md:grid-cols-[1fr_.45fr] md:items-end">
                <div>
                    <p class="text-xs font-bold uppercase tracking-wide text-brand-text">Audience pathways</p>
                    <h2 class="mt-3 text-3xl font-semibold leading-tight md:text-4xl">Choose your TXA pathway</h2>
                </div>
                <p class="text-sm leading-6 text-mid-gray">
                    Each pathway connects to the same national exchange infrastructure, with different entry points for
                    each part of the visitor economy.
                </p>
            </div>
            <div class="grid gap-5 md:grid-cols-2 xl:grid-cols-4">
                <?php foreach ($audiences as $card): ?>
                    <article
                        class="group flex min-h-[330px] flex-col overflow-hidden rounded border border-line bg-white shadow-lg shadow-near-black/10">
                        <div class="relative h-40 overflow-hidden">
                            <img src="<?php echo esc_url($card['image']); ?>" alt=""
                                class="h-full w-full object-cover transition duration-500 group-hover:scale-105">
                            <span
                                class="absolute left-4 top-4 flex size-10 items-center justify-center rounded bg-white text-sm font-bold text-brand-text shadow-sm">
                                <?php echo esc_html($card['icon']); ?>
                            </span>
                        </div>
                        <div class="flex grow flex-col p-6">
                            <h3 class="text-xl font-semibold"><?php echo esc_html($card['title']); ?></h3>
                            <p class="mt-3 grow text-sm leading-6 text-mid-gray"><?php echo esc_html($card['copy']); ?></p>
                            <a href="<?php echo esc_url($card['url']); ?>"
                                class="mt-6 text-sm font-semibold text-brand-text !no-underline hover:text-near-black">
                                <?php echo esc_html($card['cta']); ?> &rarr;
                            </a>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="relative overflow-hidden bg-near-black px-4 py-12 text-white lg:px-8 lg:py-20">
        <img src="https://images.unsplash.com/photo-1500534314209-a25ddb2bd429?auto=format&fit=crop&w=1800&q=80" alt=""
            class="absolute inset-0 h-full w-full object-cover opacity-35">
        <div class="absolute inset-0 bg-near-black/45" aria-hidden="true"></div>
        <div class="container relative z-10 mx-auto">
            <div class="grid gap-10 lg:grid-cols-[.85fr_1.15fr] lg:items-center">
                <div>
                    <p
                        class="inline-flex rounded bg-white/10 px-4 py-2 text-xs font-bold uppercase tracking-wide text-white">
                        Become a Smart Destination
                    </p>
                    <h2 class="mt-5 max-w-xl text-3xl font-semibold leading-tight md:text-4xl">
                        Move destination marketing from inspiration to conversion
                    </h2>
                    <p class="mt-6 max-w-xl text-base leading-7 text-white/80">
                        Smart Destinations use TXA as digital infrastructure for their visitor economy. It connects
                        local suppliers, destination content, owned websites and apps, trade channels, local reseller
                        networks and real-time data.
                    </p>
                    <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                        <?php echo txa_button('Explore Smart Destinations', home_url('/destinations/')); ?>
                        <?php echo txa_button('Request Demo', home_url('/request-demo/'), 'light'); ?>
                    </div>
                </div>
                <div class="grid gap-4 sm:grid-cols-2">
                    <?php foreach ($smart_cards as $index => $card): ?>
                        <article class="rounded border border-white/10 bg-white/15 p-6 backdrop-blur">
                            <span
                                class="mb-4 flex size-10 items-center justify-center rounded bg-brand text-sm font-bold text-white">
                                <?php echo esc_html($index + 1); ?>
                            </span>
                            <h3 class="text-lg font-semibold"><?php echo esc_html($card['title']); ?></h3>
                            <p class="mt-3 text-sm leading-6 text-white/75"><?php echo esc_html($card['copy']); ?></p>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-surface px-4 py-12 lg:px-8 lg:py-20">
        <div class="container mx-auto">
            <div class="grid gap-10 lg:grid-cols-[.8fr_1.2fr] lg:items-center">
                <div>
                    <p class="text-xs font-bold uppercase tracking-wide text-brand-text">Data and insights</p>
                    <h2 class="mt-3 max-w-xl text-3xl font-semibold leading-tight md:text-4xl">
                        Data that helps destinations see what is working
                    </h2>
                    <p class="mt-5 max-w-xl text-base leading-7 text-mid-gray">
                        TXA helps destinations understand supplier activity, campaign performance, visitor engagement
                        and booking outcomes through dashboards, attribution and data exports.
                    </p>
                    <div class="mt-7">
                        <?php echo txa_button('Learn about Data & Insights', home_url('/data-insights/'), 'secondary'); ?>
                    </div>
                </div>
                <div class="rounded-lg bg-white p-6 shadow-xl shadow-near-black/10">
                    <div class="mb-6 flex items-start justify-between gap-4">
                        <div>
                            <p class="text-xs font-bold uppercase tracking-wide text-brand-text">Dashboard preview</p>
                            <p class="mt-1 text-sm text-mid-gray">Destination and channel signals</p>
                        </div>
                        <span class="rounded bg-brand-tint px-3 py-2 text-xs font-semibold text-brand-text">Live</span>
                    </div>
                    <div class="grid gap-4 sm:grid-cols-2">
                        <?php foreach ($insights as $index => $item): ?>
                            <div
                                class="<?php echo 4 === $index ? 'sm:col-span-2' : ''; ?> rounded border border-line bg-surface p-4">
                                <p class="text-sm font-semibold"><?php echo esc_html($item['title']); ?></p>
                                <div class="mt-4 h-2 rounded bg-white">
                                    <div class="<?php echo esc_attr($item['bar']); ?> h-2 rounded bg-brand"></div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</article>

<?php
get_footer();
