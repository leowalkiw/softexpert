<?php
require 'config.php';
require 'model/Categoria.php';
require 'controller/CategoriaDAO.php';

$id = filter_input(INPUT_POST, 'id');
$nome = filter_input(INPUT_POST, 'nome');
$imposto = filter_input(INPUT_POST, 'imposto', FILTER_VALIDATE_FLOAT);

$dao = new CategoriaDAO($pdo);
if($id && $nome && $imposto){

    $c = new Categoria();
    $c->setId($id);
    $c->setNome($nome);
    $c->setImposto($imposto);
    
    $dao->update($c);

    header("Location: categorias_listagem.php");

} else {
    header("Location: categorias_listagem.php");
}
