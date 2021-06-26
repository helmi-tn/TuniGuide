<?php
class admin_db{
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
    public function getUsers($p) {
        if ($p=='*'){
            $sql="select * from client";
            } else
            {
            $sql="select * from client where mail_c='$p'";  
            }
        $relsult=mysqli_query($this->conn,$sql);
        return $relsult;
    }
    public function getAdminList($p) {
        if ($p=='*'){
            $sql="select * from admin";
            } else
            {
            $sql="select * from admin where admin_user='$p'";  
            }
        $relsult=mysqli_query($this->conn,$sql);
        return $relsult;
    }
    public function getMail($p) {
        if ($p=='*'){
        $sql="select * from contact";
        } else
        {
        $sql="select * from contact where mail_user='$p'";  
        }
        $relsult=mysqli_query($this->conn,$sql);
        return $relsult;
    }
    public function getMailById($id) {
        $sql="select mail_c from client where id_c=$id";
        $relsult=mysqli_query($this->conn,$sql);
        return $relsult;
    }
    public function getComm($p) {
        if ($p=='*'){
            $sql="select * from action";
            } else
            {
            $sql="select * from action where id_user='$p'";  
            }
        $relsult=mysqli_query($this->conn,$sql);
        return $relsult;
    }
    public function getFeedback($p) {
        if ($p=='*'){
            $sql="select * from feedback";
            } else
            {
            $sql="select * from feedback where mail_user='$p'";  
            }
        $relsult=mysqli_query($this->conn,$sql);
        return $relsult;
    }

    public function deleteComm($mail){
        $sql="delete from action where id_user='$mail' limit 1";
        $relsult=mysqli_query($this->conn,$sql);
        return $relsult;
    }
    public function deleteFeedback ($mail) {
        $sql="delete from feedback where mail_user='$mail' limit 1";
        $relsult=mysqli_query($this->conn,$sql);
        return $relsult;

    }
    public function deleteAdmin($user) {
        $sql="delete from admin where admin_user='$user'";
        $relsult=mysqli_query($this->conn,$sql);
        return $relsult;
    }

    public function addAdmin ($user,$pwd,$name,$mail,$post) {
        $sql="insert into admin values('$user','$pwd','$name','$mail','$post')";
        $relsult=mysqli_query($this->conn,$sql);
        return $relsult;
    }
    public function deleteClient ($mail) {
        if ($mail=='*') {
            $sql="delete from client";
        } else {
        $sql="delete from client where mail_c='$mail'";}

        $relsult=mysqli_query($this->conn,$sql);
        return $relsult;
    }

    public function getAdmin ($user,$pwd) {
        $sql="select * from admin where admin_user='$user' and admin_pwd='$pwd'";
        $result=mysqli_query($this->conn,$sql);
        return $result;
    }
    public function getMostCountry() {
        $sql="select country_c from client group by country_c order by count(*) desc limit 1";
        $result=mysqli_query($this->conn,$sql);
        return $result;
    }
    public function getAvgRate() {
        $sql="select avg(rate_user) from feedback";
        $result=mysqli_query($this->conn,$sql);
        return $result;
    }
    public function logout(){
		
		unset($_SESSION["uid"]);
		header("location:admin.php");
		exit;
	}

    

}