<?php

/**
 * Template Name: Suppliers Page
 *
 * @package TailPress
 */

get_header();

$wizard_url = 'https://sites.txa.com.au/Connect';

$benefits = [
    ['icon' => 'bi-share', 'title' => 'Broader distribution', 'copy' => 'Broader distribution pathway through connected channels and destination partners.'],
    ['icon' => 'bi-arrow-repeat', 'title' => 'Real-time updates', 'copy' => 'Real-time automation and booking through your connected booking system where available.'],
    ['icon' => 'bi-diagram-3', 'title' => 'Connection options', 'copy' => 'Options for suppliers without a suitable booking system, or alternative supported connection pathways.'],
    ['icon' => 'bi-credit-card-2-front', 'title' => 'Flexible booking payment models', 'copy' => 'Support for direct payment and OTA / on-request account distributor models depending on the channel.'],
    ['icon' => 'bi-list-check', 'title' => 'Less manual tasks', 'copy' => 'No need for time consuming inventory and rate management across multiple websites and platforms.'],
    ['icon' => 'bi-cash-coin', 'title' => 'No booking, no fee', 'copy' => 'A no-booking-no-fee supplier pricing model for TXA-originated online bookings means no fixed upfront or monthly fees = no risk!'],
];

if (!function_exists('txa_supplier_button')) {
    function txa_supplier_button(string $label, string $url, string $variant = 'primary', bool $external = false): string
    {
        $classes = 'inline-flex min-h-12 w-full items-center justify-center rounded-lg px-5 py-3 text-center font-bold leading-5 !no-underline transition sm:w-auto sm:px-6';
        $classes .= 'light' === $variant
            ? ' border border-white bg-white/10 text-white hover:bg-white/20'
            : ('secondary' === $variant
                ? ' border border-line bg-white text-brand hover:bg-surface'
                : ' bg-brand text-white hover:bg-brand-dark');
        $target = $external ? ' target="_blank" rel="noopener noreferrer"' : '';

        return sprintf('<a class="%s" href="%s"%s>%s</a>', esc_attr($classes), esc_url($url), $target, esc_html($label));
    }
}
?>

