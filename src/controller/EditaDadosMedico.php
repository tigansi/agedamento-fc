<?php

require "../TO/ToMedico.php";
require "../model/ModelMedico.php";

$to_medico = new ToMedico();
$model_medico = new ModelMedico();

$dados = json_decode($_POST["dados"]);

if ($to_medico->setId($dados->id_medico)) {
    if ($to_medico->setSenha($dados->senha_atiga)) {
        if ($to_medico->setSenha_nova($dados->senha_nova)) {

            $to_medico->setData_alteracao(date("Y-m-d h:m"));
            echo $model_medico->EditaDadosMedico($to_medico);
        } else {
            $result = array(
                "sucesso" => false,
                "msg" => "Verifique o campo da nova senha"
            );
            //informa erro com a senha nova

            header("Content-Type: application/json; charset=utf-8", true);
            echo json_encode($result);
        }
    } else {
        $result = array(
            "sucesso" => false,
            "msg" => "Verifique o campo da antiga senha"
        );

        //informa erro com senha antiga

        header("Content-Type: application/json; charset=utf-8", true);
        echo json_encode($result);
    }
} else {
    $result = array(
        "sucesso" => false,
        "msg" => "Ocorreu um problema, contate o suporte"
    );

    //Informa erro com o id

    header("Content-Type: application/json; charset=utf-8", true);
    echo json_encode($result);
}
