<?php
require 'config.php';
require 'model/Produto.php';
require 'controller/ProdutoDAO.php';
require 'controller/Utilitarios.php';

$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
$descricao = filter_input(INPUT_POST, 'descricao');
$id_categoria = filter_input(INPUT_POST, 'categoria');
$valor_venda = filter_input(INPUT_POST, 'valor_venda');

$dao = new ProdutoDAO($pdo);

if($id && $descricao && $id_categoria && $valor_venda){
    
    $p = new Produto();
    $p->setId($id);
    $p->setDescricao($descricao);
    $p->setId_Categoria($id_categoria);
    $p->setValor_Venda(FormataValorBD($valor_venda));
    

    
    $dao->update($p);

    header("Location: produtos_listagem.php");
} else {
    header("Location: produtos_listagem.php");
}


