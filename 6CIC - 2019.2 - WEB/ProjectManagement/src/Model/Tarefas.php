<?php

class Tarefas {
    
   private $codigo, $nome, $descricao, $data, $status, $emailUsuario, $codigoProjeto;
   
   function getCodigo() {
       return $this->codigo;
   }

   function getNome() {
       return $this->nome;
   }

   function getDescricao() {
       return $this->descricao;
   }

   function getData() {
       return $this->data;
   }

   function getStatus() {
       return $this->status;
   }

   function getEmailUsuario() {
       return $this->emailUsuario;
   }

   function getCodigoProjeto() {
       return $this->codigoProjeto;
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

   function setData($data) {
       $this->data = $data;
   }

   function setStatus($status) {
       $this->status = $status;
   }

   function setEmailUsuario($emailUsuario) {
       $this->emailUsuario = $emailUsuario;
   }

   function setCodigoProjeto($codigoProjeto) {
       $this->codigoProjeto = $codigoProjeto;
   }

}
