<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastrar</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>
<style>
    #fundo {
        background-image: url("../../assets/img/biblio.jpg");
        margin: auto;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }
</style>
<body id="fundo">
<div class="ui center aligned page grid">
<div class="ui eight wide column left aligned form segment grid" style ="margin-top: 15%; margin-bottom: 13%">
    <form class="ui form" method="post" action="?acao=editar&iduser=<?=$usuario->us_id?>">
        <h2 class="ui dividing header"> Editar </h2>
        <div class="field ">
            <div class="ui left icon input">
                <input  value="<?= $usuarioEdit->us_nome ?>" type="text" name="nome" required>
                <i class="user icon"></i>
            </div>
        </div>
        <div class="field">
            <div class="ui left icon input">
            <input value="<?= $usuarioEdit->us_email ?>" type="email" name="email" required >
            <i class="envelope icon" ></i>
            </div>
        </div>
        <div class="field">
            <div class="ui left icon input">
            <input value="<?= $usuarioEdit->us_senha ?>" type="password" name="senha" placeholder="Digite sua senha">
            <i class="lock icon"></i>
            </div>
        </div>
        <div class="field">
            <div class="ui left icon input">
            <input value="<?= $usuarioEdit->us_senha ?>" type="password" name="senha1" placeholder="Confirmar senha">
            <i class="lock icon"></i>
            </div>
        </div>
        <input style="visibility: hidden; " type="text" name="getidusuario" value="<?=$usuarioEdit->us_id?>">
        <!-- HIDDEN INPUT PARA DAR O VALOR DE USUARIO = 1 -->
        <input type="submit" class="ui submit button" name="gravar" value="Editar">
    </form>
</div>
</div>

