<?php
if (!class_exists('Newsium_author_info')) :
    /**
     * Adds Newsium_author_info widget.
     */
    class Newsium_author_info extends AFthemes_Widget_Base
    {
        /**
         * Sets up a new widget instance.
         *
         * @since 1.0.0
         */
        function __construct()
        {
            $this->text_fields = array('newsium-author-info-title', 'newsium-author-info-subtitle', 'newsium-author-info-image', 'newsium-author-info-name', 'newsium-author-info-desc', 'newsium-author-info-phone', 'newsium-author-info-email');
            $this->url_fields = array('newsium-author-info-facebook', 'newsium-author-info-twitter', 'newsium-author-info-linkedin', 'newsium-author-info-instagram', 'newsium-author-info-vk', 'newsium-author-info-youtube');

            $this->select_fields = array( 'newsium-select-background', 'newsium-select-background-type');

            $widget_ops = array(
                'classname' => 'newsium_author_info_widget aft-widget',
                'description' => __('Displays author info.', 'newsium'),
                'customize_selective_refresh' => false,
            );

            parent::__construct('newsium_author_info', __('AFTSC Author Info', 'newsium'), $widget_ops);
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
            
            $title = apply_filters('widget_title', $instance['newsium-author-info-title'], $instance, $this->id_base);
            $background = isset($instance['newsium-select-background']) ? $instance['newsium-select-background'] : 'default';

            $background_type = isset($instance['newsium-select-background-type']) ? $instance['newsium-select-background-type'] : 'solid-background';

            $background = $background . ' ' . $background_type;

            $profile_image = isset($instance['newsium-author-info-image']) ? ($instance['newsium-author-info-image']) : '';

            if ($profile_image) {
                $image_attributes = wp_get_attachment_image_src($profile_image, 'large');
                $image_src = $image_attributes[0];
                $image_class = 'data-bg data-bg-hover';

            } else {
                $image_src = '';
                $image_class = 'no-bg';
            }

            $name = isset($instance['newsium-author-info-name']) ? ($instance['newsium-author-info-name']) : '';

            $desc = isset($instance['newsium-author-info-desc']) ? ($instance['newsium-author-info-desc']) : '';
            $facebook = isset($instance['newsium-author-info-facebook']) ? ($instance['newsium-author-info-facebook']) : '';
            $twitter = isset($instance['newsium-author-info-twitter']) ? ($instance['newsium-author-info-twitter']) : '';
            $instagram = isset($instance['newsium-author-info-instagram']) ? ($instance['newsium-author-info-instagram']) : '';

    
            if ( $instance['newsium-select-background'] || $instance['newsium-select-background-type']) {
                $args['before_widget']= newsium_update_widget_before($args,$background,'aft-widget');
            }
            echo $args['before_widget'];
            ?>
            <section class="products">
                <div class="container-wrapper">
                    <?php if (!empty($title)): ?>
                        <div class="section-head">
                            <?php if (!empty($title)): ?>
                                <h4 class="widget-title header-after1">
                                    <span class="header-after">
                                        <?php echo esc_html($title); ?>
                                    </span>
                                </h4>
                            <?php endif; ?>


                        </div>

                    <?php endif; ?>
                    <div class="widget-block widget-wrapper">
                    <div class="posts-author-wrapper">

                        <?php if (!empty($image_src)) : ?>


                            <figure class="read-img pos-rel read-bg-img af-author-img <?php echo esc_attr($image_class); ?>">
                                <?php echo wp_kses_post(wp_get_attachment_image($profile_image)); ?>
                            </figure>

                        <?php endif; ?>
                        <div class="af-author-details">
                            <?php if (!empty($name)) : ?>
                                <h4 class="af-author-display-name"><?php echo esc_html($name); ?></h4>
                            <?php endif; ?>
                            <?php if (!empty($desc)) : ?>
                                <p class="af-author-display-name"><?php echo esc_html($desc); ?></p>
                            <?php endif; ?>

                            <?php if (!empty($facebook) || !empty($twitter) || !empty($linkedin) || !empty($youtube) || !empty($instagram) || !empty($vk)) : ?>
                                <div class="social-navigation aft-small-social-menu">
                                    <ul>
                                        <?php if (!empty($facebook)) : ?>
                                            <li>
                                                <a href="<?php echo esc_url($facebook); ?>" target="_blank"></a>
                                            </li>
                                        <?php endif; ?>

                                        <?php if (!empty($instagram)) : ?>
                                            <li>
                                                <a href="<?php echo esc_url($instagram); ?>" target="_blank"></a>
                                            </li>
                                        <?php endif; ?>

                                        <?php if (!empty($twitter)) : ?>
                                            <li>
                                                <a href="<?php echo esc_url($twitter); ?>" target="_blank"></a>
                                            </li>
                                        <?php endif; ?>


                                    </ul>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    </div>
                </div>
            </section>
            <?php
            //print_pre($all_posts);
            // close the widget container
            echo $args['after_widget'];

            //$instance = parent::newsium_sanitize_data( $instance, $instance );


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



            if (isset($categories) && !empty($categories)) {
                // generate the text input for the title of the widget. Note that the first parameter matches text_fields array entry
                echo parent::newsium_generate_text_input('newsium-author-info-title', __('About Author', 'newsium'), __('Title', 'newsium'));

                echo parent::newsium_generate_image_upload('newsium-author-info-image', __('Profile image', 'newsium'), __('Profile image', 'newsium'));
                echo parent::newsium_generate_text_input('newsium-author-info-name', __('Name', 'newsium'), __('Name', 'newsium'));
                echo parent::newsium_generate_text_input('newsium-author-info-desc', __('Descriptions', 'newsium'), '');
                echo parent::newsium_generate_text_input('newsium-author-info-facebook', __('Facebook', 'newsium'), '');
                echo parent::newsium_generate_text_input('newsium-author-info-instagram', __('Instagram', 'newsium'), '');
                echo parent::newsium_generate_text_input('newsium-author-info-twitter', __('Twitter', 'newsium'), '');

                echo parent::newsium_generate_select_options('newsium-select-background', __('Select Background', 'newsium'), $background);



            }
        }
    }
endif;