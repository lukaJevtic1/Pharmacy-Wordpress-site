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
        'label' => __( 'Sliding  Effect', $this->plugin_name ),
        'desc'  => __( 'Slide transition effect will apply as selected.', $this->plugin_name ),
        'name'  => 'meta_lgx_lsp_shortcodes[lgx_carousel_transition_effect]',
        'id'    => 'lgx_carousel_transition_effect',
        'default'   => 'slide',
        'status'  => LGX_LS_PLUGIN_META_FIELD_PRO,
        'options'   => array(
            'slide' => __( 'Slide', $this->plugin_name ),
            'coverflow' => __( 'Coverflow', $this->plugin_name )
        )
    )
);

$this->meta_form->switch(
    array(
        'label' => __( 'Ticker Mood', $this->plugin_name ),
        'yes_label' => __( 'Enabled', $this->plugin_name ),
        'no_label' => __( 'Disabled', $this->plugin_name ),
        'desc' => __( 'If the option is enabled, the carousel will get a smooth autoplay effect and the nav button will be invisible.', $this->plugin_name ),
        'name' => 'meta_lgx_lsp_shortcodes[lgx_carousel_ticker_en]',
        'id' => 'lgx_carousel_ticker_en',
        'status'  => LGX_LS_PLUGIN_META_FIELD_PRO,
        'default' => 'no'

    )
);

$this->meta_form->switch(
    array(
        'label'   => __( 'Infinite Loop', $this->plugin_name ),
        'yes_label' => __( 'Enabled', $this->plugin_name ),
        'no_label' => __( 'Disabled', $this->plugin_name ),
        'desc'    => __( 'If the option is mark as checked, slider will acts like endless.', $this->plugin_name ),
        'name'    => 'meta_lgx_lsp_shortcodes[lgx_carousel_infinite_en]',
        'id'      => 'lgx_carousel_infinite_en',
        'default' => 'yes'
    )
);

$this->meta_form->switch(
    array(
        'label'   => __( 'Autoplay', $this->plugin_name ),
        'yes_label' => __( 'Enabled', $this->plugin_name ),
        'no_label' => __( 'Disabled', $this->plugin_name ),
        'desc'    => __( 'If the option is mark as checked, item will slide automatically.', $this->plugin_name ),
        'name'    => 'meta_lgx_lsp_shortcodes[lgx_carousel_autoplay_en]',
        'id'      => 'lgx_carousel_autoplay_en',
        'default' => 'yes'
    )
);


$this->meta_form->number(
    array(
        'label'   => __( 'Transition Speed', $this->plugin_name ),
        'desc'    => __( 'Duration of transition between slides (in ms). Default value is 450.', $this->plugin_name ),
        'name'    => 'meta_lgx_lsp_shortcodes[lgx_carousel_transition_speed]',
        'id'      => 'lgx_carousel_transition_speed',
        'default' => '450'
    )
);


$this->meta_form->number(
    array(
        'label'   => __( 'Autoplay Delay', $this->plugin_name ),
        'desc'    => __( 'The delay between transitions (in ms) during autoplay. Default value is 1500. <br> <span style="color: #e31919">Note: If the Ticker Mood is enabled, this option will be inactive. Adjust Transition Speed only.</span>', $this->plugin_name ),
        'name'    => 'meta_lgx_lsp_shortcodes[lgx_carousel_autoplay_delay]',
        'id'      => 'lgx_carousel_autoplay_delay',
        'default' => '1500'
    )
);

$this->meta_form->select(
    array(
        'label' => __( 'Item Image Vertical Align', $this->plugin_name ),
        'desc' => __( 'Set carousel item vertical alignment.<br> <span style="color: #e31919">Note: It helps if the size of the images are not equal.</span>', $this->plugin_name ),
        'name' => 'meta_lgx_lsp_shortcodes[lgx_carousel_item_vertical_align]',
        'id' => 'lgx_carousel_item_vertical_align',
        'default'   => 'top',
        'status'  => LGX_LS_PLUGIN_META_FIELD_PRO,
        'options'   => array(
            'top' => __( 'Top', $this->plugin_name ),
            'mid' => __( 'Vertically Middle', $this->plugin_name ),
        )
    )
);


