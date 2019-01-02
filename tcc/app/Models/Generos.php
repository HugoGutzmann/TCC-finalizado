<?php
/**
 * Created by PhpStorm.
 * User: Hugo
 * Date: 26/07/2018
 * Time: 12:16
 */

class Generos
{
    public $ge_id;
    public $ge_descricao;

    public function __construct($ge_descricao = null,$ge_id = null)
    {
        $this->ge_descricao = $ge_descricao;
        $this->ge_id = $ge_id;
    }

    public function getGenId()
    {
        return $this->ge_id;
    }

    public function setGenId($ge_id)
    {
        $this->ge_id = $ge_id;
    }

    public function getGenDesc()
    {
        return $this->ge_descricao;
    }

    public function setGenDesc($ge_descricao)
    {
        $this->ge_descricao = $ge_descricao;
    }

}
