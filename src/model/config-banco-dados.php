<?php

/*
 * É recomendado que as configurações de conexão com o Banco de Dados seja nesse arquivo.
 * Veja o exemplo:
 */

class MySQL
{
    private $host;
    private $user;
    private $pass;
    private $port;
    private $db;

    public function __construct()
    {
        $this->host = 'localhost';
        $this->user = 'root';
        $this->pass = '';
        $this->port = '3306';
        $this->db = 'agenda';
    }

    public function Conexao()
    {
        return mysqli_connect(
            $this->host,
            $this->user,
            $this->pass,
            $this->db,
            $this->port);
    }
}
