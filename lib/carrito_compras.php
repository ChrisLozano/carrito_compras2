<?php

//Proceso para agregar el primer producto al carrito
if(isset($_POST['id'])){  
  $id = $_POST['id'];
  $imagen = $_POST['imagen'];
  $nombre = $_POST['nombre'];
  $precio = $_POST['precio'];
  $cantidad = $_POST['cantidad'];
  $stock = $_POST['stock'];
  $mi_carrito []= array('id'=>$id, 'imagen'=>$imagen,
  'nombre'=>$nombre, 'precio'=>$precio, 'cantidad'=> $cantidad, 'stock'=>$stock);  
}

//Proceso para agregar un nuevo producto al carrito
if(isset($_SESSION['carrito'])){
  $mi_carrito = $_SESSION['carrito'];
  if(isset($_POST['id'])){    
    $id = $_POST['id'];
    $imagen = $_POST['imagen'];
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $cantidad = $_POST['cantidad'];
    $stock = $_POST['stock'];

 //Verifica si es el producto es repetido
    $pos = -1;
    for($i = 0; $i < count($mi_carrito); $i++){
      if($id == $mi_carrito[$i]['id'] ){
        $pos = $i;  
      }

    }

    if($pos != -1){
      $cuanto = $mi_carrito[$pos]['cantidad'] + $cantidad;
      $mi_carrito[$pos] = array ('id'=>$id, 'imagen'=>$imagen,
      'nombre'=>$nombre, 'precio'=>$precio, 'cantidad'=> $cuanto, 'stock'=>$stock);

    }else{
      $mi_carrito []= array('id'=>$id, 'imagen'=>$imagen,
      'nombre'=>$nombre, 'precio'=>$precio, 'cantidad'=> $cantidad, 'stock'=>$stock);
    }


  }

}

 //Actualizar cantidad de productos del carrito

if(isset($_POST['id2'])){
 $id2 = $_POST['id2'];
 $cantidad2=  $_POST['cantidad2'];
 $mi_carrito[$id2]['cantidad'] = $cantidad2;
}

  //Eliminar un producto del carrito
if(isset($_POST['id3'])){
  $id3 = $_POST['id3'];
  $mi_carrito[$id3] = NULL;
}

  //Se crea la session del carrito 

if(isset($mi_carrito)){

  $_SESSION['carrito'] = $mi_carrito;
}


?>

