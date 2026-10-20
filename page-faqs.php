<?php

/**
 * Template Name: FAQs
 *
 * @package TailPress
 */

if (!function_exists('txa_faq_header')) {
    function txa_faq_header(string $name, string $default): string
    {
        $value = function_exists('get_field') ? get_field($name) : null;
        return (null === $value || '' === $value || false === $value) ? $default : (string) $value;
    }
}

add_filter('pre_get_document_title', fn(): string => 'Frequently Asked Questions | Tourism Exchange Great Britain');
add_action('wp_head', function (): void {
    if (is_page_template('page-faqs.php') || is_page('faqs')) {
        echo '<meta name="description" content="' . esc_attr('Answers to common questions about connecting to Tourism Exchange Great Britain as a supplier, destination, distributor or booking system partner.') . '">' . "\n";
    }
});

get_header();

// Placeholder group copy: only used until FAQ Groups / FAQ Questions posts are published.
$faq_groups = txa_faq_default_groups();

$faq_group_query = new WP_Query([
    'post_type' => 'txa_faq_group',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'orderby' => ['menu_order' => 'ASC', 'date' => 'ASC', 'ID' => 'ASC'],
    'no_found_rows' => true,
]);

$faq_question_query = new WP_Query([
    'post_type' => 'txa_faq',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'orderby' => ['menu_order' => 'ASC', 'date' => 'ASC', 'ID' => 'ASC'],
    'no_found_rows' => true,
]);

// Replace the placeholder copy with editable content once CPT groups and
// questions have been published.
if ($faq_group_query->have_posts() && $faq_question_query->have_posts()) {
    $questions_by_group = [];
    while ($faq_question_query->have_posts()) {
        $faq_question_query->the_post();
        $group_id = (int) get_post_meta(get_the_ID(), '_txa_faq_group_id', true);
        if ($group_id) {
            $questions_by_group[$group_id][] = [
                'question' => get_the_title(),
                'answer' => get_post_meta(get_the_ID(), '_txa_faq_answer', true),
            ];
        }
    }
    wp_reset_postdata();

    $cpt_faq_groups = [];
    foreach ($faq_group_query->posts as $faq_group_post) {
        $group_id = $faq_group_post->ID;
        $anchor = get_post_meta($group_id, '_txa_faq_group_anchor', true) ?: ($faq_group_post->post_name ?: 'group-' . $group_id);
        $cpt_faq_groups[$anchor] = [
            'eyebrow' => get_post_meta($group_id, '_txa_faq_group_eyebrow', true) ?: get_the_title($faq_group_post),
            'title' => get_the_title($faq_group_post),
            'intro' => get_post_meta($group_id, '_txa_faq_group_intro', true),
            'icon' => get_post_meta($group_id, '_txa_faq_group_icon', true) ?: 'bi-chat-square-text',
            'items' => $questions_by_group[$group_id] ?? [],
        ];
    }

    if ($cpt_faq_groups) {
        $faq_groups = $cpt_faq_groups;
    }
}
?>

