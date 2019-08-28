<?php

class Produtos{
    
    public $cod, $nome, $codForn, $codCat, $quant, $preco;
    
    public function getCod() {
        return $this->cod;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getPreco() {
        return $this->preco;
    }

    public function getCodCat() {
        return $this->codCat;
    }

    public function getQuant() {
        return $this->quant;
    }

    public function setCod($cod) {
        $this->cod = $cod;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setPreco($preco) {
        $this->preco = $preco;
    }

    public function setCodCat($codCat) {
        $this->codCat = $codCat;
    }

    public function setQuant($quant) {
        $this->quant = $quant;
    }

    public function getCodForn() {
        return $this->codForn;
    }

    public function setCodForn($codForn) {
        $this->codForn = $codForn;
    }


    
    
}
