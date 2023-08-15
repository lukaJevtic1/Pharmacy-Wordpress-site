<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://logichunt.com
 * @since      1.0.0
 *
 * @package    Logo_Slider_WP
 * @subpackage Logo_Slider_WP/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Logo_Slider_WP
 * @subpackage Logo_Slider_WP/admin
 * @author     LogicHunt <info.logichunt@gmail.com>
 */
class Logo_Slider_WP_Admin {

    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $plugin_name    The ID of this plugin.
     */
    private $plugin_name;

    /**
     * @var Lgx_Carousel_Settings_API
     */
    private $settings_api;

    /**
     * The plugin plugin_base_file of the plugin.
     *
     * @since    1.0.0
     * @access   protected
     * @var      string plugin_base_file The plugin plugin_base_file of the plugin.
     */
    protected $plugin_base_file;


    /**
     * The version of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $version    The current version of this plugin.
     */

    private $version;


    /**
     * The version of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $version    The current version of this plugin.
     */
    private $meta_form;


    /**
     * Initialize the class and set its properties.
     *
     * @since    1.0.0
     * @param      string    $plugin_name       The name of this plugin.
     * @param      string    $version    The version of this plugin.
     */

    public function __construct( $plugin_name, $version ) {

        $this->plugin_name = $plugin_name;
        $this->version = $version;
        $this->settings_api = new Lgx_Carousel_Settings_API($plugin_name, $version);

        $this->init_meta_form();

        //For Sidebar: -pro.php
        $this->plugin_base_file = plugin_basename(plugin_dir_path(__FILE__).'../' . $this->plugin_name . '.php');

    }


    /**
     *
     * Initialized Meta field
     *
     */
    private function init_meta_form() {
        //wp_die( trailingslashit( dirname(  ) )  );
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/LgxMetaForm.php';
        $this->meta_form = new LogoSLiderWpMetaForm();
    }




    /**
     * Declare Custom Post Type For Carousal
     * @since 1.0.0
     *  previous: logosliderwp_initialize
     * New:
     *
     */

    public function register_post_type_for_logo_slider() {

        //custom post type labels
        $labels_logosliderwp = array(
            'name'               => _x('Logos', 'Logo Slider', 'logo-slider-wp'),
            'singular_name'      => _x('Logo Item', 'Slider Items', 'logo-slider-wp'),
            'menu_name'          => __('Logo Slider', 'logo-slider-wp'),
            'all_items'          => __('All Logos', 'logo-slider-wp'),
            'view_item'          => __('View Item', 'logo-slider-wp'),
            'add_new_item'       => __('Add New Logo', 'logo-slider-wp'),
            'add_new'            => __('Add New Logo', 'logo-slider-wp'),
            'edit_item'          => __('Edit Item', 'logo-slider-wp'),
            'update_item'        => __('Update Item', 'logo-slider-wp'),
            'search_items'       => __('Search Logo', 'logo-slider-wp'),
            'not_found'          => __('No Logo items found', 'logo-slider-wp'),
            'not_found_in_trash' => __('No Logo items found in trash', 'logo-slider-wp')
        );

        $args_logosliderwp   = array(
            'label'               => __('Logo Slider', 'logo-slider-wp'),
            'description'         => __('Logo Slider WP Post Type', 'logo-slider-wp'),
            'labels'              => $labels_logosliderwp,
            'supports'            => array( 'title', 'thumbnail'),
            'hierarchical'        => false,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'menu_position'       => 80, // OLD 5, 21
            'menu_icon'   			=> 'dashicons-images-alt',
            'show_in_nav_menus'   => true,
            'show_in_admin_bar'   => true,
            'can_export'          => true,
            'has_archive'         => false,
            'exclude_from_search' => true,
            'publicly_queryable'  => true,
            'capability_type'     => 'post',
        );


        //declare custom post type logosliderwp
        register_post_type( 'logosliderwp', $args_logosliderwp);


        // Register Taxonomy
        $logosliderwp_cat_args = array(
            'hierarchical'   => true,
            'label'          => __('Categories', 'logo-slider-wp'),
            'show_ui'        => true,
            'query_var'      => true,
            'singular_label' => __('Logo Category', 'logo-slider-wp'),
        );
        register_taxonomy('logosliderwpcat', array('logosliderwp'), $logosliderwp_cat_args);
    }


    /**
     * Add metabox for custom post type
     *
     * @since    1.0.0
     */
    public function adding_meta_boxes_for_logosliderwp() {

        //v_logo_metabox_logosliderwp //metabox_logosliderwp_display
        add_meta_box(
            'lgx_logosliderwp_metabox_postbox', __( 'Company Information', $this->plugin_name ), array(
            $this,
            'meta_fields_display_for_logosliderwp'
        ), 'logosliderwp', 'normal', 'high'
        );

    }


    /**
     * Render Metabox under logosliderwp
     *
     * logosliderwp meta field
     *
     * @param $post
     *
     * @since 1.0
     *
     */

    public function meta_fields_display_for_logosliderwp( $post ) {

        require_once plugin_dir_path( __FILE__ ) . 'partials/meta_fields_display_for_logosliderwp.php';

    }


    /**
     * Determines whether or not the current user has the ability to save meta data associated with this post.
     *
     * Save portfoliopro Meta Field
     *
     * @param        int $post_id //The ID of the post being save
     * @param         bool //Whether or not the user has the ability to save this post.
     */
    public function save_post_metadata_of_logosliderwp( $post_id, $post ) {

        $post_type = 'logosliderwp';

        // If this isn't a 'book' post, don't update it.
        if ( $post_type != $post->post_type ) {
            return;
        }

        if ( ! empty( $_POST['metaboxlogosliderwp'] ) ) {

            $postData = $_POST['metaboxlogosliderwp'];

            $savable_Data = array();

            if ( $this->user_can_save_for_logo_slider_meta( $post_id, 'metaboxlogosliderwp', $postData['nonce'] ) ) {

                $savable_Data['company_url']   = esc_url( $postData['company_url'] );
                $savable_Data['company_name']  = sanitize_text_field( $postData['company_name'] );
                $savable_Data['tooltip_text']  = sanitize_text_field( $postData['tooltip_text'] );
                $savable_Data['company_desc']  = sanitize_textarea_field( $postData['company_desc'] );

                update_post_meta( $post_id, '_logosliderwpmeta', $savable_Data );
            }
        }
    }// End  Meta Save


    /**
     * Determines whether or not the current user has the ability to save meta data associated with this post.
     *
     * user_can_save_for_logo_slider_meta
     *
     * @param        int $post_id // The ID of the post being save
     * @param        bool /Whether or not the user has the ability to save this post.
     *
     * @since 1.0
     */
    public function user_can_save_for_logo_slider_meta( $post_id, $action, $nonce ) {

        $is_autosave    = wp_is_post_autosave( $post_id );
        $is_revision    = wp_is_post_revision( $post_id );
        $is_valid_nonce = ( isset( $nonce ) && wp_verify_nonce( $nonce, $action ) );

        // Return true if the user is able to save; otherwise, false.
        return ! ( $is_autosave || $is_revision ) && $is_valid_nonce;

    }




