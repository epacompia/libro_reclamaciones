var tabla;

function init() {
    $('#usuario_form').on("submit", function(e){
        guardaryeditar(e);
    });
}

function guardaryeditar(e){
    e.preventDefault();
	var formData = new FormData($("#usuario_form")[0]);
    $.ajax({
        url: "../../controller/usuario.php?op=guardaryeditar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(datos){    
            console.log(datos);
            $('#usuario_form')[0].reset();
            $("#modalmantenimiento").modal('hide');
            $('#usuario_data').DataTable().ajax.reload();

            swal({
                title: "Informatica - Dircocor!",
                text: "Usuario Registrado.",
                type: "success",
                confirmButtonClass: "btn-success"
            });
        }
    }); 
}





//ESTEE CODIGO ES PARA EL DATATABLE
$(document).ready(function () {
    //console.log(usu_id);

    tabla = $('#usuario_data').dataTable({
        "aProcessing": true,
        "aServerSide": true,
        dom: 'Bfrtip',
        "searching": true,
        lengthChange: false,
        colReader: true,
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ],
        "ajax": {
            url: '../../controller/usuario.php?op=listar',   //TENER EN CUENTA ESTE LLAMADO DEL AJAX
            type: "post",
            dataType: "json",
            //data:{ usu_id : usu_id},  //no llamara este campo data ya que no estamos pasandole parametros
            error: function (e) {
                console.log(e.responseText);
            }
        },
        "ordering": false,
        "bDestroy": true,
        "responsive": true,
        "bInfo": true,
        "iDisplayLength": 10,
        "autoWidth": false,
        "language": {
            "sProcessing": "Procesando...",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Ningun dato disponible en esta tabla",
            "sInfo": "Mostrando un total de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando un total de 0 registros",
            "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix": "",
            "sSearch": "Buscar:",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente",
            }
        }

    }).DataTable();

});

function editar(usu_id) {
    //llamo a mi modal pero le paso para el titulo editar registro y luego lo muestro con modal
    $('#mdltitulo').html('Editar registro');

    $.post("../../controller/usuario.php?op=mostrar", { usu_id: usu_id }, function (data) {


        data = JSON.parse(data);
        console.log(data);

        $('#usu_id').val(data.usu_id);
        $('#usu_nombre').val(data.usu_nombre);
        $('#usu_apellido').val(data.usu_apellido);
        $('#usu_correo').val(data.usu_correo);
        $('#usu_password').val(data.usu_password);
        $('#rol_id').val(data.rol_id).trigger('change');
        $('#usu_celular').val(data.usu_celular);
        $('#usu_tipo_documento').val(data.usu_tipo_documento).trigger('change');
        $('#usu_numero_documento').val(data.usu_numero_documento);

       
        // Obtener la fecha del objeto 'data'
        var fecha = data.fech_nacimiento;
        // Crear un objeto de fecha con la cadena de fecha
        var fechaObj = new Date(fecha);
        // Obtener el elemento HTML del campo de fecha
        var campoFecha = document.getElementById('fech_nacimiento');
        // Asignar la fecha al valor del campo de fecha
        campoFecha.value = fechaObj.toISOString().substr(0, 10);


    });

    $('#modalmantenimiento').modal('show');
}

function eliminar(usu_id) {
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
        function (isConfirm) {
            if (isConfirm) {

                //ESTE CODIGO ES PARA ACTUALIZAR PRIMERO EL ESTADO A CERRADO DEL TICKET DESPUES DE CONFIRMAR EL CERRADO
                $.post("../../controller/usuario.php?op=eliminar", { usu_id: usu_id }, function (data) {

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
$(document).on("click", "#btnnuevo", function () {
    // console.log("dfsdfsdf");
    $('#mdltitulo').html('Nuevo Registro');
    $('#usuario_form')[0].reset();
    $('#modalmantenimiento').modal('show');
});





init();