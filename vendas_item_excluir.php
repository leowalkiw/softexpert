<?php
require 'config.php';
require 'controller/Venda_ItemDAO.php';


$idVendaItem = filter_input(INPUT_POST, 'idVendaItem');

$dao = new Venda_ItemDAO($pdo);

if($idVendaItem){

    $dao->delete($idVendaItem);
    $response = array("success" => true);
    echo json_encode($response);
    
    
} else {
    echo 'ID NAO VEIO';
}



