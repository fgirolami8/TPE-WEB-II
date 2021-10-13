<?php
/* Smarty version 3.1.39, created on 2021-10-13 01:36:11
  from 'C:\xampp\htdocs\proyectos\musica\templates\header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_61661bebf1d079_49992104',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0c4e108d2c46cf7743bf4e2e4f975ceb98fc5532' => 
    array (
      0 => 'C:\\xampp\\htdocs\\proyectos\\musica\\templates\\header.tpl',
      1 => 1634081733,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61661bebf1d079_49992104 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<head>
    <base href="<?php echo BASE_URL;?>
"/>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Musica 2021</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <header>
        <h1>Musica 2021 - TPE Especial</h1>
        <b>
            <?php if ($_smarty_tpl->tpl_vars['log_state']->value != "login") {?>
                <h2 class="session_iniciada">[SESION DE ADMIN INICIADA]</h2>
            <?php } else { ?>
                <h2 class="session_cerrada">[INICIE SESION DE ADMIN]</h2>
            <?php }?>
        </b>
        <div class="cont_nav">
            <nav>
                <ul class="nav">
                    <li class="li_nav"><a href="songs">Songs</a></li>
                    <li class="li_nav"><a href="artists">Artists</a></li>
                    <li class="li_nav"><a href="<?php echo $_smarty_tpl->tpl_vars['log_state']->value;?>
">
                        <?php if ($_smarty_tpl->tpl_vars['log_state']->value == "login") {?>Log in
                        <?php } else { ?>Log out
                        <?php }?>
                    </a></li>            
                </ul>
            </nav>
        </div>
    </header>
    

<?php }
}