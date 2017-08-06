<?php
  $filepath = realpath(dirname(__FILE__));
  include_once ($filepath."/../lib/Database.php");
  include_once ($filepath."/../helpers/format.php");
?>
<?php
class Products 
{
	
	    private $db;
	  	
	  	function __construct()
	  	{
	  		$this->db = new Database();
        $this->fm = new Format();
	  	}

         public function showAllProducts(){
            $showquery = "SELECT * FROM items";
            $showres = $this->db->select($showquery);
            if($showres)
                return $showres;
        }

	 
        public function showProducts($itemNo){
            $showquery = "SELECT * FROM items WHERE itemNo = '$itemNo'";
            $showres = $this->db->select($showquery);
            if($showres)
                return $showres;
        }

         public function adminAddProducts($itemName, $itemDescription, $itemQuantity, $itemPrice, $img){
            $itemName = $this->fm->validation($itemName);
            $itemDescription = $this->fm->validation($itemDescription);
            $itemQuantity = $this->fm->validation($itemQuantity);
            $itemPrice = $this->fm->validation($itemPrice);
            $img = $this->fm->validation($img);
            $itemName  = mysqli_real_escape_string($this->db->link, $itemName);
            $itemDescription  = mysqli_real_escape_string($this->db->link, $itemDescription);
            $itemQuantity  = mysqli_real_escape_string($this->db->link, $itemQuantity);
            $itemPrice  = mysqli_real_escape_string($this->db->link, $itemPrice);
            $img  = mysqli_real_escape_string($this->db->link, $img);
            $query="INSERT INTO items (itemName, itemDescription, itemQuantity, itemPrice, itemImage) VALUES ('$itemName', '$itemDescription', '$itemQuantity', '$itemPrice', '$img')";
                    $result = $this->db->insert($query);
        }

        public function adminUpdateProduct($itemName,$itemDescription,$itemQuantity,$itemPrice,$category_id,$itemNo){
          $itemName = $this->fm->validation($itemName);
          $itemDescription = $this->fm->validation($itemDescription);
          $itemQuantity = $this->fm->validation($itemQuantity);
          $itemPrice = $this->fm->validation($itemPrice);
          $category_id = $this->fm->validation($category_id);
          $itemNo = $this->fm->validation($itemNo);
          $itemName  = mysqli_real_escape_string($this->db->link, $itemName);
          $itemDescription  = mysqli_real_escape_string($this->db->link, $itemDescription);
          $itemQuantity  = mysqli_real_escape_string($this->db->link, $itemQuantity);
          $itemPrice  = mysqli_real_escape_string($this->db->link, $itemPrice);
          $category_id  = mysqli_real_escape_string($this->db->link, $category_id);
          $itemNo  = mysqli_real_escape_string($this->db->link, $itemNo);
          $query= "UPDATE items SET itemName = '$itemName', itemDescription = '$itemDescription', itemQuantity = '$itemQuantity', itemPrice = '$itemPrice',category_id='$category_id' WHERE itemNo = '$itemNo'";
                    return $result = $this->db->update($query);
        }

        public function adminUpdateProductWithImage($itemName,$itemDescription,$itemQuantity,$itemPrice,$img,$category_id){
          $itemName = $this->fm->validation($itemName);
          $itemDescription = $this->fm->validation($itemDescription);
          $itemQuantity = $this->fm->validation($itemQuantity);
          $itemPrice = $this->fm->validation($itemPrice);
          $img = $this->fm->validation($img);
          $category_id = $this->fm->validation($category_id);
          $itemDescription  = mysqli_real_escape_string($this->db->link, $itemDescription);
          $itemQuantity  = mysqli_real_escape_string($this->db->link, $itemQuantity);
          $itemPrice  = mysqli_real_escape_string($this->db->link, $itemPrice);
          $img  = mysqli_real_escape_string($this->db->link, $img);
          $category_id  = mysqli_real_escape_string($this->db->link, $category_id);
          $query= "UPDATE items SET itemName = '$itemName', itemDescription = '$itemDescription', itemQuantity = '$itemQuantity', itemPrice = '$itemPrice', itemImage = '$img',category_id='$category_id' WHERE itemNo = '$itemNo'";
                  return $result = $this->db->update($query);
        }

        public function getSearchedProducts($search_key){
          $showquery = "SELECT *
          FROM items
           WHERE itemName LIKE '%{$search_key}%'";
            $showres = $this->db->select($showquery);
            if($showres)
                return $showres;
        }

        public function adminDeleteProduct($itemNo){
           $query = "DELETE FROM items WHERE itemNo = '$itemNo'";
            $result =  $this->db->delete($query);
        }

}
?>