<?php

require "../TO/TOHorario.php";
require "../model/ModelHorario.php";

$to_horario = new ToHorario();
$model_horario = new ModelHorario();

$dados = json_decode($_POST["dados"]);
if ($to_horario->setId_medico($dados->id)) {
    if ($to_horario->setData_horario($dados->data_hora)) {
        echo $model_horario->CadastraHorario($to_horario);
    }
}
