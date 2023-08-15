<?php


class LogoSLiderWpMetaForm {
    public function __construct() {
    }


    
    /**
     * @param array $args
     */

    public function group2SelectText( array $args ) {
        global $post;

        if ( ! isset( $args['id'], $args['name'] , $args['label'] ) ) {
            return;
        }

        if ( ! isset( $args['options_select'] ) && count( $args['options_select'] ) < 1 ) {
            return;
        }

        $status       = (isset( $args['status'] ) ? $args['status'] : '');
        $is_pro       = (( $status == 'disabled') ? 'disabled' : '');
        $is_pro_label = (( $status== 'disabled') ? '<span class="lgx_meta_field_mark_pro_wrap"><span class="lgx_meta_field_mark">'.__('Pro', 'logo-slider-wp').'</span></span>' : '');

        $output= '<tr>';

        $output.= '<th scope="row">';
        $output.= '<h4 class="lgx_app_meta_label"><label for="'.$args['id'].'">'. $args['label'].'</label></h4>';
        $output.= '<p class="lgx_input_desc lgx_app_meta_desc">'. $args['desc'].'</p>';
        $output.= '</th>';

        //Select
        $default_value = isset( $args['default_select'] ) ? $args['default_select'] : '';
        $meta          = get_post_meta( $post->ID, '_lgx_lsp_shortcodes_meta', true );
    
        $meta_value    = (! empty( $meta[$args['id_select']] ) ? $meta[$args['id_select']] : $default_value);
      

       //Text
       $default_value_text = isset( $args['default_text'] ) ? $args['default_text'] : '';
       $meta_text          = get_post_meta( $post->ID, '_lgx_lsp_shortcodes_meta', true );
       $meta_value_text    = (! empty( $meta[$args['id_text']] ) ? $meta[$args['id_text']] : $default_value_text);


        $output.= '<td>';
        $output.= '<div class="lgx_group_field_wrap">';
        $output.= '<div class="lgx_group_field_item">';
        $output.= '<div class="lgx_group_field_label">'.$args['label_select'].'</div>';
        $options = '';
        foreach ( $args['options_select'] as $option_value => $option_text ) {
            $selected = ( $option_value == $meta_value ) ? ' selected=selected' : '';
            $pro_disabled_label = ((($is_pro == 'disabled') && ($option_value !== $meta_value )) ? 'disabled="disabled"' : '');
            $options .= '<option value="'. $option_value .'" '.$selected.'  '.$pro_disabled_label.'>'. $option_text . ((($is_pro == 'disabled') && ($option_value !== $meta_value )) ? ' ( Pro )' : '').'</option>';
        }

        $is_multiple = ( isset( $args['multiple'] ) && ($args['multiple'] == 'yes')  ? 'multiple' : '');

        $output.= '<select name="'. $args['name_select'].'" class="lgx_input_width lgx_app_meta_filed lgx_app_meta_select '. (($is_pro == 'disabled') ? 'lgx_app_meta_select_disabled' : '').'"  id="'.$args['id_select'].'" '.$is_multiple.'>';
        $output.= $options;

        $output.= '</select>';
        $output.= '</div>';//item 1
        $output.= '<div class="lgx_group_field_item">';
        $output.= '<div class="lgx_group_field_label">'.$args['label_text'].'</div>';

        $output.= '<input type="text" value="'.$meta_value_text.'" placeholder="'.$meta_value_text.'"  id="'.$args['id_text'].'" class="lgx_input_width lgx_app_meta_filed lgx_app_meta_text" name="'. $args['name_text'].'" '.$is_pro.'>';
        $output.= $is_pro_label;
        $output.= '</div>';//item 2
        $output.= '</div>';//wrap
        $output.= '</td>';

        $output.= '</tr>';

        echo $output;
    }


 /**
     * @param array $args
     *
     *   title, text , link
     */

    public function buy_pro( array $args ) {
        global $post;

        if ((! isset( $args['status'] ) || ($args['status'] != 'disabled')) ) {
            return;
        }

        if ( ! isset( $args['text'] ) ) {
            $args['text']  = 'To unlock all premium options and enjoy all exclusive features, please ';
        }

        if ( ! isset( $args['text'] ) ) {
            $args['link']  = 'https://logichunt.com/';
        }



        $output= '<tr>';
        $output.= '<td class="lgx_app_meta_buy_pro_td" colspan="2"><div  class="lgx_app_meta_buy_pro_wrap">';
        $output.= ((isset( $args['title'])) ? '<h3 class="lgx_app_meta_buy_pro_title">'. $args['title'].'</h3>' : '');
        $output.= '<p class="lgx_input_desc lgx_app_meta_buy_pro_desc">'. $args['text'].' <a href="'.esc_url($args['link'] ).'" target="_blank">Upgrade To Pro</a> .</p>';
        $output.= '</div></td>';
        $output.= '</tr>';

        echo $output;
    }



