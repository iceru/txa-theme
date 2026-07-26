<?php
/**
 * Template Name: Destinations Page
 *
 * @package TailPress
 */

add_filter('pre_get_document_title', function (): string {
    return 'TXA for Destinations | Become a Smart Destination';
});

add_action('wp_head', function (): void {
    if (is_page_template('page-destinations.php')) {
        echo '<meta name="description" content="' . esc_attr('TXA helps destination organisations move from inspiration-only marketing to connected, bookable visitor outcomes through Smart Destination infrastructure.') . '">' . "\n";
    }
});

get_header();

$demo_url = home_url('/destinations/request-demo/');
$pricing_url = home_url('/destinations/pricing/');

$smart_destination_pillars = [
    ['title' => 'Supply', 'copy' => 'Real-time inventory', 'icon' => '<path d="M5 7h14v13H5z"/><path d="M8 7V5h8v2"/><path d="M9 11h6"/><path d="M9 15h4"/>'],
    ['title' => 'Content', 'copy' => 'Rich product data', 'icon' => '<path d="M7 3h7l4 4v14H7z"/><path d="M14 3v5h5"/><path d="M10 13h6"/><path d="M10 17h4"/>'],
    ['title' => 'Channels', 'copy' => 'Global distribution', 'icon' => '<circle cx="12" cy="12" r="3"/><path d="M12 3v3"/><path d="M12 18v3"/><path d="M3 12h3"/><path d="M18 12h3"/><path d="m5.6 5.6 2.1 2.1"/><path d="m16.3 16.3 2.1 2.1"/><path d="m18.4 5.6-2.1 2.1"/><path d="m7.7 16.3-2.1 2.1"/>'],
    ['title' => 'Concierge', 'copy' => 'Automated booking', 'icon' => '<path d="M6 13a6 6 0 0 1 12 0"/><path d="M4 13h3v5H4z"/><path d="M17 13h3v5h-3z"/><path d="M12 19c2 0 3-.7 3-2"/>'],
    ['title' => 'Data', 'copy' => 'Behavioural insights', 'icon' => '<path d="M4 19V5"/><path d="M20 19H4"/><path d="M8 16v-5"/><path d="M12 16V8"/><path d="M16 16v-7"/>'],
];

$problems = [
    ['title' => 'Fragmented Inventory', 'copy' => 'Suppliers use 100+ different booking systems, making a central portal impossible.'],
    ['title' => 'Lost Conversion', 'copy' => 'Users leave the destination site to book, resulting in massive drop-offs and lost data.'],
    ['title' => 'Blind Marketing', 'copy' => 'DMOs know who looks at pages, but not who actually visits the region.'],
    ['title' => 'Manual Workflows', 'copy' => 'Updating content and product status across platforms is labor-intensive.'],
];

$responses = [
    ['title' => 'Neutral Connectivity', 'copy' => 'One connection to TXA unlocks 100% of bookable local inventory regardless of software.'],
    ['title' => 'Integrated Booking Path', 'copy' => 'Keep visitors on your domain from inspiration to confirmation.'],
    ['title' => 'Total Data Visibility', 'copy' => 'Own the transaction data and attribution for every campaign dollar spent.'],
];

