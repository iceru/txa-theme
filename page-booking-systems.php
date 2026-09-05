<?php
/**
 * Template Name: Booking Systems
 *
 * @package TailPress
 */

add_filter('pre_get_document_title', fn (): string => 'TXA Booking Systems | Tourism Exchange Australia');
add_action('wp_head', function (): void {
    if (is_page_template('page-booking-systems.php')) {
        echo '<meta name="description" content="' . esc_attr('Connect your booking system to Australia\'s national tourism exchange and help operator customers access broader destination, distributor and trade channels.') . '">' . "\n";
    }
});

get_header();

$partner_url = home_url('/booking-systems/partner-enquiry/');
$directory_url = home_url('/booking-systems/directory/');

$benefits = [
    ['icon' => '◎', 'title' => 'Broader Distribution', 'copy' => 'Access hundreds of distributors from global OTAs to hyper-local niche and re-seller channels and visitor information center.'],
    ['icon' => 'ϟ', 'title' => 'Reduced Friction', 'copy' => 'Connect once to TXA and manage all distributor relationships through a unified API.'],
    ['icon' => '↔', 'title' => 'Live Connectivity', 'copy' => 'Real-time availability and pricing updates ensure accurate booking data across the network.'],
];

$systems = [
    ['name' => 'RezStream', 'status' => 'Full Integration', 'tone' => 'green', 'icon' => '▦'],
    ['name' => 'FareHarbor', 'status' => 'Full Integration', 'tone' => 'green', 'icon' => '△'],
    ['name' => 'Booking Boss', 'status' => 'Full Integration', 'tone' => 'green', 'icon' => '◉'],
    ['name' => 'Siteminder', 'status' => 'Limited Release', 'tone' => 'blue', 'icon' => '▦'],
];

if (!function_exists('txa_booking_button')) {
    function txa_booking_button(string $label, string $url, string $variant = 'primary'): string
    {
        $classes = 'inline-flex w-full items-center justify-center rounded-lg px-6 py-3 text-sm font-bold !no-underline transition sm:w-auto';
        $classes .= 'light' === $variant
            ? ' bg-white text-brand hover:bg-surface'
            : ' bg-brand text-white hover:bg-brand-dark';
        return sprintf('<a class="%s" href="%s">%s</a>', esc_attr($classes), esc_url($url), esc_html($label));
    }
}
?>

