<?php
if (!class_exists('Newsium_Tabbed_Posts')) :
    /**
     * Adds Newsium_Tabbed_Posts widget.
     */
    class Newsium_Tabbed_Posts extends AFthemes_Widget_Base
    {
        /**
         * Sets up a new widget instance.
         *
         * @since 1.0.0
         */
        function __construct()
        {
            $this->text_fields = array('newsium-tabbed-popular-posts-title', 'newsium-tabbed-latest-posts-title', 'newsium-tabbed-categorised-posts-title', 'newsium-excerpt-length', 'newsium-posts-number');

            $this->select_fields = array('newsium-show-excerpt', 'newsium-enable-categorised-tab', 'newsium-select-category','newsium-select-background', 'newsium-select-background-type');

            $widget_ops = array(
                'classname' => 'newsium_tabbed_posts_widget aft-widget',
                'description' => __('Displays tabbed posts lists from selected settings.', 'newsium'),
                'customize_selective_refresh' => false,
            );

            parent::__construct('newsium_tabbed_posts', __('AFTN Tabbed Posts', 'newsium'), $widget_ops);
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
            $tab_id = 'tabbed-' . $this->number;


            /** This filter is documented in wp-includes/default-widgets.php */

            $show_excerpt = isset($instance['newsium-show-excerpt']) ? $instance['newsium-show-excerpt'] : 'false';
            $excerpt_length = isset($instance['newsium-excerpt-length']) ? $instance['newsium-excerpt-length'] : '20';
            $number_of_posts = isset($instance['newsium-posts-number']) ? $instance['newsium-posts-number'] : '5';


            $popular_title = isset($instance['newsium-tabbed-popular-posts-title']) ? $instance['newsium-tabbed-popular-posts-title'] : __('AFTN Popular', 'newsium');
            $latest_title = isset($instance['newsium-tabbed-latest-posts-title']) ? $instance['newsium-tabbed-latest-posts-title'] : __('AFTN Latest', 'newsium');


            $enable_categorised_tab = isset($instance['newsium-enable-categorised-tab']) ? $instance['newsium-enable-categorised-tab'] : 'true';
            $categorised_title = isset($instance['newsium-tabbed-categorised-posts-title']) ? $instance['newsium-tabbed-categorised-posts-title'] : __('Trending', 'newsium');
            $category = isset($instance['newsium-select-category']) ? $instance['newsium-select-category'] : '0';
    
            $background = isset($instance['newsium-select-background']) ? $instance['newsium-select-background'] : 'default';

            $background_type = isset($instance['newsium-select-background-type']) ? $instance['newsium-select-background-type'] : 'solid-background';

            $background = $background . ' ' . $background_type;


            if ( $instance['newsium-select-background'] || $instance['newsium-select-background-type']) {
                $args['before_widget']= newsium_update_widget_before($args,$background,'aft-widget');
            }

            // open the widget container
            echo $args['before_widget'];
            ?>
            <div class="tabbed-container">
                <div class="tabbed-head">
                    <ul class="nav nav-tabs af-tabs tab-warpper" role="tablist">
                        <li class="tab tab-recent">
                            <a href="#<?php echo esc_attr($tab_id); ?>-recent"
                               aria-controls="<?php esc_attr_e('Recent', 'newsium'); ?>" role="tab"
                               data-toggle="tab" class="font-family-1 active">
                                <i class="fa fa-bolt" aria-hidden="true"></i>  <?php echo esc_html($latest_title); ?>
                            </a>
                        </li>
                        <li role="presentation" class="tab tab-popular">
                            <a href="#<?php echo esc_attr($tab_id); ?>-popular"
                               aria-controls="<?php esc_attr_e('Popular', 'newsium'); ?>" role="tab"
                               data-toggle="tab" class="font-family-1">
                                <i class="fa fa-clock-o" aria-hidden="true"></i>  <?php echo esc_html($popular_title); ?>
                            </a>
                        </li>

                        <?php if ($enable_categorised_tab == 'true'): ?>
                            <li class="tab tab-categorised">
                                <a href="#<?php echo esc_attr($tab_id); ?>-categorised"
                                   aria-controls="<?php esc_attr_e('Categorised', 'newsium'); ?>" role="tab"
                                   data-toggle="tab" class="font-family-1">
                                   <i class="fa fa-fire" aria-hidden="true"></i>  <?php echo esc_html($categorised_title); ?>
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
                <div class="widget-block widget-wrapper">
                <div class="tab-content">
                    <div id="<?php echo esc_attr($tab_id); ?>-recent" role="tabpanel" class="tab-pane active">
                        <?php
                        newsium_render_posts('recent', $show_excerpt, $excerpt_length, $number_of_posts);
                        ?>
                    </div>
                    <div id="<?php echo esc_attr($tab_id); ?>-popular" role="tabpanel" class="tab-pane">
                        <?php
                        newsium_render_posts('popular', $show_excerpt, $excerpt_length, $number_of_posts);
                        ?>
                    </div>
                    <?php if ($enable_categorised_tab == 'true'): ?>
                        <div id="<?php echo esc_attr($tab_id); ?>-categorised" role="tabpanel" class="tab-pane">
                            <?php
                            newsium_render_posts('categorised', $show_excerpt, $excerpt_length, $number_of_posts, $category);
                            ?>
                        </div>
                    <?php endif; ?>
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
            $enable_categorised_tab = array(
                'true' => __('Yes', 'newsium'),
                'false' => __('No', 'newsium')

            );

            $options = array(
                'false' => __('No', 'newsium'),
                'true' => __('Yes', 'newsium')

            );
    
            $background = array(
                'default' => __('Default', 'newsium'),
                'dim' => __('Dim', 'newsium'),
                'dark' => __('Alternative', 'newsium'),
                'secondary-background' => __('Secondary Color', 'newsium'),
    
            );




            // generate the text input for the title of the widget. Note that the first parameter matches text_fields array entry
            ?><h4><?php _e('Latest Posts', 'newsium'); ?></h4><?php
            echo parent::newsium_generate_text_input('newsium-tabbed-latest-posts-title', __('Title', 'newsium'), __('Latest', 'newsium'));

            ?><h4><?php _e('Popular Posts', 'newsium'); ?></h4><?php
            echo parent::newsium_generate_text_input('newsium-tabbed-popular-posts-title', __('Title', 'newsium'), __('Popular', 'newsium'));

            $categories = newsium_get_terms();
            if (isset($categories) && !empty($categories)) {
                ?><h4><?php _e('Categorised Posts', 'newsium'); ?></h4>
                <?php
                echo parent::newsium_generate_select_options('newsium-enable-categorised-tab', __('Enable Categorised Tab', 'newsium'), $enable_categorised_tab);
                echo parent::newsium_generate_text_input('newsium-tabbed-categorised-posts-title', __('Title', 'newsium'), __('Trending', 'newsium'));
                echo parent::newsium_generate_select_options('newsium-select-category', __('Select category', 'newsium'), $categories);

            }
            ?><h4><?php _e('Settings for all tabs', 'newsium'); ?></h4><?php
            echo parent::newsium_generate_select_options('newsium-show-excerpt', __('Show excerpt', 'newsium'), $options);

            echo parent::newsium_generate_select_options('newsium-select-background', __('Select Background', 'newsium'), $background);

        }
    }
endif;