$(document).ready(function () {
  //"idQueTereiEmTodos"
  $(document).on("click", "#btn_edit_cad", function () {
    var id = $(this).attr("data-id-med");

    alert(id);
  });

  $(document).on("click", "#btn_config_hor", function () {
    var id = $(this).attr("data-id-med");
    var nm = $(this).attr("data-nm-med");

    $(location).attr(
      "href",
      "config-horario.php?id=" + id + "&nm_medico=" + nm
    );
  });

  $(document).on("click", "#btn_hor_med", function () {
    var id_hor = $(this).attr("data-id-hor");
    var id_med = $(this).attr("data-id-med");

    $.ajax({
      type: "POST",
      data: {
        id_hor: id_hor,
        id_med: id_med,
      },
      url: "http://localhost/agendamento-fc/src/controller/agendaHorario.php",
      success: function (data) {
        if (data["sucesso"]) {
          window.location.reload();
        }
      },
    });

    /*$(location).attr(
      "href",
      "config-horario.php?id=" + id + "&nm_medico=" + nm
    );*/
  });
});
