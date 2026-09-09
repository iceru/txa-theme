<?php
/**
 * TXA ecosystem network used below the homepage hero.
 *
 * @package TailPress
 */

$network_logos = [
    ['file' => 'image 7.png', 'name' => 'FareHarbor'],
    ['file' => 'image 11.png', 'name' => 'Google Things to do'],
    ['file' => 'image 8.png', 'name' => 'SiteMinder'],
    ['file' => 'image 4.png', 'name' => 'Booking.com'],
    ['file' => 'image 9.png', 'name' => 'NewBook'],
    ['file' => 'rezobx.jpg', 'name' => 'Rezobx'],
    ['file' => 'image 6.png', 'name' => 'Rezdy'],
    ['file' => 'image 10.png', 'name' => 'RMS'],
    ['file' => 'image 3.png', 'name' => 'Tripadvisor'],
];
?>
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

        <div class="mt-10 xl:hidden" data-txa-network>
            <div class="mx-auto max-w-xl rounded-2xl border border-line bg-white p-5 shadow-sm sm:p-7">
                <div class="flex items-center gap-3 text-brand">
                    <span class="grid size-11 shrink-0 place-items-center rounded-full bg-brand/10 text-xl"
                        aria-hidden="true"><i class="bi bi-building"></i></span>
                    <div>
                        <p class="text-xs font-bold uppercase tracking-wide">Tourism operators</p>
                        <p class="text-sm text-mid-gray">Products, rates and availability</p>
                    </div>
                </div>

                <div class="my-5 flex items-center gap-3" aria-hidden="true">
                    <span class="h-px flex-1 bg-brand/25"></span><i class="bi bi-arrow-down text-brand"></i><span
                        class="h-px flex-1 bg-brand/25"></span>
                </div>

                <p class="mb-3 text-center text-xs font-bold uppercase tracking-wide text-mid-gray">Connected booking
                    systems</p>
                <div class="grid grid-cols-3 gap-2 sm:grid-cols-5">
                    <?php foreach ($network_logos as $logo): ?>
                        <div class="txa-network-node grid min-h-16 place-items-center rounded-lg border border-line bg-white p-2"
                            data-node="booking" tabindex="0">
                            <img src="<?php echo esc_url(get_theme_file_uri('/images/networks/' . $logo['file'])); ?>"
                                alt="<?php echo esc_attr($logo['name']); ?>" class="max-h-10 max-w-full object-contain">
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="my-5 text-center text-brand" aria-hidden="true"><i class="bi bi-arrow-down text-xl"></i>
                </div>
                <div class="txa-network-node rounded-2xl border-2 border-brand bg-white p-6 text-center shadow-lg"
                    data-node="txa" tabindex="0">
                    <img src="<?php echo esc_url(get_theme_file_uri('/images/logo.png')); ?>"
                        alt="Tourism Exchange Australia" class="mx-auto h-12 w-auto">
                    <p class="mt-3 text-xs font-bold uppercase tracking-wide text-brand">Tourism Exchange Australia</p>
                </div>
                <div class="my-5 text-center text-brand" aria-hidden="true"><i class="bi bi-arrow-down text-xl"></i>
                </div>

                <div class="grid gap-2 sm:grid-cols-2">
                    <?php foreach (['Destination websites', 'Distributors & OTAs', 'Travel trade', 'Tour operators'] as $channel): ?>
                        <div class="txa-network-node rounded-lg border border-line bg-white px-3 py-4 text-center text-sm font-semibold"
                            data-node="channel" tabindex="0">
                            <?php echo esc_html($channel); ?>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="mt-5 rounded-xl bg-brand px-5 py-4 text-center font-semibold text-white">
                    <i class="bi bi-people mr-2" aria-hidden="true"></i>Travellers discover and book
                </div>
            </div>
        </div>

        <div class="txa-ecosystem mt-12 hidden xl:block" data-txa-network>
            <svg class="txa-ecosystem__lines" viewBox="0 0 1312 690" fill="none" aria-hidden="true">
                <defs>
                    <marker id="txa-arrow-red" markerWidth="9" markerHeight="9" refX="8" refY="4.5" orient="auto">
                        <path d="M0 0L9 4.5L0 9Z" fill="#d42b2b" />
                    </marker>
                    <marker id="txa-arrow-green" markerWidth="9" markerHeight="9" refX="8" refY="4.5" orient="auto">
                        <path d="M0 0L9 4.5L0 9Z" fill="#55a348" />
                    </marker>
                </defs>

                <path d="M102 111 C160 140 175 210 225 246" class="txa-network-path" data-path="booking"
                    marker-end="url(#txa-arrow-red)" />
                <path d="M115 388 C190 388 205 340 286 340" class="txa-network-path" data-path="booking"
                    marker-end="url(#txa-arrow-red)" />
                <path d="M210 560 C260 520 310 480 398 430" class="txa-network-path" data-path="booking"
                    marker-end="url(#txa-arrow-red)" />
                <path d="M375 118 C430 155 452 225 514 286" class="txa-network-path" data-path="booking"
                    marker-end="url(#txa-arrow-red)" />
                <path d="M432 268 C478 270 500 292 530 315" class="txa-network-path" data-path="booking"
                    marker-end="url(#txa-arrow-red)" />
                <path d="M450 482 C500 465 515 410 544 377" class="txa-network-path" data-path="booking"
                    marker-end="url(#txa-arrow-red)" />

                <path d="M746 337 C810 320 822 94 920 83" class="txa-network-path" data-path="channel"
                    marker-end="url(#txa-arrow-red)" />
                <path d="M748 345 C820 340 840 235 925 231" class="txa-network-path" data-path="channel"
                    marker-end="url(#txa-arrow-red)" />
                <path d="M748 356 C825 365 842 410 925 410" class="txa-network-path txa-network-path--green"
                    data-path="channel" marker-end="url(#txa-arrow-green)" />
                <path d="M730 395 C790 465 817 560 915 572" class="txa-network-path txa-network-path--green"
                    data-path="channel" marker-end="url(#txa-arrow-green)" />

                <path d="M1095 84 C1155 105 1160 158 1205 178" class="txa-network-path" data-path="traveller"
                    marker-end="url(#txa-arrow-red)" />
                <path d="M1095 231 C1150 245 1167 282 1205 302" class="txa-network-path" data-path="traveller"
                    marker-end="url(#txa-arrow-red)" />
                <path d="M1095 410 C1150 405 1170 405 1210 405" class="txa-network-path txa-network-path--green"
                    data-path="traveller" marker-end="url(#txa-arrow-green)" />
                <path d="M1090 572 C1150 555 1160 510 1205 490" class="txa-network-path txa-network-path--green"
                    data-path="traveller" marker-end="url(#txa-arrow-green)" />
            </svg>

            <div class="txa-network-node txa-ecosystem__source" data-node="booking" tabindex="0">
                <span class="txa-ecosystem__source-icon"><i class="bi bi-buildings" aria-hidden="true"></i></span>
                <span><strong>Tourism operators</strong><small>Products, rates & availability</small></span>
            </div>

            <p class="txa-ecosystem__booking-label">Connected booking systems</p>
            <div class="txa-ecosystem__logos">
                <?php foreach ($network_logos as $index => $logo): ?>
                    <div class="txa-network-node txa-ecosystem__logo txa-ecosystem__logo--<?php echo esc_attr((string) ($index + 1)); ?>"
                        data-node="booking" tabindex="0">
                        <img src="<?php echo esc_url(get_theme_file_uri('/images/networks/' . $logo['file'])); ?>"
                            alt="<?php echo esc_attr($logo['name']); ?>">
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="txa-network-node txa-ecosystem__hub" data-node="txa" tabindex="0">
                <img src="<?php echo esc_url(get_theme_file_uri('/images/logo.png')); ?>"
                    alt="Tourism Exchange Australia">
                <span>Tourism Exchange Australia</span>
            </div>

            <div class="txa-ecosystem__channels">
                <div class="txa-network-node txa-ecosystem__channel" data-node="channel" tabindex="0"><i
                        class="bi bi-globe2"></i><span>Destination<br>websites</span></div>
                <div class="txa-network-node txa-ecosystem__channel" data-node="channel" tabindex="0"><i
                        class="bi bi-bag-check"></i><span>Distributors<br>& OTAs</span></div>
                <div class="txa-network-node txa-ecosystem__channel" data-node="channel" tabindex="0"><i
                        class="bi bi-briefcase"></i><span>Travel trade</span></div>
                <div class="txa-network-node txa-ecosystem__channel" data-node="channel" tabindex="0"><i
                        class="bi bi-signpost-split"></i><span>Tour operators</span></div>
            </div>

            <div class="txa-network-node txa-ecosystem__travellers" data-node="traveller" tabindex="0">
                <div class="txa-ecosystem__people" aria-hidden="true"><i class="bi bi-person-walking"></i><i
                        class="bi bi-person-standing-dress"></i><i class="bi bi-person-arms-up"></i></div>
                <strong>Travellers</strong>
                <span>Discover & book</span>
            </div>
        </div>
    </div>

    <div>

        <div
            class="mt-7 overflow-hidden rounded-2xl bg-near-black px-5 py-8 text-white shadow-xl sm:mt-8 sm:px-8 sm:py-10 lg:px-10 lg:py-12">
            <div class="mx-auto max-w-[760px] text-center">
                <img src="<?php echo esc_url(get_theme_file_uri('/images/logo.png')); ?>"
                    alt="Tourism Exchange Australia" class="mx-auto h-12 w-auto brightness-0 invert sm:h-14">
                <h3 class="mt-5 [font-family:'Hanken_Grotesk',sans-serif] text-2xl font-semibold sm:text-3xl">TXA System
                    Diagram</h3>
                <p class="mt-2 text-sm leading-6 text-white/70">How tourism products and live information move through
                    TXA to customers.</p>
            </div>

            <div
                class="mx-auto mt-9 grid max-w-[1200px] grid-cols-1 items-stretch gap-4 sm:mt-12 xl:grid-cols-[1fr_44px_1.15fr_44px_1.35fr_44px_1fr] xl:gap-3">
                <article
                    class="flex min-h-[280px] flex-col rounded-2xl border-2 border-brand bg-brand p-5 text-left shadow-[0_20px_45px_-24px_rgba(212,43,43,0.95)] sm:p-6">
                    <div class="flex items-center justify-between gap-4">
                        <span class="text-xs font-bold uppercase tracking-[0.12em] text-white/75">Column 1</span>
                        <span
                            class="rounded-full bg-white px-3 py-1 text-[10px] font-bold uppercase tracking-wide text-brand">Highlighted</span>
                    </div>
                    <div class="flex grow flex-col items-center justify-center py-7 text-center">
                        <span class="flex size-16 items-center justify-center rounded-2xl bg-white/15 text-4xl"
                            aria-hidden="true"><i class="bi bi-shop-window"></i></span>
                        <h4 class="mt-5 [font-family:'Hanken_Grotesk',sans-serif] text-xl font-bold sm:text-2xl">Tourism
                            Suppliers</h4>
                        <p class="mt-3 text-sm leading-6 text-white/85">Accommodation, tours, attractions, events and
                            experiences.</p>
                    </div>
                </article>

                <div class="flex items-center justify-center text-brand" aria-hidden="true">
                    <i class="bi bi-arrow-down-up text-2xl xl:hidden"></i>
                    <i class="bi bi-arrow-left-right hidden text-2xl xl:block"></i>
                </div>

                <article
                    class="flex min-h-[280px] flex-col rounded-2xl border border-white/15 bg-white/5 p-5 text-left sm:p-6">
                    <span class="text-xs font-bold uppercase tracking-[0.12em] text-white/50">Column 2</span>
                    <h4 class="mt-3 [font-family:'Hanken_Grotesk',sans-serif] text-lg font-bold">Systems &amp; Content
                    </h4>
                    <div class="mt-5 grid grow gap-3">
                        <div class="flex items-center gap-3 rounded-xl bg-white/10 p-4"><i
                                class="bi bi-calendar2-check text-xl text-brand" aria-hidden="true"></i><span
                                class="font-semibold">Booking System</span></div>
                        <div class="flex items-center gap-3 rounded-xl bg-white/10 p-4"><i
                                class="bi bi-database text-xl text-brand" aria-hidden="true"></i><span
                                class="font-semibold">Data</span></div>
                        <div class="flex items-center gap-3 rounded-xl bg-white/10 p-4"><i
                                class="bi bi-card-text text-xl text-brand" aria-hidden="true"></i><span
                                class="font-semibold">Content</span></div>
                    </div>
                </article>

                <div class="flex items-center justify-center text-brand" aria-hidden="true">
                    <i class="bi bi-arrow-down-up text-2xl xl:hidden"></i>
                    <i class="bi bi-arrow-left-right hidden text-2xl xl:block"></i>
                </div>

                <article
                    class="flex min-h-[280px] flex-col rounded-2xl border border-white/15 bg-white/5 p-5 text-left sm:p-6">
                    <span class="text-xs font-bold uppercase tracking-[0.12em] text-white/50">Column 3</span>
                    <h4 class="mt-3 [font-family:'Hanken_Grotesk',sans-serif] text-lg font-bold">Connected Channels</h4>
                    <div class="mt-5 grid grow gap-3 sm:grid-cols-2 xl:grid-cols-1">
                        <div class="flex items-center gap-3 rounded-xl bg-white/10 p-3.5"><i
                                class="bi bi-window text-xl text-brand" aria-hidden="true"></i><span
                                class="font-semibold">Company Website</span></div>
                        <div class="flex items-center gap-3 rounded-xl bg-white/10 p-3.5"><i
                                class="bi bi-buildings text-xl text-brand" aria-hidden="true"></i><span
                                class="font-semibold">Local Government / DMO</span></div>
                        <div class="flex items-center gap-3 rounded-xl bg-white/10 p-3.5"><i
                                class="bi bi-stars text-xl text-brand" aria-hidden="true"></i><span
                                class="font-semibold">Google / AI</span></div>
                        <div class="flex items-center gap-3 rounded-xl bg-white/10 p-3.5"><i
                                class="bi bi-globe2 text-xl text-brand" aria-hidden="true"></i><span
                                class="font-semibold">Various OTAs</span></div>
                    </div>
                </article>

                <div class="flex items-center justify-center text-brand" aria-hidden="true">
                    <i class="bi bi-arrow-down-up text-2xl xl:hidden"></i>
                    <i class="bi bi-arrow-left-right hidden text-2xl xl:block"></i>
                </div>

                <article
                    class="flex min-h-[280px] flex-col rounded-2xl border border-white/15 bg-white/5 p-5 text-left sm:p-6">
                    <span class="text-xs font-bold uppercase tracking-[0.12em] text-white/50">Column 4</span>
                    <div class="flex grow flex-col items-center justify-center py-7 text-center">
                        <span
                            class="flex size-16 items-center justify-center rounded-2xl bg-white/10 text-4xl text-brand"
                            aria-hidden="true"><i class="bi bi-person-check"></i></span>
                        <h4 class="mt-5 [font-family:'Hanken_Grotesk',sans-serif] text-xl font-bold sm:text-2xl">
                            Customer</h4>
                        <p class="mt-3 text-sm leading-6 text-white/70">Discovers and purchases tourism products online.
                        </p>
                    </div>
                </article>
            </div>
        </div>
    </div>
</section>