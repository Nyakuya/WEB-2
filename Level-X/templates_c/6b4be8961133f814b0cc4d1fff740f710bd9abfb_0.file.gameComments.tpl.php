<?php
/* Smarty version 3.1.33, created on 2018-11-22 02:19:11
  from 'C:\xampp\htdocs\Level-X\templates\gameComments.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5bf6040f328458_61084652',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6b4be8961133f814b0cc4d1fff740f710bd9abfb' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Level-X\\templates\\gameComments.tpl',
      1 => 1542849474,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:NavloginLogout.tpl' => 1,
    'file:gamesCommentFooter.tpl' => 1,
  ),
),false)) {
function content_5bf6040f328458_61084652 (Smarty_Internal_Template $_smarty_tpl) {
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
          <!-- inicia el contenido de noticias -->

              <!-- Titulo del contenido principal -->
              <div class="row">
                <div class="hidden-xs col-sm-12 col-md-12 col-lg-12 section-tittle">
                  <h1>►►► Juegos disponibles para valoración ◄◄◄</h1>
                </div>
                <div class="col-xs-12 hidden-sm hidden-md hidden-lg section-tittle">
                  <h1>►►► Juegos disponibles para valoración ◄◄◄</h1> <!-- Se muestra al tener poca resolucion o hacer mucho zoom -->
                </div>
              </div>

              <ul class="list-group userPage">
                  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['Games']->value, 'Game');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['Game']->value) {
?>
                    <li class="list-group-item">
                      <p class="text-center"><?php echo $_smarty_tpl->tpl_vars['Game']->value['nombre'];?>
:</p>
                      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['Images']->value, 'Image');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['Image']->value) {
?>
                        <?php if ($_smarty_tpl->tpl_vars['Image']->value['id_juego'] == $_smarty_tpl->tpl_vars['Game']->value['id_juego']) {?>
                          <p><img src="<?php echo $_smarty_tpl->tpl_vars['Image']->value['nombre'];?>
" class="img-responsive" alt="<?php echo $_smarty_tpl->tpl_vars['Game']->value['nombre'];?>
 Image"></p>
                        <?php }?>
                      <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                          <p class="text-center"><?php echo $_smarty_tpl->tpl_vars['Game']->value['plot'];?>
</p>
                    </li>
                  <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
              </ul>

              <?php if ($_smarty_tpl->tpl_vars['Logueado']->value == true) {?>
                <!-- PUNTUAR JUEGO Y COMENTAR -->
                <form method="POST" action="reviewsFilter" class="text-center">
                  <h2>Puntúa y Comenta un juego:</h2>

                  <!-- ID USUARIO -->
                  <input type="hidden" class="form-control" id="id_usuario" value="<?php echo $_smarty_tpl->tpl_vars['Usuario']->value['id_usuario'];?>
"></input>

                    <!-- ELEGIR JUEGO -->
                    <label for="ReviewedGame">Selecciona el juego que quieres puntuar:</label>
                    <select class="form-control" id="id_juego">
                      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['Games']->value, 'Game');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['Game']->value) {
?>
                         <option value="<?php echo $_smarty_tpl->tpl_vars['Game']->value['id_juego'];?>
"><?php echo $_smarty_tpl->tpl_vars['Game']->value['nombre'];?>
</option> <!-- Usa la ID del juego para identificar que filtrar -->
                      <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </select>

                    <!-- Elegir puntuación -->
                      <label for="exampleSelect1">Elige la puntuación que quieres darle:</label>
                      <select class="form-control" id="puntaje">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                      </select>

                    <!-- ESCRIBIR COMENTARIO -->
                    <div class="form-group"> <!-- Área para escribir tu Review sobre el juego -->
                      <label for="comentario">Comentario:</label>
                      <textarea class="form-control" rows="5" name="commentText" id="commentText" placeholder="Anímate, escribe tu opinión sobre el juego"></textarea>
                    </div>

                    <p></p>
                    <button type="submit" id="submitComment" class="btn btn-primary">Submit</button>
                </form>
              <?php } else { ?>
                <h1 class="text-center">Debes estar logueado para poder comentar y valorar</h1>
              <?php }?>

                <?php if ($_smarty_tpl->tpl_vars['Admin']->value == 0 || $_smarty_tpl->tpl_vars['Admin']->value == null) {?> <!-- Cuando el usuario no esta logueado, $Admin es null. Cuando esta logeuado y no es admin, vale 0 -->
                  <h2 class="text-center">Comentarios:</h2>
                  <div id="comentarios-container" value="false"> <!-- en 'comentarios.js' uso 'getElementById', me paro en 'comentarios-container' y guardo el atributo 'value' (false) para saber que NO es admin -->
                    <!-- COMENTARIOS VAN AQUÍ -->
                  </div>
                <?php } elseif ($_smarty_tpl->tpl_vars['Admin']->value == 1) {?> <!-- Cuando el usuario esta logueado y es admin, vale 1 -->
                  <h2 class="text-center">Comentarios:</h2>
                  <div id="comentarios-container" value="true"> <!-- en 'comentarios.js' uso 'getElementById', me paro en 'comentarios-container', y guardo el atributo 'value' (true) para saber que es admin -->
                    <!-- COMENTARIOS VAN AQUÍ -->
                  </div>
              <?php }?>

        </div>
      </div>
    </div>
  </div>

<?php $_smarty_tpl->_subTemplateRender("file:gamesCommentFooter.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
