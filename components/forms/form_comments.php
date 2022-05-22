<div class="container">
    <div class="py-5 mx-5">

        <!-- <form id="app" @submit="GrabarPost" method="post" novalidate="true"> -->

            <div class="form-floating mb-4">
              <input type="text" class="form-control" v-model="cliente">
              <label for="floatingPassword">Cliente</label>
            </div>

            <div class="form-floating mb-4">
              <textarea class="form-control"  v-model="comentario"></textarea>
              <label for="floatingTextarea2">Comentario</label>
            </div>

            <div class="form-floating mb-4">
                <div class="d-flex flex-row-reverse bd-highlight">
                    <button  @click="GrabarComments" class="btn btn-dark">Grabar</button>
                </div>
            </div>

        <!-- </form> -->

    </div>
</div>
