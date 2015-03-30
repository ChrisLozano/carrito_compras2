<?php
session_start();
include('../../lib/conexion.php');
include('lib/class.php');
?>
<!DOCTYPE HTML>
<html>
<head>

</head>
<body>
<?php

$id = $_POST['id'];
$objeto = new Producto();
$registros = $objeto->editar_producto($id);
?>
<h1>Editar Producto </h1>
<form action="actualizar_producto.php" method="post" enctype="multipart/form-data">
<label> Imagen del Producto </label>
<input type="hidden" name="id" value="<?php echo $registros[0]  ?>">
<input type="hidden" name="imagen_actual" value="<?php echo  $registros[1] ?>">
<img src="<?php echo  $registros[1] ?>" width="100" height="100" >
<input type="file" name="imagen">
<br>
<label> Descripcion </label>
<textarea cols="30" rows="5" name="descripcion"><?php echo  $registros[2] ?> </textarea>
<br>
<input type="submit" value="Actualizar Producto">

</form>



</body>

</html>
