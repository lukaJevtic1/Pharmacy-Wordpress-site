<?php

/**
 * Class WOOMULTI_CURRENCY_Frontend_Update
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class WOOMULTI_CURRENCY_F_Frontend_Cache {
	protected $settings;

	public function __construct() {
		$this->settings = WOOMULTI_CURRENCY_F_Data::get_ins();
		if ( $this->settings->get_enable() ) {
			add_action( 'init', array( $this, 'clear_browser_cache' ) );
			add_action( 'wp_ajax_wmc_get_products_price', array( $this, 'get_products_price' ) );
			add_action( 'wp_ajax_nopriv_wmc_get_products_price', array( $this, 'get_products_price' ) );
		}
	}

	/**
	 * Clear cache browser
	 */
	public function clear_browser_cache() {
		if ( isset( $_GET['wmc-currency'] ) ) {
			header( "Cache-Control: no-cache, must-revalidate" );
			header( "Expires: Mon, 26 Jul 1997 05:00:00 GMT" );
			header( "Content-Type: application/xml; charset=utf-8" );
		}
	}

	public function get_products_price() {
		$pids             = ! empty( $_POST['pids'] ) ? wc_clean( $_POST['pids'] ) : [];
		$shortcodes       = ! empty( $_POST['shortcodes'] ) ? wc_clean( $_POST['shortcodes'] ) : array();
		$result           = array(
			'shortcodes' => array()
		);
		$current_currency = $this->settings->get_current_currency();
		if ( ! empty( $pids ) ) {
			foreach ( $pids as $pid ) {
				$product = wc_get_product( $pid );
				if ( $product ) {
					$result['prices'][ $pid ] = $product->get_price_html();
				}
			}
		}

		$result['current_currency'] = $current_currency;
		$result['current_country']  = strtolower( $this->settings->get_country_data( $current_currency )['code'] );

		if ( count( $shortcodes ) ) {
			foreach ( $shortcodes as $shortcode ) {
				$flag_size              = isset( $shortcode['flag_size'] ) ? $shortcode['flag_size'] : '';
				$result['shortcodes'][] = do_shortcode( "[woo_multi_currency_{$shortcode['layout']} flag_size='{$flag_size}']" );
			}
		}

		if ( ! empty( $_POST['exchange'] ) ) {
			$exchange_sc  = [];
			$exchange_arr = wc_clean( $_POST['exchange'] );
			foreach ( $exchange_arr as $ex ) {
				$exchange_sc[] = array_merge( $ex, [ 'shortcode' => do_shortcode( "[woo_multi_currency_exchange product_id='{$ex['product_id']}' keep_format='{$ex['keep_format']}' price='{$ex['price']}' original_price='{$ex['original_price']}' currency='{$ex['currency']}']" ) ] );
			}
			$result['exchange'] = $exchange_sc;
		}

		wp_send_json_success( $result );
	}
}