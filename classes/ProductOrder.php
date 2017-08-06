<?php
  $filepath = realpath(dirname(__FILE__));
  include_once ($filepath."/../lib/Database.php");
  include_once ($filepath."/../helpers/format.php");
?>
<?php
class ProductOrder 
{
	
	    private $db;
	  	
	  	function __construct()
	  	{
	  		$this->db = new Database();
            $this->fm = new Format();
	  	}

        public function showOrder($username){
            $showquery = "SELECT * FROM productorder WHERE username = '$username' AND isDelivered = 'NOT YET'";
            $showres = $this->db->select($showquery);
            if($showres)
                return $showres;
        }

         public function showOrderForQuantity($j,$f){
            $showquery = "SELECT * FROM productorder WHERE username = '$f' AND itemNo = '$j'";
            $showres = $this->db->select($showquery);
            if($showres)
                return $showres;
        }
	 
        public function insertOrder($rowUsername,$rowItemNo,$rowOrderQuantity,$rowTotalPrice,$paymentmethod){
            $rowUsername = $this->fm->validation($rowUsername);
            $rowItemNo = $this->fm->validation($rowItemNo);
            $rowOrderQuantity = $this->fm->validation($rowOrderQuantity);
            $rowTotalPrice = $this->fm->validation($rowTotalPrice);
            $paymentmethod = $this->fm->validation($paymentmethod);
            $rowUsername  = mysqli_real_escape_string($this->db->link, $rowUsername);
            $rowItemNo  = mysqli_real_escape_string($this->db->link, $rowItemNo);
            $rowOrderQuantity  = mysqli_real_escape_string($this->db->link, $rowOrderQuantity);
            $rowTotalPrice  = mysqli_real_escape_string($this->db->link, $rowTotalPrice);
            $paymentmethod  = mysqli_real_escape_string($this->db->link, $paymentmethod);
            $query="INSERT INTO productorder (username, itemNo, orderQuantity, totalPrice, paymentmethod) VALUES ('$rowUsername', '$rowItemNo', '$rowOrderQuantity', '$rowTotalPrice', '$paymentmethod')";
                    $result = $this->db->insert($query);
        }

        public function deleteOrder($id){
            $query = "DELETE FROM productorder WHERE orderID = '$id'";
            $result =  $this->db->delete($query);
        }

}
?>