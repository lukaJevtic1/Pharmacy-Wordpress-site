<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       https://logichunt.com
 * @since      1.0.0
 *
 * @package    Logo_Slider_Wp
 * @subpackage Logo_Slider_Wp/public/partials
 */

if( (LGX_LS_PLUGIN_BASE == 'logo-slider-wp/logo-slider-wp.php') && (LGX_LS_PLUGIN_META_FIELD_PRO == 'enabled') ) {
	die('<p style="color: red;">Please buy a pro version of this plugin.</p>');
}


//echo '<pre>';print_r($lgx_shortcodes_meta); echo '</pre>';

$lgx_app_id             = $atts['id'];
$lgx_showcase_type      = (isset($lgx_shortcodes_meta['lgx_lswp_showcase_type']) ? $lgx_shortcodes_meta['lgx_lswp_showcase_type'] : 'grid');

//Basic Settings
$lgx_brand_name_en      = $lgx_shortcodes_meta['lgx_brand_name_en'];
$lgx_brand_desc_en      = $lgx_shortcodes_meta['lgx_brand_desc_en'];
$lgx_company_url_en     = $lgx_shortcodes_meta['lgx_company_url_en'];
$lgx_target_type        = $lgx_shortcodes_meta['lgx_target_type'];
$lgx_from_category      = $lgx_shortcodes_meta['lgx_from_category'];
$lgx_nofollow_en        = $lgx_shortcodes_meta['lgx_nofollow_en'];
$lgx_item_sort_order    = (isset($lgx_shortcodes_meta['lgx_item_sort_order']) ? $lgx_shortcodes_meta['lgx_item_sort_order'] : 'ASC');
$lgx_item_sort_order_by = (isset($lgx_shortcodes_meta['lgx_item_sort_order_by']) ? $lgx_shortcodes_meta['lgx_item_sort_order_by'] : 'menu_order');



// Responsive
$lgx_large_desktop_item   = intval($lgx_shortcodes_meta['lgx_large_desktop_item']);
$lgx_desktop_item         = intval($lgx_shortcodes_meta['lgx_desktop_item']);
$lgx_tablet_item          = intval( $lgx_shortcodes_meta['lgx_tablet_item']);
$lgx_mobile_item          = intval($lgx_shortcodes_meta['lgx_mobile_item']);

// Tooltip
$lgx_tooltip_en = $lgx_shortcodes_meta['lgx_tooltip_en'];

$tooltipDataAttr_str = '';
if($lgx_tooltip_en == 'yes') {

    $tooltipDataAttr_Arr = array();
    $tooltipDataAttr_Arr['tt_id']           = $lgx_app_id;
    $tooltipDataAttr_Arr['tt_position']     = $lgx_shortcodes_meta['lgx_tooltip_position'];
    $tooltipDataAttr_Arr['tt_anim']         = $lgx_shortcodes_meta['lgx_tooltip_anim'];
    $tooltipDataAttr_Arr['tt_arrow']        = ($lgx_shortcodes_meta['lgx_tooltip_arrow_en'] == 'no') ? 'false' : 'true';
    $tooltipDataAttr_Arr['tt_duration']     =  intval($lgx_shortcodes_meta['lgx_tooltip_anim_duration']);
    $tooltipDataAttr_Arr['tt_delay']        =  intval($lgx_shortcodes_meta['lgx_tooltip_anim_delay']);
    $tooltipDataAttr_Arr['tt_trigger']      = $lgx_shortcodes_meta['lgx_tooltip_trigger_type'];
    $tooltipDataAttr_Arr['tt_distance']     =  intval($lgx_shortcodes_meta['lgx_tooltip_distance']);
    $tooltipDataAttr_Arr['tt_intersection'] = $lgx_shortcodes_meta['lgx_tooltip_min_intersection'];
    $tooltipDataAttr_Arr['tt_timer']        = $lgx_shortcodes_meta['lgx_tooltip_timer'];

    // Apply Data Attribute
    foreach ($tooltipDataAttr_Arr as $key => $value) {
        $tooltipDataAttr_str .= ' data-' . $key . '="' . $value . '" ';
    }

}
/**
 *
 * Global Style Declaration
 *
 */

