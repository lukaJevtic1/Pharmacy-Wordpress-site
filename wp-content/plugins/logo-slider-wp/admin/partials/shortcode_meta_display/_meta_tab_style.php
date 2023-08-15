<?php
if (!defined('WPINC')) {
    die;
}

$this->meta_form->buy_pro(
    array(
        'status'  => LGX_LS_PLUGIN_META_FIELD_PRO,
        'link' => 'https://logichunt.com/product/wordpress-logo-slider/',
    )
);

$this->meta_form->select(
    array(
        'label'     => __( 'Hover Effect', $this->plugin_name ),
        'desc'      => __( 'Select hover effect for showcase item', $this->plugin_name ),
        'name'      => 'meta_lgx_lsp_shortcodes[lgx_item_hover_effect]',
        'id'        => 'lgx_item_hover_effect',
        'status'  => LGX_LS_PLUGIN_META_FIELD_PRO,
        'default'   => 'none',
        'options'   => array(
            'none' => __( 'None', $this->plugin_name ),
            'gray_hover' => __( 'Grayscale On Over', $this->plugin_name ),
            'gray_remove' => __( 'Grayscale Remove On Over', $this->plugin_name ),
            'gray_always' => __( 'Grayscale Always', $this->plugin_name ),
            'box_shadow' => __( 'Box Shadow', $this->plugin_name ),
            'box_shadow_always' => __( 'Box Shadow Always', $this->plugin_name ),
            'overlay_link' => __( 'Hover Overlay Link', $this->plugin_name ),
            'overlay_title' => __( 'Hover Overlay Link with Title', $this->plugin_name ),
        )
    )
);


