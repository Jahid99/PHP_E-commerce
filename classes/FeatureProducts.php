<?php
  $filepath = realpath(dirname(__FILE__));
  include_once ($filepath."/../lib/Database.php");
?>
<?php
class FeatureProducts 
{
	
	    private $db;
	  	
	  	function __construct()
	  	{
	  		$this->db = new Database();
	  	}
	 

        public function showFeatureProducts(){
        	$showquery = "SELECT *
			FROM items
			INNER JOIN feature_items
			ON items.itemNo=feature_items.item_no";
        	$showres = $this->db->select($showquery);
        	if($showres)
        		return $showres;
        }
       

}
?>