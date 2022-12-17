import './app';
//DataTable
import "datatables.net-bs5/js/dataTables.bootstrap5";
import "datatables.net-dt/js/dataTables.dataTables";
//jquery Validate
//import "jquery-validation/dist/additional-methods";
import "jquery-validation/dist/jquery.validate";
import Swal from 'sweetalert2/dist/sweetalert2.js'
import 'sweetalert2/src/sweetalert2.scss'
/* import Modal from 'bootstrap/js/dist/modal'
const modal = new Modal(document.getElementById('exampleModal')); */

$(document).ready(function(){
   //modal.show();
   //Datatables resultados
   var table = $("table#DT_informe").DataTable({
      responsive: true,
      paging: true,
      pageLength: 10,
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
      "ajax":{
         "type":"get",
         "url":"informe/resultados"
      },
      "columns" : [
         {"data":"id",
            "render": function (data, type, row) {
                  return "<label class='text text-dark text-center'>"+data+"</b></label>";

            }
         },
         {"data":"nombre"},
         {"data":"tipo"},
         {"data":"descripcion"},
         {"data":"respuesta"},
         {"data":"acierto",
            "render": function (data, type, row) {
                  switch(data){
                     case 0 :
                        return "<label class='text text-danger'><strong>Incorrecta</strong></label>";
                     break;
                     case 1 :
                        return "<label class='text text-success'><strong>Correcta</strong></label>";
                     break;
                  }
            }
         },
         {"data":"puntos","width": "10%"},
         {"data":"tiempo","width": "10%",
            "render": function (data, type, row) {
                     return "<label class='text text-secondary'><strong>"+data+"&nbsp;Segundos</strong></label>";
               }
         }
      ]
   });
   function DT(){
      table.ajax.reload();
      table.columns.adjust().draw();
   }
   setInterval(DT,5000);
});
