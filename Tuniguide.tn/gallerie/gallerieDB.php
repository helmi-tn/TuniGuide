<?php

class galDB{
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

    public function addLike($n) {
        $sql="update galerie set nb_like=nb_like+1 where id_post='$n'";
        $result=mysqli_query($this->conn,$sql);
        return $result;
    }
    public function getLike ($n) {
        $sql="select nb_like from galerie where id_post='$n'";
        $result=mysqli_query($this->conn,$sql);
        return $result;
    }

}

?>