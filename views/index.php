<?php
    require_once("../inc/header.php");

    session_start();
    if (!isset($_SESSION['usuario'])) {
        header ("location: login");
    }

?>

<div class="row">


    <div class="col-2">
        <div class="mt-5 mb-5 py-5 mx-5 p-5 ms-2">
            <div class="texto-vertical-3">
                <h2>
                    {{ titles }}
                </h2>
            </div>
        </div>
    </div>

    <div class="col-8">


        <section class="pt-5">
            <div class="container-sm">
                <div class="tab-content mx-5" id="v-pills-tabContent">


                    <!-- home -->
                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                        aria-labelledby="v-pills-home-tab">
                            <?php
                                require_once("../components/tabs/home.php");
                            ?>
                    </div>
                    <!-- end home -->

                    <!-- blog -->
                    <div class="tab-pane fade" id="v-pills-blog" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                        <?php
                                require_once("../components/tabs/blog.php");
                            ?>
                    </div>
                    <!-- end blog -->

                    <!-- productos -->
                    <div class="tab-pane fade" id="v-pills-productos" role="tabpanel"
                        aria-labelledby="v-pills-messages-tab">
                        <?php
                                require_once("../components/tabs/productos.php");
                            ?>
                    </div>
                    <!-- end productos -->

                    <!-- informacion -->
                    <div class="tab-pane fade" id="v-pills-informacion" role="tabpanel"
                        aria-labelledby="v-pills-settings-tab">
                        <?php
                                require_once("../components/tabs/informacion.php");
                            ?>
                    </div>
                    <!-- end informacion -->

                    <!-- clientes -->
                    <div class="tab-pane fade" id="v-pills-clientes" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                        <?php
                                require_once("../components/tabs/clientes.php");
                            ?>
                    </div>
                    <!-- end clientes -->

                    <!-- configuracion -->
                    <div class="tab-pane fade" id="v-pills-configuracion" role="tabpanel"
                        aria-labelledby="v-pills-settings-tab">
                        <?php
                                require_once("../components/tabs/configuracion.php");
                            ?>
                    </div>
                    <!-- end notificaciones -->

                    <!-- notificaciones -->
                    <div class="tab-pane fade" id="v-pills-notifiaciones" role="tabpanel"
                        aria-labelledby="v-pills-settings-tab">
                        <?php
                                require_once("../components/tabs/notificaciones.php");
                            ?>
                    </div>
                    <!-- end notificaciones -->

                    <!-- notificaciones -->
                    <div class="tab-pane fade" id="v-pills-mensajes" role="tabpanel"
                        aria-labelledby="v-pills-settings-tab">
                        <?php
                                require_once("../components/tabs/mensajes.php");
                            ?>
                    </div>
                    <!-- end notificaciones -->

                </div>
            </div>
        </section>


    </div>
    <div class="col-2">
        <?php
            require_once("../components/sidebar.php");
        ?>
    </div>


</div>


<?php
    require_once("../inc/footer.php");
?>
