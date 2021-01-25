<?php
require 'config.php';
require_once 'model/Produto.php';
require_once 'controller/ProdutoDAO.php';
require_once 'controller/CategoriaDAO.php';

$descricao = filter_input(INPUT_POST, 'descricao');
$id_categoria = filter_input(INPUT_POST, 'categoria', FILTER_VALIDATE_INT);
$valor_venda = filter_input(INPUT_POST, 'valor_venda');

$dao = new ProdutoDAO($pdo);

if ($descricao && $id_categoria && $valor_venda) {
    $produto = new Produto();
    $produto->setDescricao($descricao);
    $produto->setId_Categoria($id_categoria);
    $produto->setValor_Venda(FormataValorBD($valor_venda));
    
    $dao->add($produto);

    header("Location: produtos_listagem.php");
} else {
    header("Location: produtos_cadastro.php");
}

function FormataValorBD($v) {
    return number_format(str_replace(",",".",str_replace(".","",$v)), 2, '.', '');
}