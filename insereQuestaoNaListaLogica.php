<?php
	session_start();
	if(!$_SESSION['usuario']){
		header("location:index.php");
	}
	
	include("conectaBanco.php");

	$idQuestao = $_REQUEST['idQuestao'];
	$idLista = $_REQUEST['idLista'];

	$resposta = mysqli_query($link, "insert into questaolista (idList,idQuest) values ('$idLista','$idQuestao')");

	if ($resposta){

		header("location:insereQuestaoNaLista.php?idLista=$idLista");

	}
	else{

		mysqli_error($link);

	}

	

	mysqli_close($link);													/* Fecha a conexão */

?>