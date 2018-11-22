<?php
/* Smarty version 3.1.33, created on 2018-10-18 13:05:19
  from 'C:\xampp\htdocs\Level-X\templates\aside.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5bc868efa3b3a8_41313877',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1b2f3c4ddc88f0dcac9507a457ecc88a8b74c759' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Level-X\\templates\\aside.tpl',
      1 => 1539856271,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5bc868efa3b3a8_41313877 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- inicia el Aside -->
<aside class="hidden-xs hidden-sm col-md-4 col-lg-4">
    <!-- inicia wigdet post's recientes-->
    <div class="row">
      <div class="hidden-xs hidden-sm col-md-12 col-lg-12">
        <section class="container-fluid widget_aside">
          <h1>POSTS RECIENTES</h1>
          <article class="media">
            <div class="media-left">
              <a href="#">
                <img class="media-object" src="images/posts/sidebar-post1.png" alt="The Elder Scroll Online">
              </a>
            </div>
            <div class="media-body">
              <h4 class="media-heading">THE ELDER SCROLL ONLINE</h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
          </article>
          <article class="media">
            <div class="media-left">
              <a href="#">
                <img class="media-object" src="images/posts/sidebar-post2.png" alt="The Witcher">
              </a>
            </div>
            <div class="media-body">
              <h4 class="media-heading">THE WITCHER</h4>
              <p>Gracias a la franquicia The Witcher y a su gran éxito, CD Projekt RED ya vale más en bolsa que Capcom, "su valor en la bolsa...</p>
            </div>
          </article>
        </section>
      </div>
    </div><!-- termina wigdet post's recientes-->

    <!-- inicia wigdet comentarios recientes-->
    <div class="row">
      <div class="hidden-xs hidden-sm col-md-12 col-lg-12">
        <section class="container-fluid widget_aside">
          <h1>COMENTARIOS</h1>
          <article class="media">
            <div class="media-left media-middle">
              <a href="#">
                <img class="media-object" src="images/avatar/avatar.png" alt="avatar">
              </a>
            </div>
            <div class="media-body">
              <span class="comment">"Muy bueno, pero creo que el juego deberia tener..."</span>
            </div>
          </article>

          <article class="media">
            <div class="media-left media-middle">
              <a href="#">
                <img class="media-object" src="images/avatar/avatar.png" alt="avatar">
              </a>
            </div>
            <div class="media-body">
              <span class="comment">"No lo se Rick, parece falso.. :P"</span>
            </div>
          </article>
        </section>
      </div>
    </div><!-- termina wigdet comentarios recientes-->

    <!-- inicia wigdet minijuego-->
    <div class="row">
      <div class="hidden-xs hidden-sm col-md-12 col-lg-12">
        <section class="container-fluid widget_aside mini_game">
          <!-- IMAGEN (Piedra, Papel, Tijera) -->
          <img class="img-responsive mini_game_text" src="images/mini-game/titulo.png" alt="Piedra, Papel o Tijera">

          <section class="box_game">
            <!-- IMAGEN INICIAL de la DECISIÓN de PC -->
            <img src="images/mini-game/PC.png" alt="PC:">
            <!-- IMAGEN de ULTIMA DECISION de PC -->
            <img class="PC" src="images/mini-game/decicion.png"/>

            <img class="img-responsive resultado">
          </section>

          <section class="mini_game_buttons">
            <button onclick="PiedraPapelTijera(1)"><img src="images/mini-game/decicion1.png" alt="piedra"></button>
            <button onclick="PiedraPapelTijera(2)"><img src="images/mini-game/decicion2.png" alt="papel"></button>
            <button onclick="PiedraPapelTijera(3)"><img src="images/mini-game/decicion3.png" alt="tijera"></button>
          </section>

          <div class="variacion row">
            <div class="col-md-12 col-lg-offset-2 col-lg-8">
              <div class="input-group">
                <span class="input-group-addon">
                  <input type="checkbox" class="checkbox" aria-label="variar_probabilidad">
                </span>
                <label class="form-control">Variarción</label>
              </div>
            </div>
          </div>

          <section class="score table-responsive">
            <h1>Score</h1>
            <table class="table table-game">
              <tr>
                <th></th>
                <th colspan="2" title="ganador">Ganador</th>
              </tr>
              <tr>
                <td scope="col" title="num_partida">Num. partida</td>
                <td scope="col" tittle="Humano">Humano</td>
                <td scope="col" tittle="PC">PC</td>
              </tr>
              <tr>
                <td class="partidas">0</td><td class="humano" >0</td><td class="computadora">0</td>
              </tr>
            </table>
          </section>
        </section>
      </div>
    </div><!-- termina wigdet minijuego-->
</aside><!-- termina el Aside -->
<?php }
}
