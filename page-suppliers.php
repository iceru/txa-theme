<?php
/**
 * Template Name: Suppliers Page
 *
 * @package TailPress
 */

get_header();

$wizard_url = 'https://sites.txa.com.au/Connect';

$benefits = [
    [
        'title' => 'Broader distribution',
        'copy' => 'Broader distribution pathway through connected channels and destination partners.',
    ],
    [
        'title' => 'Real-time updates',
        'copy' => 'Real-time availability and booking updates through your connected booking system where available.',
    ],
    [
        'title' => 'Connection options',
        'copy' => 'Options for suppliers without a suitable booking system, including Rezobx or supported connection pathways where appropriate.',
    ],
    [
        'title' => 'Flexible payment models',
        'copy' => 'Support for direct payment and OTA / on-account distributor models depending on the channel.',
    ],
    [
        'title' => 'Less manual allocation',
        'copy' => 'Less manual management of allocations across multiple websites.',
    ],
    [
        'title' => 'No booking, no fee',
        'copy' => 'A no-booking-no-fee supplier pricing model for TXA-originated online bookings, subject to final pricing terms.',
    ],
];

$process_cards = [
    [
        'title' => 'Choose your connection pathway',
        'copy' => 'Supplier starts with the Get Connected Wizard and confirms their booking system or available connection option.',
    ],
    [
        'title' => 'Connect product and availability',
        'copy' => 'Product, pricing and availability are connected through a supported booking system or approved pathway.',
    ],
    [
        'title' => 'Reach more channels',
        'copy' => 'Connected inventory can become available through destination websites, distributors and other TXA-connected channels.',
    ],
    [
        'title' => 'Receive bookings and updates',
        'copy' => 'Booking updates flow through the agreed channel and payment model.',
    ],
];

$categories = [
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
];

$booking_system_cards = [
    [
        'title' => 'Already using a booking system?',
        'copy' => 'TXA can connect through supported booking systems where available, helping your product, pricing and availability reach more channels.',
        'cta' => 'See connected booking systems',
        'url' => home_url('/booking-systems/directory/'),
        'external' => false,
    ],
    [
        'title' => 'Do not have a suitable booking system?',
        'copy' => 'TXA can help you understand available connection pathways, including free or low-cost booking-system options where appropriate.',
        'cta' => 'Apply Now',
        'url' => home_url('/apply-now/'),
        'external' => false,
    ],
];