    /**
     * @param array $args
     */

    public function switch( array $args ) {
        global $post;

        if ( ! isset( $args['id'], $args['name'] , $args['label'] ) ) {
            return;
        }

        $yes_label     = isset( $args['yes_label'] ) ? $args['yes_label'] : __('ON', 'logo-slider-wp');
        $no_label    = isset( $args['no_label'] ) ? $args['no_label'] : __('OFF', 'logo-slider-wp');
        $status       = isset( $args['status'] ) ? $args['status'] : '';
        $is_pro       = (( $status == 'disabled') ? 'disabled' : '');
        $is_pro_label = (( $status== 'disabled') ? '<span class="lgx_meta_field_mark_pro_wrap"><span class="lgx_meta_field_mark">'.__('Pro', 'logo-slider-wp').'</span>' : '');


        $output= '<tr>';

        $output.= '<th scope="row">';
        $output.= '<h4 class="lgx_app_meta_label"><label for="'.$args['id'].'">'. $args['label'].'</label></h4>';
        $output.= '<p class="lgx_input_desc lgx_app_meta_desc">'. $args['desc'].'</p>';
        $output.= '</th>';

        $default_value = isset( $args['default'] ) ? $args['default'] : '';
        $meta          = get_post_meta( $post->ID, '_lgx_lsp_shortcodes_meta', true );
        $meta_value    = (! empty( $meta[$args['id']] ) ? $meta[$args['id']] : $default_value);

        $is_checked = ( $meta_value == 'yes') ? 'checked' : '';

        $output.= '<td>';
        $output.='<label class="lgx_switch  '.(($is_pro=='disabled') ? 'lgx_switch_pro' : '').'">';
        $output.= '<input type="checkbox" value="yes" id="'.$args['id'].'" class="lgx_app_meta_filed lgx_app_meta_checkbox" name="'. $args['name'].'" '.$is_checked.' '.$is_pro.' >';
        $output.=' <div class="lgx_switch_slider lgx_switch_round">';
        $output.='<span class="lgx_switch_on">'.$yes_label.'</span>';
        $output.='<span class="lgx_switch_off">'.$no_label.'</span>';
        $output.='</div>';
        $output.='</label>';
        $output.= $is_pro_label;
        $output.= '</td>';

        $output.= '</tr>';

        echo $output;
    }



    /**
     * @param array $args
     *
     *  id, name, label, value, default
     */

    public function header_spacer( array $args ) {
        global $post;

        if ( ! isset( $args['label'] ) ) {
            return;
        }


        $output= '<tr>';
        $output.= '<td colspan="2" >';
        $output.= '<div  class="lgx_app_meta_header_spacer"><h3>'. $args['label'].'</h3></div>';
        //$output.= '<p class="lgx_input_desc lgx_app_meta_desc">'. $args['desc'].'</p>';
        $output.= '</td>';
        $output.= '</tr>';

        echo $output;
    }


    /**
     * @param array $args
     *
     *  id, name, label, value, default
     */

    public function text( array $args ) {
        global $post;

        if ( ! isset( $args['id'], $args['name'] , $args['label'] ) ) {
            return;
        }


        $status        = isset( $args['status'] ) ? $args['status'] : '';
        $is_pro       = (( $status == 'disabled') ? 'disabled' : '');
        $is_pro_label = (( $status== 'disabled') ? '<span class="lgx_meta_field_mark_pro_wrap"><span class="lgx_meta_field_mark">'.__('Pro', 'logo-slider-wp').'</span></span>' : '');


        $output= '<tr>';

        $output.= '<th scope="row">';
        $output.= '<h4 class="lgx_app_meta_label"><label for="'.$args['id'].'">'. $args['label'].'</label></h4>';
        $output.= '<p class="lgx_input_desc lgx_app_meta_desc">'. $args['desc'].'</p>';
        $output.= '</th>';

        $default_value = isset( $args['default'] ) ? $args['default'] : '';
        $meta          = get_post_meta( $post->ID, '_lgx_lsp_shortcodes_meta', true );
        $meta_value    = (! empty( $meta[$args['id']] ) ? $meta[$args['id']] : $default_value);

        $output.= '<td>';
        $output.= '<input type="text" value="'.$meta_value.'" placeholder="'.$meta_value.'"  id="'.$args['id'].'" class="lgx_input_width lgx_app_meta_filed lgx_app_meta_text" name="'. $args['name'].'" '.$is_pro.'>';
        $output.= $is_pro_label;
        $output.= '</td>';

        $output.= '</tr>';

        echo $output;
    }



