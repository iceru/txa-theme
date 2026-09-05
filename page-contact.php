<?php
/**
 * Template Name: Contact Us
 * @package TailPress
 */
add_filter('pre_get_document_title', fn(): string => 'Contact TXA | Tourism Exchange Australia');
add_action('wp_head', function (): void { if (is_page_template('page-contact.php')) echo '<meta name="description" content="'.esc_attr('Contact Tourism Exchange Australia to find the right pathway for suppliers, destinations, distributors and booking-system partners.').'">'."\n"; });
if (!function_exists('txa_contact_form_markup')) {
 function txa_contact_form_markup(): string {
  if (!shortcode_exists('contact-form-7')) return '<p class="text-sm leading-6 text-mid-gray">Contact Form 7 is required to display the enquiry form.</p>';
  $forms=get_posts(['post_type'=>'wpcf7_contact_form','post_status'=>'publish','numberposts'=>1,'orderby'=>'date','order'=>'ASC']);
  return !empty($forms) ? do_shortcode(sprintf('[contact-form-7 id="%d" title="%s"]',(int)$forms[0]->ID,esc_attr($forms[0]->post_title))) : do_shortcode('[contact-form-7 title="Contact form 1"]');
 }
}
get_header();
$pathways=[
 ['Tourism Suppliers',"If you have tours, accommodation, or attractions, choose 'General Enquiry' or contact your current booking system provider to see if they are already integrated with TXA."],
 ['Distributors',"OTAs and wholesalers looking for high quality bookable Australian inventory should select 'Distributor Enquiry' to start the technical evaluation process."],
 ['Destinations',"Regional and State bodies should request the 'Smart Destination Demo' to understand the strategic benefits of our destination wide aggregation."],
 ['Booking Systems',"Tech providers wanting to offer their clients global distribution via TXA should select 'Booking-System Partner' for API documentation access."],
];
?>
<article class="bg-white text-near-black [font-family:'Source_Sans_Pro',sans-serif]">
<section class="bg-surface px-4 py-16 lg:px-16 lg:py-24">
 <div class="mx-auto grid max-w-[1312px] gap-12 lg:grid-cols-[619px_1fr] lg:items-center">
  <div><p class="inline-flex rounded-lg bg-brand px-4 py-2 text-base font-bold text-white">CONTACT US</p><h1 class="mt-8 [font-family:'Hanken_Grotesk',sans-serif] text-4xl font-bold leading-tight tracking-[-.02em] text-[#151c27] lg:text-5xl lg:leading-[60px]">Get in touch with Tourism Exchange Australia</h1><p class="mt-8 max-w-[500px] text-lg leading-7 text-mid-gray">Whether you are a tourism supplier, destination organisation, distributor or booking system partner, contact TXA to find the right pathway for your organisation.</p></div>
  <div class="h-[320px] overflow-hidden rounded-lg border border-line lg:h-[430px]"><img src="https://images.unsplash.com/photo-1523482580672-f109ba8cb9be?auto=format&fit=crop&w=1400&q=85" alt="Australian wildlife and landscape" class="h-full w-full object-cover"></div>
 </div>
</section>
<section class="px-4 py-16 lg:px-16 lg:py-8">
 <div class="mx-auto grid max-w-[1312px] gap-8 lg:grid-cols-[734px_1fr] lg:items-start">
  <div class="rounded-3xl border border-[#dfc0ba]/20 bg-white p-6 shadow-sm lg:p-8"><h2 class="[font-family:'Hanken_Grotesk',sans-serif] text-3xl font-bold text-[#151c27]">Send an Enquiry</h2><div class="txa-contact-form mt-8"><?php echo txa_contact_form_markup(); ?></div></div>
  <aside class="lg:pl-0"><h2 class="text-center [font-family:'Hanken_Grotesk',sans-serif] text-3xl font-bold text-[#151c27]">Pathway Guidance</h2><div class="mt-12 space-y-8">
   <?php foreach($pathways as $index=>$pathway): ?><article class="grid grid-cols-[48px_1fr] gap-6"><span class="flex size-12 items-center justify-center rounded-full bg-brand text-base text-white"><?php echo esc_html($index+1); ?></span><div><h3 class="text-xl font-semibold text-[#151c27]"><?php echo esc_html($pathway[0]); ?></h3><p class="mt-2 text-base leading-6 text-mid-gray"><?php echo esc_html($pathway[1]); ?></p></div></article><?php endforeach; ?>
  </div></aside>
 </div>
</section>
</article>
<?php get_footer();
