    <div class="wrapper">
        <div class="sidebar" data-image="<?php echo base_url(); ?>/assets/img/sidebar-5.jpg" data-color="blue">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

        Tip 2: you can also add an image using data-image tag
    -->
            <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="javascript:;" class="simple-text">
                      Glass Protech
                    </a>
                </div>
                <ul class="nav">

                    <li class="nav-item active">
                        <a class="nav-link" data-toggle="collapse" href="#collapseVentas" role="button" aria-expanded="false" aria-controls="collapseVentas">
                            <i class="nc-icon nc-icon nc-credit-card"></i>
                            <p>Ventas</p>
                        </a>
                    </li>
                    <div class="collapse" id="collapseVentas">
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url(); ?>/ventas/ventas">
                                <p>Ventas</p>
                            </a>
                        </li>
                    </div>
                    

                    <li class="nav-item active">
                        <a class="nav-link" data-toggle="collapse" href="#collapseInventario" role="button" aria-expanded="false" aria-controls="collapseInventario">
                            <i class="nc-icon nc-icon nc-notes"></i>
                            <p>Inventario</p>
                        </a>
                    </li>
                    <div class="collapse" id="collapseInventario">
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url(); ?>/inventario/productos">
                                <p>Productos</p>
                            </a>
                        </li> <!--
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url(); ?>/inventario/categorias">
                                <p>Categorías</p>
                            </a>
                        </li> -->
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url(); ?>/inventario/carrusel">
                                <p>Carrusel</p>
                            </a>
                        </li>
                    </div>

                    <li class="nav-item active">
                        <a class="nav-link" data-toggle="collapse" href="#collapsePlataforma" role="button" aria-expanded="false" aria-controls="collapsePlataforma">
                            <i class="nc-icon nc-icon nc-single-02"></i>
                            <p>Plataforma</p>
                        </a>
                    </li>
                    <div class="collapse" id="collapsePlataforma">
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url(); ?>/plataforma/usuarios">
                                <p>Usuarios</p>
                            </a>
                        </li><!--
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url(); ?>/plataforma/popup">
                                <p>Popup</p>
                            </a>
                        </li> --> <!--
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url(); ?>/plataforma/carrusel">
                                <p>Carrusel</p>
                            </a>
                        </li> -->
                    </div>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg " color-on-scroll="500">
                <div class="container-fluid">
                    <a class="navbar-brand" id="nav-brand">Administración</a>
                    <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="http://store.glassprotech.com.mx/">
                                    <span class="no-icon">Ir a tienda</span>
                                </a>
                            </li>
                            <li class="nav-item" id="cerrar-li" style="display: none;">
                                <a class="nav-link" href="<?php echo base_url(); ?>/cerrar">
                                    <span class="no-icon">Cerrar sesión</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->