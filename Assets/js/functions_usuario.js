let btnNuevoUsuario = document.getElementById("btnNuevoUsuario");
let formEditUsuario = document.getElementById("formNuevoUsuarioEdit");
let formNuevoUsuario = document.querySelector("#formNuevoUsuario");

document.addEventListener("DOMContentLoaded", function () {
	tableUsuarios = $("#tableusuarios").dataTable({
    aProcessing: true,
    aServerSide: true,
    language: {
		url: " " + base_url + "/Assets/plugins/Spanish.json",
    },
    ajax: {
      url: " " + base_url + "/Usuario/getListaUsuarios",
      dataSrc: "",
    },
    columns: [
		{ data: "numeracion" },
		{ data: "nickname" },
    { data: "nombre_persona" },
		{ data: "estatus" },
		{ data: "sesion" },
      { data: "fecha_conexion" },
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

  $("#tableusuarios").DataTable();
});



formNuevoUsuario.onsubmit = function (e) {
  e.preventDefault();
  let nombreUsuario = document.getElementById("txtNickname").value;
  let nombrePassword = document.getElementById("txtPassword").value;
  let nombreImgen = document.getElementById("profileImageUsuario").src;
  let nombreRol = document.getElementById("txtRol").value;
  let nombrePersona = document.getElementById("txtNombrePersona").value;
  if (nombreUsuario == "" || nombrePassword == "") {
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
  let ajaxUrl = base_url + "/Usuario/setNuevoUsuario";
  let formData = new FormData(formNuevoUsuario);
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
      formNuevoUsuario.reset();
      tableUsuarios.api().ajax.reload();
      $(".close").click(); 
    }
    return false;
  };
};



//FUNCION ELIMINAR REGISTRO
function fnEliminar(value) {
  Swal.fire({
    title: "¿Desea eliminar?",
    text: "Esta accion no se podra desacer!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si, estoy seguro!",
  }).then((result) => {
    if (result.isConfirmed) {
      let url = base_url + " /Usuario/setEstatusUsuario/ " + value;
      fetch(url)
        .then((res) => res.json())
        .then((response) => {
          if (response.estatus) {
            Swal.fire("Eliminado!", response.msg, "success");
          } else {
            Swal.fire("Error!", response.msg, "Error!");
          }
          tableUsuarios.api().ajax.reload();
        })
        .catch((err) => {
          throw err;
        });
    }
  });
}
function fnActualizar(id) {
  let url = base_url + "/Usuario/getUsuario/" + id;

  fetch(url)
    .then((res) => res.json())
    .then((response) => {
      document.getElementById("txtNombreUsuarioEdit").value = response.nickname;
      document.getElementById("txtEstatusEdit").value = response.estatus;
      document.getElementById("txtImgenEdit").value = response.imagen;
      document.getElementById("txtRolEdit").value = response.id_roles;
      document.getElementById("txtNombrePersonaEdit").value =
        response.id_personas;
      document.getElementById("txtIdUsuario").value = response.id;
    });
}

formEditUsuario.onsubmit = function (e) {
  e.preventDefault();
  let NombreUsuarioEdit = document.getElementById("txtNombreUsuarioEdit").value;
  let nombreEstatusEdit = document.getElementById("txtEstatusEdit").value;
  let nombreImgenEdit = document.getElementById("txtImgenEdit").value;
  let nombreRolEdit = document.getElementById("txtRolEdit").value;
  let nombrePersonaEdit = document.getElementById("txtNombrePersonaEdit").value;
  if (
    NombreUsuarioEdit == "" ||
    nombreEstatusEdit == "" ||
    nombreFechaRegistroEdit == "" ||
    nombreImgenEdit == "" ||
    nombreRolEdit == "" ||
    nombrePersonaEdit == ""
  ) {
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
  let ajaxUrl = base_url + "/Usuario/setEditUsuario";
  let formData = new FormData(formEditUsuario);
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
      formEditUsuario.reset();
      tableUsuarios.api().ajax.reload();
      $(".close").click();
    }
    return false;
  };
};

function openModal() {}

function buscarImagenUsuario(e) {
  document.querySelector("#profileImageUsuario").click();
}

function displayImageUsuario(e) {
  if (e.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      document
        .querySelector("#profileDisplayUsuario")
        .setAttribute("src", e.target.result);
      document.getElementById("btnBuscarImagenUsuario").textContent = "Cambiar";
      document
        .querySelector("#btnBuscarImagenUsuario")
        .classList.replace("btn-primary", "btn-warning");
    };
    reader.readAsDataURL(e.files[0]);
  }
}

document.getElementById("togglePass").addEventListener('click',function (e) {
  const type = document.querySelector('#txtPassword').getAttribute('type') === 'password' ? 'text' : 'password';
  document.querySelector('#txtPassword').setAttribute('type',type);
  this.classList.toggle('fa-eye-slash');
});
