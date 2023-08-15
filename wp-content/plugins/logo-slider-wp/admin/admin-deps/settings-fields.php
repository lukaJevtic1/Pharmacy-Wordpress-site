<?php
if (!defined('WPINC')) {
    die;
}


$settings_fields = array(

    'logosliderwp_basic' => array(


        array(
            'name'     => 'logosliderwp_settings_show_company',
            'label'         => __('Show Brand Name', 'logo-slider-wp'),
            'type'          => 'radio',
            'required'      => false,
            'default'  => 'no',
            'options' => array(
                'yes' => __('Yes','logo-slider-wp'),
                'no' => __('No','logo-slider-wp')
            )
        ),


        array(
            'name'     => 'logosliderwp_settings_show_company_desc',
            'label'         => __('Show Brand Description', 'logo-slider-wp'),
            'type'          => 'radio',
            'required'      => false,
            'default'  => 'no',
            'options' => array(
                'yes' => __('Yes','logo-slider-wp'),
                'no' => __('No','logo-slider-wp')
            )
        ),


        array(
            'name'     => 'logosliderwp_settings_height',
            'label'    => __('Logo Height(px)', 'logo-slider-wp'),
            'desc'     => __('Set Maximum Logo Height in px', 'logo-slider-wp'),
            'type'     => 'number',
            'default'  => '350',
            'desc_tip' => true,
        ),


        array(
            'name'     => 'logosliderwp_settings_width',
            'label'    => __('Logo Width(px)', 'logo-slider-wp'),
            'desc'     => __('Set Maximum Logo Width in px', 'logo-slider-wp'),
            'type'     => 'number',
            'default'  => '350',
            'desc_tip' => true,
        )


    ),// Single


    'logosliderwp_adv' => array(

        array(
            'name'     => 'logosliderwp_settings_cat',
            'label'    => __('Default Categories(slug)', 'logo-slider-wp'),
            'desc'     => __('Please input category slug with comma( , ). Example: categoey1, category2 ', 'logo-slider-wp'),
            'type'     => 'text',
            'default'  => '',
            'desc_tip' => true,
        ),




        array(
            'name'     => 'logosliderwp_settings_limit',
            'label'    => __('Item Limit', 'logo-slider-wp'),
            'desc'     => __('Please input total number of item, that want to display front end. -1 means all published post.', 'logo-slider-wp'),
            'type'     => 'number',
            'default'  => '-1',
            'desc_tip' => true,
        ),

    ),// Single


    // Style Settings
    'logosliderwp_style' => array(

        array(
            'name'     => 'logosliderwp_settings_nav_position',
            'label'         => __('Nav Position', 'logo-slider-wp'),
            'type'          => 'radio',
            'required'      => false,
            'default'       => 'b-center',
            'options' => array(
                'b-center' => __('Bottom Center','logo-slider-wp'),
                'v-mid' => __('Vertically Middle','logo-slider-wp'),
                'v-mid-hover' => __('Vertically Middle (On Over)','logo-slider-wp'),

            )
        ),

        array(
            'name'     => 'logosliderwp_settings_hover_type',
            'label'         => __('Hover Effect', 'logo-slider-wp'),
            'type'          => 'radio',
            'required'      => false,
            'default'       => 'default',
            'options' => array(
                'default' => __('Default','logo-slider-wp'),
                'grayscale'   => __('Gray Scale','logo-slider-wp'),
                'hblur'   => __('Blur','logo-slider-wp'),
                'zoomin'  => __('Zoom In','logo-slider-wp'),
                'none'    => __('None','logo-slider-wp'),
            )
        ),

        array(
            'name'     => 'logosliderwp_settings_bgcolor_en',
            'label'         => __('Enabled  Background Color', 'logo-slider-wp'),
            'type'          => 'radio',
            'required'      => false,
            'options' => array(
                'yes' => __('Yes','logo-slider-wp'),
                'no' => __('No','logo-slider-wp')
            )
        ),

        array(
            'name'    => 'logosliderwp_settings_bgcolor',
            'label'   => __('Background  Color', 'lgxcarousel-domain'),
            'desc'    => __('Please select Carousel Background color.', 'lgxcarousel-domain'),
            'type'    => 'color',
            'default' => '#f1f1f1'
        ),

        array(
            'name'     => 'logosliderwp_settings_border_en',
            'label'         => __('Enabled Border', 'logo-slider-wp'),
            'type'          => 'radio',
            'required'      => false,
            'options' => array(
                'yes' => __('Yes','logo-slider-wp'),
                'no' => __('No','logo-slider-wp')
            )
        ),

        array(
            'name'    => 'logosliderwp_settings_bordercolor',
            'label'   => __('Border Color', 'lgxcarousel-domain'),
            'type'    => 'color',
            'default' => '#d02c21'
        ),

    ),// Single

    //Responsive Settings
    'logosliderwp_responsive' => array(

        // View Port Large Desktop
        array(
            'name'     => 'logosliderwp_settings_largedesktop_item',
            'label'    => __('Item in Large Desktops', 'logo-slider-wp'),
            'desc'     => __('Item in Large Desktops Devices (1200px and Up)', 'logo-slider-wp'),
            'type'     => 'number',
            'default'  => '5',
            'desc_tip' => true,
        ),

        array(
            'name'     => 'logosliderwp_settings_largedesktop_nav',
            'label'         => __('Show Nav(Large Desktops)', 'logo-slider-wp'),
            'desc'          => __( 'Show Nav in Large Desktops', 'logo-slider-wp' ),
            'type'          => 'radio',
            'tooltip'       => __('Enabled by default','logo-slider-wp'),
            'required'      => false,
            'default'       => 'yes',
            'options' => array(
                'yes' => __('yes','logo-slider-wp'),
                'no' => __('No','logo-slider-wp')
            )
        ),

        // View Port Desktop
        array(
            'name'     => 'logosliderwp_settings_desktop_item',
            'label'    => __('Item in Desktops', 'logo-slider-wp'),
            'desc'     => __('Item in Desktops Devices (Desktops 992px).', 'logo-slider-wp'),
            'type'     => 'number',
            'default'  => '4',
            'desc_tip' => true,
        ),

        array(
            'name'     => 'logosliderwp_settings_desktop_nav',
            'label'         => __('Show Nav(Desktops)', 'logo-slider-wp'),
            'desc'          => __( 'Show Nav in Desktops', 'logo-slider-wp' ),
            'type'          => 'radio',
            'tooltip'       => __('Enabled by default','logo-slider-wp'),
            'required'      => false,
            'default'       => 'yes',
            'options' => array(
                'yes' => __('yes','logo-slider-wp'),
                'no' => __('No','logo-slider-wp')
            )
        ),

        // View Port Tab
        array(
            'name'     => 'logosliderwp_settings_tablet_item',
            'label'    => __('Item in Tablets', 'logo-slider-wp'),
            'desc'     => __('Item in Tablets Devices (768px and Up)', 'logo-slider-wp'),
            'type'     => 'number',
            'default'  => '3',
            'desc_tip' => true,
        ),

        array(
            'name'     => 'logosliderwp_settings_tablet_nav',
            'label'         => __('Enabled largedesktop Nav', 'logo-slider-wp'),
            'desc'          => __( 'Show Nav(Tablet)', 'logo-slider-wp' ),
            'type'          => 'radio',
            'tooltip'       => __('Show Nav in Large Tablet','logo-slider-wp'),
            'required'      => false,
            'default'       => 'yes',
            'options' => array(
                'yes' => __('yes','logo-slider-wp'),
                'no' => __('No','logo-slider-wp')
            )
        ),


        // View Port Mobile
        array(
            'name'     => 'logosliderwp_settings_mobile_item',
            'label'    => __('Item in Mobile', 'logo-slider-wp'),
            'desc'     => __('Item in Mobile Devices (Less than 768px)', 'logo-slider-wp'),
            'type'     => 'number',
            'default'  => '2',
            'desc_tip' => true,
        ),

        array(
            'name'     => 'logosliderwp_settings_mobile_nav',
            'label'         => __('Show Nav(Mobile)', 'logo-slider-wp'),
            'desc'          => __( 'Show next/prev buttons.', 'logo-slider-wp' ),
            'type'          => 'radio',
            'tooltip'       => __('Show Nav in Mobile"','logo-slider-wp'),
            'required'      => false,
            'default'       => 'yes',
            'options' => array(
                'yes' => __('yes','logo-slider-wp'),
                'no' => __('No','logo-slider-wp')
            )
        ),


    ),


    // OWL CONFIG
    'logosliderwp_config'   => array(

        array(
            'name'     => 'logosliderwp_settings_loop',
            'label'         => __('Enabled Loop', 'logo-slider-wp'),
            'desc'          => __( 'Infinity loop. Duplicate last and first items to get loop illusion.', 'logo-slider-wp' ),
            'type'          => 'radio',
            'tooltip'       => __('Enabled by default','logo-slider-wp'),
            'required'      => false,
            'default'       => 'yes',
            'options' => array(
                'yes' => __('Yes','logo-slider-wp'),
                'no' => __('No','logo-slider-wp')
            )
        ),

        array(
            'name'     => 'logosliderwp_settings_dots',
            'label'         => __('Enabled Dots', 'logo-slider-wp'),
            'desc'          => __( 'Show dots navigation.', 'logo-slider-wp' ),
            'type'          => 'radio',
            'tooltip'       => __('Enabled by default','logo-slider-wp'),
            'required'      => false,
            'default'       => 'yes',
            'options' => array(
                'yes' => __('yes','logo-slider-wp'),
                'no' => __('No','logo-slider-wp')
            )
        ),


        array(
            'name'     => 'logosliderwp_settings_margin',
            'label'    => __('Margin', 'logo-slider-wp'),
            'desc'     => __('margin-right(px) on item.', 'logo-slider-wp'),
            'type'     => 'number',
            'default'  => '10',
            'desc_tip' => true,
        ),


        array(
            'name'     => 'logosliderwp_settings_autoplay',
            'label'         => __('Enabled Autoplay', 'logo-slider-wp'),
            'desc'          => __( 'Carousel item autoplay by default. ', 'logo-slider-wp' ),
            'type'          => 'radio',
            'tooltip'       => __('Enabled by default','logo-slider-wp'),
            'required'      => false,
            'default'       => 'yes',
            'options' => array(
                'yes' => __('Yes','logo-slider-wp'),
                'no' => __('No','logo-slider-wp')
            )
        ),

        array(
            'name'     => 'logosliderwp_settings_autoplay_timeout',
            'label'    => __('Autoplay Timeout', 'logo-slider-wp'),
            'desc'     => __('Autoplay Timeout. This is not applicable for ticker.', 'logo-slider-wp'),
            'type'     => 'number',
            'default'  => '2000',
            'desc_tip' => true,
        ),


        array(
            'name'     => 'logosliderwp_settings_autoplay_slidespeed',
            'label'    => __('Autoplay Speed', 'logo-slider-wp'),
            'desc'     => __('Set Slide autoplay Speed. This is not applicable for ticker.', 'logo-slider-wp'),
            'type'     => 'number',
            'default'  => '1000',
            'desc_tip' => true,
        ),



        array(
            'name'     => 'logosliderwp_settings_hover_pause',
            'label'         => __('Autoplay Hover Pause', 'logo-slider-wp'),
            'desc'          => __('Pause on mouse hover.', 'logo-slider-wp' ),
            'type'          => 'radio',
            'tooltip'       => __('Disabled by default','logo-slider-wp'),
            'required'      => false,
            'default'       => 'no',
            'options' => array(
                'yes' => __('Yes','logo-slider-wp'),
                'no' => __('No','logo-slider-wp')
            )
        ),



    ),//single


);//Filed