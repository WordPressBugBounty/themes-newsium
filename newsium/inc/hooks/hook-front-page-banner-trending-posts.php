<?php
if (!function_exists('newsium_banner_trending_posts')):
    /**
     * Ticker Slider
     *
     * @since Newsium 1.0.0
     *
     */
    function newsium_banner_trending_posts()
    {
        $color_class = 'category-color-1';
        ?>
        <?php

        $newsium_slider_mode = newsium_get_option('select_main_banner_section_mode');
        $newsium_select_trending_carousel_section_mode = newsium_get_option('select_trending_carousel_section_mode');

        $newsium_select_default_carousel_layout = newsium_get_option('select_default_carousel_layout');


        $carousel_class = 'af-main-banner-trending-posts-vertical-carousel';

        if ($newsium_slider_mode == 'default') {
            if ($newsium_select_default_carousel_layout == 'title-over-image') {

                $carousel_class = 'af-main-banner-trending-posts-carousel-vertical-alternate af-widget-carousel';

            }
        }


        if ($newsium_slider_mode == 'grid' || $newsium_select_trending_carousel_section_mode == 'bottom' || $newsium_select_trending_carousel_section_mode == 'top') {

            $carousel_class = 'af-main-banner-trending-posts-carousel af-widget-carousel';

        }


        $dir = 'ltr';
        if (is_rtl()) {
            $dir = 'rtl';
        }
        ?>
        <div class="af-main-banner-trending-posts trending-posts" dir="<?php echo esc_attr($dir); ?>">
            <div class="section-wrapper">
                <div class="af-double-column list-style clearfix <?php echo esc_attr($carousel_class); ?>">
                    <?php
                    $newsium_featured_category = newsium_get_option('select_trending_carousel_category');
                    $newsium_number_of_featured_news = 5;
                    $count = 1;
                    $trending_posts = newsium_get_posts($newsium_number_of_featured_news, $newsium_featured_category);
                    if ($trending_posts->have_posts()) :
                    while ($trending_posts->have_posts()) :
                    $trending_posts->the_post();
                    global $post;
                    $thumbnail_size =  'thumbnail';
                    ?>

                    <div class="col-1" data-mh="af-feat-list">
                        <div class="read-single color-pad">
                            <div class="read-img pos-rel col-4 float-l read-bg-img">
                                <a href="<?php the_permalink(); ?>">
                                <?php if ( has_post_thumbnail() ):
                                    the_post_thumbnail($thumbnail_size);
                                endif;
                                ?>
                                </a>
                                <div class="trending-post-items pos-rel col-4 float-l show-inside-image">
                                            <span class="trending-no">
                                                <?php echo sprintf(__('%s', 'newsium'), $count); ?>
                                            </span>
                                </div>
                            </div>
                            <div class="trending-post-items pos-rel col-4 float-l"
                            " >
                            <span class="trending-no">
                                                <?php echo sprintf(__('%s', 'newsium'), $count); ?>
                                            </span>
                        </div>
                        <div class="read-details col-75 float-l pad color-tp-pad">
                            <div class="read-categories">
                                <?php newsium_post_categories(); ?>
                            </div>
                            <div class="read-title">
                                <h4>
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h4>
                            </div>

                            <div class="entry-meta">
                                <?php newsium_post_item_meta(); ?>
                            </div>
                        </div>
                    </div>

                </div>

                <?php
                $count++;
                endwhile;
                endif;
                wp_reset_postdata();
                ?>
            </div>
        </div>
        </div>

        <!-- Trending line END -->
        <?php

    }
endif;

add_action('newsium_action_banner_trending_posts', 'newsium_banner_trending_posts', 10);