<div class="content-wrapper">
  <section class="content-header">
    <h1>  
      Tablero
      <small>Panel de Control</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">Tablero</li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
    <?php
    if($_SESSION["perfil"] =="0"){
      include "inicio/cajas-superiores.php";
    }
    ?>
    </div> 
     </div>
  </section>
</div>
