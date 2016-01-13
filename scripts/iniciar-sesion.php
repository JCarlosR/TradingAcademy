<?php
	require 'funciones.php';
	$usuario = $_POST['txtUsuario'];
	$clave = $_POST['txtClave'];
	conectar();
	if( validarLogin($usuario, $clave) ) {
	// Accedemos al sistema
		if( esAdmin() )
			header('Location: ../admin/index.php');
		else header('Location: ../panelUsuario.php');
	} else {
	// Sino volvemos al formulario inicial
?>
	<script>
	alert('Los datos ingresados son incorrectos.')
	location.href = "../index.html";
	</script>
<?php
	desconectar();
}
?>