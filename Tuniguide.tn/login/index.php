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
<?php
if (isset ($_POST['nom'])) {
// contact with data base
include_once('tuniguidedb.php');		
$db= new db_login;
session_start();

// verification of duplication mail
	$res=$db->getUserData($_POST["mail"]);
	$count=mysqli_num_rows($res);
	if($count>0){
	
		echo'
		<script>swal(
			"E-mail Already Used",
			 "Try another e-mail",
			 "error"
		)</script>';
		
		
	}
	//registred of the important informations
	else{
		$res=$db->addUserInfo($_POST["nom"],$_POST["pren"],$_POST["mail"],$_POST["pwd"]);
    $res2=$db->addDateCreation($_POST["mail"]);
		$res1=$db->getCodePin($_POST["mail"]);
		$row=mysqli_fetch_array($res1) ;
		echo'
		<script>swal(
			"Registered done successfully",
			 "Your code pin is '.$row[10].'",
			 "success"
		)</script>';
	}
}
?>

  <div class="cont">

    <form action="../home/home.php" method="post">
    <div class="form sign-in">
      <h2>Sign In</h2>
      <label>
        <span>Email Address</span>
        
        
        <input type="email" name="mail" required>  
      
      </label>
      <label>
        <span>Password</span>
        <input type="password" name="pwd" required>
      </label>
      <button class="submit" type="submit">Sign In</button>
      <p class="forgot-pass"><a href="forget.php">Forgot Password ?</a></p>

      <div class="social-media">
        <ul>
          <li><a href='/Login/social/facebook.php'><img src="images/facebook.png"></a></li>
          <li><a href='/Login/social/twitter.php'><img src="images/twitter.png"></a></li>
          <li><a href='/Login/social/linkedin.php'><img src="images/linkedin.png"></a></li>
          <li><a href='/Login/social/instagram.php'><img src="images/instagram.png"></a></li>
        </ul>
      </div>
    </div>
</form>

    <div class="sub-cont">
      <div class="img">
        <div class="img-text m-up">
          <h2>New here?</h2>
          <p>Sign up and discover great amount of new places!</p>
        </div>
        <div class="img-text m-in">
          <h2>One of us?</h2>
          <p>If you already has an account, just sign in. We've missed you!</p>
        </div>
        <div class="img-btn">
          <span class="m-up">Sign Up</span>
          <span class="m-in">Sign In</span>
        </div>
      </div>


      <form  action="index.php" method="post">  
        <div class="form sign-up">
        <h2>Quick Sign Up</h2>
        <label>
          <span>Name</span>
          <input type="text" name="nom" required>
        </label>
        <label>
          <span>Last Name</span>
          <input type="text" name="pren" required>
        </label>
        <label>
          <span>Email</span>
          <input type="email" name="mail" required>
        </label>
        <label>
          <span>Password</span>
          <input type="password" name="pwd" required>
        </label>
       
        <button type="submit" class="submit">Sign Up Now</button>
      </div>
      </form>
    
  </div>
<script type="text/javascript" src="script.js"></script>
<script src="https://kit.fontawesome.com/d6f2fc9101.js"></script>
</body>
</html>