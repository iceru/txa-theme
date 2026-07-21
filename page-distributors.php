<?php
/**
 * Template Name: Distributors Page
 *
 * @package TailPress
 */

add_filter('pre_get_document_title', function (): string {
    return 'TXA for Distributors | Access Bookable Australian Tourism Inventory';
});

add_action('wp_head', function (): void {
    if (is_page_template('page-distributors.php')) {
        echo '<meta name="description" content="' . esc_attr('TXA helps distributors access Australian tourism supplier inventory through flexible connection and commercial models.') . '">' . "\n";
    }
});

get_header();

$apply_url = home_url('/distributors/apply/');
$directory_url = home_url('/distributors/directory/');

$value_cards = [
    [
        'title' => 'Access bookable supplier inventory',
        'copy' => 'Access Australian tourism suppliers through a commercially neutral national exchange.',
    ],
    [
        'title' => 'Support multiple commercial models',
        'copy' => 'TXA can support direct payment, on-account, agent, and on-request pathways where applicable.',
    ],
    [
        'title' => 'Connect with destination campaigns',
        'copy' => 'Participate in destination-led campaigns, trade portal initiatives and local supplier programs where agreed.',
    ],
    [
        'title' => 'Reduce supplier acquisition friction',
        'copy' => 'Use a clearer supplier opt-in process and TXA-supported connection pathway.',
    ],
];

$process_steps = [
    [
        'title' => 'Distributor enquiry',
        'copy' => 'Distributor submits an enquiry and confirms the intended commercial model.',
    ],
    [
        'title' => 'Commercial model review',
        'copy' => 'TXA reviews the channel type, booking model, supplier participation and commercial requirements.',
    ],
    [
        'title' => 'Technical connection pathway',
        'copy' => 'Connection may use API, white-label booking pages, campaign pages or another agreed pathway.',
    ],
    [
        'title' => 'Supplier opt-in',
        'copy' => 'Relevant suppliers can participate through a clear opt-in and contracting process.',
    ],
    [
        'title' => 'Launch and optimise',
        'copy' => 'Distributor pathway launches with agreed reporting, support and optimisation.',
    ],
];

$distribution_models = [
    [
        'title' => 'API connection',
        'copy' => 'For distributors that need structured access to inventory, availability, booking and product data through an agreed technical integration.',
    ],
    [
        'title' => 'White-label booking pages',
        'copy' => 'For partners that need a faster way to present bookable product through TXA-hosted or TXA-supported booking pages.',
    ],
    [
        'title' => 'On-account or agent model',
        'copy' => 'For distributor models where commercial arrangements, payment handling and supplier terms are agreed between parties.',
    ],
    [
        'title' => 'Campaign or destination-led model',
        'copy' => 'For distributors participating in destination campaigns, trade initiatives, local concierge networks or targeted supplier programs.',
    ],
];

$inventory_categories = [
    'Accommodation',
    'Tours',
    'Attractions',
    'Activities',
    'Events',
    'Holiday rentals',
    'Food and wine experiences',
    'Wellness experiences',
    'Nature and adventure',
    'Ticketed experiences',
    'Destination experiences',
    'Trade-ready product',
];

$campaign_cards = [
    [
        'title' => 'Campaign activation pages',
        'copy' => 'Support seasonal, event, industry group or special-interest tourism initiatives.',
        'url' => home_url('/destinations/microsites-campaigns/'),
    ],
    [
        'title' => 'Trade portal',
        'copy' => 'Access destination-specific trade landing pages with supplier discovery and bookable product.',
        'url' => home_url('/destinations/trade-portal/'),
    ],
    [
        'title' => 'Virtual concierge',
        'copy' => 'Participate in local reseller or concierge pathways with accommodation providers, visitor centres and other local partners.',
        'url' => home_url('/destinations/virtual-concierge/'),
    ],
];

$directory_placeholders = [
    [
        'name' => 'Distributor partner',
        'type' => 'Distributor partner',
        'copy' => 'Placeholder description for an approved distributor partner.',
    ],
    [
        'name' => 'Trade channel',
        'type' => 'Trade channel',
        'copy' => 'Placeholder description for an approved trade distribution channel.',
    ],
    [
        'name' => 'Online channel',
        'type' => 'Online channel',
        'copy' => 'Placeholder description for an approved online channel.',
    ],
    [
        'name' => 'Campaign partner',
        'type' => 'Campaign partner',
        'copy' => 'Placeholder description for an approved campaign partner.',
    ],
];

