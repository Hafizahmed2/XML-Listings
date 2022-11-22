<?php

class Listing_Data{
    public static function insert_listing(){
        global $wpdb;
        $xml = simplexml_load_file('http://xml.propspace.com/feed/xml.php?cl=3181&pid=8245&acc=8807');
        $table_name = $wpdb->prefix.'listing_xml';        
        
        foreach($xml->children() as $childs){
                $wpdb->insert( 
                $table_name, 
                array( 
                'count' => (string) $childs->count,
                'Ad_Type' => (string) $childs->Ad_Type,
                'Unit_Type' => (string) $childs->Unit_Type,
                'Unit_Model' => (string) $childs->Unit_Model,
                'Primary_View' => (string) $childs->Primary_View,
                'Unit_Builtup_Area' => (string)$childs->Unit_Builtup_Area,
                'No_of_Bathroom' => (string) $childs->No_of_Bathroom,
                'Property_Title' => (string) $childs->Property_Title,
                'Web_Remarks' => (string) $childs->Web_Remarks,
                'Emirate' => (string) $childs->Emirate,
                'Community' => (string) $childs->Community,
                'Exclusive' => (string) $childs->Exclusive,
                'Cheques' => (string) $childs->Cheques,
                'Plot_Area' => (string) $childs->Plot_Area,
                'Property_Name' => (string) $childs->Property_Name,
                'Property_Ref_No' => (string) $childs->Property_Ref_No,
                'Listing_Agent' => (string) $childs->Listing_Agent,
                'Listing_Agent_Phone' => (string) $childs->Listing_Agent_Phone,
                'Listing_Date' => (string) $childs->Listing_Date,
                'Last_Updated' => (string) $childs->Last_Updated,
                'Bedrooms' => (string) $childs->Bedrooms,
                'Listing_Agent_Email' => (string) $childs->Listing_Agent_Email,
                'Price' => (string) $childs->Price,
                'Unit_Reference_No' => (string) $childs->Unit_Reference_No,
                'No_of_Rooms' => (string) $childs->No_of_Rooms,
                'Latitude' => (string) $childs->Latitude,
                'Longitude' => (string) $childs->Longitude,
                'unit_measure' => (string) $childs->unit_measure,
                'Featured' => (string) $childs->Featured,
                ) );
        }
        
    }
}

?>
