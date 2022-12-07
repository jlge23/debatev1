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
      scrollX: false,
      scrollY: '450px',
      scrollCollapse: true,
      paging: false,
      "autoWidth": false,
      fixedHeader: true,
      initComplete: function () {
         this.api()
         .columns([0,1,2,3,4])
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
      "order": [[0, 'asc']],
      "ajax":{
         "type":"get",
         "url":"informe/resultados"
      },
      "columns" : [
         {"data":"id","width": "10%",
            "render": function (data, type, row) {
                  return "<label class='text text-dark text-center'>"+data+"</b></label>";

            }
         },
         {"data":"nombre","width": "10%"},
         {"data":"descripcion","width": "10%"},
         {"data":"respuesta","width": "10%"},
         {"data":"acierto","width": "10%",
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