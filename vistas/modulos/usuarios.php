<div class="content-wrapper">

  <section class="content-header">

    <h1>

      Administrar usuarios

    </h1>

    <ol class="breadcrumb">

      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Administrar Usuarios</li>

    </ol>

  </section>

  <!-- Main content -->
  <section class="content">
    <div class="box">

      <div class="box-header with-border">
        <button class="btn btn-primary" data-toggle="modal" data-target="#modal_crear_usuario">
          <i class="fa fa-user-plus"></i>
          Agregar Usuario

        </button>

      </div>

      <div class="box-body">

        <table class="table table-bordered table-striped dt-responsive tablas" id="tablas" width="100%">

          <thead>

            <tr bgcolor="">

              <th style="width:10px">#</th>
              <th>Nombre</th>
              <th>Apellido</th>
              <th>Teléfono</th>
              <th>Email</th>
              <th>Rol</th>
              <th>Estado</th>
              <th>Acciones</th>

            </tr>

          </thead>
          <tbody>
            <!-- MOSTRAR USUARIOS EN TABLA -->
            <?php

            $item = null;
            $valor = null;

            $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

            foreach ($usuarios as $key => $value) {

              echo ' <tr>
                  <td>' . ($key + 1) . '</td>
                  <td>' . $value["nombre"] . '</td>
                  <td>' . $value["apellido"] . '</td>
                  <td>' . $value["telefono"] . '</td>
                  <td>' . $value["email"] . '</td>
                  ';
              if ($value["id_rol"] == "1") {

                echo '<td>ADMINISTRADOR</td>';
              } else {

                echo '<td>VENDEDOR</td>';
              }
              if ($value["estado"] != "ina") {

                echo '<td><button class="btn btn-success btn-xs btnActivar" idUsuario="' . $value["id_usuario"] . '" estadoUsuario="'.$value["estado"] .'">ACTIVO</button></td>';
              } else {

                echo '<td><button class="btn btn-danger btn-xs btnActivar" idUsuario="' . $value["id_usuario"] . '" estadoUsuario="'.$value["estado"] .'">INACTIVO</button></td>';
              }
              echo '
                  <td>

                    <div class="btn-group">
                      
                      <button class="btn btn-warning btnEditarUsuario" idUsuario="' . $value["id_usuario"] . '" data-toggle="modal" data-target="#modal_editar_usuario"><i class="fa fa-pencil"></i></button>
                      
                      <button class="btn btn-danger btnEliminarUsuario" idUsuario="' . $value["id_usuario"] . '"><i class="fa fa-trash"></i></button>

                    </div>  

                  </td>

                </tr>';
            }


            ?>

          </tbody>
        </table>

      </div>

    </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- MODAL PARA CREAR USUARIO -->
<div id="modal_crear_usuario" class="modal fade" role="dialog" data-keyboard="" false">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="crear_usuario" role="form" method="post">
        <!--HEADER MODAL-->
        <div class="modal-header" style="background:#3c8dbc; color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Agregar Usuario</h4>
        </div>
        <!--BODY MODAL-->
        <div class="modal-body">
          <div class="box-body">
            <!-- ENTRADA PARA EL NOMBRE -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" value="" maxlength="30" class="form-control input-lg" name="nombre" placeholder="Ingresar nombre" required>
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" maxlength="30" class="form-control input-lg" name="apellido" placeholder="Ingresar apellido" required>
              </div>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-phone"></i> </span>
                <input type="number" min="0" class="form-control input-lg" name="telefono" placeholder="Ingresar Teléfono" required>
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                <input type="email" maxlength="45" class="form-control input-lg" name="email" placeholder="Ingresar Email" required>
              </div>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                <input type="password" minlength="4" class="form-control input-lg" name="contrasena" placeholder="Ingresar Contraseña" required>
              </div>
              <br>
              <div>
                <label for="">Rol: </label>
                <select class="form-control input-lg" name="rol">
                  <option value="">Seleccionar Rol</option>
                  <option value="1">ADMINISTRADOR</option>
                  <option value="2">VENDEDOR</option>
                </select>
              </div>
              <br>
              <input type="text" name="estadoIna" value="ina" hidden>
            </div>
          </div>
        </div>
        <!--FOOTER MODAL-->
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" name="submit" class="btn btn-primary">Guardar Datos</button>
        </div>
        <?php
        $crearUsuario = new ControladorUsuarios();
        $crearUsuario->ctrCrearUsuario();
        ?>
      </form>

    </div>

  </div>
</div>
<!-- MODAL PARA EDITAR USUARIO -->
<div id="modal_editar_usuario" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <div class="modal-header" style="background:#f39c12; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar usuario</h4>

        </div>

        <div class="modal-body">

          <div class="box-body">

            <div class="form-group">
            <input type="text" id="id_usuario" name="id_usuario" value="" required hidden>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <input type="text" class="form-control input-lg" id="editarNombre" maxlength="30" name="editarNombre" value="" required>

              </div>

            </div>
            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <input type="text" class="form-control input-lg" id="editarApellido" maxlength="30" name="editarApellido" value="" required>

              </div>

            </div>

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-phone"></i></span>

                <input type="text" class="form-control input-lg" maxlength="8" id="editarTelefono" name="editarTelefono" value="" required>

              </div>

            </div>

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>

                <input type="email" class="form-control input-lg" maxlength="45" id="editarEmail" name="editarEmail" value="" required>

              </div>

            </div>

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                <input type="password" class="form-control input-lg" minlength="4" name="editarPassword" placeholder="Escriba la nueva contraseña">

                <input type="hidden" id="passwordActual" name="passwordActual">

              </div>

            </div>

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-users"></i></span>

                <select class="form-control input-lg" name="editarRol">

                  <option value="" id="editarRol"></option>

                  <option value="1">ADMINISTRADOR</option>

                  <option value="2">VENDEDOR</option>

                </select>
                
              </div>
            </div>

          </div>

        </div>

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Modificar usuario</button>

        </div>

        <?php
        $editarUsuario = new ControladorUsuarios();
        $editarUsuario->ctrEditarUsuario();
        ?>

      </form>

    </div>

  </div>

</div>
<?php

  $borrarUsuario = new ControladorUsuarios();
  $borrarUsuario -> ctrBorrarUsuario();

?> 