    /**
     * @param array $args
     */
    public function number( array $args ) {
        global $post;

        if ( ! isset( $args['id'], $args['name'] , $args['label'] ) ) {
            return;
        }

        $status        = isset( $args['status'] ) ? $args['status'] : '';
        $is_pro       = (( $status == 'disabled') ? 'disabled' : '');
        $is_pro_label = (( $status== 'disabled') ? '<span class="lgx_meta_field_mark_pro_wrap"><span class="lgx_meta_field_mark">'.__('Pro', 'logo-slider-wp').'</span></span>' : '');

        $output= '<tr>';

        $output.= '<th scope="row">';
        $output.= '<h4 class="lgx_app_meta_label"><label for="'.$args['id'].'">'. $args['label'].'</label></h4>';
        $output.= '<p class="lgx_input_desc lgx_app_meta_desc">'. $args['desc'].'</p>';
        $output.= '</th>';

        $default_value = isset( $args['default'] ) ? $args['default'] : '';
        $meta          = get_post_meta( $post->ID, '_lgx_lsp_shortcodes_meta', true );
        $meta_value    = (! empty( $meta[$args['id']] ) ? $meta[$args['id']] : $default_value);

        $output.= '<td>';
        $output.= '<input type="number" value="'.$meta_value.'" placeholder="'.$meta_value.'"  id="'.$args['id'].'" class="lgx_input_width lgx_app_meta_filed lgx_app_meta_number" name="'. $args['name'].'" '.$is_pro.'>';
        $output.= $is_pro_label;
        $output.= '</td>';

        $output.= '</tr>';

        echo $output;
    }


    /**
     * @param array $args
     */
    public function url( array $args ) {
        global $post;

        if ( ! isset( $args['id'], $args['name'] , $args['label'] ) ) {
            return;
        }

        $status        = isset( $args['status'] ) ? $args['status'] : '';
        $is_pro       = (( $status == 'disabled') ? 'disabled' : '');
        $is_pro_label = (( $status== 'disabled') ? '<span class="lgx_meta_field_mark_pro_wrap"><span class="lgx_meta_field_mark">'.__('Pro', 'logo-slider-wp').'</span></span>' : '');

        $output= '<tr>';

        $output.= '<th scope="row">';
        $output.= '<h4 class="lgx_app_meta_label"><label for="'.$args['id'].'">'. $args['label'].'</label></h4>';
        $output.= '<p class="lgx_input_desc lgx_app_meta_desc">'. $args['desc'].'</p>';
        $output.= '</th>';

        $default_value = isset( $args['default'] ) ? $args['default'] : '';
        $meta          = get_post_meta( $post->ID, '_lgx_lsp_shortcodes_meta', true );
        $meta_value    = (! empty( $meta[$args['id']] ) ? $meta[$args['id']] : $default_value);

        $output.= '<td>';
        $output.= '<input type="url" value="'.$meta_value.'" id="'.$args['id'].'" class="lgx_app_meta_filed lgx_app_meta_url" name="'. $args['name'].'" '.$is_pro.'>';
        $output.= $is_pro_label;
        $output.= '</td>';

        $output.= '</tr>';

        echo $output;
    }


