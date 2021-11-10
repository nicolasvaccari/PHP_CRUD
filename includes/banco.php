<pre> <?php
	$banco = new mysqli("127.0.0.1","root", "", "my_gamelist");
	if($banco->connect_errno) {
		echo "<p>deu algo errado</p>";
		die();
	}
	$banco->query("select * from generos");
	$busca = $banco->query("select * from generos");
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
