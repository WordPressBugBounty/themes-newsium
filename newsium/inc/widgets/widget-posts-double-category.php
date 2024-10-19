<?php
if (!class_exists('Newsium_Double_Col_Categorised_Posts')) :
    /**
     * Adds Newsium_Double_Col_Categorised_Posts widget.
     */
    class Newsium_Double_Col_Categorised_Posts extends AFthemes_Widget_Base
    {
        /**
         * Sets up a new widget instance.
         *
         * @since 1.0.0
         */
        function __construct()
        {
            $this->text_fields = array('newsium-categorised-posts-title-1', 'newsium-categorised-posts-title-2', 'newsium-posts-number-1', 'newsium-posts-number-2');
            $this->select_fields = array('newsium-select-category-1', 'newsium-select-category-2', 'newsium-select-layout-1', 'newsium-select-layout-2', 'newsium-select-background', 'newsium-select-background-type');

            $widget_ops = array(
                'classname' => 'newsium_double_col_categorised_posts aft-widget',
                'description' => __('Displays posts from 2 selected categories in double column.', 'newsium'),
                'customize_selective_refresh' => false,
            );

            parent::__construct('newsium_double_col_categorised_posts', __('AFTN Double Categories Posts', 'newsium'), $widget_ops);
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

            $title_1 = apply_filters('widget_title', $instance['newsium-categorised-posts-title-1'], $instance, $this->id_base);
            $title_2 = apply_filters('widget_title', $instance['newsium-categorised-posts-title-2'], $instance, $this->id_base);
            $category_1 = isset($instance['newsium-select-category-1']) ? $instance['newsium-select-category-1'] : '0';
            $category_2 = isset($instance['newsium-select-category-2']) ? $instance['newsium-select-category-2'] : '0';
            $layout_1 = isset($instance['newsium-select-layout-1']) ? $instance['newsium-select-layout-1'] : 'full-plus-list';
            $layout_2 = isset($instance['newsium-select-layout-2']) ? $instance['newsium-select-layout-2'] : 'list';
            $number_of_posts_1 =  5;
            $number_of_posts_2 =  5;
            $background = isset($instance['newsium-select-background']) ? $instance['newsium-select-background'] : 'default';

            $background_type = isset($instance['newsium-select-background-type']) ? $instance['newsium-select-background-type'] : 'solid-background';

            $background = $background . ' ' . $background_type;


            if ($instance['newsium-select-background']|| $instance['newsium-select-background-type']) {
                $args['before_widget'] = newsium_update_widget_before($args, $background, 'aft-widget');
            }

            // open the widget container
            echo $args['before_widget'];
            ?>


            <div class="widget-block-wrapper">
                <div class="af-container-row clearfix">
                    <div class="col-2 float-l pad <?php echo esc_attr($layout_1); ?> grid-plus-list af-sec-post">
                        <?php if (!empty($title_1)): ?>
                            <h4 class="widget-title header-after1">
                            <span class="header-after">
                                <?php echo esc_html($title_1); ?>
                            </span>
                            </h4>
                        <?php endif; ?>
                        <div class="widget-block widget-wrapper">
                            <div class="af-container-row clearfix af-double-column list-style">
                                <?php $all_posts = newsium_get_posts($number_of_posts_1, $category_1); ?>
                                <?php
                                $count_1 = 1;


                                if ($all_posts->have_posts()) :
                                    while ($all_posts->have_posts()) : $all_posts->the_post();


                                        if ($count_1 == 1) {
                                            $thumbnail_size = 'newsium-medium';

                                        } else {
                                            $thumbnail_size = 'thumbnail';
                                        }


                                        global $post;
                                        $url = newsium_get_freatured_image_url($post->ID, $thumbnail_size);

                                        if ($url == '') {
                                            $img_class = 'no-image';
                                        }

                                        ?>

                                        <?php if ($count_1 == 1): ?>
                                            <div class="col-1 float-l pad aft-spotlight-posts-<?php echo esc_attr($count_1); ?>">
                                                <div class="read-single color-pad">
                                                    <div class="read-img pos-rel col-4 float-l marg-15-lr read-bg-img af-category-inside-img">
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
                                                    <div class="read-details col-75 float-l pad color-tp-pad">
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
                                        <?php else: ?>

                                            <div class="col-1 float-l pad aft-spotlight-posts-<?php echo esc_attr($count_1); ?>">
                                                <div class="read-single color-pad">
                                                    <div class="read-img pos-rel col-4 float-l marg-15-lr read-bg-img">
                                                        <a href="<?php the_permalink(); ?>">
                                                        <?php if ( has_post_thumbnail() ):
                                                            the_post_thumbnail($thumbnail_size);
                                                        endif;
                                                        ?>
                                                        </a>
                                                        <span class="min-read-post-format af-with-category">
    		  								    <?php echo newsium_post_format($post->ID); ?>
                                                <?php newsium_count_content_words($post->ID); ?>
                                                </span>
                                                    </div>
                                                    <div class="read-details col-75 float-l pad color-tp-pad">

                                                        <div class="read-categories">
                                                            <?php newsium_post_categories(); ?>
                                                        </div>

                                                        <div class="read-title">
                                                            <h4>
                                                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                            </h4>
                                                        </div>
                                                        <div class="entry-meta">
                                                            <?php newsium_get_comments_count($post->ID); ?>
                                                            <?php newsium_post_item_meta(); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>

                                        <?php
                                        $count_1++;
                                    endwhile;
                                    ?>
                                <?php endif;
                                wp_reset_postdata(); ?>
                            </div>
                        </div>
                    </div>


                    <div class="col-2 float-l pad <?php echo esc_attr($layout_2); ?> grid-plus-list af-sec-post">
                        <?php if (!empty($title_2)): ?>
                            <h4 class="widget-title header-after1">
                    <span class="header-after">
                        <?php echo esc_html($title_2); ?>
                        </span>
                            </h4>
                        <?php endif; ?>

                        <div class="widget-block widget-wrapper">
                            <div class="af-container-row clearfix af-double-column list-style">
                                <?php $all_posts = newsium_get_posts($number_of_posts_2, $category_2); ?>
                                <?php
                                $count_2 = 1;


                                if ($all_posts->have_posts()) :
                                    while ($all_posts->have_posts()) : $all_posts->the_post();


                                        if ($count_2 == 1) {
                                            $thumbnail_size = 'newsium-medium';

                                        } else {
                                            $thumbnail_size = 'thumbnail';
                                        }


                                        global $post;
                                        $url = newsium_get_freatured_image_url($post->ID, $thumbnail_size);

                                        if ($url == '') {
                                            $img_class = 'no-image';
                                        }


                                        ?>

                                        <?php if ($count_2 == 1): ?>
                                            <div class="col-1 float-l pad aft-spotlight-posts-<?php echo esc_attr($count_2); ?>">
                                                <div class="read-single color-pad">
                                                    <div class="read-img pos-rel col-4 float-l marg-15-lr read-bg-img af-category-inside-img">
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
                                                    <div class="read-details col-75 float-l pad color-tp-pad">
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
                                        <?php else: ?>

                                            <div class="col-1 float-l pad aft-spotlight-posts-<?php echo esc_attr($count_2); ?>">
                                                <div class="read-single color-pad">
                                                    <div class=" read-img pos-rel col-4 float-l marg-15-lr read-bg-img">
                                                        <a href="<?php the_permalink(); ?>">
                                                        <?php if ( has_post_thumbnail() ):
                                                            the_post_thumbnail($thumbnail_size);
                                                        endif;
                                                        ?>
                                                        </a>
                                                        <span class="min-read-post-format af-with-category">
    		  								    <?php echo newsium_post_format($post->ID); ?>
                                                <?php newsium_count_content_words($post->ID); ?>
                                                </span>
                                                    </div>
                                                    <div class="read-details col-75 float-l pad color-tp-pad">

                                                        <div class="read-categories">
                                                            <?php newsium_post_categories(); ?>
                                                        </div>

                                                        <div class="read-title">
                                                            <h4>
                                                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                            </h4>
                                                        </div>
                                                        <div class="entry-meta">
                                                            <?php newsium_get_comments_count($post->ID); ?>
                                                            <?php newsium_post_item_meta(); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        <?php
                                        $count_2++;
                                    endwhile;
                                    ?>
                                <?php endif;
                                wp_reset_postdata(); ?>
                            </div>
                        </div>
                    </div>
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


            $categories = newsium_get_terms();

            if (isset($categories) && !empty($categories)) {
                // generate the text input for the title of the widget. Note that the first parameter matches text_fields array entry
                echo parent::newsium_generate_text_input('newsium-categorised-posts-title-1', __('Title 1', 'newsium'), 'Double Categories Posts 1');
                echo parent::newsium_generate_select_options('newsium-select-category-1', __('Select category 1', 'newsium'), $categories);
                echo parent::newsium_generate_text_input('newsium-categorised-posts-title-2', __('Title 2', 'newsium'), 'Double Categories Posts 2');
                echo parent::newsium_generate_select_options('newsium-select-category-2', __('Select category 2', 'newsium'), $categories);


            }



        }

    }
endif;