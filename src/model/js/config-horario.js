$(document).ready(function () {
  $("#form_cad_hor").submit(function () {
    var id = $("#id_med").val();
    var data_hora = $("#dt_hora").val();

    if (data_hora == "") {
    } else {
      let dados = {
        id: id,
        data_hora: data_hora,
      };

      $.ajax({
        type: "POST",
        data: {
          dados: JSON.stringify(dados),
        },
        url:
          "http://localhost/agendamento-fc/src/controller/cadastroHorario.php",
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

    return false;
  });
});

$(document).ready(function () {
  $(document).on("click", "#remove_hor", function () {
    var id = $(this).attr("data-id-hor");

    alert(id);
  });
});