    /**
     * Register the administration menu for this plugin into the WordPress Dashboard menu.
     *
     * @since    1.0.0
     */
    public function add_plugin_admin_menu() {

        //  $this->plugin_screen_hook_suffix  = add_submenu_page('edit.php?post_type=logosliderwp', __('Logo Slider Default Settings', 'logo-slider-wp'), __('Default Settings', 'logo-slider-wp'), 'manage_options', 'logosliderwpsettings', array($this, 'display_plugin_admin_settings_dep'));
        $this->plugin_screen_hook_suffix  = add_submenu_page('edit.php?post_type=logosliderwp', __('Usage & Help', 'logo-slider-wp'), __('Usage & Help', 'logo-slider-wp'), 'manage_options', 'logosliderwphelpuage', array($this, 'display_plugin_admin_usage_help'));

    }

    /**
     * Change Feature image input Position
     * old: logo_slider_wp_img_box
     * new: changing_meta_box_position_of_brand_logo
     */
    public  function changing_meta_box_position_of_brand_logo(){
        remove_meta_box( 'postimagediv', 'logosliderwp', 'side' );
        add_meta_box('postimagediv', __('Brand Logo'), 'post_thumbnail_meta_box', 'logosliderwp', 'normal', 'high');
    }



    /**
     * Add settings action link to the plugins page.
     *
     * @since    1.0.0
     */
    public function add_links_admin_plugin_page_title( $links ) {
        return array_merge( array(
            'create' => '<a href="' . admin_url( 'post-new.php?post_type=lgx_lsp_shortcodes' ) . '" >' . esc_html__( 'Create Showcase', 'logo-slider-wp') . '</a>',
            'docs'    => '<a style="font-weight: bold;" href="' .esc_url('http://logichunt.net/docs/wordpress-logo-slider//') . '" target="_blank">' . esc_html__( 'Docs', 'logo-slider-wp') . '</a>',
            //'support' => '<a style="color:#00a500;" target="_blank" href="' .esc_url('https://logichunt.com/support/') . '" target="_blank">' . esc_html__( 'Support', 'logo-slider-wp') . '</a>',
            'get_pro' => '<a style="color:#ff4b39; font-weight: bold;" href="https://logichunt.com/product/wordpress-logo-slider/">' . esc_html__( 'Get Pro!', 'logo-slider-wp') . '</a>'
        ), $links );

    }//end plugin_listing_setting_link



    /**
     * Add support link to plugin description in /wp-admin/plugins.php
     *
     * @param  array  $plugin_meta
     * @param  string $plugin_file
     *
     * @return array
     */
    public function add_links_admin_plugin_page_description($plugin_meta, $plugin_file) {

        if ($this->plugin_base_file == $plugin_file) {
            $plugin_meta[] = sprintf(
                '<a href="%s">%s</a>', 'https://logichunt.com/support/', __('Get Support', 'logo-slider-wp')
            );
        }

        return $plugin_meta;
    }



    function display_plugin_admin_usage_help() {
        global $wpdb;

        $plugin_data = get_plugin_data(plugin_dir_path(__DIR__) . '/../' . $this->plugin_base_file);

        include('partials/admin-usage-help.php');
    }


    /**
     *
     */

    public function display_plugin_admin_settings_dep() {
        /*	$test = $this->settings_api->get_option('logosliderwp_settings_cat', 'logosliderwp_config', 'test');
            var_dump($test);*/

        global $wpdb;

        $plugin_data = get_plugin_data(plugin_dir_path(__DIR__) . '/../' . $this->plugin_base_file);

        include('partials/admin-settings-display.php');
    }

    /**
     * Settings init
     */
    public function logo_slider_wp_setting_init_dep() {
        //set the settings
        $this->settings_api->set_sections($this->get_settings_sections_dep());
        $this->settings_api->set_fields($this->get_settings_fields_dep());

        //initialize settings
        $this->settings_api->admin_init();

        //$role = get_role('administrator');
    }




    /**
     * Ensure post thumbnail support is turned on.
     */
    public function add_thumbnail_support() {
        if ( ! current_theme_supports( 'post-thumbnails' ) ) {
            add_theme_support( 'post-thumbnails' );
        }
        add_post_type_support( 'logosliderwp', 'thumbnail' );
    }


    /**
     * Setings Sections
     * @return array|mixed|void
     */

    public function get_settings_sections_dep() {

        $sections = array(
            array(
                'id'    => 'logosliderwp_basic',
                'title' => __('Basic Settings', 'logo-slider-wp'),
            ),
            array(
                'id'    => 'logosliderwp_style',
                'title' => __('Style Settings', 'logosliderwp-domain'),
            ),

            array(
                'id'    => 'logosliderwp_responsive',
                'title' => __('Responsive Control', 'logo-slider-wp'),
            ),
            array(
                'id'    => 'logosliderwp_config',
                'title' => __('Slider Options', 'logo-slider-wp'),
            ),

            array(
                'id'    => 'logosliderwp_adv',
                'title' => __('Advanced Settings', 'logo-slider-wp'),
            ),


        );

        $sections = apply_filters('logo_slider_settings_sections', $sections);

        return $sections;
    }

    /**
     * Returns all the settings fields
     *
     * @return array settings fields
     *
     *  Note : will be deprecated v 4.0.0
     */
    public  function get_settings_fields_dep() {

        include('admin-deps/settings-fields.php');

        $settings_fields = apply_filters('logo_slider_settings_fields', $settings_fields);

        return $settings_fields;
    }


    /**
     * Modified get post for post type order
     *
     */
    public function modify_query_get_posts($query) {

        if ( ! is_admin() && ( isset( $query->query_vars['post_type'] ) &&  ( is_array( $query->query_vars['post_type'] ) && in_array( 'logosliderwp', $query->query_vars['post_type'] ) ) ) ) {

            //$order  =   isset( $query->query_vars['order'] )  ?  $query->query_vars['order'] : '';

            //var_dump( '<pre>', $query );
            //wp_die(  );
            //$query->set( 'orderby', 'menu_order' );
           // $query->set( 'order' , 'ASC' );
            //$query->set( 'posts_per_page' , 2 );

        } elseif ( is_admin() ) {
            if ( $query->is_main_query() ) {
                $currentScreen = get_current_screen();
                if ( is_object( $currentScreen ) && $currentScreen->id == 'edit-logosliderwp' && $currentScreen->post_type == 'logosliderwp' ) {
                    $query->set( 'post_type', 'logosliderwp' );
                    $query->set( 'orderby', 'menu_order' );
                    $query->set( 'order' , 'ASC' );
                }
            }
        }
    }



