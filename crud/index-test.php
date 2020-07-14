<?php

include_once 'conexion.php';

//LEER
$sql_leer = 'SELECT * FROM productos';
$gsent = $pdo->prepare($sql_leer);
$gsent->execute();
$resultado = $gsent->fetchAll();

//var_dump($resultado);

//AGREGAR 
if($_POST){
    $codigo =  $_POST['codigo'];
    $descripcion = $_POST['descripcion'];

    $sql_agregar = 'INSERT INTO productos (codigo,descripcion) VALUES (?,?)';
    $sentencia_agregar = $pdo->prepare($sql_agregar);
    $sentencia_agregar->execute(array($codigo,$descripcion));

    //cerramos conexión base de datos y sentencia
    $sentencia_agregar = null;
    $pdo = null;
    echo 'Agregado';
    header('location:index.php');

}

if($_GET){
    $id = $_GET['id'];
    $sql_unico = 'SELECT * FROM productos WHERE id=?';
    $gsent_unico = $pdo->prepare($sql_unico);
    $gsent_unico->execute(array($id));
    $resultado_unico = $gsent_unico->fetch();
    //var_dump($resultado_unico);
    $gsent_unico = null;
}


?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://kit.fontawesome.com/a790fabeaf.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>Store#</title>
    <style>   
      
    </style>
  </head>

<body >

<div class="container-fluid">  
<div class="row">


<!-- Menu -->
<!-- <div class="col-md-3 col-xs-1 p-l-0 p-r-0 collapse in" id="sidebar"> -->
  <div class="col-md-2 col-xs-1 p-l-0 p-r-0 collapse in" id="sidebar">
      <div class="list-group panel">
        <a href="#menu1" class="list-group-item collapsed" data-toggle="collapse" data-parent="#sidebar"
          aria-expanded="false"><i class="fa fa-dashboard"></i> <span class="hidden-sm-down">Item 1</span> </a>
        <div class="collapse" id="menu1">
          <a href="#menu1sub1" class="list-group-item" data-toggle="collapse" aria-expanded="false">Subitem 1 </a>
          <div class="collapse" id="menu1sub1">
            <a href="#" class="list-group-item" data-parent="#menu1sub1">Subitem 1 a</a>
            <a href="#" class="list-group-item" data-parent="#menu1sub1">Subitem 2 b</a>
            <a href="#menu1sub1sub1" class="list-group-item" data-toggle="collapse" aria-expanded="false">Subitem 3 c
            </a>
            <div class="collapse" id="menu1sub1sub1">
              <a href="#" class="list-group-item" data-parent="#menu1sub1sub1">Subitem 3 c.1</a>
              <a href="#" class="list-group-item" data-parent="#menu1sub1sub1">Subitem 3 c.2</a>
            </div>
            <a href="#" class="list-group-item" data-parent="#menu1sub1">Subitem 4 d</a>
            <a href="#menu1sub1sub2" class="list-group-item" data-toggle="collapse" aria-expanded="false">Subitem 5 e
            </a>
            <div class="collapse" id="menu1sub1sub2">
              <a href="#" class="list-group-item" data-parent="#menu1sub1sub2">Subitem 5 e.1</a>
              <a href="#" class="list-group-item" data-parent="#menu1sub1sub2">Subitem 5 e.2</a>
            </div>
          </div>
          <a href="#" class="list-group-item" data-parent="#menu1">Subitem 2</a>
          <a href="#" class="list-group-item" data-parent="#menu1">Subitem 3</a>
        </div>
        <a href="#" class="list-group-item collapsed" data-parent="#sidebar"><i class="fa fa-film"></i> <span
            class="hidden-sm-down">Item 2</span></a>
        <a href="#menu3" class="list-group-item collapsed" data-toggle="collapse" data-parent="#sidebar"
          aria-expanded="false"><i class="fa fa-book"></i> <span class="hidden-sm-down">Item 3 </span></a>
        <div class="collapse" id="menu3">
          <a href="#" class="list-group-item" data-parent="#menu3">3.1</a>
          <a href="#menu3sub2" class="list-group-item" data-toggle="collapse" aria-expanded="false">3.2 </a>
          <div class="collapse" id="menu3sub2">
            <a href="#" class="list-group-item" data-parent="#menu3sub2">3.2 a</a>
            <a href="#" class="list-group-item" data-parent="#menu3sub2">3.2 b</a>
            <a href="#" class="list-group-item" data-parent="#menu3sub2">3.2 c</a>
          </div>
          <a href="#" class="list-group-item" data-parent="#menu3">3.3</a>
        </div>
        <a href="#" class="list-group-item collapsed" data-parent="#sidebar"><i class="fa fa-heart"></i> <span
            class="hidden-sm-down">Item 4</span></a>
        <a href="#" class="list-group-item collapsed" data-parent="#sidebar"><i class="fa fa-list"></i> <span
            class="hidden-sm-down">Item 5</span></a>
        <a href="#" class="list-group-item collapsed" data-parent="#sidebar"><i class="fa fa-clock-o"></i> <span
            class="hidden-sm-down">Link</span></a>
        <a href="#" class="list-group-item collapsed" data-parent="#sidebar"><i class="fa fa-th"></i> <span
            class="hidden-sm-down">Link</span></a>
        <a href="#" class="list-group-item collapsed" data-parent="#sidebar"><i class="fa fa-gear"></i> <span
            class="hidden-sm-down">Link</span></a>
        <a href="#" class="list-group-item collapsed" data-parent="#sidebar"><i class="fa fa-calendar"></i> <span
            class="hidden-sm-down">Link</span></a>
        <a href="#" class="list-group-item collapsed" data-parent="#sidebar"><i class="fa fa-envelope"></i> <span
            class="hidden-sm-down">Link</span></a>
        <a href="#" class="list-group-item collapsed" data-parent="#sidebar"><i class="fa fa-bar-chart-o"></i> <span
            class="hidden-sm-down">Link</span></a>
        <a href="#" class="list-group-item collapsed" data-parent="#sidebar"><i class="fa fa-star"></i> <span
            class="hidden-sm-down">Link</span></a>
      </div>
    </div>      
      <!-- <main class="col d-flex justify-content-center">
      <a href="#sidebar" data-toggle="collapse"><i class="fa fa-navicon fa-lg" style="color:white;"></i></a>     
    </main> -->
    




    <!-- Nav bar -->