$this->meta_form->switch(
    array(
        'label'   => __( 'RTL Support', $this->plugin_name ),
        'yes_label' => __( 'Enabled', $this->plugin_name ),
        'no_label' => __( 'Disabled', $this->plugin_name ),
        'desc'    => __( 'If the option is mark as checked, then Right to Left (rtl) support will be enabled.', $this->plugin_name ),
        'name'    => 'meta_lgx_lsp_shortcodes[lgx_carousel_rtl_en]',
        'id'      => 'lgx_carousel_rtl_en',
        'default' => 'no'
    )
);


$this->meta_form->switch(
    array(
        'label'   => __( 'Pause on Hover', $this->plugin_name ),
        'yes_label' => __( 'Enabled', $this->plugin_name ),
        'no_label' => __( 'Disabled', $this->plugin_name ),
        'desc'    => __( 'When enabled autoplay will be paused on mouse enter over Swiper container. ', $this->plugin_name ),
        'name'    => 'meta_lgx_lsp_shortcodes[lgx_carousel_pause_mouse_enter_en]',
        'id'      => 'lgx_carousel_pause_mouse_enter_en',
        'status'  => LGX_LS_PLUGIN_META_FIELD_PRO,
        'default' => 'no'
    )
);

$this->meta_form->number(
    array(
        'label'     => __( 'Space Between', $this->plugin_name ),
        'desc'      => __( 'The value must be a number. The number of pixel will be set between slider item. Default value is 10.', $this->plugin_name ),
        'name'      => 'meta_lgx_lsp_shortcodes[lgx_carousel_space_between]',
        'id'        => 'lgx_carousel_space_between',
        'default'   => 10
    )
);


$this->meta_form->switch(
    array(
        'label' => __( 'Lazy load', $this->plugin_name ),
        'yes_label' => __( 'Enabled', $this->plugin_name ),
        'no_label' => __( 'Disabled', $this->plugin_name ),
        'desc' => __( 'If the option is enabled, images lazy loading will be enabled with default settings', $this->plugin_name ),
        'name' => 'meta_lgx_lsp_shortcodes[lgx_carousel_lazy_load_en]',
        'id' => 'lgx_carousel_lazy_load_en',
        'status'  => LGX_LS_PLUGIN_META_FIELD_PRO,
        'default' => 'no'

    )
);

$this->meta_form->select(
    array(
        'label' => __( 'Lazy Spinner Type', $this->plugin_name ),
        'desc' => __( 'Select Lazy Load Spinner color type for animated preloader spinner', $this->plugin_name ),
        'name' => 'meta_lgx_lsp_shortcodes[lgx_carousel_lazy_spinner_color]',
        'id' => 'lgx_carousel_lazy_spinner_color',
        'default'   => 'white',
        'status'  => LGX_LS_PLUGIN_META_FIELD_PRO,
        'options'   => array(
            'white' => __( 'White', $this->plugin_name ),
            'blue' => __( 'Blue', $this->plugin_name ),
        )
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
        'label'     => __( 'Pagination ( Dot ) Settings', $this->plugin_name ),
    )
);
/********************************************************************************/

$this->meta_form->switch(
    array(
        'yes_label' => __( 'Show', $this->plugin_name ),
        'no_label' => __( 'Hide', $this->plugin_name ),
        'label'   => __( 'Pagination', $this->plugin_name ),
        'desc'    => __( 'If the options is mark as checked then pagination will show.', $this->plugin_name ),
        'name'    => 'meta_lgx_lsp_shortcodes[lgx_carousel_pagination_en]',
        'id'      => 'lgx_carousel_pagination_en',
        'default' => 'yes'
    )
);

