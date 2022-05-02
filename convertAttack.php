<?php
session_start();
require_once "../config.php";
$skill = $_REQUEST["skill"];
$skillname ="skill_{$skill}";
//var_dump($skillname);
try{
$dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
if($_REQUEST["skill"] == 1){
		$sth = $dbh ->prepare("SELECT skill_1 FROM players WHERE name = :user");
		$sth->bindValue(':user', $_SESSION['name']);
	//$sth->bindParam(':skill', $skillname);
	$sth->execute();
	$a =$sth->fetchAll();
	//echo $_SESSION['name'];
	//var_dump($a);
			$sth = $dbh ->prepare("SELECT damage, cooldown, skillName, attackAnimationFileName FROM skills WHERE id = :id");
		$sth->bindValue(':id', $a['0']['skill_1']);
	$sth->execute();
	$b =$sth->fetchAll();
	//echo $b['0']['damage'];
}
if($_REQUEST["skill"] == 2){
		$sth = $dbh ->prepare("SELECT skill_2 FROM players WHERE name = :user");
		$sth->bindValue(':user', $_SESSION['name']);
	//$sth->bindParam(':skill', $skillname);
	$sth->execute();
	$a =$sth->fetchAll();
	//echo $_SESSION['name'];
	//var_dump($a);
				$sth = $dbh ->prepare("SELECT damage, cooldown, skillName, attackAnimationFileName FROM skills WHERE id = :id");
		$sth->bindValue(':id', $a['0']['skill_2']);
	$sth->execute();
	$b =$sth->fetchAll();
	//echo $b['0']['damage'];
}

if($_REQUEST["skill"] == 3){
		$sth = $dbh ->prepare("SELECT skill_3 FROM players WHERE name = :user");
		$sth->bindValue(':user', $_SESSION['name']);
	//$sth->bindParam(':skill', $skillname);
	$sth->execute();
	$a =$sth->fetchAll();
	//echo $_SESSION['name'];
	//var_dump($a);
				$sth = $dbh ->prepare("SELECT damage, cooldown, skillName, attackAnimationFileName FROM skills WHERE id = :id");
		$sth->bindValue(':id', $a['0']['skill_3']);
	$sth->execute();
	$b =$sth->fetchAll();
	//echo $b['0']['damage'];
}
if($_REQUEST["skill"] == 4){
		$sth = $dbh ->prepare("SELECT skill_4 FROM players WHERE name = :user");
		$sth->bindValue(':user', $_SESSION['name']);
	//$sth->bindParam(':skill', $skillname);
	$sth->execute();
	$a =$sth->fetchAll();
	//echo $_SESSION['name'];
	//var_dump($a);
				$sth = $dbh ->prepare("SELECT damage, cooldown, skillName, attackAnimationFileName FROM skills WHERE id = :id");
		$sth->bindValue(':id', $a['0']['skill_4']);
	$sth->execute();
	$b =$sth->fetchAll();
	//echo $b['0']['damage'];
}
	class attack{
		public function damage(){
			return $b['0']['damage'];
		}
		public function cooldown(){
			return $b['0']['cooldown'];
		}
		public function skillName(){
			return $b['0']['skillName'];
		}
		public function skill_1(){
			return $bosses[0]['skill_1'];
		}
		public function ani(){
$b['0']['attackAnimationFileName'];
}

	}
	$attack = new attack();
	$attack->damage = $b['0']['damage'];
	$attack->cooldown = $b['0']['cooldown'];
	$attack->skillName = $b['0']['skillName'];
	$attack->ani = $b['0']['attackAnimationFileName'];
	//$enemy->skill_1 = ;
	//$enemy->skill_1 = ;

echo json_encode($attack);

}
catch (PDOException $e) {
    echo "<p>Error: {$e->getMessage()}</p>";
}

?>