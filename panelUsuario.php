<?php
  require 'scripts/funciones.php';
  if(! haIniciadoSesion() )
  {
  	header('Location: index.html');
  }

  conectar();
  $categorias = getCategoriasPorUser();
  desconectar();
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Panel de Usuario</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/jumbotron-narrow.css">
  </head>

  <body>

    <div class="container">
      <div class="header">
        <nav>
          <ul class="nav nav-pills pull-right">
            <li role="presentation" class="active"><a href="#">Inicio</a></li>
            <li role="presentation"><a href="scripts/cerrar-sesion.php">Cerrar sesión</a></li>
          </ul>
        </nav>
        <h3 class="text-muted">Trading Academy</h3>
      </div>

      <div class="jumbotron">
        <h1>Bienvenido, <?= $_SESSION['usuario'] ?>.</h1>
        <p class="lead">Bienvenido. Desde esta sección podrás acceder a diversas categorías de nuestro sitio.</p>
      </div>

    	<div class="row marketing">       
  
  <?php foreach( $categorias as $fila ): ?>
  		<div class="col-lg-6">
          <h4><a href="categorias/<?= $fila[2] ?>"><?= $fila[0] ?></a></h4>
          <p><?= $fila[1] ?></p>    
        </div>
  <?php endforeach ?>

  		</div>

  		<div class="row marketing">	
	    <footer class="footer">
	    	<p>&copy; Trading Academy 2015</p>
	    </footer>
    </div> <!-- /container -->

  </body>
</html>
