<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php


require("datos_imagen.php");    
    $sql="SELECT imagen FROM articulo WHERE id='1'";
        $sentencia = $pdo->prepare($sql);
        $sentencia->execute(array($nombre_imagen));
        $resultado = $sentencia->fetchAll();
        
        while ($fila=mysqli_fetch_array($resultado)) {
          $ruta_img=$fila["imagen"];
        }
       
  ?>

  <div src="/imagenes_subidas/ <?php echo $ruta_img; ?>" alt="Imagen">

  </div>





</body>
</html>