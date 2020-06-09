<?php
	session_start();
	if(!$_SESSION['usuario']){
		header("location:index.php");
	}
	
	include("conectaBanco.php");

	$idQuestao = $_REQUEST['idQuestao'];
	$idLista = $_REQUEST['idLista'];

	$resposta = mysqli_query($link, "delete from questaolista where idQuest = $idQuestao and idList = $idLista");

	if ($resposta){

		header("location:verLista.php?idLista=$idLista");

	}
	else{

		mysqli_error($link);

	}

	

	mysqli_close($link);													/* Fecha a conexão */

?>