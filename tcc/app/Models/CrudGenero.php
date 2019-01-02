<?php

require_once "DBConnection.php";
require_once "Generos.php";
require_once "GeneroLivro.php";
class CrudGenero
{
    public $conexao;
    public $genero;

    public function __construct()
    {
        $this->conexao = DBConnection::getConexao();
    }

    public function addGenero(Generos $genero)
    {
        $this->conexao = DBConnection::getConexao();
        $sql = "INSERT INTO genero (ge_descricao) VALUES ('{$genero->ge_descricao}')";
//        print_r($sql);die;
        $this->conexao->exec($sql);
    }

    public function excluirLivro(int $li_idlivro)
    {
        $sql = "DELETE FROM livro WHERE id = {$li_idlivro};";
        $this->conexao->exec($sql);
    }

    public function getGeneros()
    {
        $consulta = $this->conexao->query("SELECT * FROM genero");

        $generos = $consulta->fetchAll(PDO::FETCH_ASSOC);
        foreach ($generos as $genero) {
            $ge_descricao = utf8_decode($genero['ge_descricao']);
            $id_genero = $genero['ge_id'];

            $obj = new Generos($ge_descricao, $id_genero);
            $ListaGeneros[] = $obj;
        }
        return $ListaGeneros;
    }

    public function getGenero($idgenero)
    {
        //RETORNA UMA CATEGORIA, DADO UM ID
        //FAZER A CONSULTA
        $sql = "select * from genero where ge_id='{$idgenero}'";
        $resultado = $this->conexao->query($sql);
        //FETCH - TRANSFORMA O RESULTADO EM UM ARRAY ASSOCIATIVO
        $genero = $resultado->fetch(PDO::FETCH_ASSOC);
        //CRIAR OBJETO DO TIPO CATEGORIA - USANDO OS VALORES DA CONSULTA
        $objetoGenero = new Generos($genero['ge_descricao']);
        //RETORNAR UM OBJETO CATEGORIA COM OS VALORES
        return $objetoGenero;
    }

    public function addLivroGenero(GeneroLivro $generoLivro)
    {

        $sql = "INSERT INTO generolivro (gl_id, gl_idlivro, gl_idgenero) VALUES (null,'{$generoLivro->getGlIdlivro()}','{$generoLivro->getGlIdgenero()}')";
//        print_r($sql);die;
        $this->conexao->exec($sql);

    }

    public function AtualizaLivroGenero(GeneroLivro $generoLivro, $idlivro){
        $sql = "INSERT INTO generolivro (gl_idlivro,gl_idgenero) VALUES ('{$idlivro}','{$generoLivro->getGlIdgenero()}')";
//        print_r($sql);die;
        $this->conexao->exec($sql);

    }

    public function getGeneroLivro($idlivro)
    {

        $sql = "select * from generolivro where gl_idlivro = '{$idlivro}' ";
//        print_r($sql);die;
        $resultado = $this->conexao->query($sql);
//        //FETCH - TRANSFORMA O RESULTADO EM UM ARRAY ASSOCIATIVO
        $generos = $resultado->fetchAll(PDO::FETCH_ASSOC);
//print_r($generos);die;
        foreach ($generos as $genero) {
            $gl_id          = $genero['gl_id'];
            $gl_idlivro     = $genero['gl_idlivro'];
            $gl_idgenero    = $genero['gl_idgenero'];

            $obj = new GeneroLivro($gl_id,$gl_idlivro,$gl_idgenero);
            $objetoGenero[] = $obj;
}
//print_r($objetoGenero);die;
        return $objetoGenero;
    }

    public function excluirGenero(int $idGenero)
    {
        $sql = "DELETE FROM genero WHERE ge_id = {$idGenero};";
        $this->conexao->exec($sql);
    }

    public function editarGenero($generonovo, $idGenero)
    {
        $this->conexao = DBConnection::getConexao();

        $sql = "UPDATE genero SET ge_descricao = '{$generonovo->ge_descricao}' WHERE ge_id = '{$idGenero}'";

        $this->conexao->exec($sql);

    }
}
