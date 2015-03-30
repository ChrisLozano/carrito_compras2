<?php
session_start();
include('lib/conexion.php');
include('lib/carrito_compras.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Carrito de compras</title>
   <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
  <style>

    .row_color{
      background-color: #0076FC;
      color: white;
    }

  </style>
</head>
<body>
  <?php

    if(!$_SESSION){
      echo
    '<script>
        alert("Debes iniciar sesion antes de comprar")
      window.location.href="index.php";
    </script>';

    }
?>
	<div class="container">
    <div class="row">
      
      <h1> Carrito de compras</h1>
       <?php     
       $num_articulos = 0;
       for($i=0; $i<count($mi_carrito); $i++){ //Vaciamos los registros que contiene el  array del carrito
      if($mi_carrito[$i] != NULL){ //Si el array $mi_carrito es diferente de NULL muestra la informacion que contiene en la posición $i 
       $num_articulos = $num_articulos + 1;
     }
   }
   if ($num_articulos != 0){ 
     ?>    
     <p>Tus compras hasta el momento son: </p>
        <table class="table table-hover">
          
          <thead class="row_color">
            <td>Imagen</td>
            <td>Nombre</td>
            <td>Precio</td>
            <td>Cantidad</td>
            <td>Subtotal</td>
          </thead>
           <?php
      if(isset($mi_carrito)){
       $total = 0;   
       for($i=0; $i<count($mi_carrito); $i++ ){
        if($mi_carrito[$i] != NULL){

          ?>

              <tr>
            <td><img src="administrator/productos/<?php echo $mi_carrito[$i]['imagen']?>" width="100" height="100"></td>
            <td><?php echo $mi_carrito[$i]['nombre'] ?> </td>
            <td><?php echo $mi_carrito[$i]['precio'] ?></td>
            <td> 
             <form  method="post" action="carrito.php">
              <input type="hidden" name="id2" value="<?php echo $i ?>"> <!-- Campo que almacenara el $id, el indice de la matriz -->
              <input type="number" name="cantidad2"  min="1" max="<?php echo $mi_carrito[$i]['stock'] ?>" value="<?php echo $mi_carrito[$i]['cantidad']?>">
              <input type="image" name="update" src="images/update.gif">

            </form>

          </td>
          <td>$
           <?php 
  $subtotal = $mi_carrito[$i]['precio'] * $mi_carrito[$i]['cantidad']; //calculamos el subtotal
    $total = $total + $subtotal;  //calculamos el total  
    echo $subtotal;
    ?> 
  </td>
  <td>  
    <form action="carrito.php" method="post">
      <input type="hidden" name="id3" value="<?php echo $i ?>">
      <input type="image" name="eliminar" src="images/delete.jpg">
    </form>
  </td>
</tr>
<?php
}
}
}
?>
<tr>
  <td></td>
  <td></td>
  <td></td>
  <td clas="row_color">Total</td>
  <td> $ <?php if(isset($mi_carrito)){ echo $total; }?></td>
  <td></td>
</tr>
<tr>
  <td></td>
  <td></td>
  <td></td>
  <td> 

  </td>
  <td></td>
  <td></td>
</tr>
</table>
<div class="col-xs-12">
  <form  method="post" action="1.php">
    <input type="hidden" name="total" value="<?php echo $total ?>">
    <input type="submit" value="Confirmar Compra" class="btn btn-success col-xs-12 col-sm-2">
  </form>
</div>
<div class="col-xs-12">
  <form action="galeria.php" method="post">
    <input type="submit" value="Seguir Comprando" class="btn btn-info col-xs-12 col-sm-2">
  </form>   
</div>


<?php
}
?>

    </div>
  </div>

</body>
</html>