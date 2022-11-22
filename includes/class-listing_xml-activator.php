<?php

/**
 * Fired during plugin activation
 *
 * @link       subhan.live
 * @since      1.0.0
 *
 * @package    Listing_xml
 * @subpackage Listing_xml/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Listing_xml
 * @subpackage Listing_xml/includes
 * @author     Subhan <subhan.naveed@devsinc.com>
 */

class Listing_xml_Activator {

	public static function activate() {
	
	//Create DB Table
	require_once plugin_dir_path( __FILE__ ) . 'models\Listing.php';
	Listing_Model::listing_schema();

	//Put data in DB Table
	require plugin_dir_path( __FILE__ ) . 'parts\listing_data.php';
	Listing_Data::insert_listing();

	}
}
