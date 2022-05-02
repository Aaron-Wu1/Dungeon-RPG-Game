<?php
session_start();
require_once "../config.php";
$sn = $_REQUEST["skillnum"];
$skill = $_REQUEST["skill"];
$skillname ="skill_{$skill}";
var_dump($skill);
//var_dump($skillname);
try{
$dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
if($_REQUEST["skillnum"]== 1){
		$sth = $dbh ->prepare("UPDATE players SET skill_1 = :skill WHERE name = :user");
		$sth->bindValue(':user', $_SESSION['name']);
	$sth->bindParam(':skill', $skill);
	$sth->execute();
	$a =$sth->fetchAll();
	//echo $_SESSION['name'];
	//var_dump($a);

}
if($_REQUEST["skillnum"] == 2){
		$sth = $dbh ->prepare("UPDATE players SET skill_2 = :skill WHERE name = :user");
		$sth->bindValue(':user', $_SESSION['name']);
	$sth->bindParam(':skill', $skill);
	$sth->execute();
	$a =$sth->fetchAll();
	//echo $_SESSION['name'];
	//var_dump($a);

}

if($_REQUEST["skillnum"] == 3){
		$sth = $dbh ->prepare("UPDATE players SET skill_3 = :skill WHERE name = :user");
		$sth->bindValue(':user', $_SESSION['name']);
	$sth->bindParam(':skill', $skill);
	$sth->execute();
	$a =$sth->fetchAll();
	//echo $_SESSION['name'];
	//var_dump($a);

}
if($_REQUEST["skillnum"] == 4){
		$sth = $dbh ->prepare("UPDATE players SET skill_4 = :skill WHERE name = :user");
		$sth->bindValue(':user', $_SESSION['name']);
	$sth->bindParam(':skill', $skill);
	$sth->execute();
	$a =$sth->fetchAll();
	//echo $_SESSION['name'];
	//var_dump($a);
}
}
catch (PDOException $e) {
    echo "<p>Error: {$e->getMessage()}</p>";
}
?>