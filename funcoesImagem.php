<?php
	
	function printImageEnum($idQuestao, $link){

		$resposta = mysqli_query($link, "select * from imagemenunciado where idQuesta = $idQuestao");

		if($resposta){

			$linha = mysqli_fetch_assoc($resposta);

			if($linha){

				echo"<br><br><img src='./images/enunciado/{$linha['nome']}' alt='{$linha['nome']}' />";

			}

		}


	}

	function addImagemAlternativa($imagem, $nomeTemp, $idMEI, $alternativa, $link){


		list($nome,$form) = explode(".", $imagem);

		//if( $nome != null & ($form == "jpg" || $form =="JPG")){

		$imagemEnviada = imagecreatefromjpeg($nomeTemp);
		list($w, $h) = getimagesize($nomeTemp);

		$we = 200;
		$he = ($we*$h)/$w;

		$destino = imagecreatetruecolor($we, $he);

		imagecopyresized($destino, $imagemEnviada, 0, 0, 0, 0, $we, $he, $w, $h);

		$nomeImagemPraSalvar = sha1_file($nomeTemp);

		imagejpeg($destino, "./images/alternativa/alternativa_".$alternativa."_$nomeImagemPraSalvar.jpg");
		//imagejpeg($imagemEnviada, "./images/uploads/original_$nomeImagemPraSalvar.jpg");



		imagedestroy($destino);
		imagedestroy($imagemEnviada);

		$nomeImagem = "alternativa_".$alternativa."_".$nomeImagemPraSalvar.".jpg";
		
		$resp = mysqli_query($link, "insert into imagemquestao (nome,idMEI,alternativa) values ('$nomeImagem','$idMEI','$alternativa')");


	}
	function verificaJPG($nomeImagem){

		$formato = explode(".", $nomeImagem);

		if($formato[count($formato)-1] == "jpg" || $formato[count($formato)-1] == "JPG"){
			return true;
		}
		return false;
	}
?>