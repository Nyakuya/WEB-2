
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
              <div class="row">
                <div class="hidden-xs col-sm-12 col-md-12 col-lg-12 section-tittle">
                  <h1>►►► Informacion ◄◄◄</h1>
                </div>
                <div class="col-xs-12 hidden-sm hidden-md hidden-lg section-tittle">
                  <h1>► Informacion ◄</h1> <!-- Se muestra al tener poca resolucion o hacer mucho zoom -->
                </div>
              </div>

              <ul class="list-group userPage">
                {if $Mostrar == "Reviews"}   <!-- Si $Reviews no está vacia, es porque quiero la lista de reviews -->
                  {foreach from=$Reviews item=Review}
                    <li class="list-group-item"> <p>Review por {$Review['autor_de_review']}:</p> <p>{$Review['review']}</p>
                    <a href="borrarReview/{$Review['id_review']}" class="btn btn-primary readmore" role="button">BORRAR REVIEW</a>
                    <a href="editarReview/{$Review['id_review']}" class="btn btn-primary readmore" role="button">EDITAR</a></li>
                  {/foreach}

                {elseif $Mostrar == "Juegos"} <!-- Si $Reviews estaba vacia, significa que quiero la lista de juegos -->
                  {foreach from=$Games item=Game}
                    <li class="list-group-item"> <p>{$Game['nombre']}:</p>
                    {foreach from=$Images item=Image}
                        {if $Image['id_juego'] == $Game['id_juego']}
                          <p><img src="{$Image['nombre']}" class="img-responsive banner" alt="Game Image"><a href="borrarImagen/{$Image['id_imagen']}" class="btn btn-primary readmore" role="button">Borrar Imagen</a></p>
                        {/if}
                    {/foreach}
                      <p>{$Game['plot']}</p>
                      <a href="borrarJuego/{$Game['id_juego']}" class="btn btn-primary readmore" role="button">BORRAR JUEGO</a>
                      <a href="editarJuego/{$Game['id_juego']}" class="btn btn-primary readmore" role="button">EDITAR</a></li>
                  {/foreach}
                {/if}
              </ul>
        </div>
      </div>
    </div>
  </div>



{include file="adminFooter.tpl"}
