<?php
/**
 * Template Name: TXA Homepage
 *
 * @package TailPress
 */

get_header();

$audiences = [
    [
        'title' => 'Tourism Suppliers',
        'copy' => 'Connect through your booking system and make your product bookable across more channels.',
        'cta' => 'Apply Now',
        'url' => home_url('/apply-now/'),
        'icon' => 'S',
    ],
    [
        'title' => 'Destinations',
        'copy' => 'Become a Smart Destination and make local supply bookable through your own digital assets.',
        'cta' => 'Request Demo',
        'url' => home_url('/request-demo/'),
        'icon' => 'D',
    ],
    [
        'title' => 'Distributors',
        'copy' => 'Access bookable Australian tourism inventory through TXA.',
        'cta' => 'Become a Distributor',
        'url' => home_url('/distributors/'),
        'icon' => 'R',
    ],
    [
        'title' => 'Booking Systems',
        'copy' => 'Connect your booking system to TXA and unlock distribution for your customers.',
        'cta' => 'Partner Enquiry',
        'url' => home_url('/booking-systems/'),
        'icon' => 'B',
    ],
];

$ecosystem = ['Suppliers', 'Booking Systems', 'TXA', 'Destinations', 'Distributors', 'Travellers'];
$work_steps = ['Tourism suppliers', 'Booking systems', 'TXA exchange', 'Destinations and distributors', 'Travellers'];
$smart_cards = [
    ['title' => 'Activate digital assets', 'copy' => 'Turn destination websites, apps and visitor touchpoints into conversion-ready channels.'],
    ['title' => 'Digitise local supply', 'copy' => 'Help local operators bring bookable products, pricing and availability online.'],
    ['title' => 'Connect supply to the world', 'copy' => 'Open inventory pathways to trade channels, resellers and owned destination channels.'],
    ['title' => 'Own your data', 'copy' => 'Use activity, campaign and booking signals to see what is driving outcomes.'],
];
$insights = ['Supplier activity', 'Campaign performance', 'Visitor engagement', 'Booking outcomes', 'Data exports'];

if (!function_exists('txa_button')) {
    function txa_button(string $label, string $url, string $variant = 'primary'): string
    {
        $classes = 'inline-flex items-center justify-center rounded-lg px-5 py-3 text-sm font-semibold !no-underline transition';

        if ('secondary' === $variant) {
            $classes .= ' border border-line text-near-black hover:bg-surface';
        } elseif ('light' === $variant) {
            $classes .= ' border border-white bg-transparent text-white hover:bg-white/20';
        } else {
            $classes .= ' bg-brand text-white hover:bg-brand-dark';
        }

        return sprintf('<a class="%s" href="%s">%s</a>', esc_attr($classes), esc_url($url), esc_html($label));
    }
}
?>