include 'dynamic-style/loader-pre-style.php';

wp_enqueue_style('logo-slider-wp-font');

if('yes' == $lgx_tooltip_en) {
    wp_enqueue_style( 'logo-slider-wp-tooltipster-css');
    wp_enqueue_script( 'logo-slider-wp-tooltipster-js');
}

if ( 'carousel' == $lgx_showcase_type ) {

    wp_enqueue_style('logo-slider-wp-swiper-css');
    wp_enqueue_script('logo-slider-wp-swiper-js');

}
//wp_enqueue_script( 'logo-slider-wp-masonry-js');

wp_enqueue_style( 'lgx-logo-slider-style');
wp_enqueue_script( 'logo-slider-wp-public');




/**
 *
 * Plugin view
 *
 */

// Carousel Data
$lgx_carousel_ticker_en  = $lgx_shortcodes_meta['lgx_carousel_ticker_en'];
$lgx_carousel_lazy_load_en = $lgx_shortcodes_meta['lgx_carousel_lazy_load_en'];
$carouselDataAttr_str = '';
$carousel_rtl_en = ((($lgx_shortcodes_meta['lgx_carousel_rtl_en'] == 'yes') && ( 'carousel' == $lgx_showcase_type)) ? 'yes' : 'no');
$carousel_pagination = '';
$carousel_navigation = '';




