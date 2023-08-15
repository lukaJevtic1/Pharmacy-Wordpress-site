<?php
if (!defined('WPINC')) {
    die;
}

/**
 *
 * Grab Logo Category for lgx_logo_item_category
 *
 */
$lgx_logo_slider_taxo = 'logosliderwpcat';
$lgx_logo_slider_terms = get_terms(
    array(
        'taxonomy' => $lgx_logo_slider_taxo,
        'orderby'  => 'id',
        'hide_empty'=> true,
    )

); // Get all terms of a taxonomy

$lgx_logo_slider_term_array = array(
    'all' => 'All'
);
if ($lgx_logo_slider_terms && !is_wp_error($lgx_logo_slider_terms)) {

    foreach ($lgx_logo_slider_terms as $term) {
        $lgx_logo_slider_term_array[$term->term_id] = $term->name;
    }

}

$this->meta_form->buy_pro(
    array(
        'status'  => LGX_LS_PLUGIN_META_FIELD_PRO,
        'link' => 'https://logichunt.com/product/wordpress-logo-slider/',
    )
);



$this->meta_form->switch(
    array(
        'label' => __( 'Brand Name', $this->plugin_name ),
        'desc' => __( 'Show brand name in your showcase.', $this->plugin_name ),
        'yes_label' => __( 'Show', $this->plugin_name ),
        'no_label' => __( 'Hide', $this->plugin_name ),
        'name' => 'meta_lgx_lsp_shortcodes[lgx_brand_name_en]',
        'id' => 'lgx_brand_name_en',
        'default' => 'no'

    )
);

$this->meta_form->switch(
    array(
        'label' => __( 'Brand Description', $this->plugin_name ),
        'yes_label' => __( 'Show', $this->plugin_name ),
        'no_label' => __( 'Hide', $this->plugin_name ),
        'desc' => __( 'Show Description in your showcase.', $this->plugin_name ),
        'name' => 'meta_lgx_lsp_shortcodes[lgx_brand_desc_en]',
        'id' => 'lgx_brand_desc_en',
        'status'  => LGX_LS_PLUGIN_META_FIELD_PRO,
        'default' => 'no'
    )
);

$this->meta_form->switch(
    array(
        'label' => __( 'Company URL', $this->plugin_name ),
        'yes_label' => __( 'Enabled', $this->plugin_name ),
        'no_label' => __( 'Disabled', $this->plugin_name ),
        'desc' => __( 'Add Custom Company URL in your showcase.', $this->plugin_name ),
        'name' => 'meta_lgx_lsp_shortcodes[lgx_company_url_en]',
        'id' => 'lgx_company_url_en',
        'default' => 'no'
    )
);


$this->meta_form->select(
    array(
        'label'     => __( 'Link Target Type', $this->plugin_name ),
        'desc'      => __( 'Specifies where to open the link.', $this->plugin_name ),
        'name'      => 'meta_lgx_lsp_shortcodes[lgx_target_type]',
        'id'        => 'lgx_target_type',
        'status'  => LGX_LS_PLUGIN_META_FIELD_PRO,
        'default'   => '_self',
        'options'   => array(
            '_self' => __( 'Same Tab', $this->plugin_name ),
            '_blank' => __( 'New Tab', $this->plugin_name )
        )
    )
);

$this->meta_form->switch(
    array(
        'label' => __( 'Add Nofollow to Link', $this->plugin_name ),
        'yes_label' => __( 'Yes', $this->plugin_name ),
        'no_label' => __( 'No', $this->plugin_name ),
        'desc' => __( 'Basically this is important for site SEO. "nofollow" is used by Google, to specify that the Google search spider should not follow that link.', $this->plugin_name ),
        'name' => 'meta_lgx_lsp_shortcodes[lgx_nofollow_en]',
        'id' => 'lgx_nofollow_en',
        'status'  => LGX_LS_PLUGIN_META_FIELD_PRO,
        'default' => 'no'
    )
);



$this->meta_form->group2SelectText(
    array(
        'label'       => __( 'Logo Image Height', $this->plugin_name ),
        'desc'        => __( 'Set Height of the Logo image. Default: 100% . You can add your desired height with suitable unit. E.g. 100px or 10rem.', $this->plugin_name ),
        'id'          => 'lgx_logo_height_dimension',
        'name'        => 'meta_lgx_lsp_shortcodes[lgx_logo_height_dimension]',
        'status'  => LGX_LS_PLUGIN_META_FIELD_PRO,

        'label_select' => 'Properties',
        'name_select' => 'meta_lgx_lsp_shortcodes[lgx_logo_height_property]',
        'id_select'   => 'lgx_logo_height_property',
        'default_select'   => 'max-height',
        'options_select'   => array(
            'max-height' => __( 'Max Height', $this->plugin_name ),
            'height'   => __( 'Height', $this->plugin_name ),
            'min-height' => __( 'Min Height', $this->plugin_name )
        ),

        'label_text' => 'Value',
        'name_text'  => 'meta_lgx_lsp_shortcodes[lgx_logo_height]',
        'id_text'    => 'lgx_logo_height',
        'default_text' => '100%'
    )
);


