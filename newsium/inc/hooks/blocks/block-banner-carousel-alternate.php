<?php
    /**
     * Full block part for displaying page content in page.php
     *
     * @package Newsium
     */
?>

<?php
    
    $newsium_slider_category = newsium_get_option('select_slider_news_category');
    $newsium_number_of_slides = newsium_get_option('number_of_slides');
    $newsium_slider_mode = newsium_get_option('select_main_banner_section_mode');
    
    $newsium_column = newsium_get_option('select_default_carousel_column');
    
    if ($newsium_column == 'carousel-2') {
        $newsium_slidesToShow = 2;
        $newsium_slide_to_scroll = 2;
        $newsium_centerMode = false;
        $newsium_break_point_1_slidesToShow = 2;
        $newsium_break_point_1_slidesToScroll = 2;
        $newsium_break_point_2_slidesToShow = 1;
        $newsium_break_point_2_slidesToScroll = 1;
        $newsium_break_point_3_slidesToShow = 1;
        $newsium_break_point_3_slidesToScroll = 1;
    } elseif ($newsium_column == 'carousel-4') {
        $newsium_slidesToShow = 4;
        $newsium_slide_to_scroll = 2;
        $newsium_centerMode = false;
        $newsium_break_point_1_slidesToShow = 2;
        $newsium_break_point_1_slidesToScroll = 2;
        $newsium_break_point_2_slidesToShow = 1;
        $newsium_break_point_2_slidesToScroll = 1;
        $newsium_break_point_3_slidesToShow = 1;
        $newsium_break_point_3_slidesToScroll = 1;
    }
    else {
        $newsium_slidesToShow = 3;
        $newsium_slide_to_scroll = 3;
        $newsium_centerMode = false;
        $newsium_break_point_1_slidesToShow = 3;
        $newsium_break_point_1_slidesToScroll = 3;
        $newsium_break_point_2_slidesToShow = 1;
        $newsium_break_point_2_slidesToScroll = 1;
        $newsium_break_point_3_slidesToShow = 1;
        $newsium_break_point_3_slidesToScroll = 1;
    }
    
    $newsium_carousel_args = array(
        'slidesToShow' => $newsium_slidesToShow,
        'autoplaySpeed' => 8000,
        'slidesToScroll' => $newsium_slide_to_scroll,
        'centerMode'=>$newsium_centerMode,
        'responsive' => array(
            array(
                'breakpoint' => 1024,
                'settings' => array(
                    'slidesToShow' => $newsium_break_point_2_slidesToShow,
                    'slidesToScroll' => $newsium_break_point_3_slidesToScroll,
                    'infinite' => true
                ),
            ),
            array(
                'breakpoint' => 769,
                'settings' => array(
                    'slidesToShow' => $newsium_break_point_2_slidesToShow,
                    'slidesToScroll' => $newsium_break_point_2_slidesToScroll,
                    'infinite' => true,
                ),
            ),
            array(
                'breakpoint' => 480,
                'settings' => array(
                    'slidesToShow' => $newsium_break_point_3_slidesToShow,
                    'slidesToScroll' => $newsium_break_point_3_slidesToScroll,
                    'infinite' => true
                ),
            ),
        ),
    );
    
    $newsium_carousel_args_encoded = wp_json_encode($newsium_carousel_args);


?>

<div class="af-banner-carousel-1 af-widget-carousel slick-wrapper banner-carousel-slider "
     data-slick='<?php echo wp_kses_post($newsium_carousel_args_encoded); ?>'>
    <?php
        $slider_posts = newsium_get_posts($newsium_number_of_slides, $newsium_slider_category);
        if ($slider_posts->have_posts()) :
            while ($slider_posts->have_posts()) : $slider_posts->the_post();
                
                global $post;
                $thumbnail_size = 'newsium-slider-center';
                ?>
                <div class="slick-item big-grid">
                    <div class="read-single color-pad pos-rel aft-title-inside-image">
                        <div class="read-img pos-rel read-img read-bg-img">
                            <a class="aft-slide-items" href="<?php the_permalink(); ?>">
                            <?php if ( has_post_thumbnail() ):
                                the_post_thumbnail($thumbnail_size);
                            endif;
                            ?>
                            </a>
                            <div class="read-categories af-category-inside-img">
                                <?php echo newsium_post_format($post->ID); ?>
                                <?php newsium_post_categories(); ?>
                            </div>

                        </div>

                        <div class="read-details color-tp-pad">

                            <span class="min-read-post-format">
                                <?php newsium_count_content_words($post->ID); ?>
                            </span>

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
            endwhile;
        endif;
        wp_reset_postdata();
    ?>
</div>