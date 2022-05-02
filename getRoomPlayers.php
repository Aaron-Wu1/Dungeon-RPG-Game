<?php
session_start();
require_once "../config.php";
$damage = 0;
try{
$dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
	$sth = $dbh ->prepare("SELECT name, skill_1t, skill_2t, skill_3t, skill_4t FROM players WHERE room_NUM = :room AND name != :name");
		$sth->bindValue(':name', $_SESSION["name"]);
	$sth->bindValue(':room', $_SESSION["room"]);
	$sth->execute();
	$player =$sth->fetchAll();
foreach ($player as $key =>$value) {
	$damage += $value['skill_1t']+  $value['skill_2t']+ $value['skill_3t']+ $value['skill_4t'];
	$s1 = $value['skill_1t'];
	$s2 = $value['skill_2t'];
	$s3 = $value['skill_3t'];
	$s4 = $value['skill_4t'];
	if($s1 == 0){
	}else{
	$sth = $dbh ->prepare("UPDATE players SET skill_1t= 0 WHERE name = :user");
		$sth->bindValue(':user', $value['name']);
	$sth->execute();
	}
		if($s2 == 0){
	}else{
	$sth = $dbh ->prepare("UPDATE players SET skill_2t= 0 WHERE name = :user");
		$sth->bindValue(':user', $value['name']);
	$sth->execute();
	}
		if($s3 == 0){
	}else{
	$sth = $dbh ->prepare("UPDATE players SET skill_3t= 0 WHERE name = :user");
		$sth->bindValue(':user', $value['name']);
	$sth->execute();
	}
		if($s4 == 0){
	}else{
	$sth = $dbh ->prepare("UPDATE players SET skill_4t= 0 WHERE name = :user");
		$sth->bindValue(':user', $value['name']);
	$sth->execute();
	}
}
//skills
/*	$sth = $dbh ->prepare("SELECT file_name FROM playerAvatars JOIN players ON player_Avatar_id = id");
	$sth->execute();
	$players =$sth->fetchAll();*/

}
catch (PDOException $e) {
    echo "<p>Error: {$e->getMessage()}</p>";
}



echo json_encode($damage);
?>


