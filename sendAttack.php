<?php
session_start();
require_once "../config.php";
$skill = $_REQUEST["skill"];
$dmg = $_REQUEST["damage"];
//var_dump($skillname);
try{
$dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
if($_REQUEST["skill"] == 1){
		$sth = $dbh ->prepare("UPDATE players SET skill_1t= :dmg WHERE name = :user");
		$sth->bindValue(':user', $_SESSION['name']);
	$sth->bindParam(':dmg', $dmg);
	$sth->execute();
	$a =$sth->fetchAll();
	//echo $_SESSION['name'];
	
}
if($_REQUEST["skill"] == 2){
		$sth = $dbh ->prepare("UPDATE players SET skill_2t= :dmg  WHERE name = :user");
		$sth->bindValue(':user', $_SESSION['name']);
			$sth->bindParam(':dmg', $dmg);
	//$sth->bindParam(':skill', $skillname);
	$sth->execute();
	$a =$sth->fetchAll();
	//echo $_SESSION['name'];

}

if($_REQUEST["skill"] == 3){
		$sth = $dbh ->prepare("UPDATE players SET skill_3t= :dmg  WHERE name = :user");
		$sth->bindValue(':user', $_SESSION['name']);
			$sth->bindParam(':dmg', $dmg);
	//$sth->bindParam(':skill', $skillname);
	$sth->execute();
	$a =$sth->fetchAll();
	//echo $_SESSION['name'];
	//var_dump($a);

}
if($_REQUEST["skill"] == 4){
		$sth = $dbh ->prepare("UPDATE players SET skill_4t= :dmg  WHERE name = :user");
		$sth->bindValue(':user', $_SESSION['name']);
			$sth->bindParam(':dmg', $dmg);
	//$sth->bindParam(':skill', $skillname);
	$sth->execute();
	$a =$sth->fetchAll();
	//echo $_SESSION['name'];

}
	
}
catch (PDOException $e) {
    echo "<p>Error: {$e->getMessage()}</p>";
}

?>