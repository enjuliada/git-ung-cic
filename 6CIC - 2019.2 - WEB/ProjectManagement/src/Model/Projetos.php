<?php

class Projetos {
    private $codigo, $nome, $descricao, $inicio, $fim, $status, $emailUsuario, $codigoCategoria;
    
    function getCodigo() {
        return $this->codigo;
    }

    function getNome() {
        return $this->nome;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function getInicio() {
        return $this->inicio;
    }

    function getFim() {
        return $this->fim;
    }

    function getStatus() {
        return $this->status;
    }

    function getEmailUsuario() {
        return $this->emailUsuario;
    }

    function getCodigoCategoria() {
        return $this->codigoCategoria;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    function setInicio($inicio) {
        $this->inicio = $inicio;
    }

    function setFim($fim) {
        $this->fim = $fim;
    }

    function setStatus($status) {
        $this->status = $status;
    }

    function setEmailUsuario($emailUsuario) {
        $this->emailUsuario = $emailUsuario;
    }

    function setCodigoCategoria($codigoCategoria) {
        $this->codigoCategoria = $codigoCategoria;
    }


    
}

?>
