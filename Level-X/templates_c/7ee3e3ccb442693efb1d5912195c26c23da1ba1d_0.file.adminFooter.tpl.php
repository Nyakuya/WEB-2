<?php
/* Smarty version 3.1.33, created on 2018-11-20 16:09:38
  from 'C:\xampp\htdocs\Level-X\templates\adminFooter.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5bf423b2bcfa54_28233232',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7ee3e3ccb442693efb1d5912195c26c23da1ba1d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Level-X\\templates\\adminFooter.tpl',
      1 => 1542726576,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5bf423b2bcfa54_28233232 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!-- inicia Footer -->
<footer>
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 col-lg-offset-2">
      <section id="contact" class="content-section text-center">
        <div class="contact-section">

          <div class="container">
            <h2>Opciones:</h2>
            <a href="getReviewsWithout" class="btn btn-default">Taer Lista de Reviews</a>
            <a href="getGamesAdmin" class="btn btn-default">Traer Lista de Juegos</a>
            <a href="addReview" class="btn btn-default">Agregar Review</a>
            <a href="addGame" class="btn btn-default">Agregar Juego</a>

            <a href="agregarImagenJuego" class="btn btn-default">Agregar Imagen a un Juego</a>

            <h2>Opciones de Administración:</h2>
            <a href="agregarPermisosAdministrativos" class="btn btn-default">Asignar permisos de administración</a>
            <a href="quitarPermisosAdministrativos" class="btn btn-default">Quitar permisos de administración</a>
            <a href="deleteUser" class="btn btn-default">Eliminar usuario</a>
          </div>

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
 type="text/javascript" src="js/nav-section-ajax.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="js/images.js" charset="utf-8"><?php echo '</script'; ?>
>
</body>
</html>
<?php }
}
