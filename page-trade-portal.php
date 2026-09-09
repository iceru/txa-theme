<?php
/**
 * Template Name: Destination Trade Portal
 *
 * @package TailPress
 */

get_header();

$demo_url = home_url('/request-demo/');

$feature_cards = [
    [
        'icon' => 'bi-megaphone',
        'title' => 'Event Ready Activations',
        'copy' => 'Useful for trade shows, roadshows and trade campaigns. Instantly provide partners with a digital entry point to your region\'s best bookable product.',
    ],
    [
        'icon' => 'bi-qr-code',
        'title' => 'Branded Discovery',
        'copy' => 'Provides a destination-branded entry point into supplier discovery and booking, ensuring your unique identity remains front and center.',
    ],
    [
        'icon' => 'bi-magic',
        'title' => 'Efficiency at Scale',
        'copy' => 'Can reduce manual follow-up by making supplier contracting, content, images and descriptions, and bookable product easier to access for busy trade partners.',
    ],
    [
        'icon' => 'bi-handshake',
        'title' => 'Strategic DMO Partner',
        'copy' => 'Supports the DMO role as a trade activation partner for local industry. Actively stimulate bookings and visibility for your regional operators without the heavy lifting.',
        'red' => true,
    ],
];

$inventory_points = [
    ['title' => 'Live Booking Connectivity', 'copy' => 'Sync directly with supplier inventory for instant confirmation and zero overbookings.'],
    ['title' => 'Curated Experience Collections', 'copy' => 'Group products by theme, region, or campaign type to simplify the partner\'s journey.'],
    ['title' => 'Integrated Analytics', 'copy' => 'Track which suppliers and experiences are getting the most attention from trade partners.'],
];

$portal_features = [
    ['icon' => 'bi-image', 'title' => 'Destination Branding', 'copy' => 'Compelling hero image, key messages and highlights.'],
    ['icon' => 'bi-geo-alt', 'title' => 'Points of Interest (POIs)', 'copy' => 'Curated attractions, landmarks and places to discover.'],
    ['icon' => 'bi-signpost-split', 'title' => 'Recommended Experiences', 'copy' => 'Themed itineraries and experiences to explore.'],
    ['icon' => 'bi-shop-window', 'title' => 'Local Suppliers', 'copy' => 'Search and discover verified local suppliers.'],
    ['icon' => 'bi-calendar2-check', 'title' => 'Real-time Booking Access', 'copy' => 'Check availability, prices and book instantly.'],
];

$supply_features = [
    ['icon' => 'bi-person-badge', 'title' => 'Supplier Profiles', 'copy' => 'Detailed information, photos, descriptions and contacts.'],
    ['icon' => 'bi-calendar3', 'title' => 'Real-time Availability', 'copy' => 'Live availability and pricing from connected systems.'],
    ['icon' => 'bi-cart-check', 'title' => 'Instant Booking', 'copy' => 'Book tours, accommodation, experiences and services.', 'featured' => true],
    ['icon' => 'bi-ticket-perforated', 'title' => 'Confirmation & Vouchers', 'copy' => 'Instant confirmations, digital vouchers and e-tickets.'],
    ['icon' => 'bi-headset', 'title' => 'Supplier Support', 'copy' => 'Enquiries, changes and cancellations support.'],
    ['icon' => 'bi-database-gear', 'title' => 'Connected Systems', 'copy' => 'Booking engines, CRMs, inventory and payment gateways.'],
];

$buyer_outcomes = [
    ['icon' => 'bi-search', 'title' => 'Easy Discovery', 'copy' => 'Find the right products and experiences.'],
    ['icon' => 'bi-cart-check', 'title' => 'Seamless Booking', 'copy' => 'Book instantly with real-time availability.'],
    ['icon' => 'bi-ticket-perforated', 'title' => 'Confirm & Go', 'copy' => 'Receive confirmations and vouchers.'],
    ['icon' => 'bi-hand-thumbs-up', 'title' => 'Great Experience', 'copy' => 'Enjoy memorable experiences.'],
];

