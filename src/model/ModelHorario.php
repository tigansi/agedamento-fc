<?php

require_once("../model/config-banco-dados.php");

class ModelHorario extends MySQL
{
    public function CadastraHorario(ToHorario $to_horario)
    {
        try {

            //Conexão com o banco
            $this->Conexao();

            /*Verifica se o horário já não foi cadastrado,
            com a finalidade de evitar duplicados.
            */

            $sql_dup = "SELECT 
                            id_medico,
                            data_horario
                        FROM horario
                        WHERE id_medico = ? and
                              data_horario = ?";

            $cmd_dup = $this->conn->prepare($sql_dup);
            $cmd_dup->bindValue(1, $to_horario->getId_medico(), PDO::PARAM_INT);
            $cmd_dup->bindValue(2, $to_horario->getData_horario(), PDO::PARAM_STR);

            if ($cmd_dup->execute()) {
                if ($cmd_dup->rowCount() > 0) {
                    $result = array(
                        "sucesso" => false,
                        "msg" => "O horário já foi cadastrado"
                    );
                } else {
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
                }
            } else {
                echo "Nao executou";
                $result = array(
                    "sucesso" => false,
                    "msg" => "Erro"
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
    }

    public function RemoveHorario($id_horario)
    {
        try {
            //Conexão com o banco
            $this->Conexao();

            //Delete no horário com base no Id
            $sql = "DELETE FROM horario WHERE id = ?";
            $cmd = $this->conn->prepare($sql);
            $cmd->bindValue(1, $id_horario, PDO::PARAM_INT);

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
    }

    public function AgendaHorario($id_hor, $id_med)
    {
        try {
            //Conexão com o banco
            $this->Conexao();

            //Realiza o agendamento
            $sql = "UPDATE 
                        horario 
                    SET horario_agendado = 1,
                        data_alteracao = ? 
                    WHERE 
                        id = ? AND
                        id_medico = ?";

            $cmd = $this->conn->prepare($sql);
            $cmd->bindValue(1, date("Y-m-d h:m"), PDO::PARAM_STR);
            $cmd->bindValue(2, $id_hor, PDO::PARAM_INT);
            $cmd->bindValue(3, $id_med, PDO::PARAM_INT);

            if ($cmd->execute()) {
                $result = array(
                    "sucesso" => true,
                    "msg" => "Horário agendado com sucesso"
                );
            } else {
                $result = array(
                    "sucesso" => false,
                    "msg" => "Horário não agendado"
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
    }
}