$this->meta_form->color(
    array(
        'label'     => __( 'Pagination Color', $this->plugin_name ),
        'desc'      => __( 'Please select carousel pagination dot Color.', $this->plugin_name ),
        'name'      => 'meta_lgx_lsp_shortcodes[lgx_carousel_pagination_color]',
        'id'        => 'lgx_carousel_pagination_color',
        'default'   => '#869791',
    )
);


$this->meta_form->color(
    array(
        'label'     => __( 'Active Color', $this->plugin_name ),
        'desc'      => __( 'Please select carousel pagination active dot Color..', $this->plugin_name ),
        'name'      => 'meta_lgx_lsp_shortcodes[lgx_carousel_pagination_color_active]',
        'id'        => 'lgx_carousel_pagination_color_active',
        'default'   => '#222b30',
    )
);

$this->meta_form->switch(
    array(
        'label'   => __( 'Dynamic Bullets', $this->plugin_name ),
        'yes_label' => __( 'Enabled', $this->plugin_name ),
        'no_label' => __( 'Disabled', $this->plugin_name ),
        'desc'    => __( 'Good to enable if you use bullets pagination with a lot of slides. So it will keep only few bullets visible at the same time.', $this->plugin_name ),
        'name'    => 'meta_lgx_lsp_shortcodes[lgx_carousel_dynamic_bullets_en]',
        'status'  => LGX_LS_PLUGIN_META_FIELD_PRO,
        'id'      => 'lgx_carousel_dynamic_bullets_en',
        'default' => 'no'
    )
);

$this->meta_form->text(
    array(
        'label'     => __( 'Main Dynamic Bullets No', $this->plugin_name ),
        'desc'      => __( 'The number of main bullets visible when Dynamic Bullets enabled.', $this->plugin_name ),
        'name'      => 'meta_lgx_lsp_shortcodes[lgx_carousel_dynamic_bullets_no]',
        'status'  => LGX_LS_PLUGIN_META_FIELD_PRO,
        'id'        => 'lgx_carousel_dynamic_bullets_no',
        'default'   => '1'
    )
);

$this->meta_form->switch(
    array(
        'label'   => __( 'Pagination Hide on Mobile', $this->plugin_name ),
        'yes_label' => __( 'Yes', $this->plugin_name ),
        'no_label' => __( 'No', $this->plugin_name ),
        'desc'    => __( 'If the options is mark as checked then pagination will hide on mobile view (767px).', $this->plugin_name ),
        'name'    => 'meta_lgx_lsp_shortcodes[lgx_carousel_pagi_mobile_en]',
        'id'      => 'lgx_carousel_pagi_mobile_en',
        'status'  => LGX_LS_PLUGIN_META_FIELD_PRO,
        'default' => 'no'
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
        'label'     => __( 'Navigation Settings', $this->plugin_name ),
    )
);
/********************************************************************************/

$this->meta_form->switch(
    array(
        'yes_label' => __( 'Show', $this->plugin_name ),
        'no_label' => __( 'Hide', $this->plugin_name ),
        'label'   => __( 'Navigation', $this->plugin_name ),
        'desc'    => __( 'If the options is mark as checked then navigation will show', $this->plugin_name ),
        'name'    => 'meta_lgx_lsp_shortcodes[lgx_carousel_nav_en]',
        'id'      => 'lgx_carousel_nav_en',
        'default' => 'yes'
    )
);

$this->meta_form->switch(
    array(
        'yes_label' => __( 'Yes', $this->plugin_name ),
        'no_label' => __( 'No', $this->plugin_name ),
        'label'   => __( 'Visible On Over', $this->plugin_name ),
        'desc'    => __( 'If the options is mark as checked then navigation will show only on hover.', $this->plugin_name ),
        'name'    => 'meta_lgx_lsp_shortcodes[lgx_carousel_nav_hover_en]',
        'status'  => LGX_LS_PLUGIN_META_FIELD_PRO,
        'id'      => 'lgx_carousel_nav_hover_en',
        'default' => 'no'
    )
);

