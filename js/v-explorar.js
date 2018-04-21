$(document).ready(function(){
    $.ajax({
        url: "ajax/canales.php",
        success:function(respuesta){
           $("#yt-canales").append(respuesta);
        }
    });
});