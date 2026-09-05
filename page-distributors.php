<?php
/**
 * Template Name: Distributors Page
 *
 * @package TailPress
 */

add_filter('pre_get_document_title', fn (): string => 'TXA for Distributors | Access Bookable Australian Tourism Inventory');
add_action('wp_head', function (): void {
    if (is_page_template('page-distributors.php')) {
        echo '<meta name="description" content="' . esc_attr('TXA gives distributors unique access to bookable Australian tourism inventory through flexible commercial and technical distribution models.') . '">' . "\n";
    }
});

get_header();

$apply_url = home_url('/distributors/apply/');

$benefits = [
    ['icon' => '▦', 'title' => 'Access live inventory', 'copy' => 'Direct access to thousands of live-booked suppliers with real-time rates and availability.'],
    ['icon' => '▤', 'title' => 'Commercial flexibility', 'copy' => 'Support for multiple payment and commercial models including Net, Gross, and Commission.'],
    ['icon' => '⌁', 'title' => 'Campaign ready', 'copy' => 'Leverage national and state tourism campaigns by distributing opt-in campaign deals.'],
    ['icon' => '◇', 'title' => 'Reduced friction', 'copy' => 'Connect once to TXA and gain access to an entire ecosystem without individual integrations.'],
];

$models = [
    ['icon' => '✥', 'title' => 'API Connection', 'copy' => 'Direct JSON-based API for enterprise distributors who want total control over the booking UI and user experience.', 'points' => ['Real-time confirmation', 'Dynamic pricing support']],
    ['icon' => '▭', 'title' => 'White-label Booking Pages', 'copy' => 'Branded booking widgets and search pages that integrate seamlessly into your website with minimal code.', 'points' => ['Rapid deployment', 'Mobile optimized']],
    ['icon' => '⌂', 'title' => 'On-account / Agent Model', 'copy' => 'Support for traditional agency models where distributors hold accounts and manage payments offline.', 'points' => ['Flexible settlement', 'Back-office reconciliation']],
    ['icon' => '◉', 'title' => 'Campaign & Destination Led', 'copy' => 'Targeted distribution focused on specific regions or events as part of institutional marketing efforts.', 'points' => ['High-intent traffic', 'Curated inventory lists']],
];

if (!function_exists('txa_distributor_button')) {
    function txa_distributor_button(string $label, string $url, string $variant = 'primary'): string
    {
        $classes = 'inline-flex min-h-12 w-full items-center justify-center rounded-lg px-5 py-3 text-sm font-bold !no-underline transition sm:w-auto sm:px-6';
        $classes .= 'light' === $variant
            ? ' bg-white text-brand hover:bg-surface'
            : ' bg-brand text-white hover:bg-brand-dark';
        return sprintf('<a class="%s" href="%s">%s</a>', esc_attr($classes), esc_url($url), esc_html($label));
    }
}
?>

