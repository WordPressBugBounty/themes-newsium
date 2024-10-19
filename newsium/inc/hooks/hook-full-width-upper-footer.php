<?php

/**
 * Front page section additions.
 */


if (!function_exists('newsium_full_width_upper_footer_section')) :
    /**
     *
     * @since Newsium 1.0.0
     *
     * @param null
     * @return null
     *
     */
    function newsium_full_width_upper_footer_section()
    {

        if (1 == newsium_get_option('frontpage_show_latest_posts')) {
            newsium_get_block('latest');
        }

    }
endif;
add_action('newsium_action_full_width_upper_footer_section', 'newsium_full_width_upper_footer_section');