$this->meta_form->select(
    array(
        'label' => __( 'Navigation Position', $this->plugin_name ),
        'desc' => __( 'On which position navigation will display.', $this->plugin_name ),
        'name' => 'meta_lgx_lsp_shortcodes[lgx_carousel_nav_position]',
        'id' => 'lgx_carousel_nav_position',
        'status'  => LGX_LS_PLUGIN_META_FIELD_PRO,
        'default'   => 'top_right',
        'options'   => array(
            'top_right' => __( 'Top Right', $this->plugin_name ),
            'top_center' => __( 'Top Center', $this->plugin_name ),
            'top_left' => __( 'Top Left', $this->plugin_name ),
            'vertical_center' => __( 'Vertical Center', $this->plugin_name ),
            'bottom_center' => __( 'Bottom Center', $this->plugin_name ),
            'bottom_left' => __( 'Bottom Left', $this->plugin_name ),
            'bottom_right' => __( 'Bottom Right', $this->plugin_name ),
        )
    )
);



$this->meta_form->color(
    array(
        'label'     => __( 'Nav Color', $this->plugin_name ),
        'desc'      => __( 'Please select  carousel navigation color for icon or text.', $this->plugin_name ),
        'name'      => 'meta_lgx_lsp_shortcodes[lgx_carousel_nav_color]',
        'id'        => 'lgx_carousel_nav_color',
        'default'   => '#ffffff',
    )
);

$this->meta_form->color(
    array(
        'label'     => __( 'Nav Hover Color', $this->plugin_name ),
        'desc'      => __( 'Please select carousel navigation hover color for icon or text.', $this->plugin_name ),
        'name'      => 'meta_lgx_lsp_shortcodes[lgx_carousel_nav_color_hover]',
        'id'        => 'lgx_carousel_nav_color_hover',
        'default'   => '#ffffff',
    )
);

$this->meta_form->color(
    array(
        'label'     => __( 'Background Color', $this->plugin_name ),
        'desc'      => __( 'Please select carousel navigation background color.', $this->plugin_name ),
        'name'      => 'meta_lgx_lsp_shortcodes[lgx_carousel_nav_bg_color]',
        'id'        => 'lgx_carousel_nav_bg_color',
        'default'   => '#222b30',
    )
);

$this->meta_form->color(
    array(
        'label'     => __( 'Hover Background Color', $this->plugin_name ),
        'desc'      => __( 'Please select carousel navigation hover background color.', $this->plugin_name ),
        'name'      => 'meta_lgx_lsp_shortcodes[lgx_carousel_nav_bg_color_hover]',
        'id'        => 'lgx_carousel_nav_bg_color_hover',
        'default'   => '#222b30',
    )
);

$this->meta_form->text(
    array(
        'label'     => __( 'Nav Button Font Size', $this->plugin_name ),
        'desc'      => __( 'Set Font Size for navigation button.', $this->plugin_name ),
        'name'      => 'meta_lgx_lsp_shortcodes[lgx_carousel_nav_btn_font_size]',
        'id'        => 'lgx_carousel_nav_btn_font_size',
        'status'  => LGX_LS_PLUGIN_META_FIELD_PRO,
        'default'   => '22px'
    )
);

/*$this->meta_form->text(
    array(
        'label'     => __( 'Nav Button Line Height', $this->plugin_name ),
        'desc'      => __( 'Set Line Height for navigation button.', $this->plugin_name ),
        'name'      => 'meta_lgx_lsp_shortcodes[lgx_carousel_nav_btn_line_height]',
        'id'        => 'lgx_carousel_nav_btn_line_height',
        'status'  => LGX_LS_PLUGIN_META_FIELD_PRO,
        'default'   => '24px'
    )
); // Removed from v3.2*/