    /**
     * Filters the columns displayed in the Posts list table for a specific post type.
     *
     * apply_filters( "manage_{$post_type}_posts_columns", string[] $post_columns )
     * Deafult Value : cb, title, taxonomy-logosliderwpcat, date
     * @param $default_columns
     */
    public function add_new_column_head_for_logosliderwp($default_columns) {

        // unset( $default_columns['date'] );

        $new_columns['lgx_ls_logo']         = __( 'Brand Logo', 'logo-slider-wp' );
        $new_columns['lgx_ls_brand']        = __( 'Brand Name', 'logo-slider-wp' );
        $new_columns['lgx_ls_category']     = __( 'Categories', 'logo-slider-wp' );

        return array_slice( $default_columns, 0, 2, true ) + $new_columns + array_slice( $default_columns, 1, null, true );

    }

    /**
     * Fires for each custom column of a specific post type in the Posts list table.
     * do_action( "manage_{$post->post_type}_posts_custom_column", string $column_name, int $post_id )]
     *
     * @param $column
     * @param $post_id
     */
    public function define_admin_column_value_for_logosliderwp($column, $post_id) {
        switch ($column) {
            case 'lgx_ls_category': 

                    $lgx_logo_categories = get_the_terms( $post_id, 'logosliderwpcat' );

                    if ( ! empty( $lgx_logo_categories ) && ! is_wp_error( $lgx_logo_categories ) ) {

                        $lgx_categories_name = wp_list_pluck( $lgx_logo_categories, 'name' );
                
                        foreach ($lgx_categories_name as $lgx_cat_name) {
                            echo '<span class="button button-secondary" style="margin: 0 2px 2px 0; border-color:#a5adc3; color:#2c3338">' . $lgx_cat_name . '</span>';
                          }

                    }
                    break;

            case 'lgx_ls_brand':
                $metavalues         = get_post_meta( $post_id, '_logosliderwpmeta', true );
                echo  ( (!empty($metavalues['company_name'] ) ? $metavalues['company_name']: '' ));
                break;

            case 'lgx_ls_logo':

                if( has_post_thumbnail( $post_id) ){
                    $post_thumbnail_id = get_post_thumbnail_id($post_id);
                    $post_thumbnail_img = wp_get_attachment_image_src($post_thumbnail_id, 'thumbnail');
                    if(!empty($post_thumbnail_img)) {
                        $post_thumbnail_img= $post_thumbnail_img[0];
                        echo '<img src="' . $post_thumbnail_img . '" />';
                    } else {
                        echo '-';
                    }
                }
                else{
                    echo 'No logo added.';
                }

                break;

            default:
                break;
        }
    }
   


    /**
     *  Save post for re ordering
     * @since    2.3.0
     */

    public function save_post_reorder_for_logosliderwp() {
        global $wpdb;
        $result = array(
            'type' => 'error',
            'message' => 'Action required.',
        );

        $result_json = json_encode( $result );

        if ( ! wp_verify_nonce( $_REQUEST['nonce'], "save_logosliderwp_nonce")) {
            $result['type'] = 'error';
            $result['message'] = 'WP nonce verification failed.';
        }

        try {
            parse_str( stripslashes_deep( $_POST['post_id_serialize'] ), $post_data );
            //$wpdb->queries( 'START TRANSACTION' );

            if ( ! is_array( $post_data ) || count( $post_data ) < 1 ) {
                $result['message'] = 'Available data not found.';
            } else {
                foreach ( $post_data['post'] as $menu_order => $post_id ) {
                    $wpdb->update( $wpdb->posts, array( 'menu_order' => (int)$menu_order ), array( 'ID' => (int)$post_id ) );
                }
            }

            //$wpdb->queries( 'COMMIT' );
            $result['type'] = 'success';
            $result['message'] = 'Reorder has been successful';
        } catch (Exception $exception) {
            //$wpdb->queries( 'ROLLBACK' );
            $result['message'] = $exception->getMessage();
        }

        $result_json = json_encode( $result );
        echo $result_json;
        wp_die();
    }

