<?php 

?>

<!DOCTYPE html>
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    
    <?php include 'head.php'; ?>

</head>

<body>

    <?php include 'menu.php'; ?>

    <div class="container">
        <br>
        <h2>Cadastro de Categoria</h2>
        <br>

        <div>
            <form action="categorias_cadastro_action.php" method="POST">
                <div class="row">

                    <div class="col-sm-6">
                        <label>Nome</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="nome" id="txtnome"   placeholder="">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <label>% Imposto</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">%</div>
                            </div>
                            <input type="text" class="form-control" name="imposto" id="imposto"   placeholder="">
                        </div>
                    </div>  

                </div>

            </br>
            <button type="submit" class="btn btn-primary">
            <i class="fa fa-save"></i> Cadastrar
            </button>
             
        
            </form>
        </div>
    </div>

    <!-- Não apagar -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>




</body>

</html>
