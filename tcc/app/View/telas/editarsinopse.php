<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php


//
$idusuario = $_GET['idusuario'];
$idlivro = $_GET['idlivro'];
$crudLivro = new CrudLivros();
$livro = $crudLivro->getLivro($idlivro);
//print_r($livro->li_idlivro);die;
$crudResenha = new CrudResenha();
$idresenha = $_GET['idresenha'];
$resenha = $crudResenha->getResenha($idresenha);
//print_r($resenha->re_id);

?>
<div class="ui center aligned page grid">
    <div class="ui eight wide column left aligned form segment grid" style=" margin-top: 16%; margin-bottom: 15%">
        <form class="ui form" action="?acao=editarSinopse" method="post">
            <h2 class="ui dividing header">Editar resenha do livro "<?= $livro->li_titulo ?>"</h2>
            <div class="field">
                <textarea name="re_textoresenha" id="" cols="30" rows="10" required placeholder="<?=$resenha->re_textoresenha?>"></textarea>
            </div>
            <input style="visibility: hidden; " type="text" name="idresenha" value="<?=$resenha->re_id?>">
            <input style="visibility: hidden; " type="text" name="idusuario" value="<?=$idusuario?>">
            <input style="visibility: hidden; " type="text" name="idlivro" value="<?=$livro->li_idlivro?>">
            <div class="field">
                <input class="ui button" type="submit" name="gravar" value="Adicionar">
            </div>

        </form>
    </div>
</div>


</body>
</html>