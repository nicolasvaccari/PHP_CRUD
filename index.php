<!DOCTYPE html>
<?php 
require_once "includes/banco.php";
require_once "includes/login.php";
require_once "includes/funcoes.php"; 
$ordem = $_GET['o'] ?? "nome";
$chave = $_GET['c'] ?? "";
?>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8"/>
		<link rel="stylesheet" href="estilos.css"/>
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined">
		<title>My Game List</title>
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
		
		<h2>Escolha seu jogo</h2>
		<span class="material-icons-outlined">
		search
		</span>
			<h3>Top Game List</h3>
		<form method="get" action="index.php">
			<p class= "pequeno"> Ordenar: <a href="index.php?o=n"class="cl">Nome</a> | 
			<a href="index.php?o=d"class="cl">Distribuidora</a> | 
			<a href="index.php?o=n1" class="cl">Nota Alta</a> | 
			<a href="index.php?o=n2"class="cl">Nota Baixa</a> 
			<br>
			<br>
			</p>
		</form>
		<table class="listagem">
			<?php
				$q = "SELECT j.cod, j.nome, g.genero, p.produtora, j.nota, j.capa from jogos j join generos g on j.genero = g.cod join produtoras p on j.produtora = p.cod ";
				if (!empty($chave)) {
					$q .= " WHERE j.nome like '%$chave%' OR p.produtora like '%$chave%' OR g.genero like '%$chave%'";
				}
				switch ($ordem) {
					case "d":
						$q .= " ORDER BY p.produtora";
						break;
					case "n1":
						$q .= " ORDER BY j.nota DESC";
						break;
					case "n2":
						$q .= " ORDER BY j.nota ASC";
						break;
					default:
						$q .= " ORDER BY j.nome";
						break;
				}
				$busca = $banco->query($q);
				if (!$busca) {
					echo "Falhou! $banco->error";
				} else {
					if ($busca->num_rows > 0) {
						while($reg = $busca->fetch_object()){
							# Carregar thumb
							echo "<tr><td>";
							$thumb = thumb($reg->capa);
							echo "<img src='$thumb' class='mini'/>";
							# Mostrar jogo
							echo "<td><a href='detalhes.php?cod=$reg->cod'id='nome'>$reg->nome</a>";
							echo "<br><p class='genros'>($reg->genero) $reg->produtora</p>";
							if (is_admin()) {
								# code...
							}elseif (is_editor()) {
								# code...
							}
						}
					} else {
						echo "<p>Nenhum registro encontrado...</p>";
					}						
				}
			?>
		</table>
		</div>
		<footer>
			<?php include "rodape.php"; ?>
		</footer>
	</body>
</html>