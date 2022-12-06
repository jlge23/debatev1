import './app';
//DataTable
import "datatables.net-bs5/js/dataTables.bootstrap5";
import "datatables.net-dt/js/dataTables.dataTables";
//jquery Validate
//import "jquery-validation/dist/additional-methods";
import "jquery-validation/dist/jquery.validate";
$(document).ready(function(){
    //Datatables
    $("table#respuesta").DataTable({
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
        "order": [[1, 'desc']],
        "columns" : [
            {"data":"id"},
            {"data":"pregunta"},
            {"data":"nombre"},
            {"data":"respuesta"},
            {"data":"validez","render": function (data, type, row) {
                switch(data){
                    case '0' :
                        return "<label class='text text-danger'><strong>no valida</strong></label>"; 
                    break;
                    case '1' :
                        return "<label class='text text-success'><strong>Valida</strong></label>";
                    break;
                }
            }},
            {"data":"status","render": function (data, type, row) {
                switch(data){
                    case '0' :
                        return "<label class='text text-danger'><strong>Inactivo</strong></label>"; 
                    break;
                    case '1' :
                        return "<label class='text text-success'><strong>Activo</strong></label>";
                    break;
                }
            }}
            //,{"data":"defaultContent"}
        ]
    });
    //Agregar respuesta
    $("form#nueva_respuesta").validate({
        rules : {
            pregunta_id : {
                required : true
            },
            respuesta : {
                required : true
            },
            validez : {
                required : true,
            },
            status : {required : true}
        },
        messages : {
            pregunta_id : {
                required : "Pregunta requerida"
            },
            respuesta : {
                required : "Descripcion de la respuesta requerida"
            },
            validez : {
                required : "Valides de esta respuesta requerido",
            },
            status : {required : "Estatus de la respuesta requerido"}
        },
        submitHandler : function(){
            if(confirm("¿Confirma el registro de los datos?"))              
                $("form#nueva_respuesta")[0].submit();
                //console.log($("form#nueva_respuesta").serialize());
        }
    });
    //Actualizar respuesta Verdadero y falso
    $("form#vf_edit").validate({
        rules : {
            pregunta_id : {
                required : false
            },
            respuesta : {
                required : false
            },
            validez : {
                required : false
            }
        },
        messages : {
            pregunta_id : {
                required : "Pregunta requerida"
            },
            respuesta : {
                required : "Descripcion de la respuesta requerida"
            },
            validez : {
                required : "Valides de esta respuesta requerido"
            }
        },
        submitHandler : function(){
            if(confirm("¿Confirma la actualización los datos? ACTUALIZAR"))                
                //$("form#vf_edit")[0].submit();
                console.log($("form#vf_edit").serialize());
        }
    });
    //Actualizar Seleccion simple
    //Actualizar respuesta Verdadero y falso
    $("form#simple_edit").validate({
        rules : {
            pregunta_id : {
                required : false
            },
            respuesta : {
                required : false
            },
            validez : {
                required : false,
            },
            status : {required : false}
        },
        messages : {
            pregunta_id : {
                required : "Pregunta requerida"
            },
            respuesta : {
                required : "Descripcion de la respuesta requerida"
            },
            validez : {
                required : "Valides de esta respuesta requerido",
            },
            status : {required : "Estatus de la respuesta requerido"}
        },
        submitHandler : function(){
            if(confirm("¿Confirma la actualización los datos? ACTUALIZAR"))                
                $("form#editar_respuesta")[0].submit();
                //console.log($("form#editar_respuesta").serialize());
        }
    });
    //Actualizar Desarrollo
    //Actualizar respuesta Verdadero y falso
    $("form#des_edit").validate({
        rules : {
            pregunta_id : {
                required : false
            },
            respuesta : {
                required : false
            },
            validdez : {
                required : false,
            },
            status : {required : false}
        },
        messages : {
            pregunta_id : {
                required : "Pregunta requerida"
            },
            respuesta : {
                required : "Descripcion de la respuesta requerida"
            },
            validez : {
                required : "Valides de esta respuesta requerido",
            },
            status : {required : "Estatus de la respuesta requerido"}
        },
        submitHandler : function(){
            if(confirm("¿Confirma la actualización los datos? ACTUALIZAR"))                
                $("form#editar_respuesta")[0].submit();
                //console.log($("form#editar_respuesta").serialize());
        }
    });

    //Presentacion de formulario de respuesta, segun el tipo de pregunta
    $("select#sel_pregunta").on("change",function(){
        let puntaje = $("select#sel_pregunta option:selected").data('puntaje');
        let pregunta_id = $("select#sel_pregunta option:selected").val();
        let pregunta = $("select#sel_pregunta option:selected").text();
        let tiempo = $("select#sel_pregunta option:selected").data('tiempo');
        let pnombre = $("select#sel_pregunta option:selected").data('pnombre');
        let pvalor = $("select#sel_pregunta option:selected").data('pvalor');
        let pcomodin = $("select#sel_pregunta option:selected").data('pcomodin');
        switch(puntaje){
            case 1 : //verdadero y falso
                $("form#verdad_falso")[0].reset();
                $("input#pregunta_id").val(pregunta_id);
                $("div[data-div='P']").css("display","none");
                $("div#vf").css("display","block");
                $("div#pregunta").html("").html(
                    "Pregunta: [<b>"+pregunta+"</b>], Tipo de pregunta: [<b>"+pnombre+"</b>], Tiempo de duracion: [<b>"+tiempo+"</b>], Valor inicial: [<b>"+pvalor+"</b>], Valor de comodin: [<b>"+pcomodin+"]<b/>"
                );
            break;
            case 2 : //seleccion simple
                $("form#seleccion_simple")[0].reset();
                $("input#pregunta_id").val(pregunta_id);
                $("div[data-div='P']").css("display","none");
                $("div#simple").css("display","block");
                $("div#pregunta").html("").html(
                    "Pregunta: [<b>"+pregunta+"</b>], Tipo de pregunta: [<b>"+pnombre+"</b>], Tiempo de duracion: [<b>"+tiempo+"</b>], Valor inicial: [<b>"+pvalor+"</b>], Valor de comodin: [<b>"+pcomodin+"]<b/>"
                );
            break;
            case 3 : //desarrollo
                $("form#desarrollo")[0].reset();
                $("input#pregunta_id").val(pregunta_id);
                $("div[data-div='P']").css("display","none");
                $("div#des").css("display","block");
                $("div#pregunta").html("").html(
                    "Pregunta: [<b>"+pregunta+"</b>], Tipo de pregunta: [<b>"+pnombre+"</b>], Tiempo de duracion: [<b>"+tiempo+"</b>], Valor inicial: [<b>"+pvalor+"</b>], Valor de comodin: [<b>"+pcomodin+"]<b/>"
                );
            break;
            default: 
            $("div[data-div='P']").css("display","none");
            $("div#pregunta").html("");
        }
    });
    //Formulario de edicion

});