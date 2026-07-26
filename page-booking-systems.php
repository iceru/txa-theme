<?php
/**
 * Template Name: Booking Systems
 *
 * @package TailPress
 */

add_filter('pre_get_document_title', function (): string {
    return 'TXA Booking Systems | Tourism Exchange Australia';
});

add_action('wp_head', function (): void {
    if (is_page_template('page-booking-systems.php')) {
        echo '<meta name="description" content="' . esc_attr('Connect your booking system to Australia\'s national B2B tourism exchange and help operator customers access broader destination, distributor and trade channels.') . '">' . "\n";
    }
});

get_header();

$partner_url = home_url('/booking-systems/partner-enquiry/');
$directory_url = home_url('/booking-systems/directory/');

$benefits = [
    [
        'title' => 'Broader Distribution',
        'copy' => 'Access hundreds of distributors from global OTAs to local visitor information centers.',
        'icon' => '<circle cx="12" cy="12" r="9"/><path d="M3 12h18"/><path d="M12 3a14 14 0 0 1 0 18"/><path d="M12 3a14 14 0 0 0 0 18"/>',
    ],
    [
        'title' => 'Reduced Friction',
        'copy' => 'Connect once to TXA and manage all distributor relationships through a unified API.',
        'icon' => '<path d="m13 2-8 13h7l-1 7 8-13h-7l1-7Z"/>',
    ],
    [
        'title' => 'Live Connectivity',
        'copy' => 'Real-time availability and pricing updates ensure accurate booking data across the network.',
        'icon' => '<path d="M17 3l4 4-4 4"/><path d="M21 7H7"/><path d="M7 21l-4-4 4-4"/><path d="M3 17h14"/>',
    ],
];

$systems = [
    ['name' => 'RezStream', 'status' => 'Full Integration', 'tone' => 'green', 'icon' => '<path d="M4 21V9h6v12"/><path d="M14 21V3h6v18"/><path d="M4 13h6"/><path d="M14 8h6"/><path d="M8 21v-4"/><path d="M17 21v-4"/>'],
    ['name' => 'FareHarbor', 'status' => 'Full Integration', 'tone' => 'green', 'icon' => '<path d="M4 18h16"/><path d="m6 18 3-11 3 11"/><path d="m12 18 3-11 3 11"/><path d="M8 12h8"/>'],
    ['name' => 'Booking Boss', 'status' => 'Full Integration', 'tone' => 'green', 'icon' => '<circle cx="12" cy="12" r="8"/><path d="m15 9-6 6"/><path d="M9 9h6v6"/>'],
    ['name' => 'Siteminder', 'status' => 'Limited Release', 'tone' => 'blue', 'icon' => '<path d="M4 21V9h6v12"/><path d="M14 21V5h6v16"/><path d="M7 13h.01"/><path d="M7 17h.01"/><path d="M17 9h.01"/><path d="M17 13h.01"/><path d="M17 17h.01"/>'],
];

if (!function_exists('txa_page_button')) {
    function txa_page_button(string $label, string $url, string $variant = 'primary'): string
    {
        $classes = 'inline-flex w-full items-center justify-center rounded px-5 py-3 text-sm font-semibold !no-underline transition sm:w-auto';

        if ('secondary' === $variant) {
            $classes .= ' border border-line bg-white text-brand hover:bg-brand-tint';
        } else {
            $classes .= ' bg-brand text-white hover:bg-brand-dark';
        }

        return sprintf('<a class="%s" href="%s">%s</a>', esc_attr($classes), esc_url($url), esc_html($label));
    }
}

