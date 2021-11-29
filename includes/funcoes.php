<?php
	function thumb($arq) {
		$caminho = "fotos/$arq";
		if(is_null($arq) || !file_exists($caminho)) {
		  //É nulo ou não existir
		  return "foto/indisponivel.png";
		}else {
			return $caminho;
		}
	}
	function voltar() {
		echo "<br>";
		echo "<a href='index.php'>voltar</a>";
	}
	#<?php
	#function thumb($foto) {
		#$arquivo = "fotos/$foto";	
		#if (is_null($foto) || !file_exists($arquivo)){
			#return "fotos/indisponivel.png";
		#} else {
			#return $arquivo;
		#} 
	#}
	function msg_sucesso($m) {
		$resp = "<div class='sucesso'>$m</div>";
		return $resp;
	}
	function msg_erro ($m) {
		$resp = "<div class='sucesso'>$m</div>";
		return $resp;
	}

	?>