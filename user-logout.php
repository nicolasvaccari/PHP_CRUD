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
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons"/>
		<title>???</title>
	</head>
	<body>
		<div id="corpo">
            <?php
                logout();
                echo msg_sucesso('Usuário desconectado com sucesso.');
                echo voltar();
				header("Location: index.php");
                die();
            ?>

        </div>
    </body>
</html>
