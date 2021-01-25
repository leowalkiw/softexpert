<?php
require 'config.php';
require 'controller/CategoriaDAO.php';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if ($id){
	$dao = new CategoriaDAO($pdo);
	$dao->delete($id);
	
	header("Location: categorias_listagem.php");
} else {
	header("Location: categorias_listagem.php");
}
?>