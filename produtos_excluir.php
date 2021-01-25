<?php
require 'config.php';
require 'controller/ProdutoDAO.php';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

$dao = new ProdutoDAO($pdo);
if($id) {
	$dao->delete($id);
	header("Location: produtos_listagem.php");
}
?>