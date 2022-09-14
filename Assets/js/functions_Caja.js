let btnNuevaCaja = document.getElementById("btn-NuevaCaja");
let formNuevaCaja = document.querySelector("#formNuevaCaja");


document.addEventListener("DOMContentLoaded", function () {
	tableCajas = $("#tableCajas").dataTable({
		"aProcessing": true,
		"aServerSide": true,
		"language": {
			"url": " " + base_url + "/Assets/plugins/Spanish.json",
		},
		"ajax": {
			"url": " " + base_url + "/cajaModel/getListaCaja",
			"dataSrc": "",
		},
		"columns": [
			{ "data": "numeracion" },
			{ "data": "nombre" },
			{ "data": "id_planteles" },
			{ "data": "id_usuario_atiende" },
			{ "data": "estatus" },
			{ "data": "ultima_fecha_activo" },
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
	let nombre = document.getElementById("txtNombre").value;
	let usuarioAtiende = document.getElementById("Atiende").value;
	let plantel = document.getElementById("dateFechaCreacion").value;
	if (nombre == "" || usuarioAtiende == "" ||  plantel == ""){
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
					position: "top-end",
					icon: "success",
					title: "Se guardo correctamente",
					text: objData.msg,
					showConfirmButton: false,
					timer: 1500,
				});
			} else {
				Swal.fire({
					icon: "Error",
					title: "Error!",
					text: objData.msg,
				});
			}
			formNuevaCaja.reset();
			tableCajas.api().ajax.reload();
	
			$(".close").click();
	
			return false; 
		}
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

				//FUNCION PARA ACTUALIZAR REGISTRO
				
function fnActualizar(value)
				
		}
	});
}
