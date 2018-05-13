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
		private $config_ord_coment;
		private $config_valoraciones;
		private $config_insercion;
		private $config_suscripciones;
		private $config_idioma_video;
		private $config_contribucion;

        public function __construct($codigo_config, $codigo_video, $config_comentarios, $config_mostrar,
					                $config_licencia, $config_distribucion, $config_subtitulos, $config_res_edad,
                                    $config_fecha_grabacion, $config_estadisticas, $config_contenido, 
                                    $config_ubicacion,$config_ord_coment,
									 $config_valoraciones,
									 $config_insercion,
									 $config_suscripciones,
									 $config_idioma_video,
									 $config_contribucion){
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
            $this->config_ord_coment = $config_ord_coment;										
            $this->config_valoraciones = $config_insercion;
            $this->config_insercion = $config_insercion;
            $this->config_suscripciones = $config_suscripciones;
            $this->config_idioma_video = $config_idioma_video;
            $this->config_contribucion = $config_contribucion;
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
		public function getConfig_ord_coment(){
			return $this->config_ord_coment;
		}
		public function setConfig_ord_coment($config_ord_coment){
			$this->config_ord_coment = $config_ord_coment;
		}
		public function getConfig_valoraciones(){
			return $this->config_valoraciones;
		}
		public function setConfig_valoraciones($config_valoraciones){
			$this->config_valoraciones = $config_valoraciones;
		}
		public function getConfig_insercion(){
			return $this->config_insercion;
		}
		public function setConfig_insercion($config_insercion){
			$this->config_insercion = $config_insercion;
		}
		public function getConfig_suscripciones(){
			return $this->config_suscripciones;
		}
		public function setConfig_suscripciones($config_suscripciones){
			$this->config_suscripciones = $config_suscripciones;
		}
		public function getConfig_idioma_video(){
			return $this->config_idioma_video;
		}
		public function setConfig_idioma_video($config_idioma_video){
			$this->config_idioma_video = $config_idioma_video;
		}
		public function getConfig_contribucion(){
			return $this->config_contribucion;
		}
		public function setConfig_contribucion($config_contribucion){
			$this->config_contribucion = $config_contribucion;
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
            $instruccion = sprintf(
									"INSERT INTO tbl_configuraciones(codigo_video, 
									config_comentarios, config_mostrar, config_licencia, config_distribucion, config_subtitulos,
									config_res_edad, config_ubicacion, config_fecha_grabacion, config_estadisticas, config_contenido,
									config_ord_coment, config_valoraciones, config_insercion, config_suscripciones, config_idioma_video,
									config_contribucion) 
                                    VALUES (%s, %s, '%s', '%s', %s, %s, %s, '%s',STR_TO_DATE('%s', '%s'), %s, %s, '%s',%s,%s,%s,'%s',%s)",
                                     $conexion->antiInyeccion($this->codigo_video),
                                     $conexion->antiInyeccion($this->config_comentarios),
                                     $conexion->antiInyeccion($this->config_mostrar),
                                     $conexion->antiInyeccion($this->config_licencia),
                                     $conexion->antiInyeccion($this->config_distribucion),
                                     $conexion->antiInyeccion($this->config_subtitulos),
                                     $conexion->antiInyeccion($this->config_res_edad),
									 $conexion->antiInyeccion($this->config_ubicacion),
									 $conexion->antiInyeccion($this->config_fecha_grabacion),
                                     "%d/%m/%Y",
                                     $conexion->antiInyeccion($this->config_estadisticas),
                                     $conexion->antiInyeccion($this->config_contenido),
									 $conexion->antiInyeccion($this->config_ord_coment),
									 $conexion->antiInyeccion($this->config_valoraciones),
									 $conexion->antiInyeccion($this->config_insercion),
									 $conexion->antiInyeccion($this->config_suscripciones),
									 $conexion->antiInyeccion($this->config_idioma_video),
									 $conexion->antiInyeccion($this->config_contribucion));
                                     
            $resultado = $conexion->ejecutarConsulta($instruccion);

            if($resultado)
			{
				$msj["codigo_respuesta"] =0;
				$msj['mensaje'] = "Se ha agregado la configuracion!!!";
				$msj["sql"] = $instruccion;
				return json_encode($msj);
			}
			else
			{
				$msj["codigo_respuesta"] =1;
				$msj['mensaje'] = "No se agrego la configuracion!!!";
				$msj["sql"] = $instruccion;
				return json_encode($msj);
			}
        }

    }

?>