$this->meta_form->select(
    array(
        'label'     => __( 'Hover Animation', $this->plugin_name ),
        'desc'      => __( 'Select hover animation for showcase logo image.', $this->plugin_name ),
        'name'      => 'meta_lgx_lsp_shortcodes[lgx_item_hover_anim]',
        'status'    => LGX_LS_PLUGIN_META_FIELD_PRO,
        'id'        => 'lgx_item_hover_anim',
        'default'   => 'default',
        'options'   => array(
            'default'       => __( 'Default', $this->plugin_name ),
            'none'          => __( 'None', $this->plugin_name ),
            'scaleup'       => __( 'Scale Up', $this->plugin_name ),
            'bounce'        => __( 'Bounce', $this->plugin_name ),
            'flash'         => __( 'Flash', $this->plugin_name ),
            'pulse'         => __( 'Pulse', $this->plugin_name ),
            'rubberBand'    => __( 'Rubber Band', $this->plugin_name ),
            'shakeX'        => __( 'ShakeX', $this->plugin_name ),
            'shakeY'        => __( 'ShakeY', $this->plugin_name ),
            'headShake'     => __( 'Head Shake', $this->plugin_name ),
            'swing'         => __( 'Swing', $this->plugin_name ),
            'tada'          => __( 'Tada', $this->plugin_name ),
            'wobble'        => __( 'Wobble', $this->plugin_name ),
            'jello'         => __( 'Jello', $this->plugin_name ),
            'heartBeat'     => __( 'Heart Beat', $this->plugin_name ),
            'backInDown'    => __( 'Back In Down', $this->plugin_name ),
            'backInLeft'    => __( 'Back In Left', $this->plugin_name ),
            'backInRight'   => __( 'Back In Right', $this->plugin_name ),
            'backInUp'      => __( 'Back In Up ', $this->plugin_name ),
            'backOutDown'   => __( 'Back Out Down ', $this->plugin_name ),
            'backOutLeft'   => __( 'Back Out Left ', $this->plugin_name ),
            'backOutRight'  => __( 'Back Out Right ', $this->plugin_name ),
            'backOutUp'     => __( 'Back Out Up ', $this->plugin_name ),
            'bounceIn'      => __( 'Bounce In ', $this->plugin_name ),
            'bounceInDown'  => __( 'Bounce In Down ', $this->plugin_name ),
            'bounceInLeft'  => __( 'Bounce In Left ', $this->plugin_name ),
            'bounceInRight' => __( 'Bounce In Right ', $this->plugin_name ),
            'bounceInUp'    => __( 'Bounce In Up ', $this->plugin_name ),
            'bounceOutDown' => __( 'Bounce Out Down ', $this->plugin_name ),
            'bounceOutLeft' => __( 'Bounce Out Left ', $this->plugin_name ),
            'bounceOutRight'=> __( 'Bounce Out Right ', $this->plugin_name ),
            'bounceOutUp'   => __( 'Bounce Out Up ', $this->plugin_name ),
            'fadeIn'        => __( 'Fade In ', $this->plugin_name ),
            'fadeInDown'    => __( 'Fade In Down ', $this->plugin_name ),
            'fadeInDownBig' => __( 'Fade In Down Big ', $this->plugin_name ),
            'fadeInLeft'    => __( 'Fade In Left ', $this->plugin_name ),
            'fadeInLeftBig' => __( 'Fade In Left Big ', $this->plugin_name ),
            'fadeInRight'   => __( 'Fade In Right ', $this->plugin_name ),
            'fadeInRightBig'=> __( 'Fade In Right Big ', $this->plugin_name ),
            'fadeInUp'      => __( 'Fade In Up ', $this->plugin_name ),
            'fadeInUpBig'   => __( 'Fade In Up Big ', $this->plugin_name ),
            'fadeInTopLeft' => __( 'Fade In Top Left ', $this->plugin_name ),
            'fadeInTopRight'=> __( 'Fade In Top Right ', $this->plugin_name ),
            'fadeInBottomLeft'  => __( 'Fade In Bottom Left ', $this->plugin_name ),
            'fadeInBottomRight' => __( 'Fade In Bottom Right ', $this->plugin_name ),
            'fadeOut'           => __( 'Fade Out ', $this->plugin_name ),
            'fadeOutDown'       => __( 'Fade Out Down ', $this->plugin_name ),
            'fadeOutDownBig'    => __( 'Fade Out Down Big', $this->plugin_name ),
            'fadeOutLeft'       => __( 'Fade Out Left', $this->plugin_name ),
            'fadeOutLeftBig'    => __( 'Fade Out Left Big', $this->plugin_name ),
            'fadeOutRight'      => __( 'Fade Out Right', $this->plugin_name ),
            'fadeOutRightBig'   => __( 'Fade Out Right Big', $this->plugin_name ),
            'fadeOutUp'         => __( 'Fade Out Up', $this->plugin_name ),
            'fadeOutUpBig'      => __( 'Fade Out Up Big', $this->plugin_name ),
            'fadeOutTopLeft'    => __( 'Fade Out Top Left', $this->plugin_name ),
            'fadeOutTopRight'   => __( 'Fade Out Top Right', $this->plugin_name ),
            'fadeOutBottomRight'=> __( 'Fade Out Bottom Right', $this->plugin_name ),
            'fadeOutBottomLeft' => __( 'Fade Out Bottom Left', $this->plugin_name ),
            'flip'              => __( 'Flip', $this->plugin_name ),
            'flipInX'           => __( 'Flip InX', $this->plugin_name ),
            'flipOutX'          => __( 'Flip OutX', $this->plugin_name ),
            'flipOutY'          => __( 'Flip OutY', $this->plugin_name ),
            'lightSpeedInRight' => __( 'Light Speed In Right', $this->plugin_name ),
            'lightSpeedInLeft'  => __( 'Light Speed In Left', $this->plugin_name ),
            'lightSpeedOutRight'=> __( 'Light Speed Out Right', $this->plugin_name ),
            'lightSpeedOutLeft' => __( 'Light Speed Out Left', $this->plugin_name ),
            'rotateIn'          => __( 'Rotate In', $this->plugin_name ),
            'rotateInDownLeft'  => __( 'Rotate In Down Left', $this->plugin_name ),
            'rotateInDownRight' => __( 'Rotate In Down Right', $this->plugin_name ),
            'rotateInUpLeft'    => __( 'Rotate In Up Left', $this->plugin_name ),
            'rotateInUpRight'   => __( 'Rotate In Up Right', $this->plugin_name ),
            'rotateOut'         => __( 'Rotate Out', $this->plugin_name ),
            'rotateOutDownLeft' => __( 'Rotate Out Down Left', $this->plugin_name ),
            'rotateOutDownRight'=> __( 'Rotate Out Down Right', $this->plugin_name ),
            'rotateOutUpLeft'   => __( 'Rotate Out Up Left', $this->plugin_name ),
            'rotateOutUpRight'  => __( 'Rotate Out Up Right', $this->plugin_name ),
            'hinge'             => __( 'Hinge', $this->plugin_name ),
            'jackInTheBox'      => __( 'Jack In TheBox', $this->plugin_name ),
            'rollIn'            => __( 'Roll In', $this->plugin_name ),
            'rollOut'           => __( 'Roll Out', $this->plugin_name ),
            'zoomIn'            => __( 'Zoom In', $this->plugin_name ),
            'zoomInDown'        => __( 'Zoom In Down', $this->plugin_name ),
            'zoomInLeft'        => __( 'Zoom In Left', $this->plugin_name ),
            'zoomInRight'       => __( 'Zoom In Right', $this->plugin_name ),
            'zoomInUp'          => __( 'Zoom In Up', $this->plugin_name ),
            'zoomOut'           => __( 'Zoom Out', $this->plugin_name ),
            'zoomOutDown'       => __( 'Zoom Out Down', $this->plugin_name ),
            'zoomOutLeft'       => __( 'Zoom Out Left', $this->plugin_name ),
            'zoomOutRight'      => __( 'Zoom Out Right', $this->plugin_name ),
            'zoomOutUp'         => __( 'Zoom Out Up', $this->plugin_name ),
            'slideInDown'       => __( 'Slide In Down', $this->plugin_name ),
            'slideInLeft'       => __( 'Slide In Left', $this->plugin_name ),
            'slideInRight'      => __( 'Slide In Right', $this->plugin_name ),
            'slideInUp'         => __( 'Slide In Up', $this->plugin_name ),
            'slideOutDown'      => __( 'Slide Out Down', $this->plugin_name ),
            'slideOutLeft'      => __( 'Slide Out Left', $this->plugin_name ),
            'slideOutRight'     => __( 'Slide Out Right', $this->plugin_name ),
            'slideOutUp'        => __( 'Slide Out Up', $this->plugin_name ),
        )
    )
);



