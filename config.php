<?php

//arquivo de conexao com o banco de dados

$db_name = 'softexpert';
$db_host = 'localhost';
$db_user = 'postgres';
$db_pass = '123';


$pdo = new PDO("pgsql:dbname=".$db_name.";host=".$db_host, $db_user, $db_pass);
