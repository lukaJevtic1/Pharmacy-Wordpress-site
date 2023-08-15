<?php

/**
 *
 * @link              http://logichunt.com
 * @since             1.0.0
 * @package           Logo_Slider_WP
 *
 * @wordpress-plugin
 * Plugin Name:       Logo Slider by LogicHunt.com
 * Plugin URI:        https://logichunt.com/product/wordpress-logo-slider/
 * Description:       Ultimate & Most Popular Responsive Logo Showcase Slider. Display Unlimited Client, Supporter, Partner, Sponsor, or Brand Logo with Infinite Slides Loop.
 * Version:           3.2.3
 * Author:            LogicHunt
 * Author URI:        http://logichunt.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       logo-slider-wp
 * Domain Path:       /languages
 *
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}


//plugin definition specific constants
defined( 'LGX_LS_PLUGIN_VERSION' )        or define( 'LGX_LS_PLUGIN_VERSION', '3.2.3' );
defined( 'LGX_LS_WP_PLUGIN' )             or define( 'LGX_LS_WP_PLUGIN', 'logo-slider-wp' );
defined( 'LGX_LS_PLUGIN_BASE' )           or define( 'LGX_LS_PLUGIN_BASE', plugin_basename( __FILE__ ) );
defined( 'LGX_LS_PLUGIN_ROOT_PATH' )      or define( 'LGX_LS_PLUGIN_ROOT_PATH', plugin_dir_path( __FILE__ ) );
defined( 'LGX_LS_PLUGIN_ROOT_URL' )       or define( 'LGX_LS_PLUGIN_ROOT_URL', plugin_dir_url( __FILE__ ) );
defined( 'LGX_LS_PLUGIN_TEXT_DOMAIN')     or define( 'LGX_LS_PLUGIN_TEXT_DOMAIN', 'logo-slider-wp');

if( (LGX_LS_PLUGIN_BASE == 'logo-slider-wp-pro/logo-slider-wp-pro.php') ) {
	defined( 'LGX_LS_PLUGIN_META_FIELD_PRO')  or define( 'LGX_LS_PLUGIN_META_FIELD_PRO', 'enabled');
} else {
	defined( 'LGX_LS_PLUGIN_META_FIELD_PRO')  or define( 'LGX_LS_PLUGIN_META_FIELD_PRO', 'disabled');
}



/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-logo-slider-wp-activator.php
 */
function activate_logo_slider_wp() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-logo-slider-wp-activator.php';
	Logo_Slider_WP_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-logo-slider-wp-deactivator.php
 */
function deactivate_logo_slider_wp() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-logo-slider-wp-deactivator.php';
	Logo_Slider_WP_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_logo_slider_wp' );
register_deactivation_hook( __FILE__, 'deactivate_logo_slider_wp' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-logo-slider-wp.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_logo_slider_wp() {

	$plugin = new Logo_Slider_WP();
	$plugin->run();

}
run_logo_slider_wp();


