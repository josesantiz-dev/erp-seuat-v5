let btnNuevaConvocatoria = document.getElementById("btnNuevaConvocatoria");
let formEditConvocatoria = document.getElementById("formNuevaConvocatoriaEdit");
let formNuevaConvocatoria = document.querySelector("#formNuevaConvocatoria");

document.addEventListener("DOMContentLoaded", function () {
	tableDocumentos = $("#tableconvocatorias").dataTable({
    aProcessing: true,
    aServerSide: true,
    language: {
      url: " " + base_url + "/Assets/plugins/Spanish.json",
    },
    ajax: {
      url: " " + base_url + "/Convocatoria/getListaConvocatorias",
      dataSrc: "",
    },
    columns: [
      { data: "numeracion" },
      { data: "nombre_convocatoria" },
      { data: "fecha_inicio" },
      { data: "fecha_fin" },
      { data: "id_plan_estudios" },
      { data: "id_materias" },
      { data: "id_periodos" },
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
  
  $("#tableconvocatorias").DataTable();
  
});

function obtenerMaterias()
{
  let materias = document.querySelector('#materias');
  let nvl = document.querySelector('#nivelEstudios').value;
  let carrera = document.querySelector('#planEstudios').value;
  let url = `${base_url}/Convocatoria/getMaterias?idPlan=1&idNvl=4`;
  fetch(url)
    .then(response => response)
    .then(data => {
      console.log(data);
    })
}