$faqs = [
    [
        'question' => 'Do I need a booking system?',
        'answer' => 'Usually TXA works through a connected booking system. If you do not have one, TXA can help you understand available options.',
    ],
    [
        'question' => 'Will I have to manage another system?',
        'answer' => 'The goal is to reduce manual management by using your booking system as the source of product, rates and availability.',
    ],
    [
        'question' => 'Can I keep personal contact with customers?',
        'answer' => 'Yes. The customer remains your customer, and TXA can provide booking and customer details according to the relevant payment and channel model.',
    ],
    [
        'question' => 'What size business is TXA designed for?',
        'answer' => 'TXA is designed for micro, small, medium and larger tourism operators across accommodation, activities, attractions, events and experiences.',
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

<article class="bg-white text-near-black">
    <section class="relative overflow-hidden bg-near-black text-white">
        <div class="container relative mx-auto grid gap-12 py-20 lg:grid-cols-[1.05fr_.95fr] lg:items-center lg:py-28">
            <div class="max-w-3xl">
                <p class="text-sm font-semibold uppercase tracking-wide text-brand">For tourism suppliers</p>
                <h1 class="mt-5 text-4xl font-semibold leading-tight tracking-tight text-balance md:text-6xl">
                    TXA for tourism suppliers: connect once and sell across more channels
                </h1>
                <p class="mt-6 text-lg leading-8 text-white/80 md:text-xl">
                    TXA helps tourism suppliers connect live product, pricing and availability to destination websites, distributors and other online channels without manually allocating to and managing inventory on every site.
                </p>
                <p class="mt-5 max-w-2xl text-base leading-7 text-white/65">
                    Whether you run accommodation, activities, attractions, events, holiday rentals, tours, food and wine experiences, wellness, nature, adventure or ticketed experiences, TXA is designed to help you become visible and bookable online.
                </p>
                <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                    <?php echo txa_page_button('Apply Now', home_url('/apply-now/')); ?>
                    <?php echo txa_page_button('See connected booking systems', home_url('/booking-systems/directory/'), 'secondary-dark'); ?>
                </div>
            </div>

            <div class="rounded border border-white/15 bg-white/10 p-5 shadow-2xl shadow-near-black/30 backdrop-blur">
                <div class="rounded bg-white p-5 text-near-black">
                    <div class="mb-6 flex items-center justify-between border-b border-line pb-4">
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-wide text-brand-text">Connect once, sell everywhere</p>
                            <p class="mt-1 text-sm text-mid-gray">Supplier distribution flow</p>
                        </div>
                        <span class="rounded bg-brand-tint px-3 py-1 text-xs font-semibold text-brand-text">Bookable</span>
                    </div>
                    <div class="space-y-3">
                        <?php foreach (['Supplier', 'Booking System', 'TXA', 'Destination Websites / Distributors / Online Channels'] as $index => $node): ?>
                            <div class="rounded border <?php echo 2 === $index ? 'border-line bg-brand-tint' : 'border-line bg-surface'; ?> p-4">
                                <div class="flex items-center gap-3">
                                    <span class="flex size-9 shrink-0 items-center justify-center rounded bg-near-black text-sm font-bold text-brand"><?php echo esc_html($index + 1); ?></span>
                                    <span class="text-sm font-semibold"><?php echo esc_html($node); ?></span>
                                </div>
                            </div>
                            <?php if ($index < 3): ?>
                                <div class="flex justify-center text-brand-text" aria-hidden="true">&darr;</div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                    <div class="mt-5 flex flex-wrap gap-2">
                        <?php foreach (['Live rates', 'Availability', 'Bookings', 'Updates'] as $badge): ?>
                            <span class="rounded bg-surface px-3 py-1 text-xs font-semibold text-mid-gray"><?php echo esc_html($badge); ?></span>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="container mx-auto py-16 lg:py-24">
        <div class="mb-10 max-w-2xl">
            <p class="text-sm font-semibold uppercase tracking-wide text-brand-text">Supplier benefits</p>
            <h2 class="mt-3 text-3xl font-semibold tracking-tight md:text-4xl">What TXA helps suppliers do</h2>
        </div>
        <div class="grid gap-5 md:grid-cols-2 xl:grid-cols-3">
            <?php foreach ($benefits as $benefit): ?>
                <article class="rounded border border-line bg-white p-6 shadow-sm">
                    <div class="mb-5 size-10 rounded bg-brand-tint"></div>
                    <h3 class="text-lg font-semibold"><?php echo esc_html($benefit['title']); ?></h3>
                    <p class="mt-3 text-sm leading-6 text-mid-gray"><?php echo esc_html($benefit['copy']); ?></p>
                </article>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="bg-surface py-16 lg:py-24">
        <div class="container mx-auto">
            <div class="rounded border border-line bg-white p-8 shadow-sm lg:p-10">
                <div class="grid gap-8 lg:grid-cols-[1fr_auto] lg:items-center">
                    <div>
                        <h2 class="text-3xl font-semibold tracking-tight md:text-4xl">Ready to connect your tourism business to TXA?</h2>
                        <p class="mt-5 text-lg leading-8 text-mid-gray">
                            Start with the TXA Get Connected Wizard. It captures your business details, website or social media URL, product description, industry category and images, then lets you confirm whether you want to remain content-only or make your connection bookable.
                        </p>
                        <p class="mt-5 rounded bg-near-black px-4 py-3 text-sm font-semibold text-white">
                            No booking, no fee. Pay only when you receive online bookings through TXA channels, subject to final success fee of 0.75%-2.8% of total booking value.
                        </p>
                    </div>
                    <div>
                        <?php echo txa_page_button('Apply Now using TXA Get Connected Wizard', $wizard_url, 'primary', true); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="container mx-auto py-16 lg:py-24">
        <div class="mx-auto mb-12 max-w-3xl text-center">
            <p class="text-sm font-semibold uppercase tracking-wide text-brand-text">Connection flow</p>
            <h2 class="mt-3 text-3xl font-semibold tracking-tight md:text-4xl">How supplier connection works</h2>
            <p class="mt-5 text-lg leading-8 text-mid-gray">
                TXA is designed to reduce manual work by using your booking system as the source of product, rates and availability where available.
            </p>
        </div>
        <div class="grid gap-5 lg:grid-cols-4">
            <?php foreach ($process_cards as $index => $card): ?>
                <article class="relative rounded border border-line bg-white p-6 shadow-sm">
                    <span class="mb-6 flex size-11 items-center justify-center rounded bg-near-black text-sm font-bold text-brand"><?php echo esc_html($index + 1); ?></span>
                    <h3 class="text-lg font-semibold"><?php echo esc_html($card['title']); ?></h3>
                    <p class="mt-3 text-sm leading-6 text-mid-gray"><?php echo esc_html($card['copy']); ?></p>
                </article>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="bg-surface py-16 lg:py-24">
        <div class="container mx-auto">
            <div class="mb-8 max-w-3xl">
                <p class="text-sm font-semibold uppercase tracking-wide text-brand-text">Supplier categories</p>
                <h2 class="mt-3 text-3xl font-semibold tracking-tight md:text-4xl">Built for many types of tourism suppliers</h2>
                <p class="mt-5 text-lg leading-8 text-mid-gray">
                    TXA is designed for a wide range of Australian tourism businesses, from small operators to larger tourism providers.
                </p>
            </div>
            <div class="flex flex-wrap gap-3">
                <?php foreach ($categories as $category): ?>
                    <span class="rounded border border-line bg-white px-4 py-2 text-sm font-semibold text-mid-gray shadow-sm"><?php echo esc_html($category); ?></span>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="container mx-auto py-16 lg:py-24">
        <div class="grid gap-6 lg:grid-cols-2">
            <article class="rounded border border-line bg-white p-7 shadow-sm">
                <p class="text-sm font-semibold uppercase tracking-wide text-brand-text">Why TXA</p>
                <h2 class="mt-3 text-3xl font-semibold tracking-tight">Reduce manual allocation across multiple channels</h2>
                <p class="mt-5 text-base leading-7 text-mid-gray">
                    Without an exchange, suppliers often need to manage product information, rates and availability across multiple websites and distributor systems. TXA helps reduce this by connecting supplier information through one open exchange.
                </p>
            </article>
            <article class="rounded border border-line bg-white p-7 shadow-sm">
                <p class="text-sm font-semibold uppercase tracking-wide text-brand-text">More channels</p>
                <h2 class="mt-3 text-3xl font-semibold tracking-tight">Make your product easier to find and book</h2>
                <p class="mt-5 text-base leading-7 text-mid-gray">
                    TXA helps tourism suppliers become visible and bookable through destination partners, distributors and other online channels that connect to the exchange.
                </p>
                <div class="mt-7">
                    <?php echo txa_page_button('Start with the Get Connected Wizard', $wizard_url, 'primary', true); ?>
                </div>
            </article>
        </div>
    </section>

    <section class="bg-near-black py-16 text-white lg:py-24">
        <div class="container mx-auto">
            <div class="mb-10 max-w-3xl">
                <p class="text-sm font-semibold uppercase tracking-wide text-brand">Booking systems</p>
                <h2 class="mt-3 text-3xl font-semibold tracking-tight md:text-4xl">Do I need a booking system?</h2>
                <p class="mt-5 text-lg leading-8 text-white/65">
                    Usually TXA works through a connected booking system. If you do not have one, TXA can help you understand available options.
                </p>
            </div>
            <div class="grid gap-5 md:grid-cols-2">
                <?php foreach ($booking_system_cards as $card): ?>
                    <article class="rounded border border-white/10 bg-white/5 p-7">
                        <h3 class="text-xl font-semibold"><?php echo esc_html($card['title']); ?></h3>
                        <p class="mt-4 text-sm leading-6 text-white/65"><?php echo esc_html($card['copy']); ?></p>
                        <div class="mt-6">
                            <?php echo txa_page_button($card['cta'], $card['url'], 'secondary-dark', $card['external']); ?>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="container mx-auto py-16 lg:py-24">
        <div class="grid gap-10 rounded border border-line bg-surface p-8 lg:grid-cols-[.8fr_1.2fr] lg:items-center lg:p-10">
            <div>
                <p class="text-sm font-semibold uppercase tracking-wide text-brand-text">Supplier pricing</p>
                <h2 class="mt-3 text-3xl font-semibold tracking-tight md:text-4xl">No booking, no fee</h2>
            </div>
            <div>
                <p class="text-lg leading-8 text-mid-gray">
                    For TXA-originated online bookings, suppliers only pay when they receive bookings through TXA channels, subject to final pricing terms.
                </p>
                <div class="mt-6 rounded bg-white p-5 shadow-sm">
                    <p class="text-2xl font-semibold text-brand-text">0.75%-2.8% success fee of total booking value</p>
                    <p class="mt-3 text-sm leading-6 text-mid-gray">Final pricing terms may vary by channel, payment model and commercial arrangement.</p>
                </div>
                <div class="mt-7">
                    <?php echo txa_page_button('View pricing', home_url('/pricing/#suppliers'), 'secondary'); ?>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-surface py-16 lg:py-24">
        <div class="container mx-auto">
            <div class="mb-10 max-w-2xl">
                <p class="text-sm font-semibold uppercase tracking-wide text-brand-text">Supplier FAQs</p>
                <h2 class="mt-3 text-3xl font-semibold tracking-tight md:text-4xl">Supplier FAQs</h2>
            </div>
            <div class="space-y-4">
                <?php foreach ($faqs as $index => $faq): ?>
                    <details class="group rounded border border-line bg-white p-6 shadow-sm" <?php echo 0 === $index ? 'open' : ''; ?>>
                        <summary class="flex cursor-pointer list-none items-center justify-between gap-4 text-lg font-semibold">
                            <?php echo esc_html($faq['question']); ?>
                            <span class="text-brand-text transition group-open:rotate-45">+</span>
                        </summary>
                        <p class="mt-4 text-sm leading-6 text-mid-gray"><?php echo esc_html($faq['answer']); ?></p>
                    </details>
                <?php endforeach; ?>
            </div>
            <div class="mt-8">
                <?php echo txa_page_button('View all FAQs', home_url('/faq/#suppliers'), 'secondary'); ?>
            </div>
        </div>
    </section>

    <section class="bg-near-black py-16 text-white lg:py-24">
        <div class="container mx-auto max-w-4xl text-center">
            <h2 class="text-3xl font-semibold tracking-tight md:text-5xl">Ready to make your tourism product more visible and bookable?</h2>
            <p class="mx-auto mt-5 max-w-2xl text-lg leading-8 text-white/65">
                Start with the TXA Get Connected Wizard and choose the connection pathway that suits your business.
            </p>
            <div class="mt-8 flex flex-col justify-center gap-3 sm:flex-row">
                <?php echo txa_page_button('Apply Now using TXA Get Connected Wizard', $wizard_url, 'primary', true); ?>
                <?php echo txa_page_button('See connected booking systems', home_url('/booking-systems/directory/'), 'secondary-dark'); ?>
            </div>
        </div>
    </section>
</article>

<?php get_footer(); ?>
