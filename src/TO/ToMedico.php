<?php

class ToMedico
{
    private $id;
    private $email;
    private $nome;
    private $senha;
    private $senha_nova;
    private $data_criacao;
    private $data_alteracao;

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of nome
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     *
     * @return  self
     */
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get the value of senha
     */
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * Set the value of senha
     *
     * @return  self
     */
    public function setSenha($senha)
    {
        $this->senha = md5($senha);

        return $this;
    }

     /**
     * Get the value of senha_nova
     */ 
    public function getSenha_nova()
    {
        return $this->senha_nova;
    }

    /**
     * Set the value of senha_nova
     *
     * @return  self
     */ 
    public function setSenha_nova($senha_nova)
    {
        $this->senha_nova = md5($senha_nova);

        return $this;
    }

    /**
     * Get the value of data_criacao
     */
    public function getData_criacao()
    {
        return $this->data_criacao;
    }

    /**
     * Set the value of data_criacao
     *
     * @return  self
     */
    public function setData_criacao($data_criacao)
    {
        $this->data_criacao = $data_criacao;

        return $this;
    }

    /**
     * Get the value of data_alteracao
     */
    public function getData_alteracao()
    {
        return $this->data_alteracao;
    }

    /**
     * Set the value of data_alteracao
     *
     * @return  self
     */
    public function setData_alteracao($data_alteracao)
    {
        $this->data_alteracao = $data_alteracao;

        return $this;
    }
}
