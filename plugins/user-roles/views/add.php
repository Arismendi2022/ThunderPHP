<?php if(user_can('add_user')): ?>
	<form method="post" enctype="multipart/form-data">
		
		<div class="row g-3 col-md-6 mx-auto shadow p-4 rounded">
			
			<?= csrf() ?>
			
			<h4 class="">Nuevo Registro</h4>
			
			<div class="mb-3 col-md-6">
				<label for="role" class="form-label">Rol</label>
				<input name="role" value="<?= old_value('role') ?>" type="text" class="form-control" id="role" placeholder="Titulo Rol e.g admin ">
				
				<?php if(!empty($errors['role'])): ?>
					<small class="text-danger"><?= $errors['role'] ?></small>
				<?php endif ?>
			</div>
			
			<div class="mb-3 col-md-6">
				<label for="email" class="form-label">Activo</label>
				<select class="form-select" name="disabled">
					<option value="">-- Seleccione Estado --</option>
					<option <?= old_select('disabled','0') ?> value="0">Si</option>
					<option <?= old_select('disabled','1') ?> value="1">No</option>
				</select>
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

<?php else: ?>
	<div class="alert alert-danger text-center">
		Acceso denegado. No tienes permiso para esta acción.
	</div>
<?php endif ?>