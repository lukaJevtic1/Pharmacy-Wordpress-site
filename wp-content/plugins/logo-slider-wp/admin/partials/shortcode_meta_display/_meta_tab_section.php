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

$this->meta_form->text(
    array(
        'label'     => __( 'Showcase Area Max Width', $this->plugin_name ),
        'desc'      => __( 'Add showcase area maximum width with unit. For example: 100% or 1160px', $this->plugin_name ),
        'name'      => 'meta_lgx_lsp_shortcodes[lgx_section_width]',
        'id'        => 'lgx_section_width',
        'default'   => '100%'
    )
);

$this->meta_form->select(
    array(
        'label'     => __( 'Showcase Container Type', $this->plugin_name ),
        'desc'      => __( 'Select Showcase Container Type.', $this->plugin_name ),
        'name'      => 'meta_lgx_lsp_shortcodes[lgx_section_container]',
        'id'        => 'lgx_section_container',
        'default'   => 'container-fluid',
        'options'   => array(
            'container-fluid' => __( 'Container Fluid', $this->plugin_name ),
            'container' => __( 'Container', $this->plugin_name ),
        )
    )
);


$this->meta_form->switch(
    array(
        'yes_label' => __( 'Enabled', $this->plugin_name ),
        'no_label' => __( 'Disabled', $this->plugin_name ),
        'label'   => __( 'Background Image', $this->plugin_name ),
        'desc'    => __( 'Enable background image for showcase section.', $this->plugin_name ),
        'name'    => 'meta_lgx_lsp_shortcodes[lgx_section_bg_img_en]',
        'status'  => LGX_LS_PLUGIN_META_FIELD_PRO,
        'id'      => 'lgx_section_bg_img_en',
        'default' => 'no'
    )
);


$this->meta_form->upload(
    array(
        'label'   => __( 'Upload Background Image', $this->plugin_name ),
        'desc'    => __( 'Upload Background Image for Slider section.', $this->plugin_name ),
        'name'    => 'meta_lgx_lsp_shortcodes[lgx_section_bg_img]',
        'status'  => LGX_LS_PLUGIN_META_FIELD_PRO,
        'id'      => 'lgx_section_bg_img',
        //'default' => 'no'
    )
);


$this->meta_form->select(
    array(
        'label'     => __( 'Background Attachment Type', $this->plugin_name ),
        'desc'      => __( 'Select Background Attachment Type.', $this->plugin_name ),
        'name'      => 'meta_lgx_lsp_shortcodes[lgx_section_bg_img_attachment]',
        'id'        => 'lgx_section_bg_img_attachment',
        'status'  => LGX_LS_PLUGIN_META_FIELD_PRO,
        'default'   => 'initial',
        'options'   => array(
            'initial' => __( 'Initial', $this->plugin_name ),
            'fixed' => __( 'Fixed', $this->plugin_name )
        )
    )
);

$this->meta_form->select(
    array(
        'label'     => __( 'Background Size Type', $this->plugin_name ),
        'desc'      => __( 'Set Background Size Type for background image.', $this->plugin_name ),
        'name'      => 'meta_lgx_lsp_shortcodes[lgx_section_bg_img_size]',
        'id'        => 'lgx_section_bg_img_size',
        'status'  => LGX_LS_PLUGIN_META_FIELD_PRO,
        'default'   => 'cover',
        'options'   => array(
            'cover' => __( 'Cover', $this->plugin_name ),
            'contain' => __( 'Contain', $this->plugin_name ),
            'auto' => __( 'Auto', $this->plugin_name )
        )
    )
);

$this->meta_form->switch(
    array(
        'label'   => __( 'Background/ Overlay  Color', $this->plugin_name ),
        'yes_label' => __( 'Enabled', $this->plugin_name ),
        'no_label' => __( 'Disabled', $this->plugin_name ),
        'desc'    => __( 'Enable background or image Overlay Color for showcase section.', $this->plugin_name ),
        'name'    => 'meta_lgx_lsp_shortcodes[lgx_section_bg_color_en]',
        'id'      => 'lgx_section_bg_color_en',
        'default' => 'no'
    )
);


$this->meta_form->color(
    array(
        'label'   => __( 'Background Color', $this->plugin_name ),
        'desc'    => __( 'Choose background/ overlay Color for showcase section.', $this->plugin_name ),
        'name'    => 'meta_lgx_lsp_shortcodes[lgx_section_bg_color]',
        'id'      => 'lgx_section_bg_color',
        'default' => '#b56969'
    )
);


$this->meta_form->text(
    array(
        'label'   => __( 'Section Top Margin', $this->plugin_name ),
        'desc'    => __( 'Add showcase section top margin. Please add value with your desired unit. For example : 15px or, 15rem', $this->plugin_name ),
        'name'    => 'meta_lgx_lsp_shortcodes[lgx_section_top_margin]',
        'id'      => 'lgx_section_top_margin',
        'default' => '0px'
    )
);


$this->meta_form->text(
    array(
        'label'   => __( 'Section Bottom Margin', $this->plugin_name ),
        'desc'    => __( 'Add showcase section bottom margin. Please add value with your desired unit. For example : 15px or, 15rem', $this->plugin_name ),
        'name'    => 'meta_lgx_lsp_shortcodes[lgx_section_bottom_margin]',
        'id'      => 'lgx_section_bottom_margin',
        'default' => '0px'
    )
);


$this->meta_form->text(
    array(
        'label'   => __( 'Section Top Padding', $this->plugin_name ),
        'desc'    => __( 'Add showcase section Top Padding. Please add value with your desired unit. For example : 15px or, 15rem', $this->plugin_name ),
        'name'    => 'meta_lgx_lsp_shortcodes[lgx_section_top_padding]',
        'id'      => 'lgx_section_top_padding',
        'status'  => LGX_LS_PLUGIN_META_FIELD_PRO,
        'default' => '0px'
    )
);


$this->meta_form->text(
    array(
        'label'   => __( 'Section Bottom Padding', $this->plugin_name ),
        'desc'    => __( 'Add showcase section Bottom Padding. Please add value with your desired unit. For example : 15px or, 15rem', $this->plugin_name ),
        'name'    => 'meta_lgx_lsp_shortcodes[lgx_section_bottom_padding]',
        'id'      => 'lgx_section_bottom_padding',
        'status'  => LGX_LS_PLUGIN_META_FIELD_PRO,
        'default' => '0px'
    )
);