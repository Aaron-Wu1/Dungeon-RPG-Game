<?php

session_start();
require_once "../config.php";
try{
	$dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
	$sth = $dbh ->prepare("SELECT room_NUM FROM players WHERE name =:user ");
	$sth->bindValue(':user', $_SESSION['name']);
	//$sth->bindValue(':room_num', $_GET['room']);
	$sth->execute();
	$room_players =$sth->fetch();
$dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
	$sth = $dbh ->prepare("SELECT name, is_HOST, room_bossHP, current_tower FROM players WHERE room_NUM = :room AND is_HOST = 1");
	$sth->bindValue(':room', $room_players['room_NUM']);
	$sth->execute();
	$player =$sth->fetchAll();

	

}
catch (PDOException $e) {
    echo "<p>Error: {$e->getMessage()}</p>";
}
	class player{
		public function name(){
			return $player['0']['name'];
		}
		public function health(){
			return $player['0']['health'];
		}
		public function file_name(){
			return $player['0']['skill_1'];
		}

		
		public function isHOST(){
			return $player['0']['is_HOST'];
		}
		public function bossHP()
{
	return $player['0']['room_bossHP'];
}
public function tower(){
	return $player['0']['current_tower'];
}
	}



	$user = new player();
	$user->name = $_SESSION["name"];
	$user->isHOST = $player['0']['is_HOST']; 
	$user->bossHP = $player['0']['room_bossHP'];
	$user->tower = $player['0']['current_tower'];
echo json_encode($user);
?>