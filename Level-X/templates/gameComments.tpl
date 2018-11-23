
{include file="header.tpl"}

{include file="NavloginLogout.tpl"}

<!-- inicia Banner de INICIO -->
<div class="row">
  <div class="hidden-xs col-sm-12 col-md-12 col-lg-8 col-lg-offset-2">
    <img src="images/banners/banner_inicio.jpg" class="img-responsive banner" alt="Banner">
  </div>
</div><!-- termina Banner -->


  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 col-lg-offset-2">
      <div class="content">
        <div class="row">
          <!-- inicia el contenido de noticias -->

              <!-- Titulo del contenido principal -->
              <div class="row">
                <div class="hidden-xs col-sm-12 col-md-12 col-lg-12 section-tittle">
                  <h1>►►► Juegos disponibles para valoración ◄◄◄</h1>
                </div>
                <div class="col-xs-12 hidden-sm hidden-md hidden-lg section-tittle">
                  <h1>►►► Juegos disponibles para valoración ◄◄◄</h1> <!-- Se muestra al tener poca resolucion o hacer mucho zoom -->
                </div>
              </div>

              <ul class="list-group userPage">
                  {foreach from=$Games item=Game}
                    <li class="list-group-item">
                      <p class="text-center">{$Game['nombre']}:</p>
                      {foreach from=$Images item=Image}
                        {if $Image['id_juego'] == $Game['id_juego']}
                          <p><img src="{$Image['nombre']}" class="img-responsive" alt="{$Game['nombre']} Image"></p>
                        {/if}
                      {/foreach}
                          <p class="text-center">{$Game['plot']}</p>
                    </li>
                  {/foreach}
              </ul>

              {if $Logueado == true}
                <!-- PUNTUAR JUEGO Y COMENTAR -->
                <form class="text-center">
                  <h2>Puntúa y Comenta un juego:</h2>

                  <!-- ID USUARIO -->
                  <input type="hidden" class="form-control" id="id_usuario" value="{$Usuario['id_usuario']}"></input>

                    <!-- ELEGIR JUEGO -->
                    <label for="ReviewedGame">Selecciona el juego que quieres puntuar:</label>
                    <select class="form-control" id="id_juego">
                      {foreach from=$Games item=Game}
                         <option value="{$Game['id_juego']}">{$Game['nombre']}</option> <!-- Usa la ID del juego para identificar que filtrar -->
                      {/foreach}
                    </select>

                    <!-- Elegir puntuación -->
                      <label for="exampleSelect1">Elige la puntuación que quieres darle:</label>
                      <select class="form-control" id="puntaje">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                      </select>

                    <!-- ESCRIBIR COMENTARIO -->
                    <div class="form-group"> <!-- Área para escribir tu Review sobre el juego -->
                      <label for="comentario">Comentario:</label>
                      <textarea class="form-control" rows="5" name="commentText" id="commentText" placeholder="Anímate, escribe tu opinión sobre el juego"></textarea>
                    </div>

                    <p></p>
                    <!-- Si ponia 'type="submit", como NO es un submit porque funciona con API REST y javascript tiene un onclick de '#submitComment', fallaba (en linux) -->
                    <button id="submitComment" class="btn btn-primary">Submit</button>
                </form>
              {else}
                <h1 class="text-center">Debes estar logueado para poder comentar y valorar</h1>
              {/if}

                {if $Admin == 0 || $Admin == null} <!-- Cuando el usuario no esta logueado, $Admin es null. Cuando esta logeuado y no es admin, vale 0 -->
                  <h2 class="text-center">Comentarios:</h2>
                  <div id="comentarios-container" value="false"> <!-- en 'comentarios.js' uso 'getElementById', me paro en 'comentarios-container' y guardo el atributo 'value' (false) para saber que NO es admin -->
                    <!-- COMENTARIOS VAN AQUÍ -->
                  </div>
                {elseif $Admin == 1} <!-- Cuando el usuario esta logueado y es admin, vale 1 -->
                  <h2 class="text-center">Comentarios:</h2>
                  <div id="comentarios-container" value="true"> <!-- en 'comentarios.js' uso 'getElementById', me paro en 'comentarios-container', y guardo el atributo 'value' (true) para saber que es admin -->
                    <!-- COMENTARIOS VAN AQUÍ -->
                  </div>
              {/if}

        </div>
      </div>
    </div>
  </div>

{include file="gamesCommentFooter.tpl"}
