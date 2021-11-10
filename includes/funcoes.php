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

	?>