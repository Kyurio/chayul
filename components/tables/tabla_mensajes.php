
<div >
    <div class="d-flex bd-highlight">
        <div class="p-2 w-100 bd-highlight">
            <h3 class="fw-bold mb-3">Nosotros</h3>
        </div>
        <div class="p-2 flex-shrink-1 bd-highlight">
            <button class="btn btn-dark" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRegistroAbout" aria-controls="offcanvasRight"><i class="fa-duotone fa-plus"></i></button>
        </div>
    </div>
    <div class="" v-for="(item, index) in mensajes" class="list-group" v-show="(pag - 1) * num_results <= index  && pag * num_results > index">
        <li class="list-group-item d-flex justify-content-between align-items-start py-3 mb-2 align-middle">
            <div class="d-flex align-items-center">
                <div class="flex-shrink-0">
                    <div>
                        <i class="fa-solid fa-file"></i>
                    </div>
                </div>
                <div class="flex-grow-1 ms-3">
                    {{ item.nombre }}
                </div>
                <div class="flex-grow-1 ms-3">
                    {{ item.asunto }}
                </div>
            </div>
            <div class="d-flex align-items-center ms-auto mt-2">
                <div class="flex-shrink-0">
                    <div class="form-check form-switch" v-if="item.estado == 1">
                        <label class="switch">
                            <input type="checkbox" @click="CambiarEstadoAbout(item.id_quienes_somos)" checked>
                            <div>
                                <span></span>
                            </div>
                        </label>
                    </div>
                    <div class="form-check form-switch" v-else>
                        <label class="switch">
                            <input type="checkbox" @click="CambiarEstadoAbout(item.id_quienes_somos)">
                            <div>
                                <span></span>
                            </div>
                        </label>
                    </div>
                </div>
                <div class="flex-shrink-0">
                    <div>

                        <button class="btn btn-sm" data-bs-toggle="offcanvas" data-bs-target="#EditarTipoEvento" aria-controls="EditarTipoEvento">
                            <i class="fa-solid fa-pen"></i>
                        </button>
                        <button class="btn btn-sm" @click="EliminarAbout(item.id_quienes_somos)">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </div>
                </div>
            </div>
        </li>
    </div>
</div>

<!-- paginador -->
<div class="d-flex bd-highlight mb-3">
  <div class="ms-auto bd-highlight">
    <button class="btn btn-outline-dark btn-sm" href="#" aria-label="Previous" v-show="pag != 1" @click.prevent="pag -= 1">
      <span aria-hidden="true"> anterior </span>
    </button>
    <button class="btn btn-outline-dark btn-sm" href="#" aria-label="Next" v-show="pag * num_results / mensajes.length < 1" @click.prevent="pag += 1">
      <span aria-hidden="true"> siguiente </span>
    </button>
  </div>
</div>
<!-- end paginador -->
