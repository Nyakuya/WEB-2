
{include file="header.tpl"}

{include file="NavloginLogout.tpl"}

<!-- inicia Banner de INICIO -->
<div class="row">
  <div class="hidden-xs col-sm-12 col-md-12 col-lg-8 col-lg-offset-2">
    <img src="images/banners/banner_inicio.jpg" class="img-responsive banner" alt="Banner">
  </div>
</div><!-- termina Banner -->

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
                  <h1>►►► Informacion ◄◄◄</h1>
                </div>
                <div class="col-xs-12 hidden-sm hidden-md hidden-lg section-tittle">
                  <h1>► Informacion ◄</h1> <!-- Se muestra al tener poca resolucion o hacer mucho zoom -->
                </div>
              </div>

              <ul class="list-group userPage">
                {if $Rol == "Reviews"}   <!-- Muestra las Reviews -->
                  {foreach from=$Reviews item=Review}
                    {foreach from=$Games item=Game}
                      {if $Review['id_juego'] == $Game['id_juego']}
                        <li class="list-group-item"><p>Review de {$Game['nombre']} por {$Review['autor_de_review']}:</p> <p>{$Review['review']}</p>
                        <a href="readMore/{$Review['id_review']}" class="btn btn-primary readmore" role="button">Leer más</a></li>
                      {/if}
                    {/foreach}
                  {/foreach}

                {elseif $Rol == "Juegos"} <!-- Muestra los Juegos con su correspondiente imagen -->
                  {foreach from=$Games item=Game}
                    <li class="list-group-item"><p>{$Game['nombre']}:</p>
                      {foreach from=$Images item=Image}
                          {if $Image['id_juego'] == $Game['id_juego']}
                            <p><img src="{$Image['nombre']}" class="img-responsive banner" alt="Game Image"></p>
                          {/if}
                      {/foreach}
                   <p>{$Game['plot']}</p></li>
                  {/foreach}

                {elseif $Rol == "SortedReviews"} <!-- Ordena las Reviews por Juego -->
                  {foreach from=$Games item=Game}
                      {foreach from=$Reviews item=Review}
                          {if $Review['id_juego'] == $Game['id_juego']}
                            <li class="list-group-item"><p>Review de {$Game['nombre']} por {$Review['autor_de_review']}:</p> <p>{$Review['review']}</p>
                          {/if}
                      {/foreach}
                  {/foreach}

                {elseif $Rol == "FilteredReviews"} <!-- Filtra las Reviews por el Juego seleccionado -->
                  {foreach from=$Reviews item=Review}
                    {foreach from=$Games item=Game}
                      {if $Review['id_juego'] == $Game['id_juego']}
                        <li class="list-group-item"><p>Review de {$Game['nombre']} por {$Review['autor_de_review']}:</p> <p>{$Review['review']}</p>
                        <a href="readMore/{$Review['id_review']}" class="btn btn-primary readmore" role="button">Leer más</a></li>
                      {/if}
                    {/foreach}
                  {/foreach}

                {/if}
              </ul>

            </section><!-- hasta aca carga con partial-render dependiendo del active en el nav -->
            </section><!-- termina el contenido de noticias -->

              {include file="aside.tpl"}

        </div>
      </div>
    </div>
  </div>
</section><!-- termina Contenido principal de la pagina -->



{include file="userFooter.tpl"}
