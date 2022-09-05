let btnNuevaCaja = document.getElementById("btn-NuevaCaja")
document.addEventListener('DOMContentLoaded', function(){

    tableCajas = $('#tableCajas').dataTable( {
		"aProcessing":true,
		"aServerSide":true,
        "language": {
        	"url": " "+base_url+"/Assets/plugins/Spanish.json"
        },
        "ajax":{
            "url": " "+base_url+"/Caja/getListaCaja",
            "dataSrc":""
        },
        "columns":[
            {"data":"numeracion"},
            {"data":"id"},
            {"data":"nombre"},
            {"data":"id_usuario_atiende"},
            
            {"data":"fecha_creacion"},
            {"data":"fecha_actualizacion"},
            {"data":"id_planteles"},
            {"data":"id_sistemas_educativos"},
            {"data":"estatus"},
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
    $('#tableCaja').DataTable();
})



 console.log(btnNuevaCaja);

let formNuevaCaja = document.querySelector('#formNuevaCaja');
formNuevaCaja.onsubmit = function(e){
    e.preventDefault();
    
    let nombre = document.getElementById('txtNombre').value;
    let id_usuario_atiende = document.getElementById('txtidUsuarioAtiende').value;
    let fecha_creacion = document.getElementById('dateFechaCreacion').value;
    let fechaActualizacion = document.getElementById('datefechaActualizacion').value;
    let id_planteles = document.getElementById('txtidPlanteles').value;
    let id_sistemas_educativos = document.getElementById('txtidSistemasEducativos').value;
   
   
    console.log(nombre)
    console.log(id_usuario_atiende)
    console.log(fecha_creacion)
    console.log(fechaActualizacion)
    console.log(id_planteles)
    console.log(id_sistemas_educativos)
    
  
  

    if(nombre == '' || id_usuario_atiende == '' || fecha_creacion == '' || fechaActualizacion == '' || id_planteles == '' || id_sistemas_educativos == '')
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
                   // position: 'top-end',
                    icon: 'success',
                    title: 'Se guardo correctamente',
                    text: objData.msg,
                    //showConfirmButton: false,
                    //timer: 1500
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
                        'Error',
                       
                
                        
                    )
               }

               tableCajas.api().ajax.reload();
            
            }).catch(err => {throw err});
        /*Swal.fire(
            'Eliminado!',
            'El registro actual se ha eliminado.',
            'success'
          )¨*/
        }
      })
    }

