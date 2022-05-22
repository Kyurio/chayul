<div class="container">
    <div class="py-5 mx-5">

        <!-- <form id="app" @submit="GrabarPost" method="post" novalidate="true"> -->

            <div class="form-floating mb-4">
              <input type="text" class="form-control" v-model="titulo_blog">
              <label for="floatingPassword">Titulo</label>
            </div>

            <div class="form-floating mb-4">
              <textarea class="form-control"  v-model="detalle_blog"></textarea>
              <label for="floatingTextarea2">Post</label>
            </div>

            <div class="form-floating mb-4">
              <input type="file" class="form-control">
              <label for="floatingTextarea2">Imagen</label>
            </div>

            <div class="form-floating mb-4">
              <input type="text" class="form-control" v-model="etiquetas_blog">
              <label for="floatingPassword">Etiquetas</label>
            </div>

            <div class="form-floating mb-4">
                <div class="d-flex flex-row-reverse bd-highlight">
                    <button  @click="GrabarPost" class="btn btn-dark">Grabar</button>
                </div>
            </div>

        <!-- </form> -->

    </div>
</div>
