<?php
if(isset($_GET['idusuario'])) {
    $idusuario = $_GET['idusuario'];
}
$idlivro   = $livro->li_idlivro;

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?=$livro->li_titulo ?></title>
</head>
<style type="text/css">
    .estrelas input[type=radio]{
        display: none;
    }.estrelas label i.fa:before{
         content: '\f005';
         color: #FC0;
     }.estrelas  input[type=radio]:checked  ~ label i.fa:before{
          color: #CCC;
      }
    #card{
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }
</style>
<body style="background-color: #7EE8FA;"><br><br><br><br><br><br>

<div class="main ui container center align page" style="width: 700px">
    <div class="ui segment" id="card">
    <div class="ui items">
        <div class="item">
            <?php
            $crud12 = new CrudLivros();
            $nomeCapa = $crud12->pegarNomeCapa($livro);
            //                    print_r($nomeCapa['arquivo']);
            if (isset($nomeCapa['arquivo'])){
            ?>
            <a class="ui image">
                <img href="ControlerLivro.php?acao=show" src="../../assets/img/livros/<?=$nomeCapa['arquivo']?>" style="height:500px; width:300px">
            </a>
            <?php
            }else {
                ?>
                <a class="ui image">
                    <img href="ControlerLivro.php?acao=show" src="../../assets/img/livros/default.jpg"
                         style="height:500px; width:300px">
                </a>
                <?php
            }
            ?>
            <div class="content">
                <div class="header" style="padding-top:10px"><?= $livro->li_titulo ?></div>
                <div class="meta">
                    <div class="header"><?= $livro->li_autor ?></div>
                </div>
                <?php
                if (isset($_GET['idusuario'])){


                    ?>
                    <div class="header" style="padding-top:10px">
                        Classificação:
                        <form method="POST"
                              action="ControlerLivro.php?acao=votar&idusuario=<?= $idusuario ?>&idlivro=<?= $idlivro ?>"
                              enctype="multipart/form-data">
                            <div class="ui form estrelas">
                                <div class="fields" style="padding-top: 10px">
                                    <input type="radio" id="vazio" name="estrela" value="">

                                    <label for="estrela_um" style="padding-right: 3px"><i class="fa"></i></label>
                                    <input type="radio" id="estrela_um" name="estrela" value="1">

                                    <label for="estrela_dois" style="padding-right: 3px"><i class="fa"></i></label>
                                    <input type="radio" id="estrela_dois" name="estrela" value="2">

                                    <label for="estrela_tres" style="padding-right: 3px"><i class="fa"></i></label>
                                    <input type="radio" id="estrela_tres" name="estrela" value="3">

                                    <label for="estrela_quatro" style="padding-right: 3px"><i class="fa"></i></label>
                                    <input type="radio" id="estrela_quatro" name="estrela" value="4">

                                    <label for="estrela_cinco"><i class="fa" style="padding-right: 3px"></i></label>
                                    <input type="radio" id="estrela_cinco" name="estrela" value="5"><br><br>
                                    <div class="field">
                                        <input class="ui mini button" type="submit" value="Votar">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <?php
                }else{
                    $crudLivro = new CrudLivros();
                    $votos = $crudLivro->pegaMedia($idlivro);
                }
                ?>
                <div class="description">
                    <?php
                    $i = "1";
