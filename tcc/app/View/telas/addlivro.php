<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<!--    <script src="../../assets/css/Semantic-UI-CSS-master/semantic.js"></script-->
    <title>Adicionar Livro</title>
</head>
<body>

<div class="ui center aligned page grid">
<div class="ui eight wide column left aligned form segment grid" style=" margin-top: 6%; margin-bottom: 5%">
<form class="ui form" action="ControlerLivro.php?acao=add_livro" enctype="multipart/form-data" method="post">
    <h2 class="ui dividing header">Adicionar Livro</h2>
    <div class="field">
        <label>Titulo do Livro</label>
        <input type="text" name="li_titulo" placeholder="Título" required>
    </div>
    <div class="field">
        <label>Número de paginas</label>
        <input type="number" name="li_paginas" placeholder="Ex: 100" min="0" max="3000" required>
    </div>
    <div class="field">
        <label>Autor</label>
            <input type="text" name="li_autor" placeholder="John Blue" required>
    </div>
    <div class="field">
        <label>Ano de publicação</label>
        <input type="number" name="li_ano" placeholder="Ex: 2012" required>
    </div>
    <div class="field">
        <label>Imagem da Capa</label>
        <input type="file" name="imagem" accept="image/jpeg">
    </div>    
    <div class="field">
        <label>Censura do livro</label>
        <select class="ui fluid search dropdown" name="li_censura" required>
            <option value="0">Livre</option>
            <option value="10">10 anos</option>
            <option value="12">12 anos</option>
            <option value="14">14 anos</option>
            <option value="16">16 anos</option>
            <option value="18">18 anos</option>
        </select>
    </div>
    <div class="field">
        <label>Editora</label>
        <input type="text" name="li_editora" placeholder="Ex: Editora mercham por apenas R$10,00" required>
    </div>
    <div class="field">
        <label>Selecione os gêneros</label>
        <select multiple="" class="ui dropdown" name="li_genero[]" required>
            <option value="">Selecione os gêneros</option>
            <?php foreach ($generos as $genero):?>
            <option value="<?=$genero->getGenId()?>"><?=$genero->getGenDesc()?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <input style="visibility: hidden; " type="text" name="getidusuario" value="<?=$_SESSION['us_id'] ?>">
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
