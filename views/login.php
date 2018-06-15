<div class="row">
    <div class="col-md-5 frm-login" >
      <div class="card">
        <div class="card-header">
          <h5 class="title">INICIO SESIÓN</h5>
        </div>
        <div class="card-body">
          <form>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Email</label>
                  <input type="text" class="form-control" placeholder="Email" value="jsantos@upc.edu.pe">
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label>Password</label>
                  <input type="Password" class="form-control" placeholder="Password" value="michael23">
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group text-center">
                  <span>¿No tienes Cuenta?</span><a href="javascript:Registrate()"><span>Registrate Aquí</span></a>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group text-center">
                  <input type="button" class="btn btn-danger" onclick="javascript:Acceso();" style="width: 40%" id="btnIngresar" value="Ingresar" >
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

    
    <div class="col-md-7 frm-registrate" style="display: none;">
      <div class="card">
        <div class="card-header">
          <h5 class="title">REGISTRAR USUARIO</h5>
        </div>
        <div class="card-body">
          <form>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Nombres</label>
                  <input type="text" class="form-control" placeholder="Nombres" value="">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Apellidos</label>
                  <input type="text" class="form-control" placeholder="Apellidos" value="">
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label>Celular</label>
                  <input type="text" class="form-control" placeholder="Celular" value="">
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" class="form-control" placeholder="Email" value="">
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label>Password</label>
                  <input type="Password" class="form-control" placeholder="Password" value="">
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label>Repetir Password</label>
                  <input type="Password" class="form-control" placeholder="Repetir Password" value="">
                </div>
              </div>

              <div class="col-md-12">
                <div class="form-group text-center">
                  <button class="btn btn-danger" style="width: 40%" >Guardar</button>
                </div>
              </div>

            </div>
          </form>
        </div>
      </div>
    </div>
</div>

<!--Acciones-->
<script type="text/javascript">
  
  $(function() {

  });

  function Registrate() {
      $('.frm-login').css("display","none");
      $('.frm-registrate').css("display","block");
  }

  function Login() {
      $('.frm-registrate').css("display","none");
      $('.frm-login').css("display","block");
  }

  function Acceso() {
    // body...
      location='security/iniciar_session.php'
  }

</script>