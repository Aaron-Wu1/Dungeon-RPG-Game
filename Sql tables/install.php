<html>
<head>
    <title>Install Project2 dbs</title>
</head>
<body>
<?php
require_once "../../config.php";
try {
    $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
    //create comic table

    $query = file_get_contents('enemyInfo.sql');
    $dbh->exec($query);
    $query = file_get_contents('playerInfo.sql');
    $dbh->exec($query);

    $query = file_get_contents('itemInfo.sql');
    $dbh->exec($query);
    echo "<p>Successfully installed databases</p>";
    //http://php.net/manual/en/pdo.exec.php
    //http://php.net/manual/en/function.file-get-contents.php
}
catch (PDOException $e) {
    echo "<p>Error: {$e->getMessage()}</p>";
}
?>
</body>
</html>