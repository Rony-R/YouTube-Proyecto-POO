<?php

    for($i=0; $i<4; $i++)
    {
        echo '<div class="col-lg-3 col-md-3">
                <div id="canal '.$i.'" class="container-canal">
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

?>