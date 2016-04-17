<?php
/**
 * WooCommerce Jetpack PDF Invoicing Page
 *
 * The WooCommerce Jetpack PDF Invoicing Page class.
 *
 * @version 2.4.7
 * @author  Algoritmika Ltd.
 */

if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! class_exists( 'WCJ_PDF_Invoicing_Page' ) ) :

class WCJ_PDF_Invoicing_Page extends WCJ_Module {

	/**
	 * Constructor.
	 *
	 * @version 2.4.0
	 */
	function __construct() {
		$this->id         = 'pdf_invoicing_page';
		$this->parent_id  = 'pdf_invoicing';
		$this->short_desc = __( 'Page Settings', 'woocommerce-jetpack' );
		$this->desc       = '';
		parent::__construct( 'submodule' );
	}

	/**
	 * get_page_formats.
	 *
	 * @version 2.4.7
	 * @since   2.4.7
	 */
	function get_page_formats() {
		return array(
			// ISO 216 A Series + 2 SIS 014711 extensions
			'A0',
			'A1',
			'A2',
			'A3',
			'A4',
			'A5',
			'A6',
			'A7',
			'A8',
			'A9',
			'A10',
			'A11',
			'A12',
			// ISO 216 B Series + 2 SIS 014711 extensions
			'B0',
			'B1',
			'B2',
			'B3',
			'B4',
			'B5',
			'B6',
			'B7',
			'B8',
			'B9',
			'B10',
			'B11',
			'B12',
			// ISO 216 C Series + 2 SIS 014711 extensions + 2 EXTENSION
			'C0',
			'C1',
			'C2',
			'C3',
			'C4',
			'C5',
			'C6',
			'C7',
			'C8',
			'C9',
			'C10',
			'C11',
			'C12',
			'C76',
			'DL',
			// SIS 014711 E Series
			'E0',
			'E1',
			'E2',
			'E3',
			'E4',
			'E5',
			'E6',
			'E7',
			'E8',
			'E9',
			'E10',
			'E11',
			'E12',
			// SIS 014711 G Series
			'G0',
			'G1',
			'G2',
			'G3',
			'G4',
			'G5',
			'G6',
			'G7',
			'G8',
			'G9',
			'G10',
			'G11',
			'G12',
			// ISO Press
			'RA0',
			'RA1',
			'RA2',
			'RA3',
			'RA4',
			'SRA0',
			'SRA1',
			'SRA2',
			'SRA3',
			'SRA4',
			// German  DIN 476
			'4A0',
			'2A0',
			// Variations on the ISO Standard
			'A2_EXTRA',
			'A3+',
			'A3_EXTRA',
			'A3_SUPER',
			'SUPER_A3',
			'A4_EXTRA',
			'A4_SUPER',
			'SUPER_A4',
			'A4_LONG',
			'F4',
			'SO_B5_EXTRA',
			'A5_EXTRA',
			// ANSI Series
			'ANSI_E',
			'ANSI_D',
			'ANSI_C',
			'ANSI_B',
			'ANSI_A',
			// Traditional 'Loose' North American Paper Sizes
			'USLEDGER',
			'LEDGER',
			'ORGANIZERK',
			'BIBLE',
			'USTABLOID',
			'TABLOID',
			'ORGANIZERM',
			'USLETTER',
			'LETTER',
			'USLEGAL',
			'LEGAL',
			'GOVERNMENTLETTER',
			'GLETTER',
			'JUNIORLEGAL',
			'JLEGAL',
			// Other North American Paper Sizes
			'QUADDEMY',
			'SUPER_B',
			'QUARTO',
			'GOVERNMENTLEGAL',
			'FOLIO',
			'MONARCH',
			'EXECUTIVE',
			'ORGANIZERL',
			'STATEMENT',
			'MEMO',
			'FOOLSCAP',
			'COMPACT',
			'ORGANIZERJ',
			// Canadian standard CAN 2-9.60M
			'P1',
			'P2',
			'P3',
			'P4',
			'P5',
			'P6',
			// North American Architectural Sizes
			'ARCH_E',
			'ARCH_E1',
			'ARCH_D',
			'BROADSHEET',
			'ARCH_C',
			'ARCH_B',
			'ARCH_A',
			// --- North American Envelope Sizes ---
			//   - Announcement Envelopes
			'ANNENV_A2',
			'ANNENV_A6',
			'ANNENV_A7',
			'ANNENV_A8',
			'ANNENV_A10',
			'ANNENV_SLIM',
			//   - Commercial Envelopes
			'COMMENV_N6_1/4',
			'COMMENV_N6_3/4',
			'COMMENV_N8',
			'COMMENV_N9',
			'COMMENV_N10',
			'COMMENV_N11',
			'COMMENV_N12',
			'COMMENV_N14',
			//   - Catalogue Envelopes
			'CATENV_N1',
			'CATENV_N1_3/4',
			'CATENV_N2',
			'CATENV_N3',
			'CATENV_N6',
			'CATENV_N7',
			'CATENV_N8',
			'CATENV_N9_1/2',
			'CATENV_N9_3/4',
			'CATENV_N10_1/2',
			'CATENV_N12_1/2',
			'CATENV_N13_1/2',
			'CATENV_N14_1/4',
			'CATENV_N14_1/2',
			// Japanese (JIS P 0138-61) Standard B-Series
			'JIS_B0',
			'JIS_B1',
			'JIS_B2',
			'JIS_B3',
			'JIS_B4',
			'JIS_B5',
			'JIS_B6',
			'JIS_B7',
			'JIS_B8',
			'JIS_B9',
			'JIS_B10',
			'JIS_B11',
			'JIS_B12',
			// PA Series
			'PA0',
			'PA1',
			'PA2',
			'PA3',
			'PA4',
			'PA5',
			'PA6',
			'PA7',
			'PA8',
			'PA9',
			'PA10',
			// Standard Photographic Print Sizes
			/* 'PASSPORT_PHOTO',
			'E',
			'L',
			'3R',
			'KG',
			'4R',
			'4D',
			'2L',
			'5R',
			'8P',
			'6R',
			'6P',
			'8R',
			'6PW',
			'S8R',
			'4P',
			'10R',
			'4PW',
			'S10R',
			'11R',
			'S11R',
			'12R',
			'S12R',
			// Common Newspaper Sizes
			'NEWSPAPER_BROADSHEET',
			'NEWSPAPER_BERLINER',
			'NEWSPAPER_TABLOID',
			'NEWSPAPER_COMPACT',
			// Business Cards
			'CREDIT_CARD',
			'BUSINESS_CARD',
			'BUSINESS_CARD_ISO7810',
			'BUSINESS_CARD_ISO216',
			'BUSINESS_CARD_IT',
			'BUSINESS_CARD_UK',
			'BUSINESS_CARD_FR',
			'BUSINESS_CARD_DE',
			'BUSINESS_CARD_ES',
			'BUSINESS_CARD_CA',
			'BUSINESS_CARD_US',
			'BUSINESS_CARD_JP',
			'BUSINESS_CARD_HK',
			'BUSINESS_CARD_AU',
			'BUSINESS_CARD_DK',
			'BUSINESS_CARD_SE',
			'BUSINESS_CARD_RU',
			'BUSINESS_CARD_CZ',
			'BUSINESS_CARD_FI',
			'BUSINESS_CARD_HU',
			'BUSINESS_CARD_IL',
			// Billboards
			'4SHEET',
			'6SHEET',
			'12SHEET',
			'16SHEET',
			'32SHEET',
			'48SHEET',
			'64SHEET',
			'96SHEET',
			// Old European Sizes
			//   - Old Imperial English Sizes
			'EN_EMPEROR',
			'EN_ANTIQUARIAN',
			'EN_GRAND_EAGLE',
			'EN_DOUBLE_ELEPHANT',
			'EN_ATLAS',
			'EN_COLOMBIER',
			'EN_ELEPHANT',
			'EN_DOUBLE_DEMY',
			'EN_IMPERIAL',
			'EN_PRINCESS',
			'EN_CARTRIDGE',
			'EN_DOUBLE_LARGE_POST',
			'EN_ROYAL',
			'EN_SHEET',
			'EN_HALF_POST',
			'EN_SUPER_ROYAL',
			'EN_DOUBLE_POST',
			'EN_MEDIUM',
			'EN_DEMY',
			'EN_LARGE_POST',
			'EN_COPY_DRAUGHT',
			'EN_POST',
			'EN_CROWN',
			'EN_PINCHED_POST',
			'EN_BRIEF',
			'EN_FOOLSCAP',
			'EN_SMALL_FOOLSCAP',
			'EN_POTT',
			//   - Old Imperial Belgian Sizes
			'BE_GRAND_AIGLE',
			'BE_COLOMBIER',
			'BE_DOUBLE_CARRE',
			'BE_ELEPHANT',
			'BE_PETIT_AIGLE',
			'BE_GRAND_JESUS',
			'BE_JESUS',
			'BE_RAISIN',
			'BE_GRAND_MEDIAN',
			'BE_DOUBLE_POSTE',
			'BE_COQUILLE',
			'BE_PETIT_MEDIAN',
			'BE_RUCHE',
			'BE_PROPATRIA',
			'BE_LYS',
			'BE_POT',
			'BE_ROSETTE',
			//   - Old Imperial French Sizes
			'FR_UNIVERS',
			'FR_DOUBLE_COLOMBIER',
			'FR_GRANDE_MONDE',
			'FR_DOUBLE_SOLEIL',
			'FR_DOUBLE_JESUS',
			'FR_GRAND_AIGLE',
			'FR_PETIT_AIGLE',
			'FR_DOUBLE_RAISIN',
			'FR_JOURNAL',
			'FR_COLOMBIER_AFFICHE',
			'FR_DOUBLE_CAVALIER',
			'FR_CLOCHE',
			'FR_SOLEIL',
			'FR_DOUBLE_CARRE',
			'FR_DOUBLE_COQUILLE',
			'FR_JESUS',
			'FR_RAISIN',
			'FR_CAVALIER',
			'FR_DOUBLE_COURONNE',
			'FR_CARRE',
			'FR_COQUILLE',
			'FR_DOUBLE_TELLIERE',
			'FR_DOUBLE_CLOCHE',
			'FR_DOUBLE_POT',
			'FR_ECU',
			'FR_COURONNE',
			'FR_TELLIERE',
			'FR_POT', */
		);
	}

