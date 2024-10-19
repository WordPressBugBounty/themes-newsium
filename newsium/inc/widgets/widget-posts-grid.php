<?php
if (!class_exists('Newsium_Posts_Grid')) :
    /**
     * Adds Newsium_Posts_Grid widget.
     */
    class Newsium_Posts_Grid extends AFthemes_Widget_Base
    {
        /**
         * Sets up a new widget instance.
         *
         * @since 1.0.0
         */
        function __construct()
        {
            $this->text_fields = array('newsium-categorised-posts-title', 'newsium-excerpt-length', 'newsium-posts-number');
            $this->select_fields = array('newsium-select-category','newsium-select-background', 'newsium-show-excerpt', 'newsium-select-background-type');

            $widget_ops = array(
                'classname' => 'newsium_posts_grid grid-layout aft-widget',
                'description' => __('Displays posts from selected category in a grid.', 'newsium'),
                'customize_selective_refresh' => false,
            );

            parent::__construct('newsium_posts_grid', __('AFTN Posts Grid', 'newsium'), $widget_ops);
        }

        /**
         * Front-end display of widget.
         *
         * @see WP_Widget::widget()
         *
         * @param array $args Widget arguments.
         * @param array $instance Saved values from database.
         */

        public function widget($args, $instance)
        {

            $instance = parent::newsium_sanitize_data($instance, $instance);


            /** This filter is documented in wp-includes/default-widgets.php */
            $title = apply_filters('widget_title', $instance['newsium-categorised-posts-title'], $instance, $this->id_base);

            $category = isset($instance['newsium-select-category']) ? $instance['newsium-select-category'] : '0';
            $number_of_posts = isset($instance['newsium-posts-number']) ? $instance['newsium-posts-number'] : 6;
            $show_excerpt = isset($instance['newsium-show-excerpt']) ? $instance['newsium-show-excerpt'] : 'true';
            $excerpt_length = isset($instance['newsium-excerpt-length']) ? $instance['newsium-excerpt-length'] : '25';
            $background = isset($instance['newsium-select-background']) ? $instance['newsium-select-background'] : 'default';
            $background_type = isset($instance['newsium-select-background-type']) ? $instance['newsium-select-background-type'] : 'solid-background';

            $background = $background . ' ' . $background_type;


            if ( $instance['newsium-select-background'] || $instance['newsium-select-background-type']) {
                $args['before_widget']= newsium_update_widget_before($args,$background,'aft-widget');
            }
            // open the widget container
            echo $args['before_widget'];
            ?>
            <?php if (!empty($title)): ?>
            <div class="em-title-subtitle-wrap">
                <?php if (!empty($title)): ?>
                    <h4 class="widget-title header-after1">
                        <span class="header-after">
                            <?php echo esc_html($title);  ?>
                            </span>
                    </h4>
                <?php endif; ?>

            </div>
        <?php endif; ?>
            <?php
            $all_posts = newsium_get_posts($number_of_posts, $category);
            ?>
            <div class="widget-block widget-wrapper af-category-inside-img">
                <div class="af-container-row clearfix">
                    <?php
                    $count = 1;
                    if ($all_posts->have_posts()) :
                        while ($all_posts->have_posts()) : $all_posts->the_post();
                            global $post;
                            $thumbnail_size = 'newsium-medium';

                            ?>



                            <div class="col-3 pad float-l af-sec-post" data-mh="af-grid-posts">
                                <div class="read-single color-pad">
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
                                        <?php if ($show_excerpt != 'false'): ?>
                                            <div class="full-item-discription">
                                                <div class="post-description">
                                                    <?php if (absint($excerpt_length) > 0) : ?>
                                                        <?php
                                                        $excerpt = newsium_get_excerpt($excerpt_length, get_the_content());
                                                        echo wp_kses_post(wpautop($excerpt));
                                                        ?>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        <?php endif; ?>
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

            <?php
            // close the widget container
            echo $args['after_widget'];
        }

        /**
         * Back-end widget form.
         *
         * @see WP_Widget::form()
         *
         * @param array $instance Previously saved values from database.
         */
        public function form($instance)
        {
            $this->form_instance = $instance;
            $options = array(
                'true' => __('Yes', 'newsium'),
                'false' => __('No', 'newsium')

            );
    





            $categories = newsium_get_terms();

            if (isset($categories) && !empty($categories)) {
                // generate the text input for the title of the widget. Note that the first parameter matches text_fields array entry
                echo parent::newsium_generate_text_input('newsium-categorised-posts-title', __('Title', 'newsium'), __('Posts Grid', 'newsium'));
                echo parent::newsium_generate_select_options('newsium-select-category', __('Select category', 'newsium'), $categories);
                echo parent::newsium_generate_select_options('newsium-show-excerpt', __('Show excerpt', 'newsium'), $options);


            }

            //print_pre($terms);


        }

    }
endif;