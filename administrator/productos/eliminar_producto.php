<?php
session_start();
include('../../lib/conexion.php');
include('lib/class.php');
$objeto = new Producto();
$objeto->eliminar_producto($_POST['id']);
?>