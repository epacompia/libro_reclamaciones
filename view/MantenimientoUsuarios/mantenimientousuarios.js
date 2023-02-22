var tabla;

function init(){

}

//ESTEE CODIGO ES PARA EL DATATABLE
$(document).ready(function(){
    //console.log(usu_id);

        tabla=$('#usuario_data').dataTable({
            "aProcessing":true,
            "aServerSide":true,
            dom: 'Bfrtip',
            "searching":true,
            lengthChange:false,
            colReader:true,
            buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdfHtml5'
                    ],
            "ajax":{
                url:'../../controller/usuario.php?op=listar',   //TENER EN CUENTA ESTE LLAMADO DEL AJAX
                type:"post",
                dataType:"json",
                //data:{ usu_id : usu_id},  //no llamara este campo data ya que no estamos pasandole parametros
                error: function(e){
                    console.log(e.responseText);
                }
            },
            "ordering":false,
            "bDestroy":true,
            "responsive": true,
            "bInfo":true,
            "iDisplayLength":10,
            "autoWidth":false,
            "language": {
                "sProcessing":      "Procesando...",
                "sLengthMenu":      "Mostrar _MENU_ registros",
                "sZeroRecords":     "No se encontraron resultados",
                "sEmptyTable":      "Ningun dato disponible en esta tabla",
                "sInfo":            "Mostrando un total de _TOTAL_ registros",
                "sInfoEmpty":       "Mostrando un total de 0 registros",
                "sInfoFiltered":    "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix":     "",
                "sSearch":          "Buscar:",
                "sUrl":             "",
                "sInfoThousands":    ",",
                "sLoadingRecords":  "Cargando...",
                "oPaginate":{
                    "sFirst":       "Primero",
                    "sLast":        "Último",
                    "sNext":        "Siguiente",
                    "sPrevious":    "Anterior"     
                },
                "oAria": {
                    "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending":  ": Activar para ordenar la columna de manera descendente",                
                }
            }
            
        }).DataTable();
      
});

function editar(usu_id){
 //llamo a mi modal pero le paso para el titulo editar registro y luego lo muestro con modal
 $('#mdltitulo').html('Editar registro');
 $('#modalmantenimiento').modal('show');
 console.log(usu_id);
}

function eliminar(usu_id){
    swal({
        title: "Informática - DIRCOCOR",
        text: "Esta seguro que desea eliminar el registro?",
        type: "error",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Si, eliminar usuario",
        cancelButtonText: "No!",
        closeOnConfirm: false,
        //closeOnCancel: false
    },
    function(isConfirm) {
        if (isConfirm) {
            
            //ESTE CODIGO ES PARA ACTUALIZAR PRIMERO EL ESTADO A CERRADO DEL TICKET DESPUES DE CONFIRMAR EL CERRADO
            $.post("../../controller/usuario.php?op=eliminar",{usu_id:usu_id}, function (data) {
                
             });

             $('#usuario_data').DataTable().ajax.reload(); //PARA RECARGAR LA PAGINA DESPUES DE ELIMINAR
             //listardetalle(usu_id); //LLAMO A MI FUNCION LISTARDETALLE
            swal({
                title: "Usuario eliminado!",
                text: "Informática - Dircocor",
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
}


//CODIGO PARA HACER FUNCIONAR EL MODAL DE MANTENIENTO USUARIO CUANDO LE DOY CLIC EN NUEVO USUARIO
$(document).on("click","#btnnuevo", function(){
    // console.log("dfsdfsdf");
    $('#mdltitulo').html('Nuevo Registro');
    $('#modalmantenimiento').modal('show');
});





init();