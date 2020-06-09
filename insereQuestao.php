<?php
	session_start();
	if(!$_SESSION['usuario']){
		header("location:index.php");
	}
	$aux = 0;
	include("conectaBanco.php");
	include("funcoesImagem.php");
	$tipoDeQuestao = $_REQUEST['tipoDeQuestao'];
	$status = $_REQUEST['status'];
	$enunciado = $_REQUEST['enunciado'];
	//$materia= $_REQUEST['materia'];
	if($tipoDeQuestao > 1){
		if(!isset($_REQUEST['certa'])){
			$aux = 1;
			header("location:formEnviaQuestao2.php?tipoDeQuestao=$tipoDeQuestao&mgm=2");
		}
		else{
			if( $_REQUEST['certa'] == ""){
				$aux = 1;
				header("location:formEnviaQuestao2.php?tipoDeQuestao=$tipoDeQuestao&mgm=2");			
			}
		}
	}
	if($tipoDeQuestao == 2){
			if(!verificaJPG($_FILES["aResp"]["name"])){
				$aux = 1;
				header("location:formEnviaQuestao2.php?tipoDeQuestao=$tipoDeQuestao&mgm=3");
			}
			if(!verificaJPG($_FILES["bResp"]["name"])){
				$aux = 1;
				header("location:formEnviaQuestao2.php?tipoDeQuestao=$tipoDeQuestao&mgm=3");
			}
			if(!verificaJPG($_FILES["cResp"]["name"])){
				$aux = 1;
				header("location:formEnviaQuestao2.php?tipoDeQuestao=$tipoDeQuestao&mgm=3");
			}
			if(!verificaJPG($_FILES["dResp"]["name"])){
				$aux = 1;
				header("location:formEnviaQuestao2.php?tipoDeQuestao=$tipoDeQuestao&mgm=3");
			}
			if(!verificaJPG($_FILES["eResp"]["name"])){
				$aux = 1;
				header("location:formEnviaQuestao2.php?tipoDeQuestao=$tipoDeQuestao&mgm=3");
			}
	}

	$imagem = null;
	$nomeTemp;
	if(isset($_REQUEST['materia'])){
		$materia= $_REQUEST['materia'];
		if($materia == 0 ){
			$aux = 1;
			header("location:formEnviaQuestao2.php?tipoDeQuestao=$tipoDeQuestao&mgm=1");
		}
	}
	else{
		$aux = 1;
		header("location:formEnviaQuestao2.php?tipoDeQuestao=$tipoDeQuestao&mgm=1");
	}
	if(isset($_REQUEST['autoria'])){
		
		$autoria = $_REQUEST['autoria'];

	}
	else{

		$autoria = "User-".$_SESSION['usuario'];

	}
	if($autoria == ""){

		$autoria = "User-".$_SESSION['usuario'];

	}
	
	if(isset($_FILES['imagemEnunciado'])){
		
		$nomeTemp = $_FILES["imagemEnunciado"]["tmp_name"];
		$imagem = $_FILES["imagemEnunciado"]["name"];
		//$tamanho = $_FILES["imagemEnunciado"]["size"];
		//$formato = $_FILES["imagemEnunciado"]["type"];
		if(!verificaJPG($_FILES["imagemEnunciado"]["name"])){
				$aux = 1;
				header("location:formEnviaQuestao2.php?tipoDeQuestao=$tipoDeQuestao&mgm=3");
		}

	}
	if($aux == 0){
		$resposta = mysqli_query($link, "select * from questao where enunciado = '$enunciado'");

		if ($resposta){

			$linha = mysqli_fetch_assoc($resposta);

			if($linha){

				header("location:formEnviaQuestao1.php?mgm=2");

			}
			else{

				$sql = mysqli_query($link, "insert into questao (enunciado,status,idMat,autoria) values ('$enunciado','$status','$materia','$autoria')");

				
				$resposta2 = mysqli_query($link, "select * from questao where enunciado = '$enunciado'");

				if($resposta2){

					$linha2 = mysqli_fetch_assoc($resposta2);

					if($linha2){

						if($imagem != null){

							include("addImagemEnunciado.php");

						}

						if( $tipoDeQuestao == 1 ){

							$resposta3 = $_REQUEST['resposta'];

							$sql = mysqli_query($link, "insert into discursiva (resposta,idQuesta) values ('$resposta3','{$linha2['idQuest']}')");

						}
						if( $tipoDeQuestao == 2 ){

							$certa = $_REQUEST['certa'];
							$aResp = $_FILES['aResp']['name'];
							$bResp = $_FILES['bResp']['name'];
							$cResp = $_FILES['cResp']['name'];
							$dResp = $_FILES['dResp']['name'];
							$eResp = $_FILES['eResp']['name'];
							$eResp_tmp = $_FILES['eResp']['tmp_name'];
							$aResp_tmp = $_FILES['aResp']['tmp_name'];
							$bResp_tmp = $_FILES['bResp']['tmp_name'];
							$cResp_tmp = $_FILES['cResp']['tmp_name'];
							$dResp_tmp = $_FILES['dResp']['tmp_name'];
							$eResp_tmp = $_FILES['eResp']['tmp_name'];

							$sql = mysqli_query($link, "insert into multiesci (resposta,idQuesta) values ('$certa','{$linha2['idQuest']}')");
							$respF = mysqli_query($link, "select * from multiesci where resposta = '$certa' and idQuesta = '{$linha2['idQuest']}'");
							$linhaF = mysqli_fetch_assoc($respF);
							//echo $linha2['idQuest'];
							addImagemAlternativa($aResp,$aResp_tmp,$linhaF['idMEI'],"a", $link);
							addImagemAlternativa($bResp,$bResp_tmp,$linhaF['idMEI'],"b", $link);
							addImagemAlternativa($cResp,$cResp_tmp,$linhaF['idMEI'],"c", $link);
							addImagemAlternativa($dResp,$dResp_tmp,$linhaF['idMEI'],"d", $link);
							addImagemAlternativa($eResp,$eResp_tmp,$linhaF['idMEI'],"e", $link);

						}
						if( $tipoDeQuestao == 3 ){

							$certa = $_REQUEST['certa'];
							$a = $_REQUEST['aResp'];
							$b = $_REQUEST['bResp'];
							$c = $_REQUEST['cResp'];
							$d = $_REQUEST['dResp'];
							$e = $_REQUEST['eResp'];

							$sql = mysqli_query($link, "insert into multiesct (resposta,idQuesta,a,b,c,d,e) values ('$certa','{$linha2['idQuest']}','$a','$b','$c','$d','$e')");


						}

						if($sql){

							header("location:paginaUser.php");

						}

					}

				}

			}

		}
		else{

			mysqli_error($link);

		}

		

		mysqli_close($link);			
	}										/* Fecha a conexão */

?>
