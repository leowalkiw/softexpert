<?php
require 'config.php';
require 'model/Categoria.php';
require 'controller/CategoriaDAO.php';

$nome = filter_input(INPUT_POST, 'nome');
$imposto = filter_input(INPUT_POST, 'imposto', FILTER_VALIDATE_FLOAT);

if ($nome && $imposto) { //verifica se o nome e o imposto foram setados
    $categoria = new Categoria(); //novo objeto categoria
    $categoria->setNome($nome); //setando o nome
    $categoria->setImposto($imposto);// setando o imposto da categoria

    $dao = new CategoriaDAO($pdo); //instanciando a classe que faz a manipulação no BD
    $dao->add($categoria); //enviado uma categorias para o metodo add que faz a inserção no BD

    header("Location: categorias_listagem.php");
} else {
    header("Location: categorias_cadastro.php");
}