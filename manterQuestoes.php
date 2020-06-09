<?php 
	include("conectaBanco.php");
	include("funcoesImagem.php");
	session_start();
	if(!$_SESSION['usuario']){
		header("location:index.php");
	}
	$resposta = mysqli_query($link, "select * from usuario where idUser = '{$_SESSION['usuario']}'");
	$linha = mysqli_fetch_assoc($resposta);
?>
<!DOCTYPE HTML>
<!--
	Spatial by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title>Criar Lista</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
		<script src="js/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-xlarge.css" />
		</noscript>
	</head>
	<body>

		<!-- Header -->
			<header id="header" style="background:#4d4d4d;">
				<h1 style="color:white"><strong><a href="index.php" style="color:white">SGl</a></strong > by students</h1>
				<nav id="nav">
					<ul>
						<li><a href="index.php" style='color:white'>Home</a></li>
					<?php

						if($_SESSION['tipo'] == "admin"){

							echo"	<li><a href='manterUsuarios.php' style='color:white'>Usuários</a></li>
									<li><a href='manterQuestoes.php' style='color:white'>Manter Questões</a></li>
									<li><a href='manterMat.php' style='color:white'>Manter Matérias</a></li>
								";

						}
						else{
							echo"<li><a href='formEnviaQuestao1.php' style='color:white'>Enviar Questões</a></li>";
						}


					?>
						<li><a href="sair.php" style='color:white'>sair</a></li>
					</ul>

				</nav>
			</header>


		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="container">

					<header class="major special">
						<a href="formEnviaQuestao1.php" class="button special medium">Enviar Questoes</a><br><br>
					<?php

						
								echo"		<p>Questões a serem aprovados</p>
										</header><center>";
								

								$sqlP = "select * from questao where status = 'aguardando' ";
								
								if(isset($_REQUEST['pesquisa'])){

									$pesquisa = $_REQUEST['pesquisa'];
									$sqlP = "select * from questao where status = 'aguardando' and enunciado like '%$pesquisa%' ";

								}
								if(isset($_REQUEST['materia'])){

									$mate = $_REQUEST['materia'];

									if($mate != ""){

										$sqlP = $sqlP."and idMat = $mate";

									}

								}
								$resposta2 = mysqli_query($link, $sqlP);

								if($resposta2){

									$linha2 = mysqli_fetch_assoc($resposta2);


									echo"<form action='manterQuestoes.php' method='post'>
										<center><input type='text' name='pesquisa' style='width:50%' placeholder='Pesquisar por questão' /></center><br>
										<select  style='width:50%;border: 1px solid black' name='materia' id='materia' >
								
											<option value='' selected=''>Todas</option>";
								
									$resposta22 = mysqli_query($link, "select * from materia");

									if($resposta22){

										$linha22 = mysqli_fetch_assoc($resposta22);
										
										while($linha22){

											if($linha22['status'] == 'aprovado'){
											
												echo"<option value='{$linha22['idMate']}'>{$linha22['nome']}</option>";	

											}
											
											$linha22 = mysqli_fetch_assoc($resposta22);

										}
									}
												
											
									echo"</select><br>
										<input type='submit' value='Pesquisar' />
									</form>";

									if(!$linha2){

										echo"Não há questões pendentes";
									
									}	
									while($linha2){
													
											$tyoe = 0;
											$sqlD = mysqli_query($link, "select * from discursiva where idQuesta = '{$linha2['idQuest']}'");
											$sqlM = mysqli_query($link, "select * from multiesct where idQuesta = '{$linha2['idQuest']}'");
											$sqlI = mysqli_query($link, "select * from multiesci where idQuesta = '{$linha2['idQuest']}'");

											if($sqlD){

												$aux = mysqli_fetch_assoc($sqlD);

												if($aux){

													$type = 1; 
													$linhaEspecial = $aux;
													
												}

											}
											if($sqlM){

												$aux = mysqli_fetch_assoc($sqlM);

												if($aux){
	 												
	 												$type = 3;
													$linhaEspecial = $aux;
													
												}

											}
											if($sqlI){

												$aux = mysqli_fetch_assoc($sqlI);

												if($aux){
	 
	 												$type = 2;
													$linhaEspecial = $aux;
													
												}

											}
											
											$respMateria = mysqli_query($link, "select * from materia where idMate = '{$linha2['idMat']}'");

											$auxMat = mysqli_fetch_assoc($respMateria);

											echo"<div style='border: 1px solid grey; text-align:left; padding-left: 10px;padding-right:5px;padding-top:5px;width:20%;margin-bottom:-1px'><font size='5'><center>{$auxMat['nome']}</center></font></div>
												<div style='border: 1px solid grey; border-radius: 10px;text-align:left; padding-left: 10px;padding-right:5px;padding-top:5px'>

												<button style='float:right;' onclick=\"location.href='aprovaQuestaoBanco.php?idQuestao={$linha2['idQuest']}'\" >Aprovar</button>
												<button style='float:right;' onclick=\"location.href='excluiQuestaoBanco.php?idQuestao={$linha2['idQuest']}&type=$type'\" >Deletar</button><br>

												({$linha2['autoria']}) -	{$linha2['enunciado']}";


												printImageEnum($linha2['idQuest'],$link);

												if($type == 1){

													echo"<br><hr><b>Resp:</b>{$linhaEspecial['resposta']}";

												}

												if($type == 2){

														$idMEI = $linhaEspecial['idMEI'];

														$respostaImagem = mysqli_query($link, "select * from imagemquestao where idMEI = $idMEI order by alternativa asc");
														if($respostaImagem){

															$linhaEspecialImagem = mysqli_fetch_assoc($respostaImagem);
															echo"<br><hr>";
															while($linhaEspecialImagem){
															
																echo"<b>({$linhaEspecialImagem['alternativa']}) </b><img src='./images/alternativa/{$linhaEspecialImagem['nome']}' alt='{$linhaEspecialImagem['nome']}' /><br><br>";

																$linhaEspecialImagem = mysqli_fetch_assoc($respostaImagem);

															}

															echo"<br><b>Resp:</b>({$linhaEspecial['resposta']})";

														}

															

												}
												if($type == 3){

													echo"<br><hr><b>(a)</b>{$linhaEspecial['a']}<br>
												 		 <b>(b)</b>{$linhaEspecial['b']}<br>
												  	 	 <b>(c)</b>{$linhaEspecial['c']}<br>
														 <b>(d)</b>{$linhaEspecial['d']}<br>
														 <b>(e)</b>{$linhaEspecial['e']}<br><br>
														 <b>Resp:</b>({$linhaEspecial['resposta']})";
												}

											echo"	<br><br></div><br>";
									
											$linha2 = mysqli_fetch_assoc($resposta2);
									}
								}

							echo"		</center></div>
													</section>		
													<!-- Footer -->
													<footer id='footer'>
														<div class='container'>
															<hr>
															<ul class='copyright'>
																<li>&copy; Untitled</li>
																<li>Design: <a href='http://templated.co'>TEMPLATED</a></li>
																<li>Images: <a href='http://unsplash.com'>Unsplash</a></li>
															</ul>
														</div>
													</footer>

											</body>
										</html>";

						mysqli_close($link);
			

?>
