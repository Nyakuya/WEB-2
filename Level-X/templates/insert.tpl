
{include file="header.tpl"}

    <h1 class="text-center">Insertar {$Insertar}</h1>

        {if $Insertar == "Review"}
          <form method="post" action="insertReview" class="text-center"> <!-- Envia la información por POST a la función verificarLogin del LoginController. -->

            <div class="form-group"> <!-- Área para escribir tu Review sobre el juego -->
              <label for="Review">Review:</label>
              <textarea class="form-control" rows="5" name="reviewId" id="reviewId" placeholder="Anímate, escribe tu opinión sobre el juego"></textarea>
            </div>

            <div class="form-group">
              <label for="AuthorName">Autor de la Review:</label>
              <input type="text" class="form-control" name="authorId" id="authorId" aria-describedby="authorId" placeholder="Tu nombre"><!-- "name" es una etiqueta que mejora la posicion del SEO de google. -->
            </div>

            <div class="form-group"> <!-- Select para elegir a que juego pertenece -->
              <label for="ReviewedGame">Juego al que pertenece la Review:</label>
              <select class="form-control" name="gameId">
                {foreach from=$Games item=Game} <!-- Por cada juego existe una opción con su id_juego (para saber que juego es cuando pase por POST), y su nombre -->
                  <option value="{$Game['id_juego']}">{$Game['nombre']}</option>
                {/foreach}
              </select>
            </div>

        {elseif $Insertar == "Game"}
          <form method="post" action="insertGame" class="text-center"> <!-- Envia la información por POST a la función verificarLogin del LoginController. -->

            <div class="form-group"> <!-- Área para escribir el nombre del juego -->
              <label for="GameName">Nombre del Juego:</label>
              <input type="text" class="form-control" name="gameId" id="gameId" aria-describedby="gameId" placeholder="Nombre del juego"><!-- "name" es una etiqueta que mejora la posicion del SEO de google. -->
            </div>

            <div class="form-group"> <!-- Área para escribir de que trata el juego -->
              <label for="GamePlot">Plot:</label>
              <textarea class="form-control" rows="5" name= "plotId" id="plotId" placeholder="¿De que trata el juego?"></textarea>
            </div>
        {/if}

        <button type="submit" class="btn btn-primary">Agregar</button>
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
