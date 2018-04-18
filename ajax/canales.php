<?php
    $estructura ="";
    for($j=0; $j<4; $j++){
        $estructura = $estructura.'<div class="col-lg-3 col-md-3">
        <div class="container-canal">
            <div class="imagen">
                <img class="imagen-circular ml-4" src="img/goku.jpg">
            </div>
            <div class="footer descripcion">
                <h6>Nombre del canal</h6>
                <p>numero de suscriptores</p>
                <button class="btn bnt-light btn-sm ml-3">SUSCRIBIRSE</button>
            </div>
        </div>
    </div>';
    }
    for($i=0; $i<8; $i++){
        echo ' 
        <div class="content-name">
        Lo Mejor de YouTube
        </div>
    <div class="container">
        <div class="row">'.$estructura.'
            
        </div>
        <hr>
    </div>';
    }

?>