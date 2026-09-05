<?php
/**
 * Template Name: Suppliers Page
 *
 * @package TailPress
 */

get_header();

$wizard_url = 'https://sites.txa.com.au/Connect';

$distribution_steps = [
    ['title' => 'Suppliers', 'copy' => 'The primary originators of tourism products and inventory.'],
    ['title' => 'Booking Systems', 'copy' => 'The technology providers use to manage live rates and inventory availability.'],
    ['title' => 'TXA', 'copy' => 'The central distribution hub connecting all tourism digital infrastructure.'],
    ['title' => 'Online Channels', 'copy' => 'Destination websites, distributors, and global online OTAs.'],
];

$benefits = [
    ['icon' => '↗', 'title' => 'Broader distribution', 'copy' => 'Broader distribution pathway through connected channels and destination partners.'],
    ['icon' => '⟳', 'title' => 'Real-time updates', 'copy' => 'Real-time automation and booking through your connected booking system where available.'],
    ['icon' => '≋', 'title' => 'Connection options', 'copy' => 'Options for suppliers without a suitable booking system, supported connection pathways.'],
    ['icon' => '▣', 'title' => 'Flexible booking payment models', 'copy' => 'Support for direct payment and OTA / on-request account distributor models depending on the channel.'],
    ['icon' => '↙', 'title' => 'Less manual tasks', 'copy' => 'No need for time consuming inventory and rate management across multiple websites and platforms.'],
    ['icon' => '♙', 'title' => 'No booking, no fee', 'copy' => 'A no-booking-no-fee supplier pricing model for TXA-originated online bookings means no fixed upfront or monthly fees = no risk!'],
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
        'answer' => 'Yes. The customer remains your customer, with booking and customer information flowing according to the relevant channel and payment model.',
    ],
    [
        'question' => 'What size business is TXA designed for?',
        'answer' => 'TXA is designed for tourism suppliers of different sizes across accommodation, activities, attractions, events and experiences.',
    ],
];

