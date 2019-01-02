<?php
/**
 * Created by PhpStorm.
 * User: Hugo
 * Date: 21/07/2018
 * Time: 19:03
 */
require_once "DBConnection.php";
require_once "Livros.php";
require_once "FatorLivro.php";
require_once "AvalicaoLivro.php";
require_once "CrudGenero.php";

class CrudLivros
{
    private $conexao;
    public $livros;
public function __construct()
{
    $this->conexao = DBConnection::getConexao();
}

public function addLivro(Livros $livros){

//    print_r($livros->li_idusuario);die;
    $sql = "INSERT INTO livro (li_ano, li_autor, li_censura, li_editora,li_paginas,li_titulo,li_idlivro, li_idusuario) VALUES ('{$livros->li_ano}' ,'{$livros->li_autor}','{$livros->li_censura}','{$livros->li_editora}','{$livros->li_paginas}','{$livros->li_titulo}',null,'{$livros->li_idusuario}')";
//    echo $sql;die;
    $this->conexao->exec($sql);
    $idlivro = $this->conexao->lastInsertId();
    return $idlivro;
}

public function vincularCapa($id, $arquivoUpload){
    $sql = "INSERT INTO imagem (arquivo,data,idlivro) VALUES ('{$arquivoUpload}' , NOW(),'{$id}')";
    $this->conexao->exec($sql);
    return true;
    }
    public function pegarNomeCapa($livro){
//    print_r($livro);die;
        $sql = $this->conexao->query("select arquivo from imagem where idlivro ={$livro->li_idlivro}");
    $hum = $sql->fetch(PDO::FETCH_ASSOC);
//    print_r($hum);die;

    return $hum;

    }

public function excluirLivro($idlivro){
    $sql1 = "DELETE FROM generolivro WHERE gl_idlivro = {$idlivro};";
    $sql2= "DELETE FROM fatorlivro WHERE fl_idlivro = {$idlivro};";
    $sql3 = "DELETE FROM biblioteca WHERE bi_idlivro = {$idlivro};";
    $sql4 = "DELETE FROM resenha WHERE re_idlivro = {$idlivro};";
    // Falta inserir aqui o select para identificar o nome do arquivo da capa, e excluí-lo do disco.    
    $sql5 = "DELETE FROM imagem WHERE idlivro = {$idlivro};";
    $sql6 = "DELETE FROM livro WHERE li_idlivro = {$idlivro};";
    $sql7 = "DELETE FROM avaliacaolivro WHERE al_idlivro = {$idlivro};";

////
////    print_r($sql1);
////    print_r($sql2);
////    print_r($sql3);die;

    $this->conexao->exec($sql2);
    $this->conexao->exec($sql1);
    $this->conexao->exec($sql3);
    $this->conexao->exec($sql4);
    $this->conexao->exec($sql5);
    $this->conexao->exec($sql7);
    $this->conexao->exec($sql6);
}

    public function editarLivro($livroEditado){
        $sql = "UPDATE livro SET li_ano = '{$livroEditado->li_ano}', li_autor = '{$livroEditado->li_autor}', li_censura= '{$livroEditado->li_censura}', li_editora= '{$livroEditado->li_editora}', li_paginas= '{$livroEditado->li_paginas}', li_titulo= '{$livroEditado->li_titulo}' WHERE li_idlivro = '{$livroEditado->li_idlivro}'";
//        print_r($sql);die;
        $this->conexao->exec($sql);
    }


    public function buscarLivros($busca){

            $sql = $this->conexao->query("SELECT * FROM livro WHERE li_titulo = '{$busca}' ");
//            print_r($sql);die;

            $livros = $sql->fetchAll(PDO::FETCH_ASSOC);
            foreach ($livros as $livro) {
                $li_ano = $livro['li_ano'];
                $li_autor = $livro['li_autor'];
                $li_censura = $livro['li_censura'];
                $li_editora = $livro['li_editora'];
                $li_paginas = $livro['li_paginas'];
                $li_titulo = $livro['li_titulo'];
                $li_idlivro = $livro['li_idlivro'];
                $li_idusuario = $livro['li_idusuario'];
                $obj = new Livros($li_ano,$li_autor,$li_censura,$li_editora,$li_paginas,$li_titulo,$li_idlivro,$li_idusuario);
                $ListaLivros[] = $obj;
            }
            return $ListaLivros;

    }

