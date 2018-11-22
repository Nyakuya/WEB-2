<?php
/* Smarty version 3.1.33, created on 2018-10-14 22:37:59
  from 'C:\xampp\htdocs\Level-X\templates\footer.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5bc3a927dd5065_79513698',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '489dafc849a4988cb0a74df488c268e70701594f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Level-X\\templates\\footer.tpl',
      1 => 1539548990,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5bc3a927dd5065_79513698 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- inicia Footer -->
<footer>
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 col-lg-offset-2">
      <section id="contact" class="content-section text-center">
        <div class="contact-section">
            <h2>Contáctanos</h2>
            <p>Siéntete libre de hacernos cualquier consulta rellenando el formulario de contacto o visitando nuestras redes sociales como Twitter, Facebook o Google+.</p>
            <div class="row">
              <div class="col-xs-8 col-xs-offset-2 col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2">
                <form class="form-horizontal">
                  <div class="form-group">
                    <label for="Nombre">Nombre</label>
                    <input type="text" class="form-control" id="name" placeholder="Juan Gomez">
                  </div>
                  <div class="form-group">
                    <label for="Email">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="juan.gomez@ejemplo.com">
                  </div>
                  <div class="form-group ">
                    <label for="mensaje">Tu mensaje</label>
                   <textarea  class="form-control" placeholder="Déjanos tu mensaje"></textarea>
                  </div>
                  <button type="submit" class="btn btn-default">Enviar</button>
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

<a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top" role="button" title="Click to return on the top page" data-toggle="tooltip" data-placement="left"><span class="glyphicon glyphicon-chevron-up"></span></a>

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
