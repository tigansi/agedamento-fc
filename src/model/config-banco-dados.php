<?php

/*
 * É recomendado que as configurações de conexão com o Banco de Dados seja nesse arquivo.
 * Veja o exemplo:
 */

class MySQL
{
    private $user;
    private $pass;
    public  $conn;

    public function __construct()
    {
        $this->user = "root";
        $this->pass = "";
    }

    public function Conexao()
    {
        try {
            $this->conn = new PDO(
                "mysql:host=localhost;port=3306;dbname=agenda",
                $this->user,
                $this->pass
            );
            $this->conn->exec("set names utf8");
        } catch (PDOException $e) {
            return 'ERROR: ' . $e->getMessage();
        }
    }

    public function Desconecta()
    {
        $this->conn = null;
    }
}
