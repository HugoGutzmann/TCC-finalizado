<?php
/**
 * Created by PhpStorm.
 * User: Hugo
 * Date: 14/10/2018
 * Time: 21:43
 */

class Biblioteca
{
    public $bi_id;
    public $bi_idlivro;
    public $bi_idprateleira;
    public $bi_datainclusao;
    public $bi_observacao;


    public function __construct($bi_id = null, $bi_idlivro = null, $bi_idprateleira = null, $bi_datainclusao = null, $bi_observacao = null)
    {
        $this->bi_id = $bi_id;
        $this->bi_idlivro = $bi_idlivro;
        $this->bi_idprateleira = $bi_idprateleira;
        $this->bi_datainclusao = $bi_datainclusao;
        $this->bi_observacao = $bi_observacao;
    }

    /**
     * @return null
     */
    public function getBiId()
    {
        return $this->bi_id;
    }

    /**
     * @param null $bi_id
     */
    public function setBiId($bi_id)
    {
        $this->bi_id = $bi_id;
    }

    /**
     * @return null
     */
    public function getBiIdlivro()
    {
        return $this->bi_idlivro;
    }

    /**
     * @param null $bi_idlivro
     */
    public function setBiIdlivro($bi_idlivro)
    {
        $this->bi_idlivro = $bi_idlivro;
    }

    /**
     * @return null
     */
    public function getBiIdprateleira()
    {
        return $this->bi_idprateleira;
    }

    /**
     * @param null $bi_idprateleira
     */
    public function setBiIdprateleira($bi_idprateleira)
    {
        $this->bi_idprateleira = $bi_idprateleira;
    }

    /**
     * @return null
     */
    public function getBiDatainclusao()
    {
        return $this->bi_datainclusao;
    }

    /**
     * @param null $bi_datainclusao
     */
    public function setBiDatainclusao($bi_datainclusao)
    {
        $this->bi_datainclusao = $bi_datainclusao;
    }

    /**
     * @return null
     */
    public function getBiObservacao()
    {
        return $this->bi_observacao;
    }

    /**
     * @param null $bi_observacao
     */
    public function setBiObservacao($bi_observacao)
    {
        $this->bi_observacao = $bi_observacao;
    }

}