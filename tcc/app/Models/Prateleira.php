<?php
/**
 * Created by PhpStorm.
 * User: Hugo
 * Date: 12/08/2018
 * Time: 16:08
 */

class Prateleira
{
    public $pr_id;
    public $pr_descricao;
    public $pr_idusuario;
    public $pr_datacriacao;
    public $pr_status;

    public function __construct($pr_id = null, $pr_descricao = null, $pr_idusuario = null, $pr_datacriacao = null, $pr_status = null)
    {
        $this->pr_id = $pr_id;
        $this->pr_descricao = $pr_descricao;
        $this->pr_idusuario = $pr_idusuario;
        $this->pr_datacriacao = $pr_datacriacao;
        $this->pr_status = $pr_status;
    }

    /**
     * @return null
     */
    public function getPrId()
    {
        return $this->pr_id;
    }

    /**
     * @param null $pr_id
     */
    public function setPrId($pr_id)
    {
        $this->pr_id = $pr_id;
    }

    /**
     * @return null
     */
    public function getPrDescricao()
    {
        return $this->pr_descricao;
    }

    /**
     * @param null $pr_descricao
     */
    public function setPrDescricao($pr_descricao)
    {
        $this->pr_descricao = $pr_descricao;
    }

    /**
     * @return null
     */
    public function getPrIdusuario()
    {
        return $this->pr_idusuario;
    }

    /**
     * @param null $pr_idusuario
     */
    public function setPrIdusuario($pr_idusuario)
    {
        $this->pr_idusuario = $pr_idusuario;
    }

    /**
     * @return null
     */
    public function getPrDatacriacao()
    {
        return $this->pr_datacriacao;
    }

    /**
     * @param null $pr_datacriacao
     */
    public function setPrDatacriacao($pr_datacriacao)
    {
        $this->pr_datacriacao = $pr_datacriacao;
    }

    /**
     * @return null
     */
    public function getPrStatus()
    {
        return $this->pr_status;
    }

    /**
     * @param null $pr_status
     */
    public function setPrStatus($pr_status)
    {
        $this->pr_status = $pr_status;
    }



}