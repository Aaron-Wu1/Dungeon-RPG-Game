<?php

session_start();
require_once "../config.php";
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
	<link rel="stylesheet" type="text/css" href="Styles.css">
	<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
	<script src="gameJS.js" type="text/javascript"></script>
	<style>
	body {
		min-width: 1362px;
	}
	.characterImages{
		width:auto;
		width: 151px;
    border: 1px solid black;
	}
	.characterImages img {
		height:150px;
		width:150px;
	}

	#skillsTable {
		height: 50px;
    /* float: left; */
    width: auto;
    margin-left: 216px;
    position: fixed;
    margin-top: 84px;

	}
	p {
		margin:0px;
		padding: 0px;
	}
	.skillSquares{
		float:left;
		width:124px;
		padding-left:5px;
		padding-right:5px;
	}
	.skillImages {
		border:1px solid black;
		z-index: -1;
	}
	#Knight{
		width:auto;
		margin-bottom: 158px;
	}
	#Rogue {
		width:auto;
		margin-bottom: 310px;
	}
	#Mage {
		width:auto;
		margin-bottom: 460px;
	}
	#Archer {
		width: auto;
	}
	.lock{
		position: absolute;
		z-index: 1;
		margin-top:1px;
		margin-left:1px;
	}
	.lockedImageDiv{
		
	}
	.choose{
		clear:left;
	}
	div#currentSkillsTable{
    position: fixed;
    height: 51px;
    width: 208px;
    border: 1px solid black;
    left: 1062px;
}
.currentSkills{
	height: 50px;
    width: 50px;
    border: 1px solid;
    float: left;
}

	</style>
	<title></title>
</head>
<body>
<div id = "player_name"></div>
<div id = "resetSkills">skills reset</div>
<div id="currentSkillsTable">
	<div class="currentSkills" id="currentSkill1"><img id = "current1" class = "currentS" src="" alt= "skill"/></div>
	<div class="currentSkills" id="currentSkill2"><img id = "current2" class = "currentS" src="" alt= "skill"/></div>
	<div class="currentSkills" id="currentSkill3"><img id = "current3" class = "currentS" src="" alt= "skill"/></div>
	<div class="currentSkills" id="currentSkill4"><img id = "current4" class = "currentS" src="" alt= "skill"/></div>
</div>
<?php
$dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
	$sth = $dbh ->prepare("SELECT id,class,skillName,skillIconFileName,tower_unlockable,damage,cooldown,locked FROM skills");
	$sth->execute();
	$allSKills = $sth->fetchAll();
	$sth = $dbh ->prepare("SELECT tower_NUM FROM players WHERE name = :name");
	$sth->bindValue(":name" , $_SESSION['name']);
	$sth->execute();
	$recordTowerNumber = $sth->fetch();
	echo "<div id=\"skillsTable\">";
	echo "<div id=\"Knight\">";
	foreach ($allSKills as $key => $skills){
		if($skills['class'] == "Knight" && $skills['tower_unlockable'] < $recordTowerNumber['tower_NUM']){
			echo "<span id=\"S{$skills['id']}\"  class=\"skillSquares\">   <p>{$skills['skillName']}</p>   <img class=\"skillImages\"src=\"./Assets/{$skills['skillIconFileName']}\">  </span>";
		}else if($skills['class'] == "Knight" && $skills['tower_unlockable'] >= $recordTowerNumber['tower_NUM']){
			echo "<span class=\"skillSquares\">   <p>{$skills['skillName']}</p>   <div class=\"lock\"><img src=\"./Assets/lock.png\" class=\"lock\"></div><div class=\"lockedImageDiv\"><img id=\"{$skills['skillName']}\" class=\"skillImages\"src=\"./Assets/{$skills['skillIconFileName']}\"></div>  </span>";
		}
	}
	echo "</div>";
	echo "<div id=\"Rogue\">";
	foreach ($allSKills as $key => $skills){
		if($skills['class'] == "Rogue" && $skills['tower_unlockable'] < $recordTowerNumber['tower_NUM']){
			echo "<span id=\"S{$skills['id']}\"  class=\"skillSquares\">   <p>{$skills['skillName']}</p>   <img class=\"skillImages\"src=\"./Assets/{$skills['skillIconFileName']}\">  </span>";
		}else if($skills['class'] == "Rogue" && $skills['tower_unlockable'] >= $recordTowerNumber['tower_NUM']){
			echo "<span class=\"skillSquares\">   <p>{$skills['skillName']}</p>   <div class=\"lock\"><img src=\"./Assets/lock.png\" class=\"lock\"></div><div class=\"lockedImageDiv\"><img id=\"{$skills['skillName']}\" class=\"skillImages\"src=\"./Assets/{$skills['skillIconFileName']}\"></div>  </span>";
		}
	}
	echo "</div>";

	echo "<div id=\"Archer\">";
	foreach ($allSKills as $key => $skills){
		if($skills['class'] == "Archer" && $skills['tower_unlockable'] < $recordTowerNumber['tower_NUM']){
			echo "<span id=\"S{$skills['id']}\" class=\"skillSquares\">   <p>{$skills['skillName']}</p>   <img class=\"skillImages\"src=\"./Assets/{$skills['skillIconFileName']}\">  </span>";
		}else if($skills['class'] == "Archer" && $skills['tower_unlockable'] >= $recordTowerNumber['tower_NUM']){
			echo "<span class=\"skillSquares\">   <p>{$skills['skillName']}</p>   <div class=\"lock\"><img src=\"./Assets/lock.png\" class=\"lock\"></div><div class=\"lockedImageDiv\"><img class=\"skillImages\"src=\"./Assets/{$skills['skillIconFileName']}\"></div>  </span>";
		}
	}
	echo "</div>";
		echo "<div id=\"Mage\">";
	foreach ($allSKills as $key => $skills){
		if($skills['class'] == "Mage" && $skills['tower_unlockable'] < $recordTowerNumber['tower_NUM']){
			echo "<span id=\"S{$skills['id']}\"  class=\"skillSquares\">   <p>{$skills['skillName']}</p>   <img class=\"skillImages\"src=\"./Assets/{$skills['skillIconFileName']}\">  </span>";
		}else if($skills['class'] == "Mage" && $skills['tower_unlockable'] >= $recordTowerNumber['tower_NUM']){
			echo "<span  id=\"{$skills['skillName']}\" class=\"skillSquares\">   <p>{$skills['skillName']}</p>   <div class=\"lock\"><img src=\"./Assets/lock.png\" class=\"lock\"></div><div class=\"lockedImageDiv\"><img class=\"skillImages\"src=\"./Assets/{$skills['skillIconFileName']}\"></div>  </span>";
		}
	}
	echo "</div>";
	echo "</div>";
