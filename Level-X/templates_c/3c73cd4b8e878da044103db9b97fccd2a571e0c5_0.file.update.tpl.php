<?php
/* Smarty version 3.1.33, created on 2018-11-19 15:37:44
  from 'C:\xampp\htdocs\Level-X\templates\update.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5bf2cab8b5c792_86555781',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3c73cd4b8e878da044103db9b97fccd2a571e0c5' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Level-X\\templates\\update.tpl',
      1 => 1542544997,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
  ),
),false)) {
function content_5bf2cab8b5c792_86555781 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

      <h1 class="text-center">Editar <?php echo $_smarty_tpl->tpl_vars['Editar']->value;?>
</h1>

        <?php if ($_smarty_tpl->tpl_vars['Editar']->value == "Review") {?>
          <form method="post" action="updateReview" class="text-center"> <!-- Envia la información por POST a la función verificarLogin del LoginController. -->

            <input type="hidden" class="form-control" id="idReview" name="idReview" value="<?php echo $_smarty_tpl->tpl_vars['Review']->value['id_review'];?>
">

            <div class="form-group"> <!-- Área para escribir tu Review sobre el juego -->
              <label for="Review">Review:</label>
              <textarea class="form-control" rows="5" name="reviewId" id="reviewId"><?php echo $_smarty_tpl->tpl_vars['Review']->value['review'];?>
</textarea>
            </div>

            <div class="form-group">
              <label for="AuthorName">Autor de la Review:</label>
              <input type="text" class="form-control" name="authorId" id="authorId" aria-describedby="authorId" placeholder="Tu nombre" value="<?php echo $_smarty_tpl->tpl_vars['Review']->value['autor_de_review'];?>
"><!-- "name" es una etiqueta que mejora la posicion del SEO de google. -->
            </div>

            <div class="form-group"> <!-- Select para elegir a que juego pertenece -->
              <label for="ReviewedGame">Juego al que pertenece la Review:</label>
              <select class="form-control" name="gameId">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['Games']->value, 'Game');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['Game']->value) {
?>
                  <?php if ($_smarty_tpl->tpl_vars['Game']->value['id_juego'] == $_smarty_tpl->tpl_vars['Review']->value['id_juego']) {?> <!-- Si la id de juego es la misma que tiene la review, se pone ese juego como el seleccionado -->
                    <option value="<?php echo $_smarty_tpl->tpl_vars['Game']->value['id_juego'];?>
" selected><?php echo $_smarty_tpl->tpl_vars['Game']->value['nombre'];?>
</option>
                  <?php } else { ?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['Game']->value['id_juego'];?>
"><?php echo $_smarty_tpl->tpl_vars['Game']->value['nombre'];?>
</option>
                  <?php }?>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
              </select>
            </div>

        <?php } elseif ($_smarty_tpl->tpl_vars['Editar']->value == "Juego") {?>
          <form method="post" action="updateGame" class="text-center"> <!-- Envia la información por POST a la función verificarLogin del LoginController. -->

            <input type="hidden" class="form-control" id="idGame" name="idGame" value="<?php echo $_smarty_tpl->tpl_vars['Games']->value['id_juego'];?>
">

            <div class="form-group"> <!-- Área para escribir el nombre del juego -->
              <label for="GameName">Nombre del Juego:</label>
              <input type="text" class="form-control" name="gameId" id="gameId" aria-describedby="gameId" placeholder="Nombre del juego" value="<?php echo $_smarty_tpl->tpl_vars['Games']->value['nombre'];?>
"><!-- "name" es una etiqueta que mejora la posicion del SEO de google. -->
            </div>

            <div class="form-group"> <!-- Área para escribir de que trata el juego -->
              <label for="GamePlot">Plot:</label>
              <textarea class="form-control" rows="5" name= "plotId" id="plotId"><?php echo $_smarty_tpl->tpl_vars['Games']->value['plot'];?>
</textarea>
            </div>
        <?php }?>

        <button type="submit" class="btn btn-primary">Editar</button>
      </form>
    </div>

        <!-- inicia Footer -->
        <footer>
          <p>
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 col-lg-offset-2">
              <section class="text-center">
                <?php if ($_smarty_tpl->tpl_vars['Review']->value != null) {?>
                  <a href="getReviewsWithout" class="btn btn-default">Volver a atrás</a>
                <?php } elseif ($_smarty_tpl->tpl_vars['Games']->value != null) {?>
                  <a href="getGamesAdmin" class="btn btn-default">Volver a atrás</a>
                <?php }?>
                      </div>
                    </div>
              </section>
            </div>
          </div><!-- termina Footer -->
        </footer>
<?php }
}
