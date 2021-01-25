<?php
require 'config.php';
require 'model/Cliente.php';
require 'controller/ClienteDAO.php';

$nome = filter_input(INPUT_POST, 'nome');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$telefone = filter_input(INPUT_POST, 'telefone');
$id = filter_input(INPUT_POST, 'id');

$dao = new ClienteDAO($pdo);

if($id && $nome && $email && $telefone){

    $c = new Cliente();
    $c->setNome($nome);
    $c->setEmail($email);
    $c->setTelefone($telefone);
    $c->setId($id);
    $dao->update($c);
   
header("Location: clientes_listagem.php");
} else {

   
    header("Location: clientes_editar?id=".$id);
    
    
}
