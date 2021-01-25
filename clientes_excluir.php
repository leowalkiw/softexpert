<?php
require 'config.php';
require 'controller/ClienteDAO.php';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

$dao = new ClienteDAO($pdo);

if($id) {
	$dao->delete($id);
	header("Location: clientes_listagem.php");
} else {
	header("Location: clientes_listagem.php");
}

