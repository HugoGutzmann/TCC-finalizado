<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Adicionar Genero</title>
</head>
<body>

<div class="ui center aligned page grid">
    <div class="ui eight wide column left aligned form segment grid" style=" margin-top: 6%; margin-bottom: 5%">
        <form class="ui form" action="?acao=addGenero" method="post"">
        <h2 class="ui dividing header">Adicionar Genero</h2>
        <div class="field">
            <label>Descricao do Gênero</label>
            <input type="text" name="descricao" placeholder="Ex: Romance" required>
        </div>
<!--        <input style="visibility: hidden; " type="text" name="getidusuario" value="--><?//=$_SESSION['us_id'] ?><!--">-->
        <br>
        <input class="ui button" type="submit" name="gravar" value="Cadastrar">
        </form>
    </div>
</div>
</div>
</body>
</html>
<script>
    $('.ui.dropdown').dropdown();
</script>
