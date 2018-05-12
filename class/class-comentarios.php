<?php

	class Comentarios{

		private $codigo_comentario;
		private $codigo_video;
		private $codigo_usuario;
		private $comentario;
		private $fecha_comentario;

		public function __construct($codigo_comentario,
					$codigo_video,
					$codigo_usuario,
					$comentario,
					$fecha_comentario){
			$this->codigo_comentario = $codigo_comentario;
			$this->codigo_video = $codigo_video;
			$this->codigo_usuario = $codigo_usuario;
			$this->comentario = $comentario;
			$this->fecha_comentario = $fecha_comentario;
		}
		public function getCodigo_comentario(){
			return $this->codigo_comentario;
		}
		public function setCodigo_comentario($codigo_comentario){
			$this->codigo_comentario = $codigo_comentario;
		}
		public function getCodigo_video(){
			return $this->codigo_video;
		}
		public function setCodigo_video($codigo_video){
			$this->codigo_video = $codigo_video;
		}
		public function getCodigo_usuario(){
			return $this->codigo_usuario;
		}
		public function setCodigo_usuario($codigo_usuario){
			$this->codigo_usuario = $codigo_usuario;
		}
		public function getComentario(){
			return $this->comentario;
		}
		public function setComentario($comentario){
			$this->comentario = $comentario;
		}
		public function getFecha_comentario(){
			return $this->fecha_comentario;
		}
		public function setFecha_comentario($fecha_comentario){
			$this->fecha_comentario = $fecha_comentario;
		}
		public function __toString(){
			return "Codigo_comentario: " . $this->codigo_comentario . 
				" Codigo_video: " . $this->codigo_video . 
				" Codigo_usuario: " . $this->codigo_usuario . 
				" Comentario: " . $this->comentario . 
				" Fecha_comentario: " . $this->fecha_comentario;
        }
        
        /**
		 * Funcion que permite obtener los comentarios del video seleccionado
		 */
		public static function obtenerComentarios($conexion, $id){
			$sql = sprintf(
							"SELECT a.comentario, a.fecha_comentario, b.nombre, b.url_imagen_perfil 
							FROM tbl_comentarios a INNER JOIN tbl_usuarios b 
							ON (a.codigo_usuario = b.codigo_usuario) WHERE a.codigo_video = %s", $id
						  );
			$result = $conexion->ejecutarConsulta($sql);
			$comentarios = array();
			while($fila = $conexion->obtenerFila($result)){
				$comentarios[] = $fila;
            }
			return json_encode($comentarios);	  
        }
        

        public function agregarComentario($conexion){
            $sql = sprintf(
                   "INSERT INTO tbl_comentarios(codigo_video, codigo_usuario,
                    comentario, fecha_comentario) 
                    VALUES (%s, %s, '%s',CURDATE())",
                    $conexion->antiInyeccion($this->codigo_video),
                    $conexion->antiInyeccion($this->codigo_usuario),
                    $conexion->antiInyeccion($this->comentario)                    
                );
            $result = $conexion->ejecutarConsulta($sql);
            if($result){
                $sql = sprintf(
                                "SELECT a.comentario, a.fecha_comentario, b.nombre, b.url_imagen_perfil 
                                FROM tbl_comentarios a INNER JOIN tbl_usuarios b 
                                ON (a.codigo_usuario = b.codigo_usuario) WHERE a.codigo_comentario = %s",
                                $conexion->ultimoId()
                              );
                $resultado = $conexion->ejecutarConsulta($sql);
                $comentario = $conexion->obtenerFila($resultado);              
                $comentario["codigo_respuesta"]=0;
                $comentario["mensaje"] ="El comentario no se ingreso con exito";
                            
            }else{
                $comentario["codigo_respuesta"]=1;
                $comentario["mensaje"] ="El comentario no se  ingreso con exito";
            }
            return json_encode($comentario);  
        }
	}
?>