/********************************************************************************/
$this->meta_form->header_spacer(
    array(
        'label'     => __( 'Item Title  Settings', $this->plugin_name ),
    )
);
/********************************************************************************/

$this->meta_form->buy_pro(
    array(
        'status'  => LGX_LS_PLUGIN_META_FIELD_PRO,
        'link' => 'https://logichunt.com/product/wordpress-logo-slider/',
    )
);


$this->meta_form->color(
    array(
        'label'     => __( 'Title Color', $this->plugin_name ),
        'desc'      => __( 'Please select Item Brand Name Color.', $this->plugin_name ),
        'name'      => 'meta_lgx_lsp_shortcodes[lgx_item_brand_name_color]',
        'id'        => 'lgx_item_brand_name_color',
        'default'   => '#111111',
    )
);

$this->meta_form->text(
    array(
        'label'     => __( 'Font Size', $this->plugin_name ),
        'desc'      => __( 'Add Item Brand Name Font Size.', $this->plugin_name ),
        'name'      => 'meta_lgx_lsp_shortcodes[lgx_item_brand_name_font_size]',
        'id'        => 'lgx_item_brand_name_font_size',
        'default'   => '20px'
    )
);

$this->meta_form->text(
    array(
        'label'     => __( 'Font Weight', $this->plugin_name ),
        'desc'      => __( 'Set Item Brand Name Font Weight.', $this->plugin_name ),
        'name'      => 'meta_lgx_lsp_shortcodes[lgx_item_brand_name_font_weight]',
        'id'        => 'lgx_item_brand_name_font_weight',
        'status'  => LGX_LS_PLUGIN_META_FIELD_PRO,
        'default'   => '600'
    )
);

