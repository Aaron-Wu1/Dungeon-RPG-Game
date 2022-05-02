<?php

session_start();
require_once "../config.php";
if(!isset($_SESSION['IS_TOWER_LOADED'])){
$_SESSION['IS_TOWER_LOADED'] = false;
//echo "reset";
}
if(isset($_SESSION['tower_num'])){
	if($_SESSION['tower_num'] > 5){
		header ('Location: http://atdpsites.berkeley.edu/awu/aic/project 2/gameWin.php');
	}
}
//echo $_SESSION['IS_TOWER_LOADED'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Play Game!</title>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
	<link href="Styles.css" type="text/css" rel="stylesheet" /> 
	<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
	<script src="Scripts.js" type="text/javascript"></script>
</head>
<body id="playGame">
<!-- <script>
var xmlhttp = new XMLHttpRequest();
var player_name ="";
xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        PlayerObj = JSON.parse(this.responseText);
        player_name = PlayerObj.name;
        console.log(player_name);
    }
};
xmlhttp.open("GET", "convert.php", true);
xmlhttp.send();

</script> -->
<div id ="savequit"><p>save and quit</p></div>
<div id ="quit"><p>quit</p></div>
<div id="scrollImage"><img src="./Assets/scroll.png" alt=""></div>
<div id="skill_1name"></div>
<div id="skill_2name"></div>
<div id="skill_3name"></div>
<div id="skill_4name"></div>
<button id="skill_1"><img  id="skill_1_img" src="" alt="skill_slot"></button>
<div id="cooldown1" class ="cooldown"></div>
<button id="skill_2"><img  id="skill_2_img" src="" alt="skill_slot"></button>
<div id="cooldown2" class ="cooldown"></div>
<button id="skill_3"><img  id="skill_3_img" src="" alt="skill_slot"></button>
<div id="cooldown3" class ="cooldown"></div>
<button id="skill_4"><img  id="skill_4_img" src="" alt="skill_slot"></button>
<div id="cooldown4" class ="cooldown"></div>
<!--<div id ="trigger"></div>-->
<div id="towerCounter"> <p>Tower:
<?php echo $_SESSION['tower_num'];
?>
</p></div>
<div id="topHit"><img id = "topHiti" src = "https://atdpsites.berkeley.edu/awu/AIC/project%202/assets/Untitled.png" alt ="skill" ></div>
<div id="closePlayerHit"></div>
<div id="middlePlayerHit"></div>
<div id="bottomPlayerHit"></div>
<div id="bossName"></div>
<div id="bottomHit"></div>
<script>

var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        console.log(this.responseText);
        IS_TOWER_LOADED = this.responseText;
        console.log(IS_TOWER_LOADED);
        //console.log(player_name);
       // document.getElementById('player_name').innerHTML = player_name;
    }
};
xmlhttp.open("GET", "tower_load_data.php", true);
xmlhttp.send();
if(!IS_TOWER_LOADED){
var xmlhttp = new XMLHttpRequest();
var player_name ="";
xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
       PlayerObj = JSON.parse(this.responseText);
        console.log(this.responseText);
        player_name = PlayerObj.name;
        player_health = PlayerObj.health;
        isHost = PlayerObj.isHOST;
        	console.log(player_name);
        	xmlhttp.open("GET", "update_player.php?name=" + PlayerObj.name + "&health=10000", true);
xmlhttp.send();
        document.getElementById("cpiplayerhealth").innerHTML = "health";
         document.getElementById("mpiplayerhealth").innerHTML = "health";
          document.getElementById("bpiplayerhealth").innerHTML = "health";

          document.getElementById("skill_1_img").src = 'https://atdpsites.berkeley.edu/awu/AIC/project%202/assets/' + PlayerObj.skill_1img; 
         document.getElementById("skill_2_img").src = 'https://atdpsites.berkeley.edu/awu/AIC/project%202/assets/' + PlayerObj.skill_2img; 
          document.getElementById("skill_3_img").src = 'https://atdpsites.berkeley.edu/awu/AIC/project%202/assets/' + PlayerObj.skill_3img; 
          document.getElementById("skill_4_img").src = 'https://atdpsites.berkeley.edu/awu/AIC/project%202/assets/' + PlayerObj.skill_4img; 

          document.getElementById("skill_1name").innerHTML = PlayerObj.skill_1name; 
         document.getElementById("skill_2name").innerHTML = PlayerObj.skill_2name; 
          document.getElementById("skill_3name").innerHTML = PlayerObj.skill_3name; 
          document.getElementById("skill_4name").innerHTML = PlayerObj.skill_4name; 
        //console.log(player_name);
       // document.getElementById('player_name').innerHTML = player_name;

    }
};
xmlhttp.open("GET", "convert.php", true);
xmlhttp.send();

var xmlhttp = new XMLHttpRequest();
var Enemy ="";
xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        EnemyObj = JSON.parse(this.responseText);
        console.log("test");
        Enemy = EnemyObj.name;
        Enemy_health = EnemyObj.health;
        document.getElementById("bosshealth").innerHTML = Enemy_health;
         document.getElementById("bossName").innerHTML = Enemy;
        if(isHost){
        	var xmlhttp = new XMLHttpRequest();
        	xmlhttp.open("GET", "updateRoomBossHP.php?health=" + Enemy_health, true);
xmlhttp.send();
        }
