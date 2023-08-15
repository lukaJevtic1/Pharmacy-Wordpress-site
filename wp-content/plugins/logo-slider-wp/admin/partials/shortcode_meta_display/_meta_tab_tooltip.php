<?php

$this->meta_form->buy_pro(
    array(
        'status'  => LGX_LS_PLUGIN_META_FIELD_PRO,
        'link' => 'https://logichunt.com/product/wordpress-logo-slider/',
    )
);

$this->meta_form->switch(
    array(
        'label'   => __( 'Tooltip', $this->plugin_name ),
        'yes_label' => __( 'Enabled', $this->plugin_name ),
        'no_label' => __( 'Disabled', $this->plugin_name ),
        'desc'    => __( 'Enable Tooltip in your showcase.', $this->plugin_name ),
        'name'    => 'meta_lgx_lsp_shortcodes[lgx_tooltip_en]',
        'id'      => 'lgx_tooltip_en',
        'default' => 'no'
    )
);


$this->meta_form->select(
    array(
        'label'     => __( 'Content Type', $this->plugin_name ),
        'desc'      => __( 'Select which content you want to show in tooltip.', $this->plugin_name ),
        'name'      => 'meta_lgx_lsp_shortcodes[lgx_tooltip_content_type]',
        'id'        => 'lgx_tooltip_content_type',
        'default'   => 'brand_name',
        'status'  => LGX_LS_PLUGIN_META_FIELD_PRO,
        'options'   => array(
            'brand_name' => __( 'Brand Name', $this->plugin_name ),
            'tooltip_text' => __( 'Tooltip Text', $this->plugin_name )
        )
    )
);


$this->meta_form->select(
    array(
        'label'     => __( 'Position', $this->plugin_name ),
        'desc'      => __( 'Select the position where you want to show tooltip.', $this->plugin_name ),
        'name'      => 'meta_lgx_lsp_shortcodes[lgx_tooltip_position]',
        'id'        => 'lgx_tooltip_position',
        'default'   => 'top',
     //  'status'  => LGX_LS_PLUGIN_META_FIELD_PRO,
        'options'   => array(
            'top' => __( 'Top', $this->plugin_name ),
            'bottom' => __( 'Bottom', $this->plugin_name ),
            'right' => __( 'Right', $this->plugin_name ),
            'left' => __( 'Left', $this->plugin_name ),
        )
    )
);


$this->meta_form->number(
    array(
        'label'     => __( 'Min Width', $this->plugin_name ),
        'desc'      => __( 'Set a minimum width for the tooltip. Default: 0 (auto width)', $this->plugin_name ),
        'name'      => 'meta_lgx_lsp_shortcodes[lgx_tooltip_min_width]',
        'id'        => 'lgx_tooltip_min_width',
        'status'  => LGX_LS_PLUGIN_META_FIELD_PRO,
        'default'   => 0
    )
);

$this->meta_form->number(
    array(
        'label'     => __( 'Max Width', $this->plugin_name ),
        'desc'      => __( 'Set a maximum width for the tooltip. Default: null (no max width)', $this->plugin_name ),
        'name'      => 'meta_lgx_lsp_shortcodes[lgx_tooltip_max_width]',
        'id'        => 'lgx_tooltip_max_width',
        'status'  => LGX_LS_PLUGIN_META_FIELD_PRO,
        'default'   => ''
    )
);


$this->meta_form->select(
    array(
        'label'     => __( 'Animation', $this->plugin_name ),
        'desc'      => __( 'Determines how the tooltip will animate in and out.', $this->plugin_name ),
        'name'      => 'meta_lgx_lsp_shortcodes[lgx_tooltip_anim]',
        'id'        => 'lgx_tooltip_anim',
        'default'   => 'fade',
        'status'  => LGX_LS_PLUGIN_META_FIELD_PRO,
        'options'   => array(
            'fade'   => __( 'Fade', $this->plugin_name ),
            'grow' => __( 'Grow', $this->plugin_name ),
            'swing'  => __( 'Swing', $this->plugin_name ),
            'slide'  => __( 'Slide', $this->plugin_name ),
            'fall'  => __( 'Fall', $this->plugin_name ),
        )
    )
);


