<?php
/* Smarty version 3.1.33, created on 2018-11-18 08:00:49
  from 'C:\xampp\htdocs\Level-X\templates\registeredUserPage.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5bf10e2194d264_70262942',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dc48a556334e4a48fa8aa6c9ee610208f20732a8' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Level-X\\templates\\registeredUserPage.tpl',
      1 => 1542524419,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:NavloginLogout.tpl' => 1,
    'file:registeredUserFooter.tpl' => 1,
  ),
),false)) {
function content_5bf10e2194d264_70262942 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php $_smarty_tpl->_subTemplateRender("file:NavloginLogout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<!-- inicia Banner de INICIO -->
<div class="row">
  <div class="hidden-xs col-sm-12 col-md-12 col-lg-8 col-lg-offset-2">
    <img src="images/banners/banner_inicio.jpg" class="img-responsive banner" alt="Banner">
  </div>
</div><!-- termina Banner -->

<section><!-- inicia Contenido principal de la pagina -->
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 col-lg-offset-2">
      <div class="content">
        <div class="row">
          <!-- inicia el contenido de noticias -->
          <section class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
            <!-- desde aqui hasta donde se indica mas abajo, cambiara con partial render al hacer click en las distintas secciones del nav -->
            <section id="partial-render-content">
              <!-- Titulo del contenido principal -->
              <div class="row">
                <div class="hidden-xs col-sm-12 col-md-12 col-lg-12 section-tittle">
                  <h1>►►► Informacion ◄◄◄</h1>
                </div>
                <div class="col-xs-12 hidden-sm hidden-md hidden-lg section-tittle">
                  <h1>► Informacion ◄</h1> <!-- Se muestra al tener poca resolucion o hacer mucho zoom -->
                </div>
              </div>

              <?php if ($_smarty_tpl->tpl_vars['User']->value[0]['admin'] == 1) {?>
                <h1>Admin Mode</h1> <!-- Indica que eres adminstrador y tienes acceso a las funcionalidades de administrador -->
              <?php }?>

              <ul class="list-group userPage">
                <?php if ($_smarty_tpl->tpl_vars['Reviews']->value != null) {?>   <!-- Si $Reviews no está vacia, es porque quiero la lista de reviews -->
                  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['Reviews']->value, 'Review');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['Review']->value) {
?>
                    <li class="list-group-item"> <p>Review por <?php echo $_smarty_tpl->tpl_vars['Review']->value['autor_de_review'];?>
:</p> <p><?php echo $_smarty_tpl->tpl_vars['Review']->value['review'];?>
</p>
                    <a href="borrarReview/<?php echo $_smarty_tpl->tpl_vars['Review']->value['id_review'];?>
" class="btn btn-primary readmore" role="button">BORRAR</a>
                    <a href="editarReview/<?php echo $_smarty_tpl->tpl_vars['Review']->value['id_review'];?>
" class="btn btn-primary readmore" role="button">EDITAR</a></li>
                  <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                <?php } elseif ($_smarty_tpl->tpl_vars['Games']->value != null) {?> <!-- Si $Reviews estaba vacia, significa que quiero la lista de juegos -->
                  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['Games']->value, 'Game');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['Game']->value) {
?>
                    <li class="list-group-item"> <p><?php echo $_smarty_tpl->tpl_vars['Game']->value['nombre'];?>
:</p> <p><?php echo $_smarty_tpl->tpl_vars['Game']->value['plot'];?>
</p>
                    <a href="borrarJuego/<?php echo $_smarty_tpl->tpl_vars['Game']->value['id_juego'];?>
" class="btn btn-primary readmore" role="button">BORRAR</a>
                    <a href="editarJuego/<?php echo $_smarty_tpl->tpl_vars['Game']->value['id_juego'];?>
" class="btn btn-primary readmore" role="button">EDITAR</a></li>
                  <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                <?php }?>
              </ul>

            </section><!-- hasta aca carga con partial-render dependiendo del active en el nav -->
            </section><!-- termina el contenido de noticias -->


        </div>
      </div>
    </div>
  </div>
</section><!-- termina Contenido principal de la pagina -->



<?php $_smarty_tpl->_subTemplateRender("file:registeredUserFooter.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
