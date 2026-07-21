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
        echo '<meta name="description" content="' . esc_attr('TXA helps DMOs, GTOs, RTOs, LGAs and visitor centres connect local tourism supply, destination content, owned channels, trade access, virtual concierge and data.') . '">' . "\n";
    }
});

get_header();

$demo_url = home_url('/destinations/request-demo/');
$pricing_url = home_url('/destinations/pricing/');

$ecosystem_nodes = [
    'Local Suppliers',
    'Destination Content',
    'Owned Channels',
    'Trade Channels',
    'Virtual Concierge',
    'Data',
];

$smart_destination_icons = [
    'Supply',
    'Content',
    'Channels',
    'Concierge',
    'Data',
];

$problems = [
    'Destination websites often generate interest but lose conversion through static listings, redirects and non-bookable supplier pages.',
    'Local inventory is fragmented across many systems, manual processes and suppliers with low digital capability.',
    'A growing share of visitor spend is captured through international OTA pathways that limit destination visibility and local data.',
    'DMOs need evidence of campaign ROI, supplier engagement and local economic impact, but often lack real-time performance data.',
    'Small operators need support to participate in digital distribution without complex technology or large upfront investment.',
];

$capabilities = [
    [
        'title' => 'Activate digital assets',
        'copy' => 'Use B2B and B2C destination websites, apps, APIs, widgets and custom booking pages to connect brand, content and conversion.',
        'outcome' => 'Visitors move from inspiration to bookable products without leaving the journey.',
    ],
    [
        'title' => 'Digitise local supply',
        'copy' => 'Support multiple supplier pathways, including connected systems, free or low-cost booking options, on-request, content-only and smart referral models.',
        'outcome' => 'More local suppliers become visible and bookable, including small and low-tech businesses.',
    ],
    [
        'title' => 'Connect supply to the world',
        'copy' => 'Aggregate supplier and destination content and make it available to distributors, trade channels, DMO-owned assets and connected APIs.',
        'outcome' => 'Local product reaches more channels and becomes easier for visitors and trade to book.',
    ],
    [
        'title' => 'Own your data',
        'copy' => 'First-party dashboards, attribution codes and data exports give you real-time visibility of supplier activity, campaign performance and visitor engagement.',
        'outcome' => 'Your organisation can measure conversion, prove ROI and make better decisions about where to invest.',
        'featured' => true,
    ],
    [
        'title' => 'Commercial neutrality',
        'copy' => 'Use a platform model that supports multiple booking systems and commercial models.',
        'outcome' => 'The destination can support the entire local industry without favouring one supplier system or distributor model.',
    ],
];

$use_cases = [
    [
        'title' => 'Website Activation',
        'copy' => 'Move destination websites from inspiration to bookable visitor journeys.',
        'url' => home_url('/destinations/website-activation/'),
    ],
    [
        'title' => 'POIs & Experiences',
        'copy' => 'Connect Points of Interest, recommended experiences and itineraries with bookable local suppliers.',
        'url' => home_url('/destinations/points-of-interest-experiences/'),
    ],
    [
        'title' => 'Campaign Activation Pages',
        'copy' => 'Create tactical campaign pages for events, seasons, themes and industry groups.',
        'url' => home_url('/destinations/microsites-campaigns/'),
    ],
    [
        'title' => 'Trade Portal',
        'copy' => 'Give trade partners a destination-specific page with supplier discovery and bookable product.',
        'url' => home_url('/destinations/trade-portal/'),
    ],
    [
        'title' => 'Virtual Concierge',
        'copy' => 'Create a local reseller or concierge network for accommodation providers, visitor centres and local partners.',
        'url' => home_url('/destinations/virtual-concierge/'),
    ],
    [
        'title' => 'Data & Insights',
        'copy' => 'Use dashboards, attribution and exports to understand what is working.',
        'url' => home_url('/destinations/data-insights/'),
    ],
];

