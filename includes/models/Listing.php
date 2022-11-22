<?php

if ( ! defined( 'WPINC' ) ) {
	die;
}

class Listing_Model{
    
    public static function listing_schema(){
        global $wpdb;
        $table_name = $wpdb->prefix . 'listing_xml';
	    $sql = "CREATE TABLE " . $table_name . " (
        id int(11) NOT NULL AUTO_INCREMENT,
        count int(11) NOT NULL,
        Ad_Type VARCHAR(10) NOT NULL,
        Unit_Type VARCHAR(10),
		Unit_Model VARCHAR(10),
		Primary_View TINYTEXT,
		Unit_Builtup_Area FLOAT(10, 2),
		No_of_Bathroom INT(8),
		Property_Title TINYTEXT,
		Web_Remarks LONGTEXT,
		Emirate VARCHAR(30),
		Community VARCHAR(30),
		Exclusive INT(8),
		Cheques INT(8),
		Plot_Area INT(8),
		Property_Name VARCHAR(30),
		Property_Ref_No VARCHAR(30),
		Listing_Agent VARCHAR(30),
		Listing_Agent_Phone VARCHAR(30),
		Listing_Date DATETIME,
		Last_Updated DATETIME,
		Bedrooms INT(8),
		Listing_Agent_Email VARCHAR(30),
		Price BIGINT(16),
		Unit_Reference_No VARCHAR(20),
		No_of_Rooms INT(8),
		Latitude DOUBLE(16, 10),
		Longitude DOUBLE(16, 10),
		unit_measure VARCHAR(30),
		Featured BOOL,
        PRIMARY KEY  (id)
    );";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
    }

}
    
?>