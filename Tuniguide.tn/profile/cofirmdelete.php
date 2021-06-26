<?php
 include_once('profileDb.php');
    
 $db=new db_profile ;
 session_start();

 $res1=$db->deleteCommUser($_SESSION['uid']) ;
 $res2=$db->deleteFeedUser($_SESSION['uid']) ;
 $res=$db->deleteAcc($_SESSION['uid']) ;
 $db->logOut();
?>