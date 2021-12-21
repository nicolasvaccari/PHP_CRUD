<!DOCTYPE html>
<?php 
require_once "includes/banco.php";
require_once "includes/login.php";
require_once "includes/funcoes.php"; 
?>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8"/>
		<link rel="stylesheet" href="estilo.css"/>
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons"/>
		<title>???</title>
	</head>
	<body>
		<div id="corpo">
        <table class="listagem">
			<?php
                function jogosl() {
                        $q = "SELECT j.cod, j.nome, g.genero, p.produtora, j.nota, j.capa from jogos j join generos g on j.genero = g.cod join produtoras p on j.produtora = p.cod ";
                        if (!empty($chave)) {
                            $q .= " WHERE j.nome like '%$chave%' OR p.produtora like '%$chave%' OR g.genero like '%$chave%'";
                        }
                        $banco = new mysqli("localhost", "root", "", "my_gamelist");
                        if ($banco->connect_errno) {
                            echo "<p>Encontrei um erro: $banco->connect_errno --> $banco->connect_error";
                            die();
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
                                    echo "<br><p id='genros'>($reg->genero) $reg->produtora</p>";
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
                }
                echo jogosl();
			?>
		</table>

        </div>
    </body>
</html>
