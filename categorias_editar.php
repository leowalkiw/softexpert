<?php 
require 'config.php';
require 'model/Categoria.php';
require 'controller/CategoriaDAO.php';

$id = filter_input(INPUT_GET, 'id');

$categoria = false;

$dao = new CategoriaDAO($pdo);

if($id){

    $categoria = $dao->findById($id);
   
} 
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
        <h2>Editar Categoria</h2>
        <br>

        <div>
            <form action="categorias_editar_action.php" method="POST">
                <div class="row">

                    <input type="hidden" name="id" id="id" value="<?php echo $categoria->getId();  ?>"  placeholder="">
                    
                    <div class="col-sm-6">
                        <label>Nome</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="nome" id="txtnome" value="<?php echo $categoria->getNome();  ?>"  placeholder="">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <label>% Imposto</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">%</div>
                            </div>
                            <input type="text" class="form-control" name="imposto" id="imposto" value="<?php echo $categoria->getImposto();  ?>"  placeholder="">
                        </div>
                    </div>  

                </div>

            </br>
            <button type="submit" class="btn btn-primary">
            <i class="fa fa-save"></i> Atualizar
            </button>
             
        
            </form>
        </div>
    </div>

    <!-- Não apagar -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>

</body>

</html>
