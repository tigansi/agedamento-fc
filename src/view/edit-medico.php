<?php include "../config.php" ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar dados</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" />

    <link rel="stylesheet" href="<?php echo Url::Base_url(); ?>src/model/css/style-cab.css" />
    <link rel="stylesheet" href="<?php echo Url::Base_url(); ?>src/model/css/style-cad-medico.css" />
</head>

<body>
    <!-- Inclusão do cabeçalho -->
    <?php include "cabecalho.php" ?>


    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div id="card">
                    <center>
                        <h3 id="titulo_edit_medico" class="card-title">
                            Editar médico
                        </h3>
                    </center>

                    <form action="" method="post" id="f-edit-med" autocomplete="off">
                        <input type="hidden" id="id_medico" value="<?php echo $_GET["id"]; ?>">
                        <div class="form-group">
                            <label for="">Nome</label>
                            <input placeholder="Insira o nome do profissional" value="<?php echo $_GET["nm_medico"]; ?>" class="form-control" type="text" id="nome_med_edit" required />
                            <p id="info_nome" class="text-danger"></p>
                        </div>

                        <div class="form-group">
                            <label for="">Senha antiga</label>
                            <input placeholder="Insira sua antiga senha" class="form-control" type="password" id="senha_antiga" required />
                            <p id="info_senha_antiga" class="text-danger"></p>
                        </div>

                        <div class="form-group">
                            <label for="">Nova senha</label>
                            <input placeholder="Escolha uma senha forte e segura" class="form-control" type="password" id="senha_nova" required />
                            <p id="info_senha_nova" class="text-danger"></p>
                        </div>
                        <br />
                        <center>
                            <button type="submit" id="btn_form" class="btn btn-lg">
                                Atualizar cadastro</button><br />
                            <a style="text-decoration: underline" href="list-medico.php">Voltar para a página inicial</a>
                            <p style="font-weight: bold;" id="info_problema" class="text-danger"></p>
                            <p style="font-weight: bold;" id="info_acerto" class="text-success"></p>
                        </center>
                    </form>
                </div>
            </div>

            <div class="col-md-4"></div>
        </div>
    </div>

    <!-- Jquery -->
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

    <!-- Script edit-medico.js -->
    <script src="<?php echo Url::Base_url(); ?>src/model/js/edit-medico.js"></script>
</body>

</html>