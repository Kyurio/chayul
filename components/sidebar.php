<div class="d-flex flex-column flex-shrink-0 ms-auto sidebar position-absolute top-0 end-0">

  <ul class="nav nav-pills nav-flush flex-column mb-auto text-center" id="v-pills-tab" role="tablist"
    aria-orientation="vertical">

    <li class="nav-item mt-4 mb-5">
      <div class="d-flex justify-content-center ">
        <img src="<?= RUTA_URL ?>assets/img/mono.svg" class="img-fluid logo" alt="monkeycoder.cl">
      </div>
    </li>

    <li class="nav-item mb-3">
      <a class="nav-link" class="btn  active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home"
        role="tab" aria-controls="v-pills-home" aria-selected="true">
        <i class="fa-solid fa-house"></i>
        <span class="title-nav fw-bold">Home</span>
      </a>
    </li>

    <li class="nav-item mb-3">
      <a class="nav-link" id="v-pills-blog-tab" data-bs-toggle="pill" data-bs-target="#v-pills-blog" role="tab"
        aria-controls="v-pills-blog" aria-selected="false">
        <i class="fa-solid fa-file-circle-plus"></i>
        <span class="title-nav fw-bold">Blog</span>
      </a>
    </li>

    <li class="nav-item mb-3">
      <a class="nav-link" id="v-pills-productos-tab" data-bs-toggle="pill" data-bs-target="#v-pills-productos"
        role="tab" aria-controls="v-pills-productos" aria-selected="false">
        <i class="fa-solid fa-bag-shopping"></i>
        <span class="title-nav fw-bold">Productos</span>
      </a>
    </li>

    <li class="nav-item mb-3">
      <a class="nav-link" class="btn" id="v-pills-informacion-tab" data-bs-toggle="pill"
        data-bs-target="#v-pills-informacion" role="tab" aria-controls="v-pills-informacion" aria-selected="false">
        <i class="fa-solid fa-info icon"></i>

        <div class="d-flex">
 <div class="p-2 flex-shrink-1"><span class="title-nav fw-bold"><i class="fa-solid fa-info"></i></span></div>
          <div class="p-2 w-100"><span class="title-nav fw-bold">Nosotros</span></div>

        </div>

      </a>
    </li>

    <li class="nav-item mb-3">
      <a class="nav-link" id="v-pills-clientes-tab" data-bs-toggle="pill" data-bs-target="#v-pills-clientes" role="tab"
        aria-controls="v-pills-clientes" aria-selected="false">
        <i class="fa-solid fa-comments"></i>
        <span class="title-nav fw-bold">Commentarios</span>
      </a>
    </li>

    <li class="nav-item mb-3">
      <a class="nav-link" id="v-pills-configuracion-tab" data-bs-toggle="pill" data-bs-target="#v-pills-configuracion"
        role="tab" aria-controls="v-pills-configuracion" aria-selected="false">
        <i class="fa-solid fa-gear"></i>
        <span class="title-nav fw-bold">Configuracion</span>
      </a>
    </li>

    <li class="nav-item mb-3">
      <a class="nav-link" id="v-pills-configuracion-tab" data-bs-toggle="pill" data-bs-target="#v-pills-mensajes"
        role="tab" aria-controls="v-pills-configuracion" aria-selected="false">
        <i class="fa-solid fa-envelope"></i>
        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
            {{cantidad_mensajes}}
        </span>
        <span class="title-nav fw-bold">Mensajes</span>
      </a>
    </li>



  </ul>

  <div class="d-flex justify-content-center mb-3">
    <a class="nav-link" class="btn ">
      <i class="fa-solid fa-bell notificacion"></i>
    </a>
  </div>

</div>
