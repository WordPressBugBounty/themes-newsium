<?php
if (!class_exists('Newsium_Social_Contacts')) :
    /**
     * Adds Newsium_Social_Contacts widget.
     */
    class Newsium_Social_Contacts extends AFthemes_Widget_Base
    {
        /**
         * Sets up a new widget instance.
         *
         * @since 1.0.0
         */
        function __construct()
        {
            $this->text_fields = array('newsium-social-contacts-title');
            $this->select_fields = array('newsium-select-background', 'newsium-select-background-type');

            $widget_ops = array(
                'classname' => 'newsium_social_contacts_widget aft-widget',
                'description' => __('Displays social contacts lists from selected settings.', 'newsium'),
                'customize_selective_refresh' => false,
            );

            parent::__construct('newsium_social_contacts', __('AFTN Social Contacts', 'newsium'), $widget_ops);
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
            $title = apply_filters('widget_title', $instance['newsium-social-contacts-title'], $instance, $this->id_base);
            $title = isset($title) ? $title : __('AFTN Social', 'newsium');
            $subtitle = isset($instance['newsium-social-contacts-subtitle']) ? $instance['newsium-social-contacts-subtitle'] : '';
            $background = isset($instance['newsium-select-background']) ? $instance['newsium-select-background'] : 'default';

            $background_type = isset($instance['newsium-select-background-type']) ? $instance['newsium-select-background-type'] : 'solid-background';

            $background = $background . ' ' . $background_type;


            if ($instance['newsium-select-background'] || $instance['newsium-select-background-type']) {
                $args['before_widget'] = newsium_update_widget_before($args, $background, 'aft-widget');
            }

            // open the widget container
            echo $args['before_widget'];
            ?>
            <?php if (!empty($title) || !empty($subtitle)): ?>
            <div class="em-title-subtitle-wrap">
                <?php if (!empty($title)): ?>
                    <h4 class="widget-title header-after1">
                        <span><?php echo esc_html($title); ?></span>
                    </h4>
                <?php endif; ?>
                <?php if (!empty($subtitle)): ?>
                    <p class="em-widget-subtitle"><?php echo esc_html($subtitle); ?></p>
                <?php endif; ?>
            </div>
        <?php endif; ?>
            <?php
            if (!empty($social_note)) {
                echo "<p class='widget-description'>";
                echo esc_html($social_note);
                echo "</p>";
            } ?>
            <div class="widget-block widget-wrapper">
                <div class="social-widget-menu">
                    <?php
                    if (has_nav_menu('aft-social-nav')) {
                        wp_nav_menu(array(
                            'theme_location' => 'aft-social-nav',
                            'link_before' => '<span class="screen-reader-text">',
                            'link_after' => '</span>',
                        ));
                    } ?>
                </div>
            </div>
            <?php if (!has_nav_menu('aft-social-nav')) : ?>
            <p>
                <?php esc_html_e('Social menu is not set. You need to create menu and assign it to Social Menu on Menu Settings.', 'newsium'); ?>
            </p>
        <?php endif;

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


            // generate the text input for the title of the widget. Note that the first parameter matches text_fields array entry
            echo parent::newsium_generate_text_input('newsium-social-contacts-title', 'Title', 'AFTN Social');
            echo parent::newsium_generate_select_options('newsium-select-background', __('Select Background', 'newsium'), $background);


        }


    }
endif;