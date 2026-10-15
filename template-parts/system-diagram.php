<?php

/**
 * Reusable TXA system concept diagram.
 *
 * Supported highlights: supplier, dmo.
 *
 * @package TailPress
 */

$highlight = isset($args['highlight']) ? sanitize_key($args['highlight']) : 'supplier';
$supplier_highlighted = 'supplier' === $highlight;
$dmo_highlighted = 'dmo' === $highlight;
$distributor_highlighted = 'distributor' === $highlight;

$system_items = [
    ['icon' => 'bi-calendar2-check', 'label' => 'Booking Engine'],
    ['icon' => 'bi-bar-chart-line', 'label' => 'Performance Insights'],
    ['icon' => 'bi-database', 'label' => 'Customer booking data'],
    ['icon' => 'bi-broadcast-pin', 'label' => 'Content, Live Availability and Rates'],
];

$platform_items = [
    ['icon' => 'bi-window-stack', 'label' => 'Supplier\'s own website'],
    ['icon' => 'bi-share', 'label' => 'Social media channels'],
    ['icon' => 'bi-buildings', 'label' => 'Local Gov’t/DMO website', 'span' => true],
    ['icon' => 'bi-layout-text-window', 'label' => 'Destination Microsites'],
    ['icon' => 'bi-chat-dots', 'label' => 'Virtual Concierge'],
    ['icon' => 'bi-geo-alt', 'label' => 'Google'],
    ['icon' => 'bi-briefcase', 'label' => 'Travel trade'],
    [
        'icon' => 'bi-window',
        'label' => 'Various OTAs',
        'span' => true,
        'logos' => [
            ['file' => 'airbnb.png', 'name' => 'Airbnb'],
            ['file' => 'booking-com.png', 'name' => 'Booking.com'],
            ['file' => 'expedia.png', 'name' => 'Expedia'],
            ['file' => 'getyourguide.png', 'name' => 'GetYourGuide'],
        ],
    ],

];

$render_platform_row = function (array $item, bool $highlighted): void {
    $span = !empty($item['span']) ? 'col-span-2' : '';
?>
    <div class="flex h-full min-h-[112px] flex-col items-center justify-center rounded-xl border border-white/10 px-3 py-4 xl:min-h-24 <?php echo esc_attr($span); ?>">
        <i class="bi <?php echo esc_attr($item['icon']); ?> text-2xl <?php echo $highlighted ? 'text-brand' : 'text-white'; ?>"
            aria-hidden="true"></i>
        <p class="mt-2 text-sm font-semibold leading-5 <?php echo $highlighted ? 'text-brand' : 'text-white/90'; ?>">
            <?php echo esc_html($item['label']); ?>
        </p>
        <?php if (!empty($item['logos'])): ?>
            <div class="mt-3 flex flex-wrap items-center justify-center gap-2">
                <?php foreach ($item['logos'] as $logo):
                    $logo_path = '/images/' . $logo['file']; ?>
                    <span class="flex h-8 items-center rounded-md bg-white px-2">
                        <?php if (file_exists(get_theme_file_path($logo_path))): ?>
                            <img src="<?php echo esc_url(get_theme_file_uri($logo_path)); ?>"
                                alt="<?php echo esc_attr($logo['name']); ?>" class="h-5 w-auto">
                        <?php else: ?>
                            <span class="text-xs font-bold text-near-black"><?php echo esc_html($logo['name']); ?></span>
                        <?php endif; ?>
                    </span>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
<?php
};
?>

