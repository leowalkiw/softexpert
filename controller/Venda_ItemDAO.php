<?php 
require_once 'config.php';
require_once 'model/Venda_Item.php';

//Classe que faz a manipulação dos itens de cada venda no banco de dados

class Venda_ItemDAO {

    private $pdo;

    public function __construct(PDO $driver) {
        $this->pdo = $driver;
    }

    public function add(Venda_Item $vi) {
        $sql = $this->pdo->prepare("insert into vendas_itens (id_venda, id_produto, quantidade, valor_unitario, valor_imposto, valor_total) values (:id_venda, :id_produto, :quantidade, :valor_unitario, :valor_imposto, :valor_total)");
        $sql->bindValue(':id_venda', $vi->getId_venda());
        $sql->bindValue(':id_produto', $vi->getId_produto());
        $sql->bindValue(':quantidade', $vi->getQuantidade());
        $sql->bindValue(':valor_unitario', $vi->getValor_Unitario());
        $sql->bindValue(':valor_imposto', $vi->getValor_Imposto());
        $sql->bindValue(':valor_total', $vi->getValor_Total());
        $sql->execute();
    }

    public function findItensByVenda($id) {
        $array = [];
        $sql = $this->pdo->prepare("select vi.id, vi.id_venda, p.descricao, vi.quantidade, vi.valor_imposto, vi.valor_total, vi.valor_unitario from vendas_itens as vi 
        left join produtos as p on p.id = vi.id_produto where vi.id_venda = :id_venda order by vi.id");
        $sql->bindValue(':id_venda', $id);
        $sql->execute();

        if($sql->rowCount() > 0 ) {
            $data = $sql->fetchAll();

            foreach($data as $item){
                $vi = new Venda_Item();
                $vi->setId($item['id']);
                $vi->setId_venda($item['id_venda']);
                $vi->setId_produto($item['descricao']);
                $vi->setQuantidade($item['quantidade']);
                //$vi->setValor_Imposto(number_format($item['valor_imposto'], 2, ',', '.'));
                $vi->setValor_Imposto($item['valor_imposto']);
                $vi->setValor_Total($item['valor_total']);
                $vi->setValor_Unitario($item['valor_unitario']);
                
                $array[] = $vi;
            }

        }
        return $array;
    }

    public function delete($id) {
        $sql = $this->pdo->prepare("delete from vendas_itens where id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();
    }
}