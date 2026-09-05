<?php
/**
 * Theme header template.
 *
 * @package TailPress
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <?php wp_head(); ?>
</head>

<body <?php body_class('bg-white text-near-black antialiased'); ?>>
    <?php do_action('tailpress_site_before'); ?>

    <div id="page" class="min-h-screen flex flex-col">
        <?php do_action('tailpress_header'); ?>

        <header class="sticky top-0 z-50 border-b border-line bg-white/95 backdrop-blur">
            <div class="container mx-auto py-3">
                <div class="lg:grid lg:grid-cols-[auto_1fr_auto] lg:items-center lg:gap-8">
                    <div class="flex items-center justify-between">
                        <div>
                            <?php if (has_custom_logo()): ?>
                                <?php the_custom_logo(); ?>
                            <?php else: ?>
                                <a href="<?php echo esc_url(home_url('/')); ?>" class="text-xl font-bold tracking-tight text-brand !no-underline">TXA</a>
                            <?php endif; ?>
                        </div>

                        <div class="lg:hidden">
                            <button type="button" aria-label="Toggle navigation" id="primary-menu-toggle"
                                class="inline-flex size-11 items-center justify-center rounded border border-line text-mid-gray">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div id="primary-navigation" class="hidden items-start rounded border border-line p-4 mt-4 lg:col-span-2 lg:mt-0 lg:grid lg:grid-cols-[1fr_auto] lg:items-center lg:gap-8 lg:border-none lg:bg-transparent lg:p-0">
                        <nav class="lg:justify-self-center" aria-label="Primary navigation">
                            <ul class="space-y-3 lg:flex lg:items-center lg:space-y-0 lg:-mx-4">
                                <li class="lg:mx-4"><a href="<?php echo esc_url(home_url('/suppliers/')); ?>" class="text-xs font-medium text-mid-gray !no-underline hover:text-brand-text">Suppliers</a></li>
                                <li class="relative lg:mx-4 lg:group">
                                    <a href="<?php echo esc_url(home_url('/destinations/')); ?>" class="inline-flex items-center gap-1 text-xs font-medium text-mid-gray !no-underline hover:text-brand-text">Destinations <span class="text-[10px]" aria-hidden="true">⌄</span></a>
                                    <ul class="mt-3 space-y-2 border-l border-line pl-4 lg:invisible lg:absolute lg:left-0 lg:top-full lg:z-50 lg:mt-2 lg:min-w-[240px] lg:space-y-0 lg:rounded-xl lg:border lg:border-line lg:bg-white lg:p-2 lg:pl-2 lg:opacity-0 lg:shadow-xl lg:transition lg:group-hover:visible lg:group-hover:opacity-100">
                                        <?php
                                        $destination_items = [
                                            ['Overview', '/destinations/'],
                                            ['Pricing', '/destinations/pricing/'],
                                            ['POI & Experiences', '/destinations/poi-experiences/'],
                                            ['Trade Portal', '/destinations/trade-portal/'],
                                            ['Microsite Campaigns', '/destinations/microsite-campaigns/'],
                                            ['Virtual Concierge', '/destinations/virtual-concierge/'],
                                        ];
                                        foreach ($destination_items as $destination_item): ?>
                                            <li><a href="<?php echo esc_url(home_url($destination_item[1])); ?>" class="block rounded-lg py-1 text-xs font-medium text-mid-gray !no-underline hover:text-brand-text lg:px-3 lg:py-2.5 lg:hover:bg-surface"><?php echo esc_html($destination_item[0]); ?></a></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </li>
                                <li class="lg:mx-4"><a href="<?php echo esc_url(home_url('/distributors/')); ?>" class="text-xs font-medium text-mid-gray !no-underline hover:text-brand-text">Distributors</a></li>
                                <li class="lg:mx-4"><a href="<?php echo esc_url(home_url('/booking-systems/')); ?>" class="text-xs font-medium text-mid-gray !no-underline hover:text-brand-text">Booking Systems</a></li>
                                <li class="lg:mx-4"><a href="<?php echo esc_url(home_url('/pricing/')); ?>" class="text-xs font-medium text-mid-gray !no-underline hover:text-brand-text">Pricing</a></li>
                                <li class="lg:mx-4"><a href="<?php echo esc_url(home_url('/resources/')); ?>" class="text-xs font-medium text-mid-gray !no-underline hover:text-brand-text">Resources</a></li>
                                <li class="lg:mx-4"><a href="<?php echo esc_url(home_url('/about/')); ?>" class="text-xs font-medium text-mid-gray !no-underline hover:text-brand-text">About</a></li>
                                <li class="lg:mx-4"><a href="<?php echo esc_url(home_url('/contact/')); ?>" class="text-xs font-medium text-mid-gray !no-underline hover:text-brand-text">Contact</a></li>
                            </ul>
                        </nav>

                        <div class="mt-4 flex flex-col gap-3 sm:flex-row lg:mt-0 lg:justify-self-end">
                            <a href="<?php echo esc_url(home_url('/request-demo/')); ?>" class="inline-flex items-center justify-center rounded-lg bg-brand px-5 py-2.5 text-sm font-bold text-white !no-underline hover:bg-brand-dark">Request Demo</a>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div id="content" class="site-content grow">
            <?php do_action('tailpress_content_start'); ?>
            <main>
