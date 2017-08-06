<?php
  $filepath = realpath(dirname(__FILE__));
  include_once ($filepath."/../lib/Database.php");
  include_once ($filepath."/../helpers/format.php");
?>
<?php
class Cart 
{
	
	    private $db;
	  	
	  	function __construct()
	  	{
	  		$this->db = new Database();
            $this->fm = new Format();
	  	}
	 
        public function showCart($username){
            $showquery = "SELECT * FROM cart WHERE username = '$username'";
            $showres = $this->db->select($showquery);
            if($showres)
                return $showres;
        }

        public function selectCart($username,$itemNo){
            $showquery = "SELECT * FROM cart WHERE username = '$username' AND itemNo = '$itemNo'";
            $showres = $this->db->select($showquery);
            if($showres)
                return $showres;
        }

         public function showCartItemNo($j){
            $showquery = "SELECT * FROM cart WHERE itemNo = '$j'";
            $showres = $this->db->select($showquery);
            if($showres)
                return $showres;
        }

        public function updateCart($itemNo,$cart_item_quantity){ 
            $itemNo = $this->fm->validation($itemNo);
            $cart_item_quantity = $this->fm->validation($cart_item_quantity);
            $itemNo  = mysqli_real_escape_string($this->db->link, $itemNo);
            $cart_item_quantity  = mysqli_real_escape_string($this->db->link, $cart_item_quantity);
        	$query= "UPDATE cart SET itemCartQuantity = '$cart_item_quantity' WHERE itemNo = '$itemNo'";
                    $result = $this->db->update($query);
        }

        public function deleteCart($username){
            $query = "DELETE FROM cart WHERE username = '$username'";
            $result =  $this->db->delete($query);
        }

        public function deleteCartById($id){
            $query = "DELETE FROM cart WHERE cartID = '$id'";
            $result =  $this->db->delete($query);
        }

        public function insertCart($username,$itemNo,$itemPrice){
            $username = $this->fm->validation($username);
            $itemNo = $this->fm->validation($itemNo);
            $itemPrice = $this->fm->validation($itemPrice);
            $username  = mysqli_real_escape_string($this->db->link, $username);
            $itemNo  = mysqli_real_escape_string($this->db->link, $itemNo);
            $itemPrice  = mysqli_real_escape_string($this->db->link, $itemPrice);
            $query="INSERT INTO cart (username, itemNo, itemCartQuantity, totalPrice) VALUES ('$username', '$itemNo', '1','$itemPrice')";
                    $result = $this->db->insert($query);
        }


}
?>