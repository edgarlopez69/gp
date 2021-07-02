<div class="container-fluid" style="padding: 0;">
	<!-- === Hero Section === -->
	<div class="contacto-hero row" style="--bs-gutter-x: 0;">
		<div class="col-12">
			<img class="img-fluid" src="<?php echo base_url();?>/assets/img/contacto-banner.png" alt="">
		</div>
	</div>

	<div class="contacto-datos row py-md-5 py-4" style="position: relative;">
		<div style="position: absolute; top: 0; bottom: 0; left: 0; right: 0; height: 100%; z-index: -100;" id="particles-js"></div>
		<div class="col-lg-6 col-md-8 col-10 offset-lg-3 offset-md-2 offset-1">
			<div class="row">
				<div class="col-md-4 col-12 contacto-icon-container d-flex justify-content-md-center">
					<a class="d-flex align-items-center">
					<!-- <a target="_blank" href="https://bit.ly/venta-de-material" class="d-flex align-items-center"> -->
						<i class="fab fa-whatsapp-square"></i> <span class="ms-2">33 3705 3217</span>
					</a>
				</div>
				<div class="col-md-4 col-12 contacto-icon-container d-flex justify-content-md-center" >
					<a target="_blank" href="tel:3320804246" class="d-flex align-items-center">
						<i class="fas fa-phone-square"></i> <span class="ms-2">33 2080 4246</span>
					</a>
				</div>
				<div class="col-md-4 col-12 contacto-icon-container d-flex justify-content-md-center">
					<a target="_blank" href="https://www.facebook.com/glassprotech.com.mx/" class="d-flex align-items-center">
						<i class="fab fa-facebook-square"></i> <span class="ms-2">Facebook</span>
					</a>
				</div>
				<div class="col-12 my-3">
					<div class="container-fluid" style="padding: 0;">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3733.2277884935565!2d-103.38297548452374!3d20.66030970562869!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8428adbc9ce364d7%3A0x228a98c64b1bc0fb!2sGlassProtech!5e0!3m2!1ses!2smx!4v1615411274994!5m2!1ses!2smx" style="border:0; width: 100%; height: 250px;" allowfullscreen="" loading="lazy"></iframe>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-6 col-md-8 col-10 offset-lg-3 offset-md-2 offset-1 my-3 shadow text-center bg-white">
			<form class="text-center py-3">
				<div class="row">
					<div class="col-12">
						<div class="form-floating mb-3">
							<input type="text" class="form-control" id="nombre" placeholder="Tu nombre completo">
							<label for="nombre">Nombre completo</label>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 col-12">
						<div class="form-floating mb-3">
							<input type="email" class="form-control" id="correo" placeholder="nombre@gmail.com">
							<label for="correo">Correo electrónico</label>
						</div>
					</div>
					<div class="col-md-6 col-12">
						<div class="form-floating mb-3">
							<input type="phone" class="form-control w-100" id="telefono" placeholder="3322114455">
							<label for="telefono">Número de teléfono</label>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<div class="form-floating mb-3">
							<textarea class="form-control" placeholder="Deja tu comentario aquí" id="comentarios" style="height: 100px"></textarea>
							<label for="comentarios">Comentarios</label>
						</div>
					</div>
				</div>
					
			</form>
			<button  class="btn btn-primary mb-3" id="enviar">Enviar</button>
		</div>
	</div>
</div>

<!-- <div class="front">
	<div class="front-content">
		<div class="row" style="width: 100%">
			<div class="col">
				<img src="<?php echo base_url(); ?>/assets/img/components/glassProtechLogo.png" class="front-logo">
				
			</div>
			<div class="col">

			</div>
		</div>
	</div>
	
</div>
<div class="section-separer"></div>
-->
<!-- <div class="inner-section">
	<div class="row" style="width: 100%;">
		<div class="col">
			<div class="contacto-container">
				<form>
				  <div class="form-group">
				    <label class="contacto-label" for="nombre">Nombre completo</label>
				    <input type="text" class="form-control contacto-input" id="nombre" aria-describedby="nombre" placeholder="Nombre completo">
				  </div>
				  <div class="form-group">
				    <label class="contacto-label" for="mail">Correo electronico</label>
				    <input type="email" class="form-control contacto-input" id="mail" aria-describedby="email" placeholder="ejemplo@contacto.com">
				  </div>
				  <div class="form-group">
				    <label class="contacto-label" for="phone">Teléfono</label>
				    <input type="phone" class="form-control contacto-input" id="phone" aria-describedby="emailHelp" placeholder="Teléfono">
				  </div>
				</form>
			</div>
		</div>
		<div class="col">
			<div class="contacto-container">
				<form>
				  <div class="form-group">
				    
				    <textarea class="form-control contacto-input" id="mensaje" rows="3" placeholder="Comentarios"></textarea>
				  </div>
				</form>
			</div>
			<button type="submit" class="contacto-button">Enviar</button>
		</div>
	</div>
</div>  -->