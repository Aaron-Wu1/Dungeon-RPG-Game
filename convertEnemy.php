<?php
session_start();
require_once "../config.php";
try{
$dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
	$sth = $dbh ->prepare("SELECT name, skill_1, health FROM enemy WHERE tower_NUM = :tower_num");
	$sth->bindValue(':tower_num', $_SESSION['tower_num']);
	$sth->execute();
	$bosses =$sth->fetchAll();
}
catch (PDOException $e) {
    echo "<p>Error: {$e->getMessage()}</p>";
}
	class enemy{
		public function name(){
			return $bosses[0]['name'];
		}
		public function health(){
			return $bosses[0]['health'];
		}
		public function skill_1(){
			return $bosses[0]['skill_1'];
		}
	}
	$enemy = new enemy();
	$enemy->name = $bosses[0]['name'];
	$enemy->health = $bosses[0]['health'];
	$enemy->skill_1 = $bosses[0]['skill_1'];
	//$enemy->skill_1 = ;
	//$enemy->skill_1 = ;

echo json_encode($enemy);
?>