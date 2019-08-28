<?php

class Categorias {

    public $cod, $nome, $desc;

    public function getCod() {
        return $this->cod;
    }

    public function setCod($cod) {
        $this->cod = $cod;
    }

        
    public function getNome() {
        return $this->nome;
    }

    public function getDesc() {
        return $this->desc;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setDesc($desc) {
        $this->desc = $desc;
    }


    
    
}
