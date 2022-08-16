let btnNuevoUsuario = document.getElementById("btnNuevoUsuario")
let formEditUsuario = document.getElementById("formNuevoUsuarioEdit");

document.addEventListener('DOMContentLoaded', function(){

    tableUsuarios = $('#tableusuarios').dataTable( {
		"aProcessing":true,
		"aServerSide":true,
        "language": {
        	"url": " "+base_url+"/Assets/plugins/Spanish.json"
        },
        "ajax":{
            "url": " "+base_url+"/Usuario/getListaUsuarios",
            "dataSrc":""
        },
        "columns":[
            {"data":"numeracion"},
            {"data":"nickname"},
            {"data":"estatus"},
            {"data":"sesion"},
            {"data":"fecha_conexion"},
            {"data":"navegador_so"},
            {"data":"ip"},
            {"data":"acciones"},
            
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

    $('#tableusuarios').DataTable();
})

console.log(btnNuevoUsuario)
let formNuevoUsuario = document.querySelector('#formNuevoUsuario');
formNuevoUsuario.onsubmit = function(e){
    e.preventDefault();
let nombreUsuario = document.getElementById("txtNombreUsuario").value;
let nombrePassword = document.getElementById("txtPassword").value;
let nombreFechaRegistro = document.getElementById("dateFechaRegistro").value;
let nombreImgen = document.getElementById("txtImgen").value;
let nombreRol = document.getElementById("txtRol").value;
let nombrePersona = document.getElementById("txtNombrePersona").value;
console.log(nombreUsuario, nombrePassword, nombreFechaRegistro, nombreImgen, nombreRol, nombrePersona);
if(nombreUsuario ==""|| nombrePassword == "" || nombreFechaRegistro == "" || nombreImgen == "" || nombreRol == "" || nombrePersona == "" ) {
    Swal.fire({
        icon: 'error',
        title: 'Campo vacio',
        text: 'FAVOR DE REVISAR!',
      })
      return false;
}
            let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url+'/Usuario/setNuevoUsuario';
            let formData = new FormData(formNuevoUsuario);
            request.open("POST", ajaxUrl,true);
            request.send(formData);
            request.onreadystatechange = function() {

                if ( request.readyState == 4 && request.status == 200) {
                    let objData = JSON.parse(request.responseText);
                    if(objData.estatus == true){
                        Swal.fire({
                            icon: 'success',
                            title: 'Exito...!',
                            text: objData.msg
                          })

                    }else{
                        Swal.fire({
                            icon: 'error',
                            title: 'Error...!',
                            text: objData.msg
                            
                          })
                    }
                    formNuevoUsuario.reset();
                    tableUsuarios.api().ajax.reload();
                    $(".close").click();

                
                  
                }
                return false;
            }
            
        }

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
                    let url = base_url + " /Usuario/setEstatusUsuario/ " + value;
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
                        tableUsuarios.api().ajax.reload();

                    }).catch (err => {throw err});
                }
              })
        }
        function fnActualizar(id){
            let url = base_url + "/Usuario/getUsuarios/" +id;

            fetch(url).then (res => res.json()).then(response => {
                document.getElementById("txtNombreUsuarioEdit").value = response.nickname;
                document.getElementById("txtPasswordEdit").value = response.password;
                document.getElementById("dateFechaRegistroEdit").value = response.fecha_conexion;
                document.getElementById("txtImgenEdit").value = response.imagen;
                document.getElementById("txtRolEdit").value = response.id_roles;
                document.getElementById("txtNombrePersonaEdit").value = response.id_personas;
                document.getElementById("txtIdUsuario").value = response.id;
            })

        }

        formEditUsuario.onsubmit = function(e){
            e.preventDefault();
            let nombreUsuario = document.getElementById("txtNombreUsuario").value;
let nombrePassword = document.getElementById("txtPassword").value;
let nombreFechaRegistro = document.getElementById("dateFechaRegistro").value;
let nombreImgen = document.getElementById("txtImgen").value;
let nombreRol = document.getElementById("txtRol").value;
let nombrePersona = document.getElementById("txtNombrePersona").value;
if(nombreUsuario ==""|| nombrePassword == "" || nombreFechaRegistro == "" || nombreImgen == "" || nombreRol == "" || nombrePersona == "") {
    Swal.fire({
        icon: 'error',
        title: 'Campo vacio',
        text: 'FAVOR DE REVISAR!',
      })
      return false;
}
            let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url+'/Usuario/setEditUsuario';
            let formData = new FormData(formEditUsuario);
            request.open("POST", ajaxUrl,true);
            request.send(formData);
            request.onreadystatechange = function() {

                if ( request.readyState == 4 && request.status == 200) {
                    let objData = JSON.parse(request.responseText);
                    if(objData.estatus == true){
                        Swal.fire({
                            icon: 'success',
                            title: 'Exito...!',
                            text: objData.msg
                          })

                    }else{
                        Swal.fire({
                            icon: 'error',
                            title: 'Error...!',
                            text: objData.msg
                            
                          })
                    }
                    formEditUsuario.reset();
                    tableUsuarios.api().ajax.reload();
                    $(".close").click();

                
                  
                }
                return false;
        }
        }
