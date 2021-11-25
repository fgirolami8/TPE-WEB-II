{include file = 'header.tpl'}

<form action="registercheck" method="POST">
    <input type="text" name="user_name" placeholder="Usuario/e-mail">
    <input type="password" name="user_password" placeholder="contraseña">
    <input type="submit" value="Register">
</form>
<b>{$msg}</b>
<br>
<h2>Si todavia no tenes una cuenta Registrate.<br> 
Si ya te registraste entra a "Log In" para loguearte!!!</h2>
{include file = 'footer.tpl'}