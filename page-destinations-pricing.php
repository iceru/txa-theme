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
<section class="relative min-h-[500px] overflow-hidden px-4 py-14 text-white sm:min-h-[540px] sm:py-16 lg:min-h-[594px] lg:px-16 lg:py-24">
 <img src="https://images.unsplash.com/photo-1500534314209-a25ddb2bd429?auto=format&fit=crop&w=2200&q=85" alt="Australian destination landscape" class="absolute inset-0 h-full w-full object-cover">
 <div class="absolute inset-0 bg-near-black/55 sm:bg-near-black/45"></div>
 <div class="relative mx-auto flex min-h-[390px] max-w-[1312px] items-center sm:min-h-[420px] lg:min-h-0">
  <div class="max-w-[666px]">
   <p class="inline-flex rounded-lg bg-white px-4 py-2 text-sm font-bold text-brand sm:px-6 sm:py-3 sm:text-lg lg:text-xl">TXA FOR DESTINATIONS</p>
   <h1 class="mt-5 text-3xl font-semibold leading-[1.1] sm:mt-6 sm:text-5xl lg:leading-[56px]">TXA Smart Destination<br class="hidden sm:block"> Packages</h1>
   <p class="mt-5 text-base font-semibold leading-7 sm:mt-6 sm:text-lg sm:leading-[30px]">TXA offers Smart Destination packages that match the scope and scale of your visitor economy. Each package is designed to give your destination access to platform infrastructure, supplier activation support, destination content activation and industry-facing tools without the risk of a custom technology build.</p>
   <div class="mt-6 flex flex-col gap-3 sm:flex-row sm:gap-4"><a href="<?php echo esc_url(home_url('/apply-now/')); ?>" class="inline-flex min-h-12 w-full items-center justify-center rounded-lg bg-white px-6 py-3 text-center text-base font-bold text-brand !no-underline sm:w-auto sm:px-8 sm:text-lg">Apply Now</a><a href="<?php echo esc_url(home_url('/request-demo/')); ?>" class="inline-flex min-h-12 w-full items-center justify-center rounded-lg border border-white px-6 py-3 text-center text-base font-bold text-white !no-underline sm:w-auto sm:px-8 sm:text-lg">Request Demo</a></div>
  </div>
 </div>
</section>
<section class="px-4 py-12 sm:py-14 lg:px-16 lg:py-16">
 <div class="mx-auto max-w-[1280px]">
  <div class="text-center"><h2 class="[font-family:'Hanken_Grotesk',sans-serif] text-3xl font-bold leading-tight text-[#151c27]">Choose Your Destination Scale</h2><p class="mx-auto mt-3 max-w-[640px] text-sm leading-6 text-mid-gray sm:mt-4 sm:text-base">Scalable infrastructure designed for every level of the tourism ecosystem.</p></div>
  <div class="mt-10 grid gap-5 sm:mt-12 sm:grid-cols-2 lg:mt-16 lg:grid-cols-3 lg:gap-8 lg:px-10">
   <?php foreach($packages as $package): ?>
   <article class="relative rounded-2xl <?php echo !empty($package['popular']) ? 'border-2 border-brand shadow-xl' : 'border border-[#dfc0ba]/30'; ?> bg-white p-6 sm:rounded-3xl sm:p-8">
    <?php if(!empty($package['popular'])): ?><span class="absolute -top-3 left-1/2 -translate-x-1/2 whitespace-nowrap rounded-full bg-brand px-4 py-1 text-[10px] tracking-wide text-white sm:text-xs">MOST POPULAR</span><?php endif; ?>
    <h3 class="text-2xl font-semibold text-[#151c27]"><?php echo esc_html($package['name']); ?></h3>
    <ul class="mt-6 space-y-3 text-sm leading-6 sm:mt-8 sm:space-y-4 sm:text-base">
     <?php $features=['PaaS subscription',$package['poi'].' POI assets input service','1 DMO website activation',$package['microsites'].' microsite '.($package['microsites']==='1'?'initiative':'initiatives').' p.a.','1 landing page for TXA Trade Portal',$package['concierge'].' Virtual Concierge initiatives']; foreach($features as $feature): ?>
     <li class="flex gap-3"><span class="shrink-0 text-brand">⊙</span><span><?php echo esc_html($feature); ?></span></li><?php endforeach; ?>
    </ul>
    <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="mt-8 inline-flex min-h-12 w-full items-center justify-center rounded-lg <?php echo !empty($package['popular']) ? 'bg-brand text-white' : 'border border-brand text-brand'; ?> px-4 py-3 text-center font-semibold !no-underline sm:mt-10">Select <?php echo esc_html($package['name']); ?> Package</a>
   </article><?php endforeach; ?>
  </div>
  <div class="mt-12 grid gap-6 rounded-2xl bg-surface p-6 sm:mt-14 sm:p-8 lg:mt-16 lg:grid-cols-[1fr_360px] lg:items-center lg:p-12">
   <div><h2 class="text-2xl font-semibold leading-tight text-[#151c27]">Set up and Training</h2><p class="mt-4 max-w-[536px] text-sm leading-6 text-mid-gray sm:mt-6 sm:text-base">Every package includes a comprehensive onboarding phase to ensure your team and suppliers are ready to leverage the platform's full potential. This covers system configuration, initial data import, and hands-on training for your destination managers.</p></div>
   <div class="rounded-2xl border border-[#dfc0ba] bg-white p-6 text-center shadow-sm sm:p-8"><p class="text-xs tracking-[.1em] text-mid-gray sm:text-sm">ONE-TIME CHARGE</p><p class="mt-2 text-sm italic leading-6 text-mid-gray">Applied to all new package implementations</p></div>
  </div>
 </div>
</section>
</article>
<?php get_footer();
