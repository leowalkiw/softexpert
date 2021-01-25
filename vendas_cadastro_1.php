<?php 
require 'config.php';
require 'model/Cliente.php';
require 'controller/ClienteDAO.php';

$dao = new ClienteDAO($pdo);

//buscando todos os clientes cadastrados na base para listar na tela de cadastro da venda
$listaClientes = $dao->findAll();

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
        <h4>Cadastro de Vendas - Passo #1</h4>
        <br>

        <form action="vendas_cadastro_1_action.php" method="post">
            <div class="row">

                <div class="col-sm-6">
                    <label>Data da Venda</label>
                    <div class="input-group">
                        <input type="text" class="form-control date" name="data_venda" id="data_venda">
                    </div>
                </div>



                <div class="col-sm-6">
                    <label>Cliente</label>
                    <div class="input-group">

                        <select name="cliente" id="cliente" class="form-control">
                            <option value="0">-- Selecione -- </option>
                            <?php foreach ($listaClientes as $cliente) : ?>
                                <option value="<?php echo $cliente->getId(); ?>"><?php echo $cliente->getNome(); ?></option>

                            <?php endforeach; ?>
                        </select>

                    </div>
                </div>
                


            </div>

            </br>
            <button type="submit" class="btn btn-primary">
                 Proximo <i class="fa fa-arrow-circle-right"></i>
            </button>


        </form>

    </div>


    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/jquery/dist/jquery.mask.min.js"></script>
    
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>
    
    <script>
        $(function(){
            $('.date').mask('00/00/0000');
        });
    </script>


</body>

</html>