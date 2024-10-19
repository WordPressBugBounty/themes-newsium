<?php
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function newsium_widgets_init()
{
    register_sidebar(array(
        'name' => esc_html__('Main Sidebar', 'newsium'),
        'id' => 'sidebar-1',
        'description' => esc_html__('Add widgets for main sidebar.', 'newsium'),
        'before_widget' => '<div id="%1$s" class="widget newsium-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title widget-title-1"><span>',
        'after_title' => '</span></h2>',
    ));

    register_sidebar(array(
        'name'          => esc_html__('Off Canvas', 'newsium'),
        'id'            => 'off-canvas-panel',
        'description'   => esc_html__('Add widgets for off-canvas section.', 'newsium'),
        'before_widget' => '<div id="%1$s" class="widget newsium-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title widget-title-1"><span>',
        'after_title' => '</span></h2>',
    ));


    register_sidebar(array(
        'name' => esc_html__('Front-page Content Section', 'newsium'),
        'id' => 'home-content-widgets',
        'description' => esc_html__('Add widgets to front-page contents section.', 'newsium'),
        'before_widget' => '<div id="%1$s" class="widget newsium-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title"><span>',
        'after_title' => '</span></h2>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Front-page Primary Sidebar', 'newsium'),
        'id' => 'home-sidebar-1-widgets',
        'description' => esc_html__('Add widgets to front-page first sidebar section.', 'newsium'),
        'before_widget' => '<div id="%1$s" class="widget newsium-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title widget-title-1"><span>',
        'after_title' => '</span></h2>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Front-page Secondary Sidebar', 'newsium'),
        'id' => 'home-sidebar-2-widgets',
        'description' => esc_html__('Add widgets to front-page second sidebar section.', 'newsium'),
        'before_widget' => '<div id="%1$s" class="widget newsium-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title widget-title-1"><span>',
        'after_title' => '</span></h2>',
    ));


    register_sidebar(array(
        'name' => esc_html__('Footer First Section', 'newsium'),
        'id' => 'footer-first-widgets-section',
        'description' => esc_html__('Displays items on footer first column.', 'newsium'),
        'before_widget' => '<div id="%1$s" class="widget newsium-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title widget-title-1"><span class="header-after">',
        'after_title' => '</span></h2>',
    ));


    register_sidebar(array(
        'name' => esc_html__('Footer Second Section', 'newsium'),
        'id' => 'footer-second-widgets-section',
        'description' => esc_html__('Displays items on footer second column.', 'newsium'),
        'before_widget' => '<div id="%1$s" class="widget newsium-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title widget-title-1"><span class="header-after">',
        'after_title' => '</span></h2>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Footer Third Section', 'newsium'),
        'id' => 'footer-third-widgets-section',
        'description' => esc_html__('Displays items on footer third column.', 'newsium'),
        'before_widget' => '<div id="%1$s" class="widget newsium-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title widget-title-1"><span class="header-after">',
        'after_title' => '</span></h2>',
    ));


}

add_action('widgets_init', 'newsium_widgets_init');