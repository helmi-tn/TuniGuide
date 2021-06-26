<?php
include_once ('gallerieDB.php');
session_start();
$db= new galDB ;
 if (isset ($_SESSION['uid'])) {
     
        $db->addLike(1);

 }
 header("location: gallerie.php");

?>