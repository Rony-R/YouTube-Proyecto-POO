<?php

   for($i=0; $i<4; $i++){
       echo '<div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12">
              <a href="#" class="d-block">  
                <div class="video-miniatura">
                    <img class="img-fluid" id="miniatura'.$i.'">
                    <div class="descripcion">
                        <a href="#" class="video-title" id="titulo-video'.$i.'"></a>
                        <p class="yt-color video-text" id="informacion'.$i.'"></p>
                    </div>
                </div>
              </a>
             </div>';
   }
?>