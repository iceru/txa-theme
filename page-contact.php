<?php

/**
 * Template Name: Contact Us
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

add_filter('pre_get_document_title', fn(): string => (string) txa_f('contact_seo_title', 'Contact TXA | Tourism Exchange Australia'));
add_action('wp_head', function (): void {
    if (is_page_template('page-contact.php')) echo '<meta name="description" content="' . esc_attr(txa_f('contact_seo_description', 'Contact Tourism Exchange Australia to find the right pathway for suppliers, destinations, distributors and booking-system partners.')) . '">' . "\n";
});
if (!function_exists('txa_contact_form_markup')) {
    function txa_contact_form_markup(): string
    {
        if (!shortcode_exists('contact-form-7')) return '<p class="text-sm leading-6 text-mid-gray">Contact Form 7 is required to display the enquiry form.</p>';
        $forms = get_posts(['post_type' => 'wpcf7_contact_form', 'post_status' => 'publish', 'numberposts' => 1, 'orderby' => 'date', 'order' => 'ASC']);
        return !empty($forms) ? do_shortcode(sprintf('[contact-form-7 id="%d" title="%s"]', (int)$forms[0]->ID, esc_attr($forms[0]->post_title))) : do_shortcode('[contact-form-7 title="Contact form 1"]');
    }
}
get_header();
$pathways = [
    ['Tourism Suppliers', "If you have tours, accommodation, or attractions, choose 'General Enquiry' or contact your current booking system provider to see if they are already integrated with TXA."],
    ['Distributors', "OTAs and wholesalers looking for high quality bookable Australian inventory should select 'Distributor Enquiry' to start the technical evaluation process."],
    ['Destinations', "Regional and State bodies should request the 'Smart Destination Demo' to understand the strategic benefits of our destination wide aggregation."],
    ['Booking Systems', "Tech providers wanting to offer their clients global distribution via TXA should select 'Booking-System Partner' for API documentation access."],
];

foreach ($pathways as $i => $pathway) {
    $n = $i + 1;
    $pathways[$i] = [
        txa_f("contact_pathway_{$n}_title", $pathway[0]),
        txa_f("contact_pathway_{$n}_copy", $pathway[1]),
    ];
}
?>
<article class="bg-white text-near-black [font-family:'Source_Sans_Pro',sans-serif]">
    <section class="bg-surface px-4 py-10 sm:py-12 lg:px-16 lg:py-24">
        <div class="mx-auto grid max-w-[1312px] gap-8 lg:grid-cols-[619px_1fr] lg:items-center lg:gap-12">
            <div>
                <p class="inline-flex w-fit max-w-full rounded-lg bg-brand px-4 py-2 text-sm font-bold sm:px-5 sm:py-3 sm:text-base leading-5 text-white"><?php echo esc_html(txa_f('contact_hero_label', 'CONTACT US')); ?></p>
                <h1 class="mt-5 [font-family:'Hanken_Grotesk',sans-serif] text-3xl font-bold leading-[1.12] tracking-[-.02em] text-[#151c27] sm:mt-6 sm:text-4xl lg:mt-8 lg:text-5xl lg:leading-[60px]"><?php echo esc_html(txa_f('contact_hero_title', 'Get in touch with Tourism Exchange Australia')); ?></h1>
                <p class="mt-5 max-w-[500px] text-base leading-7 text-mid-gray sm:mt-6 sm:text-lg lg:mt-8"><?php echo esc_html(txa_f('contact_hero_copy', 'Whether you are a tourism supplier, destination organisation, distributor or booking system partner, contact TXA to find the right pathway for your organisation.')); ?></p>
            </div>
            <div class="h-[240px] overflow-hidden rounded-lg border border-line sm:h-[320px] lg:h-[430px]"><img
                    src="<?php echo esc_url(txa_img('contact_hero_image', get_theme_file_uri('/images/contact.jpg'))); ?>"
                    alt="<?php echo esc_attr(txa_f('contact_hero_image_alt', 'Australian wildlife and landscape')); ?>" class="h-full w-full object-cover"></div>
        </div>
    </section>
    <section class="px-4 py-10 sm:py-12 lg:px-16 lg:py-8">
        <div class="mx-auto grid max-w-[1312px] gap-10 lg:grid-cols-[734px_1fr] lg:items-start lg:gap-8">
            <div class="rounded-2xl border border-[#dfc0ba]/20 bg-white p-5 shadow-sm sm:p-6 lg:rounded-3xl lg:p-8">
                <h2 class="[font-family:'Hanken_Grotesk',sans-serif] text-2xl font-bold leading-tight text-[#151c27] sm:text-3xl"><?php echo esc_html(txa_f('contact_form_heading', 'Send an Enquiry')); ?></h2>
                <div class="txa-contact-form mt-6 [&_input]:min-h-11 [&_input]:w-full [&_select]:min-h-11 [&_select]:w-full [&_textarea]:w-full sm:mt-8"><?php echo txa_contact_form_markup(); ?></div>
            </div>
            <aside>
                <h2 class="text-left [font-family:'Hanken_Grotesk',sans-serif] text-2xl font-bold text-[#151c27] sm:text-3xl lg:text-center"><?php echo esc_html(txa_f('contact_pathways_heading', 'Pathway Guidance')); ?></h2>
                <div class="mt-7 space-y-6 sm:mt-9 sm:space-y-8 lg:mt-12">
                    <?php foreach ($pathways as $index => $pathway): ?><article class="grid grid-cols-[40px_1fr] gap-4 sm:grid-cols-[48px_1fr] sm:gap-6"><span class="flex size-10 items-center justify-center rounded-full bg-brand text-sm text-white sm:size-12 sm:text-base"><?php echo esc_html($index + 1); ?></span>
                            <div>
                                <h3 class="text-lg font-semibold leading-6 text-[#151c27] sm:text-xl"><?php echo esc_html($pathway[0]); ?></h3>
                                <p class="mt-2 text-sm leading-6 text-mid-gray sm:text-base"><?php echo esc_html($pathway[1]); ?></p>
                            </div>
                        </article><?php endforeach; ?>
                </div>
            </aside>
        </div>
    </section>
</article>
<?php get_footer();
