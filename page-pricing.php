<?php
/**
 * Template Name: Pricing
 *
 * @package TailPress
 */

add_filter('pre_get_document_title', function (): string {
    return 'TXA Pricing | Tourism Exchange Australia';
});

add_action('wp_head', function (): void {
    if (is_page_template('page-pricing.php')) {
        echo '<meta name="description" content="' . esc_attr('TXA pricing by audience for suppliers, destinations, distributors and booking-system partners.') . '">' . "\n";
    }
});

get_header();

$apply_url = home_url('/apply-now/');
$demo_url = home_url('/request-demo/');
$distributor_url = home_url('/distributors/');
$partner_url = home_url('/booking-systems/partner-enquiry/');

$hero_audiences = [
    ['title' => 'Suppliers', 'copy' => '0.75% - 2.8% success fee per booking.', 'icon' => '<path d="M4 20V9h5v11"/><path d="M15 20V4h5v16"/><path d="M7 13h.01"/><path d="M7 17h.01"/><path d="M18 8h.01"/><path d="M18 12h.01"/><path d="M18 16h.01"/>'],
    ['title' => 'Destinations', 'copy' => 'Packages subject to approval and scope.', 'icon' => '<path d="M4 5v14"/><path d="M4 6c3-2 5 2 8 0s5 2 8 0v11c-3 2-5-2-8 0s-5-2-8 0"/>'],
    ['title' => 'Distributors', 'copy' => 'Pricing by agreement based on volume.', 'icon' => '<circle cx="12" cy="12" r="3"/><path d="M12 3v3"/><path d="M12 18v3"/><path d="M3 12h3"/><path d="M18 12h3"/><path d="m5.6 5.6 2.1 2.1"/><path d="m16.3 16.3 2.1 2.1"/><path d="m18.4 5.6-2.1 2.1"/><path d="m7.7 16.3-2.1 2.1"/>'],
    ['title' => 'Booking Systems', 'copy' => 'Technical integration partner enquiry.', 'icon' => '<path d="M4 21V9h6v12"/><path d="M14 21V5h6v16"/><path d="M7 13h.01"/><path d="M17 9h.01"/><path d="M17 13h.01"/>'],
];

$steps = [
    ['title' => 'Identify your role', 'copy' => 'Supplier, destination, distributor and booking system partner pricing are intentionally separated.'],
    ['title' => 'Confirm the model', 'copy' => 'Success fee, platform package, commercial agreement or partner enquiry depends on the pathway.'],
    ['title' => 'Take the right next step', 'copy' => 'Each pathway leads to the enquiry or application process that matches the organisation type.'],
];

$pricing_cards = [
    [
        'title' => 'Tourism Suppliers',
        'price' => '0.75% <span class="text-lg font-semibold text-mid-gray">to</span> 2.8%',
        'copy' => 'Success fee per booking. Perfect for hotels, tours, and attraction operators.',
        'bullets' => ['No upfront fees', 'Unlimited distributors'],
        'cta' => 'View Details',
        'url' => $apply_url,
        'featured' => true,
    ],
    [
        'title' => 'Destinations',
        'price' => 'Destination Packages',
        'copy' => 'Fixed monthly platform service packages for destination activation, supplier support, content, trade, virtual concierge and data. Publish only after package approval',
        'bullets' => [],
        'cta' => 'Request a Demo',
        'url' => $demo_url,
    ],
    [
        'title' => 'Distributors',
        'price' => 'Commercial Base',
        'copy' => 'Free to connect. Commercial arrangements depend on the distributor model and agreement.',
        'bullets' => [],
        'cta' => 'Become a Distributor',
        'url' => $distributor_url,
    ],
    [
        'title' => 'Booking Systems',
        'price' => 'Partner Enquiry',
        'copy' => 'Fee to connect. Integration scope and commercial arrangements are handled through partner enquiry.',
        'bullets' => [],
        'cta' => 'Partner Enquiry',
        'url' => $partner_url,
    ],
];

$supplier_types = ['Accommodation & Hotels', 'Guided Tours & Experiences', 'Attractions & Rentals', 'Event & Activity Providers'];

