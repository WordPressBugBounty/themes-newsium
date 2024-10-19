<?php
if (!class_exists('Newsium_Posts_Slider')) :
    /**
     * Adds Newsium_Posts_Slider widget.
     */
    class Newsium_Posts_Slider extends AFthemes_Widget_Base
    {
        /**
         * Sets up a new widget instance.
         *
         * @since 1.0.0
         */
        function __construct()
        {
            $this->text_fields = array('newsium-posts-slider-title', 'newsium-excerpt-length', 'newsium-posts-slider-number');
            $this->select_fields = array('newsium-select-category', 'newsium-show-excerpt','newsium-select-background', 'newsium-select-background-type');

            $widget_ops = array(
                'classname' => 'newsium_posts_slider_widget aft-widget',
                'description' => __('Displays posts slider from selected category.', 'newsium'),
                'customize_selective_refresh' => false,
            );

            parent::__construct('newsium_posts_slider', __('AFTN Posts Slider', 'newsium'), $widget_ops);
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
            $title = apply_filters('widget_title', $instance['newsium-posts-slider-title'], $instance, $this->id_base);
            $category = isset($instance['newsium-select-category']) ? $instance['newsium-select-category'] : 0;
            $number_of_posts = isset($instance['newsium-posts-slider-number']) ? $instance['newsium-posts-slider-number'] : 5;
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
                            <?php echo esc_html($title); ?>
                            </span>
                    </h4>
                <?php endif; ?>
            </div>
        <?php endif; ?>
            <?php

            $all_posts = newsium_get_posts($number_of_posts, $category);
            ?>
            <div class="widget-block widget-wrapper">
            <div class="posts-slider banner-slider-2  af-post-slider af-widget-carousel slick-wrapper">
                    <?php
                    if ($all_posts->have_posts()) :
                        while ($all_posts->have_posts()) : $all_posts->the_post();
                            global $post;
                            $thumbnail_size = 'newsium-slider-full';
                            ?>
                            <div class="slick-item">
                                <div class="big-grid ">
                                    <div class="read-single pos-rel">
                                        <div class="read-img pos-rel read-bg-img">
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
                                        <div class="read-details af-category-inside-img">

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
                            </div>
                        <?php
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

    
            $background = array(
                'default' => __('Default', 'newsium'),
                'dim' => __('Dim', 'newsium'),
                'dark' => __('Alternative', 'newsium'),
                'secondary-background' => __('Secondary Color', 'newsium'),
    
            );


            $categories = newsium_get_terms();
            if (isset($categories) && !empty($categories)) {
                // generate the text input for the title of the widget. Note that the first parameter matches text_fields array entry
                echo parent::newsium_generate_text_input('newsium-posts-slider-title', __('Title', 'newsium'), 'Posts Slider');

                echo parent::newsium_generate_select_options('newsium-select-category', __('Select category', 'newsium'), $categories);

                echo parent::newsium_generate_select_options('newsium-select-background', __('Select Background', 'newsium'), $background);

            }
        }
    }
endif;