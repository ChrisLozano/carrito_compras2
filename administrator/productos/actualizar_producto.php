<?php
session_start();
include('../../lib/conexion.php');
include('lib/class.php');

if($_POST){

$id = $_POST['id'];
$descripcion = $_POST['descripcion'];

if($_FILES['imagen']['type'] == 'image/jpeg' OR $_FILES['imagen']['type'] == 'image/png' ){
 

		$rutaServidor = 'uploads';
		$rutaTemporal = $_FILES['imagen']['tmp_name'];
		$nombreImagen = $_FILES['imagen']['name'];
		$rutaDestino = $rutaServidor.'/'.$nombreImagen;
		move_uploaded_file($rutaTemporal, $rutaDestino);
       
}

$objeto = new Producto();
$objeto->actualizar_producto($id, $rutaDestino, $descripcion);

}