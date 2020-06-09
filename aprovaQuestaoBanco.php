<?php
	session_start();
	if(!$_SESSION['usuario']){
		header("location:index.php");
	}
	
	include("conectaBanco.php");

	$idQuestao = $_REQUEST['idQuestao'];
	$status = "aprovado";

	$resposta = mysqli_query($link, "update questao set status = '$status' where idQuest = $idQuestao");

	if ($resposta){

		header("location:manterQuestoes.php");

	}
	else{

		mysqli_error($link);

	}

	

	mysqli_close($link);													/* Fecha a conexão */

?>