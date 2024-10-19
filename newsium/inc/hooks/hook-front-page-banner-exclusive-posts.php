<?php
if (!function_exists('newsium_banner_exclusive_posts')):
    /**
     * Ticker Slider
     *
     * @since Newsium 1.0.0
     *
     */
    function newsium_banner_exclusive_posts()
    {
        $secondry_menu_opt = newsium_get_option('show_secondary_menu_section');
        if ($secondry_menu_opt == true) {
            ?>
            <div class="af-secondary-menu">
                <div class="container-wrapper">
                    <?php if (has_nav_menu('aft-secondary-nav')): ?>
                        <div class="aft-secondary-nav-wrapper">
                            <div class="aft-small-secondary-nav">
                                <?php
                                wp_nav_menu(array(
                                    'theme_location' => 'aft-secondary-nav',
                                    'menu_id' => 'aft-secondary-menu',
                                    'container' => 'div',
                                    'container_class' => 'aft-secondary-navigation'
                                ));
                                ?>
                            </div>
                        </div>
                    <?php endif;
                    ?>

                </div>
            </div>
            <?php
        }


        if (false != newsium_get_option('show_flash_news_section')) :
            //$dir = '';
            //$em_ticker_news_mode = newsium_get_option('select_flash_new_mode');
            $em_ticker_news_mode = 'aft-flash-slide left';
            $dir = 'left';
            if (is_rtl()) {
                $em_ticker_news_mode = 'aft-flash-slide right';
                $dir = 'right';
            }
            ?>
            <div class="banner-exclusive-posts-wrapper clearfix">

                <?php
                $category = newsium_get_option('select_flash_news_category');
                $number_of_posts = newsium_get_option('number_of_flash_news');
                $em_ticker_news_title = newsium_get_option('flash_news_title');
                $em_ticker_news_subtitle = newsium_get_option('flash_news_subtitle');

                $all_posts = newsium_get_posts($number_of_posts, $category);
                $show_trending = true;

                ?>

                <div class="container-wrapper">
                    <div class="exclusive-posts">
                        <div class="exclusive-now primary-color">
                            <?php if (!empty($em_ticker_news_title)): ?>
                                <span class="exclusive-news-title"> 
                                    <?php echo esc_html($em_ticker_news_title); ?>
                                </span>
                            <?php endif; ?>
                            <div class="exclusive-now-txt-animation-wrap">
                                <span class="fancy-spinner">
                                    <div class="ring"></div>
                                    <div class="ring"></div>
                                    <div class="dot"></div>
                                </span>
                                <span class="exclusive-texts-wrapper">
                                <?php if (!empty($em_ticker_news_subtitle)):
                                    $animation_opt = newsium_get_option('disable_animation');
                                    $animation_class = '';
                                    if ($animation_opt != true) {
                                        $animation_class = 'af-exclusive-animation';
                                    }
                                    ?>
                                    <span class="exclusive-news-subtitle <?php echo $animation_class; ?>">
                                        <span><?php echo esc_html($em_ticker_news_subtitle); ?></span>
                                    </span>
                                <?php endif; ?>
                                </span>
                            </div>
                        </div>
                        <div class="exclusive-slides" dir="ltr">
                            <?php
                            if ($all_posts->have_posts()) : ?>
                            <div class='marquee <?php echo esc_attr($em_ticker_news_mode); ?>' data-speed='80000'
                                 data-gap='0' data-duplicated='true' data-direction="<?php echo esc_attr($dir); ?>">
                                <?php
                                while ($all_posts->have_posts()) : $all_posts->the_post();
                                    global $post;
                                    $url = newsium_get_freatured_image_url($post->ID, 'thumbnail');
                                    ?>
                                    <a href="<?php the_permalink(); ?>">
                                        <?php if ($show_trending == true): ?>

                                        <?php endif; ?>

                                        <span class="circle-marq">
                                        <?php if ($url) { ?>
                                            <img src="<?php echo esc_url($url); ?>"
                                                 alt="<?php the_title_attribute(); ?>">
                                        <?php } ?>
                                    </span>

                                        <?php the_title(); ?>
                                    </a>
                                <?php

                                endwhile;
                                endif;
                                wp_reset_postdata();
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Excluive line END -->
        <?php
        endif;
    }
endif;

add_action('newsium_action_banner_exclusive_posts', 'newsium_banner_exclusive_posts', 10);