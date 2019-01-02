<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulário</title>
</head>
<body style = "background-color: #96ced8">

<div class="ui center aligned page grid">
    <div class="ui eight wide column left aligned form segment grid" style=" margin-top: 5%; margin-bottom: 7%">
        <form class="ui form" action="ControlerFormulario.php?acao=formulario" method="post"">
        <h2 class="ui dividing header">Formulário</h2>
        <p>A partir deste formulário o site recomendará livros baseados nas suas preferências. Sinta-se à vontade para refazê-lo quando quiser</p>
        <div class="field">
            <label>Você prefere livros:</label>
            <div class="field">
                <div class="ui radio checkbox">
                    <input type="radio" name="TamanhoLivro" value="100" checked="" tabindex="0" class="hidden">
                    <label>Pequenos (até 100 páginas)</label>
                </div>
            </div>
            <div class="field">
                <div class="ui radio checkbox">
                    <input type="radio" name="TamanhoLivro" value="250" tabindex="0" class="hidden">
                    <label>Médios (até 250 páginas)</label>
                </div>
            </div>
            <div class="field">
                <div class="ui radio checkbox">
                    <input type="radio" name="TamanhoLivro" value="10000" tabindex="0" class="hidden">
                    <label>Não se importa com o tamanho do livro</label>
                </div>
            </div>
        </div>
        <div class="field">
            <label>Selecione os gêneros que você mais aprecia</label>
                <select multiple="multiple" class="ui dropdown" name="GenerosLivro" required>
                    <option value="">Selecione os gêneros</option>
                    <?php foreach ($generos as $genero):?>
                        <option value="<?=$genero->getGenId()?>" name="generoselecionado"><?=$genero->getGenDesc()?></option>
                    <?php endforeach; ?>
                </select>
        </div>
        <div class="field">
            <div class="inline field">
                <label>A avaliação dos usuários é importante para você?</label>
                <div class="ui toggle checkbox">
                    <input name="AvaliacaoUsuarios" type="checkbox" tabindex="0" class="">
                </div>
            </div>
        </div>
        <div class="field">
            <div class="inline field">

                <div class="three field">
                        <label>Piso de ano de publicação:</label>
                        <div class="field">
                            <input name="AnoPublicacao" type="number" placeholder="Ex:2010">
                        </div>
                </div>
            </div>
        </div>
        <div class="field">
            <label>Preferência de censura de livro</label>
            <select class="ui fluid search dropdown" name="CensuraLivro" required>
                <option value="0">Livre</option>
                <option value="10">até 10 anos</option>
                <option value="12">até 12 anos</option>
                <option value="14">até 14 anos</option>
                <option value="16">até 16 anos</option>
                <option value="18">até 18 anos</option>
            </select>
        </div>
        <div class="field">
<!--   que aí filtraria os  (quantos) livros que mais obtiveram comentários e/ou avaliações nos
       últimos (quantos) dias. Lembrando que cada registro de classificação ou avaliação soma um ponto, o que ordenaria
       o resultado pela quantidade de pontos        -->
            <div class="inline field">
            <label>Gostaria de receber os livros em alta?</label>
            <div class="ui toggle checkbox">
                <input name="LivrosAlta" type="checkbox" tabindex="0" >
            </div>

                <input style="visibility: hidden" type="text" name="getidusuario" value="<?=$_GET['idusuario']?>">
            </div>
        </div>
            <input class="ui button" type="submit" name="gravar" value="Enviar">
            </form>
        </div>
    </div>

</body>
</html>

<script>
    $('.ui.dropdown').dropdown();
</script>
<script>
    $('.ui.checkbox')
        .checkbox()    ;
</script>