$this->meta_form->text(
    array(
        'label'     => __( 'Nav Button Width', $this->plugin_name ),
        'desc'      => __( 'Set Width for navigation button. You can also set the Width as: auto', $this->plugin_name ),
        'name'      => 'meta_lgx_lsp_shortcodes[lgx_carousel_nav_btn_width]',
        'id'        => 'lgx_carousel_nav_btn_width',
        'status'  => LGX_LS_PLUGIN_META_FIELD_PRO,
        'default'   => '30px'
    )
);

$this->meta_form->text(
    array(
        'label'     => __( 'Nav Button Height', $this->plugin_name ),
        'desc'      => __( 'Set Height for navigation button. You can also set the Height as: auto', $this->plugin_name ),
        'name'      => 'meta_lgx_lsp_shortcodes[lgx_carousel_nav_btn_height]',
        'id'        => 'lgx_carousel_nav_btn_height',
        'status'  => LGX_LS_PLUGIN_META_FIELD_PRO,
        'default'   => '30px'
    )
);

$this->meta_form->text(
    array(
        'label'     => __( 'Nav Button Padding', $this->plugin_name ),
        'desc'      => __( 'Set padding for navigation button.<br> <span style="color: #e31919"> For auto Height & Width you can define the top-bottom padding by shorthand method as: 3px 12px</span>', $this->plugin_name ),
        'name'      => 'meta_lgx_lsp_shortcodes[lgx_carousel_nav_btn_padding]',
        'id'        => 'lgx_carousel_nav_btn_padding',
        'status'  => LGX_LS_PLUGIN_META_FIELD_PRO,
        'default'   => '0px'
    )
);

$this->meta_form->switch(
    array(
        'yes_label' => __( 'Enabled', $this->plugin_name ),
        'no_label' => __( 'Disabled', $this->plugin_name ),
        'label'     => __( 'Nav Border', $this->plugin_name ),
        'desc'      => __( 'Enable Border for carousel navigation', $this->plugin_name ),
        'name'      => 'meta_lgx_lsp_shortcodes[lgx_carousel_nav_border_en]',
        'id'        => 'lgx_carousel_nav_border_en',
        'default'   => 'no'
    )
);


$this->meta_form->color(
    array(
        'label'     => __( 'Border Color', $this->plugin_name ),
        'desc'      => __( 'Choose border color carousel navigation.', $this->plugin_name ),
        'name'      => 'meta_lgx_lsp_shortcodes[lgx_carousel_nav_border_color]',
        'id'        => 'lgx_carousel_nav_border_color',
        'default'   => '#161E54',
    )
);


$this->meta_form->color(
    array(
        'label'     => __( 'Border Hover Color', $this->plugin_name ),
        'desc'      => __( 'Choose border hover color carousel navigation.', $this->plugin_name ),
        'name'      => 'meta_lgx_lsp_shortcodes[lgx_carousel_nav_border_color_hover]',
        'id'        => 'lgx_carousel_nav_border_color_hover',
        'default'   => '#88E0EF',
    )
);

$this->meta_form->text(
    array(
        'label'     => __( 'Border Width', $this->plugin_name ),
        'desc'      => __( 'Set Border Width for carousel navigation', $this->plugin_name ),
        'name'      => 'meta_lgx_lsp_shortcodes[lgx_carousel_nav_border_width]',
        'id'        => 'lgx_carousel_nav_border_width',
        //'status'  => LGX_LS_PLUGIN_META_FIELD_PRO,
        'default'   => '1px'
    )
);

