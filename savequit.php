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
	$sth = $dbh ->prepare("UPDATE players SET player_position = 0 WHERE name = :user");
	$sth->bindValue(':user', $_SESSION['name']);
	//$sth->bindValue(':tower', $_SESSION['tower_num']-1);
	$sth->execute();
		$sth = $dbh ->prepare("UPDATE players SET current_tower = 0 WHERE name = :user");
	$sth->bindValue(':user', $_SESSION['name']);
	//$sth->bindValue(':tower', $_SESSION['tower_num']-1);
	$sth->execute();
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

	window.location.replace("https://atdpsites.berkeley.edu/awu/aic/project 2/");

</script>
