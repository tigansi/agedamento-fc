<?php include "../config.php" ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" />

    <link rel="stylesheet" href="<?php echo Url::Base_url(); ?>src/model/css/style-cab.css" />
    <link rel="stylesheet" href="<?php echo Url::Base_url(); ?>src/model/css/style-list-medico.css" />
</head>

<body>
    <!-- Inclusão do cabeçalho -->
    <?php include "cabecalho.php" ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">

                <?php
                include("../model/config-banco-dados.php");
                $mysql = new MySQL();
                $mysql->Conexao();

                $sql = "SELECT 
                            med.id as id_med,
                            med.nome,
                            hor.data_horario,
                            hor.horario_agendado 
                        FROM medico as med
                        LEFT JOIN horario as hor
                        on 
                            med.id = hor.id_medico AND
                            (hor.horario_agendado = 0 AND
                            hor.data_horario >= CURRENT_TIMESTAMP()) 
                        GROUP BY med.nome
            
                        ORDER BY hor.data_horario ASC";

                $cmd = $mysql->conn->prepare($sql);
                if ($cmd->execute()) :
                    if ($cmd->rowCount() > 0) :
                        while ($dados = $cmd->fetch(PDO::FETCH_ASSOC)) : ?>

                            <div id="card">
                                <div class="container">
                                    <div class="row" style="margin-bottom: 20px;">
                                        <div class="col-md-7">
                                            <h3 id="nm_med"><?php echo $dados["nome"];  ?></h3>
                                        </div>
                                        <div class="col-md-5">
                                            <button data-nm-med="<?php echo  $dados["nome"]; ?>" data-id-med="<?php echo $dados["id_med"]; ?>" id="btn_edit_cad" class="btn btn-sm btn-outline-primary btn_edit_cad">Editar cadastro</button>
                                            <button data-nm-med="<?php echo $dados["nome"]; ?>" data-id-med="<?php echo $dados["id_med"]; ?>" id="btn_config_hor" class="btn btn-sm btn-outline-primary">Configurar horário</button>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <?php
                                        $sqlh = "SELECT
                                                    hor.id as id_horario,
                                                    DATE_FORMAT(hor.data_horario, '%d/%m/%Y às %H:%i') as data_horario,
                                                    hor.horario_agendado
                                                FROM 
                                                    horario as hor
                                                WHERE 
                                                    hor.id_medico = ? 
                                                ORDER BY hor.data_horario ASC";

                                        $cmdh = $mysql->conn->prepare($sqlh);
                                        $cmdh->bindValue(1, $dados["id_med"], PDO::PARAM_INT);
                                        if ($cmdh->execute()) :
                                            if ($cmdh->rowCount() > 0) :
                                                while ($dadosh = $cmdh->fetch(PDO::FETCH_ASSOC)) : ?>

                                                    <div class="col-md-3">
                                                        <?php if ($dadosh["horario_agendado"] == '1') : ?>
                                                            <button id="btn_agendado" class="btn btn-sm btn-block"><?php echo $dadosh["data_horario"]; ?></button>
                                                        <?php else : ?>
                                                            <button id="btn_hor_med" data-id-hor="<?php echo $dadosh["id_horario"]; ?>" data-id-med="<?php echo $dados["id_med"]; ?>" class="btn btn-sm btn-block"><?php echo $dadosh["data_horario"]; ?></button>
                                                        <?php endif; ?>
                                                    </div>

                                                <?php endwhile ?>
                                            <?php else : ?>

                                                <div class="col-md-12">
                                                    <center>
                                                        <h5 style="color:#0094cf;">Não há horários cadastrados</h5>
                                                    </center>
                                                </div>

                                            <?php endif; ?>
                                        <?php endif; ?>

                                    </div>
                                </div>
                            </div>
                            <br>
                        <?php endwhile; ?>
                    <?php else : ?>
                        <center>
                            <h3 style="color:#0094cf;">Não há médicos nem horários cadastrados</h3>
                        </center>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>

    <!-- Jquery -->
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

    <!-- Script list-medico -->
    <script src="<?php echo Url::Base_url(); ?>src/model/js/list-medico.js"></script>
</body>

</html>