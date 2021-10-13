<?php
/* Smarty version 3.1.39, created on 2021-10-12 21:04:05
  from 'C:\xampp\htdocs\proyectos\musica\templates\login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6165dc25336769_77910483',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6b40c87536c2b550037303852beaa28453fc8c29' => 
    array (
      0 => 'C:\\xampp\\htdocs\\proyectos\\musica\\templates\\login.tpl',
      1 => 1634059717,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_6165dc25336769_77910483 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<form action="authentify" method="POST">
    <input type="text" name="user_name" placeholder="Usuario">
    <input type="password" name="user_password" placeholder="contraseña">
    <input type="submit" value="Log in">
</form>
<b><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</b>
<?php $_smarty_tpl->_subTemplateRender('file:footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
