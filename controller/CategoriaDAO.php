<?php
require_once 'model/Categoria.php';

//Classe que faz a manipulação das categorias no banco de dados

class CategoriaDAO implements intCategoria {

    private $pdo;

    public function __construct(PDO $driver) {
        $this->pdo = $driver;
    }

    public function add(Categoria $c) {
        $sql = $this->pdo->prepare("insert into categorias (nome, imposto) values (:nome, :imposto)");
        $sql->bindValue(':nome', $c->getNome());
        $sql->bindValue(':imposto', $c->getImposto());
        $sql->execute();

        $c->setId($this->pdo->lastInsertId());
        return $c;
    }
    public function findAll() {
        $array = [];
        $sql = $this->pdo->query("select * from categorias order by id");

        if($sql->rowCount() > 0 ){
            $data = $sql->fetchAll();

            foreach ($data as $item) {
                $c = new Categoria();
                $c->setId($item['id']);
                $c->setNome($item['nome']);
                $c->setImposto($item['imposto']);
                $array[] = $c;
            }
        }
        
        return $array;
    }

    public function findById($id) {

        $sql = $this->pdo->prepare("select * from categorias where id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $data = $sql->fetch();

            $c = new Categoria();
            $c->setId($data['id']);
            $c->setNome($data['nome']);
            $c->setImposto($data['imposto']);

            return $c;
        } else {
            return false;
        }
        
    }

    public function update(Categoria $c) {
        $sql = $this->pdo->prepare("update categorias set nome = :nome, imposto = :imposto where id = :id");
        $sql->bindValue(':nome', $c->getNome());
        $sql->bindValue(':imposto', $c->getImposto());
        $sql->bindValue(':id', $c->getId());
        $sql->execute();
    }

    public function delete($id) {
        $sql = $this->pdo->prepare("delete from categorias where id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();
    }
}