<article class="bg-white text-near-black [font-family:'Source_Sans_Pro',sans-serif]">
    <section class="bg-surface px-4 py-10 sm:py-14 lg:px-16 lg:py-20">
        <div class="mx-auto grid max-w-[1312px] gap-8 lg:grid-cols-[1fr_420px] lg:items-center lg:gap-16">
            <div class="max-w-[760px]">
                <p
                    class="inline-flex w-fit max-w-full rounded-lg bg-brand px-4 py-2 text-sm font-bold sm:px-5 sm:py-3 sm:text-base uppercase leading-5 text-white">
                    <?php echo esc_html(txa_faq_header('faq_hero_eyebrow', 'Help centre')); ?>
                </p>
                <h1
                    class="mt-5 [font-family:'Hanken_Grotesk',sans-serif] text-[40px] font-bold leading-[1.1] tracking-[-.02em] text-brand sm:text-5xl lg:text-[44px]">
                    <?php echo esc_html(txa_faq_header('faq_hero_title', 'Frequently asked questions')); ?>
                </h1>
                <div class="mt-5 max-w-[680px] text-base leading-7 text-mid-gray sm:text-lg sm:leading-8">
                    <?php echo wp_kses_post(txa_faq_header('faq_hero_copy', 'Find answers for your pathway into Great Britain’s national tourism exchange. Choose a category, then open only the questions you need.')); ?>
                </div>
            </div>
            <aside class="rounded-2xl bg-brand p-6 text-white shadow-xl sm:p-8">
                <span class="flex size-12 items-center justify-center rounded-xl bg-white/15 text-2xl"
                    aria-hidden="true"><i class="bi bi-chat-square-text"></i></span>
                <h2 class="mt-5 [font-family:'Hanken_Grotesk',sans-serif] text-2xl font-bold">
                    <?php echo esc_html(txa_faq_header('faq_hero_aside_title', 'Can’t find your answer?')); ?>
                </h2>
                <div class="mt-3 text-sm leading-6 text-white/85">
                    <?php echo wp_kses_post(txa_faq_header('faq_hero_aside_copy', 'Tell us which pathway you are exploring and the TXGB team will help you find the right next step.')); ?>
                </div>
                <a href="<?php $faq_cta_url = txa_faq_header('faq_hero_aside_button_url', '/contact/');
                            echo esc_url((0 === strpos($faq_cta_url, '/') && 0 !== strpos($faq_cta_url, '//')) ? home_url($faq_cta_url) : $faq_cta_url); ?>"
                    class="mt-6 inline-flex min-h-12 w-full items-center justify-center rounded-lg bg-white px-5 py-3 font-bold text-brand !no-underline hover:bg-surface sm:w-auto"><?php echo esc_html(txa_faq_header('faq_hero_aside_button_label', 'Contact TXGB')); ?></a>
            </aside>
        </div>
    </section>

    <nav class="border-y border-line bg-white px-4 py-4 lg:px-16" aria-label="FAQ categories">
        <div class="mx-auto flex max-w-[1312px] gap-2 overflow-x-auto pb-1 sm:flex-wrap sm:justify-center sm:gap-3">
            <?php foreach ($faq_groups as $slug => $group): ?>
                <a href="#<?php echo esc_attr($slug); ?>"
                    class="inline-flex min-h-11 shrink-0 items-center gap-2 rounded-full border border-line bg-white px-4 py-2 text-sm font-semibold text-brand !no-underline transition hover:border-brand hover:bg-brand-tint hover:text-brand sm:px-5">
                    <i class="bi <?php echo esc_attr($group['icon']); ?> text-brand" aria-hidden="true"></i>
                    <?php echo esc_html($group['eyebrow']); ?>
                </a>
            <?php endforeach; ?>
        </div>
    </nav>

    <div class="px-4 py-10 sm:py-14 lg:px-16 lg:py-20">
        <div class="mx-auto max-w-[1312px] space-y-14 sm:space-y-16 lg:space-y-20">
            <?php foreach ($faq_groups as $slug => $group): ?>
                <section id="<?php echo esc_attr($slug); ?>" class="scroll-mt-28"
                    aria-labelledby="<?php echo esc_attr($slug); ?>-title">
                    <div class="grid gap-7 lg:grid-cols-[330px_1fr] lg:gap-14">
                        <header>
                            <span
                                class="flex size-12 items-center justify-center rounded-xl bg-brand-tint text-2xl text-brand"
                                aria-hidden="true"><i class="bi <?php echo esc_attr($group['icon']); ?>"></i></span>
                            <p class="txgb-accent-text mt-5 text-xs font-bold uppercase tracking-wide sm:text-sm">
                                <?php echo esc_html($group['eyebrow']); ?>
                            </p>
                            <h2 id="<?php echo esc_attr($slug); ?>-title"
                                class="mt-2 [font-family:'Hanken_Grotesk',sans-serif] text-[28px] font-bold leading-tight text-brand sm:text-3xl">
                                <?php echo esc_html($group['title']); ?>
                            </h2>
                            <p class="mt-3 max-w-[310px] text-sm leading-6 text-mid-gray sm:text-base">
                                <?php echo esc_html($group['intro']); ?>
                            </p>
                        </header>

                        <div class="space-y-3 sm:space-y-4" data-faq-group>
                            <?php foreach ($group['items'] as $index => $faq): ?>
                                <details
                                    class="group cursor-pointer rounded-xl border border-line bg-white p-5 shadow-[0_12px_28px_-12px_rgba(26,26,26,0.12)] transition open:border-brand/40 sm:p-6"
                                    data-faq-card <?php echo 0 === $index ? 'open' : ''; ?>>
                                    <summary
                                        class="cursor-pointer list-none text-base font-semibold leading-6 text-brand [&::-webkit-details-marker]:hidden sm:text-lg">
                                        <span class="flex items-start justify-between gap-5">
                                            <?php echo esc_html($faq['question']); ?>
                                            <span
                                                class="flex size-8 shrink-0 items-center justify-center rounded-full bg-brand-tint text-xl leading-none text-brand transition group-open:rotate-45"
                                                aria-hidden="true">+</span>
                                        </span>
                                    </summary>
                                    <p
                                        class="mt-4 max-w-[760px] border-t border-line pt-4 text-sm leading-6 text-mid-gray sm:text-base sm:leading-7">
                                        <?php echo esc_html($faq['answer']); ?>
                                    </p>
                                </details>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </section>
            <?php endforeach; ?>
        </div>
    </div>

    <section class="bg-surface px-4 py-10 sm:py-14 lg:px-16 lg:py-16">
        <div
            class="mx-auto flex max-w-[1100px] flex-col items-start justify-between gap-6 rounded-2xl bg-black/40 px-6 py-8 text-white sm:px-8 sm:py-10 lg:flex-row lg:items-center lg:px-12">
            <div>
                <h2 class="[font-family:'Hanken_Grotesk',sans-serif] text-2xl font-bold sm:text-3xl">Ready to find your
                    TXGB pathway?</h2>
                <p class="mt-2 max-w-[650px] text-sm leading-6 text-white/75 sm:text-base">Talk with the team about
                    suppliers, destinations, distribution or booking system integration.</p>
            </div>
            <a href="<?php echo esc_url(home_url('/contact/')); ?>"
                class="inline-flex min-h-12 w-full shrink-0 items-center justify-center rounded-lg bg-brand px-6 py-3 font-bold text-white !no-underline hover:bg-brand-dark sm:w-auto">Contact
                TXGB</a>
        </div>
    </section>
</article>

<?php get_footer();
