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
$Prateleiras=$crud2->getPrateleiras($usuario);

//print_r($Prateleiras);die;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Biblioteca</title>
</head>
<body>
<div>
<?php
if (isset($Prateleiras)){
foreach ($Prateleiras as $Prateleira):?>
    <span class="right floated"><a id="target" class="ui icon green button left floated addpr" title="Adicionar novo livro à Prateleira">
        <i class="plus icon" ></i>
        </a></span>
    <h2 class="ui header"><?=$Prateleira->pr_descricao?></h2>

    <?php $bibliotecaLivros=$crud2->getLivrosPrateleira($Prateleira); ?>

    <?php
    if ($bibliotecaLivros != '') {
        foreach ($bibliotecaLivros as $bibliotecaLivro) {
            $livroBiblioteca = $crudLivro->getLivro($bibliotecaLivro->bi_idlivro);
            $idlivro = $livroBiblioteca->li_idlivro;
            $crudGenero = new CrudGenero();
            $generos = $crudGenero->getGeneroLivro($idlivro);
            $iddogenero = $generos->getGlId();

            $generodoLivro =$crudGenero->getGenero($iddogenero);
            $aaaa = $generodoLivro->ge_descricao;

            echo "  <div class=\"ui four cards\">
            <div class=\"ui card\">
            <a class=\"image\" href=\"#\">
                <img src=\"../../assets/img/livros700x300/livro1.png\">
            </a>
            <div class=\"content\">
                <a class=\"header\" href=\"#\">$livroBiblioteca->li_titulo</a>
                <div class=\"meta\">
                    <a>$livroBiblioteca->li_autor</a>
                    <div class=\"description\">
                            <a class=\"ui red label\" style=\"margin - top: 6px\">$aaaa</a>
                        </div>  
                </div>
            </div>
        </div>
        </div>
        ";

        }
    }
    ?>


    <!--MODAL DE ADICIONAR NOVO LIVRO A PRATELEIRA-->
    <div class="ui modal" style="width: 450px; height: 260px" id="modal1">
        <div class="header">Adicione um título à sua nova prateleira</div>
        <div class="content">
            <form method="post" class="ui form" action="../../app/Controlers/ControlerLivro.php?acao=add_livroprateleira&idusuario=<?=$id?>">
                <div class="field">
                    <label>Selecione o livro que deseja adicionar</label>
                    <select multiple="" class="ui dropdown" name="livroadicionado" required>
                        <option value="">Selecione o/s Livro/s</option>
                        <?php foreach ($livros as $livro):?>
                            <option value="<?=$livro->getLiIdlivro()?>"><?=$livro->getLiTitulo()?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <input style="visibility: hidden; " type="text" name="getidprateleira" value="<?=$Prateleira->pr_id ?>">
                <button class="ui button" type="submit" name="gravar">Submit</button>
            </form>
        </div>
    </div>
<div class="ui divider"></div>
    <?php

    endforeach;
}else{
    echo "<p> Adicione uma nova Prateleira </p>";
}

?>

</div>
<br>
<span class="left floated">
<a id="target2" class="ui icon button left floated" title="Adicionar nova prateleira">
    <i class="plus icon" ></i>
</a>
</span>
<br>

<!-- MODAL DE ADICIONAR LIVRO À PRATELEIRA -->
<div class="ui modal" style="width: 350px; height: 260px" id="modal2">
    <div class="header">Adicione uma nova prateleira</div>
    <div class="content">
        <form method="post" class="ui form" action="../../app/Controlers/ControlerLivro.php?acao=add_prateleira&idusuario=<?=$id?>">
            <div class="field">
                <input name="descricao" type="text" placeholder="Digite aqui o nome da prateleira" min="5" max="48" required>
            </div>

            <button class="ui button" type="submit" name="gravar">Submit</button>
        </form>
    </div>
</div>
<br><br><br><br><br>
</body>
</html>
<script>
    $('.ui.rating')
        .rating()
    ;

    $( ".addpr" ).click(function() {
        $('#modal1')
            .modal('show');
    });

    $( "#target2" ).click(function() {
        $('#modal2')
            .modal('show');
    });

    $('.ui.dropdown').dropdown();

//    href="../../app/Controlers/ControlerLivro.php?acao=add_prateleira&idusuario=<?//=$id?>//"
</script>