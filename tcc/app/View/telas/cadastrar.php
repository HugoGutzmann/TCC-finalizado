<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastrar</title>
<!--    <link rel="stylesheet" href="../../assets/css/stylecadastro.css">-->
<!--    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">-->
</head>
<style>
    #fundo {
        background-image: url("../../assets/img/fundo2.jpg");
        margin: auto;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }
</style>
<body id="fundo">

<div class="ui center aligned page grid">
<div class="ui eight wide column left aligned form segment grid" style=" margin-top: 13%; margin-bottom: 13%">
<div class="column">
<form class="ui form " method="post" action="?acao=cadastrar">
    <h2 class="ui dividing header">Cadastrar</h2>
    <div class="field">
        <label>Name</label>
        <div class="field">
            <div class="field ">
                <input type="text" name="nome" placeholder="Usuário" required>
            </div>
        </div>
    </div>
    <div class="two fields">
        <div class="field">
                <label>E-mail</label>
                <input type="text" name="email" placeholder="E-mail" required>
        </div>
        <div class="field">
                <label>Confirmar e-mail</label>
                <input type="email" name="email1" placeholder="Confirmar e-mail" required>
        </div>
    </div>
    <div class="two fields">
        <div class="field">
            <label>Senha</label>
            <input type="password" name="senha" placeholder="Senha" required size="80">
        </div>
        <div class="field">
            <label>Confirmar senha</label>
            <input type="password" name="senha1" placeholder="Confirmar Senha" required size="80">
        </div>
    </div>
    <div class="fields">
        <div class="five wide field">
            <label>Data de nascimento</label>
            <input type="date" name="datanascimento" placeholder="Data de Nascimento" min="1915-01-01" max="2018-01-28" required>
        </div>
    </div>
        <div class="inline fields">
            <label for="fruit">Sexo</label>
            <div class="field">
                <div class="ui radio checkbox">
                    <input type="radio" name="sexo" value="F" required>
                    <label>Feminino</label>
                </div>
            </div>
            <div class="field">
                <div class="ui radio checkbox">
                    <input type="radio" name="sexo" value="M" required>
                    <label>Masculino</label>
                </div>
            </div>
        </div>
    <input type="submit" class="ui button" name="gravar" value="Cadastrar">
</form>
    <div class="ui message center aligned grid">F
        <div class="field" ><a href="?acao=login">Já tem uma conta? Entre aqui</a></div>
    </div>
</div>
</div>
</div>
<?php
if (@$_GET['erro'] == 'emailerrado'){?>
    <div class="ui error message center aligned grid">
        <label class="header">E-mail incorreto</label>
    </div>

<?php } ?>
<?php
if (@$_GET['erro'] == 'senhaerrada'){?>
    <div class="seven wide fild">
        <div class="ui error message ui center aligned page grid">
            <label class="header">As senhas não coincidem</label>
        </div>
    </div>
<?php } ?>




</body>

</html>
