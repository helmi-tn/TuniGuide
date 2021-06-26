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
if (isset($_POST['mail']) and isset($_POST['pin'])) {
include_once('tuniguidedb.php');		
$db= new db_login;
  $res=$db->getPass($_POST['mail'],$_POST['pin']);
  $count=mysqli_num_rows($res);
  if ($count>0) {
    $row=mysqli_fetch_array($res) ;
    echo '
    <script>swal(
      "Your password was recovered",
       "Your Password is : '.$row["pwd_c"].'",
       "success"
    ).then(function() {
      window.location = "index.php";
    });</script>';
    exit ();
  }
  else {
    echo '
    <script>swal(
      "Mail or Code PIN was wrong",
       "Please try again",
       "error"
    ).then(function() {
      window.location = "forget.php";
    });</script>';
    exit ();
  }
}
?>

<form method="POST" action=forget.php>
<label>

        <span>Email Address</span>
        
        
        <input type="email" name="mail" required>  
      
      </label>
      <label>
        <span>Code Pin</span>
        
        
        <input type="text" name="pin" required>  
      
      </label>
      <button class="submit" type="submit" value="sub">Submit</button>
      <p class="forgot-pass" value="fpin"><a href ="forgetpin.php">Forgot PIN Code ?</a></p>

</form>
</div>
 
<script type="text/javascript" src="js/script.js"></script>
<script src="https://kit.fontawesome.com/d6f2fc9101.js"></script>
</body>
</html>