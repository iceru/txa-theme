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

    <footer id="colophon" class="border-t border-line bg-near-black text-white" role="contentinfo">
        <div class="container mx-auto py-14">
            <?php do_action('tailpress_footer'); ?>
            <div class="grid gap-10 lg:grid-cols-[1.1fr_1.9fr]">
                <div>
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="!no-underline text-2xl font-semibold tracking-tight text-white">TXA</a>
                    <p class="mt-3 max-w-sm text-sm leading-6 text-white/65">
                        Australia's open, commercially neutral B2B tourism exchange for suppliers, destinations, distributors and booking-system partners.
                    </p>
                    <div class="mt-6 flex flex-col gap-3 sm:flex-row lg:flex-col xl:flex-row">
                        <a href="<?php echo esc_url(home_url('/apply-now/')); ?>" class="inline-flex items-center justify-center rounded-lg bg-brand px-4 py-2 text-sm font-semibold text-white !no-underline hover:bg-brand-dark">Apply Now</a>
                        <a href="<?php echo esc_url(home_url('/request-demo/')); ?>" class="inline-flex items-center justify-center rounded-lg border border-brand px-4 py-2 text-sm font-semibold text-white !no-underline hover:bg-white/5">Request Demo</a>
                    </div>
                </div>

                <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-4">
                    <div>
                        <h2 class="text-sm font-semibold uppercase tracking-wide text-brand">Pathways</h2>
                        <ul class="mt-4 space-y-3 text-sm">
                            <li><a class="text-white/65 !no-underline hover:text-white" href="<?php echo esc_url(home_url('/suppliers/')); ?>">Suppliers</a></li>
                            <li><a class="text-white/65 !no-underline hover:text-white" href="<?php echo esc_url(home_url('/destinations/')); ?>">Destinations</a></li>
                            <li><a class="text-white/65 !no-underline hover:text-white" href="<?php echo esc_url(home_url('/distributors/')); ?>">Distributors</a></li>
                            <li><a class="text-white/65 !no-underline hover:text-white" href="<?php echo esc_url(home_url('/booking-systems/')); ?>">Booking Systems</a></li>
                        </ul>
                    </div>
                    <div>
                        <h2 class="text-sm font-semibold uppercase tracking-wide text-brand">Platform</h2>
                        <ul class="mt-4 space-y-3 text-sm">
                            <li><a class="text-white/65 !no-underline hover:text-white" href="<?php echo esc_url(home_url('/pricing/')); ?>">Pricing</a></li>
                            <li><a class="text-white/65 !no-underline hover:text-white" href="<?php echo esc_url(home_url('/data-insights/')); ?>">Data & Insights</a></li>
                            <li><a class="text-white/65 !no-underline hover:text-white" href="<?php echo esc_url(home_url('/resources/')); ?>">Resources</a></li>
                            <li><a class="text-white/65 !no-underline hover:text-white" href="<?php echo esc_url(home_url('/faqs/')); ?>">FAQs</a></li>
                        </ul>
                    </div>
                    <div>
                        <h2 class="text-sm font-semibold uppercase tracking-wide text-brand">Company</h2>
                        <ul class="mt-4 space-y-3 text-sm">
                            <li><a class="text-white/65 !no-underline hover:text-white" href="<?php echo esc_url(home_url('/about/')); ?>">About TXA</a></li>
                            <li><a class="text-white/65 !no-underline hover:text-white" href="<?php echo esc_url(home_url('/contact/')); ?>">Contact us</a></li>
                            <li><a class="text-white/65 !no-underline hover:text-white" href="<?php echo esc_url(home_url('/register-your-interest/')); ?>">Register your interest</a></li>
                            <li><a class="text-white/65 !no-underline hover:text-white" href="https://www.au.v3travel.com/">Dashboard Login</a></li>
                        </ul>
                    </div>
                    <div>
                        <h2 class="text-sm font-semibold uppercase tracking-wide text-brand">Legal</h2>
                        <ul class="mt-4 space-y-3 text-sm">
                            <li><a class="text-white/65 !no-underline hover:text-white" href="<?php echo esc_url(home_url('/privacy-policy/')); ?>">Privacy Policy</a></li>
                            <li><a class="text-white/65 !no-underline hover:text-white" href="<?php echo esc_url(home_url('/terms-of-use/')); ?>">Terms of Use</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="mt-12 border-t border-white/10 pt-6 text-sm text-white/65">
                Copyright 2016 - <?php echo esc_html(date_i18n('Y')); ?> &copy; <?php bloginfo('name'); ?> | All Rights Reserved
            </div>
        </div>
    </footer>
</div>

<?php wp_footer(); ?>
</body>
</html>
