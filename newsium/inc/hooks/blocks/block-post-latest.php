<?php
    /**
     * List block part for displaying latest posts in footer.php
     *
     * @package Newsium
     */
    
    $newsium_latest_posts_title = newsium_get_option('frontpage_latest_posts_section_title');
    $newsium_latest_posts_subtitle = newsium_get_option('frontpage_latest_posts_section_subtitle');
    $number_of_posts = newsium_get_option('number_of_frontpage_latest_posts');
    
    $all_posts = newsium_get_posts($number_of_posts);


?>
<div class="af-main-banner-latest-posts grid-layout">
    <div class="container-wrapper">
    <div class="af-container-block-wrapper pad-20">
            <div class="widget-title-section">
                <?php if (!empty($newsium_latest_posts_title)): ?>
                    <h4 class="widget-title header-after1">
                            <span class="header-after">
                                <?php echo esc_html($newsium_latest_posts_title); ?>
                            </span>
                    </h4>
                <?php endif; ?>

            </div>
            <div class="af-container-row clearfix">
                <?php
                    if ($all_posts->have_posts()) :
                        while ($all_posts->have_posts()) : $all_posts->the_post();
                            global $post;
                            $thumbnail_size =  'newsium-medium';
                            
                            ?>
                            <div class="col-4 pad float-l" data-mh="you-may-have-missed">
                                <div class="read-single color-pad af-category-inside-img">
                                    <div class="read-img pos-rel read-bg-img">
                                        <a href="<?php the_permalink(); ?>">
                                        <?php if ( has_post_thumbnail() ):
                                            the_post_thumbnail($thumbnail_size);
                                        endif;
                                        ?>
                                        </a>
                                        <div class="read-categories">
                                                <?php echo newsium_post_format($post->ID); ?>
                                                <?php newsium_post_categories(); ?>
                                            </div>
                                        <span class="min-read-post-format af-with-category">
                                            <?php newsium_count_content_words($post->ID); ?>
                                        </span>

                                    </div>
                                    <div class="read-details color-tp-pad">
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
                        endwhile; ?>
                    <?php
                    endif;
                    wp_reset_postdata();
                ?>
            </div>
    </div>
    </div>
</div>