$capabilities = [
    ['title' => 'Activate digital assets', 'copy' => 'Use B2B and B2C destination websites, apps, APIs, widgets and custom booking pages to connect brand, content and conversion.', 'icon' => '<path d="M7 7h10v10H7z"/><path d="M4 11h3"/><path d="M17 13h3"/><path d="M11 4v3"/><path d="M13 17v3"/>'],
    ['title' => 'Digitise local supply', 'copy' => 'Support multiple supplier pathways, including connected systems, free or low-cost booking options, on-request, content-only and smart referral models.', 'icon' => '<path d="M6 15a4 4 0 0 1 4-4h1"/><path d="M13 11h1a4 4 0 0 1 0 8H8a5 5 0 0 1-.7-10"/><path d="M13 7a4 4 0 0 1 7 2.6"/>'],
    ['title' => 'Own your data', 'copy' => 'Data that belongs to your destination, not a third-party platform.', 'featured' => true, 'icon' => '<path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10Z"/><path d="m9 12 2 2 4-5"/>'],
    ['title' => 'Connect supply to the world', 'copy' => 'Aggregate supplier and destination content and make it available to distributors, trade channels, DMO-owned assets and connected APIs.', 'icon' => '<circle cx="12" cy="12" r="9"/><path d="M3 12h18"/><path d="M12 3a14 14 0 0 1 0 18"/><path d="M12 3a14 14 0 0 0 0 18"/>'],
    ['title' => 'Commercial neutrality', 'copy' => 'Use a platform model that supports multiple booking systems and commercial models.', 'icon' => '<path d="M12 3v18"/><path d="m7 8-4 7h8L7 8Z"/><path d="m17 8-4 7h8l-4-7Z"/><path d="M5 21h14"/>'],
];

$insight_points = [
    'Granular Attribution: Know exactly which Facebook ad or Email led to which booking.',
    'Operator Performance: Monitor regional inventory health and identify gaps in supply.',
    'Demand Forecasts: Use real-time data to predict busy periods and optimize staffing.',
];

$implementation_steps = [
    ['title' => 'Define Assets Activation', 'copy' => 'Define the destination assets activation: website, campaign, trade, virtual concierge, data or a combination.', 'icon' => '<path d="M4 7h7v7H4z"/><path d="M13 10h7v7h-7z"/><path d="M7 17h4v4H7z"/>'],
    ['title' => 'Identify Priorities', 'copy' => 'Identify priority suppliers, POIs, recommended experiences, itineraries and local partners.', 'icon' => '<path d="M20 10c0 5-8 11-8 11S4 15 4 10a8 8 0 1 1 16 0Z"/><circle cx="12" cy="10" r="3"/>'],
    ['title' => 'Onboard Suppliers', 'copy' => 'Onboard suppliers through the most appropriate pathway for each business.', 'icon' => '<path d="M16 21v-2a4 4 0 0 0-8 0v2"/><circle cx="12" cy="7" r="4"/><path d="M20 8v6"/><path d="M23 11h-6"/>'],
    ['title' => 'Create Digital Assets', 'copy' => 'Create branded booking pages, destination landing pages, widgets, QR links and campaign assets.', 'icon' => '<path d="M5 4h14v16H5z"/><path d="M8 8h8"/><path d="M8 12h8"/><path d="M8 16h5"/>'],
    ['title' => 'Launch Network', 'copy' => 'Launch DMO website activation, microsite, trade portal or local reseller network.', 'icon' => '<path d="M5 19c7-1 11-5 14-14"/><path d="M14 5h5v5"/><path d="M5 12h4v7H5z"/>'],
    ['title' => 'Track & Optimize', 'copy' => 'Track engagement, conversion, attribution and data exports through the dashboards and agreed reporting model.', 'icon' => '<path d="M4 19V5"/><path d="M20 19H4"/><path d="m7 15 3-3 3 2 4-6"/>'],
];

$faqs = [
    ['question' => 'Does this replace our existing CMS?', 'answer' => 'No. TXA can work alongside your existing destination website or CMS by powering bookable pathways, widgets, APIs and destination-specific booking pages.'],
    ['question' => 'How much does it cost operators?', 'answer' => 'Commercial models can vary by destination. TXA is designed to support flexible destination packages and supplier pathways.'],
    ['question' => 'Is TXA an OTA (Online Travel Agent)?', 'answer' => 'No. TXA is a neutral B2B exchange that connects suppliers, destinations, distributors and booking systems.'],
];

