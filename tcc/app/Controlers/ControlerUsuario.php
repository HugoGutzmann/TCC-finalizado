<?php

require '../Models/UsuarioCrud.php';
require '../Models/CrudLivros.php';
require_once '../Models/CrudGenero.php';
require_once '../Models/CrudBiblioteca.php';


if (isset($_GET['acao'])){
    $action = $_GET['acao'];
}else{
    $action = 'login';
}

switch ($action) {
    case 'index':

        if (isset($_GET['idusuario'])) {
            $id = $_GET['idusuario'];
            @session_start();
            $_SESSION['us_id'] = $id;
            $crud = new UsuarioCrud();
            $usuario = $crud->getUsuarioId($id);
            $fatorusuario = $crud->getFatorUsuario($id);
            $crud2 = new crudBiblioteca;
            $prateleiras = $crud2->getPrateleiras($usuario);

            if ($fatorusuario->fu_idusuario == $id) {
                $livros = $crud->setFatores($usuario);
            }else {
                $crudLivros = new CrudLivros();
                $livros = $crudLivros->getLivros();
            }
            include "../View/Template/cabecalho2.php";
            include "../View/index.php";
            include "../View/Template/rodape.php";
        }else {
            $tipuser = 0;
//            echo "nao ta logado";die;

            $crudLivros = new CrudLivros();
            $livros = $crudLivros->getLivros();

            include "../View/Template/cabecalho2.php";
            include "../View/index.php";
            include "../View/Template/rodape.php";
        }
//        $id = $_GET['idusuario'];
//        @session_start();
//        $_SESSION['us_id'] = $id;
//        $crud = new UsuarioCrud();
//        $usuario = $crud->getUsuarioId($id);
//
//        $crudLivros = new CrudLivros();
//        $livros = $crudLivros->getLivros();
//
//        include "../View/Template/cabecalho.php";
//        include "../View/index.php";
//        include "../View/Template/rodape.php";

        break;

    case 'index2':

        if (isset($_GET['idusuario'])) {
            $id = $_GET['idusuario'];
            @session_start();
            $_SESSION['us_id'] = $id;
            $crud = new UsuarioCrud();
            $usuario = $crud->getUsuarioId($id);
            $fatorusuario = $crud->getFatorUsuario($id);
            $crud2 = new crudBiblioteca;
            $prateleiras = $crud2->getPrateleiras($usuario);

            $crudLivros = new CrudLivros();
            $livros = $crudLivros->getLivros();

            include "../View/Template/cabecalho2.php";
            include "../View/index2.php";
            include "../View/Template/rodape.php";
        }else {
            $tipuser = 0;
//            echo "nao ta logado";die;

            $crudLivros = new CrudLivros();
            $livros = $crudLivros->getLivros();

            include "../View/Template/cabecalho2.php";
            include "../View/index2.php";
            include "../View/Template/rodape.php";
        }
//        $id = $_GET['idusuario'];
//        @session_start();
//        $_SESSION['us_id'] = $id;
//        $crud = new UsuarioCrud();
//        $usuario = $crud->getUsuarioId($id);
//
//        $crudLivros = new CrudLivros();
//        $livros = $crudLivros->getLivros();
//
//        include "../View/Template/cabecalho.php";
//        include "../View/index.php";
//        include "../View/Template/rodape.php";

        break;

    case 'login':
        if (!isset($_POST['gravar'])) {
            $tipuser = '';
            include "../View/Template/cabecalho.php";
            include "../View/telas/login.php";
            include "../View/Template/rodape.php";
        } else {
            $user = new Usuario(null, $_POST['email'], $_POST['senha']);
            $crud = new UsuarioCrud();
            $resultado = $crud->LoginUsuario($user);
            $user = $crud->getUsuario($_POST['email']);

            if ($resultado == 0) {
                header("Location: ?acao=login&erro=loginerrado");
            } else {
                session_start();
                $_SESSION['us_id'] = $user->getUsId();
                $id = $_SESSION['us_id'];
                $crud = new UsuarioCrud();
                $user = $crud->getUsuarioId($id);
                $tipuser = $user->getTipUsuario();
                header("Location: ControlerUsuario.php?acao=index&idusuario=$id");
                die;
            }
        }

        break;

    case 'logout':

        session_start();
        session_destroy();
        header("Location: ControlerUsuario.php");

        break;

    case 'cadastrar':
        $tipuser = 0;
        if (!isset($_POST['gravar'])) {

            include "../View/Template/cabecalho.php";
            include "../View/telas/cadastrar.php";
            include "../View/Template/rodape.php";
        } else {
            if ($_POST) {
                $email = $_POST['email'];
                $emailConfirma = $_POST['email1'];
                $senha = $_POST['senha'];
                $senhaConfirma = $_POST['senha1'];
                if ($email != $emailConfirma) {
                    header("Location: ?acao=cadastrar&erro=emailerrado");
                } elseif ($senha != $senhaConfirma) {
                    header("Location: ?acao=cadastrar&erro=senhaerrada");
                } else {
                    $user = new Usuario($_POST['nome'], $_POST['email'], $_POST['senha'], $_POST['datanascimento'], $_POST['sexo'], $_POST['tip_usuario']);
                    $crud = new UsuarioCrud();
                    $crud->insertUsuario($user);

                    header("Location: ?acao=login");
                }

            }
        }
        break;

    case 'editar':

        if (!isset($_POST['gravar'])) {
            $id = $_GET['idusuario'];
            $crud = new UsuarioCrud();
            $usuario = $crud->getUsuarioId($id);
            include "../View/Template/cabecalho.php";
            include "../View/telas/editardireto.php";
            include "../View/Template/rodape.php";
        } else {
            $id = $_POST['getidusuario'];
//            print_r($id);die;
            $crud = new UsuarioCrud();
            $usuario = $crud->getUsuarioId($id);
            $user = new Usuario($_POST['nome'], $_POST['email'], $_POST['senha'], $usuario->us_datanascimento, $usuario->us_sexo, $usuario->us_id, $usuario->tip_usuario);
            $crud->updateUsuario($user);
            header("Location: ?acao=login");
        }

        break;

    case 'excluir':

        $iduser = $_GET['iduser'];
        //EXCLUI USUARIO
        $cruduser = new UsuarioCrud();
        $resultado = $cruduser->deleteUsuario($iduser);
        header("Location: ControlerUsuario.php");

        break;

    case 'biblioteca':

        if (isset($_SESSION['us_id'])) {
            header("Location: ControlerUsuario.php?acao=login&erro=naologado");
        } else {
            $id = $_GET['idusuario'];
            @session_start();
            $_SESSION['us_id'] = $id;
            $crud = new UsuarioCrud();
            $usuario = $crud->getUsuarioId($id);

//            $crud2 = new CrudBiblioteca();
//            $livrosPrateleira=$crud->getPrateleiras($id);

            include "../View/Template/cabecalho.php";
            include "../View/telas/bibliotecateste.php";
            include "../View/Template/rodape.php";


            break;
        }
    break;

    case 'adicionarPrateleira':

        if (!isset($_POST['gravar'])) {
            $id = $_GET['iduser'];
//            $crud = new ();
            $usuario = $crud->getUsuarioId($id);
            include "../View/telas/editar.php";
        } else {
            $id = $_GET['iduser'];
            $crud = new UsuarioCrud();
            $usuario = $crud->getUsuarioId($id);
            $user = new Usuario($_POST['nome'], $_POST['email'], $_POST['senha'], $usuario->us_datanascimento, $usuario->us_sexo, $usuario->us_id, $usuario->tip_usuario);
            $crud->updateUsuario($user);
            header("Location: ?acao=login");
        }

        break;
}




if ($tipuser = 1 OR $tipuser = 2) {
    include_once 'ControlerFormulario.php';

}
