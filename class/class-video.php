<?php

    class Video
    {
        private $codigo_video;
        private $codigo_canal;
        private $codigo_categoria;
        private $codigo_acceso;
        private $titulo;
        private $descripcion;
        private $url_video;
        private $url_miniatura;
        private $fecha_subida;
        private $visualizaciones;
        private $likes;
        private $dislikes;
        private $msj_usuario;

        public function __construct($codigo_video,$codigo_canal,$codigo_categoria,$codigo_acceso,$titulo,
					                $descripcion,$url_video,$url_miniatura,$fecha_subida,$visualizaciones,
                                    $likes,$dislikes,$msj_usuario)
        {
			$this->codigo_video = $codigo_video;
			$this->codigo_canal = $codigo_canal;
			$this->codigo_categoria = $codigo_categoria;
			$this->codigo_acceso = $codigo_acceso;
			$this->titulo = $titulo;
			$this->descripcion = $descripcion;
			$this->url_video = $url_video;
			$this->url_miniatura = $url_miniatura;
			$this->fecha_subida = $fecha_subida;
			$this->visualizaciones = $visualizaciones;
			$this->likes = $likes;
			$this->dislikes = $dislikes;
			$this->msj_usuario = $msj_usuario;
        }
        
		public function getCodigo_video(){
			return $this->codigo_video;
		}
		public function setCodigo_video($codigo_video){
			$this->codigo_video = $codigo_video;
		}
		public function getCodigo_canal(){
			return $this->codigo_canal;
		}
		public function setCodigo_canal($codigo_canal){
			$this->codigo_canal = $codigo_canal;
		}
		public function getCodigo_categoria(){
			return $this->codigo_categoria;
		}
		public function setCodigo_categoria($codigo_categoria){
			$this->codigo_categoria = $codigo_categoria;
		}
		public function getCodigo_acceso(){
			return $this->codigo_acceso;
		}
		public function setCodigo_acceso($codigo_acceso){
			$this->codigo_acceso = $codigo_acceso;
		}
		public function getTitulo(){
			return $this->titulo;
		}
		public function setTitulo($titulo){
			$this->titulo = $titulo;
		}
		public function getDescripcion(){
			return $this->descripcion;
		}
		public function setDescripcion($descripcion){
			$this->descripcion = $descripcion;
		}
		public function getUrl_video(){
			return $this->url_video;
		}
		public function setUrl_video($url_video){
			$this->url_video = $url_video;
		}
		public function getUrl_miniatura(){
			return $this->url_miniatura;
		}
		public function setUrl_miniatura($url_miniatura){
			$this->url_miniatura = $url_miniatura;
		}
		public function getFecha_subida(){
			return $this->fecha_subida;
		}
		public function setFecha_subida($fecha_subida){
			$this->fecha_subida = $fecha_subida;
		}
		public function getVisualizaciones(){
			return $this->visualizaciones;
		}
		public function setVisualizaciones($visualizaciones){
			$this->visualizaciones = $visualizaciones;
		}
		public function getLikes(){
			return $this->likes;
		}
		public function setLikes($likes){
			$this->likes = $likes;
		}
		public function getDislikes(){
			return $this->dislikes;
		}
		public function setDislikes($dislikes){
			$this->dislikes = $dislikes;
		}
		public function getMsj_usuario(){
			return $this->msj_usuario;
		}
		public function setMsj_usuario($msj_usuario){
			$this->msj_usuario = $msj_usuario;
		}
		public function __toString(){
			return "Codigo_video: " . $this->codigo_video . 
				    " Codigo_canal: " . $this->codigo_canal . 
				    " Codigo_categoria: " . $this->codigo_categoria . 
				    " Codigo_acceso: " . $this->codigo_acceso . 
				    " Titulo: " . $this->titulo . 
				    " Descripcion: " . $this->descripcion . 
				    " Url_video: " . $this->url_video . 
				    " Url_miniatura: " . $this->url_miniatura . 
				    " Fecha_subida: " . $this->fecha_subida . 
				    " Visualizaciones: " . $this->visualizaciones . 
				    " Likes: " . $this->likes . 
				    " Dislikes: " . $this->dislikes . 
				    " Msj_usuario: " . $this->msj_usuario;
        }
        
		//OTROS METODOS

		public function insertarVideo($conexion)
		{
			$instruccion = sprintf("INSERT INTO tbl_videos(codigo_canal, codigo_categoria, 
												codigo_acceso, titulo, descripcion, url_video, url_miniatura,
												 fecha_subida, num_visualizaciones, num_likes, num_dislikes, 
												 mensaje_usuario)
									VALUES (%s, %s, %s,'%s', '%s', '%s','%s', CURDATE(), %s, %s, %s, %s)
									WHERE ",
									 $conexion->antiInyeccion($this->codigo_canal),
									 $conexion->antiInyeccion($this->codigo_categoria),
									 $conexion->antiInyeccion($this->codigo_acceso),
									 $conexion->antiInyeccion($this->titulo),
									 $conexion->antiInyeccion($this->descripcion),
									 $conexion->antiInyeccion($this->url_video),
									 $conexion->antiInyeccion($this->url_miniatura),
									 $conexion->antiInyeccion($this->fecha_subida),
									 $conexion->antiInyeccion($this->visualizaciones),
									 $conexion->antiInyeccion($this->likes),
									 $conexion->antiInyeccion($this->dislikes),
									 $conexion->antiInyeccion($this->msj_usuario));
									 
			$resultado = $conexion->ejecutarInstruccion($instruccion);

			if($resultado)
			{
				$msj['mensaje'] = "Video ingresado con exito!!!";
				return json_encode($msj);
			}
			else
			{
				$msj['mensaje'] = "No se agrego el video!!!";
				return json_encode($msj);
			}
		}

    }

?>