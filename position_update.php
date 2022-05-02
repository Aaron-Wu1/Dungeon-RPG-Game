<?php
session_start();
require_once "../config.php";
$position = $_REQUEST["position"];
try{
$dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
	$sth = $dbh ->prepare("UPDATE players SET player_position = :position WHERE name = :user");
	$sth->bindValue(':user', $_SESSION['name']);
	$sth->bindValue(':position', $position);
	$sth->execute();
	$a =$sth->fetchAll();
		//echo $a['0']['skill_' + $skill];
}
catch (PDOException $e) {
    echo "<p>Error: {$e->getMessage()}</p>";
}
?>