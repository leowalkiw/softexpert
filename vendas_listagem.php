<?php
require 'config.php';  
require 'controller/VendaDAO.php';

//instanciando novo objeto da classe DAO que faz a manipulação dos dados com o BD
$dao = new VendaDAO($pdo);

//criando uma lista vazia
$lista = [];

//recebendo todas as vendas cadastradas no sistema e adicionado na variavel lista
$lista = $dao->findAll();


?>

<!doctype html>

<html class="no-js" lang="en">


<head>
    
    <?php include 'head.php'; ?>

</head>

<body>

    <?php include 'menu.php'; ?>

    <div class="container">

        <br>
        <h4>Listagem de Vendas</h4>
        
        <br>
        <div>
            <div><input type="button" value="Nova Venda" class="btn btn-primary float-left" onclick="javascript: location.href='vendas_cadastro_1.php';" /></div>
            
        </div>
        <br>
        <br>
        <table class="table table-striped table-bordered" width="80%">


            <tr>
                <th>Codigo</th>
                <th>Cliente</th>
                <th>Data da Venda</th>
                <th>Valor Total</th>
                <th>Ações</th>
               
            </tr>

            <?php foreach ($lista as $venda):?>
            <tr>
                <td><?php echo $venda->getId(); ?></td>
                <td><?php echo $venda->getId_cliente(); ?></td>
                <td><?php echo $venda->getData();?></td>
                <td>R$ <?php echo $venda->getValor_Total(); ?></td>
                <td>
                    <a href="vendas_editar_1.php?id_venda=<?php echo $venda->getId(); ?>"><button type="button" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i>&nbsp;</button></a> 
                    
                </td>
                
            </tr>

            <?php  endforeach;?>
        </table>

    </div>
       
    <!-- Não apagar -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>

</body>

</html>
