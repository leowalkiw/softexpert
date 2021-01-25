
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

        <form action="clientes_cadastro_action.php" method="post">
                <div class="row">

                    <div class="col-sm-4">
                        <label>Nome</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="nome" id="nome"   placeholder="">
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <label>Telefone</label>
                        <div class="input-group">
                            <input type="text" class="form-control telefonemask" name="telefone" id="telefone"   placeholder="">
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <label>E-mail</label>
                        <div class="input-group">
                            <input type="email" class="form-control" name="email" id="email"   placeholder="">
                        </div>
                    </div>

                     

                </div>

            </br>
            <button type="submit" class="btn btn-primary">
            <i class="fa fa-save"></i> Cadastrar
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
