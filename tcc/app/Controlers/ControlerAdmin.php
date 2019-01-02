<?php

require '../Models/UsuarioCrud.php';


if (isset($_GET['acao'])){
    $action = $_GET['acao'];
}else{
    $action = 'index';
}

switch ($action){
    case 'index':


        $crudUser = new UsuarioCrud();
        $usuarios = $crudUser->getUsuarios();

        $crudGenero = new CrudGenero();
        $generos = $crudGenero->getGeneros();

        @session_start();

//        $_SESSION['id'] = $_GET['iduser'];
        $id = $_GET['iduser'];
        $usuario = $crudUser->getUsuarioId($id);
        $tipuser = $usuario->getTipUsuario();


        include "../View/Template/cabecalho.php";
        include "../View/admin/adminindex.php";

        break;

    case 'editar':
        $id = $_GET['iduser'];
        $crud= new UsuarioCrud();
        $usuarioEdit = $crud->getUsuarioId($id);
        if (!isset($_POST['gravar'])) {

            @session_start();
//            print_r($usuarioEdit);
            include "../View/Template/cabecalho.php";
            include "../View/telas/editar.php";
        } else {
            $id2 = $_POST['getidusuario'];
            $crud = new UsuarioCrud();
            $usuario2 = $crud->getUsuarioId($id2);
//            print_r($usuario);die;
            $user = new Usuario($_POST['nome'], $_POST['email'], $_POST['senha'], $usuario2->us_datanascimento,$usuario2->us_sexo,$usuario2->us_id,$usuario2->tip_usuario);
//            print_r($user);die;
            $crud->updateUsuario($user);
            header("Location: ControlerAdmin.php?index&iduser=1");
        }

        break;

    case 'excluir':

        $iduser = $_GET['iduser'];
        //EXCLUI USUARIO
        $cruduser = new UsuarioCrud();
        $resultado = $cruduser->deleteUsuario($iduser);
        header("Location: ControlerAdmin.php?index&iduser=1");

        break;

    case 'addGenero':

        if (!isset($_POST['gravar'])) {
            $id = $_GET['iduser'];
            $crud= new UsuarioCrud();
            $usuario = $crud->getUsuarioId($id);
            @session_start();
            include "../View/Template/cabecalho.php";
            include "../View/telas/addGenero.php";
            include "../View/Template/rodape.php";
        } else {
            $id = $_GET['iduser'];

            $idGenero = $_GET['idGenero'];
            $crudGenero = new CrudGenero();
            $genero = new Generos($_POST['descricao']);
            $crudGenero->addGenero($genero);
            header("Location: ControlerAdmin.php?index&iduser=1");
        }
        break;

    case 'excluirGenero':

        $idGenero = $_GET['idGenero'];
        //EXCLUI USUARIO
        $crudGenero = new CrudGenero();
        $crudGenero->excluirGenero($idGenero);
        header("Location: ControlerAdmin.php?index&iduser=1");

        break;

    case 'editarGenero':

        if (!isset($_POST['gravar'])) {
            $idGenero = $_GET['idGenero'];
            $crudGenero = new CrudGenero();
            $genero = $crudGenero->getGenero($idGenero);
            @session_start();
            include "../View/Template/cabecalho.php";
            include "../View/telas/editarGenero.php";
            include "../View/Template/rodape.php";
        } else {
            $idGenero = $_POST['idGenero'];
            $crudGenero = new CrudGenero();
            $genero = $crudGenero->getGenero($idGenero);
            $generonovo = new Generos($_POST['descricao']);
            $crudGenero->editarGenero($generonovo,$idGenero);
            header("Location: ControlerAdmin.php?index&iduser=1");
        }
        break;
}