<?php
	


	list($nome,$form) = explode(".", $imagem);

	//if( $nome != null & ($form == "jpg" || $form =="JPG")){

	$imagemEnviada = imagecreatefromjpeg($nomeTemp);
	list($w, $h) = getimagesize($nomeTemp);

/*	if ($w > $h) {
		$wi = 0.8 * $h;
	}
	else {
		$wi = 0.8 * $w;
	}

	$xi = ($w - $wi) / 2;
	$yi = ($h - $wi) / 2;

	$wf = 150;*/

	$we = 500;
	$he = ($we*$h)/$w;

	$destino = imagecreatetruecolor($we, $he);

	imagecopyresized($destino, $imagemEnviada, 0, 0, 0, 0, $we, $he, $w, $h);

	$nomeImagemPraSalvar = sha1_file($nomeTemp);

	imagejpeg($destino, "./images/enunciado/enunciado_$nomeImagemPraSalvar.jpg");
	//imagejpeg($imagemEnviada, "./images/uploads/original_$nomeImagemPraSalvar.jpg");



	imagedestroy($destino);
	imagedestroy($imagemEnviada);

	$nomeImagem = "enunciado_".$nomeImagemPraSalvar.".jpg";
	
	$resp = mysqli_query($link, "insert into imagemenunciado (nome, idQuesta) values ('$nomeImagem','{$linha2['idQuest']}')");

?>