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
                        <img src="<?php echo esc_url(get_theme_file_uri('/images/logo.png')); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>" class="h-10 w-auto brightness-0 invert">
                    </a>
                    <p class="mt-6 max-w-sm text-sm leading-7 text-white/70">
                        Australia's open, commercially neutral B2B tourism exchange for suppliers, destinations, distributors and booking-system partners.
                    </p>
                </div>

                <div class="grid gap-10 sm:grid-cols-2 lg:grid-cols-4">
                    <div>
                        <h2 class="text-xs font-semibold uppercase tracking-wide text-brand">Pathways</h2>
                        <ul class="mt-5 space-y-4 text-sm">
                            <li><a class="text-white/65 !no-underline hover:text-white" href="<?php echo esc_url(home_url('/suppliers/')); ?>">Suppliers</a></li>
                            <li><a class="text-white/65 !no-underline hover:text-white" href="<?php echo esc_url(home_url('/destinations/')); ?>">Destinations</a></li>
                            <li><a class="text-white/65 !no-underline hover:text-white" href="<?php echo esc_url(home_url('/distributors/')); ?>">Distributors</a></li>
                            <li><a class="text-white/65 !no-underline hover:text-white" href="<?php echo esc_url(home_url('/booking-systems/')); ?>">Booking Systems</a></li>
                        </ul>
                    </div>
                    <div>
                        <h2 class="text-xs font-semibold uppercase tracking-wide text-brand">Platform</h2>
                        <ul class="mt-5 space-y-4 text-sm">
                            <li><a class="text-white/65 !no-underline hover:text-white" href="<?php echo esc_url(home_url('/pricing/')); ?>">Pricing</a></li>
                            <li><a class="text-white/65 !no-underline hover:text-white" href="<?php echo esc_url(home_url('/data-insights/')); ?>">Data & Insights</a></li>
                            <li><a class="text-white/65 !no-underline hover:text-white" href="<?php echo esc_url(home_url('/resources/')); ?>">Resources</a></li>
                            <li><a class="text-white/65 !no-underline hover:text-white" href="<?php echo esc_url(home_url('/faqs/')); ?>">FAQs</a></li>
                        </ul>
                    </div>
                    <div>
                        <h2 class="text-xs font-semibold uppercase tracking-wide text-brand">Company</h2>
                        <ul class="mt-5 space-y-4 text-sm">
                            <li><a class="text-white/65 !no-underline hover:text-white" href="<?php echo esc_url(home_url('/about/')); ?>">About TXA</a></li>
                            <li><a class="text-white/65 !no-underline hover:text-white" href="<?php echo esc_url(home_url('/contact/')); ?>">Contact us</a></li>
                            <li><a class="text-white/65 !no-underline hover:text-white" href="<?php echo esc_url(home_url('/register-your-interest/')); ?>">Register your interest</a></li>
                            <li><a class="text-white/65 !no-underline hover:text-white" href="https://www.au.v3travel.com/">Dashboard Login</a></li>
                        </ul>
                    </div>
                    <div>
                        <h2 class="text-xs font-semibold uppercase tracking-wide text-brand">Legal</h2>
                        <ul class="mt-5 space-y-4 text-sm">
                            <li><a class="text-white/65 !no-underline hover:text-white" href="<?php echo esc_url(home_url('/privacy-policy/')); ?>">Privacy Policy</a></li>
                            <li><a class="text-white/65 !no-underline hover:text-white" href="<?php echo esc_url(home_url('/terms-of-use/')); ?>">Terms of Use</a></li>
                        </ul>
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
