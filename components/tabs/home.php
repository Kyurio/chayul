<!-- welcome -->
<section>
    <div class="p-5 mb-4 bg-light rounded">
        <div class="container-fluid py-4 mx-4">
            <div class="row">
                <div class="col">
                    <h1 class="display-5 fw-bold">Bienvenido</h1>
                    <p class="col-md-8 fs-4"><?= $_SESSION['usuario'] ?></p>
                </div>
                <div class="col">
                    <img src="<?= RUTA_URL ?>assets/img/undraw_freelancer_re_irh4.svg" width="400vw" height="200vh" alt="">
                </div>
            </div>

        </div>
    </div>
</section>

<!-- sections tabs -->
<section>
    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="btn btn-outline-dark active me-2" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Ultimas Entrada</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="btn btn-outline-dark me-2" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Mensajes</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="btn btn-outline-dark me-2" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Estadisticas</button>
        </li>
    </ul>
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">

            <!-- listado ultimas entradadas -->
            <ol class="list-group list-group-numbered">
              <li class="list-group-item d-flex justify-content-between align-items-start mb-2">
                <div class="ms-2 me-auto">
                  <div class="fw-bold">Subheading</div>
                  Content for list item
                </div>
                <span class="badge bg-primary rounded-pill">14</span>
              </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start mb-2">
                <div class="ms-2 me-auto">
                  <div class="fw-bold">Subheading</div>
                  Content for list item
                </div>
                <span class="badge bg-primary rounded-pill">14</span>
              </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start mb-2">
                <div class="ms-2 me-auto">
                  <div class="fw-bold">Subheading</div>
                  Content for list item
                </div>
                <span class="badge bg-primary rounded-pill">14</span>
              </li>
            </ol>
            <!-- end lidtado ultimas entradas -->

        </div>
        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">...</div>
        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">...</div>
    </div>
</section>
