<?php

class ModelMedico
{
    public function CadastrarMedico(ToMedico $to_medico)
    {
        $email = $to_medico->getEmail();
        $nome = $to_medico->getNome();
        $senha = $to_medico->getSenha();
        $data_criacao = $to_medico->getData_criacao();

        try
        {
            $sql = "INSERT
                        INTO medico(
                                email,
                                nome,
                                senha,
                                data_criacao)
                        VALUES($email,
                               $nome,
                               $senha,
                               $data_criacao)";

        } catch (mysqli_sql_exception $e) {

        }
    }
}
