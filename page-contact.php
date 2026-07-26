<?php
/**
 * Template Name: Contact Us
 *
 * @package TailPress
 */

add_filter('pre_get_document_title', function (): string {
    return 'Contact TXA | Tourism Exchange Australia';
});

add_action('wp_head', function (): void {
    if (is_page_template('page-contact.php')) {
        echo '<meta name="description" content="' . esc_attr('Contact Tourism Exchange Australia to find the right pathway for suppliers, destinations, distributors and booking-system partners.') . '">' . "\n";
    }
});

if (!function_exists('txa_contact_form_markup')) {
    function txa_contact_form_markup(): string
    {
        if (!shortcode_exists('contact-form-7')) {
            return '<p class="text-sm leading-6 text-mid-gray">Contact Form 7 is required to display the enquiry form.</p>';
        }

        $forms = get_posts([
            'post_type' => 'wpcf7_contact_form',
            'post_status' => 'publish',
            'numberposts' => 1,
            'orderby' => 'date',
            'order' => 'ASC',
        ]);

        if (!empty($forms)) {
            return do_shortcode(sprintf('[contact-form-7 id="%d" title="%s"]', (int) $forms[0]->ID, esc_attr($forms[0]->post_title)));
        }

        return do_shortcode('[contact-form-7 title="Contact form 1"]');
    }
}

get_header();

$focus_points = [
    'Aggregate all regional inventory.',
    'Direct-to-operator booking flows.',
    'Real-time performance analytics.',
];

$pathways = [
    [
        'title' => 'Tourism Suppliers',
        'copy' => 'If you have tours, accommodation, or attractions, choose General Enquiry or contact your current booking system provider to see if they are already integrated with TXA.',
    ],
    [
        'title' => 'Distributors',
        'copy' => 'OTAs and wholesalers looking for high-quality Australian inventory should select Distributor Enquiry to start the technical vetting process.',
    ],
    [
        'title' => 'Destinations',
        'copy' => 'Regional and State bodies should request the Smart Destination Demo to understand the strategic benefits of our destination-wide aggregation.',
    ],
    [
        'title' => 'Booking Systems',
        'copy' => 'Tech providers wanting to offer their clients global distribution via TXA should select Booking-System Partner for API documentation access.',
    ],
];
?>

<article class="bg-white text-near-black">
    <section class="bg-surface px-4 py-14 lg:px-8 lg:py-24">
        <div class="container mx-auto">
            <div class="grid gap-10 lg:grid-cols-2 lg:items-center">
                <div class="max-w-2xl">
                    <p class="inline-flex rounded bg-brand px-4 py-2 text-xs font-bold uppercase tracking-wide text-white">
                        Contact Us
                    </p>
                    <h1 class="mt-8 text-4xl font-semibold leading-tight md:text-6xl">
                        Get in touch with Tourism Exchange Australia
                    </h1>
                    <p class="mt-8 text-lg leading-8 text-mid-gray">
                        Whether you are a tourism supplier, destination organisation, distributor or booking-system partner, contact TXA to find the right pathway for your organisation.
                    </p>
                </div>
                <div class="overflow-hidden rounded-lg shadow-sm">
                    <img src="https://images.unsplash.com/photo-1506973035872-a4ec16b8e8d9?auto=format&fit=crop&w=1200&q=80"
                        alt="Brisbane river and city wheel"
                        class="h-full min-h-[280px] w-full object-cover">
                </div>
            </div>
        </div>
    </section>

    <section class="px-4 py-14 lg:px-8 lg:py-24">
        <div class="container mx-auto">
            <div class="grid gap-8 lg:grid-cols-[1.15fr_.75fr] lg:items-start">
                <div class="rounded-lg border border-line bg-white p-6 shadow-sm md:p-8">
                    <h2 class="text-3xl font-semibold leading-tight md:text-4xl">Send an Enquiry</h2>
                    <div class="txa-contact-form mt-8">
                        <?php echo txa_contact_form_markup(); ?>
                    </div>
                </div>

                <aside class="rounded-lg bg-brand p-8 text-white shadow-xl shadow-brand/20 md:p-10">
                    <svg class="size-9 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M3 17 9 11l4 4 7-9"/>
                        <path d="M14 6h6v6"/>
                        <path d="M5 21h14"/>
                    </svg>
                    <h2 class="mt-7 text-2xl font-semibold">Smart Destination Focus</h2>
                    <p class="mt-6 text-base leading-7 text-white/90">
                        For Destination Marketing Organisations (DMOs), TXA provides a unique bridge between inspiration and conversion.
                    </p>
                    <ul class="mt-7 space-y-4">
                        <?php foreach ($focus_points as $point): ?>
                            <li class="flex gap-3 text-sm font-semibold leading-6">
                                <svg class="mt-0.5 size-5 shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <circle cx="12" cy="12" r="9"/>
                                    <path d="m8 12 2.5 2.5L16 9"/>
                                </svg>
                                <?php echo esc_html($point); ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </aside>
            </div>
        </div>
    </section>

    <section class="bg-surface px-4 py-14 lg:px-8 lg:py-24">
        <div class="container mx-auto">
            <h2 class="text-center text-3xl font-semibold leading-tight md:text-4xl">Pathway Guidance</h2>
            <div class="mt-14 grid gap-x-16 gap-y-12 lg:grid-cols-2">
                <?php foreach ($pathways as $index => $pathway): ?>
                    <article class="grid grid-cols-[3rem_1fr] gap-5">
                        <span class="flex size-11 items-center justify-center rounded-full bg-brand text-base font-bold text-white shadow-lg shadow-brand/20">
                            <?php echo esc_html($index + 1); ?>
                        </span>
                        <div>
                            <h3 class="text-xl font-semibold"><?php echo esc_html($pathway['title']); ?></h3>
                            <p class="mt-3 text-base leading-7 text-mid-gray"><?php echo esc_html($pathway['copy']); ?></p>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</article>

<?php
get_footer();
