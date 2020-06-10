<?php 
	include("conectaBanco.php");
	session_start();
	if(!$_SESSION['usuario']){
		header("location:index.php");
	}
	$resposta = mysqli_query($link, "select * from usuario where idUser = '{$_SESSION['usuario']}'");
	$linha = mysqli_fetch_assoc($resposta);
	if(isset($_REQUEST['tipoDeQuestao'])){
		$tipoDeQuestao= $_REQUEST['tipoDeQuestao'];
		if($tipoDeQuestao == 0){
			header("location:formEnviaQuestao1.php?mgm=1");
		}
	}
	else{
		header("location:formEnviaQuestao1.php?mgm=1");
	}
	if(isset($_REQUEST['mgm'])){
		$mgm = $_REQUEST['mgm'];
		switch ($mgm) {
		 	case 1:
		 		$mgm = "Não esqueça de definir a matéria!";
		 		break;

		 	case 2:
		 		$mgm = "Não esqueça de definir qual das alternativas é a correta!";
		 		break;

		 	case 3:
		 		$mgm = "As imagens passadas devem estar no formato jpg!";
		 		break;

		 	default:
		 		$mgm = "Para de tentar bugar o site seu otário!";

		 		break;
		 } // PRINTAR A MGM
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
						 	try{
					 var a = document.getElementById('aResp').value;
					 var b = document.getElementById('bResp').value;
					 var c = document.getElementById('cResp').value;
					 var d = document.getElementById('dResp').value;
					 var e = document.getElementById('eResp').value;
					 var ra = document.getElementById('a').checked;
					 var rb = document.getElementById('b').checked;
					 var rc = document.getElementById('c').checked;
					 var rd = document.getElementById('d').checked;
					 var re = document.getElementById('e').checked;
					 var data = document.getElementById('materia').value;
					 var enunciado = document.getElementById('enunciado').value;
					 var m;
					 var certo;
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
					 if(ra==true){
						 certo="A";
					 }
					 if(rb==true){
						certo="B";
					}
					if(rc==true){
						certo="C";
					}
					if(rd==true){
						certo="D";
					}
					if(re==true){
						certo="E";
					}
					 firebase.database().ref('Lista/'+m+'/'+enunciado).set({
					enunciado: enunciado,
					lista: m,
					status: false,
					reposta: certo,
					a: a,
					b: b,
					c: c,
					d: d,
					e: e
			 });
		 }
	 catch(err){
		 alert(err.message);

	 }

			 //return false;
	 }
		</script>
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


		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="container">
					<br>
					<header class="major special">
						<h2>Insira os dados da questão</h2>
						<p>Preencha os campos abaixo para que a questão possa ser enviada</p>
					</header>
					<?php
						echo"<form action='insereQuestao.php' method='post'  enctype='multipart/form-data' >
							<input type='hidden' id='status' name='status' value='aguardando'/>
							<input type='hidden' id='tipoDeQuestao' name='tipoDeQuestao' value='$tipoDeQuestao'/>";
						
						echo"Autoria (opcional):<input type='text'  style='width:100px;border: 1px solid black' maxlength='20' id='autoria' name='autoria' >
						<label for='autoria'>Caso não seja passado será utilizado uma identificação do usuário</label>
							";

						echo"<br>Matéria<select style='width:25%;border: 1px solid black' id='materia' name='materia'>
								<option  disabled='' selected='' value='0' >------------</option>";


								$resposta = mysqli_query($link, "select * from materia");	

								if($resposta){

									$linha = mysqli_fetch_assoc($resposta);

									while($linha){

										if($linha['status'] == "aprovado"){

											echo"<option value='{$linha['idMate']}'>{$linha['nome']}</option>";		

										}

									$linha = mysqli_fetch_assoc($resposta);										


									}

								}



						echo"</select> <br>Enunciado:<textarea cols='10' rows='10' style='resize:none; width:75%;border: 1px solid black' id='enunciado' name='enunciado' required=''></textarea><br>

							<hr style='background:black' >Imagem para enunciado (opcional):<br><br>
							<input style='width:500px' type='file' name='imagemEnunciado' >
							<label for='imagemEnunciado'>Tamanho máximo 20MB / formatos aceitos: .jpg</label>
							<hr style='background:black' ><br><br><br>";


						if( $tipoDeQuestao == 1 ){
							echo"Resposta:<textarea cols='10' rows='10' style='resize:none; width:75%;border: 1px solid black' id='resposta' name='resposta' required=''></textarea>";
						}
						if( $tipoDeQuestao == 2 ){
							echo"Alternativas:<br>
								(A) <input style='border: 1px solid black' type='radio'name='certa' value='a' id='a'>
									<label for='a'><br></label>
									<input style='width:500px' type='file' name='aResp' required=''><br>

								(B) <input style='border: 1px solid black' type='radio'name='certa' value='b' id='b'>
									<label for='b'><br></label>
									<input style='width:500px' type='file' name='bResp' required=''><br>

								(C) <input style='border: 1px solid black' type='radio'name='certa' value='c' id='c'>
									<label for='c'><br></label>
									<input style='width:500px' type='file' name='cResp' required=''><br>

								(D) <input style='border: 1px solid black' type='radio'name='certa' value='d' id='d'>
									<label for='d'><br></label>
									<input style='width:500px' type='file' name='dResp' required=''><br>

								(E) <input style='border: 1px solid black' type='radio'name='certa' value='e' id='e'>
									<label for='e'><br></label>
									<input style='width:500px' type='file' name='eResp' required=''><br>

								<br>";
						}
						if( $tipoDeQuestao == 3 ){
									echo"Alternativas:<br>
								(A) <input type='radio'name='certa' value='a' id='a' >
									<label for='a'><br></label>
									<input style='width:500px;border: 1px solid black' type='text' name='aResp' id='aResp' required='' checked><br>

								(B) <input type='radio'name='certa' value='b' id='b'>
									<label for='b'><br></label>
									<input style='width:500px;border: 1px solid black' type='text' name='bResp' id='bResp' required=''checked><br>

								(C) <input type='radio'name='certa' value='c' id='c'>
									<label for='c'><br></label>
									<input style='width:500px;border: 1px solid black' type='text' name='cResp' id='cResp' required=''checked><br>

								(D) <input type='radio'name='certa' value='d' id='d'>
									<label for='d'><br></label>
									<input style='width:500px;border: 1px solid black' type='text' name='dResp'id='dResp' required=''checked><br>

								(E) <input type='radio'name='certa' value='e' id='e'>
									<label for='e'><br></label>
									<input style='width:500px;border: 1px solid black' type='text' name='eResp' id='eResp' required=''checked><br>

								<br>";
						}

						echo"<center>
						<br><input type='submit' value='Enviar' class='special' />
							</center><br>
						</form>";
					?>
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