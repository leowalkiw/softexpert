<?php
require 'config.php';  
require_once 'controller/ProdutoDAO.php';

$dao = new ProdutoDAO($pdo);

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
        <h4>Listagem de Produtos</h4>
        
        <br>
        <div>
            <div><input type="button" value="Novo Produto" class="btn btn-primary float-left" onclick="javascript: location.href='produtos_cadastro.php';" /></div>
            
        </div>
        <br>
        <br>
        <table class="table table-striped table-bordered" width="80%">


            <tr>
                <th>Codigo</th>
                <th>Descrição</th>
                <th>Categoria</th>
                <th>Valor de Venda</th>
                <th>Ações</th>
               
            </tr>

            <?php foreach ($lista as $umProduto):?>
            <tr>
                <td><?php echo $umProduto->getId(); ?></td>
                <td><?php echo $umProduto->getDescricao(); ?></td>
                <td><?php echo $umProduto->getId_categoria();?></td>
                <td>R$ <?php echo $umProduto->getValor_Venda(); ?></td>
                <td>
                    <a href="produtos_editar.php?id=<?php echo $umProduto->getId(); ?>"><button type="button" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i>&nbsp;</button></a> 
                    <a href="produtos_excluir.php?id=<?php echo $umProduto->getId(); ?>"><button type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i>&nbsp;</button></a>
                </td>
                
            </tr>

            <?php endforeach; ?>
        </table>

    </div>
       
    <!-- Não apagar -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>

</body>

</html>
