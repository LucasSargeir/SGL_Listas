<?php
	session_start();
	$aux = 0;
	if(!$_SESSION['usuario']){
		header("location:index.php");
	}
	
	include("conectaBanco.php");

	$nome = $_REQUEST['nome'];
	if(isset($_REQUEST['materia']) & $_REQUEST['materia'] != 0  ){
		$materia = $_REQUEST['materia'];
		
	}
	else{
		header("location:formCriaLista.php?mgm=1");
		$aux = 1;
	}	

	$idUser = $_SESSION["usuario"];
	$resposta = mysqli_query($link, "select * from lista where nome = '$nome' and idUsu = '$idUser'");

	if ($resposta && $aux == 0){

		$linha = mysqli_fetch_assoc($resposta);

		if(!$linha){

			$sql = mysqli_query($link, "insert into lista (nome,idMate,idUsu) values ('$nome','$materia','$idUser')");

			//echo"insert into lista (nome,idMate,idUsu) values ('$nome','$materia','$idUser')";
			if($sql){

				$resposta2 = mysqli_query($link, "select * from lista where nome = '$nome' and idUsu = '$idUser'");
				
				if ( $resposta2 ){

					$linha2 = mysqli_fetch_assoc($resposta2);

					if($linha2){

						header("location:insereQuestaoNaLista.php?idLista={$linha2['idLista']}");

					}
										
				}
			}

		}
		else{

			header("location:formCriaLista.php?mgm=2");

		}
		

	}
	else{

		mysqli_error($link);

	}

	

	mysqli_close($link);													/* Fecha a conexão */

?>
