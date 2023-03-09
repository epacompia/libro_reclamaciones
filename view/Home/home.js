//console.log("test");
function init(){

}



$(document).ready(function(){
    var usu_id=$('#usu_idx').val();



    if( $('#rol_idx').val() ==1)
    
    {
        //PARA EL DASHBOARD Y HALLAR EL TOTTAL
        $.post("../../controller/usuario.php?op=total" , {usu_id:usu_id}, function (data){
            data= JSON.parse(data);
            //console.log(data.TOTAL);
            console.log(data.TOTAL);
            $('#lbltotal').html(data.TOTAL); //AQUI LE MUESTRO EL TOTAL LLAMANDO AL CAMPO lbl que esta seteado en mi vista index
        });

         //PARA EL DASHBOARD Y HALLAR EL TOTTAL DE TICKETS ABIERTOS
        $.post("../../controller/usuario.php?op=totalabiertos" , {usu_id:usu_id}, function (data){
            data= JSON.parse(data);
            //console.log(data.TOTAL);
            //console.log(data.TOTAL);
            $('#lbltotalabiertos').html(data.TOTAL); //AQUI LE MUESTRO EL TOTAL LLAMANDO AL CAMPO lbl que esta seteado en mi vista index
        });

        //PARA EL DASHBOARD Y HALLAR EL TOTTAL DE TICKETS CERRADOS
        $.post("../../controller/usuario.php?op=totalcerrados" , {usu_id:usu_id}, function (data){
            data= JSON.parse(data);
            //console.log(data.TOTAL);
            //console.log(data.TOTAL);
            $('#lbltotalcerrados').html(data.TOTAL); //AQUI LE MUESTRO EL TOTAL LLAMANDO AL CAMPO lbl que esta seteado en mi vista index
        });

        //GRAFICO PARA LA VISTA DE UN USUARIO EN PARTICULAR
        $.post("../../controller/usuario.php?op=grafico", {usu_id:usu_id}, function (data) {
            data = JSON.parse(data);
            //console.log(data);
            
            new Morris.Bar({
                element: 'divgrafico',
                data: data,
                xkey: 'sede',
                ykeys: ['total'],
                labels: ['Value']
            });
        }); 
    
    }else {
       
        //PARA LA VISTA DE SOPORTE 
        $.post("../../controller/caso.php?op=total" , function (data){
            //console.log(data);
            data= JSON.parse(data);
            //console.log(data.TOTAL);
            //console.log(data.TOTAL);
            $('#lbltotal').html(data.TOTAL); //AQUI LE MUESTRO EL TOTAL LLAMANDO AL CAMPO lbl que esta seteado en mi vista index
        });
    
        //PARA EL DASHBOARD Y HALLAR EL TOTTAL DE TICKETS ABIERTOS
        $.post("../../controller/caso.php?op=totalabiertos" ,  function (data){
            data= JSON.parse(data);
            //console.log(data.TOTAL);
            //console.log(data.TOTAL);
            $('#lbltotalabiertos').html(data.TOTAL); //AQUI LE MUESTRO EL TOTAL LLAMANDO AL CAMPO lbl que esta seteado en mi vista index
        });
    
        //PARA EL DASHBOARD Y HALLAR EL TOTTAL DE TICKETS CERRADOS
        $.post("../../controller/caso.php?op=totalcerrados" , function (data){
            data= JSON.parse(data);
            //console.log(data.TOTAL);
            //console.log(data.TOTAL);
            $('#lbltotalcerrados').html(data.TOTAL); //AQUI LE MUESTRO EL TOTAL LLAMANDO AL CAMPO lbl que esta seteado en mi vista index
        });    
        



        $.post("../../controller/caso.php?op=grafico",function (data) {
            data = JSON.parse(data);
            //console.log(data);
            
            new Morris.Bar({
                element: 'divgrafico',
                data: data,
                xkey: 'sede',
                ykeys: ['total'],
                labels: ['Value']
            });
        }); 
    }
}); 

init();