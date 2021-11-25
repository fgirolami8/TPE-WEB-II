{include file = 'header.tpl'}

<form action="authentify" method="POST">
    <input type="text" name="user_name" placeholder="Usuario">
    <input type="password" name="user_password" placeholder="contraseña">
    <input type="submit" value="Log in">
</form>
<b>{$msg}</b>
{include file = 'footer.tpl'}