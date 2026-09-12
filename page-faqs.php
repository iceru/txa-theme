<?php

/**
 * Template Name: FAQs
 *
 * @package TailPress
 */

add_filter('pre_get_document_title', fn(): string => 'Frequently Asked Questions | Tourism Exchange Australia');
add_action('wp_head', function (): void {
    if (is_page_template('page-faqs.php') || is_page('faqs')) {
        echo '<meta name="description" content="' . esc_attr('Answers to common questions about connecting to Tourism Exchange Australia as a supplier, destination, distributor or booking-system partner.') . '">' . "\n";
    }
});

get_header();

$faq_groups = [
    'suppliers' => [
        'eyebrow' => 'Tourism suppliers',
        'title' => 'Supplier questions',
        'intro' => 'Connecting tourism products, rates and availability to more online channels.',
        'icon' => 'bi-shop-window',
        'items' => [
            ['question' => 'Do I need a booking system?', 'answer' => 'Usually TXA works through a connected booking system. If you do not have one, TXA can help you understand available options.'],
            ['question' => 'Will I have to manage another system?', 'answer' => 'The goal is to reduce manual management by using your booking system as the source of product, rates and availability.'],
            ['question' => 'Can I keep personal contact with customers?', 'answer' => 'Yes. The customer remains your customer, with booking and customer information flowing according to the relevant channel and payment model.'],
            ['question' => 'What size business is TXA designed for?', 'answer' => 'TXA is designed for tourism suppliers of different sizes across accommodation, activities, attractions, events and experiences.'],
        ],
    ],
    'destinations' => [
        'eyebrow' => 'Destinations',
        'title' => 'Destination questions',
        'intro' => 'Activating destination assets, local supply and measurable visitor journeys.',
        'icon' => 'bi-geo-alt',
        'items' => [
            ['question' => 'Does this replace our existing CMS?', 'answer' => 'No. TXA can work alongside your existing destination website or CMS by powering bookable pathways, widgets, APIs and destination-specific booking pages.'],
            ['question' => 'How much does it cost operators?', 'answer' => 'Commercial models can vary by destination. TXA is designed to support flexible destination packages and supplier pathways.'],
            ['question' => 'Is TXA an OTA (Online Travel Agent)?', 'answer' => 'No. TXA is a neutral B2B exchange connecting suppliers, destinations, distributors and booking systems.'],
        ],
    ],
    'distributors' => [
        'eyebrow' => 'Distributors',
        'title' => 'Distributor questions',
        'intro' => 'Accessing Australian tourism inventory through flexible technical and commercial models.',
        'icon' => 'bi-globe2',
        'items' => [
            ['question' => 'What inventory can distributors access through TXA?', 'answer' => 'TXA provides a pathway to Australian tourism suppliers across accommodation, tours, attractions, events and experiences.'],
            ['question' => 'How can a distributor connect to TXA?', 'answer' => 'Connection options include a direct API, white-label booking pages, an on-account or agent model, and campaign or destination-led distribution.'],
            ['question' => 'Does TXA support different commercial models?', 'answer' => 'Yes. TXA supports flexible commercial arrangements, including net, gross and commission-based models, depending on the distributor agreement.'],
        ],
    ],
    'booking-systems' => [
        'eyebrow' => 'Booking systems',
        'title' => 'Booking-system questions',
        'intro' => 'Connecting operator customers to destination, distributor and trade channels.',
        'icon' => 'bi-calendar2-check',
        'items' => [
            ['question' => 'What does a TXA integration offer booking-system customers?', 'answer' => 'A TXA integration can give operator customers access to broader destination, distributor and trade channels through Australia’s national tourism exchange.'],
            ['question' => 'How is product availability kept current?', 'answer' => 'Connected systems can exchange live product, pricing and availability updates so booking data remains accurate across the network.'],
            ['question' => 'Why connect once through TXA?', 'answer' => 'A single TXA integration can reduce the need to manage separate technical connections for each participating distribution relationship.'],
        ],
    ],
];
?>

