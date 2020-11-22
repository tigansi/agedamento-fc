<?php

require "../TO/TOHorario.php";
require "../model/ModelHorario.php";

$to_horario = new ToHorario();
$model_horario = new ModelHorario();

$dados = json_decode($_POST["dados"]);

if ($to_horario->setData_horario($dados->data_hora)) {
    if ($to_horario->setId_medico($dados->id)) {
        echo $model_horario->CadastraHorario($to_horario);
    } else {
        $result = array(
            "sucesso" => false,
            "msg" => "Contate o suporte"
        );

        //id

        header("Content-Type: application/json; charset=utf-8", true);
        echo json_encode($result);
    }
} else {
    $result = array(
        "sucesso" => false,
        "msg" => "A data seleciona é inválida"
    );

    //data menor que dia atual

    header("Content-Type: application/json; charset=utf-8", true);
    echo json_encode($result);
}
