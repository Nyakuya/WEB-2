<?php
/* Smarty version 3.1.33, created on 2018-11-18 16:11:03
  from 'C:\xampp\htdocs\Level-X\templates\assignRemoveAdminPrivileges.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5bf181078b6318_53641037',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '36a1e7b9e34fab8747dcecb80e7f5fbcb8c715d8' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Level-X\\templates\\assignRemoveAdminPrivileges.tpl',
      1 => 1542553824,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
  ),
),false)) {
function content_5bf181078b6318_53641037 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

      <?php if ($_smarty_tpl->tpl_vars['Rol']->value == 1) {?>
        <h1 class="text-center">Asignar permisos de administración</h1>
      <?php } elseif ($_smarty_tpl->tpl_vars['Rol']->value == 2) {?>
        <h1 class="text-center">Quitar permisos de administración</h1>
      <?php }?>


        <?php if ($_smarty_tpl->tpl_vars['Rol']->value == 1) {?> <!-- Si es 1, el admin intenta asignar privilegios de administrador a algun usuario -->
          <form method="post" action="assignAdminPrivileges" class="text-center"> <!-- Envia la información por POST a la función assignAdminPrivileges del AdminController. -->

            <div class="form-group"> <!-- Select para elegir el admin a quien le darás permisos de administración -->
              <label for="ReviewedGame">¿A qué usuario darle privilegios de administración?:</label>
              <select class="form-control" name="userId">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['Usuarios']->value, 'Usuario');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['Usuario']->value) {
?>
                  <?php if ($_smarty_tpl->tpl_vars['Usuario']->value['admin'] == 0) {?> <!-- Si 'admin' vale 0, significa que este usuario NO tiene permisos de administración -->
                    <option value="<?php echo $_smarty_tpl->tpl_vars['Usuario']->value['id_usuario'];?>
"><?php echo $_smarty_tpl->tpl_vars['Usuario']->value['username'];?>
</option>
                  <?php }?>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
              </select>
            </div>

        <?php } elseif ($_smarty_tpl->tpl_vars['Rol']->value == 2) {?> <!-- Si es 2, el admin intenta quitar privilegios de administracion a algun otro admin (quitarse permisos a el mismo no se lo permito)-->
          <form method="post" action="removeAdminPrivileges" class="text-center"> <!-- Envia la información por POST a la función verificarLogin del LoginController. -->

            <div class="form-group"> <!-- Select para elegir el admin a quien le darás permisos de administración -->
              <label for="ReviewedGame">¿A qué admin quitarle los privilegios de administración?:</label>
              <select class="form-control" name="userId">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['Usuarios']->value, 'Usuario');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['Usuario']->value) {
?>
                  <?php if ($_smarty_tpl->tpl_vars['Usuario']->value['admin'] == 1 && $_smarty_tpl->tpl_vars['Usuario']->value['username'] != $_smarty_tpl->tpl_vars['CurrentUser']->value) {?> <!-- Si 'admin' vale 1, este usuario tiene permisos de administración. (admin no se puede borrar a si mismo) -->
                    <option value="<?php echo $_smarty_tpl->tpl_vars['Usuario']->value['id_usuario'];?>
"><?php echo $_smarty_tpl->tpl_vars['Usuario']->value['username'];?>
</option>
                  <?php }?>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
              </select>
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
                  <a href="admin" class="btn btn-default">Volver a atrás</a>
                      </div>
                    </div>
              </section>
            </div>
          </div><!-- termina Footer -->
        </footer>
<?php }
}
