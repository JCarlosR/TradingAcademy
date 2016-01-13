<?php
  require 'funciones.php';

  // Validación de la sesión como administrador:
  if(! haIniciadoSesion() || ! esAdmin() )
  {
    header('Location: ../index.html');
  }

  // Verificación del parámetro POST:
  if( isset($_POST['txtId']) && isset($_POST['txtNombre']) 
    && isset($_POST['txtDescripcion']) && isset($_POST['txtRuta']) )
  {
    $id = $_POST['txtId'];
    $nombre = $_POST['txtNombre'];
    $descripcion = $_POST['txtDescripcion'];
    $ruta = $_POST['txtRuta'];
  }
  else header('Location: ../admin/index.php');

  conectar();

  editarCategoria( $id, $nombre, $descripcion, $ruta );

  header('Location: ../admin/editarCategoria.php?id='.$id);

  desconectar();
?>