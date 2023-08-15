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

//print_r($post->ID);

wp_nonce_field( 'meta_lgx_lsp_shortcodes', 'meta_lgx_lsp_shortcodes[nonce]' );


if ( ! isset( $post->ID) ) {
    return;
}

$lgx_lsp_shortcodes_meta_data = get_post_meta( $post->ID, '_lgx_lsp_shortcodes_meta', true );

$lgx_meta_showcase_type = (isset($lgx_lsp_shortcodes_meta_data['lgx_lswp_showcase_type'] ) ? $lgx_lsp_shortcodes_meta_data['lgx_lswp_showcase_type'] : 'carousel') ;


?>

<div class="lgx_logo_slider_post_type_container ">
    <div class="lgx_logo_slider_card">

        <?php

        /*
         * Add Header File
         */
        include_once plugin_dir_path( __FILE__ ) . '/__meta_fields_lsp_shortcodes_header.php';

        ?>

        <div class="lgx_logo_slider_card_body">

            <?php

            /*
             * Add Shortcode usage information
             */
            include plugin_dir_path( __FILE__ ) . '/__meta_fields_lsp_shortcodes_help_block.php';

            ?>
            <div class="lgx_row">

                <div class="lgx_col_12">
                    <div class="lgx_logo_slider_info_box lgx_logo_slider_info_box_lead " style="padding: 0; margin-bottom: -9px;">
                        <div class="lgx_logo_slider_settings_box" >
                            <table class="form-table">
                                <tbody>
                                <tr>
                                    <th scope="row">
                                        <label for="showcase_type">Select Showcase Type</label>
                                    </th>
                                    <td>
                                        <select name="meta_lgx_lsp_shortcodes[lgx_lswp_showcase_type]" id="lgx_lswp_showcase_type" class="lgx_logo_slider_showcase_type" style="width: 100%">
                                            <option data-logo-slider-layout="carousel" value="carousel" <?php echo ( $lgx_meta_showcase_type == 'carousel' ) ? 'selected="selected"' : '' ?>>Carousel</option>
                                            <option data-logo-slider-layout="grid" value="grid" <?php echo ( $lgx_meta_showcase_type == 'grid' ) ? 'selected="selected"' : '' ?>>Grid</option>
                                        </select>
                                    </td>
                                    <td>

                                        <?php

                                        /*
                                         * Add Get Pro blocks
                                         */
                                        include_once plugin_dir_path( __FILE__ ) . '/__meta_fields_lsp_shortcodes_get_pro.php';

                                        ?>

                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div><!-- ./lgx_logo_slider_settings_box -->
                    </div><!-- ./lgx_logo_slider_info_box -->
                </div><!-- ./lgx_col_12 -->

            </div><!-- ./lgx_row -->


            <div class="lgx_row">

                <div class="lgx_col_12">
                    <div class="lgx_logo_slider_info_box">
                        <div class="lgx_logo_slider_settings_box">

                            <div class="lgx_logo_slider_tab_box_container">
                                <div class="lgx_logo_slider_nav_tab_wrapper">
                                    <a class="lgx_logo_slider_nav_tab lgx_active" data-active-tab="lgx_tab_basic"><i class="dashicons dashicons-info-outline"></i> Basic</a>

                                    <a class="lgx_logo_slider_nav_tab lgx_logo_slider_layout" data-active-tab="lgx_tab_layout" style="width: 100px;">
                                        <?php echo  ( ( $lgx_meta_showcase_type == 'carousel' ) ? '<i class="dashicons dashicons-images-alt2"></i> Carousel' : '' ) ;?>
                                        <?php echo  ( ( $lgx_meta_showcase_type == 'grid' ) ? '<i class="dashicons dashicons-grid-view"></i>  Grid' : '' ) ;?>
                                    </a>
                                    <a class="lgx_logo_slider_nav_tab" data-active-tab="lgx_tab_style"><i class="dashicons dashicons-admin-appearance"></i> Styling</a>
                                    <a class="lgx_logo_slider_nav_tab" data-active-tab="lgx_tab_responsive"><i class="dashicons dashicons-smartphone"></i> Responsive</a>
                                    <a class="lgx_logo_slider_nav_tab" data-active-tab="lgx_tab_section"><i class="dashicons dashicons-editor-insertmore"></i> Section</a>
                                    <a class="lgx_logo_slider_nav_tab" data-active-tab="lgx_tab_tooltip"><i class="dashicons dashicons-admin-comments"></i> Tooltip</a>
                                    <a class="lgx_logo_slider_nav_tab" data-active-tab="lgx_tab_header"><i class="dashicons dashicons-archive"></i> Header</a>

                                </div><!-- ./lgx_logo_slider_nav_tab_wrapper -->

                                <div class="lgx_logo_slider_tab_content_wrapper">

                                    <div class="lgx_logo_slider_tab_content lgx_active" data-tab-id="lgx_tab_basic">
                                        <table class="form-table  lgx_form_table">
                                            <tbody>
                                            <?php require_once plugin_dir_path( __FILE__ ) . '/_meta_tab_basic.php';?> </tbody>
                                        </table>
                                    </div><!-- ./tab_content -->

                                    <div class="lgx_logo_slider_tab_content" data-tab-id="lgx_tab_layout">

                                        <div class="lgx_logo_slider_tab_inner lgx_logo_slider_tab_inner_layout_carousel" <?php echo  ( ( $lgx_meta_showcase_type == 'carousel' ) ? 'style="display: block"' : '' ) ;?> >
                                            <table class="form-table  lgx_form_table">
                                                <tbody><?php  require_once plugin_dir_path( __FILE__ ) . '/_meta_tab_carousel.php' ?></tbody>
                                            </table>
                                        </div> <!--//.CAROUSEL  -->

                                        <div class="lgx_logo_slider_tab_inner lgx_logo_slider_tab_inner_layout_grid" <?php echo  ( ( $lgx_meta_showcase_type == 'grid' ) ? 'style="display: block"' : '' ) ;?> >
                                            <table class="form-table  lgx_form_table">
                                                <tbody><?php require_once plugin_dir_path( __FILE__ ) . '/_meta_tab_grid.php' ?></tbody>
                                            </table>

                                        </div><!--//.GRID  -->


                                    </div><!-- .//tab_content: Dynamic -->



                                    <div class="lgx_logo_slider_tab_content" data-tab-id="lgx_tab_style">
                                        <table class="form-table  lgx_form_table">
                                            <tbody> <?php require_once plugin_dir_path( __FILE__ ) . '/_meta_tab_style.php'; ?></tbody>
                                        </table>
                                    </div><!-- .//tab_content -->


                                    <div class="lgx_logo_slider_tab_content" data-tab-id="lgx_tab_responsive">
                                        <table class="form-table  lgx_form_table">
                                            <tbody>
                                            <?php

                                            /*
                                             * Add Responsive Settings
                                             */
                                            require_once plugin_dir_path( __FILE__ ) . '/_meta_tab_responsive.php';
                                            ?>
                                            </tbody>
                                        </table>
                                    </div><!-- ./lgx_logo_slider_tab_content -->


                                    <div class="lgx_logo_slider_tab_content" data-tab-id="lgx_tab_tooltip">
                                        <table class="form-table  lgx_form_table">
                                            <tbody> <?php require_once plugin_dir_path( __FILE__ ) . '/_meta_tab_tooltip.php'; ?> </tbody>
                                        </table>
                                    </div><!-- .//tab_content -->

                                    <div class="lgx_logo_slider_tab_content" data-tab-id="lgx_tab_section">
                                        <table class="form-table  lgx_form_table">
                                            <tbody> <?php require_once plugin_dir_path( __FILE__ ) . '/_meta_tab_section.php';?> </tbody>
                                        </table>
                                    </div><!-- .//tab_content -->

                                    <div class="lgx_logo_slider_tab_content" data-tab-id="lgx_tab_header">
                                        <table class="form-table  lgx_form_table">
                                            <tbody> <?php  require_once plugin_dir_path( __FILE__ ) . '/_meta_tab_header.php'; ?> </tbody>
                                        </table>
                                    </div><!-- .//tab_content -->


                                </div><!-- ./lgx_logo_slider_tab_content_wrapper -->
                            </div><!-- ./lgx_logo_slider_tab_box_container -->
                        </div><!-- ./lgx_logo_slider_settings_box -->
                    </div><!-- ./lgx_logo_slider_info_box -->
                </div><!-- ./lgx_col_12 -->

            </div><!-- ./lgx_row -->


            <?php

            /*
             * Add Shortcode usage information
             */
          //  include plugin_dir_path( __FILE__ ) . '/__meta_fields_lsp_shortcodes_help_block.php';

            ?>
        </div><!--//.lgx_logo_slider_card_body-->

    </div><!--// lgx_logo_slider_card-->
</div><!--// lgx_logo_slider_post_type_container-->

