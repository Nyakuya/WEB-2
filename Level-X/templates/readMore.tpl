
{include file="header.tpl"}

<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <section class="post container-fluid">
          <div class="content-section text-center">
            <h1>Review hecha por {$Review['autor_de_review']}:</h1>
            <h2>{$Review['review']}</h2>
          </div>
    </section>
  </div>
 </div>

            <article class="hidden-xs hidden-sm row thumbnail table-game">
              <div class="col-md-12 col-lg-12 table-cell-game">
                <section class="col-md-4 col-lg-4">

                  <p>
                  {if $Game['nombre'] == "Doom"} <!-- Si el juego que corresponde a esta Review, es Doom -->
                    <img class="img-responsive" src="images/juegos/doom.jpg" alt="DOOM">
                </section>
                <section class="text-game col-md-8 col-lg-8">
                  <h1>{$Game['nombre']}</h1>
                  <h2>{$Game['plot']}</h2>

                  {elseif $Game['nombre'] == "The Witcher 3: Wild Hunt"} <!-- Si el juego que corresponde a esta Review, es The witcher -->
                    <img class="img-responsive" src="images/juegos/the-witcher-3.jpg" alt="The Witcher 3: Wild Hunt">
                </section>
                <section class="text-game col-md-8 col-lg-8">
                    <h1>{$Game['nombre']}</h1>
                    <h2>{$Game['plot']}</h2>

                  {elseif $Game['nombre'] == "Overwatch"} <!-- Si el juego que corresponde a esta Review, es Overwatch -->
                    <img class="img-responsive" src="images/juegos/overwatch.jpg" alt="Overwatch">
                </section>
                <section class="text-game col-md-8 col-lg-8">
                    <h1>{$Game['nombre']}</h1>
                    <h2>{$Game['plot']}</h2>
                  {else} <!-- Si el juego que corresponde a esta Review, no se conoce, se muestra toda la info disponible en la DB y se muestra imagen "No Image Available" -->
                  <img class="img-responsive" src="images/juegos/noImageAvailable.png" alt="No Image Available">
                </section>
                <section class="text-game col-md-8 col-lg-8">
                  <h1>{$Game['nombre']}</h1>
                  <h2>{$Game['plot']}</h2>
                  {/if}
                </p>

                </section>
              </div>
            </article>


              <!-- inicia Footer -->
              <footer>
                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 col-lg-offset-2">
                    <section class="text-center">
                                <a href="getReviewsWith" class="btn btn-default">Volver atrás</a>
                            </div>
                          </div>
                    </section>
                  </div>
                </div><!-- termina Footer -->
              </footer>

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
