<?php
/* Smarty version 3.1.39, created on 2021-10-12 15:50:15
  from 'C:\xampp\htdocs\proyectos\musica\templates\artistSongs.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6165929773f670_42717261',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '75898ce1291d3bf4c11a1654333a6c562f50aaf3' => 
    array (
      0 => 'C:\\xampp\\htdocs\\proyectos\\musica\\templates\\artistSongs.tpl',
      1 => 1633999162,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_6165929773f670_42717261 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<div>
<h3><?php echo $_smarty_tpl->tpl_vars['titulo']->value;?>
</h3>
</div>
<div>
<h3><?php echo $_smarty_tpl->tpl_vars['artist']->value[0]->artist;?>
</h3>
<p>Comienzos: <?php echo $_smarty_tpl->tpl_vars['artist']->value[0]->beginnings;?>
 | Albumes: <?php echo $_smarty_tpl->tpl_vars['artist']->value[0]->albums;?>
</p>
</div>
<div>
    <?php if ($_smarty_tpl->tpl_vars['artist']->value[0]->name != null) {?>
        <ul>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['artist']->value, 'item');
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
                <li><?php echo $_smarty_tpl->tpl_vars['item']->value->name;?>
 | Album: <?php echo $_smarty_tpl->tpl_vars['item']->value->album;?>
 | año: <?php echo $_smarty_tpl->tpl_vars['item']->value->year;?>
 | Genero: <?php echo $_smarty_tpl->tpl_vars['item']->value->genre;?>
</li>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </ul>
    <?php } else { ?>
        apa, this artist have no songs! :p
    <?php }?>
</div>

<a href="artists">volver</a>

<?php $_smarty_tpl->_subTemplateRender('file:footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
