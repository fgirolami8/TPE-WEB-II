<?php
/* Smarty version 3.1.39, created on 2021-10-13 00:56:03
  from 'C:\xampp\htdocs\proyectos\musica\templates\songsListPublic.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_61661283d765b8_38975517',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '32a288973015e63ce4fb6ae4f13ceae6edf19191' => 
    array (
      0 => 'C:\\xampp\\htdocs\\proyectos\\musica\\templates\\songsListPublic.tpl',
      1 => 1634078984,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_61661283d765b8_38975517 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    
    <h3><?php echo $_smarty_tpl->tpl_vars['titulo']->value;?>
</h3>
    <ul>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['songs']->value, 'song');
$_smarty_tpl->tpl_vars['song']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['song']->value) {
$_smarty_tpl->tpl_vars['song']->do_else = false;
?>
            <li><div><a href="songs/<?php echo $_smarty_tpl->tpl_vars['song']->value->name;?>
"><?php echo $_smarty_tpl->tpl_vars['song']->value->name;?>
</a></div></li>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </ul>

<?php $_smarty_tpl->_subTemplateRender('file:footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