//console.log(this.responseText);
       // console.log(Enemy_health);
      //  document.getElementById('player_name').innerHTML = player_name;
    }
};
xmlhttp.open("GET", "convertEnemy.php", true);
xmlhttp.send();
}
</script>
<?php
//echo $_SESSION['tower_num'];
try{
$dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
	$sth = $dbh ->prepare("SELECT name, file_name FROM enemy WHERE tower_NUM = :tower");
	$sth->bindValue(':tower', $_SESSION['tower_num']);
	$sth->execute();
	$e =$sth->fetchAll();
	//var_dump($e);
	if(count($e) == 0){
	}else{
	end($e);
	$key = key($e);
	for($i = 0; $i<= $key; $i++){
		//echo $room_players[$i]['name'];
		echo "<div id=\"boss\"><img id =\"bossimg\" src=\"https://atdpsites.berkeley.edu/awu/AIC/project%202/assets/{$e[$i]['file_name']}\" alt=\"character\"><div id=\"bosshealth\"></div></div>";
	}
}
}
catch (PDOException $e) {
    echo "<p>Error: {$e->getMessage()}</p>";
}

?>
<?php 

if(!empty($_GET['place'])){
	echo $_GET['place'];
try{
$dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
	$sth = $dbh ->prepare("SELECT file_name FROM playerAvatars JOIN players ON player_Avatar_id= playerAvatars.id WHERE players.name = :user");
	$sth->bindValue(':user', $_SESSION['name']);
	$sth->execute();
	$avatar =$sth->fetchAll();
	//var_dump($avatar);
	if(count($avatar) == 0){
	}else{
	end($avatar);
	$key = key($avatar);
	for($i = 0; $i<= $key; $i++){
		//echo $room_players[$i]['name'];
/*if($_GET['place'] == 1){
echo "<div id=\"closePlayerImage\"><img src=\"https://atdpsites.berkeley.edu/awu/AIC/project%202/assets/{$avatar[$i]['file_name']}\"  alt=\"avatar {$i}\" alt=\"character\"></div>";
}*/
/*if($_GET['place'] == 2){
echo "<div id=\"middlePlayerImage\"><img src=\"https://atdpsites.berkeley.edu/awu/AIC/project%202/assets/{$avatar[$i]['file_name']}\"  alt=\"avatar {$i}\" alt=\"character\"></div>";
}
if($_GET['place'] == 3){
echo "<div id=\"bottomPlayerImage\"><img src=\"https://atdpsites.berkeley.edu/awu/AIC/project%202/assets/{$avatar[$i]['file_name']}\"  alt=\"avatar {$i}\" alt=\"character\"></div>";
}*/
	}
	}
}
catch (PDOException $e) {
    echo "<p>Error: {$e->getMessage()}</p>";
}
}
?>
<div id="closePlayerImage"><div id ="cpiplayerhealth"></div><img  id="cpi" src="" alt="character_slot"><div id ="cpiplayername"></div></div>
<div id="middlePlayerImage"><div id ="mpiplayerhealth"></div><img  id="mpi" src="" alt="character_slot"><div id ="mpiplayername"></div></div>
<div id="bottomPlayerImage"><div id ="bpiplayerhealth"></div><img  id="bpi" src="" alt="character_slot"><div id ="bpiplayername"></div></div>

<?php 

if(!empty($_GET['room'])){
	//echo $_GET['room'];
try{
$dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
	$sth = $dbh ->prepare("SELECT name FROM players WHERE room_NUM=:room_num");
	//$sth->bindValue(':user', $_SESSION['name']);
	$sth->bindValue(':room_num', $_GET['room']);
	$sth->execute();
	$room_players =$sth->fetchAll();
	//var_dump($room_players);
	if(count($room_players) == 0){
	}else{
	end($room_players);
	$key = key($room_players);
	for($i = 0; $i<= $key; $i++){
		//echo $room_players[$i]['name'];


	}
	}
}
catch (PDOException $e) {
    echo "<p>Error: {$e->getMessage()}</p>";
}
}
?>
<script>
var xmlhttp = new XMLHttpRequest();
var attack ="";
xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
       // EnemyObj = JSON.parse(this.responseText);
       // Enemy = EnemyObj.name;
         attack_damage = this.responseText;
       // console.log(attack_damage);      //  document.getElementById('player_name').innerHTML = player_name;
    }
};
xmlhttp.open("GET", "convertAttack.php", true);
xmlhttp.send();



</script>
<script type="text/javascript">
var towerNUMBER = <?php echo $_SESSION['tower_num'];?>;
console.log(towerNUMBER);

</script>

<?php 

// if(!empty($_GET['attack'])){
// 	//echo $_GET['attack'];
// try{
// $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
// 	$sth = $dbh ->prepare("SELECT :skill FROM players WHERE name = :user");
// 	//$sth->bindValue(':user', $_SESSION['name']);
// 	$sth->bindValue(':skill', "skill_" + $_GET['attack']);
// 	$sth->bindValue(':user', $_SESSION['name']);
// 	$sth->execute();
// 	$attack =$sth->fetchAll();
// 	$_SESSION['attack'] = $attack['0']['skill_' + $_GET['attack']];
// 	var_dump($_SESSION['attack']);
// 	echo $_SESSION['attack'];
// }
// catch (PDOException $e) {
//     echo "<p>Error: {$e->getMessage()}</p>";
// }

//}
//?>

<?php
$_SESSION['IS_TOWER_LOADED'] = true;
?>
</body>
</html>
