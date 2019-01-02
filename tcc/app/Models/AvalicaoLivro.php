<?php
/**
 * Created by PhpStorm.
 * User: Hugo
 * Date: 22/11/2018
 * Time: 22:34
 */

class AvalicaoLivro
{

    public $al_idlivro;
    public $al_alidusuario;
    public $al_datahora;
    public $al_nota;

    public function __construct($al_idavaliacao = null, $al_idlivro = null, $al_alidusuario = null, $al_datahora = null, $al_nota = null)
    {
        $this->al_idavaliacao = $al_idavaliacao;
        $this->al_idlivro = $al_idlivro;
        $this->al_alidusuario = $al_alidusuario;
        $this->al_datahora = $al_datahora;
        $this->al_nota = $al_nota;
    }


    public $al_idavaliacao;

    /**
     * @return null
     */
    public function getAlIdavaliacao()
    {
        return $this->al_idavaliacao;
    }

    /**
     * @param null $al_idavaliacao
     */
    public function setAlIdavaliacao($al_idavaliacao)
    {
        $this->al_idavaliacao = $al_idavaliacao;
    }

    /**
     * @return null
     */
    public function getAlIdlivro()
    {
        return $this->al_idlivro;
    }

    /**
     * @param null $al_idlivro
     */
    public function setAlIdlivro($al_idlivro)
    {
        $this->al_idlivro = $al_idlivro;
    }

    /**
     * @return null
     */
    public function getAlAlidusuario()
    {
        return $this->al_alidusuario;
    }

    /**
     * @param null $al_alidusuario
     */
    public function setAlAlidusuario($al_alidusuario)
    {
        $this->al_alidusuario = $al_alidusuario;
    }

    /**
     * @return null
     */
    public function getAlDatahora()
    {
        return $this->al_datahora;
    }

    /**
     * @param null $al_datahora
     */
    public function setAlDatahora($al_datahora)
    {
        $this->al_datahora = $al_datahora;
    }

    /**
     * @return null
     */
    public function getAlNota()
    {
        return $this->al_nota;
    }

    /**
     * @param null $al_nota
     */
    public function setAlNota($al_nota)
    {
        $this->al_nota = $al_nota;
    }


}