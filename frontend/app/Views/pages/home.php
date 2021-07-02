<!-- Home Body -->
<div class="container-fluid" style="padding: 0; position: relative;">
	<div style="position: absolute; top: 0; bottom: 0; left: 0; right: 0; height: 100%; z-index: -100;" id="particles-js"></div>
	<!-- === Hero Section === -->
	<div class="home-hero row" style="--bs-gutter-x: 0;">
		<div class="col-12">
			<img class="img-fluid" src="<?php echo base_url();?>/assets/img/home/home-banner.png" alt="">
		</div>
	</div>

	<!-- === Productos destacados === -->
	<div class="productos-destacados row">
		<!-- Título -->
		<div class="col-12 p-md-5 p-4">
			<a href="<?php echo base_url(); ?>/peliculas">
				<img src="<?php echo base_url();?>/assets/img/home/btn-destacados.png" class="img-fluid" role="button" alt="Un botón de los productos destacados">
			</a>
		</div>

		<!-- Carrusel -->
		<div class="col-12">
			<div id="carouselExampleIndicators" class="carousel slide carousel-dark slide p-5" data-bs-ride="carousel">

				<!-- Páginas del carrusel -->
				<div class="carousel-inner" id="carouselAllPages">

				</div>
				<!-- End Páginas de Carrusel -->

				<!-- Controles Carrusel -->
				<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"  data-bs-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="visually-hidden">Previous</span>
				</button>
				<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"  data-bs-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="visually-hidden">Next</span>
				</button>
				<!-- Fin Controles Carrusel -->
			</div>
		</div>
		<!-- Fin Carrusel -->
	</div>
	<!-- Fin Productos -->

	<!-- === Productos ===  -->
	<div class="home-productos row p-md-5 p-4">
		<!-- Título -->
		<div class="col-12 mb-4">
			<a href="<?php echo base_url(); ?>/productos_marcas">
				<img src="<?php echo base_url();?>/assets/img/home/btn-productos.png" role="button" alt="Un botón de los productos vendidos en la plataforma" class="img-fluid">
			</a>
		</div>
		
		<!-- Tipos de películas -->
		<div class="home-peliculas row mt-5">

			<div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
				<div class="card shadow rounded p-2">
					<h3 style="height: 70px" class="text-center text-uppercase text-primary d-flex justify-content-center align-items-center">Películas de seguridad</h3>
					<figure class="figure">
						<img src="<?php echo base_url();?>/assets/img/home/home-seguridad.png" class="figure-img img-fluid rounded" alt="Imagen ilustrativa de películas de seguridad donde se observan cristales con películas de seguridad.">
						<figcaption class="fw-bold text-center">Para vidrios más resistentes e inastillables.</figcaption>
					</figure>			
				</div>
			</div>

			<div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
				<div class="card shadow rounded p-2">
					<h3 style="height: 70px" class="text-center text-uppercase text-primary d-flex justify-content-center align-items-center">Películas de control solar</h3>
					<figure class="figure">
						<img src="<?php echo base_url();?>/assets/img/home/home-control-solar.png" class="figure-img img-fluid rounded" alt="Imagen ilustrativa de películas de seguridad donde se observan cristales con películas de seguridad.">
						<figcaption class="fw-bold text-center">Para vidrios más resistentes e inastillables.</figcaption>
					</figure>			
				</div>
			</div>

			<div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
				<div class="card shadow rounded p-2">
					<h3 style="height: 70px" class="text-center text-uppercase text-primary d-flex justify-content-center align-items-center">Películas decorativas</h3>
					<figure class="figure">
						<img src="<?php echo base_url();?>/assets/img/home/home-decorativas.png" class="figure-img img-fluid rounded" alt="Imagen ilustrativa de películas de seguridad donde se observan cristales con películas de seguridad.">
						<figcaption class="fw-bold text-center">Para vidrios más resistentes e inastillables.</figcaption>
					</figure>			
				</div>
			</div>

			<div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
				<div class="card shadow rounded p-2">
					<h3 style="height: 70px" class="text-center text-uppercase text-primary d-flex justify-content-center align-items-center">Herramienta</h3>
					<figure class="figure">
						<img src="<?php echo base_url();?>/assets/img/home/home-herramientas.png" class="figure-img img-fluid rounded" alt="Imagen ilustrativa de películas de seguridad donde se observan cristales con películas de seguridad.">
						<figcaption class="fw-bold text-center">Para vidrios más resistentes e inastillables.</figcaption>
					</figure>			
				</div>
			</div>

		</div>
		<!-- Fin Tipos de películas -->

		<!-- Tipos de líneas -->
		<div class="home-productos-lineas row mt-5">

		<div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 rounded pt-3 mb-4">
				<div class="linea-card card shadow rounded p-2">
					<h3 style="height: 62px;" class="text-center text-uppercase text-primary d-flex justify-content-center align-items-center">Línea High Performance</h3>
					<figure class="figure w-100 text-center">
						<img src="<?php echo base_url();?>/assets/img/home/logo-coatec.png" class="figure-img img-fluid rounded" alt="Imagen ilustrativa de películas de seguridad donde se observan cristales con películas de seguridad.">
						<figcaption class="fw-bold text-center text-uppercase">Garantía de 5 a 10 años</figcaption>
					</figure>	
				</div>
			</div>

			<div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 rounded pt-3 mb-4">
				<div class="linea-card card shadow rounded p-2">
					<h3 style="height: 62px;" class="text-center text-uppercase text-primary d-flex justify-content-center align-items-center">Línea estándar</h3>
					<figure class="figure w-100 text-center">
						<img src="<?php echo base_url();?>/assets/img/home/logo-solartech.png" class="figure-img img-fluid rounded" alt="Imagen ilustrativa de películas de seguridad donde se observan cristales con películas de seguridad.">
						<figcaption class="fw-bold text-center text-uppercase">Garantía de 1 a 3 años</figcaption>
					</figure>	
				</div>
			</div>

			<div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 rounded pt-3 mb-4">
				<div class="linea-card card shadow rounded p-2">
					<h3 style="height: 62px;" class="text-center text-uppercase text-primary d-flex justify-content-center align-items-center">Línea convencional</h3>
					<figure class="figure w-100 text-center">
						<img src="<?php echo base_url();?>/assets/img/home/logo-equinox.png" class="figure-img img-fluid rounded" alt="Imagen ilustrativa de películas de seguridad donde se observan cristales con películas de seguridad.">
						<figcaption class="fw-bold text-center text-uppercase">Garantía de 3 a 5 años</figcaption>
					</figure>	
				</div>
			</div>

		</div>
		<!-- Fin tipos de líneas -->
	</div>
	<!-- Fin Productos -->

	<!-- === Servicios === -->
	<div class="home-servicios row p-md-5 p-4">
		<!-- Título -->
		<div class="col-12 mb-4">
			<a href="<?php echo base_url(); ?>/servicio">
				<img src="<?php echo base_url();?>/assets/img/home/btn-servicios.png" role="button" alt="Un botón de servicios" class="img-fluid">
			</a>
		</div>

		<div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 home-servicios-card rounded pt-3 mb-4">
			<div class="card shadow rounded p-2">
				<h3 style="height: 60px;" class="text-center text-uppercase text-primary d-flex align-items-center justify-content-center">Capacitación</h3>
				<figure class="figure text-center">
					<img src="<?php echo base_url();?>/assets/img/home/home-servicios-capacitacion.png" class="figure-img img-fluid rounded w-50" alt="Icono que muestra una persona capacitando mostrando contenido en un pizarrón.">
					<figcaption class="fw-bold text-center">Aprende todo para ser un profesional del polarizado.</figcaption>
				</figure>
			</div>
		</div>

		<div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 home-servicios-card rounded pt-3 mb-4">
			<div class="card shadow rounded p-2">
				<h3 style="height: 60px;" class="text-center text-uppercase text-primary d-flex align-items-center justify-content-center">Atendemos en todo México</h3>
				<figure class="figure text-center">
					<img src="<?php echo base_url();?>/assets/img/home/home-servicios-republica.png" class="figure-img img-fluid rounded w-50" alt="Icono que muestra un mapa de la república mexicana.">
					<figcaption class="fw-bold text-center">Hacemos envíos a toda la República Mexicana.</figcaption>
				</figure>	
			</div>
		</div>

		<div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 home-servicios-card rounded pt-3 mb-4">
			<div class="card shadow rounded p-2">
				<h3 style="height: 60px;" class="text-center text-uppercase text-primary d-flex align-items-center justify-content-center">Conviértete en distribuidor</h3>
				<figure class="figure text-center">
					<img src="<?php echo base_url();?>/assets/img/home/home-servicios-distribuidor.png" class="figure-img img-fluid rounded w-50" alt="Icono que muestra una persona con conexiones a distintas áreas para simbolizar un distribuidor.">
					<figcaption class="fw-bold text-center">Arranca o amplía tu negocio distribuyendo nuestros productos.</figcaption>
				</figure>	
			</div>
		</div>

		<div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 home-servicios-card rounded pt-3 mb-4">
			<div class="card shadow rounded p-2">
				<h3 style="height: 60px;" class="text-center text-uppercase text-primary d-flex align-items-center justify-content-center">Soporte</h3>
				<figure class="figure text-center">
					<img src="<?php echo base_url();?>/assets/img/home/home-servicios-soporte.png" class="figure-img img-fluid rounded w-50" alt="Icono que muestra una persona con audífonos y micrófono para brindar soporte telefónico.">
					<figcaption class="fw-bold text-center">Servicio y atención personalizada. Diferentes tipos de pago.</figcaption>
				</figure>	
			</div>
		</div>
	</div>
	<!-- Fin Servicios -->

	<!-- === Aprende más === -->
	<div class="home-aprende row p-md-5 p-4">
		<!-- Título -->
		<div class="col-12 mb-4">
			<a href="<?php echo base_url(); ?>/aprende">
				<img src="<?php echo base_url();?>/assets/img/home/btn-aprende-mas.png" role="button" alt="Un botón de la sección de aprende más." class="img-fluid">
			</a>
		</div>
		<div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 d-flex align-items-center">
			<h3 class="text-center text-uppercase text-primary">¿Deseas convertirte en un máster del mundo del polarizado y películas para cristales?</h3>
		</div>
		<div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
			<img src="<?php echo base_url();?>/assets/img/home/home-aprende-mas.png" alt="Imagen representativa de la sección aprende más en la que se observa una mano limpiando un cristal de automóvil." class="img-fluid">
		</div>
	</div>
	<!-- Fin Aprende más -->

	<!-- Preguntas frecuentes -->
	<div class="home-faqs row p-md-5 p-4">
		<!-- Título -->
		<div class="col-12 mb-4">
			<img src="<?php echo base_url();?>/assets/img/home/btn-faqs.png" role="button" alt="Un botón de la sección de aprende más." class="img-fluid">
		</div>

		<!-- Preguntas desplegables -->
		<div class="accordion" id="accordionExample" style="background-color: #fff;">
			<div class="accordion-item">
				<h2 class="accordion-header" id="headingOne">
					<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
						¿Qué tipo de polarizado tienes?
					</button>
				</h2>
				<div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
					<div class="accordion-body">
						Seguridad,control solar, decorativas y especiales. 
					</div>
				</div>
			</div>
			<div class="accordion-item">
				<h2 class="accordion-header" id="headingTwo">
					<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
						¿Cuánto miden los rollos?
					</button>
				</h2>
				<div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
					<div class="accordion-body">
						50 cm, 75cm, 1m, 1.52m y 1.83m
					</div>
				</div>
			</div>
			<div class="accordion-item">
				<h2 class="accordion-header" id="headingThree">
					<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
						¿Hacen envíos a domicilio?
					</button>
				</h2>
				<div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
					<div class="accordion-body">
						Hacemos envíos a todo México hasta las puertas de tu hogar o negocio.
					</div>
				</div>
			</div>

			<div class="accordion-item">
				<h2 class="accordion-header" id="headingFour">
					<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
						¿Envías a toda la República Mexicana?
					</button>
				</h2>
				<div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
					<div class="accordion-body">
						Hacemos envíos a todo México hasta las puertas de tu hogar o negocio.
					</div>
				</div>
			</div>

			<div class="accordion-item">
				<h2 class="accordion-header" id="headingFive">
					<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
						¿Manejas muestrario?
					</button>
				</h2>
				<div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
					<div class="accordion-body">
						Claro, contáctanos por cualquier medio y con gusto te lo enviamos. 
					</div>
				</div>
			</div>

			<div class="accordion-item">
				<h2 class="accordion-header" id="headingSix">
					<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
						¿Pueden ayudarme a instalar?
					</button>
				</h2>
				<div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#accordionExample">
					<div class="accordion-body">
						En nuestro equipo se encuentran expertos polarizadores para ayudarte en cualquier proyecto.
					</div>
				</div>
			</div>

			<div class="accordion-item">
				<h2 class="accordion-header" id="headingSeven">
					<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
						¿Manejas película 3M?
					</button>
				</h2>
				<div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven" data-bs-parent="#accordionExample">
					<div class="accordion-body">
						Sí, bajo pedido. Distribuimos la marca Coatec, misma calidad, menor precio.
					</div>
				</div>
			</div>

			<div class="accordion-item">
				<h2 class="accordion-header" id="headingEight">
					<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
						¿Cuál es su garantía?
					</button>
				</h2>
				<div id="collapseEight" class="accordion-collapse collapse" aria-labelledby="headingEight" data-bs-parent="#accordionExample">
					<div class="accordion-body">
						Línea estándar: 1 a 3 años, línea convencional: 3 a 5 años y línea high performance de 5 a 10 años.
					</div>
				</div>
			</div>

			<div class="accordion-item">
				<h2 class="accordion-header" id="headingNine">
					<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
						¿De dónde es la marca?
					</button>
				</h2>
				<div id="collapseNine" class="accordion-collapse collapse" aria-labelledby="headingNine" data-bs-parent="#accordionExample">
					<div class="accordion-body">
						Coatec y Equinox son marcas estadounidenses, mientras Solar Tech es 100% mexicana.
					</div>
				</div>
			</div>

			<div class="accordion-item">
				<h2 class="accordion-header" id="headingTen">
					<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
						¿Cuál es el tiempo que tienen en el mercado?
					</button>
				</h2>
				<div id="collapseTen" class="accordion-collapse collapse" aria-labelledby="headingTen" data-bs-parent="#accordionExample">
					<div class="accordion-body">
						Llevamos 20 años distribuyendo todo para polarizados.
					</div>
				</div>
			</div>

			<div class="accordion-item">
				<h2 class="accordion-header" id="headingEleven">
					<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEleven" aria-expanded="false" aria-controls="collapseEleven">
						¿El producto es solo automotriz?
					</button>
				</h2>
				<div id="collapseEleven" class="accordion-collapse collapse" aria-labelledby="headingEleven" data-bs-parent="#accordionExample">
					<div class="accordion-body">
						No, las películas que distribuimos pueden instalarse en cualquier ambiente acristalado.
					</div>
				</div>
			</div>

		</div>
		<!-- Fin Preguntas desplegables -->

	</div>
	<!-- Fin Preguntas Frecuentes -->
