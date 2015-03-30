<?php

class Producto{

private $registros; //Este variable sera la encarga de obtener registros y guardarlos en un arreglo

public function __construct(){

$this->registros = array();

}

public  function listar_productos(){
$sql = "SELECT * FROM productos";
$result = mysql_query($sql, Conexion::conectar());
while($row = mysql_fetch_assoc($result)){

	$this->registros[] = $row;
}

return $this->registros;

}

public  function listar_productos_categoria($categoria){
$sql = "SELECT * FROM productos WHERE idCategoria = $categoria";
$result = mysql_query($sql, Conexion::conectar());
while($row = mysql_fetch_assoc($result)){

	$this->registros[] = $row;
}

return $this->registros;

}


public function listar_categorias(){
$sql = "SELECT * FROM categorias";
$result = mysql_query($sql, Conexion::conectar());
while($row = mysql_fetch_assoc($result)){

	$this->registros[] = $row;
}

return $this->registros;

}


public  function agregar_producto($rutaDestino, $sku, $nombre, $stock, $precio, $categoria, $descripcion){
$sql= "INSERT INTO productos (imagen, sku, nombre, stock, precio, idCategoria, descripcion) VALUES ('$rutaDestino',  '$sku', '$nombre', '$stock', '$precio', $categoria , '$descripcion')";
$result= mysql_query($sql, conexion::conectar());

if($result){

	echo
		'<script>
			alert("Producto registrado con exito");
			window.location.href="index.php";
		</script>';
}else{

	//echo mysql_error();
	echo $sql;
}


}


public function editar_producto($id){
$sql = "SELECT * FROM productos WHERE id = $id";
$result = mysql_query($sql,Conexion::conectar());
$row = mysql_fetch_array($result);
$this->registros = $row;
return $this->registros;

}


public function actualizar_producto($id, $rutaDestino, $descripcion){
$sql="UPDATE productos SET imagen = '$rutaDestino', descripcion = '$descripcion' WHERE id = $id";
$result = mysql_query($sql,Conexion::conectar());
//echo $sql;

}

public function eliminar_producto($id){
$sql = "DELETE FROM productos WHERE id = $id";
$result = mysql_query($sql, Conexion::conectar());
echo
		'<script>
			window.location.href="index.php";
		</script>';

}


}