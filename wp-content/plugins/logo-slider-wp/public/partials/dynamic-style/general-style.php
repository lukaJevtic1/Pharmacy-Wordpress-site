<?php
if (!defined('WPINC')) {
    die;
}

wp_enqueue_style( 'lgx-logo-slider-style');
wp_enqueue_script( 'logo-slider-wp-public');






//Section Background Settings
$lgx_section_width              = $lgx_shortcodes_meta['lgx_section_width'];
$lgx_section_container          = $lgx_shortcodes_meta['lgx_section_container'];
$lgx_section_bg_img_en          = $lgx_shortcodes_meta['lgx_section_bg_img_en'];
$lgx_section_bg_img             = $lgx_shortcodes_meta['lgx_section_bg_img'];
$lgx_section_bg_img_attachment  = $lgx_shortcodes_meta['lgx_section_bg_img_attachment'];
$lgx_section_bg_img_size        = $lgx_shortcodes_meta['lgx_section_bg_img_size'];
$lgx_section_bg_color_en        = $lgx_shortcodes_meta['lgx_section_bg_color_en'];
$lgx_section_bg_color           = $lgx_shortcodes_meta['lgx_section_bg_color'];
$lgx_section_top_margin         = $lgx_shortcodes_meta['lgx_section_top_margin'];
$lgx_section_bottom_margin      = $lgx_shortcodes_meta['lgx_section_bottom_margin'];
$lgx_section_top_padding        = $lgx_shortcodes_meta['lgx_section_top_padding'];
$lgx_section_bottom_padding     = $lgx_shortcodes_meta['lgx_section_bottom_padding'];


//Header Settings
$lgx_header_title_font_size         = $lgx_shortcodes_meta['lgx_header_title_font_size'];
$lgx_header_title_color             = $lgx_shortcodes_meta['lgx_header_title_color'];
$lgx_header_title_font_weight       = $lgx_shortcodes_meta['lgx_header_title_font_weight'];
$lgx_header_title_bottom_margin     = $lgx_shortcodes_meta['lgx_header_title_bottom_margin'];
$lgx_header_subtitle_font_size      = $lgx_shortcodes_meta['lgx_header_subtitle_font_size'];
$lgx_header_subtitle_color          = $lgx_shortcodes_meta['lgx_header_subtitle_color'];
$lgx_header_subtitle_font_weight    = $lgx_shortcodes_meta['lgx_header_subtitle_font_weight'];
$lgx_header_subtitle_bottom_margin  = $lgx_shortcodes_meta['lgx_header_subtitle_bottom_margin'];



// Style

$lgx_item_brand_name_color          = $lgx_shortcodes_meta['lgx_item_brand_name_color'];
$lgx_item_brand_name_font_size      = $lgx_shortcodes_meta['lgx_item_brand_name_font_size'];
$lgx_item_brand_name_font_weight    = $lgx_shortcodes_meta['lgx_item_brand_name_font_weight'];

$lgx_item_desc_font_size            = $lgx_shortcodes_meta['lgx_item_desc_font_size'];
$lgx_item_desc_color                = $lgx_shortcodes_meta['lgx_item_desc_color'];
$lgx_item_desc_font_weight          = $lgx_shortcodes_meta['lgx_item_desc_font_weight'];

$lgx_img_border_color_en            = $lgx_shortcodes_meta['lgx_img_border_color_en'];
$lgx_img_border_color               = $lgx_shortcodes_meta['lgx_img_border_color'];
$lgx_img_border_color_hover         = $lgx_shortcodes_meta['lgx_img_border_color_hover'];
$lgx_img_border_width               = $lgx_shortcodes_meta['lgx_img_border_width'];
$lgx_img_border_radius              = $lgx_shortcodes_meta['lgx_img_border_radius'];


$lgx_border_color_en                = $lgx_shortcodes_meta['lgx_border_color_en'];
$lgx_item_border_color              = $lgx_shortcodes_meta['lgx_item_border_color'];
$lgx_item_border_color_hover        = $lgx_shortcodes_meta['lgx_item_border_color_hover'];
$lgx_item_border_width              = $lgx_shortcodes_meta['lgx_item_border_width'];
$lgx_item_border_radius             = $lgx_shortcodes_meta['lgx_item_border_radius'];

$lgx_item_bg_color_en               = $lgx_shortcodes_meta['lgx_item_bg_color_en'];
$lgx_item_bg_color                  = $lgx_shortcodes_meta['lgx_item_bg_color'];
$lgx_item_bg_color_hover            = $lgx_shortcodes_meta['lgx_item_bg_color_hover'];

