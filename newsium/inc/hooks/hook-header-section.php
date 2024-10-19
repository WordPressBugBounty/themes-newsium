<?php
    if (!function_exists('newsium_header_section')) :
        /**
         * Banner Slider
         *
         * @since Newsium 1.0.0
         *
         */
        function newsium_header_section()
        {
            
            $header_layout = newsium_get_option('header_layout');
            ?>

            <header id="masthead" class="header-style1 <?php echo esc_attr($header_layout); ?>">
                
                <?php
                    
                    newsium_get_block('layout-1', 'header');
                
                
                ?>


                <div class="header-menu-part">
                    <div id="main-navigation-bar" class="bottom-bar">
                        <div class="navigation-section-wrapper">
                            <div class="container-wrapper">
                                <div class="header-middle-part">
                                    <div class="navigation-container">
                                        <nav class="main-navigation clearfix">
                                            <?php
                                                $global_show_home_menu = newsium_get_option('global_show_home_menu');
                                                if ($global_show_home_menu == 'yes'):
                                                    ?>
                                                    <span class="aft-home-icon">
                                        <?php $home_url = get_home_url(); ?>
                                                <a href="<?php echo esc_url($home_url); ?>">
                                            <i class="fa fa-home" aria-hidden="true"></i>
                                        </a>
                                    </span>
                                                <?php endif; ?>
                                            <span class="toggle-menu" aria-controls="primary-menu"
                                                  aria-expanded="false">
                                                 <a href="javascript:void(0)" class="aft-void-menu">
                                        <span class="screen-reader-text">
                                            <?php esc_html_e('Primary Menu', 'newsium'); ?>
                                        </span>
                                        <i class="ham"></i>
                                                      </a>
                                    </span>
                                            <?php
                                                $global_show_home_menu = newsium_get_option('global_show_home_menu_border');
                                                
                                                wp_nav_menu(array(
                                                    'theme_location' => 'aft-primary-nav',
                                                    'menu_id' => 'primary-menu',
                                                    'container' => 'div',
                                                    'container_class' => 'menu main-menu menu-desktop ' . $global_show_home_menu,
                                                ));
                                            ?>
                                        </nav>
                                    </div>
                                </div>
                                <div class="header-right-part">
                                    <div class="af-search-wrap">
                                        <div class="search-overlay">
                                            <a href="#" title="Search" class="search-icon">
                                                <i class="fa fa-search"></i>
                                            </a>
                                            <div class="af-search-form">
                                                <?php get_search_form(); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                        if (false != newsium_get_option('show_popular_tags_section')) :
                                            
                                            $show_popular_tags_title = newsium_get_option('show_popular_tags_title');
                                            $select_popular_tags_mode = newsium_get_option('select_popular_tags_mode');
                                            $number_of_popular_tags = newsium_get_option('number_of_popular_tags');
                                            $newsium_popular_taxonomies = newsium_list_popular_taxonomies($select_popular_tags_mode, $show_popular_tags_title, $number_of_popular_tags);
                                            
                                            if (!empty($newsium_popular_taxonomies)) { ?>
                                                <div class="popular-tags-dropdown">
                                                    <a href="javascript:void(0)"><i class="fa fa-fire"
                                                                                    aria-hidden="true"></i></a>
                                                    <div class="aft-popular-tags">
                                                        <?php newsium_display_list_popular_taxonomies($newsium_popular_taxonomies, $show_popular_tags_title) ?>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        <?php endif; ?>
                                    <?php
                                        $aft_enable_custom_link = newsium_get_option('show_watch_online_section');
                                        if ($aft_enable_custom_link):
                                            $aft_custom_link = newsium_get_option('aft_custom_link');
                                            $aft_custom_title = newsium_get_option('aft_custom_title');
                                            
                                            ?>
                                            <div class="custom-menu-link">
                                                <a href="<?php echo esc_url($aft_custom_link); ?>"><?php echo esc_html($aft_custom_title); ?></a>
                                            </div>
                                        
                                        <?php endif; ?>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- end slider-section -->
            <?php
        }
    endif;
    add_action('newsium_action_header_section', 'newsium_header_section', 40);