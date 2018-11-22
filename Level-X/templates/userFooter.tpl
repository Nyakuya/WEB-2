




<!-- inicia Footer -->
<footer>
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 col-lg-offset-2">
      <section id="contact" class="content-section text-center">
        <div class="contact-section">

          <div class="container">
            <h2>Opciones:</h2>
            <a href="getReviewsWith" class="btn btn-default">Taer Lista de Reviews</a>
            <a href="getGames" class="btn btn-default">Traer Lista de Juegos</a>
            <a href="getReviewsSorted" class="btn btn-default">Traer Reviews ordenadas por Juego</a>
          </div>
          <div class="container">

            <form method="post" action="reviewsFilter" class="text-center">
              <h2>Filtrar reviews por Juego:</h2>
                <label for="ReviewedGame">Selecciona un juego para mostrar sus reviews:</label>
                <select class="form-control" name="gameId">
                  {foreach from=$Games item=Game}
                     <option value="{$Game['id_juego']}">{$Game['nombre']}</option> <!-- Usa la ID del juego para identificar que filtrar -->
                  {/foreach}
                </select>
          </div>
          <p></p>
                <button type="submit" class="btn btn-primary">Filtrar</button>
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

<a id="back-to-top" class="btn btn-primary btn-lg back-to-top" role="button" title="Click to return to the top" data-toggle="tooltip" data-placement="left"><span class="glyphicon glyphicon-chevron-up"></span></a>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/scrollup.js"></script>
<script type="text/javascript" src="js/rankTable-apiREST.js"></script>
<script type="text/javascript" src="js/nav-section-ajax.js"></script>
<script type="text/javascript" src="js/noticias_partialRender.js"></script>
<script type="text/javascript" src="js/piedra_papel_tijera.js"></script>
</body>
</html>
