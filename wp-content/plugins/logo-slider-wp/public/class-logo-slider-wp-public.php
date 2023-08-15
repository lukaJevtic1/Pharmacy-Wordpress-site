<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://logichunt.com
 * @since      1.0.0
 *
 * @package    Logo_Slider_WP
 * @subpackage Logo_Slider_WP/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Logo_Slider_WP
 * @subpackage Logo_Slider_WP/public
 * @author     LogicHunt <info.logichunt@gmail.com>
 */
class Logo_Slider_WP_Public {


    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $plugin_name    The ID of this plugin.
     */
    private  $plugin_name;

    /**
     * The version of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $version    The current version of this plugin.
     */
    private  $version;

    /**
     * @var Lgx_Carousel_Settings_API
     */
    private $settings_api;




    /**
     * Initialize the class and set its properties.
     *
     * @since    1.0.0
     * @param      string    $plugin_name       The name of the plugin.
     * @param      string    $version    The version of this plugin.
     */
    public function __construct( $plugin_name, $version ) {

        $this->plugin_name = $plugin_name;
        $this->version     = $version;

        $this->settings_api = new Lgx_Carousel_Settings_API($plugin_name, $version);

        add_shortcode('logo-slider', array($this, 'logo_slider_wp_shortcode_function_dep' ));
    }




    /**
     * Register the stylesheets for the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function enqueue_styles() {


        /**
         *
         * Deprecated Slider Style
         *
         */

        wp_register_style('lgx-logo-slider-owl', plugin_dir_url( __FILE__ ) . 'assets/libs/owl/assets/owl.carousel.min.css', array(), $this->version, 'all' );
        wp_register_style('lgx-logo-slider-owltheme', plugin_dir_url( __FILE__ ) . 'assets/libs/owl/assets/owl.theme.default.min.css', array('lgx-logo-slider-owl'), $this->version, 'all' );
        wp_register_style( 'lgx-logo-slider-style-dep', plugin_dir_url( __FILE__ ) . 'assets/css/logosliderwppublic-dep.min.css', array('lgx-logo-slider-owl'), $this->version, 'all' );


        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Logo_Slider_WP_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Logo_Slider_WP_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */
        wp_register_style('logo-slider-wp-font', plugin_dir_url( __FILE__ ) . 'assets/css/font-awesome.min.css', array(), $this->version );

        //Swiper style
        wp_register_style('logo-slider-wp-swiper-css', plugin_dir_url( __FILE__ ) . 'assets/libs/swiper/swiper-bundle.min.css', array(), $this->version );

        //TooltipStar
        wp_register_style('logo-slider-wp-tooltipster-css', plugin_dir_url( __FILE__ ) . 'assets/libs/tooltipster/css/tooltipster.bundle.min.css', array(), $this->version );

