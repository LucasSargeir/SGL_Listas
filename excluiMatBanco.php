<?php
	session_start();
	if(!$_SESSION['usuario']){
		header("location:index.php");
	}
	
	include("conectaBanco.php");

	$idMateria = $_REQUEST['idMateria'];
	
	$resposta = mysqli_query($link, "delete from materia where idMate = $idMateria");
	
	if ( $resposta ){

		header("location:manterMat.php");

	}
	else{

		mysqli_error($link);

	}

	

	mysqli_close($link);													/* Fecha a conexão */

?>