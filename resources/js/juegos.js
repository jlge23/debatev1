import './app';
//DataTable
import "datatables.net-bs5/js/dataTables.bootstrap5";
import "datatables.net-dt/js/dataTables.dataTables";
//jquery Validate
//import "jquery-validation/dist/additional-methods";
import "jquery-validation/dist/jquery.validate";
import Swal from 'sweetalert2/dist/sweetalert2.js'
import 'sweetalert2/src/sweetalert2.scss'

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
    
    $('input#comodines').on('change',function(){
        const AudioComodin = new Audio("http://"+window.location.host+"/storage/media/comodines.mp3");
        AudioComodin.loop = false;
        AudioComodin.controls = true;
        var value = $(this).val();

        function swal(title,icon){
            Swal.fire({
                title: title,
                icon : icon,
                allowOutsideClick : false,
                allowEscapeKey : false,
                allowEnterKey : false,
                showCloseButton: false,
                showConfirmButton: false,
                timer: 4500
            });
        }
        $.ajax({
            url : "juego/"+value+"/comodin",
            type : "GET",
            success: function(data){
                switch(data){
                    case '0':
                        swal("¡Comodines Desactivados!","warning");
                        $('input#comodines').val(data);
                        AudioComodin.play();
                        table.ajax.reload();
                    break;
                    case '1':
                        swal("¡Comodines Activados! ","success");
                        $('input#comodines').val(data);
                        AudioComodin.play();
                        table.ajax.reload();
                    break;
                }
            },
        })
        .fail(function(){
            Swal.fire("Error al guardar su información"," Revise su conexión a Internet e intente nuevamente hacer clik en '|Guardar y Continuar|'","error");
        });
    });
    //
    var equipo = $("input#equipo").val();
    var table = $("table#DT_juego").DataTable({
        responsive: true,
        scrollY: '460px',
        scrollCollapse: true,
        paging: false,
        "autoWidth": true,
        fixedHeader: true,
        initComplete: function () {
           this.api()
           .columns([0])
           .every(function () {
              var column = this;
              var select = $('<select><option value=""></option></select>')
                 .appendTo($(column.footer()).empty())
                 .on('change', function () {
                    var val = $.fn.dataTable.util.escapeRegex($(this).val());
  
                    column.search(val ? '^' + val + '$' : '', true, false).draw();
                 });
  
                column
                    .data()
                    .unique()
                    .sort()
                    .each(function (d, j) {
                        select.append('<option value="' + d + '">' + d + '</option>');
                    });
            });
        },
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
        "order": [[5, 'asc']],
        "ajax":{
            "type":"get",
            "url":"juego/preguntas"
        },
        "columns" : [
            {"data":"id"},
            {"data":"nombre",
                "render": function (data, type, row) {
                    return "<label class='text text-dark text-center'>"+data+"</b></label>";
  
                }
            },
            {"data":"valor"},
            {"data":"comodin"},
            {"data":"cantidad"},
            {"data":"id,",
                "render": function (data, type, row) {
                    return "<a class='btn btn-primary' href='juego/"+row.id+"/"+equipo+"'>SELECCIONAR</a>";
                }
            }
        ]
    });

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
            //console.log($("form#nueva_pregunta").serialize());
        }
    });

    //Simple
    $("form#FRM_simple").validate({
        submitHandler : function(){      
            $("form#FRM_simple")[0].submit();
            //console.log($("form#nueva_pregunta").serialize());
        }
    });
    
    //Desarrollo
    $("form#FRM_desarrollo").validate({
        submitHandler : function(){
            $("form#FRM_desarrollo")[0].submit();
            //console.log($("form#nueva_pregunta").serialize());
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