$this->meta_form->number(
    array(
        'label'     => __( 'Animation Duration', $this->plugin_name ),
        'desc'      => __( 'Sets the duration of the animation, in milliseconds.', $this->plugin_name ),
        'name'      => 'meta_lgx_lsp_shortcodes[lgx_tooltip_anim_duration]',
        'id'        => 'lgx_tooltip_anim_duration',
        'status'  => LGX_LS_PLUGIN_META_FIELD_PRO,
        'default'   => 350
    )
);


$this->meta_form->number(
    array(
        'label'     => __( 'Animation Delay', $this->plugin_name ),
        'desc'      => __( 'Upon mouse interaction, this is the delay before the tooltip starts its opening and closing animations when the "hover" trigger is used.', $this->plugin_name ),
        'name'      => 'meta_lgx_lsp_shortcodes[lgx_tooltip_anim_delay]',
        'id'        => 'lgx_tooltip_anim_delay',
        'status'  => LGX_LS_PLUGIN_META_FIELD_PRO,
        'default'   => 300
    )
);


$this->meta_form->select(
    array(
        'label'     => __( 'Trigger Type', $this->plugin_name ),
        'desc'      => __( 'Sets when the tooltip should open and close. If you want to use click trigger, you must be disabled the item company URL.', $this->plugin_name ),
        'name'      => 'meta_lgx_lsp_shortcodes[lgx_tooltip_trigger_type]',
        'id'        => 'lgx_tooltip_trigger_type',
        'default'   => 'hover',
        'status'  => LGX_LS_PLUGIN_META_FIELD_PRO,
        'options'   => array(
            'hover' => __( 'Hover', $this->plugin_name ),
            'click' => __( 'Click', $this->plugin_name )
        )
    )
);


$this->meta_form->number(
    array(
        'label'     => __( 'Distance', $this->plugin_name ),
        'desc'      => __( 'The distance between the origin and the tooltip, in pixels. The value may be an integer or an array of integers (in the usual CSS syntax) if you wish to specify a different distance for each side.', $this->plugin_name ),
        'name'      => 'meta_lgx_lsp_shortcodes[lgx_tooltip_distance]',
        'id'        => 'lgx_tooltip_distance',
        'status'  => LGX_LS_PLUGIN_META_FIELD_PRO,
        'default'   => 6
    )
);


$this->meta_form->color(
    array(
        'label'     => __( 'Text Color', $this->plugin_name ),
        'desc'      => __( 'Select tooltip text color', $this->plugin_name ),
        'name'      => 'meta_lgx_lsp_shortcodes[lgx_tooltip_text_color]',
        'id'        => 'lgx_tooltip_text_color',
        'status'  => LGX_LS_PLUGIN_META_FIELD_PRO,
        'default'   => '#ffffff'
    )
);



$this->meta_form->text(
    array(
        'label'     => __( 'Padding', $this->plugin_name ),
        'desc'      => __( 'Add Tooltip inner padding.', $this->plugin_name ),
        'name'      => 'meta_lgx_lsp_shortcodes[lgx_tooltip_padding]',
        'id'        => 'lgx_tooltip_padding',
        'status'  => LGX_LS_PLUGIN_META_FIELD_PRO,
        'default'   => '8px'
    )
);

$this->meta_form->color(
    array(
        'label'     => __( 'Background Color', $this->plugin_name ),
        'desc'      => __( 'Select tooltip Background color', $this->plugin_name ),
        'name'      => 'meta_lgx_lsp_shortcodes[lgx_tooltip_bg_color]',
        'id'        => 'lgx_tooltip_bg_color',
        'status'  => LGX_LS_PLUGIN_META_FIELD_PRO,
        'default'   => '#d3d3d3'
    )
);


