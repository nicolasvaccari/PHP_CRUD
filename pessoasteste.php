<!DOCTYPE html>
<?php 
require_once "includes/banco.php";
require_once "includes/login.php";
require_once "includes/funcoes.php"; 
?>
<html lang="pt-br">
	<head>
	<meta charset="UTF-8"/>
		<link rel="stylesheet" href="estilos.css"/>
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined">
		<title>Ver pessoas My Game List</title>
	</head>
	<body>
	<header>
			<form method="get" action="index.php">
				<at href="index.php" id="titulo"><h2>My Game List</h2></a>
				
				<input type="text" name="c" size="10" maxlength="40" id="inp" placeholder=" Pesquisar..."/>
				<input type="submit" value="Ok" id="butao"/></p>
				<div id="top"><?php include "topo.php";?></div>
	
			</form>
		</header>	
		<div id="corpo">
				
			<a href="index.php"><span class="material-icons-outlined" id="home">
				home
			</span></a>
            <?php
                echo voltar();
                echo "<br>";
           
            	$q = "SELECT u.usuario, u.nome, u.tipo from usuarios u";
                $busca = $banco->query($q);
				if (!$busca) {
					echo "Falhou! $banco->error";
				} else {
					if ($busca->num_rows > 0) {
						while($reg = $busca->fetch_object()){
							# Carregar thumb
							echo "<tr><td>";
							echo "<td><a href='profilepessoas.php?'id='nome'>$reg->nome</a>"."<br>";
                            echo "<p class='genros'>$reg->tipo<br>";
							echo "<br>";
							echo "<hr>";

                            echo "<br>";

						}
					} else {
						echo "<p>Nenhum registro encontrado...</p>";
					}						
				}
            ?>

        </div>
    </body>
</html>