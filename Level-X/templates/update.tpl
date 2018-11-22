
{include file="header.tpl"}

      <h1 class="text-center">Editar {$Editar}</h1>

        {if $Editar == "Review"}
          <form method="post" action="updateReview" class="text-center"> <!-- Envia la información por POST a la función verificarLogin del LoginController. -->

            <input type="hidden" class="form-control" id="idReview" name="idReview" value="{$Review['id_review']}">

            <div class="form-group"> <!-- Área para escribir tu Review sobre el juego -->
              <label for="Review">Review:</label>
              <textarea class="form-control" rows="5" name="reviewId" id="reviewId">{$Review['review']}</textarea>
            </div>

            <div class="form-group">
              <label for="AuthorName">Autor de la Review:</label>
              <input type="text" class="form-control" name="authorId" id="authorId" aria-describedby="authorId" placeholder="Tu nombre" value="{$Review['autor_de_review']}"><!-- "name" es una etiqueta que mejora la posicion del SEO de google. -->
            </div>

            <div class="form-group"> <!-- Select para elegir a que juego pertenece -->
              <label for="ReviewedGame">Juego al que pertenece la Review:</label>
              <select class="form-control" name="gameId">
                {foreach from=$Games item=Game}
                  {if $Game['id_juego'] == $Review['id_juego']} <!-- Si la id de juego es la misma que tiene la review, se pone ese juego como el seleccionado -->
                    <option value="{$Game['id_juego']}" selected>{$Game['nombre']}</option>
                  {else}
                    <option value="{$Game['id_juego']}">{$Game['nombre']}</option>
                  {/if}
                {/foreach}
              </select>
            </div>

        {elseif $Editar == "Juego"}
          <form method="post" action="updateGame" class="text-center"> <!-- Envia la información por POST a la función verificarLogin del LoginController. -->

            <input type="hidden" class="form-control" id="idGame" name="idGame" value="{$Games['id_juego']}">

            <div class="form-group"> <!-- Área para escribir el nombre del juego -->
              <label for="GameName">Nombre del Juego:</label>
              <input type="text" class="form-control" name="gameId" id="gameId" aria-describedby="gameId" placeholder="Nombre del juego" value="{$Games['nombre']}"><!-- "name" es una etiqueta que mejora la posicion del SEO de google. -->
            </div>

            <div class="form-group"> <!-- Área para escribir de que trata el juego -->
              <label for="GamePlot">Plot:</label>
              <textarea class="form-control" rows="5" name= "plotId" id="plotId">{$Games['plot']}</textarea>
            </div>
        {/if}

        <button type="submit" class="btn btn-primary">Editar</button>
      </form>
    </div>

        <!-- inicia Footer -->
        <footer>
          <p>
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 col-lg-offset-2">
              <section class="text-center">
                {if $Review != null}
                  <a href="getReviewsWithout" class="btn btn-default">Volver a atrás</a>
                {elseif $Games != null}
                  <a href="getGamesAdmin" class="btn btn-default">Volver a atrás</a>
                {/if}
                      </div>
                    </div>
              </section>
            </div>
          </div><!-- termina Footer -->
        </footer>
