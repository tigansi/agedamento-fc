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

                $sql = "SELECT * FROM medico";
                $cmd = $mysql->conn->prepare($sql);

                if ($cmd->execute()) :
                    while ($dados = $cmd->fetch(PDO::FETCH_ASSOC)) :
                        //id do médico
                        $id = $dados["id"];
                        //nome do médico
                        $nm = $dados["nome"];

                ?>
                        <div id="card">
                            <div class="container">
                                <div class="row" style="margin-bottom: 20px;">
                                    <div class="col-md-7">
                                        <h3 id="nm_med"><?php echo $nm;  ?></h3>
                                    </div>
                                    <div class="col-md-5">
                                        <button data-id-med="<?php echo $id; ?>" id="btn_edit_cad" class="btn btn-sm btn-outline-primary btn_edit_cad">Editar cadastro</button>
                                        <button data-nm-med="<?php echo $nm; ?>" data-id-med="<?php echo $id; ?>" id="btn_config_hor" class="btn btn-sm btn-outline-primary">Configurar horário</button>
                                    </div>
                                </div>
                                <div class="row">
                                    <?php
                                    $sql_h = "SELECT
                                                    id,
                                                    DATE_FORMAT(data_horario,'%d/%m/%Y às %H:%i') as data_horario
                                                FROM horario
                                                WHERE id_medico = ? AND
                                                      horario_agendado = 0";

                                    $cmd_h = $mysql->conn->prepare($sql_h);
                                    $cmd_h->bindValue(1, $id, PDO::PARAM_INT);

                                    if ($cmd_h->execute()) :
                                        while ($dados_h = $cmd_h->fetch(PDO::FETCH_ASSOC)) :
                                    ?>
                                            <div class="col-md-3 col-sm-12">
                                                <button id="btn_hor_med" data-id-hor="<?php echo $dados_h["id"]; ?>" data-id-med="<?php echo $dados["id"]; ?>" class="btn btn-sm btn-block"><?php echo $dados_h["data_horario"]; ?></button>
                                            </div>
                                    <?php endwhile;
                                    endif; ?>
                                </div>
                            </div>
                        </div>
                        <br>
                <?php endwhile;
                endif; ?>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>



    <!-- Jquery -->
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>

    <!-- Jquery mask -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

    <script src="<?php echo Url::Base_url(); ?>src/model/js/list-medico.js"></script>
</body>

</html>