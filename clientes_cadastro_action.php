<?php
require_once 'config.php';
require_once 'model/Cliente.php';
require_once 'controller/ClienteDAO.php';

$nome = filter_input(INPUT_POST, 'nome');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$telefone = filter_input(INPUT_POST, 'telefone');

$dao = new ClienteDAO($pdo);

if($nome && $telefone && $email) {
    $c = new Cliente();
    $c->setNome($nome);
    $c->setEmail($email);
    $c->setTelefone($telefone);
    
    $dao->add($c);

    header("Location: clientes_listagem.php");

} else {
    header("Location: clientes_cadastro.php");
}