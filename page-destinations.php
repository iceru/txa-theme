<?php

/**
 * Template Name: Destinations Page
 *
 * @package TailPress
 */

add_filter('pre_get_document_title', fn(): string => 'TXA for Destinations | Become a Smart Destination');

add_action('wp_head', function (): void {
    if (is_page_template('page-destinations.php')) {
        echo '<meta name="description" content="' . esc_attr('TXA helps destination organisations move from inspiration-only marketing to connected, bookable visitor outcomes through Smart Destination infrastructure.') . '">' . "\n";
    }
});

get_header();

$demo_url = home_url('/destinations/request-demo/');
$pricing_url = home_url('/destinations/pricing/');

$pillars = [
    ['title' => 'Supply', 'copy' => 'Real-time inventory'],
    ['title' => 'Content', 'copy' => 'Rich product data'],
    ['title' => 'Channels', 'copy' => 'Global, local, niche and alternative distribution'],
    ['title' => 'Local Re-seller Network', 'copy' => 'Active collaboration amongst your local industry'],
    ['title' => 'Data', 'copy' => 'Behavioral insights'],
];

$problems = [
    ['title' => 'Fragmented Inventory', 'copy' => 'Suppliers use 100+ different booking systems, making a central portal impossible.'],
    ['title' => 'Lost Conversion', 'copy' => 'Users leave the destination site to book, resulting in massive drop-offs, booking funds going offshore and lost data.'],
    ['title' => 'Blind Marketing', 'copy' => 'DMOs know who looks at pages, but not who actually visits the region.'],
    ['title' => 'Manual Workflows', 'copy' => 'Updating content and product status across platforms is labor-intensive.'],
];

$solutions = [
    ['icon' => 'bi-diagram-3', 'title' => 'Neutral Connectivity', 'copy' => 'One connection to TXA unlocks bookable local inventory regardless of software.'],
    ['icon' => 'bi-signpost-split', 'title' => 'Integrated Booking Path', 'copy' => 'Keep visitors on your domain from inspiration to confirmation.'],
    ['icon' => 'bi-database-check', 'title' => 'Total Data Visibility', 'copy' => 'Own the transaction data and attribution for every campaign dollar spent.'],
];

$capabilities = [
    ['title' => 'Activate digital assets', 'copy' => 'Use B2B and B2C destination websites, apps, APIs, widgets and custom booking pages to connect brand, content and conversion.'],
    ['title' => 'Insights to drive growth', 'copy' => 'Support multiple supplier pathways, including connected systems, free or low-cost booking options, on-request, content-only and smart referral models.'],
    ['title' => 'Own your data', 'copy' => 'Data and insights to drive growth that belongs to your destination, not a third-party platform.', 'featured' => true],
    ['title' => 'Connect supply to the world', 'copy' => 'Aggregate supplier and destination content and make it available to distributors, trade channels, DMO-owned assets and connected APIs.'],
    ['title' => 'Commercial neutrality', 'copy' => 'Use a platform model that supports multiple booking systems and commercial models.'],
];

$implementation = [
    ['title' => 'Define Assets Activation', 'copy' => 'Define the destination assets activation: website, campaign, trade, virtual concierge, data or a combination.'],
    ['title' => 'Identify Priorities', 'copy' => 'Identify priority suppliers, POIs, recommended experiences, itineraries and local partners.'],
    ['title' => 'Onboard Suppliers', 'copy' => 'Onboard suppliers through the most appropriate pathway for each business.'],
    ['title' => 'Create Digital Assets', 'copy' => 'Create branded booking pages, destination landing pages, widgets, QR links and campaign assets.'],
    ['title' => 'Launch Network', 'copy' => 'Launch DMO website activation, microsite, trade portal or local reseller network.'],
    ['title' => 'Track & Optimize', 'copy' => 'Track engagement, conversion, attribution and data exports through dashboards and the agreed reporting model.'],
];

$faqs = [
    ['question' => 'Does this replace our existing CMS?', 'answer' => 'No. TXA can work alongside your existing destination website or CMS by powering bookable pathways, widgets, APIs and destination-specific booking pages.'],
    ['question' => 'How much does it cost operators?', 'answer' => 'Commercial models can vary by destination. TXA is designed to support flexible destination packages and supplier pathways.'],
    ['question' => 'Is TXA an OTA (Online Travel Agent)?', 'answer' => 'No. TXA is a neutral B2B exchange connecting suppliers, destinations, distributors and booking systems.'],
];

