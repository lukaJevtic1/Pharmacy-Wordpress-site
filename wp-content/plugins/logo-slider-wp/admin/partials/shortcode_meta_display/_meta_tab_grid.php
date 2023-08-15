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
        'label'     => __( 'Column Gap', $this->plugin_name ),
        'desc'      => __( 'Sets the gap between the columns.', $this->plugin_name ),
        'name'      => 'meta_lgx_lsp_shortcodes[lgx_grid_column_gap]',
        'id'        => 'lgx_grid_column_gap',
        'status'  => LGX_LS_PLUGIN_META_FIELD_PRO,
        'default'   => '15px'
    )
);

$this->meta_form->text(
    array(
        'label'     => __( 'Row Gap', $this->plugin_name ),
        'desc'      => __( 'Sets the gap between the columns.', $this->plugin_name ),
        'name'      => 'meta_lgx_lsp_shortcodes[lgx_grid_row_gap]',
        'id'        => 'lgx_grid_row_gap',
        'status'  => LGX_LS_PLUGIN_META_FIELD_PRO,
        'default'   => '15px'
    )
);

$this->meta_form->text(
    array(
        'label'     => __( 'Item Min Height', $this->plugin_name ),
        'desc'      => __( 'Set Minimum Height of the item. Default: 0 [Disabled]. Please add your desired height with unit.E.g. 100px/ 10rem / 10em. :  If you do not want this option, just add 0', $this->plugin_name ),
        'name'      => 'meta_lgx_lsp_shortcodes[lgx_grid_item_min_height]',
        'id'        => 'lgx_grid_item_min_height',
        'status'  => LGX_LS_PLUGIN_META_FIELD_PRO,
        'default'   => 0
    )
);

$this->meta_form->select(
    array(
        'label' => __( 'Item Image Vertical Align', $this->plugin_name ),
        'desc' => __( 'Set Grid item image vertical alignment.<br> <span style="color: #e31919">Note: It helps if the size of the images are not equal.</span>', $this->plugin_name ),
        'name' => 'meta_lgx_lsp_shortcodes[lgx_grid_image_vertical_align]',
        'id' => 'lgx_grid_image_vertical_align',
        'default'   => 'start',
        'status'  => LGX_LS_PLUGIN_META_FIELD_PRO,
        'options'   => array(
            'start' => __( 'Top', $this->plugin_name ),
            'center' => __( 'Vertically Middle', $this->plugin_name ),
            'end' => __( 'Bottom', $this->plugin_name ),
        )
    )
);

