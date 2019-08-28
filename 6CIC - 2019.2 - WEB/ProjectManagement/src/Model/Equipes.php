<?php

class Equipes {
    private $emailUsuario, $codigoTarefa, $codigoProjeto, $codigoPermissao;
    
    function getEmailUsuario() {
        return $this->emailUsuario;
    }

    function getCodigoTarefa() {
        return $this->codigoTarefa;
    }

    function getCodigoProjeto() {
        return $this->codigoProjeto;
    }

    function getCodigoPermissao() {
        return $this->codigoPermissao;
    }

    function setEmailUsuario($emailUsuario) {
        $this->emailUsuario = $emailUsuario;
    }

    function setCodigoTarefa($codigoTarefa) {
        $this->codigoTarefa = $codigoTarefa;
    }

    function setCodigoProjeto($codigoProjeto) {
        $this->codigoProjeto = $codigoProjeto;
    }

    function setCodigoPermissao($codigoPermissao) {
        $this->codigoPermissao = $codigoPermissao;
    }


}
