<?php
	session_start();
	if(!$_SESSION['usuario']){
		header("location:index.php");
	}
	
	include("conectaBanco.php");



	$nome = $_REQUEST['nome'];
	$sql ="";
	$resposta = mysqli_query($link, "select * from materia where nome = '$nome'");
	
	if($resposta){

		$linha = mysqli_fetch_assoc($resposta);

		if(!$linha){

			$sql = mysqli_query($link, "insert into materia (nome,status) values('$nome','aguardando')");

		}
		else{

			$mgm = 1;
			header("location:paginaUser.php?mgm=$mgm");

		}
	
	}
	
	if ( $sql ){

		header("location:paginaUser.php");

	}
	else{

		mysqli_error($link);

	}

	

	mysqli_close($link);													/* Fecha a conexão */

?>