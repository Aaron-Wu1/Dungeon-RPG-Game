<?php
session_start();

require_once "../config.php";
if(!isset($_SESSION["name"])){
	$username = $_POST['login_username'];
try{
$dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
	$sth = $dbh ->prepare("SELECT id, name, password, damage, skill_1 FROM players WHERE name =:user");
	$sth->bindValue(':user', $username);
	$sth->execute();
	$users =$sth->fetchAll();
	//var_dump($users);
	if(count($users) == 0){
		header ('Location: http://atdpsites.berkeley.edu/awu/aic/project 2/index.php?wrongpassword=true');
		exit;
	}
	end($users);
	$key = key($users);
	for($i = 0; $i<= $key; $i++){
		$hashed = password_hash($_POST['login_password'], PASSWORD_DEFAULT);
		//echo "<p>{$hashed}</p>";
	if(password_verify($_POST['login_password'], $users[$i]['password'])){
	/*class player{
		public function name(){
			return $users[$i]['name'];
		}
		public function damage(){
			return $users[$i]['damage'];
		}
	}
	$player = new player();
	$player->name = $users[$i]['name'];
	$player->damage = $users[$i]['damage'];
	echo "test";
	echo json_encode($player);*/
	$_SESSION["name"] = $_POST['login_username'];
	$_SESSION["skill_1"] = $users[$i]['skill_1'];
		header ('Location: http://atdpsites.berkeley.edu/awu/aic/project 2/game.php');
	echo $_SESSION["name"];

	}else{
		header ('Location: http://atdpsites.berkeley.edu/awu/aic/project 2/index.php?wrongpassword=true');
	}

}
}
catch (PDOException $e) {
    echo "<p>Error: {$e->getMessage()}</p>";
}

	if(empty($_POST)){
	header ('Location: http://atdpsites.berkeley.edu/awu/aic/project 2/');
	exit;
}else{

}



}else{
		header ('Location: http://atdpsites.berkeley.edu/awu/aic/project 2/game.php');
	echo "LOGGED IN AS ";
	echo $_SESSION["name"];

}

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php 


// if(isset($_POST['login_username'])){
// 	if(isset($_POST['login_password'])){
// $userL = $_SESSION["name"];
// $passL = $_POST['login_password'];
// echo $userL;


// try{
// $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
// 	$sth = $dbh ->prepare("SELECT id, name, password, damage FROM players WHERE name =:user");
// 	$sth->bindValue(':user', $userL);
// 	$sth->execute();
// 	$users =$sth->fetchAll();
// 	var_dump($users);
// 	end($users);
// 	$key = key($users);
// 	for($i = 0; $i<= $key; $i++){
// 		echo "{$passL}";
// 		echo "{$users[$i]['password']}";
// 		$hashed = password_hash($passL, PASSWORD_DEFAULT);
// 		echo "<p>{$hashed}</p>";
// 	if(password_verify($passL, $users[$i]['password'])){
// 	class player{
// 		public function name(){
// 			return $users[$i]['name'];
// 		}
// 		public function damage(){
// 			return $users[$i]['damage'];
// 		}
// 	}
// 	$player = new player();
// 	$player->name = $users[$i]['name'];
// 	$player->damage = $users[$i]['damage'];
// 	echo "test";
// 	echo json_encode($player);

// 	}else{
// 		echo "incorrect";
// 	}

// }
// }
// catch (PDOException $e) {
//     echo "<p>Error: {$e->getMessage()}</p>";
// }

// 		}else{
// 		echo"<script type=\"text/javascript\">";
// 	echo"$(document).ready(function() { ";
// 	echo "show('login');";
// 	echo"});";
// 	echo "</script>";
// 		}
// 	}else{
// 		echo"<script type=\"text/javascript\">";
// 	echo"$(document).ready(function() { ";
// 	echo "show('login');";
// 	echo"});";
// 	echo "</script>";
// 	}
// //echo $myJSON;

?>
<form action="signout.php" method ="post">
	<input type="submit" value = "Sign Out">


</body>
</html>