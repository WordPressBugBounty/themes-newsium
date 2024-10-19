<?php

/**
 * Option Panel
 *
 * @package Newsium
 */

$default = newsium_get_default_theme_options();
/*theme option panel info*/
require get_template_directory() . '/inc/customizer/frontpage-options.php';

//font and color options
//require get_template_directory() . '/inc/customizer/font-color-options.php';

// Add Theme Options Panel.
$wp_customize->add_panel('theme_option_panel',
    array(
        'title' => esc_html__('Theme Options', 'newsium'),
        'priority' => 200,
        'capability' => 'edit_theme_options',
    )
);


// Preloader Section.
$wp_customize->add_section('site_preloader_settings',
    array(
        'title' => esc_html__('Preloader Options', 'newsium'),
        'priority' => 4,
        'capability' => 'edit_theme_options',
        'panel' => 'theme_option_panel',
    )
);

// Setting - preloader.
$wp_customize->add_setting('enable_site_preloader',
    array(
        'default' => $default['enable_site_preloader'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'newsium_sanitize_checkbox',
    )
);

$wp_customize->add_control('enable_site_preloader',
    array(
        'label' => esc_html__('Enable preloader', 'newsium'),
        'section' => 'site_preloader_settings',
        'type' => 'checkbox',
        'priority' => 10,
    )
);

// Breadcrumb Section.
$wp_customize->add_section('site_breadcrumb_settings',
    array(
        'title'      => esc_html__('Breadcrumb Options', 'newsium'),
        'priority'   => 50,
        'capability' => 'edit_theme_options',
        'panel'      => 'theme_option_panel',
    )
);

// Setting - breadcrumb.
$wp_customize->add_setting('enable_breadcrumb',
    array(
        'default'           => $default['enable_breadcrumb'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'newsium_sanitize_checkbox',
    )
);

$wp_customize->add_control('enable_breadcrumb',
    array(
        'label'    => esc_html__('Show breadcrumbs', 'newsium'),
        'section'  => 'site_breadcrumb_settings',
        'type'     => 'checkbox',
        'priority' => 10,
    )
);


// Setting - global content alignment of news.
$wp_customize->add_setting('select_breadcrumb_mode',
    array(
        'default'           => $default['select_breadcrumb_mode'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'newsium_sanitize_select',
    )
);

$wp_customize->add_control( 'select_breadcrumb_mode',
    array(
        'label'       => esc_html__('Select Breadcrumbs', 'newsium'),
        'description' => esc_html__("Please ensure that you have enabled the plugin's breadcrumbs before choosing other than Default", 'newsium'),
        'section'     => 'site_breadcrumb_settings',
        'type'        => 'select',
        'choices'               => array(
            'default' => esc_html__( 'Default', 'newsium' ),
            'yoast' => esc_html__( 'Yoast SEO', 'newsium' ),
            'rankmath' => esc_html__( 'Rank Math', 'newsium' ),
            'bcn' => esc_html__( 'NavXT', 'newsium' ),
        ),
        'priority'    => 100,
    ));

    
    /**
     * Layout options section
     *
     * @package Newsium
     */

// Layout Section.
    $wp_customize->add_section('site_layout_settings',
        array(
            'title' => esc_html__('Global Settings', 'newsium'),
            'priority' => 9,
            'capability' => 'edit_theme_options',
            'panel' => 'theme_option_panel',
        )
    );



// Setting - global content alignment of news.
    $wp_customize->add_setting('global_content_alignment',
        array(
            'default' => $default['global_content_alignment'],
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'newsium_sanitize_select',
        )
    );
    
    $wp_customize->add_control('global_content_alignment',
        array(
            'label' => esc_html__('Global Content Alignment', 'newsium'),
            'section' => 'site_layout_settings',
            'type' => 'select',
            'choices' => array(
                'align-content-left' => esc_html__('Content - Primary sidebar', 'newsium'),
                'align-content-right' => esc_html__('Primary sidebar - Content', 'newsium'),
                'full-width-content' => esc_html__('Full width content', 'newsium')
            ),
            'priority' => 130,
        ));

// Setting - global content alignment of news.
    $wp_customize->add_setting('global_show_categories',
        array(
            'default' => $default['global_show_categories'],
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'newsium_sanitize_select',
        )
    );
    
    $wp_customize->add_control('global_show_categories',
        array(
            'label' => esc_html__('Post Categories', 'newsium'),
            'section' => 'site_layout_settings',
            'type' => 'select',
            'choices' => array(
                'yes' => esc_html__('Show', 'newsium'),
                'no' => esc_html__('Hide', 'newsium'),
            
            ),
            'priority' => 130,
        ));


// Setting - global content alignment of news.
    $wp_customize->add_setting('global_widget_excerpt_setting',
        array(
            'default' => $default['global_widget_excerpt_setting'],
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'newsium_sanitize_select',
        )
    );
    
    $wp_customize->add_control('global_widget_excerpt_setting',
        array(
            'label' => esc_html__('Widget Excerpt Mode', 'newsium'),
            'section' => 'site_layout_settings',
            'type' => 'select',
            'choices' => array(
                'trimmed-content' => esc_html__('Trimmed Content', 'newsium'),
                'default-excerpt' => esc_html__('Default Excerpt', 'newsium'),
            
            ),
            'priority' => 130,
        ));


    /**
     * Header section
     *
     * @package Newsium
     */

// Frontpage Section.
    $wp_customize->add_section('header_options_settings',
        array(
            'title' => esc_html__('Header Options', 'newsium'),
            'priority' => 49,
            'capability' => 'edit_theme_options',
            'panel' => 'theme_option_panel',
        )
    );



// Setting - show_site_title_section.
    $wp_customize->add_setting('show_date_section',
        array(
            'default' => $default['show_date_section'],
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'newsium_sanitize_checkbox',
        )
    );
    $wp_customize->add_control('show_date_section',
        array(
            'label' => esc_html__('Show date on top header', 'newsium'),
            'section' => 'header_options_settings',
            'type' => 'checkbox',
            'priority' => 10
        )
    );


// Setting - show_site_title_section.
    $wp_customize->add_setting('show_social_menu_section',
        array(
            'default' => $default['show_social_menu_section'],
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'newsium_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control('show_social_menu_section',
        array(
            'label' => esc_html__('Show social menu on top header', 'newsium'),
            'section' => 'header_options_settings',
            'type' => 'checkbox',
            'priority' => 11,
            //'active_callback' => 'newsium_top_header_status'
        )
    );


// Setting - show_site_title_section.
    $wp_customize->add_setting('show_secondary_menu_section',
        array(
            'default' => $default['show_secondary_menu_section'],
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'newsium_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control('show_secondary_menu_section',
        array(
            'label' => esc_html__('Show Secondary menu', 'newsium'),
            'section' => 'header_options_settings',
            'type' => 'checkbox',
            'priority' => 11
        )
    );



// Setting - sticky_header_option.
    $wp_customize->add_setting('enable_sticky_header_option',
        array(
            'default' => $default['enable_sticky_header_option'],
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'newsium_sanitize_checkbox',
        )
    );
    $wp_customize->add_control('enable_sticky_header_option',
        array(
            'label' => esc_html__('Enable Sticky Header', 'newsium'),
            'section' => 'header_options_settings',
            'type' => 'checkbox',
            'priority' => 11
        )
    );

// Setting - global content alignment of news.
$wp_customize->add_setting('global_show_home_menu',
    array(
        'default' => $default['global_show_home_menu'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'newsium_sanitize_select',
    )
);

$wp_customize->add_control('global_show_home_menu',
    array(
        'label' => esc_html__('Home Menu Icon', 'newsium'),
        'section' => 'header_options_settings',
        'type' => 'select',
        'choices' => array(
            'yes' => esc_html__('Show', 'newsium'),
            'no' => esc_html__('Hide', 'newsium'),

        ),
        'priority' => 11,
    ));





//=================================
//Popular tags Section.
//=================================


//section title
$wp_customize->add_setting('popular_tags_section_title',
    array(
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control(
    new Newsium_Section_Title(
        $wp_customize,
        'popular_tags_section_title',
        array(
            'label' => esc_html__('Popular Tags Section ', 'newsium'),
            'section' => 'header_options_settings',
            'priority' => 100,

        )
    )
);



$wp_customize->add_setting('show_popular_tags_section',
    array(
        'default' => $default['show_popular_tags_section'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'newsium_sanitize_checkbox',
    )
);

$wp_customize->add_control('show_popular_tags_section',
    array(
        'label' => esc_html__('Enable Popular Tags Section', 'newsium'),
        'section' => 'header_options_settings',
        'type' => 'checkbox',
        'priority' => 100,

    )
);


// Setting - number_of_slides.
$wp_customize->add_setting('show_popular_tags_title',
    array(
        'default' => $default['show_popular_tags_title'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control('show_popular_tags_title',
    array(
        'label' => esc_html__('Section Title', 'newsium'),
        'section' => 'header_options_settings',
        'type' => 'text',
        'priority' => 100,
        'active_callback' => 'newsium_popular_tags_section_status'

    )
);


//=================================
//Watch Online Section.
//=================================


//section title
$wp_customize->add_setting('custom_link_section_title',
    array(
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control(
    new Newsium_Section_Title(
        $wp_customize,
        'custom_link_section_title',
        array(
            'label' => esc_html__('Custom Link Section ', 'newsium'),
            'section' => 'header_options_settings',
            'priority' => 100,

        )
    )
);


$wp_customize->add_setting('show_watch_online_section',
    array(
        'default' => $default['show_watch_online_section'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'newsium_sanitize_checkbox',
    )
);

$wp_customize->add_control('show_watch_online_section',
    array(
        'label' => esc_html__('Enable Watch Online Section', 'newsium'),
        'section' => 'header_options_settings',
        'type' => 'checkbox',
        'priority' => 100,

    )
);


// Setting - sticky_header_option.
$wp_customize->add_setting('aft_custom_title',
    array(
        'default' => $default['aft_custom_title'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control('aft_custom_title',
    array(
        'label' => esc_html__('Title', 'newsium'),
        'section' => 'header_options_settings',
        'type' => 'text',
        'priority' => 130,
        'active_callback' => 'show_watch_online_section_status'
    )
);

// Setting - sticky_header_option.
$wp_customize->add_setting('aft_custom_link',
    array(
        'default' => $default['aft_custom_link'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control('aft_custom_link',
    array(
        'label' => esc_html__('Button Link', 'newsium'),
        'section' => 'header_options_settings',
        'type' => 'text',
        'priority' => 130,
        'active_callback' => 'show_watch_online_section_status'
    )
);


/**
 * Sidebar options section
 *
 * @package EnterNews
 */

// Sidebar Section.
$wp_customize->add_section('site_sidebar_settings',
    array(
        'title'      => esc_html__('Sidebar Settings', 'newsium'),
        'priority'   => 50,
        'capability' => 'edit_theme_options',
        'panel'      => 'theme_option_panel',
    )
);

// Setting - frontpage_sticky_sidebar.
$wp_customize->add_setting('frontpage_sticky_sidebar',
    array(
        'default'           => $default['frontpage_sticky_sidebar'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'newsium_sanitize_checkbox',
    )
);

$wp_customize->add_control('frontpage_sticky_sidebar',
    array(
        'label'    => esc_html__('Make Sidebar Sticky', 'newsium'),
        'section'  => 'site_sidebar_settings',
        'type'     => 'checkbox',
        'priority' => 130,
        //'active_callback' => 'frontpage_content_alignment_status'
    )
);

// Setting - global content alignment of news.
$wp_customize->add_setting('frontpage_sticky_sidebar_position',
    array(
        'default'           => $default['frontpage_sticky_sidebar_position'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'newsium_sanitize_select',
    )
);

$wp_customize->add_control( 'frontpage_sticky_sidebar_position',
    array(
        'label'       => esc_html__('Sidebar Sticky Position', 'newsium'),
        'section'     => 'site_sidebar_settings',
        'type'        => 'select',
        'choices'               => array(
            'sidebar-sticky-top' => esc_html__( 'Top', 'newsium' ),
            'sidebar-sticky-bottom' => esc_html__( 'Bottom', 'newsium' ),
        ),
        'priority'    => 130,
        //'active_callback' => 'frontpage_sticky_sidebar_status'
    ));








//========== comment count options ===============

// Global Section.
$wp_customize->add_section('site_comment_count_settings',
    array(
        'title' => esc_html__('Comment Count', 'newsium'),
        'priority' => 50,
        'capability' => 'edit_theme_options',
        'panel' => 'theme_option_panel',
    )
);

// Setting - global content alignment of news.
$wp_customize->add_setting('global_show_comment_count',
    array(
        'default' => $default['global_show_comment_count'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'newsium_sanitize_select',
    )
);

$wp_customize->add_control('global_show_comment_count',
    array(
        'label' => esc_html__('Comment Count', 'newsium'),
        'section' => 'site_comment_count_settings',
        'type' => 'select',
        'choices' => array(
            'yes' => esc_html__('Show', 'newsium'),
            'no' => esc_html__('Hide', 'newsium'),

        ),
        'priority' => 130,
    ));




//========== minutes read count options ===============

// Global Section.
$wp_customize->add_section('site_min_read_settings',
    array(
        'title' => esc_html__('Minutes Read Count', 'newsium'),
        'priority' => 50,
        'capability' => 'edit_theme_options',
        'panel' => 'theme_option_panel',
    )
);


// Setting - global content alignment of news.
$wp_customize->add_setting('global_show_min_read',
    array(
        'default' => $default['global_show_min_read'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'newsium_sanitize_select',
    )
);

$wp_customize->add_control('global_show_min_read',
    array(
        'label' => esc_html__('Minutes Read Count', 'newsium'),
        'section' => 'site_min_read_settings',
        'type' => 'select',
        'choices' => array(
            'yes' => esc_html__('Show', 'newsium'),
            'no' => esc_html__('Hide', 'newsium'),

        ),
        'priority' => 130,
    ));


//========== date and author options ===============

// Global Section.
$wp_customize->add_section('site_post_date_author_settings',
    array(
        'title' => esc_html__('Date and Author', 'newsium'),
        'priority' => 50,
        'capability' => 'edit_theme_options',
        'panel' => 'theme_option_panel',
    )
);

// Setting - global content alignment of news.
$wp_customize->add_setting('global_post_date_author_setting',
    array(
        'default' => $default['global_post_date_author_setting'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'newsium_sanitize_select',
    )
);


$wp_customize->add_control('global_post_date_author_setting',
    array(
        'label' => esc_html__('Date and Author', 'newsium'),
        'section' => 'site_post_date_author_settings',
        'type' => 'select',
        'choices' => array(
            'show-date-author' => esc_html__('Show Date and Author', 'newsium'),
            'show-date-only' => esc_html__('Show Date Only', 'newsium'),
            'show-author-only' => esc_html__('Show Author Only', 'newsium'),
            'hide-date-author' => esc_html__('Hide All', 'newsium'),
        ),
        'priority' => 130,
    ));


// Setting - global content alignment of news.
$wp_customize->add_setting('global_date_display_setting',
    array(
        'default' => $default['global_date_display_setting'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'newsium_sanitize_select',
    )
);

$wp_customize->add_control('global_date_display_setting',
    array(
        'label' => esc_html__('Date Format', 'newsium'),
        'section' => 'site_post_date_author_settings',
        'type' => 'select',
        'choices' => array(
            'theme-date' => esc_html__('Date Format by Theme', 'newsium'),
            'default-date' => esc_html__('WordPress Default Date Format', 'newsium'),

        ),
        'priority' => 130,
        'active_callback' => 'newsium_display_date_status'
    ));





//========== single posts options ===============

// Single Section.
$wp_customize->add_section('site_single_posts_settings',
    array(
        'title' => esc_html__('Single Post', 'newsium'),
        'priority' => 50,
        'capability' => 'edit_theme_options',
        'panel' => 'theme_option_panel',
    )
);

// Setting - related posts.
$wp_customize->add_setting('single_show_featured_image',
    array(
        'default' => $default['single_show_featured_image'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'newsium_sanitize_checkbox',
    )
);

$wp_customize->add_control('single_show_featured_image',
    array(
        'label' => __('Show on featured image', 'newsium'),
        'section' => 'site_single_posts_settings',
        'type' => 'checkbox',
        'priority' => 100,
    )
);

//========== related posts  options ===============

// Single Section.
$wp_customize->add_section('site_single_related_posts_settings',
    array(
        'title' => esc_html__('Related Posts', 'newsium'),
        'priority' => 50,
        'capability' => 'edit_theme_options',
        'panel' => 'theme_option_panel',
    )
);

// Setting - related posts.
$wp_customize->add_setting('single_show_related_posts',
    array(
        'default' => $default['single_show_related_posts'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'newsium_sanitize_checkbox',
    )
);

$wp_customize->add_control('single_show_related_posts',
    array(
        'label' => __('Show on single posts', 'newsium'),
        'section' => 'site_single_related_posts_settings',
        'type' => 'checkbox',
        'priority' => 100,
    )
);

// Setting - related posts.
$wp_customize->add_setting('single_related_posts_title',
    array(
        'default' => $default['single_related_posts_title'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control('single_related_posts_title',
    array(
        'label' => __('Title', 'newsium'),
        'section' => 'site_single_related_posts_settings',
        'type' => 'text',
        'priority' => 100,
        'active_callback' => 'newsium_related_posts_status'
    )
);


/**
 * Archive options section
 *
 * @package Newsium
 */

// Archive Section.
$wp_customize->add_section('site_archive_settings',
    array(
        'title' => esc_html__('Archive Settings', 'newsium'),
        'priority' => 50,
        'capability' => 'edit_theme_options',
        'panel' => 'theme_option_panel',
    )
);

//Setting - archive content view of news.
$wp_customize->add_setting('archive_layout',
    array(
        'default' => $default['archive_layout'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'newsium_sanitize_select',
    )
);

$wp_customize->add_control('archive_layout',
    array(
        'label' => esc_html__('Archive layout', 'newsium'),
        'description' => esc_html__('Select layout for archive', 'newsium'),
        'section' => 'site_archive_settings',
        'type' => 'select',
        'choices' => array(
            'archive-layout-list' => esc_html__('List', 'newsium'),
            'archive-layout-grid' => esc_html__('Grid', 'newsium'),
        ),
        'priority' => 130,
    ));




//========== footer latest blog carousel options ===============

// Footer Section.
$wp_customize->add_section('frontpage_latest_posts_settings',
    array(
        'title' => esc_html__('You May Have Missed', 'newsium'),
        'priority' => 50,
        'capability' => 'edit_theme_options',
        'panel' => 'theme_option_panel',
    )
);
// Setting - latest blog carousel.
$wp_customize->add_setting('frontpage_show_latest_posts',
    array(
        'default' => $default['frontpage_show_latest_posts'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'newsium_sanitize_checkbox',
    )
);

$wp_customize->add_control('frontpage_show_latest_posts',
    array(
        'label' => __('Show Latest Posts Section above Footer', 'newsium'),
        'section' => 'frontpage_latest_posts_settings',
        'type' => 'checkbox',
        'priority' => 100,
    )
);


// Setting - featured_news_section_title.
$wp_customize->add_setting('frontpage_latest_posts_section_title',
    array(
        'default' => $default['frontpage_latest_posts_section_title'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control('frontpage_latest_posts_section_title',
    array(
        'label' => esc_html__('Posts Section Title', 'newsium'),
        'section' => 'frontpage_latest_posts_settings',
        'type' => 'text',
        'priority' => 100,
        'active_callback' => 'newsium_latest_news_section_status'

    )
);



//========== footer section options ===============
// Footer Section.
$wp_customize->add_section('site_footer_settings',
    array(
        'title' => esc_html__('Footer', 'newsium'),
        'priority' => 50,
        'capability' => 'edit_theme_options',
        'panel' => 'theme_option_panel',
    )
);

// Setting - global content alignment of news.
$wp_customize->add_setting('footer_copyright_text',
    array(
        'default' => $default['footer_copyright_text'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control('footer_copyright_text',
    array(
        'label' => __('Copyright Text', 'newsium'),
        'section' => 'site_footer_settings',
        'type' => 'text',
        'priority' => 100,
    )
);



