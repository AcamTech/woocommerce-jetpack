<?php
/**
 * Booster for WooCommerce - Settings - Gateways by Country or State
 *
 * @version 3.3.1
 * @since   2.8.0
 * @author  Algoritmika Ltd.
 * @todo    change `textarea` to `readonly`
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

$settings = array(
	array(
		'title'     => __( 'General Options', 'woocommerce-jetpack' ),
		'type'      => 'title',
		'id'        => 'wcj_gateways_by_location_general_options',
	),
	array(
		'title'     => __( 'Postcode Type', 'woocommerce-jetpack' ),
		'id'        => 'wcj_gateways_by_location_postcodes_type',
		'type'      => 'select',
		'default'   => 'billing',
		'options'   => array(
			'billing'  => __( 'Billing postcode', 'woocommerce-jetpack' ),
			'shipping' => __( 'Shipping postcode', 'woocommerce-jetpack' ),
		),
	),
	array(
		'type'      => 'sectionend',
		'id'        => 'wcj_gateways_by_location_general_options',
	),
	array(
		'title'     => __( 'Payment Gateways', 'woocommerce-jetpack' ),
		'type'      => 'title',
		'desc'      => __( 'Country and state are defined from customer\'s entered billing address.', 'woocommerce-jetpack' ) . '<br>' .
			__( 'If any field is left empty - it\'s ignored.', 'woocommerce-jetpack' ),
		'id'        => 'wcj_payment_gateways_by_country_gateways_options',
	),
);
$countries = wcj_get_countries();
$states    = wcj_get_states();
$gateways  = WC()->payment_gateways->payment_gateways();
foreach ( $gateways as $key => $gateway ) {
	$default_gateways = array( 'bacs' );
	if ( ! empty( $default_gateways ) && ! in_array( $key, $default_gateways ) ) {
		$custom_attributes = apply_filters( 'booster_message', '', 'disabled' );
		if ( '' == $custom_attributes ) {
			$custom_attributes = array();
		}
		$desc_tip = apply_filters( 'booster_message', '', 'desc_no_link' );
	} else {
		$custom_attributes = array();
		$desc_tip = '';
	}
	$settings = array_merge( $settings, array(
		array(
			'title'     => $gateway->title,
			'desc_tip'  => $desc_tip,
			'desc'      => __( 'Include Countries', 'woocommerce-jetpack' ),
			'id'        => 'wcj_gateways_countries_include_' . $key,
			'default'   => '',
			'type'      => 'multiselect',
			'class'     => 'chosen_select',
			'options'   => $countries,
			'custom_attributes' => $custom_attributes,
		),
		array(
			'desc_tip'  => $desc_tip,
			'desc'      => __( 'Exclude Countries', 'woocommerce-jetpack' ),
			'id'        => 'wcj_gateways_countries_exclude_' . $key,
			'default'   => '',
			'type'      => 'multiselect',
			'class'     => 'chosen_select',
			'options'   => $countries,
			'custom_attributes' => $custom_attributes,
		),
		array(
			'desc_tip'  => $desc_tip,
			'desc'      => __( 'Include States (Base Country)', 'woocommerce-jetpack' ),
			'id'        => 'wcj_gateways_states_include_' . $key,
			'default'   => '',
			'type'      => 'multiselect',
			'class'     => 'chosen_select',
			'options'   => $states,
			'custom_attributes' => $custom_attributes,
		),
		array(
			'desc_tip'  => $desc_tip,
			'desc'      => __( 'Exclude States (Base Country)', 'woocommerce-jetpack' ),
			'id'        => 'wcj_gateways_states_exclude_' . $key,
			'default'   => '',
			'type'      => 'multiselect',
			'class'     => 'chosen_select',
			'options'   => $states,
			'custom_attributes' => $custom_attributes,
		),
		array(
			'desc_tip'  => $desc_tip,
			'desc'      => __( 'Include Postcodes (one per line)', 'woocommerce-jetpack' ),
			'id'        => 'wcj_gateways_postcodes_include_' . $key,
			'default'   => '',
			'type'      => 'textarea',
			'css'       => 'height:200px;',
			'custom_attributes' => $custom_attributes,
		),
		array(
			'desc_tip'  => $desc_tip,
			'desc'      => __( 'Exclude Postcodes (one per line)', 'woocommerce-jetpack' ),
			'id'        => 'wcj_gateways_postcodes_exclude_' . $key,
			'default'   => '',
			'type'      => 'textarea',
			'css'       => 'height:200px;',
			'custom_attributes' => $custom_attributes,
		),
	) );
}
$settings = array_merge( $settings, array(
	array(
		'type'      => 'sectionend',
		'id'        => 'wcj_payment_gateways_by_country_gateways_options',
	),
) );
return $settings;