$faqs = [
    [
        'question' => 'Who can become a TXA distributor?',
        'answer' => 'Distributors may include online channels, agents, reseller networks, trade partners and commercial partners that want access to bookable Australian tourism inventory.',
    ],
    [
        'question' => 'Is it free to connect as a distributor?',
        'answer' => 'TXA distributor connection may be free to connect, with commercial arrangements depending on the distributor model, integration type and agreement.',
    ],
    [
        'question' => 'Can distributors access live availability?',
        'answer' => 'Where supported by supplier systems and the agreed connection model, distributors can access live product, pricing, availability and booking pathways.',
    ],
    [
        'question' => 'Can distributors participate in destination campaigns?',
        'answer' => 'Yes. TXA can support distributor participation in destination-led campaigns, trade portals and Smart Destination initiatives where agreed.',
    ],
    [
        'question' => 'Does TXA support API integration?',
        'answer' => 'TXA can support API or other technical connection pathways depending on the distributor requirements and agreed integration scope.',
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
            <img src="https://images.unsplash.com/photo-1469474968028-56623f02e42e?auto=format&fit=crop&w=2200&q=80" alt="" class="absolute inset-0 h-full w-full object-cover">
            <div class="absolute inset-0 bg-near-black/55" aria-hidden="true"></div>

            <div class="relative z-10 flex min-h-[80vh] p-8">
                <div class="container mx-auto flex items-center">
                    <div class="max-w-4xl pb-56 lg:pb-0">
                        <p class="mb-2 inline-flex rounded-lg bg-brand px-4 py-2 text-sm font-semibold uppercase text-white">
                            For distributors
                        </p>
                        <h1 class="mb-6 max-w-3xl text-4xl font-semibold leading-tight text-white md:text-6xl lg:text-5xl">
                            TXA for distributors: unique access to bookable Australian tourism inventory
                        </h1>
                        <div class="max-w-2xl">
                            <p class="text-base leading-7 text-white/85 md:text-lg">
                                TXA gives distributors a pathway to Australian tourism suppliers across accommodation, tours, attractions, events and experiences.
                            </p>
                            <p class="mt-4 text-sm leading-6 text-white/70 md:text-base">
                                TXA supports flexible commercial models, API or white-label booking page options, and the ability to participate in destination-led campaigns and trade initiatives where agreed.
                            </p>
                            <div class="mt-6 flex flex-col gap-3 sm:flex-row">
                                <?php echo txa_page_button('Become a Distributor', $apply_url); ?>
                                <?php echo txa_page_button('Explore TXA inventory pathways', $directory_url, 'secondary-dark'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="absolute bottom-0 right-0 z-20 w-full max-w-md p-6 md:p-8">
                <div class="rounded-lg bg-white p-5 text-near-black shadow-2xl shadow-near-black/25">
                    <p class="text-xs font-semibold uppercase text-brand-text">Channel network</p>
                    <h2 class="mt-2 text-2xl font-semibold leading-tight">TXA Exchange to travellers</h2>
                    <div class="mt-5 grid gap-2">
                        <?php foreach (['TXA Exchange', 'Distributors', 'Agents / Online Channels / Trade / Campaign Partners', 'Travellers'] as $index => $node): ?>
                            <div class="<?php echo 0 === $index ? 'bg-brand-tint text-brand-text' : 'bg-surface text-mid-gray'; ?> rounded-lg px-3 py-2 text-xs font-semibold">
                                <?php echo esc_html($node); ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-surface px-4 py-8 lg:px-8 lg:py-12">
        <div class="container mx-auto">
            <div class="mb-8 flex flex-col justify-between gap-5 md:flex-row md:items-end">
                <div class="max-w-3xl">
                    <p class="text-sm font-semibold uppercase text-brand-text">Distributor value</p>
                    <h2 class="mt-3 text-3xl font-semibold leading-tight md:text-4xl">Why distributors connect with TXA</h2>
                </div>
                <p class="max-w-md text-sm leading-6 text-mid-gray">Connect to inventory, agreed commercial models and destination-led opportunities through one exchange pathway.</p>
            </div>
            <div class="grid gap-5 md:grid-cols-2 xl:grid-cols-4">
                <?php foreach ($value_cards as $index => $card): ?>
                    <article class="rounded-lg border border-line bg-white p-6 shadow-sm">
                        <span class="mb-4 flex size-10 items-center justify-center rounded-lg bg-brand-tint text-sm font-bold text-brand-text"><?php echo esc_html($index + 1); ?></span>
                        <h3 class="text-lg font-semibold"><?php echo esc_html($card['title']); ?></h3>
                        <p class="mt-3 text-sm leading-6 text-mid-gray"><?php echo esc_html($card['copy']); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="px-4 py-8 lg:px-8 lg:py-12">
        <div class="container mx-auto">
            <div class="rounded-lg bg-white p-6 shadow-sm lg:p-8">
                <div class="mx-auto mb-10 max-w-3xl text-center">
                    <p class="text-sm font-semibold uppercase text-brand-text">Connection flow</p>
                    <h2 class="mt-3 text-3xl font-semibold leading-tight md:text-4xl">How distributor connection works</h2>
                    <p class="mt-5 text-lg leading-8 text-mid-gray">
                        TXA provides a connection pathway between distributors and Australian tourism suppliers, with commercial and technical arrangements agreed based on the distribution model.
                    </p>
                </div>
                <div class="grid gap-5 lg:grid-cols-5">
                    <?php foreach ($process_steps as $index => $step): ?>
                        <article class="rounded-lg border border-line bg-surface p-5">
                            <span class="mb-4 flex size-10 items-center justify-center rounded-lg bg-near-black text-sm font-bold text-brand"><?php echo esc_html($index + 1); ?></span>
                            <h3 class="text-base font-semibold"><?php echo esc_html($step['title']); ?></h3>
                            <p class="mt-3 text-sm leading-6 text-mid-gray"><?php echo esc_html($step['copy']); ?></p>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-surface px-4 py-8 lg:px-8 lg:py-12">
        <div class="container mx-auto">
            <div class="mb-8 max-w-3xl">
                <p class="text-sm font-semibold uppercase text-brand-text">Distribution models</p>
                <h2 class="mt-3 text-3xl font-semibold leading-tight md:text-4xl">Flexible distribution models</h2>
                <p class="mt-5 text-lg leading-8 text-mid-gray">
                    TXA is designed to support different distributor types and commercial models, depending on the channel, supplier agreement and destination use case.
                </p>
            </div>
            <div class="grid gap-5 md:grid-cols-2 xl:grid-cols-4">
                <?php foreach ($distribution_models as $index => $model): ?>
                    <article class="rounded-lg border border-line bg-white p-6 shadow-sm">
                        <div class="mb-4 flex size-10 items-center justify-center rounded-lg bg-brand-tint text-sm font-bold text-brand-text"><?php echo esc_html($index + 1); ?></div>
                        <h3 class="text-lg font-semibold"><?php echo esc_html($model['title']); ?></h3>
                        <p class="mt-3 text-sm leading-6 text-mid-gray"><?php echo esc_html($model['copy']); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="px-4 py-8 lg:px-8 lg:py-12">
        <div class="container mx-auto">
            <div class="rounded-lg bg-white p-6 shadow-sm lg:p-8">
                <div class="mb-8 max-w-3xl">
                    <p class="text-sm font-semibold uppercase text-brand-text">Inventory categories</p>
                    <h2 class="mt-3 text-3xl font-semibold leading-tight md:text-4xl">Inventory categories available through TXA</h2>
                    <p class="mt-5 text-lg leading-8 text-mid-gray">TXA connects distributors to Australian tourism suppliers across multiple categories.</p>
                </div>
                <div class="flex flex-wrap gap-3">
                    <?php foreach ($inventory_categories as $category): ?>
                        <span class="rounded-lg border border-line bg-surface px-4 py-2 text-sm font-semibold text-mid-gray"><?php echo esc_html($category); ?></span>
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
                        <p class="inline-flex rounded-lg bg-brand px-4 py-2 text-sm font-semibold uppercase text-white">Destination-led distribution</p>
                        <h2 class="mt-3 text-3xl font-semibold leading-tight md:text-4xl">Connect into destination campaigns and trade initiatives</h2>
                        <p class="mt-5 text-lg leading-8 text-white/70">
                            TXA can support distributor participation in destination-led campaigns, trade portals, virtual concierge initiatives and other Smart Destination use cases where agreed.
                        </p>
                        <div class="mt-7">
                            <?php echo txa_page_button('Explore Smart Destination use cases', home_url('/destinations/'), 'secondary-dark'); ?>
                        </div>
                    </div>
                    <div class="grid gap-5 md:grid-cols-3">
                        <?php foreach ($campaign_cards as $card): ?>
                            <article class="rounded-lg border border-white/10 bg-white/10 p-6 backdrop-blur">
                                <h3 class="text-lg font-semibold"><?php echo esc_html($card['title']); ?></h3>
                                <p class="mt-3 text-sm leading-6 text-white/70"><?php echo esc_html($card['copy']); ?></p>
                                <a href="<?php echo esc_url($card['url']); ?>" class="mt-5 inline-block text-sm font-semibold text-brand !no-underline hover:text-white">Learn more &rarr;</a>
                            </article>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-surface px-4 py-8 lg:px-8 lg:py-12">
        <div class="container mx-auto">
            <div class="grid gap-8 rounded-lg bg-white p-6 shadow-sm lg:grid-cols-[.75fr_1.25fr] lg:items-center lg:p-8">
                <div>
                    <p class="text-sm font-semibold uppercase text-brand-text">Distributor commercial model</p>
                    <h2 class="mt-3 text-3xl font-semibold leading-tight md:text-4xl">Free to connect. Commercial arrangements depend on the distributor model.</h2>
                </div>
                <div>
                    <p class="text-lg leading-8 text-mid-gray">
                        TXA distributor connection arrangements depend on the distributor integration model, commercial structure, supplier participation and agreed channel requirements.
                    </p>
                    <div class="mt-6 rounded-lg bg-brand-tint p-5">
                        <p class="text-sm font-semibold text-brand-text">Final terms are confirmed through the distributor enquiry and agreement process.</p>
                    </div>
                    <div class="mt-7">
                        <?php echo txa_page_button('Discuss distributor connection', $apply_url); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="px-4 py-8 lg:px-8 lg:py-12">
        <div class="container mx-auto">
            <div class="mb-8 max-w-3xl">
                <p class="text-sm font-semibold uppercase text-brand-text">Directory preview</p>
                <h2 class="mt-3 text-3xl font-semibold leading-tight md:text-4xl">TXA distributor directory</h2>
                <p class="mt-5 text-lg leading-8 text-mid-gray">
                    The distributor directory can be used as a source-of-truth list for active TXA distributors and partner channels.
                </p>
            </div>
            <div class="grid gap-5 md:grid-cols-2 xl:grid-cols-4">
                <?php foreach ($directory_placeholders as $card): ?>
                    <article class="rounded-lg border border-line bg-white p-6 shadow-sm">
                        <div class="mb-4 h-12 rounded-lg bg-brand-tint"></div>
                        <p class="text-xs font-semibold uppercase text-brand-text"><?php echo esc_html($card['type']); ?></p>
                        <h3 class="mt-2 text-lg font-semibold"><?php echo esc_html($card['name']); ?></h3>
                        <p class="mt-3 text-sm leading-6 text-mid-gray"><?php echo esc_html($card['copy']); ?></p>
                        <a href="<?php echo esc_url($directory_url); ?>" class="mt-5 inline-block text-sm font-semibold text-brand-text !no-underline hover:text-near-black">View placeholder &rarr;</a>
                    </article>
                <?php endforeach; ?>
            </div>
            <div class="mt-8">
                <?php echo txa_page_button('View distributor directory', $directory_url, 'secondary'); ?>
            </div>
        </div>
    </section>

    <section class="bg-surface px-4 py-8 lg:px-8 lg:py-12">
        <div class="container mx-auto">
            <div class="mb-8 max-w-2xl">
                <p class="text-sm font-semibold uppercase text-brand-text">Distributor FAQs</p>
                <h2 class="mt-3 text-3xl font-semibold leading-tight md:text-4xl">Distributor FAQs</h2>
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
                <?php echo txa_page_button('Contact TXA about distribution', home_url('/contact/'), 'secondary'); ?>
            </div>
        </div>
    </section>

    <section class="px-4 pb-10 pt-8 lg:px-8 lg:pb-16 lg:pt-12">
        <div class="container mx-auto">
            <div class="relative overflow-hidden rounded-lg bg-near-black text-white shadow-2xl shadow-near-black/20">
                <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=1800&q=80" alt="" class="absolute inset-0 h-full w-full object-cover opacity-40">
                <div class="relative mx-auto max-w-4xl px-6 py-20 text-center lg:py-28">
                    <h2 class="text-3xl font-semibold leading-tight md:text-4xl">Ready to access bookable Australian tourism inventory?</h2>
                    <p class="mx-auto mt-5 max-w-2xl text-lg leading-8 text-white/75">
                        Connect with TXA to discuss distributor pathways, commercial models, supplier participation and technical connection options.
                    </p>
                    <div class="mt-8 flex flex-col justify-center gap-3 sm:flex-row">
                        <?php echo txa_page_button('Become a Distributor', $apply_url); ?>
                        <?php echo txa_page_button('Contact TXA', home_url('/contact/'), 'secondary-dark'); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</article>

<?php get_footer(); ?>
