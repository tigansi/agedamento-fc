<?php

require "../model/ModelHorario.php";
$model_horario = new ModelHorario();

$id_hor = filter_input(INPUT_POST, "id_hor");
$id_med = filter_input(INPUT_POST, "id_med");

echo $model_horario->AgendaHorario($id_hor, $id_med);

//echo date("Y-m-d h:m");
