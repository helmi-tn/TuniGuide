<?php
class con_db{
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
    public function addMail($mail,$sub,$cont) {
        $date=date("Y-m-d");
        $sql="insert into contact (mail_user,msg_user,date,sub_mail) values('$mail','$cont','$date','$sub')";
        $result=mysqli_query($this->conn,$sql);
        return $result;
    }

}