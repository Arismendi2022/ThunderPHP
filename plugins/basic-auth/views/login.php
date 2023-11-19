<link rel="stylesheet" type="text/css" href="<?= plugin_http_path('assets/css/style.css') ?>">

<main class="p-4" style="background-color: #dde5f4; height: 100vh">
	<form method="post" class="col-xl-3 col-lg-4 col-md-6 col-sm-8 mx-auto p-4 shadow" style="border-radius: 30px; background-color: #f1f7fe">
		
		<div class="text-center">
			<svg fill="#3d4785" style="border-radius: 50%;" width="80" height="80" viewBox="0 0 24 24">
				<path
					d="M19 7.001c0 3.865-3.134 7-7 7s-7-3.135-7-7c0-3.867 3.134-7.001 7-7.001s7 3.134 7 7.001zm-1.598 7.18c-1.506 1.137-3.374 1.82-5.402 1.82-2.03 0-3.899-.685-5.407-1.822-4.072 1.793-6.593 7.376-6.593 9.821h24c0-2.423-2.6-8.006-6.598-9.819z"/>
			</svg>
		</div>
		
		<h3 class="text-center mt-4">Iniciar Sesión</h3>
		<div class="text-muted text-center mb-4"><i>Por favor inicie sesión para continuar</i></div>
		
		<div class="form-floating my-4">
			<input type="email" class="form-control" id="floatingInput" placeholder="nombre@example.com" style="border-radius: 20px;">
			<label for="floatingInput">Dirección Correo </label>
		</div>
		<div class="form-floating my-4">
			<input type="password" class="form-control" id="floatingPassword" placeholder="contraseña" style="border-radius: 20px;">
			<label for="floatingPassword">Contraseña</label>
		</div>
		
		<div class="d-flex justify-content-between px-2">
			<a href="<?= ROOT ?>/<?= $vars['forgot_page'] ?>">Has olvidado tu contraseña?</a>
			<a href="<?= ROOT ?>/<?= $vars['signup_page'] ?>"">o Regístrate</a>
		</div>
		
		<button class="bnt text-white px-4 py-3 w-100 my-4" style="  border-radius: 25px; background-color: #3d4785;">Ingresar</button>
	
	</form>
</main>

<script src="<?= plugin_http_path('assets/js/plugin.js') ?>"></script>