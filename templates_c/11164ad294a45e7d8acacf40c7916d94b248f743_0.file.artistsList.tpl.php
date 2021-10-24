<?php
/* Smarty version 3.1.39, created on 2021-10-25 01:41:31
  from 'C:\xampp\htdocs\proyectos\musica\templates\artistsList.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6175ef2b337916_21219933',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '11164ad294a45e7d8acacf40c7916d94b248f743' => 
    array (
      0 => 'C:\\xampp\\htdocs\\proyectos\\musica\\templates\\artistsList.tpl',
      1 => 1635118885,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_6175ef2b337916_21219933 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<div>
      <?php if ($_smarty_tpl->tpl_vars['log_state']->value != "login") {?>
        <div class="cajaA">
            <button class="btnshow" class="btnShow">Add new Artist to list</button>
                          <section class="showing hideoptionAdd">

                <h3>Add Artist: <span>(fill in all the fields)</span></h3>
                <form action="addArtist" method="POST" class="formAdd">
                    <input type="text" name="name" placeholder="Banda/Artista">
                    <input type="number" name="beginnings" placeholder="comienzos">
                    <input type="number" name="albums" placeholder="cantidad de albumes">
                    <input type="submit" value="Add Artist">
                </form>
   
            </section>
        </div>
    <?php }?>
</div>
<h3><?php echo $_smarty_tpl->tpl_vars['titulo']->value;?>
</h3>
<ul>
    <?php if ($_smarty_tpl->tpl_vars['log_state']->value != "login") {?>
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
"  class="estiloBtnDelete">Borrar</a>
                <br>
                <button class="btnshow" class="btnShow">Editar Artista</button>
                <section class="showing hideoptionAdd">
                <form action="editArtist/<?php echo $_smarty_tpl->tpl_vars['artist']->value->artist;?>
" method="POST" class="formAdd" >
                    <input type="text" name="name" placeholder="Banda/Artista">
                    <input type="number" name="beginnings" placeholder="comienzos">
                    <input type="number" name="albums" placeholder="cantidad de albumes">
                    <input type="submit" value="Edit Artist">
                </form>
                </section>
            </li>
            <br>
            </div><br>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    <?php } else { ?>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['artists']->value, 'artist');
$_smarty_tpl->tpl_vars['artist']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['artist']->value) {
$_smarty_tpl->tpl_vars['artist']->do_else = false;
?>   
            <li>
                <a href="artists/<?php echo $_smarty_tpl->tpl_vars['artist']->value->artist;?>
"><?php echo $_smarty_tpl->tpl_vars['artist']->value->artist;?>
</a>
                <br>
            </li>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    <?php }?>
</ul>

<?php $_smarty_tpl->_subTemplateRender('file:footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
