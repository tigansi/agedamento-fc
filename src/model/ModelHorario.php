<?php

require_once("../model/config-banco-dados.php");

class ModelHorario extends MySQL
{
    public function CadastraHorario(ToHorario $to_horario)
    {
        try {
            
            //Conexão com o banco
            $this->Conexao();

            //Cadastro de data e horário informado
            $sql = "INSERT 
                        INTO horario(
                                    id_medico, 
                                    data_horario)
                        VALUES(?, ?)";

            $cmd = $this->conn->prepare($sql);
            $cmd->bindValue(1, $to_horario->getId_medico(), PDO::PARAM_INT);
            $cmd->bindValue(2, $to_horario->getData_horario(), PDO::PARAM_STR);

            //Verificação se tudo correu bem
            if ($cmd->execute()) {
                $result = array(
                    "sucesso" => true,
                    "msg" => "Horário cadastrado com sucesso"
                );
            } else {
                $result = array(
                    "sucesso" => false,
                    "msg" => "Horário não cadastrado"
                );
            }
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
            $result = array(
                "sucesso" => false,
                "msg" => $ex->getMessage()
            );
        }

        header("Content-Type: application/json; charset=utf-8", true);
        return json_encode($result);
        /*
        $id_medico = $to_horario->getId_medico();
        $data_horario = $to_horario->getData_horario();

        try {
            require("config-banco-dados.php");
            $mysql = new MySQL();

            $sql = "INSERT 
                        INTO horario(id_medico, 
                                     data_horario)
                        VALUES('$id_medico',
                               '$data_horario')";

            mysqli_query($mysql->Conexao(), $sql);

            $result = array(
                "sucesso" => true,
                "msg" => "Horário cadastrado com sucesso"
            );
        } catch (mysqli_sql_exception $e) {
            $result = array(
                "sucesso" => false,
                "msg" => $e
            );
        }

        header("Content-Type: application/json; charset=utf-8", true);
        return json_encode($result);*/
    }
}
