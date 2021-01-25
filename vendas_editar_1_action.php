<?php 
require 'config.php';
require 'controller/Utilitarios.php';
require_once 'controller/VendaDAO.php';
require_once 'model/Venda.php';

$id_venda = filter_input(INPUT_POST, 'id_venda');
$data_venda = date(filter_input(INPUT_POST, 'data_venda'));
$id_cliente = filter_input(INPUT_POST, 'cliente');

$dao = new VendaDAO($pdo);

if($id_venda) {
    $v = new Venda();
    $v->setId($id_venda);
    $v->setData(dataSaveBD($data_venda));
    $v->setId_cliente($id_cliente);
    
    $dao->update($v);

    header("Location: vendas_cadastro_2.php?id_venda=".$id_venda);
}