</div>
<!-- Fin Home Body -->

<!-- <div class="section-separer"></div>

<div class="inner-section">
	<img src="<?php echo base_url(); ?>/assets/img/components/Boton Nuestros productos.png" class="section-title">
	<div class="nuestros-productos-swipper-container"> -->
		<!-- Slider main container -->
		<!-- <div class="swiper-container" id="ProductSlider"> -->
		    <!-- Additional required wrapper -->
		    <!-- <div class="swiper-wrapper" id="ProductSwipper"> -->
		        <!-- Slides -->
		    <!-- </div> -->
		    <!-- If we need pagination -->
		    <!-- <div class="swiper-pagination"></div> -->

		    <!-- If we need navigation buttons -->
		    <!-- <div class="swiper-button-prev"></div>
		    <div class="swiper-button-next"></div>
		</div>
	</div>
</div> -->

<!-- <div class="section-separer"></div>

<div class="inner-section">
	<img src="<?php echo base_url(); ?>/assets/img/components/Boton Productos.png" class="section-title">
	<div class="row" style="width: 100%;">

		<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6">
			<div class="row" style="width: 100%;">
				<div class="col-3">
					<img src="<?php echo base_url(); ?>/assets/img/components/Peliculas de seguridad Icono.png" class="producto-icon">
				</div>
				<div class="col-9">
					<b class="producto-title">
						Películas de seguridad
					</b>
				</div>
				<p class="producto-content">
					Obten la mejor protección contra accidentes, protegete del antivandalismo y cumple con las normas de protección civil.
				</p>
				<img src="<?php echo base_url(); ?>/assets/img/components/peliculas_de_seguridad_img.png" class="producto-img">
			</div>
		</div>

		<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6">
			<div class="row" style="width: 100%;">
				<div class="col-3">
					<img src="<?php echo base_url(); ?>/assets/img/components/Peliculas de control solar Icono.png" class="producto-icon">
				</div>
				<div class="col-9">
					<b class="producto-title">
						Películas de control solar
					</b>
				</div>
				<p class="producto-content">
					Disminuye el destello, reduce el calor, protegete de la decoloración, disminuye costos y ahorra energía.
				</p>
				<img src="<?php echo base_url(); ?>/assets/img/components/peliculas_de_control_solar_img.png" class="producto-img">
			</div>
		</div>

		<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6">
			<div class="row" style="width: 100%;">
				<div class="col-3">
					<img src="<?php echo base_url(); ?>/assets/img/components/Peliculas decorativas Icono.png" class="producto-icon">
				</div>
				<div class="col-9">
					<b class="producto-title">
						Películas decorativas
					</b>
				</div>
				<p class="producto-content">
					Obten la mejor protección contra accidentes, protegete del antivandalismo y cumple con las normas de protección civil.
				</p>
				<img src="<?php echo base_url(); ?>/assets/img/components/peliculas_decorativas_img.png" class="producto-img">
			</div>
		</div>

		<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6">
			<div class="row" style="width: 100%;">
				<div class="col-3">
					<img src="<?php echo base_url(); ?>/assets/img/components/Herramientas Icono.png" class="producto-icon">
				</div>
				<div class="col-9">
					<b class="producto-title">
						Herramientas
					</b>
				</div>
				<p class="producto-content">
					Obten la mejor protección contra accidentes, protegete del antivandalismo y cumple con las normas de protección civil.
				</p>
				<img src="<?php echo base_url(); ?>/assets/img/components/herramientas_img.png" class="producto-img">
			</div>
		</div>
	</div>
