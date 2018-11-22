<?php
/* Smarty version 3.1.33, created on 2018-11-18 08:21:03
  from 'C:\xampp\htdocs\Level-X\templates\insert.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5bf112df43bb76_06977716',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '218b621c61db1a4aa7028313a5d956880eb6db06' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Level-X\\templates\\insert.tpl',
      1 => 1542525504,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
  ),
),false)) {
function content_5bf112df43bb76_06977716 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <h1 class="text-center">Insertar <?php echo $_smarty_tpl->tpl_vars['Insertar']->value;?>
</h1>

        <?php if ($_smarty_tpl->tpl_vars['Insertar']->value == "Review") {?>
          <form method="post" action="insertReview" class="text-center"> <!-- Envia la información por POST a la función verificarLogin del LoginController. -->

            <div class="form-group"> <!-- Área para escribir tu Review sobre el juego -->
              <label for="Review">Review:</label>
              <textarea class="form-control" rows="5" name="reviewId" id="reviewId" placeholder="Anímate, escribe tu opinión sobre el juego"></textarea>
            </div>

            <div class="form-group">
              <label for="AuthorName">Autor de la Review:</label>
              <input type="text" class="form-control" name="authorId" id="authorId" aria-describedby="authorId" placeholder="Tu nombre"><!-- "name" es una etiqueta que mejora la posicion del SEO de google. -->
            </div>

            <div class="form-group"> <!-- Select para elegir a que juego pertenece -->
              <label for="ReviewedGame">Juego al que pertenece la Review:</label>
              <select class="form-control" name="gameId">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['Games']->value, 'Game');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['Game']->value) {
?> <!-- Por cada juego existe una opción con su id_juego (para saber que juego es cuando pase por POST), y su nombre -->
                  <option value="<?php echo $_smarty_tpl->tpl_vars['Game']->value['id_juego'];?>
"><?php echo $_smarty_tpl->tpl_vars['Game']->value['nombre'];?>
</option>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
              </select>
            </div>

        <?php } elseif ($_smarty_tpl->tpl_vars['Insertar']->value == "Game") {?>
          <form method="post" action="insertGame" class="text-center"> <!-- Envia la información por POST a la función verificarLogin del LoginController. -->

            <div class="form-group"> <!-- Área para escribir el nombre del juego -->
              <label for="GameName">Nombre del Juego:</label>
              <input type="text" class="form-control" name="gameId" id="gameId" aria-describedby="gameId" placeholder="Nombre del juego"><!-- "name" es una etiqueta que mejora la posicion del SEO de google. -->
            </div>

            <div class="form-group"> <!-- Área para escribir de que trata el juego -->
              <label for="GamePlot">Plot:</label>
              <textarea class="form-control" rows="5" name= "plotId" id="plotId" placeholder="¿De que trata el juego?"></textarea>
            </div>
        <?php }?>

        <button type="submit" class="btn btn-primary">Agregar</button>
      </form>
    </div>

        <!-- inicia Footer -->
        <footer>
          <p>
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 col-lg-offset-2">
              <section class="text-center">
                          <a href="admin" class="btn btn-default">Volver a atrás</a>
                      </div>
                    </div>
              </section>
            </div>
          </div><!-- termina Footer -->
        </footer>
<?php }
}
