<?php
require "../TO/ToMedico.php";
require "../model/ModelMedico.php";

$to_medico = new ToMedico();
$model_medico = new ModelMedico();

$dados = json_decode($_POST["dados"]);

if ($to_medico->setNome($dados->nome)) {
    if ($to_medico->setSenha($dados->senha)) {
        if ($to_medico->setEmail($dados->email)) {
            header('Content-Type: text/plain');
            echo $model_medico->CadastrarMedico($to_medico);
        } else {
            $result = array(
                "sucesso" => false,
                "msg" => "Verifique o campo do e-mail"
            );

            //problema com o email

            header("Content-Type: application/json; charset=utf-8", true);
            echo json_encode($result);
        }
    } else {
        $result = array(
            "sucesso" => false,
            "msg" => "Verifique o campo da senha"
        );

        //problema com a senha

        header("Content-Type: application/json; charset=utf-8", true);
        echo json_encode($result);
    }
} else {

    $result = array(
        "sucesso" => false,
        "msg" => "Verifique o campo do nome"
    );

    //problema com o nome

    header("Content-Type: application/json; charset=utf-8", true);
    echo json_encode($result);
}
