import"./app.1b013e92.js";import"./jquery.validate.9d8615a9.js";import"./sweetalert2.6a825d83.js";import"./_commonjsHelpers.4e997714.js";$(document).ready(function(){var t=$("table#DT_informe").DataTable({responsive:!0,paging:!0,pageLength:10,language:{sProcessing:"Procesando...",sLengthMenu:"Mostrar _MENU_ registros",sZeroRecords:"No se encontraron resultados",sEmptyTable:"Ning\xFAn dato disponible en esta tabla",sInfo:"Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",sInfoEmpty:"Mostrando registros del 0 al 0 de un total de 0 registros",sInfoFiltered:"(filtrado de un total de _MAX_ registros)",sInfoPostFix:"",sSearch:"Buscar:",sUrl:"",sInfoThousands:",",sLoadingRecords:"Cargando...",oPaginate:{sFirst:"Primero",sLast:"\xC3\u0161ltimo",sNext:"Siguiente",sPrevious:"Anterior"},oAria:{sSortAscending:": Activar para ordenar la  columna de manera ascendente",sSortDescending:": Activar para ordenar la columna de manera descendente"}},order:[[0,"desc"]],ajax:{type:"get",url:"informe/resultados"},columns:[{data:"id",render:function(e,r,a){return"<label class='text text-dark text-center'>"+e+"</b></label>"}},{data:"nombre"},{data:"tipo"},{data:"descripcion"},{data:"respuesta"},{data:"acierto",render:function(e,r,a){switch(e){case 0:return"<label class='text text-danger'><strong>Incorrecta</strong></label>";case 1:return"<label class='text text-success'><strong>Correcta</strong></label>"}}},{data:"puntos",width:"10%"},{data:"tiempo",width:"10%",render:function(e,r,a){return"<label class='text text-secondary'><strong>"+e+"&nbsp;Segundos</strong></label>"}}]});function s(){t.ajax.reload(),t.columns.adjust().draw()}setInterval(s,5e3)});
