<?php
	include("conectaBanco.php");


	$email = $_REQUEST["email"];
	$senha = $_REQUEST["senha"];
	$confirmacao = 0;
	$token = sha1("$email$senha");

	$resposta = mysqli_query($link, "select * from usuario");

	if($resposta){

		$linha = mysqli_fetch_assoc($resposta);
		
		while($linha){
			
			if(($linha['email'] == $email)&&($linha['token'] == $token)){
				$confirmacao = 1;
				break;
			}
		
			$linha = mysqli_fetch_assoc($resposta);
		
		}

	}

	mysqli_close($link);


	if($confirmacao == 1){

		session_start();
		$_SESSION["email"] = $linha['email'];
		$_SESSION["usuario"]=$linha['idUser'];
		$_SESSION["tipo"]=$linha['tipo'];

		header("location:paginaUser.php");

	}
	else{
		$mgm = 2;//"Usuario ou senha incorretos!";
		header("location:index.php?mgm=$mgm");
	}
?>