    /**
     * @param array $args
     */
    public function textarea( array $args ) {
        global $post;

        if ( ! isset( $args['id'], $args['name'] , $args['label'] ) ) {
            return;
        }

        $status        = isset( $args['status'] ) ? $args['status'] : '';
        $is_pro       = (( $status == 'disabled') ? 'disabled' : '');
        $is_pro_label = (( $status== 'disabled') ? '<span class="lgx_meta_field_mark_pro_wrap"><span class="lgx_meta_field_mark">'.__('Pro', 'logo-slider-wp').'</span></span>' : '');

        $output= '<tr>';

        $output.= '<th scope="row">';
        $output.= '<h4 class="lgx_app_meta_label"><label for="'.$args['id'].'">'. $args['label'].'</label></h4>';
        $output.= '<p class="lgx_input_desc lgx_app_meta_desc">'. $args['desc'].'</p>';
        $output.= '</th>';

        $default_value = isset( $args['default'] ) ? $args['default'] : '';
        $meta          = get_post_meta( $post->ID, '_lgx_lsp_shortcodes_meta', true );
        $meta_value    = (! empty( $meta[$args['id']] ) ? $meta[$args['id']] : $default_value);

        $output.= '<td>';
        $output.= '<textarea  name="'. $args['name'].'" placeholder="'. __( $args['name'], $this->plugin_name ).'"  class="lgx_input_width lgx_app_meta_filed lgx_app_meta_textarea" '.$is_pro.'>'.$meta_value.'</textarea>';
        $output.= $is_pro_label;
        $output.= '</td>';

        $output.= '</tr>';

        echo $output;
    }



    /**
     * @param array $args
     */

    public function checkbox( array $args ) {
        global $post;

        if ( ! isset( $args['id'], $args['name'] , $args['label'] ) ) {
            return;
        }

        $status        = isset( $args['status'] ) ? $args['status'] : '';
        $is_pro       = (( $status == 'disabled') ? 'disabled' : '');
        $is_pro_label = (( $status== 'disabled') ? '<span class="lgx_meta_field_mark_pro_wrap"><span class="lgx_meta_field_mark">'.__('Pro', 'logo-slider-wp').'</span></span>' : '');


        $output= '<tr>';

        $output.= '<th scope="row">';
        $output.= '<h4 class="lgx_app_meta_label"><label for="'.$args['id'].'">'. $args['label'].'</label></h4>';
        $output.= '<p class="lgx_input_desc lgx_app_meta_desc">'. $args['desc'].'</p>';
        $output.= '</th>';

        $default_value = isset( $args['default'] ) ? $args['default'] : '';
        $meta          = get_post_meta( $post->ID, '_lgx_lsp_shortcodes_meta', true );
        $meta_value    = (! empty( $meta[$args['id']] ) ? $meta[$args['id']] : $default_value);

        $is_checked = ( $meta_value == 'yes') ? 'checked' : '';

        $output.= '<td>';
        $output.= '<input type="checkbox" value="yes" id="'.$args['id'].'" class="lgx_app_meta_filed lgx_app_meta_checkbox" name="'. $args['name'].'" '.$is_checked.' '.$is_pro.' >';
        $output.= $is_pro_label;
        $output.= '</td>';

        $output.= '</tr>';

        echo $output;
    }


    /**
     * @param array $args
     *  type="'
     */

    public function select( array $args ) {
        global $post;

        if ( ! isset( $args['id'], $args['name'] , $args['label'] ) ) {
            return;
        }

        if ( ! isset( $args['options'] ) && count( $args['options'] ) < 1 ) {
            return;
        }

        $status       = (isset( $args['status'] ) ? $args['status'] : '');
        $is_pro       = (( $status == 'disabled') ? 'disabled' : '');
        $is_pro_label = (( $status== 'disabled') ? '<span class="lgx_meta_field_mark_pro_wrap"><span class="lgx_meta_field_mark">'.__('Pro', 'logo-slider-wp').'</span></span>' : '');

        $output= '<tr>';

        $output.= '<th scope="row">';
        $output.= '<h4 class="lgx_app_meta_label"><label for="'.$args['id'].'">'. $args['label'].'</label></h4>';
        $output.= '<p class="lgx_input_desc lgx_app_meta_desc">'. $args['desc'].'</p>';
        $output.= '</th>';

        $default_value = isset( $args['default'] ) ? $args['default'] : '';
        $meta          = get_post_meta( $post->ID, '_lgx_lsp_shortcodes_meta', true );
       // print_r($meta);
        $meta_value    = (! empty( $meta[$args['id']] ) ? $meta[$args['id']] : $default_value);
       /// print_r($args['options'] );
        $output.= '<td>';

        $options = '';

        foreach ( $args['options'] as $option_value => $option_text ) {
            $selected = ( $option_value == $meta_value ) ? ' selected=selected' : '';
            $pro_disabled_label = ((($is_pro == 'disabled') && ($option_value !== $meta_value )) ? 'disabled="disabled"' : '');
            $options .= '<option value="'. $option_value .'" '.$selected.'  '.$pro_disabled_label.'>'. $option_text . ((($is_pro == 'disabled') && ($option_value !== $meta_value )) ? ' ( Pro )' : '').'</option>';
        }

        $is_multiple = ( isset( $args['multiple'] ) && ($args['multiple'] == 'yes')  ? 'multiple' : '');

        $output.= '<select name="'. $args['name'].'" class="lgx_input_width lgx_app_meta_filed lgx_app_meta_select '. (($is_pro == 'disabled') ? 'lgx_app_meta_select_disabled' : '').'"  id="'.$args['id'].'" '.$is_multiple.'>';
        $output.= $options;

        $output.= '</select>';
       //$output.= $is_pro_label;
        $output.= '</td>';


        $output.= '</tr>';

        echo $output;
    }




