<?php
/**
 * Created by PhpStorm.
 * User: Hugo
 * Date: 12/08/2018
 * Time: 00:02
 */

class Resenha
{
    public $re_id;
    public $re_idlivro;
    public $re_idusuario;
    public $re_data;
    public $re_textoresenha;
    public $re_status;

    public function __construct($re_id, $re_idlivro, $re_idusuario,$re_data,$re_textoresenha,$re_status)
    {
        $this->re_id = $re_id;
        $this->re_idlivro = $re_idlivro;
        $this->re_idusuario = $re_idusuario;
        $this->re_data = $re_data;
        $this->re_textoresenha = $re_textoresenha;
        $this->re_status = $re_status;

    }

    /**
     * @return mixed
     */
    public function getReId()
    {
        return $this->re_id;
    }

    /**
     * @param mixed $re_id
     */
    public function setReId($re_id)
    {
        $this->re_id = $re_id;
    }

    /**
     * @return mixed
     */
    public function getReIdlivro()
    {
        return $this->re_idlivro;
    }

    /**
     * @param mixed $re_idlivro
     */
    public function setReIdlivro($re_idlivro)
    {
        $this->re_idlivro = $re_idlivro;
    }

    /**
     * @return mixed
     */
    public function getReIdusuario()
    {
        return $this->re_idusuario;
    }

    /**
     * @param mixed $re_idusuario
     */
    public function setReIdusuario($re_idusuario)
    {
        $this->re_idusuario = $re_idusuario;
    }

    /**
     * @return mixed
     */
    public function getReData()
    {
        return $this->re_data;
    }

    /**
     * @param mixed $re_data
     */
    public function setReData($re_data)
    {
        $this->re_data = $re_data;
    }

    /**
     * @return mixed
     */
    public function getReTextoresenha()
    {
        return $this->re_textoresenha;
    }

    /**
     * @param mixed $re_textoresenha
     */
    public function setReTextoresenha($re_textoresenha)
    {
        $this->re_textoresenha = $re_textoresenha;
    }

    /**
     * @return mixed
     */
    public function getReStatus()
    {
        return $this->re_status;
    }

    /**
     * @param mixed $re_status
     */
    public function setReStatus($re_status)
    {
        $this->re_status = $re_status;
    }

}