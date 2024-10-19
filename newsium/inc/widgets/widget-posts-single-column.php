<?php
if (!class_exists('Newsium_Single_Col_Categorised_Posts')) :
    /**
     * Adds Newsium_Single_Col_Categorised_Posts widget.
     */
    class Newsium_Single_Col_Categorised_Posts extends AFthemes_Widget_Base
    {
        /**
         * Sets up a new widget instance.
         *
         * @since 1.0.0
         */
        function __construct()
        {
            $this->text_fields = array('newsium-categorised-posts-title', 'newsium-posts-number', 'newsium-excerpt-length');
            $this->select_fields = array('newsium-select-category', 'newsium-show-excerpt','newsium-select-background', 'newsium-select-background-type');

            $widget_ops = array(
                'classname' => 'newsium_single_col_categorised_posts aft-widget',
                'description' => __('Displays posts from selected category in single column.', 'newsium'),
                'customize_selective_refresh' => false,
            );

            parent::__construct('newsium_single_col_categorised_posts', __('AFTN Single Column ', 'newsium'), $widget_ops);
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
            $show_excerpt = isset($instance['newsium-show-excerpt']) ? $instance['newsium-show-excerpt'] : 'true';
            $excerpt_length = isset($instance['newsium-excerpt-length']) ? $instance['newsium-excerpt-length'] : 25;
            $number_of_posts = isset($instance['newsium-posts-number']) ? $instance['newsium-posts-number'] : 5;
            $background = isset($instance['newsium-select-background']) ? $instance['newsium-select-background'] : 'default';

            $background_type = isset($instance['newsium-select-background-type']) ? $instance['newsium-select-background-type'] : 'solid-background';

            $background = $background . ' ' . $background_type;


            if ( $instance['newsium-select-background']) {
                $args['before_widget']= newsium_update_widget_before($args,$background,'aft-widget');
            }
            // open the widget container
            echo $args['before_widget'];
            ?>
            <?php if (!empty($title) || !empty($subtitle)): ?>
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
            <div class="widget-block list-style clearfix">
                <?php
                if ($all_posts->have_posts()) :
                    while ($all_posts->have_posts()) : $all_posts->the_post();
                        global $post;

                        $thumbnail_size =  'newsium-medium';

                        ?>

                        <div class="read-single color-pad">
                            <div class="read-img pos-rel col-2 float-l read-bg-img af-sec-list-img">
                                <a href="<?php the_permalink(); ?>">
                                <?php if ( has_post_thumbnail() ):
                                    the_post_thumbnail($thumbnail_size);
                                endif;
                                ?>
                                </a>
                                <div class="read-categories">
	  								<?php echo newsium_post_format($post->ID); ?>
                                </div>
                                <span class="min-read-post-format">
                                        <?php newsium_count_content_words($post->ID); ?>

                                        </span>

                            </div>
                            <div class="read-details col-2 float-l pad af-sec-list-txt color-tp-pad">
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

                                    <?php if ($show_excerpt != 'false'): ?>
                                        <div class="read-descprition full-item-discription">
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
                    <?php
                    endwhile;
                    ?>
                <?php endif;
                wp_reset_postdata(); ?>
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
    
            $background = array(
                'default' => __('Default', 'newsium'),
                'dim' => __('Dim', 'newsium'),
                'dark' => __('Alternative', 'newsium'),
                'secondary-background' => __('Secondary Color', 'newsium'),
    
            );




            $categories = newsium_get_terms();

            if (isset($categories) && !empty($categories)) {
                // generate the text input for the title of the widget. Note that the first parameter matches text_fields array entry
                echo parent::newsium_generate_text_input('newsium-categorised-posts-title', 'Title', 'Single Column Posts');
                echo parent::newsium_generate_select_options('newsium-select-category', __('Select category', 'newsium'), $categories);

                echo parent::newsium_generate_select_options('newsium-show-excerpt', __('Show excerpt', 'newsium'), $options);

                echo parent::newsium_generate_text_input('newsium-excerpt-length', __('Excerpt length', 'newsium'), '25', 'number');



            }

            //print_pre($terms);


        }

    }
endif;