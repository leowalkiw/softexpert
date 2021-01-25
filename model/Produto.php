<?php

class Produto {
    private $id;
    private $descricao;
    private $id_categoria;
    private $valor_venda;

    public function getId() {
        return $this->id;
    }

    public function setId($i) {
        $this->id = $i;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function setDescricao($d) {
        $this->descricao = trim($d);
    }

    public function getId_Categoria() {
        return $this->id_categoria;
    }

    public function setId_Categoria($ic) {
        $this->id_categoria = $ic;
    }

    public function getValor_Venda() {
        return $this->valor_venda;
    }

    public function setValor_Venda($v) {
        $this->valor_venda = trim($v);
    }

    
}

interface intProduto {

    public function add(Produto $p);
    public function findAll();
    public function findById($id);
    public function update(Produto $p);
    public function delete($id);
}
