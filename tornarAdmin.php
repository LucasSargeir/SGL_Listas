<?php
	session_start();
	if(!$_SESSION['usuario']){
		header("location:index.php");
	}
	
	include("conectaBanco.php");

	$idUser = $_REQUEST['idUser'];
	$tipo = "admin";

	$resposta = mysqli_query($link, "update usuario set tipo = '$tipo' where idUser = $idUser");

	if ($resposta){

		header("location:manterUsuarios.php");

	}
	else{

		mysqli_error($link);

	}

	

	mysqli_close($link);													/* Fecha a conexão */

?>