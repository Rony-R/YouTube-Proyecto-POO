<?php

    class Configuracion
    {
        private $codigo_config;
        private $codigo_video;
        private $config_comentarios;
        private $config_mostrar;
        private $config_licencia;
        private $config_distribucion;
        private $config_subtitulos;
        private $config_res_edad;
        private $config_fecha_grabacion;
        private $config_estadisticas;
        private $config_contenido;
        private $config_ubicacion;

        public function __construct($codigo_config, $codigo_video, $config_comentarios, $config_mostrar,
					                $config_licencia, $config_distribucion, $config_subtitulos, $config_res_edad,
                                    $config_fecha_grabacion, $config_estadisticas, $config_contenido, 
                                    $config_ubicacion){
			$this->codigo_config = $codigo_config;
			$this->codigo_video = $codigo_video;
			$this->config_comentarios = $config_comentarios;
			$this->config_mostrar = $config_mostrar;
			$this->config_licencia = $config_licencia;
			$this->config_distribucion = $config_distribucion;
			$this->config_subtitulos = $config_subtitulos;
			$this->config_res_edad = $config_res_edad;
			$this->config_fecha_grabacion = $config_fecha_grabacion;
			$this->config_estadisticas = $config_estadisticas;
			$this->config_contenido = $config_contenido;
			$this->config_ubicacion = $config_ubicacion;
        }
        
		public function getCodigo_config(){
			return $this->codigo_config;
		}
		public function setCodigo_config($codigo_config){
			$this->codigo_config = $codigo_config;
		}
		public function getCodigo_video(){
			return $this->codigo_video;
		}
		public function setCodigo_video($codigo_video){
			$this->codigo_video = $codigo_video;
		}
		public function getConfig_comentarios(){
			return $this->config_comentarios;
		}
		public function setConfig_comentarios($config_comentarios){
			$this->config_comentarios = $config_comentarios;
		}
		public function getConfig_mostrar(){
			return $this->config_mostrar;
		}
		public function setConfig_mostrar($config_mostrar){
			$this->config_mostrar = $config_mostrar;
		}
		public function getConfig_licencia(){
			return $this->config_licencia;
		}
		public function setConfig_licencia($config_licencia){
			$this->config_licencia = $config_licencia;
		}
		public function getConfig_distribucion(){
			return $this->config_distribucion;
		}
		public function setConfig_distribucion($config_distribucion){
			$this->config_distribucion = $config_distribucion;
		}
		public function getConfig_subtitulos(){
			return $this->config_subtitulos;
		}
		public function setConfig_subtitulos($config_subtitulos){
			$this->config_subtitulos = $config_subtitulos;
		}
		public function getConfig_res_edad(){
			return $this->config_res_edad;
		}
		public function setConfig_res_edad($config_res_edad){
			$this->config_res_edad = $config_res_edad;
		}
		public function getConfig_fecha_grabacion(){
			return $this->config_fecha_grabacion;
		}
		public function setConfig_fecha_grabacion($config_fecha_grabacion){
			$this->config_fecha_grabacion = $config_fecha_grabacion;
		}
		public function getConfig_estadisticas(){
			return $this->config_estadisticas;
		}
		public function setConfig_estadisticas($config_estadisticas){
			$this->config_estadisticas = $config_estadisticas;
		}
		public function getConfig_contenido(){
			return $this->config_contenido;
		}
		public function setConfig_contenido($config_contenido){
			$this->config_contenido = $config_contenido;
		}
		public function getConfig_ubicacion(){
			return $this->config_ubicacion;
		}
		public function setConfig_ubicacion($config_ubicacion){
			$this->config_ubicacion = $config_ubicacion;
		}
		public function __toString(){
			return "Codigo_config: " . $this->codigo_config . 
				    " Codigo_video: " . $this->codigo_video . 
				    " Config_comentarios: " . $this->config_comentarios . 
				    " Config_mostrar: " . $this->config_mostrar . 
				    " Config_licencia: " . $this->config_licencia . 
				    " Config_distribucion: " . $this->config_distribucion . 
				    " Config_subtitulos: " . $this->config_subtitulos . 
				    " Config_res_edad: " . $this->config_res_edad . 
				    " Config_fecha_grabacion: " . $this->config_fecha_grabacion . 
				    " Config_estadisticas: " . $this->config_estadisticas . 
				    " Config_contenido: " . $this->config_contenido . 
				    " Config_ubicacion: " . $this->config_ubicacion;
        }

        //OTROS METODOS

        public function insertarConfig($conexion)
        {
            $instruccion = sprintf("INSERT INTO tbl_configuraciones(codigo_video, config_comentarios,
                                                 config_mostrar, config_licencia, config_distribucion, 
                                                 config_subtitulos, config_res_edad, config_fecha_grabacion, 
                                                 config_estadisticas, config_contenido, config_ubicacion) 
                                    VALUES (%s, '%s', '%s', '%s', '%s', '%s', '%s', STR_TO_DATE('%s', '%s'), '%s', '%s', '%s')
                                    WHERE ",
                                     $conexion->antiInyeccion($this->codigo_video),
                                     $conexion->antiInyeccion($this->config_comentarios),
                                     $conexion->antiInyeccion($this->config_mostrar),
                                     $conexion->antiInyeccion($this->config_licencia),
                                     $conexion->antiInyeccion($this->config_distribucion),
                                     $conexion->antiInyeccion($this->config_subtitulos),
                                     $conexion->antiInyeccion($this->config_res_edad),
                                     $conexion->antiInyeccion($this->config_fecha_grabacion),
                                     "%d/%m/%Y",
                                     $conexion->antiInyeccion($this->config_estadisticas),
                                     $conexion->antiInyeccion($this->config_contenido),
                                     $conexion->antiInyeccion($this->config_ubicacion));
                                     
            $resultado = $conexion->ejecutarConsulta($instruccion);

            if($resultado)
			{
				$msj['mensaje'] = "Se ha agregado la configuracion!!!";
				return json_encode($msj);
			}
			else
			{
				$msj['mensaje'] = "No se agrego la configuracion!!!";
				return json_encode($msj);
			}
        }

    }

?>