$commercial_models = [
    'Commission-free supplier network',
    'Revenue-generating distributor model',
    'Custom destination model',
];

$dashboard_cards = [
    [
        'title' => 'Supplier activity',
        'bar' => 'w-5/12',
    ],
    [
        'title' => 'Campaign performance',
        'bar' => 'w-6/12',
    ],
    [
        'title' => 'Visitor engagement',
        'bar' => 'w-7/12',
    ],
    [
        'title' => 'Booking outcomes',
        'bar' => 'w-8/12',
    ],
    [
        'title' => 'Data exports',
        'bar' => 'w-9/12',
    ],
    [
        'title' => 'Attribution codes',
        'bar' => 'w-10/12',
    ],
];

$implementation_steps = [
    [
        'title' => 'Define the destination activation',
        'copy' => 'Website, campaign, trade, virtual concierge, data or a combination.',
    ],
    [
        'title' => 'Identify priority assets',
        'copy' => 'Confirm priority suppliers, POIs, recommended experiences, itineraries and local partners.',
    ],
    [
        'title' => 'Onboard suppliers',
        'copy' => 'Support suppliers through the most appropriate pathway for each business.',
    ],
    [
        'title' => 'Create destination assets',
        'copy' => 'Build branded booking pages, destination landing pages, widgets, QR links and campaign assets.',
    ],
    [
        'title' => 'Launch the destination pathway',
        'copy' => 'Launch website activation, campaign page, trade portal or local reseller network.',
    ],
    [
        'title' => 'Track and optimise',
        'copy' => 'Monitor engagement, conversion, attribution and reporting through dashboards and agreed data exports.',
    ],
];

$trust_cards = [
    'Partner logo',
    'Case study example',
    'Destination example',
    'Industry proof point',
];

$faqs = [
    [
        'question' => 'What is a TXA Smart Destination?',
        'answer' => 'A TXA Smart Destination uses TXA as digital infrastructure to connect local tourism supply, destination content, owned channels, trade access, visitor concierge and data through one neutral platform.',
    ],
    [
        'question' => 'Does TXA replace OTAs?',
        'answer' => 'No. OTAs can remain useful channels. TXA helps destinations create an owned, neutral pathway that works alongside external channels while giving the destination more visibility, attribution and control.',
    ],
    [
        'question' => 'Can small or low-tech suppliers participate?',
        'answer' => 'Yes. TXA supports multiple supplier pathways, including connected booking systems, free or low-cost booking options, on-request, content-only and smart referral models where appropriate.',
    ],
    [
        'question' => 'What data can destinations access?',
        'answer' => 'TXA can support dashboards, attribution codes, booking data, supplier activity reporting and export options, subject to privacy, consent and governance rules.',
    ],
    [
        'question' => 'Is TXA booking-system agnostic?',
        'answer' => 'Yes. TXA is designed to support multiple booking systems and commercial models so destinations can support their broader local industry.',
    ],
];

if (!function_exists('txa_page_button')) {
    function txa_page_button(string $label, string $url, string $variant = 'primary', bool $external = false): string
    {
        $classes = 'inline-flex w-full items-center justify-center rounded-lg px-5 py-3 text-sm font-semibold !no-underline transition sm:w-auto';

        if ('secondary-dark' === $variant) {
            $classes .= ' border border-brand text-white hover:bg-white/5';
        } elseif ('secondary' === $variant) {
            $classes .= ' border border-line text-near-black hover:border-brand hover:bg-brand-tint hover:text-brand-text';
        } else {
            $classes .= ' bg-brand text-white hover:bg-brand-dark';
        }

        $target = $external ? ' target="_blank" rel="noopener noreferrer"' : '';

        return sprintf(
            '<a class="%s" href="%s"%s>%s</a>',
            esc_attr($classes),
            esc_url($url),
            $target,
            esc_html($label)
        );
    }
}
?>

