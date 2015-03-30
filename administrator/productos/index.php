<?php
session_start();
include('../../lib/conexion.php');
include('lib/class.php');
?>
<!DOCTYPE HTML>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
	<script src="../../js/jquery.js"></script>
	<script src="../../js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<h1>Gestion de Productos </h1>
<a href="agregar_producto.php" class="btn btn-success">Agregar Producto </a>
<br><br>
<table class="table table-hover">

<tr style="font-weight:bold">
	<td>Imagen</td>
	<td>SKU</td>
	<td>Nombre</td>
	<td>Stock</td>
	<td>Precio</td>
	<td>Categoria</td>
	<td>Descripcion</td>
	<td>Editar</td>
	<td>Eliminar</td>
</tr>
<?php
$objeto = new Producto();

$registros = $objeto->listar_productos();
for($i=0; $i<sizeof($registros); $i++ ){
?>
<tr>
	<td><img src="<?php echo $registros[$i]['imagen']; ?>" width="125" height="125"></td>
	<td> <?php echo $registros[$i]['sku']; ?></td>
	<td><?php echo $registros[$i]['nombre']; ?> </td>
	<td><?php echo $registros[$i]['stock']; ?> </td>
	<td><?php echo $registros[$i]['precio']; ?> </td>
	<td><?php echo $registros[$i]['idCategoria']; ?> </td>
	<td><?php echo $registros[$i]['descripcion']; ?></td>
	<td>
		<form action="editar_producto.php" method="post">
			<input type="hidden"  name="id" value="<?php echo $registros[$i]['id']; ?> ">
			<input type="submit" class="btn btn-warning" value="Editar">
		</form> 
	</td>
	<td>

		<form action="eliminar_producto.php" method="post">
			<input type="hidden"  name="id"  value="<?php echo $registros[$i]['id']; ?> ">
			<input type="submit" class="btn btn-danger" value="Eliminar">
		</form> 

	</td>
</tr>
<?php
}
?>

</table>	


			
		</div>

	</div>
	
</div>




</body>

</html>

