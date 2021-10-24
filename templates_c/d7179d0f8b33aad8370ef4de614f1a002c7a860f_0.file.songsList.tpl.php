<?php
/* Smarty version 3.1.39, created on 2021-10-25 01:38:56
  from 'C:\xampp\htdocs\proyectos\musica\templates\songsList.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6175ee90d3b7a1_21774333',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd7179d0f8b33aad8370ef4de614f1a002c7a860f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\proyectos\\musica\\templates\\songsList.tpl',
      1 => 1635117568,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_6175ee90d3b7a1_21774333 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<div class="container_songs">
    <?php if ($_smarty_tpl->tpl_vars['log_state']->value != "login") {?>
        <div class="cajaA">
            <button class="btnshow" class="btnShow">Add new song to list</button>
                          <section class="showing hideoptionAdd">

                <h3>Add Song: <span>(fill in all the fields)</span></h3>
                <form action="addSong" method="POST" class="formAdd">
                    <input type="text" name="name" placeholder="nombre">
                    <select name="artist" >
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
                    <input type="submit" value="Add Song" class="btnAddsong">
                </form>
                        <br>
            </section>
        </div>
    <?php }?>
    <div class="cajaB">
        <?php if ($_smarty_tpl->tpl_vars['log_state']->value != "login") {?>
            <h2><?php echo $_smarty_tpl->tpl_vars['titulo']->value;?>
</h2>
        <ul>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['songs']->value, 'song');
$_smarty_tpl->tpl_vars['song']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['song']->value) {
$_smarty_tpl->tpl_vars['song']->do_else = false;
?>
                <li><div>
                    <a href="songs/<?php echo $_smarty_tpl->tpl_vars['song']->value->id;?>
" class="estiloSong"><?php echo $_smarty_tpl->tpl_vars['song']->value->name;?>
</a>
                    <br>
                    <br>

                    <a href="deleteSong/<?php echo $_smarty_tpl->tpl_vars['song']->value->id;?>
" class="estiloBtnDelete">Borrar</a>
                    <br>
                    <br>
 <button class="btnshow" class="btnShow">Editar Cancion</button>
                             <section class="showing hideoptionAdd">

                        <form action="editSong/<?php echo $_smarty_tpl->tpl_vars['song']->value->name;?>
" method="POST" class="formEdit">
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
                            <input type="submit" value="Edit Song" class="btnEditsong">
                        </form>
                          </section>
                    <br><br>
                </div></li>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </ul>
    </div>
                
        <?php } else { ?>
            <h2><?php echo $_smarty_tpl->tpl_vars['titulo']->value;?>
</h2>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['songs']->value, 'song');
$_smarty_tpl->tpl_vars['song']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['song']->value) {
$_smarty_tpl->tpl_vars['song']->do_else = false;
?>
                <li>
                    <a href="songs/<?php echo $_smarty_tpl->tpl_vars['song']->value->id;?>
" class="estiloSong"><?php echo $_smarty_tpl->tpl_vars['song']->value->name;?>
</a>
                </li>
            <?php ob_start();
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
$_prefixVariable1 = ob_get_clean();
echo $_prefixVariable1;?>

        <?php }?>
        
</div>

<?php $_smarty_tpl->_subTemplateRender('file:footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