$this->meta_form->text(
    array(
        'label'     => __( 'Bottom Margin', $this->plugin_name ),
        'desc'      => __( 'Set bottom margin for showcase title.', $this->plugin_name ),
        'name'      => 'meta_lgx_lsp_shortcodes[lgx_item_bottom_margin_title]',
        'id'        => 'lgx_item_bottom_margin_title',
        'status'  => LGX_LS_PLUGIN_META_FIELD_PRO,
        'default'   => '0px'
    )
);


/********************************************************************************/
$this->meta_form->header_spacer(
    array(
        'label'     => __( 'Item Description  Settings', $this->plugin_name ),
    )
);
/********************************************************************************/
$this->meta_form->buy_pro(
    array(
        'status'  => LGX_LS_PLUGIN_META_FIELD_PRO,
        'link' => 'https://logichunt.com/product/wordpress-logo-slider/',
    )
);



$this->meta_form->color(
    array(
        'label'     => __( 'Description Color', $this->plugin_name ),
        'desc'      => __( 'Please select Item Description Color.', $this->plugin_name ),
        'name'      => 'meta_lgx_lsp_shortcodes[lgx_item_desc_color]',
        'id'        => 'lgx_item_desc_color',
        'default'   => '#555555',
    )
);


$this->meta_form->text(
    array(
        'label'     => __( 'Description Font Size', $this->plugin_name ),
        'desc'      => __( 'Add Item Description Font Size.', $this->plugin_name ),
        'name'      => 'meta_lgx_lsp_shortcodes[lgx_item_desc_font_size]',
        'id'        => 'lgx_item_desc_font_size',
        'default'   => '20px'
    )
);

$this->meta_form->text(
    array(
        'label'     => __( 'Description Font Weight', $this->plugin_name ),
        'desc'      => __( 'Set Item Description Font Weight.', $this->plugin_name ),
        'name'      => 'meta_lgx_lsp_shortcodes[lgx_item_desc_font_weight]',
        'id'        => 'lgx_item_desc_font_weight',
        'status'  => LGX_LS_PLUGIN_META_FIELD_PRO,
        'default'   => '400'
    )
);

$this->meta_form->text(
    array(
        'label'     => __( 'Description Bottom Margin', $this->plugin_name ),
        'desc'      => __( 'Set bottom margin for showcase description.', $this->plugin_name ),
        'name'      => 'meta_lgx_lsp_shortcodes[lgx_item_bottom_margin_desc]',
        'id'        => 'lgx_item_bottom_margin_desc',
        'status'  => LGX_LS_PLUGIN_META_FIELD_PRO,
        'default'   => '0px'
    )
);


/********************************************************************************/
$this->meta_form->header_spacer(
    array(
        'label'     => __( 'Logo Image Border Settings', $this->plugin_name ),
    )
);
/********************************************************************************/


$this->meta_form->switch(
    array(
        'yes_label' => __( 'Enabled', $this->plugin_name ),
        'no_label' => __( 'Disabled', $this->plugin_name ),
        'label'     => __( 'Image Border', $this->plugin_name ),
        'desc'      => __( 'Enable Border for all logo Image.', $this->plugin_name ),
        'name'      => 'meta_lgx_lsp_shortcodes[lgx_img_border_color_en]',
        'id'        => 'lgx_img_border_color_en',
        'default'   => 'no'
    )
);


