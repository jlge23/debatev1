import './app';
//DataTable
import "datatables.net-bs5/js/dataTables.bootstrap5";
import "datatables.net-dt/js/dataTables.dataTables";
//jquery Validate
//import "jquery-validation/dist/additional-methods";
import "jquery-validation/dist/jquery.validate";
import Swal from 'sweetalert2/dist/sweetalert2.js'
import 'sweetalert2/src/sweetalert2.scss'

import Modal from 'bootstrap/js/dist/modal';

$(document).ready(function(){
    if($("div#inicio").length > 0){
        const AudioInicio = new Audio("http://"+window.location.host+"/storage/media/inicio.mp3");
        AudioInicio.loop = false;
        AudioInicio.controls = true;
        AudioInicio.play();
    }

    //resetear juego
    $("button#resetear").on("click",function(){
        Swal.fire({
            title: "¿Esta seguro que desea reinicar el juego?",
            text: "Esto reiniciara las estadisticas y podra comenzar a jugar desde cero, todas las preguntas estaran disponibles",
            icon: "question",
            allowOutsideClick : false,
            allowEscapeKey : false,
            allowEnterKey : false,
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: "¡Cancelar!",
            confirmButtonText: "¡Si, deseo reiniciar el Juego!"
            }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "juego/reset";
            }
        })
    });

    var equipo = $("input#equipo").val();
    var table = $("table#DT_juego").DataTable({
        responsive: true,
        paging: true,
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
        "order": [[0, 'asc']],
        "ajax":{
            "type":"get",
            "url":"juego/dificultad"
        },
        "columns" : [
            {"data":"id"},
            {"data":"nombre",
                "render": function (data, type, row) {
                    return "<label class='text text-dark text-center'>"+data+"</b></label>";

                }
            },
            {"data":"tiempo"},
            {"data":"cantidad"},
            {"data":"id,",
                "render": function (data, type, row) {
                    return "<button type='button' class='btn btn-dark'>Seleccionar Dificultad</button>";
                }
            }
        ]
    });
    //seelccion de dificultad y activacion de modal
    $("table#DT_juego tbody").on("click","button",function(){
        //var data = $(this).data("action");
        var D = table.row($(this).parents('tr')).data();
        const modal = new Modal(document.getElementById('MD_Preguntas'));
        $("h1#MD_PreguntasLabel").html("Dificultad de las preguntas: [<b>"+D['nombre']+"]</b>");
        modal.show();
        var data2 = $("table#DT_preguntas").DataTable();
        data2.destroy();
        var data2 = $("table#DT_preguntas").DataTable({
            responsive: true,
            scrolly: true,
            scrollCollapse: true,
            paging: false,
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
            "order": [[1, 'asc']],
            "ajax":{
                "type":"get",
                "url":"juego/"+D['id']+"/preguntas"
            },
            "columns" : [
                {"data":"id"},
                {"data":"numero",
                    "render": function (data, type, row) {
                        return "<label class='text text-dark text-center'>"+data+"</b></label>";

                    }
                },
                {"data":"punto"},
                {"data":"id,",
                    "render": function (data, type, row) {
                        return "<a href='juego/"+equipo+"/"+row.id+"' class='btn btn-info'>Seleccionar Pregunta</a>";
                    }
                }
            ]
        });

    });
    //
    //Verdadero y falso
    $("form#FRM_vf").validate({
        rules : {
            validez : {
                required : true
            }
        },
        messages : {
            validez : {
                required : "Debe seleccionar un puntaje"
            }
        },
        submitHandler : function(){
            $("form#FRM_vf")[0].submit();
        }
    });

    //Simple
    $("form#FRM_simple").validate({
        submitHandler : function(){
            $("form#FRM_simple")[0].submit();
        }
    });

    //Desarrollo
    $("form#FRM_desarrollo").validate({
        submitHandler : function(){
            $("form#FRM_desarrollo")[0].submit();
        }
    });

    //audio de pregunta
    if($("body#P").length > 0 ){
        const AudioPregunta = new Audio("http://"+window.location.host+"/storage/media/pregunta.mp3");
        AudioPregunta.defaultMuted = true;
        AudioPregunta.loop = false;
        AudioPregunta.controls = true;
        AudioPregunta.play();
    };
});
