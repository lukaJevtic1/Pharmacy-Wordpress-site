<?php
/**
 * Provide a dashboard view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       http://logichunt.com
 * @since      1.0.0
 *
 * @package    logosliderwpcarousel
 * @subpackage logosliderwpcarousel/admin/partials
 */
if (!defined('WPINC')) {
    die;
}
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<div class="wrap">
    <div id="icon-options-general" class="icon32"></div>
    <h2><?php _e('Logo Slider WP: Usage & Help', 'logoslider-domain'); ?></h2>

    <div id="poststuff">

        <div id="post-body" class="metabox-holder columns-2">




            <!-- main content -->
            <div id="post-body-content">
                <div class="meta-box-sortables ui-sortable">
                    <?php

                    /*
                     * Add Header File
                     */
                    include_once plugin_dir_path( __FILE__ ) . '/shortcode_meta_display/__meta_fields_lsp_shortcodes_header.php';

                    ?>
                    <div class="postbox">
                        <div class="inside lgx-settings-inside">

                            <h3 class="clear"><?php _e('Quick Usage Guidelines', 'logo-slider-wp'); ?></h3>
                            <h4 style="margin: 25px 0 15px 0;">Thanks for downloading and activating the plugin. It's extremely easy to configure and use. Just follow the below steps: </h4>
                            <ol>
                                <li><?php _e('At first, go to the "Add New Logo" to add brand logos.', 'logo-slider-wp'); ?></li>
                                <li><?php _e('Add company name, URL, band image, description, and tooltip text.', 'logo-slider-wp'); ?></li>
                                <li><?php _e('If you need to filter logo items or want to display multiple showcases, please add categories and assign logo items to your desired category according to your demand.', 'logo-slider-wp'); ?></li>
                                <li><?php _e('Now go to "Shortcode Generator" to prepare your desired logo showcase.', 'logo-slider-wp'); ?></li>
                                <li><?php _e('Select carousel or grid layout and configure your shortcode according to your demand.', 'logo-slider-wp'); ?></li>
                                <li><?php _e('Please read the option description/ instruction carefully from the bottom of each option. ', 'logo-slider-wp'); ?></li>
                                <li><?php _e('Now use the shortcode on any post, page, widget, or theme to display the Logo Slider WP. ', 'logo-slider-wp'); ?></li>
                            </ol>
                            <ul>
                                <li> <strong>*Note: Sort the logo item order easily by premium drag and drop feature.</strong></li>
                                <li> <strong>*Note: Please try to use the brand logo with the same dimension ( height and width ).</strong></li>
                            </ul>
                    
                            <p style="margin-top:25px;">Read the details user manual from here: <a class="button button-primary" href="http://logichunt.net/docs/wordpress-logo-slider/" target="_blank">Documentation</a></p>

                            <br />
                            <br />
                            <hr>
                            <div style="margin-left: -5%;">
                                <?php

                                /*
                                 * Add Get Pro blocks
                                 */
                                include_once plugin_dir_path( __FILE__ ) . '/shortcode_meta_display/__meta_fields_lsp_shortcodes_get_pro.php';

                                ?>
                            </div>
                            <hr>
                            <br />
                        </div> <!-- .inside -->
                    </div> <!-- .postbox -->
                </div> <!-- .meta-box-sortables .ui-sortable -->
            </div> <!-- post-body-content -->
            <?php
            include('sidebar.php');
            ?>

        </div> <!-- #post-body .metabox-holder .columns-2 -->

        <br class="clear">
    </div> <!-- #poststuff -->

</div> <!-- .wrap -->