//                    print_r($resenhas);die;
                    if (isset($resenhas)) {
//                        echo "existe";die;
                     foreach ($resenhas as $resenha) {

                         //idusuario1 é a id do usuario que fez a sinopse
                         $idusuario1 = $resenha->re_idusuario;
                         //se existir id na url:
                         if (isset($_GET['idusuario'])) {
                             //se a id do usuario que fez a sinopse for igual a do usuario logado, mostra esditar/excluir
                             if ($idusuario1 == $_GET['idusuario']) {
                                 $id = $_GET['idusuario'];
                                 $idresenha = $resenha->re_id;
                                 echo "<p>$i ª sinópse</p>";
                                 echo "<p>$resenha->re_textoresenha</p>";
                                 echo "<a class=\"item\" href=\"?acao=editarSinopse&idresenha=$idresenha&idusuario=$id&idlivro=$livro->li_idlivro\">Editar resenha</a><br>";
                                 echo "<a class=\"item\" href=\"?acao=excluirSinopse&idresenha=$idresenha\">Excluir resenha</a><br>";
                                 echo "<div class='ui divider'></div>";


                                 //se não só mostra a resenha mesmo
                             } else {
                                 echo "<p>$resenha->re_textoresenha</p>";
                             }
                         }


                         //idusuario1 é a id do usuario que fez a resenha
                         $idusuario1 = $resenha->re_idusuario;
                         if (isset($livro->li_idusuario)) {
                             $idusuario2 = $livro->li_idusuario;
                         }
                         //se o di da url for igual o idusuario do livro, mostra o editar/excluir
                         echo "<br>";
                         $i++;
                     }
                    }
                    $idusuario2 = $livro->li_idusuario;
                    if (isset($idusuario2)) {
                        if (isset($_GET['idusuario'])) {
                            if ($_GET['idusuario'] == $idusuario2) {
                                echo "<a class=\"item\" href='ControlerLivro.php?acao=editarLivro&idlivro=$livro->li_idlivro&idusuario=$idusuario'>Editar livro</a><br><a class=\"item\" href='ControlerLivro.php?acao=excluirlivro&idlivro=$idlivro&idusuario=$idusuario'>Excluir livro</a><br>";
                            }
                        }
                    }
                    ?>
                <!--    se o usuario estiver logado, ele podera adicionar o livro a biblioteca e/ou adicionar uma nova sinopse ao mesmo-->
                <?php if (isset($_SESSION)){ $idusuario=$_SESSION['us_id']; echo "<a>Adicionar livro à biblioteca</a><br><a href='ControlerLivro.php?acao=add_sinopse&idusuario=$idusuario&idlivro=$livro->li_idlivro'>Adicionar nova resenha</a>";} ?>
                </div>
                <div class="extra"
                    <div class="content">
                        <div class="meta">
                            <div class="description">

                    <?php
                    $idlivro = $livro->li_idlivro;
                    $crudGenero = new CrudGenero();
                    $generos = $crudGenero->getGeneroLivro($idlivro);

                    ?>

                    <?php
                    foreach ($generos as $genero) {

//                        print_r($genero->gl_id);
                        $iddogenero = $genero->gl_idgenero;
//                        print_r($iddogenero);
                        $generodoLivro = $crudGenero->getGenero($iddogenero);
//                        print_r($generodoLivro);die;
?>
                        <a class="ui red label" style="margin-top: 6px"><?php echo utf8_encode($generodoLivro->ge_descricao);?></a>
                    <?php } ?>

                            </div>
                        </div>
                    </div>
            </div>
        </div>

            <div class="ui comments" style="padding-top: 3%">
                <h3 class="ui dividing header">Comentarios:</h3>
                <?php
                // AQUI FICA OS COMENTARIO
                if (isset($comentarios)) {
                    foreach ($comentarios as $comentario):
                        $cm_id = $comentario->cm_id;
                        $curtidas = $comentario->cm_curtidas;
                        $crud = new UsuarioCrud();
                        $usuario = $crud->getUsuarioId($comentario->cm_idusuario);
//            print_r($usuario->us_nome);die;
                        ?>


                        <div class="comment">
                            <div class="content">
                                <a class="author"><?= $usuario->us_nome ?></a>
                                <div class="metadata">
                                    <span class="date"><?= $comentario->cm_data ?></span>
                                    <?php
                                    if (isset($_GET['idusuario'])){
                                    ?>
                                    <div class="rating">
                                        <a href="ControlerLivro.php?acao=curtir&idcomentario=<?= $cm_id ?>&curtidas=<?= $curtidas ?>&idlivro=<?= $idlivro ?>&idusuario=<?= $idusuario ?>"><i
                                                    class="star icon"></i><?= $comentario->cm_curtidas ?></a>
                                    </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                                <div class="text">
                                    <?= $comentario->cm_texto ?>
                                </div>
                                <?php
                                if (isset($_GET['idusuario'])) {
                                    ?>
                                    <div class="actions">
                                        <?php if ($comentario->cm_idusuario == $idusuario) {
                                            $idcomentario = $comentario->cm_id;
                                            echo "<a class=\"reply\" href=\"ControlerLivro.php?acao=remove_coment&idcomentario=$idcomentario&idusuario=$idusuario&idlivro=$livro->li_idlivro\">Excluir</a>";
                                        } ?>
                                    </div>
                                    <?php
                                }
                                ?>

                            </div>
                        </div>
                    <?php
                    endforeach;
                } ?>
                <?php
                if(isset($_GET['idusuario'])) {
                ?>
                <form class="ui reply form"
                      action="?acao=add_coment&idlivro=<?= $idlivro ?>&idusuario=<?= $_GET['idusuario'] ?>"
                      method="post">
                    <div class="field">
                        <input type="text" max="200" name="cm_texto" placeholder="Faça um comentario">
                    </div>
                    <input style="visibility: hidden" type="text" name="getidusuario" value="<?= $_GET['idusuario'] ?>">
                    <input style="visibility: hidden" type="text" name="getidlivro" value="<?= $idlivro ?>">

                    <input type="submit" class="ui primary button icon" name="gravar" value="Comentar">

                </form>
            </div>
            <?php
        }
        ?>
            </div>
        </div>
    </div>
</div>
    <br><br><br><br>
</body>
</html>
<script>
    $('.ui.rating').rating();
</script>