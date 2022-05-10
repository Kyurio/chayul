<?php
    require_once("../inc/header.php");
?>


<main class="mb-5">
  <div class="container-sm text-center mt-5">
      <div class="card form-signin">
          <div class="card-body">
              <form id="app" @submit="checkFormLogin" method="post" novalidate="true" class="">
                <img class="mb-4" src="<?=RUTA_URL?>assets/img/mono.svg" alt="" width="72" height="57">
                <h1 class="h3 mb-3 fw-normal">Ingresar</h1>

                <div class="form-floating">
                  <input type="email" v-model="mail_usuario" class="form-control" id="floatingInput"
                    placeholder="name@example.com">
                  <label for="floatingInput">Email address</label>
                  <small class="text-danger">{{mail_usuario_error}}</small>
                </div>
                <div class="form-floating">
                  <input type="password" v-model="password_usuario" class="form-control" id="floatingPassword"
                    placeholder="Password">
                  <label for="floatingPassword">Password</label>
                  <small class="text-danger">{{password_usuario_error}}</small>
                </div>

                <div class="checkbox mb-3">
                  <label>
                    <input type="checkbox" value="remember-me"> Remember me
                  </label>
                </div>
                <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
                <p class="mt-5 mb-3 text-muted">Desarrollos MonkeyCoder&copy; 2021–2022</p>
              </form>
            </div>
          </div>
      </div>
</main>

<?php
    require_once("../inc/footer.php");
?>