$partner_cards = [
    [
        'title' => 'Distributors',
        'copy' => 'TXA acts as a commercially neutral exchange, allowing distributors to connect with thousands of Australian suppliers through a single pipe.',
        'bullets' => ['Commercially Neutral Exchange', 'Live inventory from 130+ booking systems', 'Consolidated payment reconciliation'],
        'cta' => 'Become a Distributor',
        'url' => $distributor_url,
        'icon' => '<circle cx="12" cy="12" r="9"/><path d="M3 12h18"/><path d="M12 3a14 14 0 0 1 0 18"/><path d="M12 3a14 14 0 0 0 0 18"/>',
    ],
    [
        'title' => 'Booking-System Partners',
        'copy' => 'Empower your software users with instant access to state and regional tourism markets via TXA\'s integration framework.',
        'bullets' => ['Open API & Documentation', 'Technical support for onboarding', 'Value-add for your customer base'],
        'cta' => 'Partner Enquiry',
        'url' => $partner_url,
        'icon' => '<path d="M4 6h16v12H4z"/><path d="m8 10 3 2-3 2"/><path d="M13 14h3"/>',
    ],
];

if (!function_exists('txa_pricing_button')) {
    function txa_pricing_button(string $label, string $url, string $variant = 'primary'): string
    {
        $classes = 'inline-flex w-full items-center justify-center rounded px-5 py-3 text-sm font-semibold !no-underline transition sm:w-auto';

        if ('dark' === $variant) {
            $classes .= ' bg-near-black text-white hover:bg-dark-gray';
        } elseif ('outline-light' === $variant) {
            $classes .= ' border border-white/30 bg-transparent text-white hover:bg-white/10';
        } elseif ('outline' === $variant) {
            $classes .= ' border border-near-black/30 bg-white text-near-black hover:bg-surface';
        } else {
            $classes .= ' bg-brand text-white hover:bg-brand-dark';
        }

        return sprintf('<a class="%s" href="%s">%s</a>', esc_attr($classes), esc_url($url), esc_html($label));
    }
}

