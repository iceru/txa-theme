<?php
/**
 * Interactive TXA ecosystem network used below the homepage hero.
 *
 * @package TailPress
 */
?>
<section class="bg-surface px-4 py-10 sm:py-14 lg:px-16 lg:py-20">
    <div class="mx-auto max-w-[1312px]">
        <div class="mx-auto max-w-[760px] text-center">
            <p class="text-xs font-semibold uppercase tracking-wide text-brand sm:text-sm">How TXA Works</p>
            <h2
                class="mt-2 [font-family:'Hanken_Grotesk',sans-serif] text-[30px] font-semibold leading-tight text-near-black sm:text-4xl">
                One exchange connecting Australia's tourism ecosystem</h2>
            <p class="mt-4 text-base leading-7 text-mid-gray sm:text-lg">Tourism products flow from suppliers and
                booking systems through TXA to destination websites, distributors, travel trade and travellers.</p>
        </div>

        <div class="mt-10 lg:hidden" data-txa-network>
            <div class="mx-auto flex max-w-md flex-col items-center gap-3">
                <div class="txa-network-node w-full rounded-xl border border-line bg-white p-5 text-center shadow-sm"
                    data-node="supplier">
                    <p class="text-xs font-semibold uppercase text-brand">Tourism supply</p>
                    <h3 class="mt-1 text-lg font-semibold">Suppliers</h3>
                    <p class="mt-1 text-sm text-mid-gray">Accommodation, tours, attractions & experiences</p>
                </div>
                <span class="text-2xl text-brand">↓</span>
                <div class="txa-network-node w-full rounded-xl border border-line bg-white p-5 text-center shadow-sm"
                    data-node="booking">
                    <p class="text-xs font-semibold uppercase text-brand">Connected technology</p>
                    <h3 class="mt-1 text-lg font-semibold">Booking Systems</h3>
                    <p class="mt-1 text-sm text-mid-gray">Live products, rates & availability</p>
                </div>
                <span class="text-2xl text-brand">↓</span>
                <div class="txa-network-node w-full rounded-2xl border-2 border-brand bg-white p-6 text-center shadow-lg"
                    data-node="txa"><img src="<?php echo esc_url(get_theme_file_uri('/images/logo.png')); ?>" alt="TXA"
                        class="mx-auto h-12 w-auto">
                    <p class="mt-3 text-sm font-semibold text-brand">Tourism Exchange Australia</p>
                </div>
                <span class="text-2xl text-brand">↓</span>
                <div class="grid w-full grid-cols-1 gap-3 min-[390px]:grid-cols-3">
                    <div class="rounded-xl border border-line bg-white p-4 text-center text-sm font-semibold">
                        Destination Websites</div>
                    <div class="rounded-xl border border-line bg-white p-4 text-center text-sm font-semibold">
                        Distributors & OTAs</div>
                    <div class="rounded-xl border border-line bg-white p-4 text-center text-sm font-semibold">Travel
                        Trade</div>
                </div>
                <span class="text-2xl text-brand">↓</span>
                <div class="w-full rounded-xl bg-brand p-5 text-center font-semibold text-white shadow-lg">Travellers
                </div>
            </div>
        </div>

        <div class="relative mt-12 hidden h-[620px] overflow-hidden rounded-2xl border border-line bg-white shadow-sm lg:block"
            data-txa-network>
            <svg class="pointer-events-none absolute inset-0 z-0 h-full w-full" viewBox="0 0 1312 620" fill="none"
                aria-hidden="true">
                <defs>
                    <marker id="txa-flow-arrow" markerWidth="10" markerHeight="10" refX="8" refY="5" orient="auto">
                        <path d="M0 0L10 5L0 10Z" fill="currentColor" />
                    </marker>
                </defs>
                <path d="M205 135 C275 135 295 190 360 225" class="txa-network-path" data-path="supplier"
                    marker-end="url(#txa-flow-arrow)" />
                <path d="M205 300 C275 300 300 275 360 265" class="txa-network-path" data-path="supplier"
                    marker-end="url(#txa-flow-arrow)" />
                <path d="M205 465 C275 465 300 345 360 305" class="txa-network-path" data-path="supplier"
                    marker-end="url(#txa-flow-arrow)" />
                <path d="M515 270 C555 270 570 310 610 310" class="txa-network-path" data-path="booking"
                    marker-end="url(#txa-flow-arrow)" />
                <path d="M775 310 C840 300 850 135 940 125" class="txa-network-path" data-path="channel"
                    marker-end="url(#txa-flow-arrow)" />
                <path d="M775 310 C845 310 865 280 940 280" class="txa-network-path" data-path="channel"
                    marker-end="url(#txa-flow-arrow)" />
                <path d="M775 310 C840 320 850 435 940 435" class="txa-network-path" data-path="channel"
                    marker-end="url(#txa-flow-arrow)" />
                <path d="M1100 125 C1150 135 1165 220 1210 250" class="txa-network-path" data-path="traveller"
                    marker-end="url(#txa-flow-arrow)" />
                <path d="M1100 280 C1150 280 1170 280 1210 280" class="txa-network-path" data-path="traveller"
                    marker-end="url(#txa-flow-arrow)" />
                <path d="M1100 435 C1150 420 1165 340 1210 310" class="txa-network-path" data-path="traveller"
                    marker-end="url(#txa-flow-arrow)" />
            </svg>

            <div class="txa-network-node absolute left-[55px] top-[78px] z-10 w-[160px] rounded-xl border border-line bg-white p-4 shadow-sm"
                data-node="supplier" tabindex="0">
                <p class="text-xs uppercase text-brand">Supplier</p>
                <h3 class="mt-1 font-semibold">Accommodation</h3>
                <p class="mt-2 text-xs leading-5 text-mid-gray">Hotels, resorts and stays</p>
            </div>
            <div class="txa-network-node absolute left-[55px] top-[243px] z-10 w-[160px] rounded-xl border border-line bg-white p-4 shadow-sm"
                data-node="supplier" tabindex="0">
                <p class="text-xs uppercase text-brand">Supplier</p>
                <h3 class="mt-1 font-semibold">Tours</h3>
                <p class="mt-2 text-xs leading-5 text-mid-gray">Tours and activities</p>
            </div>
            <div class="txa-network-node absolute left-[55px] top-[408px] z-10 w-[160px] rounded-xl border border-line bg-white p-4 shadow-sm"
                data-node="supplier" tabindex="0">
                <p class="text-xs uppercase text-brand">Supplier</p>
                <h3 class="mt-1 font-semibold">Attractions</h3>
                <p class="mt-2 text-xs leading-5 text-mid-gray">Events and experiences</p>
            </div>

            <div class="txa-network-node absolute left-[350px] top-[205px] z-10 w-[175px] rounded-xl border border-line bg-white p-5 text-center shadow-md"
                data-node="booking" tabindex="0">
                <p class="text-xs font-semibold uppercase tracking-wide text-brand">Connected</p>
                <h3 class="mt-2 text-lg font-semibold">Booking Systems</h3>
                <p class="mt-2 text-xs leading-5 text-mid-gray">Products, rates, availability & bookings</p>
            </div>

            <div class="txa-network-node absolute left-1/2 top-1/2 z-20 w-[230px] -translate-x-1/2 -translate-y-1/2 rounded-2xl border-2 border-brand bg-white p-7 text-center shadow-xl"
                data-node="txa" tabindex="0"><img src="<?php echo esc_url(get_theme_file_uri('/images/logo.png')); ?>"
                    alt="TXA" class="mx-auto h-14 w-auto">
                <p class="mt-4 text-xs font-semibold uppercase tracking-wide text-brand">Tourism Exchange Australia</p>
                <p class="mt-2 text-sm leading-5 text-mid-gray">Australia's national tourism exchange</p>
            </div>

            <div class="txa-network-node absolute right-[210px] top-[72px] z-10 w-[175px] rounded-xl border border-line bg-white p-4 shadow-sm"
                data-node="channel" tabindex="0">
                <p class="text-xs uppercase text-brand">Destination</p>
                <h3 class="mt-1 font-semibold">Destination Websites</h3>
            </div>
            <div class="txa-network-node absolute right-[210px] top-[227px] z-10 w-[175px] rounded-xl border border-line bg-white p-4 shadow-sm"
                data-node="channel" tabindex="0">
                <p class="text-xs uppercase text-brand">Distribution</p>
                <h3 class="mt-1 font-semibold">Distributors & OTAs</h3>
            </div>
            <div class="txa-network-node absolute right-[210px] top-[382px] z-10 w-[175px] rounded-xl border border-line bg-white p-4 shadow-sm"
                data-node="channel" tabindex="0">
                <p class="text-xs uppercase text-brand">Travel Trade</p>
                <h3 class="mt-1 font-semibold">Travel Partners</h3>
            </div>

            <div class="txa-network-node absolute right-[28px] top-[230px] z-10 w-[135px] rounded-xl bg-brand p-5 text-center text-white shadow-lg"
                data-node="traveller" tabindex="0">
                <div class="text-2xl">→</div>
                <h3 class="mt-2 text-lg font-semibold">Travellers</h3>
                <p class="mt-1 text-xs leading-5 text-white/80">Discover & book</p>
            </div>
        </div>

    </div>
</section>