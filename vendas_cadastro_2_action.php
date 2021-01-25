<?php
require_once 'config.php';
require_once 'controller/Venda_ItemDAO.php';
require_once 'controller/ProdutoDAO.php';
require_once 'controller/CategoriaDAO.php';
require_once 'controller/Utilitarios.php';


//recebendo os parametros para adicionar na tabela vendas_itens 
//a tabela vendas_itens é o relacioanemnto entre vendas e produtos, recebe o id_venda, id_produto e quantidade
$id_venda = filter_input(INPUT_POST, 'id_venda');
$id_produto = filter_input(INPUT_POST, 'produto');
$quantidade = filter_input(INPUT_POST, 'quantidade', FILTER_VALIDATE_INT);



$daoVendaItem = new Venda_ItemDAO($pdo);
$daoProduto = new ProdutoDAO($pdo);
$daoCategoria = new CategoriaDAO($pdo);

//buscando as informações do produto
$infoProduto = $daoProduto->findById($id_produto);

//valor de venda do produto ja transformando para o formatado do banco
$valorDoProduto = FormataValorBD($infoProduto->getValor_Venda());

//buscando a categoria do produto
$categoriaDoProduto = $daoCategoria->findById($infoProduto->getId_Categoria());

//porcentagem de imposto da categoria
$impostoDoProduto = $categoriaDoProduto->getImposto();

//multiplicação da quantidade * valor unitario
$valorTotal = valorTotal($valorDoProduto, $quantidade);

//calculando o imposto pago
$valorImposto = calculaValorImposto($valorTotal, $impostoDoProduto);

if($id_venda && $id_produto && $quantidade) {
    $vi = new Venda_Item();
    $vi->setId_produto($id_produto);
    $vi->setId_venda($id_venda);
    $vi->setQuantidade($quantidade);
    $vi->setValor_Unitario($valorDoProduto);
    $vi->setValor_Imposto($valorImposto);
    $vi->setValor_Total($valorTotal);
    
    //adicionando produto a venda
    $daoVendaItem->add($vi);
    
    //caso adicione com sucesso, imprime a resposta para o AJAX
    $response = array("success" => true);
    echo json_encode($response);
    
    
    
}

function valorTotal($valor, $qtde) {

    return $valor * $qtde;
}

//função que calcula o valor do imposto, recebe o valor total do produto e a % de imposto
function calculaValorImposto($valor, $imposto) {
    return ($imposto / 100) * $valor;

}


