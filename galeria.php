<?php
session_start();
include('lib/conexion.php');
include('administrator/productos/lib/class.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Productos</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</head>
<body>
	<?php
	$categoria = "";
	$product = new Producto();
	?>
	<div class="container">
		<div class="row">
			<h1>Productos</h1><br>
			<div class="form-group">
				<form action="" method="post" class="form-vertical">
				<label class="col-xs-12 col-sm-2 control-label">Buscar por categoría</label>
				<div class="col-xs-12 col-sm-4">
					<select name="categoria" class="form-control col-xs-12 col-sm-4">
				<option value="">Mostrar todos los Productos</option>
				<option value="1">XBOX ONE</option>
				<option value="2">PS4</option>
				<option value="3">3DS</option>
				</select>
				</div>
				<div class="form-group">
					<input type="submit" class="btn btn-large btn-primary" value="Buscar">
				</div>
			</form>
			</div>
			</div>
			<br><br><br>
			<div class="row">
			<?php
				if($_POST){
					$categoria = $_POST['categoria'];
				}

				if($categoria !=""){
				$registros = $product->listar_productos_categoria($_POST['categoria']);
				}else{
				$registros = $product->listar_productos();	
				}

				for($i=0; $i<sizeof($registros); $i++){
			
			?>
			<div class="col-xs-12 col-sm-4 col-md-3 well">
				<img class="center-block" src="administrator/productos/<?php echo $registros[$i]['imagen'] ?>" width="150" height="150" >
				<p align="center"><strong> <?php echo $registros[$i]['nombre'] ?>  </strong></p>
				<p>Precio: $<?php echo $registros[$i]['precio'] ?></p>
				<p>Stock: <?php echo $registros[$i]['stock'] ?></p>	
				<form action="carrito.php" method="post">
				<input type="hidden" name="id" value="<?php echo $registros[$i]['id'] ?>">
				<input type="hidden" name="imagen" value="<?php echo $registros[$i]['imagen'] ?>">
				<input type="hidden" name="nombre" value="<?php echo $registros[$i]['nombre'] ?>">
				<input type="hidden" name="precio" value="<?php echo $registros[$i]['precio'] ?>">
				<input type="hidden" name="stock" value="<?php echo $registros[$i]['stock'] ?>">
				<input type="hidden" name="cantidad" value="1">
				<input type="submit" value="Carrito" class="btn btn-sm btn-success btn-block">
				</form>
				<form action="ver_detalles.php" method="post">
				<input type="hidden" name="id" value="<?php echo $registros[$i]['id'] ?>">
				<input type="submit" value="Ver Detalles" class="btn btn-sm btn-primary btn-block">
				</form>
			</div>
			<?php
				}
			?>				
		</div>
		


	</div>



</body>
</html>