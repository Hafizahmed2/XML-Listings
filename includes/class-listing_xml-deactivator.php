<?php

/**
 * Fired during plugin deactivation
 *
 * @link       ahmed.live
 * @since      1.0.0
 *
 * @package    Listing_xml
 * @subpackage Listing_xml/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Listing_xml
 * @subpackage Listing_xml/includes
 * @author     Ahmed <hafizahmed.tx@gmail.com>
 */
class Listing_xml_Deactivator
{

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate()
	{
		global $wpdb;
     $table_name = $wpdb->prefix . 'listing_xml';
     $sql = "DROP TABLE IF EXISTS $table_name";
     $wpdb->query($sql);
     delete_option("my_plugin_db_version");
	}
}
