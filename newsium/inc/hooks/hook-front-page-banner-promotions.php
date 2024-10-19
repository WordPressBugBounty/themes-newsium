<?php
if (!function_exists('newsium_banner_advertisement')):
    /**
     * Ticker Slider
     *
     * @since Newsium 1.0.0
     *
     */
    function newsium_banner_advertisement()
    {

        if (('' != newsium_get_option('banner_advertisement_section')) ) { ?>
            <div class="banner-promotions-wrapper">
                <?php if (('' != newsium_get_option('banner_advertisement_section'))):

                    $newsium_banner_advertisement = newsium_get_option('banner_advertisement_section');
                    $newsium_banner_advertisement = absint($newsium_banner_advertisement);
                    $newsium_banner_advertisement = wp_get_attachment_image($newsium_banner_advertisement, 'full');
                    $newsium_banner_advertisement_url = newsium_get_option('banner_advertisement_section_url');
                    $newsium_banner_advertisement_url = isset($newsium_banner_advertisement_url) ? esc_url($newsium_banner_advertisement_url) : '#';
                    $newsium_open_on_new_tab = newsium_get_option('banner_advertisement_open_on_new_tab');
                    $newsium_open_on_new_tab = ('' != $newsium_open_on_new_tab) ? '_blank' : '';

                    ?>
                    <div class="promotion-section">
                        <a href="<?php echo esc_url($newsium_banner_advertisement_url); ?>" target="<?php echo esc_attr($newsium_open_on_new_tab); ?>">
                            <?php echo $newsium_banner_advertisement; ?>
                        </a>
                    </div>
                <?php endif; ?>                

            </div>
            <!-- Trending line END -->
            <?php
        }


    }
endif;

add_action('newsium_action_banner_advertisement', 'newsium_banner_advertisement', 10);