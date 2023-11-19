<link rel="stylesheet" type="text/css" href="<?= plugin_http_path('assets/css/style.css') ?>">

<main class="p-4" style="background-color: #dde5f4; height: 100vh">
	<form method="post" class="col-xl-3 col-lg-4 col-md-6 col-sm-8 mx-auto p-4 shadow" style="border-radius: 30px; background-color: #f1f7fe">
		
		<h3 class="text-center mt-4">Registro</h3>
		<div class="text-muted text-center mb-4"><i>Por favor ingresa tus datos</i></div>
		
		<div class="form-floating my-3">
			<input type="email" class="form-control" id="floatingInput" placeholder="nombre@example.com" style="border-radius: 20px;">
			<label for="floatingInput">Nombres </label>
		</div>
		
		<div class="form-floating my-3">
			<input type="email" class="form-control" id="floatingInput" placeholder="nombre@example.com" style="border-radius: 20px;">
			<label for="floatingInput">Apellidos </label>
		</div>
		
		<div class="form-floating my-3">
			<input type="email" class="form-control" id="floatingInput" placeholder="nombre@example.com" style="border-radius: 20px;">
			<label for="floatingInput">Dirección Correo </label>
		</div>
		
		<div class="form-floating my-3">
			<input type="password" class="form-control" id="floatingPassword" placeholder="contraseña" style="border-radius: 20px;">
			<label for="floatingPassword">Contraseña</label>
		</div>
		
		<div class="form-floating my-3">
			<input type="password" class="form-control" id="floatingPassword" placeholder="contraseña" style="border-radius: 20px;">
			<label for="floatingPassword">Confirmar Contraseña</label>
		</div>
		
		<div class="d-flex justify-content-between px-2">
			<a href="<?= ROOT ?>/<?= $vars['forgot_page'] ?>">Has olvidado tu contraseña?</a>
			<a href="<?= ROOT ?>/<?= $vars['login_page'] ?>">o Acceso</a>
		</div>
		
		<button class="bnt text-white px-4 py-3 w-100 my-4" style="  border-radius: 25px; background-color: #3d4785;">Ingresar</button>
	
	</form>
</main>

<script src="<?= plugin_http_path('assets/js/plugin.js') ?>"></script>