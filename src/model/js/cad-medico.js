$(document).ready(function () {
  $("#info_nome").hide();
  $("#info_email").hide();
  $("#info_senha").hide();

  $("#nome").val("Tiago Igansi");
  $("#email").val("tiago@igansi.com");
  $("#senha").val("Saud@2020");

  $("#f-cad-med").submit(function () {
    var nome = $("#nome").val();
    var email = $("#email").val();
    var senha = $("#senha").val();

    if (nome.length < 6) {
      $("#info_nome").show();
      $("#info_nome").text("O Campo nome deve ter mais de 6 dígitos");
    } else {
      if (email.length < 6) {
        $("#info_email").show();
        $("#info_email").text("O Campo nome deve ter mais de 6 dígitos");
      } else {
        if (senha.length < 6) {
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
              "http://localhost/agendamento-fc/src/controller/cadastroMedico.php",
            beforeSend: function () {},
            success: function (data) {},
          });
        }
      }
    }

    return false;
  });
});