<div class="row">

<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">  
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <main class="col d-flex justify-content-left">
    <a href="#sidebar" data-toggle="collapse"><i class="fa fa-navicon fa-lg" style="color:white;"></i></a>     
  </main>  

  <a class="navbar-brand" href="#">Servilex</a>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">            
    <ul class="navbar-nav mr-left mt-2 mt-lg-0">
      <!-- <ul class="navbar-nav mr-auto mt-2 mt-lg-0"> -->
      <li id="nav-items" class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li id="nav-items" class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
 
  <span class="p-2 mr-3"><i class="fas fa-user" style="color:white;"></i></span>
  <span class="mr-3"><i class="fas fa-cart-arrow-down" style="color:white;"></i></span>

</nav>
</div>


</div>

    

<!-- Slider -->
<div class="row mt-5 mb-5">

<!-- <div class="d-flex flex-column bd-highlight justify-content-center p-3 mt-5 mw-100"> -->
  <div class="col justify-content-center p-3 mt-2">

  <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="../img/colgadores-per.jpg" class="d-block w-100 h-50" alt="...">
    </div>
    <div class="carousel-item">
      <img src="../img/smartphone.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="../img/computer.jpg" class="d-block w-100 h-50" alt="...">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

</div>









</div>


 <!-- Suscripcion -->
  <div class="d-flex flex-column bd-highlight mb-3">
    <div class="w3-container w3-black w3-padding-32 bd-highlight">
      <h1>Novedades</h1>
      <p>Para ofertas y descuentos especiales:</p>
      <p><input class="w3-input w3-border" type="text" placeholder="E-mail" style="width:100%"></p>
      <button type="button" class="w3-button w3-red w3-margin-bottom">Enviar</button>
    </div>
    </div>


  <!-- Footer -->
    <footer class="w3-padding-64 w3-light-grey w3-small w3-center bd-highlight" id="footer">
      <div class="w3-row-padding">
        <div class="w3-col s4">
          <h4>Contacto</h4>
          <p>Preguntas o dudas?.</p>
          <form action="/action_page.php" target="_blank">
            <p><input class="w3-input w3-border" type="text" placeholder="Nombre" name="Name" required></p>
            <p><input class="w3-input w3-border" type="text" placeholder="E-mail" name="Email" required></p>
            <p><input class="w3-input w3-border" type="text" placeholder="Asunto" name="Subject" required></p>
            <p><input class="w3-input w3-border" type="text" placeholder="Mensaje" name="Message" required></p>
            <button type="submit" class="w3-button w3-block w3-black">Enviar</button>
          </form>
        </div>

        <div style="visibility: hidden" class="w3-col s4">
          <h4>No se muestra</h4>
          <p><a href="#">About us</a></p>
          <p><a href="#">We're hiring</a></p>
          <p><a href="#">Support</a></p>
          <p><a href="#">Find store</a></p>
          <p><a href="#">Shipment</a></p>
          <p><a href="#">Payment</a></p>
          <p><a href="#">Gift card</a></p>
          <p><a href="#">Return</a></p>
          <p><a href="#">Help</a></p>
        </div>

        <div class="w3-col s4 w3-justify">
          <h4>Nosotros</h4>
          <p><i class="fa fa-fw fa-map-marker"></i>Servilex</p>
          <p><i class="fa fa-fw fa-phone"></i> 999999999</p>
          <p><i class="fa fa-fw fa-envelope"></i> ex@mail.com</p>
          <h4>Aceptamos</h4>
          <p><i class="fa fa-fw fa-cc-amex"></i> Paypal</p>
          <p><i class="fa fa-fw fa-credit-card"></i> Visa y Mastercard</p>
          <br>
          <i class="fa fa-facebook-official w3-hover-opacity w3-large"></i>
          <i class="fa fa-instagram w3-hover-opacity w3-large"></i>
          <i class="fa fa-snapchat w3-hover-opacity w3-large"></i>
          <i class="fa fa-pinterest-p w3-hover-opacity w3-large"></i>
          <i class="fa fa-twitter w3-hover-opacity w3-large"></i>
          <i class="fa fa-linkedin w3-hover-opacity w3-large"></i>
        </div>
      </div>
    </footer>

    <div class="w3-center w3-padding-24" style="background:#343a40; color:white;">Powered by <a href="#" title="Servilex" target="_blank"
            class="w3-hover-opacity">TI - Servilex</a></div>
       
    </div>

<!-- Nav Bot -->
<!-- <div class="row">
<nav class="navbar fixed-bottom navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Fixed bottom</a>
</nav>
</div> -->

</div>
</div>


<!-- Deshabilitando clic derecho -->
<script type="text/javascript">
    document.oncontextmenu = function () { return false; }
</script>   


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>


<?php 

//cerramos conexión base de datos y sentencia
$pdo = null;
$gsent = null;

?>