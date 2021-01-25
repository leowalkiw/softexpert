<?php 
require 'config.php';
require 'model/Cliente.php';
require 'controller/ClienteDAO.php';

$id = filter_input(INPUT_GET, 'id');

$cliente = false;

$dao = new ClienteDAO($pdo);

if($id){
    $cliente = $dao->findById($id); 
}
 




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
        <h4>Dados do Cliente</h4>
        <br>
        
        <form action="clientes_editar_action.php" method="post">
                <div class="row">
                    
                   
                    <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $cliente->getId();?>">
                    
                    <div class="col-sm-4">
                        <label>Nome</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="nome" id="nome" value="<?php echo $cliente->getNome();?>">
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <label>Telefone</label>
                        <div class="input-group">
                            <input type="text" class="form-control telefonemask" name="telefone" id="telefone" value="<?php echo $cliente->getTelefone();?>">
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <label>E-mail</label>
                        <div class="input-group">
                            <input type="email" class="form-control" name="email" id="email" value="<?php echo $cliente->getEmail();?>">
                        </div>
                    </div>

                     

                </div>

            </br>
            <button type="submit" class="btn btn-primary">
            <i class="fa fa-save"></i> Salvar
            </button>
             

            </form>

        


    </div>

    <script type="text/javascript">
        

        //formatação campos
        (function( $ ) {
            $(function() {
        
            $('.telefonemask').mask('(99) 99999-9999');
            });
        })(jQuery);

    </script>

    


       
    <!-- Não apagar -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>

  
</body>

</html>
