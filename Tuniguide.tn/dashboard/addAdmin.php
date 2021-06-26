<!DOCTYPE html>
<html>

  <head>
	<title>Tuniguide | Dashboard</title>
  <link rel="stylesheet" href="style1.css">
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

  <script>
		function getUser(x){
			
			document.f.delUser.value=x;
		}
		</script>
  </head>
  <!-- ******* Header *********-->
  <body>
  <?php
  include_once('AdminDB.php');
		$db=new admin_db;
		session_start();
		if (isset($_POST['sub'])) {
			$res=$db->addAdmin($_POST['user'],$_POST['pwd'],$_POST['name'],$_POST['mail'],$_POST['c1']);
			echo'<script>location.href="listadm.php"</script>';
		}
		$poste=$db->getAdminList($_SESSION['uid']);
		$getP=mysqli_fetch_array($poste);

?>
  <center><h1>Welcome back <?php echo $_SESSION['uid'] ?> !</h1>
	<ul class="menu">
		<li><a href="dash.php">Dashboard</a></li>
		<li><a href="mail.php">Mail Box</a></li>
		
		<li><a href="msg.php">Feedback</a></li>
    	<li><a href="comment.php">Comments</a></li>
		<li><a href="users.php" >Clients List</a></li>
		<li><a href="listadm.php">Admin List</a></li>
		<?php if ($getP['admin_post']=="admin") { echo' 
		<li><a href="addAdmin.php">Settings</a></li>';
		}?>
    	<li><a href="Logout.php">Logout</a></li>
	</ul>
  </center>
  <!--*************************-->
  <center><h1>Add admin : </h1></center>
		<center>
    <form method="post" action="addAdmin.php" name="f">
	<table>
    <tr>
        
		<td>
		<lable>Name :</lable> <input type="text" class="form__field" name="name" id='name' required /></td>
    </tr>

	<tr>
        
		<td>
		<lable>Username :</lable> <input type="text" class="form__field" name="user" id='user' required /></td>
    </tr>
	

	<tr>
        
		<td>
		<lable>Password :</lable> <input type="password" class="form__field" name="pwd" id='pwd' required /></td>
    </tr>
	

	<tr>
        
		<td>
		<lable>E-mail :</lable> <input type="text" class="form__field" name="mail" id='mail' required /> </td>
	</tr>
	
	<tr>
        
		<td>
		<lable>Poste :</lable> <br>
		
		Admin <input type="radio" name="c1" value="admin"> 
		Editor <input type="radio" name="c1" value="editor">
    </tr>
	
		<tr>
<td><button type="submit" name="sub" class="button btn_d">Add Admin</button></td>
	</tr>

</table>
    </form>
</center>
  </body>
<center><p>All rights reserved  Tuniguide 2021</p></center>
</html>
