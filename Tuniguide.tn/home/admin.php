<?php
class siteDB{
	public $conn;
	function __construct(){

		$this->conn=mysqli_connect("localhost","root","");
		if(mysqli_connect_errno()){
			echo "failed to connect try again";
			mysqli_connect_error();
			exit();
		}
		mysqli_select_db($this->conn,"db_tng");
	}

   public function getMsgUser() {
    $sql="select msg_user, nom_c, pren_c, photo_c,rate_user from feedback f, client c where f.mail_user=c.mail_c order by request_id desc limit 2;";
    $result=mysqli_query($this->conn,$sql);
    return $result;
   }

   public function getPhoto() {
    $sql="select photo_c from client c, feedback f, where c.mail_c=f.mail_user limit 1;";
    $result=mysqli_query($this->conn,$sql);
    return $result;
   }
}






?>