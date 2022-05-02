<?php
session_start();
if(isset($_SESSION["name"])){
	header('Location: https://atdpsites.berkeley.edu/awu/aic/project%202/game.php');
}
?>
<!DOCTYPE html>
<html lang="en-US">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
	<link rel="stylesheet" type="text/css" href="Styles.css">
	<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
	<style>
		.warningText {
			color:red;
		}
		#entirebody{
			border:1px solid black;
			width: auto;
			padding-bottom: 41px;
		}
		#register{
			margin:0 auto;
			width:200px;
			text-align: center;
		}
		#login{
				margin:0 auto;
			width:200px;
			text-align: center;
		}
		/*#login input[type=submit], #register input[type=submit]{
			text-align: center;
		}*/
		h1, p {
			text-align: center;
		}
		input[type=submit]{
			margin-top:3px;
		}
	</style>
	<title>Project 2: Aaron &amp; Brian</title>
</head>

<body> 
<div id="entirebody">
<h1>Sign Up to play Den of the Ancients</h1>
<div id="register">

<form action ="register.php" method ="post">
<p>Username</p>
<input type ="text" name="username" maxlength="10" >
<?php 
if(isset($_GET['sucess'])){
if ($_GET['sucess'] == "false_space"){
	echo "<p class=\"warningText\">Please do not include spaces in your username</p>";
}else if($_GET['sucess'] == "false_length"){
	echo "<p class=\"warningText\">Please keep your username between 1 and 10 characters inclusive</p>";
}else if($_GET['sucess'] == "false_taken"){
	echo "<p class=\"warningText\">Sorry! Your username has already been taken</p>";
} 
}
?>
<p>Password</p>
<input type ="password" name="password" >
<?php
if(isset($_GET['sucess'])){
if($_GET['sucess'] == "false_password_length"){
	echo "<p class=\"warningText\">Sorry! Your password must be more than 6 characters</p>";
}
}
?>
<input type ="submit" value="register">
</form>
</div>
<!-- Log in -->
<p>or... if you already have an account...</p>
<div id ="login">
<form action ="login.php" method ="post">
<p>Username</p>
<input type ="text" name="login_username" maxlength="10">
<?php
if(isset($_GET['success'])){
if($_GET['success'] == "false_user_does_not_exist"){
	echo "<p class=\"warningText\">Account does not exist. Please register a new account</p>";
}else if($_GET['success'] == "false_length"){
	echo "<p class=\"warningText\">Your username should not be over 10 characters</p>";
}else if($_GET['success'] == "false_length_short"){
	echo "<p class=\"warningText\">Please enter a username</p>";
}else if ($_GET['success'] == "false_space"){
	echo "<p class=\"warningText\">You should not have spaces in your username</p>";
}
}
?>
<p>Password</p>
<input type ="password" name="login_password">
<?php
if(isset($_GET['success'])){
if($_GET['success'] == "false_wrong_password"){
	echo "<p class=\"warningText\">Incorrect Password</p>";
}
}
?>
<input type ="submit" value="login">
</form>
</div>




<!-- <?php
if(!isset($_SESSION["name"])){
	echo"<script type=\"text/javascript\">";
	echo"$(document).ready(function() { ";
	echo "show('register');";
	echo "show('login');";
	echo"});";
	echo "</script>";
}else{
	echo"<script type=\"text/javascript\">";
	echo"$(document).ready(function() { ";
	echo "hide('register');";
	echo "hide('login');";
	echo"});";
	echo "</script>";
}
?> -->



<!-- <div id= "characterSelection" class="hide">
<?php
require_once "../config.php";
try{
$dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
	$sth = $dbh ->prepare("SELECT file_name FROM playerAvatars");
	$sth->execute();
	$avatars =$sth->fetchAll();
	var_dump($avatars);
	end($avatars);
	$key = key($avatars);
	for($i = 0; $i<= $key; $i++){
	echo "<img src=\"https://atdpsites.berkeley.edu/awu/AIC/project%202/assets/{$avatars[$i]['file_name']}\"  alt=\"avatar {$i}\">";
}
}
catch (PDOException $e) {
    echo "<p>Error: {$e->getMessage()}</p>";
}

?> -->


<div id= "game" class="hide">
</div>



<!-- <?php
require_once "../config.php";
try{
$dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
	$sth = $dbh ->prepare("");
	$sth->execute();
	$parkamons =$sth->fetchAll();
	echo "";
}
catch (PDOException $e) {
    echo "<p>Error: {$e->getMessage()}</p>";
}
echo "session name: ";
if(isset($_SESSION["name"])){

echo $_SESSION["name"];
}else{
	echo "none";
}
?> -->



<!-- <form action="signout.php" method ="post">
	<input type="submit" value = "Sign Out">
</form> -->
</div>

</body>
</html>