<?php 
	include("conectaBanco.php");
	session_start();
	if(!$_SESSION['usuario']){
		header("location:index.php");
	}
	if(isset($_REQUEST['mgm'])){
		$mgm = $_REQUEST['mgm'];
		switch ($mgm) {
		 	case 1:
		 		$mgm = "Escolha um formato de questão";
		 		break;

		 	case 2:
		 		$mgm = "Ja existe uma questão com esse enunciado cadastrada";
		 		break;

		 	default:
		 		$mgm = "Para de tentar bugar o site seu otário!";

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
		<title>Enviar Questão</title>
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
			<br><br>

		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="container">

					<header class="major special">
						<h2>Envie uma questão</h2>
						<p>Ajude a compor o banco de questões, envie uma questão</p>
					</header>
					<form action="formEnviaQuestao2.php">
						<center>
							<h1>Selecione o tipo de questão:</h1>
							<select style="width:30%;border: 1px solid black" name="tipoDeQuestao" id="tipoDeQuestao">
								<option disabled="" selected="" value="0">- Tipo de questão -</option>
								<option value="1">Discursiva</option>
								<option value="2">Objetiva Imagens</option>
								<option value="3">Objetiva Texto</option>
							</select>
							<br>
							<input type="submit" value="Criar" class="special" />
						</center>
					</form>
				</div>
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