</div>

<div class="section-separer"></div>

<div class="inner-section">
	<img src="<?php echo base_url(); ?>/assets/img/components/Boton Servicios.png" class="section-title">
	<div class="row" style="width: 100%;">

		<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
			<div class="row" style="width: 100%;">
				<div class="col-3">
					<img src="<?php echo base_url(); ?>/assets/img/components/Icono Capacitacion.png" class="servicios-icon">
				</div>
				<div class="col-9">
					<b class="servicios-title">
						Capacitación
					</b>
				</div>
				<p class="servicios-content">
					Obten la mejor protección contra accidentes, protegete del antivandalismo y cumple con las normas de protección civil.
				</p>
			</div>
		</div>

		<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
			<div class="row" style="width: 100%;">
				<div class="col-3">
					<img src="<?php echo base_url(); ?>/assets/img/components/Icono Atendemos en la republica .png" class="servicios-icon">
				</div>
				<div class="col-9">
					<b class="servicios-title">
						Atendemos en la republica
					</b>
				</div>
				<p class="servicios-content">
					Obten la mejor protección contra accidentes, protegete del antivandalismo y cumple con las normas de protección civil.
				</p>
			</div>
		</div>

		<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
			<div class="row" style="width: 100%;">
				<div class="col-3">
					<img src="<?php echo base_url(); ?>/assets/img/components/Icono Conviertete en distribuidor .png" class="servicios-icon">
				</div>
				<div class="col-9">
					<b class="servicios-title">
						Conviértete en distribuidor
					</b>
				</div>
				<p class="servicios-content">
					Obten la mejor protección contra accidentes, protegete del antivandalismo y cumple con las normas de protección civil.
				</p>
			</div>
		</div>

		<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
			<div class="row" style="width: 100%;">
				<div class="col-3">
					<img src="<?php echo base_url(); ?>/assets/img/components/Icono Soporte.png" class="servicios-icon">
				</div>
				<div class="col-9">
					<b class="servicios-title">
						Soporte
					</b>
				</div>
				<p class="servicios-content">
					Obten la mejor protección contra accidentes, protegete del antivandalismo y cumple con las normas de protección civil.
				</p>
			</div>
		</div>
	</div>
