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
      { data: "tipo_documento" },
      { data: "id_documentos" },
      { data: "original" },
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

//Formulario para nuevo documento
formNuevoDocumento.onsubmit = function (e) {
  e.preventDefault()
  let nombreDocumento = document.getElementById("nombre-Documento").value;
  let nombreTipoDocumento = document.getElementById("tipo-Documento").value;
  let cantidadDocumentos = document.getElementById("cantidad-Documentos").value;
  let documentosOriginales = document.getElementById("documentos-Originales").value;
  if (nombreDocumento == "" || nombreTipoDocumento == "" || cantidadDocumentos == "" || documentosOriginales == "") {
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
  let ajaxUrl = base_url + "/Documento/setNuevoDocumento";
  let formData = new FormData(formNuevoDocumento);
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
      formNuevoDocumento.reset();
      tableDocumentos.api().ajax.reload();
      $(".close").click(); 
    }
    return false;
  };
};

//Funcion para eliminar registro
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
                    let url = base_url + " /Documento/setEstatusDocumento/ " + value;
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
                          tableDocumentos.api().ajax.reload();
                          
                        }).catch (err => {throw err});
                      }
                    })
                  }
                  
                  //Funcion para mostrar datos guardados 
                  function fnActualizar(id) {
  let url = base_url + "/Documento/getDocumento/" + id;
  
  fetch(url)
  .then((res) => res.json())
  .then((response) => {
      document.getElementById("nombre-Documento-Edit").value = response.tipo_documento;
      document.getElementById("tipo-Documento-Edit").value = response.id_documentos;
      document.getElementById("cantidad-Documentos-Edit").value = response.cantidad_copias;
      document.getElementById("documento-Original-Edit2").checked = response.original;
      document.getElementById("documento-Original-Edit").value = response.original;
      document.getElementById("txtIdUsuario").value = response.id;  
      
    });
  } 
  
  //Formulario para editar registros
  formEditDocumento.onsubmit = function (e) {
    e.preventDefault();
    let nombreDocumentoEdit = document.getElementById("nombre-Documento-Edit").value;
    let nombreTipoDocumentoEdit = document.getElementById("tipo-Documento-Edit").value;
    let cantidadDocumentosEdit = document.getElementById("cantidad-Documentos-Edit").value;
    let documentosOriginalesEdit = document.getElementById("documento-Original-Edit").value; 

  if (nombreDocumentoEdit == "" || nombreTipoDocumentoEdit == "" || cantidadDocumentosEdit == "" ) {
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
  let ajaxUrl = base_url + "/Documento/setEditDocumento";
  let formData = new FormData(formEditDocumento);
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
      formEditDocumento.reset();
      tableDocumentos.api().ajax.reload();
      $(".close").click();
    }
    return false;
  }; 
}; 

//Funcion para abrir modal
function openModal() {}