<?php
/**
 * Responsive TXA ecosystem network used below the homepage hero.
 *
 * @package TailPress
 */

$booking_systems = [
    ['file' => 'fareharbor.png', 'name' => 'FareHarbor'],
    ['file' => 'siteminder.png', 'name' => 'SiteMinder'],
    ['file' => 'newbook.png', 'name' => 'NewBook'],
    ['file' => 'rezobx.jpg', 'name' => 'Rezobx'],
    ['file' => 'rezdy.png', 'name' => 'Rezdy'],
    ['file' => 'rms.png', 'name' => 'RMS'],
];

$distribution_channels = [
    ['name' => 'Destination websites', 'icon' => 'bi-globe2', 'type' => 'destination'],
    ['name' => 'Booking.com', 'file' => 'booking.png', 'type' => 'distributor'],
    ['name' => 'Google Things to do', 'file' => 'google.png', 'type' => 'distributor'],
    ['name' => 'Tripadvisor', 'file' => 'tripadvisor.png', 'type' => 'distributor'],
    ['name' => 'Travel trade', 'icon' => 'bi-briefcase', 'type' => 'distributor'],
    ['name' => 'Tour operators', 'icon' => 'bi-signpost-split', 'type' => 'distributor'],
];
?>

<style>
    [data-txa-network] .txa-network-node:is([data-node="booking"], [data-node="destination"], [data-node="distributor"], [data-node="txa"], [data-node="traveller"]) {
        position: relative;
        transition: transform 250ms ease, box-shadow 250ms ease;
    }

    [data-txa-network] .txa-network-node:is([data-node="booking"], [data-node="destination"], [data-node="distributor"]):is(:hover, :focus-visible) {
        z-index: 10;
        transform: translateY(-6px);
        box-shadow: 0 16px 28px -14px rgba(20, 20, 20, 0.32);
    }

    [data-txa-network] .txa-network-node[data-node="txa"]:is(:hover, :focus-visible) {
        z-index: 30;
        transform: translateY(-6px) scale(1.05);
        box-shadow: 0 26px 58px -24px rgba(227, 41, 41, 0.65), 0 18px 34px -28px rgba(0, 0, 0, 0.55);
    }

    [data-txa-network] .txa-network-node[data-node="traveller"]:is(:hover, :focus-visible) {
        z-index: 10;
        transform: translateY(-6px);
        box-shadow: 0 22px 38px -18px rgba(212, 43, 43, 0.65);
    }

    @media (prefers-reduced-motion: reduce) {
        [data-txa-network] .txa-network-node {
            transition: none;
        }
    }
</style>

