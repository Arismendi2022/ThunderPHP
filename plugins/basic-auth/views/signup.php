<link rel="stylesheet" type="text/css" href="<?= plugin_http_path('assets/css/style.css') ?>">

<main class="p-4" style="background-color: #dde5f4; height: 100vh">
	<form method="post" class="col-xl-3 col-lg-4 col-md-6 col-sm-8 mx-auto p-2 shadow" style="border-radius: 30px; background-color: #f1f7fe">
		
		<?= csrf() ?>
		
		<h3 class="text-center mt-4">Registro</h3>
		<div class="text-muted text-center mb-4"><i>Por favor ingresa tus datos</i></div>
		
		<div class="form-floating my-2">
			<input value="<?= old_value('first_name') ?>" name="first_name" type="text" class="form-control" id="floatingInput" placeholder="nombre@example.com"
						 style="border-radius:
				30px;">
			<label for="floatingInput">Nombres </label>
			<?php if(!empty($errors['first_name'])): ?>
				<small class="text-danger px-2"><?= $errors['first_name'] ?></small>
			<?php endif ?>
		</div>
		
		<div class="form-floating my-2">
			<input value="<?= old_value('last_name') ?>" name="last_name" type="text" class="form-control" id="floatingInput" placeholder="nombre@example.com"
						 style="border-radius:
				30px;">
			<label for="floatingInput">Apellidos </label>
			<?php if(!empty($errors['last_name'])): ?>
				<small class="text-danger px-2"><?= $errors['last_name'] ?></small>
			<?php endif ?>
		</div>
		
		<select class="form-select p-3" name="gender" style="border-radius: 30px;">
			<option value="">--Seleccione Genero--</option>
			<option <?= old_select('gender','Masculino') ?> value="Masculino">Masculino</option>
			<option <?= old_select('gender','Femenino') ?> value="Femenino">Femenino</option>
		</select>
			<?php if(!empty($errors['gender'])): ?>
				<small class="text-danger px-2"><?= $errors['gender'] ?></small>
			<?php endif ?>
		
		<div class="form-floating my-2">
			<input value="<?= old_value('email') ?>" name="email" type="email" class="form-control" id="floatingInput" placeholder="nombre@example.com"
						 style="border-radius: 30px;">
			<label for="floatingInput">Dirección Correo </label>
			<?php if(!empty($errors['email'])): ?>
				<small class="text-danger px-2"><?= $errors['email'] ?></small>
			<?php endif ?>
		</div>
		
		<div class="form-floating my-2">
			<input value="<?= old_value('password') ?>" name="password" type="password" class="form-control" id="floatingPassword" placeholder="contraseña"
						 style="border-radius: 30px;">
			<label for="floatingPassword">Contraseña</label>
			<?php if(!empty($errors['password'])): ?>
				<small class="text-danger px-2"><?= $errors['password'] ?></small>
			<?php endif ?>
		</div>
		
		<div class="form-floating my-2">
			<input value="<?= old_value('retype_password') ?>" name="retype_password" type="password" class="form-control" id="floatingPassword" placeholder="contraseña"
						 style="border-radius: 30px;">
			<label for="floatingPassword">Confirmar Contraseña</label>
		</div>
		
		<div class="d-flex justify-content-between px-2">
			<a href="<?= ROOT ?>/<?= $vars['forgot_page'] ?>">Has olvidado tu contraseña?</a>
			<a href="<?= ROOT ?>/<?= $vars['login_page'] ?>">o Acceso</a>
		</div>
		
		<button class="bnt text-white px-4 py-3 w-100 my-4" style="  border-radius: 30px; background-color: #3d4785;">Ingresar</button>
	
	</form>
</main>

<script src="<?= plugin_http_path('assets/js/plugin.js') ?>"></script>