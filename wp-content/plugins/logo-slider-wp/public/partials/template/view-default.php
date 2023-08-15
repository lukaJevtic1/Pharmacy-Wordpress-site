<div id="lgx_logo_slider_app_<?php echo $lgx_app_id;?>" class="lgx_logo_slider_app">

    <?php  echo(('yes'==$lgx_shortcodes_meta['lgx_preloader_en']) ? '<div id="lgx_lsw_preloader_'.$lgx_app_id.'"" class="lgx_lsw_preloader"> <img src="'.((!empty($lgx_shortcodes_meta['lgx_preloader_icon'])) ? $lgx_shortcodes_meta['lgx_preloader_icon']: $lgx_lsw_loading_icon).'" /></div>' : ''); ?>

    <div class="lgx_logo_slider lgx_logo_slider_free">
        <div class="lgx_app_inner lgx_app_layout_<?php echo $lgx_showcase_type;?>">
            <div class="lgx_app_<?php echo $lgx_shortcodes_meta['lgx_section_container'];?>">

                <?php (($lgx_shortcodes_meta['lgx_header_en']=='yes') ? include '_header.php' : ''); ?>

                <div id="lgx_app_content_wrap_<?php echo $lgx_app_id. rand ( 100, 999 );?>" class="lgx_app_content_wrapper  <?php echo (('carousel' == $lgx_showcase_type) ? 'swiper lgx_logo_carousel' : '');?>"  <?php echo (('carousel' == $lgx_showcase_type) ? $carouselDataAttr_str : '');?>  <?php echo (('yes' == $carousel_rtl_en) ? 'dir="rtl"' : '');?> >

                    <?php echo ((('top_center' == $lgx_shortcodes_meta['lgx_carousel_nav_position']) || ('top_left' == $lgx_shortcodes_meta['lgx_carousel_nav_position']) || ('top_right' == $lgx_shortcodes_meta['lgx_carousel_nav_position'])) ? $carousel_navigation : '');?>

                    <div class="lgx_app_item_row  <?php echo (('yes' == $lgx_carousel_ticker_en) ? 'lgx_swiper_wrapper_ticker' : '');?> <?php echo (('carousel' == $lgx_showcase_type) ? 'swiper-wrapper' : '');?> <?php echo ((('mid' == $lgx_shortcodes_meta['lgx_carousel_item_vertical_align']) && ('carousel' == $lgx_showcase_type) ) ? 'lgx_s_w_vertical_mid' : '');?>" <?php echo (('yes' == $lgx_tooltip_en) ? $tooltipDataAttr_str : '');?> >
                        <?php

                       // wp_die(LGX_LS_WP_PLUGIN);

                        //$lgx_logo_order      =  ( isset($lgx_item_sort_order) ? $lgx_item_sort_order : 'ASC');
                        //$lgx_logo_order_by    = 'title';
                        $lgx_logo_limit      = ((($lgx_shortcodes_meta['lgx_item_limit']  <= 0) ) ? -1 : $lgx_shortcodes_meta['lgx_item_limit']);
                        if(LGX_LS_WP_PLUGIN != 'logo-slider-wp-pro'){
                            if(($lgx_logo_limit == -1) || ($lgx_logo_limit >= 20 )  ){
                                $lgx_logo_limit = 20;
                            }
                        }
                        $lgx_from_category   = $lgx_shortcodes_meta['lgx_from_category'];

                        $lgx_logo_slider_args = array(
                            'post_type'         => array( 'logosliderwp' ),
                            'post_status'       => array( 'publish' ),
                            'order'             => $lgx_item_sort_order,
                            'orderby'           => $lgx_item_sort_order_by,
                            'posts_per_page'    => $lgx_logo_limit
                        );


                        // Category to Array Convert
                        if( !empty($lgx_from_category) && $lgx_from_category != '' && $lgx_from_category != 'all'  ){
                            $lgx_from_category = trim($lgx_from_category);
                            $lgx_from_category_arr   = explode(',', $lgx_from_category);

                            if(is_array($lgx_from_category_arr) && sizeof($lgx_from_category_arr) > 0){
                                $lgx_logo_slider_args['tax_query'] = array(
                                    array(
                                        'taxonomy' => 'logosliderwpcat',
                                        //  'field'    => 'slug',
                                        'field'    => 'id',
                                        'terms'    => $lgx_from_category_arr
                                    )
                                );
                            }
                        }

                        // The  Query
                        $lgx_logo_slider_loop = new WP_Query( $lgx_logo_slider_args );

                        if ( $lgx_logo_slider_loop->have_posts() ){
                            while ( $lgx_logo_slider_loop->have_posts() ) : $lgx_logo_slider_loop->the_post();


                                // Add Item
                                include('_item.php');


                            endwhile;
                            wp_reset_postdata();// Restore original Post Data
                        } // Check post exist
                        else{
                            _e('There are no logo item. Please add some logo Item', 'logo-slider-wp');
                        }
                        ?>
                    </div> <!--//.APP CONTENT INNER END-->

                    <?php echo $carousel_pagination?>

                    <?php  echo ((('vertical_center' == $lgx_shortcodes_meta['lgx_carousel_nav_position']) || ('bottom_center' == $lgx_shortcodes_meta['lgx_carousel_nav_position']) || ('bottom_left' == $lgx_shortcodes_meta['lgx_carousel_nav_position']) || ('bottom_right' == $lgx_shortcodes_meta['lgx_carousel_nav_position'])) ? $carousel_navigation : '');?>

                </div> <!-- //.CONTENT WRAP END-->

            </div><!--//.APP CONTAINER END-->
        </div> <!--//.INNER END-->
    </div> <!-- APP CONTAINER END -->

</div> <!--//.APP END-->