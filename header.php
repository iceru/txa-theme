<?php
/**
 * Theme header template.
 *
 * @package TailPress
 */

if (!function_exists('txa_header_path_is_active')) {
    function txa_header_path_is_active(string $path, bool $include_children = false): bool
    {
        $current_path = isset($_SERVER['REQUEST_URI']) ? parse_url(wp_unslash($_SERVER['REQUEST_URI']), PHP_URL_PATH) : '/';
        $current_path = untrailingslashit($current_path ?: '/');
        $target_path = untrailingslashit(parse_url(home_url($path), PHP_URL_PATH) ?: '/');

        if ($current_path === $target_path) {
            return true;
        }

        return $include_children && '/' !== $target_path && str_starts_with($current_path . '/', $target_path . '/');
    }
}

if (!function_exists('txa_header_link_class')) {
    function txa_header_link_class(string $path, bool $include_children = false, string $extra_classes = ''): string
    {
        $state_classes = txa_header_path_is_active($path, $include_children)
            ? 'font-bold text-brand'
            : 'font-medium text-mid-gray';

        return trim($extra_classes . ' text-xs ' . $state_classes . ' !no-underline hover:text-brand');
    }
}
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

        <header class="sticky top-0 z-50 border-b border-line bg-white/95 px-4 backdrop-blur lg:px-16">
            <div class="mx-auto max-w-[1312px] py-3">
                <div class="lg:grid lg:grid-cols-[auto_1fr_auto] lg:items-center lg:gap-8">
                    <div class="flex items-center justify-between">
                        <div>
                            <?php if (has_custom_logo()): ?>
                                <?php the_custom_logo(); ?>
                            <?php else: ?>
                                <a href="<?php echo esc_url(home_url('/')); ?>" class="inline-flex !no-underline">
                                    <img src="<?php echo esc_url(get_theme_file_uri('/images/logo.png')); ?>"
                                        alt="<?php echo esc_attr(get_bloginfo('name')); ?>" class="h-10 w-auto">
                                </a>
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
                        <nav class="lg:justify-self-center" aria-label="Primary navigation">
                            <ul class="space-y-3 lg:flex lg:items-center lg:space-y-0 lg:-mx-4">
                                <li class="lg:mx-4"><a href="<?php echo esc_url(home_url('/suppliers/')); ?>"
                                        class="<?php echo esc_attr(txa_header_link_class('/suppliers/')); ?>">Suppliers</a>
                                </li>
                                <li class="relative lg:mx-4 lg:group">
                                    <?php $destinations_active = txa_header_path_is_active('/destinations/', true); ?>
                                    <div class="flex items-center gap-0.5">
                                        <a href="<?php echo esc_url(home_url('/destinations/')); ?>"
                                            class="<?php echo esc_attr(txa_header_link_class('/destinations/', true, 'translate-y-px')); ?>">Destinations</a>
                                        <button type="button"
                                            class="inline-flex size-6 translate-y-px items-center justify-center rounded <?php echo $destinations_active ? 'text-brand' : 'text-mid-gray'; ?> transition hover:text-brand mt-0.5"
                                            aria-expanded="false" aria-controls="destinations-submenu"
                                            aria-label="Toggle Destinations submenu" data-destinations-toggle>
                                            <i class="bi bi-chevron-down text-[10px] leading-none transition"
                                                aria-hidden="true"></i>
                                        </button>
                                    </div>
                                    <ul id="destinations-submenu"
                                        class="hidden mt-3 space-y-2 border-l border-line pl-4 lg:invisible lg:absolute lg:left-0 lg:top-full lg:z-50 lg:mt-2 lg:block lg:min-w-[240px] lg:space-y-0 lg:rounded-xl lg:border lg:border-line lg:bg-white lg:p-2 lg:pl-2 lg:opacity-0 lg:shadow-xl lg:transition lg:group-hover:visible lg:group-hover:opacity-100 lg:group-focus-within:visible lg:group-focus-within:opacity-100"
                                        data-destinations-submenu>
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
                                            <li><a href="<?php echo esc_url(home_url($destination_item[1])); ?>"
                                                    class="<?php echo esc_attr(txa_header_link_class($destination_item[1], false, 'block rounded-lg py-1 lg:px-3 lg:py-2.5 lg:hover:bg-surface')); ?>"><?php echo esc_html($destination_item[0]); ?></a>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </li>
                                <li class="lg:mx-4"><a href="<?php echo esc_url(home_url('/distributors/')); ?>"
                                        class="<?php echo esc_attr(txa_header_link_class('/distributors/')); ?>">Distributors</a>
                                </li>
                                <li class="lg:mx-4"><a href="<?php echo esc_url(home_url('/booking-systems/')); ?>"
                                        class="<?php echo esc_attr(txa_header_link_class('/booking-systems/', true)); ?>">Booking
                                        Systems</a></li>
                                <li class="lg:mx-4"><a href="<?php echo esc_url(home_url('/pricing/')); ?>"
                                        class="<?php echo esc_attr(txa_header_link_class('/pricing/')); ?>">Pricing</a>
                                </li>
                                <li class="lg:mx-4"><a href="<?php echo esc_url(home_url('/about/')); ?>"
                                        class="<?php echo esc_attr(txa_header_link_class('/about/')); ?>">About</a>
                                </li>
                                <li class="lg:mx-4"><a href="<?php echo esc_url(home_url('/contact/')); ?>"
                                        class="<?php echo esc_attr(txa_header_link_class('/contact/')); ?>">Contact</a>
                                </li>
                            </ul>
                        </nav>

                        <div class="mt-4 flex flex-col gap-3 sm:flex-row lg:mt-0 lg:justify-self-end">
                            <a href="<?php echo esc_url(home_url('/request-demo/')); ?>"
                                class="inline-flex items-center justify-center rounded-lg bg-brand px-5 py-2.5 font-bold text-white !no-underline hover:bg-brand-dark">Request
                                Demo</a>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div id="content" class="site-content grow">
            <?php do_action('tailpress_content_start'); ?>
            <main>
