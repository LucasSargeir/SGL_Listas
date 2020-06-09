<?php 
	include("conectaBanco.php");
	session_start();
	if(!$_SESSION['usuario']){
		header("location:index.php");
	}
	$mgm = "default";
	if(isset($_REQUEST['mgm'])){
		$mgm = $_REQUEST['mgm'];
		switch ($mgm) {
		 	case 1:
		 		$mgm = "Disciplina já sugerida";
		 		break;

		 	default:

		 		break;
		 } // PRINTAR A MGM
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
		<title>Home</title>
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
	<script type="text/javascript">
			
			
			function alerta() {
				<?php echo" alert('$mgm');"; ?>
			}
			
			
		</script>
	</head>
	<?php
	if(isset($_REQUEST['mgm'])){
		
		$mgm = $_REQUEST['mgm'];
		echo"<body class='landing' onload='alerta()'>";
	}
	else{
		echo"<body class='landing'>";
	}

	?>

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


		<!-- Banner -->
			<section id="banner">
				<h2>Bem vindo</h2>
				<?php
					echo"<h3 style='color:grey'>{$linha['nome']}</h3>";
				?>
				<p></p>
				<ul class="actions">
					<li><a href="formCriaLista.php" class="button special medium">Criar Lista</a></li>
				</ul>
			</section>

			<!-- One -->
				<section id="one" class="wrapper style1">
					<div class="container 75%">
						<div class="row 200%">
							<div class="6u 12u$(medium)">
								<header class="major">
									<center><h2>Site Gerador de Listas</h2>
									<p>Crie listas de exercícios ou provas com apenas alguns cliques</p></center>
								</header>
							</div>
							<div class="6u$ 12u$(medium)">
								<p>Site desenvolvido por alunos do curso técnico de informática do Centro Federal de Educação Tecnológica Celso Suckow da Fonseca. O site é uma ferramenta que permite o usuário criar listas de exercício de diversas matérias, podendo até mesmo compartilha-la sem problemas.</p>
								<p>O usuário além de criar suas listas, pode também ajudar enviando suas próprias questões e propondo novas disciplinas para serem insidas ao site. Para sugerir uma disciplina preencha o campo abaixo:</p>
								<form action="sugereDisciplina.php" method="post">
									<input type="text" name="nome" id="nome" placeholder="Nome da disciplina" /><br>
									<input type="submit" value="Enviar" />
								</form>
							</div>
						</div>
					</div>
				</section>

			<!-- Two -->


			<!-- Three -->
				<section id="two" class="wrapper style2 special">
					<div class="container">
						<header class="major special">
							<h2>Suas Listas</h2>
						<!--	<p>Suas listas</p>-->
						</header>
						<div class="feature-grid">
							<?php 

							$resposta = mysqli_query($link, "select * from lista where idUsu = {$_SESSION['usuario']}");

							if($resposta){

								$linha = mysqli_fetch_assoc($resposta);

								if(!$linha){

									echo"<p>Você não possui listas</p><br>";

								}

								while($linha){
									
									echo"<div class='feature'>
										<div class='image rounded'><img src='images/pic04.jpg' alt='' /></div>
										<div class='content'>
											<header>
												<h4>{$linha['nome']}</h4>
												<br>
											</header>
											<a href='verLista.php?idLista={$linha['idLista']}' class='button alt small'>Ver mais</a>
											<a href='excluirLista.php?idLista={$linha['idLista']}' class='button alt small'>Excluir</a>
										</div>
									</div>";

									$linha = mysqli_fetch_assoc($resposta);
								}
							}
							?>
					</div>
				</section>

			<!-- Four -->
				<section id="four" class="wrapper style3 special">

				</section>

		<!-- Footer -->
			<footer id="footer">
				<div class="container">
					<hr>
					<ul class="copyright">
						<li>&copy; Untitled</li>
						<li>Design: <a href="http://templated.co">TEMPLATED</a></li>
						<li>Images: <a href="http://unsplash.com">Unsplash</a></li>
					</ul>
				</div>
			</footer>

	</body>
</html>
