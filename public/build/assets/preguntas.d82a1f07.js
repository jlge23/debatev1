import"./app.1b013e92.js";import"./jquery.validate.9d8615a9.js";import"./_commonjsHelpers.4e997714.js";$(document).ready(function(){$("table#pregunta").DataTable({language:{sProcessing:"Procesando...",sLengthMenu:"Mostrar _MENU_ registros",sZeroRecords:"No se encontraron resultados",sEmptyTable:"Ning\xFAn dato disponible en esta tabla",sInfo:"Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",sInfoEmpty:"Mostrando registros del 0 al 0 de un total de 0 registros",sInfoFiltered:"(filtrado de un total de _MAX_ registros)",sInfoPostFix:"",sSearch:"Buscar:",sUrl:"",sInfoThousands:",",sLoadingRecords:"Cargando...",oPaginate:{sFirst:"Primero",sLast:"\xC3\u0161ltimo",sNext:"Siguiente",sPrevious:"Anterior"},oAria:{sSortAscending:": Activar para ordenar la  columna de manera ascendente",sSortDescending:": Activar para ordenar la columna de manera descendente"}},order:[[0,"desc"]],columns:[{data:"id"},{data:"descripcion"},{data:"tiempo"},{data:"puntaje"},{data:"status",render:function(e,r,t){switch(e){case"0":return"<label class='text text-danger'><strong>Inactivo</strong></label>";case"1":return"<label class='text text-success'><strong>Activo</strong></label>"}}},{data:"respuestas",render:function(e,r,t){return e}},{data:"defaultContent"}]}),$("form#nueva_pregunta").validate({rules:{descripcion:{required:!0},tiempo:{required:!0},puntaje_id:{required:!0},status:{required:!0}},messages:{descripcion:{required:"Descripcion de la pregunta requerida"},tiempo:{required:"Tiempo de duracion de la pregunta requerido"},puntaje_id:{required:"Puntaje de la pregunta requerido"},status:{required:"EStatus de la pregunta requerido"}},submitHandler:function(){confirm("\xBFConfirma el registro de los datos?")&&$("form#nueva_pregunta")[0].submit()}}),$("form#editar_pregunta").validate({rules:{descripcion:{required:!0},tiempo:{required:!0},puntaje_id:{required:!0},status:{required:!0}},messages:{descripcion:{required:"Descripcion de la pregunta requerida"},tiempo:{required:"Tiempo de duracion de la pregunta requerido"},puntaje_id:{required:"Puntaje de la pregunta requerido"},status:{required:"EStatus de la pregunta requerido"}},submitHandler:function(){confirm("\xBFConfirma la actualizaci\xF3n los datos? ACTUALIZAR")&&$("form#editar_pregunta")[0].submit()}})});
