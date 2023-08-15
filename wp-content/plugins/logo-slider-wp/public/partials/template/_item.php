<?php
if (!defined('WPINC')) {
    die;
}

//Basic
$lgx_from_category   = $lgx_shortcodes_meta['lgx_from_category'];
$lgx_brand_name_en   = $lgx_shortcodes_meta['lgx_brand_name_en'];
$lgx_brand_desc_en   = $lgx_shortcodes_meta['lgx_brand_desc_en'];
$lgx_company_url_en  = $lgx_shortcodes_meta['lgx_company_url_en'];
$lgx_target_type     = $lgx_shortcodes_meta['lgx_target_type'];
$lgx_nofollow_en     = $lgx_shortcodes_meta['lgx_nofollow_en'];

//Style
$lgx_item_hover_anim            = $lgx_shortcodes_meta['lgx_item_hover_anim'];


// Tooltip
$lgx_tooltip_content_type   = $lgx_shortcodes_meta['lgx_tooltip_content_type'];

//Post data
$post_id            = get_the_ID();
$metavalues         = get_post_meta( $post_id, '_logosliderwpmeta', true );
$company_name       = ( (isset($metavalues['company_name'])) ? $metavalues['company_name'] : '' );
$company_url        = ( (isset($metavalues['company_url'])) ? $metavalues['company_url'] : 'javascript:void(0);' );
$tooltip_text       = ( (isset($metavalues['tooltip_text'])) ? $metavalues['tooltip_text'] : '' );
$company_desc        = (!empty($metavalues['company_desc']) ? $metavalues['company_desc'] : '');
$thumb_url          = '';
if (has_post_thumbnail( $post_id )) {
    $thumb_url          = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id), true );
    $thumb_url          = $thumb_url[0];
}

// Condition Content
$tooltip_content = (($lgx_tooltip_content_type == 'brand_name') ? $company_name : $tooltip_text);
$lgx_item_url    = ((('yes' == $lgx_company_url_en) && ( !empty($company_url)) )? esc_url($company_url) : 'javascript:void(0);');
$lgx_url_rel     = (('yes' == $lgx_nofollow_en) ? 'rel="nofollow" ' : '');

?>
<div class="lgx_app_item  <?php echo (('carousel' == $lgx_showcase_type) ? 'swiper-slide' : '');?> lgx_app_hover_effect_<?php echo $lgx_shortcodes_meta['lgx_item_hover_effect'];?>">
    <div class="lgx_app_item_inner <?php echo (('yes' == $lgx_tooltip_en) ? 'lgx_app_item_tooltip' : '');?>" <?php echo (('yes' == $lgx_tooltip_en) ? 'title="'.$tooltip_content.'"' : '');?>>
        <?php if (has_post_thumbnail( $post_id )):  ?>
            <div class="lgx_app_item_figure lgx_img_hover_anim__<?php echo $lgx_item_hover_anim;?>">
                <a class="lgx_app_item_link" <?php echo $lgx_url_rel;?>   href="<?php echo $lgx_item_url;?>"  target="<?php echo $lgx_target_type;?>" >
                    <img class="lgx_app_item_img" src="<?php echo $thumb_url;?>"  alt="<?php echo $company_name;?>" />
                </a>
            </div> <!--//.FIGURE -->
        <?php endif; ?>
        <div class="lgx_app_item_info">
            <?php echo(('yes' == $lgx_brand_name_en) ? '<h4 class="lgx_app_item_title">'.$company_name.'</h4>' : '');?>
            <?php echo(('yes' == $lgx_brand_desc_en) ? '<div class="lgx_app_item_desc">'.$company_desc.'</div>' : '');?>
        </div>

        <?php if(($lgx_shortcodes_meta['lgx_item_hover_effect'] == 'overlay_link') || ($lgx_shortcodes_meta['lgx_item_hover_effect'] == 'overlay_title')): ?>
            <div class="lgx_app_item_overlay_wrap">
                <div class="lgx_app_item_overlay">
                    <?php echo((('yes' == $lgx_brand_name_en) && ($lgx_shortcodes_meta['lgx_item_hover_effect'] == 'overlay_title')) ? '<h4 class="lgx_app_item_title lgx_app_item_overlay_title ">'.$company_name.'</h4>' : '');?>
                    <a class="lgx_app_item_overlay_link " <?php echo $lgx_url_rel;?>   href="<?php echo $lgx_item_url;?>"  target="<?php echo $lgx_target_type;?>"><span><i class="fa fa-link" aria-hidden="true"></i></span></a>
                </div>
            </div>
        <?php endif; ?>

    </div>
</div>