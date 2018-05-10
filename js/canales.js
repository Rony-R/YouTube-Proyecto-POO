
//generar las miniaturas de los canales (no los canales enteros!!!)
$(document).ready(function(){

    $.ajax({
        url: "ajax/canales-js.php",
        success: function(respuesta){
            $("#div-1").append(respuesta);
            $("#div-2").append(respuesta);
            $("#div-3").append(respuesta);
            $("#div-4").append(respuesta);
            $("#div-5").append(respuesta);
            $("#div-6").append(respuesta);
            $("#div-7").append(respuesta);
            $("#div-8").append(respuesta);
        }
    });

});