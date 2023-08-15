<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class WOOMULTI_CURRENCY_F_Admin_Analytics
 */
class WOOMULTI_CURRENCY_F_Admin_Analytics {
	protected $settings;
	protected $args;

	public function __construct() {
		$this->settings = WOOMULTI_CURRENCY_F_Data::get_ins();
		/*Orders*/
		add_filter( 'woocommerce_analytics_orders_select_query', array(
			$this,
			'woocommerce_analytics_orders_select_query'
		) );
		/*Orders stats*/
		add_filter( 'woocommerce_analytics_orders_stats_query_args', array(
			$this,
			'woocommerce_analytics_query_args'
		) );
		add_filter( 'woocommerce_analytics_orders_stats_select_query', array(
			$this,
			'convert_orders_stats'
		) );
		/*Revenue*/
		add_filter( 'woocommerce_analytics_revenue_query_args', array(
			$this,
			'woocommerce_analytics_query_args'
		) );
		add_filter( 'woocommerce_analytics_revenue_select_query', array(
			$this,
			'convert_orders_stats'
		) );
		/*Products*/
		add_filter( 'woocommerce_analytics_products_query_args', array(
			$this,
			'woocommerce_analytics_query_args'
		) );
		add_filter( 'woocommerce_analytics_products_select_query', array(
			$this,
			'convert_orders_stats'
		) );
		/*Products stats*/
		add_filter( 'woocommerce_analytics_products_stats_query_args', array(
			$this,
			'woocommerce_analytics_query_args'
		) );
		add_filter( 'woocommerce_analytics_products_stats_select_query', array(
			$this,
			'convert_orders_stats'
		) );
		/*Categories*/
		add_filter( 'woocommerce_analytics_categories_query_args', array(
			$this,
			'woocommerce_analytics_query_args'
		) );
		add_filter( 'woocommerce_analytics_categories_select_query', array(
			$this,
			'convert_orders_stats'
		) );
	}

	/**
	 * Only to save args for later use
	 *
	 * @param $args
	 *
	 * @return mixed
	 */
	public function woocommerce_analytics_query_args( $args ) {
		$this->args = $args;

		return $args;
	}

	/**
	 * Convert order stats based on rate stored in order meta wmc_order_info
	 *
	 * @param $order_data
	 * @param $default_currency
	 *
	 * @return array
	 */
	private static function get_converted_order( $order_data, $default_currency ) {
		$order_id   = $order_data['order_id'];
		$order_info = get_post_meta( $order_id, 'wmc_order_info', true );
		$currency   = get_post_meta( $order_id, '_order_currency', true );
		$rate       = 1;
		if ( isset( $order_info[ $currency ], $order_info[ $default_currency ], $order_info[ $default_currency ]['is_main'] ) && $order_info[ $default_currency ]['is_main'] == 1 && $order_info[ $currency ]['rate'] > 0 ) {
			$rate = $order_info[ $currency ]['rate'];
		}
		$converted_order = array(
			'date_created' => strtotime( $order_data['date_created'] ),
			'gross_sales'  => 0,
			'refunds'      => 0,
			'net_revenue'  => self::format_price( $order_data['net_total'] / $rate ),
			'coupons'      => 0,
			'taxes'        => 0,
			'shipping'     => 0,
			'total_sales'  => self::format_price( $order_data['total_sales'] / $rate ),
		);

		$order = wc_get_order( $order_id );
		if ( $order ) {
			if ( $order_data['net_total'] < 0 ) {
				$converted_order['refunds'] = abs( $converted_order['net_revenue'] );
			}
			$converted_order['coupons']  = self::format_price( $order->get_total_discount() / $rate );
			$converted_order['taxes']    = self::format_price( $order->get_total_tax() / $rate );
			$converted_order['shipping'] = self::format_price( $order->get_shipping_total() / $rate );
		}
		$converted_order['gross_sales'] = $converted_order['total_sales'] + $converted_order['coupons'] - $converted_order['taxes'] - $converted_order['shipping'] + $converted_order['refunds'];

		return $converted_order;
	}

