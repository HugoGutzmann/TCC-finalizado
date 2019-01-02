<?php
/**
 * Created by PhpStorm.
 * User: Hugo
 * Date: 11/08/2018
 * Time: 20:17
 */

class GeneroLivro
{
    public $gl_id;
    public $gl_idlivro;
    public $gl_idgenero;

        public function __construct($gl_id = null, $gl_idlivro = null, $gl_idgenero = null){
            $this->gl_id=$gl_id;
            $this->gl_idlivro=$gl_idlivro;
            $this->gl_idgenero=$gl_idgenero;
        }

    /**
     * @return mixed
     */
    public function getGlId()
    {
        return $this->gl_id;
    }

    /**
     * @param mixed $gl_id
     */
    public function setGlId($gl_id)
    {
        $this->gl_id = $gl_id;
    }

    /**
     * @return mixed
     */
    public function getGlIdlivro()
    {
        return $this->gl_idlivro;
    }

    /**
     * @param mixed $gl_idlivro
     */
    public function setGlIdlivro($gl_idlivro)
    {
        $this->gl_idlivro = $gl_idlivro;
    }

    /**
     * @return mixed
     */
    public function getGlIdgenero()
    {
        return $this->gl_idgenero;
    }

    /**
     * @param mixed $gl_idgenero
     */
    public function setGlIdgenero($gl_idgenero)
    {
        $this->gl_idgenero = $gl_idgenero;
    }


}