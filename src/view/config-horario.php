<?php include "../config.php" ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configuração do horário</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" />
    <link rel="stylesheet" href="<?php echo Url::Base_url() ?>src/model/css/style-cab.css">
    <link rel="stylesheet" href="<?php echo Url::Base_url(); ?>src/model/css/style-list-medico.css" />

</head>

<body>
    <!-- Inclusão do cabeçalho -->
    <?php include "cabecalho.php" ?>

    <?php
    $id = filter_input(INPUT_GET, "id");
    $nm = filter_input(INPUT_GET, "nm_medico");
    ?>

    <div class="container">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-5" style="margin-bottom: 2%;">
                <div id="card">
                    <center>
                        <h3 id="titulo_config">Adicionar horários</h3>
                    </center>
                    <p style="margin-bottom:5px;">Nome:</p>
                    <h5 style="margin-bottom:20px;" id="nm_medico"><?php echo $nm; ?></h5>
                    <form action="" method="post" id="form_cad_hor">
                        <input id="id_med" type="hidden" value="<?php echo $id; ?>">
                        <div class="form-group">
                            <label>Data e hora</label>
                            <input id="dt_hora" class="form-control" placeholder="dd-mm-yyyy hh:mm" type="datetime-local" id="meeting-time" name="meeting-time">
                        </div>

                        <center>
                            <button id="btn_form" type="submit" class="btn btn-lg">Adicionar horário</button><br>
                            <a style="text-decoration: underline" href="list-medico.php">Voltar para a página inicial</a>
                            <p style="font-weight: bold;" id="info_problema" class="text-danger"></p>
                            <p style="font-weight: bold;" id="info_acerto" class="text-success"></p>
                        </center>

                    </form>
                </div>
            </div>
            <div class="col-md-5">
                <div id="card">
                    <center>
                        <h3 id="titulo_config" style="font-weight: bold;">Horários configurados</h3>
                    </center>
                    <?php
                    include("../model/config-banco-dados.php");
                    $mysql = new MySQL();
                    $mysql->Conexao();

                    $sql = "SELECT
                                id,
                                DATE_FORMAT(data_horario,'%d/%m/%Y %H:%i') as data_horario,
                                horario_agendado
                            FROM horario
                            WHERE id_medico = ?";

                    $cmd = $mysql->conn->prepare($sql);
                    $cmd->bindValue(1, $id);

                    if ($cmd->execute()) :
                        while ($dados = $cmd->fetch(PDO::FETCH_ASSOC)) :
                    ?>
                            <div class="container">
                                <div class="row" style="margin-bottom: -30px;">
                                    <div class="col-md-9">
                                        <p style="font-weight:bold; color: #004768;"><?php echo $dados["data_horario"]; ?></p>

                                    </div>
                                    <div class="col-md-3">
                                        <?php if ($dados["horario_agendado"] == 0) : ?>
                                            <p data-id-hor="<?php echo $dados["id"]; ?>" id="remove_hor" class="text-danger" style="cursor: pointer; text-decoration: underline;">Remover</p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <hr>
                            </div>


                    <?php endwhile;
                    endif; ?>

                </div>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>


    <!-- Jquery -->
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>

    <!-- Jquery mask -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

    <script src="<?php echo Url::Base_url() ?>src/model/js/config-horario.js"></script>
</body>

</html>