$lgx_item_padding                   = $lgx_shortcodes_meta['lgx_item_padding'];
$lgx_item_margin                    = $lgx_shortcodes_meta['lgx_item_margin'];


//Carousel

$lgx_carousel_pagination_color              = $lgx_shortcodes_meta['lgx_carousel_pagination_color'];
$lgx_carousel_pagination_color_active       = $lgx_shortcodes_meta['lgx_carousel_pagination_color_active'];

$lgx_carousel_nav_position                  = $lgx_shortcodes_meta['lgx_carousel_nav_position'];
$lgx_carousel_nav_color                     = $lgx_shortcodes_meta['lgx_carousel_nav_color'];
$lgx_carousel_nav_color_hover               = $lgx_shortcodes_meta['lgx_carousel_nav_color_hover'];
$lgx_carousel_nav_bg_color                  = $lgx_shortcodes_meta['lgx_carousel_nav_bg_color'];
$lgx_carousel_nav_bg_color_hover            = $lgx_shortcodes_meta['lgx_carousel_nav_bg_color_hover'];
$lgx_carousel_nav_border_en                 = $lgx_shortcodes_meta['lgx_carousel_nav_border_en'];
$lgx_carousel_nav_border_color              = $lgx_shortcodes_meta['lgx_carousel_nav_border_color'];
$lgx_carousel_nav_border_color_hover        = $lgx_shortcodes_meta['lgx_carousel_nav_border_color_hover'];
$lgx_carousel_nav_border_width              = $lgx_shortcodes_meta['lgx_carousel_nav_border_width'];
$lgx_carousel_nav_border_radius             = $lgx_shortcodes_meta['lgx_carousel_nav_border_radius'];





//Style Settings

$lgx_lsw_dynamic_style_general = '';
$lgx_lsw_dynamic_style_general .= '#lgx_logo_slider_app_'. $lgx_app_id.' .lgx_logo_slider{
    '. (('yes' == $lgx_section_bg_img_en) ? 'background: url('.$lgx_section_bg_img.') no-repeat center top;' : '').'
        background-attachment: '. $lgx_section_bg_img_attachment.';
        background-size: '. $lgx_section_bg_img_size.';
        width:'.$lgx_section_width.';
    }';

$lgx_lsw_dynamic_style_general .= ' #lgx_logo_slider_app_'. $lgx_app_id.' .lgx_app_inner {
    '. (('yes' == $lgx_section_bg_color_en) ? 'background-color: '.$lgx_section_bg_color.';' : '').'
        padding: '. $lgx_section_top_padding.' 0 '. $lgx_section_bottom_padding.';
        margin: '. $lgx_section_top_margin.' 0 '. $lgx_section_bottom_margin.';
    }';

$lgx_lsw_dynamic_style_general .= '#lgx_logo_slider_app_'. $lgx_app_id.' .lgx_app_header_title{
        font-size: '. $lgx_header_title_font_size.';
        color:'. $lgx_header_title_color.';
        font-weight: '. $lgx_header_title_font_weight.';
        margin-bottom: '. $lgx_header_title_bottom_margin.';
    }';

$lgx_lsw_dynamic_style_general .= ' #lgx_logo_slider_app_'. $lgx_app_id.' .lgx_app_header_subtitle{
        font-size: '. $lgx_header_subtitle_font_size.';
        color:'. $lgx_header_subtitle_color.';
        font-weight: '. $lgx_header_subtitle_font_weight.';
        margin-bottom: '. $lgx_header_subtitle_bottom_margin.';
    }';

$lgx_lsw_dynamic_style_general .= '#lgx_logo_slider_app_'. $lgx_app_id.' .lgx_app_item .lgx_app_item_title  {
        color: '. $lgx_item_brand_name_color.';
        font-size: '. $lgx_item_brand_name_font_size.';
        font-weight: '. $lgx_item_brand_name_font_weight.';
        margin-bottom: '. $lgx_shortcodes_meta['lgx_item_bottom_margin_title'].';
    }';
$lgx_lsw_dynamic_style_general .= '#lgx_logo_slider_app_'. $lgx_app_id.' .lgx_app_item .lgx_app_item_desc  {
        font-size: '. $lgx_item_desc_font_size.';
        color: '. $lgx_item_desc_color.';
        font-weight: '. $lgx_item_desc_font_weight.';
         margin-bottom: '. $lgx_shortcodes_meta['lgx_item_bottom_margin_desc'].';
    }';
