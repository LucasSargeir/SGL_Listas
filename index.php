<?php	
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
	include("conectaBanco.php");
	$mgm = "default";
	if(isset($_REQUEST['mgm'])){
		$mgm = $_REQUEST['mgm'];
		switch ($mgm) {
		 	case 1:
		 		$mgm = "Senhas diferentes!";
		 		break;
		 	
		 	case 2:
		 		$mgm = "Usuario ou senha incorretos!";
		 		break;

		 	default:

		 		break;
		 } // PRINTAR A MGM
	}
	session_start();
	if($_SESSION['usuario']){
		header("location:paginaUser.php");
	}
?>
<!DOCTYPE HTML>
<!--
	Spatial by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
	<script src="https://www.gstatic.com/firebasejs/4.6.0/firebase.js"></script>
		<script>
			// Initialize Firebase
			var config = {
				apiKey: "AIzaSyBwVJ9mgbRpfivdlaihqOzz8_Asl6YZFHs",
				authDomain: "sglfirebaseproject.firebaseapp.com",
				databaseURL: "https://sglfirebaseproject.firebaseio.com",
				projectId: "sglfirebaseproject",
				storageBucket: "sglfirebaseproject.appspot.com",
				messagingSenderId: "834259610082"
			};
			firebase.initializeApp(config);
			var database = firebase.database();
			function colocar() {
					 var n = document.getElementById('nome').value;
					 var data = document.getElementById('dataNasc').value;
					 var ema = document.getElementById('email2').value;
					 var senh = document.getElementById('senha2').value;
					 var csenha = document.getElementById('confSenha').value;
					 firebase.database().ref('Professor/'+n).set({
					nome: n,
					senha: senh,
					nascimento: data,
					email: ema
			 });

			 //return false;
	 		}
		</script>
		<title>SGL</title>
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
			<header id="header" class="alt">
				<?php
				/*	if($mgm){
						echo"

							<center>
								<div style='background-color:pink;color: red;border:1px solid red;margin-left:40%;margin-right:40%;font-size:50%'>
									$mgm
								</div>
							</center>
						";
					}*/
				?>
				<h1><strong><a href="">SGL</a></strong> by students</h1>
				<nav id="nav">
					<ul>
					<!--	<li><a href="index.html">Home</a></li>
						<li><a href="generic.html">Generic</a></li>
						<li><a href="elements.html">Elements</a></li>-->
					</ul>
				</nav>
			</header>

		<!-- Banner -->
			<section id="banner">
				<h2>SGL</h2>
				<p>Bem vindo ao SGL, entre para continuar:</p>
				<ul class="actions">
					<form method="post" action="verificaLogin.php">
						<center>
							<input style="width:30%" type="email" name="email" id="email" value="" placeholder="E-mail" />
							<br>
							<input style="width:30%" type="password" name="senha" id="senha" value="" placeholder="Senha" />
							<br>
							<input type="submit" value="Entrar" class="special" /></li>
						</center>
						</form>
				</ul>
			</section>

			<!-- One -->


			<!-- Two -->
				<section id="two" class="wrapper style2 special">
					<div class="container">
						<header class="major">
							<h2>Cadastro</h2>
							<p>Se você ainda não possui uma conta, cadastre-se agora</p>

						</header>
						<header class="major">
							<form method="post" action="cadastroUser.php">
								<center>
									<input  style="width:30%" type="text" name="nome" id="nome" value="" placeholder="Nome" />
									<br>
									<input  style="width:30%" type="date" name="dataNasc" id="dataNasc" placeholder="DD/MM/YYYY" />
									<br><br>
									<input  style="width:30%" type="email" name="email" id="email2" value="" placeholder="E-mail" />
									<br>
									<input  style="width:30%" type="password" name="senha" id="senha2" value="" placeholder="Senha" />
									<br>
									<input  style="width:30%" type="password" name="confSenha" id="confSenha" value="" placeholder="Confirmação da Senha" />
									<br>
									<input type="submit" value="Enviar" class="special" onclick="colocar()" /></li>
								</center>
								</form>
						</header>
				</section>

			<!-- Three -->


			<!-- Four -->


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
