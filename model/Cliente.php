<?php

class Cliente {

    private $id;
    private $nome;
    private $email;
    private $telefone;

    public function getId(){
        return $this->id;
    }

    public function setId($i) {
        $this->id = $i;
    }

    public function getNome(){
        return $this->nome;
    }

    public function setNome($n) {
        $this->nome = trim($n);
    }

    public function getEmail(){
        return $this->email;
    }

    public function setEmail($e) {
        $this->email = trim($e);
    }

    public function getTelefone() {
        return $this->telefone;
    }

    public function setTelefone($t) {
        $this->telefone = trim($t);
    }

}

interface intCliente {

    public function add(Cliente $c);
    public function findAll();
    public function findById($id);
    public function update(Cliente $c);
    public function delete($id);
}