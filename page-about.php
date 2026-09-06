<?php
/**
 * Template Name: About TXA
 * @package TailPress
 */

add_filter('pre_get_document_title', fn(): string => 'About TXA | Tourism Exchange Australia');
add_action('wp_head', function (): void {
    if (is_page_template('page-about.php')) {
        echo '<meta name="description" content="' . esc_attr('Learn how TXA became Australia\'s open B2B tourism exchange for suppliers, destinations, distributors and booking systems.') . '">' . "\n";
    }
});

get_header();

$what_txa_does = [
 ['title'=>'Suppliers','copy'=>'All categories, styles and sizes of accommodation, activities, experiences, and events seeking broad local and global visibility','icon'=>'<path d="M4 10h16l-1 10H5L4 10Z"/><path d="M7 10V7a5 5 0 0 1 10 0v3"/><path d="M8 14h.01M12 14h.01M16 14h.01"/>'],
 ['title'=>'Destinations','copy'=>'National, State, regional and city tourism organisations marketing and empowering local businesses to go digital.','icon'=>'<path d="M4 5v14"/><path d="M4 6c3-2 5 2 8 0s5 2 8 0v11c-3 2-5-2-8 0s-5-2-8 0"/>'],
 ['title'=>'Distributors','copy'=>'All marketing/sales channels including global OTAs, tourism and travel and niche websites, social media and travel agents','icon'=>'<circle cx="12" cy="12" r="8"/><path d="M4 12h16"/><path d="M12 4a12 12 0 0 1 0 16"/><path d="M12 4a12 12 0 0 0 0 16"/>'],
 ['title'=>'Booking Systems','copy'=>'Electronic booking and inventory management systems used in the tourism industry','icon'=>'<path d="M5 7h14"/><path d="M7 7l-2 10h14L17 7"/><path d="M9 17l1-10"/><path d="M15 17l-1-10"/><path d="M8 12h8"/>'],
];
$countries=['United Kingdom','Japan','Saudi Arabia','United States'];
$timeline=[
 ['title'=>'Identifying the Need','copy'=>'Tourism bodies recognize the lack of digital connectivity for small operators.'],
 ['title'=>'Global Tender','copy'=>'A rigorous selection process to find the world\'s best exchange architecture.'],
 ['title'=>'National Backing','copy'=>'All STOs and Federal organizations align to support a single national standard.'],
 ['title'=>'Rapid Adoption','copy'=>'Thousands of suppliers connect via a growing network of booking systems.'],
 ['title'=>'Global Expansion','copy'=>'The underlying technology exports to international markets like the UK and US.'],
 ['title'=>'The Future Hub','copy'=>'Evolving with data insights to drive Australia\'s tourism productivity.'],
];
?>
<article class="bg-white text-near-black [font-family:'Source_Sans_Pro',sans-serif]">
<section class="px-4 pt-6 sm:pt-8 lg:px-10">
 <div class="mx-auto max-w-[1360px]"><div class="relative flex min-h-[460px] items-center overflow-hidden rounded-2xl px-6 py-14 sm:min-h-[520px] sm:px-8 sm:py-20 md:min-h-[600px] md:py-24">
  <img src="https://images.unsplash.com/photo-1523482580672-f109ba8cb9be?auto=format&fit=crop&w=2200&q=85" alt="Australian tourism landscape" class="absolute inset-0 h-full w-full object-cover"><div class="absolute inset-0 bg-near-black/55 sm:bg-near-black/45"></div>
  <div class="relative z-10 max-w-[760px]"><p class="inline-flex rounded-lg bg-brand px-4 py-2 text-xs font-bold uppercase tracking-wide text-white sm:text-sm">About Us</p><h1 class="mt-4 [font-family:'Hanken_Grotesk',sans-serif] text-3xl font-semibold leading-[1.1] text-white sm:text-4xl md:text-5xl md:leading-[56px]">Built for Australia’s tourism industry</h1><p class="mt-4 max-w-[660px] text-sm font-semibold leading-6 text-white sm:text-base sm:leading-7 md:text-lg md:leading-[30px]">Our journey started in Australia, being selected through a global tender in 2008 to partner with the Australian Tourism Data Warehouse (ATDW) and then backed by State and Federal GTOs. We operate as the structural backbone that allows local operators to compete on a global scale while maintaining their commercial independence.</p></div>
 </div></div>
