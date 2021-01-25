<?php 

class Venda {
    private $id;
    private $data;
    private $id_cliente;
    private $valor_total;
    
    public function getId() {
        return $this->id;
    }

    public function setId($i) {
        $this->id = $i;
    }

    public function getData() {
        return $this->data;
    }

    public function setData($d) {
        $this->data = $d;
    }

    public function getId_cliente() {
        return $this->id_cliente;
    }

    public function setId_cliente($ic) {
        $this->id_cliente = $ic;
    }

    public function getValor_Total(){
        return $this->valor_total;
    }

    public function setValor_Total($vt) {
        $this->valor_total = $vt;
    }
}

interface intVenda {

    public function add(Venda $v);
    public function findAll();
    public function findById($id);
    public function update(Venda $v);
    
}
