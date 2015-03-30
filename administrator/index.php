<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>

<?php

if($_SESSION){

	if($_SESSION['privilegios']!=1){

		echo '<script>
		alert("Error de autenticacion");
		window.location.href="../index.php";
	  </script>';

	}

}else{

echo '<script>
		window.location.href="../index.php";
	  </script>';
}
?>

	<header>
			<h1>Aqui voy a poner mi banner</h1>
	</header>
	<nav>
		<ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="galeria.php">Galeria</a></li>
			<li><a href="contactanos.php">Contacto</a></li>
			<li><a href="login.php">Login</a></li>
			<li><a href="registro.php">Registro</a></li>
		</ul>
	</nav>
	<article>
		<h1>CPANEL</h1>
		<ul>
			<li><a href="usuarios/index.php">Usuarios</a></li>
			<li><a href="productos/index.php">Productos</a></li>
			<li><a href="">Contacto</a></li>
			<li><a href="">Peididos</a></li>
		</ul>	
	</article>
	<footer>
		<p>2014. MC-502</p>
		<p>Todos los derechos reservados</p>
	</footer>
</body>
</html>