
{include file="header.tpl"}

          <h1 class="text-center">Añadir imagen a un Juego</h1>
          <form method="post" action="guardarImagenes" id="guardarImagenes" class="text-center" enctype="multipart/form-data"> <!-- Envia la información por POST a la función verificarLogin del LoginController. -->

            <div class="form-group"> <!-- Select para elegir a que juego pertenece -->
              <label for="GameImage">Juego al cual añadir imagen:</label>
              <select class="form-control" name="gameId">
                {foreach from=$Games item=Game}
                    <option value="{$Game['id_juego']}">{$Game['nombre']}</option>
                {/foreach}
              </select>

                <label for="Imagen">Imagen:</label>
                <input type="file" id="images" name="images[]" multiple>
            </div>

           <button type="submit" class="btn btn-primary">Upload</button>

      </form>
    </div>
                <h2>{$Message}</h2>

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