    /**
     * Register the stylesheets for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_styles() {

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

        wp_enqueue_style( $this->plugin_name . '-admin-icon', plugin_dir_url( __FILE__ ) . 'css/lgx-icon.css', array(), $this->version, 'all' );
        wp_enqueue_style( $this->plugin_name . '-admin-reset', plugin_dir_url( __FILE__ ) . 'css/logo-slider-wp-admin-reset.min.css', array(), $this->version, 'all' );

        $currentScreen = get_current_screen();

        if( ( $currentScreen->post_type == 'logosliderwp' ) || ( $currentScreen->post_type == 'lgx_lsp_shortcodes' ) ) {

            wp_enqueue_style( $this->plugin_name . '-alertify', plugin_dir_url( __FILE__ ) . 'css/alertify.css', array(), $this->version, 'all' );
            wp_enqueue_style( $this->plugin_name . '-admin-slider', plugin_dir_url( __FILE__ ) . 'css/logo-slider-wp-admin.min.css', array( 'wp-color-picker' ), $this->version, 'all' );

        }

    }


    /**
     * Register the JavaScript for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts() {

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


        $currentScreen = get_current_screen();
        /*   echo '<pre>';
           print_r($currentScreen);
           echo '</pre>';*/
        if( ( $currentScreen->post_type == 'logosliderwp' ) || ( $currentScreen->post_type == 'lgx_lsp_shortcodes' ) ) {

            $translation_array = array(
                //'add_leftimg_title'  => __('Add Previous Arrow Image', 'logo-slider-wp'),
                //'add_rightimg_title' => __('Add Next Arrow Image', 'logo-slider-wp'),
                'ajax_url' => admin_url('admin-ajax.php'),
                'check_nonce' => wp_create_nonce('save_logosliderwp_nonce'),
            );


            wp_register_script($this->plugin_name . '-alertify', plugin_dir_url( __FILE__ ) . 'js/alertify.min.js', array(), $this->version, true );
            wp_register_script($this->plugin_name . '-wp-color-picker-alpha' , plugin_dir_url( __FILE__ ) . 'js/wp-color-picker-alpha.js', array( 'wp-color-picker' ), $this->version, true );
            wp_register_script($this->plugin_name . '-admin', plugin_dir_url( __FILE__ ) . 'js/logo-slider-wp-admin.js', array( 'jquery', 'jquery-ui-sortable', $this->plugin_name . '-wp-color-picker-alpha', $this->plugin_name . '-alertify' ), $this->version, true );

            wp_localize_script($this->plugin_name . '-admin', 'wpnpaddon', $translation_array);

            wp_enqueue_script( $this->plugin_name . '-admin' );

            if ( ! did_action( 'wp_enqueue_media' ) ) {
                wp_enqueue_media();
            }


        }
    }


    /**
     * @param $plugin_array
     * @return mixed
     */


    public function lgx_owl_register_tinymce_plugin($plugin_array) {
        $plugin_array['lgx_logo_button'] = plugin_dir_url( __FILE__ ) . 'assets/js/logo-slider-wp-tinymce.js';
        return $plugin_array;
    }

    public function lgx_owl_add_tinymce_button($buttons) {
        $buttons[] = "lgx_logo_button";
        return $buttons;
    }



    /**
     * For checking the pro version of plugin is activated or not
     * @param        string $plugin // slug of free version
     * @param        string $network_activation // network activation
     */

    public function pro_version_activation_checking_admin_init($plugin, $network_activation) {
        $plugin_pro = 'logo-slider-wp-pro/logo-slider-wp-pro.php';
        set_transient( 'lswp_plugin_clicked', $plugin );

        if ( is_plugin_active( $plugin_pro ) ) {
            set_transient( 'lswp_pro_active', true );
        }

    }

    public function pro_version_activation_checking_notice_warning() {
        $plugin_base = LGX_LS_PLUGIN_BASE;
        $plugin_free = 'logo-slider-wp/logo-slider-wp.php';
        $plugin_pro = 'logo-slider-wp-pro/logo-slider-wp-pro.php';
        $lswp_pro_active = get_transient( 'lswp_pro_active' );
        $lswp_plugin_clicked = get_transient( 'lswp_plugin_clicked' );
        delete_transient( 'lswp_pro_active' );
        delete_transient( 'lswp_plugin_clicked' );

        if ( true == $lswp_pro_active && $lswp_plugin_clicked == $plugin_pro ) {
            deactivate_plugins( $plugin_free );
            remove_filter('plugin_action_links_' . $plugin_base, array( $this, 'add_links_admin_plugin_page_title' ) );
        } elseif ( true == $lswp_pro_active && $lswp_plugin_clicked == $plugin_free ) {
            deactivate_plugins( $plugin_free );
            remove_filter('plugin_action_links_' . $plugin_base, array( $this, 'add_links_admin_plugin_page_title' ) );

            unset( $_GET['activate'] );
            $class = 'notice notice-warning is-dismissible';
            $message = __( 'Logo Slider Pro version already activated. For more please contact our support at <a href="https://logichunt.com/support/" target="_blank">LogicHunt.com.</a>', 'logo-slider-wp' );

            printf( '<div class="%1$s"><p>%2$s</p></div>', esc_attr( $class ), $message );
        }


    }

    /*************************************************************************
     *
     *
     *
     *  Newly Added: 2021
     *
     *
     *
     *
     * **************************************************************************/


    /**
     * Register post type for shortcode Post Type
     *
     *
     */
    public function register_post_type_for_lgx_logo_slider_shortcodes() {

        $labels = array(
            'name'               => _x( 'All Logo Slider', 'Logo Showcase', 'logo-slider-wp' ),
            'singular_name'      => _x( 'Logo Slider', 'Showcase Items', 'logo-slider-wp' ),
            'menu_name'          => __( 'Shortcode Generator', 'logo-slider-wp' ),
            'view_item'          => __( 'View Items', 'logo-slider-wp' ),
            'add_new_item'       => __( 'Add New Slider', 'logo-slider-wp' ),
            'add_new'            => __( 'Add New Slider', 'logo-slider-wp' ),
            'edit_item'          => __( 'Edit Item', 'logo-slider-wp' ),
            'update_item'        => __( 'Update Item', 'logo-slider-wp' ),
            'search_items'       => __( 'Search In Item', 'logo-slider-wp' ),
            'not_found'          => __( 'No Showcase found', 'logo-slider-wp' ),
            'not_found_in_trash' => __( 'No Showcase found in trash', 'logo-slider-wp' )
        );

        $args   = array(
            'label'               => __( 'Logo Slider Shortcode', 'logo-slider-wp' ),
            'description'         => __( 'Generate Shortcode for Logo Slider', 'logo-slider-wp' ),
            'labels'              => $labels,
            'public'          => false,
            'show_ui'         => true,
            'show_in_menu'    => 'edit.php?post_type=logosliderwp',
            'hierarchical'    => false,
            'query_var'       => false,
            'supports'        => array( 'title' ),
            'capability_type' => 'post',
        );

        register_post_type( 'lgx_lsp_shortcodes', $args);
    }



    /**
     * Add meta box for custom post type
     *
     * @since    1.0.0
     */
    public function adding_meta_boxes_for_lgx_lsp_shortcodes() {
        add_meta_box(
            'lgx_lsp_shortcodes_meta_box_panel',
            __( 'Logo Slider Shortcode Meta Field Panel', 'logo-slider-wp'),
            array(
                $this,
                'meta_fields_display_for_lgx_lsp_shortcodes' //Pattern --> meta_box_panel_display_for_{post_type}
            ),
            'lgx_lsp_shortcodes',
            'normal',
            'high'
        );
    }



    /**
     * Render Meta Box under logosliderwp
     *
     * logosliderwp meta field
     *
     * @param $post
     *
     * @since 1.0
     *
     */
    public function meta_fields_display_for_lgx_lsp_shortcodes( $post ) {

        require_once plugin_dir_path( __FILE__ ) . 'partials/shortcode_meta_display/meta_fields_display_for_lgx_lsp_shortcodes.php';

    }


    /**
     * Determines whether or not the current user has the ability to save meta data associated with this post.
     *
     * Save lgx_lsp_shortcodes Meta Field
     *
     * @param        int $post_id //The ID of the post being save
     * @param         bool //Whether or not the user has the ability to save this post.
     */
    public function save_post_metadata_of_lgx_lsp_shortcodes( $post_id, $post ) {


        $post_type = 'lgx_lsp_shortcodes';

        // If this isn't a 'book' post, don't update it.
        if ( $post_type != $post->post_type ) {
            return;
        }

        if ( ! empty( $_POST['meta_lgx_lsp_shortcodes'] ) ) {

            $postData = $_POST['meta_lgx_lsp_shortcodes'];

            //echo '<pre>';  print_r($postData); echo '</pre>'; wp_die();

            $savable_Data = array();


            if ( $this->user_can_save_for_logo_slider_meta( $post_id, 'meta_lgx_lsp_shortcodes', $postData['nonce'] ) ) {

                $savable_Data['lgx_lswp_showcase_type']             = sanitize_text_field( $postData['lgx_lswp_showcase_type'] );

                // Basic Settings : ok
                $savable_Data['lgx_brand_name_en']      = (( isset($postData['lgx_brand_name_en'])) ? 'yes' : 'no');
                $savable_Data['lgx_brand_desc_en']      = (( isset($postData['lgx_brand_desc_en'])) ? 'yes' : 'no');
                $savable_Data['lgx_company_url_en']     = (( isset($postData['lgx_company_url_en'])) ? 'yes' : 'no');
                $savable_Data['lgx_preloader_en']       = (( isset($postData['lgx_preloader_en'])) ? 'yes' : 'no');
                $savable_Data['lgx_target_type']        = (( isset($postData['lgx_target_type'])) ? sanitize_text_field(  $postData['lgx_target_type']) : '_self');
                $savable_Data['lgx_nofollow_en']        = (( isset($postData['lgx_nofollow_en'])) ? 'yes' : 'no');
                $savable_Data['lgx_logo_height']        = (( isset($postData['lgx_logo_height'])) ? sanitize_text_field( $postData['lgx_logo_height']) : '100%');
                $savable_Data['lgx_logo_width']         = (( isset($postData['lgx_logo_width'])) ? sanitize_text_field( $postData['lgx_logo_width'])  : '100%');
                $savable_Data['lgx_preloader_bg_color'] = (( isset($postData['lgx_preloader_bg_color'])) ? sanitize_text_field( $postData['lgx_preloader_bg_color'])  : '#ffffff');
                $savable_Data['lgx_preloader_icon']     = (( isset($postData['lgx_preloader_icon'])) ? sanitize_text_field( $postData['lgx_preloader_icon'])  : '');
                $savable_Data['lgx_from_category']      = (( isset($postData['lgx_from_category'])) ? sanitize_text_field( $postData['lgx_from_category']) : 'all');
                $savable_Data['lgx_item_limit']         = (( isset($postData['lgx_item_limit'])) ? sanitize_text_field( $postData['lgx_item_limit']) : 0);
                $savable_Data['lgx_item_sort_order']    = (( isset($postData['lgx_item_sort_order'])) ? sanitize_text_field( $postData['lgx_item_sort_order']) : 'ASC');
                $savable_Data['lgx_item_sort_order_by'] = (( isset($postData['lgx_item_sort_order_by'])) ? sanitize_text_field( $postData['lgx_item_sort_order_by']) :'menu_order');
               


                // Responsive Settings : ok
                $savable_Data['lgx_large_desktop_item']   =  (( isset($postData['lgx_large_desktop_item'])) ? sanitize_text_field( $postData['lgx_large_desktop_item'] ): 5);;
                $savable_Data['lgx_desktop_item']         =  (( isset($postData['lgx_desktop_item'])) ? sanitize_text_field( $postData['lgx_desktop_item'] ) : 4);
                $savable_Data['lgx_tablet_item']          =  (( isset($postData['lgx_tablet_item'])) ? sanitize_text_field( $postData['lgx_tablet_item'] ) : 3);
                $savable_Data['lgx_mobile_item']          =  (( isset($postData['lgx_mobile_item'])) ? sanitize_text_field( $postData['lgx_mobile_item'] ) : 2);


                // Style Settings
                $savable_Data['lgx_item_hover_effect']           = (( isset($postData['lgx_item_hover_effect'])) ? sanitize_text_field( $postData['lgx_item_hover_effect'] ) : 'none');
                $savable_Data['lgx_item_hover_anim']            = (( isset($postData['lgx_item_hover_anim'])) ? sanitize_text_field( $postData['lgx_item_hover_anim'] ) : 'default');
                $savable_Data['lgx_item_brand_name_color']      = (( isset($postData['lgx_item_brand_name_color'])) ? sanitize_text_field( $postData['lgx_item_brand_name_color'] ) : '#111111');;
                $savable_Data['lgx_item_brand_name_font_size']  = (( isset($postData['lgx_item_brand_name_font_size'])) ? sanitize_text_field( $postData['lgx_item_brand_name_font_size'] ) : '20px');
                $savable_Data['lgx_item_brand_name_font_weight']= (( isset($postData['lgx_item_brand_name_font_weight'])) ? sanitize_text_field( $postData['lgx_item_brand_name_font_weight'] ) : '600');

                $savable_Data['lgx_item_desc_color']            = (( isset($postData['lgx_item_desc_color'])) ? sanitize_text_field( $postData['lgx_item_desc_color'] ) : '#555555');
                $savable_Data['lgx_item_desc_font_size']        = (( isset($postData['lgx_item_desc_font_size'])) ? sanitize_text_field( $postData['lgx_item_desc_font_size'] ) : '20px');
                $savable_Data['lgx_item_desc_font_weight']      = (( isset($postData['lgx_item_desc_font_weight'])) ? sanitize_text_field( $postData['lgx_item_desc_font_weight'] ) : '400');

                $savable_Data['lgx_img_border_color_en']        = ((isset($postData['lgx_img_border_color_en'])) ? 'yes' : 'no');

                $savable_Data['lgx_img_border_color']           = (( isset($postData['lgx_img_border_color'])) ? sanitize_text_field( $postData['lgx_img_border_color'] ) : '#FF5151');
                $savable_Data['lgx_img_border_color_hover']     = (( isset($postData['lgx_img_border_color_hover'])) ? sanitize_text_field( $postData['lgx_img_border_color_hover'] ) : '#FF9B6A');
                $savable_Data['lgx_img_border_width']           = (( isset($postData['lgx_img_border_width'])) ? sanitize_text_field( $postData['lgx_img_border_width'] ) : '1px');
                $savable_Data['lgx_img_border_radius']          = (( isset($postData['lgx_img_border_radius'])) ? sanitize_text_field( $postData['lgx_img_border_radius'] ) : '4px');

                $savable_Data['lgx_border_color_en']            = ((isset($postData['lgx_border_color_en'])) ? 'yes' : 'no');

                $savable_Data['lgx_item_border_color']          = (( isset($postData['lgx_item_border_color'])) ? sanitize_text_field( $postData['lgx_item_border_color'] ) : '#161E54');
                $savable_Data['lgx_item_border_color_hover']    = (( isset($postData['lgx_item_border_color_hover'])) ? sanitize_text_field( $postData['lgx_item_border_color_hover'] ) : '#161E54');
                $savable_Data['lgx_item_border_width']          = (( isset($postData['lgx_item_border_width'])) ? sanitize_text_field( $postData['lgx_item_border_width'] ) : '4px');
                $savable_Data['lgx_item_border_radius']         = (( isset($postData['lgx_item_border_radius'])) ? sanitize_text_field( $postData['lgx_item_border_radius'] ) : '100');

                $savable_Data['lgx_item_bg_color_en']           = ((isset($postData['lgx_item_bg_color_en'])) ? 'yes' : 'no');

                $savable_Data['lgx_item_bg_color']              = (( isset($postData['lgx_item_bg_color'])) ? sanitize_text_field( $postData['lgx_item_bg_color'] ) : '#f1f1f1');
                $savable_Data['lgx_item_bg_color_hover']        = (( isset($postData['lgx_item_bg_color_hover'])) ? sanitize_text_field( $postData['lgx_item_bg_color_hover'] ) : '#f1f1f1');

                $savable_Data['lgx_item_padding']               = (( isset($postData['lgx_item_padding'])) ? sanitize_text_field( $postData['lgx_item_padding'] ) : '0px');
                $savable_Data['lgx_item_margin']                =(( isset($postData['lgx_item_margin'])) ? sanitize_text_field( $postData['lgx_item_margin'] ) : '0px');

                $savable_Data['lgx_item_bottom_margin_title']                =(( isset($postData['lgx_item_bottom_margin_title'])) ? sanitize_text_field( $postData['lgx_item_bottom_margin_title'] ) : '0px');
                $savable_Data['lgx_item_bottom_margin_desc']                =(( isset($postData['lgx_item_bottom_margin_desc'])) ? sanitize_text_field( $postData['lgx_item_bottom_margin_desc'] ) : '0px');


                // Tooltip Settings : Ok
                $savable_Data['lgx_tooltip_en']                  = ((isset($postData['lgx_tooltip_en'])) ? 'yes' : 'no');
                $savable_Data['lgx_tooltip_content_type']        = (( isset($postData['lgx_tooltip_content_type'])) ? sanitize_text_field( $postData['lgx_tooltip_content_type'] ) : 'brand_name');
                $savable_Data['lgx_tooltip_position']            = (( isset($postData['lgx_tooltip_position'])) ? sanitize_text_field( $postData['lgx_tooltip_position'] ) : 'top');
                $savable_Data['lgx_tooltip_anim']                = (( isset($postData['lgx_tooltip_anim'])) ? sanitize_text_field( $postData['lgx_tooltip_anim'] ) : 'fade');
                $savable_Data['lgx_tooltip_arrow_en']            = ((isset($postData['lgx_tooltip_arrow_en'])) ? 'yes' : 'no');
                $savable_Data['lgx_tooltip_anim_duration']       = (( isset($postData['lgx_tooltip_anim_duration'])) ? sanitize_text_field( $postData['lgx_tooltip_anim_duration'] ) : 350);
                $savable_Data['lgx_tooltip_anim_delay']          = (( isset($postData['lgx_tooltip_anim_delay'])) ? sanitize_text_field( $postData['lgx_tooltip_anim_delay'] ) : 300);
                $savable_Data['lgx_tooltip_trigger_type']        = (( isset($postData['lgx_tooltip_trigger_type'])) ? sanitize_text_field( $postData['lgx_tooltip_trigger_type'] ) : 'hover');
                $savable_Data['lgx_tooltip_distance']            =(( isset($postData['lgx_tooltip_distance'])) ? sanitize_text_field( $postData['lgx_tooltip_distance'] ) : 6);;
                $savable_Data['lgx_tooltip_min_intersection']    = (( isset($postData['lgx_tooltip_min_intersection'])) ? sanitize_text_field( $postData['lgx_tooltip_min_intersection'] ) : 16);
                $savable_Data['lgx_tooltip_timer']               = (( isset($postData['lgx_tooltip_timer'])) ? sanitize_text_field( $postData['lgx_tooltip_timer'] ) : 0);
                $savable_Data['lgx_tooltip_padding']              = (( isset($postData['lgx_tooltip_padding'])) ? sanitize_text_field( $postData['lgx_tooltip_padding'] ) : '8px');
                $savable_Data['lgx_tooltip_text_color']          = (( isset($postData['lgx_tooltip_text_color'])) ? sanitize_text_field( $postData['lgx_tooltip_text_color'] ) : '#ffffff');
                $savable_Data['lgx_tooltip_bg_color']            = (( isset($postData['lgx_tooltip_bg_color'])) ? sanitize_text_field( $postData['lgx_tooltip_bg_color'] ) : '#d3d3d3');
                $savable_Data['lgx_tooltip_border_color']        = (( isset($postData['lgx_tooltip_border_color'])) ? sanitize_text_field( $postData['lgx_tooltip_border_color'] ) : '#333333');
                $savable_Data['lgx_tooltip_border_radius']       = (( isset($postData['lgx_tooltip_border_radius'])) ? sanitize_text_field( $postData['lgx_tooltip_border_radius'] ) : '4px');
                $savable_Data['lgx_tooltip_border_width']       = (( isset($postData['lgx_tooltip_border_width'])) ? sanitize_text_field( $postData['lgx_tooltip_border_width'] ) : '2px');
                $savable_Data['lgx_tooltip_arrow_bg_color']      = (( isset($postData['lgx_tooltip_arrow_bg_color'])) ? sanitize_text_field( $postData['lgx_tooltip_arrow_bg_color'] ) : '#555555');
                $savable_Data['lgx_tooltip_arrow_border_color']  = (( isset($postData['lgx_tooltip_arrow_border_color'])) ? sanitize_text_field( $postData['lgx_tooltip_arrow_border_color'] ) : '#333333');



                //Section Settings  : ok
                $savable_Data['lgx_section_bg_img_en']          = ((isset($postData['lgx_section_bg_img_en'])) ? 'yes' : 'no');
                $savable_Data['lgx_section_bg_color_en']        = ((isset($postData['lgx_section_bg_color_en'])) ? 'yes' : 'no');
                $savable_Data['lgx_section_width']              = (( isset($postData['lgx_section_width'])) ? sanitize_text_field( $postData['lgx_section_width'] ) : '100%');
                $savable_Data['lgx_section_container']          = (( isset($postData['lgx_section_container'])) ? sanitize_text_field( $postData['lgx_section_container'] ) : 'container-fluid');
                $savable_Data['lgx_section_bg_img']             = (( isset($postData['lgx_section_bg_img'])) ? sanitize_text_field( $postData['lgx_section_bg_img'] ) : '');
                $savable_Data['lgx_section_bg_img_attachment']  = (( isset($postData['lgx_section_bg_img_attachment'])) ? sanitize_text_field( $postData['lgx_section_bg_img_attachment'] ) : 'initial');
                $savable_Data['lgx_section_bg_img_size']        = (( isset($postData['lgx_section_bg_img_size'])) ? sanitize_text_field( $postData['lgx_section_bg_img_size'] ) : 'cover');
                $savable_Data['lgx_section_bg_color']           = (( isset($postData['lgx_section_bg_color'])) ? sanitize_text_field( $postData['lgx_section_bg_color'] ) : '#b56969');
                $savable_Data['lgx_section_top_margin']         = (( isset($postData['lgx_section_top_margin'])) ? sanitize_text_field( $postData['lgx_section_top_margin'] ) : '0px');
                $savable_Data['lgx_section_bottom_margin']      = (( isset($postData['lgx_section_bottom_margin'])) ? sanitize_text_field( $postData['lgx_section_bottom_margin'] ) : '0px');
                $savable_Data['lgx_section_top_padding']        = (( isset($postData['lgx_section_top_padding'])) ? sanitize_text_field( $postData['lgx_section_top_padding'] ) : '0px');
                $savable_Data['lgx_section_bottom_padding']     = (( isset($postData['lgx_section_bottom_padding'])) ? sanitize_text_field( $postData['lgx_section_bottom_padding'] ) : '0px');


                //Header Settings : Ok
                $savable_Data['lgx_header_en']                             = ((isset($postData['lgx_header_en'])) ? 'yes' : 'no');
                $savable_Data['lgx_header_align']                         = (( isset($postData['lgx_header_align'])) ? sanitize_text_field( $postData['lgx_header_align'] ): 'center');
                $savable_Data['lgx_header_title']                         = (( isset($postData['lgx_header_title'])) ? sanitize_text_field( $postData['lgx_header_title'] ): '');
                $savable_Data['lgx_header_title_font_size']               = (( isset($postData['lgx_header_title_font_size'])) ? sanitize_text_field( $postData['lgx_header_title_font_size'] ): '36px');
                $savable_Data['lgx_header_title_color']                   = (( isset($postData['lgx_header_title_color'])) ? sanitize_text_field( $postData['lgx_header_title_color'] ): '#010101');
                $savable_Data['lgx_header_title_font_weight']             = (( isset($postData['lgx_header_title_font_weight'])) ? sanitize_text_field( $postData['lgx_header_title_font_weight'] ): 700);
                $savable_Data['lgx_header_title_bottom_margin']           = (( isset($postData['lgx_header_title_bottom_margin'])) ? sanitize_text_field( $postData['lgx_header_title_bottom_margin'] ): '10px');
                $savable_Data['lgx_header_subtitle']                      = (( isset($postData['lgx_header_subtitle'])) ? sanitize_text_field( $postData['lgx_header_subtitle'] ): '');
                $savable_Data['lgx_header_subtitle_font_size']            = (( isset($postData['lgx_header_subtitle_font_size'])) ? sanitize_text_field( $postData['lgx_header_subtitle_font_size'] ): '16px');
                $savable_Data['lgx_header_subtitle_color']                = (( isset($postData['lgx_header_subtitle_color'])) ? sanitize_text_field( $postData['lgx_header_subtitle_color'] ): '#888888');
                $savable_Data['lgx_header_subtitle_font_weight']          = (( isset($postData['lgx_header_subtitle_font_weight'])) ? sanitize_text_field( $postData['lgx_header_subtitle_font_weight'] ): '400');
                $savable_Data['lgx_header_subtitle_bottom_margin']        = (( isset($postData['lgx_header_subtitle_bottom_margin'])) ? sanitize_text_field( $postData['lgx_header_subtitle_bottom_margin'] ): '10px');


                //Grid : OK
                $savable_Data['lgx_grid_column_gap']    = (( isset($postData['lgx_grid_column_gap'])) ? sanitize_text_field( $postData['lgx_grid_column_gap'] ) : '15px');
                $savable_Data['lgx_grid_row_gap']       = (( isset($postData['lgx_grid_row_gap'])) ? sanitize_text_field( $postData['lgx_grid_row_gap'] ) : '15px');
                $savable_Data['lgx_grid_item_min_height']       = (( isset($postData['lgx_grid_item_min_height'])) ? sanitize_text_field( $postData['lgx_grid_item_min_height'] ) : 0);
                $savable_Data['lgx_grid_image_vertical_align']  = (( isset($postData['lgx_grid_image_vertical_align'])) ? sanitize_text_field( $postData['lgx_grid_image_vertical_align'] ) : 'start');

                //Grid Masonry

                //Carousel Control Settings :ok
                $savable_Data['lgx_carousel_ticker_en']              = ((isset($postData['lgx_carousel_ticker_en'])) ? 'yes' : 'no');
                $savable_Data['lgx_carousel_transition_effect']      = (( isset($postData['lgx_carousel_transition_effect'])) ? sanitize_text_field( $postData['lgx_carousel_transition_effect'] ): 'all');
                $savable_Data['lgx_carousel_infinite_en']            = ((isset($postData['lgx_carousel_infinite_en'])) ? 'yes' : 'no');

                $savable_Data['lgx_carousel_transition_speed']       = (( isset($postData['lgx_carousel_transition_speed'])) ? sanitize_text_field( $postData['lgx_carousel_transition_speed'] ): 450);
                $savable_Data['lgx_carousel_autoplay_en']            = ((isset($postData['lgx_carousel_autoplay_en'])) ? 'yes' : 'no');
                $savable_Data['lgx_carousel_autoplay_delay']         = (( isset($postData['lgx_carousel_autoplay_delay'])) ? sanitize_text_field( $postData['lgx_carousel_autoplay_delay'] ): 1500);
                $savable_Data['lgx_carousel_pause_mouse_enter_en']   = ((isset($postData['lgx_carousel_pause_mouse_enter_en'])) ? 'yes' : 'no');
                $savable_Data['lgx_carousel_space_between']          = (( isset($postData['lgx_carousel_space_between'])) ? sanitize_text_field( $postData['lgx_carousel_space_between'] ): 10);
                $savable_Data['lgx_carousel_rtl_en']                 = ((isset($postData['lgx_carousel_rtl_en'])) ? 'yes' : 'no');

                $savable_Data['lgx_carousel_nav_en']                = ((isset($postData['lgx_carousel_nav_en'])) ? 'yes' : 'no');
                $savable_Data['lgx_carousel_nav_border_en']         = ((isset($postData['lgx_carousel_nav_border_en'])) ? 'yes' : 'no');
                $savable_Data['lgx_carousel_nav_hover_en']          = ((isset($postData['lgx_carousel_nav_hover_en'])) ? 'yes' : 'no');

                $savable_Data['lgx_carousel_nav_position']          = (( isset($postData['lgx_carousel_nav_position'])) ? sanitize_text_field( $postData['lgx_carousel_nav_position'] ): 'top_right');
                $savable_Data['lgx_carousel_nav_color']             = (( isset($postData['lgx_carousel_nav_color'])) ? sanitize_text_field( $postData['lgx_carousel_nav_color'] ): '#ffffff');
                $savable_Data['lgx_carousel_nav_color_hover']       = (( isset($postData['lgx_carousel_nav_color_hover'])) ? sanitize_text_field( $postData['lgx_carousel_nav_color_hover'] ): '#ffffff');
                $savable_Data['lgx_carousel_nav_bg_color']          = (( isset($postData['lgx_carousel_nav_bg_color'])) ? sanitize_text_field( $postData['lgx_carousel_nav_bg_color'] ): '#222b30');
                $savable_Data['lgx_carousel_nav_bg_color_hover']    = (( isset($postData['lgx_carousel_nav_bg_color_hover'])) ? sanitize_text_field( $postData['lgx_carousel_nav_bg_color_hover'] ): '#222b30');

                $savable_Data['lgx_carousel_nav_border_color']          = (( isset($postData['lgx_carousel_nav_border_color'])) ? sanitize_text_field( $postData['lgx_carousel_nav_border_color'] ): '#161E54');
                $savable_Data['lgx_carousel_nav_border_color_hover']    = (( isset($postData['lgx_carousel_nav_border_color_hover'])) ? sanitize_text_field( $postData['lgx_carousel_nav_border_color_hover'] ): '#88E0EF');
                $savable_Data['lgx_carousel_nav_border_width']          = (( isset($postData['lgx_carousel_nav_border_width'])) ? sanitize_text_field( $postData['lgx_carousel_nav_border_width'] ): '1px');
                $savable_Data['lgx_carousel_nav_border_radius']         = (( isset($postData['lgx_carousel_nav_border_radius'])) ? sanitize_text_field( $postData['lgx_carousel_nav_border_radius'] ): '4px');
                $savable_Data['lgx_carousel_nav_border_style']          = (( isset($postData['lgx_carousel_nav_border_style'])) ? sanitize_text_field( $postData['lgx_carousel_nav_border_style'] ): 'solid');

                $savable_Data['lgx_carousel_pagination_en']           = ((isset($postData['lgx_carousel_pagination_en'])) ? 'yes' : 'no');
                $savable_Data['lgx_carousel_pagination_color']        = (( isset($postData['lgx_carousel_pagination_color'])) ? sanitize_text_field( $postData['lgx_carousel_pagination_color'] ): '#869791');
                $savable_Data['lgx_carousel_pagination_color_active'] = (( isset($postData['lgx_carousel_pagination_color_active'])) ? sanitize_text_field( $postData['lgx_carousel_pagination_color_active'] ): '#222b30');

                $savable_Data['lgx_carousel_auto_height_en']          = ((isset($postData['lgx_carousel_auto_height_en'])) ? 'yes' : 'no');
                $savable_Data['lgx_carousel_allow_touch_move_en']     = ((isset($postData['lgx_carousel_allow_touch_move_en'])) ? 'yes' : 'no');
                $savable_Data['lgx_carousel_mouse_wheel_en']          = ((isset($postData['lgx_carousel_mouse_wheel_en'])) ? 'yes' : 'no');
                $savable_Data['lgx_carousel_simulate_touch_en']       = ((isset($postData['lgx_carousel_simulate_touch_en'])) ? 'yes' : 'no');
                $savable_Data['lgx_carousel_grab_cursor_en']         = ((isset($postData['lgx_carousel_grab_cursor_en'])) ? 'yes' : 'no');

                $savable_Data['lgx_carousel_dynamic_bullets_en']       = ((isset($postData['lgx_carousel_dynamic_bullets_en'])) ? 'yes' : 'no');
                $savable_Data['lgx_carousel_dynamic_bullets_no']       = (( isset($postData['lgx_carousel_dynamic_bullets_no'])) ? sanitize_text_field( $postData['lgx_carousel_dynamic_bullets_no'] ): 1);

                $savable_Data['lgx_carousel_nav_btn_type']            = (( isset($postData['lgx_carousel_nav_btn_type'])) ? sanitize_text_field( $postData['lgx_carousel_nav_btn_type'] ): 'icon');
                $savable_Data['lgx_carousel_nav_btn_text_prev']       = (( isset($postData['lgx_carousel_nav_btn_text_next'])) ? sanitize_text_field( $postData['lgx_carousel_nav_btn_text_prev'] ): 'Prev');
                $savable_Data['lgx_carousel_nav_btn_text_next']       = (( isset($postData['lgx_carousel_nav_btn_text_next'])) ? sanitize_text_field( $postData['lgx_carousel_nav_btn_text_next'] ): 'Next');

                $savable_Data['lgx_carousel_nav_btn_padding']        = (( isset($postData['lgx_carousel_nav_btn_padding'])) ? sanitize_text_field( $postData['lgx_carousel_nav_btn_padding'] ): '0px');
                $savable_Data['lgx_carousel_nav_btn_font_size']      = (( isset($postData['lgx_carousel_nav_btn_font_size'])) ? sanitize_text_field( $postData['lgx_carousel_nav_btn_font_size'] ): '22px');
               // $savable_Data['lgx_carousel_nav_btn_line_height']    = (( isset($postData['lgx_carousel_nav_btn_line_height'])) ? sanitize_text_field( $postData['lgx_carousel_nav_btn_line_height'] ): '24px');
                $savable_Data['lgx_carousel_nav_btn_width']          = (( isset($postData['lgx_carousel_nav_btn_width'])) ? sanitize_text_field( $postData['lgx_carousel_nav_btn_width'] ): '30px');
                $savable_Data['lgx_carousel_nav_btn_height']         = (( isset($postData['lgx_carousel_nav_btn_height'])) ? sanitize_text_field( $postData['lgx_carousel_nav_btn_height'] ): '30px');
                $savable_Data['lgx_carousel_item_vertical_align']    = (( isset($postData['lgx_carousel_item_vertical_align'])) ? sanitize_text_field( $postData['lgx_carousel_item_vertical_align'] ): 'top');
                $savable_Data['lgx_carousel_nav_icon']               = (( isset($postData['lgx_carousel_nav_icon'])) ? sanitize_text_field( $postData['lgx_carousel_nav_icon'] ): 'angle');
                $savable_Data['lgx_carousel_lazy_load_en']           = ((isset($postData['lgx_carousel_lazy_load_en'])) ? 'yes' : 'no');
                $savable_Data['lgx_carousel_lazy_spinner_color']     = (( isset($postData['lgx_carousel_lazy_spinner_color'])) ? sanitize_text_field( $postData['lgx_carousel_lazy_spinner_color'] ): 'white');
                $savable_Data['lgx_carousel_pagi_mobile_en']         = ((isset($postData['lgx_carousel_pagi_mobile_en'])) ? 'yes' : 'no');
                $savable_Data['lgx_carousel_nav_mobile_en']          = ((isset($postData['lgx_carousel_nav_mobile_en'])) ? 'yes' : 'no');


                // echo '<pre>';  print_r($savable_Data); echo '</pre>'; wp_die();
                update_post_meta( $post_id, '_lgx_lsp_shortcodes_meta', $savable_Data );
            }
        }
    }// End  Meta Save


    /**
     * @param array $classes
     * @return array|mixed
     */


    public function add_meta_box_css_class_for_lgx_lsp_shortcodes($classes = array()) {

        $add_classes = array( 'lgx_logo_slider_meta_box_postbox', 'lgx_logo_slider_meta_box_postbox_free' );

        foreach ( $add_classes as $class ) {
            if ( ! in_array( $class, $classes ) ) {
                $classes[] = sanitize_html_class( $class );
            }
        }

        return $classes;
    }



    public function add_new_column_head_for_lgx_logo_showcase($default_columns) {
        unset( $default_columns['date'] );

        $default_columns['title']            = __( 'Title', 'lgx-logo-showcase-wp' );
        $default_columns['shortcode']        = __( 'Shortcode', 'lgx-logo-showcase-wp' );
        //   $default_columns['php_shortcode']    = __( 'Theme or Plugin Code', 'lgx-logo-showcase-wp' );
        $default_columns['date']             = __( 'Date', 'lgx-logo-showcase-wp' );

        return $default_columns;
    }

    public function define_admin_column_value_for_lgx_logo_showcase($column, $post_id) {
        if(!empty($post_id)) {
            switch ($column) {
                case 'shortcode':
                    echo '<input type="text" class="lgx_logo_slider_list_copy_input"  readonly="readonly" value="[lgxlogoslider id=&quot;' . $post_id . '&quot;]">';
                    // echo '<div>Click on shortcode to copy</div>';
                    break;

                case 'php_shortcode':
                    echo '<input type="text" class="lgx_logo_slider_list_copy_input" style="width: 360px; text-align: center;" readonly="readonly" value="<?php echo do_shortcode( \'[lgxlogoslider id=&quot;' . $post_id . '&quot;]\' ); ?>">';
                    // echo '<div>Click on theme or plugin code to copy</div>';
                    break;

                default:
                    break;
            }
        }
    }



}