if (!function_exists('txa_inline_icon')) {
    function txa_inline_icon(string $path, string $classes = 'size-7 text-brand'): string
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
            <div class="relative min-h-[560px] overflow-hidden rounded-lg bg-near-black lg:min-h-[640px]">
                <img src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=2200&q=80"
                    alt="Aerial view of an Australian beach"
                    class="absolute inset-0 h-full w-full object-cover">
                <div class="absolute inset-0 bg-near-black/42" aria-hidden="true"></div>
                <div class="relative z-10 grid min-h-[560px] gap-10 p-7 lg:min-h-[640px] lg:grid-cols-[1.1fr_.95fr] lg:items-center lg:p-9">
                    <div class="max-w-3xl">
                        <p class="inline-flex rounded bg-brand px-5 py-3 text-sm font-bold uppercase tracking-wide text-white">
                            TXA Booking Systems
                        </p>
                        <h1 class="mt-7 max-w-3xl text-4xl font-semibold leading-tight text-white md:text-6xl">
                            Connect your booking system to Australia's national tourism exchange
                        </h1>
                        <p class="mt-6 max-w-3xl text-base font-semibold leading-8 text-white/90 md:text-lg">
                            TXA helps booking-system vendors connect their operator customers to broader destination, distributor and trade channels through Australia's open B2B tourism exchange.
                        </p>
                        <div class="mt-8">
                            <?php echo txa_page_button('Booking System Partner Enquiry', $partner_url); ?>
                        </div>
                    </div>

                    <div class="rounded-lg bg-white/72 p-7 shadow-2xl shadow-near-black/25 backdrop-blur">
                        <div class="grid grid-cols-[1fr_auto_1fr] items-center gap-2 md:gap-5">
                            <div class="rounded-lg bg-white p-6 text-center shadow-lg">
                                <div class="mx-auto flex size-12 items-center justify-center text-brand">
                                    <?php echo txa_inline_icon('<path d="M6 4v16"/><path d="M10 4v16"/><path d="M14 4v16"/><path d="M18 4v16"/><path d="M4 8h4"/><path d="M8 14h4"/><path d="M12 10h4"/><path d="M16 16h4"/>', 'size-9'); ?>
                                </div>
                                <p class="mt-4 text-base font-bold leading-5">Booking<br>System</p>
                            </div>
                            <div class="relative flex items-center justify-center">
                                <span class="absolute -left-12 top-1/2 hidden -translate-y-1/2 rounded bg-white px-4 py-2 text-xs font-bold uppercase tracking-wide text-mid-gray shadow md:block">
                                    API Integration
                                </span>
                                <div class="flex size-36 items-center justify-center rounded-full bg-brand text-center text-white shadow-xl shadow-near-black/30 md:size-44">
                                    <div>
                                        <?php echo txa_inline_icon('<path d="M16 3h5v5"/><path d="M21 3l-7 7"/><path d="M8 21H3v-5"/><path d="M3 21l7-7"/><path d="M21 16v5h-5"/><path d="m21 21-7-7"/><path d="M3 8V3h5"/><path d="m3 3 7 7"/>', 'mx-auto size-9 text-white'); ?>
                                        <p class="mt-3 text-lg font-bold uppercase leading-5">TXA<br>Exchange</p>
                                    </div>
                                </div>
                                <span class="absolute -right-12 top-1/2 hidden -translate-y-1/2 rounded bg-white px-4 py-2 text-xs font-bold uppercase tracking-wide text-mid-gray shadow md:block">
                                    Distribution
                                </span>
                            </div>
                            <div class="rounded-lg bg-white p-6 text-center shadow-lg">
                                <div class="mx-auto flex size-12 items-center justify-center text-brand">
                                    <?php echo txa_inline_icon('<circle cx="12" cy="12" r="3"/><path d="M12 3v3"/><path d="M12 18v3"/><path d="M3 12h3"/><path d="M18 12h3"/><path d="m5.6 5.6 2.1 2.1"/><path d="m16.3 16.3 2.1 2.1"/><path d="m18.4 5.6-2.1 2.1"/><path d="m7.7 16.3-2.1 2.1"/>', 'size-9'); ?>
                                </div>
                                <p class="mt-4 text-base font-bold leading-5">Channels</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="px-4 py-12 lg:px-8 lg:py-16">
        <div class="container mx-auto">
            <div class="max-w-3xl">
                <h2 class="text-3xl font-semibold leading-tight md:text-4xl">
                    Connect your customers to Australia's national tourism exchange
                </h2>
                <p class="mt-6 text-base leading-7 text-mid-gray md:text-lg md:leading-8">
                    Integrating your Booking-system via TXA's easy to use APIs means your client's tourism businesses can offer live product content, rates, availability, and receive instant paid bookings, using On account/agent, direct-payment and on-request payment pathways with support for supplier participation across destination and myriad distributor channels.
                </p>
            </div>

            <div class="mt-10 grid gap-8 md:grid-cols-3">
                <?php foreach ($benefits as $benefit): ?>
                    <article class="grid grid-cols-[3.5rem_1fr] gap-5">
                        <div class="flex size-12 items-center justify-center rounded bg-surface text-brand">
                            <?php echo txa_inline_icon($benefit['icon'], 'size-6'); ?>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold"><?php echo esc_html($benefit['title']); ?></h3>
                            <p class="mt-3 text-base leading-7 text-mid-gray"><?php echo esc_html($benefit['copy']); ?></p>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="px-4 pb-12 lg:px-8 lg:pb-16">
        <div class="container mx-auto">
            <div class="mb-10 flex flex-col justify-between gap-5 md:flex-row md:items-center">
                <h2 class="text-3xl font-semibold leading-tight md:text-4xl">Connected booking systems</h2>
                <a href="<?php echo esc_url($directory_url); ?>"
                    class="inline-flex items-center text-xl font-bold text-brand !no-underline hover:text-brand-dark">
                    View Directory <span class="ml-2 text-3xl leading-none">&rarr;</span>
                </a>
            </div>

            <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-4">
                <?php foreach ($systems as $system): ?>
                    <article class="rounded-lg border border-brand/30 bg-white p-8 text-center shadow-sm">
                        <div class="mx-auto flex size-20 items-center justify-center rounded bg-surface text-brand shadow-sm">
                            <?php echo txa_inline_icon($system['icon'], 'size-9'); ?>
                        </div>
                        <h3 class="mt-8 text-xl font-bold"><?php echo esc_html($system['name']); ?></h3>
                        <span class="<?php echo 'green' === $system['tone'] ? 'bg-green-100 text-green-700' : 'bg-blue-100 text-blue-700'; ?> mt-5 inline-flex rounded-full px-4 py-1 text-xs font-bold uppercase">
                            <?php echo esc_html($system['status']); ?>
                        </span>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="px-4 pb-16 pt-4 lg:px-8 lg:pb-20">
        <div class="container mx-auto">
            <div class="relative overflow-hidden rounded-lg bg-near-black text-white">
                <img src="https://images.unsplash.com/photo-1523482580672-f109ba8cb9be?auto=format&fit=crop&w=1800&q=80"
                    alt="Sydney Harbour aerial view"
                    class="absolute inset-0 h-full w-full object-cover opacity-45">
                <div class="absolute inset-0 bg-near-black/35" aria-hidden="true"></div>
                <div class="relative z-10 max-w-3xl px-7 py-14 md:px-12 md:py-20">
                    <h2 class="text-3xl font-semibold leading-tight md:text-4xl">TXA Booking-system partners</h2>
                    <p class="mt-6 text-base leading-8 text-white/85 md:text-lg">
                        Fee to connect. Integration scope, documentation and commercial arrangements via partner enquiry.
                    </p>
                    <div class="mt-8">
                        <?php echo txa_page_button('Booking System Partner Enquiry', $partner_url, 'secondary'); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</article>

<?php
get_footer();
