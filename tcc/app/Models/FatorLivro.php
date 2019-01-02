<?php
/**
 * Created by PhpStorm.
 * User: Hugo
 * Date: 06/10/2018
 * Time: 19:07
 */

class FatorLivro
{
    public $fl_id;
    public $fl_idfator;
    public $fl_idlivro;
    public $fl_idusuario;
    public $fl_valor;

    public function __construct($fl_id = null, $fl_idfator = null, $fl_idlivro = null, $fl_idusuario = null, $fl_valor = null)
    {
        $this->fl_id = $fl_id;
        $this->fl_idfator = $fl_idfator;
        $this->fl_idlivro = $fl_idlivro;
        $this->fl_idusuario = $fl_idusuario;
        $this->fl_idfator = $fl_valor;
    }

    /**
     * @return null
     */
    public function getFlId()
    {
        return $this->fl_id;
    }

    /**
     * @param null $fl_id
     */
    public function setFlId($fl_id)
    {
        $this->fl_id = $fl_id;
    }

    /**
     * @return null
     */
    public function getFlIdfator()
    {
        return $this->fl_idfator;
    }

    /**
     * @param null $fl_idfator
     */
    public function setFlIdfator($fl_idfator)
    {
        $this->fl_idfator = $fl_idfator;
    }

    /**
     * @return null
     */
    public function getFlIdlivro()
    {
        return $this->fl_idlivro;
    }

    /**
     * @param null $fl_idlivro
     */
    public function setFlIdlivro($fl_idlivro)
    {
        $this->fl_idlivro = $fl_idlivro;
    }

    /**
     * @return null
     */
    public function getFlIdusuario()
    {
        return $this->fl_idusuario;
    }

    /**
     * @param null $fl_idusuario
     */
    public function setFlIdusuario($fl_idusuario)
    {
        $this->fl_idusuario = $fl_idusuario;
    }

    /**
     * @return mixed
     */
    public function getFlValor()
    {
        return $this->fl_valor;
    }

    /**
     * @param mixed $fl_valor
     */
    public function setFlValor($fl_valor)
    {
        $this->fl_valor = $fl_valor;
    }

}

