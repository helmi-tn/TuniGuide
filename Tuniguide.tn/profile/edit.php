<html>
<head>
    <title> Edit Profile </title>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<style>
 
    * {
  box-sizing: border-box;
  -webkit-font-smoothing: antialiased;
  text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.004);
}

::selection {
  color: #223049;
  background: rgba(0, 185, 255, 0.2);
}
/* Basic stylings */

.container {
  font-family: 'Avenir';
  width: 100%;
  margin: 0 auto;
  display: block;
  background: #FFF;
  padding: 50px 50px;
}

form {
  width: 880px;
  margin: 0 auto;
  padding: 0;
}

h2 {
  text-align: left;
  font-weight: 500;
  margin-bottom: 70px;
}

h2 small {
  font-weight: normal;
  color: #888;
  display: block;
}

h3 {
  font-size: 18px;
  line-height: 32px;
  font-weight: 600;
  margin-top: 0;
  letter-spacing: 0.25px;
}

p {
  font-size: 14px;
  line-height: 24px;
}
/* Form */

.group {
  position: relative;
  margin-bottom: 45px;
}

input {
  font-family: Avenir;
  font-size: 18px;
  font-weight: 600;
  color: #5D7079;
  padding: 10px 15px;
  display: block;
  height: 54px;
  width: 415px;
  border: 1px solid #D3D5D8;
  border-radius: 3px;
}
/* LABEL */

label {
  color: #223049;
  font-size: 18px;
  font-weight: 600;
  position: absolute;
  pointer-events: none;
  left: 15px;
  top: 15px;
  -webkit-transition: all 200ms cubic-bezier(0.4, 0.0, 0.25, 1);
  -webkit-transition: all 200ms cubic-bezier(0.4, 0.0, 0.25, 1.4);
  -moz-transition: all 200ms cubic-bezier(0.4, 0.0, 0.25, 1.4);
  -o-transition: all 200ms cubic-bezier(0.4, 0.0, 0.25, 1.4);
  transition: all 200ms cubic-bezier(0.4, 0.0, 0.25, 1.4);
}

/* Active state */

input:focus + label,
input:valid + label {
  top: -25px;
  left: 0;
  font-size: 14px;
}

input:focus + label {
  color: #00B9FF;
}

input:focus {
  border: 1px solid #00B9FF;
  padding: 10px 20px 10px 15px;
  font-family: Avenir;
  font-weight: 600;
  color: #223049;
  outline: none;
}

/* HELP */


.group > .tooltip {
  position: absolute;
  top: 0;
  left: 465px;
  width: 415px;
  opacity: 0;
  transition: opacity 200ms;
}

.content {
  border-radius: 3px;
  padding: 40px;
  border: 1px solid #00B9FF;
  color: #00B9FF;
  background-color: #F2FBFF;
  z-index: 2;
  position: relative;
}

.line {
  border-top: 1px solid #00B9FF;
  position: absolute;
  width: 100px;
  top: 26px;
  left: 0;
  -webkit-transition: left 200ms cubic-bezier(0.4, 0.0, 0.25, 1);
  -webkit-transition: left 200ms cubic-bezier(0.4, 0.0, 0.25, 1.4);
  -moz-transition: left 200ms cubic-bezier(0.4, 0.0, 0.25, 1.4);
  -o-transition: left 200ms cubic-bezier(0.4, 0.0, 0.25, 1.4);
  transition: left 200ms cubic-bezier(0.4, 0.0, 0.25, 1.4);
  
  > .circle {
    border-radius: 50%;
    height: 9px;
    width: 9px;
    background-color: #00B9FF;
    margin-top: -5px;
  }
}

input:focus ~ .tooltip {
  opacity:100;
  
  .line {
  left: -80px;
  }
}

.tooltip > p {
  margin: 0;
}

/* BUTTON */

button {
  width: 415px;
  border: none;
  border-radius: 3px;
  outline: none;
  cursor: pointer;
  text-transform: uppercase;
  padding: 10px 20px 10px 20px;
  font-family: Avenir;
  font-weight: 600;
    -webkit-transition: all 200ms ease;
  -webkit-transition: all 200ms ease;
  -moz-transition: all 200ms ease;
  -o-transition: all 200ms ease;
  transition: all 200ms ease;
}

.large {
  height: 54px;
  font-size: 18px;
}

.primary {
  color: #fff;
  background-color: #4DBA38;
}
.sec {
  color: #fff;
  background-color: red;
}
.delete_b {
  color: #fff;
  background-color: #1E90FF;
}
button:focus, button:hover {
  background-color:#B0C4DE

;
}

    </style>
