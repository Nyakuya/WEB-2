<?php
/* Smarty version 3.1.33, created on 2018-10-12 03:23:22
  from 'C:\xampp\htdocs\Level-X\templates\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5bbff78a17b3d2_88565911',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '252d650af05fd1975d1b2335fea3cb8b6d0c5923' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Level-X\\templates\\index.tpl',
      1 => 1539307384,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:nav.tpl' => 1,
    'file:listaDeNoticias.tpl' => 1,
    'file:aside.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5bbff78a17b3d2_88565911 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php $_smarty_tpl->_subTemplateRender("file:nav.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

        <!-- inicia Banner de INICIO -->
        <div class="row">
          <div class="hidden-xs col-sm-12 col-md-12 col-lg-8 col-lg-offset-2">
            <img src="images/banners/banner_inicio.jpg" class="img-responsive banner" alt="Banner">
          </div>
        </div><!-- termina Banner -->
      </header>

      <section><!-- inicia Contenido principal de la pagina -->
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 col-lg-offset-2">
            <div class="content">
              <div class="row">
                <!-- inicia el contenido de noticias -->
                <section class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                  <!-- desde aqui hasta donde se indica mas abajo, cambiara con partial render al hacer click en las distintas secciones del nav -->
                  <section id="partial-render-content">
                    <!-- Titulo del contenido principal -->
                    <div class="row">
                      <div class="hidden-xs col-sm-12 col-md-12 col-lg-12 section-tittle">
                        <h1>►►► Noticias Destacadas ◄◄◄</h1>
                      </div>
                      <div class="col-xs-12 hidden-sm hidden-md hidden-lg section-tittle">
                        <h1>►Noticias Destacadas◄</h1>
                      </div>
                    </div>

                    <?php $_smarty_tpl->_subTemplateRender("file:listaDeNoticias.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

                    <?php $_smarty_tpl->_subTemplateRender("file:aside.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

              </div>
            </div>
          </div>
        </div>
      </section><!-- termina Contenido principal de la pagina -->

<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
