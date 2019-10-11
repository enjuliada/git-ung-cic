<?php

//referenciando arquivos de classes que 
//terão metodos utilizados
require_once "../Model/Usuarios.php";
require_once "ConexaoDAO.php";

class UsuariosDAO {

    public static function cadastrarUsuario($tmpUsuario) {

        $vConn = ConexaoDAO::abrirConexao();
        $email = $tmpUsuario->getEmail();

        $sqlVerifica = "Select * from Usuarios where email_USUARIO like '$email'";
        $rsVerifica = mysqli_query($vConn, $sqlVerifica) or die(mysqli_error($vConn));

        if (mysqli_num_rows($rsVerifica) > 0) {
            return 0;
        } else {

            $sqlCadastra = "Insert into usuarios(";
            $sqlCadastra .= "email_USUARIO, nome_USUARIO,";
            $sqlCadastra .= "senha_USUARIO,telefone_USUARIO)";
            $sqlCadastra .= "values(";
            $sqlCadastra .= "'" . $tmpUsuario->getEmail() . "',";
            $sqlCadastra .= "'" . $tmpUsuario->getNome() . "',";
            $sqlCadastra .= "'" . md5($tmpUsuario->getSenha()) . "',";
            $sqlCadastra .= "'" . $tmpUsuario->getTelefone() . "')";

            //executando SQL e interrompendo a execução do metodo
            //em caso de erro
            mysqli_query($vConn, $sqlCadastra)
                    or die(mysqli_error($vConn));

            return 1;
        }
    }

    public static function validarUsuario($tmpEmail, $tmpSenha) {


        $vConn = ConexaoDAO::abrirConexao();

        $sqlLogin = "Select * from usuarios where ";
        $sqlLogin .= "email_USUARIO like '$tmpEmail' and ";
        $sqlLogin .= "senha_USUARIO like '" . md5($tmpSenha) . "'";

        $rsLogin = mysqli_query($vConn, $sqlLogin)
                or die(mysqli_error($vConn));

        //se numero de linhas do select for maior que 0
        if (mysqli_num_rows($rsLogin) > 0) {

            $dados = mysqli_fetch_array($rsLogin); //abrindo o resultset

            $tmpUsuario = new Usuarios();
            //preenchendo objeto
            $tmpUsuario->setEmail($dados['email_USUARIO']);
            $tmpUsuario->setNome($dados['nome_USUARIO']);
            $tmpUsuario->setTelefone($dados['telefone_USUARIO']);

            return $tmpUsuario;
        } else {
            return null;
        }
    }

    public static function listarIntegrantes($tmpCodigo) {
        $vConn = ConexaoDAO::abrirConexao();

        $sqlInteg = "Select U.* from USUARIOS U, EQUIPES E ";
        $sqlInteg .= "where E.codigoProjeto_EQUIPE = '$tmpCodigo' ";
        $sqlInteg .= "and E.emailUsuario_EQUIPE = U.email_USUARIO";

        $rsInteg = mysqli_query($vConn, $sqlInteg)
                or die(mysqli_error($vConn));

        if (mysqli_num_rows($rsInteg) == 0) {
            return null;
        } else {

            $itens = new ArrayObject();

            while ($dados = mysqli_fetch_array($rsInteg)) {

                $tmpUsuario = new Usuarios();

                $tmpUsuario->setEmail($dados['email_USUARIO']);
                $tmpUsuario->setNome($dados['nome_USUARIO']);
                $tmpUsuario->setTelefone($dados['telefone_USUARIO']);

                $itens->append($tmpUsuario);
            }//fechando while

            return $itens;
        }//fechando else
    }

//fechando metodo

    public static function adicionarIntegrante($tmpProjeto, $tmpEmail) {
        $vConn = ConexaoDAO::abrirConexao();

        $sqlVerifica = "Select * from Usuarios where email_USUARIO like '$tmpEmail'";
        $rsVerifica = mysqli_query($vConn, $sqlVerifica) or die(mysqli_error($vConn));

        if (mysqli_num_rows($rsVerifica) == 0) {
            return 0;
        } else {
            $sqlVerEquip = "Select * from Equipes where emailUsuario_EQUIPE like '$tmpEmail' and codigoProjeto_EQUIPE = '$tmpProjeto'";
            $rsVerEquip = mysqli_query($vConn, $sqlVerEquip) or die(mysqli_error($vConn));

            if (mysqli_num_rows($rsVerEquip) > 0) {
                return -1;
            } else {
                $sqlAdd = "Insert into Equipes(codigoProjeto_EQUIPE, emailUsuario_EQUIPE, codigoPermissao_EQUIPE) values (";
                $sqlAdd .= "'$tmpProjeto','$tmpEmail',2)";

                mysqli_query($vConn, $sqlAdd) or die(mysqli_error($vConn));

                return 1;
            }
        }
    }

    public static function consultarUsuario($tmpEmail) {
        $vConn = ConexaoDAO::abrirConexao();

        $sqlUsuario = "Select * from Usuarios where email_USUARIO like '$tmpEmail'";
        $rsUsuario = mysqli_query($vConn, $sqlUsuario) or die(mysqli_error($vConn));

        $tmpUsuario = new Usuarios();

        $tblUsuario = mysqli_fetch_array($rsUsuario);
        $tmpUsuario->setEmail($tblUsuario['email_USUARIO']);
        $tmpUsuario->setNome($tblUsuario['nome_USUARIO']);
        $tmpUsuario->setTelefone($tblUsuario['telefone_USUARIO']);

        return $tmpUsuario;
    }

}

//fechando classe
