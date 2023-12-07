<?php if(user_can('add_user')): ?>
	<form method="post" enctype="multipart/form-data">
		
		<div class="row g-3 col-md-6 mx-auto shadow p-4 rounded">
			
			<?= csrf() ?>
			
			<h4 class="">Nuevo Registro</h4>
			
			<label class="text-center">
				<img src="<?= get_image('') ?>" class="img-thumbnail" style="cursor:pointer;width:100%;max-width:200px;max-height: 200px;object-fit: cover;">
				<input onchange="display_image(event)" type="file" name="image" class="d-none">
				
				<?php if(!empty($errors['image'])): ?>
					<small class="text-danger"><?= $errors['image'] ?></small>
				<?php endif ?>
			</label>
			
			<div class="mb-3 col-md-6">
				<label for="first_name" class="form-label">Nombre</label>
				<input name="first_name" value="<?= old_value('first_name') ?>" type="text" class="form-control" id="first_name" placeholder="Nombre">
				
				<?php if(!empty($errors['first_name'])): ?>
					<small class="text-danger"><?= $errors['first_name'] ?></small>
				<?php endif ?>
			</div>
			
			<div class="mb-3 col-md-6">
				<label for="last_name" class="form-label">Apellidos</label>
				<input name="last_name" value="<?= old_value('last_name') ?>" type="text" class="form-control" id="last_name" placeholder="Apellidos">
				
				<?php if(!empty($errors['last_name'])): ?>
					<small class="text-danger"><?= $errors['last_name'] ?></small>
				<?php endif ?>
			</div>
			
			<div class="mb-3 col-md-6">
				<label for="email" class="form-label">Email</label>
				<input name="email" value="<?= old_value('email') ?>" type="email" class="form-control" id="email" placeholder="Email">
				
				<?php if(!empty($errors['email'])): ?>
					<small class="text-danger"><?= $errors['email'] ?></small>
				<?php endif ?>
			</div>
			
			<div class="mb-3 col-md-6">
				<label for="gender" class="form-label">Genero</label>
				<select class="form-select" name="gender">
					<option value="">--Seleccione Genero--</option>
					<option <?= old_select('gender','masculino') ?> value="masculino">Masculino</option>
					<option <?= old_select('gender','femenino') ?> value="femenino">Femenino</option>
				</select>
				
				<?php if(!empty($errors['gender'])): ?>
					<small class="text-danger"><?= $errors['gender'] ?></small>
				<?php endif ?>
			</div>
			
			<div class="mb-3 col-md-6">
				<label for="password" class="form-label">Contraseña</label>
				<input name="password" value="<?= old_value('password','') ?>" type="password" class="form-control" id="password" placeholder="Contraseña">
				
				<?php if(!empty($errors['password'])): ?>
					<small class="text-danger"><?= $errors['password'] ?></small>
				<?php endif ?>
			</div>
			
			<div class="mb-3 col-md-6">
				<label for="retype_password" class="form-label">Repita contraseña</label>
				<input name="retype_password" type="password" class="form-control" id="retype_password" placeholder="Repita contraseña">
			</div>
			
			<div class="d-flex justify-content-between">
				<a href="<?= ROOT ?>/<?= $admin_route ?>/<?= $plugin_route ?>">
					<button type="button" class="btn btn-primary">
						<i class="fa-solid fa-chevron-left"></i> Atrás
					</button>
				</a>
				<button class="btn btn-danger">
					<i class="fa-solid fa-save"></i> Guardar
				</button>
			</div>
		</div>
	</form>
	
	<script type="text/javascript">

		var valid_image = true;

		function display_image(e) {
			let allowed = ['image/jpeg', 'image/png', 'image/webp'];
			let file = e.currentTarget.files[0];

			if (!allowed.includes(file.type)) {
				alert("Sólo se permiten archivos de este tipo: " + allowed.toString().replaceAll('image/', ''));
				valid_image = false;
				return;
			}
			valid_image = true;
			e.currentTarget.parentNode.querySelector('img').src = URL.createObjectURL(file);
		}

		function submit_form(e) {
			if (!valid_image) {
				e.preventDefault()
				alert("Por favor agregue una imagen válida");
				return;
			}
		}
	
	</script>

<?php else: ?>
	<div class="alert alert-danger text-center">
		Acceso denegado. No tienes permiso para esta acción.
	</div>
<?php endif ?>