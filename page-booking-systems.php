<?php
/**
 * Template Name: Booking Systems
 *
 * @package TailPress
 */

add_filter('pre_get_document_title', fn(): string => 'TXA Booking Systems | Tourism Exchange Australia');
add_action('wp_head', function (): void {
    if (is_page_template('page-booking-systems.php')) {
        echo '<meta name="description" content="' . esc_attr('Connect your booking system to Australia\'s national tourism exchange and help operator customers access broader destination, distributor and trade channels.') . '">' . "\n";
    }
});

get_header();

$partner_url = home_url('/booking-systems/partner-enquiry/');
$directory_url = home_url('/booking-systems');

$benefits = [
    ['icon' => 'bi-share', 'title' => 'Broader Distribution', 'copy' => 'Access hundreds of distributors from global OTAs to hyper-local niche and re-seller channels and visitor information center.'],
    ['icon' => 'bi-lightning-charge', 'title' => 'Reduced Friction', 'copy' => 'Connect once to TXA and manage all distributor relationships through a unified API.'],
    ['icon' => 'bi-arrow-left-right', 'title' => 'Live Connectivity', 'copy' => 'Real-time availability and pricing updates ensure accurate booking data across the network.'],
];

$systems = [
    ['name' => 'Bookeo', 'file' => 'bookeo.png'],
    ['name' => 'CustomLinc', 'file' => 'customlinc.webp'],
    ['name' => 'DigitalRez', 'file' => 'digitalrez.png'],
    ['name' => 'FareHarbor', 'file' => 'fareharbor.png'],
    ['name' => 'NewBook', 'file' => 'newbook.png'],
    ['name' => 'Rezdy', 'file' => 'rezdy.png'],
    ['name' => 'Rezobx', 'file' => 'rezobx.jpg'],
    ['name' => 'RMS', 'file' => 'rms.png'],
    ['name' => 'RoomMaster', 'file' => 'roommaster.png'],
    ['name' => 'Seekom', 'file' => 'seekom.png'],
    ['name' => 'SiteMinder', 'file' => 'siteminder.png'],
    ['name' => 'Little Hotelier', 'file' => 'little-hotelier.png'],
    ['name' => 'Update 247', 'file' => 'update247.png'],
];

if (!function_exists('txa_booking_button')) {
    function txa_booking_button(string $label, string $url, string $variant = 'primary'): string
    {
        $classes = 'inline-flex min-h-11 w-full items-center justify-center rounded-lg px-5 py-3 font-bold text-center !no-underline transition sm:w-auto';
        $classes .= 'light' === $variant
            ? ' bg-white text-brand hover:bg-surface'
            : ' bg-brand text-white hover:bg-brand-dark';
        return sprintf('<a class="%s" href="%s">%s</a>', esc_attr($classes), esc_url($url), esc_html($label));
    }
}
?>

<style>
    .txa-booking-system-card {
        position: relative;
        transition: transform 250ms ease, box-shadow 250ms ease, border-color 250ms ease;
    }

    .txa-booking-system-card img {
        transition: transform 250ms ease;
    }

    @media (hover: hover) {
        .txa-booking-system-card:hover {
            z-index: 1;
            transform: translateY(-6px);
            border-color: rgba(212, 43, 43, 0.4);
            box-shadow: 0 18px 34px -18px rgba(20, 20, 20, 0.35);
        }

        .txa-booking-system-card:hover img {
            transform: scale(1.05);
        }
    }

    @media (prefers-reduced-motion: reduce) {

        .txa-booking-system-card,
        .txa-booking-system-card img {
            transition: none;
        }

        .txa-booking-system-card:hover,
        .txa-booking-system-card:hover img {
            transform: none;
        }
    }
</style>

