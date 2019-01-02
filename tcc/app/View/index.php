<?php
//print_r($_SESSION['us_id']);die;
if(isset($_SESSION)) {
    $id = $_SESSION['us_id'];
}
$crud= new UsuarioCrud();
$usuario = $crud->getUsuarioId($id);
$crud2 = new CrudBiblioteca();
//print_r($id);die;
$Prateleiras = $crud2->getPrateleiras($usuario);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Era uma Vez</title>
</head>
<style type="text/css">
    .estrelas input[type=radio]{
        display: none;
    }.estrelas label i.fa:before{
         content: '\f005';
         color: #FC0;
     }.estrelas  input[type=radio]:checked  ~ label i.fa:before{
          color: #CCC;
      }
    #card{
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }
</style>
<link rel="stylesheet" href="../../assets/css/style.css">

<body style="background-color: #96ced8">
<?php
if (isset($_SESSION)) {
    ?>
    <a class="ui right floated icon button" style="margin-right: 20px "
       href="ControlerUsuario.php?acao=index2&idusuario=<?= $id ?>">
        <i class="plus icon"></i>
        Desativar formulário
    </a>
    <?php
}
?>
<section id="principal" >
    <br>
    <h1 class="ui header horizontal inverted divider">Recomendado:</h1>
    <br><br>
    <div class="centered ui four cards">
        <?php
        if (isset($livros)) {
            foreach ($livros as $livro): ?>

                <div id="card" class="ui card" style="height:550px; width:255px">
                    <?php

                    if (isset($_GET['idusuario'])) {
                        $_SESSION['us_id'] = $_GET['idusuario'];
                        $idusuario = $_SESSION['us_id'];
                    } else {
                        if (isset($_SESSION['us_id'])) {
                            $idusuario = $_SESSION['us_id'];
                        }
                    }
                    $crud12 = new CrudLivros();
                    $nomeCapa = $crud12->pegarNomeCapa($livro);
                    //                    print_r($nomeCapa['arquivo']);
                    if (isset($nomeCapa['arquivo'])) {
                        ?>
                        <a class="image" href="ControlerLivro.php?acao=show<?php if (isset($_SESSION)) {
                            $id = $_SESSION['us_id'];
                            echo "&idusuario=" . $id;
                        } ?>&idlivro=<?= $livro->li_idlivro ?>" style="cursor: pointer">
                            <img href="ControlerLivro.php?acao=show"
                                 src="../../assets/img/livros/<?= $nomeCapa['arquivo'] ?>"
                                 style="height:400px; width:255px">
                        </a>
                        <?php
//                        print_r($novo_nome);echo 'oi';
                    } else {
                        ?>
                        <a class="image" href="ControlerLivro.php?acao=show<?php if (isset($_SESSION)) {
                            $id = $_SESSION['us_id'];
                            echo "&idusuario=" . $id;
                        } ?>&idlivro=<?= $livro->li_idlivro ?>" style="cursor: pointer">

                            <img href="ControlerLivro.php?acao=show" src="../../assets/img/livros/default.jpg"
                                 style="height:400px; width:255px">
                        </a>
                        <?php
                    }
                    ?>
                    <div class="content">
                        <div class="header"><?= $livro->li_titulo ?></div>
                        <?php

                        if (isset($_SESSION)) {
                            $id = $_SESSION['us_id'];
                            echo " <button id=\"botao1\" class=\"ui left icon button right floated\" style=\"margin-left: 20px \">
                        <i class=\"plus icon\"></i></button>";
                        }
                        ?>

                        <div class="ui flowing popup top left transition hidden" style="width: 250px">
                            <div class="header">Selecione a prateleira à qual deseja adicionar este livro</div>
                            <div class="content">
                                <form method="post" class="ui form"
                                      action="../../app/Controlers/ControlerLivro.php?acao=add_livroprateleira2&idusuario=<?= $id ?>">
                                    <div class="field">
                                        <select multiple="" class="ui dropdown" name="prateleira" required>
                                            <option value="">Selecione o/s Livro/s</option>
                                            <?php foreach ($Prateleiras as $prateleira): ?>
                                                <option value="<?= $prateleira->getPrId() ?>"><?= $prateleira->getPrDescricao() ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <input style="visibility: hidden; padding: 0px" type="text" name="getidlivro"
                                               value="<?= $livro->li_idlivro ?>">
                                    </div>
                                    <button class="ui button" type="submit" name="gravar">Adicione</button>
                                </form>
                            </div>
                        </div>


                        <div class="meta">
                            <a><?= $livro->li_autor ?></a>
                            <div class="description">
                                <?php
                                $idlivro = $livro->li_idlivro;
                                $crudGenero = new CrudGenero();
                                $generos = $crudGenero->getGeneroLivro($idlivro);

                                foreach ($generos as $genero) {
                                    $iddogenero = $genero->gl_idgenero;

                                    $generodoLivro = $crudGenero->getGenero($iddogenero);
                                    $aaaa = $generodoLivro->ge_descricao;
                                    ?>
                                    <a class="ui red label" style="margin-top: 6px"><?php echo utf8_encode($aaaa)?></a>
                                <?php } ?>
                            </div>
                            <div class="extra" style="margin-top: 10px; color: #FFBD5B; text-shadow:1px 1px 3px #FFE623">
                                <?php
                                $crudLivro = new CrudLivros();
                                $votos = $crudLivro->pegaMedia($idlivro);
                                ?>
                            </div>
                        </div>
                    </div>

                </div>
            <?php endforeach ?>
            <?php
        }else{
        ?>
            <br><br><br><br><br><br>
<h3 class="ui header" style="color:white">Não encontramos nenhum livro :(</h3>
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <?php
        }
        ?>
    </div>
</section>
    <br>
</body>

</html>
<script>

        $('.ui.rating')
        .rating()
    ;

    $('.ui.dropdown').dropdown();
</script>

<script type="text/javascript">
    $(function(){
        $("#pesquisa").keyup(function(){
            var pesquisa = $(this).val();

//               $(".resultados").html(pesquisa);
//                var campo = $("#campo").val();

            if(pesquisa !== ''){
                var dados = {
                    palavra : pesquisa
//                        campo : campo
                }
                $.post('busca.php', dados, function(retorna){
                    $(".resultados").html(retorna);
                    $('#principal').addClass('hidden');
                });
            }
        });
        $('.ui.dropdown').dropdown();

//            $("#campo").change(function () {
//
//                var pesquisa = $("#pesquisa").val();
//
//                var campo = $(this).val();
//
//                if (pesquisa != ''){
//                    var dados = {
//                        palavra : pesquisa,
//                        campo : campo
//                    }
//                    $.post('busca.php', dados, function(retorna){
//                        $("resultados").html(retorna);
//                    });
//                }else{
//                    $(".resultados").html('');
//                }
//            });
//            $("#form-pesquisa").submit(function(e){
//                e.preventDefault();
//
//                var pesquisa = $("#pesquisa").val();
//
//                if(pesquisa == ''){
//                    alert ('informa sua pesquisa!');
//                }else{
//                    var dados = {
//                        palavra : pesquisa
//                        campo : campo
//                    }
//                    $.post('busca.php', dados, function(retorna){
//                        $(".resultados").html(retorna);
//                    });
//                }
//            });

    });
    $('#botao1.button')
        .popup({
            on: 'click'
        })
    ;
    $('.ui.dropdown').dropdown();

</script>