<article class="bg-white text-near-black [font-family:'Source_Sans_Pro',sans-serif]">
    <section class="px-4 pt-8 lg:px-5">
        <div class="relative mx-auto min-h-[560px] max-w-[1400px] overflow-hidden rounded-2xl bg-near-black lg:min-h-[600px]">
            <img src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=2200&q=85" alt="Aerial view of an Australian beach" class="absolute inset-0 h-full w-full object-cover">
            <div class="absolute inset-0 bg-near-black/45" aria-hidden="true"></div>
            <div class="relative z-10 grid min-h-[560px] gap-10 px-6 py-14 lg:min-h-[600px] lg:grid-cols-[720px_1fr] lg:items-center lg:px-8 lg:py-24">
                <div>
                    <p class="inline-flex rounded-lg bg-brand px-6 py-3 text-sm font-bold uppercase text-white sm:text-xl">TXA Booking Systems</p>
                    <h1 class="mt-4 [font-family:'Hanken_Grotesk',sans-serif] text-4xl font-semibold leading-tight text-white sm:text-5xl lg:text-[48px] lg:leading-[56px]">Connect your booking system to Australia’s national tourism exchange</h1>
                    <p class="mt-4 text-lg font-semibold leading-[30px] text-white">TXA helps booking-system vendors connect their operator customers to broader destination, distributor and trade channels through Australia’s open B2B tourism exchange.</p>
                    <div class="mt-6"><?php echo txa_booking_button('Booking System Partner Enquiry', $partner_url); ?></div>
                </div>

                <div class="rounded-2xl bg-white/50 px-5 py-10 shadow-[0_20px_25px_-5px_rgba(0,0,0,0.1)] backdrop-blur-md sm:px-8 sm:py-12">
                    <div class="flex flex-col items-center justify-between gap-5 sm:flex-row">
                        <div class="flex size-28 shrink-0 flex-col items-center justify-center rounded-xl border border-[#dfc0ba] bg-white p-4 text-center shadow-sm lg:size-32">
                            <span class="text-3xl text-brand">▥</span>
                            <span class="mt-2 text-sm font-semibold leading-5 text-[#151c27]">Booking<br>System</span>
                        </div>
                        <div class="relative flex items-center">
                            <span class="absolute -left-8 top-1/2 hidden -translate-x-full -translate-y-1/2 rounded border border-[#dfc0ba] bg-white px-2 py-1 text-[10px] font-semibold uppercase tracking-[1px] text-[#5b5f64] xl:block">API Integration</span>
                            <div class="flex size-36 flex-col items-center justify-center rounded-full border-4 border-[#ac2d2d] bg-brand text-center text-white shadow-lg lg:size-40">
                                <span class="text-3xl">↔</span>
                                <span class="mt-1 text-base font-semibold uppercase leading-6">TXA<br>Exchange</span>
                            </div>
                            <span class="absolute -right-8 top-1/2 hidden translate-x-full -translate-y-1/2 rounded border border-[#dfc0ba] bg-white px-2 py-1 text-[10px] font-semibold uppercase tracking-[1px] text-[#5b5f64] xl:block">Distribution</span>
                        </div>
                        <div class="flex size-28 shrink-0 flex-col items-center justify-center rounded-xl border border-[#dfc0ba] bg-white p-4 text-center shadow-sm lg:size-32">
                            <span class="text-3xl text-brand">⌘</span>
                            <span class="mt-2 text-sm font-semibold text-[#151c27]">Channels</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="px-4 py-14 lg:px-16 lg:py-16">
        <div class="mx-auto max-w-[1312px]">
            <div class="max-w-[725px]">
                <h2 class="[font-family:'Hanken_Grotesk',sans-serif] text-3xl font-bold leading-10 tracking-[-0.01em] text-[#151c27]">Connect your customers to Australia’s national tourism exchange</h2>
                <p class="mt-4 text-base leading-6 text-mid-gray">Integrating your Booking system via TXA’s easy to use APIs means your client’s tourism businesses can offer live product content, rates, availability, and receive instant paid bookings, using On account/agent, direct-payment and ‘on-request’ payment pathways with support for supplier participation across destination and myriad distributor channels.</p>
            </div>
            <div class="mt-8 grid gap-8 md:grid-cols-3">
                <?php foreach ($benefits as $benefit): ?>
                    <article class="flex gap-6">
                        <span class="flex size-12 shrink-0 items-center justify-center rounded-lg bg-[#e8e8e6] text-xl font-bold text-brand"><?php echo esc_html($benefit['icon']); ?></span>
                        <div>
                            <h3 class="text-base font-semibold leading-6 text-[#151c27]"><?php echo esc_html($benefit['title']); ?></h3>
                            <p class="mt-2 text-sm leading-5 text-mid-gray"><?php echo esc_html($benefit['copy']); ?></p>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="px-4 py-8 lg:px-16 lg:py-12">
        <div class="mx-auto max-w-[1312px]">
            <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
                <h2 class="[font-family:'Hanken_Grotesk',sans-serif] text-3xl font-bold tracking-[-0.01em] text-[#151c27]">Connected booking systems</h2>
                <a href="<?php echo esc_url($directory_url); ?>" class="inline-flex items-center gap-2 text-base font-semibold text-brand !no-underline hover:text-brand-dark">View Directory <span aria-hidden="true">→</span></a>
            </div>
            <div class="mt-10 grid gap-6 sm:grid-cols-2 xl:grid-cols-4">
                <?php foreach ($systems as $system): ?>
                    <article class="rounded-xl border border-[#dfc0ba] bg-white p-8 text-center">
                        <span class="mx-auto flex size-20 items-center justify-center rounded-lg bg-[#e8e8e6] text-2xl font-bold text-brand"><?php echo esc_html($system['icon']); ?></span>
                        <h3 class="mt-6 text-base font-semibold text-[#151c27]"><?php echo esc_html($system['name']); ?></h3>
                        <span class="<?php echo 'green' === $system['tone'] ? 'bg-green-100 text-green-800' : 'bg-blue-100 text-blue-800'; ?> mt-4 inline-flex rounded-full px-3 py-1 text-[10px] font-semibold uppercase"><?php echo esc_html($system['status']); ?></span>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="px-4 py-14 lg:px-16 lg:py-16">
        <div class="relative mx-auto min-h-[296px] max-w-[1312px] overflow-hidden rounded-2xl bg-near-black">
            <img src="https://images.unsplash.com/photo-1523482580672-f109ba8cb9be?auto=format&fit=crop&w=2200&q=85" alt="Sydney Harbour" class="absolute inset-0 h-full w-full object-cover">
            <div class="absolute inset-0 bg-black/60" aria-hidden="true"></div>
            <div class="relative z-10 flex min-h-[296px] items-center px-7 py-12 lg:px-12 lg:py-16">
                <div class="max-w-[687px]">
                    <h2 class="[font-family:'Hanken_Grotesk',sans-serif] text-3xl font-bold leading-10 tracking-[-0.01em] text-white">TXA Booking-system partners</h2>
                    <p class="mt-5 text-base leading-6 text-white/90">Fee to connect. Integration scope, documentation and commercial arrangements via partner enquiry.</p>
                    <div class="mt-6"><?php echo txa_booking_button('Free to connect', $partner_url, 'light'); ?></div>
                </div>
            </div>
        </div>
    </section>
</article>

<?php get_footer();
