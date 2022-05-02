<?php
session_start();
require_once "../config.php";
$tower = $_REQUEST["tower"];
$health = $_REQUEST["health"];
try{
$dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
	$sth = $dbh ->prepare("UPDATE enemy SET health = :health WHERE tower_NUM = :tower");
	$sth->bindValue(':tower', $tower);
	$sth->bindValue(':health', $health);
	$sth->execute();
	$a =$sth->fetchAll();

		//echo $a['0']['skill_' + $skill];
}
catch (PDOException $e) {
    echo "<p>Error: {$e->getMessage()}</p>";
}
?>