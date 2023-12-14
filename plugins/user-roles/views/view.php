<?php if(user_can('view_user_details')): ?>
	<?php if(!empty($row)): ?>
		
		<div class="row g-3 col-md-6 mx-auto shadow p-4 rounded">
			
			<h4 class="text-center">Ver Registro</h4>
			
			<div class="mb-3 col-md-6">
				<label for="role" class="form-label">Rol</label>
				<div class="form-control"><?= esc($row->role) ?></div>
			</div>
			
			<div class="mb-3 col-md-6">
				<label for="disabled" class="form-label">Activo</label>
				<div class="form-control"><?= esc($row->disabled ? 'No' : 'Si') ?></div>
			</div>
			
			<div class="d-flex justify-content-between">
				<a href="<?= ROOT ?>/<?= $admin_route ?>/<?= $plugin_route ?>">
					<button class="btn btn-primary">
						<i class="fa-solid fa-chevron-left"></i> Atrás
					</button>
				</a>
				<a href="<?= ROOT ?>/<?= $admin_route ?>/<?= $plugin_route ?>/edit/<?= $row->id ?>">
					<button class="btn btn-warning">
						<i class="fa-solid fa-pen-to-square"></i> Editar
					</button>
				</a>
				<a href="<?= ROOT ?>/<?= $admin_route ?>/<?= $plugin_route ?>/delete/<?= $row->id ?>">
					<button class="btn btn-danger">
						<i class="fa-solid fa-trash"></i> Eliminar
					</button>
				</a>
			</div>
		</div>
	
	<?php else: ?>
		<div class="alert alert-danger text-center">
			Ese registro no fue encontrado!
		</div>
		
		<a href="<?= ROOT ?>/<?= $admin_route ?>/<?= $plugin_route ?>">
			<button class="btn btn-primary">Atrás</button>
		</a>
	<?php endif ?>

<?php else: ?>
	<div class="alert alert-danger text-center">
		Acceso denegado. No tienes permiso para esta acción.
	</div>
<?php endif ?>
