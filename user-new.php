<!DOCTYPE html>
<?php 
require_once "includes/banco.php";
require_once "includes/login.php";
require_once "includes/funcoes.php"; 

?>
<html lang="pt-br">
	<head>
    
		<meta charset="UTF-8"/>
		<link rel="stylesheet" href="estiloforms.css"/>
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons"/>
		<title>Criar novo usuário</title>
	</head>
	<body>
        <div id="corpo">
            <h2 id="titulo">My Game List</h2>
            <?php
                if (!is_admin()) {
                    echo "<br>";
                }else {
                    }if(!isset($_POST['usuario'])) {
                        require 'user-new-form.php';
                    }else {
                       
                        $usuario = $_POST['usuario'] ?? null;
                        $nome = $_POST['nome'] ?? null;
                        $senha1 = $_POST['senha1'] ?? null; 
                        $senha2 = $_POST['senha2'] ?? null;
                        $tipo = $_POST['tipo'] ?? null;

                        if ($senha1 === $senha2) {
                            if (empty($usuario) || empty($nome) || empty($senha1) ||empty($senha2) || empty($tipo)) {
                                require 'user-new-form.php';
                                echo msg_erro("Todos os dados são obrigatórios");

                            }else {
                                $senha = gerarhash($senha1);
                                $q = "INSERT INTO usuarios (usuario, nome, senha, tipo) VALUES ('$usuario','$nome','$senha','$tipo')";
                                
                                if($banco->query($q)) {
                                    echo msg_sucesso("Usuário $nome cadastrado com sucesso");
                                    #header("Location: index.php");
                                    #die();
                                }else {
                                    require 'user-new-form.php';
                                    echo  msg_erro("Tente novamente, talvez o nome de usuário ja esteja sendo ultilizado");
                                }
                            
                                
                            }
                        }else {
                            require 'user-new-form.php';
                            echo msg_erro("Senhas não conferem");
                        }
                    }
                
                echo voltar();

            ?>

        </div>
    </body>
</html>
