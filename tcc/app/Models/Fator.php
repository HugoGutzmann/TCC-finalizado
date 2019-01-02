<?php
/**
 * Created by PhpStorm.
 * User: Hugo
 * Date: 10/09/2018
 * Time: 15:08
 */

class Fator
{
    public $fa_id;
    public $fa_descricao;

    public function __construct($fa_id=null,$fa_descricao=null){
        $this->fa_id        = $fa_id;
        $this->fa_descricao = $fa_descricao;
    }

    /**
     * @return null
     */
    public function getFaId()
    {
        return $this->fa_id;
    }

    /**
     * @param null $fa_id
     */
    public function setFaId($fa_id)
    {
        $this->fa_id = $fa_id;
    }

    /**
     * @return null
     */
    public function getFaDescricao()
    {
        return $this->fa_descricao;
    }

    /**
     * @param null $fa_descricao
     */
    public function setFaDescricao($fa_descricao)
    {
        $this->fa_descricao = $fa_descricao;
    }

}