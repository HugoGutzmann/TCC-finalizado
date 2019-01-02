<?php

require_once "../Models/CrudLivros.php";
require_once "../Models/CrudResenha.php";
require_once "../Models/UsuarioCrud.php";
require_once "../Models/CrudGenero.php";
require_once "../Models/GeneroLivro.php";
require_once "../Models/Resenha.php";
require_once "../Models/AvalicaoLivro.php";
require_once "../Models/Prateleira.php";
require_once "../Models/CrudBiblioteca.php";
require_once "../Models/CrudComentario.php";


if (isset($_GET['acao'])){
    $action = $_GET['acao'];
}else{
    $action = 'index';
}


switch ($action){
    case 'add_livro':


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
            include "../View/telas/addlivro.php";
            include "../View/Template/rodape.php";
        } else {
            $idusuario = $_POST['getidusuario'];
            $livro = new Livros($_POST['li_ano'],
                                $_POST['li_autor'],
                                $_POST['li_censura'],
                                $_POST['li_editora'],
                                $_POST['li_paginas'],
                                $_POST['li_titulo'],
                                null,
                                $_POST['getidusuario']);
            $crud = new CrudLivros();
            $id = $crud->addLivro($livro);

            if(isset($_FILES['imagem'])){
                //print_r($_FILES);
                $extensao = strtolower (substr($_FILES['imagem']['name'], -4)); //pega a extensao do arquivo, transforma tudo em minusculo
                $novo_nome = md5(time()) . $extensao; //define novo nome do arquivo criptografado para não ter dois arquivos de mesmo nome
                $diretorio = "../../assets/img/livros/"; //define o diretorio pra onde vai o arquivo
                echo $diretorio.$novo_nome;
                move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio.$novo_nome); //coisa o upload
                $crud->vincularCapa($id,$novo_nome);
    
            }else{
                $novo_nome = 'defalt.jpg';
                die;
            }

            $crud2 = new CrudGenero();
            foreach ($_POST['li_genero'] as $genero) {
                $generoLivro = new GeneroLivro (null,$id, $genero);
                $crud2->addLivroGenero($generoLivro);
            }

            header("Location: ControlerUsuario.php?acao=index&idusuario=$idusuario");

            $crud3 = new CrudLivros();
            $crud4 = new CrudGenero();

            $id_livro=$crud3->getLivroPorUsuario($idusuario);
//            print_r($livroTentativa->li_idlivro);die;
            $generoDesseLivro = $crud4->getGeneroLivro($id_livro->li_idlivro);
//            print_r($generoDesseLivro['0']->gl_idgenero);die;
            $crud3->addFatoresLivro($id_livro,$livro, $generoDesseLivro['0']->gl_idgenero);

        }

        break;

    case 'add_imagem_teste':

        $msg = false;
    if(!isset($_POST['gravarteste'])){
        include "../View/telas/addImagemTeste.php";
    }
        if(isset($_FILES['imagem'])){
            $extensao = strtolower (substr($_FILES['imagem']['name'], -4)); //pega a extensao do arquivo, transforma tudo em minusculo
            $novo_nome = md5(time()) . $extensao; //define novo nome do arquivo criptografado para não ter dois arquivos de mesmo nome
            $diretorio = "../../assets/img/livros/"; //define o diretorio pra onde vai o arquivo

            move_uploaded_file($_FILES['imagem']['tpm_name'], $diretorio.$novo_nome); //coisa o upload

            $sql = "INSERT INTO imagem (img_id, arquivo, data) VALUES (null, '$novo_nome', NOW())";

            if ($mysqlli->query($sql)){
                $msg = "Arquivo enviado com sucesso";

            }else{
                $msg = "falha ao enviar o arquivo";
            }

        }
        break;

    case 'show':
        if (isset($_GET['idusuario'])){
        $id = $_GET['idusuario'];
        @session_start();
        $_SESSION['us_id'] = $id;
        $crudLivros = new CrudLivros();
        $idlivro = $_GET['idlivro'];
        $resenhas = $crudLivros->getResenhas($idlivro);
        $crud = new UsuarioCrud();
        $usuario = $crud->getUsuarioId($id);
        $tipuser = $usuario->getTipUsuario();
        }else {
            $tipuser = 0;
        }
        $idlivro = $_GET['idlivro'];
        $crudLivros = new CrudLivros();
        $resenhas = $crudLivros->getResenhas($idlivro);
        $livro = $crudLivros->getLivro($idlivro);
        $crudComentario = new CrudComentario();
        $comentarios = $crudComentario->getComentarios($livro);
