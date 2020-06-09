<?php
	session_start();
	if(!$_SESSION['usuario']){
		header("location:index.php");
	}
	
	include("conectaBanco.php");

	$idLista = $_REQUEST['idLista'];
	
	$resposta = mysqli_query($link, "delete from questaolista where idList = $idLista");
	$resposta2 = mysqli_query($link, "delete from lista where idLista = $idLista");
	
	if ( $resposta && $resposta2 ){

		header("location:paginaUser.php");

	}
	else{

		mysqli_error($link);

	}

	

	mysqli_close($link);													/* Fecha a conexão */

?>