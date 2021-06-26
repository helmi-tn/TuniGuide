<?php

include_once('profileDb.php');		
$db= new db_profile;
session_start();
$db->logOut();

?>