$portal_benefits = [
    ['icon' => 'bi-graph-up-arrow', 'title' => 'Supporting DMOs', 'copy' => 'A trade activation partner for local industry and regions.'],
    ['icon' => 'bi-people', 'title' => 'Reduce Manual Follow-up', 'copy' => 'Easier access to supplier information and bookable products.'],
    ['icon' => 'bi-megaphone', 'title' => 'Ideal for Trade Initiatives', 'copy' => 'Trade shows, roadshows and trade campaigns.'],
    ['icon' => 'bi-globe2', 'title' => 'Drive Growth', 'copy' => 'Increase engagement, bookings and regional economic impact.'],
];
?>

<article class="bg-white text-near-black [font-family:'Source_Sans_Pro',sans-serif]">
    <section class="bg-surface px-4 py-14 sm:py-16 lg:px-16 lg:py-24">
        <div class="mx-auto grid max-w-[1312px] gap-10 lg:grid-cols-2 lg:items-center lg:gap-16">
            <div>
                <p class="inline-flex rounded-lg bg-brand px-5 py-3 text-xs font-bold uppercase text-white sm:text-sm">
                    Trade Portal Solution</p>
                <h1
                    class="mt-8 max-w-[680px] [font-family:'Hanken_Grotesk',sans-serif] text-4xl font-bold leading-[1.18] text-[#151c27] sm:text-5xl lg:text-[44px] lg:leading-[1.15]">
                    Give trade partners a <span class="text-brand">dedicated destination page</span> with bookable local
                    supply</h1>
                <p class="mt-6 max-w-[620px] text-lg leading-8 text-mid-gray">TXA can create a destination-specific
                    landing page in in Australia's National Trade Portal. The page can be accessed by URL or QR code and
                    can present POIs, recommended experiences and suppliers with real-time booking access for domestic
                    and international trade initiatives.</p>
                <a href="<?php echo esc_url($demo_url); ?>"
                    class="mt-8 inline-flex min-h-12 w-full items-center justify-center rounded-lg bg-brand px-7 py-3 text-base font-bold text-white !no-underline hover:bg-brand-dark sm:w-auto">Request
                    trade portal activation</a>
            </div>
            <div>
                <img src="<?php echo esc_url(get_theme_file_uri('/images/laptop-1.png')); ?>"
                    alt="Trade portal destination page on a laptop" class="mx-auto w-full max-w-[560px]">
            </div>
        </div>
    </section>

    <section class="bg-white px-4 py-14 sm:py-16 lg:px-16 lg:py-20">
        <div class="mx-auto max-w-[1312px]">
            <div class="mx-auto max-w-[820px] text-center">
                <p class="text-xs font-bold uppercase tracking-wide text-brand sm:text-sm">Connected trade activation</p>
                <h2 class="mt-3 [font-family:'Hanken_Grotesk',sans-serif] text-3xl font-bold leading-tight text-[#151c27] sm:text-4xl">Destination Trade Portal</h2>
                <p class="mt-3 text-base leading-7 text-mid-gray sm:text-lg">Connecting trade partners to bookable local supply.</p>
            </div>

            <div class="mt-10 overflow-hidden rounded-2xl border border-line bg-surface p-4 shadow-sm sm:mt-12 sm:p-6 lg:p-8">
                <div class="grid grid-cols-1 items-stretch gap-4 xl:grid-cols-[0.8fr_34px_1.35fr_34px_1.35fr_34px_0.8fr] xl:gap-3">
                    <article class="flex flex-col rounded-2xl border border-line bg-white p-5 shadow-sm">
                        <div class="text-center">
                            <span class="mx-auto flex size-14 items-center justify-center rounded-xl bg-brand-tint text-3xl text-brand" aria-hidden="true"><i class="bi bi-person-workspace"></i></span>
                            <h3 class="mt-4 [font-family:'Hanken_Grotesk',sans-serif] text-lg font-bold uppercase leading-6 text-[#151c27]">Access for Trade Partners</h3>
                            <p class="mt-2 text-xs leading-5 text-mid-gray">Access the destination page via URL or QR code.</p>
                        </div>

                        <div class="mt-5 rounded-xl border border-line bg-surface p-4 text-center">
                            <p class="text-[10px] font-bold uppercase tracking-wide text-brand">Destination URL</p>
                            <div class="mt-3 flex items-center gap-2 rounded-lg border border-line bg-white px-3 py-3 text-left">
                                <i class="bi bi-window text-brand" aria-hidden="true"></i>
                                <span class="min-w-0 break-all text-[11px] font-semibold leading-4 text-[#151c27]">tradeportal.com/<br>destinations/queensland</span>
                            </div>
                            <p class="my-3 text-[10px] font-bold uppercase text-mid-gray">or</p>
                            <i class="bi bi-qr-code text-7xl leading-none text-near-black" aria-hidden="true"></i>
                            <p class="mt-2 text-[10px] font-semibold text-mid-gray">QR code access</p>
                        </div>

                        <div class="mt-5 flex grow flex-col items-center justify-end text-center">
                            <div class="flex items-end gap-1 text-2xl text-brand" aria-hidden="true"><i class="bi bi-person"></i><i class="bi bi-person-standing text-3xl"></i><i class="bi bi-person"></i></div>
                            <p class="mt-2 text-xs font-semibold leading-5 text-[#151c27]">Domestic &amp; international trade partners</p>
                        </div>
                    </article>

                    <div class="flex items-center justify-center text-brand" aria-hidden="true">
                        <i class="bi bi-arrow-down-up text-2xl xl:hidden"></i><i class="bi bi-arrow-left-right hidden text-2xl xl:block"></i>
                    </div>

                    <article class="rounded-2xl border border-line bg-white p-5 shadow-sm">
                        <header class="border-b border-line pb-4 text-center">
                            <span class="mx-auto flex size-12 items-center justify-center rounded-xl bg-brand text-2xl text-white" aria-hidden="true"><i class="bi bi-window-stack"></i></span>
                            <h3 class="mt-3 [font-family:'Hanken_Grotesk',sans-serif] text-lg font-bold uppercase leading-6 text-[#151c27]">Destination Trade Portal</h3>
                            <p class="text-xs text-mid-gray">Destination page</p>
                        </header>

                        <div class="divide-y divide-line">
                            <?php foreach ($portal_features as $item): ?>
                                <div class="flex gap-3 py-4">
                                    <span class="flex size-10 shrink-0 items-center justify-center rounded-lg bg-brand-tint text-xl text-brand" aria-hidden="true"><i class="bi <?php echo esc_attr($item['icon']); ?>"></i></span>
                                    <div>
                                        <h4 class="text-xs font-bold uppercase leading-5 text-[#151c27]"><?php echo esc_html($item['title']); ?></h4>
                                        <p class="mt-1 text-xs leading-5 text-mid-gray"><?php echo esc_html($item['copy']); ?></p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <div class="mt-2 grid grid-cols-2 gap-2 border-t border-line pt-4 sm:grid-cols-4 xl:grid-cols-2 2xl:grid-cols-4">
                            <?php foreach ([['bi-phone', 'Mobile optimised'], ['bi-qr-code', 'QR shareable'], ['bi-translate', 'Multi-language'], ['bi-file-earmark-arrow-down', 'Downloads']] as $tool): ?>
                                <div class="text-center"><i class="bi <?php echo esc_attr($tool[0]); ?> text-lg text-brand" aria-hidden="true"></i><p class="mt-1 text-[9px] font-semibold leading-3 text-mid-gray"><?php echo esc_html($tool[1]); ?></p></div>
                            <?php endforeach; ?>
                        </div>
                    </article>

                    <div class="flex items-center justify-center text-brand" aria-hidden="true">
                        <i class="bi bi-arrow-down-up text-2xl xl:hidden"></i><i class="bi bi-arrow-left-right hidden text-2xl xl:block"></i>
                    </div>

                    <article class="rounded-2xl border border-line bg-white p-5 shadow-sm">
                        <header class="border-b border-line pb-4 text-center">
                            <span class="mx-auto flex size-12 items-center justify-center rounded-xl bg-brand text-2xl text-white" aria-hidden="true"><i class="bi bi-box-seam"></i></span>
                            <h3 class="mt-3 [font-family:'Hanken_Grotesk',sans-serif] text-lg font-bold uppercase leading-6 text-[#151c27]">Integrated Local Supply &amp; Booking</h3>
                        </header>

                        <div class="divide-y divide-line">
                            <?php foreach ($supply_features as $item): ?>
                                <div class="flex gap-3 py-4 <?php echo !empty($item['featured']) ? 'text-brand' : ''; ?>">
                                    <span class="flex size-10 shrink-0 items-center justify-center rounded-lg <?php echo !empty($item['featured']) ? 'bg-brand text-white' : 'bg-brand-tint text-brand'; ?> text-xl" aria-hidden="true"><i class="bi <?php echo esc_attr($item['icon']); ?>"></i></span>
                                    <div>
                                        <h4 class="text-xs font-bold uppercase leading-5 <?php echo !empty($item['featured']) ? 'text-brand' : 'text-[#151c27]'; ?>"><?php echo esc_html($item['title']); ?></h4>
                                        <p class="mt-1 text-xs leading-5 <?php echo !empty($item['featured']) ? 'text-brand/80' : 'text-mid-gray'; ?>"><?php echo esc_html($item['copy']); ?></p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </article>

                    <div class="flex items-center justify-center text-brand" aria-hidden="true">
                        <i class="bi bi-arrow-down-up text-2xl xl:hidden"></i><i class="bi bi-arrow-left-right hidden text-2xl xl:block"></i>
                    </div>

                    <article class="flex flex-col rounded-2xl border border-line bg-white p-5 shadow-sm">
                        <div class="text-center">
                            <span class="mx-auto flex size-14 items-center justify-center rounded-xl bg-brand-tint text-3xl text-brand" aria-hidden="true"><i class="bi bi-person-check"></i></span>
                            <h3 class="mt-4 [font-family:'Hanken_Grotesk',sans-serif] text-lg font-bold uppercase leading-6 text-[#151c27]">Buyers / Travellers</h3>
                            <p class="mt-1 text-xs text-mid-gray">Trade customers</p>
                            <p class="mt-3 text-xs leading-5 text-mid-gray">Discover, book and experience with confidence.</p>
                        </div>

                        <div class="mt-5 divide-y divide-line rounded-xl border border-line bg-surface px-4">
                            <?php foreach ($buyer_outcomes as $item): ?>
                                <div class="flex gap-3 py-4">
                                    <i class="bi <?php echo esc_attr($item['icon']); ?> shrink-0 text-2xl text-brand" aria-hidden="true"></i>
                                    <div><h4 class="text-xs font-bold uppercase leading-5 text-[#151c27]"><?php echo esc_html($item['title']); ?></h4><p class="mt-1 text-xs leading-5 text-mid-gray"><?php echo esc_html($item['copy']); ?></p></div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </article>
                </div>

                <div class="mt-5 grid overflow-hidden rounded-xl border border-line bg-white sm:grid-cols-2 xl:grid-cols-4">
                    <?php foreach ($portal_benefits as $index => $benefit): ?>
                        <article class="flex gap-3 p-4 sm:p-5 <?php echo $index ? 'border-t border-line sm:border-l sm:border-t-0' : ''; ?>">
                            <i class="bi <?php echo esc_attr($benefit['icon']); ?> shrink-0 text-2xl text-brand" aria-hidden="true"></i>
                            <div><h3 class="text-xs font-bold uppercase leading-5 text-[#151c27]"><?php echo esc_html($benefit['title']); ?></h3><p class="mt-1 text-[11px] leading-4 text-mid-gray"><?php echo esc_html($benefit['copy']); ?></p></div>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <section class="px-4 py-16 sm:py-20 lg:px-16 lg:py-24">
        <div class="mx-auto max-w-[1312px]">
            <div class="mx-auto max-w-[720px] text-center">
                <h2
                    class="[font-family:'Hanken_Grotesk',sans-serif] text-3xl font-bold leading-tight text-[#151c27] sm:text-4xl">
                    Empowering Destinations &amp; Trade</h2>
                <p class="mt-6 text-base leading-7 text-mid-gray">Discover how the TXA Trade Portal bridges the gap
                    between local supply and global demand through a structured, professional interface.</p>
            </div>
            <div class="mt-12 grid gap-8 lg:grid-cols-2">
                <?php foreach ($feature_cards as $card): ?>
                    <article
                        class="<?php echo !empty($card['red']) ? 'bg-brand text-white shadow-xl shadow-brand/20' : 'border border-[#dfc0ba] bg-white text-[#151c27] shadow-sm'; ?> rounded-2xl p-8 sm:p-10 lg:min-h-[250px] <?php echo !empty($card['red']) ? 'lg:flex lg:items-center lg:justify-between lg:gap-10' : ''; ?>">
                        <div>
                            <span
                                class="<?php echo !empty($card['red']) ? 'bg-white/15 text-white' : 'bg-brand-tint text-brand'; ?> flex size-12 items-center justify-center rounded-lg text-2xl">
                                <i class="bi <?php echo esc_attr($card['icon']); ?>" aria-hidden="true"></i>
                            </span>
                            <h3
                                class="mt-8 [font-family:'Hanken_Grotesk',sans-serif] text-2xl font-bold <?php echo !empty($card['red']) ? 'text-white' : 'text-[#151c27]'; ?>">
                                <?php echo esc_html($card['title']); ?></h3>
                            <p
                                class="mt-5 max-w-[620px] text-base leading-8 <?php echo !empty($card['red']) ? 'text-white' : 'text-mid-gray'; ?>">
                                <?php echo esc_html($card['copy']); ?></p>
                        </div>
                        <?php if (!empty($card['red'])): ?>
                            <i class="bi bi-handshake hidden shrink-0 text-[120px] leading-none text-white lg:block"
                                aria-hidden="true"></i>
                        <?php endif; ?>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="bg-surface px-4 py-16 sm:py-20 lg:px-16 lg:py-24">
        <div class="mx-auto  max-w-[1312px] gap-10 grid lg:grid-cols-2 lg:items-center lg:gap-16">
            <div>
                <h2
                    class="[font-family:'Hanken_Grotesk',sans-serif] text-3xl font-bold leading-tight text-[#151c27] sm:text-4xl">
                    Real-time inventory, local expertise.</h2>
                <div class="mt-8 space-y-8">
                    <?php foreach ($inventory_points as $point) { ?>
                        <div class="flex gap-5">
                            <span
                                class="mt-1 flex size-7 shrink-0 items-center justify-center rounded-full bg-brand text-sm text-white">
                                <i class="bi bi-check-lg" aria-hidden="true"></i>
                            </span>
                            <div>
                                <h3 class="text-lg font-bold text-[#151c27]"><?php echo esc_html($point['title']); ?></h3>
                                <p class="mt-1 max-w-[560px] text-sm leading-6 text-mid-gray">
                                    <?php echo esc_html($point['copy']); ?></p>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <img src="<?php echo esc_url(get_theme_file_uri('/images/laptop-2.png')); ?>"
                alt="Bookable trade inventory shown on a laptop" class="mx-auto w-full max-w-[620px]">
        </div>
    </section>
</article>

<?php get_footer(); ?>
