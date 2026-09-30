<?php
/**
 * Audience-specific FAQs shown at the end of participant pages.
 *
 * @package TailPress
 */

$group = $args['group'] ?? '';
$faq_groups = [
    'suppliers' => [
        'title' => 'Supplier FAQs',
        'items' => [
            ['question' => 'Do I need a booking system?', 'answer' => 'Usually TXA works through a connected booking system. If you do not have one, TXA can help you understand available options.'],
            ['question' => 'Will I have to manage another system?', 'answer' => 'The goal is to reduce manual management by using your booking system as the source of product, rates and availability.'],
            ['question' => 'Can I keep personal contact with customers?', 'answer' => 'Yes. The customer remains your customer, with booking and customer information flowing according to the relevant channel and payment model.'],
            ['question' => 'What size business is TXA designed for?', 'answer' => 'TXA is designed for tourism suppliers of different sizes across accommodation, activities, attractions, events and experiences.'],
        ],
    ],
    'destinations' => [
        'title' => 'Destination FAQs',
        'items' => [
            ['question' => 'Does this replace our existing CMS?', 'answer' => 'No. TXA can work alongside your existing destination website or CMS by powering bookable pathways, widgets, APIs and destination-specific booking pages.'],
            ['question' => 'How much does it cost operators?', 'answer' => 'Commercial models can vary by destination. TXA is designed to support flexible destination packages and supplier pathways.'],
            ['question' => 'Is TXA an OTA (Online Travel Agent)?', 'answer' => 'No. TXA is a neutral B2B exchange connecting suppliers, destinations, distributors and booking systems.'],
        ],
    ],
    'distributors' => [
        'title' => 'Distributor FAQs',
        'items' => [
            ['question' => 'What inventory can distributors access through TXA?', 'answer' => 'TXA provides a pathway to Australian tourism suppliers across accommodation, tours, attractions, events and experiences.'],
            ['question' => 'How can a distributor connect to TXA?', 'answer' => 'Connection options include a direct API, white-label booking pages, an on-account or agent model, and campaign or destination-led distribution.'],
            ['question' => 'Does TXA support different commercial models?', 'answer' => 'Yes. TXA supports flexible commercial arrangements, including net, gross and commission-based models, depending on the distributor agreement.'],
        ],
    ],
    'booking-systems' => [
        'title' => 'Booking-system FAQs',
        'items' => [
            ['question' => 'What does a TXA integration offer booking-system customers?', 'answer' => 'A TXA integration can give operator customers access to broader destination, distributor and trade channels through Australia’s national tourism exchange.'],
            ['question' => 'How is product availability kept current?', 'answer' => 'Connected systems can exchange live product, pricing and availability updates so booking data remains accurate across the network.'],
            ['question' => 'Why connect once through TXA?', 'answer' => 'A single TXA integration can reduce the need to manage separate technical connections for each participating distribution relationship.'],
        ],
    ],
];

if (!isset($faq_groups[$group])) {
    return;
}

$faq_group = $faq_groups[$group];
?>
<section class="bg-surface px-4 py-10 sm:py-14 lg:px-16 lg:py-16" aria-labelledby="participant-faq-title">
    <div class="mx-auto max-w-[1000px]">
        <p class="text-xs font-bold uppercase tracking-wide text-brand">Common questions</p>
        <h2 id="participant-faq-title" class="mt-2 [font-family:'Hanken_Grotesk',sans-serif] text-2xl font-bold text-[#151c27] sm:text-3xl">
            <?php echo esc_html($faq_group['title']); ?>
        </h2>
        <div class="mt-6 space-y-3" data-faq-group>
            <?php foreach ($faq_group['items'] as $index => $faq): ?>
                <details class="group rounded-xl border border-line bg-white p-5 shadow-sm" data-faq-card <?php echo 0 === $index ? 'open' : ''; ?>>
                    <summary class="cursor-pointer list-none text-base font-semibold leading-6 text-[#151c27] [&::-webkit-details-marker]:hidden">
                        <span class="flex items-start justify-between gap-5">
                            <?php echo esc_html($faq['question']); ?>
                            <span class="flex size-8 shrink-0 items-center justify-center rounded-full bg-brand-tint text-xl text-brand transition group-open:rotate-45" aria-hidden="true">+</span>
                        </span>
                    </summary>
                    <p class="mt-4 border-t border-line pt-4 text-sm leading-6 text-mid-gray sm:text-base sm:leading-7">
                        <?php echo esc_html($faq['answer']); ?>
                    </p>
                </details>
            <?php endforeach; ?>
        </div>
        <a class="mt-6 inline-flex font-semibold text-brand underline" href="<?php echo esc_url(home_url('/faqs/#' . $group)); ?>">View all FAQs</a>
    </div>
</section>
