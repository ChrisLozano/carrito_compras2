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
	<header>
			<h1>Aqui voy a poner mi banner</h1>
	</header>
	<nav>
		<ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="galeria.php">Galeria</a></li>
			<li><a href="contactanos.php">Contacto</a></li>
			<li><a href="comentarios.php">Comentarios</a></li>
			<?php
				if($_SESSION){

                ?>
              <li><a href="logout.php">Cerrar Sesion</a></li>


				<?php
				}else{
               ?>
            <li><a href="login.php">Login</a></li>
			<li><a href="registro.php">Registro</a></li>
           <?php
				}
			?>

			
		</ul>
	</nav>
	<article>
		<?php
			if($_SESSION){
               echo 'Bienvenido'.$_SESSION['nombre'];

			}
		?>
			<p>Esta es la pagina principal Esta es la pagina principal Esta es la pagina principal 
				Esta es la pagina principal </p>
	</article>
	<footer>
		<p>2014. MC-502</p>
		<p>Todos los derechos reservados</p>
	</footer>
</body>
</html>