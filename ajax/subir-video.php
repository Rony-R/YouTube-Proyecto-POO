<?php

    if(move_uploaded_file($_FILES["video"]["tmp_name"],"../img/videos/".$_FILES["video"]["name"])){
        echo "Archivo subido exitosamente";
        header("Location: ../formulario-subir-video.html");
    }else{
        header("Location: ../form-videos.html");
    }
?>