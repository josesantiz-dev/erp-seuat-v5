let btnNuevaAsistencia = document.getElementById("btnNuevaAsistencia");
let formEditAsistencia = document.getElementById("formNuevaAsistenciaEdit");
let formNuevaAsistencia = document.querySelector("#formNuevaAsistencia");

document.addEventListener("DOMContentLoaded", function () {
	tableDocumentos = $("#tableasistencias").dataTable({
    aProcessing: true,
    aServerSide: true,
    language: {
      url: " " + base_url + "/Assets/plugins/Spanish.json",
    },
    ajax: {
      url: " " + base_url + "/Asistencia/getListaAsistencias",
      dataSrc: "",
    },
    /* columns: [
      { data: "numeracion" },
      { data: "Grado y grupo" },
      { data: "Materia" },
      { data: "Hora" },
      { data: "FEcha de asistencia" },
      { data: "estatus" },
      { data: "acciones" },
    ], */
    responsive: true,
    paging: true,
    lengthChange: true,
    searching: true,
    ordering: true,
    info: true,
    autoWidth: false,
    scrollY: "44vh",
    scrollCollapse: true,
    bDestroy: true,
    order: [[0, "asc"]],
    iDisplayLength: 25,
  });
  
  $("#tableasistencias").DataTable();
  
});