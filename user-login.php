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
		<title>Login de usuário</title>
	</head>
	<body>
		<div id="corpo">
			<?php
				$u =  $_POST['usuario'] ?? null; #ou '';
				$s = $_POST['senha'] ?? null;
				if(is_null($u) || is_null($s)) {
					require "user-login-form.php";
				} else {
					$q ="SELECT usuario, nome, senha, tipo FROM usuarios WHERE usuario = '$u' LIMIT 1";
					$busca = $banco->query($q);
					if(!$busca){
						echo msg_erro('Falha ao acessar banco');
					}else {
						if($busca->num_rows > 0) {
							$reg = $busca->fetch_object();
							if(testarhash($s, $reg->senha)) {
								#testarhash($s, $reg->senha)
							#senha teste:	#$2y$10$w7on7cjLKNtmJUGkiHIXoOQAwTJzkgxXqLmjtfDUkCXmQK0784.IS
								echo msg_sucesso('logado com sucesso!');
								$_SESSION['user'] = $reg->usuario;
								$_SESSION['nome'] = $reg->nome;
								$_SESSION['tipo'] = $reg->tipo;
							}else {
								echo msg_erro('Senha inválida');
							}
						}else {
							echo  msg_erro('Conta inexistente');
						}
					}
				}
				echo voltar();
			?>

        </div>
    </body>
</html>