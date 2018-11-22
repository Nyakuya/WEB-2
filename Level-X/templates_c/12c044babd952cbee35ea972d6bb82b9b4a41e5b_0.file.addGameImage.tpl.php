<?php
/* Smarty version 3.1.33, created on 2018-11-19 15:05:41
  from 'C:\xampp\htdocs\Level-X\templates\addGameImage.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5bf2c335b640a3_18788520',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '12c044babd952cbee35ea972d6bb82b9b4a41e5b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Level-X\\templates\\addGameImage.tpl',
      1 => 1542636149,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
  ),
),false)) {
function content_5bf2c335b640a3_18788520 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

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
