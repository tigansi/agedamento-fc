$(document).ready(function () {
  //"idQueTereiEmTodos"
  $(document).on("click", "#btn_edit_cad", function () {
    var id = $(this).attr("data-id-med");

    alert(id);
  });

  $(document).on("click", "#btn_config_hor", function () {
    var id = $(this).attr("data-id-med");

    var id = $(this).attr("data-id-med");
    var nm = $(this).attr("data-nm-med");
    $(location).attr(
      "href",
      "config-horario.php?id=" + id + "&nm_medico=" + nm
    );
  });

  /*
  $("#btn_config_hor").click(function () {
    var id = $("#btn_config_hor").attr("data-id-med");
    var nm = $("#btn_config_hor").attr("data-nm-med");
    $(location).attr(
      "href",
      "config-horario.php?id=" + id + "&nm_medico=" + nm
    );
  });*/
});
