<?php

Class Conexion{
	public static function conectar(){
		$servidor = "localhost";
		$user = "root";
		$password = "";
		$database = "ejemplo2";
        $con = mysql_connect($servidor, $user, $password) or die ("Error de conexion al servidor");
        mysql_select_db($database);
        return $con;
	}


}

?>