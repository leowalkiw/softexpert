<?php
require 'config.php';
require 'controller/CategoriaDAO.php';

$dao = new CategoriaDAO($pdo);
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
        <h4>Listagem de Categorias</h4>

        <br>
        <input type="button" class="btn btn-primary" value="Nova Categoria" onclick="javascript: location.href='categorias_cadastro.php';" name="">
        <br>
        <br>

        <table class="table table-striped table-bordered" width="80%">

            <tr>
                <th>Codigo</th>
                <th>Nome</th>
                <th>Imposto</th>
                <th>Ações</th>
            </tr>

            <?php foreach ($lista as $umaCategoria):?>

                <tr>
                    <td><?php echo $umaCategoria->getId(); ?></td>
                    <td><?php echo $umaCategoria->getNome() ?></td>
                    <td><?php echo $umaCategoria->getImposto();?> %</td>
                    <td>
                        <a href="categorias_editar.php?id=<?php echo $umaCategoria->getId(); ?>"><button type="button" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i>&nbsp;</button></a> 
                        <a href="categorias_excluir.php?id=<?php echo $umaCategoria->getId(); ?>"><button type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i>&nbsp;</button></a>
                    </td>
                </tr>

            <?php endforeach; ?>
        </table>


    </div>

    <!-- Não apagar -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>


    <script src="vendors/chart.js/dist/Chart.bundle.min.js"></script>
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/widgets.js"></script>
    <script src="vendors/jqvmap/dist/jquery.vmap.min.js"></script>
    <script src="vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <script src="vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>

</body>

</html>