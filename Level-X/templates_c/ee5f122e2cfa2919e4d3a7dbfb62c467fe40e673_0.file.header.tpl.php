<?php
/* Smarty version 3.1.33, created on 2018-11-23 22:11:12
  from 'C:\xampp\htdocs\Level-X\templates\header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5bf86cf0cab8b9_33063902',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ee5f122e2cfa2919e4d3a7dbfb62c467fe40e673' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Level-X\\templates\\header.tpl',
      1 => 1543007352,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5bf86cf0cab8b9_33063902 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
  <head>
    <!-- (SERVER_NAME EJ: localhost). (SERVER_PORT EJ: :8888). (PHP_SELF EJ: Level-X) -->
    <base href="http://<?php echo $_SERVER['SERVER_NAME'];?>
:<?php echo $_SERVER['SERVER_PORT'];
echo dirname($_SERVER['PHP_SELF']);?>
/">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php echo $_smarty_tpl->tpl_vars['Titulo']->value;?>
</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/master.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <?php echo '<script'; ?>
 src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"><?php echo '</script'; ?>
>
      <?php echo '<script'; ?>
 src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"><?php echo '</script'; ?>
>
    <![endif]-->
  </head>
  <body>
<?php }
}
