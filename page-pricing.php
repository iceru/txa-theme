<?php
/**
 * Template Name: Pricing
 *
 * @package TailPress
 */

get_header();

$apply_url = home_url('/apply-now/');
$demo_url = home_url('/request-demo/');
$supplier_url = home_url('/suppliers/');
$destination_url = home_url('/destinations/pricing/');
$distributor_url = home_url('/distributors/');
$booking_url = home_url('/booking-systems/partner-enquiry/');

$hero_steps = [
    ['number' => '01', 'title' => 'Identify your role', 'copy' => 'Supplier, destination, distributor and booking-system partner pricing are intentionally separated.'],
    ['number' => '02', 'title' => 'Confirm the model', 'copy' => 'Success fee, platform package, commercial agreement or partner enquiry depends on the pathway.'],
    ['number' => '03', 'title' => 'Take the right next step', 'copy' => 'Each pathway leads to the enquiry or application process that matches the organisation type.'],
];

$hero_paths = [
    ['icon' => 'bi-house-door', 'title' => 'Suppliers', 'copy' => '0.75% - 2.8% success fee per booking.', 'url' => $supplier_url],
    ['icon' => 'bi-map', 'title' => 'Destinations', 'copy' => 'Packages subject to approval and scope.', 'url' => $destination_url],
    ['icon' => 'bi-diagram-3', 'title' => 'Distributors', 'copy' => 'Pricing by agreement based on volume.', 'url' => $distributor_url],
    ['icon' => 'bi-calendar2-check', 'title' => 'Booking Systems', 'copy' => 'Technical integration partner enquiry.', 'url' => $booking_url],
];

$pricing_cards = [
    ['title' => 'Tourism Suppliers', 'price' => '0.75%', 'suffix' => 'to', 'price_end' => '2.8%', 'copy' => 'Success fee per booking. Perfect for hotels, tours, and attraction operators.', 'points' => ['No upfront fees', 'Unlimited distributors'], 'cta' => 'View Details', 'url' => $supplier_url, 'featured' => true],
    ['title' => 'Destinations', 'price' => 'Destination Packages', 'copy' => 'Fixed monthly platform service packages for destination activation, supplier support, content, trade, virtual concierge and data. Publish only after package approval.', 'cta' => 'Request a Demo', 'url' => $demo_url],
    ['title' => 'Distributors', 'price' => 'Commercial Base', 'copy' => 'Free to connect. Commercial arrangements depend on the distributor model and agreement.', 'cta' => 'Become a Distributor', 'url' => $distributor_url],
    ['title' => 'Booking Systems', 'price' => 'Partner Enquiry', 'copy' => 'Fee to connect. Integration scope and commercial arrangements are handled through partner enquiry.', 'cta' => 'Partner Enquiry', 'url' => $booking_url],
];

$supplier_types = ['Accommodation & Hotels', 'Guided Tours & Experiences', 'Attractions & Rentals', 'Event & Activity Providers'];

$partner_cards = [
    [
        'icon' => 'bi-globe2',
        'title' => 'Distributors',
        'copy' => 'TXA acts as a commercially neutral exchange, allowing distributors to connect with thousands of Australian suppliers through a single pipe.',
        'points' => ['Commercially Neutral Exchange', 'Live inventory from connected booking systems', 'Consolidated payment reconciliation'],
        'cta' => 'Become a Distributor',
        'url' => $distributor_url,
    ],
    [
        'icon' => 'bi-terminal',
        'title' => 'Booking-System Partners',
        'copy' => 'Empower your software users with instant access to state and regional tourism markets via TXA\'s integration framework.',
        'points' => ['Open API & Documentation', 'Technical support for onboarding', 'Value-add for your customer base'],
        'cta' => 'Partner Enquiry',
        'url' => $booking_url,
    ],
];
?>

