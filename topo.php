<?php 
echo"<p class='pequeno'>";
if(empty($_SESSION['user'])) {
    #empty = vazio
   echo "<a href='user-login.php'>Entrar</a>";
    
}else {
    echo "Olá, <strong> ". $_SESSION['nome'] ."</strong>";
    echo "<a href='user-logout.php'>Sair</a>";
}
echo"</p>";