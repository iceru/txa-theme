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

<article class="text-near-black">
    <section class="p-6">
        <div class="relative min-h-[80vh] overflow-hidden rounded-lg border border-white/70 bg-near-black shadow-2xl shadow-near-black/20">
            <img src="https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?auto=format&fit=crop&w=2200&q=80" alt="" class="absolute inset-0 h-full w-full object-cover">
            <div class="absolute inset-0 bg-near-black/50" aria-hidden="true"></div>

            <div class="relative z-10 flex min-h-[80vh] p-8">
                <div class="container mx-auto flex items-center">
                    <div class="max-w-4xl">
                        <p class="mb-2 inline-flex rounded-lg bg-brand px-4 py-2 text-sm font-semibold uppercase text-white">
                            For tourism suppliers
                        </p>
                        <h1 class="mb-6 max-w-3xl text-4xl font-semibold leading-tight text-white md:text-6xl lg:text-5xl">
                            TXA for tourism suppliers: connect once and sell across more channels
                        </h1>
                        <div class="max-w-2xl">
                            <p class="text-base leading-7 text-white/85 md:text-lg">
                                TXA helps tourism suppliers connect live product, pricing and availability to destination websites, distributors and other online channels without manually allocating to and managing inventory on every site.
                            </p>
                            <p class="mt-4 text-sm leading-6 text-white/70 md:text-base">
                                Whether you run accommodation, activities, attractions, events, holiday rentals, tours, food and wine experiences, wellness, nature, adventure or ticketed experiences, TXA is designed to help you become visible and bookable online.
                            </p>
                            <div class="mt-6 flex flex-col gap-3 sm:flex-row">
                                <?php echo txa_page_button('Apply Now', home_url('/apply-now/')); ?>
                                <?php echo txa_page_button('See connected booking systems', home_url('/booking-systems/directory/'), 'secondary-dark'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-surface px-4 py-8 lg:px-8 lg:py-12">
        <div class="container mx-auto">
            <div class="rounded-lg bg-white p-6 shadow-sm lg:p-8">
                <div class="grid gap-8 lg:grid-cols-[.75fr_1.25fr] lg:items-center">
                    <div>
                        <p class="text-sm font-semibold uppercase text-brand-text">Connect once, sell everywhere</p>
                        <h2 class="mt-3 text-3xl font-semibold leading-tight md:text-4xl">Supplier distribution flow</h2>
                        <p class="mt-5 text-lg leading-8 text-mid-gray">
                            TXA is designed to reduce manual work by using your booking system as the source of product, rates and availability where available.
                        </p>
                    </div>
                    <div class="grid gap-3 sm:grid-cols-2 lg:grid-cols-4">
                        <?php foreach (['Supplier', 'Booking System', 'TXA', 'Destination Websites / Distributors / Online Channels'] as $index => $node): ?>
                            <div class="<?php echo 2 === $index ? 'border-brand/20 bg-brand-tint' : 'border-line bg-surface'; ?> rounded-lg border p-5">
                                <span class="mb-4 flex size-9 items-center justify-center rounded-lg bg-brand text-xs font-bold text-white"><?php echo esc_html($index + 1); ?></span>
                                <h3 class="text-base font-semibold"><?php echo esc_html($node); ?></h3>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="mt-6 flex flex-wrap gap-3">
                    <?php foreach (['Live rates', 'Availability', 'Bookings', 'Updates'] as $badge): ?>
                        <span class="rounded-lg border border-line bg-surface px-4 py-2 text-sm font-semibold text-mid-gray"><?php echo esc_html($badge); ?></span>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <section class="px-4 py-8 lg:px-8 lg:py-12">
        <div class="container mx-auto">
            <div class="mb-8 flex flex-col justify-between gap-5 md:flex-row md:items-end">
                <div class="max-w-2xl">
                    <p class="text-sm font-semibold uppercase text-brand-text">Supplier benefits</p>
                    <h2 class="mt-3 text-3xl font-semibold leading-tight md:text-4xl">What TXA helps suppliers do</h2>
                </div>
                <p class="max-w-md text-sm leading-6 text-mid-gray">
                    The supplier pathway keeps the focus on practical distribution: less manual work, broader reach and flexible connection options.
                </p>
            </div>
            <div class="grid gap-5 md:grid-cols-2 xl:grid-cols-3">
                <?php foreach ($benefits as $index => $benefit): ?>
                    <article class="rounded-lg border border-line bg-white p-6 shadow-sm">
                        <span class="mb-4 flex size-10 items-center justify-center rounded-lg bg-brand-tint text-sm font-bold text-brand-text"><?php echo esc_html($index + 1); ?></span>
                        <h3 class="text-lg font-semibold"><?php echo esc_html($benefit['title']); ?></h3>
                        <p class="mt-3 text-sm leading-6 text-mid-gray"><?php echo esc_html($benefit['copy']); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="bg-surface px-4 py-8 lg:px-8 lg:py-12">
        <div class="container mx-auto">
            <div class="grid gap-8 rounded-lg bg-white p-6 shadow-sm lg:grid-cols-[.85fr_1.15fr] lg:items-center lg:p-8">
                <div>
                    <p class="text-sm font-semibold uppercase text-brand-text">Get connected</p>
                    <h2 class="mt-3 text-3xl font-semibold leading-tight md:text-4xl">Ready to connect your tourism business to TXA?</h2>
                    <p class="mt-5 text-lg leading-8 text-mid-gray">
                        Start with the TXA Get Connected Wizard. It captures your business details, website or social media URL, product description, industry category and images, then lets you confirm whether you want to remain content-only or make your connection bookable.
                    </p>
                    <div class="mt-7">
                        <?php echo txa_page_button('Apply Now using TXA Get Connected Wizard', $wizard_url, 'primary', true); ?>
                    </div>
                </div>
                <div class="overflow-hidden rounded-lg border border-line bg-surface">
                    <img src="https://images.unsplash.com/photo-1526772662000-3f88f10405ff?auto=format&fit=crop&w=1000&q=80" alt="" class="h-72 w-full object-cover">
                    <div class="p-6">
                        <p class="rounded-lg bg-near-black px-4 py-3 text-sm font-semibold text-white">
                            No booking, no fee. Pay only when you receive online bookings through TXA channels, subject to final success fee of 0.75%-2.8% of total booking value.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="px-4 py-8 lg:px-8 lg:py-12">
        <div class="container mx-auto">
            <div class="mx-auto mb-10 max-w-3xl text-center">
                <p class="text-sm font-semibold uppercase text-brand-text">Connection flow</p>
                <h2 class="mt-3 text-3xl font-semibold leading-tight md:text-4xl">How supplier connection works</h2>
                <p class="mt-5 text-lg leading-8 text-mid-gray">
                    Start with your current setup, then use the most appropriate TXA connection pathway for your business.
                </p>
            </div>
            <div class="grid gap-5 lg:grid-cols-4">
                <?php foreach ($process_cards as $index => $card): ?>
                    <article class="rounded-lg border border-line bg-white p-6 shadow-sm">
                        <span class="mb-4 flex size-11 items-center justify-center rounded-lg bg-near-black text-sm font-bold text-brand"><?php echo esc_html($index + 1); ?></span>
                        <h3 class="text-lg font-semibold"><?php echo esc_html($card['title']); ?></h3>
                        <p class="mt-3 text-sm leading-6 text-mid-gray"><?php echo esc_html($card['copy']); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="bg-surface px-4 py-8 lg:px-8 lg:py-12">
        <div class="container mx-auto">
            <div class="rounded-lg bg-white p-6 shadow-sm lg:p-8">
                <div class="mb-8 max-w-3xl">
                    <p class="text-sm font-semibold uppercase text-brand-text">Supplier categories</p>
                    <h2 class="mt-3 text-3xl font-semibold leading-tight md:text-4xl">Built for many types of tourism suppliers</h2>
                    <p class="mt-5 text-lg leading-8 text-mid-gray">
                        TXA is designed for a wide range of Australian tourism businesses, from small operators to larger tourism providers.
                    </p>
                </div>
                <div class="flex flex-wrap gap-3">
                    <?php foreach ($categories as $category): ?>
                        <span class="rounded-lg border border-line bg-surface px-4 py-2 text-sm font-semibold text-mid-gray"><?php echo esc_html($category); ?></span>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <section class="px-4 py-8 lg:px-8 lg:py-12">
        <div class="container mx-auto">
            <div class="grid gap-5 lg:grid-cols-2">
                <article class="rounded-lg border border-line bg-white p-7 shadow-sm">
                    <p class="text-sm font-semibold uppercase text-brand-text">Why TXA</p>
                    <h2 class="mt-3 text-3xl font-semibold leading-tight">Reduce manual allocation across multiple channels</h2>
                    <p class="mt-5 text-base leading-7 text-mid-gray">
                        Without an exchange, suppliers often need to manage product information, rates and availability across multiple websites and distributor systems. TXA helps reduce this by connecting supplier information through one open exchange.
                    </p>
                </article>
                <article class="rounded-lg border border-line bg-white p-7 shadow-sm">
                    <p class="text-sm font-semibold uppercase text-brand-text">More channels</p>
                    <h2 class="mt-3 text-3xl font-semibold leading-tight">Make your product easier to find and book</h2>
                    <p class="mt-5 text-base leading-7 text-mid-gray">
                        TXA helps tourism suppliers become visible and bookable through destination partners, distributors and other online channels that connect to the exchange.
                    </p>
                    <div class="mt-7">
                        <?php echo txa_page_button('Start with the Get Connected Wizard', $wizard_url, 'primary', true); ?>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <section class="px-4 py-8 lg:px-8 lg:py-12">
        <div class="container mx-auto">
            <div class="relative overflow-hidden rounded-lg bg-near-black text-white shadow-xl">
                <img src="https://images.unsplash.com/photo-1500534314209-a25ddb2bd429?auto=format&fit=crop&w=1800&q=80" alt="" class="absolute inset-0 h-full w-full object-cover opacity-30">
                <div class="relative grid gap-8 p-6 lg:grid-cols-[.85fr_1.15fr] lg:items-center lg:p-10">
                    <div>
                        <p class="inline-flex rounded-lg bg-brand px-4 py-2 text-sm font-semibold uppercase text-white">Booking systems</p>
                        <h2 class="mt-3 text-3xl font-semibold leading-tight md:text-4xl">Do I need a booking system?</h2>
                        <p class="mt-5 text-lg leading-8 text-white/70">
                            Usually TXA works through a connected booking system. If you do not have one, TXA can help you understand available options.
                        </p>
                    </div>
                    <div class="grid gap-5 md:grid-cols-2">
                        <?php foreach ($booking_system_cards as $card): ?>
                            <article class="rounded-lg border border-white/10 bg-white/10 p-6 backdrop-blur">
                                <h3 class="text-xl font-semibold"><?php echo esc_html($card['title']); ?></h3>
                                <p class="mt-4 text-sm leading-6 text-white/70"><?php echo esc_html($card['copy']); ?></p>
                                <div class="mt-6">
                                    <?php echo txa_page_button($card['cta'], $card['url'], 'secondary-dark', $card['external']); ?>
                                </div>
                            </article>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="px-4 py-8 lg:px-8 lg:py-12">
        <div class="container mx-auto">
            <div class="grid gap-8 rounded-lg bg-white p-6 shadow-sm lg:grid-cols-[.75fr_1.25fr] lg:items-center lg:p-8">
                <div>
                    <p class="text-sm font-semibold uppercase text-brand-text">Supplier pricing</p>
                    <h2 class="mt-3 text-3xl font-semibold leading-tight md:text-4xl">No booking, no fee</h2>
                </div>
                <div>
                    <p class="text-lg leading-8 text-mid-gray">
                        For TXA-originated online bookings, suppliers only pay when they receive bookings through TXA channels, subject to final pricing terms.
                    </p>
                    <div class="mt-6 rounded-lg bg-brand-tint p-5">
                        <p class="text-2xl font-semibold text-brand-text">0.75%-2.8% success fee of total booking value</p>
                        <p class="mt-3 text-sm leading-6 text-mid-gray">Final pricing terms may vary by channel, payment model and commercial arrangement.</p>
                    </div>
                    <div class="mt-7">
                        <?php echo txa_page_button('View pricing', home_url('/pricing/#suppliers'), 'secondary'); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-surface px-4 py-8 lg:px-8 lg:py-12">
        <div class="container mx-auto">
            <div class="mb-8 max-w-2xl">
                <p class="text-sm font-semibold uppercase text-brand-text">Supplier FAQs</p>
                <h2 class="mt-3 text-3xl font-semibold leading-tight md:text-4xl">Supplier FAQs</h2>
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
                <?php echo txa_page_button('View all FAQs', home_url('/faq/#suppliers'), 'secondary'); ?>
            </div>
        </div>
    </section>

    <section class="px-4 pb-10 pt-8 lg:px-8 lg:pb-16 lg:pt-12">
        <div class="container mx-auto">
            <div class="relative overflow-hidden rounded-lg bg-near-black text-white shadow-2xl shadow-near-black/20">
                <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=1800&q=80" alt="" class="absolute inset-0 h-full w-full object-cover opacity-40">
                <div class="relative mx-auto max-w-4xl px-6 py-20 text-center lg:py-28">
                    <h2 class="text-3xl font-semibold leading-tight md:text-4xl">Ready to make your tourism product more visible and bookable?</h2>
                    <p class="mx-auto mt-5 max-w-2xl text-lg leading-8 text-white/75">
                        Start with the TXA Get Connected Wizard and choose the connection pathway that suits your business.
                    </p>
                    <div class="mt-8 flex flex-col justify-center gap-3 sm:flex-row">
                        <?php echo txa_page_button('Apply Now using TXA Get Connected Wizard', $wizard_url, 'primary', true); ?>
                        <?php echo txa_page_button('See connected booking systems', home_url('/booking-systems/directory/'), 'secondary-dark'); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</article>

<?php get_footer(); ?>