<article class="bg-white text-near-black [font-family:'Source_Sans_Pro',sans-serif]">
    <section
        class="relative min-h-[620px] overflow-hidden bg-near-black px-4 py-12 text-white sm:py-16 lg:px-16 lg:py-24">
        <img src="<?php echo esc_url(get_theme_file_uri('/images/Baines, Northern Territory.jpg')); ?>" alt=""
            class="absolute inset-0 h-full w-full object-cover">
        <div class="absolute inset-0 bg-near-black/60" aria-hidden="true"></div>
        <div
            class="relative z-10 mx-auto grid max-w-[1312px] gap-10 lg:grid-cols-[1fr_520px] lg:items-center lg:gap-16">
            <div>
                <h1
                    class="max-w-[620px] [font-family:'Hanken_Grotesk',sans-serif] text-[42px] font-bold leading-[1.1] text-white sm:text-5xl lg:text-[44px]">
                    TXA pricing without the guesswork.</h1>
                <p class="mt-6 max-w-[650px] text-base font-semibold leading-7 text-white/90 sm:text-lg">Tell us what
                    you do and your preferred commercial model and we will help guide you.</p>
                <div class="mt-8 flex flex-col gap-4 sm:flex-row">
                    <a href="<?php echo esc_url($apply_url); ?>"
                        class="inline-flex min-h-12 items-center justify-center rounded-lg bg-brand px-8 py-3 text-base font-bold text-white !no-underline hover:bg-brand-dark">Apply
                        Now</a>
                    <a href="<?php echo esc_url($demo_url); ?>"
                        class="inline-flex min-h-12 items-center justify-center rounded-lg border border-white/70 bg-white/10 px-8 py-3 text-base font-bold text-white !no-underline hover:bg-white/20">Request
                        Demo</a>
                </div>
                <div class="mt-10 grid gap-6 sm:grid-cols-3">
                    <?php foreach ($hero_steps as $step): ?>
                        <div class="max-w-[250px]">
                            <p class="text-sm font-bold text-white/75"><?php echo esc_html($step['number']); ?></p>
                            <h2 class="mt-4 text-base font-bold text-white"><?php echo esc_html($step['title']); ?></h2>
                            <p class="mt-3 text-sm leading-6 text-white/80"><?php echo esc_html($step['copy']); ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="grid gap-4">
                <?php foreach ($hero_paths as $path): ?>
                    <a href="<?php echo esc_url($path['url']); ?>"
                        class="group flex min-h-[106px] items-center justify-between gap-5 rounded-lg border border-white/10 bg-white/20 p-6 shadow-lg backdrop-blur-md !no-underline hover:bg-white/25">
                        <span>
                            <i class="bi <?php echo esc_attr($path['icon']); ?> text-2xl text-white" aria-hidden="true"></i>
                            <span
                                class="mt-3 block text-2xl font-bold text-white"><?php echo esc_html($path['title']); ?></span>
                            <span
                                class="mt-1 block text-sm font-semibold text-white/80"><?php echo esc_html($path['copy']); ?></span>
                        </span>
                        <i class="bi bi-arrow-right text-2xl text-white/70 transition group-hover:translate-x-1 group-hover:text-white"
                            aria-hidden="true"></i>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="px-4 py-16 sm:py-20 lg:px-16 lg:py-24">
        <div class="mx-auto max-w-[1312px]">
            <h2
                class="text-center [font-family:'Hanken_Grotesk',sans-serif] text-3xl font-bold leading-tight text-[#151c27] sm:text-4xl">
                Choose the pricing model that matches your organisation</h2>
            <div class="mt-12 grid gap-6 md:grid-cols-2 xl:grid-cols-4">
                <?php foreach ($pricing_cards as $card): ?>
                    <article
                        class="relative flex min-h-[430px] flex-col rounded-2xl border <?php echo !empty($card['featured']) ? 'border-2 border-brand' : 'border-line'; ?> bg-white p-8 shadow-sm">
                        <?php if (!empty($card['featured'])): ?>
                            <span
                                class="absolute -top-4 left-1/2 -translate-x-1/2 rounded-full bg-brand px-7 py-1.5 text-[10px] font-bold uppercase tracking-wide text-white">Most
                                Common</span>
                        <?php endif; ?>
                        <h3 class="text-xl font-bold text-brand"><?php echo esc_html($card['title']); ?></h3>
                        <div class="mt-8">
                            <?php if (!empty($card['price_end'])): ?>
                                <p class="text-4xl font-bold leading-none text-[#151c27]">
                                    <?php echo esc_html($card['price']); ?> <span
                                        class="text-sm font-bold text-mid-gray"><?php echo esc_html($card['suffix']); ?></span>
                                    <?php echo esc_html($card['price_end']); ?></p>
                            <?php else: ?>
                                <p class="text-2xl font-bold leading-tight text-[#151c27]">
                                    <?php echo esc_html($card['price']); ?></p>
                            <?php endif; ?>
                        </div>
                        <p class="mt-6 text-sm leading-6 text-mid-gray"><?php echo esc_html($card['copy']); ?></p>
                        <?php if (!empty($card['points'])): ?>
                            <ul class="mt-6 space-y-3 text-sm font-semibold text-[#151c27]">
                                <?php foreach ($card['points'] as $point): ?>
                                    <li class="flex items-center gap-2"><i class="bi bi-check-circle text-brand"
                                            aria-hidden="true"></i><?php echo esc_html($point); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                        <a href="<?php echo esc_url($card['url']); ?>"
                            class="mt-auto inline-flex min-h-12 items-center justify-center rounded-lg <?php echo !empty($card['featured']) ? 'bg-brand text-white hover:bg-brand-dark' : 'border border-[#d7b8b3] text-[#151c27] hover:border-brand hover:text-brand'; ?> px-6 py-3 text-center text-sm font-bold !no-underline"><?php echo esc_html($card['cta']); ?></a>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="bg-surface px-4 py-16 sm:py-20 lg:px-16 lg:py-24">
        <div class="mx-auto grid max-w-[1312px] gap-10 lg:grid-cols-[1fr_520px] lg:items-center lg:gap-16">
            <div>
                <p class="inline-flex rounded bg-[#ffdad4] px-4 py-1.5 text-xs font-bold uppercase text-brand">Supplier
                    Focus</p>
                <h2
                    class="mt-7 [font-family:'Hanken_Grotesk',sans-serif] text-3xl font-bold leading-tight text-[#151c27] sm:text-4xl">
                    No booking, no fee supplier pricing</h2>
                <p class="mt-6 max-w-[620px] text-base leading-8 text-mid-gray">Our model is designed to grow with you.
                    The 0.75%-2.8% success fee ensures that TXA only succeeds when your business does. We reduce manual
                    allocation and administrative overhead, allowing you to focus on the experience.</p>
                <div class="mt-8 grid gap-4 sm:grid-cols-2">
                    <?php foreach ($supplier_types as $type): ?>
                        <div class="flex items-center gap-3 text-sm font-semibold text-[#151c27]"><i
                                class="bi bi-check-lg text-brand" aria-hidden="true"></i><?php echo esc_html($type); ?>
                        </div>
                    <?php endforeach; ?>
                </div>
                <a href="<?php echo esc_url($apply_url); ?>"
                    class="mt-10 inline-flex min-h-12 w-full items-center justify-center gap-3 rounded-lg bg-brand px-7 py-3 text-sm font-bold text-white !no-underline shadow-lg shadow-brand/20 hover:bg-brand-dark sm:w-auto">Apply
                    Now using the TXA Get Connected Wizard <i class="bi bi-box-arrow-up-right"
                        aria-hidden="true"></i></a>
            </div>
            <div class="rounded-2xl bg-white p-7 shadow-xl">
                <div class="flex items-center justify-between gap-4 text-sm font-bold">
                    <span class="text-[#151c27]">Booking Success Fee</span>
                    <span class="text-brand">1.5% Avg.</span>
                </div>
                <div class="mt-6 h-4 overflow-hidden rounded-full bg-[#f0d2ce]">
                    <div class="h-full w-[58%] rounded-full bg-brand"></div>
                </div>
                <div class="mt-4 flex justify-between text-xs font-semibold text-mid-gray">
                    <span>0.75%</span>
                    <span>2.8%</span>
                </div>
            </div>
        </div>
    </section>

    <section class="px-4 py-16 sm:py-20 lg:px-16 lg:py-24">
        <div class="mx-auto grid max-w-[1312px] gap-8 lg:grid-cols-2">
            <?php foreach ($partner_cards as $card): ?>
                <article class="rounded-2xl border border-[#dfc0ba] bg-white p-8 sm:p-10 lg:p-12">
                    <span class="flex size-14 items-center justify-center rounded-lg bg-brand-tint text-2xl text-brand"><i
                            class="bi <?php echo esc_attr($card['icon']); ?>" aria-hidden="true"></i></span>
                    <h2 class="mt-8 [font-family:'Hanken_Grotesk',sans-serif] text-3xl font-bold text-[#151c27]">
                        <?php echo esc_html($card['title']); ?></h2>
                    <p class="mt-6 max-w-[560px] text-base leading-8 text-mid-gray"><?php echo esc_html($card['copy']); ?>
                    </p>
                    <ol class="mt-8 space-y-5">
                        <?php foreach ($card['points'] as $index => $point): ?>
                            <li class="flex items-center gap-4 text-sm font-bold text-[#151c27]"><span
                                    class="flex size-6 shrink-0 items-center justify-center rounded-full bg-brand-tint text-xs text-brand"><?php echo esc_html($index + 1); ?></span><?php echo esc_html($point); ?>
                            </li>
                        <?php endforeach; ?>
                    </ol>
                    <a href="<?php echo esc_url($card['url']); ?>"
                        class="mt-10 inline-flex min-h-12 items-center justify-center rounded-lg bg-near-black px-8 py-3 text-sm font-bold text-white !no-underline hover:bg-dark-gray"><?php echo esc_html($card['cta']); ?></a>
                </article>
            <?php endforeach; ?>
        </div>
    </section>
</article>

<?php get_footer();
