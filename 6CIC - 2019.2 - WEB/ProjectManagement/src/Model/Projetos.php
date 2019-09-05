<?php
require_once "Categorias.php";

class Projetos extends Categorias{ //projetos herda categorias
    private $codigo, $nome, $descricao, $inicio, $fim, $status, $emailUsuario;
    
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

   
}

?>
