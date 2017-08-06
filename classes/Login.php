<?php
  $filepath = realpath(dirname(__FILE__));
  include_once ($filepath."/../lib/Database.php");
  include_once ($filepath."/../helpers/format.php");
?>
<?php
class Login 
{
	
	    private $db;
	  	
	  	function __construct()
	  	{
	  		$this->db = new Database();
            $this->fm = new Format();
	  	}
	 

        public function login($username,$password){
        	$showquery = "SELECT * FROM login WHERE BINARY username = BINARY '$username' AND BINARY password = BINARY '$password'";
        	$showres = $this->db->select($showquery);
        	if($showres)
        		return $showres;
        }

        public function showLogin($username){
        	$showquery = "SELECT * FROM login WHERE username = '$username'";
        	$showres = $this->db->select($showquery);
        	if($showres)
        		return $showres;
        }

         public function updateLogin($username){
            $username = $this->fm->validation($username);
            $username  = mysqli_real_escape_string($this->db->link, $username);
        	$query= "UPDATE login SET password = '$password' WHERE username = '$username'";
                    $result = $this->db->update($query);
        }

        public function signUpInsert($signupUser,$signupPass){
            $signupUser = $this->fm->validation($signupUser);
            $signupPass = $this->fm->validation($signupPass);
            $signupUser  = mysqli_real_escape_string($this->db->link, $signupUser);
            $signupPass  = mysqli_real_escape_string($this->db->link, $signupPass);
            $query="INSERT INTO login (username, password, role) VALUES ('$signupUser', '$signupPass', 'user')";
                    $result = $this->db->insert($query);
        }
       

}
?>