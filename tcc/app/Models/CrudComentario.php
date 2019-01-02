<?php

require_once 'DBConnection.php';
require_once 'Comentario.php';
require_once 'Livros.php';
require_once 'CrudLivros.php';
class CrudComentario
{
    private $conexao;
    private $comentarios;

    public function __construct()
    {
        $this->conexao = DBConnection::getConexao();
    }

    public function fazComentario(Comentario $novoComentario){


    $sql = "INSERT INTO comentario (cm_id,cm_texto,cm_data,cm_curtidas,cm_idusuario,cm_idlivro) VALUES (null,'{$novoComentario->getCmTexto()}','{$novoComentario->getCmData()}',0,'{$novoComentario->getCmIdUsuario()}','{$novoComentario->getCmIdlivro()}')";
//    print_r($sql);
    $this->conexao->exec($sql);

    }

    public function curteComentario($cm_id,$curtidasAtuais){
        $sql = "UPDATE comentario SET cm_curtidas = $curtidasAtuais+1 WHERE cm_id='$cm_id'";
        $this->conexao->exec($sql);
    }

    public function editaComentario(Comentario $textoComentarioNovo,$dataComentario,$cm_id){
        $sql = "UPDATE comentario SET cm_texto=$textoComentarioNovo, cm_data=$dataComentario, WHERE cm_id=$cm_id";
        $this->conexao->exec($sql);
    }

    public function denunciaComentario(){

    }

    public function excluiComentario($cm_id){
        $sql="DELETE FROM comentario WHERE cm_id = '{$cm_id}'";
        $this->conexao->exec($sql);
        try {//TENTA EXECUTAR A INSTRUCAO

            $this->conexao->exec($sql);
        } catch (PDOException $e) {//EM CASO DE ERRO, CAPTURA A MENSAGEM
            return $e->getMessage();
        }
    }

    public function getComentarios($livro)
    {
        $sql = "select * from comentario WHERE cm_idlivro = '$livro->li_idlivro'";
//        print_r ($sql);die;
        $resultado = $this->conexao->query($sql);

        //FETCH - TRANSFORMA O RESULTADO EM UM ARRAY ASSOCIATIVO
        $comentarios = $resultado->fetchAll(PDO::FETCH_ASSOC);

        //CRIAR OBJETO DO TIPO CATEGORIA - USANDO OS VALORES DA CONSULTA
        foreach ($comentarios as $comentario) {
            $cm_texto = $comentario['cm_texto'];
            $cm_data = $comentario['cm_data'];
            $cm_idusuario = $comentario['cm_idusuario'];
            $cm_idlivro = $comentario['cm_idlivro'];
            $cm_curtidas = $comentario['cm_curtidas'];
            $cm_id = $comentario['cm_id'];
            $obj = new Comentario($cm_texto, $cm_data, $cm_idusuario, $cm_idlivro, $cm_curtidas, $cm_id);
            $ListaComentarios[] = $obj;
        }
        if (isset($ListaComentarios)) {
            return $ListaComentarios;
        }
    }
    public function getComentario(Comentario $cm_id){
        $sql = "select * from comentario where cm_id='{$cm_id}'";
        $resultado = $this->conexao->query($sql);
        //FETCH - TRANSFORMA O RESULTADO EM UM ARRAY ASSOCIATIVO
        $comentario = $resultado->fetch(PDO::FETCH_ASSOC);
        //CRIAR OBJETO DO TIPO CATEGORIA - USANDO OS VALORES DA CONSULTA
        $objetoComentario = new Comentario(
            $comentario['cm_texto'],
            $comentario['cm_data'],
            $comentario['cm_idusuario'],
            $comentario['cm_idlivro'],
            $comentario['cm_curtidas'],
            $comentario['cm_id']

        );
        //RETORNAR UM OBJETO CATEGORIA COM OS VALORES
        return $objetoComentario;
    }
}