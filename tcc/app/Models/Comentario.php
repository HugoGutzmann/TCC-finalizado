<?php
/**
 * Created by PhpStorm.
 * User: Hugo
 * Date: 14/10/2018
 * Time: 15:32
 */

class Comentario
{
    public $cm_id;
    public $cm_texto;
    public $cm_data;
    public $cm_curtidas;
    public $cm_idusuario;
    public $cm_idlivro;

    public function __construct($cm_texto=null,$cm_data=null,$cm_idusuario=null,$cm_idlivro=null,$cm_curtidas=null,$cm_id=null){
        $this->cm_texto           = $cm_texto;
        $this->cm_data            = $cm_data;
        $this->cm_idusuario       = $cm_idusuario;
        $this->cm_idlivro         = $cm_idlivro;
        $this->cm_curtidas        = $cm_curtidas;
        $this->cm_id              = $cm_id;
    }

    /**
     * @return null
     */
    public function getCmId()
    {
        return $this->cm_id;
    }

    /**
     * @param null $cm_id
     */
    public function setCmId($cm_id)
    {
        $this->cm_id = $cm_id;
    }

    /**
     * @return null
     */
    public function getCmTexto()
    {
        return $this->cm_texto;
    }

    /**
     * @param null $cm_texto
     */
    public function setCmTexto($cm_texto)
    {
        $this->cm_texto = $cm_texto;
    }

    /**
     * @return null
     */
    public function getCmData()
    {
        return $this->cm_data;
    }

    /**
     * @param null $cm_data
     */
    public function setCmData($cm_data)
    {
        $this->cm_data = $cm_data;
    }

    /**
     * @return null
     */
    public function getCmCurtidas()
    {
        return $this->cm_curtidas;
    }

    /**
     * @param null $cm_curtidas
     */
    public function setCmCurtidas($cm_curtidas)
    {
        $this->cm_curtidas = $cm_curtidas;
    }

    /**
     * @return null
     */
    public function getCmIdusuario()
    {
        return $this->cm_idusuario;
    }

    /**
     * @param null $cm_idusuario
     */
    public function setCmIdusuario($cm_idusuario)
    {
        $this->cm_idusuario = $cm_idusuario;
    }

    /**
     * @return null
     */
    public function getCmIdlivro()
    {
        return $this->cm_idlivro;
    }

    /**
     * @param null $cm_idlivro
     */
    public function setCmIdlivro($cm_idlivro)
    {
        $this->cm_idlivro = $cm_idlivro;
    }


}