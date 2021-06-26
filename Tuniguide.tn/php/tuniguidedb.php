<?php
class db_login{
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

	public function getQs ($mail) {
		$sql="select qs from qs_sec q, client c where c.mail_c='$mail' and c.qs_sec_c=q.id_qs";
		$result=mysqli_query($this->conn,$sql); 
		return $result;
	}
	public function AddDateCreation ($mail) {
		$d= date("Y-m-d");
		$sql="update client set date_rec_c='$d' where mail_c='$mail'";
		$result=mysqli_query($this->conn,$sql); 
		return $result;
	}
	public function AddDateLast ($mail) {
		$d=date("m/d/Y h:i:s a", date());
		$sql="update client set last_conct='$d' where mail_c='$mail'";
		$result=mysqli_query($this->conn,$sql); 
		return $result;
	}
	
	public function getAsw ($qs,$mail) {
		$sql="select * from client where mail_c='$mail' and answ_qs='$qs'";
		$result=mysqli_query($this->conn,$sql); 
		return $result;
	}

    public function addUserInfo ($n,$p,$m,$pwd) {
		$pin = rand ( 1000 , 9999 ) ;
        $sql="insert into client (nom_c,pren_c,pwd_c,mail_c,code_pin) values ('$n','$p','$pwd','$m',$pin)" ;
        $result=mysqli_query($this->conn,$sql); 
		return $result;
    }
	public function getUserPhoto ($mail) {
		$sql = "select * from client where mail_c='$mail'" ;
		$result=mysqli_query ($this->conn,$sql) ;
		return $result ;
	}

	public function editName ($mail,$name) {
		$sql = "update client set nom_c='$name' where mail_c='$mail'";
		$result=mysqli_query ($this->conn,$sql) ;
		return $result ;
	}
	public function editDateNais ($mail,$dtn) {
		$sql = "update client set date_nais_c='$dtn' where mail_c='$mail'" ;
		$result=mysqli_query ($this->conn,$sql) ;
		return $result ;
	}


	public function getCodePin ($mail) {
		$sql = "select * from client where mail_c='$mail'" ;
		$result=mysqli_query ($this->conn,$sql) ;
		return $result ;
	}
    public function addUserAfterV ($num,$gc,$date_n,$qs) {
        $sql="insert into client (num_c,gender_c,date_nais_c,qs_sec_c) values ('$num','$gc','$date_n','$qs')" ;
        $result=mysqli_query($this->conn,$sql); 
		return $result;
    }

	public function getPass ($mail,$pin) {
		$sql="select * from client where mail_c='$mail' and code_pin='$pin'";
		$result=mysqli_query($this->conn,$sql);
		return $result ;
	}
	public function getUser($mail,$pwd){
		$sql="SELECT * from client where mail_c='$mail' and pwd_c='$pwd' LIMIT 1";
		$result=mysqli_query($this->conn,$sql) ; 
		return $result;
	}
	public function getUserData($mail){
		//session_start();
		$sql="SELECT nom_c,pren_c,mail_c,num_c,gender_c,date_nais_c,date_rec_c from client where mail_c='$mail'";
		$result=mysqli_query($this->conn,$sql); 
		return $result;
	}
	public function getOrder(){
		$sql="SELECT * from order_table where user_id=".$_SESSION['uid']."";
		$result=mysqli_query($this->conn,$sql); 
		return $result;
	}
	public function logOut(){
		
		unset($_SESSION["uid"]);
		//echo "<script>location.href='index.php'</script>";
		header("location:index.php");
		exit;
	}

	function __destruct(){
		mysqli_close($this->conn);
	}

	public function addFeed($mail,$msg,$rate) {
		$sql="insert into feedback(msg_user,mail_user,rate_user) values ('$msg','$mail',$rate)";
		$result=mysqli_query($this->conn,$sql); 
		return $result;
	}

}
?>