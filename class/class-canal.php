<?php

    class Canal
    {
        private $nombre_canal;
        private $banner;
        private $asset;  //foto de perfil del canal
		private $subs;
		private $descripcion;

		private $codigo_canal;
		private $codigo_usuario;
		private $num_videos;
		private $num_suscriptores;

		public function __construct($nombre_canal,$banner,$asset,$subs, $descripcion, $codigo_canal, $codigo_usuario,
									$num_videos, $num_suscriptores)
        {
			$this->nombre_canal = $nombre_canal;
			$this->banner = $banner;
			$this->asset = $asset;
			$this->subs = $subs;
			$this->descripcion = $descripcion;
			$this->codigo_canal = $codigo_canal;
			$this->codigo_usuario = $codigo_usuario;
			$this->num_videos = $num_videos;
			$this->num_suscriptores = $num_suscriptores;
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
		
		public function crearCanal($conexion)
		{
			$instruccion = sprintf("INSERT INTO tbl_canales(codigo_usuario, nombre_canal, banner,
											    foto_canal, num_videos, descripcion_canal, num_suscriptores)
									 VALUES (%s,'%s','%s','%s',%s,'%s',%s)",
									 $conexion->antiInyeccion($this->codigo_usuario),
									 $conexion->antiInyeccion($this->nombre_canal),
									 $conexion->antiInyeccion($this->banner),
									 $conexion->antiInyeccion($this->asset),
									 $conexion->antiInyeccion($this->num_videos),
									 $conexion->antiInyeccion($this->descripcion),
									 $conexion->antiInyeccion($this->num_suscriptores));

			$instruccion2 = sprintf("UPDATE tbl_usuarios SET tiene_canal= 1
									 WHERE codigo_usuario= %s",
									 $conexion->antiInyeccion($this->codigo_usuario));

			$resultado = $conexion->ejecutarConsulta($instruccion);
			$resultado2 = $conexion->ejecutarConsulta($instruccion2);

			if($resultado)
			{
				//$msj['mensaje'] = "Se ha agregado creado el canal con exito!!!";
				//return json_encode($msj);
				$canal['nombre'] = $this->nombre_canal;
			}
			else
			{
				$canal['nombre'] = "No se creo el canal!!!";
			}

			return json_encode($canal);

		}

		public function verificacionCanal($conexion)
		{
			$instruccion = sprintf("SELECT codigo_canal, codigo_usuario, nombre_canal, banner, foto_canal,
									 num_videos, descripcion_canal, num_suscriptores 
									 FROM tbl_canales 
									 WHERE codigo_usuario= %s",
									 $conexion->antiInyeccion($this->codigo_usuario));

			$resultado = $conexion->ejecutarConsulta($instruccion);

			$fila = $conexion->obtenerFila($resultado);

			if($conexion->cantidadRegistros($resultado) > 0)
			{
				$respuesta["tieneCanal"] = 1;
				$respuesta["dato"] = $fila["nombre_canal"];
			}
			else
			{
				$respuesta["tieneCanal"] = 0;
				$respuesta["dato"] = "El usuario no tiene canal";
			}

			return json_encode($respuesta);

		}

		public function obtenerCodigoCanal($conexion)
		{
			$instruccion = sprintf("SELECT codigo_canal, codigo_usuario, nombre_canal, banner, foto_canal,
									 num_videos, descripcion_canal, num_suscriptores 
									 FROM tbl_canales 
									 WHERE codigo_usuario= %s",
									 $conexion->antiInyeccion($this->codigo_usuario));

			$resultado = $conexion->ejecutarConsulta($instruccion);

			$fila = $conexion->obtenerFila($resultado);

			if($conexion->cantidadRegistros($resultado) > 0)
			{
				$respuesta["codigoCanal"] = $fila["codigo_canal"];
			}
			else
			{
				$respuesta["codigoCanal"] = "El usuario no tiene canal";
			}

			return json_encode($respuesta);
		}
           

            return json_encode($canales);    
        }
		
    }

?>