    /**
     * @param array $args
     *  hexa, rgba
     */
    public function color( array $args ) {
        global $post;

        if ( ! isset( $args['id'], $args['name'] , $args['label'] ) ) {
            return;
        }

        $status        = isset( $args['status'] ) ? $args['status'] : '';
        $is_pro       = (( $status == 'disabled') ? 'disabled' : '');
        $is_pro_label = (( $status== 'disabled') ? '<span class="lgx_meta_field_mark_pro_wrap"><span class="lgx_meta_field_mark">'.__('Pro', 'logo-slider-wp').'</span></span>' : '');

        $output= '<tr>';

        $output.= '<th scope="row">';
        $output.= '<h4 class="lgx_app_meta_label"><label for="'.$args['id'].'">'. $args['label'].'</label></h4>';
        $output.= '<p class="lgx_input_desc lgx_app_meta_desc">'. $args['desc'].'</p>';
        $output.= '</th>';

        $default_value = isset( $args['default'] ) ? $args['default'] : '';
        $meta          = get_post_meta( $post->ID, '_lgx_lsp_shortcodes_meta', true );
        $meta_value    = (! empty( $meta[$args['id']] ) ? $meta[$args['id']] : $default_value);

        $output.= '<td>';
        $output.= '<input type="text" value="'.$meta_value.'" id="'.$args['id'].'" class="lgx_app_meta_filed lgx_color_picker" name="'. $args['name'].'" data-default-color="'.$meta_value.'" data-alpha-enabled="true" '.$is_pro.'>';
        $output.= $is_pro_label;
        $output.= '</td>';

        $output.= '</tr>';

        echo $output;
    }



    /**
     * @param array $args
     *  hexa, rgba
     */
    public function upload( array $args ) {

        global $post;

        if ( ! isset( $args['id'], $args['name'] , $args['label'] ) ) {
            return;
        }

        $status        = isset( $args['status'] ) ? $args['status'] : '';
        $is_pro       = (( $status == 'disabled') ? 'disabled' : '');
        $is_pro_label = (( $status== 'disabled') ? '<span class="lgx_meta_field_mark_pro_wrap"><span class="lgx_meta_field_mark">'.__('Pro', 'logo-slider-wp').'</span></span>' : '');

        $output= '<tr>';

        $output.= '<th scope="row">';
        $output.= '<h4 class="lgx_app_meta_label"><label for="'.$args['id'].'">'. $args['label'].'</label></h4>';
        $output.= '<p class="lgx_input_desc lgx_app_meta_desc">'. $args['desc'].'</p>';
        $output.= '</th>';


        $default_value = isset( $args['default'] ) ? $args['default'] : '';
        $meta          = get_post_meta( $post->ID, '_lgx_lsp_shortcodes_meta', true );
        $meta_value    = (! empty( $meta[$args['id']] ) ? $meta[$args['id']] : $default_value);

        $output.= '<td>';
        $output.= '<button type="button" class="button button-large lgx_icon_image_button" data-icon-field-name="'. $args['name']. '" data-icon-img-id="'.$args['id'].'"><i class="lgxicon lgx-icon-file-photo-o"></i> Select Icon</button>';
        $output.= '&nbsp;&nbsp;&nbsp;<button type="button" class="button button-large lgx_icon_image_button_clear" data-icon-field-name="'. $args['name']. '" data-icon-img-id="'.$args['id'].'"><i class="lgxicon lgx-icon-remove"></i> Remove Icon</button>';
        $output.= '&nbsp;&nbsp;&nbsp;<img src="" alt="" id="'. $args['id']. '" style="width: 24px; margin-top: 5px;">';
        $output.= '<input type="hidden" value="'.$meta_value.'" name="'. $args['name'].'" '.$is_pro.'>';
        $output.= $is_pro_label;
        $output.= '</td>';

        $output.= '</tr>';

        echo $output;

    }





}