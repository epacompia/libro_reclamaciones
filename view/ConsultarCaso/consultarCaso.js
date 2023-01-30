var tabla;
var usu_id=$('#usu_idx').val();
var rol_id=$('#rol_idx').val();

function init(){

}

//ESTEE CODIGO ES PARA EL DATATABLE
$(document).ready(function(){
    //console.log(usu_id);
    if (rol_id==1) { //llama al perfil de usuario estandar
        tabla=$('#caso_data').dataTable({
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
                url:'../../controller/caso.php?op=listar_x_usu',   //TENER EN CUENTA ESTE LLAMADO DEL AJAX
                type:"post",
                dataType:"json",
                data:{ usu_id : usu_id},  //TENER EN CUENTA ESTE LLAMADO aqui a el id de usuario
                error: function(e){
                    console.log(e.responseText);
                }
            },
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
    }else{  // entra en el else cuando sera diferente de rol_id igual a 1, es decir 2 o mas 
        tabla=$('#caso_data').dataTable({
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
                url:'../../controller/caso.php?op=listar',   //TENER EN CUENTA ESTE LLAMADO DEL AJAX
                type:"post",
                dataType:"json",
                //data:{ usu_id : usu_id},  //no llamara este campo data ya que no estamos pasandole parametros
                error: function(e){
                    console.log(e.responseText);
                }
            },
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
    }


   
});


    //CREO UNA FUNCION PARA DAR CLIC EN VER Y QUE SE VEA TODO EL DETALLE DEL TICKET DESDE SU CREACION, esta funcion es llamada en el controlador en case "listar_x_usu":
    function ver(caso_id){
        console.log(caso_id);
        
    }


init();