<div
    class="mt-7 overflow-hidden rounded-2xl bg-black px-5 py-8 text-white shadow-xl sm:mt-8 sm:px-8 sm:py-10 lg:px-10 lg:py-12">

    <div
        class="mx-auto grid max-w-[1160px] grid-cols-1 items-center gap-5 xl:grid-cols-[0.8fr_54px_1.08fr_54px_1.15fr_54px_0.8fr] xl:gap-3">
        <article
            class="flex min-h-[230px] flex-col items-center justify-center rounded-2xl border p-6 text-center transition <?php echo $supplier_highlighted ? 'border-brand bg-brand/10 shadow-[0_0_42px_-16px_rgba(212,43,43,0.95)]' : 'border-white/20 bg-white/[0.03]'; ?>">
            <span
                class="flex size-20 items-center justify-center rounded-2xl text-5xl <?php echo $supplier_highlighted ? 'bg-brand text-white' : 'bg-white/10 text-white'; ?>"
                aria-hidden="true"><i class="bi bi-shop-window"></i></span>
            <h4
                class="mt-5 [font-family:'Hanken_Grotesk',sans-serif] text-xl font-bold <?php echo $supplier_highlighted ? 'text-brand' : 'text-white'; ?>">
                Tourism Suppliers</h4>
            <p class="mt-3 text-sm leading-6 text-white/75">Businesses that sell travel online.</p>
        </article>

        <div class="flex items-center justify-center text-white/75" aria-hidden="true">
            <i class="bi bi-arrow-down-up text-2xl xl:hidden"></i><i
                class="bi bi-arrow-left-right hidden text-2xl xl:block"></i>
        </div>

        <div class="flex flex-col">
            <div class="mb-5 flex min-h-14 items-end justify-center sm:mb-6 sm:min-h-16">
                <img src="<?php echo esc_url(get_theme_file_uri('/images/logo.png')); ?>"
                    alt="Tourism Exchange Australia" class="h-11 w-auto brightness-0 invert sm:h-14">
            </div>
            <article
                class="flex grow flex-col rounded-2xl border border-white/50 bg-white/[0.03] p-5 text-center sm:p-6">
                <div class="flex flex-1 flex-col divide-y divide-white/15">
                    <?php foreach ($system_items as $item): ?>
                        <div class="flex min-h-[128px] flex-1 flex-col items-center justify-center py-5">
                            <i class="bi <?php echo esc_attr($item['icon']); ?> text-4xl text-white" aria-hidden="true"></i>
                            <p class="mt-3 text-sm font-semibold text-white/90"><?php echo esc_html($item['label']); ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </article>
        </div>

        <div class="hidden h-full flex-col items-center justify-around py-16 text-white/75 xl:flex" aria-hidden="true">
            <i class="bi bi-arrow-left-right text-2xl"></i><i class="bi bi-arrow-left-right text-2xl"></i><i
                class="bi bi-arrow-left-right text-2xl"></i>
        </div>
        <div class="flex items-center justify-center text-white/75 xl:hidden" aria-hidden="true"><i
                class="bi bi-arrow-down-up text-2xl"></i></div>

        <div class="flex flex-col">
            <div class="hidden xl:mb-6 xl:block xl:min-h-16" aria-hidden="true"></div>
            <article
                class="flex grow flex-col rounded-2xl border p-5 text-center transition sm:p-6 <?php echo $distributor_highlighted ? 'border-brand bg-brand/10 shadow-[0_0_42px_-16px_rgba(212,43,43,0.95)]' : 'border-white/50 bg-white/[0.03]'; ?>">
                <div class="grid flex-1 grid-cols-2 gap-3">
                    <?php foreach ($platform_items as $item): ?>
                        <?php $render_platform_row($item, $dmo_highlighted && !empty($item['dmo'])); ?>
                    <?php endforeach; ?>
                </div>
            </article>
        </div>

        <div class="flex items-center justify-center text-white/75" aria-hidden="true">
            <i class="bi bi-arrow-down-up text-2xl xl:hidden"></i><i
                class="bi bi-arrow-left-right hidden text-2xl xl:block"></i>
        </div>

        <article
            class="flex min-h-[230px] flex-col items-center justify-center rounded-2xl border border-white/20 bg-white/[0.03] p-6 text-center">
            <span class="flex size-20 items-center justify-center rounded-2xl bg-white/10 text-5xl text-white"
                aria-hidden="true"><i class="bi bi-person-check"></i></span>
            <h4 class="mt-5 [font-family:'Hanken_Grotesk',sans-serif] text-xl font-bold">Customer</h4>
            <p class="mt-3 text-sm leading-6 text-white/75">Travellers who purchase travel online.</p>
        </article>
    </div>
</div>