$this->meta_form->select(
    array(
        'label' => __( 'Border Style', $this->plugin_name ),
        'desc' => __( 'Select carousel navigation button border style.', $this->plugin_name ),
        'name' => 'meta_lgx_lsp_shortcodes[lgx_carousel_nav_border_style]',
        'id' => 'lgx_carousel_nav_border_style',
        'default'   => 'solid',
        'options'   => array(
            'solid' => __( 'Solid', $this->plugin_name ),
            'dotted' => __( 'Dotted', $this->plugin_name ),
            'dashed' => __( 'Dashed', $this->plugin_name ),
            'double' => __( 'Double', $this->plugin_name ),
            'groove' => __( 'Groove', $this->plugin_name ),
            'ridge' => __( 'Ridge', $this->plugin_name ),
            'inset' => __( 'Inset', $this->plugin_name ),
            'outset' => __( 'Outset', $this->plugin_name ),
        )
    )
);


$this->meta_form->text(
    array(
        'label'     => __( 'Border Radius', $this->plugin_name ),
        'desc'      => __( 'Set carousel Border Radius for navigation button.', $this->plugin_name ),
        'name'      => 'meta_lgx_lsp_shortcodes[lgx_carousel_nav_border_radius]',
        'id'        => 'lgx_carousel_nav_border_radius',
        'status'  => LGX_LS_PLUGIN_META_FIELD_PRO,
        'default'   => '4px'
    )
);


$this->meta_form->select(
    array(
        'label' => __( 'Nav Button Type', $this->plugin_name ),
        'desc' => __( 'Select content type for navigation button.', $this->plugin_name ),
        'name' => 'meta_lgx_lsp_shortcodes[lgx_carousel_nav_btn_type]',
        'id' => 'lgx_carousel_nav_btn_type',
        'default'   => 'icon',
        'status'  => LGX_LS_PLUGIN_META_FIELD_PRO,
        'options'   => array(
            'icon' => __( 'Icon', $this->plugin_name ),
            'text' => __( 'Text', $this->plugin_name ),
        )
    )
);


$this->meta_form->select(
    array(
        'label' => __( 'Select Icon', $this->plugin_name ),
        'desc' => __( 'Select content type for navigation button.', $this->plugin_name ),
        'name' => 'meta_lgx_lsp_shortcodes[lgx_carousel_nav_icon]',
        'id' => 'lgx_carousel_nav_icon',
        'default'   => 'angle',
       // 'status'  => LGX_LS_PLUGIN_META_FIELD_PRO,
        'options'   => array(
            'angle' => __( 'Angle', $this->plugin_name ),
            'angle-double' => __( 'Angle Double', $this->plugin_name ),
            'arrow' => __( 'Arrow', $this->plugin_name ),
            'arrow-circle-o' => __( 'Arrow Circle - O', $this->plugin_name ),
            'arrow-circle' => __( 'Arrow Circle', $this->plugin_name ),
            'long-arrow' => __( 'Long  Arrow', $this->plugin_name ),
            'caret' => __( 'Caret', $this->plugin_name ),
            'chevron' => __( 'Chevron', $this->plugin_name ),
            'chevron-circle' => __( 'Chevron Circle', $this->plugin_name ),
        )
    )
);


$this->meta_form->text(
    array(
        'label'     => __( 'Left Nav Text', $this->plugin_name ),
        'desc'      => __( 'Add content type for previous navigation button.<br> <span style="color: #e31919">Note: To use this option you must select Content Type as Text.</span>', $this->plugin_name ),
        'name'      => 'meta_lgx_lsp_shortcodes[lgx_carousel_nav_btn_text_prev]',
        'id'        => 'lgx_carousel_nav_btn_text_prev',
        'status'  => LGX_LS_PLUGIN_META_FIELD_PRO,
        'default'   => 'Prev'
    )
);

$this->meta_form->text(
    array(
        'label'     => __( 'Right Nav Text', $this->plugin_name ),
        'desc'      => __( 'Add content type for previous navigation button.<br> <span style="color: #e31919">Note: To use this option you must select Content Type as Text.</span>', $this->plugin_name ),
        'name'      => 'meta_lgx_lsp_shortcodes[lgx_carousel_nav_btn_text_next]',
        'id'        => 'lgx_carousel_nav_btn_text_next',
        'status'  => LGX_LS_PLUGIN_META_FIELD_PRO,
        'default'   => 'Next'
    )
);

