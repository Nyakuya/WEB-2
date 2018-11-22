
{include file="header.tpl"}

      {if $Rol == "Asignar"}
        <h1 class="text-center">Asignar permisos de administración</h1>
      {elseif $Rol == "Quitar"}
        <h1 class="text-center">Quitar permisos de administración</h1>
      {/if}


        {if $Rol == "Asignar"} <!-- Si es 1, el admin intenta asignar privilegios de administrador a algun usuario -->
          <form method="post" action="assignAdminPrivileges" class="text-center"> <!-- Envia la información por POST a la función assignAdminPrivileges del AdminController. -->

            <div class="form-group"> <!-- Select para elegir el admin a quien le darás permisos de administración -->
              <label for="ReviewedGame">¿A qué usuario darle privilegios de administración?:</label>
              <select class="form-control" name="userId">
                {foreach from=$Usuarios item=Usuario}
                  {if $Usuario['admin'] == 0} <!-- Si 'admin' vale 0, significa que este usuario NO tiene permisos de administración -->
                    <option value="{$Usuario['id_usuario']}">{$Usuario['username']}</option>
                  {/if}
                {/foreach}
              </select>
            </div>
          <button type="submit" class="btn btn-primary">Conceder Privilegios</button>

        {elseif $Rol == "Quitar"} <!-- Si es 2, el admin intenta quitar privilegios de administracion a algun otro admin (quitarse permisos a el mismo no se lo permito)-->
          <form method="post" action="removeAdminPrivileges" class="text-center"> <!-- Envia la información por POST a la función verificarLogin del LoginController. -->

            <div class="form-group"> <!-- Select para elegir el admin a quien le quitarás permisos de administración -->
              <label for="ReviewedGame">¿A qué admin quitarle los privilegios de administración?:</label>
              <select class="form-control" name="userId">
                {foreach from=$Usuarios item=Usuario}
                  {if $Usuario['admin'] == 1 && $Usuario['username'] != $CurrentUser} <!-- Si 'admin' vale 1, este usuario tiene permisos de administración. (admin no se puede borrar a si mismo) -->
                    <option value="{$Usuario['id_usuario']}">{$Usuario['username']}</option>
                  {/if}
                {/foreach}
              </select>
            </div>
          <button type="submit" class="btn btn-primary">Remover Privilegios</button>

        {elseif $Rol == "Borrar"} <!-- Si es 2, el admin intenta quitar privilegios de administracion a algun otro admin (quitarse permisos a el mismo no se lo permito)-->
          <form method="post" action="deleteUserAccount" class="text-center"> <!-- Envia la información por POST a la función verificarLogin del LoginController. -->

            <div class="form-group"> <!-- Select para elegir el admin a quien le darás permisos de administración -->
              <label for="ReviewedGame">¿Qué usuario quieres eliminar?:</label>
              <select class="form-control" name="userId">
                {foreach from=$Usuarios item=Usuario}
                  {if $Usuario['username'] != $CurrentUser} <!-- admin no se puede borrar a si mismo) -->
                    <option value="{$Usuario['id_usuario']}">{$Usuario['username']}</option>
                  {/if}
                {/foreach}
              </select>
            </div>
            <button type="submit" class="btn btn-primary">Eliminar</button>
        {/if}


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