$this->meta_form->group2SelectText(
    array(
        'label'       => __( 'Logo Image Width', $this->plugin_name ),
        'desc'        => __( 'Set Width of the Logo image. Default: 100% . You can add your desired Width with suitable unit. E.g. 100px or 10rem.', $this->plugin_name ),
        'id'          => 'lgx_logo_width_dimension',
        'name'        => 'meta_lgx_lsp_shortcodes[lgx_logo_width_dimension]',
        'status'  => LGX_LS_PLUGIN_META_FIELD_PRO,

        'label_select' => 'Properties',
        'name_select' => 'meta_lgx_lsp_shortcodes[lgx_logo_width_property]',
        'id_select'   => 'lgx_logo_width_property',
        'default_select'   => 'max-width',
        'options_select'   => array(
            'max-width' => __( 'Max Width', $this->plugin_name ),
            'height'   => __( 'Width', $this->plugin_name ),
            'min-width' => __( 'Min Width', $this->plugin_name )
        ),

        'label_text' => 'Value',
        'name_text'  => 'meta_lgx_lsp_shortcodes[lgx_logo_width]',
        'id_text'    => 'lgx_logo_width',
        'default_text' => '100%'
    )
);



/********************************************************************************/
$this->meta_form->header_spacer(
    array(
        'label'     => __( 'Query Settings', $this->plugin_name ),
    )
);
/********************************************************************************/


$this->meta_form->buy_pro(
    array(
        'status'  => LGX_LS_PLUGIN_META_FIELD_PRO,
        'link' => 'https://logichunt.com/product/wordpress-logo-slider/',
    )
);


$this->meta_form->select(
    array(
        'label'     => __( 'Select Logo Category', $this->plugin_name ),
        'desc'      => __( 'Filter Logo item by category.', $this->plugin_name ),
        'name'      => 'meta_lgx_lsp_shortcodes[lgx_from_category]',
        'id'        => 'lgx_from_category',
        'status'  => LGX_LS_PLUGIN_META_FIELD_PRO,
        'default'   => 'all',
        'options'   => $lgx_logo_slider_term_array
    )
);

$this->meta_form->number(
    array(
        'label'     => __( 'Item Limit', $this->plugin_name ),
        'desc'      => __( 'Number of total logo item to show. Default: 0 ( all ). The free version allows displaying maximum of 20 images.', $this->plugin_name ),
        'name'      => 'meta_lgx_lsp_shortcodes[lgx_item_limit]',
        'id'        => 'lgx_item_limit',
        'default'   => 0
    )
);

$this->meta_form->select(
    array(
        'label'     => __( 'Order By', $this->plugin_name ),
        'desc'      => __( 'Sort retrieved items by parameter.', $this->plugin_name ),
        'name'      => 'meta_lgx_lsp_shortcodes[lgx_item_sort_order_by]',
        'id'        => 'lgx_item_sort_order_by',
        'default'   => 'menu_order',
        'options'   => array(
            'menu_order' => __( 'Drag & Drop', $this->plugin_name ),
            'title' => __( 'Title', $this->plugin_name ),
            'date' => __( 'Date', $this->plugin_name ),
            'rand_free' => __( 'Random (Pro)', $this->plugin_name )
        )
    )
);// Added from v3.2.0



$this->meta_form->select(
    array(
        'label'     => __( 'Order', $this->plugin_name ),
        'desc'      => __( 'Designates the ascending or descending order of the "orderby" parameter.', $this->plugin_name ),
        'name'      => 'meta_lgx_lsp_shortcodes[lgx_item_sort_order]',
        'id'        => 'lgx_item_sort_order',
        'default'   => 'ASC',
        'options'   => array(
            'ASC' => __( 'Ascending ', $this->plugin_name ),
            'DESC' => __( 'Descending  ', $this->plugin_name )
        )
    )
); // Added from v3.2.0



/********************************************************************************/
$this->meta_form->header_spacer(
    array(
        'label'     => __( 'Preloader Settings', $this->plugin_name ),
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
        'label' => __( 'Enable Preloader', $this->plugin_name ),
        'yes_label' => __( 'Enabled', $this->plugin_name ),
        'no_label' => __( 'Disabled', $this->plugin_name ),
        'desc' => __( 'The showcase will be invisible until the page load complete.', $this->plugin_name ),
        'name' => 'meta_lgx_lsp_shortcodes[lgx_preloader_en]',
        'id' => 'lgx_preloader_en',
        'default' => 'yes'
    )
);

$this->meta_form->upload(
    array(
        'label'   => __( 'Preloader Icon', $this->plugin_name ),
        'desc'    => __( 'Upload Background Icon for Preloader.', $this->plugin_name ),
        'name'    => 'meta_lgx_lsp_shortcodes[lgx_preloader_icon]',
        'status'  => LGX_LS_PLUGIN_META_FIELD_PRO,
        'id'      => 'lgx_preloader_icon',
    )
);

$this->meta_form->color(
    array(
        'label'     => __( 'Preloader Background', $this->plugin_name ),
        'desc'      => __( 'Please select background color for Preloader.', $this->plugin_name ),
        'name'      => 'meta_lgx_lsp_shortcodes[lgx_preloader_bg_color]',
        'id'        => 'lgx_preloader_bg_color',
        'status'  => LGX_LS_PLUGIN_META_FIELD_PRO,
        'default'   => '#ffffff',
    )
);

