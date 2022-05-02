<?php
session_start();
require_once "../config.php";
$name = $_SESSION["name"];
$health = $_REQUEST["health"];
try{
$dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
	$sth = $dbh ->prepare("UPDATE players SET room_bossHP = :health WHERE name = :user");
	$sth->bindValue(':user', $name);
	$sth->bindValue(':health', $health);
	$sth->execute();
	$a =$sth->fetchAll();

		//echo $a['0']['skill_' + $skill];
}
catch (PDOException $e) {
    echo "<p>Error: {$e->getMessage()}</p>";
}
?>