import './app';
//DataTable
import "datatables.net-bs5/js/dataTables.bootstrap5";
import "datatables.net-dt/js/dataTables.dataTables";
//jquery Validate
//import "jquery-validation/dist/additional-methods";
import "jquery-validation/dist/jquery.validate";
$(document).ready(function(){
    //Datatables
    $("table#pregunta").DataTable({
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
        },
        "order": [[0, 'desc']],
        "columns" : [
            {"data":"id"},
            {"data":"descripcion"},
            {"data":"tiempo"},
            {"data":"puntaje"},
            {"data":"status","render": function (data, type, row) {
                    switch(data){
                        case '0' :
                            return "<label class='text text-danger'><strong>Inactivo</strong></label>";
                        break;
                        case '1' :
                            return "<label class='text text-success'><strong>Activo</strong></label>";
                        break;
                    }
                }
            },
            {"data":"respuestas","render": function (data, type, row) {
                    /* switch(data){
                        case '0' :
                            return "<label class='text text-danger'><strong>Inactivo</strong></label>";
                        break;
                        case '1' :
                            return "<label class='text text-success'><strong>Activo</strong></label>";
                        break;
                    } */
                    return data;
                }
            },
            {"data":"defaultContent"}
        ]
    });
    //Agregar pregunta
    $("form#nueva_pregunta").validate({
        rules : {
            descripcion : {
                required : true
            },
            tiempo : {
                required : true,
            },
            puntaje_id : {
                required : true
            },
            status : {required : true}
        },
        messages : {
            descripcion : {
                required : "Descripcion de la pregunta requerida"
            },
            tiempo : {
                required : "Tiempo de duracion de la pregunta requerido",
            },
            puntaje_id : {
                required : "Puntaje de la pregunta requerido"
            },
            status : {required : "EStatus de la pregunta requerido"}
        },
        submitHandler : function(){
            if(confirm("¿Confirma el registro de los datos?"))              
                $("form#nueva_pregunta")[0].submit();
                //console.log($("form#nueva_pregunta").serialize());
        }
    });
    //Actualizar pregunta
    $("form#editar_pregunta").validate({
        rules : {
            descripcion : {
                required : true
            },
            tiempo : {
                required : true,
            },
            puntaje_id : {
                required : true
            },
            status : {required : true}
        },
        messages : {
            descripcion : {
                required : "Descripcion de la pregunta requerida"
            },
            tiempo : {
                required : "Tiempo de duracion de la pregunta requerido",
            },
            puntaje_id : {
                required : "Puntaje de la pregunta requerido"
            },
            status : {required : "EStatus de la pregunta requerido"}
        },
        submitHandler : function(){
            if(confirm("¿Confirma la actualización los datos? ACTUALIZAR"))                
                $("form#editar_pregunta")[0].submit();
                //console.log($("form#editar_pregunta").serialize());
        }
    });
});