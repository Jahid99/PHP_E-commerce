<?php
  $filepath = realpath(dirname(__FILE__));
  include_once ($filepath."/../lib/Database.php");
?>
<?php
class LatestProducts 
{
	
	    private $db;
	  	
	  	function __construct()
	  	{
	  		$this->db = new Database();
	  	}
	 

        public function showLatestProducts(){
        	$showquery = "SELECT *
			FROM items
			INNER JOIN latest_items
			ON items.itemNo=latest_items.item_no";
        	$showres = $this->db->select($showquery);
        	if($showres)
        		return $showres;
        }
       

}
?>