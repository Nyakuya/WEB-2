<?php
/* Smarty version 3.1.33, created on 2018-10-17 14:10:14
  from 'C:\xampp\htdocs\Level-X\templates\loginLogout.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5bc726a6cb4ed8_77547938',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '73b6c25c54904df0e74567e95d953161e168a83c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Level-X\\templates\\loginLogout.tpl',
      1 => 1539778212,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5bc726a6cb4ed8_77547938 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- inicia Container -->
<div class="container-fluid">
  <header>
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 col-lg-offset-2 ">
        <nav class="navbar navbar-inverse">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-navbar-collapse" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a id="logo" class="navbar-brand">
                <img alt="Brand" src="css/images/logo/logo.png">
              </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-navbar-collapse">
              <ul class="nav navbar-nav">

                <li class="inicio active" data-target="inicio"><a href="">Login</a></li> <!-- Cambia a logout si ya esta logueado o login si no lo está -->

              </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
      </div>
    </div>
<?php }
}
