<nav class="navbar navbar-expand-lg navbar-light bg-blue-glass">
      <div class="container-fluid">
        <a class="navbar-brand text-light" href="<?php echo base_url(); ?>/index">Glass Protech</a>
        <button class="navbar-toggler text-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <i class="navbar-toggler-icon fas fa-bars text-light"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav w-100 justify-content-between text-light">
            <div class="nav-item border-end border-start"></div>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdownMenuLink2" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Productos
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink2">
                <li><a class="dropdown-item" href="<?php echo base_url(); ?>/herramientas">Herramientas</a></li>
                <li><a class="dropdown-item" href="<?php echo base_url(); ?>/peliculas">Películas</a></li>
                <li><a class="dropdown-item" href="<?php echo base_url(); ?>/productos">Todos los productos</a></li>
              </ul>
            </li>

            <!-- <li class="nav-item">
              <a class="nav-link text-light" href="<?php echo base_url(); ?>/peliculas">Películas</a>
            </li> -->

            <div class="nav-item border-end border-start"></div>
<!-- 
            <li class="nav-item">
              <a class="nav-link text-light" href="<?php echo base_url(); ?>/herramientas">Herramientas</a>
            </li> -->

            <!-- <div class="nav-item border-end border-start"></div> -->

            <li class="nav-item">
              <a class="nav-link text-light" href="<?php echo base_url(); ?>/contacto">Contacto</a>
            </li>

            <div class="nav-item border-end border-start"></div>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Más contenido
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <li><a class="dropdown-item" href="<?php echo base_url(); ?>/aprende">Aprende más</a></li>
                <li><a class="dropdown-item" href="<?php echo base_url(); ?>/distribuidores">Distribuidores</a></li>
                <li><a class="dropdown-item" href="<?php echo base_url(); ?>/productos_marcas">Productos y marcas</a></li>
                <li><a class="dropdown-item" href="<?php echo base_url(); ?>/servicio">Servicio</a></li>
                <li><a class="dropdown-item" href="<?php echo base_url(); ?>/soporte">Soporte</a></li>
                <li><a class="dropdown-item" href="<?php echo base_url(); ?>/nosotros">¿Quiénes somos?</a></li>
              </ul>
            </li>

            <div class="nav-item border-end border-start"></div>

            <li class="nav-item dropdown" id="perfil-button" style="display: none">
              <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span id="sesion_text_span2">PERFIL</span>
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="<?php echo base_url(); ?>/userdata">Mis datos</a>
                <a class="dropdown-item" href="" id="admin-link2" style="display: none;">Administrador</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?php echo base_url(); ?>/cerrar">Cerrar sesión</a>
              </div>
            </li>

            <li class="nav-item" id="sesion-button" style="display: block;">
              <a class="nav-link text-light" href="<?php echo base_url(); ?>/login"><i class="fas fa-user"></i> Iniciar Sesión</a>
            </li>

            <div class="nav-item border-end border-start"></div>

            <li class="nav-item">
              <a class="nav-link text-light" href="<?php echo base_url(); ?>/carrito"><i class="fas fa-shopping-cart"></i> Carrito</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
<!-- <nav class="navbar navbar-expand-lg ">
  <a class="navbar-brand" href="<?php echo base_url(); ?>/">GLASS PROTECH</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon" style="color: #fafafa;"><i class="fas fa-bars"></i></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active col">
        <a class="nav-link" href="<?php echo base_url(); ?>/peliculas">Películas</a>
      </li>
      <li class="nav-item active col">
        <a class="nav-link" href="<?php echo base_url(); ?>/herramientas">Herramientas</a>
      </li> 
      <li class="nav-item active col">
        <a class="nav-link" href="<?php echo base_url(); ?>/servicio">Servicio</a>
      </li>
      <li class="nav-item active col">
        <a class="nav-link" href="<?php echo base_url(); ?>/distribuidores">Distribuidores</a>
      </li>
      <li class="nav-item active col">
        <a class="nav-link" href="<?php echo base_url(); ?>/contacto">Contacto</a>
      </li>
      
      <li class="dropdown active col">
        <a class="nav-link dropdown-toggle" href="" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span>Más contenido</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
          <a class="dropdown-item" href="<?php echo base_url(); ?>/soporte">Soporte</a>
          <a class="dropdown-item" href="<?php echo base_url(); ?>/aprende">Aprende más</a>
          <a class="dropdown-item" href="<?php echo base_url(); ?>/nosotros">¿Quiénes somos?</a>
          <a class="dropdown-item" href="<?php echo base_url(); ?>/productos_marcas">Productos y marcas</a>
        </div>
      </li>

      <li class="dropdown active col" id="perfil-button" style="display: none">
        <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span id="sesion_text_span2">PERFIL</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?php echo base_url(); ?>/userdata">DATOS</a>
          <a class="dropdown-item" href="" id="admin-link2" style="display: none;">ADMINISTRADOR</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="<?php echo base_url(); ?>/cerrar">CERRAR SESION</a>
        </div>
      </li>
      <li class="nav-item active col" id="sesion-button">
        <a class="nav-link" href="<?php echo base_url(); ?>/login"><i class="fas fa-user"></i> Iniciar Sesión</a>
      </li>
      <li class="nav-item active col">
        <a class="nav-link" href="<?php echo base_url(); ?>/carrito"><i class="fas fa-shopping-cart"></i></a>
      </li>
  </div>
</nav> -->

<body>