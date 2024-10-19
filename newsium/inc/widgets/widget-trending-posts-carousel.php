<?php
if (!class_exists('Newsium_Trending_Posts_Carousel')) :
    /**
     * Adds Newsium_Trending_Posts_Carousel widget.
     */
    class Newsium_Trending_Posts_Carousel extends AFthemes_Widget_Base
    {
        /**
         * Sets up a new widget instance.
         *
         * @since 1.0.0
         */
        function __construct()
        {
            $this->text_fields = array('newsium-posts-slider-title', 'newsium-posts-slider-subtitle', 'newsium-posts-slider-number');
            $this->select_fields = array('newsium-select-category', 'newsium-select-background', 'newsium-select-background-type');

            $widget_ops = array(
                'classname' => 'newsium_trending_posts_carousel_widget grid-layout aft-widget',
                'description' => __('Displays posts carousel from selected category.', 'newsium'),
                'customize_selective_refresh' => false,
            );

            parent::__construct('newsium_trending_posts_carousel', __('AFTN Trending Posts Carousel', 'newsium'), $widget_ops);
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

            $number_of_posts = isset($instance['newsium-posts-slider-number']) ? $instance['newsium-posts-slider-number'] : 7;
            $category = isset($instance['newsium-select-category']) ? $instance['newsium-select-category'] : '0';

            $background = isset($instance['newsium-select-background']) ? $instance['newsium-select-background'] : 'default';

            $background_type = isset($instance['newsium-select-background-type']) ? $instance['newsium-select-background-type'] : 'solid-background';

            $background = $background . ' ' . $background_type;


            if ($instance['newsium-select-background'] || $instance['newsium-select-background-type']) {
                $args['before_widget'] = newsium_update_widget_before($args, $background, 'aft-widget');
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
            $newsium_nav_control_class = empty($title) ? 'no-section-title' : '';
            $all_posts = newsium_get_posts($number_of_posts, $category);
            $count = 1;
            ?>
            <div class="widget-block widget-wrapper">
                <div class="trending-posts-vertical af-widget-carousel slick-wrapper ">
                    <?php
                    if ($all_posts->have_posts()) :
                    while ($all_posts->have_posts()) :
                    $all_posts->the_post();
                    global $post;
                        $thumbnail_size = 'thumbnail';

                    ?>
                    <div class="slick-item">
                        <div class="af-double-column list-style clearfix">
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
                                <div class="trending-post-items pos-rel col-4 float-l">
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
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_title(); ?>
                                        </a>
                                    </h4>
                                </div>
                                <div class="entry-meta">
                                    <?php newsium_get_comments_count($post->ID); ?>
                                    <?php newsium_post_item_meta(); ?>
                                </div>
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


            <?php
            //print_pre($all_posts);

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
            $categories = newsium_get_terms();
            $background = array(
                'default' => __('Default', 'newsium'),
                'dim' => __('Dim', 'newsium'),
                'dark' => __('Alternative', 'newsium'),
                'secondary-background' => __('Secondary Color', 'newsium'),

            );

            $background_type = array(

                'solid-background' => __('Solid Background', 'newsium'),
                'solid-border' => __('Solid Border', 'newsium'),
                'dashed-border' => __('Dashed Border', 'newsium'),


            );


            if (isset($categories) && !empty($categories)) {
                // generate the text input for the title of the widget. Note that the first parameter matches text_fields array entry
                echo parent::newsium_generate_text_input('newsium-posts-slider-title', 'Title', 'Trending Posts Carousel');
                echo parent::newsium_generate_select_options('newsium-select-category', __('Select category', 'newsium'), $categories);
                echo parent::newsium_generate_select_options('newsium-select-background', __('Select Background', 'newsium'), $background);


            }
        }
    }
endif;