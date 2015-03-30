<?php

Class Usuario{

	public function ingresar_usuario($email, $password){
		$sql = "SELECT * FROM usuarios WHERE email = '$email' AND password = AES_ENCRYPT('$password', 'password') AND estatus = 1";
		$result = mysql_query($sql, Conexion::conectar());
		if($num_rows = mysql_num_rows($result) == 1){
			$row = mysql_fetch_array($result);


			$_SESSION['nombre'] = $row[1];
			$_SESSION['email'] = $row[2];
			$_SESSION['privilegios'] = $row[4];


			echo
			'<script>
			window.location.href="index.php";
			</script>';


		}else{
	//echo $sql;
			echo '<p>Usuario o password incorrectos</p>';
		}

	}


	public function registrar_usuario($nombre, $email, $password){

		$sql = "INSERT INTO usuarios (nombre, email, password, privilegios, estatus) VALUES ('$nombre', '$email', AES_ENCRYPT('$password', 'password'), 2, 1)";
		$result = mysql_query($sql, Conexion::conectar());
		if($result){
			echo
			'<script>
			alert("Usuario registrado con exito");
			window.location.href="login.php";
			</script>';
		}else{
			echo '<p style="color: red"> El email ingresado ya existe en la Base de datos </p>';

		}

	}

}


class Comentario{

	private $registros;

	public function __construct(){
		$this->registros = array();
	}

	public function ingresar_comentario($nombre, $email, $comentario){
		$sql = "SELECT * FROM comentarios WHERE email = '$email' AND estatus = 0 ";
		$result = mysql_query($sql, Conexion::conectar());
		$num_rows= mysql_num_rows($result);
		if($num_rows > 2){
			echo '<p style="color: red">Tu comentario no pudo ser enviado, ya que actualmente tienes 2 comentarios pendientes por ser revisados por el Administrador.</p>';
		}else{ 
			$sql = "INSERT INTO comentarios(nombre, email, comentario, fecha, estatus) VALUES ('$nombre', '$email', '$comentario', NOW(), 0)";
			$result = mysql_query($sql, Conexion::conectar());
			echo '<script>
			alert("Tu comentario fue enviado con exito.\nEn breve sera procesado por el administrador para ser publicado.");
			</script>';
		}
	}

	public function listar_comentarios(){
		$sql = "SELECT * FROM comentarios WHERE estatus = 1";
		$result = mysql_query($sql, Conexion::conectar());
		//echo $num_rows = mysql_num_rows($result);
		while($row = mysql_fetch_assoc($result) ){
    	  $this->registros[] = $row; 
    }
		return $this->registros;

	}

}

?>