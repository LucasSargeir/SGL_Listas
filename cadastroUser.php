<?php
	include("conectaBanco.php");

	$nome = $_REQUEST['nome'];
	$senha = $_REQUEST['senha'];
	$dataNasc= $_REQUEST['dataNasc'];
	$confSenha = $_REQUEST['confSenha'];
	$email = $_REQUEST['email'];


	if($senha != $confSenha){
			$mgm = 1;// "Senhas diferentes!";
			header("location:index.php?mgm=$mgm");
	}
	else{

		$token = sha1("$email$senha");
		$resposta = mysqli_query($link, "select * from usuario where email = '$email'");

		if($resposta){

			$linha = mysqli_fetch_assoc($resposta);

			if(!$linha){

				$sql = "insert into usuario (nome,email,token,dataNasc,tipo) values ('$nome','$email','$token','$dataNasc','user')";
				$resposta2 = mysqli_query($link, $sql);				

				if($resposta2){
					header("location:verificaLogin.php?email=$email&senha=$senha"); 
				}
				else{
					echo mysqli_error($link);
				}

			}
			else{
				echo mysqli_error($link);
			}
		}
		else{
			echo mysqli_error($link);
		}

		mysqli_close($link);													/* Fecha a conexão */
	}
?>
