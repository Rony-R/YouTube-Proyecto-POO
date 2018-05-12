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
        public function __toString()
        {
			return "Nombre_canal: " . $this->nombre_canal . 
				    " Banner: " . $this->banner . 
				    " Asset: " . $this->asset . 
					" Subs: " . $this->subs .
					" Descripcion: " . $this->descripcion;
        }
        
		//OTROS METODOS
		public function obtenerInfo($conexion)
		{
			$instruccion = sprintf("SELECT codigo_canal, codigo_usuario, nombre_canal, banner, foto_canal, num_videos,
										   descripcion_canal, num_suscriptores
									FROM tbl_canales
									WHERE nombre_canal='%s'",
									$conexion->antiInyeccion($this->nombre_canal));
			$resultado = $conexion->ejecutarConsulta($instruccion);
			
			$informacion = $conexion->obtenerFila($resultado);

			//$datos = array('codigo_canal=' $informacio["codigo_canal"], 'nombre-canal=' $informacio["nombre-canal"]);

			$arreglo = http_build_query($informacion);

			//return json_encode($informacion);
			return  json_encode($arreglo);
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
		
		/**
		 * Funcion que obtiene todos los canales que el usuario no esta susrito
		 */
		public static function obtenerNoSuscrito($conexion, $id){
			$sql = sprintf(
					"SELECT DISTINCT a.codigo_canal, a.nombre_canal, a.foto_canal, a.num_suscriptores
					 FROM tbl_canales a
					 WHERE a.codigo_canal  NOT IN( SELECT codigo_canal FROM tbl_suscripciones WHERE codigo_usuario =%s)",
					 $conexion->antiInyeccion($id));
			$result = $conexion->ejecutarConsulta($sql);
			$canales = array();
			while($fila = $conexion->obtenerFila($result)){
				$canales [] = $fila;
			}		
			return json_encode($canales);
		}
		
		/**
		 * Funcion que permite al usuario suscribirse a un canal
		 */
		public static function suscribirseCanal($conexion,$idUsuario, $idCanal){
			$idCanalCleen = $conexion->antiInyeccion($idCanal);
			$idUsuarioCleen = $conexion->antiInyeccion($idUsuario);
			$sql = sprintf(
					"SELECT codigo_canal, codigo_usuario FROM tbl_suscripciones 
					WHERE codigo_canal=%s AND codigo_usuario=%s",
					$idCanalCleen, $idUsuarioCleen
					);
			$resultado = $conexion->ejecutarConsulta($sql);
			$cantidad = $conexion->cantidadRegistros($resultado);
			if($cantidad==0){
				$sqlInsert = sprintf("INSERT INTO tbl_suscripciones(codigo_canal, codigo_usuario) VALUES (%s,%s)",
									$idCanalCleen,$idUsuarioCleen);
				$resultInsert = $conexion->ejecutarConsulta($sqlInsert);
				if($resultInsert){
					$respuesta["codigo_respuesta"] = 0;
					$respuesta["mensaje"] = "El usuario se suscribio correctamente";
					$respuesta["estado"] = "UNSUSCRIBE";
				}else{
					$respuesta["codigo_respuesta"] = 1;
					$respuesta["mensaje"] = "El usuario no pudo suscribirse";
				}
			}	
			
			return json_encode($respuesta);
		}

		/**
		 * Funcion que permite al usuario desuscribirse a un canal
		 */
		public static function unsuscribeCanal($conexion,$idUsuario, $idCanal){
			$idCanalCleen = $conexion->antiInyeccion($idCanal);
			$idUsuarioCleen = $conexion->antiInyeccion($idUsuario);
			$sql = sprintf(
					"SELECT codigo_canal, codigo_usuario FROM tbl_suscripciones 
					WHERE codigo_canal=%s AND codigo_usuario=%s",
					$idCanalCleen, $idUsuarioCleen
					);
			$resultado = $conexion->ejecutarConsulta($sql);
			$cantidad = $conexion->cantidadRegistros($resultado);
			if($cantidad==1){
				$sqlInsert = sprintf("DELETE FROM tbl_suscripciones WHERE codigo_canal=%s AND codigo_usuario=%s",
									$idCanalCleen,$idUsuarioCleen);
				$resultInsert = $conexion->ejecutarConsulta($sqlInsert);
				if($resultInsert){
					$respuesta["codigo_respuesta"] = 0;
					$respuesta["mensaje"] = "El usuario se desuscribio correctamente";
					$respuesta["estado"] = "SUSCRIBIRSE";
				}else{
					$respuesta["codigo_respuesta"] = 1;
					$respuesta["mensaje"] = "El usuario no pudo desuscribirse";
				}
			}	
			
			return json_encode($respuesta);
		}
    }

?>