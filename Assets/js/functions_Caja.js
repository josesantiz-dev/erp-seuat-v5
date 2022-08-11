let btnNuevaGeneracion = document.getElementById("btn-NuevaGeneracion")
document.addEventListener('DOMContentLoaded', function(){

    tableCajas = $('#table').dataTable( {
		"aProcessing":true,
		"aServerSide":true,
        "language": {
        	"url": " "+base_url+"/Assets/plugins/Spanish.json"
        },
        "ajax":{
            "url": " "+base_url+"/GeneracionMiguel/getListaGeneraciones",
            "dataSrc":""
        }
    }

