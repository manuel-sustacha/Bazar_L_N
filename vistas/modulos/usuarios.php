<?php
if($_SESSION["perfil"] == "Especial" || $_SESSION["perfil"] == "Vendedor"){
  echo '<script>
    window.location = "inicio";
  </script>';
  return;
}
?>
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

            <tr >

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

       foreach ($usuarios as $key => $value){
         
          echo ' <tr>
                  <td>'.($key+1).'</td>
                  <td>'.$value["nombre"].'</td>
                  <td>'.$value["apellido"].'</td>
                  <td>'.$value["telefono"].'</td>
                  <td>'.$value["email"].'</td>
                  ';
                  if($value["id_rol"] == "1"){

                    echo '<td>ADMINISTRADOR</td>';

                  }else{

                    echo '<td>VENDEDOR</td>';

                  }
                  if($value["estado"] != "ina"){

                    echo '<td><button class="btn btn-success btn-xs btnActivar" idUsuario="'.$value["id_usuario"].'" estadoUsuario="act">ACTIVO</button></td>';

                  }else{

                    echo '<td><button class="btn btn-danger btn-xs btnActivar" idUsuario="'.$value["id_usuario"].'" estadoUsuario="ina">INACTIVO</button></td>';

                  }              

                  echo '
                  <td>

                    <div class="btn-group">
                      
                      <button class="btn btn-warning btnEditarUsuario" idUsuario="'.$value["id_usuario"].'" data-toggle="modal" data-target="#modalEditarUsuario"><i class="fa fa-pencil"></i></button>

                      <button class="btn btn-danger btnEliminarUsuario" idUsuario="'.$value["id_usuario"].'"><i class="fa fa-trash"></i></button>

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
</div>
<!-- /.content-wrapper -->

<!-- MODAL PARA CREAR USUARIO -->
<div id="modal_crear_usuario" class="modal fade" role="dialog" data-keyboard=""false">
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
                <span class="input-group-addon"><i class="fa fa-user-circle"></i></span>
                <input type="text" value="" maxlength="30" class="form-control input-lg" name="nombre" placeholder="Ingresar nombre" required>
                <span class="input-group-addon"><i class="fa fa-user-circle"></i></span>
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
              <input type="text" name="estado" value="ina" hidden>
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
                <span class="input-group-addon"><i class="fa fa-user-circle"></i></span>
                <input type="text" value="" maxlength="30" class="form-control input-lg" name="nombre" placeholder="Ingresar nombre" required>
                <span class="input-group-addon"><i class="fa fa-user-circle"></i></span>
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
                <input type="password" minlength="4" class="form-control input-lg" name="contrasena1" placeholder="Ingresar Contraseña" required>
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                <input type="password" minlength="4" class="form-control input-lg" name="contrasena2" placeholder="Confirmar Contraseña" required>
              </div>
              <br>
              <div class="input-group">
                <label for="">Rol: </label>
                <select name="state" id="editar_rol" style="width: 100%;">
                  <option value="1">ADMINISTRADOR</option>
                  <option value="2">VENDEDOR</option>
                </select>
              </div>
            </div>
          </div>
        </div>
        <!--FOOTER MODAL-->
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" name="submit" class="btn btn-primary">Guardar</button>
        </div>
      </form>
    </div>

  </div>
</div>
