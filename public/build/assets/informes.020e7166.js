import"./app.ed1797e6.js";import"./jquery.validate.4f8c037b.js";import"./sweetalert2.6a825d83.js";import"./_commonjsHelpers.4e997714.js";$(document).ready(function(){var r=$("table#DT_informe").DataTable({responsive:!0,scrollX:!1,scrollY:"450px",scrollCollapse:!0,paging:!1,autoWidth:!1,fixedHeader:!0,initComplete:function(){this.api().columns([0,1,2,3,4]).every(function(){var e=this,a=$('<select><option value=""></option></select>').appendTo($(e.footer()).empty()).on("change",function(){var t=$.fn.dataTable.util.escapeRegex($(this).val());e.search(t?"^"+t+"$":"",!0,!1).draw()});e.data().unique().sort().each(function(t,s){a.append('<option value="'+t+'">'+t+"</option>")})})},language:{sProcessing:"Procesando...",sLengthMenu:"Mostrar _MENU_ registros",sZeroRecords:"No se encontraron resultados",sEmptyTable:"Ning\xFAn dato disponible en esta tabla",sInfo:"Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",sInfoEmpty:"Mostrando registros del 0 al 0 de un total de 0 registros",sInfoFiltered:"(filtrado de un total de _MAX_ registros)",sInfoPostFix:"",sSearch:"Buscar:",sUrl:"",sInfoThousands:",",sLoadingRecords:"Cargando...",oPaginate:{sFirst:"Primero",sLast:"\xC3\u0161ltimo",sNext:"Siguiente",sPrevious:"Anterior"},oAria:{sSortAscending:": Activar para ordenar la  columna de manera ascendente",sSortDescending:": Activar para ordenar la columna de manera descendente"}},order:[[0,"asc"]],ajax:{type:"get",url:"informe/resultados"},columns:[{data:"id",width:"10%",render:function(e,a,t){return"<label class='text text-dark text-center'>"+e+"</b></label>"}},{data:"nombre",width:"10%"},{data:"descripcion",width:"10%"},{data:"respuesta",width:"10%"},{data:"acierto",width:"10%",render:function(e,a,t){switch(e){case 0:return"<label class='text text-danger'><strong>Incorrecta</strong></label>";case 1:return"<label class='text text-success'><strong>Correcta</strong></label>"}}},{data:"puntos",width:"10%"},{data:"tiempo",width:"10%",render:function(e,a,t){return"<label class='text text-secondary'><strong>"+e+"&nbsp;Segundos</strong></label>"}}]});function o(){r.ajax.reload(),r.columns.adjust().draw()}setInterval(o,5e3)});