	/**
	 * get_settings.
	 *
	 * @version 2.4.7
	 */
	function get_settings() {
		$settings = array();
		$invoice_types = ( 'yes' === get_option( 'wcj_invoicing_hide_disabled_docs_settings', 'no' ) ) ? wcj_get_enabled_invoice_types() : wcj_get_invoice_types();
		foreach ( $invoice_types as $invoice_type ) {
			$settings[] = array(
				'title'    => strtoupper( $invoice_type['desc'] ),
				'type'     => 'title',
				'id'       => 'wcj_invoicing_' . $invoice_type['id'] . '_page_options',
			);
			$settings[] = array(
				'title'    => __( 'Page Orientation', 'woocommerce-jetpack' ),
				'id'       => 'wcj_invoicing_' . $invoice_type['id'] . '_page_orientation',
				'default'  => 'P',
				'type'     => 'select',
				'options'  => array(
					'P' => __( 'Portrait', 'woocommerce-jetpack' ),
					'L' => __( 'Landscape', 'woocommerce-jetpack' ),
				),
			);
			$settings[] = array(
				'title'    => __( 'Page Format', 'woocommerce-jetpack' ),
				'id'       => 'wcj_invoicing_' . $invoice_type['id'] . '_page_format',
				'default'  => 'A4',
				'type'     => 'select',
				'options'  => $this->get_page_formats(),
			);
			$settings[] = array(
				'title'    => __( 'Margin Left', 'woocommerce-jetpack' ),
				'id'       => 'wcj_invoicing_' . $invoice_type['id'] . '_margin_left',
				'default'  => 15, // PDF_MARGIN_LEFT,
				'type'     => 'number',
			);
			$settings[] = array(
				'title'    => __( 'Margin Right', 'woocommerce-jetpack' ),
				'id'       => 'wcj_invoicing_' . $invoice_type['id'] . '_margin_right',
				'default'  => 15, // PDF_MARGIN_RIGHT,
				'type'     => 'number',
			);
			$settings[] = array(
				'title'    => __( 'Margin Top', 'woocommerce-jetpack' ),
				'id'       => 'wcj_invoicing_' . $invoice_type['id'] . '_margin_top',
				'default'  => 27, // PDF_MARGIN_TOP,
				'type'     => 'number',
			);
			$settings[] = array(
				'title'    => __( 'Margin Bottom', 'woocommerce-jetpack' ),
				'id'       => 'wcj_invoicing_' . $invoice_type['id'] . '_margin_bottom',
				'default'  => 0, // PDF_MARGIN_BOTTOM,
				'type'     => 'number',
			);
			$settings[] = array(
				'type'     => 'sectionend',
				'id'       => 'wcj_invoicing_' . $invoice_type['id'] . '_page_options',
			);
		}
		return $settings;
	}
}

endif;

return new WCJ_PDF_Invoicing_Page();
