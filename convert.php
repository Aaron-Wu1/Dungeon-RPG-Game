<?php

session_start();
require_once "../config.php";
try{
$dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
	$sth = $dbh ->prepare("SELECT name, skill_1, skill_2, skill_3, skill_4, health, player_Avatar_id, is_HOST FROM players WHERE name = :name");
	$sth->bindValue(':name', $_SESSION["name"]);
	$sth->execute();
	$player =$sth->fetchAll();
	//var_dump($player);
	$sth = $dbh ->prepare("SELECT file_name FROM playerAvatars WHERE id = :id");
	$sth->bindValue(':id', $player['0']['player_Avatar_id']);
	$sth->execute();
	$avatar =$sth->fetchAll();

	$sth = $dbh ->prepare("SELECT skillIconFileName, skillName FROM skills WHERE id = :skill1");
	$sth->bindValue(':skill1', $player['0']['skill_1']);
	$sth->execute();
	$skill1_IMG =$sth->fetch();
//var_dump($skill1_IMG);
	$sth = $dbh ->prepare("SELECT skillIconFileName, skillName FROM skills WHERE id = :skill2");
	$sth->bindValue(':skill2', $player['0']['skill_2']);
	$sth->execute();
	$skill2_IMG =$sth->fetch();

	$sth = $dbh ->prepare("SELECT skillIconFileName, skillName FROM skills WHERE id = :skill3");
	$sth->bindValue(':skill3', $player['0']['skill_3']);
	$sth->execute();
	$skill3_IMG =$sth->fetch();

	$sth = $dbh ->prepare("SELECT skillIconFileName, skillName FROM skills WHERE id = :skill4");
	$sth->bindValue(':skill4', $player['0']['skill_4']);
	$sth->execute();
	$skill4_IMG =$sth->fetch();

	$sth = $dbh ->prepare("SELECT player_position FROM players WHERE name = :name");
		$sth->bindValue(':name', $_SESSION["name"]);
	$sth->execute();
	$position =$sth->fetch();

	$sth = $dbh ->prepare("SELECT player_class FROM players WHERE name = :name");
		$sth->bindValue(':name', $_SESSION["name"]);
	$sth->execute();
	$class =$sth->fetch();

//skills
/*	$sth = $dbh ->prepare("SELECT file_name FROM playerAvatars JOIN players ON player_Avatar_id = id");
	$sth->execute();
	$players =$sth->fetchAll();*/

}
catch (PDOException $e) {
    echo "<p>Error: {$e->getMessage()}</p>";
}
	class player{
		public function name(){
			return $player['0']['name'];
		}
		public function health(){
			return $player['0']['health'];
		}
		public function file_name(){
			return $player['0']['skill_1'];
		}

		public function skill_1(){
			return $player['0']['skill_1'];
		}
		public function skill_1img(){
			return $skill1_IMG['skillIconFileName'];
		}
						public function skill_1name(){
			return $skill1_IMG['skillName'];
		}

				public function skill_2(){
			return $player['0']['damage'];
		}

		public function skill_2img(){
			return $skill2_IMG['skillIconFileName'];
		}
						public function skill_2name(){
			return $skill2_IMG['skillName'];
		}

				public function skill_3(){
			return $player['0']['damage'];
		}

		public function skill_3img(){
			return $skill3_IMG['skillIconFileName'];
		}
						public function skill_3name(){
			return $skill3_IMG['skillName'];
		}

				public function skill_4(){
			return $player['0']['damage'];
		}

				public function skill_4img(){
			return $skill4_IMG['skillIconFileName'];
		}
						public function skill_4name(){
			return $skill4_IMG['skillName'];
		}
		public function isHOST(){
			return $player['0']['is_HOST'];
		}
public function position(){
			return $position['player_position'];
		}
		public function class(){
			return $class['player_class'];
		}
	}



	$user = new player();
	$user->name = $_SESSION["name"];
	$user->skill_1 = $player['0']['skill_1'];
	$user->file_name = $avatar['0']['file_name'];
	$user->health = $player['0']['health'];
	$user->skill_1img = $skill1_IMG['skillIconFileName'];
	$user->skill_2img = $skill2_IMG['skillIconFileName'];
	$user->skill_3img = $skill3_IMG['skillIconFileName'];
	$user->skill_4img = $skill4_IMG['skillIconFileName'];
	$user->skill_1name = $skill1_IMG['skillName'];
	$user->skill_2name = $skill2_IMG['skillName'];
	$user->skill_3name = $skill3_IMG['skillName'];
	$user->skill_4name = $skill4_IMG['skillName'];
	$user->isHOST = $player['0']['is_HOST']; 
	$user->position = $position['player_position'];
	$user->class = $class['player_class'];
echo json_encode($user);
?>