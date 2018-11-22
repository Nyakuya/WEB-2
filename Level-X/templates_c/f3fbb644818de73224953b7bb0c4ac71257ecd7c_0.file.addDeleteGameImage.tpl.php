<?php
/* Smarty version 3.1.33, created on 2018-11-19 14:59:04
  from 'C:\xampp\htdocs\Level-X\templates\addDeleteGameImage.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5bf2c1a818e480_39684605',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f3fbb644818de73224953b7bb0c4ac71257ecd7c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Level-X\\templates\\addDeleteGameImage.tpl',
      1 => 1542635253,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
  ),
),false)) {
function content_5bf2c1a818e480_39684605 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

        <?php if ($_smarty_tpl->tpl_vars['Rol']->value == "Add") {?>
          <h1 class="text-center">Añadir imagen a un Juego</h1>
          <form method="post" action="guardarImagenes" id="guardarImagenes" class="text-center" enctype="multipart/form-data"> <!-- Envia la información por POST a la función verificarLogin del LoginController. -->

            <div class="form-group"> <!-- Select para elegir a que juego pertenece -->
              <label for="GameImage">Juego al cual añadir imagen:</label>
              <select class="form-control" name="gameId">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['Games']->value, 'Game');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['Game']->value) {
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['Game']->value['id_juego'];?>
"><?php echo $_smarty_tpl->tpl_vars['Game']->value['nombre'];?>
</option>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
              </select>

                <label for="Imagen">Imagen:</label>
                <input type="file" id="images" name="images[]" multiple>
            </div>

           <button type="submit" class="btn btn-primary">Upload</button>

        <?php } elseif ($_smarty_tpl->tpl_vars['Rol']->value == "Delete") {?>
        <h1 class="text-center">Borrar imagen a un Juego</h1>
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

      </form>
    </div>
                <h2><?php echo $_smarty_tpl->tpl_vars['Message']->value;?>
</h2>

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