if (!function_exists('txa_page_button')) {
    function txa_page_button(string $label, string $url, string $variant = 'primary'): string
    {
        $classes = 'inline-flex w-full items-center justify-center rounded px-5 py-3 text-sm font-semibold !no-underline transition sm:w-auto';

        if ('secondary-dark' === $variant) {
            $classes .= ' border border-white/70 bg-white/10 text-white hover:bg-white/20';
        } elseif ('secondary' === $variant) {
            $classes .= ' border border-line bg-white text-near-black hover:bg-surface';
        } else {
            $classes .= ' bg-brand text-white hover:bg-brand-dark';
        }

        return sprintf('<a class="%s" href="%s">%s</a>', esc_attr($classes), esc_url($url), esc_html($label));
    }
}

if (!function_exists('txa_inline_icon')) {
    function txa_inline_icon(string $path, string $classes = 'size-7 text-brand'): string
    {
        return sprintf(
            '<svg class="%s" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">%s</svg>',
            esc_attr($classes),
            $path
        );
    }
}
?>

<article class="bg-white text-near-black">
    <section class="px-4 py-6 lg:px-8">
        <div class="container mx-auto">
            <div class="relative min-h-[430px] overflow-hidden rounded-lg bg-near-black md:min-h-[520px]">
                <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=2200&q=80"
                    alt="Blue Mountains valley and cliffs"
                    class="absolute inset-0 h-full w-full object-cover">
                <div class="absolute inset-0 bg-near-black/48" aria-hidden="true"></div>
                <div class="relative z-10 flex min-h-[430px] items-center p-6 md:min-h-[520px] md:p-8">
                    <div class="max-w-3xl">
                        <p class="inline-flex rounded bg-brand px-4 py-2 text-xs font-bold uppercase tracking-wide text-white">
                            TXA for Destinations
                        </p>
                        <h1 class="mt-5 max-w-xl text-4xl font-semibold leading-tight text-white md:text-5xl">
                            Grow your local visitor economy
                        </h1>
                        <p class="mt-5 max-w-2xl text-base font-semibold leading-7 text-white/90">
                            TXA helps destination organisations move from inspiration-only marketing to connected, bookable visitor outcomes. TXA is commercially neutral and booking-system agnostic, so destinations can support their whole industry without forcing suppliers into one commercial model or technology stack.
                        </p>
                        <div class="mt-7 flex flex-col gap-3 sm:flex-row">
                            <?php echo txa_page_button('Request Smart Destination Demo', $demo_url); ?>
                            <?php echo txa_page_button('See destination packages', $pricing_url, 'secondary-dark'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="px-4 py-10 lg:px-8 lg:py-14">
        <div class="container mx-auto">
            <div class="mx-auto max-w-4xl text-center">
                <h2 class="text-3xl font-semibold leading-tight md:text-4xl">What is a TXA Smart Destination?</h2>
                <p class="mt-4 text-sm leading-6 text-mid-gray md:text-base">
                    As a Smart Destination, your organisation can use TXA to activate destination websites and apps, digitise local supply, connect suppliers to distributors, build tactical microsites, support trade initiatives, enable virtual concierge networks and use real-time data to understand what is working.
                </p>
            </div>
            <div class="mx-auto mt-12 grid max-w-5xl gap-5 sm:grid-cols-2 lg:grid-cols-5">
                <?php foreach ($smart_destination_pillars as $pillar): ?>
                    <article class="text-center">
                        <div class="mx-auto flex size-14 items-center justify-center rounded bg-brand-tint text-brand">
                            <?php echo txa_inline_icon($pillar['icon'], 'size-7'); ?>
                        </div>
                        <h3 class="mt-4 text-base font-semibold"><?php echo esc_html($pillar['title']); ?></h3>
                        <p class="mt-1 text-xs leading-5 text-mid-gray"><?php echo esc_html($pillar['copy']); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="bg-surface px-4 py-12 lg:px-8 lg:py-16">
        <div class="container mx-auto">
            <div class="grid gap-8 lg:grid-cols-[1.05fr_.95fr] lg:items-center">
                <div>
                    <h2 class="text-3xl font-semibold leading-tight md:text-4xl">The problem TXA solves for destinations</h2>
                    <p class="mt-6 max-w-3xl text-sm leading-6 text-mid-gray">
                        Marketing a destination is easy; converting that interest into actual regional bookings is where most DMOs struggle.
                    </p>
                    <div class="mt-8 grid gap-4 md:grid-cols-2">
                        <?php foreach ($problems as $problem): ?>
                            <article class="border-l-4 border-brand rounded bg-white p-5 shadow-sm">
                                <h3 class="text-base font-semibold"><?php echo esc_html($problem['title']); ?></h3>
                                <p class="mt-2 text-sm leading-6 text-mid-gray"><?php echo esc_html($problem['copy']); ?></p>
                            </article>
                        <?php endforeach; ?>
                    </div>
                </div>
                <aside class="rounded-lg bg-brand p-8 text-white shadow-xl shadow-brand/20">
                    <h3 class="text-2xl font-semibold">The TXA Response</h3>
                    <div class="mt-7 space-y-6">
                        <?php foreach ($responses as $response): ?>
                            <div class="flex gap-3">
                                <svg class="mt-1 size-5 shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <circle cx="12" cy="12" r="9"/>
                                    <path d="m8 12 2.5 2.5L16 9"/>
                                </svg>
                                <div>
                                    <h4 class="text-sm font-semibold"><?php echo esc_html($response['title']); ?></h4>
                                    <p class="mt-1 text-sm leading-5 text-white/80"><?php echo esc_html($response['copy']); ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </aside>
            </div>
        </div>
    </section>

    <section class="px-4 py-12 lg:px-8 lg:py-16">
        <div class="container mx-auto">
            <h2 class="text-3xl font-semibold leading-tight md:text-4xl">What a TXA Smart Destination enables</h2>
            <div class="mt-10 grid gap-5 md:grid-cols-2 xl:grid-cols-3">
                <?php foreach ($capabilities as $capability): ?>
                    <article class="<?php echo !empty($capability['featured']) ? 'border-brand' : 'border-line'; ?> rounded border bg-white p-6 shadow-sm">
                        <?php echo txa_inline_icon($capability['icon']); ?>
                        <h3 class="mt-5 text-xl font-semibold"><?php echo esc_html($capability['title']); ?></h3>
                        <p class="mt-3 text-sm leading-6 text-mid-gray"><?php echo esc_html($capability['copy']); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="bg-surface px-4 py-12 lg:px-8 lg:py-16">
        <div class="container mx-auto">
            <div class="grid gap-10 lg:grid-cols-[.9fr_1.1fr] lg:items-center">
                <div>
                    <h2 class="max-w-xl text-3xl font-semibold leading-tight md:text-4xl">
                        See who is visiting, what is working and where to invest next
                    </h2>
                    <p class="mt-6 max-w-xl text-base leading-7 text-mid-gray">
                        Stop relying on website clicks as your primary metric. TXA gives you true business intelligence by tracking the full visitor journey from discovery to the till.
                    </p>
                    <ul class="mt-7 space-y-4">
                        <?php foreach ($insight_points as $point): ?>
                            <li class="flex gap-3 text-sm font-semibold leading-6 text-near-black">
                                <svg class="mt-0.5 size-5 shrink-0 text-brand" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <path d="m4 16 5-5 4 4 7-8"/>
                                    <path d="M14 7h6v6"/>
                                </svg>
                                <?php echo esc_html($point); ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="rounded-lg bg-white p-7 shadow-xl shadow-near-black/10">
                    <div class="mb-6 flex items-start justify-between gap-4">
                        <div>
                            <p class="text-xs font-bold uppercase tracking-wide text-brand-text">Destination Dashboard</p>
                            <h3 class="mt-1 text-xl font-semibold">Visitor Performance</h3>
                        </div>
                        <svg class="size-5 text-brand" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M8 2v4"/><path d="M16 2v4"/><path d="M3 10h18"/><rect width="18" height="18" x="3" y="4" rx="2"/>
                        </svg>
                    </div>
                    <div class="space-y-5">
                        <?php foreach ([['Accommodation Bookings', 'w-10/12', '+24%'], ['Tours & Experiences', 'w-7/12', '+18%'], ['Campaign Conversion Rate', 'w-11/12', '4.2%']] as $metric): ?>
                            <div>
                                <div class="flex justify-between gap-4 text-xs font-semibold">
                                    <span><?php echo esc_html($metric[0]); ?></span>
                                    <span class="text-brand"><?php echo esc_html($metric[2]); ?></span>
                                </div>
                                <div class="mt-2 h-2 rounded bg-brand-tint">
                                    <div class="<?php echo esc_attr($metric[1]); ?> h-2 rounded bg-brand"></div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="mt-8 grid gap-4 sm:grid-cols-2">
                        <div class="rounded bg-brand-tint p-5">
                            <p class="text-xs font-bold uppercase text-mid-gray">Top Source</p>
                            <p class="mt-2 text-lg font-semibold">Melbourne, AU</p>
                        </div>
                        <div class="rounded bg-brand-tint p-5">
                            <p class="text-xs font-bold uppercase text-mid-gray">Lead Time</p>
                            <p class="mt-2 text-lg font-semibold">18.5 Days</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="relative overflow-hidden bg-near-black px-4 py-12 text-white lg:px-8 lg:py-16">
        <img src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=1800&q=80"
            alt="" class="absolute inset-0 h-full w-full object-cover opacity-40">
        <div class="absolute inset-0 bg-teal-950/55" aria-hidden="true"></div>
        <div class="container relative z-10 mx-auto">
            <div class="grid gap-10 lg:grid-cols-[.65fr_1.35fr] lg:items-start">
                <div>
                    <h2 class="max-w-sm text-3xl font-semibold leading-tight md:text-4xl">
                        How a TXA Smart Destination is easily implemented
                    </h2>
                    <div class="mt-7">
                        <?php echo txa_page_button('See Destination Packages', $pricing_url); ?>
                    </div>
                </div>
                <div class="grid gap-5 md:grid-cols-2 xl:grid-cols-3">
                    <?php foreach ($implementation_steps as $index => $step): ?>
                        <article class="rounded border border-white/10 bg-white/15 p-6 backdrop-blur">
                            <div class="flex items-start justify-between gap-4">
                                <span class="flex size-10 shrink-0 items-center justify-center rounded bg-brand text-white">
                                    <?php echo txa_inline_icon($step['icon'], 'size-5'); ?>
                                </span>
                                <span class="text-xs text-white/25"><?php echo esc_html(str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT)); ?></span>
                            </div>
                            <h3 class="mt-5 text-lg font-semibold"><?php echo esc_html($step['title']); ?></h3>
                            <p class="mt-3 text-sm leading-6 text-white/75"><?php echo esc_html($step['copy']); ?></p>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <section class="px-4 py-14 lg:px-8 lg:py-20">
        <div class="container mx-auto">
            <h2 class="text-center text-3xl font-semibold leading-tight md:text-4xl">Frequently Asked Questions</h2>
            <div class="mx-auto mt-10 max-w-3xl space-y-4">
                <?php foreach ($faqs as $faq): ?>
                    <details class="group rounded bg-white p-5 shadow-lg shadow-near-black/10">
                        <summary class="flex cursor-pointer list-none items-center justify-between gap-4 text-sm font-semibold">
                            <?php echo esc_html($faq['question']); ?>
                            <span class="text-brand transition group-open:rotate-45">+</span>
                        </summary>
                        <p class="mt-4 text-sm leading-6 text-mid-gray"><?php echo esc_html($faq['answer']); ?></p>
                    </details>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</article>

<?php
get_footer();
