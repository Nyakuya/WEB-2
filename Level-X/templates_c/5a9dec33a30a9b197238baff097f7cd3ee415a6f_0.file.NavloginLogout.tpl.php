<?php
/* Smarty version 3.1.33, created on 2018-11-20 16:21:19
  from 'C:\xampp\htdocs\Level-X\templates\NavloginLogout.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5bf4266f78aa50_66161975',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5a9dec33a30a9b197238baff097f7cd3ee415a6f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Level-X\\templates\\NavloginLogout.tpl',
      1 => 1542727258,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5bf4266f78aa50_66161975 (Smarty_Internal_Template $_smarty_tpl) {
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

                <li class="inicio active" data-target="inicio"><a href="user">Inicio</a></li>
                <?php if ($_smarty_tpl->tpl_vars['Logueado']->value == true) {?>
                  <li class="inicio active" data-target="inicio"><a href="comentarios">Comentarios</a></li> <!-- Repito comentarios en ambos casos porque quiero que quede luego de Login/Logout-->
                  <li class="inicio active" data-target="inicio"><a href="logout">Logout</a></li> <!-- Cambia a login si no está logueado -->
                  <?php if ($_smarty_tpl->tpl_vars['Admin']->value == 1) {?>
                    <li class="inicio active" data-target="inicio"><a href="admin">Admin Mode</a></li>
                  <?php }?>
                <?php } else { ?>
                  <li class="inicio active" data-target="inicio"><a href="comentarios">Comentarios</a></li>
                  <li class="inicio active" data-target="inicio"><a href="login">Login</a></li> <!-- Cambia a logout si ya esta logueado -->
                  <li class="inicio active" data-target="inicio"><a href="signUp">Sign Up</a></li> <!-- Desaparece si ya esta logueado-->
                <?php }?>

              </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
      </div>
    </div>
<?php }
}
