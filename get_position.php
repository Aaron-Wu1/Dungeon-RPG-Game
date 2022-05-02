<?php
session_start();
require_once "../config.php";
try{
$dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
	$sth = $dbh ->prepare("SELECT room_NUM FROM players WHERE name = :user");
	$sth->bindValue(':user', $_SESSION['name']);
	$sth->execute();
	$player =$sth->fetch();
	//var_dump($player);
	//echo $_REQUEST['position'];
	$sth = $dbh ->prepare("SELECT health FROM players WHERE room_NUM=:room_num AND player_position = :position");
	//$sth->bindValue(':user', $_SESSION['name']);
	$sth->bindValue(':room_num', $player['0']);
	$sth->bindValue(':position', $_REQUEST['position']);
	$sth->execute();
	$room_players =$sth->fetchAll();
	//var_dump($room_players);
	if(count($room_players) == 0){
	}else{
		echo json_encode($room_players);
	}
}
catch (PDOException $e) {
    echo "<p>Error: {$e->getMessage()}</p>";
}
?>