<article class="bg-white text-near-black">
    <section
        class="relative min-h-[680px] overflow-hidden border-b border-line bg-near-black bg-cover bg-center text-near-black"
        style="background-image: url('https://images.unsplash.com/photo-1523482580672-f109ba8cb9be?auto=format&fit=crop&w=2200&q=80');">
        <div class="absolute inset-0 bg-near-black/45" aria-hidden="true"></div>
        <div class="container relative mx-auto flex min-h-[680px] items-center py-20 lg:py-28">
            <div
                class="max-w-3xl rounded-lg border border-white/40 bg-white/30 p-6 shadow-2xl shadow-near-black/25 backdrop-blur-lg md:p-10">
                <p class="mb-5 text-sm font-semibold uppercase tracking-wide text-brand">Australia's open B2B tourism
                    exchange</p>
                <h1 class="text-4xl font-semibold leading-tight text-white tracking-tight text-balance md:text-4xl">
                    Tourism Exchange Australia: the B2B tourism exchange connecting suppliers, destinations and
                    distributors
                </h1>
                <p class="mt-6 text-lg leading-8 text-white md:text-xl">
                    TXA helps Australian tourism suppliers make accommodation, tours, attractions, events and
                    experiences bookable across more channels through one open exchange.
                </p>
                <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                    <?php echo txa_button('Apply Now', home_url('/apply-now/')); ?>
                    <?php echo txa_button('Request Smart Destination Demo', home_url('/request-demo/'), 'light'); ?>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-surface py-14 lg:py-20">
        <div class="container mx-auto grid gap-8 lg:grid-cols-[.75fr_1.25fr] lg:items-center">
            <div>
                <p class="text-sm font-semibold uppercase tracking-wide text-brand-text">Live exchange map</p>
                <h2 class="mt-3 text-3xl font-semibold tracking-tight md:text-4xl">A connected tourism ecosystem</h2>
                <p class="mt-5 text-lg leading-8 text-mid-gray">
                    TXA connects suppliers, booking systems, destinations, distributors and travellers through one open
                    exchange, so live tourism products can move through the channels that matter.
                </p>
            </div>

            <div class="rounded-lg border border-line bg-white p-5 shadow-sm">
                <div class="mb-5 flex items-center justify-between border-b border-line pb-4">
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-wide text-brand-text">Platform flow</p>
                        <p class="mt-1 text-sm text-mid-gray">Suppliers to travellers through TXA</p>
                    </div>
                    <span class="rounded-full bg-brand-tint px-3 py-1 text-xs font-semibold text-brand-text">Live</span>
                </div>
                <div class="grid gap-3 sm:grid-cols-2">
                    <?php foreach ($ecosystem as $index => $node): ?>
                        <div
                            class="<?php echo 2 === $index ? 'sm:col-span-2 border-line bg-brand-tint' : 'border-line bg-surface'; ?> rounded border p-4">
                            <div class="flex items-center gap-3">
                                <span
                                    class="flex size-9 shrink-0 items-center justify-center rounded bg-brand-tint text-sm font-bold text-brand"><?php echo esc_html($index + 1); ?></span>
                                <span class="text-sm font-semibold text-near-black"><?php echo esc_html($node); ?></span>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="mt-5 rounded border border-line bg-white p-4">
                    <div class="flex flex-wrap items-center gap-2 text-xs font-medium text-mid-gray">
                        <span>Product</span><span class="text-brand">&rarr;</span><span>Availability</span><span
                            class="text-brand">&rarr;</span><span>Channels</span><span
                            class="text-brand">&rarr;</span><span>Bookings</span><span
                            class="text-brand">&rarr;</span><span>Insights</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="container mx-auto py-16 lg:py-24">
        <div class="mb-10 max-w-2xl">
            <p class="text-sm font-semibold uppercase tracking-wide text-brand-text">Audience pathways</p>
            <h2 class="mt-3 text-3xl font-semibold tracking-tight md:text-4xl">Choose your TXA pathway</h2>
        </div>
        <div class="grid gap-5 md:grid-cols-2 xl:grid-cols-4">
            <?php foreach ($audiences as $card): ?>
                <article class="flex h-full flex-col rounded border border-line bg-white p-6 shadow-sm">
                    <div
                        class="mb-5 flex size-12 items-center justify-center rounded bg-near-black text-base font-bold text-brand">
                        <?php echo esc_html($card['icon']); ?>
                    </div>
                    <h3 class="text-xl font-semibold"><?php echo esc_html($card['title']); ?></h3>
                    <p class="mt-3 grow text-sm leading-6 text-mid-gray"><?php echo esc_html($card['copy']); ?></p>
                    <a href="<?php echo esc_url($card['url']); ?>"
                        class="mt-6 text-sm font-semibold text-brand-text !no-underline hover:text-near-black"><?php echo esc_html($card['cta']); ?>
                        &rarr;</a>
                </article>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="bg-surface py-16 lg:py-24">
        <div class="container mx-auto grid gap-10 lg:grid-cols-[.9fr_1.1fr] lg:items-center">
            <div>
                <p class="text-sm font-semibold uppercase tracking-wide text-brand-text">Definition</p>
                <h2 class="mt-3 text-3xl font-semibold tracking-tight md:text-4xl">What is TXA?</h2>
                <p class="mt-5 text-lg leading-8 text-mid-gray">
                    TXA is Australia's open B2B tourism exchange. It connects tourism suppliers, destinations,
                    distributors and booking systems so live tourism products can be found, marketed, booked and
                    measured online.
                </p>
            </div>
            <div class="grid gap-4 sm:grid-cols-5">
                <?php foreach (['Suppliers', 'Destinations', 'Distributors', 'Booking systems', 'Data'] as $item): ?>
                    <div class="rounded border border-line bg-white p-4 text-center shadow-sm">
                        <div class="mx-auto mb-3 size-10 rounded bg-brand-tint"></div>
                        <p class="text-sm font-semibold text-dark-gray"><?php echo esc_html($item); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="container mx-auto py-16 lg:py-24">
        <div class="mx-auto mb-12 max-w-3xl text-center">
            <p class="text-sm font-semibold uppercase tracking-wide text-brand-text">Exchange flow</p>
            <h2 class="mt-3 text-3xl font-semibold tracking-tight md:text-4xl">How TXA works</h2>
            <p class="mt-5 text-lg leading-8 text-mid-gray">
                TXA connects live product, pricing and availability from tourism suppliers to destination websites,
                distributors and other online channels through one open exchange.
            </p>
        </div>
        <div class="grid gap-4 lg:grid-cols-5">
            <?php foreach ($work_steps as $index => $step): ?>
                <div class="relative rounded border border-line bg-white p-5 shadow-sm">
                    <span
                        class="mb-5 flex size-10 items-center justify-center rounded bg-near-black text-sm font-bold text-brand"><?php echo esc_html($index + 1); ?></span>
                    <h3 class="text-base font-semibold"><?php echo esc_html($step); ?></h3>
                    <?php if ($index < count($work_steps) - 1): ?>
                        <span
                            class="absolute -right-3 top-1/2 hidden size-6 -translate-y-1/2 items-center justify-center rounded-full bg-brand text-xs font-bold text-white lg:flex">&rarr;</span>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="bg-near-black py-16 text-white lg:py-24">
        <div class="container mx-auto grid gap-12 lg:grid-cols-[.95fr_1.05fr] lg:items-center">
            <div>
                <p class="text-sm font-semibold uppercase tracking-wide text-brand">Become a Smart Destination</p>
                <h2 class="mt-3 text-3xl font-semibold tracking-tight md:text-5xl">Move destination marketing from
                    inspiration to conversion</h2>
                <p class="mt-6 text-lg leading-8 text-white/65">
                    Smart Destinations use TXA as digital infrastructure for their visitor economy. It connects local
                    suppliers, destination content, DMO-owned websites and apps, trade channels, local reseller networks
                    and real-time data so destination marketing can move from inspiration to conversion.
                </p>
                <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                    <?php echo txa_button('Explore Smart Destinations', home_url('/destinations/')); ?>
                    <?php echo txa_button('Request Demo', home_url('/request-demo/'), 'light'); ?>
                </div>
            </div>
            <div class="grid gap-4 sm:grid-cols-2">
                <?php foreach ($smart_cards as $index => $card): ?>
                    <article class="rounded border border-white/10 bg-white/5 p-6">
                        <span
                            class="mb-8 flex size-11 items-center justify-center rounded bg-brand-tint text-sm font-bold text-brand"><?php echo esc_html($index + 1); ?></span>
                        <h3 class="text-lg font-semibold"><?php echo esc_html($card['title']); ?></h3>
                        <p class="mt-3 text-sm leading-6 text-white/65"><?php echo esc_html($card['copy']); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="container mx-auto py-16 lg:py-24">
        <div class="grid gap-6 lg:grid-cols-3">
            <article class="rounded border border-line bg-white p-7 shadow-sm">
                <p class="text-sm font-semibold uppercase tracking-wide text-brand-text">For tourism suppliers</p>
                <h2 class="mt-3 text-2xl font-semibold tracking-tight">Connect once and sell across more channels</h2>
                <p class="mt-4 text-sm leading-6 text-mid-gray">TXA helps tourism suppliers connect live product,
                    pricing and availability to destination websites, distributors and other online channels without
                    manually allocating to and managing inventory on every site.</p>
                <div class="mt-6 space-y-3">
                    <?php echo txa_button('Apply Now', home_url('/apply-now/')); ?>
                    <a href="<?php echo esc_url(home_url('/suppliers/')); ?>"
                        class="block text-sm font-semibold text-mid-gray !no-underline hover:text-brand-text">Learn more
                        about TXA for suppliers &rarr;</a>
                </div>
            </article>
            <article class="rounded border border-line bg-white p-7 shadow-sm">
                <p class="text-sm font-semibold uppercase tracking-wide text-brand-text">For distributors</p>
                <h2 class="mt-3 text-2xl font-semibold tracking-tight">Access bookable Australian tourism inventory</h2>
                <p class="mt-4 text-sm leading-6 text-mid-gray">TXA gives distributors a pathway to Australian tourism
                    suppliers across accommodation, tours, attractions, events and experiences.</p>
                <div class="mt-6 rounded bg-surface p-4 text-sm font-medium text-mid-gray">Inventory network:
                    suppliers &rarr; TXA &rarr; distributor channels</div>
                <div class="mt-6"><?php echo txa_button('Become a Distributor', home_url('/distributors/')); ?></div>
            </article>
            <article class="rounded border border-line bg-white p-7 shadow-sm">
                <p class="text-sm font-semibold uppercase tracking-wide text-brand-text">For booking-system partners</p>
                <h2 class="mt-3 text-2xl font-semibold tracking-tight">Connect your customers to Australia's national
                    tourism exchange</h2>
                <p class="mt-4 text-sm leading-6 text-mid-gray">Booking-system vendors can connect to TXA so their
                    supplier customers can participate in the national tourism exchange and access broader distribution
                    opportunities.</p>
                <div class="mt-6 rounded bg-surface p-4 font-mono text-xs text-mid-gray">API &rarr; product feed
                    &rarr; availability &rarr; bookings</div>
                <div class="mt-6"><?php echo txa_button('Partner Enquiry', home_url('/booking-systems/')); ?></div>
            </article>
        </div>
    </section>

    <section class="bg-surface py-16 lg:py-24">
        <div class="container mx-auto grid gap-10 lg:grid-cols-[.8fr_1.2fr] lg:items-center">
            <div>
                <p class="text-sm font-semibold uppercase tracking-wide text-brand-text">Data and insights</p>
                <h2 class="mt-3 text-3xl font-semibold tracking-tight md:text-4xl">Data that helps destinations see what
                    is working</h2>
                <p class="mt-5 text-lg leading-8 text-mid-gray">TXA helps destinations understand supplier activity,
                    campaign performance, visitor engagement and booking outcomes through dashboards, attribution and
                    data exports.</p>
                <div class="mt-8">
                    <?php echo txa_button('Learn about Data & Insights', home_url('/data-insights/'), 'secondary'); ?>
                </div>
            </div>
            <div class="rounded border border-line bg-white p-5 shadow-sm">
                <div class="mb-5 grid grid-cols-3 gap-3">
                    <div class="h-3 rounded bg-line"></div>
                    <div class="h-3 rounded bg-brand-tint"></div>
                    <div class="h-3 rounded bg-line"></div>
                </div>
                <div class="grid gap-4 sm:grid-cols-2">
                    <?php foreach ($insights as $index => $item): ?>
                        <div class="<?php echo 4 === $index ? 'sm:col-span-2' : ''; ?> rounded border border-line p-4">
                            <p class="text-sm font-semibold"><?php echo esc_html($item); ?></p>
                            <div class="mt-4 h-2 rounded bg-surface">
                                <div class="h-2 rounded bg-brand"
                                    style="width: <?php echo esc_attr(42 + ($index * 10)); ?>%"></div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <section class="container mx-auto py-16 lg:py-24">
        <div class="grid gap-8 rounded border border-line bg-surface p-8 lg:grid-cols-[.75fr_1.25fr] lg:p-10">
            <div>
                <p class="text-sm font-semibold uppercase tracking-wide text-brand-text">Provenance</p>
                <h2 class="mt-3 text-3xl font-semibold tracking-tight">Built for Australia's tourism industry</h2>
            </div>
            <div>
                <p class="text-lg leading-8 text-mid-gray">
                    Tourism Exchange Australia was established in partnership with ATDW as Australia's open,
                    commercially neutral booking exchange. TXA was built to give Australian tourism suppliers fair
                    access to ecommerce and online distribution.
                </p>
                <div class="mt-6 grid gap-4 sm:grid-cols-3">
                    <div class="rounded border border-line bg-white p-4 text-sm font-semibold">Commercially neutral
                    </div>
                    <div class="rounded border border-line bg-white p-4 text-sm font-semibold">Open exchange</div>
                    <div class="rounded border border-line bg-white p-4 text-sm font-semibold">ATDW partnership
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-near-black py-16 text-white lg:py-24">
        <div class="container mx-auto max-w-4xl text-center">
            <h2 class="text-3xl font-semibold tracking-tight md:text-5xl">Ready to connect your tourism business or
                destination?</h2>
            <p class="mx-auto mt-5 max-w-2xl text-lg leading-8 text-white/65">
                Whether you are a supplier, destination, distributor or booking-system partner, TXA gives you a pathway
                to connect with Australia's tourism exchange.
            </p>
            <div class="mt-8 flex flex-col justify-center gap-3 sm:flex-row">
                <?php echo txa_button('Apply Now', home_url('/apply-now/')); ?>
                <?php echo txa_button('Request Smart Destination Demo', home_url('/request-demo/'), 'light'); ?>
            </div>
        </div>
    </section>
</article>

<?php
get_footer();
