<?php

$dsn = "mysql:dbname=clariaisistemas;host:127.0.0.1";
$dbuser = "root";
$dbpass = "";

try {
$pdo = new PDO($dsn, $dbuser, $dbpass );
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
echo "Erro".$e.getMessage();
}

?>