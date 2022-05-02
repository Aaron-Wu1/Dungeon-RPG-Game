<?php
session_start();

require_once "../config.php";
$hasHost = false;
try{
$dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
	$sth = $dbh ->prepare("SELECT room_NUM, is_HOST FROM players WHERE room_NUM = :room_num");
	//$sth->bindValue(':user', $_SESSION['name']);
	$sth->bindValue(':room_num', $_POST['room_num']);
	$sth->execute();
	$rooms =$sth->fetchAll();
	//var_dump($rooms);
	//var_dump(count($rooms));
	if(count($rooms) == 0){
		header ('Location: http://atdpsites.berkeley.edu/awu/aic/project 2/game.php?norooms=true');
		exit;
	}else{
	for($i = 0; $i<= count($rooms)-1; $i++){

		if($rooms[$i]['is_HOST']){
			$hasHost = true;
		}

	}
			if(!$hasHost){
	header ('Location: http://atdpsites.berkeley.edu/awu/aic/project 2/game.php?norooms=true');
				exit;
			}
			$sth = $dbh ->prepare("UPDATE players
	SET room_NUM = :room_num, is_HOST = false
	WHERE name = :user");
	$sth->bindValue(':user', $_SESSION['name']);
	$sth->bindValue(':room_num', $_POST['room_num']);
	$sth->execute();
	$room = $_POST['room_num'];
	$_SESSION['room'] = $room;
	$sth = $dbh ->prepare("SELECT current_tower FROM players WHERE room_NUM =:room_num AND is_HOST = true");
	$sth->bindValue(':room_num', $_POST['room_num']);
	$sth->execute();
	$tower =$sth->fetchAll();
	//var_dump($tower);
	$_SESSION['tower_num'] = $tower['0']['current_tower'];
	header ('Location: http://atdpsites.berkeley.edu/awu/aic/project 2/playGame.php?room='.$room);
		exit;
	}
}
catch (PDOException $e) {
    echo "<p>Error: {$e->getMessage()}</p>";
}
?>