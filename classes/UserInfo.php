<?php
  $filepath = realpath(dirname(__FILE__));
  include_once ($filepath."/../lib/Database.php");
  include_once ($filepath."/../helpers/format.php");
?>
<?php
class UserInfo 
{
	
	    private $db;
	  	
	  	function __construct()
	  	{
	  		$this->db = new Database();
            $this->fm = new Format();
	  	}
	 
        public function showUserInfo($username){
            $showquery = "SELECT * FROM userinfo WHERE username = '$username'";
            $showres = $this->db->select($showquery);
            if($showres)
                return $showres;
        }

        public function updateUserInfo($fname,$lname,$address,$contactno,$email,$paypal,$img,$username){
            $fname = $this->fm->validation($fname);
            $lname = $this->fm->validation($lname);
            $address = $this->fm->validation($address);
            $contactno = $this->fm->validation($contactno);
            $email = $this->fm->validation($email);
            $paypal = $this->fm->validation($paypal);
            $img = $this->fm->validation($img);
            $username = $this->fm->validation($username);
            $fname  = mysqli_real_escape_string($this->db->link, $fname);
            $lname  = mysqli_real_escape_string($this->db->link, $lname);
            $address  = mysqli_real_escape_string($this->db->link, $address);
            $contactno  = mysqli_real_escape_string($this->db->link, $contactno);
            $email  = mysqli_real_escape_string($this->db->link, $email);
            $paypal  = mysqli_real_escape_string($this->db->link, $paypal);
            $img  = mysqli_real_escape_string($this->db->link, $img);
            $username  = mysqli_real_escape_string($this->db->link, $username);
            $query= "UPDATE userinfo SET firstname = '$fname', lastname = '$lname', useraddress = '$address', usercontactno = '$contactno', useremail = '$email', userpaypal = '$paypal', userImage = '$img' WHERE username = '$username'";
                    $result = $this->db->update($query);
        }

        public function signUpInsert($signupUser, $signupFname, $signupLname,$signupAddress, $signupContactno, $signupEmail, $signupPaypalemail){
            $signupUser = $this->fm->validation($signupUser);
            $signupFname = $this->fm->validation($signupFname);
            $signupLname = $this->fm->validation($signupLname);
            $signupAddress = $this->fm->validation($signupAddress);
            $signupContactno = $this->fm->validation($signupContactno);
            $signupEmail = $this->fm->validation($signupEmail);
            $signupPaypalemail = $this->fm->validation($signupPaypalemail);
            $signupUser  = mysqli_real_escape_string($this->db->link, $signupUser);
            $signupFname  = mysqli_real_escape_string($this->db->link, $signupFname);
            $signupLname  = mysqli_real_escape_string($this->db->link, $signupLname);
            $signupAddress  = mysqli_real_escape_string($this->db->link, $signupAddress);
            $signupContactno  = mysqli_real_escape_string($this->db->link, $signupContactno);
            $signupEmail  = mysqli_real_escape_string($this->db->link, $signupEmail);
            $signupPaypalemail  = mysqli_real_escape_string($this->db->link, $signupPaypalemail);
            $query="INSERT INTO userinfo (username, firstname, lastname, useraddress, usercontactno, useremail, userpaypal) VALUES ('$signupUser', '$signupFname', '$signupLname', '$signupAddress', '$signupContactno', '$signupEmail', '$signupPaypalemail')";
                    $result = $this->db->insert($query);
        }



}
?>