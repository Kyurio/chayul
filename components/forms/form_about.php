<div class="container">
    <div class="py-5 mx-5">

        <!-- <form id="app" @submit="GrabarPost" method="post" novalidate="true"> -->

            <div class="form-floating mb-4">
              <input type="text" class="form-control" v-model="titulo_quienes_somos">
              <label for="floatingPassword">Titulo</label>
            </div>

            <div class="form-floating mb-4">
              <textarea class="form-control"  v-model="detalle_quienes_somos"></textarea>
              <label for="floatingTextarea2">detalle</label>
            </div>

            <div class="form-floating mb-4">
                <div class="d-flex flex-row-reverse bd-highlight">
                    <button  @click="GrabarAbout" class="btn btn-dark">Grabar</button>
                </div>
            </div>

        <!-- </form> -->

    </div>
</div>