$lgx_lsw_dynamic_style_general .= '#lgx_logo_slider_app_'. $lgx_app_id.' .lgx_app_item .lgx_app_item_figure {
    '. (('yes' == $lgx_img_border_color_en) ? 'border: '.$lgx_img_border_width.' solid '.$lgx_img_border_color.';' : '').'
    '. (('yes' == $lgx_img_border_color_en) ? 'border-radius:'.$lgx_img_border_radius.';' : '').'
    }';
$lgx_lsw_dynamic_style_general .= '#lgx_logo_slider_app_'. $lgx_app_id.' .lgx_app_item .lgx_app_item_inner:hover .lgx_app_item_figure{
        transition: background-color 0.5s ease;
    '. (('yes' == $lgx_img_border_color_en) ? 'border: '.$lgx_img_border_width.' solid '.$lgx_img_border_color_hover.';' : '').'
    }';
$lgx_lsw_dynamic_style_general .= '#lgx_logo_slider_app_'. $lgx_app_id.' .lgx_app_item .lgx_app_item_inner  {
    '. (('yes' == $lgx_border_color_en) ? 'border: '.$lgx_item_border_width.' solid '.$lgx_item_border_color.';' : '').'
    '. (('yes' == $lgx_border_color_en) ? 'border-radius:'.$lgx_item_border_radius.';' : '').'
        padding: '. $lgx_item_padding.';
        margin: '. $lgx_item_margin.';
       '.(('yes' == $lgx_item_bg_color_en) ? 'background-color:'.$lgx_item_bg_color.';' : '').'
    }';
$lgx_lsw_dynamic_style_general .= ' #lgx_logo_slider_app_'. $lgx_app_id.' .lgx_app_item .lgx_app_item_inner:hover  {
    '. (('yes' == $lgx_border_color_en) ? 'border-color: '.$lgx_item_border_color_hover.';' : '').'
    '. (('yes' == $lgx_item_bg_color_en) ? 'background-color:'.$lgx_item_bg_color_hover.';' : '').'

    }';
$lgx_lsw_dynamic_style_general .= ' '.(($lgx_shortcodes_meta['lgx_carousel_pagination_en'] == 'yes') ? '#lgx_logo_slider_app_'.$lgx_app_id.' .lgx_logo_carousel  {padding-bottom: 45px;}' : '').'
';
$lgx_lsw_dynamic_style_general .= '#lgx_logo_slider_app_'. $lgx_app_id.' .lgx_logo_carousel .lgx_lsw_pagination .swiper-pagination-bullet{
        background: '. $lgx_carousel_pagination_color.';
        opacity: 1;
    }';
$lgx_lsw_dynamic_style_general .= ' #lgx_logo_slider_app_'. $lgx_app_id.' .lgx_logo_carousel .lgx_lsw_pagination .swiper-pagination-bullet-active{
        background: '. $lgx_carousel_pagination_color_active.';
    }';
$lgx_lsw_dynamic_style_general .= '#lgx_logo_slider_app_'. $lgx_app_id.' .lgx_logo_carousel .lgx_lsw_pagination .swiper-pagination-bullet-active-main{
        background: '. $lgx_carousel_pagination_color_active.';
    }';
$lgx_lsw_dynamic_style_general .= '#lgx_logo_slider_app_'. $lgx_app_id.' .lgx_logo_carousel .lgx_lsw_nav_button{
        color: '. $lgx_shortcodes_meta['lgx_carousel_nav_color'].';
        background-color: '. $lgx_shortcodes_meta['lgx_carousel_nav_bg_color'].';
        font-size: '. $lgx_shortcodes_meta['lgx_carousel_nav_btn_font_size'].';
        width: '. $lgx_shortcodes_meta['lgx_carousel_nav_btn_width'].';
        height: '. $lgx_shortcodes_meta['lgx_carousel_nav_btn_height'].';
        padding: '. $lgx_shortcodes_meta['lgx_carousel_nav_btn_padding'].';
    '.(($lgx_shortcodes_meta['lgx_carousel_nav_border_en']) ? 'border: '.$lgx_shortcodes_meta['lgx_carousel_nav_border_width'].' '.$lgx_shortcodes_meta['lgx_carousel_nav_border_style'].' '.$lgx_shortcodes_meta['lgx_carousel_nav_border_color'].';' : '').'
        border-radius: '. $lgx_shortcodes_meta['lgx_carousel_nav_border_radius'].';
    }
    ';

$lgx_lsw_dynamic_style_general .= '#lgx_logo_slider_app_'. $lgx_app_id.' .lgx_logo_carousel .lgx_lsw_nav_button:hover{
        border-color: '. $lgx_carousel_nav_border_color_hover.';
     
    }
    ';


/**
 *  Inline Style
 */

wp_add_inline_style( 'lgx-logo-slider-style', $lgx_lsw_dynamic_style_general );