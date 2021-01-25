<?php
require 'config.php';
require 'model/Cliente.php';
require 'controller/ClienteDAO.php';

$dao = new ClienteDAO($pdo);

$lista = $dao->findAll();

?>



<!DOCTYPE html>
<html class="no-js" lang="en">


<head>
    
    <?php include 'head.php'; ?>

</head>

<body>

    <?php include 'menu.php'; ?>


    <div class="container">
        <br>
        <h4>Listagem de Clientes</h4>

        <br>
        <input type="button" value="Novo Cliente" class="btn btn-primary" onclick="javascript: location.href='clientes_cadastro.php';" />
        <br>
        <br>
        

        <table class="table table-striped table-bordered" width="80%">
            
            <tr> 
                <th>Codigo</th> 
                <th>Nome</th> 
                <th>Email</th> 
                <th>Telefone</th> 
                <th>Ações</th>
             </tr>

            <?php foreach ($lista as $cliente):?>
                <tr>
                    <td><?php echo $cliente->getId(); ?></td>
                    <td><?php echo $cliente->getNome(); ?></td>
                    <td><?php echo $cliente->getEmail(); ?></td>
                    <td><?php echo $cliente->getTelefone(); ?></td>
                    <td>
                        <a href="clientes_editar.php?id=<?php echo $cliente->getId(); ?>"><button type="button" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i>&nbsp;</button></a> 
                        <a href="clientes_excluir.php?id=<?php echo $cliente->getId(); ?>"><button type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i>&nbsp;</button></a>
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
