<?php 
require_once 'config.php';
require_once 'model/Venda.php';

//Classe que faz a manipulação das vendas no banco de dados

class VendaDAO{

    private $pdo;

    public function __construct(PDO $driver) {
        $this->pdo = $driver;
    }

    public function add(Venda $v) {
        $sql = $this->pdo->prepare("insert into vendas (data_venda, id_cliente) values (:data_venda, :id_cliente)");
        $sql->bindValue(':data_venda', $v->getData());
        $sql->bindValue(':id_cliente', $v->getId_cliente());
        $sql->execute();

        return $this->pdo->lastInsertId();
    }

    public function findAll() {
        $array = [];
        $sql = $this->pdo->query("select v.id, to_char(v.data_venda, 'dd/mm/YYYY') as data_venda, c.nome, (select sum(valor_total) from vendas_itens where id_venda = v.id) from vendas as v
        left join clientes as c on c.id = v.id_cliente");

        if($sql->rowCount() > 0) {
            $data = $sql->fetchAll();

            foreach ($data as $venda) {
                $v = new Venda();
                $v->setId($venda['id']);
                $v->setData($venda['data_venda']);
                $v->setId_cliente($venda['nome']);
                $v->setValor_Total(number_format($venda['sum'], 2, ',', '.'));
                
                $array[] = $v;
                
            }
        }

        return $array;
    }

    public function findById($id) {
        $sql = $this->pdo->prepare("select v.id, to_char(v.data_venda, 'dd/mm/YYYY') as data_venda, c.nome, (select sum(valor_total) from vendas_itens where id_venda = v.id) from vendas as v
        left join clientes as c on c.id = v.id_cliente where v.id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();

        if($sql->rowCount() > 0) {
            $data = $sql->fetch();

            $v = new Venda();
            $v->setId($data['id']);
            $v->setData($data['data_venda']);
            $v->setId_cliente($data['nome']);
            $v->setValor_Total(number_format($data['sum'], 2, ',', '.'));
            
            return $v;
        } else {
            return false;
        }
    }

    public function update(Venda $v) {
        $sql = $this->pdo->prepare("update vendas set data_venda = :data_venda, id_cliente = :id_cliente where id = :id");
        $sql->bindValue(':data_venda', $v->getData());
        $sql->bindValue(':id_cliente', $v->getId_cliente());
        $sql->bindValue(':id', $v->getId());
        $sql->execute();
    }


}