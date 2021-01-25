<?php
require 'config.php';
require_once 'controller/ProdutoDAO.php';
require_once 'model/Produto.php';
require_once 'controller/Venda_ItemDAO.php';

//recebendo o id da venda
$id_venda = filter_input(INPUT_GET, 'id_venda', FILTER_VALIDATE_INT);


//entra na tela apenas se tiver o id
if ($id_venda) {
    $pdao = new ProdutoDAO($pdo);

    //recebendo todos os produtos cadastrados para listar eles em tela 
    $listaProdutos = $pdao->findAll(); 

    $dao = new Venda_ItemDAO($pdo);
    
    //buscando todos os produtos que essa venda tem
    $listaItensVenda = $dao->findItensByVenda($id_venda);

} else {
    header("Location: vendas_listagem.php");
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
        <h4>Cadastro de Vendas - Passo #2</h4>
        <br>

        <form id="addItem" action="" method="post">
            <div class="row">

                <input type="hidden" id="id_venda" name="id_venda" value="<?php echo $id_venda; ?>">



                <div class="col-sm-4">
                    <label>Produto</label>
                    <div class="input-group">

                        <select name="produto" id="produto" class="form-control">
                            <option value="0">-- Selecione -- </option>
                            <?php foreach ($listaProdutos as $produto) : ?>
                                <option value="<?php echo $produto->getId(); ?>"><?php echo $produto->getDescricao(); ?></option>

                            <?php endforeach; ?>
                        </select>

                    </div>
                </div>

                <div class="col-sm-2">
                    <label>Quantidade</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="quantidade" id="quantidade">
                    </div>
                </div>


            </div>

            </br>
            <button type="submit" id="btnAdicionar" class="btn btn-primary">
                <i class="fa fa-save"></i> Adicionar
            </button>
            </br></br></br>

            <h4>Itens da Venda</h4>
            </br>
            <table class="table table-striped table-bordered" width="100%">
                <tr>

                    <th>Produto</th>
                    <th>Quantidade</th>
                    <th>Valor Unitario</th>
                    <th>Imposto</th>
                    <th>Subtotal</th>
                    
                    <th>Ações</th>
                </tr>

                <?php foreach ($listaItensVenda as $itens) : ?>
                    <tr>

                        <td><?php echo $itens->getId_produto(); ?></td>
                        <td><?php echo $itens->getQuantidade(); ?></td>
                        <td>R$ <?php echo $itens->getValor_Unitario(); ?></td>
                        <td class="valor-imposto">R$ <?php echo $itens->getValor_Imposto(); ?></td>
                        <td class="valor-total">R$ <?php echo $itens->getValor_Total(); ?></td>
                        
                        <td>
                            <div>
                                <button type="button" id="btnExcluirItem" class="btn btn-danger btn-sm btnExcluirItem"><i class="fa fa-trash-o"></i>&nbsp;</button>
                                <input type="hidden" id="idVendaItem" name="idVendaItem" value="<?php echo $itens->getId(); ?>">
                                <button type="button" id="btnEnviarBoleto" class="btn btn-success btn-sm btnEnviarBoleto"><i class="fa fa-money"></i>&nbsp;</button>
                            </div>

                        </td>
                    </tr>
                <?php endforeach; ?>

                <tr>
                    <td colspan="6" align="right" id="total-imposto" class="table-warning"></td>

                </tr>

                <tr>
                    <td colspan="6" align="right" id="valor-total-venda" class="table-info"></td>
                </tr>
            </table>


        </form>

    <button id="btnAnterior" class="btn btn-primary" onclick="document.location.href='vendas_editar_1.php?id_venda=<?php echo $id_venda ?>'">
                <i class="fa fa-arrow-circle-left"></i> Anterior
        </button>
                </br>
    </div>
    </br>
    </br>

    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>

    <script>
        
        //cadastro de produto na venda via AJAX, se cadastrar com sucesso atualiza a tela
        $(function() {

            $('#addItem').bind('submit', function(e) {
                e.preventDefault();

                var dados = $('#addItem').serialize();

                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    url: 'vendas_cadastro_2_action.php',
                    async: true,
                    data: dados,
                    success: function(response) {
                        location.reload();
                    },
                    error: function() {
                        $('#resultado').html('Erro ao Cadastrar Item');
                    }
                });

                return false;
            });

            //exclusão de produto da venda via AJAX e se excluiu com sucesso atualiza a tela
            $('.btnExcluirItem').bind('click', function() {


                var id = $('#idVendaItem').serialize();


                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    url: 'vendas_item_excluir.php',
                    async: true,
                    data: id,
                    success: function(response) {
                        location.reload();
                    }
                });

                return false;
            });

            $('.btnEnviarBoleto').bind('click', function() {

                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    url: 'envia_boleto.php',
                    async: false,
                   
                    success: function(response) {
                        location.reload();
                        alert("Boleto Enviado")
                    }
                });

                return false;
                //window.location.href = ;
            });

            //função para calcular o valor total de impostos, faz a soma te todos os campos com a classe .valor-imposto
            $(function() {

                var valorTotalImposto = 0;

                $(".valor-imposto").each(function() {
                    valorTotalImposto += parseFloat($(this).text().replace("R$", ""));
                });
                
                //informa o valor total de imposto na tela, ja formatado
                $("#total-imposto").html("Valor Total Impostos: " + valorTotalImposto.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}));

            });
            
            //calcula o valor total da venda, da mesma forma que o imposto, somando os elementos da classe .valor-total
            $(function() {

                var valorTotalVenda = 0;

                $(".valor-total").each(function() {
                    valorTotalVenda += parseFloat($(this).text().replace("R$", ""));
                });
                $("#valor-total-venda").html("Valor Total Venda: " + valorTotalVenda.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}));

            });

        });
    </script>


</body>

</html>