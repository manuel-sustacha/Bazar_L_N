<div id="back"></div>
<div class="login-box"> 
  <div class="login-logo">
    <img src="" class="img-responsive" style="padding:30px 100px 0px 100px">
  </div>
  <div class="login-box-body">
    <p class="login-box-msg">Iniciar sesion</p>

    <form method="post">
      <div class="form-group has-feedback ">
        <input type="text" class="form-control input-style" name="ingUsuario" placeholder="Usuario" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback ">
        <input type="password" class="form-control input-style" placeholder="Password" required name="ingPassword" >
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat btn-round">INGRESAR</button>
        </div>
      </div>

      <?php
        $login = new ControladorUsuarios();
        $login -> ctrIngresoUsuario();  
      ?>

    </form>
  </div>
</div>