<article class="text-near-black">
    <section class="p-6">
        <div class="relative min-h-[80vh] overflow-hidden rounded-lg border border-white/70 bg-near-black shadow-2xl shadow-near-black/20">
            <img src="https://images.unsplash.com/photo-1523482580672-f109ba8cb9be?auto=format&fit=crop&w=2200&q=80" alt="" class="absolute inset-0 h-full w-full object-cover">
            <div class="absolute inset-0 bg-near-black/50" aria-hidden="true"></div>

            <div class="relative z-10 flex min-h-[80vh] p-8">
                <div class="container mx-auto flex items-center">
                    <div class="max-w-4xl pb-56 lg:pb-0">
                        <p class="mb-2 inline-flex rounded-lg bg-brand px-4 py-2 text-sm font-semibold uppercase text-white">
                            For destinations
                        </p>
                        <h1 class="mb-6 max-w-3xl text-4xl font-semibold leading-tight text-white md:text-6xl lg:text-5xl">
                            TXA for destinations: grow your local visitor economy
                        </h1>
                        <div class="max-w-2xl">
                            <p class="text-base leading-7 text-white/85 md:text-lg">
                                TXA helps destination organisations move from inspiration-only marketing to connected, bookable visitor outcomes.
                            </p>
                            <p class="mt-4 text-sm leading-6 text-white/70 md:text-base">
                                As a Smart Destination, your organisation can use TXA to activate destination websites and apps, digitise local supply, connect suppliers to distributors, build tactical campaign pages, support trade initiatives, enable virtual concierge networks and use real-time data to understand what is working.
                            </p>
                            <div class="mt-6 flex flex-col gap-3 sm:flex-row">
                                <?php echo txa_page_button('Request Smart Destination Demo', $demo_url); ?>
                                <?php echo txa_page_button('See destination packages', $pricing_url, 'secondary-dark'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="absolute bottom-0 right-0 z-20 w-full max-w-md p-6 md:p-8">
                <div class="rounded-lg bg-white p-5 text-near-black shadow-2xl shadow-near-black/25">
                    <p class="text-xs font-semibold uppercase text-brand-text">Smart Destination ecosystem</p>
                    <h2 class="mt-2 text-2xl font-semibold leading-tight">TXA Smart Destination</h2>
                    <p class="mt-3 text-sm leading-6 text-mid-gray">
                        Commercially neutral and booking-system agnostic infrastructure for destination-wide visitor outcomes.
                    </p>
                    <div class="mt-5 flex flex-wrap gap-2">
                        <?php foreach ($ecosystem_nodes as $node): ?>
                            <span class="rounded-lg bg-surface px-3 py-2 text-xs font-semibold text-mid-gray"><?php echo esc_html($node); ?></span>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-surface px-4 py-8 lg:px-8 lg:py-12">
        <div class="container mx-auto">
            <div class="rounded-lg bg-white p-6 shadow-sm lg:p-8">
                <div class="grid gap-8 lg:grid-cols-[.9fr_1.1fr] lg:items-center">
                    <div>
                        <p class="text-sm font-semibold uppercase text-brand-text">Definition</p>
                        <h2 class="mt-3 text-3xl font-semibold leading-tight md:text-4xl">What is a TXA Smart Destination?</h2>
                        <p class="mt-5 text-lg leading-8 text-mid-gray">
                            A TXA Smart Destination connects local tourism supply, destination content, owned digital channels, trade channels, local reseller networks and performance data through one neutral platform.
                        </p>
                        <p class="mt-5 text-base leading-7 text-mid-gray">
                            Smart Destinations use TXA as digital infrastructure for their visitor economy. It helps destination marketing move from inspiration to conversion by connecting local suppliers, bookable experiences, branded digital assets and real-time data.
                        </p>
                    </div>
                    <div class="grid gap-4 sm:grid-cols-5">
                        <?php foreach ($smart_destination_icons as $item): ?>
                            <div class="rounded-lg border border-line bg-surface p-4 text-center">
                                <div class="mx-auto mb-3 flex size-10 items-center justify-center rounded-lg bg-brand text-xs font-bold text-white">
                                    <?php echo esc_html(substr($item, 0, 1)); ?>
                                </div>
                                <p class="text-sm font-semibold text-dark-gray"><?php echo esc_html($item); ?></p>
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
            <div class="max-w-3xl">
                <p class="text-sm font-semibold uppercase text-brand-text">Destination challenge</p>
                <h2 class="mt-3 text-3xl font-semibold leading-tight md:text-4xl">The problem TXA solves for destinations</h2>
            </div>
            <p class="max-w-md text-sm leading-6 text-mid-gray">TXA turns fragmented destination interest into connected, measurable visitor outcomes.</p>
        </div>
        <div class="grid gap-5 md:grid-cols-2 xl:grid-cols-3">
            <?php foreach ($problems as $index => $problem): ?>
                <article class="rounded-lg border border-line bg-white p-6 shadow-sm">
                    <span class="mb-4 flex size-10 items-center justify-center rounded-lg bg-brand-tint text-sm font-bold text-brand-text"><?php echo esc_html($index + 1); ?></span>
                    <p class="text-sm leading-6 text-mid-gray"><?php echo esc_html($problem); ?></p>
                </article>
            <?php endforeach; ?>
            <article class="rounded-lg border border-brand/20 bg-brand-tint p-6 shadow-sm md:col-span-2 xl:col-span-1">
                <p class="text-sm font-semibold uppercase text-brand-text">TXA response</p>
                <h3 class="mt-3 text-xl font-semibold">A neutral pathway from industry supply to visitor outcomes</h3>
                <p class="mt-4 text-sm leading-6 text-mid-gray">TXA connects supplier participation, owned destination channels and reporting into one practical operating model.</p>
            </article>
        </div>
        </div>
    </section>

    <section class="bg-surface px-4 py-8 lg:px-8 lg:py-12">
        <div class="container mx-auto">
            <div class="rounded-lg bg-white p-6 shadow-sm lg:p-8">
            <div class="mb-8 max-w-3xl">
                <p class="text-sm font-semibold uppercase text-brand-text">Destination websites should do more than inspire</p>
                <h2 class="mt-3 text-3xl font-semibold leading-tight md:text-4xl">Your destination generates inspiration. TXA helps you own the conversion.</h2>
                <p class="mt-5 text-lg leading-8 text-mid-gray">
                    When a visitor discovers your destination through your marketing and books through a third-party channel, that booking data and the relationship with that traveller leaves your ecosystem. OTAs are channels, not a strategy.
                </p>
                <p class="mt-5 text-base leading-7 text-mid-gray">
                    TXA gives destinations a neutral, owned pathway: branded booking pages, first-party data, local supplier connections and attribution you control. The goal is not to replace external channels. It is to make sure your destination has its own pathway that works alongside them.
                </p>
            </div>
            <div class="grid gap-6 lg:grid-cols-2">
                <article class="rounded-lg border border-line bg-surface p-6">
                    <h3 class="text-xl font-semibold">Traditional destination website</h3>
                    <div class="mt-6 grid gap-3">
                        <?php foreach (['Inspiration', 'Static listing', 'External booking path', 'Lost data'] as $step): ?>
                            <div class="rounded-lg border border-line bg-white p-4 text-sm font-semibold text-mid-gray"><?php echo esc_html($step); ?></div>
                        <?php endforeach; ?>
                    </div>
                </article>
                <article class="rounded-lg border border-brand/20 bg-brand-tint p-6">
                    <h3 class="text-xl font-semibold">TXA Smart Destination</h3>
                    <div class="mt-6 grid gap-3">
                        <?php foreach (['Inspiration', 'Branded booking path', 'Local supplier booking', 'Destination data'] as $step): ?>
                            <div class="rounded-lg border border-brand/20 bg-white p-4 text-sm font-semibold text-brand-text"><?php echo esc_html($step); ?></div>
                        <?php endforeach; ?>
                    </div>
                </article>
            </div>
            </div>
        </div>
    </section>

    <section class="px-4 py-8 lg:px-8 lg:py-12">
        <div class="container mx-auto">
        <div class="mb-8 max-w-3xl">
            <p class="text-sm font-semibold uppercase text-brand-text">Smart Destination capabilities</p>
            <h2 class="mt-3 text-3xl font-semibold leading-tight md:text-4xl">What a TXA Smart Destination enables</h2>
        </div>
        <div class="grid gap-5 lg:grid-cols-2">
            <?php foreach ($capabilities as $index => $capability): ?>
                <article class="<?php echo !empty($capability['featured']) ? 'border-brand/20 bg-brand-tint lg:row-span-2' : 'border-line bg-white'; ?> rounded-lg border p-6 shadow-sm">
                    <span class="mb-4 flex size-11 items-center justify-center rounded-lg bg-near-black text-sm font-bold text-brand"><?php echo esc_html($index + 1); ?></span>
                    <h3 class="text-xl font-semibold"><?php echo esc_html($capability['title']); ?></h3>
                    <p class="mt-4 text-sm leading-6 text-mid-gray"><?php echo esc_html($capability['copy']); ?></p>
                    <div class="mt-5 rounded-lg border border-line bg-white p-4">
                        <p class="text-xs font-semibold uppercase text-brand-text">Visitor / industry outcome</p>
                        <p class="mt-2 text-sm leading-6 text-mid-gray"><?php echo esc_html($capability['outcome']); ?></p>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
        </div>
    </section>

    <section class="bg-surface px-4 py-8 lg:px-8 lg:py-12">
        <div class="container mx-auto">
            <div class="rounded-lg bg-white p-6 shadow-sm lg:p-8">
            <div class="mb-8 max-w-3xl">
                <p class="text-sm font-semibold uppercase text-brand-text">Use cases</p>
                <h2 class="mt-3 text-3xl font-semibold leading-tight md:text-4xl">Smart Destination use cases</h2>
                <p class="mt-5 text-lg leading-8 text-mid-gray">
                    TXA can support destination website activation, destination content, campaign pages, trade initiatives, local concierge networks and data reporting.
                </p>
            </div>
            <div class="grid gap-5 md:grid-cols-2 xl:grid-cols-3">
                <?php foreach ($use_cases as $case): ?>
                    <article class="flex h-full flex-col rounded-lg border border-line bg-surface p-6">
                        <div class="mb-4 size-10 rounded-lg bg-brand-tint"></div>
                        <h3 class="text-xl font-semibold"><?php echo esc_html($case['title']); ?></h3>
                        <p class="mt-3 grow text-sm leading-6 text-mid-gray"><?php echo esc_html($case['copy']); ?></p>
                        <a href="<?php echo esc_url($case['url']); ?>" class="mt-6 text-sm font-semibold text-brand-text !no-underline hover:text-near-black">Learn more &rarr;</a>
                    </article>
                <?php endforeach; ?>
            </div>
            </div>
        </div>
    </section>

    <section class="px-4 py-8 lg:px-8 lg:py-12">
        <div class="container mx-auto">
            <div class="relative overflow-hidden rounded-lg bg-near-black text-white shadow-xl">
                <img src="https://images.unsplash.com/photo-1500534314209-a25ddb2bd429?auto=format&fit=crop&w=1800&q=80" alt="" class="absolute inset-0 h-full w-full object-cover opacity-30">
            <div class="relative grid gap-8 p-6 lg:grid-cols-[.85fr_1.15fr] lg:items-center lg:p-10">
                <div>
                    <p class="inline-flex rounded-lg bg-brand px-4 py-2 text-sm font-semibold uppercase text-white">Flexible commercial model</p>
                    <h2 class="mt-3 text-3xl font-semibold leading-tight md:text-4xl">Your destination, your commercial model</h2>
                    <p class="mt-6 text-lg leading-8 text-white/70">
                        Whether your destination wants a commission-free supplier network, a revenue-generating distributor model, or something in between, TXA is designed to support it. You set the terms. TXA handles the technology.
                    </p>
                    <div class="mt-8">
                        <?php echo txa_page_button('Discuss destination packages', $pricing_url, 'secondary-dark'); ?>
                    </div>
                </div>
                <div class="grid gap-5 md:grid-cols-3">
                    <?php foreach ($commercial_models as $index => $model): ?>
                        <article class="rounded-lg border border-white/10 bg-white/10 p-6 backdrop-blur">
                            <span class="mb-4 flex size-10 items-center justify-center rounded-lg bg-brand-tint text-sm font-bold text-brand"><?php echo esc_html($index + 1); ?></span>
                            <h3 class="text-lg font-semibold"><?php echo esc_html($model); ?></h3>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
            </div>
        </div>
    </section>

    <section class="bg-surface px-4 py-8 lg:px-8 lg:py-12">
        <div class="container mx-auto">
        <div class="grid gap-8 lg:grid-cols-[.85fr_1.15fr] lg:items-center">
            <div>
                <p class="text-sm font-semibold uppercase text-brand-text">Destination intelligence</p>
                <h2 class="mt-3 text-3xl font-semibold leading-tight md:text-4xl">See who is visiting, what is working and where to invest next</h2>
                <p class="mt-5 text-lg leading-8 text-mid-gray">
                    Most destination marketing generates interest that is difficult to trace. Visitors click through to OTA listings or third-party pages, and the data disappears. TXA gives destinations something different: first-party booking and engagement data that belongs to you.
                </p>
                <p class="mt-5 text-base leading-7 text-mid-gray">
                    Real-time dashboards show supplier activity, campaign performance and visitor engagement. Attribution codes connect your marketing spend to actual booking outcomes. Data exports and API options mean your insights can flow into the CRM or BI tools your organisation already uses.
                </p>
                <div class="mt-8">
                    <?php echo txa_page_button('Explore Data & Insights', home_url('/destinations/data-insights/'), 'secondary'); ?>
                </div>
            </div>
            <div class="rounded-lg border border-line bg-white p-6 shadow-sm">
                <div class="mb-5 flex items-center justify-between border-b border-line pb-4">
                    <div>
                        <p class="text-xs font-semibold uppercase text-brand-text">Dashboard preview</p>
                        <p class="mt-1 text-sm text-mid-gray">Destination performance signals</p>
                    </div>
                    <span class="rounded-lg bg-brand-tint px-3 py-1 text-xs font-semibold text-brand-text">Live data</span>
                </div>
                <div class="grid gap-4 sm:grid-cols-2">
                    <?php foreach ($dashboard_cards as $card): ?>
                        <div class="rounded-lg border border-line bg-surface p-4">
                            <p class="text-sm font-semibold"><?php echo esc_html($card['title']); ?></p>
                            <div class="mt-4 h-2 rounded bg-surface">
                                <div class="<?php echo esc_attr($card['bar']); ?> h-2 rounded bg-brand"></div>
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
            <div class="mx-auto mb-10 max-w-3xl text-center">
                <p class="text-sm font-semibold uppercase text-brand-text">Implementation</p>
                <h2 class="mt-3 text-3xl font-semibold leading-tight md:text-4xl">How a TXA Smart Destination is implemented</h2>
            </div>
            <div class="grid gap-5 lg:grid-cols-3">
                <?php foreach ($implementation_steps as $index => $step): ?>
                    <article class="rounded-lg border border-line bg-white p-6 shadow-sm">
                        <span class="mb-4 flex size-11 items-center justify-center rounded-lg bg-near-black text-sm font-bold text-brand"><?php echo esc_html($index + 1); ?></span>
                        <h3 class="text-lg font-semibold"><?php echo esc_html($step['title']); ?></h3>
                        <p class="mt-3 text-sm leading-6 text-mid-gray"><?php echo esc_html($step['copy']); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="bg-surface px-4 py-8 lg:px-8 lg:py-12">
        <div class="container mx-auto">
        <div class="grid gap-8 rounded-lg bg-white p-6 shadow-sm lg:grid-cols-[.8fr_1.2fr] lg:p-8">
            <div>
                <p class="text-sm font-semibold uppercase text-brand-text">Proof and trust</p>
                <h2 class="mt-3 text-3xl font-semibold leading-tight md:text-4xl">Built on neutral tourism exchange infrastructure</h2>
                <p class="mt-5 text-lg leading-8 text-mid-gray">
                    TXA is designed to support the whole visitor economy, not just one booking system, channel or commercial model.
                </p>
            </div>
            <div class="grid gap-4 sm:grid-cols-2">
                <?php foreach ($trust_cards as $card): ?>
                    <div class="rounded-lg border border-line bg-surface p-6">
                        <div class="mb-4 h-10 rounded-lg bg-brand-tint"></div>
                        <p class="text-sm font-semibold text-mid-gray"><?php echo esc_html($card); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        </div>
    </section>

    <section class="px-4 py-8 lg:px-8 lg:py-12">
        <div class="container mx-auto">
            <div class="mb-8 max-w-2xl">
                <p class="text-sm font-semibold uppercase text-brand-text">Smart Destination FAQs</p>
                <h2 class="mt-3 text-3xl font-semibold leading-tight md:text-4xl">Smart Destination FAQs</h2>
            </div>
            <div class="space-y-4">
                <?php foreach ($faqs as $index => $faq): ?>
                    <details class="group rounded-lg border border-line bg-white p-6 shadow-sm" <?php echo 0 === $index ? 'open' : ''; ?>>
                        <summary class="flex cursor-pointer list-none items-center justify-between gap-4 text-lg font-semibold">
                            <?php echo esc_html($faq['question']); ?>
                            <span class="text-brand-text transition group-open:rotate-45">+</span>
                        </summary>
                        <p class="mt-4 text-sm leading-6 text-mid-gray"><?php echo esc_html($faq['answer']); ?></p>
                    </details>
                <?php endforeach; ?>
            </div>
            <div class="mt-8">
                <?php echo txa_page_button('View all destination FAQs', home_url('/faq/#destinations'), 'secondary'); ?>
            </div>
        </div>
    </section>

    <section class="px-4 pb-10 pt-8 lg:px-8 lg:pb-16 lg:pt-12">
        <div class="container mx-auto">
            <div class="relative overflow-hidden rounded-lg bg-near-black text-white shadow-2xl shadow-near-black/20">
                <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=1800&q=80" alt="" class="absolute inset-0 h-full w-full object-cover opacity-40">
                <div class="relative mx-auto max-w-4xl px-6 py-20 text-center lg:py-28">
                    <h2 class="text-3xl font-semibold leading-tight md:text-4xl">Ready to become a Smart Destination?</h2>
                    <p class="mx-auto mt-5 max-w-2xl text-lg leading-8 text-white/75">
                        Use TXA to connect local suppliers, destination content, owned channels, trade initiatives, virtual concierge networks and real-time data through one neutral platform.
                    </p>
                    <div class="mt-8 flex flex-col justify-center gap-3 sm:flex-row">
                        <?php echo txa_page_button('Request Smart Destination Demo', $demo_url); ?>
                        <?php echo txa_page_button('See destination packages', $pricing_url, 'secondary-dark'); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</article>

<?php get_footer(); ?>
