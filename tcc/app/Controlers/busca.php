<?php
require_once '../Models/CrudLivros.php';
//echo $_POST['palavra'];
//
$host = 'localhost';
$user = 'root';
$pass = '';
$db   = 'leitura';

// conexão e seleção do banco de dados
$con = mysqlI_connect($host, $user, $pass, $db);
//
//    mysql_query("SET NAMES 'uft8' ");
//    mysql_query('SET character_set_conection=utf8');
//    mysql_query('SET charater_set_client=utf8');
//    mysql_query('SET character_set_results=utf8');
//
//
$pesquisa = mysqli_real_escape_string($con,$_POST['palavra']);
//
//    $campo = mysql_real_escape_string($_POST['campo']);
//
$sql = "SELECT * FROM livro WHERE li_titulo LIKE '%$pesquisa%'";
////
$query = mysqli_query($con,$sql) or die("Erro ao pesquiusar");
////
if(mysqli_num_rows($query) <= 0){
    echo "nada encontrado...";
}else{
    while($res = mysqli_fetch_assoc($query)){
        $busca = $res['li_titulo'];

        $crudLivros = new CrudLivros();
        $livros = $crudLivros->buscarLivros($busca);
?>
<div class="ui four cards" style="margin-left: 8%; margin-right: 8%;">
        <?php foreach ($livros as $livro): ?>
    <div class="ui card" style="height:560px; width:305px">
        <?php

        if (isset($_GET['idusuario'])){
            $_SESSION['us_id'] = $_GET['idusuario'];
            $idusuario = $_SESSION['us_id'];
        }else{
            if (isset($_SESSION['us_id'])){
                $idusuario = $_SESSION['us_id'];
            }
        }

        ?>
        <a class="image" href="ControlerLivro.php?acao=show<?php if (isset($_SESSION)){$id = $_SESSION['us_id'];echo "&idusuario=".$id;}?>&idlivro=<?= $livro->li_idlivro ?>" style="cursor: pointer">
            <img href="ControlerLivro.php?acao=show" src="../../assets/img/livros/livro1.jpg">
        </a>
        <div class="content">
            <div class="header"><?= $livro->li_titulo ?></div>
            <?php

            if (isset($_SESSION)){
                $id = $_SESSION['us_id'];
                echo "<span class=\"right floated\">
                    <a class=\"ui icon button small\" title=\"Adicionar resenha à biblioteca\" href=\"ControlerLivro.php?acao=add_biblioteca&idusuario=$id&idlivro=$livro->li_idlivro\">";
                echo "<i class=\"add icon\"></i></a></span>";
            }
            ?>
            <div class="meta">
                <a><?= $livro->li_autor ?></a>
                <div class="description">
                    <?php
                    $idlivro = $livro->li_idlivro;
                    $crudGenero = new CrudGenero();
                    $generos = $crudGenero->getGeneroLivro($idlivro);
                    $iddogenero = $generos->getGlId();

                    $generodoLivro =$crudGenero->getGenero($iddogenero);
                    ?>
                    <a class="ui red label" style="margin-top: 6px"><? print_r($generos->gl_idgenero) ?></a>

                </div>
                <?php

                if (isset($_SESSION)){
                    echo "<div class=\"extra content\">
                      Classificação:
                      <div class=\"ui star rating\" data-rating=\"0\" data-max-rating=\"5\"></div>
                  </div>";
                }
                ?>
            </div>
        </div>

    </div>
<?php endforeach ?>
</div>

<?php
    }
}








