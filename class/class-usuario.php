<?php

    class Usuario
    {
        private $codigo_usuario;
        private $codigo_genero;
        private $nombre;
        private $apellido;
        private $correo;
        private $contrasena;
        private $nacimiento;
        private $telefono;
		private $ubicacion;
		private $tiene_canal;

        public function __construct($codigo_usuario,$codigo_genero,$nombre,$apellido,$correo,$contrasena,
                                    $nacimiento,$telefono,$ubicacion, $tiene_canal)
        {
			$this->codigo_usuario = $codigo_usuario;
			$this->codigo_genero = $codigo_genero;
			$this->nombre = $nombre;
			$this->apellido = $apellido;
			$this->correo = $correo;
			$this->contrasena = $contrasena;
			$this->nacimiento = $nacimiento;
			$this->telefono = $telefono;
			$this->ubicacion = $ubicacion;
			$this->tiene_canal = $tiene_canal;
        }
        
		public function getCodigo_usuario(){
			return $this->codigo_usuario;
		}
		public function setCodigo_usuario($codigo_usuario){
			$this->codigo_usuario = $codigo_usuario;
		}
		public function getCodigo_genero(){
			return $this->codigo_genero;
		}
		public function setCodigo_genero($codigo_genero){
			$this->codigo_genero = $codigo_genero;
		}
		public function getNombre(){
			return $this->nombre;
		}
		public function setNombre($nombre){
			$this->nombre = $nombre;
		}
		public function getApellido(){
			return $this->apellido;
		}
		public function setApellido($apellido){
			$this->apellido = $apellido;
		}
		public function getCorreo(){
			return $this->correo;
		}
		public function setCorreo($correo){
			$this->correo = $correo;
		}
		public function getContrasena(){
			return $this->contrasena;
		}
		public function setContrasena($contrasena){
			$this->contrasena = $contrasena;
		}
		public function getNacimiento(){
			return $this->nacimiento;
		}
		public function setNacimiento($nacimiento){
			$this->nacimiento = $nacimiento;
		}
		public function getTelefono(){
			return $this->telefono;
		}
		public function setTelefono($telefono){
			$this->telefono = $telefono;
		}
		public function getUbicacion(){
			return $this->ubicacion;
		}
		public function setUbicacion($ubicacion){
			$this->ubicacion = $ubicacion;
		}
		public function __toString(){
			return "Codigo_usuario: " . $this->codigo_usuario . 
				" Codigo_genero: " . $this->codigo_genero . 
				" Nombre: " . $this->nombre . 
				" Apellido: " . $this->apellido . 
				" Correo: " . $this->correo . 
				" Contrasena: " . $this->contrasena . 
				" Nacimiento: " . $this->nacimiento . 
				" Telefono: " . $this->telefono . 
				" Ubicacion: " . $this->ubicacion;
        }
        
        //OTROS METODOS
        
        public function ingresarUsuario($conexion)
        {
            $instruccion = sprintf("INSERT INTO tbl_usuarios(codigo_genero, nombre, apellido, correo, contrasena, 
									fecha_nacimiento, telefono, ubicacion, tiene_canal)
                                    VALUES(%s, '%s', '%s', '%s', sha1('%s'), STR_TO_DATE('%s', '%s'), '%s', '%s', 0)",
                                    $conexion->antiInyeccion($this->codigo_genero), 
                                    $conexion->antiInyeccion($this->nombre),
                                    $conexion->antiInyeccion($this->apellido),
                                    $conexion->antiInyeccion($this->correo),
                                    $conexion->antiInyeccion($this->contrasena),
									$conexion->antiInyeccion($this->nacimiento),
									"%d/%m/%Y",
                                    $conexion->antiInyeccion($this->telefono),
									$conexion->antiInyeccion($this->ubicacion));

            $resultado = $conexion->ejecutarConsulta($instruccion);

            if($resultado)
			{
				$msj['mensaje'] = "Se ha agregado el usuario con exito!!!";
				return json_encode($msj);
			}
			else
			{
				$msj['mensaje'] = "No se agrego el usuario!!!";
				return json_encode($msj);
			}

            
		}
		
		public function verificarUsuario($conexion)
		{
			session_start();

			$instruccion = sprintf("SELECT codigo_usuario, nombre, apellido, correo, contrasena,
							 		fecha_nacimiento, tiene_canal
							 		FROM tbl_usuarios
							 		WHERE correo='%s' AND contrasena=sha1('%s')",
							 		$conexion->antiInyeccion($this->correo),
							 		$conexion->antiInyeccion($this->contrasena));

			$resultado = $conexion->ejecutarConsulta($instruccion);
			$num = $conexion->cantidadRegistros($resultado);

			$respuesta = array();

			if($num>0)
			{
				$respuesta = $conexion->obtenerFila($resultado);
				$respuesta["estadoResultado"] = 0;
				$_SESSION["usr"] = $respuesta["correo"];
				$_SESSION["psw"] = $respuesta["contrasena"];
				$_SESSION["nombre"] =$respuesta["nombre"]." ".$respuesta["apellido"];
				$_SESSION["codigo"] = $respuesta["codigo_usuario"];
				
				

			}
			else
			{
				$respuesta["estadoResultado"] = 1;
				session_destroy();
			}

			return json_encode($respuesta);
		}
        
    }

?>