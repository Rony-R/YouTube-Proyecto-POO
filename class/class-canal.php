<?php

    class Canal
    {
        private $nombre_canal;
        private $banner;
        private $asset;  //foto de perfil del canal
		private $subs;
		private $descripcion;

        public function __construct($nombre_canal,$banner,$asset,$subs, $descripcion)
        {
			$this->nombre_canal = $nombre_canal;
			$this->banner = $banner;
			$this->asset = $asset;
			$this->subs = $subs;
			$this->descripcion = $descripcion;
        }
        
		public function getNombre_canal(){
			return $this->nombre_canal;
		}
		public function setNombre_canal($nombre_canal){
			$this->nombre_canal = $nombre_canal;
		}
		public function getBanner(){
			return $this->banner;
		}
		public function setBanner($banner){
			$this->banner = $banner;
		}
		public function getAsset(){
			return $this->asset;
		}
		public function setAsset($asset){
			$this->asset = $asset;
		}
		public function getSubs(){
			return $this->subs;
		}
		public function setSubs($subs){
			$this->subs = $subs;
		}
		public function getDescripcion(){
			return $this->descripcion;
		} 
		public function setDescripcion($descripcion){
			$this->descripcion = $descripcion;
		}
        public function toString()
        {
			return "Nombre_canal: " . $this->nombre_canal . 
				    " Banner: " . $this->banner . 
				    " Asset: " . $this->asset . 
					" Subs: " . $this->subs .
					"Descripcion: " . $this->descripcion;
        }
        
		//OTROS METODOS
		public function obtenerInfo($conexion)
		{
			$instruccion = sprintf("SELECT codigo_canal, codigo_usuario, nombre_canal, banner, foto_canal, num_videos, descripcion_canal, num_suscriptores
							FROM tbl_canales
							WHERE nombre_canal='%s'",
							$conexion->antiInyeccion($this->nombre_canal));
			$resultado = $conexion->ejecutarInstruccion($instruccion);
			
			$informacion = $conexion->obtenerFila($resultado);

			return json_encode($informacion);
		}
		
    }

?>