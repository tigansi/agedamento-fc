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
}
