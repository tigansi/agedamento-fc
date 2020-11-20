<?php

class ModelMedico
{
    public function CadastrarMedico(ToMedico $to_medico)
    {
        $email = $to_medico->getEmail();
        $nome = $to_medico->getNome();
        $senha = $to_medico->getSenha();
        $data_criacao = $to_medico->getData_criacao();

        try {
            require("config-banco-dados.php");
            $mysql = new MySQL();

            $sql = "INSERT
                        INTO medico(
                                email,
                                nome,
                                senha,
                                data_criacao)
                        VALUES('$email',
                               '$nome',
                               '$senha',
                               '$data_criacao')";

            mysqli_query($mysql->Conexao(), $sql);

            $result = array(
                "sucesso" => true,
                "msg" => "Médico cadastrado com sucesso"
            );
        } catch (mysqli_sql_exception $e) {
            $result = array(
                "sucesso" => false,
                "msg" => $e
            );
        }

        return json_encode($result);
    }
}
