
<h2>Novo Usuário</h2>
<form action="user-new.php" method="post">
    <table>
        <tr><td>Usuário<td><input type="text" name="usuario" id="usuario" size="10" maxlength="10"class="inputxt">
        <tr><td>Nome<td><input type="text" name="nome" id="nome"size="30" maxlength="30"class="inputxt">
        <tr><td>Tipo<td><select name="tipo" id="tipo">
                <option value="editor">Editor</option>
                <option value="admin">administrador</option>
        </select>
        <tr><td>Senha<td><input type="password" name="senha1" id="senha1"size="10" maxlength="10"class="inputxt">
        <tr><td>Confirme a senha <td><input type="password" name="senha2" id="senha2"size="10" maxlength="10"class="inputxt">
        <tr><td><input type="submit" value="Criar Usuário"class="butao1">
    </table>
</form>