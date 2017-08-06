<?php
  $filepath = realpath(dirname(__FILE__));
  include_once ($filepath."/../lib/Database.php");
  include_once ($filepath."/../helpers/format.php");
?>
<?php
class Category 
{
	
	    private $db;
	  	
	  	function __construct()
	  	{
	  		$this->db = new Database();
            $this->fm = new Format();
	  	}
	 

        public function showCategory(){
        	$showquery = "SELECT * FROM category";
        	$showres = $this->db->select($showquery);
        	if($showres)
        		return $showres;
        }

        public function getCategoryById($category_id){
        	$showquery = "SELECT *
            FROM items where category_id = '$category_id'";
        	$showres = $this->db->select($showquery);
        	if($showres)
        		return $showres;
        }

        public function adminAddCategory($category_name){
            $category_name = $this->fm->validation($category_name);
            $category_name  = mysqli_real_escape_string($this->db->link, $category_name);
            $query="INSERT INTO category (name) VALUES ('$category_name')";
                    $result = $this->db->insert($query);
        }

        public function adminDeleteCategory($catNo){
            $query = "DELETE FROM category WHERE id = '$catNo'";
            $result =  $this->db->delete($query);
        }
         public function adminCategoryById($catNo){
            $showquery = "SELECT * FROM category WHERE id = '$catNo'";
            $showres = $this->db->select($showquery);
            if($showres)
                return $showres;
        }

        public function adminUpdateCategory($category_name,$catNo){
            $category_name = $this->fm->validation($category_name);
            $catNo = $this->fm->validation($catNo);
            $category_name  = mysqli_real_escape_string($this->db->link, $category_name);
            $catNo  = mysqli_real_escape_string($this->db->link, $catNo);
            $query= "UPDATE category SET name = '$category_name' WHERE id = '$catNo'";
                    $result = $this->db->update($query);
        }


       

}
?>