</section>
<section class="px-4 py-12 sm:py-14 lg:px-16 lg:py-16"><div class="mx-auto max-w-[1312px]"><h2 class="[font-family:'Hanken_Grotesk',sans-serif] text-3xl font-bold tracking-[-.01em] text-[#151c27]">What TXA does</h2><p class="mt-4 text-base leading-7 text-[#151c27] sm:mt-6 sm:text-lg sm:leading-[29px]">Tourism Exchange Australia is Australia’s open B2B tourism exchange. It connects tourism suppliers, destinations, distributors and booking systems so live tourism products can be found, marketed, booked and measured online.</p><div class="mt-10 grid gap-5 sm:grid-cols-2 sm:mt-12 xl:mt-16 xl:grid-cols-4 xl:gap-6"><?php foreach($what_txa_does as $card): ?><article class="rounded-xl border border-[#dfc0ba]/10 bg-white p-6 shadow-sm sm:min-h-[210px] sm:p-8"><svg class="size-7 text-brand" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><?php echo $card['icon']; ?></svg><h3 class="mt-4 [font-family:'Hanken_Grotesk',sans-serif] text-xl font-semibold text-[#151c27]"><?php echo esc_html($card['title']); ?></h3><p class="mt-2 text-sm leading-6 text-mid-gray"><?php echo esc_html($card['copy']); ?></p></article><?php endforeach; ?></div></div></section>
<section class="bg-brand px-4 py-12 text-white sm:py-14 lg:px-16 lg:py-16"><div class="mx-auto grid max-w-[1280px] gap-8 lg:grid-cols-[672px_1fr] lg:items-center lg:gap-24"><div><h2 class="[font-family:'Hanken_Grotesk',sans-serif] text-3xl font-bold leading-tight tracking-[-.01em]">Proven exchange technology, built for Australia</h2><p class="mt-4 text-base leading-7 text-white/90 sm:mt-6 sm:text-lg sm:leading-[29px]">Today, the same exchange technology powers tourism platforms in the UK, Japan, Saudi Arabia, and the US. TXA remains Australia’s own—tailored for our unique geography and market dynamics.</p></div><div class="grid grid-cols-1 gap-4 sm:grid-cols-2 sm:gap-6 lg:gap-x-8 lg:gap-y-8"><?php foreach($countries as $country): ?><div class="flex items-center gap-2 rounded-lg border border-white/15 bg-white/5 p-3 text-sm text-white sm:border-0 sm:bg-transparent sm:p-0 sm:text-base"><svg class="size-5 shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 10c0 5-8 11-8 11S4 15 4 10a8 8 0 1 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg><?php echo esc_html(strtoupper($country)); ?></div><?php endforeach; ?></div></div></section>
<section class="bg-surface px-4 py-14 sm:py-16 lg:px-16 lg:py-24"><div class="mx-auto max-w-[1280px]"><h2 class="text-center [font-family:'Hanken_Grotesk',sans-serif] text-3xl font-bold leading-tight tracking-[-.01em] text-[#151c27]">How TXA became Australia’s tourism exchange</h2><div class="relative mx-auto mt-10 max-w-[896px] sm:mt-12 lg:mt-16"><div class="absolute bottom-0 left-5 top-0 w-0.5 bg-brand/20 sm:left-6 md:left-1/2 md:-translate-x-1/2" aria-hidden="true"></div><div class="space-y-10 sm:space-y-12 md:space-y-24"><?php foreach($timeline as $index=>$item): $is_left=0===$index%2; ?><div class="relative grid min-h-[56px] grid-cols-1 pl-16 sm:pl-20 md:grid-cols-2 md:gap-16 md:pl-0"><div class="<?php echo $is_left ? 'md:pr-8 md:text-right' : 'md:col-start-2 md:pl-8'; ?>"><h3 class="[font-family:'Hanken_Grotesk',sans-serif] text-base font-semibold text-[#151c27]"><?php echo esc_html($item['title']); ?></h3><p class="mt-1 text-sm leading-5 text-mid-gray"><?php echo esc_html($item['copy']); ?></p></div><span class="absolute left-0 top-0 flex size-10 items-center justify-center rounded-full border-4 border-[#e7eefe] bg-brand text-sm font-bold text-white sm:size-12 sm:text-base md:left-1/2 md:-translate-x-1/2"><?php echo esc_html($index+1); ?></span></div><?php endforeach; ?></div></div></div></section>
</article>
<?php get_footer();
