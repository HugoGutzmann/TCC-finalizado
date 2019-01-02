<?php
/**
 * Created by PhpStorm.
 * User: Hugo
 * Date: 16/10/2018
 * Time: 21:55
 */

class LivrosFatorUsuario
{
    public $lf_id;
    public $lf_idfator;
    public $lf_idusuario;
    public $li_titulo;
    public $li_autor;

    public function __construct($lf_id=null,$lf_idfator=null,$lf_idusuario=null,$li_titulo=null,$li_autor=null)
    {

        $this->lf_id        = $lf_id;
        $this->lf_idfator   = $lf_idfator;
        $this->lf_idusuario = $lf_idusuario;
        $this->li_titulo      = $li_titulo;
        $this->li_autor      = $li_autor;
    }

    /**
     * @return null
     */
    public function getLfId()
    {
        return $this->lf_id;
    }

    /**
     * @param null $lf_id
     */
    public function setLfId($lf_id)
    {
        $this->lf_id = $lf_id;
    }

    /**
     * @return null
     */
    public function getLfIdfator()
    {
        return $this->lf_idfator;
    }

    /**
     * @param null $lf_idfator
     */
    public function setLfIdfator($lf_idfator)
    {
        $this->lf_idfator = $lf_idfator;
    }

    /**
     * @return null
     */
    public function getLfIdusuario()
    {
        return $this->lf_idusuario;
    }

    /**
     * @param null $lf_idusuario
     */
    public function setLfIdusuario($lf_idusuario)
    {
        $this->lf_idusuario = $lf_idusuario;
    }

    /**
     * @return null
     */
    public function getLiTitulo()
    {
        return $this->li_titulo;
    }

    /**
     * @param null $li_titulo
     */
    public function setLiTitulo($li_titulo)
    {
        $this->li_titulo = $li_titulo;
    }

    /**
     * @return null
     */
    public function getLiAutor()
    {
        return $this->li_autor;
    }

    /**
     * @param null $li_autor
     */
    public function setLiAutor($li_autor)
    {
        $this->li_autor = $li_autor;
    }

}