$this->meta_form->color(
    array(
        'label'     => __( 'Border Color', $this->plugin_name ),
        'desc'      => __( 'Select tooltip border color', $this->plugin_name ),
        'name'      => 'meta_lgx_lsp_shortcodes[lgx_tooltip_border_color]',
        'id'        => 'lgx_tooltip_border_color',
        'status'  => LGX_LS_PLUGIN_META_FIELD_PRO,
        'default'   => '#333333'
    )
);

$this->meta_form->text(
    array(
        'label'     => __( 'Border Width', $this->plugin_name ),
        'desc'      => __( 'Add Tooltip Width.', $this->plugin_name ),
        'name'      => 'meta_lgx_lsp_shortcodes[lgx_tooltip_border_width]',
        'id'        => 'lgx_tooltip_border_width',
        'status'  => LGX_LS_PLUGIN_META_FIELD_PRO,
        'default'   => '2px'
    )
);


$this->meta_form->text(
    array(
        'label'     => __( 'Border Radius', $this->plugin_name ),
        'desc'      => __( 'Add Tooltip Radius.', $this->plugin_name ),
        'name'      => 'meta_lgx_lsp_shortcodes[lgx_tooltip_border_radius]',
        'id'        => 'lgx_tooltip_border_radius',
        'status'  => LGX_LS_PLUGIN_META_FIELD_PRO,
        'default'   => '4px',
    )
);


$this->meta_form->number(
    array(
        'label'     => __( 'Minimum Intersection', $this->plugin_name ),
        'desc'      => __( 'Corresponds to the minimum distance to enforce between the center of the arrow and the edges of the tooltip. Mainly used to create an arrow bigger than those of the default themes.', $this->plugin_name ),
        'name'      => 'meta_lgx_lsp_shortcodes[lgx_tooltip_min_intersection]',
        'id'        => 'lgx_tooltip_min_intersection',
        'status'  => LGX_LS_PLUGIN_META_FIELD_PRO,
        'default'   => 16
    )
);

$this->meta_form->number(
    array(
        'label'     => __( 'Timer', $this->plugin_name ),
        'desc'      => __( 'How long the tooltip should be allowed to live before hiding. Default: 0 (disabled)', $this->plugin_name ),
        'name'      => 'meta_lgx_lsp_shortcodes[lgx_tooltip_timer]',
        'status'  => LGX_LS_PLUGIN_META_FIELD_PRO,
        'id'        => 'lgx_tooltip_timer',
        'default'   => 0
    )
);


$this->meta_form->switch(
    array(
        'label'   => __( 'Arrow', $this->plugin_name ),
        'yes_label' => __( 'Enabled', $this->plugin_name ),
        'no_label' => __( 'Disabled', $this->plugin_name ),
        'desc'    => __( 'Add a speech bubble arrow to the tooltip.', $this->plugin_name ),
        'name'    => 'meta_lgx_lsp_shortcodes[lgx_tooltip_arrow_en]',
        'id'      => 'lgx_tooltip_arrow_en',
        'status'  => LGX_LS_PLUGIN_META_FIELD_PRO,
        'default' => 'yes'
    )
);


$this->meta_form->color(
    array(
        'label'     => __( 'Arrow Background Color', $this->plugin_name ),
        'desc'      => __( 'Select arrow background color', $this->plugin_name ),
        'name'      => 'meta_lgx_lsp_shortcodes[lgx_tooltip_arrow_bg_color]',
        'id'        => 'lgx_tooltip_arrow_bg_color',
        'status'  => LGX_LS_PLUGIN_META_FIELD_PRO,
        'default'   => '#555555'
    )
);

$this->meta_form->color(
    array(
        'label'     => __( 'Arrow Border Color', $this->plugin_name ),
        'desc'      => __( 'Select arrow border color', $this->plugin_name ),
        'name'      => 'meta_lgx_lsp_shortcodes[lgx_tooltip_arrow_border_color]',
        'id'        => 'lgx_tooltip_arrow_border_color',
        'status'  => LGX_LS_PLUGIN_META_FIELD_PRO,
        'default'   => '#333333'
    )
);