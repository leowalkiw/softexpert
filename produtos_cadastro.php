<?php 
require 'config.php';
require_once 'controller/CategoriaDAO.php';
require_once 'model/Categoria.php';

$dao = new CategoriaDAO($pdo);

$listaCategorias = $dao->findAll();
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
    <h4>Cadastro de Produtos</h4>
    <br>

    <form action="produtos_cadastro_action.php" method="post">
      <div class="row">

        <div class="col-sm-4">
          <label>Descrição</label>
          <div class="input-group">
            <input type="text" class="form-control" name="descricao" id="descricao" placeholder="">
          </div>
        </div>



        <div class="col-sm-4">
          <label>Categoria</label>
          <div class="input-group">

            <select name="categoria" id="categoria" class="form-control">
              <option value="0">-- Selecione -- </option>
              <?php foreach ($listaCategorias as $categoria) :?>
              <option value="<?php echo $categoria->getId(); ?>"><?php echo $categoria->getNome();?></option>
              
              <?php endforeach;?>
            </select>

          </div>
        </div>

        <div class="col-sm-4">
          <label>Valor de Venda</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <div class="input-group-text">R$</div>
            </div>
            <input type="text" class="form-control moeda" name="valor_venda" id="valor_venda" placeholder="">
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
    $('.moeda').mask('#.##0,00', {
      reverse: true
    });
  </script>



  </script>



  <!-- Não apagar -->
  <script src="vendors/jquery/dist/jquery.min.js"></script>
  <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="assets/js/main.js"></script>


</body>

</html>