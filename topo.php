<?php 
require_once "includes/banco.php";
require_once "includes/login.php";
require_once "includes/funcoes.php"; 
echo "<link rel='stylesheet' href='estilos.css'/>";
echo"<p class='pequeno'>";
#$_SESSION['user'] = 'teste1';
#$_SESSION['nome'] = 'Ricardo';

if(empty($_SESSION['user'])) {
    #empty = vazio
    
   echo "<div id='entrar'><a href='user-login.php'>Entrar</a></div>";
   echo "<p id='ademirostop'>";
   echo "<a href='user-new.php' id='anewuser'>cadastrar</a>";
   echo "</div>";
   echo"</p>";
    
}else {
    echo "<div id='topnome'>Olá, <strong> ". $_SESSION['nome'] ." </strong></div> ";
    echo "<a href='user-logout.php'><span class='material-icons-outlined' id='logout'>logout";
	echo"</span></a>";
    echo "<a href='pessoasteste.php'><span class='material-icons-outlined'id='fff'>
    people";
    echo "<a href='index.php'><span class='material-icons-outlined' id='ff'>
    account_circle";
    echo "</span></a>";
    echo "</span></a>";
    if(is_admin()) {
        echo "<p id='ademirostop'>";
        echo "<a href='user-new.php' id='anewuser'>cadastrar</a>";
        echo "+ jogo </div>";
        echo"</p>";
    }
}
echo"</p>";