    public function getLivros(){
        $consulta = $this->conexao->query("SELECT * FROM livro");

        $livros = $consulta->fetchAll(PDO::FETCH_ASSOC);
        foreach ($livros as $livro) {
            $li_ano = $livro['li_ano'];
            $li_autor = $livro['li_autor'];
            $li_censura = $livro['li_censura'];
            $li_editora = $livro['li_editora'];
            $li_paginas = $livro['li_paginas'];
            $li_titulo = $livro['li_titulo'];
            $li_idlivro = $livro['li_idlivro'];
            $li_idusuario = $livro['li_idusuario'];
            $obj = new Livros($li_ano,$li_autor,$li_censura,$li_editora,$li_paginas,$li_titulo,$li_idlivro,$li_idusuario);
            $ListaLivros[] = $obj;
        }
        return $ListaLivros;
    }

    public function getLivro($idlivro){
        //RETORNA UMA CATEGORIA, DADO UM ID
        //FAZER A CONSULTA
        $sql = "select * from livro where li_idlivro='{$idlivro}'";
        $resultado = $this->conexao->query($sql);
        //FETCH - TRANSFORMA O RESULTADO EM UM ARRAY ASSOCIATIVO
        $livro = $resultado->fetch(PDO::FETCH_ASSOC);
        //CRIAR OBJETO DO TIPO CATEGORIA - USANDO OS VALORES DA CONSULTA
        $objetoLivro = new Livros(
            $livro['li_ano'],
            $livro['li_autor'],
            $livro['li_censura'],
            $livro['li_editora'],
            $livro['li_paginas'],
            $livro['li_titulo'],
            $livro['li_idlivro'],
            $livro['li_idusuario']

        );
        //RETORNAR UM OBJETO CATEGORIA COM OS VALORES
        return $objetoLivro;
    }

    public function addResenha(Resenha $sinopseLivro)
    {
        $sql = "INSERT INTO resenha (re_id,re_idlivro,re_idusuario,re_data,re_textoresenha,re_status) VALUES (null ,'{$sinopseLivro->re_idlivro}','{$sinopseLivro->re_idusuario}','{$sinopseLivro->re_data}','{$sinopseLivro->re_textoresenha}','{$sinopseLivro->re_status}')";
//        echo $sql; die;
        $this->conexao->exec($sql);


    }
    public function getResenhas($idlivro){
        //RETORNA UMA CATEGORIA, DADO UM ID
        //FAZER A CONSULTA
        $sql = "select * from resenha where re_idlivro='{$idlivro}'";
        $resultado = $this->conexao->query($sql);
        //FETCH - TRANSFORMA O RESULTADO EM UM ARRAY ASSOCIATIVO
        $resenhas = $resultado->fetchAll(PDO::FETCH_ASSOC);
//        print_r($resenhas);die;
        if (isset($resenhas)) {
            foreach ($resenhas as $resenha) {
                //CRIAR OBJETO DO TIPO CATEGORIA - USANDO OS VALORES DA CONSULTA

                $re_id = $resenha['re_id'];
                $re_idlivro = $resenha['re_idlivro'];
                $re_idusuario = $resenha['re_idusuario'];
                $re_data = $resenha['re_data'];
                $re_textoresenha = $resenha['re_textoresenha'];
                $re_status = $resenha['re_status'];

                $obj = new Resenha($re_id, $re_idlivro, $re_idusuario, $re_data, $re_textoresenha, $re_status);
                $ListaResenha[] = $obj;
            }
            if (isset($ListaResenha)) {
                return $ListaResenha;
            }
        }
    }


