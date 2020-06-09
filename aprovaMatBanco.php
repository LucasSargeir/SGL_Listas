<?php
	session_start();
	if(!$_SESSION['usuario']){
		header("location:index.php");
	}
	
	include("conectaBanco.php");

	$idMateria = $_REQUEST['idMateria'];
	$status = "aprovado";

	$resposta = mysqli_query($link, "update materia set status = '$status' where idMate = $idMateria");

	if ($resposta){

		header("location:manterMat.php");

	}
	else{

		mysqli_error($link);

	}

	

	mysqli_close($link);													/* Fecha a conexão */

?>