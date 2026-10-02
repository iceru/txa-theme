<?php

/**
 * Template Name: Destination Virtual Concierge
 *
 * @package TailPress
 */

if (!function_exists('txa_f')) {
    function txa_f(string $name, $default = '')
    {
        $value = function_exists('get_field') ? get_field($name) : null;
        return (null === $value || '' === $value || false === $value) ? $default : $value;
    }
}

if (!function_exists('txa_img')) {
    function txa_img(string $name, string $default): string
    {
        $value = txa_f($name);
        if (is_array($value) && !empty($value['url'])) {
            return $value['url'];
        }
        if (is_numeric($value)) {
            $url = wp_get_attachment_image_url((int) $value, 'full');
            if ($url) {
                return $url;
            }
        }
        if (is_string($value) && '' !== $value) {
            return $value;
        }
        return $default;
    }
}

if (!function_exists('txa_url')) {
    function txa_url(string $name, string $default): string
    {
        $value = trim((string) txa_f($name, $default));
        if (0 === strpos($value, '/') && 0 !== strpos($value, '//')) {
            return home_url($value);
        }
        return $value;
    }
}

if (!function_exists('txa_concierge_cards')) {
    function txa_concierge_cards(string $prefix, array $cards, array $keys): array
    {
        foreach ($cards as $i => $card) {
            $n = $i + 1;
            foreach ($keys as $key) {
                $cards[$i][$key] = txa_f("{$prefix}_{$n}_{$key}", $card[$key] ?? '');
            }
            if (!empty($card['image'])) {
                $cards[$i]['image'] = txa_img("{$prefix}_{$n}_image", get_theme_file_uri('/images/' . $card['image']));
            }
        }
        return $cards;
    }
}

get_header();

$demo_url = txa_url('concierge_hero_button_url', home_url('/contact/'));

$activation_cards = txa_concierge_cards('concierge_activation', [
    [
        'icon' => 'bi-share',
        'title' => 'Industry Activation',
        'copy' => 'Interconnect and activate your entire industry and visitor economy through a unified local channel with shared distribution technology.',
    ],
    [
        'icon' => 'bi-cash',
        'title' => 'Support Local Spend',
        'copy' => 'Incentivize in-destination spend and facilitate wider visitor dispersal across the region.',
        'image' => 'map-2.jpg',
        'wide' => true,
    ],
    [
        'icon' => 'bi-grid',
        'title' => 'Real-time Insights',
        'copy' => 'Make real-time dashboards available to the destination and relevant industry participants for informed decision-making.',
        'image' => 'dashboard.png',
        'wide' => true,
    ],
    [
        'icon' => 'bi-arrow-repeat',
        'title' => 'Seamless Operations',
        'copy' => 'Use supplier opt-in, automated hosted booking pages, and integrated and automated direct payment and settlement of booking funds.',
    ],
], ['icon', 'title', 'copy']);

$partner_cards = txa_concierge_cards('concierge_partner', [
    [
        'icon' => 'bi-buildings',
        'title' => 'Accommodation',
        'copy' => 'Hotels and Bed and Breakfasts can easily book tours and activities for their guests directly through the concierge portal.',
        'label' => 'Cross-sell to tours',
    ],
    [
        'icon' => 'bi-info-circle-fill',
        'title' => 'Visitor Information',
        'copy' => 'VICs become full-service booking hubs, reducing manual paperwork and improving visitor experience.',
        'label' => 'Centralized bookings',
        'red' => true,
    ],
    [
        'icon' => 'bi-bus-front',
        'title' => 'Dispersal',
        'copy' => 'Airports and National Park offices inter-connect to offer visitors numerous hyper local channels for discovery and booking options',
        'label' => 'Regional dispersal',
    ],
], ['icon', 'title', 'copy', 'label']);
?>

