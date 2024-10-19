<?php

// Load widget base.
require_once get_template_directory() . '/inc/widgets/widgets-base.php';

/* Theme Widget sidebars. */
require get_template_directory() . '/inc/widgets/widgets-register-sidebars.php';

/* Theme Widget sidebars. */
require get_template_directory() . '/inc/widgets/widgets-common-functions.php';

/* Theme Widgets*/

require get_template_directory() . '/inc/widgets/widget-trending-posts-carousel.php';
require get_template_directory() . '/inc/widgets/widget-posts-double-category.php';
require get_template_directory() . '/inc/widgets/widget-posts-single-column.php';
require get_template_directory() . '/inc/widgets/widget-posts-grid.php';
require get_template_directory() . '/inc/widgets/widget-posts-tabbed.php';
require get_template_directory() . '/inc/widgets/widget-social-contacts.php';
require get_template_directory() . '/inc/widgets/widget-author-info.php';
require get_template_directory() . '/inc/widgets/widget-posts-slider.php';



/* Register site widgets */
if ( ! function_exists( 'newsium_widgets' ) ) :
    /**
     * Load widgets.
     *
     * @since 1.0.0
     */
    function newsium_widgets() {

        register_widget( 'Newsium_Trending_Posts_Carousel' );
        register_widget( 'Newsium_Double_Col_Categorised_Posts' );
        register_widget( 'Newsium_Single_Col_Categorised_Posts' );
        register_widget( 'Newsium_Posts_Grid' );
        register_widget( 'Newsium_Tabbed_Posts' );
        register_widget( 'Newsium_Social_Contacts' );
        register_widget( 'Newsium_author_info' );
        register_widget( 'Newsium_Posts_Slider' );

    }
endif;
add_action( 'widgets_init', 'newsium_widgets' );
