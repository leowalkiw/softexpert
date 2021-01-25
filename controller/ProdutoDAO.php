<?php
require_once 'model/Produto.php';

//Classe que faz a manipulação dos produtos no banco de dados

class ProdutoDAO implements intProduto {

    private $pdo;

    public function __construct(PDO $driver) {
        $this->pdo = $driver;
    }

    public function add(Produto $p) {
        $sql = $this->pdo->prepare("insert into produtos (descricao, id_categoria, valor_venda) values (:descricao, :id_categoria, :valor_venda)");
        $sql->bindValue(':descricao', $p->getDescricao());
        $sql->bindValue(':id_categoria', $p->getId_Categoria());
        $sql->bindValue(':valor_venda', $p->getValor_Venda());
        $sql->execute();
    }

    public function findAll() {
        $array = [];
        $sql = $this->pdo->query("select p.id, p.descricao, c.nome, p.valor_venda from produtos as p
        left join categorias as c on p.id_categoria = c.id order by id");
        
        if($sql->rowCount() > 0) {
            $data = $sql->fetchAll();

            foreach ($data as $produto) {
                $p = new Produto();
                $p->setId($produto['id']);
                $p->setDescricao($produto['descricao']);
                $p->setId_Categoria($produto['nome']);
                $p->setValor_Venda(number_format($produto['valor_venda'], 2, ',', '.'));
                $array[] = $p;
                
            }
        }

        return $array;
    }

    public function findById($id) {
        $sql = $this->pdo->prepare("select * from produtos where id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $data = $sql->fetch();

            $p = new Produto();
            $p->setId($data['id']);
            $p->setDescricao($data['descricao']);
            $p->setId_Categoria($data['id_categoria']);
            $p->setValor_Venda(number_format($data['valor_venda'], 2, ',', '.'));
            
            return $p;
        } else {
            return false;
        }
    }

    public function update(Produto $p) {
        $sql = $this->pdo->prepare("update produtos set descricao = :descricao, id_categoria = :id_categoria, valor_venda = :valor_venda where id = :id");
        $sql->bindValue(':descricao', $p->getDescricao());
        $sql->bindValue(':id_categoria', $p->getId_Categoria());
        $sql->bindValue(':valor_venda', $p->getValor_Venda());
        $sql->bindValue(':id', $p->getId());
        $sql->execute();
        
    }
    public function delete($id) {
        $sql = $this->pdo->prepare("delete from produtos where id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();
    }

    

    

    
}
