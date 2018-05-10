<?php

	class Canal{

		private $codigo_canal;
		private $codigo_usuario;
		private $nombre_canal;
		private $banner;
		private $foto_canal;
		private $num_videos;
		private $descripcion_canal;
		private $num_suscriptores;

		public function __construct($codigo_canal,
					$codigo_usuario,
					$nombre_canal,
					$banner,
					$foto_canal,
					$num_videos,
					$descripcion_canal,
					$num_suscriptores){
			$this->codigo_canal = $codigo_canal;
			$this->codigo_usuario = $codigo_usuario;
			$this->nombre_canal = $nombre_canal;
			$this->banner = $banner;
			$this->foto_canal = $foto_canal;
			$this->num_videos = $num_videos;
			$this->descripcion_canal = $descripcion_canal;
			$this->num_suscriptores = $num_suscriptores;
		}
		public function getCodigo_canal(){
			return $this->codigo_canal;
		}
		public function setCodigo_canal($codigo_canal){
			$this->codigo_canal = $codigo_canal;
		}
		public function getCodigo_usuario(){
			return $this->codigo_usuario;
		}
		public function setCodigo_usuario($codigo_usuario){
			$this->codigo_usuario = $codigo_usuario;
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
		public function getFoto_canal(){
			return $this->foto_canal;
		}
		public function setFoto_canal($foto_canal){
			$this->foto_canal = $foto_canal;
		}
		public function getNum_videos(){
			return $this->num_videos;
		}
		public function setNum_videos($num_videos){
			$this->num_videos = $num_videos;
		}
		public function getDescripcion_canal(){
			return $this->descripcion_canal;
		}
		public function setDescripcion_canal($descripcion_canal){
			$this->descripcion_canal = $descripcion_canal;
		}
		public function getNum_suscriptores(){
			return $this->num_suscriptores;
		}
		public function setNum_suscriptores($num_suscriptores){
			$this->num_suscriptores = $num_suscriptores;
		}
		public function __toString(){
			return "Codigo_canal: " . $this->codigo_canal . 
				" Codigo_usuario: " . $this->codigo_usuario . 
				" Nombre_canal: " . $this->nombre_canal . 
				" Banner: " . $this->banner . 
				" Foto_canal: " . $this->foto_canal . 
				" Num_videos: " . $this->num_videos . 
				" Descripcion_canal: " . $this->descripcion_canal . 
				" Num_suscriptores: " . $this->num_suscriptores;
        }
        
        /**
         * Funcion que obtiene los canales de la BD
         *
         */
        public static function obtenerCanales($conexion){
            $sql = "SELECT codigo_canal, nombre_canal, foto_canal, num_suscriptores FROM tbl_canales";
            $result = $conexion->ejecutarConsulta($sql);
            $canales = array();
            while($fila = $conexion->obtenerFila($result)){
                $canales[] = $fila;
            }
           

            return json_encode($canales);    
        }
	}
?>