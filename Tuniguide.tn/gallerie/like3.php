<html>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> 
<body> 
<?php
include_once ('gallerieDB.php');
session_start();
$db= new galDB ;
 if (isset ($_SESSION['uid'])) {
     
        $db->addLike(3);
        header("location: gallerie.php");

 }
 else {

       echo'
       <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
   
       <script>swal(
           "Error",
            "You must login before",
            "error"
         ).then(function() {
           window.location = "../login/index.php";
         });</script>
       ';
   }

?>
</body>
</html>