$this->meta_form->color(
    array(
        'label'     => __( 'Image Border Color', $this->plugin_name ),
        'desc'      => __( 'Choose border color for logo image.', $this->plugin_name ),
        'name'      => 'meta_lgx_lsp_shortcodes[lgx_img_border_color]',
        'id'        => 'lgx_img_border_color',
        'default'   => '#FF5151',
    )
);


$this->meta_form->color(
    array(
        'label'     => __( 'Image Border Hover Color', $this->plugin_name ),
        'desc'      => __( 'Choose on hover. border color for logo Image', $this->plugin_name ),
        'name'      => 'meta_lgx_lsp_shortcodes[lgx_img_border_color_hover]',
        'id'        => 'lgx_img_border_color_hover',
        'default'   => '#FF9B6A',
    )
);

$this->meta_form->text(
    array(
        'label'     => __( 'Image Border Width', $this->plugin_name ),
        'desc'      => __( 'Set Border Width for Showcase Logo Image.', $this->plugin_name ),
        'name'      => 'meta_lgx_lsp_shortcodes[lgx_img_border_width]',
        'id'        => 'lgx_img_border_width',
        //'status'  => LGX_LS_PLUGIN_META_FIELD_PRO,
        'default'   => '1px'
    )
);


$this->meta_form->text(
    array(
        'label'     => __( 'Image Border Radius', $this->plugin_name ),
        'desc'      => __( 'Set Border Radius for showcase logo Image.', $this->plugin_name ),
        'name'      => 'meta_lgx_lsp_shortcodes[lgx_img_border_radius]',
        'id'        => 'lgx_img_border_radius',
        'status'  => LGX_LS_PLUGIN_META_FIELD_PRO,
        'default'   => '4px'
    )
);



/********************************************************************************/
$this->meta_form->header_spacer(
    array(
        'label'     => __( 'Item  Border Settings', $this->plugin_name ),
    )
);
/********************************************************************************/
$this->meta_form->buy_pro(
    array(
        'status'  => LGX_LS_PLUGIN_META_FIELD_PRO,
        'link' => 'https://logichunt.com/product/wordpress-logo-slider/',
    )
);


$this->meta_form->switch(
    array(
        'label'     => __( 'Item Border', $this->plugin_name ),
        'yes_label' => __( 'Enabled', $this->plugin_name ),
        'no_label' => __( 'Disabled', $this->plugin_name ),
        'desc'      => __( 'Enable Border for all logo item.', $this->plugin_name ),
        'name'      => 'meta_lgx_lsp_shortcodes[lgx_border_color_en]',
        'id'        => 'lgx_border_color_en',
        'status'  => LGX_LS_PLUGIN_META_FIELD_PRO,
        'default'   => 'no'
    )
);


$this->meta_form->color(
    array(
        'label'     => __( 'Item Border Color', $this->plugin_name ),
        'desc'      => __( 'Choose border color for logo item.', $this->plugin_name ),
        'name'      => 'meta_lgx_lsp_shortcodes[lgx_item_border_color]',
        'id'        => 'lgx_border_color',
        'status'  => LGX_LS_PLUGIN_META_FIELD_PRO,
        'default'   => '#161E54',
    )
);

$this->meta_form->color(
    array(
        'label'     => __( 'Item Hover Border Color', $this->plugin_name ),
        'desc'      => __( 'Choose on hover. border color for full item area', $this->plugin_name ),
        'name'      => 'meta_lgx_lsp_shortcodes[lgx_item_border_color_hover]',
        'id'        => 'lgx_item_border_color_hover',
        'status'  => LGX_LS_PLUGIN_META_FIELD_PRO,
        'default'   => '#161E54',
    )
);


