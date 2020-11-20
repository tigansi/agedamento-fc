<?php
require "../TO/ToMedico.php";
require "../model/ModelMedico.php";

$to_medico = new ToMedico();
$model_medico = new ModelMedico();

$dados = json_decode($_POST["dados"]);

if ($to_medico->setNome($dados->nome)) {
    if ($to_medico->setSenha($dados->senha)) {
        if ($to_medico->setEmail($dados->email)) {
            $to_medico->setData_criacao(date("Y-m-d H:i:s"));
            header('Content-Type: text/plain');
            echo $model_medico->CadastrarMedico($to_medico);
        }
    }
}