	/**
	 * Convert orders stats
	 *
	 * @param $results
	 *
	 * @return mixed
	 * @throws Exception
	 */
	public function convert_orders_stats( $results ) {
		if ( $this->args !== null ) {
			$args           = $this->args;
			$args['fields'] = '';
//			$args['extended_info'] = 1;
			$data_store     = \WC_Data_Store::load( 'report-orders' );
			$results_orders = $data_store->get_data( $args );
			$converted      = array(
				'gross_sales' => 0,
				'refunds'     => 0,
				'net_revenue' => 0,
				'coupons'     => 0,
				'taxes'       => 0,
				'shipping'    => 0,
				'total_sales' => 0,
			);
			if ( count( $results_orders->data ) ) {
				$orders_data = $results_orders->data;
				if ( $results_orders->pages > 1 ) {
					for ( $i = 2; $i <= $results_orders->pages; $i ++ ) {
						$args['page']   = $i;
						$results_orders = $data_store->get_data( $args );
						if ( count( $results_orders->data ) ) {
							$orders_data = array_merge( $orders_data, $results_orders->data );
						}
					}
				}

				$default_currency = $this->settings->get_default_currency();
				$converted_orders = array();
				foreach ( $orders_data as $order_data ) {
					if ( ! empty( $order_data['order_id'] ) ) {
						$converted_order = self::get_converted_order( $order_data, $default_currency );
						foreach ( $converted_order as $converted_order_k => $converted_order_v ) {
							if ( isset( $converted[ $converted_order_k ] ) ) {
								$converted[ $converted_order_k ] += $converted_order_v;
							}
						}
						$converted_orders[] = $converted_order;
					}
				}
				foreach ( $converted as $key => $value ) {
					if ( isset( $results->totals->{$key} ) ) {
						$results->totals->{$key} = $value;
					}
				}
				if ( isset( $results->totals->avg_order_value, $results->totals->orders_count ) && $results->totals->orders_count > 0 ) {
					$results->totals->avg_order_value = $results->totals->net_revenue / $results->totals->orders_count;
				}
				if ( isset( $results->intervals ) && count( $results->intervals ) && count( $converted_orders ) ) {
					foreach ( $results->intervals as $key => $interval ) {
						if ( isset( $interval['subtotals'] ) && isset( $interval['subtotals']->gross_sales, $interval['subtotals']->total_sales, $interval['subtotals']->net_revenue ) && ( $interval['subtotals']->gross_sales > 0 || $interval['subtotals']->net_revenue > 0 || $interval['subtotals']->gross_sales > 0 ) ) {
							$subtotals = array(
								'gross_sales'     => 0,
								'total_sales'     => 0,
								'coupons'         => 0,
								'refunds'         => 0,
								'taxes'           => 0,
								'shipping'        => 0,
								'net_revenue'     => 0,
								'avg_order_value' => 0,
							);
							$found     = false;
							foreach ( $converted_orders as $converted_order ) {
								if ( $converted_order['date_created'] >= strtotime( $interval['date_start'] ) && $converted_order['date_created'] <= strtotime( $interval['date_end'] ) ) {
									$found                    = true;
									$subtotals['net_revenue'] += $converted_order['net_revenue'];
									$subtotals['total_sales'] += $converted_order['total_sales'];
									$subtotals['refunds']     += $converted_order['refunds'];
									$subtotals['coupons']     += $converted_order['coupons'];
									$subtotals['taxes']       += $converted_order['taxes'];
									$subtotals['shipping']    += $converted_order['shipping'];
									$subtotals['gross_sales'] += $converted_order['gross_sales'];
								} elseif ( $found ) {
									break;
								}
							}
							if ( $found ) {
								if ( isset( $interval['subtotals']->avg_order_value, $interval['subtotals']->orders_count ) && $interval['subtotals']->orders_count > 0 ) {
									$subtotals['avg_order_value'] = $subtotals['net_revenue'] / $interval['subtotals']->orders_count;
								}
								foreach ( $subtotals as $subtotals_k => $subtotals_v ) {
									if ( isset( $interval['subtotals']->{$subtotals_k} ) ) {
										$results->intervals[ $key ]['subtotals']->{$subtotals_k} = $subtotals_v;
									}
								}
							}
						}
					}
				}
			}
			$this->args = null;
		}

		return $results;
	}

	/**
	 * Convert net_total and total_sales of every order
	 *
	 * @param $results
	 *
	 * @return mixed
	 */
	public function woocommerce_analytics_orders_select_query( $results ) {
		$default_currency = $this->settings->get_default_currency();
		foreach ( $results->data as $key => $order_data ) {
			if ( ! empty( $order_data['order_id'] ) ) {
				$converted_order                      = self::get_converted_order( $order_data, $default_currency );
				$results->data[ $key ]['net_total']   = $converted_order['net_revenue'];
				$results->data[ $key ]['total_sales'] = $converted_order['total_sales'];
			}
		}

		return $results;
	}

	/**
	 * Format price after converting
	 *
	 * @param $price
	 *
	 * @return float
	 */
	private static function format_price( $price ) {
		return $price > 0 ? floatval( str_replace( ',', '', number_format( $price, wc_get_price_decimals(), '.', ',' ) ) ) : $price;
	}
}