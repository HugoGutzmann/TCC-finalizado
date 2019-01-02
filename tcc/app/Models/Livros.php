<?php
/**
 * Created by PhpStorm.
 * User: aluno
 * Date: 10/07/18
 * Time: 08:47
 */
require_once "DBConnection.php";
class Livros{

    public $li_ano;
    public $li_autor;
    public $li_censura;
    public $li_editora;
    public $li_paginas;
    public $li_titulo;
    public $li_idlivro;
    public $li_idusuario;
    public $li_foto;



    public function __construct($li_ano=null,$li_autor=null,$li_censura=null,$li_editora=null, $li_paginas=null,$li_titulo=null,$li_idlivro=null,$li_idusuario=null,$li_foto=null)
    {
        $this->li_ano = $li_ano;
        $this->li_autor = $li_autor;
        $this->li_censura = $li_censura;
        $this->li_editora = $li_editora;
        $this->li_paginas = $li_paginas;
        $this->li_titulo = $li_titulo;
        $this->li_idlivro= $li_idlivro;
        $this->li_idusuario= $li_idusuario;
        $this->li_foto= $li_foto;
    }

    /**
     * @return null
     */
    public function getLiAno()
    {
        return $this->li_ano;
    }

    /**
     * @param null $li_ano
     */
    public function setLiAno($li_ano)
    {
        $this->li_ano = $li_ano;
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

    /**
     * @return null
     */
    public function getLiCensura()
    {
        return $this->li_censura;
    }

    /**
     * @param null $li_censura
     */
    public function setLiCensura($li_censura)
    {
        $this->li_censura = $li_censura;
    }

    /**
     * @return null
     */
    public function getLiEditora()
    {
        return $this->li_editora;
    }

    /**
     * @param null $li_editora
     */
    public function setLiEditora($li_editora)
    {
        $this->li_editora = $li_editora;
    }

    /**
     * @return mixed
     */
    public function getLiIdlivro()
    {
        return $this->li_idlivro;
    }

    /**
     * @param mixed $li_idlivro
     */
    public function setLiIdlivro($li_idlivro)
    {
        $this->li_idlivro = $li_idlivro;
    }

    /**
     * @return null
     */
    public function getLiPaginas()
    {
        return $this->li_paginas;
    }

    /**
     * @param null $li_paginas
     */
    public function setLiPaginas($li_paginas)
    {
        $this->li_paginas = $li_paginas;
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
     * @return mixed
     */
    public function getLiIdusuario()
    {
        return $this->li_idusuario;
    }

    /**
     * @param mixed $li_idusuario
     */
    public function setLiIdusuario($li_idusuario)
    {
        $this->li_idusuario = $li_idusuario;
    }
    /**
     * @return null
     */
    public function getLiFoto()
    {
        return $this->li_foto;
    }

    /**
     * @param null $li_foto
     */
    public function setLiFoto($li_foto)
    {
        $this->li_foto = $li_foto;
    }
}