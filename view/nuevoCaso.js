//METODO AJAX CREO EL INIT PARA GUARDAR EL TICKET
function init(){
	$("#caso_form").on("submit", function(e){  //aqui va el id del formulario ticket_form
		guardaryeditar(e);
	});
} 



//CODIGO PARA EL SUMMERNOTE
$(document).ready(function() {
    $('#caso_descripcion').summernote({
       height:350
   });

   //CODIGO PARA EL COMBO SEDE DE LA VENTANA NUEVO CASO
    $.post("../../controller/sede.php?op=combo", function(data, status){
        $('#sede_id').html(data);
    });

    //CODIGO PARA EL COMBO DE TIPO DOCUMENTO DE LA VENTANA NUEVO CASO
    // $.post("../../controller/tipo_documento.php?op1=combo1", function(data, status){
    //     $('#tipo_docu_id').html(data);
    // });
});



//FUNCION GUARDARYEDITAR()
function guardaryeditar(e){
	e.preventDefault(); //para que no se dispare varias veces el boton
	var formData=new FormData($("#caso_form")[0]);
	$.ajax({
		url:"../../controller/caso.php?op=insert",
		type: "POST",
		data:formData,
		contentType:false,
		processData: false,
		success: function(datos){
			//console.log(datos);
			$('#caso_date').val('');
			$('#caso_titulo').val(''); //AQUI LLAMO A LOS CAMPOS DESPUES DE QUE SE EJECUTO EL AJAX PARA LIMPIAR SUS CAJAS Y DEJARLO EN VACIO DESPUES DE AGREGAR
			$('#caso_descripcion').summernote('reset'); //AQUI BORRO LA INFORMACION DEL TEXAREA LLAMANDO A SUMMERNOTE PARA LIMPIARLO Y RESET

			swal("Correcto!","Registrado Correctamente","success");  //con esta linea de codigo agrego el sweet alert
		}
	});
 }




//INICIALIZO EL INIT
init();