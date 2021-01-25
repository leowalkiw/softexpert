<?php
require_once 'model/Cliente.php';

//Classe que faz a manipulação dos clientes no banco de dados

class ClienteDAO implements intCliente {
    
    private $pdo;

    public function __construct(PDO $driver) {
        $this->pdo = $driver;
    }

    public function add(Cliente $c) {
        $sql = $this->pdo->prepare("insert into clientes (nome, email, telefone) values (:nome, :email, :telefone)");
        $sql->bindValue(':nome', $c->getNome());
        $sql->bindValue(':email', $c->getEmail());
        $sql->bindValue(':telefone', $c->getTelefone());
        $sql->execute();
    }

    public function findAll() {
        $array = [];
        $sql = $this->pdo->query("select * from clientes order by id");
        
        if($sql->rowCount() > 0) {
            $data = $sql->fetchAll();

            foreach ($data as $cliente) {
                $c = new Cliente();
                $c->setId($cliente['id']);
                $c->setNome($cliente['nome']);
                $c->setEmail($cliente['email']);
                $c->setTelefone($cliente['telefone']);

                $array[] = $c;

            }
        }

        return $array;
    }

    public function findById($id) {
        $sql = $this->pdo->prepare("select * from clientes where id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();

        if($sql->rowCount() > 0) {
            $data = $sql->fetch();

            $c = new Cliente();
            $c->setId($data['id']);
            $c->setNome($data['nome']);
            $c->setEmail($data['email']);
            $c->setTelefone($data['telefone']);
            
            return $c;
        } else {
            return false;
        }
    }

    public function update(Cliente $c) {
        $sql = $this->pdo->prepare("update clientes set nome = :nome, email = :email, telefone = :telefone where id = :id");
        $sql->bindValue(':nome', $c->getNome());
        $sql->bindValue(':email', $c->getEmail());
        $sql->bindValue(':telefone', $c->getTelefone());
        $sql->bindValue(':id', $c->getId());
        $sql->execute();
    }

    public function delete($id) {
        $sql = $this->pdo->prepare("delete from clientes where id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();
    }
}