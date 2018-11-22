<?php
/* Smarty version 3.1.33, created on 2018-11-19 16:29:26
  from 'C:\xampp\htdocs\Level-X\templates\userPage.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5bf2d6d68f61f5_84376859',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0be4f9b08ed35629b2f1a29c09589dd810868ea9' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Level-X\\templates\\userPage.tpl',
      1 => 1542641358,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:NavloginLogout.tpl' => 1,
    'file:aside.tpl' => 1,
    'file:userFooter.tpl' => 1,
  ),
),false)) {
function content_5bf2d6d68f61f5_84376859 (Smarty_Internal_Template $_smarty_tpl) {
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

              <ul class="list-group userPage">
                <?php if ($_smarty_tpl->tpl_vars['Rol']->value == "Reviews") {?>   <!-- Muestra las Reviews -->
                  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['Reviews']->value, 'Review');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['Review']->value) {
?>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['Games']->value, 'Game');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['Game']->value) {
?>
                      <?php if ($_smarty_tpl->tpl_vars['Review']->value['id_juego'] == $_smarty_tpl->tpl_vars['Game']->value['id_juego']) {?>
                        <li class="list-group-item"><p>Review de <?php echo $_smarty_tpl->tpl_vars['Game']->value['nombre'];?>
 por <?php echo $_smarty_tpl->tpl_vars['Review']->value['autor_de_review'];?>
:</p> <p><?php echo $_smarty_tpl->tpl_vars['Review']->value['review'];?>
</p>
                        <a href="readMore/<?php echo $_smarty_tpl->tpl_vars['Review']->value['id_review'];?>
" class="btn btn-primary readmore" role="button">Leer más</a></li>
                      <?php }?>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                  <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                <?php } elseif ($_smarty_tpl->tpl_vars['Rol']->value == "Juegos") {?> <!-- Muestra los Juegos con su correspondiente imagen -->
                  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['Games']->value, 'Game');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['Game']->value) {
?>
                    <li class="list-group-item"><p><?php echo $_smarty_tpl->tpl_vars['Game']->value['nombre'];?>
:</p>
                      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['Images']->value, 'Image');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['Image']->value) {
?>
                          <?php if ($_smarty_tpl->tpl_vars['Image']->value['id_juego'] == $_smarty_tpl->tpl_vars['Game']->value['id_juego']) {?>
                            <p><img src="<?php echo $_smarty_tpl->tpl_vars['Image']->value['nombre'];?>
" class="img-responsive banner" alt="Game Image"></p>
                          <?php }?>
                      <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                   <p><?php echo $_smarty_tpl->tpl_vars['Game']->value['plot'];?>
</p></li>
                  <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                <?php } elseif ($_smarty_tpl->tpl_vars['Rol']->value == "SortedReviews") {?> <!-- Ordena las Reviews por Juego -->
                  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['Games']->value, 'Game');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['Game']->value) {
?>
                      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['Reviews']->value, 'Review');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['Review']->value) {
?>
                          <?php if ($_smarty_tpl->tpl_vars['Review']->value['id_juego'] == $_smarty_tpl->tpl_vars['Game']->value['id_juego']) {?>
                            <li class="list-group-item"><p>Review de <?php echo $_smarty_tpl->tpl_vars['Game']->value['nombre'];?>
 por <?php echo $_smarty_tpl->tpl_vars['Review']->value['autor_de_review'];?>
:</p> <p><?php echo $_smarty_tpl->tpl_vars['Review']->value['review'];?>
</p>
                          <?php }?>
                      <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                  <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                <?php } elseif ($_smarty_tpl->tpl_vars['Rol']->value == "FilteredReviews") {?> <!-- Filtra las Reviews por el Juego seleccionado -->
                  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['Reviews']->value, 'Review');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['Review']->value) {
?>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['Games']->value, 'Game');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['Game']->value) {
?>
                      <?php if ($_smarty_tpl->tpl_vars['Review']->value['id_juego'] == $_smarty_tpl->tpl_vars['Game']->value['id_juego']) {?>
                        <li class="list-group-item"><p>Review de <?php echo $_smarty_tpl->tpl_vars['Game']->value['nombre'];?>
 por <?php echo $_smarty_tpl->tpl_vars['Review']->value['autor_de_review'];?>
:</p> <p><?php echo $_smarty_tpl->tpl_vars['Review']->value['review'];?>
</p>
                        <a href="readMore/<?php echo $_smarty_tpl->tpl_vars['Review']->value['id_review'];?>
" class="btn btn-primary readmore" role="button">Leer más</a></li>
                      <?php }?>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                  <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                <?php }?>
              </ul>

            </section><!-- hasta aca carga con partial-render dependiendo del active en el nav -->
            </section><!-- termina el contenido de noticias -->

              <?php $_smarty_tpl->_subTemplateRender("file:aside.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

        </div>
      </div>
    </div>
  </div>
</section><!-- termina Contenido principal de la pagina -->



<?php $_smarty_tpl->_subTemplateRender("file:userFooter.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
