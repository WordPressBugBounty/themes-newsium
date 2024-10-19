<?php
if (!function_exists('newsium_front_page_main_section_1')) :
    /**
     * Banner Slider
     *
     * @since Newsium 1.0.0
     *
     */
    function newsium_front_page_main_section_1()
    {
        $newsium_enable_main_slider = newsium_get_option('show_main_news_section');

        ?>

        <?php do_action('newsium_action_banner_exclusive_posts'); ?>
        <?php if ($newsium_enable_main_slider): ?>

        <?php

        $dir = 'ltr';
        if (is_rtl()) {
            $dir = 'rtl';
        }
        $newsium_slider_mode = newsium_get_option('select_main_banner_section_mode');
        $newsium_class = $newsium_slider_mode;
        $newsium_banner_layout_mode = newsium_get_option('select_banner_layout_mode');
        if ($newsium_banner_layout_mode == 'boxed') {

            $newsium_class .= ' af-main-banner-boxed';

        }
        ?>
        <section
                class="aft-blocks aft-main-banner-section banner-carousel-1-wrap bg-fixed <?php echo $newsium_class; ?>"
                dir="<?php echo esc_attr($dir); ?>">
            <?php
            if (is_active_sidebar('home-above-main-banner-widgets')): ?>
                <div class="main-banner-widget-wrapper">
                    <div class="main-banner-widget-section">
                        <?php dynamic_sidebar('home-above-main-banner-widgets'); ?>
                    </div>
                </div>
            <?php endif; ?>
            <?php do_action('newsium_action_banner_featured_section'); ?>
            <?php


            if ($newsium_slider_mode != 'none'):
                $newsium_enable_gaps_between_thumbs = newsium_get_option('enable_gaps_between_thumbs');
                $thumb_gaps = '';
                if ($newsium_enable_gaps_between_thumbs) {
                    $thumb_gaps = 'aft-add-gaps-between';

                    if ($newsium_slider_mode == 'grid') {
                        $thumb_gaps .= ' aft-main-grid-layout-wrapper';
                    }
                }


                ?>


            <?php
                $wrapper_class = 'aft-main-banner';
                $newsium_show_trending_carousel_section = newsium_get_option('show_trending_carousel_section');
                $newsium_select_default_carousel_layout = newsium_get_option('select_default_carousel_layout');
                $newsium_select_trending_carousel_section_mode = newsium_get_option('select_trending_carousel_section_mode');
                $newsium_select_trending_carousel_section_mode_grid = newsium_get_option('select_trending_carousel_section_mode_grid');

                if($newsium_show_trending_carousel_section){
                    if ($newsium_slider_mode == 'default') {
                        if (($newsium_select_trending_carousel_section_mode == 'top') || ($newsium_select_trending_carousel_section_mode == 'left')) {
                            $wrapper_class .= '-trending-' . $newsium_select_trending_carousel_section_mode;
                        } elseif (($newsium_select_trending_carousel_section_mode == 'bottom') || ($newsium_select_trending_carousel_section_mode == 'right')) {
                            $wrapper_class .= '-trending-' . $newsium_select_trending_carousel_section_mode;
                        }
                    }
                }


                ?>

                <!-- <div class="banner-carousel-1 af-widget-carousel owl-carousel owl-theme"> -->
                <div class="aft-main-banner-wrapper clearfix <?php echo esc_attr($thumb_gaps); ?>">
                    <div class="aft-banner-box-wrapper af-container-row clearfix <?php echo esc_attr($wrapper_class); ?>">
                        <?php






                        if ($newsium_slider_mode == 'grid') {
                            $col_class_75 = 'col-1';
                            $col_class_25 = 'col-1';
                        } elseif ($newsium_show_trending_carousel_section == false) {
                            $col_class_75 = 'col-1 pad';
                            $col_class_25 = 'col-1  pad';
                        } else {
                            if (($newsium_select_trending_carousel_section_mode == 'bottom') || ($newsium_select_trending_carousel_section_mode == 'top')) {
                                $col_class_75 = 'col-1 pad';
                                $col_class_25 = 'col-1  pad';
                            } else {
                                $col_class_75 = 'col-75 pad';
                                $col_class_25 = 'col-4 pad';
                            }
                        }

                        ?>

                        <?php

                        $newsium_top_left = false;
                        $newsium_bottom_right = false;
                        if ($newsium_slider_mode == 'grid' && ($newsium_select_trending_carousel_section_mode_grid == 'top')) {
                            $newsium_top_left = true;
                            $col_class_25 .= ' ' . $newsium_select_trending_carousel_section_mode_grid;
                        }elseif ($newsium_slider_mode == 'grid' && ($newsium_select_trending_carousel_section_mode_grid == 'bottom')) {
                            $newsium_bottom_right = true;
                            $col_class_25 .= ' ' . $newsium_select_trending_carousel_section_mode_grid;
                        } else {
                            if (($newsium_select_trending_carousel_section_mode == 'top') || ($newsium_select_trending_carousel_section_mode == 'left')) {
                                $newsium_top_left = true;
                                $col_class_25 .= ' ' . $newsium_select_trending_carousel_section_mode;
                            }elseif(($newsium_select_trending_carousel_section_mode == 'bottom') || ($newsium_select_trending_carousel_section_mode == 'right')){
                                $newsium_bottom_right = true;
                                $col_class_25 .= ' ' . $newsium_select_trending_carousel_section_mode;
                            }

                        }

                        if ($newsium_top_left): ?>
                            <?php if ($newsium_show_trending_carousel_section): ?>
                                <div class="af-trending-news-part float-l <?php echo esc_attr($col_class_25); ?> ">
                                    <?php do_action('newsium_action_banner_trending_posts'); ?>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>


                        <div class="aft-carousel-part float-l <?php echo esc_attr($col_class_75); ?>">
                            <?php newsium_get_block('carousel-alternate', 'banner'); ?>
                        </div>

                        <?php
                        if ($newsium_bottom_right): ?>
                            <?php if ($newsium_show_trending_carousel_section): ?>
                                <div class="af-trending-news-part float-l <?php echo esc_attr($col_class_25); ?> ">
                                    <?php do_action('newsium_action_banner_trending_posts'); ?>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>


                    </div>
                </div>
            <?php endif; ?>

            <?php
            if (is_active_sidebar('home-below-main-banner-widgets')): ?>
                <div class="main-banner-widget-wrapper">
                    <div class="main-banner-widget-section">
                        <?php dynamic_sidebar('home-below-main-banner-widgets'); ?>
                    </div>
                </div>
            <?php endif; ?>

        </section>
    <?php endif; ?>

        <!-- end slider-section -->
        <?php
    }
endif;
add_action('newsium_action_front_page_main_section_1', 'newsium_front_page_main_section_1', 40);