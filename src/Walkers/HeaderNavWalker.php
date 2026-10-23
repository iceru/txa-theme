<?php

namespace TailPress\Walkers;

/**
 * Renders the primary header navigation with the same markup the templates
 * previously hardcoded, including the Tailwind active states and dropdown.
 *
 * Target support: any menu item ticked as "Open in new tab" in Appearance →
 * Menus gets target="_blank" rel="noopener noreferrer".
 */
class HeaderNavWalker extends \Walker_Nav_Menu
{
    private bool $has_children = false;

    private int $current_parent_id = 0;

    private function path(\WP_Post $item): string
    {
        return (string) parse_url($item->url ?? '', PHP_URL_PATH);
    }

    private function target_attr(\WP_Post $item): string
    {
        return '_blank' === $item->target
            ? ' target="_blank" rel="noopener noreferrer"'
            : '';
    }

    private function state_classes(string $path, bool $include_children = false): string
    {
        return txa_header_path_is_active($path, $include_children)
            ? 'font-bold text-brand'
            : 'font-medium text-mid-gray';
    }

    private function link_class(string $path, bool $include_children = false, string $extra_classes = ''): string
    {
        return trim($extra_classes . ' text-sm ' . $this->state_classes($path, $include_children) . ' !no-underline hover:text-brand');
    }

    public function display_element($element, &$children_elements, $max_depth, $depth = 0, $args = [], &$output = '')
    {
        $this->has_children = isset($children_elements[$element->ID]);

        return parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
    }

    public function start_lvl(&$output, $depth = 0, $args = null)
    {
        if (0 === $depth) {
            $output .= sprintf(
                '<ul id="menu-item-%d-submenu" class="hidden mt-3 space-y-2 border-l border-line pl-4 lg:invisible lg:absolute lg:left-0 lg:top-full lg:z-50 lg:mt-2 lg:block lg:min-w-[240px] lg:space-y-0 lg:rounded-xl lg:border lg:border-line lg:bg-white lg:p-2 lg:pl-2 lg:opacity-0 lg:shadow-xl lg:transition" data-destinations-submenu>',
                (int) $this->current_parent_id
            );
        }
    }

    public function end_lvl(&$output, $depth = 0, $args = null)
    {
        if (0 === $depth) {
            $output .= '</ul></li>';
        }
    }

    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
    {
        $path = $this->path($item);
        $title = apply_filters('the_title', $item->title, $item->ID);
        $target = $this->target_attr($item);

        if (0 === $depth) {
            $this->current_parent_id = (int) $item->ID;

            if ($this->has_children) {
                $output .= sprintf(
                    '<li class="relative lg:mx-4"><button type="button" class="%s" aria-expanded="false" aria-haspopup="true" aria-controls="menu-item-%d-submenu" data-destinations-toggle><span>%s</span><i class="bi bi-chevron-down ml-0.5 text-sm leading-none transition" aria-hidden="true"></i></button>',
                    esc_attr($this->link_class($path, true,
                        'inline-flex w-full items-center justify-between gap-1 rounded py-1 lg:w-auto lg:justify-start')),
                    (int) $item->ID,
                    esc_html($title)
                );
                return;
            }

            $output .= sprintf(
                '<li class="lg:mx-4"><a href="%s" class="%s"%s>%s</a>',
                esc_url($item->url),
                esc_attr($this->link_class($path, false, 'block py-1')),
                $target,
                esc_html($title)
            );
            return;
        }

        $output .= sprintf(
            '<li><a href="%s" class="%s"%s>%s</a>',
            esc_url($item->url),
            esc_attr($this->link_class($path, false, 'block rounded-lg py-1 lg:px-3 lg:py-2.5 lg:hover:bg-surface')),
            $target,
            esc_html($title)
        );
    }

    public function end_el(&$output, $item, $depth = 0, $args = null)
    {
        if ((0 === $depth && !$this->has_children) || $depth > 0) {
            $output .= '</li>';
        }
    }
}
