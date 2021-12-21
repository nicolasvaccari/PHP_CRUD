<?php
  session_start();
  if(!isset($_SESSION['user'])) {
      #ISSET = NÃO, variável foi definida.
      #!ISSET = variável não foi definida.
      $_SESSION['user'] = '';
      $_SESSION['nome'] = '';
      $_SESSION['tipo'] = ''; 
  }
    function cripto($senha) {
        $c = '';
        for($pos = 0; $pos < strlen($senha); $pos++){
        $letra = ord($senha[$pos]) +1;
        #echo chr($letra);
        $c .= chr($letra);
    }
    return $c;

    }
    function gerarhash($senha) {
        $txt = cripto($senha);
        $hash = password_hash($senha, PASSWORD_DEFAULT);
        return $hash;
    }
    function testarhash($senha, $hash) {
        $ok = password_verify($senha, $hash);
        return $ok;
    }
    function logout() {
        #unset apaga variáveis
        unset($_SESSION['user']);
        unset($_SESSION['nome']);
        unset($_SESSION['tipo']);
    }
    function is_logado() {
        if (empty($_SESSION["user"])) {
            return false;
        }else {
            return true;
        }

    }
    function is_admin() {
        $t = $_SESSION["tipo"] ?? null;
            if (is_null($t)) {
                return false;
            }else {
                if ($t == 'admin') {
                    return true;
                }else {
                    return false;
                }

            }

    }
    function is_editor() {
        $t = $_SESSION["tipo"] ?? null;
            if (is_null($t)) {
                return false;
            }else {
                if ($t == 'editor'){
                    return true;
                }
            }


    }
    #$original = 'teste';
#echo "$original --- ";
#echo cripto($original) . " --- ";
    #echo gerarhash($original);
#--------------------------------------------------------------------
#echo testarhash("ftuvepobvub",'$2y$10$e7YMw6gfwS..RQ/4YCTXqenYtQF5ZaFWfYCYAHxlXSuFBViOaE9Xi');

#echo gerarhash('Olá');
#if(testarhash('Olá','$2y$10$KfO7wX8a6TZ4PeodvuKeaOyetLZlEEpBMhbq.8g8O5MkX5Oj6Yc4S')) {
    #echo " Senha confere ";
    #echo "<br>";
#} else {
    #echo "Senha NÃO confere";

#}