<?php
/**
 * Created by PhpStorm.
 * User: Hugo
 * Date: 13/12/2018
 * Time: 10:39
 */

class capa
{
    public $capa_nome;

    public function __construct($capa_nome=null)
    {
        $this->capa_nome = $capa_nome;
    }

    /**
     * @return null
     */
    public function getCapaNome()
    {
        return $this->capa_nome;
    }

    /**
     * @param null $capa_nome
     */
    public function setCapaNome($capa_nome)
    {
        $this->capa_nome = $capa_nome;
    }

}