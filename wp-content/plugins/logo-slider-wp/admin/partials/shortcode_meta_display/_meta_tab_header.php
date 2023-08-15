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

$this->meta_form->switch(
    array(
        'yes_label' => __( 'Enabled', $this->plugin_name ),
        'no_label' => __( 'Disabled', $this->plugin_name ),
        'label'   => __( 'Section Header', $this->plugin_name ),
        'desc'    => __( 'Enable Header Section in your showcase.', $this->plugin_name ),
        'name'    => 'meta_lgx_lsp_shortcodes[lgx_header_en]',
        'id'      => 'lgx_header_en',
        'status'  => LGX_LS_PLUGIN_META_FIELD_PRO,
        'default' => 'no'
    )
);

$this->meta_form->select(
    array(
        'label'     => __( 'Header Alignment', $this->plugin_name ),
        'desc'      => __( 'Section Header Alignment.', $this->plugin_name ),
        'name'      => 'meta_lgx_lsp_shortcodes[lgx_header_align]',
        'id'        => 'lgx_header_align',
        'status'  => LGX_LS_PLUGIN_META_FIELD_PRO,
        'default'   => 'center',
        'options'   => array(
            'center' => __( 'Center', $this->plugin_name ),
            'left' => __( 'Left', $this->plugin_name ),
            'right' => __( 'Right', $this->plugin_name )
        )
    )
);


$this->meta_form->text(
    array(
        'label'     => __( 'Title', $this->plugin_name ),
        'desc'      => __( 'Add your section header title.', $this->plugin_name ),
        'name'      => 'meta_lgx_lsp_shortcodes[lgx_header_title]',
        'id'        => 'lgx_header_title',
        'status'  => LGX_LS_PLUGIN_META_FIELD_PRO,
        'default'   => ''
    )
);


$this->meta_form->text(
    array(
        'label'     => __( 'Title Font Size', $this->plugin_name ),
        'desc'      => __( 'Add Title Font Size.', $this->plugin_name ),
        'name'      => 'meta_lgx_lsp_shortcodes[lgx_header_title_font_size]',
        'id'        => 'lgx_header_title_font_size',
        'status'  => LGX_LS_PLUGIN_META_FIELD_PRO,
        'default'   => '36px'
    )
);



$this->meta_form->color(
    array(
        'label'     => __( 'Title Color', $this->plugin_name ),
        'desc'      => __( 'Please select title color.', $this->plugin_name ),
        'name'      => 'meta_lgx_lsp_shortcodes[lgx_header_title_color]',
        'status'  => LGX_LS_PLUGIN_META_FIELD_PRO,
        'id'        => 'lgx_header_title_color',
        'default'   => '#010101',
    )
);


$this->meta_form->text(
    array(
        'label'     => __( 'Title Font Weight', $this->plugin_name ),
        'desc'      => __( 'Set Title Font Weight.', $this->plugin_name ),
        'name'      => 'meta_lgx_lsp_shortcodes[lgx_header_title_font_weight]',
        'id'        => 'lgx_header_title_font_weight',
        'status'  => LGX_LS_PLUGIN_META_FIELD_PRO,
        'default'   => '700'
    )
);

$this->meta_form->text(
    array(
        'label'     => __( 'Title Bottom Margin', $this->plugin_name ),
        'desc'      => __( 'Add Title Font Size.', $this->plugin_name ),
        'name'      => 'meta_lgx_lsp_shortcodes[lgx_header_title_bottom_margin]',
        'id'        => 'lgx_header_title_bottom_margin',
        'status'  => LGX_LS_PLUGIN_META_FIELD_PRO,
        'default'   => '10px'
    )
);


$this->meta_form->text(
    array(
        'label'     => __( 'Sub Title', $this->plugin_name ),
        'desc'      => __( 'Add your section header Sub title.', $this->plugin_name ),
        'name'      => 'meta_lgx_lsp_shortcodes[lgx_header_subtitle]',
        'id'        => 'lgx_header_subtitle',
        'status'  => LGX_LS_PLUGIN_META_FIELD_PRO,
        'default'   => ''
    )
);


$this->meta_form->text(
    array(
        'label'     => __( 'Sub Title Font Size', $this->plugin_name ),
        'desc'      => __( 'Add Sub Title Font Size.', $this->plugin_name ),
        'name'      => 'meta_lgx_lsp_shortcodes[lgx_header_subtitle_font_size]',
        'id'        => 'lgx_header_subtitle_font_size',
        'status'  => LGX_LS_PLUGIN_META_FIELD_PRO,
        'default'   => '16px'
    )
);



$this->meta_form->color(
    array(
        'label'     => __( 'Sub Title Color', $this->plugin_name ),
        'desc'      => __( 'Please select Sub title color.', $this->plugin_name ),
        'name'      => 'meta_lgx_lsp_shortcodes[lgx_header_subtitle_color]',
        'id'        => 'lgx_header_subtitle_color',
        'status'  => LGX_LS_PLUGIN_META_FIELD_PRO,
        'default'   => '#888888',
    )
);


$this->meta_form->text(
    array(
        'label'     => __( 'Sub Title Font Weight', $this->plugin_name ),
        'desc'      => __( 'Set Sub Title Font Weight.', $this->plugin_name ),
        'name'      => 'meta_lgx_lsp_shortcodes[lgx_header_subtitle_font_weight]',
        'id'        => 'lgx_header_subtitle_font_weight',
        'status'  => LGX_LS_PLUGIN_META_FIELD_PRO,
        'default'   => '400'
    )
);

$this->meta_form->text(
    array(
        'label'     => __( 'Sub Title Bottom Margin', $this->plugin_name ),
        'desc'      => __( 'Add Sub Title Font Size.', $this->plugin_name ),
        'name'      => 'meta_lgx_lsp_shortcodes[lgx_header_subtitle_bottom_margin]',
        'id'        => 'lgx_header_subtitle_bottom_margin',
        'status'  => LGX_LS_PLUGIN_META_FIELD_PRO,
        'default'   => '10px'
    )
);

