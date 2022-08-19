let btnNuevaCaja = document.getElementById("btn-NuevaCaja")
document.addEventListener('DOMContentLoaded', function(){

    tableCajas = $('#tableCajas').dataTable( {
		"aProcessing":true,
		"aServerSide":true,
        "language": {
        	"url": " "+base_url+"/Assets/plugins/Spanish.json"
        },
        "ajax":{
            "url": " "+base_url+"/Caja/getCaja",
            "dataSrc":""
        },
        "columns":[
            {"data":"numeracion"},
            {"data":"nombre"},
            {"data":"fecha_creacion"},
            {"data":"fecha_actualizacion"},
            {"data":"status"},
            {"data":"idCaja"},
          
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
    $('#tableCaja').DataTable();
})



console.log(btnNuevaCaja);

let formNuevaCaja = document.querySelector('#formNuevaCaja');
formNuevaCaja.onsubmit = function(e){
    e.preventDefault();
    
    let nombre = document.getElementById('txtNombre').value;
    let fecha_creacion = document.getElementById('dateFechaCreacion').value;
    let FechaActualizacion = document.getElementById('dateFechaActualizacion').value;
    console.log(nombre)
    console.log(FechaCreacion)
    console.log(FechaActualizacion)

    if(nombre == '' || FechaCreacion == '' || FechaActualizacion == '' ) {
        Swal.fire({
            icon: 'error',
            title: 'ERROR',
            text: 'Completa los campos obligatorios... !',
          })
          return false;
    }


   let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url+'/Caja/setNuevaCaja';
    let formData = new FormData(formNuevaCaja);
    request.open("POST", ajaxUrl,true);
    request.send(formData);
    request.onreadystatechange = function() {

        if ( request.readyState == 4 && request.status == 200) 
        {
            let objData = JSON.parse(request.responseText);
            if(objData.estatus == true){
                Swal.fire({
                    icon: 'succes',
                    title: 'Exito!',
                    text: objData.msg,
                    
                  })

            }else{
                Swal.fire({
                    icon: 'Error',
                    title: 'Error!',
                    text: objData.msg,

            })



            
            
        }
        formNuevaCaja.reset();
        tableCajas.api().ajax.reload();
        
        $(".close").click();
        
        return false;
    }
    }
}

//Funcion eliminar Registro

function fnEliminar(value)
{
    Swal.fire({
        title: 'Desea eliminar?',
        text: "Confirme si desea hacer esta accion!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'SI'
      }).then((result) => {
        
        if (result.isConfirmed) {
            let url = base_url + "/Caja/setEstatusCaja/"+value;
            fetch(url).then (res => res.json()).then(response => {
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
                        'Error'
                    )
               }

               tableCajas.api().ajax.reload();
            
            }).catch(err => {throw err});
            /*Swal.fire(
            'Eliminado!',
            'El registro actual se ha eliminado.',
            'success'
          )*/
        }
      })
}