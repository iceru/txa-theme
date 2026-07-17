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

        <header class="sticky top-0 z-50 border-b border-line/80 bg-white/95 backdrop-blur">
            <div class="container mx-auto py-4">
                <div class="lg:flex lg:justify-between lg:items-center">
                    <div class="flex justify-between items-center">
                        <div>
                            <?php if (has_custom_logo()): ?>
                                <?php the_custom_logo(); ?>
                            <?php else: ?>
                                <div class="flex items-center gap-2">
                                    <a href="<?php echo esc_url(home_url('/')); ?>"
                                        class="!no-underline text-xl font-semibold tracking-tight text-brand">
                                        TXA
                                    </a>
                                    <!-- <span class="hidden sm:inline text-sm font-medium text-mid-gray">Tourism Exchange Australia</span> -->
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
                        class="hidden lg:flex lg:bg-transparent gap-6 items-start lg:items-center border border-line lg:border-none rounded p-4 lg:p-0 mt-4 lg:mt-0">
                        <nav>
                            <?php if (has_nav_menu('primary')): ?>
                                <?php
                                wp_nav_menu([
                                    'container_id' => 'primary-menu',
                                    'container_class' => '',
                                    'menu_class' => 'space-y-3 lg:space-y-0 lg:flex lg:items-center lg:-mx-3 [&_a]:!no-underline [&_a]:text-sm [&_a]:font-medium [&_a]:text-mid-gray [&_a:hover]:text-brand-text',
                                    'theme_location' => 'primary',
                                    'li_class' => 'lg:mx-3',
                                    'fallback_cb' => false,
                                ]);
                                ?>
                            <?php else: ?>
                                <ul class="space-y-3 lg:space-y-0 lg:flex lg:items-center lg:-mx-3">
                                    <?php
                                    $txa_menu_items = ['Home', 'Suppliers', 'Destinations', 'Distributors', 'Booking Systems', 'Pricing', 'Resources', 'About', 'Contact'];
                                    foreach ($txa_menu_items as $item):
                                        $url = 'Home' === $item ? home_url('/') : home_url('/' . sanitize_title($item) . '/');
                                        ?>
                                        <li class="lg:mx-3">
                                            <a href="<?php echo esc_url($url); ?>"
                                                class="!no-underline text-sm font-medium text-mid-gray hover:text-brand-text">
                                                <?php echo esc_html($item); ?>
                                            </a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        </nav>

                        <div class="flex flex-col sm:flex-row gap-3 mt-4 lg:mt-0">
                            <!-- <a href="<?php echo esc_url(home_url('/apply-now/')); ?>"
                                class="inline-flex items-center justify-center rounded bg-brand px-4 py-2 text-sm font-semibold text-white !no-underline hover:bg-brand-dark">Apply
                                Now</a> -->
                            <a href="<?php echo esc_url(home_url('/request-demo/')); ?>"
                                class="inline-flex items-center justify-center rounded-lg border border-line px-4 py-2 text-sm font-semibold text-near-black !no-underline hover:bg-surface">Request
                                Demo</a>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div id="content" class="site-content grow">
            <?php do_action('tailpress_content_start'); ?>
            <main>