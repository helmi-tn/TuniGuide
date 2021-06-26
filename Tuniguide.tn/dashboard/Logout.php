<?php
include_once('adminDB.php');
    session_start();
    $db=new admin_db;
    $res=$db->logout();
?>