<article class="bg-white text-near-black [font-family:'Source_Sans_Pro',sans-serif]">
    <section class="bg-surface px-4 py-10 sm:py-14 lg:px-16 lg:py-20">
        <div class="mx-auto grid max-w-[1312px] gap-8 lg:grid-cols-[1fr_420px] lg:items-center lg:gap-16">
            <div class="max-w-[760px]">
                <p
                    class="inline-flex w-fit max-w-full rounded-lg bg-brand px-4 py-2 text-sm font-bold sm:px-5 sm:py-3 sm:text-base uppercase leading-5 text-white">
                    Help centre</p>
                <h1
                    class="mt-5 [font-family:'Hanken_Grotesk',sans-serif] text-[40px] font-bold leading-[1.1] tracking-[-.02em] text-[#151c27] sm:text-5xl lg:text-[44px]">
                    Frequently asked questions
                </h1>
                <p class="mt-5 max-w-[680px] text-base leading-7 text-mid-gray sm:text-lg sm:leading-8">
                    Find answers for your pathway into Australia’s national tourism exchange. Choose a category, then
                    open only the questions you need.
                </p>
            </div>
            <aside class="rounded-2xl bg-brand p-6 text-white shadow-xl sm:p-8">
                <span class="flex size-12 items-center justify-center rounded-xl bg-white/15 text-2xl"
                    aria-hidden="true"><i class="bi bi-chat-square-text"></i></span>
                <h2 class="mt-5 [font-family:'Hanken_Grotesk',sans-serif] text-2xl font-bold">Can’t find your answer?
                </h2>
                <p class="mt-3 text-sm leading-6 text-white/85">Tell us which pathway you are exploring and the TXA team
                    will help you find the right next step.</p>
                <a href="<?php echo esc_url(home_url('/contact/')); ?>"
                    class="mt-6 inline-flex min-h-12 w-full items-center justify-center rounded-lg bg-white px-5 py-3 font-bold text-brand !no-underline hover:bg-surface sm:w-auto">Contact
                    TXA</a>
            </aside>
        </div>
    </section>

    <nav class="border-y border-line bg-white px-4 py-4 lg:px-16" aria-label="FAQ categories">
        <div class="mx-auto flex max-w-[1312px] gap-2 overflow-x-auto pb-1 sm:flex-wrap sm:justify-center sm:gap-3">
            <?php foreach ($faq_groups as $slug => $group): ?>
                <a href="#<?php echo esc_attr($slug); ?>"
                    class="inline-flex min-h-11 shrink-0 items-center gap-2 rounded-full border border-line bg-white px-4 py-2 text-sm font-semibold text-[#151c27] !no-underline transition hover:border-brand hover:bg-brand-tint hover:text-brand sm:px-5">
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
                            <p class="mt-5 text-xs font-bold uppercase tracking-wide text-brand sm:text-sm">
                                <?php echo esc_html($group['eyebrow']); ?></p>
                            <h2 id="<?php echo esc_attr($slug); ?>-title"
                                class="mt-2 [font-family:'Hanken_Grotesk',sans-serif] text-[28px] font-bold leading-tight text-[#151c27] sm:text-3xl">
                                <?php echo esc_html($group['title']); ?>
                            </h2>
                            <p class="mt-3 max-w-[310px] text-sm leading-6 text-mid-gray sm:text-base">
                                <?php echo esc_html($group['intro']); ?></p>
                        </header>

                        <div class="space-y-3 sm:space-y-4" data-faq-group>
                            <?php foreach ($group['items'] as $index => $faq): ?>
                                <details
                                    class="group cursor-pointer rounded-xl border border-line bg-white p-5 shadow-[0_12px_28px_-12px_rgba(26,26,26,0.12)] transition open:border-brand/40 sm:p-6"
                                    data-faq-card <?php echo 0 === $index ? 'open' : ''; ?>>
                                    <summary
                                        class="cursor-pointer list-none text-base font-semibold leading-6 text-[#151c27] [&::-webkit-details-marker]:hidden sm:text-lg">
                                        <span class="flex items-start justify-between gap-5">
                                            <?php echo esc_html($faq['question']); ?>
                                            <span
                                                class="flex size-8 shrink-0 items-center justify-center rounded-full bg-brand-tint text-xl leading-none text-brand transition group-open:rotate-45"
                                                aria-hidden="true">+</span>
                                        </span>
                                    </summary>
                                    <p
                                        class="mt-4 max-w-[760px] border-t border-line pt-4 text-sm leading-6 text-mid-gray sm:text-base sm:leading-7">
                                        <?php echo esc_html($faq['answer']); ?></p>
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
            class="mx-auto flex max-w-[1100px] flex-col items-start justify-between gap-6 rounded-2xl bg-near-black px-6 py-8 text-white sm:px-8 sm:py-10 lg:flex-row lg:items-center lg:px-12">
            <div>
                <h2 class="[font-family:'Hanken_Grotesk',sans-serif] text-2xl font-bold sm:text-3xl">Ready to find your
                    TXA pathway?</h2>
                <p class="mt-2 max-w-[650px] text-sm leading-6 text-white/75 sm:text-base">Talk with the team about
                    suppliers, destinations, distribution or booking-system integration.</p>
            </div>
            <a href="<?php echo esc_url(home_url('/contact/')); ?>"
                class="inline-flex min-h-12 w-full shrink-0 items-center justify-center rounded-lg bg-brand px-6 py-3 font-bold text-white !no-underline hover:bg-brand-dark sm:w-auto">Contact
                TXA</a>
        </div>
    </section>
</article>

<?php get_footer();
