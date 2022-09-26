let btnNuevoGrupo = document.getElementById("btnNuevoGrupo");
let formEditGrupo = document.getElementById("formNuevoGrupoEdit");
let formNuevoGrupo = document.querySelector("#formNuevoGrupo");

document.addEventListener("DOMContentLoaded", function () {
	tableGrupos = $("#tablegrupos").dataTable({
    aProcessing: true,
    aServerSide: true,
    language: {
      url: " " + base_url + "/Assets/plugins/Spanish.json",
    },
    ajax: {
      url: " " + base_url + "/Grupo/getListaGrupos",
      dataSrc: "",
    },
    columns: [
      { data: "numeracion" },
      { data: "nombre_grupo" },
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
  
  $("#tablegrupos").DataTable();
});

//Formulario para nuevo grupo
formNuevoGrupo.onsubmit = function (e) {
  e.preventDefault()
  let nombreGrupo = document.getElementById("txtgrupo").value;
  if (nombreGrupo == "") {
    Swal.fire({
      icon: "error",
      title: "Campo vacio",
      text: "Favor de revisar!",
    });
    return false;
  }
  let request = window.XMLHttpRequest
  ? new XMLHttpRequest()
  : new ActiveXObject("Microsoft.XMLHTTP");
  let ajaxUrl = base_url + "/Grupo/setNuevoGrupo";
  let formData = new FormData(formNuevoGrupo);
  request.open("POST", ajaxUrl, true);
  request.send(formData);
  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      let objData = JSON.parse(request.responseText);
      if (objData.estatus == true) {
        Swal.fire({
          icon: "success",
          title: "Exito...!",
          text: objData.msg,
        });
      } else {
        Swal.fire({
          icon: "error",
          title: "Error...!",
          text: objData.msg,
        });
      }  
      formNuevoGrupo.reset();
      tableGrupos.api().ajax.reload();
      $(".close").click(); 
    }
    return false;
  };
};

//FUNCION ELIMINAR REGISTRO
function fnEliminar(value)
{
  Swal.fire({
    title: '¿Desea eliminar?',
    text: "Esta accion no se podra desacer!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Si, estoy seguro!'
  }).then((result) => {
    if (result.isConfirmed) {
                    let url = base_url + " /Grupo/setEstatusGrupo/ " + value;
                    fetch (url). then(res => res.json()).then (response => {
                      if(response.estatus)
                      {
                        Swal.fire(
                          'Eliminado!',
                          response.msg,
                          'success'
                          )
                          
                        }else{
                          Swal.fire(
                            'Error!',
                            response.msg,
                            'Error!'
                            )
                            
                            
                          }
                          tableGrupos.api().ajax.reload();
                          
                        }).catch (err => {throw err});
                      }
                    })
                  }
                  
                  //Funcion para mostrar datos guardados 
                  function fnActualizar(id) {
  let url = base_url + "/Grupo/getGrupo/" + id;
  
  fetch(url)
  .then((res) => res.json())
  .then((response) => {
      document.getElementById("txtGrupoEdit").value = response.nombre_grupo;
      document.getElementById("txtIdUsuario").value = response.id;  
    });
  } 
  
  //Formulario para editar registros
  formEditGrupo.onsubmit = function (e) {
    e.preventDefault();
    let NombreGrupoEdit = document.getElementById("txtGrupoEdit").value;
  if (NombreGrupoEdit == "") {
    Swal.fire({
      icon: "error",
      title: "Campo vacio",
      text: "FAVOR DE REVISAR!",
    });
    return false;
  }
  let request = window.XMLHttpRequest
    ? new XMLHttpRequest()
    : new ActiveXObject("Microsoft.XMLHTTP");
  let ajaxUrl = base_url + "/Grupo/setEditGrupo";
  let formData = new FormData(formEditGrupo);
  request.open("POST", ajaxUrl, true);
  request.send(formData);
  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      let objData = JSON.parse(request.responseText);
      if (objData.estatus == true) {
        Swal.fire({
          icon: "success",
          title: "Exito...!",
          text: objData.msg,
        });
      } else {
        Swal.fire({
          icon: "error",
          title: "Error...!",
          text: objData.msg,
        });
      }
      formEditGrupo.reset();
      tableGrupos.api().ajax.reload();
      $(".close").click();
    }
    return false;
  };
}; 

//Funcion para abrir modal
function openModal() {}