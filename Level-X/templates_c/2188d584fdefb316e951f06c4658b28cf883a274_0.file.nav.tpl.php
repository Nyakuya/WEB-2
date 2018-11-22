<?php
/* Smarty version 3.1.33, created on 2018-10-12 03:22:28
  from 'C:\xampp\htdocs\Level-X\templates\nav.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5bbff754b9c588_06066537',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2188d584fdefb316e951f06c4658b28cf883a274' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Level-X\\templates\\nav.tpl',
      1 => 1539306996,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5bbff754b9c588_06066537 (Smarty_Internal_Template $_smarty_tpl) {
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
              <a  id="logo" class="navbar-brand">
                <img alt="Brand" src="css/images/logo/logo.png">
              </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-navbar-collapse">
              <ul class="nav navbar-nav">
                <li class="inicio active" data-target="inicio"><a href="/level-x/home">Inicio</a></li>
                <li class="juegos" data-target="juegos"><a href="/level-x/juegos">Juegos</a></li>
                <li class="noticias" data-target="noticias"><a href="#">Noticias</a></li>
                <li><a href="#">Reviews</a></li>
                <li><a href="#contact">Contacto</a></li>
              </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
      </div>
    </div>
<?php }
}
