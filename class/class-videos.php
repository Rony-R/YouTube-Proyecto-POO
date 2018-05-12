<?php

	class Videos{

		private $codigo_video;
		private $codigo_canal;
		private $codigo_categoria;
		private $titulo;
		private $descripcion;
		private $url_video;
		private $url_miniatura;
		private $fecha_subida;
		private $num_visualizaciones;
		private $num_likes;
		private $num_dislikes;
		private $mensaje_usuario;
		private $acceso;

		public function __construct($codigo_video,
					$codigo_canal,
					$codigo_categoria,
					$titulo,
					$descripcion,
					$url_video,
					$url_miniatura,
					$fecha_subida,
					$num_visualizaciones,
					$num_likes,
					$num_dislikes,
					$mensaje_usuario,
					$acceso){
			$this->codigo_video = $codigo_video;
			$this->codigo_canal = $codigo_canal;
			$this->codigo_categoria = $codigo_categoria;
			$this->titulo = $titulo;
			$this->descripcion = $descripcion;
			$this->url_video = $url_video;
			$this->url_miniatura = $url_miniatura;
			$this->fecha_subida = $fecha_subida;
			$this->num_visualizaciones = $num_visualizaciones;
			$this->num_likes = $num_likes;
			$this->num_dislikes = $num_dislikes;
			$this->mensaje_usuario = $mensaje_usuario;
			$this->acceso = $acceso;
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
		public function getNum_visualizaciones(){
			return $this->num_visualizaciones;
		}
		public function setNum_visualizaciones($num_visualizaciones){
			$this->num_visualizaciones = $num_visualizaciones;
		}
		public function getNum_likes(){
			return $this->num_likes;
		}
		public function setNum_likes($num_likes){
			$this->num_likes = $num_likes;
		}
		public function getNum_dislikes(){
			return $this->num_dislikes;
		}
		public function setNum_dislikes($num_dislikes){
			$this->num_dislikes = $num_dislikes;
		}
		public function getMensaje_usuario(){
			return $this->mensaje_usuario;
		}
		public function setMensaje_usuario($mensaje_usuario){
			$this->mensaje_usuario = $mensaje_usuario;
		}
		public function getAcceso(){
			return $this->acceso;
		}
		public function setAcceso($acceso){
			$this->acceso = $acceso;
		}
		public function __toString(){
			return "Codigo_video: " . $this->codigo_video . 
				" Codigo_canal: " . $this->codigo_canal . 
				" Codigo_categoria: " . $this->codigo_categoria . 
				" Titulo: " . $this->titulo . 
				" Descripcion: " . $this->descripcion . 
				" Url_video: " . $this->url_video . 
				" Url_miniatura: " . $this->url_miniatura . 
				" Fecha_subida: " . $this->fecha_subida . 
				" Num_visualizaciones: " . $this->num_visualizaciones . 
				" Num_likes: " . $this->num_likes . 
				" Num_dislikes: " . $this->num_dislikes . 
				" Mensaje_usuario: " . $this->mensaje_usuario . 
				" Acceso: " . $this->acceso;
        }
		
		/**
		 * Funcion que obtiene los videos del servidor 
		 */
        public static function obtenerVideos($conexion){
            $sql = "SELECT a.codigo_video ,a.titulo ,a.num_visualizaciones, a.fecha_subida, a.url_miniatura, b.nombre_canal,c.categoria 
            FROM tbl_videos a 
            INNER JOIN tbl_canales b ON (a.codigo_canal = b.codigo_canal)
            INNER JOIN tbl_categorias c ON (a.codigo_categoria = c.codigo_categoria)
            ORDER BY a.codigo_video ASC";
            $result = $conexion->ejecutarConsulta($sql);
			$videos = array();
            while($fila = $conexion->obtenerFila($result)){
				$videos[] = $fila;
			}
			$videos[]["categorias"] = self::obtenerCategorias($conexion);
            return json_encode($videos);

		}
		/**
		 * Funcion que permite obtener los videos mendiante el ID del video
		 */
		public static function obtenerVideosById($conexion,$id){
			$sql = sprintf(
				"SELECT  a.titulo, a.descripcion, a.url_video,
				a.url_miniatura, a.fecha_subida, a.num_visualizaciones, a.num_likes, 
				a.num_dislikes, a.mensaje_usuario, a.codigo_categoria, b.nombre_canal, b.foto_canal,b.num_suscriptores
				FROM tbl_videos a INNER JOIN tbl_canales b 
				ON (a.codigo_canal = b.codigo_canal) WHERE a.codigo_video = %s",$id);
			$result = $conexion->ejecutarConsulta($sql);
			$video  = $conexion->obtenerFila($result);
			return json_encode($video);	
		}/**
		 * Funcion que permite obtener videos relaciones con la categoria del video seleccionado 
		 */
		public static function obtenerVideosRecomendados($conexion,$idCategoria, $idVideo){
			$sql =sprintf(
				"SELECT a.codigo_video ,a.titulo ,a.num_visualizaciones, 
				 a.fecha_subida, a.url_miniatura, b.nombre_canal
				 FROM tbl_videos a INNER JOIN tbl_canales b 
				 ON (a.codigo_canal = b.codigo_canal) WHERE a.codigo_categoria = %s AND a.codigo_video!= %s",
				 $idCategoria,$idVideo);
			$result = $conexion->ejecutarConsulta($sql);
			$recomendados = array();
			while($fila = $conexion->obtenerFila($result)){
				$recomendados[] = $fila;
			}

			return json_encode($recomendados);

		}

		/**
		 * Funcion que permite traer los videos con mayor numero de visualizaciones
		 */
		public static function obtenerTendencias($conexion){
			$sql ="SELECT a.codigo_video, a.titulo, a.descripcion, a.url_miniatura, 
			a.fecha_subida, a.num_visualizaciones, b.nombre_canal  
			FROM tbl_videos a INNER JOIN 
			tbl_canales b  ON (a.codigo_canal = b.codigo_canal) 
			ORDER BY num_visualizaciones DESC";
			$result = $conexion->ejecutarConsulta($sql);
			$tendencias = array();
			while($fila = $conexion->obtenerFila($result)){
				$tendencias[] = $fila;
			}

			return json_encode($tendencias);
			
		}
		/**
		 * Funcion que permite buscar los videos segun las letras que ingrese el usaurio
		 */
		public static function buscarVideos($conexion,$texto){
			$sql = sprintf("SELECT a.codigo_video, a.titulo, a.descripcion, a.url_miniatura, 
							a.num_visualizaciones,a.fecha_subida, c.nombre_canal  FROM tbl_videos a INNER JOIN tbl_categorias b 
							ON (a.codigo_categoria = b.codigo_categoria)INNER JOIN tbl_canales c 
							ON (a.codigo_canal =c.codigo_canal)
							WHERE a.titulo LIKE '%s%s%s' OR b.categoria LIKE '%s%s%s'
							OR c.nombre_canal LIKE '%s%s%s'",
							"%",$conexion->antiInyeccion($texto),"%",
							"%",$conexion->antiInyeccion($texto),"%",
							"%",$conexion->antiInyeccion($texto),"%");
			$result = $conexion->ejecutarConsulta($sql);
			$busqueda = array();
			while($fila = $conexion->obtenerFila($result)){
				$busqueda[] =$fila;
			}
			$busqueda[]["numero"] = $conexion->cantidadRegistros($result);

			return json_encode($busqueda);
		}

		/**
		 * Funcion que obtiene las categorias de los videos en la BD
		 */
		private static function obtenerCategorias($conexion){
			$sql = "SELECT DISTINCT  a.categoria FROM tbl_categorias a 
			INNER JOIN tbl_videos b ON (a.codigo_categoria = b.codigo_categoria)";
			$result = $conexion->ejecutarConsulta($sql);
			$categorias = array();
			while($fila = $conexion->obtenerFila($result))
				$categorias[] = $fila;
			
			return $categorias;
		}
		
		/**
		 * Funcion que obtiene las tendencias de videos de un usuario especifico
		 */
		public static function entrenarRed($conexion,$id){
			$sql = sprintf(
					"SELECT porcentaje_clicks FROM tbl_info_red WHERE codigo_usuario =%s",
					$conexion->antiInyeccion($id)
				);
			$result = $conexion->ejecutarConsulta($sql);
			$info = array();
			while($fila = $conexion->obtenerFila($result)){
				$info[] = $fila;
			}

			return json_encode($info);
		}

		/**
		 * Funcion que interpreta la funcionalidad de la red neuronal
		 */
		public static function redRecomendados($conexion,$id){
			$sql = sprintf("SELECT DISTINCT a.codigo_video ,a.titulo ,a.num_visualizaciones, a.fecha_subida, a.url_miniatura, b.nombre_canal,c.categoria 
					FROM tbl_videos a 
					INNER JOIN tbl_canales b ON (a.codigo_canal = b.codigo_canal)
					INNER JOIN tbl_categorias c ON (a.codigo_categoria = c.codigo_categoria)
					INNER JOIN tbl_info_red d ON (a.codigo_categoria = d.codigo_categoria)
					WHERE d.porcentaje_clicks >= 50  AND d.codigo_usuario = %s
					ORDER BY a.codigo_video ASC LIMIT 4",$conexion->antiInyeccion($id));
			$result = $conexion->ejecutarConsulta($sql);
			$infoRecomendados = array();
			while($fila = $conexion->obtenerFila($result)){
				$infoRecomendados [] = $fila;
			 }
			 
			return json_encode($infoRecomendados);
		}

		public function insertarVideo($conexion)
		{
			$instruccion = sprintf("INSERT INTO tbl_videos(codigo_canal, codigo_categoria, 
												codigo_acceso, titulo, descripcion, url_video, url_miniatura,
												 fecha_subida, num_visualizaciones, num_likes, num_dislikes, 
												 mensaje_usuario)
									VALUES (%s, %s, %s,'%s', '%s', '%s','%s', CURDATE(), %s, %s, %s, '%s')",
									 $conexion->antiInyeccion($this->codigo_canal),
									 $conexion->antiInyeccion($this->codigo_categoria),
									 $conexion->antiInyeccion($this->acceso),
									 $conexion->antiInyeccion($this->titulo),
									 $conexion->antiInyeccion($this->descripcion),
									 $conexion->antiInyeccion($this->url_video),
									 $conexion->antiInyeccion($this->url_miniatura),
									 $conexion->antiInyeccion($this->fecha_subida),
									 $conexion->antiInyeccion($this->num_visualizaciones),
									 $conexion->antiInyeccion($this->num_likes),
									 $conexion->antiInyeccion($this->num_dislikes),
									 $conexion->antiInyeccion($this->mensaje_usuario));
									 
			$resultado = $conexion->ejecutarConsulta($instruccion);

			if($resultado)
			{
				$msj['estado'] = 0;
				$msj['mensaje'] = "Video ingresado con exito!!!";
				$msj['ultimoId'] = $conexion->ultimoId();
				$msj["sql"] = $instruccion;
			}
			else
			{
				$msj['estado'] = 1;
				$msj['mensaje'] = "No se agrego el video!!!";
				$msj["sql"] = $instruccion;
			}
			return json_encode($msj);
		}
           
	}
	
    
?>