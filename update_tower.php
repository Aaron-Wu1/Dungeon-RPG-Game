<?php
session_start();
require_once "../config.php";
$tower = $_REQUEST["tower"];
$name = $_SESSION["name"];
$_SESSION['tower_num'] = $tower;
$_SESSION['IS_TOWER_LOADED'] = false;
try{
$dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
	$sth = $dbh ->prepare("UPDATE players SET current_tower = :tower WHERE name = :user");
	$sth->bindValue(':user', $name);
	$sth->bindValue(':tower', $_REQUEST["tower"]);
	$sth->execute();
	$a =$sth->fetchAll();

		//echo $a['0']['skill_' + $skill];
}
catch (PDOException $e) {
    echo "<p>Error: {$e->getMessage()}</p>";
}
?>