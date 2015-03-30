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
$objeto = new Producto();
$categorias = $objeto->listar_categorias();
?>
<h1>Agregar Producto </h1>
<form action="" method="post" enctype="multipart/form-data">
<label> Imagen del Producto </label>
<input type="file" name="imagen">
<br>
<label>SKU</label>
<input type="text" name="sku"><br>
<label>Nombre</label>
<input type="text" name="nombre"><br>
<label>Stock</label>
<input type="number" min="0" max="99" name="stock"><br>
<label>Precio $</label>
<input type="number" min="0" max="9999" name="precio"><br>
<label> Categoria </label>
<select name="categoria">
<?php
for($i=0; $i<sizeof($categorias); $i++){
	?>
<option value="<?php echo $categorias[$i]['idCategoria'] ?>">   <?php echo $categorias[$i]['nombreCategoria'] ?>   </option>
<?php	
}

?>
</select><br>
<label> Descripcion </label>
<textarea cols="30" rows="5" name="descripcion"></textarea>
<br>
<input type="submit" value="Agregar Producto">

</form>

<?php
if($_POST){
//print_r($_FILES['imagen']);

if($_FILES['imagen']['type'] == 'image/jpeg' OR $_FILES['imagen']['type'] == 'image/png' ){
 

		$rutaServidor = 'uploads';
		$rutaTemporal = $_FILES['imagen']['tmp_name'];
		$nombreImagen = $_FILES['imagen']['name'];
		$rutaDestino = $rutaServidor.'/'.$nombreImagen;
		move_uploaded_file($rutaTemporal, $rutaDestino);
		$sku = $_POST['sku'];
		$nombre = $_POST['nombre'];
		$stock = $_POST['stock'];
		$precio = $_POST['precio'];
        $descripcion =  $_POST['descripcion'];
        $categoria = $_POST['categoria'];

$objeto = new Producto();
$objeto->agregar_Producto($rutaDestino, $sku, $nombre, $stock, $precio, $categoria, $descripcion);

}


}


?>


</body>

</html>