<section class="bg-surface px-4 py-10 sm:py-14 lg:px-16 lg:py-20">
    <div class="mx-auto max-w-[1312px]">
        <div class="mx-auto max-w-[760px] text-center">
            <p class="text-xs font-semibold uppercase tracking-wide text-brand sm:text-sm">A Connected Tourism Ecosystem
            </p>
            <h2
                class="mt-2 [font-family:'Hanken_Grotesk',sans-serif] text-[30px] font-semibold leading-tight text-near-black sm:text-4xl">
                One exchange connecting Australia's tourism ecosystem
            </h2>
            <p class="mt-4 text-base leading-7 text-mid-gray sm:text-lg">Tourism products flow from connected booking
                systems through TXA to destination websites, distributors, travel trade and travellers.</p>
        </div>

        <div class="mt-10 rounded-2xl border border-line bg-[#f8f8f8] p-4 shadow-[0_20px_50px_-38px_rgba(20,20,20,0.35)] sm:p-6 lg:p-8"
            data-txa-network>
            <div
                class="grid grid-cols-1 items-center gap-5 xl:grid-cols-[minmax(0,1.35fr)_64px_220px_64px_minmax(0,1.35fr)_64px_170px] xl:gap-4">
                <article class="txa-network-node rounded-2xl border border-line bg-white p-5 shadow-sm sm:p-6"
                    data-node="supplier" tabindex="0">
                    <div class="flex items-center gap-3 text-brand">
                        <span class="grid size-11 shrink-0 place-items-center rounded-full bg-brand/10 text-xl"
                            aria-hidden="true"><i class="bi bi-buildings"></i></span>
                        <div>
                            <h3 class="text-sm font-bold text-near-black">Tourism operators</h3>
                            <p class="mt-0.5 text-xs text-mid-gray">Products, rates and availability</p>
                        </div>
                    </div>

                    <div class="my-5 flex items-center gap-3" aria-hidden="true">
                        <span class="h-px flex-1 border-t border-dashed border-brand/40"></span>
                        <i class="bi bi-arrow-down text-brand"></i>
                        <span class="h-px flex-1 border-t border-dashed border-brand/40"></span>
                    </div>

                    <p class="mb-3 text-center text-[11px] font-bold uppercase tracking-wide text-mid-gray">Connected
                        booking systems</p>
                    <div class="grid grid-cols-2 gap-2 sm:grid-cols-3">
                        <?php foreach ($booking_systems as $logo): ?>
                            <div class="txa-network-node grid min-h-[76px] place-items-center rounded-xl border border-line bg-white p-3"
                                data-node="booking" tabindex="0">
                                <img src="<?php echo esc_url(get_theme_file_uri('/images/networks/' . $logo['file'])); ?>"
                                    alt="<?php echo esc_attr($logo['name']); ?>" class="max-h-10 max-w-full object-contain">
                            </div>
                        <?php endforeach; ?>
                    </div>
                </article>

                <div class="flex items-center justify-center" aria-hidden="true">
                    <svg class="h-14 w-7 xl:hidden" viewBox="0 0 28 56" fill="none">
                        <path d="M14 2V50M14 50L8 43M14 50L20 43" class="txa-network-path"
                            data-path="supplier booking" />
                    </svg>
                    <svg class="hidden h-7 w-16 xl:block" viewBox="0 0 64 28" fill="none">
                        <path d="M2 14H58M58 14L50 7M58 14L50 21" class="txa-network-path"
                            data-path="supplier booking" />
                    </svg>
                </div>

                <div class="txa-network-node rounded-2xl border-2 border-brand bg-white p-6 text-center shadow-[0_22px_48px_-24px_rgba(212,43,43,0.65)]"
                    data-node="txa" tabindex="0">
                    <img src="<?php echo esc_url(get_theme_file_uri('/images/logo.png')); ?>"
                        alt="Tourism Exchange Australia" class="mx-auto h-14 w-auto">
                    <p class="mt-4 text-[11px] font-extrabold uppercase tracking-[0.1em] text-brand">Tourism Exchange
                        Australia</p>
                </div>

                <div class="flex items-center justify-center" aria-hidden="true">
                    <svg class="h-14 w-7 xl:hidden" viewBox="0 0 28 56" fill="none">
                        <path d="M14 2V50M14 50L8 43M14 50L20 43" class="txa-network-path"
                            data-path="destination distributor" />
                    </svg>
                    <svg class="hidden h-7 w-16 xl:block" viewBox="0 0 64 28" fill="none">
                        <path d="M2 14H58M58 14L50 7M58 14L50 21" class="txa-network-path"
                            data-path="destination distributor" />
                    </svg>
                </div>

                <article class="rounded-2xl border border-line bg-white p-5 shadow-sm sm:p-6">
                    <p class="mb-3 text-center text-[11px] font-bold uppercase tracking-wide text-mid-gray">Distribution
                        platforms and channels</p>
                    <div class="grid grid-cols-2 gap-2 sm:grid-cols-3 xl:grid-cols-2">
                        <?php foreach ($distribution_channels as $channel): ?>
                            <div class="txa-network-node flex min-h-[86px] items-center justify-center rounded-xl border border-line bg-white p-3 text-center"
                                data-node="<?php echo esc_attr($channel['type']); ?>" tabindex="0">
                                <?php if (!empty($channel['file'])): ?>
                                    <img src="<?php echo esc_url(get_theme_file_uri('/images/networks/' . $channel['file'])); ?>"
                                        alt="<?php echo esc_attr($channel['name']); ?>"
                                        class="max-h-10 max-w-full object-contain">
                                <?php else: ?>
                                    <div><i class="bi <?php echo esc_attr($channel['icon']); ?> text-xl text-brand"
                                            aria-hidden="true"></i>
                                        <p class="mt-2 text-xs font-semibold leading-4 text-near-black">
                                            <?php echo esc_html($channel['name']); ?>
                                        </p>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </article>

                <div class="flex items-center justify-center" aria-hidden="true">
                    <svg class="h-14 w-7 xl:hidden" viewBox="0 0 28 56" fill="none">
                        <path d="M14 2V50M14 50L8 43M14 50L20 43" class="txa-network-path txa-network-path--green"
                            data-path="destination distributor traveller" />
                    </svg>
                    <svg class="hidden h-7 w-16 xl:block" viewBox="0 0 64 28" fill="none">
                        <path d="M2 14H58M58 14L50 7M58 14L50 21" class="txa-network-path txa-network-path--green"
                            data-path="destination distributor traveller" />
                    </svg>
                </div>

                <div class="txa-network-node rounded-2xl bg-brand px-5 py-7 text-center text-white shadow-[0_18px_34px_-20px_rgba(212,43,43,0.85)]"
                    data-node="traveller" tabindex="0">
                    <div class="flex items-end justify-center gap-1 text-2xl" aria-hidden="true"><i
                            class="bi bi-person-walking"></i><i class="bi bi-person-standing-dress text-3xl"></i><i
                            class="bi bi-person-arms-up"></i></div>
                    <h3 class="mt-3 text-base font-bold">Travellers</h3>
                    <p class="mt-1 text-xs text-white/75">Discover and book</p>
                </div>
            </div>

            <p class="mt-5 text-center text-[10px] font-bold uppercase tracking-[0.1em] text-mid-gray">Live products,
                rates and availability move through one connected exchange</p>
        </div>
    </div>
</section>