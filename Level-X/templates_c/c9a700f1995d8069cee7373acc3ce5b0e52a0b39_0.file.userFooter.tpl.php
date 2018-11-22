<?php
/* Smarty version 3.1.33, created on 2018-11-21 12:40:22
  from 'C:\xampp\htdocs\Level-X\templates\userFooter.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5bf54426cbc542_53331905',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c9a700f1995d8069cee7373acc3ce5b0e52a0b39' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Level-X\\templates\\userFooter.tpl',
      1 => 1542800422,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5bf54426cbc542_53331905 (Smarty_Internal_Template $_smarty_tpl) {
?>




<!-- inicia Footer -->
<footer>
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 col-lg-offset-2">
      <section id="contact" class="content-section text-center">
        <div class="contact-section">

          <div class="container">
            <h2>Opciones:</h2>
            <a href="getReviewsWith" class="btn btn-default">Taer Lista de Reviews</a>
            <a href="getGames" class="btn btn-default">Traer Lista de Juegos</a>
            <a href="getReviewsSorted" class="btn btn-default">Traer Reviews ordenadas por Juego</a>
          </div>
          <div class="container">

            <form method="post" action="reviewsFilter" class="text-center">
              <h2>Filtrar reviews por Juego:</h2>
                <label for="ReviewedGame">Selecciona un juego para mostrar sus reviews:</label>
                <select class="form-control" name="gameId">
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
          </div>
          <p></p>
                <button type="submit" class="btn btn-primary">Filtrar</button>
            </form>

                <h1>Nuestras redes sociales</h1>
                <ul class="list-inline banner-social-buttons">
                  <li><a href="#"><img src="images/social/twitter.png" alt=""></a></li>
                  <li><a href="#"><img src="images/social/facebook.png" alt=""></a></li>
                  <li><a href="#"><img src="images/social/gplus.png" alt=""></a></li>
                </ul>
              </div>
            </div>
        </div>
      </section>
    </div>
  </div><!-- termina Footer -->
</footer>
</div><!-- termina Container -->

<a id="back-to-top" class="btn btn-primary btn-lg back-to-top" role="button" title="Click to return to the top" data-toggle="tooltip" data-placement="left"><span class="glyphicon glyphicon-chevron-up"></span></a>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!--<?php echo '<script'; ?>
 src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"><?php echo '</script'; ?>
> -->
<!-- Include all compiled plugins (below), or include individual files as needed -->
<?php echo '<script'; ?>
 type="text/javascript" src="js/jquery-3.2.1.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="js/bootstrap.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="js/scrollup.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="js/rankTable-apiREST.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="js/nav-section-ajax.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="js/noticias_partialRender.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="js/piedra_papel_tijera.js"><?php echo '</script'; ?>
>
</body>
</html>
<?php }
}