if (!function_exists('txa_destination_button')) {
    function txa_destination_button(string $label, string $url, string $variant = 'primary'): string
    {
        $classes = 'inline-flex min-h-12 w-full items-center justify-center rounded-lg px-5 py-3 text-sm font-bold !no-underline transition sm:w-auto sm:px-6';
        $classes .= 'light' === $variant
            ? ' border border-white bg-white/10 text-white hover:bg-white/20'
            : ('white' === $variant
                ? ' bg-white text-brand hover:bg-white/90'
                : ' bg-brand text-white hover:bg-brand-dark');

        return sprintf('<a class="%s" href="%s">%s</a>', esc_attr($classes), esc_url($url), esc_html($label));
    }
}
?>

<article class="bg-white text-near-black [font-family:'Source_Sans_Pro',sans-serif]">
    <section class="px-4 pb-6 pt-3 sm:pt-5 lg:px-16 lg:pb-16 lg:pt-8">
        <div class="relative mx-auto min-h-[590px] max-w-[1312px] overflow-hidden rounded-xl bg-near-black sm:min-h-[560px] sm:rounded-2xl lg:min-h-[600px]">
            <img src="<?php echo esc_url(get_theme_file_uri('/images/destinations-1.jpg')); ?>"
                alt="Australian marina and coastline" class="absolute inset-0 h-full w-full object-cover">
            <div class="absolute inset-0 bg-near-black/55 sm:bg-near-black/45" aria-hidden="true"></div>
            <div class="relative z-10 flex min-h-[590px] items-center px-5 py-10 sm:min-h-[560px] sm:px-8 sm:py-16 lg:min-h-[600px] lg:px-8 lg:py-24">
                <div class="w-full max-w-[760px]">
                    <p class="inline-flex max-w-full rounded-lg bg-brand px-5 py-3 font-bold uppercase leading-5 text-white">TXA for destinations</p>
                    <h1 class="mt-4 max-w-[760px] text-[34px] font-semibold leading-[1.08] text-white min-[390px]:text-4xl sm:text-5xl lg:leading-[56px]">Boost, sustain and protect your local visitor economy.</h1>
                    <p class="mt-4 max-w-[660px] text-base font-medium leading-6 text-white sm:text-lg sm:leading-[30px]">TXA helps destination organisations move from inspiration only marketing to connected, bookable visitor outcomes. TXA is commercially neutral and booking system agnostic, so destinations can support their whole industry without forcing suppliers into one commercial model or technology stack.</p>
                    <div class="mt-6 flex flex-col gap-3 sm:flex-row sm:gap-4">
                        <?php echo txa_destination_button('Request Smart Destination Demo', $demo_url); ?>
                        <?php echo txa_destination_button('See destination packages', $pricing_url, 'light'); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="px-4 py-10 sm:py-12 lg:px-16 lg:py-12">
        <div class="mx-auto max-w-[1312px] text-left sm:text-center">
            <h2 class="[font-family:'Hanken_Grotesk',sans-serif] text-[28px] font-bold leading-9 tracking-[-0.01em] text-[#151c27] sm:text-3xl">What is a TXA Smart Destination?</h2>
            <p class="mx-auto mt-3 max-w-[890px] text-[15px] leading-6 text-mid-gray sm:mt-2 sm:text-base">A Smart destination generates inspiration and TXA helps you own the conversion. Your organisation can use TXA to activate destination websites and apps, digitise local supply, connect suppliers to distributors, build tactical microsites, support trade initiatives, enable economy-wide re-seller networks and create virtual concierge collaborative commerce.</p>
            <div class="mt-7 grid gap-4 sm:mt-8 sm:grid-cols-2 sm:gap-6 lg:grid-cols-5">
                <?php foreach ($pillars as $index => $pillar): ?>
                    <article class="flex items-center gap-4 rounded-2xl bg-white p-4 text-left shadow-sm sm:block sm:rounded-3xl sm:text-center">
                        <span class="flex size-12 shrink-0 items-center justify-center rounded-xl bg-[#ffdad4] text-base font-bold text-brand sm:mx-auto sm:size-16 sm:text-lg"><?php echo esc_html($index + 1); ?></span>
                        <div>
                            <h3 class="[font-family:'Hanken_Grotesk',sans-serif] text-lg font-semibold leading-6 text-[#151c27] sm:mt-3 sm:text-xl sm:leading-7"><?php echo esc_html($pillar['title']); ?></h3>
                            <p class="mt-1 text-sm leading-5 text-mid-gray"><?php echo esc_html($pillar['copy']); ?></p>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="bg-surface px-4 py-10 sm:py-12 lg:px-16 lg:py-16">
        <div class="mx-auto grid max-w-[1312px] gap-6 sm:gap-8 lg:grid-cols-[1fr_511px] lg:items-center">
            <div>
                <h2 class="[font-family:'Hanken_Grotesk',sans-serif] text-[28px] font-bold leading-9 tracking-[-0.01em] text-[#151c27] sm:text-3xl">The problem TXA solves for destinations</h2>
                <p class="mt-3 text-[15px] leading-6 text-mid-gray sm:text-base">Marketing a destination to inspire is easy. Converting that interest into actual regional bookings is where most DMOs struggle.</p>
                <div class="mt-7 grid gap-3 sm:mt-8 sm:gap-4 md:grid-cols-2">
                    <?php foreach ($problems as $problem): ?>
                        <article class="rounded-xl  bg-white px-5 py-5 shadow-sm sm:px-7 sm:py-6">
                            <h3 class="text-base font-semibold text-[#151c27]"><?php echo esc_html($problem['title']); ?></h3>
                            <p class="mt-2 text-sm leading-5 text-mid-gray"><?php echo esc_html($problem['copy']); ?></p>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
            <aside class="overflow-hidden rounded-2xl bg-brand p-5 text-white shadow-xl sm:rounded-3xl sm:p-8 sm:shadow-2xl">
                <h3 class="[font-family:'Hanken_Grotesk',sans-serif] text-2xl font-bold">The TXA Solution</h3>
                <div class="mt-5 space-y-5 sm:mt-6 sm:space-y-6">
                    <?php foreach ($solutions as $item): ?>
                        <div class="flex gap-3 sm:gap-4">
                            <span class="mt-1 flex size-7 shrink-0 items-center justify-center rounded-full border border-white/80 text-sm text-white">
                                <i class="bi <?php echo esc_attr($item['icon']); ?>" aria-hidden="true"></i>
                            </span>
                            <div>
                                <h4 class="text-base font-semibold"><?php echo esc_html($item['title']); ?></h4>
                                <p class="mt-1 text-sm leading-5 text-white/80"><?php echo esc_html($item['copy']); ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </aside>
        </div>
    </section>

    <section class="px-4 py-10 sm:py-12 lg:px-16 lg:py-10">
        <div class="mx-auto max-w-[1312px]">
            <h2 class="max-w-[486px] [font-family:'Hanken_Grotesk',sans-serif] text-[28px] font-bold leading-9 tracking-[-0.01em] text-[#181c21] sm:text-3xl sm:leading-10">Your destination, your digital assets, your commercial model</h2>
            <div class="mt-7 grid gap-4 sm:mt-8 sm:gap-6 md:grid-cols-2 xl:grid-cols-3">
                <?php foreach ($capabilities as $index => $card): ?>
                    <article class="<?php echo !empty($card['featured']) ? 'border-2 border-[#b3422f]' : 'border border-[#dfc0ba]/20 shadow-sm'; ?> rounded-2xl bg-white p-5 sm:min-h-[190px]">
                        <span class="flex size-10 items-center justify-center rounded-lg bg-brand-tint text-sm font-bold text-brand"><?php echo esc_html($index + 1); ?></span>
                        <h3 class="mt-4 [font-family:'Hanken_Grotesk',sans-serif] text-lg font-semibold leading-6 text-[#151c27] sm:text-xl sm:leading-7"><?php echo esc_html($card['title']); ?></h3>
                        <p class="mt-2 text-sm leading-5 text-mid-gray sm:mt-3"><?php echo esc_html($card['copy']); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="bg-surface px-4 py-10 sm:py-12 lg:px-16 lg:py-16">
        <div class="mx-auto grid max-w-[1312px] gap-8 sm:gap-12 lg:grid-cols-[1fr_700px] lg:items-center">
            <div>
                <h2 class="[font-family:'Hanken_Grotesk',sans-serif] text-[28px] font-bold leading-9 tracking-[-0.01em] text-[#151c27] sm:text-3xl sm:leading-10">See who is visiting, what is working and where to invest next</h2>
                <div class="mt-5 space-y-4 text-base leading-6 text-mid-gray sm:mt-6 sm:text-lg sm:leading-7">
                    <p>Most destination marketing generates interest that's impossible to trace. Visitors click through to OTA listings or third-party pages, and the data disappears. TXA gives destinations something different: first-party booking and engagement data that belongs to you.</p>
                    <p>For the first time, your destination can see, in one place, which campaigns converted, which suppliers are performing, and where visitor spend is flowing through your local economy.</p>
                </div>
                <ul class="mt-5 space-y-3 text-sm font-semibold leading-5 text-[#151c27] sm:mt-6 sm:space-y-4">
                    <li class="flex gap-3"><i class="bi bi-speedometer2 shrink-0 text-brand" aria-hidden="true"></i><span>Real-time Dashboards: Track supplier activity, campaign performance and visitor engagement in one place.</span></li>
                    <li class="flex gap-3"><i class="bi bi-graph-up-arrow shrink-0 text-brand" aria-hidden="true"></i><span>Attribution & ROI: Connect marketing spend to actual booking outcomes with attribution codes.</span></li>
                    <li class="flex gap-3"><i class="bi bi-database-up shrink-0 text-brand" aria-hidden="true"></i><span>Data Ownership & Integration: Export insights or use APIs to flow data into your CRM or BI tools.</span></li>
                </ul>
            </div>
            <div class="overflow-hidden">
                <img src="<?php echo esc_url(get_theme_file_uri('/images/dashboard-2.png')); ?>"
                    alt="TXA dashboard" />
            </div>
        </div>
    </section>

    <section class="relative overflow-hidden px-4 py-10 text-white sm:py-14 lg:px-16 lg:py-16">
        <img src="https://images.unsplash.com/photo-1469474968028-56623f02e42e?auto=format&fit=crop&w=2200&q=85" alt="" class="absolute inset-0 h-full w-full object-cover">
        <div class="absolute inset-0 bg-black/65 sm:bg-black/60" aria-hidden="true"></div>
        <div class="relative z-10 mx-auto grid max-w-[1312px] gap-8 sm:gap-10 lg:grid-cols-[379px_1fr] lg:gap-12">
            <div>
                <h2 class="text-[28px] font-semibold leading-9 sm:text-3xl sm:leading-tight lg:text-4xl lg:leading-[44px]">How a TXA Smart Destination is easily implemented</h2>
                <div class="mt-5 flex flex-col gap-3 sm:mt-6 sm:items-start">
                    <?php echo txa_destination_button('Ask about our destination packages', $pricing_url); ?>
                    <?php echo txa_destination_button('Request website activation demo', $demo_url, 'white'); ?>
                </div>
            </div>
            <div class="grid gap-3 sm:gap-4 md:grid-cols-2 xl:grid-cols-3">
                <?php foreach ($implementation as $index => $step): ?>
                    <article class="rounded-xl border border-white/20 bg-white/10 p-5 backdrop-blur-md sm:min-h-[228px] sm:p-6">
                        <span class="flex size-10 items-center justify-center rounded-lg bg-brand text-sm font-bold text-white sm:size-11 sm:text-base"><?php echo esc_html($index + 1); ?></span>
                        <h3 class="mt-4 [font-family:'Hanken_Grotesk',sans-serif] text-lg font-semibold leading-6 sm:text-xl sm:leading-7"><?php echo esc_html($step['title']); ?></h3>
                        <p class="mt-2 text-sm leading-[21px] text-white"><?php echo esc_html($step['copy']); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="px-4 py-10 sm:py-14 lg:px-16 lg:py-16">
        <div class="mx-auto max-w-[964px]">
            <h2 class="text-left text-[28px] font-semibold leading-9 sm:text-center sm:text-3xl sm:leading-tight lg:text-4xl lg:leading-[44px]">Frequently Asked Questions</h2>
            <div class="mt-7 space-y-3 sm:mt-8 sm:space-y-4 lg:px-8">
                <?php foreach ($faqs as $faq): ?>
                    <details class="group rounded-lg border border-line bg-white p-5 shadow-[0_12px_28px_-8px_rgba(26,26,26,0.12)] sm:p-6">
                        <summary class="cursor-pointer list-none text-base font-semibold leading-6 text-[#151c27] [&::-webkit-details-marker]:hidden sm:text-lg"><span class="flex items-center justify-between gap-4 sm:gap-6"><?php echo esc_html($faq['question']); ?><span class="shrink-0 text-xl text-brand transition group-open:rotate-45">+</span></span></summary>
                        <p class="mt-3 text-sm leading-6 text-mid-gray"><?php echo esc_html($faq['answer']); ?></p>
                    </details>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</article>

<?php get_footer();