<article class="bg-white text-near-black [font-family:'Source_Sans_Pro',sans-serif]">
    <section class="px-4 pb-6 pt-3 sm:pt-5 lg:px-16 lg:pb-16 lg:pt-8">
        <div
            class="relative mx-auto min-h-[590px] max-w-[1312px] overflow-hidden rounded-xl bg-near-black sm:min-h-[560px] sm:rounded-2xl lg:min-h-[600px]">
            <img src="<?php echo esc_url(get_theme_file_uri('/images/booking-systems.jpg')); ?>"
                alt="Aerial view of an Australian beach" class="absolute inset-0 h-full w-full object-cover">
            <div class="absolute inset-0 bg-near-black/55 sm:bg-near-black/45" aria-hidden="true"></div>
            <div
                class="relative z-10 grid min-h-[590px] items-center gap-8 px-5 py-10 sm:min-h-[560px] sm:px-8 sm:py-16 lg:min-h-[600px] lg:grid-cols-[minmax(0,1fr)_minmax(360px,485px)] lg:gap-10 lg:px-8">
                <div class="w-full max-w-[760px]">
                    <p
                        class="inline-flex w-fit max-w-full rounded-lg bg-brand px-4 py-2 text-sm font-bold sm:px-5 sm:py-3 sm:text-base uppercase leading-5 text-white">
                        TXA CONNECTED BOOKING SYSTEMS</p>
                    <h1
                        class="mt-4 max-w-[760px] text-[34px] font-semibold leading-[1.08] text-white min-[390px]:text-4xl sm:text-5xl lg:leading-[56px]">
                        Connect your booking system to Australia’s national tourism exchange</h1>
                    <p
                        class="mt-4 max-w-[660px] text-base font-medium leading-6 text-white sm:text-lg sm:leading-[30px]">
                        TXA helps
                        booking-system vendors connect their operator customers to broader destination, distributor and
                        trade channels through Australia’s open B2B tourism exchange.</p>
                    <div class="mt-6"><?php echo txa_booking_button('Booking System Partner Enquiry', $partner_url); ?>
                    </div>
                </div>

                <div
                    class="overflow-hidden rounded-2xl border border-white/25 bg-white/10 px-5 py-7 text-center text-white shadow-[0_20px_45px_-18px_rgba(0,0,0,0.35)] backdrop-blur-xl sm:px-6 sm:py-8">
                    <h2 class="[font-family:'Hanken_Grotesk',sans-serif] text-xl font-semibold uppercase sm:text-2xl">
                        TXA PLATFORM</h2>
                    <p class="mt-1 text-xs font-semibold text-white/80">One connection. More distribution.</p>

                    <div
                        class="mx-auto mt-7 grid grid-cols-1 justify-center gap-4 sm:grid-cols-[minmax(0,1fr)_28px_minmax(0,1fr)_28px_minmax(0,1fr)] sm:gap-2 lg:mt-9">
                        <div class="flex w-full min-w-0 max-w-[120px] flex-col items-center">
                            <span
                                class="flex size-16 items-center justify-center rounded-2xl bg-brand text-3xl leading-none text-white shadow-lg shadow-brand/25 sm:size-[72px] sm:text-4xl">
                                <i class="bi bi-calendar2-check" aria-hidden="true"></i>
                            </span>
                            <p class="mt-3 text-xs font-semibold leading-4 text-white sm:text-sm sm:leading-5">Booking
                                System</p>
                        </div>

                        <svg class="h-7 w-11 shrink-0 rotate-90 mt-6 text-white/80 sm:w-7 sm:rotate-0"
                            viewBox="0 0 64 24" fill="none" aria-hidden="true">
                            <path d="M3 12h58M3 12l7-7M3 12l7 7M61 12l-7-7M61 12l-7 7" stroke="currentColor"
                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>

                        <div class="flex w-full min-w-0 max-w-[130px] flex-col items-center mb-4">
                            <span
                                class="flex h-16 w-full max-w-[104px] items-center justify-center rounded-2xl border border-white/30 bg-white/15 px-3 shadow-lg sm:h-[72px] sm:max-w-[116px]">
                                <img src="<?php echo esc_url(get_theme_file_uri('/images/logo.png')); ?>"
                                    alt="Tourism Exchange Australia" class="h-auto w-full brightness-0 invert">
                            </span>
                        </div>

                        <svg class="h-7 w-11 shrink-0 rotate-90 mt-6 text-white/80 sm:w-7 sm:rotate-0"
                            viewBox="0 0 64 24" fill="none" aria-hidden="true">
                            <path d="M3 12h58M3 12l7-7M3 12l7 7M61 12l-7-7M61 12l-7 7" stroke="currentColor"
                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>

                        <div class="flex w-full min-w-0 max-w-[120px] flex-col items-center">
                            <span
                                class="flex size-16 items-center justify-center rounded-2xl bg-brand text-3xl leading-none text-white shadow-lg shadow-brand/25 sm:size-[72px] sm:text-4xl">
                                <i class="bi bi-window-stack" aria-hidden="true"></i>
                            </span>
                            <p class="mt-3 text-xs font-semibold leading-4 text-white sm:text-sm sm:leading-5">
                                Distribution Channels</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="px-4 py-10 sm:py-12 lg:px-16 lg:py-16">
        <div class="mx-auto max-w-[1312px]">
            <div class="max-w-[725px]">
                <h2
                    class="[font-family:'Hanken_Grotesk',sans-serif] text-2xl font-bold leading-8 tracking-[-0.01em] text-[#151c27] sm:text-3xl sm:leading-10">
                    Connect your customers to Australia’s national tourism exchange</h2>
                <p class="mt-4 text-sm leading-6 text-mid-gray sm:text-base">Integrating your Booking system via TXA’s
                    easy to use APIs means your client’s tourism businesses can offer live product content, rates,
                    availability, and receive instant paid bookings, using On account/agent, direct-payment and
                    ‘on-request’ payment pathways with support for supplier participation across destination and myriad
                    distributor channels.</p>
            </div>
            <div class="mt-8 grid gap-5 md:grid-cols-3 md:gap-8">
                <?php foreach ($benefits as $benefit): ?>
                    <article
                        class="flex gap-4 rounded-xl border border-line bg-white p-5 shadow-sm sm:gap-5 md:border-0 md:p-0 md:shadow-none">
                        <span
                            class="flex size-11 shrink-0 items-center justify-center rounded-lg bg-brand-tint text-lg font-bold text-brand sm:size-12 sm:text-xl"><i
                                class="bi <?php echo esc_attr($benefit['icon']); ?>" aria-hidden="true"></i></span>
                        <div>
                            <h3 class="text-base font-semibold leading-6 text-[#151c27]">
                                <?php echo esc_html($benefit['title']); ?>
                            </h3>
                            <p class="mt-2 text-sm leading-5 text-mid-gray"><?php echo esc_html($benefit['copy']); ?></p>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="px-4 py-8 sm:py-10 lg:px-16 lg:py-12">
        <div class="mx-auto max-w-[1312px]">
            <div class="flex flex-col gap-3 sm:flex-row sm:items-end sm:justify-between">
                <h2
                    class="[font-family:'Hanken_Grotesk',sans-serif] text-2xl font-bold tracking-[-0.01em] text-[#151c27] sm:text-3xl">
                    Connected booking systems</h2>
            </div>
            <div class="mt-7 grid grid-cols-2 gap-3 sm:mt-10 sm:gap-6 lg:grid-cols-3 xl:grid-cols-4">
                <?php foreach ($systems as $system): ?>
                    <article
                        class="txa-booking-system-card flex h-full min-h-[180px] flex-col items-center justify-center rounded-xl border border-[#dfc0ba] bg-white p-4 text-center sm:min-h-[220px] sm:p-8">
                        <span
                            class="mx-auto flex h-16 w-full max-w-[160px] items-center justify-center rounded-lg bg-white px-4 text-xl font-bold text-brand sm:h-20 sm:max-w-[190px] sm:text-2xl">
                            <img src="<?php echo esc_url(get_theme_file_uri('/images/networks/' . $system['file'])); ?>"
                                alt="<?php echo esc_attr($system['name']); ?> logo"
                                class="max-h-12 max-w-full object-contain sm:max-h-14" loading="lazy">
                        </span>
                        <h3 class="mt-4 text-sm font-semibold text-[#151c27] sm:mt-6 sm:text-base">
                            <?php echo esc_html($system['name']); ?>
                        </h3>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="px-4 py-10 sm:py-12 lg:px-16 lg:py-16">
        <div
            class="relative mx-auto min-h-[270px] max-w-[1312px] overflow-hidden rounded-2xl bg-near-black sm:min-h-[296px]">
            <img src="https://images.unsplash.com/photo-1523482580672-f109ba8cb9be?auto=format&fit=crop&w=2200&q=85"
                alt="Sydney Harbour" class="absolute inset-0 h-full w-full object-cover">
            <div class="absolute inset-0 bg-black/65" aria-hidden="true"></div>
            <div
                class="relative z-10 flex min-h-[270px] items-center px-5 py-10 sm:min-h-[296px] sm:px-7 sm:py-12 lg:px-12 lg:py-16">
                <div class="max-w-[687px]">
                    <h2
                        class="[font-family:'Hanken_Grotesk',sans-serif] text-2xl font-bold leading-8 tracking-[-0.01em] text-white sm:text-3xl sm:leading-10">
                        TXA Booking-system partners</h2>
                    <p class="mt-4 text-sm leading-6 text-white/90 sm:mt-5 sm:text-base">Free to connect. Integration
                        scope, documentation and commercial arrangements via partner enquiry.</p>
                    <div class="mt-6"><?php echo txa_booking_button('Free to connect', $partner_url, 'light'); ?></div>
                </div>
            </div>
        </div>
    </section>
</article>

<?php get_footer();
