{include file = 'header.tpl'}

<form action="registercheck" method="POST">
    <input type="text" name="user_name" placeholder="Usuario/e-mail">
    <input type="password" name="user_password" placeholder="contraseña">
    <input type="submit" value="Log in">
</form>
<b>{$msg}</b>
{include file = 'footer.tpl'}