//        print_r($comentarios);die;


        include "../View/Template/cabecalho.php";
        include "../View/telas/livro.php";
        include "../View/Template/rodape.php";

        break;


    case 'add_sinopse':


        if (!isset($_POST['gravar'])) {
            if (isset($_GET['idusuario'])){
            $id = $_GET['idusuario'];
            @session_start();
            $_SESSION['us_id'] = $id;
            $crud = new UsuarioCrud();
            $usuario = $crud->getUsuarioId($id);
            $tipuser = $usuario->getTipUsuario();
            }else{
                $tipuser = 0;
            }

            include "../View/Template/cabecalho.php";
            include "../View/telas/addsinopse.php";
            include "../View/Template/rodape.php";
        }else{

//    require_once "../View/telas/addsinopse.php";
            $idlivro = $_POST['getidlivro'];
            $crudLivro = new CrudLivros();
            $livro = $crudLivro->getLivro($idlivro);
            $idusuario = $_POST['getidusuario'];

            $data1 = new DateTime();
            $data  = $data1->format('Y-m-d H:i:s');
            $sinopseLivro = new Resenha(null, $livro->li_idlivro, $idusuario, $data, $_POST['re_textoresenha'], 1);


            $crud = new CrudLivros();
            $crud->addResenha($sinopseLivro);
            echo "<script>alert('A sinopse foi cadastrada')</script>";
            header("Location: ControlerUsuario.php?acao=index&idusuario=".$idusuario);

        }

        break;
    case 'add_prateleira':
        $idusuario = $_GET['idusuario'];
        if (!isset($_POST['gravar'])) {

        }else{
//            $crudLivro = new CrudLivros();

            $data1 = new DateTime();
            $data  = $data1->format('Y-m-d H:i:s');
            $adiciona = new Prateleira(null,$_POST['descricao'], $idusuario,$data,null);
//        print_r($adiciona);die;
            $crud = new CrudBiblioteca();
            $crud->addPrateleira($adiciona);
//            print_r($adiciona);die;
        }
        header("Location: ControlerUsuario.php?acao=index&idusuario=".$idusuario);
        break;

    case 'excluirSinopse':
        $idusuario = $_GET['idusuario'];
        $idresenha = $_GET['idresenha'];
        $crudLivro = new CrudResenha();
        $crudLivro->excluirResenha($idresenha);
        header("Location: ControlerUsuario.php:acao=index&idusuario=".$idusuario);
        break;

    case 'editarSinopse':
        if (!isset($_POST['gravar'])) {
            $id = $_GET['idusuario'];
            $idresenha = $_GET['idresenha'];
            $crud = new CrudResenha();
            $resenhas = $crud->getResenha($idresenha);
//            echo "aaaaa";die;
            include "../View/Template/cabecalho.php";
            include "../View/telas/editarsinopse.php";
            include "../View/Template/rodape.php";
        } else {
            $id = $_POST['idusuario'];
            $idresenha = $_POST['idresenha'];
            $livro_idlivro = $_POST['idlivro'];
            $crud = new CrudResenha();
            $data1 = new DateTime();
            $data  = $data1->format('Y-m-d H:i:s');
            $resenhas = $crud->getResenhas($idresenha);
            $sinopseLivro = new Resenha(null,$livro_idlivro,$id,$data,$_POST['re_textoresenha'],1);
            $crud->editarResenha($sinopseLivro);
            header("Location: ControlerLivro.php?acao=show&idlivro=$livro_idlivro&idusuario=$id");
        }

        break;

    case 'excluirlivro':
        $id = $_GET['idusuario'];
        $idlivro= $_GET['idlivro'];
        $crud = new CrudLivros();
        $crud->excluirLivro($idlivro);
        header("Location: ControlerUsuario.php?acao=index&idusuario=$id");

        break;

    case 'add_coment':