$this->meta_form->text(
    array(
        'label'     => __( 'Item Border Width', $this->plugin_name ),
        'desc'      => __( 'Set Border Width for showcase logo item.', $this->plugin_name ),
        'name'      => 'meta_lgx_lsp_shortcodes[lgx_item_border_width]',
        'id'        => 'lgx_item_border_width',
        'status'  => LGX_LS_PLUGIN_META_FIELD_PRO,
        'default'   => '1px'
    )
);


$this->meta_form->text(
    array(
        'label'     => __( 'Item Border Radius', $this->plugin_name ),
        'desc'      => __( 'Set Border Radius for showcase logo item.', $this->plugin_name ),
        'name'      => 'meta_lgx_lsp_shortcodes[lgx_item_border_radius]',
        'id'        => 'lgx_item_border_radius',
        'status'  => LGX_LS_PLUGIN_META_FIELD_PRO,
        'default'   => '4px'
    )
);



/********************************************************************************/
$this->meta_form->header_spacer(
    array(
        'label'     => __( 'Item Background Settings', $this->plugin_name ),
    )
);
/********************************************************************************/

$this->meta_form->switch(
    array(
        'label'     => __( 'Item Background Color', $this->plugin_name ),
        'yes_label' => __( 'Enabled', $this->plugin_name ),
        'no_label' => __( 'Disabled', $this->plugin_name ),
        'desc'      => __( 'Enable Background Color for all logo item.', $this->plugin_name ),
        'name'      => 'meta_lgx_lsp_shortcodes[lgx_item_bg_color_en]',
        'id'        => 'lgx_item_bg_color_en',
        'status'  => LGX_LS_PLUGIN_META_FIELD_PRO,
        'default'   => 'no'
    )
);




$this->meta_form->color(
    array(
        'label'     => __( 'Item Background Color', $this->plugin_name ),
        'desc'      => __( 'Please select logo item background color.', $this->plugin_name ),
        'name'      => 'meta_lgx_lsp_shortcodes[lgx_item_bg_color]',
        'id'        => 'lgx_item_bg_color',
        'status'  => LGX_LS_PLUGIN_META_FIELD_PRO,
        'default'   => '#f1f1f1',
    )
);

$this->meta_form->color(
    array(
        'label'     => __( 'Item Hover Background Color on Hover', $this->plugin_name ),
        'desc'      => __( 'Please select logo item background color on hover.', $this->plugin_name ),
        'name'      => 'meta_lgx_lsp_shortcodes[lgx_item_bg_color_hover]',
        'id'        => 'lgx_item_bg_color_hover',
        'status'  => LGX_LS_PLUGIN_META_FIELD_PRO,
        'default'   => '#f1f1f1',
    )
);

$this->meta_form->buy_pro(
    array(
        'status'  => LGX_LS_PLUGIN_META_FIELD_PRO,
        'link' => 'https://logichunt.com/product/wordpress-logo-slider/',
    )
);

/********************************************************************************/
$this->meta_form->header_spacer(
    array(
        'label'     => __( 'More Settings', $this->plugin_name ),
    )
);
/********************************************************************************/

$this->meta_form->text(
    array(
        'label'     => __( 'Logo Item padding', $this->plugin_name ),
        'desc'      => __( 'Set item inner padding for showcase logo item.', $this->plugin_name ),
        'name'      => 'meta_lgx_lsp_shortcodes[lgx_item_padding]',
        'id'        => 'lgx_item_padding',
        'status'  => LGX_LS_PLUGIN_META_FIELD_PRO,
        'default'   => '0px'
    )
);



$this->meta_form->text(
    array(
        'label'     => __( 'Logo Item Margin', $this->plugin_name ),
        'desc'      => __( 'Set Margin for showcase logo item.', $this->plugin_name ),
        'name'      => 'meta_lgx_lsp_shortcodes[lgx_item_margin]',
        'id'        => 'lgx_item_margin',
        //'status'  => LGX_LS_PLUGIN_META_FIELD_PRO,
        'default'   => '0px'
    )
);
