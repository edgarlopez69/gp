<div class="login-container container-fluid"">
	<div class="row">
		<div class="col-lg-6 col-sm-10 col-12 offset-lg-3 offset-sm-1 offset-0 p-3">
			<div class="text-center shadow p-3">
				<h3 class="text-primary my-4">Regístrate</h3>
				<div class="form-floating mb-3">
					<input type="text" class="form-control" id="nombre" placeholder="Tu nombre completo">
					<label for="nombre">Nombre completo</label>
				</div>
				<div class="form-floating mb-3">
					<input type="email" class="form-control" id="correo" placeholder="correo@gmail.com">
					<label for="correo">Correo electrónico</label>
				</div>
				<div class="form-floating mb-3">
					<input type="phone" class="form-control" id="phone" placeholder="Número de teléfono">
					<label for="phone">WhatsApp (número de celular)</label>
				</div>
				<div class="form-floating mb-3">
					<input type="password" class="form-control" id="contraseña" placeholder="Contraseña">
					<label for="contraseña">Contraseña</label>
				</div>
				<div class="form-floating mb-3">
					<input type="password" class="form-control" id="confirmar" placeholder="Confirmar contraseña">
					<label for="confirmar">Confirmar contraseña</label>
				</div>
				<button class="btn btn-primary" id="register">Crear cuenta</button>
				<p class="login-parr mt-3">
					¿Ya tienes una cuenta? <a href="<?php echo base_url(); ?>/login">Inicia sesión aquí</a>
				</p>
			</div>
		</div>
	</div>
</div>
<!-- <section class="inner-section">
	<div class="row">
		<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
			<div class="login-container">
				<h1 class="login-title">REGISTRO</h1>
				<label class="login-label">Nombre</label>
				<div class="login-input-container">
					<img src="<?php echo base_url(); ?>/assets/img/components/diente sonriente web_icono sesion azul.png" class="login-input-img">
					<input type="text" name="" id="nombre" class="login-input" placeholder="NOMBRE COMPLETO">
				</div>
				<label class="login-label">Correo</label>
				<div class="login-input-container">
					<img src="<?php echo base_url(); ?>/assets/img/components/diente sonriente web_icono correo azul.png" class="login-input-img">
					<input type="mail" name="" id="correo" class="login-input" placeholder="correo@ejemplo.com">
				</div>
				<label class="login-label">Contraseña</label>
				<div class="login-input-container">
					<img src="<?php echo base_url(); ?>/assets/img/components/diente sonriente web_icono contrasena.png" class="login-input-img">
					<input type="password" name="" id="contraseña" class="login-input" placeholder="Contraseña">
				</div>
				<label class="login-label">Repetir Contraseña</label>
				<div class="login-input-container">
					<img src="<?php echo base_url(); ?>/assets/img/components/diente sonriente web_icono contrasena.png" class="login-input-img">
					<input type="password" name="" id="confirmar" class="login-input" placeholder="Contraseña">
				</div>
				<button class="login-button" id="register">
					CREAR CUENTA
				</button>
			</div>
		</div>
		<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
		</div>
	</div>
</section> -->