    public function addFatoresLivro(Livros $id_livro,$livro, $generoDesseLivro){


        $sql1 = "INSERT INTO fatorlivro (fl_id,fl_idfator,fl_idlivro,fl_idusuario,fl_valor) VALUES (null, 1, '{$id_livro->li_idlivro}','{$livro->li_idusuario}', '{$livro->li_paginas}')";
        $sql2 = "INSERT INTO fatorlivro (fl_id,fl_idfator,fl_idlivro,fl_idusuario,fl_valor) VALUES (null, 2, '{$id_livro->li_idlivro}','{$livro->li_idusuario}', '{$generoDesseLivro}')";
        $sql3 = "INSERT INTO fatorlivro (fl_id,fl_idfator,fl_idlivro,fl_idusuario,fl_valor) VALUES (null, 4, '{$id_livro->li_idlivro}','{$livro->li_idusuario}', '{$livro->li_ano}')";
        $sql4 = "INSERT INTO fatorlivro (fl_id,fl_idfator,fl_idlivro,fl_idusuario,fl_valor) VALUES (null, 5, '{$id_livro->li_idlivro}','{$livro->li_idusuario}', '{$livro->li_censura}')";

//        print_r($sql1);
//        print_r($sql2);
//        print_r($sql3);
//        print_r($sql4);
//        die;


        $this->conexao->exec($sql1);
        $this->conexao->exec($sql2);
        $this->conexao->exec($sql3);
        $this->conexao->exec($sql4);

    }
    public function getLivroPorUsuario($usuario){
        //RETORNA O MAIOR ID LIVRO QUE AQUELE USUARIO ADICIONOU
        //FAZER A CONSULTA
        $sql = "select * from livro where li_idusuario='{$usuario}' GROUP BY li_idlivro DESC ";
        $resultado = $this->conexao->query($sql);
        //FETCH - TRANSFORMA O RESULTADO EM UM ARRAY ASSOCIATIVO
        $livro = $resultado->fetch(PDO::FETCH_ASSOC);
        //CRIAR OBJETO DO TIPO CATEGORIA - USANDO OS VALORES DA CONSULTA
        $objetoLivro = new Livros(
            $livro['li_ano'],
            $livro['li_autor'],
            $livro['li_censura'],
            $livro['li_editora'],
            $livro['li_paginas'],
            $livro['li_titulo'],
            $livro['li_idlivro'],
            $livro['li_idusuario']
        );
        //RETORNAR UM OBJETO CATEGORIA COM OS VALORES
//        print_r($objetoLivro);die;
        return $objetoLivro;
    }

    public function atualizaFatoresLivro(Livros $livro, $generoDesseLivro){


        $sql1 = "UPDATE fatorlivro SET fl_valor= '{$livro->li_paginas}' WHERE fl_idlivro = '{$livro->li_idlivro}' AND fl_idfator = 1;";
        $sql2 = "UPDATE fatorlivro SET fl_valor= '{$generoDesseLivro}' WHERE fl_idlivro = '{$livro->li_idlivro}' AND fl_idfator = 2;";
        $sql3 = "UPDATE fatorlivro SET fl_valor= '{$livro->li_ano}' WHERE fl_idlivro = '{$livro->li_idlivro}' AND fl_idfator = 4;";
        $sql4 = "UPDATE fatorlivro SET fl_valor= '{$livro->li_censura}' WHERE fl_idlivro = '{$livro->li_idlivro}' AND fl_idfator = 5;";

//
//            print_r($sql1);
//            print_r($sql2);
//            print_r($sql3);
//            print_r($sql4);
//            die;


        $this->conexao->exec($sql1);
        $this->conexao->exec($sql2);
        $this->conexao->exec($sql3);
        $this->conexao->exec($sql4);
return true;
    }
    public function pegaIdFator($idlivro, $idfator){
    $sql1 = "select * from fatorlivro where fl_idlivro = $idlivro and fl_idfator=$idfator ";

//    print_r($sql1);die;

    $resultado = $this->conexao->query($sql1);

    $paw = $resultado->fetch(PDO::FETCH_ASSOC);

    $fatorlivro = new FatorLivro(
        $paw['fl_id'],
        $paw['fl_idfator'],
        $paw['fl_idlivro'],
        $paw['fl_idusuario'],
        $paw['fl_valor']
    );
//    print_r($fatorlivro);die;

    return $fatorlivro->fl_id;
    }

    public function votaLivro($avaliacao){
        $sql = "INSERT INTO avaliacaolivro (al_idavaliacaolivro, al_idlivro, al_idusuario,al_datahora, al_nota) VALUES (null, '{$avaliacao->al_idlivro}','{$avaliacao->al_alidusuario}','{$avaliacao->al_datahora}','{$avaliacao->al_nota}')";
//            print_r($sql);die;
        $resultado = $this->conexao->query($sql);
    }

    public function pegaMedia($idlivro){
        $sql = "select al_nota from avaliacaolivro where al_idlivro = '$idlivro'";

        $resultado = $this->conexao->query($sql);
        $notas = $resultado->fetchAll(PDO::FETCH_ASSOC);

        if(isset($notas['0'])) {
            foreach ($notas as $nota) {
                $paw[] = $nota['al_nota'];
            }
//            print_r($paw);
            $soma = array_sum($paw);
            $qtd = count($paw);
            $media = $soma / $qtd;
            $media2 = (round($media));
            $porc = ($media2*100)/5;
//            print_r($porc);
            ?>
            <?=$porc?>%
            <div class="ui star rating" data-rating="<?=$media2?>" data-max-rating="5"></div>

            <?php

                return $porc;

        }else{
            ?>
            <div class="ui star rating" data-rating="0" data-max-rating="5"></div>
<?php
        }
//        die;

    }

}