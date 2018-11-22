<?php
/* Smarty version 3.1.33, created on 2018-11-18 02:55:36
  from 'C:\xampp\htdocs\Level-X\templates\signUp.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5bf0c69898fa47_80027628',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b34bbb882352aa511dc3987ee7245a2d827bdac7' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Level-X\\templates\\signUp.tpl',
      1 => 1542506077,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
  ),
),false)) {
function content_5bf0c69898fa47_80027628 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <h1 class="text-center"><?php echo $_smarty_tpl->tpl_vars['Titulo']->value;?>
</h1>
      <form method="post" action="verificarSignUp" class="text-center"> <!-- Envia la información por POST a la función verificarLogin del LoginController. -->
        <div class="form-group">
          <label for="Username">Username</label>
          <input type="text" class="form-control" name="usernameId" id="usernameId" aria-describedby="usernameId" placeholder="Username"><!-- "name" es una etiqueta que mejora la posicion del SEO de google. -->
          </div>
        <div class="form-group">
          <label for="Password">Password</label>
          <input type="password" class="form-control" name="passwordId" id="passwordId" placeholder="Password"> <!-- "name" es una etiqueta que mejora la posicion del SEO de google. -->
        </div>

        <div class="">
          <?php echo $_smarty_tpl->tpl_vars['Message']->value;?>
 <!-- Muestra (si se da el caso), "el usuario no existe", "contraseña incorrecta", ó nada (si no ocurren errores y viene vacia). -->
        </div>

        <button type="submit" class="btn btn-primary">Sing Up</button>
    </form>
    </div>

        <!-- inicia Footer -->
        <footer>
          <p>
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 col-lg-offset-2">
              <section class="text-center">
                          <a href="user" class="btn btn-default">Volver a inicio</a>
                      </div>
                    </div>
              </section>
            </div>
          </div><!-- termina Footer -->
        </footer>
<?php }
}
