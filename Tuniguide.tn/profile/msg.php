<?php
include_once('../php/tuniguidedb.php');		
$db= new db_login;
session_start();
	$res=$db->addFeed($_SESSION['uid'],$_POST["feed"],$_POST["rate"]) ; 

?>