<?php

    if(move_uploaded_file($_FILES["video"]["tmp_name"],"../img/videos/".$_FILES["video"]["name"])){
        echo "Archivo subido exitosamente";
        header("Location: ../formulario-subir-video.php?video=".$_FILES["video"]["name"]);
    }else{
        header("Location: ../form-videos.php");
    }
?>