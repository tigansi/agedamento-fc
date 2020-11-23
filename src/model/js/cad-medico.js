$(document).ready(function () {
  $("#info_nome").hide();
  $("#info_email").hide();
  $("#info_senha").hide();

  $("#info_problema").hide();
  $("#info_acerto").hide();

  $("#f-cad-med").submit(function () {
    var nome = $("#nome").val();
    var email = $("#email").val();
    var senha = $("#senha").val();
    var host = window.location.hostname;

    if (nome == "" || nome.length < 6) {
      $("#info_nome").show();
      $("#info_nome").text("O Campo nome deve ter mais de 6 dígitos");
    } else {
      if (email == "" || email.length < 6) {
        $("#info_email").show();
        $("#info_email").text("O Campo nome deve ter mais de 6 dígitos");
      } else {
        if (senha == "" || senha.length < 6) {
          $("#info_senha").show();
          $("#info_senha").text("O Campo nome deve ter mais de 6 dígitos");
        } else {
          let dados = {
            nome: nome,
            email: email,
            senha: senha,
          };

          $.ajax({
            type: "POST",
            data: {
              dados: JSON.stringify(dados),
            },
            url:
              "http://" +
              host +
              "/agendamento-fc/src/controller/cadastroMedico.php",
            success: function (data) {
              console.log(data);
              if (data["sucesso"] == true) {
                $("#info_problema").hide();
                $("#info_acerto").text(data["msg"]);
                $("#info_acerto").show();

                setTimeout(function () {
                  location.reload();
                }, 3000);
              } else {
                $("#info_acerto").hide();
                $("#info_problema").text(data["msg"]);
                $("#info_problema").show();
              }
            },
          });
        }
      }
    }

    return false;
  });
});