<article class="bg-white text-near-black [font-family:'Source_Sans_Pro',sans-serif]">
    <section class="px-3 pb-7 pt-4 sm:px-4 sm:pt-6 lg:px-5 lg:pt-8">
        <div class="relative mx-auto min-h-[500px] max-w-[1400px] overflow-hidden rounded-xl bg-near-black sm:min-h-[520px] sm:rounded-2xl lg:min-h-[600px]">
            <img src="https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?auto=format&fit=crop&w=2200&q=85" alt="Australian landscape" class="absolute inset-0 h-full w-full object-cover">
            <div class="absolute inset-0 bg-near-black/55 sm:bg-near-black/45" aria-hidden="true"></div>
            <div class="relative z-10 flex min-h-[500px] items-center px-5 py-10 sm:min-h-[520px] sm:px-8 sm:py-16 lg:min-h-[600px] lg:px-8 lg:py-24">
                <div class="max-w-[760px]">
                    <p class="inline-flex rounded-lg bg-brand px-3 py-2 text-xs font-bold uppercase leading-5 text-white sm:px-6 sm:py-3 sm:text-xl">TXA for distributors</p>
                    <h1 class="mt-4 max-w-[760px] [font-family:'Hanken_Grotesk',sans-serif] text-[34px] font-bold leading-[1.08] tracking-[-0.02em] text-white sm:text-5xl lg:text-[48px] lg:leading-[60px]">Unique access to bookable Australian tourism inventory</h1>
                    <p class="mt-4 max-w-[660px] text-base font-semibold leading-6 text-white/90 sm:text-lg sm:leading-[29px]">TXA gives distributors a pathway to Australian tourism suppliers across accommodation, tours, attractions, events and experiences. TXA offers distribution channels flexible commercial models, API or white label booking page options, and the ability to participate in destination-led campaigns and trade initiatives.</p>
                    <div class="mt-6"><?php echo txa_distributor_button('Become a Distributor', $apply_url); ?></div>
                </div>
            </div>
        </div>
    </section>

    <section class="px-4 py-10 sm:py-12 lg:px-16 lg:py-16">
        <div class="mx-auto max-w-[1312px]">
            <div class="text-left sm:text-center">
                <h2 class="[font-family:'Hanken_Grotesk',sans-serif] text-[28px] font-bold leading-9 tracking-[-0.01em] text-[#151c27] sm:text-3xl">Why distribute through TXA?</h2>
                <p class="mt-3 text-[15px] leading-6 text-mid-gray sm:text-base">Providing the connectivity required to scale your Australian tourism portfolio efficiently.</p>
            </div>
            <div class="mt-7 grid gap-4 sm:mt-8 sm:grid-cols-2 sm:gap-6 xl:grid-cols-4">
                <?php foreach ($benefits as $index => $benefit): ?>
                    <article class="rounded-xl border border-[#dfc0ba]/20 bg-white p-5 shadow-[0_4px_10px_rgba(0,0,0,0.05)] sm:min-h-[250px] sm:p-8">
                        <span class="<?php echo 0 === $index % 2 ? 'bg-[#ffdad4]' : 'bg-[#e0e2e9]'; ?> flex size-11 items-center justify-center rounded-lg text-lg font-bold text-brand sm:size-12"><?php echo esc_html($benefit['icon']); ?></span>
                        <h3 class="mt-4 [font-family:'Hanken_Grotesk',sans-serif] text-lg font-semibold leading-6 text-[#151c27] sm:mt-6 sm:text-xl sm:leading-7"><?php echo esc_html($benefit['title']); ?></h3>
                        <p class="mt-2 text-[15px] leading-6 text-mid-gray sm:mt-3 sm:text-base"><?php echo esc_html($benefit['copy']); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="px-4 py-8 sm:py-10 lg:px-16 lg:py-8">
        <div class="mx-auto max-w-[1312px] rounded-3xl bg-white py-2">
            <div class="max-w-[672px]">
                <h2 class="[font-family:'Hanken_Grotesk',sans-serif] text-[28px] font-bold leading-9 tracking-[-0.01em] text-[#151c27] sm:text-3xl">Flexible distribution models</h2>
                <p class="mt-3 text-[15px] leading-6 text-mid-gray sm:mt-4 sm:text-base">We provide multiple ways to consume inventory based on your technical maturity and business model.</p>
            </div>
            <div class="mt-7 grid gap-4 sm:mt-8 sm:gap-6 lg:grid-cols-2">
                <?php foreach ($models as $model): ?>
                    <article class="flex flex-col gap-4 rounded-2xl border border-[#dfc0ba]/10 bg-surface p-5 sm:min-h-[254px] sm:flex-row sm:gap-8 sm:p-8">
                        <span class="flex size-12 shrink-0 items-center justify-center rounded-xl bg-white text-xl font-bold text-brand shadow-sm sm:size-16 sm:text-2xl"><?php echo esc_html($model['icon']); ?></span>
                        <div>
                            <h3 class="[font-family:'Hanken_Grotesk',sans-serif] text-lg font-semibold leading-6 text-[#151c27] sm:text-xl sm:leading-7"><?php echo esc_html($model['title']); ?></h3>
                            <p class="mt-2 text-[15px] leading-6 text-mid-gray sm:text-base"><?php echo esc_html($model['copy']); ?></p>
                            <ul class="mt-4 space-y-2 text-sm text-[#151c27]">
                                <?php foreach ($model['points'] as $point): ?><li class="flex items-center gap-2"><span class="text-brand">⊙</span><?php echo esc_html($point); ?></li><?php endforeach; ?>
                            </ul>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="px-3 py-10 sm:px-4 sm:py-14 lg:px-16 lg:py-16">
        <div class="relative mx-auto min-h-[390px] max-w-[1312px] overflow-hidden rounded-xl bg-near-black sm:min-h-[420px] sm:rounded-2xl lg:min-h-[526px]">
            <img src="https://images.unsplash.com/photo-1514395462725-fb4566210144?auto=format&fit=crop&w=2200&q=85" alt="Australian city waterfront at night" class="absolute inset-0 h-full w-full object-cover">
            <div class="absolute inset-0 bg-black/60 sm:bg-black/50" aria-hidden="true"></div>
            <div class="relative z-10 flex min-h-[390px] items-center px-5 py-10 sm:min-h-[420px] sm:px-7 sm:py-14 lg:min-h-[526px] lg:px-12">
                <div class="max-w-[687px]">
                    <h2 class="[font-family:'Hanken_Grotesk',sans-serif] text-[28px] font-bold leading-9 tracking-[-0.01em] text-white sm:text-3xl sm:leading-10">Drive regional impact with destination-led campaigns</h2>
                    <p class="mt-4 text-[15px] leading-6 text-white/90 sm:mt-6 sm:text-base">TXA sits at the heart of Australian tourism. We work closely with STOs and RTOs to power booking engines for state-wide initiatives. Become a partner in these high-value trade campaigns.</p>
                    <div class="mt-6"><?php echo txa_distributor_button('Become a TXA distributor', $apply_url, 'light'); ?></div>
                </div>
            </div>
        </div>
    </section>
</article>

<?php get_footer();