<body>



<div class="container">
  
<?php
                  include_once('profileDb.php');	
                  $db= new db_profile;
                    session_start();
                  $res=$db->getUserInfo($_SESSION['uid']);
                  $row=mysqli_fetch_array($res); 
                  if (isset ($_POST['pin'])) {
                    $res=$db->verifPin($_POST['pin'],$_SESSION['uid']);
                    if (mysqli_num_rows($res)==0) {
                      echo'
                      <script>swal(
                        "Code PIN was wrong",
                         "Try again",
                         "error"
                      ).then(function() {
                        window.location = "edit.php";
                      });</script>
                      ';
                      exit();
                    }else
                      {
                        header ("location: deleteP.php");
                      }
                  }
                  if (isset($_POST['pwd'])) {
                  
                  $res2=$db->verifPwd($_SESSION['uid'],$_POST['pwd']);
                  $count=mysqli_num_rows($res2);
                  if ($count==0) {
                    echo '
                    <script>swal(
                      "Password was wrong",
                       "Try again",
                       "error"
                    )</script>
                    ';
                  }
                  else {
                    $res_name=$db->verifName($_SESSION['uid'],$_POST['nom']);
                    $count_name=mysqli_num_rows($res_name);

                    $res_lname=$db->verifLName($_SESSION['uid'],$_POST['lnom']);
                    $count_lname=mysqli_num_rows($res_lname);

                    $res_tel=$db->verifTel($_SESSION['uid'],$_POST['tel']);
                    $count_tel=mysqli_num_rows($res_tel);

                    $res_adr=$db->verifAdr($_SESSION['uid'],$_POST['adr']);
                    $count_adr=mysqli_num_rows($res_adr);

                    $res_dt=$db->verifDt($_SESSION['uid'],$_POST['dt']);
                    $count_dt=mysqli_num_rows($res_dt);
                    
                    if ($_POST['gender']=='f' || $_POST['gender']=='F' || $_POST['gender']=='h' || $_POST['gender']=='H' ||  $_POST['gender']=='required')  {
                    $res_gender=$db->verifGen($_SESSION['uid'],$_POST['gender']);
                    $count_gender=mysqli_num_rows($res_gender);
                    if ($count_gender==0) $res1=$db->editGender($_SESSION['uid'],$_POST['gender']);
                    }
                    else 
                    {
                      echo '
                      <script>swal(
                        "Somthing wrong",
                         "Try again",
                         "error"
                      ).then(function() {
                        window.location = "edit.php";
                      });</script>
                      ';
                      
                      exit();
                    }
                      if (($_POST ['answ'])!=NULL) {
                        $res1=$db->editAnsw($_SESSION['uid'],$_POST['answ']);
                      }
                      if ($count_name==0) $res1=$db->editName($_SESSION['uid'],$_POST['nom']);
                      if ($count_lname==0) $res1=$db->editLName($_SESSION['uid'],$_POST['lnom']);
                      if (is_uploaded_file($_FILES['photo']['tmp_name'])) {
                        $file=file_get_contents($_FILES['photo']['tmp_name']) ;
                        $res1=$db->editPhoto($_SESSION['uid'],$file);

                      }
                      if ($count_adr==0) $res1=$db->editAdr($_SESSION['uid'],$_POST['adr']);
                      if ($count_tel==0) $res1=$db->editTel($_SESSION['uid'],$_POST['tel']);
                      if ($count_dt==0) $res1=$db->editDateNais($_SESSION['uid'],$_POST['dt']);
                      if (isset($_POST['mail'])) {
                        $res2=$db->verifMail($_POST['mail'],$_SESSION['uid']);
                        if (mysqli_num_rows($res2)==0){
                        $res1=$db->editMail($_SESSION['uid'],$_POST['mail']);}
                        else{
                        echo '
                    <script>swal(
                      "Mail already used",
                       "Try another one",
                       "error"
                    ).then(function() {
                      window.location = "edit.php";
                    });</script>
                    ';
                    exit();
                    }
                      }

                      if (($_POST['newpwd'])!=NULL) {
                        if ($_POST ['oldpwd']!=$_POST['pwd']) {
                          echo '
                      <script>swal(
                        "Password was wrong",
                         "Try again",
                         "error"
                      ).then(function() {
                        window.location = "edit.php";
                      });</script>
                      ';
                      exit();
                        }
                        else {
                          $res=$db->editPwd ($_SESSION['uid'],$_POST ['newpwd']) ;
                          $res1=$db->editDatePwd($_SESSION['uid']);
                        }
                      }


                      echo '
                      <script>swal(
                        "Infomation Saved Succefully",
                         "",
                         "success"
                      ).then(function() {
                        window.location = "profile.php";
                      });</script>';



                  } 
                }
                  ?>

  
  <form method="post" enctype="multipart/form-data" id="1" >
 <table size="2">

    <tr>
