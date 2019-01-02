<?php
require_once "../Models/UsuarioCrud.php";
require_once "../Models/FatorUsuario.php";
require_once "../Models/Fator.php";
require_once "../Models/CrudGenero.php";

if (isset($_GET['acao'])){
    $action = $_GET['acao'];
}else{
    $action = 'index';
}
switch ($action){
    case 'formulario':
        if (!isset($_POST['gravar'])) {
            $id = $_GET['idusuario'];
            @session_start();
            $_SESSION['us_id'] = $id;
            $crud = new UsuarioCrud();
            $usuario = $crud->getUsuarioId($id);
            $tipuser = $usuario->getTipUsuario();

            $crudGenero = new CrudGenero();
            $generos = $crudGenero->getGeneros();

            include "../View/Template/cabecalho.php";
            include "../View/telas/formulario.php";
            include "../View/Template/rodape.php";
        }else{
            $id = $_POST['getidusuario'];
            @session_start();
            $_SESSION['us_id'] = $id;
            $crud = new UsuarioCrud();
            $usuario = $crud->getUsuarioId($id);
            $tipuser = $usuario->getTipUsuario();
            $fatores = new Fator();

            $resultadoFormularioTL = new FatorUsuario(null,1,$id,$_POST['TamanhoLivro']);
            $resultadoFormularioGL = new FatorUsuario(null,2,$id,$_POST['GenerosLivro']);
            $resultadoFormularioAU = new FatorUsuario(null,3,$id,$_POST['AvaliacaoUsuarios']);
            $resultadoFormularioAP = new FatorUsuario(null,4,$id,$_POST['AnoPublicacao']);
            $resultadoFormularioCL = new FatorUsuario(null,5,$id,$_POST['CensuraLivro']);
            $resultadoFormularioLA = new FatorUsuario(null,6,$id,$_POST['LivrosAlta']);
//            print_r($resultadoFormularioTL);die;
//            print_r($resultadoFormularioGL);
//            print_r($resultadoFormularioAU);
//            print_r($resultadoFormularioAP);
//            print_r($resultadoFormularioCL);
//            print_r($resultadoFormularioLA);
            header("Location: ControlerUsuario.php?acao=index&idusuario=$id");

            $crudFormulario = new UsuarioCrud();
            $usuarioa = $id;
            $crudFormulario->getResultadoFormulario($resultadoFormularioTL,$resultadoFormularioGL,$resultadoFormularioAU,$resultadoFormularioAP,$resultadoFormularioCL,$resultadoFormularioLA);

        }

        break;
}