<?php
/**
 * List block part for displaying page content in page.php
 *
 * @package Newsium
 */

$excerpt_length = 20;
global $post;
$thumbnail_size =  'newsium-medium';
$show_excerpt = 'true';
?>

<div class="archive-grid-post">
    <div class="read-single color-pad">
        <div class="read-img pos-rel read-bg-img">
            <a href="<?php the_permalink(); ?>">
            <?php if ( has_post_thumbnail() ):
                the_post_thumbnail($thumbnail_size);
            endif;
            ?>
            </a>
            <div class="read-categories af-category-inside-img">
                <?php echo newsium_post_format($post->ID); ?>
                <?php newsium_post_categories(); ?>
            </div>
            <span class="min-read-post-format">
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

    <?php
    wp_link_pages(array(
        'before' => '<div class="page-links">' . esc_html__('Pages:', 'newsium'),
        'after' => '</div>',
    ));
    ?>
</div>








