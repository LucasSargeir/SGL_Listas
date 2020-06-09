<?php
	session_start();
	if(!$_SESSION['usuario']){
		header("location:index.php");
	}
	
	include("conectaBanco.php");

	$idQuestao = $_REQUEST['idQuestao'];
	$type = $_REQUEST['type'];
	$aux = "";


	if( $type == 1 ){

		$aux = "discursiva";

	}
	if( $type == 2 ){

		$aux = "multiesci";

	}
	if( $type == 3 ){

		$aux = "multiesct";

	}
	if($type == 2){

		$respImagem = mysqli_query($link, "select * from multiesci where idQuesta = $idQuestao");
		$linhaImagem = mysqli_fetch_assoc($respImagem);

		$respQuesta = mysqli_query($link, "select * from imagemquestao where idMEI = {$linhaImagem['idMEI']}");
		$linhaQuesta = mysqli_fetch_assoc($respQuesta);

		while($linhaQuesta){
			
			unlink("./images/alternativa/{$linhaQuesta['nome']}");
			$linhaQuesta = mysqli_fetch_assoc($respQuesta);

		}

		$respDeleta = mysqli_query($link, "delete from imagemquestao where idMEI = {$linhaImagem['idMEI']}");


	}

	$resposta2 = mysqli_query($link, "delete from $aux where idQuesta = $idQuestao");
	$resposta = mysqli_query($link, "delete from questao where idQuest = $idQuestao");

	$resposta1 = mysqli_query($link, "select * from imagemenunciado where idQuesta = $idQuestao");

	if($resposta1){

		$linha1 = mysqli_fetch_assoc($resposta1);

		if($linha1){
		    unlink("./images/enunciado/{$linha1['nome']}");
        }

	}

	$resposta3 = mysqli_query($link, "delete from imagemenunciado where idQuesta = $idQuestao");

	echo"$resposta<br>$resposta2";
	if ( $resposta && $resposta2 && $resposta3){

		header("location:manterQuestoes.php");

	}
	else{

		mysqli_error($link);

	}

	

	mysqli_close($link);													/* Fecha a conexão */

?>