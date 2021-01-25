<?php 
    class Categoria {
        private $id;
        private $nome;
        private $imposto;
       

        public function getId() {
            return $this->id;
        }

        public function setId($i) {
            $this->id = $i;
        }

        public function getNome() {
            return $this->nome;
        }

        public function setNome($n) {
            $this->nome = trim($n);
        }

        public function getImposto() {
            return $this->imposto;
        }

        public function setImposto($im) {
            $this->imposto = trim($im);
        }

       
    }

    interface intCategoria {
  
        public function add(Categoria $c);
        public function findAll();
        public function findById($id);
        public function update(Categoria $c);
        public function delete($id);

    }