<td><h1>Profile Setting :</h1></td>
</tr>
        <tr>
            <td>
    <div class="group">      
      <input type="text" name="nom" value=<?php echo $row['nom_c']  ?>  required>
      <label>First Name</label>
    </div>  
        </td>
        <td>
    <div class="group">      
      <input name="lnom" type="text" value=<?php echo $row['pren_c']  ?>  required>
      <label>Last Name</label>
    </div>
    </td>
</tr>

    <tr>
        <td>
     <div class="group">      
      <input type="text" name="dt" value=<?php echo $row['date_nais_c']  ?>  required>
      <label>Date of birth (YY-MM-DD)</label>
    </div>
</td>
<td>
<div class="group">      
      <input type="text" name="gender" value=<?php echo $row['gender_c']  ?>  required>
      <label>Gender (F/H)</label>
    </div>
</td>
</tr>
<tr>

    <td>
    <div class="group">
    <input name="photo" type="file" > <br>
    <?php
     
      echo '<img class="pdp_c"  width="200" height="200" src="data:image/jpeg;base64,'.base64_encode( $row["photo_c"] ).'"/>';
    ?>
    <h2>Change your profile's picture if you want ...</h2>
    </div>
</td>

</tr>
<tr>
<td><h1>Account Setting :</h1></td>
</tr>
        <tr>
            <td>
    <div class="group">      
      <input name="mail" type="text" value=<?php echo $row['mail_c']  ?>  required>
      <label>Email</label>
    </div>  
        </td>
</tr>
<tr>
</tr>
    <tr>
        <td>
     <div class="group">      
      <input name="oldpwd" type="password" >
      <label>Old Password</label>
    </div>
</td>
<td>
<div class="group">      
      <input name="newpwd" type="password">
      <label>New Password</label>
    </div>
</td>
</tr>
<tr>
            <td>
    <div class="group">      
      <input type="text" disabled>
      <label>How many pets do you have ?</label>
    </div>  
        </td>
        <td>
    <div class="group">      
      <input name="answ" type="text" >
      <label>New Ansewer</label>
    </div>  
        </td>
</tr>


<td><h1>Contact Setting :</h1></td>
</tr>
        <tr>
            <td>
    <div class="group">      
      <input name="tel" type="text" value=<?php echo $row['num_c']  ?>  required>
      <label>Phone Number</label>
    </div>  
        </td>
        <td>
    <div class="group">      
      <input name="adr" type="text" value=<?php echo $row['country_c'] ?>  required>
      <label>Country</label>
    </div>  
        </td>
</tr>



<tr>
<td><h1>Information Account : </h1></td>
</tr>
<tr>
<td><div class="group">    
<?php 
 if ($row['last_pwd_m']=='0000-00-00 00:00:00') {
  echo '
  <input type="text" value="Last change password : not change yet" disabled>';
  
}
else
    echo '
      <input type="text" value="Last change password : '.$row['last_pwd_m'].'" disabled>';
      ?>
    </div></td>

    <td><div class="group">      
    <?php 
   
    echo '
      <input type="text" value="Date of Join : '.$row['date_rec_c'].'" disabled>';
      ?>
    </div></td>
</tr>
<tr>
<td><h1>Confirm modification : </h1></td>
</tr>
<tr>
<td><div class="group">      
      <input type="password" name="pwd" required>
      <label>Set your password to confirm</label>
    </div></td>
</tr>

    <tr>
        <td>
    <div class="group">      
      <button onclick="window.location='edit.php';" class="large primary">SAVE</button>
    </div>
</td>
<td>
    <div class="group">      
      <button onclick="window.location='profile.php';" class="large sec">CANCEL</button>
    </div>
</td>
</tr>

    <table>
  </form>
  <form id="2" method="POST" >
    <table>
    <tr>
<td><h1>Delete Account : </h1></td><br>
</tr>
<tr>
     
     <td> <div class="group">      
      <input type="password" name="pin" required>
      <label>Set your code pin to confirm delete</label>
    </div>
    </td>
    <td>
<div class="group">      
      <button type="submit" onclick="window.location='edit.php';" class="large delete_b">DELETE</button>
    </div>
</td>
  </tr>
    </table>
</form>
</div>
</body>
</html>