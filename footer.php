<?php

/**
 * Theme footer template.
 *
 * @package TailPress
 */
?>
</main>

<?php do_action('tailpress_content_end'); ?>
</div>

<?php do_action('tailpress_content_after'); ?>

<footer id="colophon" class="bg-near-black px-4 text-white lg:px-16" role="contentinfo">
    <div class="mx-auto max-w-[1312px] py-16 lg:py-20">
        <?php do_action('tailpress_footer'); ?>
        <div class="grid gap-12 lg:grid-cols-[1.15fr_1.85fr]">
            <div>
                <a href="<?php echo esc_url(home_url('/')); ?>" class="inline-flex !no-underline">
                    <img src="<?php echo esc_url(get_theme_file_uri('/images/logo.png')); ?>"
                        alt="<?php echo esc_attr(get_bloginfo('name')); ?>" class="h-10 w-auto brightness-0 invert">
                </a>
                <p class="mt-6 max-w-sm text-sm leading-7 text-white/70">
                    Australia's open, commercially neutral B2B tourism exchange for suppliers, destinations,
                    distributors and booking system partners.
                </p>
            </div>

            <div class="grid gap-10 sm:grid-cols-2 lg:grid-cols-4">
                <div>
                    <h2 class="text-xs font-semibold uppercase tracking-wide text-brand">Pathways</h2>
                    <?php
                    wp_nav_menu([
                        'theme_location' => 'footer_pathways',
                        'container' => false,
                        'menu_class' => 'mt-5 space-y-4 text-sm',
                        'depth' => 1,
                        'fallback_cb' => 'txa_footer_menu_fallback',
                        'walker' => new TailPress\Walkers\FooterNavWalker(),
                    ]);
                    ?>
                </div>
                <div>
                    <h2 class="text-xs font-semibold uppercase tracking-wide text-brand">Platform</h2>
                    <?php
                    wp_nav_menu([
                        'theme_location' => 'footer_platform',
                        'container' => false,
                        'menu_class' => 'mt-5 space-y-4 text-sm',
                        'depth' => 1,
                        'fallback_cb' => 'txa_footer_menu_fallback',
                        'walker' => new TailPress\Walkers\FooterNavWalker(),
                    ]);
                    ?>
                </div>
                <div>
                    <h2 class="text-xs font-semibold uppercase tracking-wide text-brand">Company</h2>
                    <?php
                    wp_nav_menu([
                        'theme_location' => 'footer_company',
                        'container' => false,
                        'menu_class' => 'mt-5 space-y-4 text-sm',
                        'depth' => 1,
                        'fallback_cb' => 'txa_footer_menu_fallback',
                        'walker' => new TailPress\Walkers\FooterNavWalker(),
                    ]);
                    ?>
                </div>
                <div>
                    <h2 class="text-xs font-semibold uppercase tracking-wide text-brand">Legal</h2>
                    <?php
                    wp_nav_menu([
                        'theme_location' => 'footer_legal',
                        'container' => false,
                        'menu_class' => 'mt-5 space-y-4 text-sm',
                        'depth' => 1,
                        'fallback_cb' => 'txa_footer_menu_fallback',
                        'walker' => new TailPress\Walkers\FooterNavWalker(),
                    ]);
                    ?>
                </div>
            </div>
        </div>

        <div class="mt-14 border-t border-white/10 pt-7 text-sm text-white/65">
            Copyright 2016 - <?php echo esc_html(date_i18n('Y')); ?> TXA | All Rights Reserved
        </div>
    </div>
</footer>
</div>

<?php wp_footer(); ?>
</body>

</html>