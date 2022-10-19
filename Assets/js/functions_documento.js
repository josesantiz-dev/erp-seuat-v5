let btnNuevoDocumento = document.getElementById("btnNuevoDocumento");
let formEditDocumento = document.getElementById("formNuevoDocumentoEdit");
let formNuevoDocumento = document.querySelector("#formNuevoDocumento");

/* //Funciones para agregar un boton extra con un card en el formulario
let txtNombreDocumento = document.querySelector("#nombre-Documento");
let txtTipoDocumento = document.querySelector("#tipo-Documento");
let txtCantidadDocumento = document.querySelector("#cantidad-Documentos");
let txtDocumentoOriginal = document.querySelector("#documentos-Originales");
let btnAgregarDocumentos = document.querySelector("#btn-agregar-documentos");
let divDocumentosCargados = document.querySelector("#documentos-cargados");
let alertTemplate = document.getElementById("alert-template");
let arrCardsDocumentos = [];
btnAgregarDocumentos.disabled = "true";
alertTemplate.style.display = "none"; 
 document.addEventListener('DOMContentLoaded',function(){
    mostrarTemplates();
})  */
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

/* function mostrarTemplates()
{
    //Obtener templates
    const listaTemplates = localStorage.getItem('templates');
    const objListaTemplates = (listaTemplates == '')?[]:JSON.parse(listaTemplates);
    //Mostrar templates
    let cards = "";
    objListaTemplates.forEach(element => {
        let card =  `<div class="card col-6"><div class="card-body"><h5 class="card-title">${element.nombreDocumento}</h5><p class="card-text">${element.tipoDocumento}</p><p class="card-text">${element.cantidadDocumentos}</p><p class="card-text">${element.documentosOriginales}</p></div><div class="card-footer"><a class="btn btn-primary" onclick="fnVerTemplate()">Ver</a><a class="btn btn-danger" onclick="fnEliminarTemplate(${element.item})">Eliminar</a></div></div>`;
        cards += card;
    });
    document.querySelector("#divCardsTemplates").innerHTML = cards;
}

//Eliminar Template
function fnEliminarTemplate(key)
{
    const templates = JSON.parse(localStorage.getItem('templates'));
    const nuevoTemplates = templates.filter((item) => item.item != key);
    localStorage.setItem('templates',JSON.stringify(nuevoTemplates));
    mostrarTemplates();
}
//Comprobar si titulo y descripcion estan llenos para activar boton agregar documentos
function fnVerificarActivarBtnAgregarDoc()
{
    if(txtNombreDocumento.value == '' || txtTipoDocumento.value == '' || txtDocumentoOriginal.value == ''|| txtCantidadDocumento.value == ''){
        btnAgregarDocumentos.disabled = true;
    }else{
        btnAgregarDocumentos.disabled = false;
    }
}
//Agregar documentos
function fnAgregarDocumentos()
{
    
    let numeracion = arrCardsDocumentos.length + 1;
    let cardDocumento = `<div class="card carddoc${numeracion}" id="documentos-Originales${numeracion}"><div class="row"><div class="row col-10"><input type="text" class="form-control form-control-sm mb-2" id="nombre-Documento${numeracion}" placeholder="Ej: Nombre"><div class="row col-12"><div class="col-6"><select class="form-select form-select-sm" id="tipo-Documento${numeracion}"><option value="vertical">Vertical</option><option value="horizontal">Horizontal</option></select></div><div class="col-6"><select class="form-select form-select-sm" id="cantidad-Documentos${numeracion}"><option value="100x100">100x100</option><option value="200x200">200x200</option></select></div></div></div><div class="col-2"><button type="button" class="btn btn-danger btn-sm" onclick="fnEliminarDocumento(${numeracion})">Eliminar</button></div></div></div>`;
    let documento = {
        item:numeracion,
        html:cardDocumento
    }
    arrCardsDocumentos.push(documento);
    mostrarDocumentos();
    fnVerificarActivarBtnAgregarDoc();
}
//Mostrar documentos
function mostrarDocumentos()
{
    let elements = "";
    arrCardsDocumentos.forEach(element => {
        elements += element.html;
    });
    divDocumentosCargados.innerHTML = elements;
}
//Eliminar documento
function fnEliminarDocumento(value)
{
    const nuevoArrDocumentos = arrCardsDocumentos.filter((item) => item.item != value);
    arrCardsDocumentos = nuevoArrDocumentos;
    mostrarDocumentos();
}
//Agregar nuevo Template
function fnNuevoTemplate()
{
    let temp = localStorage.getItem('templates');
    let templates = (temp == '')?[]:JSON.parse(temp);
    let nombreDocumento = txtNombreDocumento.value;
    let tipoDocumento = txtTipoDocumento.value;
    let cantidadDocumentos = txtCantidadDocumento.value;
    let documentosOriginales = txtDocumentoOriginal.value;
    let arrDocs = divDocumentosCargados.getElementsByTagName('input');
    let isVacio = false;
    for(i = 0; i<arrDocs.length; i++){
        if(arrDocs[i].value == ''){
            isVacio = true;
        }
    }
    if(nombreDocumento == '' || tipoDocumento == '' || cantidadDocumentos == '' || documentosOriginales == '' || arrCardsDocumentos.length == 0 || isVacio == true){
        alertTemplate.style.display = "flex";
        return false;
    }else{
        alertTemplate.style.display = "none";
        let numeracion = templates.length + 1;
        let arrDatosDocumentos = [];
        for(i = 0; i<arrCardsDocumentos.length; i++){
            let item = arrCardsDocumentos[i];
            let div = document.createElement('div');
            div.innerHTML += item.html; 
            let nombreDocumento = document.getElementById(`nombre-Documento${i+1}`).value;
            let tipoDocumento = document.getElementById(`tipo-Documento${i+1}`).value;
            let cantidadDocumentos = document.getElementById(`cantidad-Documentos${i+1}`).value;
            let documentosOriginales = document.getElementById(`documentos-Orinales${i+1}`).value;
            let datos = {nombreDocumento:nombreDocumento, tipoDocumento:tipoDocumento, cantidadDocumentos:cantidadDocumentos, documentosOriginales:documentosOriginales};
            arrDatosDocumentos.push(datos);
        }
        let nuevoTemplate = {
            item:numeracion,
            nombre: titulo,
            descripcion:descripcion,
            documentos:arrDatosDocumentos
        }
        templates.push(nuevoTemplate);
        localStorage.setItem('templates',JSON.stringify(templates));
        txtNombreDocumento.value = "";
        txtTipoDocumento.value = "";
        txtCantidadDocumento.value = "";
        txtDocumentoOriginal.value = "";
        arrCardsDocumentos = [];
        mostrarTemplates();
        mostrarDocumentos();
    }
} */


