<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Newsium
 */

?>


<?php if (is_singular()) : ?>
        <div class="entry-content read-details">
            <?php
            the_content(sprintf(
                wp_kses(
                /* translators: %s: Name of current post. Only visible to screen readers */
                    __('Continue reading<span class="screen-reader-text"> "%s"</span>', 'newsium'),
                    array(
                        'span' => array(
                            'class' => array(),
                        ),
                    )
                ),
                get_the_title()
            )); ?>
            <?PHP if (is_single()): ?>
                <div class="post-item-metadata entry-meta">
                    <?php newsium_post_item_tag(); ?>
                </div>
            <?php endif; ?>
            <?php
            the_post_navigation(array(
                'prev_text' => __('<span class="em-post-navigation">Previous</span> %title', 'newsium'),
                'next_text' => __('<span class="em-post-navigation">Next</span> %title', 'newsium'),
                'in_same_term' => true,
                'taxonomy' => __('category', 'newsium'),
                'screen_reader_text' => __('Continue Reading', 'newsium'),
            ));
            ?>
            <?php wp_link_pages(array(
                'before' => '<div class="page-links">' . esc_html__('Pages:', 'newsium'),
                'after' => '</div>',
            ));
            ?>
        </div><!-- .entry-content -->
<?php else:

 do_action('newsium_action_archive_layout');

endif;
