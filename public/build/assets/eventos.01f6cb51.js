import"./app.ed1797e6.js";import"./jquery.validate.4f8c037b.js";import"./_commonjsHelpers.4e997714.js";$(document).ready(function(){$("table#eventos").DataTable({language:{sProcessing:"Procesando...",sLengthMenu:"Mostrar _MENU_ registros",sZeroRecords:"No se encontraron resultados",sEmptyTable:"Ning\xFAn dato disponible en esta tabla",sInfo:"Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",sInfoEmpty:"Mostrando registros del 0 al 0 de un total de 0 registros",sInfoFiltered:"(filtrado de un total de _MAX_ registros)",sInfoPostFix:"",sSearch:"Buscar:",sUrl:"",sInfoThousands:",",sLoadingRecords:"Cargando...",oPaginate:{sFirst:"Primero",sLast:"\xC3\u0161ltimo",sNext:"Siguiente",sPrevious:"Anterior"},oAria:{sSortAscending:": Activar para ordenar la  columna de manera ascendente",sSortDescending:": Activar para ordenar la columna de manera descendente"}},columns:[{data:"id"},{data:"nombre"},{data:"descripcion"},{data:"fecha"},{data:"iglesia"},{data:"status",render:function(e,r,a){switch(e){case"0":return"<label class='text text-danger'><strong>Inactivo</strong></label>";case"1":return"<label class='text text-success'><strong>Activo</strong></label>"}}},{data:"defaultContent"}]}),$("form#nuevo_evento").validate({rules:{nombre:{required:!0},descripcion:{required:!0},fecha:{required:!0},iglesia_id:{required:!0},status:{required:!0}},messages:{nombre:{required:"Nombre del evento requerido"},descripcion:{required:"Informacion adicional"},fecha:{required:"Fecha del evento requerida"},iglesia_id:{required:"Iglesia o lugar de precedencia requerida"},status:{required:"Estatus, requerido"}},submitHandler:function(){confirm("\xBFConfirma el registro de los datos?")&&$("form#nuevo_evento")[0].submit()}}),$("form#editar_evento").validate({rules:{nombre:{required:!0},descripcion:{required:!0},fecha:{required:!0,date:!0},iglesia_id:{required:!0},status:{required:!0}},messages:{nombre:{required:"Nombre del evento requerido"},descripcion:{required:"Informacion adicional"},fecha:{required:"Fecha del evento requerida",date:"Tip\xE9e la fecha en el formato A\xF1o-Mes-dia. Ej: 2022-01-01"},iglesia_id:{required:"Iglesia o lugar de precedencia requerida"},status:{required:"Estatus, requerido"}},submitHandler:function(){confirm("\xBFConfirma el registro de los datos? ACTUALIZAR")&&$("form#editar_evento")[0].submit()}})});
