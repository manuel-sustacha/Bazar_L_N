<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar Productos
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar productos</li>
    
    </ol>

  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Productos</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                  title="Collapse">
            <i class="fa fa-minus"></i></button>
          <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fa fa-times"></i></button>
        </div>
      </div>
      
      <div class="box-body">
        <div class="container-fluid">
          <!-- AREA DE BUSQUEDA -->
          <div class="row">
            <div class="col-lg-12"></div>
          </div>

          <!-- AREA DE LA TABLA -->
          <div class="row">
            <div class="col-lg-12">
              <table id="tbl_productos" class="table table-striped w-100 shadow">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Estado</th>
                    <th>Fecha Actualización</th>
                    <th>Fecha Eliminación</th>
                    <th>Id Categoria</th>
                    <th>Id Proveedor</th>
                    <th class="text-center">Opciones</th>
                  </tr>
                </thead>
              </table>
            </div>
          </div>

        </div>
      </div>
      <!-- /.box-body -->
      
      
      <div class="box-footer">
        Footer
      </div>
      <!-- /.box-footer-->
    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script>
  $(document).ready(function(){
    var table;

    $.ajax({
      url:"ajax/productos.ajax.php",
      type:"POST",
      data:{'accion' :1}, //1 es listar productos
      //dataType:'json',
      success:function(respuesta){
        console.log("respuesta", respuesta);
      }
    });

    table = $("#tbl_productos").DataTable({
      ajax:{
        url:"ajax/productos.ajax.php",
        dataSrc:'',
        type:"POST",
        data:{'accion' :1}, //1 es listar productos
      
      },

      responsive:{
        details:{
          type:'column'
        }
      },

      languaje:{
        url:"//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
      }
    });
  })
</script>