        //Main Style
        wp_register_style( 'lgx-logo-slider-style', plugin_dir_url( __FILE__ ) . 'assets/css/logo-slider-wp-public.min.css', array(), $this->version, 'all' );

    }

    /**
     * Register the JavaScript for the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts() {


        // Deprecated Script
        wp_register_script('lgxlogoowljs', plugin_dir_url( __FILE__ ) . 'assets/libs/owl/owl.carousel.js', array( 'jquery' ), $this->version, false );
        wp_register_script('lgxlogoowljs-modified', plugin_dir_url( __FILE__ ) . 'assets/libs/owl/owl-modified.js', array( 'lgxlogoowljs' ), $this->version, false );
        wp_register_script( 'lgx-logo-slider-script-dep', plugin_dir_url( __FILE__ ) . 'assets/js/logosliderwppublic-dep.js', array( 'lgxlogoowljs' ), $this->version, false );

        // Localize the script
        $translation_array = array(
            'owl_navigationTextL'    => plugin_dir_url( __FILE__ ). 'assets/img/prev.png',
            'owl_navigationTextR'    => plugin_dir_url( __FILE__ ) . 'assets/img/next.png',
        );
        wp_localize_script( 'lgx-logo-slider-script-dep', 'logosliderwp', $translation_array );

        // wp_enqueue_script('jquery');

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Logo_Slider_WP_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Logo_Slider_WP_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */

        // Swiper Script
        wp_register_script('logo-slider-wp-swiper-js', plugin_dir_url( __FILE__ ) . 'assets/libs/swiper/swiper-bundle.min.js', array(), $this->version, true );

        //TooltipStar
        wp_register_script('logo-slider-wp-tooltipster-js', plugin_dir_url( __FILE__ ) . 'assets/libs/tooltipster/js/tooltipster.bundle.min.js', array('jquery'), $this->version, true );

        //Masonry
     //   wp_register_script('logo-slider-wp-masonry-js', plugin_dir_url( __FILE__ ) . 'assets/libs/masonry/masonry.pkgd.min.js', array('jquery'), $this->version, true );

        //Main Script
        wp_register_script('logo-slider-wp-public', plugin_dir_url( __FILE__ ) . 'assets/js/logo-slider-wp-public.js', array('jquery'), $this->version, true );
    }




    /**
     * Plugin Output Function
     * @param $atts
     *
     * @return string
     *  @since 1.0.0
     */

    public static function lgx_output_function_dep($params){

        //Query args
        $cats       = trim($params['cat'] );
        $target      = trim( $params['target'] );
        $order      = trim($params['order'] );
        $orderby    = trim( $params['orderby']);
        $limit      = intval($params['limit']);

        //New
        $ticker         = $params['ticker'];

        $compnayanme_en     = trim($params['companyname']);
        $compnaydesc_en     = trim($params['companydesc']);

        //Carousel Style
        $logo_height 	= intval($params['maxheight']);
        $logo_width  	= intval($params['maxwidth']);
        $border      	= trim($params['border']);
        $bordercolor 	= trim($params['bordercolor']);
        $navposition 	= trim($params['navposition']);
        $enbg     		= trim($params['enbg']);
        $bgcolor    	= trim($params['bgcolor']);
        $hovertype    	= trim($params['hovertype']);




        //Data Attribute

        $data_attr                        = array();

        if($ticker == 'yes') {

            $data_attr['autoplaytimeout']   = 0;
            $data_attr['autoplayspeed']     = 3000;

        } else {
            $data_attr['autoplaytimeout']     = intval($params['autoplay_timeout']);
            $data_attr['autoplayspeed']     = intval($params['autoplay_speed']);

        }


        $data_attr['margin']              = intval($params['margin']);
        $data_attr['loop']                = ($params['loop'] == 'no') ? 'false' : 'true';
        $data_attr['autoplay']            = ($params['autoplay'] == 'no') ? 'false' : 'true';



        $data_attr['autoplayhoverpause']  = ($params['hover_pause'] == 'no') ? 'false' : 'true';
        $data_attr['dots']                = ($params['dots'] == 'no') ? 'false' : 'true';


        //
        $data_attr['itemlarge']           = intval($params['itemlarge']);
        $data_attr['itemdesk']            = intval($params['itemdesk']);
        $data_attr['itemtablet']          = intval($params['itemtablet']);
        $data_attr['itemmobile']          = intval($params['itemmobile']);


        $data_attr['navlarge']           = ($params['navlarge'] == 'no') ? 'false' : 'true';
        $data_attr['navdesk']            = ($params['navdesk'] == 'no') ? 'false' : 'true';
        $data_attr['navtablet']          = ($params['navtablet'] == 'no') ? 'false' : 'true';
        $data_attr['navmobile']          = ($params['navmobile'] == 'no') ? 'false' : 'true';




        // Mixing
        $border_color_style = ($border == 'yes') ? 'style="border-color:'.$bordercolor.';"' : '';
        $border_class       = ($border == 'yes') ? 'wp-logo-border' : '';
        $logo_style = 'style="max-width: '.$logo_width.'px;max-height: '.$logo_height.'px;"';
        $bg_style = ($enbg == 'yes') ? 'style=" background-color:'.$bgcolor.';"' : '';



        // Apply Data Attribute
        $data_attr_str = '';
        foreach ($data_attr as $key => $value) {
            $data_attr_str .= ' data-' . $key . '="' . $value . '" ';
        }


        $logo_args = array(
            'post_type'         => array( 'logosliderwp' ),
            'post_status'       => array( 'publish' ),
            'order'             => $order,
            'orderby'           => $orderby,
            'posts_per_page'    => $limit
        );

        // Category to Array Convert
        if( !empty($cats) && $cats != '' ){
            $cats = trim($cats);
            $cats_arr   = explode(',', $cats);

            if(is_array($cats_arr) && sizeof($cats_arr) > 0){
                $logo_args['tax_query'] = array(
                    array(
                        'taxonomy' => 'logosliderwpcat',
                        'field'    => 'slug',
                        'terms'    => $cats_arr
                    )
                );

            }
        }


        // The  Query
        $logo_post = new WP_Query( $logo_args );
        $logo_item    = '';

        // Enqueue Style
        wp_enqueue_style( 'lgx-logo-slider-owl' );
        wp_enqueue_style( 'lgx-logo-slider-owltheme' );
        wp_enqueue_style( 'lgx-logo-slider-style-dep');


        //Enqueue Script
        wp_enqueue_script( 'lgxlogoowljs' );

        if($ticker == 'yes') {

            wp_enqueue_script( 'lgxlogoowljs-modified' );
        }

        wp_enqueue_script( 'lgx-logo-slider-script-dep' );

        // The Loop
        if ( $logo_post->have_posts() ) {

            while ( $logo_post->have_posts() ) {

                $logo_post->the_post();
                $post_id            = get_the_ID();
                $metavalues         = get_post_meta( $post_id, '_logosliderwpmeta', true );
                $company_name       = $metavalues['company_name'];
                $company_url        = $metavalues['company_url'];
                $company_desc       = (!empty($metavalues['company_desc']) ? $metavalues['company_desc'] : '');

                $logo_img = '';
                if (has_post_thumbnail( $post_id )) {
                    $thumb_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id), true );
                    $thumb_url      = $thumb_url[0];
                    $alt_text = get_post_meta( get_post_thumbnail_id($post_id), '_wp_attachment_image_alt', true );


                    $logo_img .= '<div class="lgx-logo-item" '.$border_color_style.'>';
                    $logo_img .= (!empty($company_url) ? '<a href="'.$company_url.'" target="'.$target .'">' : '');
                    $logo_img .= '<img class="lgx-logo-img skip-lazy" src="'.$thumb_url.'" '.$logo_style.'   alt="'.$alt_text.'" title="'.(!empty($company_name)? $company_name : 'Company').'" />';
                    $logo_img .= (!empty($company_url) ? '</a>' : '');
                    $logo_img .= ( (!empty($company_name) && $compnayanme_en == 'yes' ) ? '<h6 class="logo-company-name">'.$company_name.'</h6>': '');
                    $logo_img .= ( (!empty($company_desc) && $compnaydesc_en == 'yes' ) ? '<p class="logo-company-desc">'.$company_desc.'</p>': '');
                    $logo_img .= '</div>';

                }

                $logo_item .= '<div class="item lgx-log-item" >';
                $logo_item .= $logo_img;
                $logo_item .=  '</div>';

            }
            wp_reset_postdata();// Restore original Post Data

            //Output String
            $output  = '<div  class="lgx_logo_slider_app_wrapper lgx-logo-slider-wp">';
            $output .= '<div class="lgx-logo-wrapper '.$border_class.' nav-position-'.$navposition.' hover-'.$hovertype.'" '.$bg_style.' >';
            $output .= '<div class="owl-carousel lgx-logo-carousel" ' . $data_attr_str . ' >' . $logo_item . '</div>';
            $output .= '</div>';
            $output .= '</div>';

            return $output;

        } // Check post exist
        else {
            _e('There are no logo item. Please add some logo Item', 'logo-slider-wp');
        }



    }


    /**
     * Define Short Code Function
     *
     * @param $atts
     *
     * @return mixed
     * @since 1.0.0
     */

    public function logo_slider_wp_shortcode_function_dep($atts) {

        $cats_set       = $this->settings_api->get_option('logosliderwp_settings_cat', 'logosliderwp_adv', '');

        $order_set      = $this->settings_api->get_option('logosliderwp_settings_order', 'logosliderwp_basic', 'DESC');

        $orderby_set    = $this->settings_api->get_option('logosliderwp_settings_orderby', 'logosliderwp_adv', 'orderby');

        $limit_set      = $this->settings_api->get_option('logosliderwp_settings_limit', 'logosliderwp_adv', -1);


        $max_height          = intval($this->settings_api->get_option('logosliderwp_settings_height', 'logosliderwp_basic', 350));
        $max_width           = intval($this->settings_api->get_option('logosliderwp_settings_width', 'logosliderwp_basic', 350));

        $compnayanme_set     = trim($this->settings_api->get_option('logosliderwp_settings_show_company', 'logosliderwp_basic', 'no'));
        $compnaydesc_set     = trim($this->settings_api->get_option('logosliderwp_settings_show_company_desc', 'logosliderwp_basic', 'no'));



        //Data Attribute
        $margin_set     = trim($this->settings_api->get_option('logosliderwp_settings_margin', 'logosliderwp_config', 10));

        $loop_set       = $this->settings_api->get_option('logosliderwp_settings_loop', 'logosliderwp_config', 'yes');

        $autoplay_set   = trim($this->settings_api->get_option('logosliderwp_settings_autoplay', 'logosliderwp_config', 'yes'));


        $autoplay_timeout_set = intval($this->settings_api->get_option('logosliderwp_settings_autoplay_timeout', 'logosliderwp_config', 2000));

        $autoplay_speed_set  = intval($this->settings_api->get_option('logosliderwp_settings_autoplay_slidespeed', 'logosliderwp_config', 1000));


        $hover_pause_set  = $this->settings_api->get_option('logosliderwp_settings_hover_pause', 'logosliderwp_config', 'no');

        $dots_set         	= trim($this->settings_api->get_option('logosliderwp_settings_dots', 'logosliderwp_config', 'yes'));


        // Responsive
        $item_set_lagedesctop   = $this->settings_api->get_option('logosliderwp_settings_largedesktop_item', 'logosliderwp_responsive', 5);
        $nav_set_lagedesctop   =  $this->settings_api->get_option('logosliderwp_settings_desktop_nav', 'logosliderwp_responsive', 'yes');

        $item_set_desctop    = $this->settings_api->get_option('logosliderwp_settings_desktop_item', 'logosliderwp_responsive', 4);
        $nav_set_desctop     =  $this->settings_api->get_option('logosliderwp_settings_desktop_nav', 'logosliderwp_responsive', 'yes');

        $item_set_tablet    = $this->settings_api->get_option('logosliderwp_settings_tablet_item', 'logosliderwp_responsive', 3);
        $nav_set_tablet    =  $this->settings_api->get_option('logosliderwp_settings_tablet_nav', 'logosliderwp_responsive', 'yes');

        $item_set_mobile   = $this->settings_api->get_option('logosliderwp_settings_mobile_item', 'logosliderwp_responsive', 2);
        $nav_set_mobile    =  $this->settings_api->get_option('logosliderwp_settings_mobile_nav', 'logosliderwp_responsive', 'yes');



        //Style
        $bgcolor_set    	= trim($this->settings_api->get_option('logosliderwp_settings_bgcolor', 'logosliderwp_style', '#f1f1f1'));
        $bordercolor_set     = trim($this->settings_api->get_option('logosliderwp_settings_bordercolor', 'logosliderwp_style', '#f1f1f1'));
        $enbg_set            =  $this->settings_api->get_option('logosliderwp_settings_bgcolor_en', 'logosliderwp_style', 'no');
        $border_set       	 =  $this->settings_api->get_option('logosliderwp_settings_border_en', 'logosliderwp_style', 'no');
        $navposition_set      =  $this->settings_api->get_option('logosliderwp_settings_nav_position', 'logosliderwp_style', 'b-center');
        $hovertype_set        =  $this->settings_api->get_option('logosliderwp_settings_hover_type', 'logosliderwp_style', 'default');


        $atts = shortcode_atts(array(
            'target'            => '_blank',
            'ticker'            => 'no',
            'order'            => $order_set,
            'orderby'          => $orderby_set,
            'limit'            => $limit_set,
            'hovertype'        => $hovertype_set,
            'companyname'      => $compnayanme_set,
            'companydesc'      => $compnaydesc_set,
            'maxheight'        => $max_height,
            'maxwidth'         => $max_width,
            'enbg'             =>  $enbg_set,
            'border'           =>  $border_set,
            'bordercolor'      => $bordercolor_set,
            'navposition'      => $navposition_set,
            'cat'              => $cats_set,
            'bgcolor'          => $bgcolor_set,
            'margin'           => $margin_set,
            'loop'             => $loop_set,
            'autoplay'         => $autoplay_set,
            'autoplay_timeout' => $autoplay_timeout_set,
            'autoplay_speed'  => $autoplay_speed_set,
            'hover_pause'      => $hover_pause_set,
            'dots'             => $dots_set,
            'itemlarge'        => $item_set_lagedesctop,
            'itemdesk'         => $item_set_desctop,
            'itemtablet'       => $item_set_tablet,
            'itemmobile'       => $item_set_mobile,
            'navlarge'         => $nav_set_lagedesctop,
            'navdesk'          => $nav_set_desctop,
            'navtablet'        => $nav_set_tablet,
            'navmobile'        => $nav_set_mobile,
        ), $atts, 'logo-slider');

        $output = $this->lgx_output_function_dep($atts);

        return $output;
    }



    /**
     *
     *  Version 3 Started
     *
     */

    public function register_lgx_logo_slider_shortcode() {
        // wp_register_style('logo-slider-wp-swiper-css', plugin_dir_url( __FILE__ ) . 'js/swiper-bundle.min.css', array(), $this->version );
        // wp_register_script('logo-slider-wp-swiper-js', plugin_dir_url( __FILE__ ) . 'js/swiper-bundle.min.js', array(), $this->version, true );

        add_shortcode('lgxlogoslider', array( $this, 'display_lgx_logo_slider' ) );
    }

    public function display_lgx_logo_slider($atts) {
        if ( ! isset( $atts['id'] ) ) {
            return '<p style="color: red;">Error: The showcase ID is missing. Please add a Showcase ID.</p>';
        } else {
            $lgx_shortcodes_meta = get_post_meta( $atts['id'], '_lgx_lsp_shortcodes_meta', true );

            if(empty($lgx_shortcodes_meta)) {
                return '<p style="color: red;">Error: The showcase ID is not valid. Please add a valid Showcase ID.</p>';
            }
            //echo '<pre>';print_r($lgx_shortcodes_meta['showcase_type']);echo '</pre>';
            $lgx_lsw_loading_icon = plugin_dir_url( __FILE__ ). 'assets/img/loader.gif';
            ob_start();
            include('partials/view-controller.php');
            return ob_get_clean();
        }
    }




    /**
     *
     *  Version 3 End ***************************************************************************
     *
     */



}




