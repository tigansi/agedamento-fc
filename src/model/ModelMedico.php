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

            //Verificação se o usuário já existe com base no email
            $sql = "SELECT email FROM medico WHERE email = '$email'";
            $cmd = mysqli_query($mysql->Conexao(), $sql);
            $tot = mysqli_num_rows($cmd);

            if ($tot > 0) {
                $result = array(
                    "sucesso" => false,
                    "msg" => "Médico já cadastrado com esse e-mail"
                );
            } else {
                // Se não existe, faz o cadastro no banco
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

                mysqli_set_charset($mysql->Conexao(), "UTF-8");
                mysqli_query($mysql->Conexao(), $sql);
                
                /*
                $sql = "SELECT id 
                        FROM medico 
                        WHERE nome = '$nome'";

                $cmd = mysqli_query($mysql->Conexao(), $sql);
                $dad = mysqli_fetch_assoc($cmd);

                foreach ($dad as $id) {
                    $id_medico = $id;
                }

                $sql = "INSERT INTO horario(id_medico) VALUES($id_medico)";
                mysqli_query($mysql->Conexao(), $sql);*/

                $result = array(
                    "sucesso" => true,
                    "msg" => "Médico cadastrado com sucesso"
                );
            }
        } catch (mysqli_sql_exception $e) {
            $result = array(
                "sucesso" => false,
                "msg" => $e
            );
        }

        header("Content-Type: application/json; charset=utf-8", true);
        return json_encode($result);
    }
}
