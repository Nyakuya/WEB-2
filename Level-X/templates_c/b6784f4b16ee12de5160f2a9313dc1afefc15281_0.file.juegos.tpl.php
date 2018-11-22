<?php
/* Smarty version 3.1.33, created on 2018-10-12 02:57:58
  from 'C:\xampp\htdocs\Level-X\templates\juegos.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5bbff19672b343_00478536',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b6784f4b16ee12de5160f2a9313dc1afefc15281' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Level-X\\templates\\juegos.tpl',
      1 => 1539305860,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:nav.tpl' => 1,
    'file:listaDeJuegos.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5bbff19672b343_00478536 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php $_smarty_tpl->_subTemplateRender("file:nav.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="row">
  <!-- INICIA FILTRO POR PLATAFORMA -->
  <div class="nav-games">
    <ul>
      <li><a href="">Todo</a></li>
      <li> | </li>
      <li><a href="">PC</a></li>
      <li> | </li>
      <li><a href="">PS4</a></li>
      <li> | </li>
      <li><a href="">XOne</a></li>
      <li> | </li>
      <li><a href="">Switch</a></li>
      <li> | </li>
      <li><a href="">3DS</a></li>
      <li> | </li>
      <li><a href="">PS3</a></li>
      <li> | </li>
      <li><a href="">X360</a></li>
      <li> | </li>
      <li><a href="">WiiU</a></li>
      <li> | </li>
      <li><a href="">PSVita</a></li>
      <li> | </li>
      <li><a href="">iOS</a></li>
      <li> | </li>
      <li><a href="">Android</a></li>
    </ul>
  </div>
<!-- TERMINA FILTRO POR PLATAFORMA -->
</div>

<?php $_smarty_tpl->_subTemplateRender("file:listaDeJuegos.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="row">
  <div class="col-md-12 col-lg-12">
    <div class="table-responsive">
      <table class="table table-hover">
        <!-- On rows -->
        <!--
        <tr class="active"></tr>
        <tr class="info"></tr>
        -->

        <!-- On cells (`td` or `th`) -->
        <thead>
          <tr>
            <th scope="col">Rank</th>
            <th scope="col">Juego</th>
            <th scope="col">Fecha de lanzamiento</th>
            <th scope="col">Plataforma</th>
            <th scope="col">Calificacion</th>
            <th scope="col"></th>
            <th scope="col"></th>
          </tr>
        </thead>

		<!-- TABLA - A COMPLETAR -->
        <tbody>
          <tr class="rank0">
            <th score="row">1</th>
          </tr>
          <tr class="rank1">
            <th score="row">2</th>
          </tr>
          <tr class="rank2">
            <th score="row">3</th>
          </tr>
          <tr class="rank3">
            <th score="row">4</th>
          </tr>
          <tr class="rank4">
            <th score="row">5</th>
          </tr>
          <tr class="rank5">
            <th score="row">6</th>
          </tr>
          <tr class="rank6">
            <th score="row">7</th>
          </tr>
          <tr class="rank7">
            <th score="row">8</th>
          </tr>
          <tr class="rank8">
            <th score="row">9</th>
          </tr>
          <tr class="rank9">
            <th score="row">10</th>
          </tr>
        </tbody>
      </table>
    </div>

    <section class="content-section text-center">
      <div class="contact-section">
          <h1>Actualizar Rankin</h1>
          <div class="row">
            <div class="col-xs-8 col-xs-offset-2 col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2">
              <form class="form-horizontal">
                <div class="form-group">
				  <!-- NOMBRE DE JUEGO - A COMPLETAR -->
                  <label for="Juego">Juego</label>
                  <input type="text" class="form-control juego" placeholder="Nombre del juego">
                </div>
                <div class="form-group">
				  <!-- LANZAMIENTO - A COMPLETAR -->
                  <label for="Lanzamiento">Fecha de lanzamiento</label>
                  <input type="text" class="form-control fechaLanzamiento" placeholder="dd/MM/aaaa">
                </div>
                <div class="form-group">
				  <!-- PLATAFORMA - A COMPLETAR -->
                  <label for="Plataforma">Plataformas</label>
				  <!-- PLATAFORMA - MULTIPLES SELECCIONES-->
                  <div class="checkbox">
                    <label><input class="plataforma" type="checkbox" value="PC">PC</label>
                    <label><input class="plataforma" type="checkbox" value="PS4">PS4</label>
                    <label><input class="plataforma" type="checkbox" value="Xbox">Xbox</label>
                    <label><input class="plataforma" type="checkbox" value="Otros">Otros</label>
                  </div>
                </div>
                <div class="form-group">
				  <!-- CALIFICACION - A SELECCIONAR -->
                  <label for="Calificacion">Calificacion</label>
                  <div class="radio">
                    <label>
                      <input type="radio" name="optionsRadios" class="calification" value="1">
                      1
                    </label>
                    <label>
                      <input type="radio" name="optionsRadios" class="calification" value="2">
                      2
                    </label>
                    <label>
                      <input type="radio" name="optionsRadios" class="calification" value="3">
                      3
                    </label>
                    <label>
                      <input type="radio" name="optionsRadios" class="calification" value="4">
                      4
                    </label>
                    <label>
                      <input type="radio" name="optionsRadios" class="calification" value="5">
                      5
                    </label>
                    <label>
                      <input type="radio" name="optionsRadios" class="calification" value="6">
                      6
                    </label>
                    <label>
                      <input type="radio" name="optionsRadios" class="calification" value="7">
                      7
                    </label>
                    <label>
                      <input type="radio" name="optionsRadios" class="calification" value="8">
                      8
                    </label>
                    <label>
                      <input type="radio" name="optionsRadios" class="calification" value="9">
                      9
                    </label>
                    <label>
                      <input type="radio" name="optionsRadios" class="calification" value="10">
                      10
                    </label>
                  </div>
                </div>
				<!-- GUARDAR -->
                <button type="submit" class="btn btn-default guardar-juego">Guardar</button>
				<!-- CREA 3 ELEMENTOS POR DEFECTO - POST - GET -->
                <button type="submit" class="btn btn-default cargar-items-default">Crear por defecto</button>
              </form>
            </div>
          </div>
      </div>
    </section>
  </div>
</div>

<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
