<?php
if($_SESSION["perfil"] == "Vendedor"){
  echo '<script>
    window.location = "inicio";
  </script>';
return;
}
?>
<div class="content-wrapper">
  <section class="content-header">  
    <h1> 
      Administrar proveedor
    </h1>
    <ol class="breadcrumb">
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">Administrar proveedores</li>
    </ol>
  </section>
  <section class="content">
    <div class="box">
      <div class="box-header with-border">
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarProveedor"> 
          Agregar proveedor
        </button>
      </div>
      <div class="box-body">
      <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
        <thead>
         <tr>
           <th style="width:10px">#</th>
           <th>Nombre</th>
           <th>Telefono</th>
           <th>Dirección</th>
           <th>Telefono_Repartidor</th>
           <th>Acciones</th>
         </tr> 
        </thead>
        <tbody>

<?php
  $item = null;
  $valor = null;
  $clientes = ControladorProveedores::ctrMostrarProveedores($item, $valor);
  foreach ($clientes as $key => $value) {
    echo '<tr>
            <td>'.($key+1).'</td>
            <td>'.$value["nombre"].'</td>
            <td>'.$value["telefono"].'</td>
            <td>'.$value["direccion"].'</td>
            <td>'.$value["telefono_repartidor"].'</td>
            <td>
              <div class="btn-group"> 
                <button class="btn btn-warning btnEditarProveedor" data-toggle="modal" data-target="#modalEditarProveedor" idProveedor="'.$value["id_proveedor"].'"><i class="fa fa-pencil"></i></button>';
              if($_SESSION["perfil"] == "0"){
                  echo '<button class="btn btn-danger btnEliminarProveedor" idProveedor="'.$value["id_proveedor"].'"><i class="fa fa-times"></i></button>';
              }
              echo '</div>  
            </td>
          </tr>';
    }
?>
</tbody>     
       </table>
       <input type="hidden" value="<?php echo $_SESSION['perfil']; ?>" id="perfilOculto">
      </div>
    </div>
  </section>
</div>

<!--MODAL AGREGAR -->

<div id="modalAgregarProveedor" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">
        <div class="modal-header" style="background:#3c8dbc; color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Agregar proveedor</h4>
        </div>
        <div class="modal-body">
          <div class="box-body">
            <div class="form-group">
              <div class="input-group">
              </div>
            </div>
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-code"></i></span> 
                <input type="text" class="form-control input-lg" id="nuevoProveedor" name="nuevoProveedor" placeholder="Ingresar nombre" required>
              </div>
            </div>
            
             <div class="form-group">  
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span> 
                <input type="number" class="form-control input-lg" name="nuevoTelefono" placeholder="Ingresar telefono" required>
              </div>
            </div>
             <div class="form-group">              
              <div class="input-group">              
                <span class="input-group-addon"><i class="fa fa-check"></i></span>
                <input type="text" class="form-control input-lg" name="nuevaDireccion" min="0" placeholder="Ingresar direccion" required>
              </div>
              </div>
             <div class="form-group">              
              <div class="input-group">              
                <span class="input-group-addon"><i class="fa fa-check"></i></span>
                <input type="number" class="form-control input-lg" name="nuevoTelefonoRepartidor" min="0" placeholder="Ingresar telefono repartidor" required>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar proveedor</button>
        </div>
      </form>

        <?php
          $crearProveedor = new ControladorProveedores();
          $crearProveedor -> ctrCrearProveedor();
        ?>  

    </div>
  </div>
</div>

<!--MODAL EDITAR -->

<div id="modalEditarProveedor" class="modal fade" role="dialog">  
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">
        <div class="modal-header" style="background:#3c8dbc; color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Editar proveedor</h4>
        </div>
        <div class="modal-body">
          <div class="box-body">
            <div class="form-group">              
              <div class="input-group">              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 
                <input type="text" class="form-control input-lg" id="editarNombre" name="editarNombre" placeholder="Ingresar nombre" required>
                <input type="hidden" id="idProveedor" name="idProveedor">
              </div>
            </div>
            <div class="form-group">              
              <div class="input-group">              
                <span class="input-group-addon"><i class="fa fa-code"></i></span> 
                <input type="text" class="form-control input-lg" id="editarTelefono" name="editarTelefono" required>
              </div>
            </div>
             <div class="form-group">              
              <div class="input-group">              
                <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span> 
                <input type="text" class="form-control input-lg" id="editarDireccion" name="editarDireccion" required>
              </div>
            </div>
             <div class="form-group">              
              <div class="input-group">              
                <span class="input-group-addon"><i class="fa fa-check"></i></span> 
                <input type="number" class="form-control input-lg" id="editarTelefonoRepartidor" name="editarTelefonoRepartidor" min="0" required>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar cambios</button>
        </div>
      </form>

        <?php
          $editarProveedor = new ControladorProveedores();
          $editarProveedor -> ctrEditarProveedor();
        ?>      

    </div>
  </div>
</div>

<?php
  $eliminarProveedor = new ControladorProveedores();
  $eliminarProveedor -> ctrEliminarProveedor();
?>      



