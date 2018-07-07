<div class="row">
    <div class="col-md-5 frm-login" >
      <div class="card">
        <div class="card-header">
          <h5 class="title">INICIO SESIÓN</h5>
        </div>
        <div class="card-body">
          
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Email</label>
                  <input type="text" class="form-control" autofocus="" autocomplete="" id="emaill" placeholder="Email" value="">
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label>Password</label>
                  <input type="Password" class="form-control" id="passwordl" placeholder="Password" value="">
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
          
        </div>
      </div>
    </div>

    
    <div class="col-md-7 frm-registrate" style="display: none;">
      <div class="card">
        <div class="card-header">
          <h5 class="title">REGISTRAR USUARIO</h5>
        </div>
        <div class="card-body">
          
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Nombres</label>
                  <input type="text" id="nombre" class="form-control" autofocus="" placeholder="Nombres" value="" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Apellidos</label>
                  <input type="text" id="apellidos" class="form-control" placeholder="Apellidos" value="" required>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label>Celular</label>
                  <input type="text" id="celular" class="form-control" placeholder="Celular" value="" required>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" id="email" class="form-control" autocomplete="" placeholder="Email" value="" required>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label>Password</label>
                  <input type="Password" id="password" class="form-control" placeholder="Password" value="" required>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label>Repetir Password</label>
                  <input type="Password" id="password2" class="form-control" placeholder="Repetir Password" value="" required>
                </div>
              </div>

              <div class="col-md-12">
                <div class="form-group text-center">
                  <input type="button" class="btn btn-danger" onclick="javascript:RegistrarUsuario();" style="width: 40%" id="btnGuardar" value="Guardar" >
                </div>
              </div>

            </div>
          
        </div>
      </div>
    </div>
</div>

<!--Acciones-->
<script type="text/javascript">


  fbOnClick("emaill","btnIngresar");
  fbOnClick("passwordl","btnIngresar");
  

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
      var username = $("#emaill").val();
      var password = $("#passwordl").val();

      fbShowLoading();
      if ((username.length > 0) && (password.length > 0)) {   
          $.ajax({
                type: 'GET',
                url: 'https://friendlybets-fluque.c9users.io:8081/api/usuario/'+username+'/'+password,
                dataType: 'json',
                contentType: 'application/json',
                success: function(rs) {
                    /*console.log(JSON.stringify(response));*/
                    /*console.log(response);*/
                    if (rs!=0) {
                        console.log("success");
                        $.ajax({
                              type: 'POST',
                              url: 'security/var_session.php',
                              //dataType: 'json',
                              //contentType: 'application/json',
                              data: {value : rs},
                            success: function(response){
                              //console.log("success");
                              //console.log(response);
                              location='security/iniciar_session.php';
                            },
                          error: function(xerror){
                              fbNotify('top','right','danger',xerror);
                          }
                        });
                    }else{
                      fbHideLoading();
                      fbNotify('top','right','danger','Usuario y/o Password Incorrectos.');
                    }
                },
                error: function(error) {
                    fbHideLoading();
                    if (error.status ==500) {
                        fbNotify('top','right','danger',"Usuario y/o Password Incorrectos.");
                    }else{
                      fbNotify('top','right','danger',error.responseJSON.message);
                    }
                    //console.log(error);
                    /*console.log(error);*/
                }
          });

      }else{
          fbHideLoading();
          fbNotify('top','right','info','Completar los campos de Email y/o Password.');
      }
  }



  function RegistrarUsuario(){
      /*http://localhost:8081/api/usuario/1*/
      /*https://friendlybets-fluque.c9users.io:8081/api/usuario/1*/
      fbShowLoading();
      if (($("#password").val().length > 0) && ($("#password2").val().length > 0) && ($("#password").val() == $("#password2").val())) {
        var user = {  nombre : $("#nombre").val(),
                        apellidos : $("#apellidos").val(),
                        celular : $("#celular").val(),
                        email : $("#email").val(),
                        password : $("#password").val() }

        $.ajax({
              type: 'POST',
              url: 'https://friendlybets-fluque.c9users.io:8081/api/usuario',
              dataType: 'json',
              contentType: 'application/json',
              data: JSON.stringify(user),
              success: function(response) {
                  //console.log(JSON.stringify(response));
                  location='index.php';
              },
              error: function( jqXHR, textStatus, errorThrown ) {

                if (jqXHR.status == 400) {
                    fbHideLoading();
                    for (var i = 0; i < jqXHR.responseJSON.errors.length; i++) {
                      fbNotify('top','right','danger', jqXHR.responseJSON.errors[i].defaultMessage);
                    }
                }
                if (jqXHR.status == 500) {
                    //console.log(jqXHR);
                    fbHideLoading();
                    fbNotify('top','right','danger', jqXHR.responseJSON.message);
                }
              }
        }); 
      }else{
          fbHideLoading();
          fbNotify('top','right','info', "Los password's ingresados son diferentes.");
      }     
  }

</script>