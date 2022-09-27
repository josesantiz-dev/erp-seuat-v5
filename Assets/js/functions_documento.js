let btnNuevoDocumento = document.getElementById("btnNuevoDocumento");
let formEditDocumento = document.getElementById("formNuevoDocumentoEdit");
let formNuevoDocumento = document.querySelector("#formNuevoDocumento");

document.addEventListener("DOMContentLoaded", function () {
	tableDocumentos = $("#tabledocumentos").dataTable({
    aProcessing: true,
    aServerSide: true,
    language: {
      url: " " + base_url + "/Assets/plugins/Spanish.json",
    },
    ajax: {
      url: " " + base_url + "/Documento/getListaDocumentos",
      dataSrc: "",
    },
    columns: [
      { data: "numeracion" },
      { data: "nombre_documentos" },
      { data: "id_nivel_educativo" },
      { data: "estatus" },
      { data: "acciones" },
    ],
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
  
  $("#tabledocumentos").DataTable();
});