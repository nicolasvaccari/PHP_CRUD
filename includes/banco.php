<?php
	$banco = new mysqli("localhost", "root", "", "my_gamelist");
	if ($banco->connect_errno) {
		echo "<p>Encontrei um erro: $banco->connect_errno --> $banco->connect_error";
		die();
	}
	$banco->query("SET NAMES 'utf8'");
	$banco->query('SET character_set_connection=utf8');
	$banco->query('SET character_set_client=utf8');
	$banco->query('SET character_set_results=utf8');	
	//$banco = new mysqli("127.0.0.1") or ("localhost");
	//if(!$busca) {
		//echo "<p>Falha na busca: $banco->error</p>";
	//}else {
		//while($registro = $busca->fetch_object()) {
			//print_r($registro);
		//}
	//}
	
?>
</pre>
