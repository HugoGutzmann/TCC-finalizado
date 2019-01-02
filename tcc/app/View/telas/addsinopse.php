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
$idlivro = $_GET['idlivro'];
$crudLivro = new CrudLivros();
$livro = $crudLivro->getLivro($idlivro);
//print_r($livro->li_idlivro);die;

?>
<div class="ui center aligned page grid">
    <div class="ui eight wide column left aligned form segment grid" style=" margin-top: 16%; margin-bottom: 15%">
        <form class="ui form" action="ControlerLivro.php?acao=add_sinopse" method="post">
        <h2 class="ui dividing header">Adicionar uma resenha ao livro "<?= $livro->li_titulo ?>"</h2>
        <div class="field">
            <textarea name="re_textoresenha" id="" cols="30" rows="10" required placeholder="Digite aqui sua resenha"></textarea>
        </div>
        
        <div class="field">
        <input class="ui button" type="submit" name="gravar" value="Adicionar">
        </div>

            <input style="visibility: hidden" type="radio" name="getidusuario" value="<?=$_GET['idusuario']?>" checked>
            <input style="visibility: hidden" type="radio" name="getidlivro" value="<?=$_GET['idlivro']?>" checked>

        </form>
    </div>
</div>


</body>
</html>