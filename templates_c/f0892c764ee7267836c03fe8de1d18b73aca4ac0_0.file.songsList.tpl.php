<?php
/* Smarty version 3.1.39, created on 2021-10-11 19:39:00
  from 'C:\xampp\htdocs\Proyectos\musica\templates\songsList.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_616476b4e81724_13661894',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f0892c764ee7267836c03fe8de1d18b73aca4ac0' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Proyectos\\musica\\templates\\songsList.tpl',
      1 => 1633973938,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_616476b4e81724_13661894 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<div>
   <p>Agregar Cancion: </p>
    <form action="addSong" method="POST">
        <input type="text" name="name" placeholder="nombre">
        <select name="artist" id="">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['artists']->value, 'artista');
$_smarty_tpl->tpl_vars['artista']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['artista']->value) {
$_smarty_tpl->tpl_vars['artista']->do_else = false;
?>
                <option value="<?php echo $_smarty_tpl->tpl_vars['artista']->value->artist;?>
"><?php echo $_smarty_tpl->tpl_vars['artista']->value->artist;?>
</option>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </select>
        <input type="text" name="genre" placeholder="genero">
        <input type="number" name="year" placeholder="año">
        <input type="text" name="album" placeholder="album">
        <input type="submit" value="Add Song">
    </form>
                <br>
</div>
    
    <h3><?php echo $_smarty_tpl->tpl_vars['titulo']->value;?>
</h3>
    <ul>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['songs']->value, 'song');
$_smarty_tpl->tpl_vars['song']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['song']->value) {
$_smarty_tpl->tpl_vars['song']->do_else = false;
?>
                <br>
            <li><div>
                <a href="songs/<?php echo $_smarty_tpl->tpl_vars['song']->value->name;?>
"><?php echo $_smarty_tpl->tpl_vars['song']->value->name;?>
</a>
                <br>
                <a href="deleteSong/<?php echo $_smarty_tpl->tpl_vars['song']->value->name;?>
">Borrar</a>
                <br>
                <br>
                Editar cancion 
                <br>
                <br>

                    <form action="editSong/<?php echo $_smarty_tpl->tpl_vars['song']->value->name;?>
" method="POST">
                        <input type="text" name="name" placeholder="nombre">
                        <select name="artist">
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['artists']->value, 'artista');
$_smarty_tpl->tpl_vars['artista']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['artista']->value) {
$_smarty_tpl->tpl_vars['artista']->do_else = false;
?>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['artista']->value->artist;?>
"><?php echo $_smarty_tpl->tpl_vars['artista']->value->artist;?>
</option>
                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        </select>
                        <input type="text" name="genre" placeholder="genero">
                        <input type="number" name="year" placeholder="año">
                        <input type="text" name="album" placeholder="album">
                        <input type="submit" value="Edit Song">
                    </form>
                <br>
            </div></li>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </ul>

<?php $_smarty_tpl->_subTemplateRender('file:footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
