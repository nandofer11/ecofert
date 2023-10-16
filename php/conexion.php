<?php
	$conexion = new mysqli("localhost", "root", "", "ecofert2");
	if (mysqli_connect_error()) {
		echo "Conexcion Fallida";
	}
	$conexion->set_charset("utf8");
?>