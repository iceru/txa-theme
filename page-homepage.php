<?php
/**
 * Template Name: TXA Homepage
 *
 * @package TailPress
 */

get_header();

$hero_metrics = [
    'Live tourism supply',
    'Owned destination channels',
    'Distributor-ready inventory',
];

$hero_slides = [
    [
        'label' => 'Featured exchange pathway',
        'title' => 'Destination websites',
        'copy' => 'Turn destination inspiration into owned, bookable visitor journeys through TXA-connected local supply.',
        'image' => 'https://images.unsplash.com/photo-1523482580672-f109ba8cb9be?auto=format&fit=crop&w=2200&q=80',
    ],
    [
        'label' => 'Featured supply pathway',
        'title' => 'Local tourism operators',
        'copy' => 'Help accommodation, tours, attractions, events and experiences become visible and bookable across more channels.',
        'image' => 'https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?auto=format&fit=crop&w=2200&q=80',
    ],
    [
        'label' => 'Featured destination model',
        'title' => 'Smart Destinations',
        'copy' => 'Connect local suppliers, content, owned channels, trade access, concierge networks and data in one neutral platform.',
        'image' => 'https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=2200&q=80',
    ],
    [
        'label' => 'Featured distributor pathway',
        'title' => 'Trade-ready inventory',
        'copy' => 'Give distributor channels a practical route to discover and book Australian tourism product through TXA.',
        'image' => 'https://images.unsplash.com/photo-1469474968028-56623f02e42e?auto=format&fit=crop&w=2200&q=80',
    ],
];

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
        'cta' => 'Explore destinations',
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
        'image' => 'https://images.unsplash.com/photo-1469474968028-56623f02e42e?auto=format&fit=crop&w=900&q=80',
    ],
    [
        'title' => 'Booking Systems',
        'copy' => 'Connect your booking system to TXA and unlock distribution for your customers.',
        'cta' => 'Partner Enquiry',
        'url' => home_url('/booking-systems/'),
        'icon' => 'B',
        'image' => 'https://images.unsplash.com/photo-1518005020951-eccb494ad742?auto=format&fit=crop&w=900&q=80',
    ],
];

$ecosystem = ['Suppliers', 'Booking Systems', 'TXA Exchange', 'Destinations', 'Distributors', 'Travellers'];

