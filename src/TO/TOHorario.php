<?php

class ToHorario
{
    private $id;
    private $id_medico;
    private $data_horario;
    private $horario_agendado;
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
     * Get the value of id_medico
     */
    public function getId_medico()
    {
        return $this->id_medico;
    }

    /**
     * Set the value of id_medico
     *
     * @return  self
     */
    public function setId_medico($id_medico)
    {
        $this->id_medico = $id_medico;

        return $this;
    }

    /**
     * Get the value of data_horario
     */
    public function getData_horario()
    {
        return $this->data_horario;
    }

    /**
     * Set the value of data_horario
     *
     * @return  self
     */
    public function setData_horario($data_horario)
    {
        $this->data_horario = $data_horario;

        return $this;
    }

    /**
     * Get the value of horario_agendado
     */
    public function getHorario_agendado()
    {
        return $this->horario_agendado;
    }

    /**
     * Set the value of horario_agendado
     *
     * @return  self
     */
    public function setHorario_agendado($horario_agendado)
    {
        $this->horario_agendado = $horario_agendado;

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
