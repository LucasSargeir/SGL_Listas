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
					<?php

						$idLista = $_REQUEST['idLista'];

						$resposta = mysqli_query($link, "select * from lista where idLista = '$idLista'");

						if ($resposta){

							$linha = mysqli_fetch_assoc($resposta);

							if($linha){
								echo"<h2>{$linha['nome']}</h2>";
						
								echo"		<p>Selecione as questões que deseja adicionar na lista</p>
										</header><center>";
								
								//Formulário de pesquisa -----------------------------------------------		
								
								echo"<form action='insereQuestaoNaLista.php'>
										<input type='hidden' value='$idLista' name='idLista' />
										<center><input type='text' name='pesquisa' style='width:50%' placeholder='Pesquisar por questão' /></center><br>
										<input type='submit' value='Pesquisar' />
									</form>";
								//-----------------------------------------------------------------------

								$sqlP = "";

								$idUser = $_SESSION['usuario'];
								$idUserQuestao = "User-$idUser";
								if(isset($_REQUEST['pesquisa'])){

									$pesquisa = $_REQUEST['pesquisa'];

									$sqlP = "select * from questao where ( idMat = '{$linha['idMate']}' and status = 'aprovado' and enunciado like '%$pesquisa%' ) or (autoria = '$idUserQuestao')";



								}
								else{

									$sqlP = "select * from questao where ( idMat = '{$linha['idMate']}' and status = 'aprovado') or (autoria = '$idUserQuestao')";


								}	
								$resposta2 = mysqli_query($link, $sqlP);

								if($resposta2){

									$linha2 = mysqli_fetch_assoc($resposta2);
									$cont = 0;

									while($linha2){

										$resposta3 = mysqli_query($link, "select * from questaolista where idQuest = '{$linha2['idQuest']}' and idList = '$idLista'");
										if($resposta3){

											
											$linha3 = mysqli_fetch_assoc($resposta3);

											/*if( $linha3){

												echo"Não há questões a serem mostradas";	
											
											}*/

											if(!$linha3){

												$cont++;
												
												$type = 0;
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
												

												echo"<div style='border: 1px solid grey; border-radius: 10px;text-align:left; padding-left: 10px;padding-right:5px;padding-top:5px'>

													<button style='float:right;' onclick=\"location.href='insereQuestaoNaListaLogica.php?idLista=$idLista&idQuestao={$linha2['idQuest']}'\" >Add</button><br>

													({$linha2['autoria']}) -	{$linha2['enunciado']}";



													printImageEnum($linha2['idQuest'], $link);

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
											

											}

										}


											$linha2 = mysqli_fetch_assoc($resposta2);

									}
									if($cont == 0){

										echo"Não há questões a serem mostradas";

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

							}

						}
						else{

							mysqli_error($link);

						}	

						mysqli_close($link);
					?>
