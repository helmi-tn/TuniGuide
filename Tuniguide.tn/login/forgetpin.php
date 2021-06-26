<!DOCTYPE html>
<html>
<head>
	<title>TuniGuide</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="signup.css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="all.min.css">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
 
</head>
<body>
<div class="cont">
<br>
<br>
<br>
<br>
<br>
<?php
if (isset($_POST['mail'])) {
include_once('tuniguidedb.php');		
$db= new db_login;
 
  if (isset($_POST['mail'])) {
    session_start();
    $_SESSION['uid']=$_POST['mail'];
    echo '
    <br>
    <br>
    <label>
    <span>How many pets do you have ?</span>
    <form action="forgetpin.php" method="post">
    
    <input type="text" name="qs" required> 
    </label>
    <button class="submit" type="submit" value="sub">Submit</button>
    </form>';
    exit ();
  }
    else {
    echo '
    <script>swal(
        "Somthing wrong",
         "Please try again",
         "error"
      ).then(function() {
        window.location = "forget.php";
      });</script>';
    exit ();
  }
}
if (isset($_POST['qs'])) {
    include_once('tuniguidedb.php');	
    session_start();
	
    $db= new db_login;
  $res=$db->getAsw($_POST['qs'],$_SESSION['uid']);
  $res1=$db->getCodePin($_SESSION['uid']);
  $count=mysqli_num_rows($res);
  if ($count>0) {
    $row=mysqli_fetch_array($res1) ;
    echo '
    <script>swal(
      "Your Pin Code was recovered",
       "Your Pin Code is : '.$row[10].'",
       "success"
    ).then(function() {
      window.location = "forget.php";
    });</script>';
    exit (); ;
}
else {
    echo '<script>swal(
        "Somthing wrong",
         "Please try again",
         "error"
      ).then(function() {
        window.location = "forgetpin.php";
      });</script>';
      exit();
}
}
?>

<br>
<br>

<form method="POST" action=forgetpin.php>
<label>

        <span>Email Address</span>
        
        
        <input type="email" name="mail" required>  
      
      </label>
      <button class="submit" type="submit" value="sub">Submit</button>

</form>
</div>
 
<script type="text/javascript" src="js/script.js"></script>
<script src="https://kit.fontawesome.com/d6f2fc9101.js"></script>
</body>
</html>