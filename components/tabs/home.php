<!-- welcome -->
<section>
    <div class="p-3 mb-2 bg-light rounded">
        <div class="container-fluid py-2 mx-4">
            <div class="row">
                <div class="col-4">
                    <h1 class="display-5 fw-bold">Bienvenido</h1>
                    <p class="col-md-8 fs-4"><?= $_SESSION['usuario'] ?></p>
                </div>
                <div class="col-6">
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
            <button class="btn btn-outline-dark active me-2" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-posts"
                    type="button" role="tab" aria-controls="pills-posts" aria-selected="true">
                Ultimas Entrada
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button type="button" class="btn btn-outline-dark me-2 position-relative" id="pills-mensajes-tab" data-bs-toggle="pill"
                    data-bs-target="#pills-mensajes" type="button" role="tab" aria-controls="pills-mensajes" aria-selected="false">
                Mensajes <span class="position-absolute top-0 start-100 translate-middle badge border border-light rounded-circle bg-danger p-2">{{  cantidad_mensajes }}</span>
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="btn btn-outline-dark me-2" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact"
                    type="button" role="tab" aria-controls="pills-contact" aria-selected="false">
                Estadisticas
            </button>
        </li>
    </ul>

    <div class="tab-content" id="pills-tabContent">

        <div class="tab-pane fade show active" id="pills-posts" role="tabpanel" aria-labelledby="pills-posts-tab">

            <!-- listado ultimas entradadas -->
            <ol class="list-group list-group-numbered" v-for="(item, index) in posts" v-show="(pag - 1) * num_results_home <= index  && pag * num_results_home > index">
              <li class="list-group-item d-flex justify-content-between align-items-start mb-2">
                <div class="ms-2 me-auto">
                  <div class="fw-bold">{{item.titulo}}</div>
                  Content for list item
                </div>
                <span class="badge bg-primary rounded-pill">14</span>
              </li>
            </ol>
            <!-- end lidtado ultimas entradas -->

            <!-- paginador -->
            <div class="d-flex bd-highlight mb-3">
              <div class="ms-auto bd-highlight">
                <button class="btn btn-outline-dark btn-sm" href="#" aria-label="Previous" v-show="pag != 1" @click.prevent="pag -= 1">
                  <span aria-hidden="true"> anterior </span>
                </button>
                <button class="btn btn-outline-dark btn-sm" href="#" aria-label="Next" v-show="pag * num_results_home / posts.length < 1" @click.prevent="pag += 1">
                  <span aria-hidden="true"> siguiente </span>
                </button>
              </div>
            </div>
            <!-- end paginador -->

        </div>

        <div class="tab-pane fade" id="pills-mensajes" role="tabpanel" aria-labelledby="pills-profile-tab">

            <!-- listado ultimas entradadas -->
            <ol class="list-group list-group-numbered" v-for="(item, index) in mensajes" v-show="(pag - 1) * num_results_home <= index  && pag * num_results_home > index">
              <li class="list-group-item d-flex justify-content-between align-items-start mb-2">
                <div class="ms-2 me-auto">
                  <div class="fw-bold">{{ item.asunto }}</div>
                    {{ item.mensaje }}
                </div>
                <span class="badge bg-primary rounded-pill">14</span>
              </li>
            </ol>
            <!-- end lidtado ultimas entradas -->

            <!-- paginador -->
            <div class="d-flex bd-highlight mb-3">
              <div class="ms-auto bd-highlight">
                <button class="btn btn-outline-dark btn-sm" href="#" aria-label="Previous" v-show="pag != 1" @click.prevent="pag -= 1">
                  <span aria-hidden="true"> anterior </span>
                </button>
                <button class="btn btn-outline-dark btn-sm" href="#" aria-label="Next" v-show="pag * num_results_home / mensajes.length < 1" @click.prevent="pag += 1">
                  <span aria-hidden="true"> siguiente </span>
                </button>
              </div>
            </div>
            <!-- end paginador -->


        </div>

        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
            conta
        </div>
    </div>

</section>

<section>

    <div class="row">
        <div class="col">
            <div class="card mt-5" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Cantidad De visitas</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="card-link">Card link</a>
                    <a href="#" class="card-link">Another link</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card mt-5" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Posibles Clientes</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="card-link">Card link</a>
                    <a href="#" class="card-link">Another link</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card mt-5" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Posibles Clientes</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="card-link">Card link</a>
                    <a href="#" class="card-link">Another link</a>
                </div>
            </div>
        </div>

    </div>


</section>
