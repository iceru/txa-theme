<?php
/**
 * Template Name: Destinations Pricing
 * @package TailPress
 */
get_header();
$packages = [
 ['name'=>'Local','poi'=>'150','microsites'=>'1','concierge'=>'5'],
 ['name'=>'Regional','poi'=>'375','microsites'=>'2','concierge'=>'10','popular'=>true],
 ['name'=>'State','poi'=>'1,125','microsites'=>'5','concierge'=>'20'],
];
?>
<article class="bg-white text-near-black [font-family:'Source_Sans_Pro',sans-serif]">
<section class="relative min-h-[594px] overflow-hidden px-4 py-20 text-white lg:px-16 lg:py-24">
 <img src="https://images.unsplash.com/photo-1500534314209-a25ddb2bd429?auto=format&fit=crop&w=2200&q=85" alt="Australian destination landscape" class="absolute inset-0 h-full w-full object-cover">
 <div class="absolute inset-0 bg-near-black/45"></div>
 <div class="relative mx-auto max-w-[1312px]">
  <div class="max-w-[666px]">
   <p class="inline-flex rounded-lg bg-white px-6 py-3 text-xl font-bold text-brand">TXA FOR DESTINATIONS</p>
   <h1 class="mt-6 text-4xl font-semibold leading-tight sm:text-5xl lg:leading-[56px]">TXA Smart Destination<br>Packages</h1>
   <p class="mt-6 text-lg font-semibold leading-[30px]">TXA offers Smart Destination packages that match the scope and scale of your visitor economy. Each package is designed to give your destination access to platform infrastructure, supplier activation support, destination content activation and industry-facing tools without the risk of a custom technology build.</p>
   <div class="mt-6 flex flex-col gap-4 sm:flex-row"><a href="<?php echo esc_url(home_url('/apply-now/')); ?>" class="rounded-lg bg-white px-8 py-3 text-center text-lg font-bold text-brand !no-underline">Apply Now</a><a href="<?php echo esc_url(home_url('/request-demo/')); ?>" class="rounded-lg border border-white px-8 py-3 text-center text-lg font-bold text-white !no-underline">Request Demo</a></div>
  </div>
 </div>
</section>
<section class="px-4 py-16 lg:px-16">
 <div class="mx-auto max-w-[1280px]">
  <div class="text-center"><h2 class="[font-family:'Hanken_Grotesk',sans-serif] text-3xl font-bold text-[#151c27]">Choose Your Destination Scale</h2><p class="mt-4 text-base text-mid-gray">Scalable infrastructure designed for every level of the tourism ecosystem.</p></div>
  <div class="mt-16 grid gap-8 lg:grid-cols-3 lg:px-10">
   <?php foreach($packages as $package): ?>
   <article class="relative rounded-3xl <?php echo !empty($package['popular']) ? 'border-2 border-brand shadow-xl' : 'border border-[#dfc0ba]/30'; ?> bg-white p-8">
    <?php if(!empty($package['popular'])): ?><span class="absolute -top-3 left-1/2 -translate-x-1/2 rounded-full bg-brand px-4 py-1 text-xs tracking-wide text-white">MOST POPULAR</span><?php endif; ?>
    <h3 class="text-2xl font-semibold text-[#151c27]"><?php echo esc_html($package['name']); ?></h3>
    <ul class="mt-8 space-y-4 text-base">
     <?php $features=['PaaS subscription',$package['poi'].' POI assets input service','1 DMO website activation',$package['microsites'].' microsite '.($package['microsites']==='1'?'initiative':'initiatives').' p.a.','1 landing page for TXA Trade Portal',$package['concierge'].' Virtual Concierge initiatives']; foreach($features as $feature): ?>
     <li class="flex gap-3"><span class="text-brand">⊙</span><span><?php echo esc_html($feature); ?></span></li><?php endforeach; ?>
    </ul>
    <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="mt-10 block rounded-lg <?php echo !empty($package['popular']) ? 'bg-brand text-white' : 'border border-brand text-brand'; ?> px-4 py-3 text-center !no-underline">Select <?php echo esc_html($package['name']); ?> Package</a>
   </article><?php endforeach; ?>
  </div>
  <div class="mt-16 grid gap-8 rounded-3xl bg-surface p-8 lg:grid-cols-[1fr_360px] lg:items-center lg:p-12">
   <div><h2 class="text-2xl font-semibold text-[#151c27]">Set up and Training</h2><p class="mt-6 max-w-[536px] text-base leading-6 text-mid-gray">Every package includes a comprehensive onboarding phase to ensure your team and suppliers are ready to leverage the platform's full potential. This covers system configuration, initial data import, and hands-on training for your destination managers.</p></div>
   <div class="rounded-2xl border border-[#dfc0ba] bg-white p-8 text-center shadow-sm"><p class="text-sm tracking-[.1em] text-mid-gray">ONE-TIME CHARGE</p><p class="mt-2 text-sm italic text-mid-gray">Applied to all new package implementations</p></div>
  </div>
 </div>
</section>
</article>
<?php get_footer();
