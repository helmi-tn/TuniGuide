<!DOCTYPE html>
<html>

  <head>
	<title>Tuniguide | Dashboard</title>
  <link rel="stylesheet" href="style1.css">

  </head>
  <!-- ******* Header *********-->
  <body>

  <?php
	include_once('AdminDB.php');
	$db=new admin_db;
	session_start();
	$res1=$db->getMostCountry();
	$res2=$db->getAvgRate();
	$res3=$db->getUsers('*');
	$res4=$db->getMail('*');
	$res5=$db->getComm('*');
	$res6=$db->getFeedback('*');
	$res7=$db->getAdminList('*');

	$country=mysqli_fetch_array($res1);
	$rate=mysqli_fetch_array($res2);

	$nbMail=mysqli_num_rows($res4);
	$nbUsr=mysqli_num_rows($res3);
	$nbComm=mysqli_num_rows($res5);
	$nbFeed=mysqli_num_rows($res6);
	$nbAdm=mysqli_num_rows($res7);


	$poste=$db->getAdminList($_SESSION['uid']);
	$getP=mysqli_fetch_array($poste);
?>
  <center><h1>Welcome back <?php echo $_SESSION['uid'] ?> !</h1>
	<ul class="menu">
	<li><a href="dash.php">Dashboard</a></li>
		<?php echo'<li><a href="mail.php" class="gold" data-bubble="'.$nbMail.'">Mail Box</a></li>
		
		<li><a class="gold" href="msg.php" data-bubble="'.$nbFeed.'">Feedback</a></li>
    <li><a class="gold" href="comment.php" data-bubble="'.$nbComm.'">Comments</a></li>
	<li><a href="users.php" data-bubble="'.$nbUsr.'">Clients List</a></li>
		<li><a href="listadm.php" data-bubble="'.$nbAdm.'">Admin List</a></li>
		';?>
		<?php if ($getP['admin_post']=="admin") { echo' 
		<li><a href="addAdmin.php">Settings</a></li>';}
		?>
    <li><a class="gold" href="Logout.php">Logout</a></li>
	</ul>
  </center>
  <!--*************************-->

  <center><h1>Information of Website : </h1></center>

<table class="container">
	<thead>
		<tr>
			<th><h1>Most Country Visit</h1></th>
			<th><h1>Average Of Rate</h1></th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td><?php echo $country[0] ?></td>
			<td><?php echo ($rate[0]/5)*100; echo ' %'?></td>
		</tr>
	
	</tbody>
</table>
  </body>
<center><p>All rights reserved  Tuniguide 2021</p></center>
</html>
