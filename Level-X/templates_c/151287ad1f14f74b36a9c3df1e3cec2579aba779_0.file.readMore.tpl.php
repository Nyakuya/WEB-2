<?php
/* Smarty version 3.1.33, created on 2018-10-18 17:19:28
  from 'C:\xampp\htdocs\Level-X\templates\readMore.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5bc8a480471595_97667942',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '151287ad1f14f74b36a9c3df1e3cec2579aba779' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Level-X\\templates\\readMore.tpl',
      1 => 1539875814,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
  ),
),false)) {
function content_5bc8a480471595_97667942 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <section class="post container-fluid">
          <div class="content-section text-center">
            <h1>Review hecha por <?php echo $_smarty_tpl->tpl_vars['Review']->value['autor_de_review'];?>
:</h1>
            <h2><?php echo $_smarty_tpl->tpl_vars['Review']->value['review'];?>
</h2>
          </div>
    </section>
  </div>
 </div>

            <article class="hidden-xs hidden-sm row thumbnail table-game">
              <div class="col-md-12 col-lg-12 table-cell-game">
                <section class="col-md-4 col-lg-4">

                  <p>
                  <?php if ($_smarty_tpl->tpl_vars['Game']->value['nombre'] == "Doom") {?> <!-- Si el juego que corresponde a esta Review, es Doom -->
                    <img class="img-responsive" src="images/juegos/doom.jpg" alt="DOOM">
                </section>
                <section class="text-game col-md-8 col-lg-8">
                  <h1><?php echo $_smarty_tpl->tpl_vars['Game']->value['nombre'];?>
</h1>
                  <h2><?php echo $_smarty_tpl->tpl_vars['Game']->value['plot'];?>
</h2>

                  <?php } elseif ($_smarty_tpl->tpl_vars['Game']->value['nombre'] == "The Witcher 3: Wild Hunt") {?> <!-- Si el juego que corresponde a esta Review, es The witcher -->
                    <img class="img-responsive" src="images/juegos/the-witcher-3.jpg" alt="The Witcher 3: Wild Hunt">
                </section>
                <section class="text-game col-md-8 col-lg-8">
                    <h1><?php echo $_smarty_tpl->tpl_vars['Game']->value['nombre'];?>
</h1>
                    <h2><?php echo $_smarty_tpl->tpl_vars['Game']->value['plot'];?>
</h2>

                  <?php } elseif ($_smarty_tpl->tpl_vars['Game']->value['nombre'] == "Overwatch") {?> <!-- Si el juego que corresponde a esta Review, es Overwatch -->
                    <img class="img-responsive" src="images/juegos/overwatch.jpg" alt="Overwatch">
                </section>
                <section class="text-game col-md-8 col-lg-8">
                    <h1><?php echo $_smarty_tpl->tpl_vars['Game']->value['nombre'];?>
</h1>
                    <h2><?php echo $_smarty_tpl->tpl_vars['Game']->value['plot'];?>
</h2>
                  <?php } else { ?> <!-- Si el juego que corresponde a esta Review, no se conoce, se muestra toda la info disponible en la DB y se muestra imagen "No Image Available" -->
                  <img class="img-responsive" src="images/juegos/noImageAvailable.png" alt="No Image Available">
                </section>
                <section class="text-game col-md-8 col-lg-8">
                  <h1><?php echo $_smarty_tpl->tpl_vars['Game']->value['nombre'];?>
</h1>
                  <h2><?php echo $_smarty_tpl->tpl_vars['Game']->value['plot'];?>
</h2>
                  <?php }?>
                </p>

                </section>
              </div>
            </article>


              <!-- inicia Footer -->
              <footer>
                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 col-lg-offset-2">
                    <section class="text-center">
                                <a href="getReviewsWith" class="btn btn-default">Volver atrás</a>
                            </div>
                          </div>
                    </section>
                  </div>
                </div><!-- termina Footer -->
              </footer>

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
