<?php
/**
 * Template Name: Destinations Page
 *
 * @package TailPress
 */

add_filter('pre_get_document_title', fn (): string => 'TXA for Destinations | Become a Smart Destination');

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
    ['title' => 'Neutral Connectivity', 'copy' => 'One connection to TXA unlocks bookable local inventory regardless of software.'],
    ['title' => 'Integrated Booking Path', 'copy' => 'Keep visitors on your domain from inspiration to confirmation.'],
    ['title' => 'Total Data Visibility', 'copy' => 'Own the transaction data and attribution for every campaign dollar spent.'],
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
        $classes = 'inline-flex w-full items-center justify-center rounded-lg px-6 py-3 text-sm font-bold !no-underline transition sm:w-auto';
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
    <section class="px-4 pb-8 pt-8 lg:px-5 lg:pb-14">
        <div class="relative mx-auto min-h-[520px] max-w-[1400px] overflow-hidden rounded-2xl bg-near-black lg:min-h-[600px]">
            <img src="https://images.unsplash.com/photo-1500375592092-40eb2168fd21?auto=format&fit=crop&w=2200&q=85" alt="Australian marina and coastline" class="absolute inset-0 h-full w-full object-cover">
            <div class="absolute inset-0 bg-near-black/45" aria-hidden="true"></div>
            <div class="relative z-10 flex min-h-[520px] items-center px-6 py-16 sm:px-8 lg:min-h-[600px] lg:px-8 lg:py-24">
                <div class="max-w-[760px]">
                    <p class="inline-flex rounded-lg bg-brand px-6 py-3 text-sm font-bold uppercase text-white sm:text-xl">TXA for destinations</p>
                    <h1 class="mt-4 max-w-[660px] text-4xl font-semibold leading-tight text-white sm:text-5xl lg:text-5xl lg:leading-[56px]">Boost, sustain and protect your local visitor economy.</h1>
                    <p class="mt-4 max-w-[660px] text-lg font-semibold leading-[30px] text-white">TXA helps destination organisations move from inspiration only marketing to connected, bookable visitor outcomes. TXA is commercially neutral and booking system agnostic, so destinations can support their whole industry without forcing suppliers into one commercial model or technology stack.</p>
                    <div class="mt-6 flex flex-col gap-4 sm:flex-row">
                        <?php echo txa_destination_button('Request Smart Destination Demo', $demo_url); ?>
                        <?php echo txa_destination_button('See destination packages', $pricing_url, 'light'); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="px-4 py-10 lg:px-16 lg:py-12">
        <div class="mx-auto max-w-[1312px] text-center">
            <h2 class="[font-family:'Hanken_Grotesk',sans-serif] text-3xl font-bold tracking-[-0.01em] text-[#151c27]">What is a TXA Smart Destination?</h2>
            <p class="mx-auto mt-2 max-w-[890px] text-base leading-6 text-mid-gray">A Smart destination generates inspiration and TXA helps you own the conversion. Your organisation can use TXA to activate destination websites and apps, digitise local supply, connect suppliers to distributors, build tactical microsites, support trade initiatives, enable economy-wide re-seller networks and create virtual concierge collaborative commerce.</p>
            <div class="mt-8 grid gap-6 sm:grid-cols-2 lg:grid-cols-5">
                <?php foreach ($pillars as $index => $pillar): ?>
                    <article class="rounded-3xl bg-white p-4 text-center shadow-sm">
                        <span class="mx-auto flex size-16 items-center justify-center rounded-xl bg-[#ffdad4] text-lg font-bold text-brand"><?php echo esc_html($index + 1); ?></span>
                        <h3 class="mt-3 [font-family:'Hanken_Grotesk',sans-serif] text-xl font-semibold leading-7 text-[#151c27]"><?php echo esc_html($pillar['title']); ?></h3>
                        <p class="mt-1 text-sm leading-5 text-mid-gray"><?php echo esc_html($pillar['copy']); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="bg-surface px-4 py-12 lg:px-16 lg:py-16">
        <div class="mx-auto grid max-w-[1312px] gap-8 lg:grid-cols-[1fr_511px] lg:items-center">
            <div>
                <h2 class="[font-family:'Hanken_Grotesk',sans-serif] text-3xl font-bold tracking-[-0.01em] text-[#151c27]">The problem TXA solves for destinations</h2>
                <p class="mt-3 text-base leading-6 text-mid-gray">Marketing a destination to inspire is easy. Converting that interest into actual regional bookings is where most DMOs struggle.</p>
                <div class="mt-8 grid gap-4 md:grid-cols-2">
                    <?php foreach ($problems as $problem): ?>
                        <article class="rounded-xl border-l-4 border-[#ba1a1a] bg-white px-7 py-6 shadow-sm">
                            <h3 class="text-base font-semibold text-[#151c27]"><?php echo esc_html($problem['title']); ?></h3>
                            <p class="mt-2 text-sm leading-5 text-mid-gray"><?php echo esc_html($problem['copy']); ?></p>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
            <aside class="overflow-hidden rounded-3xl bg-brand p-8 text-white shadow-2xl">
                <h3 class="[font-family:'Hanken_Grotesk',sans-serif] text-2xl font-bold">The TXA Solution</h3>
                <div class="mt-6 space-y-6">
                    <?php foreach ($solutions as $item): ?>
                        <div class="flex gap-4">
                            <span class="mt-1 flex size-5 shrink-0 items-center justify-center rounded-full border border-white text-[10px]">✓</span>
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

    <section class="px-4 py-12 lg:px-16 lg:py-10">
        <div class="mx-auto max-w-[1312px]">
            <h2 class="max-w-[486px] [font-family:'Hanken_Grotesk',sans-serif] text-3xl font-bold leading-10 tracking-[-0.01em] text-[#181c21]">Your destination, your digital assets, your commercial model</h2>
            <div class="mt-8 grid gap-6 md:grid-cols-2 xl:grid-cols-3">
                <?php foreach ($capabilities as $index => $card): ?>
                    <article class="<?php echo !empty($card['featured']) ? 'border-2 border-[#b3422f]' : 'border border-[#dfc0ba]/20 shadow-sm'; ?> min-h-[190px] rounded-2xl bg-white p-5">
                        <span class="flex size-10 items-center justify-center rounded-lg bg-brand-tint text-sm font-bold text-brand"><?php echo esc_html($index + 1); ?></span>
                        <h3 class="mt-4 [font-family:'Hanken_Grotesk',sans-serif] text-xl font-semibold leading-7 text-[#151c27]"><?php echo esc_html($card['title']); ?></h3>
                        <p class="mt-3 text-sm leading-5 text-mid-gray"><?php echo esc_html($card['copy']); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="bg-surface px-4 py-12 lg:px-16 lg:py-16">
        <div class="mx-auto grid max-w-[1312px] gap-12 lg:grid-cols-[1fr_700px] lg:items-center">
            <div>
                <h2 class="[font-family:'Hanken_Grotesk',sans-serif] text-3xl font-bold leading-10 tracking-[-0.01em] text-[#151c27]">See who is visiting, what is working and where to invest next</h2>
                <div class="mt-6 space-y-4 text-lg leading-7 text-mid-gray">
                    <p>Most destination marketing generates interest that's impossible to trace. Visitors click through to OTA listings or third-party pages, and the data disappears. TXA gives destinations something different: first-party booking and engagement data that belongs to you.</p>
                    <p>For the first time, your destination can see, in one place, which campaigns converted, which suppliers are performing, and where visitor spend is flowing through your local economy.</p>
                </div>
                <ul class="mt-6 space-y-4 text-sm font-semibold leading-5 text-[#151c27]">
                    <li class="flex gap-3"><span class="text-brand">↗</span><span>Real-time Dashboards: Track supplier activity, campaign performance and visitor engagement in one place.</span></li>
                    <li class="flex gap-3"><span class="text-brand">↗</span><span>Attribution & ROI: Connect marketing spend to actual booking outcomes with attribution codes.</span></li>
                    <li class="flex gap-3"><span class="text-brand">↗</span><span>Data Ownership & Integration: Export insights or use APIs to flow data into your CRM or BI tools.</span></li>
                </ul>
            </div>
            <div class="rounded-xl border border-line bg-white p-5 shadow-[0_12px_28px_-8px_rgba(26,26,26,0.12)]">
                <div class="rounded-lg bg-[#f2f4f7] p-4">
                    <div class="flex items-center justify-between border-b border-line pb-3">
                        <div><p class="text-xs font-bold uppercase tracking-wide text-brand">TXA Dashboard</p><p class="mt-1 text-sm text-mid-gray">Destination and channel signals</p></div>
                        <span class="rounded bg-brand-tint px-3 py-2 text-xs font-semibold text-brand">Live</span>
                    </div>
                    <div class="mt-4 grid grid-cols-2 gap-3 sm:grid-cols-4">
                        <?php foreach (['Supplier activity' => '74%', 'Campaigns' => '81%', 'Engagement' => '68%', 'Conversion' => '79%'] as $label => $value): ?>
                            <div class="rounded bg-white p-3"><p class="text-xs text-mid-gray"><?php echo esc_html($label); ?></p><p class="mt-1 text-lg font-bold"><?php echo esc_html($value); ?></p></div>
                        <?php endforeach; ?>
                    </div>
                    <div class="mt-3 h-40 rounded bg-white p-4"><div class="flex h-full items-end gap-2"><?php foreach ([35,52,48,70,63,80,58,88,76,94] as $h): ?><span class="grow rounded-t bg-brand/80" style="height:<?php echo esc_attr($h); ?>%"></span><?php endforeach; ?></div></div>
                </div>
            </div>
        </div>
    </section>

    <section class="relative overflow-hidden px-4 py-14 text-white lg:px-16 lg:py-16">
        <img src="https://images.unsplash.com/photo-1469474968028-56623f02e42e?auto=format&fit=crop&w=2200&q=85" alt="" class="absolute inset-0 h-full w-full object-cover">
        <div class="absolute inset-0 bg-black/60" aria-hidden="true"></div>
        <div class="relative z-10 mx-auto grid max-w-[1312px] gap-10 lg:grid-cols-[379px_1fr] lg:gap-12">
            <div>
                <h2 class="text-3xl font-semibold leading-tight lg:text-4xl lg:leading-[44px]">How a TXA Smart Destination is easily implemented</h2>
                <div class="mt-6 space-y-3">
                    <?php echo txa_destination_button('Ask about our destination packages', $pricing_url); ?>
                    <?php echo txa_destination_button('Request website activation demo', $demo_url, 'white'); ?>
                </div>
            </div>
            <div class="grid gap-4 md:grid-cols-2 xl:grid-cols-3">
                <?php foreach ($implementation as $index => $step): ?>
                    <article class="min-h-[228px] rounded-xl border border-white/20 bg-white/10 p-6 backdrop-blur-md">
                        <span class="flex size-11 items-center justify-center rounded-lg bg-brand text-base font-bold text-white"><?php echo esc_html($index + 1); ?></span>
                        <h3 class="mt-4 [font-family:'Hanken_Grotesk',sans-serif] text-xl font-semibold leading-7"><?php echo esc_html($step['title']); ?></h3>
                        <p class="mt-2 text-sm leading-[21px] text-white"><?php echo esc_html($step['copy']); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="px-4 py-14 lg:px-16 lg:py-16">
        <div class="mx-auto max-w-[964px]">
            <h2 class="text-center text-3xl font-semibold leading-tight lg:text-4xl lg:leading-[44px]">Frequently Asked Questions</h2>
            <div class="mt-8 space-y-4 lg:px-8">
                <?php foreach ($faqs as $faq): ?>
                    <details class="group rounded-lg border border-line bg-white p-6 shadow-[0_12px_28px_-8px_rgba(26,26,26,0.12)]">
                        <summary class="cursor-pointer list-none text-lg font-semibold text-[#151c27] [&::-webkit-details-marker]:hidden"><span class="flex items-center justify-between gap-6"><?php echo esc_html($faq['question']); ?><span class="text-brand transition group-open:rotate-45">+</span></span></summary>
                        <p class="mt-3 text-sm leading-6 text-mid-gray"><?php echo esc_html($faq['answer']); ?></p>
                    </details>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</article>

<?php get_footer();
