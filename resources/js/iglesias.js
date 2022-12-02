import './app';
//DataTable
import "datatables.net-bs5/js/dataTables.bootstrap5";
import "datatables.net-dt/js/dataTables.dataTables";
//jquery Validate
//import "jquery-validation/dist/additional-methods";
import "jquery-validation/dist/jquery.validate";
$(document).ready(function(){
    //Datatables
    $("table#iglesia").DataTable({
        "language": {
            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst":    "Primero",
                "sLast":     "Ãšltimo",
                "sNext":     "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending":  ": Activar para ordenar la  columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        }
    });
    //Agregar iglesia
    $("form#nueva_iglesia").validate({
        rules : {
            nombre : {
                required : true
            },
            descripcion : {
                required : true
            }
        },
        messages : {
            nombre : {
                required : "Nombre de iglesia requerido"
            },
            descripcion : {
                required : "Informacion adicional"
            }
        },
        submitHandler : function(){
            if(confirm("¿Confirma el registro de los datos?"))              
                $("form#nueva_iglesia")[0].submit();
                //console.log($("form#nueva_iglesia").serialize());
        }
    });
    //Actualizar iglesia
    $("form#editar_iglesia").validate({
        rules : {
            nombre : {
                required : true
            },
            descripcion : {
                required : true
            }
        },
        messages : {
            nombre : {
                required : "Nombre de iglesia requerido"
            },
            descripcion : {
                required : "Informacion adicional"
            }
        },
        submitHandler : function(){
            if(confirm("¿Confirma la actualización los datos? ACTUALIZAR"))                
                $("form#editar_iglesia")[0].submit();
                console.log($("form#editar_iglesia").serialize());
        }
    });
});