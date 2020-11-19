<?php include "../config.php"?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cadastro de médico</title>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
      integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2"
      crossorigin="anonymous"
    />

    <link
      rel="stylesheet"
      href="<?php echo Url::Base_url(); ?>src/model/css/style-cad-medico.css"
    />
  </head>
  <body>
    <!-- Inclusão do cabeçalho -->
    <?php include "cabecalho.php"?>

    <div class="container">
      <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
          <div id="card">
            <center>
              <h3 style="font-weight: bold; color: #004768" class="card-title">
                Cadastro de médico
              </h3>
            </center>

            <form action="" method="post" id="f-cad-med" autocomplete="off">
              <div class="form-group">
                <label for="">Nome</label>
                <input
                  placeholder="Insira o nome do profissional"
                  class="form-control"
                  type="text"
                  id="nome"
                  required
                />
                <p id="info_nome" class="text-danger"></p>
              </div>
              <div class="form-group">
                <label for="">E-mail</label>
                <input
                  placeholder="exemplo@dominio.com.br"
                  class="form-control"
                  type="email"
                  id="email"
                  required
                />
                <p id="info_email" class="text-danger"></p>
              </div>
              <div class="form-group">
                <label for="">Senha</label>
                <input
                  placeholder="Escolha sua senha forte e segura"
                  class="form-control"
                  type="password"
                  id="senha"
                  required
                />
                <p id="info_senha" class="text-danger"></p>
              </div>
              <br />
              <br />
              <center>
                <button type="submit" id="btn_form" class="btn btn-lg">
                  Realizar cadastro</button
                ><br />
                <a style="text-decoration: underline" href=""
                  >Voltar para a página inicial</a
                >
              </center>
            </form>
          </div>
        </div>

        <div class="col-md-3"></div>
      </div>
    </div>

    <!-- Jquery -->
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>

    <!-- Jquery mask -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
      integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
      crossorigin="anonymous"
    ></script>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
      integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s"
      crossorigin="anonymous"
    ></script>

    <!-- Script cad-medico.js -->
    <script src="<?php echo Url::Base_url() ?>src/model/js/cad-medico.js"></script>
  </body>
</html>
