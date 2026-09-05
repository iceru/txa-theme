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
        <div class="relative mx-auto min-h-[520px] max-w-[1400px] overflow-hidden rounded-2xl bg-near-black lg:min-h-[600px]">
            <img src="https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?auto=format&fit=crop&w=2200&q=85" alt="Australian landscape" class="absolute inset-0 h-full w-full object-cover">
            <div class="absolute inset-0 bg-near-black/45" aria-hidden="true"></div>
            <div class="relative z-10 flex min-h-[520px] items-center px-6 py-16 sm:px-8 lg:min-h-[600px] lg:px-8 lg:py-24">
                <div class="max-w-[760px]">
                    <p class="inline-flex rounded-lg bg-brand px-6 py-3 text-sm font-bold uppercase text-white sm:text-xl">TXA for distributors</p>
                    <h1 class="mt-4 max-w-[760px] [font-family:'Hanken_Grotesk',sans-serif] text-4xl font-bold leading-tight tracking-[-0.02em] text-white sm:text-5xl lg:text-[48px] lg:leading-[60px]">Unique access to bookable Australian tourism inventory</h1>
                    <p class="mt-4 max-w-[660px] text-lg font-semibold leading-[29px] text-white/90">TXA gives distributors a pathway to Australian tourism suppliers across accommodation, tours, attractions, events and experiences. TXA offers distribution channels flexible commercial models, API or white label booking page options, and the ability to participate in destination-led campaigns and trade initiatives.</p>
                    <div class="mt-6"><?php echo txa_distributor_button('Become a Distributor', $apply_url); ?></div>
                </div>
            </div>
        </div>
    </section>

    <section class="px-4 py-14 lg:px-16 lg:py-16">
        <div class="mx-auto max-w-[1312px]">
            <div class="text-center">
                <h2 class="[font-family:'Hanken_Grotesk',sans-serif] text-3xl font-bold tracking-[-0.01em] text-[#151c27]">Why distribute through TXA?</h2>
                <p class="mt-3 text-base leading-6 text-mid-gray">Providing the connectivity required to scale your Australian tourism portfolio efficiently.</p>
            </div>
            <div class="mt-8 grid gap-6 sm:grid-cols-2 xl:grid-cols-4">
                <?php foreach ($benefits as $index => $benefit): ?>
                    <article class="min-h-[250px] rounded-xl border border-[#dfc0ba]/20 bg-white p-8 shadow-[0_4px_10px_rgba(0,0,0,0.05)]">
                        <span class="<?php echo 0 === $index % 2 ? 'bg-[#ffdad4]' : 'bg-[#e0e2e9]'; ?> flex size-12 items-center justify-center rounded-lg text-lg font-bold text-brand"><?php echo esc_html($benefit['icon']); ?></span>
                        <h3 class="mt-6 [font-family:'Hanken_Grotesk',sans-serif] text-xl font-semibold leading-7 text-[#151c27]"><?php echo esc_html($benefit['title']); ?></h3>
                        <p class="mt-3 text-base leading-6 text-mid-gray"><?php echo esc_html($benefit['copy']); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="px-4 py-10 lg:px-16 lg:py-8">
        <div class="mx-auto max-w-[1312px] rounded-3xl bg-white py-2">
            <div class="max-w-[672px]">
                <h2 class="[font-family:'Hanken_Grotesk',sans-serif] text-3xl font-bold tracking-[-0.01em] text-[#151c27]">Flexible distribution models</h2>
                <p class="mt-4 text-base leading-6 text-mid-gray">We provide multiple ways to consume inventory based on your technical maturity and business model.</p>
            </div>
            <div class="mt-8 grid gap-6 lg:grid-cols-2">
                <?php foreach ($models as $model): ?>
                    <article class="flex min-h-[254px] gap-6 rounded-2xl border border-[#dfc0ba]/10 bg-surface p-8 sm:gap-8">
                        <span class="flex size-16 shrink-0 items-center justify-center rounded-xl bg-white text-2xl font-bold text-brand shadow-sm"><?php echo esc_html($model['icon']); ?></span>
                        <div>
                            <h3 class="[font-family:'Hanken_Grotesk',sans-serif] text-xl font-semibold leading-7 text-[#151c27]"><?php echo esc_html($model['title']); ?></h3>
                            <p class="mt-2 text-base leading-6 text-mid-gray"><?php echo esc_html($model['copy']); ?></p>
                            <ul class="mt-4 space-y-2 text-sm text-[#151c27]">
                                <?php foreach ($model['points'] as $point): ?><li class="flex items-center gap-2"><span class="text-brand">⊙</span><?php echo esc_html($point); ?></li><?php endforeach; ?>
                            </ul>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="px-4 py-14 lg:px-16 lg:py-16">
        <div class="relative mx-auto min-h-[420px] max-w-[1312px] overflow-hidden rounded-2xl bg-near-black lg:min-h-[526px]">
            <img src="https://images.unsplash.com/photo-1514395462725-fb4566210144?auto=format&fit=crop&w=2200&q=85" alt="Australian city waterfront at night" class="absolute inset-0 h-full w-full object-cover">
            <div class="absolute inset-0 bg-black/50" aria-hidden="true"></div>
            <div class="relative z-10 flex min-h-[420px] items-center px-7 py-14 lg:min-h-[526px] lg:px-12">
                <div class="max-w-[687px]">
                    <h2 class="[font-family:'Hanken_Grotesk',sans-serif] text-3xl font-bold leading-10 tracking-[-0.01em] text-white">Drive regional impact with destination-led campaigns</h2>
                    <p class="mt-6 text-base leading-6 text-white/90">TXA sits at the heart of Australian tourism. We work closely with STOs and RTOs to power booking engines for state-wide initiatives. Become a partner in these high-value trade campaigns.</p>
                    <div class="mt-6"><?php echo txa_distributor_button('Become a TXA distributor', $apply_url, 'light'); ?></div>
                </div>
            </div>
        </div>
    </section>
</article>

<?php get_footer();
