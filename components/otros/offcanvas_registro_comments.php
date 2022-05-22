<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRegistrComentarios" aria-labelledby="offcanvasRightLabel">
    <div class="container mx-4 py-4">

        <div class="offcanvas-header">
            <h3 class="fw-bold mb-4">Comentarios</h3>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <?php
                require_once("../components/forms/form_comments.php");
            ?>
        </div>
    </div>
</div>
