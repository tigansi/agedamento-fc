$(document).ready(function () {
  $("#info_nome").hide();
  $("#info_senha_antiga").hide();
  $("#info_senha_nova").hide();

  $("#info_problema").hide();
  $("#info_acerto").hide();

  $("#f-edit-med").submit(function () {
    var id_medico = $("#id_medico").val();
    var senha_atiga = $("#senha_antiga").val();
    var senha_nova = $("#senha_nova").val();
    var host = window.location.hostname;

    if (senha_atiga == "" || senha_atiga.length < 6) {
      $("#info_senha_antiga").show();
      $("#info_senha_antiga").text("O Campo nome deve ter mais de 6 dígitos");
    } else {
      if (senha_nova == "" || senha_nova.length < 6) {
        $("#info_senha_nova").show();
        $("#info_senha_nova").text("O Campo nome deve ter mais de 6 dígitos");
      } else {
        let dados = {
          id_medico: id_medico,
          senha_atiga: senha_atiga,
          senha_nova: senha_nova,
        };

        $.ajax({
          type: "POST",
          data: {
            dados: JSON.stringify(dados),
          },
          url:
            "http://" +
            host +
            "/agendamento-fc/src/controller/editaDadosMedico.php",
          success: function (data) {
            if (data["sucesso"]) {
              $("#info_problema").hide();
              $("#info_acerto").text(data["msg"]);
              $("#info_acerto").show();

              setTimeout(function () {
                $(location).attr("href", "list-medico.php");
              }, 1000);
            } else {
              $("#info_acerto").hide();
              $("#info_problema").text(data["msg"]);
              $("#info_problema").show();
            }
          },
        });
      }
    }

    return false;
  });
});
