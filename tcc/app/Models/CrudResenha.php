<?php
/**
 * Created by PhpStorm.
 * User: aluno
 * Date: 29/08/18
 * Time: 11:28
 */
require_once "DBConnection.php";
require_once "Livros.php";
require_once "Resenha.php";

class crudResenha
{
    private $conexao;

    public function __construct()
    {
        $this->conexao = DBConnection::getConexao();
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
        $resenhas = $resultado->fetch(PDO::FETCH_ASSOC);
        //CRIAR OBJETO DO TIPO CATEGORIA - USANDO OS VALORES DA CONSULTA

        foreach ($resenhas as $resenha) {

               $re_id           = $resenha['re_id'];
               $re_idlivro      = $resenha['re_idlivro'];
               $re_idusuario    = $resenha['re_idusuario'];
               $re_data         = $resenha['re_data'];
               $re_textoresenha = $resenha['re_textoresenha'];
               $re_status       = $resenha['re_status'];
            $obj = new Resenha($re_id,$re_idlivro,$re_idusuario,$re_data,$re_textoresenha,$re_status);
            $ListaResenhas[] = $obj;
        }
        return $ListaResenhas;
    }
    public function getResenha($idresenha){
        //RETORNA UMA CATEGORIA, DADO UM ID
        //FAZER A CONSULTA
        $sql = "select * from resenha where re_id='{$idresenha}'";
//        echo $sql;die;

        $resultado = $this->conexao->query($sql);

        //FETCH - TRANSFORMA O RESULTADO EM UM ARRAY ASSOCIATIVO
        $resenha = $resultado->fetch(PDO::FETCH_ASSOC);
        //CRIAR OBJETO DO TIPO CATEGORIA - USANDO OS VALORES DA CONSULTA
        $objetoResenha = new Resenha(
            $resenha['re_id'],
            $resenha['re_idlivro'],
            $resenha['re_idusuario'],
            $resenha['re_data'],
            $resenha['re_textoresenha'],
            $resenha['re_status']
        );
//        print_r($objetoResenha);die;
        return $objetoResenha;
    }

    public function addPrateleira($adiciona){
        $this->conexao = DBConnection::getConexao();
        $sql = "INSERT INTO prateleira (pr_id,pr_descricao,pr_idusuario,pr_datacriacao,pr_status) VALUES (null ,'{$adiciona->pr_descricao}','{$adiciona->pr_idusuario}','{$adiciona->pr_datacriacao}','{$adiciona->pr_status}')";
        echo $sql;die;
        $this->conexao->exec($sql);
    }
    public function excluirResenha($idresenha){
        $this->conexao = DBConnection::getConexao();
        $sql = "DELETE FROM resenha where re_id = '{$idresenha}'";
//        print_r($sql); die;
        $this->conexao->exec($sql);
    }
    public function editarResenha(Resenha $sinopseLivro){
//        $this->conexao = DBConnection::getConexao();

        $sql = "UPDATE resenha SET re_textoresenha = '{$sinopseLivro->re_textoresenha}', re_data ='{$sinopseLivro->re_data}' WHERE re_idusuario = '{$sinopseLivro->re_idusuario}'";

//        print_r($sql);die;

        try {//TENTA EXECUTAR A INSTRUCAO

            $this->conexao->exec($sql);
        } catch (PDOException $e) {//EM CASO DE ERRO, CAPTURA A MENSAGEM
            return $e->getMessage();
        }
    }
}