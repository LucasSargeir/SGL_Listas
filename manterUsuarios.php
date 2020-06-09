<?php 
	include("conectaBanco.php");
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

						
						echo"		<p>Usuários</p>
								</header><center>";
								
						if( !isset($_REQUEST['type']) ){

							echo"<a href='manterUsuarios.php?type=admin' class='button alt small'>Adiministradores</a>
								 <a href='manterUsuarios.php?type=user' class='button alt small'>Usuários</a>";

						}
						else{


							$type = $_REQUEST['type'];
							if($type == "user"){
											
								echo"<a href='manterUsuarios.php?type=admin'  class='button alt small'>Adiministradores</a><br><br>";

							}
							else{

								echo"<a href='manterUsuarios.php?type=user'  class='button alt small'>Usuários</a><br><br>";

							}
							$resposta2 = mysqli_query($link, "select * from usuario where tipo = '$type'");

							if($resposta2){

								$linha2 = mysqli_fetch_assoc($resposta2);

								if(!$linha2){

									echo"Nada a mostrar";
								
								}	
								while($linha2){

										echo"<div style='border: 1px solid grey; text-align:left; padding-left: 10px;padding-right:5px;padding-top:5px;width:50%;margin-bottom:-1px'>
											
											 <button style='float:right;margin:2px' onclick=\"location.href='excluiUser.php?idUser={$linha2['idUser']}'\" >Excluir</button> ";
										
										if($type == "user"){
											echo" <button style='float:right;margin:2px' onclick=\"location.href='tornarAdmin.php?idUser={$linha2['idUser']}'\" >Tornar Admin</button> ";
										}										

										echo"<img style='float:left;padding:10px' src='images/$type.png' alt='$type' width='30%' height='30%' /><br>
											<div>
												<b> ID: </b>{$linha2['idUser']}<br>
												<b> Nome: </b>{$linha2['nome']}<br>
												<b> Email: </b>{$linha2['email']}<br>
												<b> Aniversário: </b>{$linha2['dataNasc']}<br><br>
											</div>
										</div>";

						
									$linha2 = mysqli_fetch_assoc($resposta2);
								}
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
