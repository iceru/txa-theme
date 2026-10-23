<?php

namespace TailPress\Walkers;

/**
 * Renders a footer link column. Target support: any menu item ticked as
 * "Open in new tab" in Appearance → Menus gets target="_blank"
 * rel="noopener noreferrer".
 */
class FooterNavWalker extends \Walker_Nav_Menu
{
    public function start_lvl(&$output, $depth = 0, $args = null)
    {
    }

    public function end_lvl(&$output, $depth = 0, $args = null)
    {
    }

    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
    {
        $target = '_blank' === $item->target
            ? ' target="_blank" rel="noopener noreferrer"'
            : '';

        $output .= sprintf(
            '<li><a href="%s" class="text-white/65 !no-underline hover:text-white"%s>%s</a></li>',
            esc_url($item->url),
            $target,
            esc_html(apply_filters('the_title', $item->title, $item->ID))
        );
    }
}
