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
	$sth = $dbh ->prepare("SELECT name FROM players WHERE room_NUM=:room_num AND player_position = :position");
	//$sth->bindValue(':user', $_SESSION['name']);
	$sth->bindValue(':room_num', $player['0']);
	$sth->bindValue(':position', $_REQUEST['position']);
	$sth->execute();
	$room_player =$sth->fetch();
	$sth = $dbh ->prepare("SELECT health FROM players WHERE room_NUM=:room_num AND player_position = :position");
	//$sth->bindValue(':user', $_SESSION['name']);
	$sth->bindValue(':room_num', $player['0']);
	$sth->bindValue(':position', $_REQUEST['position']);
	$sth->execute();
	$room_health =$sth->fetch();
	$sth = $dbh ->prepare("SELECT player_Avatar_id FROM players WHERE room_NUM=:room_num AND player_position = :position");
	//$sth->bindValue(':user', $_SESSION['name']);
	$sth->bindValue(':room_num', $player['0']);
	$sth->bindValue(':position', $_REQUEST['position']);
	$sth->execute();
	$avatar =$sth->fetch();
	$sth = $dbh ->prepare("SELECT file_name FROM playerAvatars WHERE id = :id");
	//$sth->bindValue(':user', $_SESSION['name']);
	$sth->bindValue(':id', $avatar['player_Avatar_id']);
	$sth->execute();
	$room_file_name =$sth->fetch();
	//var_dump($room_file_name);
	//var_dump($room_players);
	if(count($room_player) == 0){
	}else{
		class attacked{
		public function names(){
			return $room_player['name'];
		}
		public function health(){
			return $room_health['health'];
		}
		public function file_name(){
			return $room_file_name['file_name'];
		}
	}
		$attacked = new attacked();
		$attacked->name = $room_player['name'];
		$attacked->health = $room_health['health'];
		$attacked->file_name = $room_file_name['file_name'];
		echo json_encode($attacked);
	}
}
catch (PDOException $e) {
    echo "<p>Error: {$e->getMessage()}</p>";
}
?>