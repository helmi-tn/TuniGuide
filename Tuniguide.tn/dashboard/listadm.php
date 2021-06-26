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
		if (isset($_POST['search'])) {
			$res=$db->getAdminList($_POST['search']);
			if(mysqli_num_rows($res)==0) {
				echo '<script>alert ("Admin Not Found !!");</script>
				<script>location.href="mail.php"</script>';
				
			}
			} else{
			$res=$db->getAdminList('*');
			}
		$res2=$db->getAdminList($_SESSION['uid']);
		$admin=mysqli_fetch_array($res2);

			if (isset($_POST['delUser'])) {
				$res=$db->deleteAdmin($_POST['delUser']);
				header("location: listadm.php");

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
		<li><a href="addAdmin.php">Settings</a></li>';}
		?>
    	<li><a href="Logout.php">Logout</a></li>
	</ul>
  </center>
  <!--*************************-->
  <center><h1>List of admins : </h1></center>
  <form class="search-form" action="listadm.php" method="post">
  <input type="search" name="search" placeholder="Search In Admins" class="search-input">
  <button type="submit" class="search-button">
    <svg class="submit-button">
      <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#search"></use>
    </svg>
  </button>
</form>
<svg xmlns="http://www.w3.org/2000/svg" width="0" height="0" display="none">
  <symbol id="search" viewBox="0 0 32 32">
    <path d="M 19.5 3 C 14.26514 3 10 7.2651394 10 12.5 C 10 14.749977 10.810825 16.807458 12.125 18.4375 L 3.28125 27.28125 L 4.71875 28.71875 L 13.5625 19.875 C 15.192542 21.189175 17.250023 22 19.5 22 C 24.73486 22 29 17.73486 29 12.5 C 29 7.2651394 24.73486 3 19.5 3 z M 19.5 5 C 23.65398 5 27 8.3460198 27 12.5 C 27 16.65398 23.65398 20 19.5 20 C 15.34602 20 12 16.65398 12 12.5 C 12 8.3460198 15.34602 5 19.5 5 z" />
  </symbol>
</svg>
<table class="container">
	<thead>
		<tr>
			<th><h1>Name</h1></th>
			<th><h1>Username</h1></th>
			<th><h1>E-mail</h1></th>
			<th><h1>Poste</h1></th>
			<th><h1>Delete</h1></th>
		</tr>
	</thead>
	<tbody>
		<?php while($row=mysqli_fetch_array($res)) { ?>
		<tr>
			<td><?php echo $row['admin_name']?></td>
			<td><?php echo $row['admin_user']?></td>
			<td><?php echo $row['admin_mail']?></td>
			<td><?php echo $row['admin_post']?></td>
			<?php if ($admin['admin_post']=="editor") { 
				if ($row['admin_user']==$_SESSION['uid']) {
				?>
			<?php
			echo '
			<td><button style="background-color: red; color:white; cursor: pointer;" onclick=getUser("'.$row['admin_user'].'")>DELETE</button></td>';?>
			<?php }} else {?>
				<?php
			echo '
			<td><button style="background-color: red; color:white; cursor: pointer;" onclick=getUser("'.$row['admin_user'].'")>DELETE</button></td>';?>				<?php }?>
		</tr>
	<?php } ?>
	</tbody>
</table>
<center>
<form method="post" action="listadm.php" name="f">
	<table>
		<tr>
			<td>
<input type="input" class="form__field" name="delUser" id='name' required />
		</td><td><button type="submit" class="button btn_q">Delete</button></td>

		<tr>
		</table>
		</form>

		</center>
  </body>
<center><p>All rights reserved  Tuniguide 2021</p></center>
</html>