</div>

<div class="section-separer"></div>

<div class="inner-section">
	<img src="<?php echo base_url(); ?>/assets/img/components/Boton Preguntas frecuentes.png" class="section-title">
	<div class="row" style="width: 100%;">
		<div class="col-12 faq-item">
			<b class="faq-title" data-toggle="collapse" data-target="#collapseN1" aria-expanded="false" aria-controls="collapseN1">1.-¿Qué tipo de polarizado tienes?</b>
			<div class="collapse" id="collapseN1">
			    Tenemos polarizado Inteligente, Reflectivo, de Seguridad, Charcoal y Humo.
			</div>
		</div>
		<div class="col-12 faq-item">
			<b class="faq-title" data-toggle="collapse" data-target="#collapseN2" aria-expanded="false" aria-controls="collapseN2">2.-¿Cuanto miden los royos?</b>
			<div class="collapse" id="collapseN2">
			    Tenemos polarizado Inteligente, Reflectivo, de Seguridad, Charcoal y Humo.
			</div>
		</div>
		<div class="col-12 faq-item">
			<b class="faq-title" data-toggle="collapse" data-target="#collapseN3" aria-expanded="false" aria-controls="collapseN3">3.-¿Hacen envío a domicilio?</b>
			<div class="collapse" id="collapseN3">
			    Tenemos polarizado Inteligente, Reflectivo, de Seguridad, Charcoal y Humo.
			</div>
		</div>
		<div class="col-12 faq-item">
			<b class="faq-title" data-toggle="collapse" data-target="#collapseN4" aria-expanded="false" aria-controls="collapseN4">4.-¿Envías a toda la república mexicana?</b>
			<div class="collapse" id="collapseN4">
			    Tenemos polarizado Inteligente, Reflectivo, de Seguridad, Charcoal y Humo.
			</div>
		</div>
		<div class="col-12 faq-item">
			<b class="faq-title" data-toggle="collapse" data-target="#collapseN5" aria-expanded="false" aria-controls="collapseN5">5.-¿Manejas muestrario?</b>
			<div class="collapse" id="collapseN5">
			    Tenemos polarizado Inteligente, Reflectivo, de Seguridad, Charcoal y Humo.
			</div>
		</div>
		<div class="col-12 faq-item">
			<b class="faq-title" data-toggle="collapse" data-target="#collapseN6" aria-expanded="false" aria-controls="collapseN6">6.-¿Puede ayudarme a instalar?</b>
			<div class="collapse" id="collapseN6">
			    Tenemos polarizado Inteligente, Reflectivo, de Seguridad, Charcoal y Humo.
			</div>
		</div>
		<div class="col-12 faq-item">
			<b class="faq-title" data-toggle="collapse" data-target="#collapseN7" aria-expanded="false" aria-controls="collapseN7">7.-¿Manejas película 3M?</b>
			<div class="collapse" id="collapseN7">
			    Tenemos polarizado Inteligente, Reflectivo, de Seguridad, Charcoal y Humo.
			</div>
		</div>
		<div class="col-12 faq-item">
			<b class="faq-title" data-toggle="collapse" data-target="#collapseN8" aria-expanded="false" aria-controls="collapseN8">8.-¿Cual es su garantía?</b>
			<div class="collapse" id="collapseN8">
			    Tenemos polarizado Inteligente, Reflectivo, de Seguridad, Charcoal y Humo.
			</div>
		</div>
		<div class="col-12 faq-item">
			<b class="faq-title" data-toggle="collapse" data-target="#collapseN9" aria-expanded="false" aria-controls="collapseN9">9.-¿De dónde es la marca?</b>
			<div class="collapse" id="collapseN9">
			    Tenemos polarizado Inteligente, Reflectivo, de Seguridad, Charcoal y Humo.
			</div>
		</div>
		<div class="col-12 faq-item">
			<b class="faq-title" data-toggle="collapse" data-target="#collapseN10" aria-expanded="false" aria-controls="collapseN10">10.-¿Cual es el tiempo que tiene en el mercado?</b>
			<div class="collapse" id="collapseN10">
			    Tenemos polarizado Inteligente, Reflectivo, de Seguridad, Charcoal y Humo.
			</div>
		</div>
		<div class="col-12 faq-item">
			<b class="faq-title" data-toggle="collapse" data-target="#collapseN11" aria-expanded="false" aria-controls="collapseN11">11.-¿El producto es solo automotriz?</b>
			<div class="collapse" id="collapseN11">
			    Tenemos polarizado Inteligente, Reflectivo, de Seguridad, Charcoal y Humo.
			</div>
		</div>
	</div> -->
	
<!-- </div> -->
