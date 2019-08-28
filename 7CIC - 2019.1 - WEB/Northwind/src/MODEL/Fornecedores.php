<?php
class Fornecedores{
    
    public $cod, $nome, $representante, $cargo, $endereco, $cep, $telefone, $cidade,      $estado, $pais, $email, $web;
    
    public function getCod() {
        return $this->cod;
    }
    public function getNome() {
        return $this->nome;
    }
    public function getRepresentante() {
        return $this->representante;
    }
    public function getCargo() {
        return $this->cargo;
    }
    public function getEndereco() {
        return $this->endereco;
    }
    public function getCep() {
        return $this->cep;
    }
    public function getTelefone() {
        return $this->telefone;
    }
    public function getCidade() {
        return $this->cidade;
    }
    public function getEstado() {
        return $this->estado;
    }
    public function getPais() {
        return $this->pais;
    }
    public function getEmail() {
        return $this->email;
    }
    public function setCod($cod) {
        $this->cod = $cod;
    }
    public function setNome($nome) {
        $this->nome = $nome;
    }
    public function setRepresentante($representante) {
        $this->representante = $representante;
    }
    public function setCargo($cargo) {
        $this->cargo = $cargo;
    }
    public function setEndereco($endereco) {
        $this->endereco = $endereco;
    }
    public function setCep($cep) {
        $this->cep = $cep;
    }
    public function setTelefone($telefone) {
        $this->telefone = $telefone;
    }
    public function setCidade($cidade) {
        $this->cidade = $cidade;
    }
    public function setEstado($estado) {
        $this->estado = $estado;
    }
    public function setPais($pais) {
        $this->pais = $pais;
    }
    public function setEmail($email) {
        $this->email = $email;
    }
    
    public function setWeb($web) {
        $this->web = $web;
    }
    public function getWeb() {
        return $this->web;
    }
    
}
