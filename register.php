<?php
if(isset($_POST['username'])){
	if(isset($_POST['password'])){
$user = $_POST['username'];
//echo $user;
$pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
//echo $pass;

/*$player->name = $user;
$player->password = $pass;*/
require_once "../config.php";
try{
	$validated = false;
	$usernameTaken = false;
$dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
	$sth = $dbh ->prepare("SELECT name FROM players");
	$sth->execute();
	$alreadyRegisteredUsers = $sth->fetchAll();
if(!empty($alreadyRegisteredUsers)){
	//var_dump($_POST['password']);
	if(strpos($_POST['username'], " ")){

		header ('Location: http://atdpsites.berkeley.edu/awu/aic/project 2/index.php?sucess=false_space');
	}else{
		//echo $_POST['username'];
		foreach ($alreadyRegisteredUsers as $key =>$value) {
		
		//echo "{$key}";
		//echo "{$value['name']}";
		if($value['name'] ==$_POST['username']){

			//echo "in if statement name = username";
			///$usernameTaken = true;
			header ('Location: http://atdpsites.berkeley.edu/awu/aic/project 2/index.php?sucess=false_taken');
		}else if(strlen ($_POST['username']) >10){

			header ('Location: http://atdpsites.berkeley.edu/awu/aic/project 2/index.php?sucess=false_length');
		}else if(strlen($_POST['password']<=6)){
	
			header ('Location: http://atdpsites.berkeley.edu/awu/aic/project 2/index.php?sucess=false_password_length');
		}else{


			$validated= true;
			}
		}
	}
}else{
	$validated= true;
}


	if($validated == true){
	$sth = $dbh ->prepare("INSERT INTO players VALUES ('', :name, :password, '0', 'false', 'false', '0', '1', '1','0', '1', '1', '1', '1', '1', '1', '1', '0', '0', '0', '0','0')");
	$sth->bindValue(':name', $user);
	$sth->bindValue(':password', $pass);
	$sth->execute();
	//echo "sucessfully registered";
	$sth = $dbh ->prepare("SELECT name, password FROM players");
	$sth->bindValue(':name', $user);
	$sth->bindValue(':password', $pass);
	$sth->execute();
	$avatars =$sth->fetchAll();
	header ('Location: http://atdpsites.berkeley.edu/awu/aic/project 2/index.php?sucess=true');
/*	end($avatars);
	$key = key($avatars);
	for($i = 0; $i<= $key; $i++){
	echo "<img src=\"https://atdpsites.berkeley.edu/awu/AIC/project%202/assets/{$avatars[$i]['file_name']}\"  alt=\"avatar {$i}\">";
}*/
	}
}
catch (PDOException $e) {
    echo "<p>Error: {$e->getMessage()}</p>";
}
//$myJSON = json_encode($player);

}else{
	echo "<p>Please enter a password</p>";

}
}else{
	
	echo "<p>Please enter a valid username</p>";
}


?>