//        print_r($_POST['cm_texto']);die;
        $data = new DateTime();
        $dataComentario  = $data->format('Y-m-d H:i:s');
        $novoComentario = new Comentario(
            $_POST['cm_texto'],
            $dataComentario,
            $_POST['getidusuario'],
            $_POST['getidlivro']
        );
        $idusuario=$_POST['getidusuario'];
        $idlivro=$_POST['getidlivro'];

        $crud = new CrudComentario();
        $crud->fazComentario($novoComentario);
        header("Location: ControlerLivro.php?acao=show&idlivro=$idlivro&idusuario=$idusuario");
        break;

    case 'add_livroprateleira':
        $idusuario = $_GET['idusuario'];
        if (!isset($_POST['gravar'])) {

        }else{
            $crudLivro = new CrudLivros();
            foreach ($_POST['livroadicionado'] as $livroadicionado) {
//            print_r($livroadicionado);die;

            $data1 = new DateTime();
            $data  = $data1->format('Y-m-d H:i:s');
            $adiciona = new Biblioteca(null,$livroadicionado,$_POST['getidprateleira'],$data,null);


            $crud = new CrudBiblioteca();
            $crud->addBiblioteca($adiciona);
//                print_r($adiciona->bi_idlivro);die;
//                print_r($adiciona->getBiIdlivro());
            }
        }
        header("Location: ControlerUsuario.php?acao=index&idusuario=".$idusuario);
        break;

    case 'editarLivro':
        if (!isset($_POST['gravar'])) {
        $id = $_GET['idusuario'];
        $idlivro = $_GET['idlivro'];
        $crud = new CrudLivros();
        $crud2 = new CrudGenero();
        $generos = $crud2->getGeneros();
        $livro = $crud->getLivro($idlivro);
//            print_r($livro);die;
        include "../View/Template/cabecalho.php";
        include "../View/telas/editarLivro.php";
        include "../View/Template/rodape.php";
    } else {
        $id = $_POST['getidusuario'];
        $idlivro = $_POST['getidlivro'];
        $crud = new CrudLivros();
        $crud2 = new CrudGenero();
        $livro = new Livros($_POST['li_ano'],
                            $_POST['li_autor'],
                            $_POST['li_censura'],
                            $_POST['li_editora'],
                            $_POST['li_paginas'],
                            $_POST['li_titulo'],
                            $_POST['getidlivro'],
                            $_POST['getidusuario']);
//      print_r($livro);die;
        $crud->editarLivro($livro);
            $crud = new CrudLivros();
//            $id_livro=$crud->getLivroPorUsuario($id);
//            $idfator1 = $crud->pegaIdFator($idlivro, 1);
//            $idfator2 = $crud->pegaIdFator($idlivro, 2);
//            $idfator4 = $crud->pegaIdFator($idlivro, 4);
//            $idfator5 = $crud->pegaIdFator($idlivro, 5);

            $atualizaLivro = $crud->editarLivro($livro);

            foreach ($_POST['li_genero'] as $genero) {
                $generoLivro = new GeneroLivro (null,$id, $genero);
                $crud2->AtualizaLivroGenero($generoLivro, $idlivro);
            }

            $generoDesseLivro = $crud2->getGeneroLivro($idlivro);
//            print_r($generoDesseLivro['0']->gl_idgenero);die;

            $crud->atualizaFatoresLivro($livro,$generoDesseLivro['0']->gl_idgenero);
//            header("Location: ControlerLivro.php?acao=show&idlivro=$livro->li_idlivro&idusuario=$id");
        }



        break;

    case 'remove_coment':

        $id = $_GET['idusuario'];
        $crud = new CrudLivros();
        $id_livro= $_GET['idlivro'];

        $crud2 = new CrudComentario();
        $cm_id = $_GET['idcomentario'];
        $remover = $crud2->excluiComentario($cm_id);
        header("Location: ControlerUsuario.php?acao=index&idusuario=$id");
        break;

    case 'votar':

            $qtdestrela = $_POST['estrela'];
            $idusuario  = $_GET['idusuario'];
            $idlivro    = $_GET['idlivro'];
            $data1 = new DateTime();
            $data  = $data1->format('Y-m-d H:i:s');
            $avaliacao  = new AvalicaoLivro(null, $idlivro, $idusuario, $data, $qtdestrela);

            $crud = new CrudLivros();
            $votar = $crud->votaLivro($avaliacao);
        header("Location: ControlerLivro.php?acao=show&idlivro=$idlivro&idusuario=$idusuario");
        break;

    case 'curtir':

        $idusuario = $_GET['idusuario'];
        $idlivro = $_GET['idlivro'];
        $cm_id = $_GET['idcomentario'];
        $curtidasAtuais = $_GET['curtidas'];
        $crud = new CrudComentario();
        $curtir = $crud->curteComentario($cm_id,$curtidasAtuais);
//        echo "ControlerLivro.php?acao=show&idlivro=$idlivro&idusuario=$idusuario";die;
        header("Location: ControlerLivro.php?acao=show&idlivro=$idlivro&idusuario=$idusuario");
        break;

    case 'exLiBi':

        $idlivro = $_GET['idlivro'];
        $idusuario = $_GET['idusuario'];

        $crud = new CrudBiblioteca();
        $exclui = $crud->excluiLivroBiblioteca($idlivro);

        header("Location:ControlerUsuario.php?acao=biblioteca&idusuario=$idusuario");
        break;

    case 'add_livroprateleira2':
        $idusuario = $_GET['idusuario'];
        if (!isset($_POST['gravar'])) {

        }else{
            $crudLivro = new CrudLivros();

//            print_r($livroadicionado);die;

                $data1 = new DateTime();
                $data  = $data1->format('Y-m-d H:i:s');
                $adiciona = new Biblioteca(null,$_POST['getidlivro'],$_POST['prateleira'],$data,null);

//print_r($adiciona);die;
                $crud = new CrudBiblioteca();
                $crud->addBiblioteca($adiciona);
//                print_r($adiciona->bi_idlivro);
//                print_r($adiciona->getBiIdlivro());

        }
        header("Location: ControlerUsuario.php?acao=index&idusuario=".$idusuario);
        break;

}


