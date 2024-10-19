<?php
    /**
     * Full block part for displaying page content in page.php
     *
     * @package Newsium
     */

?>

<div class="aft-banner-box-wrapper af-container-row clearfix">
    <div class="aft-carousel-part col-75 pad float-l">
        <?php newsium_get_block('carousel', 'banner'); ?>
    </div>
    <div class="af-trending-news-part col-4 pad float-l">
        <?php do_action('newsium_action_banner_trending_posts'); ?>
    </div>
</div>