?>	
<script>
var xmlhttp = new XMLHttpRequest();
var player_name ="";
xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        PlayerObj = JSON.parse(this.responseText);
        player_name = PlayerObj.name;
        console.log(player_name);
        document.getElementById('player_name').innerHTML = "Logged in as: " + player_name;
    }
};
xmlhttp.open("GET", "convert.php", true);
xmlhttp.send();

</script>
<h2 class="choose">Choose Your Class</h2>
<?php
$dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
	$sth = $dbh ->prepare("SELECT file_name FROM playerAvatars");
	$sth->execute();
	$playerAvatars =$sth->fetchAll();
	end($playerAvatars);
	$key = key($playerAvatars);
	for($i = 0; $i<= $key; $i++){
if($i == 0){
		echo "<div class=\"characterImages\"id =\"knight\"> <img src=\"https://atdpsites.berkeley.edu/awu/AIC/project%202/assets/{$playerAvatars[$i]['file_name']}\"  alt=\"avatar {$i}\"></div>";

}
if($i ==1){
echo "<div class=\"characterImages\"id =\"rogue\"><img src=\"https://atdpsites.berkeley.edu/awu/AIC/project%202/assets/{$playerAvatars[$i]['file_name']}\"  alt=\"avatar {$i}\"></div>";
}
if($i == 2){

echo "<div class=\"characterImages\"id =\"archer\"><img src=\"https://atdpsites.berkeley.edu/awu/AIC/project%202/assets/{$playerAvatars[$i]['file_name']}\"  alt=\"avatar {$i}\"></div>";
}
if($i == 3){

echo "<div class=\"characterImages\"id =\"mage\"><img src=\"https://atdpsites.berkeley.edu/awu/AIC/project%202/assets/{$playerAvatars[$i]['file_name']}\"  alt=\"avatar {$i}\"></div>";
		
}

	}

?>
<?php
if(!empty($_GET['class'])){
echo $_GET['class'];
	try{
$dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
	$sth = $dbh ->prepare("UPDATE players SET player_Avatar_id = :class WHERE name=:name");
	$sth->bindValue(':class', $_GET['class']);
	$sth->bindValue(':name', $_SESSION['name']);
	$sth->execute();
	$avatars =$sth->fetchAll();
	if(count($avatars) == 0){
	}else{
	end($avatars);
	$key = key($avatars);
	for($i = 0; $i<= $key; $i++){
		


	}
	}
}
catch (PDOException $e) {
    echo "<p>Error: {$e->getMessage()}</p>";
}

}


if(!empty($_GET['room'])){
	echo $_GET['room'];
try{
$dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
	$sth = $dbh ->prepare("SELECT name FROM players WHERE room_NUM=:room_num");
	//$sth->bindValue(':user', $_SESSION['name']);
	$sth->bindValue(':room_num', $_GET['room']);
	$sth->execute();
	$room_players =$sth->fetchAll();
	if(count($room_players) == 0){
	}else{
	end($room_players);
	$key = key($room_players);
	for($i = 0; $i<= $key; $i++){
		echo $room_players[$i]['name'];


	}
	}
}
catch (PDOException $e) {
    echo "<p>Error: {$e->getMessage()}</p>";
}
}
?>

<form action ="host.php" method ="post">
<p>Host</p>
<input type ="text" name="room_num">
<input type ="submit" value="login">
</form>

<form action ="join.php" method ="post">
<p>Join</p>
<input type ="text" name="room_num">
<input type ="submit" value="login">
</form>

<form action="signout.php" method ="post">
	<input type="submit" value = "Sign Out">
</form>



</body>
</html>