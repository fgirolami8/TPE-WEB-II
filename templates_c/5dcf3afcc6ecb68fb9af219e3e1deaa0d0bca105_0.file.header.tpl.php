<?php
/* Smarty version 3.1.39, created on 2021-10-11 19:30:50
  from 'C:\xampp\htdocs\Proyectos\musica\templates\header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_616474ca8d5ba5_04318323',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5dcf3afcc6ecb68fb9af219e3e1deaa0d0bca105' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Proyectos\\musica\\templates\\header.tpl',
      1 => 1633973448,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_616474ca8d5ba5_04318323 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<head>
    <base href="<?php echo BASE_URL;?>
"/>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Musica 2021</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <b>
        <?php if ($_smarty_tpl->tpl_vars['log_state']->value != "login") {?>
            -------------------------------- ADMIN
        <?php } else { ?>
            -------------------------------- Público
        <?php }?>
    </b>
    <div>
        <h3>Sections:</h3>
        <ul>
            <li><a href="songs">Songs</a></li>
            <li><a href="artists">Artists</a></li>
            <li><a href="<?php echo $_smarty_tpl->tpl_vars['log_state']->value;?>
">
                <?php if ($_smarty_tpl->tpl_vars['log_state']->value == "login") {?>Log in
                <?php } else { ?>Log out
                <?php }?>
            </a></li>            
        </ul>
    </div>
    

<?php }
}
