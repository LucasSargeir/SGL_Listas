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
		 		$mgm = "Selecione uma matéria!";
		 		break;
		 	
		 	case 2:
		 		$mgm = "Você já possui uma lista com esse nome!";
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
	ead>
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
					 var data = document.getElementById('materia').value;
					 var m;
					   data = parseInt(data);
					 if(data==1){
						 m="Geografia";
					 }
					 if(data==3){
						 m="Filosofia";
					 }
					 if(data==4){
						 m="Biologia";
					 }
					 if(data==8){
						 m="Matematica";
					 }
					 if(data==9){
						 m="Sociologia";
					 }
					 if(data==10){
						 m="Portugues";
					 }
					 if(data==11){
						 m="Fisica";
					 }
					 firebase.database().ref('Lista/'+n).set({
					nome: n,
					materia: m,

			 });

			 //return false;
	 }
	 </script>
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


		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="container">

					<header class="major special">
						<h2>Crie uma lista</h2>
						<p>Crie uma lista para que você possa baixa-la depois</p>
					</header>
					<form action="criarLista.php" method='post'>
						<center>
							<input style="width:30%;border: 1px solid black" type="text" name="nome" id="nome" value="" placeholder="Nome da lista" required="" />
							<br>
							<select  style="width:30%;border: 1px solid black" name="materia" id="materia" >
								
								<option disabled='' selected="" value="0">- Matéria -</option>
								<?php
									$resposta2 = mysqli_query($link, "select * from materia");

									if($resposta2){

										$linha2 = mysqli_fetch_assoc($resposta2);
										
										while($linha2){

										if($linha2['status'] == 'aprovado'){
										
											echo"<option value='{$linha2['idMate']}'>{$linha2['nome']}</option>";	

										}
										
										$linha2 = mysqli_fetch_assoc($resposta2);

										}
									}
									
								?>
							</select>
							<br>
							<input type="submit" value="Enviar" class="special" />
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
