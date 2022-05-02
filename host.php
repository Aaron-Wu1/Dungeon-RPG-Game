<?php
session_start();
require_once "../config.php";

try{
$dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
	$sth = $dbh ->prepare("UPDATE players
SET room_NUM = :room_num, is_HOST = true
WHERE name = :user");
	$sth->bindValue(':user', $_SESSION['name']);
	$sth->bindValue(':room_num', $_POST['room_num']);
	$sth->execute();
	$users =$sth->fetchAll();
	$room = $_POST['room_num'];
	$_SESSION['room'] = $room;
	$_SESSION['tower_num'] = 1;
		$sth = $dbh ->prepare("UPDATE players
SET current_tower = 1
WHERE name = :user");
	$sth->bindValue(':user', $_SESSION['name']);
	$sth->execute();
	header ('Location: http://atdpsites.berkeley.edu/awu/aic/project 2/playGame.php?room='.$room);

}
catch (PDOException $e) {
    echo "<p>Error: {$e->getMessage()}</p>";
}
?>