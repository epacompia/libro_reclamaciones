//CAPTURANDO EL ID QUE SE PASA POR AL URL 
function init(){

}



$(document).ready(function() {
    var caso_id = getUrlParameter('ID');
    //console.log(id);
    
    //FUNCTION PARA LISTAR DETALLE DEL TICKET VER COMENTARIOS
    listardetalle(caso_id);

     $.post("../../controller/caso.php?op=mostrar", {caso_id : caso_id}, function (data){
        //console.log(data);
        data=JSON.parse(data);
        $('#lbl_estado').html(data.caso_estado);
        //console.log(data.caso_estado);
        $('#lbl_nomusuario').html(data.usu_nombre + ' ' + data.usu_apellido);
        $('#lbl_fechcreacion').html(data.fecha_creacion);
        $('#lbl_nomidcaso').html("Detalle Caso -" + data.caso_id);
     
        $('#sede_nombre').val(data.sede_nombre);
        $('#caso_titulo').val(data.caso_titulo);
        $('#casodetalle_descrip_usu').summernote('code',data.caso_descripcion);
        console.log(data.caso_estado_texto);
        if(data.caso_estado_texto =="Cerrado"){
            $('#pnldetallecaso').hide();
        }
        
    });




     //CODIGO PARA EL SUMMERNOTE DE MI VISTA DETALLETICEKT.PHP
     $('#casodetalle_descrip').summernote({
        height:350,
        lang:"es-ES",
    });


    $('#casodetalle_descrip_usu').summernote({
        height:350,
        lang:"es-ES",
    });

    //ESTE CODIGO ES PARA DESABILITAR LA EDICION DEL SUMMERNOTE dentro de detallecaso.js
    $('#casodetalle_descrip_usu').summernote('disable');

});





//FUNCION PARA CAPTURAR EL APRAMETRO DEL ID QUE SE PASA POR AL URL CUANDO SE  DA CLIC EN EL OJITO
var getUrlParameter = function getUrlParameter(sParam){
    //Declaracion de varialbes
    var sPageURL= decodeURIComponent(window.location.search.substring(1)),
    sURLVariables= sPageURL.split('&'),
    sParameterName,
    i;

    for(i=0; i< sURLVariables.length; i++){
        sParameterName=sURLVariables[i].split('=');

        if(sParameterName[0]===sParam){
            return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }
};



//LLAMANDO A LOS BOTONES PARA GUARDAR Y CERRAR CASODETALLE cuando comenten el ticket
$(document).on("click","#btnenviar",function(){
    var caso_id=getUrlParameter('ID');
    var usu_id= $('#usu_idx').val();
    var casodetalle_descrip=$('#casodetalle_descrip').val();

    if ($('#casodetalle_descrip').summernote('isEmpty')){
        swal("Advertencia!","Falta llenar su comentario","warning");
    }else{
    $.post("../../controller/caso.php?op=insert_casodetalle", {caso_id : caso_id, usu_id:usu_id, casodetalle_descrip:casodetalle_descrip}, function (data){
        //console.log("test3");
        listardetalle(caso_id); //CODIGO PARA LISTAR DETALLE EN AJAX LO LISTA INMEDIATAMENTE
        $('#casodetalle_descrip').summernote('reset'); 
        swal("Correcto!","Registrado Correctamente","success");
    });
    }
});

$(document).on("click","#btncerrar",function(){
    //console.log("test2");
     //CODIGO CON SWEETALERT SACADO DE MI TEMPLATE QUE COPIE Y PEGUE AQUI 
     swal({
        title: "Informática - DIRCOCOR",
        text: "Esta seguro de cerrar el caso?",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-warning",
        confirmButtonText: "Si, Cerrar caso",
        cancelButtonText: "No!",
        closeOnConfirm: false,
        //closeOnCancel: false
    },
    function(isConfirm) {
        if (isConfirm) {
            var caso_id = getUrlParameter('ID');
            var usu_id = $('#usu_idx').val(); // llamo este usu id para poder cerrar el ticekt y ver quien lo cerro 
            //ESTE CODIGO ES PARA ACTUALIZAR PRIMERO EL ESTADO A CERRADO DEL TICKET DESPUES DE CONFIRMAR EL CERRADO
            $.post("../../controller/caso.php?op=update",{caso_id : caso_id, usu_id:usu_id}, function (data) {
                
             });

             listardetalle(caso_id); //LLAMO A MI FUNCION LISTARDETALLE
            swal({
                title: "Caso Cerrado!",
                text: "Te llegara un correo con la constancia de cerrado",
                type: "success",
                confirmButtonClass: "btn-success"
            });
        } 
        else {
            swal({
                title: "Cancelado",
                text: "Se canceló el cierre del caso",
                type: "error",
                confirmButtonClass: "btn-danger"
            });
        }
    });
});



//FUNCION PARA LSITAR COMENTARIOS DE EL TICKET OSEA LISTARDETALLE 
function listardetalle(caso_id){
    //AQUI LE PASO ESTO PARA QUE SELECCIONE MI listardetalle de mi ticket.php y le paso como parametro el id del ticket  
    $.post("../../controller/caso.php?op=listardetalle", {caso_id : caso_id}, function (data){
        //console.log(data);   // esto es para ver que me lo imprima 5 veces
        $('#lbldetalle').html(data);  //LLAMO  a mi section de mi index.php que conteinia a mi article
     });
}

init();