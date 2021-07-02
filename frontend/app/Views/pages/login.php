<div class="login-container container-fluid"">
	<div class="row">
		<div class="col-lg-6 col-sm-10 col-12 offset-lg-3 offset-sm-1 offset-0 p-3">
			<div class="text-center shadow p-3">
				<h3 class="text-primary my-4">Bienvenido</h3>
				<div class="form-floating mb-3">
					<input type="email" class="form-control" id="correo" placeholder="correo@gmail.com">
					<label for="correo">Correo electrónico</label>
				</div>
				<div class="form-floating">
					<input type="password" class="form-control" id="contraseña" placeholder="Contraseña">
					<label for="contraseña">Contraseña</label>
				</div>
				<button class="btn btn-primary mt-3" id="login">Iniciar sesión</button>
				<p class="login-parr mt-3">
					¿Aún no tienes cuenta? <a href="<?php echo base_url(); ?>/register">Registrate aquí</a>
				</p>
				<p class="login-parr">
					<a href="<?php echo base_url(); ?>/recover">¿Olvidaste tu contraseña?</a>
				</p>
				<a href="<?php echo base_url(); ?>/">
					<button class="btn btn-outline-primary" id="invitado">Continuar como invitado</button>
				</a>
			</div>
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
<div class="inner-section">
	<div id="item-cuad" style="width: 100%;">
		<h1 class="login-title">Iniciar Sesión</h1>
				<label class="login-label">Correo</label>
				<div class="login-input-container">
					<img src="<?php echo base_url(); ?>/assets/img/components/diente sonriente web_icono correo azul.png" class="login-input-img">
					<input type="mail" name="" class="login-input" id="correo" placeholder="correo@ejemplo.com">
				</div>
				<label class="login-label">Contraseña</label>
				<div class="login-input-container">
					<img src="<?php echo base_url(); ?>/assets/img/components/diente sonriente web_icono contrasena.png" class="login-input-img">
					<input type="password" name="" class="login-input" id="contraseña" placeholder="Contraseña">
				</div>
				<button class="login-button" id="login">
					Iniciar Sesión
				</button>
				<p class="login-parr">
					¿Aún no tienes cuenta? <a href="<?php echo base_url(); ?>/register">Registrate aquí</a>
				</p>
				<p class="login-parr">
					<a href="<?php echo base_url(); ?>/recover">¿Olvidaste tu contraseña?</a>
				</p>
				<a href="<?php echo base_url(); ?>/">
					<button class="login-button" id="invitado">Continuar como invitado</button>
				</a>
	</div>
</div> -->