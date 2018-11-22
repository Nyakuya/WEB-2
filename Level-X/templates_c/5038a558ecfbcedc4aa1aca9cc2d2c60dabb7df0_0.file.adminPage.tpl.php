<?php
/* Smarty version 3.1.33, created on 2018-11-20 16:12:47
  from 'C:\xampp\htdocs\Level-X\templates\adminPage.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5bf4246fa2ead2_33647366',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5038a558ecfbcedc4aa1aca9cc2d2c60dabb7df0' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Level-X\\templates\\adminPage.tpl',
      1 => 1542726683,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:NavloginLogout.tpl' => 1,
    'file:adminFooter.tpl' => 1,
  ),
),false)) {
function content_5bf4246fa2ead2_33647366 (Smarty_Internal_Template $_smarty_tpl) {
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


  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 col-lg-offset-2">
      <div class="content">
        <div class="row">
              <div class="row">
                <div class="hidden-xs col-sm-12 col-md-12 col-lg-12 section-tittle">
                  <h1>►►► Informacion ◄◄◄</h1>
                </div>
                <div class="col-xs-12 hidden-sm hidden-md hidden-lg section-tittle">
                  <h1>► Informacion ◄</h1> <!-- Se muestra al tener poca resolucion o hacer mucho zoom -->
                </div>
              </div>

              <ul class="list-group userPage">
                <?php if ($_smarty_tpl->tpl_vars['Mostrar']->value == "Reviews") {?>   <!-- Si $Reviews no está vacia, es porque quiero la lista de reviews -->
                  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['Reviews']->value, 'Review');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['Review']->value) {
?>
                    <li class="list-group-item"> <p>Review por <?php echo $_smarty_tpl->tpl_vars['Review']->value['autor_de_review'];?>
:</p> <p><?php echo $_smarty_tpl->tpl_vars['Review']->value['review'];?>
</p>
                    <a href="borrarReview/<?php echo $_smarty_tpl->tpl_vars['Review']->value['id_review'];?>
" class="btn btn-primary readmore" role="button">BORRAR REVIEW</a>
                    <a href="editarReview/<?php echo $_smarty_tpl->tpl_vars['Review']->value['id_review'];?>
" class="btn btn-primary readmore" role="button">EDITAR</a></li>
                  <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                <?php } elseif ($_smarty_tpl->tpl_vars['Mostrar']->value == "Juegos") {?> <!-- Si $Reviews estaba vacia, significa que quiero la lista de juegos -->
                  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['Games']->value, 'Game');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['Game']->value) {
?>
                    <li class="list-group-item"> <p><?php echo $_smarty_tpl->tpl_vars['Game']->value['nombre'];?>
:</p>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['Images']->value, 'Image');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['Image']->value) {
?>
                        <?php if ($_smarty_tpl->tpl_vars['Image']->value['id_juego'] == $_smarty_tpl->tpl_vars['Game']->value['id_juego']) {?>
                          <p><img src="<?php echo $_smarty_tpl->tpl_vars['Image']->value['nombre'];?>
" class="img-responsive banner" alt="Game Image"><a href="borrarImagen/<?php echo $_smarty_tpl->tpl_vars['Image']->value['id_imagen'];?>
" class="btn btn-primary readmore" role="button">Borrar Imagen</a></p>
                        <?php }?>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                      <p><?php echo $_smarty_tpl->tpl_vars['Game']->value['plot'];?>
</p>
                      <a href="borrarJuego/<?php echo $_smarty_tpl->tpl_vars['Game']->value['id_juego'];?>
" class="btn btn-primary readmore" role="button">BORRAR JUEGO</a>
                      <a href="editarJuego/<?php echo $_smarty_tpl->tpl_vars['Game']->value['id_juego'];?>
" class="btn btn-primary readmore" role="button">EDITAR</a></li>
                  <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                <?php }?>
              </ul>
        </div>
      </div>
    </div>
  </div>



<?php $_smarty_tpl->_subTemplateRender("file:adminFooter.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
