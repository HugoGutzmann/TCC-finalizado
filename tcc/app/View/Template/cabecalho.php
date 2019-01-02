<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!--  CSS's  -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/css/Semantic-UI-CSS-master/semantic.css"/>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <!--   JS's -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.9/semantic.min.js"></script>
</head>

<body class="body"  >
<div class="ui secondary  menu hum" style="background-color: #FFBD5B;">

    <?php

    if (isset($_GET['idusuario'])){
        $_SESSION['us_id'] = $_GET['idusuario'];
//    }else{
//        echo die;
    }

    ?>
    <a class="header item" href="ControlerUsuario.php?acao=index<?php if (isset($_SESSION['us_id'])) {
//        $idusuario = $_SESSION['us_id'];
        echo "&idusuario=" . $_SESSION['us_id'];
    }
    ?>">Página Inicial</a>
    <?php
    if (isset($_SESSION['us_id'])) {
        $id = $_SESSION['us_id'];

    }else{
        $id = '';
    }
    ?>

    <?php

    if(isset($_SESSION['us_id'])){
        $crud = new UsuarioCrud();

        $usuario = $crud->getUsuarioId($id);
        $tipuser = $usuario->getTipUsuario();

        echo "<a class=\"item\" href=\"ControlerUsuario.php?acao=biblioteca&idusuario=$id\">Biblioteca</a><a class=\"item\" href=\"ControlerFormulario.php?acao=formulario&idusuario=$id\">Formulário</a>";
    }else{
        echo "";
    }
    ?>

    <?php

      if (isset($_SESSION)){
          $id = $_SESSION['us_id'];
//        echo "<div class=\"ui dropdown item\">Adicionar
//    <i class=\"angle down icon\"></i>
//            <div class=\"menu\">
                   echo "<a class=\"item\" href=\"ControlerLivro.php?acao=add_livro&idusuario=$id\">Adicionar Livro</a>";
//                    "<a class=\"item\" href=\"ControlerLivro.php?acao=add_sinopse&idusuario=$id\">Adicionar Sinopse</a>";
//            </div>

//    </div>";
     }else{
          echo "";
      }
      ?>

    <div class="right menu">

<!--    Começo do dropdown-->
        <div class="ui dropdown item">
            <i class="user circle icon"></i><?php
            if (!isset($_SESSION['us_id'])){
            echo "Visitante";
            }else{
            $id = $_SESSION['us_id'];
            $crud = new UsuarioCrud();
            $user = $crud->getUsuarioId($id);
            $nome = $user->getUsNome();
            echo $nome;            }
            ?>
            <i class="angle down icon"></i>
            <div class="menu">
                <?php
                if (isset($_SESSION)){

                    $tipuser = $user->getTipUsuario();
                if ($tipuser == 2){
                    $id = $_SESSION['us_id'];
                    echo "<a class=\"item\" href=\"ControlerAdmin.php?iduser=$id\">Área do Admin</a>";
                }else{
                    echo "";
                }
                }else{
                    echo "";
                }
                ?>
                <!--ARRUMAR ISSO AQUI-->
<!--                --><?php
//                $paw = $_SESSION['us_id'];
                if (isset($_SESSION['us_id'])){

                    $idusuario = $_SESSION['us_id'];

                    echo "<a class=\"item\" href=\"ControlerUsuario.php?acao=editar&idusuario=$idusuario\">Editar</a><a class=\"item\" href=\"ControlerUsuario.php?acao=excluir&iduser=$idusuario\">Excluir</a><a class=\"item\" href=\"ControlerUsuario.php?acao=logout\">Sair</a>";
                }else{
                    echo "<a class=\"item\" href=\"ControlerUsuario.php?acao=login\">Entrar</a>    <a class=\"item\" href=\"ControlerUsuario.php?acao=cadastrar\">Cadastrar</a>   ";
                }
//                ?>

            </div>
        </div>
    </div>
<!--       final do dropdown -->
    </div>
</div>
</body>

<script>
    $('.ui.dropdown').dropdown();
</script>


