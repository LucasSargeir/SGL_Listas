<?php
	session_start();
	if(!$_SESSION['usuario']){
		header("location:index.php");
	}
	
	include("conectaBanco.php");

	$idUser = $_REQUEST['idUser'];
	
	$resposta = mysqli_query($link, "select * from lista where idUsu = $idUser");

	if( $resposta ){
 
 		$linha = mysqli_fetch_assoc($resposta);

 		while( $linha ){

 			$sql = mysqli_query($link, "delete from questaolista where idList = {$linha['idLista']} ");
 			$sql2 = mysqli_query($link, "delete from lista where idLista = {$linha['idLista']} ");

 			$linha = mysqli_fetch_assoc($resposta);

 		}

	}

	$resposta = mysqli_query($link, "delete from usuario where idUser = $idUser ");
	
	if ( $resposta ){

		header("location:manterUser.php");

	}
	else{

		mysqli_error($link);

	}

	

	mysqli_close($link);													/* Fecha a conexão */

?>