$this->meta_form->switch(
    array(
        'label'   => __( 'Nav Hide on Mobile', $this->plugin_name ),
        'yes_label' => __( 'Yes', $this->plugin_name ),
        'no_label' => __( 'No', $this->plugin_name ),
        'desc'    => __( 'If the options is mark as checked then navigation will hide on mobile view (767px).', $this->plugin_name ),
        'name'    => 'meta_lgx_lsp_shortcodes[lgx_carousel_nav_mobile_en]',
        'id'      => 'lgx_carousel_nav_mobile_en',
        'status'  => LGX_LS_PLUGIN_META_FIELD_PRO,
        'default' => 'no'
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

$this->meta_form->switch(
    array(
        'yes_label' => __( 'Enabled', $this->plugin_name ),
        'no_label' => __( 'Disabled', $this->plugin_name ),
        'label'   => __( 'Auto Height', $this->plugin_name ),
        'desc'    => __( 'If the option is mark as checked, then auto height support will be enabled.', $this->plugin_name ),
        'name'    => 'meta_lgx_lsp_shortcodes[lgx_carousel_auto_height_en]',
        'id'      => 'lgx_carousel_auto_height_en',
        'status'  => LGX_LS_PLUGIN_META_FIELD_PRO,
        'default' => 'no'
    )
);

$this->meta_form->switch(
    array(
        'yes_label' => __( 'Enabled', $this->plugin_name ),
        'no_label' => __( 'Disabled', $this->plugin_name ),
        'label'   => __( 'Touch Swipe', $this->plugin_name ),
        'desc'    => __( 'If the option is mark as checked, then the slider touch move facilities will be available.', $this->plugin_name ),
        'name'    => 'meta_lgx_lsp_shortcodes[lgx_carousel_allow_touch_move_en]',
        'id'      => 'lgx_carousel_allow_touch_move_en',
        'default' => 'yes'
    )
);

$this->meta_form->switch(
    array(
        'yes_label' => __( 'Enabled', $this->plugin_name ),
        'no_label' => __( 'Disabled', $this->plugin_name ),
        'label'   => __( 'Mouse Wheel', $this->plugin_name ),
        'desc'    => __( 'Enables navigation through slides using mouse wheel.', $this->plugin_name ),
        'name'    => 'meta_lgx_lsp_shortcodes[lgx_carousel_mouse_wheel_en]',
        'status'  => LGX_LS_PLUGIN_META_FIELD_PRO,
        'id'      => 'lgx_carousel_mouse_wheel_en',
        'default' => 'no'
    )
);

$this->meta_form->switch(
    array(
        'yes_label' => __( 'Enabled', $this->plugin_name ),
        'no_label' => __( 'Disabled', $this->plugin_name ),
        'label'   => __( 'Mouse Draggable', $this->plugin_name ),
        'desc'    => __( 'If the option is mark as checked, swiper will accept mouse events like touch events (click and drag to change slides).', $this->plugin_name ),
        'name'    => 'meta_lgx_lsp_shortcodes[lgx_carousel_simulate_touch_en]',
        'id'      => 'lgx_carousel_simulate_touch_en',
        'default' => 'yes'
    )
);


$this->meta_form->switch(
    array(
        'yes_label' => __( 'Enabled', $this->plugin_name ),
        'no_label' => __( 'Disabled', $this->plugin_name ),
        'label'   => __( 'Grab Cursor', $this->plugin_name ),
        'desc'    => __( 'If the option is mark as checked, then cursor style change to hand tool when cursor hover on item.', $this->plugin_name ),
        'name'    => 'meta_lgx_lsp_shortcodes[lgx_carousel_grab_cursor_en]',
        'id'      => 'lgx_carousel_grab_cursor_en',
        'status'  => LGX_LS_PLUGIN_META_FIELD_PRO,
        'default' => 'no'
    )
);