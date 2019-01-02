<?php
//require_once "../../Models/CrudLivros.php";
if (!isset($_SESSION['us_id'])){
    header("Location: ControlerUsuario.php?acao=login&erro=naologado");
}
//print_r($_SESSION['us_id']);die;
$id = $_SESSION['us_id'];
$crud= new UsuarioCrud();
$usuario = $crud->getUsuarioId($id);
$crudLivro = new CrudLivros();
$livros = $crudLivro->getLivros();
$crud2 = new CrudBiblioteca();
//print_r($id);die;
$Prateleiras = $crud2->getPrateleiras($usuario);

//print_r($Prateleiras);die;
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body style="background-color: #96ced8">
<?php
//print_r($Prateleiras);die;
if (isset($Prateleiras)) {
    foreach ($Prateleiras as $Prateleira): ?>

       
        <h2 class="ui header"><?= $Prateleira->pr_descricao ?></h2>

        <?php $bibliotecaLivros = $crud2->getLivrosPrateleira($Prateleira); ?>

        <button id="botao1" class="ui left labeled icon button" style="margin-left: 20px ">
            <i class="plus icon"></i>
            Adicionar novo título
        </button>


        <div id="popPrat" class="ui flowing popup top left transition hidden">
            <div class="header">Adicione um título à sua nova prateleira</div>
            <div class="content">
                <form method="post" class="ui form" action="../../app/Controlers/ControlerLivro.php?acao=add_livroprateleira&idusuario=<?=$id?>">
                    <div class="field">
                        <label>Selecione o livro que deseja adicionar</label>
                        <select multiple="" class="ui dropdown" name="livroadicionado[]" required>
                            <option value="">Selecione o/s Livro/s</option>
                            <?php foreach ($livros as $livro):?>
                                <option value="<?=$livro->getLiIdlivro()?>"><?=$livro->getLiTitulo()?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <input style="visibility: hidden; padding: 0px" type="text" name="getidprateleira" value="<?=$Prateleira->pr_id ?>">
                    <button class="ui button" type="submit" name="gravar">Adicione</button>
                </form>
            </div>
        </div>
        <?php
        if ($bibliotecaLivros != '') {
            foreach ($bibliotecaLivros as $bibliotecaLivro) {
                $livroBiblioteca = $crudLivro->getLivro($bibliotecaLivro->bi_idlivro);
                $idlivro = $livroBiblioteca->li_idlivro;
                $crudGenero = new CrudGenero();
                $crudGenero = new CrudGenero();
                $generos = $crudGenero->getGeneroLivro($idlivro);
                ?>

                <div class="ui four cards" style="padding: 20px ">
                    <div class="ui card" >
                        <a class="image" href="#">
                            <img src="../../assets/img/livros700x300/livro1.png">
                        </a>
                        <div class="content">
                            <a class="header" href="#"><?=$livroBiblioteca->li_titulo?></a>
                            <span class="right floated">
                            <a class="ui icon button left floated lipr" title="excluir livro da prateleira" href="ControlerLivro.php?acao=exLiBi&idlivro=<?=$idlivro?>&idusuario=<?=$idusuario?>">
                                <i class="x icon" ></i></a></span>
                            <div class="meta\">
                                <p><?=$livroBiblioteca->li_autor?></p>
                                <div class="description">
                                    <?php
                                    foreach ($generos as $genero) :
                                        $iddogenero = $genero->gl_idgenero;

                                        $generodoLivro = $crudGenero->getGenero($iddogenero);
                                        $aaaa = $generodoLivro->ge_descricao;
                                        echo "<a class=\"ui red label\" style=\"margin-top: 6px\">$aaaa</a>";
                                    endforeach;
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php


            }
        }

    endforeach;

}else{
    echo "<p> Adicione uma nova Prateleira </p>";
}
?>
<div id="botao1" class="ui button">Adicione uma nova prateleira</div>

<div id="popPrat" class="ui flowing popup top left transition hidden">
    <div class="header">Digite o nome da nova prateleira</div>
    <div class="content">
        <form method="post" class="ui form" action="../../app/Controlers/ControlerLivro.php?acao=add_prateleira&idusuario=<?=$id?>">
            <div class="field">
                <input type="text" placeholder="Digite aqui" name="descricao" required>
            </div>
            <button class="ui button" type="submit" name="gravar">Adicione</button>
        </form>
    </div>
</div>

<script>
    $('#botao1.button')
        .popup({
            on: 'click'
        })
    ;
    $('.ui.dropdown').dropdown();

</script>
<br><br><br><br>
</body>
</html>
}