<?php
/* Smarty version 3.1.39, created on 2021-10-12 00:59:50
  from 'C:\xampp\htdocs\Proyectos\musica\templates\artistsList.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6164c1e61deb57_60627269',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '954d79b0ca5eafaaa44760dc4dee8a47563a0776' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Proyectos\\musica\\templates\\artistsList.tpl',
      1 => 1633992901,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_6164c1e61deb57_60627269 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<div>
    <h3>Agregar Artista: </h3>
    <form action="addArtist" method="POST">
        <input type="text" name="name" placeholder="Banda/Artista">
        <input type="number" name="beginnings" placeholder="comienzos">
        <input type="number" name="albums" placeholder="cantidad de albumes">
        <input type="submit" value="Add Artist">
    </form>
    <br>
</div>
    <h3><?php echo $_smarty_tpl->tpl_vars['titulo']->value;?>
</h3>
    <ul>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['artists']->value, 'artist');
$_smarty_tpl->tpl_vars['artist']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['artist']->value) {
$_smarty_tpl->tpl_vars['artist']->do_else = false;
?>
        <div>   
        <li>
            <a href="artists/<?php echo $_smarty_tpl->tpl_vars['artist']->value->artist;?>
"><?php echo $_smarty_tpl->tpl_vars['artist']->value->artist;?>
</a>
            <br>
            <a href="deleteArtist/<?php echo $_smarty_tpl->tpl_vars['artist']->value->artist;?>
">Borrar</a>
            <br>
            <p>Editar Artista: </p>
            <form action="editArtist/<?php echo $_smarty_tpl->tpl_vars['artist']->value->artist;?>
" method="POST">
                <input type="text" name="name" placeholder="Banda/Artista">
                <input type="number" name="beginnings" placeholder="comienzos">
                <input type="number" name="albums" placeholder="cantidad de albumes">
                <input type="submit" value="Edit Artist">
            </form>
        </li>
        <br>
        </div><br>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </ul>

<?php $_smarty_tpl->_subTemplateRender('file:footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
