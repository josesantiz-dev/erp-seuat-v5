let btnNuevaCaja = document.getElementById("btnNuevaCaja");
let formEditCaja = document.getElementById("formNuevaCajaEdit")
let formNuevaCaja = document.querySelector("#formNuevaCaja");


document.addEventListener("DOMContentLoaded", function () {
    tableCajas = $("#tableCajas").dataTable({
        "aProcessing": true,
        "aServerSide": true,
        "language": {
            "url": " " + base_url + "/Assets/plugins/Spanish.json",
        },
        "ajax": {
            "url": " " + base_url + "/Caja/getListaCajas",
            "dataSrc": "",
        },
        "columns": [
            { "data": "numeracion" },
            { "data": "nombre" },
            { "data": "id_planteles" },
			{ "data": "sistema_educativo" },
            { "data": "id_usuario_atiende" },
			{ "data": "nombre_persona" },
            { "data": "estatus" },
            { "data": "acciones" },
        ],
        "responsive": true,
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "scrollY": '44vh',
        "scrollCollapse": true,
        "bDestroy": true,
        "order": [[ 0, "asc" ]],
        "iDisplayLength": 25
    });
    $("#tableCaja").DataTable();
});

//FUNCION PARA GUARDAR UNA NUEVA CAJA
formNuevaCaja.onsubmit = function (e) {
    e.preventDefault();
    let nombrecaja = document.getElementById("txtNombre").value;
    let nombreplantel = document.getElementById("txtPlantel").value;
    let nombresistemaedu = document.getElementById("txtSistemaEdu").value;
	let nombreusuario = document.getElementById("txtUsuarios").value;
    if (nombrecaja == "" || 
	    nombreplantel == "" ||  
		nombresistemaedu == "" || 
		nombreusuario == "" ){
        Swal.fire({ icon: "error", title: "Error", text: "Completa los campos obligatorios... !", });
        return false; 
    }
    let request = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP");
    let ajaxUrl = base_url + "/Caja/setNuevaCaja";
    let formData = new FormData(formNuevaCaja);
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
			  formNuevaCaja.reset();
			  tableCajas.api().ajax.reload();
			  $(".close").click(); 
			}
			return false;
		};
	  };
	  

//Funcion eliminar Registro

 function fnEliminar(value) {
	Swal.fire({
		title: "Desea eliminar?",
		text: "Confirme si desea hacer esta accion!",
		icon: "warning",
		showCancelButton: true,
		confirmButtonColor: "#3085d6",
		cancelButtonColor: "#d33",
		confirmButtonText: "SI",
	}).then((result) => {
		if (result.isConfirmed) {
			let url = base_url + "/Caja/setEstatusCaja/" + value;
			fetch(url)
				.then((res) => res.json())
				.then((response) => {
					if (response.estatus) {
						Swal.fire("Eliminado!", response.msg, "success");
					} else {
						Swal.fire("Error!", response.msg, "Error");
					}

					tableCajas.api().ajax.reload();
				})
				.catch((err) => {
					throw err;
				});				
		}
	});
} 

                  //Funcion para mostrar datos guardados 
                  function fnActualizar(id) {
					let url = base_url + "/Caja/getCaja/" + id;	
					fetch(url)
					.then((res) => res.json())
					.then((response) => {
						document.getElementById("txtNombreEdit").value = response.nombre;
						document.getElementById("txtPlantelEdit").value = response.id_planteles;
						document.getElementById("txtSistemaEduEdit").value = response.id_sistemas_educativos;
						document.getElementById("txtUsuariosEdit").value = response.id_usuario_atiende;  
						document.getElementById("txtIdUsuario").value = response.id;
					  });
					} 
					
					//Formulario para editar registros
					formEditCaja.onsubmit = function (e) {
					  e.preventDefault();
					  let nombrecajaEdit = document.getElementById("txtNombreEdit").value;
					  let nombreplantelEdit = document.getElementById("txtPlantelEdit").value;
					  let nombresistemaeduEdit = document.getElementById("txtSistemaEduEdit").value;
					  let nombreusuarioEdit = document.getElementById("txtUsuariosEdit").value;
					if (
					  nombrecajaEdit == "" ||
					  nombreplantelEdit == "" ||
					  nombresistemaeduEdit == "" ||
					  nombreusuarioEdit == "" 
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
					let ajaxUrl = base_url + "/Caja/setEditCaja";
					let formData = new FormData(formEditCaja);
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
						formEditCaja.reset();
						tableCajas.api().ajax.reload();
						$(".close").click();
					  }
					  return false;
					};
				  }; 
				  
