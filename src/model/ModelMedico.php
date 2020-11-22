<?php

require_once("../model/config-banco-dados.php");

class ModelMedico extends MySQL
{
    public function CadastrarMedico(ToMedico $to_medico)
    {
        try {
            //Conexão com o banco
            $this->Conexao();

            //Verificação se o usuário já existe com base no email
            $sql = "SELECT email FROM medico WHERE email = ?";
            $cmd = $this->conn->prepare($sql);
            $cmd->bindValue(1, $to_medico->getEmail(), PDO::PARAM_STR);

            if ($cmd->execute()) {
                if ($cmd->rowCount() > 0) {
                    //Informa que já existe um cadastro
                    $result = array(
                        "sucesso" => false,
                        "msg" => "Médico já cadastrado com esse e-mail"
                    );
                } else {
                    //Cadastra o novo médico
                    $query = "INSERT 
                                INTO medico(email,
                                            nome,
                                            senha)
                                VALUES(?, ?, ?)";
                    $myquery = $this->conn->prepare($query);
                    $myquery->bindValue(1, $to_medico->getEmail(), PDO::PARAM_STR);
                    $myquery->bindValue(2, $to_medico->getNome(), PDO::PARAM_STR);
                    $myquery->bindValue(3, $to_medico->getSenha(), PDO::PARAM_STR);

                    //Verificação se tudo ocorreu normalmente
                    if ($myquery->execute()) {
                        $result = array(
                            "sucesso" => true,
                            "msg" => "Médico cadastrado com sucesso"
                        );
                    } else {
                        $result = array(
                            "sucesso" => false,
                            "msg" => "Não houve cadastro"
                        );
                    }
                }
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

    public function EditaDadosMedico(ToMedico $to_medico)
    {
        try {
            //Conexão com o banco
            $this->Conexao();

            //Verificação se a senha antiga está correta
            $sql_ant = "SELECT 
                            nome 
                        FROM 
                            medico 
                        WHERE id    = ? AND 
                              senha = ?";

            $cmd_ant = $this->conn->prepare($sql_ant);
            $cmd_ant->bindValue(1, $to_medico->getId(), PDO::PARAM_INT);
            $cmd_ant->bindValue(2, $to_medico->getSenha(), PDO::PARAM_STR);

            if ($cmd_ant->execute()) {
                if ($cmd_ant->rowCount() > 0) {
                    //A senha antiga informada está certa
                    //O próximo passo é redefinir a senha

                    $sql_nov = "UPDATE 
                                    medico 
                                SET senha = ?,
                                    data_alteracao = ? 
                                WHERE id = ?";

                    $cmd_nov = $this->conn->prepare($sql_nov);
                    $cmd_nov->bindValue(1, $to_medico->getSenha_nova(), PDO::PARAM_STR);
                    $cmd_nov->bindValue(2, $to_medico->getData_alteracao(), PDO::PARAM_STR);
                    $cmd_nov->bindValue(3, $to_medico->getId(), PDO::PARAM_INT);

                    if ($cmd_nov->execute()) {
                        $result = array(
                            "sucesso" => true,
                            "msg" => "A senha foi alterada com sucesso"
                        );
                        //Senha alterada
                    } else {
                        $result = array(
                            "sucesso" => false,
                            "msg" => "Não houve alteração"
                        );
                        //Ocorreu algum problema
                    }
                } else {
                    $result = array(
                        "sucesso" => false,
                        "msg" => "A senha antiga informada, não está correta."
                    );
                    //A senha antiga informada está errada
                }
            }
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
            $result = array(
                "sucesso" => false,
                "msg" => $ex->getMessage()
            );
        }

        //Fecha a conexão
        $this->Desconecta();

        header("Content-Type: application/json; charset=utf-8", true);
        return json_encode($result);
    }
}
