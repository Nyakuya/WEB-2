
{include file="header.tpl"}

    <h1 class="text-center">{$Titulo}</h1>
      <form method="post" action="verificarSignUp" class="text-center"> <!-- Envia la información por POST a la función verificarLogin del LoginController. -->
        <div class="form-group">
          <label for="Username">Username</label>
          <input type="text" class="form-control" name="usernameId" id="usernameId" aria-describedby="usernameId" placeholder="Username"><!-- "name" es una etiqueta que mejora la posicion del SEO de google. -->
          </div>
        <div class="form-group">
          <label for="Password">Password</label>
          <input type="password" class="form-control" name="passwordId" id="passwordId" placeholder="Password"> <!-- "name" es una etiqueta que mejora la posicion del SEO de google. -->
        </div>

        <div class="">
          {$Message} <!-- Muestra (si se da el caso), "el usuario no existe", "contraseña incorrecta", ó nada (si no ocurren errores y viene vacia). -->
        </div>

        <button type="submit" class="btn btn-primary">Sing Up</button>
    </form>
    </div>

        <!-- inicia Footer -->
        <footer>
          <p>
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 col-lg-offset-2">
              <section class="text-center">
                          <a href="user" class="btn btn-default">Volver a inicio</a>
                      </div>
                    </div>
              </section>
            </div>
          </div><!-- termina Footer -->
        </footer>