$work_steps = [
    [
        'title' => 'Suppliers connect',
        'copy' => 'Product, rates and availability enter the exchange through supported pathways.',
    ],
    [
        'title' => 'TXA standardises',
        'copy' => 'Inventory is organised for destination, distributor and owned-channel use.',
    ],
    [
        'title' => 'Channels activate',
        'copy' => 'Websites, apps, trade portals, widgets and partners can surface bookable supply.',
    ],
    [
        'title' => 'Visitors book',
        'copy' => 'Travellers move from inspiration to confirmed local tourism outcomes.',
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
    ['title' => 'Data exports', 'bar' => 'w-6/12'],
];

$feature_images = [
    [
        'title' => 'Destination activation',
        'copy' => 'Owned channels become practical booking pathways.',
        'image' => 'https://images.unsplash.com/photo-1526772662000-3f88f10405ff?auto=format&fit=crop&w=900&q=80',
    ],
    [
        'title' => 'Local experiences',
        'copy' => 'Small and large operators can participate through appropriate connection options.',
        'image' => 'https://images.unsplash.com/photo-1500375592092-40eb2168fd21?auto=format&fit=crop&w=900&q=80',
    ],
    [
        'title' => 'Trade-ready supply',
        'copy' => 'Distributor pathways help bookable product move into market.',
        'image' => 'https://images.unsplash.com/photo-1500534314209-a25ddb2bd429?auto=format&fit=crop&w=900&q=80',
    ],
];

if (!function_exists('txa_button')) {
    function txa_button(string $label, string $url, string $variant = 'primary'): string
    {
        $classes = 'inline-flex w-full items-center justify-center rounded-lg px-5 py-3 text-sm font-semibold !no-underline transition sm:w-auto';

        if ('secondary' === $variant) {
            $classes .= ' border border-line text-near-black hover:bg-surface';
        } elseif ('light' === $variant) {
            $classes .= ' border border-white bg-white/10 text-white hover:bg-white/20';
        } elseif ('dark' === $variant) {
            $classes .= ' bg-near-black text-white hover:bg-dark-gray';
        } else {
            $classes .= ' bg-brand text-white hover:bg-brand-dark';
        }

        return sprintf('<a class="%s" href="%s">%s</a>', esc_attr($classes), esc_url($url), esc_html($label));
    }
}
?>

<article class=" text-near-black">
    <section class="p-6">
        <div class="txa-hero-slider relative min-h-[80vh] overflow-hidden rounded-lg border border-white/70 bg-near-black shadow-2xl shadow-near-black/20"
            data-hero-slider>
            <?php foreach ($hero_slides as $index => $slide): ?>
                <img src="<?php echo esc_url($slide['image']); ?>" alt=""
                    class="<?php echo 0 === $index ? 'opacity-100' : 'opacity-0'; ?> absolute inset-0 h-full w-full object-cover transition-opacity duration-700"
                    data-hero-slide-image="<?php echo esc_attr($index); ?>">
            <?php endforeach; ?>
            <div class="absolute inset-0 bg-near-black/45" aria-hidden="true"></div>

            <div class="flex gap-10 lg:items-center relative z-10 p-8 h-[80vh]  container mx-auto ">
                <div class="max-w-4xl">
                    <p
                        class="text-sm inline-flex px-4 mb-2 py-2 rounded-lg text-white font-semibold uppercase tracking-wide bg-brand">
                        Australia's
                        open B2B
                        tourism exchange</p>
                    <h1 class="max-w-3xl text-4xl mb-6 font-semibold leading-tight text-white md:text-6xl lg:text-5xl">
                        Tourism supply, destination channels and distributors connected in one exchange.
                    </h1>

                    <div class="max-w-2xl">
                        <p class="text-base leading-7 text-white/85 md:text-lg">
                            TXA helps Australian tourism suppliers make accommodation, tours, attractions,
                            events
                            and experiences bookable across destination websites, distributor channels and owned
                            digital assets.
                        </p>
                        <div class="mt-6 flex flex-col gap-3 sm:flex-row">
                            <?php echo txa_button('Apply Now', home_url('/apply-now/')); ?>
                            <?php echo txa_button('Request Smart Destination Demo', home_url('/request-demo/'), 'light'); ?>
                        </div>
                    </div>
                </div>

                <!-- <div class="grid gap-3 md:grid-cols-3">
                        <?php foreach ($hero_metrics as $metric): ?>
                            <div
                                class="rounded-lg border border-white/20 bg-white/15 p-4 text-sm font-semibold text-white backdrop-blur">
                                <?php echo esc_html($metric); ?>
                            </div>
                        <?php endforeach; ?>
                    </div> -->
            </div>

            <div class="absolute bottom-0 right-0 z-20 w-full max-w-sm p-6 md:p-8">
                <div class="rounded-lg bg-white p-5 text-near-black shadow-2xl shadow-near-black/25"
                    data-hero-slide-card>
                    <p class="text-xs font-semibold uppercase tracking-wide text-brand-text" data-hero-slide-label>
                        <?php echo esc_html($hero_slides[0]['label']); ?>
                    </p>
                    <h2 class="mt-2 text-2xl font-semibold leading-tight" data-hero-slide-title>
                        <?php echo esc_html($hero_slides[0]['title']); ?>
                    </h2>
                    <p class="mt-3 text-sm leading-6 text-mid-gray" data-hero-slide-copy>
                        <?php echo esc_html($hero_slides[0]['copy']); ?>
                    </p>
                </div>
                <div class="mt-4 flex items-center justify-between gap-4">
                    <div class="flex items-center gap-2 rounded-lg bg-white/90 px-3 py-2 shadow-sm"
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
                    <div class="flex overflow-hidden rounded-lg bg-white shadow-sm">
                        <button type="button"
                            class="flex size-12 items-center justify-center border-r border-line text-xl font-semibold text-brand-text hover:bg-brand-tint"
                            aria-label="Previous hero slide" data-hero-slide-prev>&lsaquo;</button>
                        <button type="button"
                            class="flex size-12 items-center justify-center text-xl font-semibold text-brand-text hover:bg-brand-tint"
                            aria-label="Next hero slide" data-hero-slide-next>&rsaquo;</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="px-4 py-8 lg:px-8 lg:py-12 bg-surface">
        <div class="container mx-auto">
            <div class="rounded-lg bg-white p-6 shadow-sm lg:p-8">
                <div class="grid gap-8 lg:grid-cols-[.75fr_1.25fr] lg:items-center">
                    <div>
                        <p class="text-sm font-semibold uppercase tracking-wide text-brand-text">Exchange map</p>
                        <h2 class="mt-3 text-3xl font-semibold leading-tight md:text-4xl">A connected tourism ecosystem
                        </h2>
                        <p class="mt-5 text-lg leading-8 text-mid-gray">
                            TXA connects suppliers, booking systems, destinations, distributors and travellers through
                            one open exchange, so live tourism products can move through the channels that matter.
                        </p>
                    </div>
                    <div class="grid gap-3 sm:grid-cols-2 lg:grid-cols-3">
                        <?php foreach ($ecosystem as $index => $node): ?>
                            <div
                                class="<?php echo 2 === $index ? 'border-brand/20 bg-brand-tint' : 'border-line bg-surface'; ?> rounded-lg border p-5">
                                <span
                                    class="mb-4 flex size-9 items-center justify-center rounded-lg bg-brand text-xs font-bold text-brand-tint"><?php echo esc_html($index + 1); ?></span>
                                <h3 class="text-base font-semibold"><?php echo esc_html($node); ?></h3>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="px-4 py-8 lg:px-8 lg:py-12">
        <div class="container mx-auto">
            <div class="mb-8 flex flex-col justify-between gap-5 md:flex-row md:items-end">
                <div class="max-w-2xl">
                    <p class="text-sm font-semibold uppercase tracking-wide text-brand-text">Audience pathways</p>
                    <h2 class="mt-3 text-3xl font-semibold leading-tight md:text-4xl">Choose your TXA pathway</h2>
                </div>
                <p class="max-w-md text-sm leading-6 text-mid-gray">
                    Each pathway connects to the same national exchange infrastructure, with different entry points for
                    each part of the visitor economy.
                </p>
            </div>
            <div class="grid gap-5 md:grid-cols-2 xl:grid-cols-4">
                <?php foreach ($audiences as $card): ?>
                    <article
                        class="group flex min-h-[360px] flex-col overflow-hidden rounded-lg border border-line bg-white shadow-sm">
                        <div class="relative h-44 overflow-hidden">
                            <img src="<?php echo esc_url($card['image']); ?>" alt=""
                                class="h-full w-full object-cover transition duration-500 group-hover:scale-105">
                            <span
                                class="absolute left-4 top-4 flex size-10 items-center justify-center rounded-lg bg-white text-sm font-bold text-brand-text shadow-sm"><?php echo esc_html($card['icon']); ?></span>
                        </div>
                        <div class="flex grow flex-col p-6">
                            <h3 class="text-xl font-semibold"><?php echo esc_html($card['title']); ?></h3>
                            <p class="mt-3 grow text-sm leading-6 text-mid-gray"><?php echo esc_html($card['copy']); ?></p>
                            <a href="<?php echo esc_url($card['url']); ?>"
                                class="mt-6 text-sm font-semibold text-brand-text !no-underline hover:text-near-black"><?php echo esc_html($card['cta']); ?>
                                &rarr;</a>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="px-4 py-8 lg:px-8 lg:py-12 bg-surface">
        <div class="container mx-auto">
            <div class="rounded-lg bg-white p-6 shadow-sm lg:p-8">
                <div class="grid gap-8 lg:grid-cols-[.85fr_1.15fr] lg:items-center">
                    <div>
                        <p class="text-sm font-semibold uppercase tracking-wide text-brand-text">What is TXA?</p>
                        <h2 class="mt-3 text-3xl font-semibold leading-tight md:text-4xl">An open exchange for bookable
                            Australian tourism product</h2>
                        <p class="mt-5 text-lg leading-8 text-mid-gray">
                            TXA connects tourism suppliers, destinations, distributors and booking systems so live
                            tourism products can be found, marketed, booked and measured online.
                        </p>
                        <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                            <?php echo txa_button('Explore Smart Destinations', home_url('/destinations/'), 'secondary'); ?>
                            <?php echo txa_button('See connected booking systems', home_url('/booking-systems/directory/'), 'secondary'); ?>
                        </div>
                    </div>
                    <div class="grid gap-4 sm:grid-cols-3">
                        <?php foreach ($feature_images as $feature): ?>
                            <article class="overflow-hidden rounded-lg border border-line bg-surface">
                                <img src="<?php echo esc_url($feature['image']); ?>" alt=""
                                    class="h-44 w-full object-cover">
                                <div class="p-5">
                                    <h3 class="text-lg font-semibold"><?php echo esc_html($feature['title']); ?></h3>
                                    <p class="mt-3 text-sm leading-6 text-mid-gray">
                                        <?php echo esc_html($feature['copy']); ?>
                                    </p>
                                </div>
                            </article>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="px-4 py-8 lg:px-8 lg:py-12">
        <div class="container mx-auto">
            <div class="mx-auto mb-10 max-w-3xl text-center">
                <p class="text-sm font-semibold uppercase tracking-wide text-brand-text">Exchange flow</p>
                <h2 class="mt-3 text-3xl font-semibold leading-tight md:text-4xl">How TXA works</h2>
                <p class="mt-5 text-lg leading-8 text-mid-gray">
                    The exchange turns fragmented product, pricing and availability into connected pathways for the
                    channels that create visitor outcomes.
                </p>
            </div>
            <div class="grid gap-5 lg:grid-cols-4">
                <?php foreach ($work_steps as $index => $step): ?>
                    <article class="rounded-lg border border-line bg-white p-6 shadow-sm">
                        <span
                            class="mb-4 flex size-11 items-center justify-center rounded-lg bg-near-black text-sm font-bold text-brand"><?php echo esc_html($index + 1); ?></span>
                        <h3 class="text-xl font-semibold"><?php echo esc_html($step['title']); ?></h3>
                        <p class="mt-3 text-sm leading-6 text-mid-gray"><?php echo esc_html($step['copy']); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="px-4 py-8 lg:px-8 lg:py-12">
        <div class="container mx-auto">
            <div class="relative overflow-hidden rounded-lg bg-near-black text-white shadow-xl">
                <img src="https://images.unsplash.com/photo-1500534314209-a25ddb2bd429?auto=format&fit=crop&w=1800&q=80"
                    alt="" class="absolute inset-0 h-full w-full object-cover opacity-30">
                <div class="relative grid gap-10 p-6 lg:grid-cols-[.9fr_1.1fr] lg:items-center lg:p-10">
                    <div>
                        <p
                            class="text-sm font-semibold uppercase tracking-wide text-white px-4 py-2 inline rounded-lg bg-brand">
                            Become a
                            Smart Destination
                        </p>
                        <h2 class="mt-3 text-3xl font-semibold leading-tight md:text-4xl">Move destination marketing
                            from inspiration to conversion</h2>
                        <p class="mt-6 text-lg leading-8 text-white/70">
                            Smart Destinations use TXA as digital infrastructure for their visitor economy. It connects
                            local suppliers, destination content, owned websites and apps, trade channels, local
                            reseller networks and real-time data.
                        </p>
                        <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                            <?php echo txa_button('Explore Smart Destinations', home_url('/destinations/')); ?>
                            <?php echo txa_button('Request Demo', home_url('/request-demo/'), 'light'); ?>
                        </div>
                    </div>
                    <div class="grid gap-4 sm:grid-cols-2">
                        <?php foreach ($smart_cards as $index => $card): ?>
                            <article class="rounded-lg border border-white/10 bg-white/10 p-6 backdrop-blur">
                                <span
                                    class="mb-4 flex size-11 items-center justify-center rounded-lg bg-brand-tint text-sm font-bold text-brand"><?php echo esc_html($index + 1); ?></span>
                                <h3 class="text-lg font-semibold"><?php echo esc_html($card['title']); ?></h3>
                                <p class="mt-3 text-sm leading-6 text-white/70"><?php echo esc_html($card['copy']); ?></p>
                            </article>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="px-4 py-8 lg:px-8 lg:py-12 bg-surface">
        <div class="container mx-auto">
            <div class="grid gap-8 lg:grid-cols-[.8fr_1.2fr] lg:items-center">
                <div>
                    <p class="text-sm font-semibold uppercase tracking-wide text-brand-text">Data and insights</p>
                    <h2 class="mt-3 text-3xl font-semibold leading-tight md:text-4xl">Data that helps destinations see
                        what is working</h2>
                    <p class="mt-5 text-lg leading-8 text-mid-gray">
                        TXA helps destinations understand supplier activity, campaign performance, visitor engagement
                        and booking outcomes through dashboards, attribution and data exports.
                    </p>
                    <div class="mt-8">
                        <?php echo txa_button('Learn about Data & Insights', home_url('/data-insights/'), 'secondary'); ?>
                    </div>
                </div>
                <div class="rounded-lg border border-line bg-white p-6 shadow-sm">
                    <div class="mb-6 flex items-center justify-between border-b border-line pb-4">
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-wide text-brand-text">Dashboard preview
                            </p>
                            <p class="mt-1 text-sm text-mid-gray">Destination and channel signals</p>
                        </div>
                        <span
                            class="rounded-lg bg-brand-tint px-3 py-1 text-xs font-semibold text-brand-text">Live</span>
                    </div>
                    <div class="grid gap-4 sm:grid-cols-2">
                        <?php foreach ($insights as $index => $item): ?>
                            <div
                                class="<?php echo 4 === $index ? 'sm:col-span-2' : ''; ?> rounded-lg border border-line bg-surface p-4">
                                <p class="text-sm font-semibold"><?php echo esc_html($item['title']); ?></p>
                                <div class="mt-4 h-2 rounded-lg bg-white">
                                    <div class="<?php echo esc_attr($item['bar']); ?> h-2 rounded-lg bg-brand"></div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="px-4 py-8 lg:px-8 lg:py-12">
        <div class="container mx-auto">
            <div class="grid gap-8 rounded-lg bg-white p-6 shadow-sm lg:grid-cols-[.75fr_1.25fr] lg:p-8">
                <div>
                    <p class="text-sm font-semibold uppercase tracking-wide text-brand-text">Provenance</p>
                    <h2 class="mt-3 text-3xl font-semibold leading-tight md:text-4xl">Built for Australia's tourism
                        industry</h2>
                </div>
                <div>
                    <p class="text-lg leading-8 text-mid-gray">
                        Tourism Exchange Australia was established in partnership with ATDW as Australia's open,
                        commercially neutral booking exchange. TXA was built to give Australian tourism suppliers fair
                        access to ecommerce and online distribution.
                    </p>
                    <div class="mt-6 grid gap-4 sm:grid-cols-3">
                        <div class="rounded-lg border border-line bg-surface p-4 text-sm font-semibold">Commercially
                            neutral</div>
                        <div class="rounded-lg border border-line bg-surface p-4 text-sm font-semibold">Open exchange
                        </div>
                        <div class="rounded-lg border border-line bg-surface p-4 text-sm font-semibold">ATDW partnership
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="px-4 pb-10 pt-8 lg:px-8 lg:pb-16 lg:pt-12">
        <div class="container mx-auto">
            <div class="relative overflow-hidden rounded-lg bg-near-black text-white shadow-2xl shadow-near-black/20">
                <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=1800&q=80"
                    alt="" class="absolute inset-0 h-full w-full object-cover opacity-40">
                <div class="relative mx-auto max-w-4xl px-6 py-20 text-center lg:py-28">
                    <h2 class="text-3xl font-semibold leading-tight md:text-4xl">Ready to connect your tourism business
                        or destination?</h2>
                    <p class="mx-auto mt-5 max-w-2xl text-lg leading-8 text-white/75">
                        Whether you are a supplier, destination, distributor or booking-system partner, TXA gives you a
                        pathway to connect with Australia's tourism exchange.
                    </p>
                    <div class="mt-8 flex flex-col justify-center gap-3 sm:flex-row">
                        <?php echo txa_button('Apply Now', home_url('/apply-now/')); ?>
                        <?php echo txa_button('Request Smart Destination Demo', home_url('/request-demo/'), 'light'); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</article>

<?php
get_footer();