if ( 'grid' == $lgx_showcase_type ) {

    include 'dynamic-style/grid-style.php';

    include 'template/view-default.php';

} elseif ( 'carousel' == $lgx_showcase_type ) {
    $carouselDataAttr_Arr = array();

    $carouselDataAttr_Arr['effect']   = $lgx_shortcodes_meta['lgx_carousel_transition_effect'];
    $carouselDataAttr_Arr['infinite'] = ($lgx_shortcodes_meta['lgx_carousel_infinite_en'] == 'no') ? 'false' : 'true';
    $carouselDataAttr_Arr['speed'] = $lgx_shortcodes_meta['lgx_carousel_transition_speed'];
    $carouselDataAttr_Arr['autoplay'] = ($lgx_shortcodes_meta['lgx_carousel_autoplay_en'] == 'no') ? 'false' : 'true';
    $carouselDataAttr_Arr['delay']  = (($lgx_carousel_ticker_en == 'yes') ? 1 : $lgx_shortcodes_meta['lgx_carousel_autoplay_delay']) ;
    $carouselDataAttr_Arr['pause']  = ($lgx_shortcodes_meta['lgx_carousel_pause_mouse_enter_en'] == 'no') ? 'false' : 'true';
    $carouselDataAttr_Arr['space']  = $lgx_shortcodes_meta['lgx_carousel_space_between'];

    $carouselDataAttr_Arr['nav'] = ($lgx_shortcodes_meta['lgx_carousel_nav_en'] == 'no') ? 'false' : 'true';
    $carouselDataAttr_Arr['pagination'] = ($lgx_shortcodes_meta['lgx_carousel_pagination_en'] == 'no') ? 'false' : 'true';

    $carouselDataAttr_Arr['height'] = ($lgx_shortcodes_meta['lgx_carousel_auto_height_en'] == 'no') ? 'false' : 'true';
    $carouselDataAttr_Arr['move'] = ($lgx_shortcodes_meta['lgx_carousel_allow_touch_move_en'] == 'no') ? 'false' : 'true';
    $carouselDataAttr_Arr['wheel'] = ($lgx_shortcodes_meta['lgx_carousel_mouse_wheel_en'] == 'no') ? 'false' : 'true';
    $carouselDataAttr_Arr['simulate'] = ($lgx_shortcodes_meta['lgx_carousel_simulate_touch_en'] == 'no') ? 'false' : 'true';
    $carouselDataAttr_Arr['grab'] = ($lgx_shortcodes_meta['lgx_carousel_grab_cursor_en'] == 'no') ? 'false' : 'true';

    $carouselDataAttr_Arr['dynamic'] = ($lgx_shortcodes_meta['lgx_carousel_dynamic_bullets_en'] == 'no') ? 'false' : 'true';
    $carouselDataAttr_Arr['bullets_no'] = $lgx_shortcodes_meta['lgx_carousel_dynamic_bullets_no'];

    $carouselDataAttr_Arr['item_mobile'] = $lgx_mobile_item;
    $carouselDataAttr_Arr['item_tablet'] = $lgx_tablet_item;
    $carouselDataAttr_Arr['item_desk']   = $lgx_desktop_item;
    $carouselDataAttr_Arr['item_large']  = $lgx_large_desktop_item;

    $carouselDataAttr_Arr['lazy']        = ($lgx_carousel_lazy_load_en == 'no') ? 'false' : 'true';

    // Apply Data Attribute
    foreach ($carouselDataAttr_Arr as $key => $value) {
        $carouselDataAttr_str .= ' data-' . $key . '="' . $value . '" ';
    }


    $carousel_pagination = (($lgx_shortcodes_meta['lgx_carousel_pagination_en'] == 'yes') ? '<div class="swiper-pagination lgx_lsw_pagination"></div>' : '');





    $lgx_nav_text_left  = (('text'== $lgx_shortcodes_meta['lgx_carousel_nav_btn_type']) ? $lgx_shortcodes_meta['lgx_carousel_nav_btn_text_prev'] : '<i class="fa fa-'.trim($lgx_shortcodes_meta['lgx_carousel_nav_icon']).'-left"  aria-hidden="true"></i>');
    $lgx_nav_text_right = (('text'== $lgx_shortcodes_meta['lgx_carousel_nav_btn_type']) ? $lgx_shortcodes_meta['lgx_carousel_nav_btn_text_next'] : '<i class="fa fa-'.trim($lgx_shortcodes_meta['lgx_carousel_nav_icon']).'-right"  aria-hidden="true"></i>');

    $lgx_nav_content = '<div class="lgx_lsw_nav_button lgx_lsw_nav_button_prev">'.$lgx_nav_text_left.'</div><div class="lgx_lsw_nav_button lgx_lsw_nav_button_next ">'.$lgx_nav_text_right.'</div>';

    if('yes' == $carousel_rtl_en) {
        $lgx_nav_content = '<div class="lgx_lsw_nav_button lgx_lsw_nav_button_next ">'.$lgx_nav_text_right.'</div><div class="lgx_lsw_nav_button lgx_lsw_nav_button_prev">'.$lgx_nav_text_left.'</div>';
    }

    $carousel_navigation = ((($lgx_shortcodes_meta['lgx_carousel_nav_en'] == 'yes') && ($lgx_carousel_ticker_en != 'yes') ) ? '<div class="lgx_lsw_nav_wrap lgx_lsw_nav_'.$lgx_shortcodes_meta['lgx_carousel_nav_position'].' '.(('yes' == $lgx_shortcodes_meta['lgx_carousel_nav_hover_en']) ? 'lgx_lsw_nav_wrap_hover' : '').' ">'.$lgx_nav_content.'</div>' : '');

    include 'template/view-default.php';

}  /*elseif ( 'ticker' == $lgx_showcase_type ) {

    include 'template/view-ticker.php';
}*/

/**
 *  Load Dynamic Style 
 */

include 'dynamic-style/general-style.php';

if( (LGX_LS_PLUGIN_BASE == 'logo-slider-wp-pro/logo-slider-wp-pro.php') ) {
    include 'dynamic-style/pro-style.php';
}
