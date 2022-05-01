<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>Inventory System</title>

  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="icon" href="vistas/img/plantilla/icono-negro.png">

   <!--PLUGINS DE CSS-->

  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="vistas/bower_components/bootstrap/dist/css/bootstrap.min.css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="vistas/bower_components/font-awesome/css/font-awesome.min.css">

  <!-- Ionicons -->
  <link rel="stylesheet" href="vistas/bower_components/Ionicons/css/ionicons.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="vistas/dist/css/AdminLTE.css">
  <link rel="stylesheet" href="vistas/dist/css/custom.css">
  <!-- AdminLTE Skins -->
  <link rel="stylesheet" href="vistas/dist/css/skins/_all-skins.min.css">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <!-- DataTable-->
  <link rel="stylesheet" href="vistas/bower_components/datatables.net-bs/css/dataTables.bootstrap.julio.css">
  
  <!-- CDN DataTable-->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">

  <!--NUEVO DATATABLES-->
  <link rel="stylesheet" href="vistas/vistas\bower_components\datatables\datatables.min.css">
  <link rel="stylesheet" href="vistas/vistas\bower_components\datatables\DataTables-1.11.5\css\dataTables.bootstrap4.min.css">
  
  <!-- <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.9/css/dataTables.jqueryui.css"> -->
  <!--PLUGINS DE JAVASCRIPT-->

  <!-- jQuery 3 -->
  <script src="vistas/bower_components/jquery/dist/jquery.min.js"></script>
  
  <!-- Bootstrap 3.3.7 -->
  <script src="vistas/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

  

   <!-- ============================================================
    =ESTILOS PARA USO DE DATATABLES JS 
    ===============================================================-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.0/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.0/css/buttons.dataTables.min.css">


  <!-- FastClick -->
  <script src="vistas/bower_components/fastclick/lib/fastclick.js"></script>
  
  <!-- ============================================================
    =LIBRERIAS PARA USO DE DATATABLES JS
    ===============================================================-->
    <script src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script>        
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>


    <!-- ============================================================
    =LIBRERIAS PARA EXPORTAR A ARCHIVOS
    ===============================================================-->
    <script src="https://cdn.datatables.net/buttons/2.0.0/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.print.min.js"></script>

  <!-- AdminLTE App -->
  <script src="vistas/dist/js/adminlte.min.js"></script>
  <!-- DataTable -->

  <script src="vistas/bower_components/dataTables.net/js/jquery.dataTables.js"></script>

  <!-- <script type="text/javascript" src="//cdn.datatables.net/1.9/js/jquery.dataTables.min.js"></script>-->
  <!-- FONTAWEWSOME CDN -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>

</head>

<!--CUERPO DOCUMENTO-->

<body class="hold-transition skin-yellow  sidebar-mini login-page">
 
  <?php
//$_SESSION["iniciarSesion"] = "ok";
  if(isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok"){

   echo '<div class="wrapper">';

    /*TOP*/

    include "modulos/top.php";

    /*MENU*/

    include "modulos/menu.php";

    /*CONTENIDO*/

    if(isset($_GET["ruta"])){

      if($_GET["ruta"] == "inicio" ||
         $_GET["ruta"] == "usuarios" ||
         $_GET["ruta"] == "categorias" ||
         $_GET["ruta"] == "productos" ||
         $_GET["ruta"] == "proveedores" ||
         $_GET["ruta"] == "clientes" ||
         $_GET["ruta"] == "ventas" ||
         $_GET["ruta"] == "crear-venta" ||
         $_GET["ruta"] == "reportes" ||
         $_GET["ruta"] == "salir"){

        include "modulos/".$_GET["ruta"].".php";

      }else{

        include "modulos/404.php";

      }

    }else{

      include "modulos/inicio.php";

    }

    /*FOOTER*/

    include "modulos/footer.php";

    echo '</div>';

  }else{

    include "modulos/login.php";

  }

  ?>

<script> 
$(document).ready(function() {
    $('#example').DataTable( {
        "columnDefs": [
            {
                "targets": [ 2 ],
                "visible": false,
                "searchable": false
            },
            {
                "targets": [ 3 ],
                "visible": false
            }
        ]
    } );
} );
</script>
<!-- <script src="vistas/js/plantilla.js"></script> -->

<!-- NUEVAS LIBRERIAS CDN DATATABLE -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>


<!-- NUEVAS LIBRERIAS COLOCADAS -->
<script src="vistas/bower_components/datatables/datatables.min.js"></script>

<script src="vistas/bower_components/datatables/Buttons-2.2.2/js/dataTables.buttons.min.js"></script>
<script src="vistas/bower_components/datatables/JSZip-2.5.0/jszip.min.js"></script>
<script src="vistas/bower_components/datatables/pdfmake-0.1.36/pdfmake.min.js"></script>
<script src="vistas/bower_components/datatables/pdfmake-0.1.36/vfs_fonts.js"></script>
<script src="vistas/bower_components/datatables/Buttons-2.2.2/js/buttons.html5.min.js"></script>
</body>
</html>
