<html>

<?php
include_once('../php/tuniguidedb.php');		
$db= new db_login;
session_start();
if (isset($_SESSION['uid'])) {
$res=$db->getUserData($_SESSION['uid']);
$row=mysqli_fetch_array($res);

echo'
<head><title>'.$row["nom_c"].' '.$row["pren_c"].' | Tuniguide</title></head>';
} else { echo'
<head><title>Tuniguide</title></head>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<body>
		<script>swal(
			"Error 404",
			 "You must sign in for see this page",
			 "error"
		  ).then(function() {
			window.location = "../login/index.php";
		  });</script>
</body>
</html>
		' ;
exit();	}

	?>
<style>
@import url('https://fonts.googleapis.com/css?family=Quicksand:400,500,700&subset=latin-ext');
 html {
	background: url(bg_black.jpg) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}
 * {
	 box-sizing: border-box;
}
 body {
	 font-family: 'Quicksand', sans-serif;
	 color: #324e63;
}
 a, a:hover {
	 text-decoration: none;
}


 .icon {
	 display: inline-block;
	 width: 1em;
	 height: 1em;
	 stroke-width: 0;
	 stroke: currentColor;
	 fill: currentColor;
}
 .wrapper {
	 width: 100%;
	 width: 100%;
	 height: auto;
	 min-height: 100vh;
	 padding: 50px 20px;
	 padding-top: 100px;
	 display: flex;
	 
}
 @media screen and (max-width: 768px) {
	 .wrapper {
		 height: auto;
		 min-height: 100vh;
		 padding-top: 100px;
	}
}
 .profile-card {
	 width: 100%;
	 min-height: 460px;
	 margin: auto;
	 box-shadow: 0px 8px 60px -10px rgba(13, 28, 39, 0.6);
	 background: #fff;
	 border-radius: 12px;
	 max-width: 700px;
	 position: relative;
}
 .profile-card.active .profile-card__cnt {
	 filter: blur(6px);
}
 .profile-card.active .profile-card-message, .profile-card.active .profile-card__overlay {
	 opacity: 1;
	 pointer-events: auto;
	 transition-delay: 0.1s;
}

 .profile-card__img {
	 width: 150px;
	 height: 150px;
	 margin-left: auto;
	 margin-right: auto;
	 transform: translateY(-50%);
	 border-radius: 50%;
	 overflow: hidden;
	 position: relative;
	 z-index: 4;
	 box-shadow: 0px 5px 50px 0px #6c44fc;
}
 @media screen and (max-width: 576px) {
	 .profile-card__img {
		 width: 120px;
		 height: 120px;
	}
}
 .profile-card__img img {
	 display: block;
	 width: 100%;
	 height: 100%;
	 object-fit: cover;
	 border-radius: 50%;
}
 .profile-card__cnt {
	 margin-top: -35px;
	 text-align: center;
	 padding: 0 20px;
	 padding-bottom: 40px;
	 transition: all 0.3s;
}
 .profile-card__name {
	 font-weight: 700;
	 font-size: 24px;
	 color: #6944ff;
	 margin-bottom: 15px;
}
 .profile-card__txt {
	 font-size: 18px;
	 font-weight: 500;
	 color: #324e63;
	 margin-bottom: 15px;
}
 .profile-card__txt strong {
	 font-weight: 700;
}
 .profile-card-loc {
	 display: flex;
	 justify-content: center;
	 align-items: center;
	 font-size: 18px;
	 font-weight: 600;
}
 .profile-card-loc__icon {
	 display: inline-flex;
	 font-size: 27px;
	 margin-right: 10px;
}
 .profile-card-inf {
	 display: flex;
	 justify-content: center;
	 flex-wrap: wrap;
	 align-items: flex-start;
	 margin-top: 35px;
}
 .profile-card-inf__item {
	 padding: 10px 35px;
	 min-width: 150px;
}
 @media screen and (max-width: 768px) {
	 .profile-card-inf__item {
		 padding: 10px 20px;
		 min-width: 120px;
	}
}
 .profile-card-inf__title {
	 font-weight: 700;
	 font-size: 27px;
	 color: #324e63;
}
 .profile-card-inf__txt {
	 font-weight: 500;
	 margin-top: 7px;
}
 .profile-card-social {
	 margin-top: 25px;
	 display: flex;
	 justify-content: center;
	 align-items: center;
	 flex-wrap: wrap;
}
 .profile-card-social__item {
	 display: inline-flex;
	 width: 55px;
	 height: 55px;
	 margin: 15px;
	 border-radius: 50%;
	 align-items: center;
	 justify-content: center;
	 color: #fff;
	 background: #405de6;
	 box-shadow: 0px 7px 30px rgba(43, 98, 169, 0.5);
	 position: relative;
	 font-size: 21px;
	 flex-shrink: 0;
	 transition: all 0.3s;
}
 @media screen and (max-width: 768px) {
	 .profile-card-social__item {
		 width: 50px;
		 height: 50px;
		 margin: 10px;
	}
}
 @media screen and (min-width: 768px) {
	 .profile-card-social__item:hover {
		 transform: scale(1.2);
	}
}
 .profile-card-social__item.facebook {
	 background: linear-gradient(45deg, #3b5998, #0078d7);
	 box-shadow: 0px 4px 30px rgba(43, 98, 169, 0.5);
}
 .profile-card-social__item.twitter {
	 background: linear-gradient(45deg, #1da1f2, #0e71c8);
	 box-shadow: 0px 4px 30px rgba(19, 127, 212, 0.7);
}
 .profile-card-social__item.instagram {
	 background: linear-gradient(45deg, #405de6, #5851db, #833ab4, #c13584, #e1306c, #fd1d1d);
	 box-shadow: 0px 4px 30px rgba(120, 64, 190, 0.6);
}
 .profile-card-social__item.behance {
	 background: linear-gradient(45deg, #1769ff, #213fca);
	 box-shadow: 0px 4px 30px rgba(27, 86, 231, 0.7);
}
 .profile-card-social__item.github {
	 background: linear-gradient(45deg, #333, #626b73);
	 box-shadow: 0px 4px 30px rgba(63, 65, 67, 0.6);
}
 .profile-card-social__item.codepen {
	 background: linear-gradient(45deg, #324e63, #414447);
	 box-shadow: 0px 4px 30px rgba(55, 75, 90, 0.6);
}
 .profile-card-social__item.link {
	 background: linear-gradient(45deg, #d5135a, #f05924);
	 box-shadow: 0px 4px 30px rgba(223, 45, 70, 0.6);
}
 .profile-card-social .icon-font {
	 display: inline-flex;
}
 .profile-card-ctr {
	 display: flex;
	 justify-content: center;
	 align-items: center;
	 margin-top: 40px;
}
 @media screen and (max-width: 710px) {
	 .profile-card-ctr {
		 flex-wrap: wrap;
	}
}
 .profile-card__button {
	 background: none;
	 border: none;
	 font-family: 'Quicksand', sans-serif;
	 font-weight: 700;
	 font-size: 19px;
	 margin: 15px 35px;
	 padding: 15px 40px;
	 min-width: 201px;
	 border-radius: 50px;
	 min-height: 55px;
	 color: #fff;
	 cursor: pointer;
	 backface-visibility: hidden;
	 transition: all 0.3s;
}
 @media screen and (max-width: 768px) {
	 .profile-card__button {
		 min-width: 170px;
		 margin: 15px 25px;
	}
}
 @media screen and (max-width: 576px) {
	 .profile-card__button {
		 min-width: inherit;
		 margin: 0;
		 margin-bottom: 16px;
		 width: 100%;
		 max-width: 300px;
	}
	 .profile-card__button:last-child {
		 margin-bottom: 0;
	}
}
 .profile-card__button:focus {
	 outline: none !important;
}
 @media screen and (min-width: 768px) {
	 .profile-card__button:hover {
		 transform: translateY(-5px);
	}
}
 .profile-card__button:first-child {
	 margin-left: 0;
}
 .profile-card__button:last-child {
	 margin-right: 0;
}
 .profile-card__button.button--blue {
	 background: linear-gradient(45deg, #1da1f2, #0e71c8);
	 box-shadow: 0px 4px 30px rgba(19, 127, 212, 0.4);
}
 .profile-card__button.button--blue:hover {
	 box-shadow: 0px 7px 30px rgba(19, 127, 212, 0.75);
}
 .profile-card__button.button--orange {
	 background: linear-gradient(45deg, #d5135a, #f05924);
	 box-shadow: 0px 4px 30px rgba(223, 45, 70, 0.35);
}
 .profile-card__button.button--orange:hover {
	 box-shadow: 0px 7px 30px rgba(223, 45, 70, 0.75);
}
 .profile-card__button.button--red {
	 background: linear-gradient(45deg, #d5135a, #f05924);
	 box-shadow: 0px 4px 30px rgba(223, 45, 70, 0.35);
}
 .profile-card__button.button--red:hover {
	 box-shadow: 0px 7px 30px rgba(223, 45, 70, 0.75);
}
 .profile-card__button.button--green {
	 background: linear-gradient(45deg, #08eccc, #14b800);
	 box-shadow: 0px 4px 30px rgba(4, 216, 38, 0.35);
}
 .profile-card__button.button--green:hover {
	 box-shadow: 0px 7px 30px rgba(4, 216, 38, 0.75);
}
 .profile-card__button.button--gray {
	 box-shadow: none;
	 background: #dcdcdc;
	 color: #142029;
}
 .profile-card-message {
	 width: 100%;
	 height: 100%;
	 position: absolute;
	 top: 0;
	 left: 0;
	 padding-top: 130px;
	 padding-bottom: 100px;
	 opacity: 0;
	 pointer-events: none;
	 transition: all 0.3s;
}
 .profile-card-form {
	 box-shadow: 0 4px 30px rgba(15, 22, 56, 0.35);
	 max-width: 80%;
	 margin-left: auto;
	 margin-right: auto;
	 height: 100%;
	 background: #fff;
	 border-radius: 10px;
	 padding: 35px;
	 transform: scale(0.8);
	 position: relative;
	 z-index: 3;
	 transition: all 0.3s;
}
 @media screen and (max-width: 768px) {
	 .profile-card-form {
		 max-width: 90%;
		 height: auto;
	}
}
 @media screen and (max-width: 576px) {
	 .profile-card-form {
		 padding: 20px;
	}
}
 .profile-card-form__bottom {
	 justify-content: space-between;
	 display: flex;
}
 @media screen and (max-width: 576px) {
	 .profile-card-form__bottom {
		 flex-wrap: wrap;
	}
}
 .profile-card textarea {
	 width: 100%;
	 resize: none;
	 height: 210px;
	 margin-bottom: 20px;
	 border: 2px solid #dcdcdc;
	 border-radius: 10px;
	 padding: 15px 20px;
	 color: #324e63;
	 font-weight: 500;
	 font-family: 'Quicksand', sans-serif;
	 outline: none;
	 transition: all 0.3s;
}
 .profile-card textarea:focus {
	 outline: none;
	 border-color: #8a979e;
}
 .profile-card__overlay {
	 width: 100%;
	 height: 100%;
	 position: absolute;
	 top: 0;
	 left: 0;
	 pointer-events: none;
	 opacity: 0;
	 background: rgba(22, 33, 72, 0.35);
	 border-radius: 12px;
	 transition: all 0.3s;
}
 

</style>
<body>
<?php
	if (isset($_POST["feed"])) {
	$res=$db->addFeed($_SESSION['uid'],$_POST["feed"],$_POST["rate"]) ; 
	echo'
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

	<script>swal(
		"Your Feedback has been sent",
		 "",
		 "success"
	  ).then(function() {
		window.location = "profile.php";
	  });</script>
	';
	exit();
	}
?>
<div class="wrapper">
  
  <div class="profile-card js-profile-card">
    <div class="profile-card__img">
	<?php
		$res=$db->getUserPhoto($_SESSION['uid']);
		$row=mysqli_fetch_array($res);
		if( $row["photo_c"]==NULL) 
		echo '<img class="pdp_c" src="photo_not.png"/>' ;
	else 
      echo '<img class="pdp_c" src="data:image/jpeg;base64,'.base64_encode( $row["photo_c"] ).'"/>';
	  ?>
    </div>

    <div class="profile-card__cnt js-profile-cnt">
      <div class="profile-card__name"><?php echo $row["nom_c"]." ".$row["pren_c"] ?></div>
	  
      <div class="profile-card__txt">E-mail : <strong><?php echo $row["mail_c"] ?></strong></div>
	  <div class="profile-card__txt">Phone Number : <strong><?php echo $row["num_c"] ?></strong></div>
	  <div class="profile-card__txt">Birth Date : <strong><?php echo $row["date_nais_c"] ?></strong></div>
	  <div class="profile-card__txt">Gender : <strong><?php 
	 	if ($row["gender_c"]=='h' or $row["gender_c"]=='H')
		 echo 'Male';
		 else if ($row["gender_c"]=='f' or $row["gender_c"]=='F')
		 echo 'Female'; 
		 else echo 'No set yet'?></strong></div>
	  <div class="profile-card__txt">Date Of Join : <strong><?php echo $row["date_rec_c"] ?></strong></div>
      <div class="profile-card-loc">
        <span class="profile-card-loc__icon">
          <svg class="icon"><use xlink:href="#icon-location"></use></svg>
        </span>

        <span class="profile-card-loc__txt">
			<?php echo $row["country_c"] ?>
        </span>

      </div>
	  <button  onclick="window.location='../home/home.php';" class="profile-card__button button--gray">Page Home</button>


      <div class="profile-card-ctr">

        <button onclick="window.location='edit.php';" class="profile-card__button button--green">Edit Info</button>
        <button class="profile-card__button button--blue js-message-btn">Report Us</button>
		<form name="logout" action ="logout.php" method="post">
        <button class="profile-card__button button--red">Logout</button>
		</form>
      </div>
    </div>
	
	

    <div class="profile-card-message js-message">
      <form class="profile-card-form" method="POST" action="profile.php" enctype="multipart/form-data">
        <div class="profile-card-form__container">
          <textarea name="feed" value placeholder="Say something..."></textarea>
		  Thanks for less us your rate (/5) <select name="rate">
		 	 <option value="">CHOOSE</option>	
			  <option value="1">1/5</option>
			  <option value="2">2/5</option>
			  <option value="3">3/5</option>
			  <option value="4">4/5</option>
			  <option value="5">5/5</option>
</select>
        </div>

        <div class="profile-card-form__bottom">
          <button class="profile-card__button button--blue">
            Send
          </button>

          <button class="profile-card__button button--gray js-message-close">
            Cancel
          </button>
        </div>
      </form>

      <div class="profile-card__overlay js-message-close"></div>
    </div>

  </div>
</div>


<svg hidden="hidden">
  <defs>
    

    <symbol id="icon-location" viewBox="0 0 32 32">
      <title>location</title>
      <path d="M16 31.68c-0.352 0-0.672-0.064-1.024-0.16-0.8-0.256-1.44-0.832-1.824-1.6l-6.784-13.632c-1.664-3.36-1.568-7.328 0.32-10.592 1.856-3.2 4.992-5.152 8.608-5.376h1.376c3.648 0.224 6.752 2.176 8.608 5.376 1.888 3.264 2.016 7.232 0.352 10.592l-6.816 13.664c-0.288 0.608-0.8 1.12-1.408 1.408-0.448 0.224-0.928 0.32-1.408 0.32zM15.392 2.368c-2.88 0.192-5.408 1.76-6.912 4.352-1.536 2.688-1.632 5.92-0.288 8.672l6.816 13.632c0.128 0.256 0.352 0.448 0.64 0.544s0.576 0.064 0.832-0.064c0.224-0.096 0.384-0.288 0.48-0.48l6.816-13.664c1.376-2.752 1.248-5.984-0.288-8.672-1.472-2.56-4-4.128-6.88-4.32h-1.216zM16 17.888c-3.264 0-5.92-2.656-5.92-5.92 0-3.232 2.656-5.888 5.92-5.888s5.92 2.656 5.92 5.92c0 3.264-2.656 5.888-5.92 5.888zM16 8.128c-2.144 0-3.872 1.728-3.872 3.872s1.728 3.872 3.872 3.872 3.872-1.728 3.872-3.872c0-2.144-1.76-3.872-3.872-3.872z"></path>
      <path d="M16 32c-0.384 0-0.736-0.064-1.12-0.192-0.864-0.288-1.568-0.928-1.984-1.728l-6.784-13.664c-1.728-3.456-1.6-7.52 0.352-10.912 1.888-3.264 5.088-5.28 8.832-5.504h1.376c3.744 0.224 6.976 2.24 8.864 5.536 1.952 3.36 2.080 7.424 0.352 10.912l-6.784 13.632c-0.32 0.672-0.896 1.216-1.568 1.568-0.48 0.224-0.992 0.352-1.536 0.352zM15.36 0.64h-0.064c-3.488 0.224-6.56 2.112-8.32 5.216-1.824 3.168-1.952 7.040-0.32 10.304l6.816 13.632c0.32 0.672 0.928 1.184 1.632 1.44s1.472 0.192 2.176-0.16c0.544-0.288 1.024-0.736 1.28-1.28l6.816-13.632c1.632-3.264 1.504-7.136-0.32-10.304-1.824-3.104-4.864-5.024-8.384-5.216h-1.312zM16 29.952c-0.16 0-0.32-0.032-0.448-0.064-0.352-0.128-0.64-0.384-0.8-0.704l-6.816-13.664c-1.408-2.848-1.312-6.176 0.288-8.96 1.536-2.656 4.16-4.32 7.168-4.512h1.216c3.040 0.192 5.632 1.824 7.2 4.512 1.6 2.752 1.696 6.112 0.288 8.96l-6.848 13.632c-0.128 0.288-0.352 0.512-0.64 0.64-0.192 0.096-0.384 0.16-0.608 0.16zM15.424 2.688c-2.784 0.192-5.216 1.696-6.656 4.192-1.504 2.592-1.6 5.696-0.256 8.352l6.816 13.632c0.096 0.192 0.256 0.32 0.448 0.384s0.416 0.064 0.608-0.032c0.16-0.064 0.288-0.192 0.352-0.352l6.816-13.664c1.312-2.656 1.216-5.792-0.288-8.352-1.472-2.464-3.904-4-6.688-4.16h-1.152zM16 18.208c-3.424 0-6.24-2.784-6.24-6.24 0-3.424 2.816-6.208 6.24-6.208s6.24 2.784 6.24 6.24c0 3.424-2.816 6.208-6.24 6.208zM16 6.4c-3.072 0-5.6 2.496-5.6 5.6 0 3.072 2.528 5.6 5.6 5.6s5.6-2.496 5.6-5.6c0-3.104-2.528-5.6-5.6-5.6zM16 16.16c-2.304 0-4.16-1.888-4.16-4.16s1.888-4.16 4.16-4.16c2.304 0 4.16 1.888 4.16 4.16s-1.856 4.16-4.16 4.16zM16 8.448c-1.952 0-3.552 1.6-3.552 3.552s1.6 3.552 3.552 3.552c1.952 0 3.552-1.6 3.552-3.552s-1.6-3.552-3.552-3.552z"></path>
    </symbol>

  </defs>
</svg>


</body>
<script>
var messageBox = document.querySelector('.js-message');
  var btn = document.querySelector('.js-message-btn');
  var card = document.querySelector('.js-profile-card');
  var closeBtn = document.querySelectorAll('.js-message-close');

  btn.addEventListener('click',function (e) {
      e.preventDefault();
      card.classList.add('active');
  });

  closeBtn.forEach(function (element, index) {
     console.log(element);
      element.addEventListener('click',function (e) {
          e.preventDefault();
          card.classList.remove('active');
      });
  });
</script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</html>