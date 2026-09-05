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
                    <div class="flex justify-between items-center">
                        <div>
                            <?php if (has_custom_logo()): ?>
                                <?php the_custom_logo(); ?>
                            <?php else: ?>
                                <div class="flex items-center gap-2">
                                    <a href="<?php echo esc_url(home_url('/')); ?>"
                                        class="!no-underline text-xl font-bold tracking-tight text-brand">TXA</a>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="lg:hidden">
                            <button type="button" aria-label="Toggle navigation" id="primary-menu-toggle"
                                class="inline-flex size-11 items-center justify-center rounded border border-line text-mid-gray">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div id="primary-navigation"
                        class="hidden items-start rounded border border-line p-4 mt-4 lg:col-span-2 lg:mt-0 lg:grid lg:grid-cols-[1fr_auto] lg:items-center lg:gap-8 lg:border-none lg:bg-transparent lg:p-0">
                        <nav class="lg:justify-self-center">
                            <?php if (has_nav_menu('primary')): ?>
                                <?php
                                wp_nav_menu([
                                    'container_id' => 'primary-menu',
                                    'container_class' => '',
                                    'menu_class' => 'space-y-3 lg:space-y-0 lg:flex lg:items-center lg:-mx-4 [&_a]:!no-underline [&_a]:text-xs [&_a]:font-medium [&_a]:text-mid-gray [&_a:hover]:text-brand-text [&_.menu-item-has-children]:relative [&_.menu-item-has-children>a]:inline-flex [&_.menu-item-has-children>a]:items-center [&_.menu-item-has-children>a]:gap-1 [&_.menu-item-has-children>a:after]:content-["⌄"] [&_.sub-menu]:mt-3 [&_.sub-menu]:space-y-2 [&_.sub-menu]:pl-4 lg:[&_.sub-menu]:invisible lg:[&_.sub-menu]:absolute lg:[&_.sub-menu]:left-0 lg:[&_.sub-menu]:top-full lg:[&_.sub-menu]:z-50 lg:[&_.sub-menu]:mt-2 lg:[&_.sub-menu]:min-w-[230px] lg:[&_.sub-menu]:space-y-0 lg:[&_.sub-menu]:rounded-xl lg:[&_.sub-menu]:border lg:[&_.sub-menu]:border-line lg:[&_.sub-menu]:bg-white lg:[&_.sub-menu]:p-2 lg:[&_.sub-menu]:pl-2 lg:[&_.sub-menu]:opacity-0 lg:[&_.sub-menu]:shadow-xl lg:[&_.sub-menu]:transition lg:[&_.menu-item-has-children:hover_.sub-menu]:visible lg:[&_.menu-item-has-children:hover_.sub-menu]:opacity-100 lg:[&_.sub-menu_a]:block lg:[&_.sub-menu_a]:rounded-lg lg:[&_.sub-menu_a]:px-3 lg:[&_.sub-menu_a]:py-2.5 lg:[&_.sub-menu_a:hover]:bg-surface',
                                    'theme_location' => 'primary',
                                    'li_class' => 'lg:mx-4',
                                    'fallback_cb' => false,
                                ]);
                                ?>
                            <?php else: ?>
                                <ul class="space-y-3 lg:flex lg:items-center lg:space-y-0 lg:-mx-4">
                                    <li class="lg:mx-4"><a href="<?php echo esc_url(home_url('/suppliers/')); ?>" class="!no-underline text-xs font-medium text-mid-gray hover:text-brand-text">Suppliers</a></li>
                                    <li class="relative lg:mx-4 lg:group">
                                        <a href="<?php echo esc_url(home_url('/destinations/')); ?>" class="inline-flex items-center gap-1 !no-underline text-xs font-medium text-mid-gray hover:text-brand-text">Destinations <span aria-hidden="true">⌄</span></a>
                                        <ul class="mt-3 space-y-2 pl-4 lg:invisible lg:absolute lg:left-0 lg:top-full lg:z-50 lg:mt-2 lg:min-w-[230px] lg:space-y-0 lg:rounded-xl lg:border lg:border-line lg:bg-white lg:p-2 lg:pl-2 lg:opacity-0 lg:shadow-xl lg:transition lg:group-hover:visible lg:group-hover:opacity-100">
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
                                    <?php
                                    $txa_menu_items = [
                                        ['Distributors', '/distributors/'],
                                        ['Booking Systems', '/booking-systems/'],
                                        ['Pricing', '/pricing/'],
                                        ['Resources', '/resources/'],
                                        ['About', '/about/'],
                                        ['Contact', '/contact/'],
                                    ];
                                    foreach ($txa_menu_items as $item): ?>
                                        <li class="lg:mx-4"><a href="<?php echo esc_url(home_url($item[1])); ?>" class="!no-underline text-xs font-medium text-mid-gray hover:text-brand-text"><?php echo esc_html($item[0]); ?></a></li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        </nav>

                        <div class="flex flex-col sm:flex-row gap-3 mt-4 lg:mt-0 lg:justify-self-end">
                            <a href="<?php echo esc_url(home_url('/request-demo/')); ?>"
                                class="inline-flex items-center justify-center rounded-lg bg-brand px-5 py-2.5 text-sm font-bold text-white !no-underline hover:bg-brand-dark">Request Demo</a>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div id="content" class="site-content grow">
            <?php do_action('tailpress_content_start'); ?>
            <main>
