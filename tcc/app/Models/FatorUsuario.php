<?php
/**
 * Created by PhpStorm.
 * User: Hugo
 * Date: 12/08/2018
 * Time: 12:30
 */

class FatorUsuario
{
    public $fu_id;
    public $fu_idfator;
    public $fu_idusuario;
    public $fu_nota;

    public function __construct($fu_id=null,$fu_idfator=null,$fu_idusuario=null,$fu_nota=null)
    {

        $this->fu_id        = $fu_id;
        $this->fu_idfator   = $fu_idfator;
        $this->fu_idusuario = $fu_idusuario;
        $this->fu_nota      = $fu_nota;
    }

    /**
     * @return mixed
     */
    public function getFuId()
    {
        return $this->fu_id;
    }

    /**
     * @param mixed $fu_id
     */
    public function setFuId($fu_id)
    {
        $this->fu_id = $fu_id;
    }

    /**
     * @return null
     */
    public function getFuIdfator()
    {
        return $this->fu_idfator;
    }

    /**
     * @param null $fu_idfator
     */
    public function setFuIdfator($fu_idfator)
    {
        $this->fu_idfator = $fu_idfator;
    }

    /**
     * @return null
     */
    public function getFuIdusuario()
    {
        return $this->fu_idusuario;
    }

    /**
     * @param null $fu_idusuario
     */
    public function setFuIdusuario($fu_idusuario)
    {
        $this->fu_idusuario = $fu_idusuario;
    }

    /**
     * @return null
     */
    public function getFuNota()
    {
        return $this->fu_nota;
    }

    /**
     * @param null $fu_nota
     */
    public function setFuNota($fu_nota)
    {
        $this->fu_nota = $fu_nota;
    }



}