<article class="bg-white text-near-black [font-family:'Source_Sans_Pro',sans-serif]">
    <section class="bg-surface px-4 py-14 sm:py-16 lg:px-16 lg:py-20">
        <div class="mx-auto grid max-w-[1312px] gap-10 lg:grid-cols-[1fr_590px] lg:items-center lg:gap-16">
            <div>
                <p class="text-sm text-brand mb-4 font-semibold"><?php echo esc_html(txa_f('concierge_hero_eyebrow', 'UNIQUE COLLABORATIVE OPPORTUNITY')); ?></p>
                <p class="inline-flex w-fit max-w-full rounded-lg bg-brand px-4 py-2 text-sm font-bold sm:px-5 sm:py-3 sm:text-base uppercase leading-5 text-white">
                    <?php echo esc_html(txa_f('concierge_hero_label', 'Virtual Concierge')); ?></p>
                <h1
                    class="mt-8 max-w-[670px] [font-family:'Hanken_Grotesk',sans-serif] text-[40px] font-bold leading-[1.18] text-[#151c27] sm:text-5xl lg:text-[44px] lg:leading-[1.16]">
                    <?php echo esc_html(txa_f('concierge_hero_title', 'TXA’s local reseller network or ‘Virtual Concierge’')); ?></h1>
                <p class="mt-6 max-w-[650px] text-base leading-8 text-mid-gray sm:text-lg"><?php echo esc_html(txa_f('concierge_hero_copy', 'TXA’s unique local re-seller network or ‘Virtual Concierge’ capability helps tourism product categories cross-sell, for example, accommodation and activity providers cross sell, visitor information centres, National Park offices, airports and other local partners inter-connect offering visitors\' numerous local channels for booking local activities, events and experiences.')); ?></p>
                <a href="<?php echo esc_url($demo_url); ?>"
                    class="mt-8 inline-flex min-h-12 w-full items-center justify-center rounded-lg bg-brand px-7 py-3 text-base font-bold text-white !no-underline hover:bg-brand-dark sm:w-auto"><?php echo esc_html(txa_f('concierge_hero_button_label', "Explore TXA's Virtual Concierge")); ?></a>
            </div>
            <div class="relative overflow-hidden rounded-lg">
                <img src="<?php echo esc_url(txa_img('concierge_hero_image', get_theme_file_uri('/images/virtual-concierge.jpg'))); ?>"
                    alt="<?php echo esc_attr(txa_f('concierge_hero_image_alt', 'Sydney Harbour Bridge')); ?>" class="h-[340px] w-full object-cover sm:h-[390px] lg:h-[400px]">
                <div
                    class="absolute bottom-5 left-5 right-5 flex items-center gap-5 rounded-xl bg-white/90 p-5 shadow-lg backdrop-blur">
                    <span
                        class="flex size-12 shrink-0 items-center justify-center rounded-full bg-brand text-xl text-white">
                        <i class="bi <?php echo esc_attr(txa_f('concierge_badge_icon', 'bi-diagram-3')); ?>" aria-hidden="true"></i>
                    </span>
                    <div>
                        <p class="text-lg font-bold text-[#151c27]"><?php echo esc_html(txa_f('concierge_badge_title', 'Integrated Connectivity')); ?></p>
                        <p class="mt-1 text-sm text-mid-gray"><?php echo esc_html(txa_f('concierge_badge_copy', 'Real-time local ecosystem activation')); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="px-4 py-16 sm:py-20 lg:px-16 lg:py-24">
        <div class="mx-auto max-w-[1312px]">
            <div class="max-w-[790px]">
                <h2
                    class="[font-family:'Hanken_Grotesk',sans-serif] text-3xl font-bold leading-tight text-[#151c27] sm:text-4xl">
                    <?php echo esc_html(txa_f('concierge_activation_heading', 'Interconnect and activate your visitor economy.')); ?></h2>
                <p class="mt-5 text-base leading-7 text-mid-gray"><?php echo esc_html(txa_f('concierge_activation_copy', 'Transform every touchpoint into a booking opportunity. By connecting diverse local operators, you create a resilient network that keeps spending within the region.')); ?></p>
            </div>

            <div class="mt-10 grid gap-6 lg:grid-cols-3">
                <?php foreach ($activation_cards as $card) { ?>
                    <article
                        class="<?php echo !empty($card['wide']) || !empty($card['image_left']) ? 'lg:col-span-2' : ''; ?> rounded-2xl border border-[#dfc0ba] bg-white p-8 shadow-sm sm:p-10">
                        <?php if (!empty($card['image'])) { ?>
                            <div class="grid gap-8 sm:grid-cols-[minmax(0,1fr)_minmax(260px,1.35fr)] sm:items-center">
                                <div>
                                    <span
                                        class="flex size-12 items-center justify-center rounded-lg bg-brand-tint text-2xl text-brand">
                                        <i class="bi <?php echo esc_attr($card['icon']); ?>" aria-hidden="true"></i>
                                    </span>
                                    <h3
                                        class="mt-6 [font-family:'Hanken_Grotesk',sans-serif] text-2xl font-bold text-[#151c27]">
                                        <?php echo esc_html($card['title']); ?>
                                    </h3>
                                    <p class="mt-4 text-base leading-7 text-mid-gray"><?php echo esc_html($card['copy']); ?></p>
                                </div>
                                <img src="<?php echo esc_url($card['image']); ?>"
                                    alt="<?php echo esc_attr($card['title']); ?>"
                                    class="h-[160px] w-full rounded-lg object-cover">
                            </div>
                        <?php } else { ?>
                            <span class="flex size-12 items-center justify-center rounded-lg bg-brand-tint text-2xl text-brand">
                                <i class="bi <?php echo esc_attr($card['icon']); ?>" aria-hidden="true"></i>
                            </span>
                            <h3
                                class="mt-6 [font-family:'Hanken_Grotesk',sans-serif] text-2xl font-bold text-[#151c27]">
                                <?php echo esc_html($card['title']); ?>
                            </h3>
                            <p class="mt-4 text-base leading-7 text-mid-gray"><?php echo esc_html($card['copy']); ?></p>
                        <?php } ?>
                    </article>
                <?php } ?>
            </div>
        </div>
    </section>

    <section class="bg-surface px-4 py-16 sm:py-20 lg:px-16 lg:py-24">
        <div class="mx-auto max-w-[1312px]">
            <div class="mx-auto max-w-[720px] text-center">
                <h2
                    class="[font-family:'Hanken_Grotesk',sans-serif] text-3xl font-bold leading-tight text-[#151c27] sm:text-4xl">
                    <?php echo esc_html(txa_f('concierge_partners_heading', 'Empower Your Local Partners')); ?></h2>
                <p class="mt-6 text-base leading-7 text-mid-gray"><?php echo esc_html(txa_f('concierge_partners_copy', 'Give local partners a practical way to recommend and book experiences, turning every tourism operator, information desk and concierge into an active, informed and motivated local booking channel')); ?></p>
            </div>
            <div class="mt-14 grid items-stretch gap-6 lg:grid-cols-3">
                <?php foreach ($partner_cards as $card) { ?>
                    <article
                        class="<?php echo !empty($card['red']) ? 'bg-brand text-white' : 'bg-white text-[#151c27] shadow-lg'; ?> flex h-full flex-col items-center rounded-2xl p-8 text-center sm:p-10">
                        <span
                            class="<?php echo !empty($card['red']) ? 'bg-white/15 text-white' : 'bg-brand-tint text-brand'; ?> mx-auto flex size-20 items-center justify-center rounded-2xl text-3xl">
                            <i class="bi <?php echo esc_attr($card['icon']); ?>" aria-hidden="true"></i>
                        </span>
                        <h3
                            class="mt-8 [font-family:'Hanken_Grotesk',sans-serif] text-2xl font-bold <?php echo !empty($card['red']) ? 'text-white' : 'text-[#151c27]'; ?>">
                            <?php echo esc_html($card['title']); ?>
                        </h3>
                        <p
                            class="mx-auto mb-8 mt-6 max-w-[320px] text-base leading-7 <?php echo !empty($card['red']) ? 'text-white/90' : 'text-mid-gray'; ?>">
                            <?php echo esc_html($card['copy']); ?>
                        </p>
                        <div
                            class="mt-auto w-full border-t <?php echo !empty($card['red']) ? 'border-white/20' : 'border-line'; ?> pt-6">
                            <p
                                class="text-xs font-bold uppercase tracking-wide <?php echo !empty($card['red']) ? 'text-white' : 'text-brand'; ?>">
                                <?php echo esc_html($card['label']); ?>
                            </p>
                        </div>
                    </article>
                <?php } ?>
            </div>
        </div>
    </section>
</article>

<?php get_footer(); ?>