if (!function_exists('txa_supplier_button')) {
    function txa_supplier_button(string $label, string $url, string $variant = 'primary', bool $external = false): string
    {
        $classes = 'inline-flex w-full items-center justify-center rounded-lg px-6 py-3 text-sm font-bold !no-underline transition sm:w-auto';

        if ('light' === $variant) {
            $classes .= ' border border-white bg-white/10 text-white hover:bg-white/20';
        } elseif ('secondary' === $variant) {
            $classes .= ' border border-line bg-white text-brand hover:bg-surface';
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

<article class="bg-white text-near-black [font-family:'Source_Sans_Pro',sans-serif]">
    <section class="px-4 pb-8 pt-8 lg:px-5 lg:pb-16">
        <div class="relative mx-auto min-h-[520px] max-w-[1400px] overflow-hidden rounded-2xl bg-near-black lg:min-h-[600px]">
            <img src="https://images.unsplash.com/photo-1500534314209-a25ddb2bd429?auto=format&fit=crop&w=2200&q=85" alt="Australian coastline" class="absolute inset-0 h-full w-full object-cover">
            <div class="absolute inset-0 bg-near-black/45" aria-hidden="true"></div>

            <div class="relative z-10 flex min-h-[520px] items-center px-6 py-16 sm:px-8 lg:min-h-[600px] lg:px-8 lg:py-24">
                <div class="max-w-[760px]">
                    <p class="inline-flex rounded-lg bg-brand px-6 py-3 text-sm font-bold uppercase text-white sm:text-xl">
                        TXA for Australian tourism suppliers
                    </p>
                    <h1 class="mt-4 max-w-[760px] text-4xl font-semibold leading-tight text-white sm:text-5xl lg:text-5xl lg:leading-[56px]">
                        Connect once and sell across more channels
                    </h1>
                    <p class="mt-4 max-w-[660px] text-lg font-semibold leading-[30px] text-white">
                        TXA helps tourism suppliers connect live product, pricing and availability to destination websites, distributors and other online channels without manually allocating to and managing inventory on every site.
                    </p>
                    <div class="mt-6 flex flex-col gap-4 sm:flex-row">
                        <?php echo txa_supplier_button('Apply Now', home_url('/apply-now/')); ?>
                        <?php echo txa_supplier_button('See connected booking systems', home_url('/booking-systems/directory/'), 'light'); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-surface px-4 py-10 lg:p-16">
        <div class="mx-auto max-w-[1312px] rounded-lg bg-white px-6 py-8 shadow-[0_12px_28px_-8px_rgba(26,26,26,0.12)] lg:px-8 lg:py-[34px]">
            <div class="max-w-[640px]">
                <p class="text-sm uppercase leading-5 text-brand">Connect once, sell everywhere</p>
                <h2 class="mt-2 text-3xl font-semibold leading-tight lg:text-4xl lg:leading-[44px]">Boost your digital distribution profile</h2>
                <p class="mt-2 text-base leading-[30px] text-mid-gray">
                    TXA is designed to reduce manual work by using your booking system as the single source of products, rates and availability where available.
                </p>
            </div>

            <div class="mt-8 grid gap-4 md:grid-cols-2 xl:grid-cols-4 xl:gap-8">
                <?php foreach ($distribution_steps as $index => $step): ?>
                    <article class="<?php echo 2 === $index ? 'border-2 border-brand bg-[#ffdad4] shadow-[0_0_0_4px_rgba(146,42,26,0.10)]' : 'border border-line bg-white'; ?> relative min-h-[148px] overflow-hidden rounded-lg p-6">
                        <div class="flex items-center gap-4">
                            <span class="flex size-10 shrink-0 items-center justify-center rounded-lg bg-brand text-base font-bold text-white"><?php echo esc_html($index + 1); ?></span>
                            <h3 class="[font-family:'Hanken_Grotesk',sans-serif] text-xl font-semibold <?php echo 2 === $index ? 'text-brand' : 'text-[#151c27]'; ?>"><?php echo esc_html($step['title']); ?></h3>
                        </div>
                        <p class="mt-4 text-sm leading-5 <?php echo 2 === $index ? 'text-brand' : 'text-[#5b5f64]'; ?>"><?php echo esc_html($step['copy']); ?></p>
                        <?php if (2 === $index): ?>
                            <span class="absolute -bottom-8 -right-6 size-24 rounded-full border-[14px] border-brand/10" aria-hidden="true"></span>
                        <?php endif; ?>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="px-4 py-12 lg:px-16 lg:py-8">
        <div class="mx-auto max-w-[1312px]">
            <div>
                <p class="text-sm uppercase leading-5 text-brand">Supplier benefits</p>
                <h2 class="mt-2 [font-family:'Hanken_Grotesk',sans-serif] text-3xl font-semibold leading-tight lg:text-4xl lg:leading-[44px]">What TXA helps suppliers do</h2>
                <p class="mt-2 max-w-[723px] text-base leading-6 text-mid-gray">
                    TXA has options for suppliers that don't have a suitable booking system or supported connection pathways
                </p>
            </div>

            <div class="mt-8 grid gap-8 md:grid-cols-2 xl:grid-cols-3">
                <?php foreach ($benefits as $benefit): ?>
                    <article class="min-h-[226px] rounded-2xl border border-[#dfc0ba]/80 bg-white p-8 shadow-sm">
                        <span class="flex size-12 items-center justify-center rounded-xl bg-[#dfc0ba]/20 text-lg font-bold text-brand"><?php echo esc_html($benefit['icon']); ?></span>
                        <h3 class="mt-6 [font-family:'Hanken_Grotesk',sans-serif] text-xl font-semibold leading-7 text-[#151c27]">
                            <?php echo esc_html($benefit['title']); ?>
                        </h3>
                        <p class="mt-3 text-base leading-6 text-mid-gray"><?php echo esc_html($benefit['copy']); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="bg-surface px-4 py-12 lg:p-16">
        <div class="mx-auto grid max-w-[1312px] gap-10 rounded-lg bg-white px-6 py-8 shadow-[0_12px_28px_-8px_rgba(26,26,26,0.12)] lg:grid-cols-[565px_1fr] lg:items-center lg:gap-12 lg:px-8 lg:py-[52px]">
            <div>
                <p class="text-sm uppercase leading-5 text-brand-text">Get connected</p>
                <h2 class="mt-4 text-3xl font-semibold leading-tight lg:text-4xl lg:leading-[44px]">Ready to connect your tourism business to TXA?</h2>
                <p class="mt-4 text-base leading-7 text-mid-gray">
                    It's so easy! Use the TXA Get Connected Wizard. It captures your business details, website or social media URL, product description, industry category and images, then lets you confirm whether you want to remain content only or make your connection bookable.
                </p>
                <div class="mt-4 rounded-lg border border-brand bg-[#ffdad4]/80 p-4 text-base font-semibold leading-5 text-brand">
                    No booking, no fee. Pay only when you receive online bookings through TXA channels, subject to final success fee of 0.75%-2.8% of total booking value.
                </div>
                <div class="mt-4">
                    <?php echo txa_supplier_button('No booking, no fee means no risk.', $wizard_url, 'primary', true); ?>
                </div>
            </div>

            <div class="h-[320px] overflow-hidden rounded-lg border border-line sm:h-[408px]">
                <img src="https://images.unsplash.com/photo-1518509562904-e7ef99cdcc86?auto=format&fit=crop&w=1500&q=85" alt="Island surrounded by turquoise water" class="h-full w-full object-cover">
            </div>
        </div>
    </section>

    <section class="px-4 py-14 lg:px-16 lg:py-16">
        <div class="mx-auto max-w-[1100px]">
            <h2 class="text-center text-3xl font-semibold leading-tight lg:text-4xl lg:leading-[44px]">Frequently Asked Questions</h2>
            <div class="mt-10 space-y-4 lg:px-8">
                <?php foreach ($faqs as $index => $faq): ?>
                    <details class="group rounded-lg border border-line bg-white p-6 shadow-[0_12px_28px_-8px_rgba(26,26,26,0.12)]" <?php echo 0 === $index ? 'open' : ''; ?>>
                        <summary class="cursor-pointer list-none text-xl font-semibold leading-7 text-near-black [&::-webkit-details-marker]:hidden">
                            <span class="flex items-center justify-between gap-6">
                                <?php echo esc_html($faq['question']); ?>
                                <span class="text-brand transition group-open:rotate-45" aria-hidden="true">+</span>
                            </span>
                        </summary>
                        <p class="mt-2 text-sm leading-6 text-mid-gray"><?php echo esc_html($faq['answer']); ?></p>
                    </details>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</article>

<?php
get_footer();
