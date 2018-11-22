<!-- inicia Container -->
<div class="container-fluid">
  <header>
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 col-lg-offset-2 ">
        <nav class="navbar navbar-inverse">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-navbar-collapse" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a id="logo" class="navbar-brand">
                <img alt="Brand" src="css/images/logo/logo.png">
              </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-navbar-collapse">
              <ul class="nav navbar-nav">

                <li class="inicio active" data-target="inicio"><a href="user">Inicio</a></li>
                {if $Logueado == true}
                  <li class="inicio active" data-target="inicio"><a href="comentarios">Comentarios</a></li> <!-- Repito comentarios en ambos casos porque quiero que quede luego de Login/Logout-->
                  <li class="inicio active" data-target="inicio"><a href="logout">Logout</a></li> <!-- Cambia a login si no está logueado -->
                  {if $Admin == 1}
                    <li class="inicio active" data-target="inicio"><a href="admin">Admin Mode</a></li>
                  {/if}
                {else}
                  <li class="inicio active" data-target="inicio"><a href="comentarios">Comentarios</a></li>
                  <li class="inicio active" data-target="inicio"><a href="login">Login</a></li> <!-- Cambia a logout si ya esta logueado -->
                  <li class="inicio active" data-target="inicio"><a href="signUp">Sign Up</a></li> <!-- Desaparece si ya esta logueado-->
                {/if}

              </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
      </div>
    </div>
