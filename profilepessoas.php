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
            <?php
                echo voltar();
                $codpes = $_GET['c'];
                    echo $codpes;
                    $q = "SELECT j.cod, j.nome, g.genero, p.produtora, j.nota, j.capa from jogos j join generos g on j.genero = g.cod join produtoras p on j.produtora = p.cod ";
                    if (!empty($chave)) {
                        $q .= " WHERE j.nome like '%$chave%' OR p.produtora like '%$chave%' OR g.genero like '%$chave%'";
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
                                echo "<td><a href='detalhes.php?cod=$reg->cod'>$reg->nome</a>";
                                echo "<br>($reg->genero) $reg->produtora";
                            }
                        } else {
                            echo "<p>Nenhum registro encontrado...</p>";
                        }						
                    }
                ?>
                <script type="text/javascript">
                    var captar = "";
                    function chamar (){
                        captar = document.getElementById('valor').value;
                        a = document.getElementById('digito')
                        a.innerHTML = (`${captar}`);
                    }
                </script>
                <h1>estudando</h1>
                    <input type="text" name="valor" id="valor">
                    
                    <input type="submit" name="" onclick="chamar()">

                <p id="digito">

                </p>
                </script>

        </div>
    </body>
</html>