<?php 
require_once 'config.php';

class Venda_Item {
    private $id;
    private $id_venda;
    private $id_produto;
    private $quantidade;
    private $valor_unitario;
    private $valor_imposto;
    private $valor_total;

    public function getId() {
        return $this->id;
    }

    public function setId($i) {
        $this->id = $i;
    }

    public function getId_venda() {
        return $this->id_venda;
    }

    public function setId_venda($iv) {
        $this->id_venda = $iv;
    }

    public function getId_produto() {
        return $this->id_produto;
    }

    public function setId_produto($ip) {
        $this->id_produto = $ip;
    }

    public function getQuantidade() {
        return $this->quantidade;
    }

    public function setQuantidade($q) {
        $this->quantidade = $q;
    }

    public function getValor_Unitario() {
        return $this->valor_unitario;
    }

    public function setValor_Unitario($vu) {
        $this->valor_unitario = $vu;
    }

    public function getValor_Imposto() {
        return $this->valor_imposto;
    }

    public function setValor_Imposto($vi) {
        $this->valor_imposto = $vi;
    }

    public function getValor_Total() {
        return $this->valor_total;
    }

    public function setValor_Total($vt) {
        $this->valor_total = $vt;
    }
}