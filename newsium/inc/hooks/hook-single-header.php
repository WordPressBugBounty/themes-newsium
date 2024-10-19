<?php
if (!function_exists('newsium_single_header')) :
    /**
     * Banner Slider
     *
     * @since Newsium 1.0.0
     *
     */
    function newsium_single_header()
    {
        $single_post_featured_image_view = newsium_get_option('single_post_featured_image_view');
        $show_featured_image = newsium_get_option('single_show_featured_image');
        $wrapper_class = '';
        if ($show_featured_image == false) {
            $wrapper_class = 'aft-no-featured-image';

        }
        global $post;
        $post_id = $post->ID;
        ?>
        <header class="entry-header pos-rel <?php echo esc_attr($wrapper_class); ?>">
        <div class="container-wrapper ">    
            <div class="read-details af-container-block-wrapper">
                <div class="entry-header-details">
                    <?php if ('post' === get_post_type()) : ?>
                        <div class="figure-categories figure-categories-bg">
                            <?php newsium_post_categories(); ?>
                            
                        </div>
                    <?php endif; ?>
                   
                    <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
                   
                    
                </div>
            </div>
        </div>

            <?php
               
                
                if($single_post_featured_image_view =='full'){
                    do_action('newsium_action_single_featured_image');
                }
    
        
            
        ?>
        </header><!-- .entry-header -->

        <!-- end slider-section -->
        <?php
    }
endif;
add_action('newsium_action_single_header', 'newsium_single_header', 40);

add_action('newsium_action_single_featured_image','newsium_single_featured_image',40);

function newsium_single_featured_image(){
    global $post;
    $post_id = $post->ID;
    $show_featured_image = newsium_get_option('single_show_featured_image');
    if ($show_featured_image):
        ?>
        <div class="read-img pos-rel">
            <?php newsium_post_thumbnail(); ?>
            <span class="min-read-post-format">

                        <?php
                        if (has_post_thumbnail($post_id)):
                            $aft_image_caption = get_post(get_post_thumbnail_id())->post_excerpt;
                            if ((!empty($aft_image_caption)) && ('' != ($aft_image_caption))): ?>
                                <span class="aft-image-caption">
                                    <p>
                                        <?php echo $aft_image_caption; ?>
                                    </p>
                                </span>
                            <?php
                            endif;
                        endif;
                        ?>
                    </span>

        </div>
    <?php endif;
    
}