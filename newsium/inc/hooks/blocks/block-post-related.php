<?php
/**
 * List block part for displaying page content in page.php
 *
 * @package Newsium
 */

?>

<div class="promotionspace enable-promotionspace">

    <?php if (is_active_sidebar('single-posts-advertisement-widgets')): ?>
        <div class="em-posts-promotions">
            <?php dynamic_sidebar('single-posts-advertisement-widgets'); ?>
        </div>
    <?php endif; ?>
    <div class="af-reated-posts grid-layout">
            <?php
            global $post;
            $categories = get_the_category($post->ID);
            $related_section_title = esc_attr(newsium_get_option('single_related_posts_title'));
            $number_of_related_posts = esc_attr(newsium_get_option('single_number_of_related_posts'));

            if ($categories) {
            $cat_ids = array();
            foreach ($categories as $category) $cat_ids[] = $category->term_id;
            $args = array(
                'category__in' => $cat_ids,
                'post__not_in' => array($post->ID),
                'posts_per_page' => $number_of_related_posts, // Number of related posts to display.
                'ignore_sticky_posts' => 1
            );
            $related_posts = new wp_query($args);

            if (!empty($related_posts)) { ?>
                <h4 class="widget-title header-after1">
                            <span class="header-after">
                                <?php echo esc_html($related_section_title);  ?>
                            </span>
                </h4>
            <?php }
            ?>
            <div class="af-container-row clearfix">
                <?php
                while ($related_posts->have_posts()) {
                    $related_posts->the_post();

                    global $post;
                    $url = newsium_get_freatured_image_url($post->ID, 'newsium-medium');
                    if(!empty($url)){
                        $col_class = 'col-five';
                    }else{
                        $col_class = 'col-ten';
                    }
                    $thumbnail_size = 'newsium-medium';
                    ?>
                    <div class="col-3 float-l pad latest-posts-grid af-sec-post" data-mh="latest-posts-grid">
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
                            <div class="read-details color-tp-pad no-color-pad">
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
                <?php }
                }
                wp_reset_postdata();
                ?>
            </div>

    </div>
</div>


