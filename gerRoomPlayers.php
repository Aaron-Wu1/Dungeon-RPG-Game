<?php
<?php

session_start();
require_once "../config.php";
$damage = 0;
try{
$dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
	$sth = $dbh ->prepare("SELECT skill_1t, skill_2t, skill_3t, skill_4t FROM players WHERE room_NUM = :room AND name != :name");
		$sth->bindValue(':name', $_SESSION["name"]);
	$sth->bindValue(':room', $_SESSION["room"]);
	$sth->execute();
	$player =$sth->fetchAll();
foreach ($player as $key =>$value) {
	$damage += $value['skill_1t']+  $value['skill_2t']+ $value['skill_3t']+ $value['skill_4t'];
}
//skills
/*	$sth = $dbh ->prepare("SELECT file_name FROM playerAvatars JOIN players ON player_Avatar_id = id");
	$sth->execute();
	$players =$sth->fetchAll();*/

}
catch (PDOException $e) {
    echo "<p>Error: {$e->getMessage()}</p>";
}



echo json_encode($damage);
?>


?>