<article class="bg-white text-near-black [font-family:'Source_Sans_Pro',sans-serif]">
    <section class="px-4 pb-6 pt-3 sm:pt-5 lg:px-16 lg:pb-16 lg:pt-8">
        <div
            class="relative mx-auto min-h-[590px] max-w-[1312px] overflow-hidden rounded-xl bg-near-black sm:min-h-[560px] sm:rounded-2xl lg:min-h-[600px]">
            <img src="<?php echo esc_url(get_theme_file_uri('/images/supplier-1.jpg')); ?>" alt="Rottnest Island, Perth"
                class="absolute inset-0 h-full w-full object-cover object-center">
            <div class="absolute inset-0 bg-near-black/55 sm:bg-near-black/45" aria-hidden="true"></div>
            <div
                class="relative z-10 flex min-h-[590px] items-center px-5 py-10 sm:min-h-[560px] sm:px-8 sm:py-16 lg:min-h-[600px] lg:px-8 lg:py-24">
                <div class="w-full max-w-[760px]">
                    <p
                        class="inline-flex w-fit max-w-full rounded-lg bg-brand px-4 py-2 text-sm font-bold sm:px-5 sm:py-3 sm:text-base uppercase leading-5 text-white">
                        TXA for Australian tourism suppliers</p>
                    <h1
                        class="mt-4 max-w-[760px] text-[34px] font-semibold leading-[1.08] text-white min-[390px]:text-4xl sm:text-5xl lg:leading-[56px]">
                        Connect once and sell across more channels</h1>
                    <p
                        class="mt-4 max-w-[660px] text-base font-medium leading-6 text-white sm:text-lg sm:leading-[30px]">
                        TXA helps tourism suppliers connect live product, pricing and availability to destination
                        websites, distributors and other online channels without manually allocating to and managing
                        inventory on every site.</p>
                    <div class="mt-6 flex flex-col gap-3 sm:flex-row sm:gap-4">
                        <?php echo txa_supplier_button('Apply Now', home_url('/apply-now/')); ?>
                        <?php echo txa_supplier_button('See connected booking systems', home_url('/booking-systems'), 'light'); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="px-4 py-9 sm:py-10 lg:px-16">
        <div class="mx-auto max-w-[1312px]">
            <div class="max-w-[640px]">
                <p class="text-xs uppercase leading-5 text-brand sm:text-sm">Connect once, sell everywhere</p>
                <h2
                    class="mt-2 text-[28px] font-semibold leading-9 sm:text-3xl sm:leading-tight lg:text-4xl lg:leading-[44px]">
                    Boost your digital distribution profile</h2>
                <p class="mt-3 text-base leading-7 text-mid-gray sm:leading-[30px]">TXA is designed to reduce manual
                    work by using your booking system as the single source of products, rates and availability where
                    available.</p>
            </div>
            <?php get_template_part('template-parts/system-diagram', null, ['highlight' => 'supplier']); ?>
        </div>
    </section>

    <section class="px-4 py-10 sm:py-12 lg:px-16 lg:py-8">
        <div class="mx-auto max-w-[1312px]">
            <p class="text-xs uppercase leading-5 text-brand sm:text-sm">Supplier benefits</p>
            <h2
                class="mt-2 [font-family:'Hanken_Grotesk',sans-serif] text-[28px] font-semibold leading-9 sm:text-3xl sm:leading-tight lg:text-4xl lg:leading-[44px]">
                What TXA helps suppliers do</h2>
            <p class="mt-3 max-w-[723px] text-base leading-6 text-mid-gray">TXA has options for suppliers that don't
                have a suitable booking system or alternative connection pathways</p>
            <div class="mt-7 grid gap-4 sm:mt-8 md:grid-cols-2 md:gap-6 xl:grid-cols-3 xl:gap-8">
                <?php foreach ($benefits as $benefit): ?>
                    <article
                        class="min-h-[0] rounded-xl border border-[#dfc0ba]/80 bg-white p-5 shadow-sm sm:min-h-[226px] sm:rounded-2xl sm:p-8">
                        <span
                            class="flex size-10 items-center justify-center rounded-xl bg-[#dfc0ba]/20 text-base font-bold text-brand sm:size-12 sm:text-lg">
                            <i class="bi <?php echo esc_attr($benefit['icon']); ?>" aria-hidden="true"></i>
                        </span>
                        <h3
                            class="mt-4 [font-family:'Hanken_Grotesk',sans-serif] text-lg font-semibold leading-7 text-[#151c27] sm:mt-6 sm:text-xl">
                            <?php echo esc_html($benefit['title']); ?>
                        </h3>
                        <p class="mt-2 text-sm leading-6 text-mid-gray sm:mt-3 sm:text-base">
                            <?php echo esc_html($benefit['copy']); ?>
                        </p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="bg-surface px-4 py-10 sm:py-12 lg:p-16">
        <div
            class="mx-auto grid max-w-[1312px] gap-7 rounded-lg bg-white px-5 py-6 shadow-[0_12px_28px_-8px_rgba(26,26,26,0.12)] sm:gap-10 sm:px-6 sm:py-8 lg:grid-cols-[565px_1fr] lg:items-center lg:gap-12 lg:px-8 lg:py-[52px]">
            <div>
                <p class="text-xs uppercase leading-5 text-brand sm:text-sm">Get connected</p>
                <h2
                    class="mt-3 text-[28px] font-semibold leading-9 sm:mt-4 sm:text-3xl sm:leading-tight lg:text-4xl lg:leading-[44px]">
                    Ready to connect your tourism business to TXA?</h2>
                <p class="mt-3 text-base leading-7 text-mid-gray sm:mt-4">It's so easy! Use the TXA Get Connected
                    Wizard. It captures your business details, website or social media URL, product description,
                    industry category and images, then lets you confirm whether you want to remain content only or make
                    your connection bookable.</p>
                <div
                    class="mt-4 rounded-lg bg-[#ffdad4]/80 p-3.5 text-sm font-semibold leading-5 text-brand sm:p-4 sm:text-base">
                    No booking, no fee. Pay only when you receive online bookings through TXA channels, subject to final
                    success fee of 0.75%-2.8% of total booking value.</div>
                <div class="mt-5 sm:mt-4">
                    <?php echo txa_supplier_button('Apply Now using TXA Get Connected Wizard', $wizard_url, 'primary', true); ?>
                </div>
            </div>
            <div class="h-[230px] overflow-hidden rounded-lg border border-line sm:h-[408px]">
                <img src="<?php echo esc_url(get_theme_file_uri('/images/supplier-2.jpg')); ?>"
                    alt="TXA supplier connection" class="h-full w-full object-cover">
            </div>
        </div>
    </section>

</article>

<?php get_footer();
