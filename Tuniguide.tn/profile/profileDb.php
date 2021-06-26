<?php

class db_profile{
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

	public function deleteCommUser($mail) {
		$sql="delete from action where id_user='$mail'";
		$result=mysqli_query ($this->conn,$sql) ;
		return $result ;
	}

	public function verifPin($pin,$mail) {
		$sql="select * from client where mail_c='$mail' and code_pin='$pin'";
		$result=mysqli_query ($this->conn,$sql) ;
		return $result ;
	}
	public function deleteFeedUser($mail) {
		$sql="delete from feedback where mail_user='$mail'";
		$result=mysqli_query ($this->conn,$sql) ;
		return $result ;
	}

    public function getUserInfo ($mail) {
		$sql = "select * from client where mail_c='$mail'" ;
		$result=mysqli_query ($this->conn,$sql) ;
		return $result ;
	}

	public function verifGen($mail,$gen) {
		$sql = "select * from client where mail_c='$mail' and gender_c='$gen'" ;
		$result=mysqli_query ($this->conn,$sql) ;
		return $result ;

	}
	public function editGender($mail,$gen) {
		$sql = "update client set gender_c='$gen' where mail_c='$mail'" ;
		$result=mysqli_query ($this->conn,$sql) ;
		return $result ;

	}
	public function verifPwd ($mail,$pwd) {
		$sql = "select * from client where mail_c='$mail' and pwd_c='$pwd'" ;
		$result=mysqli_query ($this->conn,$sql) ;
		return $result ;
	}

	public function verifName ($mail,$name) {
		$sql = "select * from client where mail_c='$mail' and nom_c='$name'" ;
		$result=mysqli_query ($this->conn,$sql) ;
		return $result ;
	}
	public function verifLName ($mail,$pren) {
		$sql = "select * from client where mail_c='$mail' and pren_c='$pren'" ;
		$result=mysqli_query ($this->conn,$sql) ;
		return $result ;
	}
	public function verifTel ($mail,$tel) {
		$sql = "select * from client where mail_c='$mail' and num_c=$tel" ;
		$result=mysqli_query ($this->conn,$sql) ;
		return $result ;
	}
	public function verifPhoto ($mail,$tof) {
		$sql = "select * from client where mail_c='$mail' and photo_c='$tof'" ;
		$result=mysqli_query ($this->conn,$sql) ;
		return $result ;
	}

	public function verifAdr ($mail,$adr) {
		$sql = "select * from client where mail_c='$mail' and country_c='$adr'" ;
		$result=mysqli_query ($this->conn,$sql) ;
		return $result ;
	}
	public function verifDt ($mail,$dt) {
		$sql = "select * from client where mail_c='$mail' and date_nais_c='$dt'" ;
		$result=mysqli_query ($this->conn,$sql) ;
		return $result ;
	}


	public function editName ($mail,$name) {
		$sql = "update client set nom_c='$name' where mail_c='$mail'" ;
		$result=mysqli_query ($this->conn,$sql) ;
		return $result ;
	}
	public function editLName ($mail,$lname) {
		$sql = "update client set pren_c='$lname' where mail_c='$mail'" ;
		$result=mysqli_query ($this->conn,$sql) ;
		return $result ;
	}
	public function editPhoto ($mail,$photo) {
		$pic=addslashes($photo);
		$sql = "update client set photo_c='$pic' where mail_c='$mail'" ;
		$result=mysqli_query ($this->conn,$sql) ;
		return $result ;
	}
	public function editTel ($mail,$tel) {
		$sql = "update client set num_c=$tel where mail_c='$mail'" ;
		$result=mysqli_query ($this->conn,$sql) ;
		return $result ;
	}
	public function editAdr ($mail,$adr) {
		$sql = "update client set country_c='$adr' where mail_c='$mail'" ;
		$result=mysqli_query ($this->conn,$sql) ;
		return $result ;
	}
	public function editDateNais ($mail,$dtn) {
		$sql = "update client set date_nais_c='$dtn' where mail_c='$mail'" ;
		$result=mysqli_query ($this->conn,$sql) ;
		return $result ;
	}


	public function logOut(){
		
		unset($_SESSION["uid"]);
		//echo "<script>location.href='index.php'</script>";
		header("location:../home/home.php");
		exit;
	}

	public function editMail($mail,$new) {
		$sql="update client set mail_c='$new' where mail_c='$mail'";
		$result=mysqli_query ($this->conn,$sql) ;
		$_SESSION['uid']=$new;
		return $result;	

	}
	public function editAnsw($mail,$ans){
		$sql="update client set answ_qs='$ans' where mail_c='$mail'";
		$result=mysqli_query ($this->conn,$sql) ;
		return $result;	
	}
	public function editPwd($mail,$pwd) {
		$sql="update client set pwd_c='$pwd' where mail_c='$mail'";
		$result=mysqli_query ($this->conn,$sql) ;
		return $result;	
	}
	public function editDatePwd($mail) {
		$d=date("Y-m-d h:i:sa") ;
		$sql="update client set last_pwd_m='$d' where mail_c='$mail'";
		$result=mysqli_query ($this->conn,$sql) ;
		return $result;	
	}
	public function verifMail($new,$mail) {
		$sql="select * from client where mail_c='$new' and mail_c <> '$mail'";
		$result=mysqli_query ($this->conn,$sql) ;
		return $result;	
	}
	public function deleteAcc($mail) {

		$sql="delete from client where mail_c='$mail'";
		$result=mysqli_query ($this->conn,$sql) ;
	return $result;	}

}
?>