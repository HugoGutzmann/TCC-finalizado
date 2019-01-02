<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

<style>
    #fundo {
        background-image: url("../../assets/img/fundo.jpg");
        margin: auto;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }
</style>

</head>
<body id="fundo">
<span class="ui header">
</span>
<div>
<div style=" padding-left: 60%; padding-right: 5%; padding-bottom: 3%; padding-top: 3%;">
<div class="ui eight wide column left aligned form segment grid" style=" margin-top: 13%; margin-bottom: 13%">
<!--<div class="ui four column center aligned grid" style="margin-top: 13%">-->
    <div class="column ">
        <h2 class="ui dividing header">Entrar</h2>
    <form method="post" action="?acao=login" class="ui form error">
        <div class="field">
            <label>E-mail</label>
            <div class="ui left icon input">
            <input name="email" type="email" placeholder=" e-mail@mail.com" required>
                <i class="user icon"></i>
            </div>
        </div>
        <div class="field">
            <label>Senha</label>
            <div class="ui left icon input">
            <input name="senha" type="password" placeholder="Senha" required size="80">
                <i class="lock icon"></i>
            </div>
        </div>
        <?php
        if (@$_GET['erro'] == 'naologado'){?>
            <?php echo "<script>alert('É preciso estar logado para acessar esta página')</script>"?>
        <?php } ?>
        <?php
        if (@$_GET['erro'] == 'loginerrado'){?>
            <div class="ui error message">
                <div class="header">Login incorreto</div>
                <p>Verifique se todos os campos estão preenchidos corretamente e tente novamente.</p>
            </div>
        <?php } ?>
        <div class="ui left icon input">
        <input type="submit" name="gravar" value="Login" class="ui submit button">
            <i class="signup icon"></i>
        </div>
    </form>
        <div class="ui message">
    <a href="?acao=index">Entrar como visitante</a>
    <br>
    <a href="?acao=cadastrar">Deseja criar uma conta?</a>
    <br>
    <a href="?acao=editar">Esqueceu a senha</a>
        </div>
</div>
</div>
</div>
</div>
<br><br><br><br><br><br>

