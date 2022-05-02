<?php
session_start();
// Unset all of the session variables.

require_once "../config.php";
try{
$dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
	$sth = $dbh ->prepare("UPDATE players SET tower_NUM = :tower WHERE name = :user");
	$sth->bindValue(':user', $_SESSION['name']);
	$sth->bindValue(':tower', $_SESSION['tower_num']-1);
	$sth->execute();
	$player =$sth->fetch();
}
catch (PDOException $e) {
    echo "<p>Error: {$e->getMessage()}</p>";
}


$_SESSION['tower_num'] = 0;
$_SESSION['IS_TOWER_LOADED'] = false;
$_SESSION['room'] = 0;
// If it's desired to kill the session, also delete the session cookie.
// Note: This will destroy the session, and not just the session data!

?>
<script type="text/javascript">
cd = 5;
	var myVar = setInterval(countdown, 1000);
//document.getElementById("countdown").innerHTML = cd; 
function countdown() {
	cd= cd-1;
    document.getElementById("countdown").innerHTML = cd; 
}

// Finally, destroy the session.
window.setTimeout(home, 5000);
function home(){
	window.location.replace("https://atdpsites.berkeley.edu/awu/aic/project 2/");
}
</script>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<img src="assets/win.png" alt="gameOver"/>
<div id="countdown"> </div>
</body>
</html>