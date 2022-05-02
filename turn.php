<?php
require_once "../config.php";

try{
$dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
	$sth = $dbh ->prepare("UPDATE players
SET 
WHERE name = :user");
	$sth->bindValue(':user', $_SESSION['name']);
	$sth->execute();
	$users =$sth->fetchAll();
}
catch (PDOException $e) {
    echo "<p>Error: {$e->getMessage()}</p>";
}
?>