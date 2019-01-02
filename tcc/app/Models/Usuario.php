<?php

//VERIFICA ADMIN
//LOCAL NO BANCO QUE DIZ SE É ADMIN OU NÃO

class Usuario
{
    public $us_id;
    public $us_nome;
    public $us_email;
    public $us_senha;
    public $us_datanascimento;
    public $us_sexo;
    public $tip_usuario;

    public function __construct($us_nome=null,$us_email=null,$us_senha=null,$us_datanascimento=null,$us_sexo=null,$us_id=null,$tip_usuario=null){
        $this->us_nome = $us_nome;
        $this->us_email = $us_email;
        $this->us_senha = $us_senha;
        $this->us_datanascimento = $us_datanascimento;
        $this->us_sexo = $us_sexo;
        $this->us_id = $us_id;
        $this->tip_usuario = $tip_usuario;

    }

    /**
     * @return null
     */

    public function getUsId()
    {
        return $this->us_id;
    }

    /**
     * @param null $us_id
     */
    public function setUsId($us_id)
    {
        $this->us_id = $us_id;
    }

    /**
     * @return null
     */
    public function getUsNome()
    {
        return $this->us_nome;
    }

    /**
     * @param null $us_nome
     */
    public function setUsNome($us_nome)
    {
        $this->us_nome = $us_nome;
    }

    /**
     * @return null
     */
    public function getUsEmail()
    {
        return $this->us_email;
    }

    /**
     * @param null $us_email
     */
    public function setUsEmail($us_email)
    {
        $this->us_email = $us_email;
    }

    /**
     * @return null
     */
    public function getUsSenha()
    {
        return $this->us_senha;
    }

    /**
     * @param null $us_senha
     */
    public function setUsSenha($us_senha)
    {
        $this->us_senha = $us_senha;
    }

    /**
     * @return null
     */
    public function getUsDatanascimento()
    {
        return $this->us_datanascimento;
    }

    /**
     * @param null $us_datanascimento
     */
    public function setUsDatanascimento($us_datanascimento)
    {
        $this->us_datanascimento = $us_datanascimento;
    }

    /**
     * @return null
     */
    public function getUsSexo()
    {
        return $this->us_sexo;
    }

    /**
     * @param null $us_sexo
     */
    public function setUsSexo($us_sexo)
    {
        $this->us_sexo = $us_sexo;
    }

    /**
     * @return null
     */
    public function getTipUsuario()
    {
        return $this->tip_usuario;
    }

    /**
     * @param null $tip_usuario
     */
    public function setTipUsuario($tip_usuario)
    {
        $this->tip_usuario = $tip_usuario;
    }




}
