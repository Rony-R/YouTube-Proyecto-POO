<?php
    echo '<div class="row ml-2 mt-3">
    <label class="font-weight-bold">Recomendados</label> 
        <div class="col-12 p-0">
            <div class="row no-gutters">
                <div class="foto col-xl-7 col-lg-7 col-md-7">
                    <a href="video-watch.php?id=" class="d-block">
                    <div class="video-miniatura-tendencias mt-3">
                        <img class="img-fluid" src="../img/miniatura.jpg">
                    </div>
                    </a>
                </div>
                <div class=" col-xl-5 col-lg-5 col-md-5">
                    <div class=" ml-2 p-1 mt-2">
                            <a href="video-watch.php?id=" class="video-links">Titulo del Video</a>
                        <p class="video-descripcion yt-color">Nombre del canal <br> # visualizacion
                        </p>
                    </div>
                </div>
            </div>
        </div> 
    </div> ';

    for($i=0; $i<5; $i++){
        echo ' <div class="row ml-2">
        <div class="col-12 p-0">
            <div class="row no-gutters">
                <div class="foto col-xl-7 col-lg-7 col-md-7">
                    <a href="video-watch.php?id=" class="d-block">
                    <div class="video-miniatura-tendencias mt-3">
                        <img class="img-fluid" src="../img/miniatura.jpg">
                    </div>
                    </a>
                </div>
                <div class=" col-xl-5 col-lg-5 col-md-5">
                    <div class=" ml-2 p-1 mt-2">
                            <a href="video-watch.php?id=" class="video-links">Titulo del Video</a>
                        <p class="video-descripcion yt-color">Nombre del canal <br> # visualizacion
                        </p>
                    </div>
                </div>
            </div>
        </div> 
    </div> ';
    }
?>