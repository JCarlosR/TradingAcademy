<?php
  require 'funciones.php';
  // Validación de la sesión como administrador:
  if(! haIniciadoSesion() || ! esAdmin() )
  {
    header('Location: ../index.html');
  }
  // Verificación del parámetro POST:
  if( isset($_POST['txtUsuario']) )
    $usuario = $_POST['txtUsuario'];
  else header('Location: ../admin/index.php');

  // Actualizar permisos:
  conectar();

  // Eliminamos todos sus permisos:
  eliminarPermisos($usuario);
  $categorias = getTodasCategorias();
  // Reasignaremos sus permisos:
  foreach ($categorias as $categoria):
    if( isset( $_POST['categoria'.$categoria[0]] ) )
      asignarPermisos($usuario, $categoria[0]);
  endforeach;

  header('Location: editarPermisos.php?usuario='.$usuario);

  desconectar();
?>