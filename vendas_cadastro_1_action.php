<?php 
require 'config.php';
require 'model/Venda.php';
require 'controller/VendaDAO.php';


//arquivo que faz a abertura da venda, para posteriormente atribuir produtos nessa venda

//recebendo os parametros da venda, data da venda e codigo do cliente
$data_venda = filter_input(INPUT_POST, 'data_venda');
$id_cliente = filter_input(INPUT_POST, 'cliente');

$dao = new VendaDAO($pdo);

//cadastrar a venda apenas se tiver os 2 parametros
if($data_venda && $id_cliente) {
    $v = new Venda();
    $v->setData($data_venda);
    $v->setId_cliente($id_cliente);

    //adicionando a venda e recebendo o id dessa venda
    $id_venda = $dao->add($v);

    //com o id da venda recebido, passo ele como parametro via GET para o passo 2
    header("Location: vendas_cadastro_2.php?id_venda=".$id_venda);
}