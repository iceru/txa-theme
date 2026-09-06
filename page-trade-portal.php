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
?>

<article class="bg-white text-near-black [font-family:'Source_Sans_Pro',sans-serif]">
    <section class="bg-surface px-4 py-14 sm:py-16 lg:px-16 lg:py-24">
        <div class="mx-auto grid max-w-[1312px] gap-10 lg:grid-cols-2 lg:items-center lg:gap-16">
            <div>
                <p class="inline-flex rounded-lg bg-brand px-5 py-3 text-xs font-bold uppercase text-white sm:text-sm">
                    Trade Portal Solution</p>
                <h1
                    class="mt-8 max-w-[680px] [font-family:'Hanken_Grotesk',sans-serif] text-4xl font-bold leading-[1.18] text-[#151c27] sm:text-5xl lg:text-[56px] lg:leading-[1.15]">
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
