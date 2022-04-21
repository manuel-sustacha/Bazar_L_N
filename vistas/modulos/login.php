<div class="login-box">
  <div class="login-logo">
    <a href="">BAZAR <b>L Y N</b></a>
  </div>
  <div class="login-box-body">
    <p class="login-box-msg">Formulario de Inicio de Sesion</p>

    <form method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="ingUsuario" placeholder="Usuario" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" required name="ingPassword" >
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">INGRESAR</button>
        </div>
        <!-- /.col -->
      </div>
      <?php
        $login = new ControladorUsuarios();
        $login -> ctrIngresoUsuario();
      ?>
    </form>

  </div>
  <!-- /.login-box-body -->
</div>

      