if (!function_exists('txa_pricing_icon')) {
    function txa_pricing_icon(string $path, string $classes = 'size-7 text-brand'): string
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
    <section class="px-4 py-8 lg:px-8">
        <div class="container mx-auto">
            <div class="bg-near-black px-6 py-14 text-white md:px-10 md:py-20">
                <div class="grid gap-10 lg:grid-cols-[1.2fr_.95fr] lg:items-center">
                    <div>
                        <h1 class="max-w-3xl text-4xl font-semibold leading-tight md:text-5xl">
                            TXA pricing by audience, without the guesswork
                        </h1>
                        <p class="mt-8 max-w-3xl text-base leading-8 text-white/78">
                            TXA supports tourism suppliers, destinations, distributors and booking-system partners through different pricing and commercial models. Start with your organisation type, then move to the right next step.
                        </p>
                        <div class="mt-8 flex flex-col gap-4 sm:flex-row">
                            <?php echo txa_pricing_button('Apply Now', $apply_url); ?>
                            <?php echo txa_pricing_button('Request Demo', $demo_url, 'outline-light'); ?>
                        </div>

                        <div class="mt-12 grid gap-6 md:grid-cols-3">
                            <?php foreach ($steps as $index => $step): ?>
                                <article class="border-t border-white/15 pt-4">
                                    <p class="text-xs font-bold text-brand"><?php echo esc_html(str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT)); ?></p>
                                    <h2 class="mt-4 text-sm font-semibold"><?php echo esc_html($step['title']); ?></h2>
                                    <p class="mt-3 text-xs leading-5 text-white/65"><?php echo esc_html($step['copy']); ?></p>
                                </article>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <?php foreach ($hero_audiences as $audience): ?>
                            <article class="flex items-center justify-between gap-5 rounded-lg border border-white/10 bg-white/5 p-5 shadow-sm">
                                <div class="flex gap-4">
                                    <?php echo txa_pricing_icon($audience['icon'], 'mt-1 size-6 shrink-0 text-brand'); ?>
                                    <div>
                                        <h2 class="text-xl font-semibold"><?php echo esc_html($audience['title']); ?></h2>
                                        <p class="mt-1 text-sm leading-5 text-white/70"><?php echo esc_html($audience['copy']); ?></p>
                                    </div>
                                </div>
                                <span class="text-2xl text-white/35">&rarr;</span>
                            </article>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="px-4 py-12 lg:px-8 lg:py-16">
        <div class="container mx-auto">
            <h2 class="text-center text-3xl font-semibold leading-tight md:text-4xl">
                Choose the pricing model that matches your organisation
            </h2>
            <div class="mt-12 grid gap-6 lg:grid-cols-4">
                <?php foreach ($pricing_cards as $card): ?>
                    <article class="<?php echo !empty($card['featured']) ? 'relative border-brand' : 'border-line'; ?> flex min-h-[360px] flex-col rounded-lg border bg-white p-7 shadow-sm">
                        <?php if (!empty($card['featured'])): ?>
                            <span class="absolute left-1/2 top-0 -translate-x-1/2 -translate-y-1/2 rounded-full bg-brand px-8 py-1 text-xs font-bold uppercase tracking-wide text-white">
                                Most Common
                            </span>
                        <?php endif; ?>
                        <h3 class="text-xl font-semibold text-brand"><?php echo esc_html($card['title']); ?></h3>
                        <p class="mt-9 text-3xl font-bold leading-tight">
                            <?php echo wp_kses($card['price'], ['span' => ['class' => []]]); ?>
                        </p>
                        <p class="mt-6 text-sm leading-6 text-mid-gray"><?php echo esc_html($card['copy']); ?></p>
                        <?php if (!empty($card['bullets'])): ?>
                            <ul class="mt-6 space-y-3">
                                <?php foreach ($card['bullets'] as $bullet): ?>
                                    <li class="flex gap-3 text-sm text-mid-gray">
                                        <span class="text-brand">&odot;</span>
                                        <?php echo esc_html($bullet); ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                        <div class="mt-auto pt-8">
                            <?php echo txa_pricing_button($card['cta'], $card['url'], !empty($card['featured']) ? 'primary' : 'outline'); ?>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="px-4 py-10 lg:px-8 lg:py-16">
        <div class="container mx-auto">
            <div class="bg-surface p-6 md:p-10 lg:p-14">
                <div class="grid gap-10 lg:grid-cols-[1fr_.9fr] lg:items-center">
                    <div>
                        <p class="inline-flex rounded bg-brand-tint px-4 py-2 text-xs font-bold uppercase tracking-wide text-brand-text">
                            Supplier Focus
                        </p>
                        <h2 class="mt-6 text-3xl font-semibold leading-tight md:text-4xl">No booking, no fee supplier pricing</h2>
                        <p class="mt-7 max-w-2xl text-base leading-8 text-mid-gray">
                            Our model is designed to grow with you. The 0.75%-2.8% success fee ensures that TXA only succeeds when your business does. We reduce manual allocation and administrative overhead, allowing you to focus on the experience.
                        </p>
                        <div class="mt-8 grid gap-4 sm:grid-cols-2">
                            <?php foreach ($supplier_types as $type): ?>
                                <div class="flex gap-3 text-sm font-semibold text-mid-gray">
                                    <span class="text-brand">✓</span>
                                    <?php echo esc_html($type); ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="mt-9">
                            <?php echo txa_pricing_button('Apply Now using the TXA Get Connected Wizard ↗', $apply_url); ?>
                        </div>
                    </div>
                    <div class="rounded-lg bg-white p-6 shadow-xl shadow-near-black/10">
                        <div class="mb-4 flex items-center justify-between gap-4">
                            <h3 class="text-sm font-bold">Booking Success Fee</h3>
                            <p class="text-sm font-bold text-brand">1.5% Avg.</p>
                        </div>
                        <div class="h-3 rounded-full bg-brand/20">
                            <div class="h-3 w-8/12 rounded-full bg-brand"></div>
                        </div>
                        <div class="mt-3 flex justify-between text-xs font-semibold text-mid-gray">
                            <span>0.75%</span>
                            <span>2.8%</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="px-4 py-10 lg:px-8 lg:py-16">
        <div class="container mx-auto">
            <div class="grid gap-8 lg:grid-cols-2">
                <?php foreach ($partner_cards as $card): ?>
                    <article class="rounded-lg border border-brand/25 bg-white p-8 shadow-sm md:p-10">
                        <div class="flex size-12 items-center justify-center rounded bg-brand-tint">
                            <?php echo txa_pricing_icon($card['icon']); ?>
                        </div>
                        <h2 class="mt-8 text-3xl font-semibold"><?php echo esc_html($card['title']); ?></h2>
                        <p class="mt-6 max-w-xl text-base leading-8 text-mid-gray"><?php echo esc_html($card['copy']); ?></p>
                        <ol class="mt-8 space-y-5">
                            <?php foreach ($card['bullets'] as $index => $bullet): ?>
                                <li class="flex gap-4 text-sm font-semibold text-near-black">
                                    <span class="flex size-6 shrink-0 items-center justify-center rounded-full bg-brand-tint text-xs font-bold text-brand">
                                        <?php echo esc_html($index + 1); ?>
                                    </span>
                                    <?php echo esc_html($bullet); ?>
                                </li>
                            <?php endforeach; ?>
                        </ol>
                        <div class="mt-9">
                            <?php echo txa_pricing_button($card['cta'], $card['url'], 'dark'); ?>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</article>

<?php
get_footer();
