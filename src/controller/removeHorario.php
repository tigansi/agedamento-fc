<?php

require "../model/ModelHorario.php";
$model_horario = new ModelHorario();

$id_horario = filter_input(INPUT_POST, "id");

echo $model_horario->RemoveHorario($id_horario);
