<?php
  $filepath = realpath(dirname(__FILE__));
  include_once ($filepath."/../lib/Database.php");
?>
<?php
class HomepageSlider 
{
	
	    private $db;
	  	
	  	function __construct()
	  	{
	  		$this->db = new Database();
	  	}
	 
        public function showSliders(){
            $showquery = "SELECT * FROM sliders";
            $showres = $this->db->select($showquery);
            if($showres)
                return $showres;
        }


}
?>