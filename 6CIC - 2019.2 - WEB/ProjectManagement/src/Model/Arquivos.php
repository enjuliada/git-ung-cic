<?php

class Arquivos {
    
    private $codigo, $nome, $data, $codigoTarefa;
    
    function getCodigo() {
        return $this->codigo;
    }

    function getNome() {
        return $this->nome;
    }

    function getData() {
        return $this->data;
    }

    function getCodigoTarefa() {
        return $this->codigoTarefa;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setData($data) {
        $this->data = $data;
    }

    function setCodigoTarefa($codigoTarefa) {
        $this->codigoTarefa = $codigoTarefa;
    }


    
}
