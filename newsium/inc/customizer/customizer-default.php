<?php
/**
 * Default theme options.
 *
 * @package Newsium
 */

if (!function_exists('newsium_get_default_theme_options')):

/**
 * Get default theme options
 *
 * @since 1.0.0
 *
 * @return array Default theme options.
 */
function newsium_get_default_theme_options() {

    $defaults = array();
    // Preloader options section
    $defaults['enable_site_preloader'] = 1;

    // Header options section
    $defaults['header_layout'] = 'header-layout-1';

    $defaults['show_top_header_section'] = 0;
    $defaults['top_header_background_color'] = "#1c1c1c";
    $defaults['top_header_text_color'] = "#ffffff";

    $defaults['show_top_menu'] = 1;
    $defaults['show_social_menu_section'] = 1;
    $defaults['show_secondary_menu_section'] = 1;
    $defaults['enable_sticky_header_option'] = 0;
    
    $defaults['show_date_section'] = 1;

    $defaults['disable_header_image_tint_overlay'] = 0;


    $defaults['banner_advertisement_section'] = '';
    $defaults['banner_advertisement_section_url'] = '';
    $defaults['banner_advertisement_open_on_new_tab'] = 1;
    $defaults['banner_advertisement_scope'] = 'front-page-only';


    // breadcrumb options section
    $defaults['enable_breadcrumb'] = 0;
    $defaults['select_breadcrumb_mode'] = 'default';


    // Frontpage Section.

    $defaults['show_popular_tags_section'] = 1;
    $defaults['show_popular_tags_title'] = __('Popular Tags', 'newsium');
    $defaults['number_of_popular_tags'] = 7;
    $defaults['select_popular_tags_mode'] = 'post_tag';

    $defaults['show_flash_news_section'] = 1;
    $defaults['flash_news_title'] = __('Exclusive', 'newsium');
    $defaults['flash_news_subtitle'] = __('Breaking News', 'newsium');
    $defaults['select_flash_news_category'] = 0;
    $defaults['number_of_flash_news'] = 5;
    $defaults['disable_animation']= 0;
    $defaults['select_flash_new_mode'] = 'flash-slide-left';
    $defaults['banner_flash_news_scope'] = 'front-page-only';

    $defaults['show_main_news_section'] = 1;

    $defaults['select_main_banner_section_mode'] = 'default';
    $defaults['select_slider_news_category'] = 0;
    $defaults['main_banner_section_background_color'] = '#1c1c1c';
    $defaults['main_banner_section_secondary_background_color'] = '#212121';
    $defaults['main_banner_section_texts_color'] = '#ffffff';

    $defaults['show_trending_carousel_section'] = 1;
    $defaults['select_trending_carousel_section_mode'] = 'left';
    $defaults['select_trending_carousel_section_mode_grid'] = 'top';
    $defaults['select_trending_carousel_category'] = 0;



    //Defaults carousel layout
    $defaults['select_default_carousel_column'] = 'carousel-2';
    $defaults['select_default_carousel_layout'] = 'title-over-image';

    //Defaults grid layout
    $defaults['select_default_grid_column'] = 'grid-layout-1';

    //Defaults slider layout
    $defaults['select_default_slider_mode'] = 'default';
    $defaults['select_default_slider_thumb_mode'] = 'show';

    //Banner Layout Mode
    $defaults['select_banner_layout_mode'] = 'wide';
    $defaults['enable_gaps_between_thumbs'] = true;

    $defaults['number_of_slides'] = 5;

    $defaults['editors_picks_title'] = __("Editor's Picks", 'newsium');
    $defaults['select_editors_picks_category'] = 0;

    $defaults['trending_slider_title'] = __("Trending Story", 'newsium');
    $defaults['select_trending_news_category'] = 0;
    $defaults['number_of_trending_slides'] = 5;

    $defaults['show_featured_news_section'] = 1;
    $defaults['featured_news_section_title'] = __('Featured Story', 'newsium');
    $defaults['select_featured_news_category'] = 0;
    //$defaults['number_of_featured_news'] = 6;

    //$defaults['show_editors_pick_section'] = 1;
    $defaults['editors_pick_section_title'] = __("Editor's Pick", 'newsium');
    $defaults['select_editors_pick_category'] = 0;
    //$defaults['number_of_editors_pick_news'] = 4;


    $defaults['frontpage_content_alignment'] = 'frontpage-layout-1';
    $defaults['frontpage_sticky_sidebar'] = 1;
    $defaults['frontpage_sticky_sidebar_position'] = 'sidebar-sticky-bottom';



    //layout options
    $defaults['global_content_layout'] = 'default-content-layout';
    $defaults['global_content_alignment'] = 'align-content-left';
    $defaults['global_image_alignment'] = 'full-width-image';
    $defaults['global_post_date_author_setting'] = 'show-date-author';
    $defaults['global_hide_post_date_author_in_list'] = 1;
    $defaults['global_excerpt_length'] = 20;
    $defaults['global_read_more_texts'] = __('Read more', 'newsium');
    $defaults['global_widget_excerpt_setting'] = 'trimmed-content';
    $defaults['global_date_display_setting'] = 'theme-date';

    $defaults['archive_layout'] = 'archive-layout-list';
    $defaults['archive_pagination_view'] = 'archive-default';
    $defaults['archive_image_alignment_grid'] = 'archive-image-default';
    $defaults['archive_image_alignment_list'] = 'archive-image-left';
    $defaults['archive_image_alignment'] = 'archive-image-default';
    $defaults['archive_content_view'] = 'archive-content-excerpt';
    $defaults['disable_main_banner_on_blog_archive'] = 0;


    //Related posts
    $defaults['single_show_featured_image'] = 1;
    $defaults['single_post_featured_image_view']     = 'default';


    //Related posts
    $defaults['single_show_related_posts'] = 1;
    $defaults['single_related_posts_title']     = __( 'More Stories', 'newsium' );
    $defaults['single_number_of_related_posts']  = 3;

    //Pagination.
    $defaults['site_pagination_type'] = 'default';

    //Mailchimp
    $defaults['footer_show_mailchimp_subscriptions'] = 1;
    $defaults['footer_mailchimp_subscriptions_scopes'] = 'front-page';
    $defaults['footer_mailchimp_title']     = __( 'Subscribe To  Our Newsletter', 'newsium' );
    $defaults['footer_mailchimp_shortcode']  = '';
    $defaults['footer_mailchimp_background_color']  = '#1f2125';
    $defaults['footer_mailchimp_text_color']  = '#ffffff';


    // Footer.
    // Latest posts
    $defaults['frontpage_show_latest_posts'] = 1;
    $defaults['frontpage_latest_posts_section_title'] = __('You may have missed', 'newsium');
    $defaults['frontpage_latest_posts_category'] = 0;
    $defaults['number_of_frontpage_latest_posts'] = 4;

    //Instagram
    $defaults['footer_show_instagram_post_carousel'] = 0;
    $defaults['footer_instagram_post_carousel_scopes'] = 'front-page';
    $defaults['instagram_username'] = 'wpafthemes';
    $defaults['instagram_access_token'] = '7513125878.1677ed0.4859561aaca443e588fb8a37bc5f1e3b';
    $defaults['number_of_instagram_posts'] = 10;
    $defaults['footer_instagram_post_carousel_thumb_size'] = 'small';


    $defaults['footer_copyright_text'] = esc_html__('Copyright &copy; All rights reserved.', 'newsium');
    $defaults['hide_footer_menu_section']  = 0;
    $defaults['hide_footer_site_title_section']  = 0;
    $defaults['hide_footer_copyright_credits']  = 0;
    $defaults['number_of_footer_widget']  = 3;
    $defaults['footer_background_color']  = '#1f2125';
    $defaults['footer_texts_color']  = '#ffffff';
    $defaults['footer_credits_background_color']  = '#000000';
    $defaults['footer_credits_texts_color']  = '#ffffff';



    // font and color options

    $defaults['primary_color']     = '#4a4a4a';
    $defaults['secondary_color']     = '#C30010';
    $defaults['secondary_background_color']     = '#f3f3f3';
    $defaults['tertiary_background_color']     = '#2c2c2c';
    $defaults['texts_over_tertiary_background_color']     = '#ffffff';
    $defaults['text_over_secondary_color']     = '#ffffff';
    $defaults['link_color']     = '#1e70cd';
    $defaults['site_wide_title_color']     = '#1c1c1c';
    $defaults['main_navigation_link_color']     = '#ffffff';
    $defaults['main_navigation_custom_background_color']     = '#1b1b1b';
    $defaults['main_navigation_badge_background']     = '#C30010';
    $defaults['main_navigation_badge_color']     = '#ffffff';
    $defaults['title_link_color']     = '#3a3a3a';
    $defaults['title_over_image_color']     = '#ffffff';
    $defaults['site_default_post_box_color']     = '#ffffff';
    $defaults['site_secondary_post_box_color']     = '#ffffff';


//font options additional value
    global $newsium_google_fonts;
    $newsium_google_fonts = array(
        'ABeeZee:400,400italic'                     => 'ABeeZee',
        'Abel'                                      => 'Abel',
        'Abril+Fatface'                             => 'Abril Fatface',
        'Aldrich'                                   => 'Aldrich',
        'Alegreya:400,400italic,700,900'            => 'Alegreya',
        'Alex+Brush'                                => 'Alex Brush',
        'Alfa+Slab+One'                             => 'Alfa Slab One',
        'Amaranth:400,400italic,700'                => 'Amaranth',
        'Andada'                                    => 'Andada',
        'Anton'                                     => 'Anton',
        'Archivo+Black'                             => 'Archivo Black',
        'Archivo+Narrow:400,400italic,700'          => 'Archivo Narrow',
        'Arimo:400,400italic,700'                   => 'Arimo',
        'Arvo:400,400italic,700'                    => 'Arvo',
        'Asap:400,400italic,700'                    => 'Asap',
        'Bangers'                                   => 'Bangers',
        'BenchNine:400,700'                         => 'BenchNine',
        'Bevan'                                     => 'Bevan',
        'Bitter:400,400italic,700'                  => 'Bitter',
        'Bree+Serif'                                => 'Bree Serif',
        'Cabin:400,400italic,500,600,700'           => 'Cabin',
        'Cabin+Condensed:400,500,600,700'           => 'Cabin Condensed',
        'Cantarell:400,400italic,700'               => 'Cantarell',
        'Carme'                                     => 'Carme',
        'Cherry+Cream+Soda'                         => 'Cherry Cream Soda',
        'Cinzel:400,700,900'                        => 'Cinzel',
        'Comfortaa:400,300,700'                     => 'Comfortaa',
        'Cookie'                                    => 'Cookie',
        'Covered+By+Your+Grace'                     => 'Covered By Your Grace',
        'Crete+Round:400,400italic'                 => 'Crete Round',
        'Crimson+Text:400,400italic,600,700'        => 'Crimson Text',
        'Cuprum:400,400italic'                      => 'Cuprum',
        'Dancing+Script:400,700'                    => 'Dancing Script',
        'Didact+Gothic'                             => 'Didact Gothic',
        'Droid+Sans:400,700'                        => 'Droid Sans',
        'Dosis:400,300,600,800'                     => 'Dosis',
        'Droid+Serif:400,400italic,700'             => 'Droid Serif',
        'Economica:400,700,400italic'               => 'Economica',
        'Expletus+Sans:400,400i,700,700i'           => 'Expletus Sans',
        'EB+Garamond'                               => 'EB Garamond',
        'Exo:400,300,400italic,600,800'             => 'Exo',
        'Exo+2:400,300,400italic,600,700,900'       => 'Exo 2',
        'Fira+Sans:400,500'                         => 'Fira Sans',
        'Fjalla+One'                                => 'Fjalla One',
        'Francois+One'                              => 'Francois One',
        'Fredericka+the+Great'                      => 'Fredericka the Great',
        'Fredoka+One'                               => 'Fredoka One',
        'Fugaz+One'                                 => 'Fugaz One',
        'Great+Vibes'                               => 'Great Vibes',
        'Handlee'                                   => 'Handlee',
        'Hammersmith+One'                           => 'Hammersmith One',
        'Hind:400,300,600,700'                      => 'Hind',
        'Inconsolata:400,700'                       => 'Inconsolata',
        'Indie+Flower'                              => 'Indie Flower',
        'Istok+Web:400,400italic,700'               => 'Istok Web',
        'Josefin+Sans:400,600,700,400italic'        => 'Josefin Sans',
        'Josefin+Slab:400,400italic,700,600'        => 'Josefin Slab',
        'Jura:400,300,500,600'                      => 'Jura',
        'Karla:400,400italic,700'                   => 'Karla',
        'Kaushan+Script'                            => 'Kaushan Script',
        'Kreon:400,300,700'                         => 'Kreon',
        'Lateef'                                    => 'Lateef',
        'Lato:400,300,400italic,900,700'            => 'Lato',
        'Libre+Baskerville:400,400italic,700'       => 'Libre Baskerville',
        'Limelight'                                 => 'Limelight',
        'Lobster'                                   => 'Lobster',
        'Lobster+Two:400,700,700italic'             => 'Lobster Two',
        'Lora:400,400italic,700,700italic'          => 'Lora',
        'Maven+Pro:400,500,700,900'                 => 'Maven Pro',
        'Merriweather:400,400italic,300,900,700'    => 'Merriweather',
        'Merriweather+Sans:400,400italic,700,800'   => 'Merriweather Sans',
        'Monda:400,700'                             => 'Monda',
        'Montserrat:400,700'                        => 'Montserrat',
        'Muli:400,300italic,300'                    => 'Muli',
        'News+Cycle:400,700'                        => 'News Cycle',
        'Noticia+Text:400,400italic,700'            => 'Noticia Text',
        'Noto+Sans:400,400italic,700'               => 'Noto Sans',
        'Noto+Serif:400,400italic,700'              => 'Noto Serif',
        'Nunito:400,300,700'                        => 'Nunito',
        'Old+Standard+TT:400,400italic,700'         => 'Old Standard TT',
        'Open+Sans:400,400italic,600,700'           => 'Open Sans',
        'Open+Sans+Condensed:300,300italic,700'     => 'Open Sans Condensed',
        'Oswald:300,400,700'                        => 'Oswald',
        'Oxygen:400,300,700'                        => 'Oxygen',
        'Pacifico'                                  => 'Pacifico',
        'Passion+One:400,700,900'                   => 'Passion One',
        'Pathway+Gothic+One'                        => 'Pathway Gothic One',
        'Patua+One'                                 => 'Patua One',
        'Poiret+One'                                => 'Poiret One',
        'Pontano+Sans'                              => 'Pontano Sans',
        'Poppins:300,400,500,600,700'               => 'Poppins',
        'Play:400,700'                              => 'Play',
        'Playball'                                  => 'Playball',
        'Playfair+Display:400,400italic,700,900'    => 'Playfair Display',
        'PT+Sans:400,400italic,700'                 => 'PT Sans',
        'PT+Sans+Caption:400,700'                   => 'PT Sans Caption',
        'PT+Sans+Narrow:400,700'                    => 'PT Sans Narrow',
        'PT+Serif:400,400italic,700'                => 'PT Serif',
        'Quattrocento+Sans:400,700,400italic'       => 'Quattrocento Sans',
        'Questrial'                                 => 'Questrial',
        'Quicksand:400,700'                         => 'Quicksand',
        'Raleway:400,300,500,600,700,900'           => 'Raleway',
        'Righteous'                                 => 'Righteous',
        'Roboto:100,300,400,500,700'                => 'Roboto',
        'Roboto+Condensed:400,300,400italic,700'    => 'Roboto Condensed',
        'Roboto+Slab:400,300,700'                   => 'Roboto Slab',
        'Rokkitt:400,700'                           => 'Rokkitt',
        'Ropa+Sans:400,400italic'                   => 'Ropa Sans',
        'Rubik:300,300i,400,400i,500,500i,700,700i,900,900i'                   => 'Rubik',
        'Russo+One'                                 => 'Russo One',
        'Sanchez:400,400italic'                     => 'Sanchez',
        'Satisfy'                                   => 'Satisfy',
        'Shadows+Into+Light'                        => 'Shadows Into Light',
        'Sigmar+One'                                => 'Sigmar One',
        'Signika:400,300,700'                       => 'Signika',
        'Six+Caps'                                  => 'Six Caps',
        'Slabo+27px'                                => 'Slabo 27px',
        'Source+Sans+Pro:400,400i,700,700i' => 'Source Sans Pro',
        'Source+Serif+Pro:400,700'                  => 'Source Serif Pro',
        'Squada+One'                                => 'Squada One',
        'Tangerine:400,700'                         => 'Tangerine',
        'Tinos:400,400italic,700'                   => 'Tinos',
        'Titillium+Web:400,300,400italic,700,900'   => 'Titillium Web',
        'Ubuntu:400,400italic,500,700'              => 'Ubuntu',
        'Ubuntu+Condensed'                          => 'Ubuntu Condensed',
        'Varela+Round'                              => 'Varela Round',
        'Vollkorn:400,400italic,700'                => 'Vollkorn',
        'Voltaire'                                  => 'Voltaire',
        'Yanone+Kaffeesatz:400,300,700'             => 'Yanone Kaffeesatz',
    );

    //font option


    $defaults['post_format_color']    = '#ffffff';
    $defaults['global_show_home_menu']           = 'yes';
    $defaults['global_show_comment_count']           = 'yes';
    $defaults['global_hide_comment_count_in_list']   = 1;
    $defaults['global_show_min_read']           = 'no';
    $defaults['global_hide_min_read_in_list']   = 1;
    $defaults['global_show_min_read_number']   = 250;
    $defaults['aft_language_switcher']           = '';
    $defaults['show_watch_online_section']           = 1;
    $defaults['aft_custom_title']           = __('Watch Online', 'newsium');
    $defaults['aft_custom_link']           = '';
    $defaults['global_show_categories']           = 'yes';
    $defaults['global_show_home_menu_border']    = 'show-menu-border';
    $defaults['global_site_mode_setting']    = 'aft-default-mode';







    //font size
    $defaults['site_title_font_size']    = 42;


    // Pass through filter.
    $defaults = apply_filters('newsium_filter_default_theme_options', $defaults);

	return $defaults;

}

endif;
