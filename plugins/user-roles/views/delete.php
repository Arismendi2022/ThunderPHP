<?php if(user_can('delete_role')): ?>
	
	<?php if(!empty($row)): ?>
		
		<form method="post" enctype="multipart/form-data">
			
			<div class="row g-3 col-md-6 mx-auto shadow p-4 rounded">
				
				<?= csrf() ?>
				
				<h4 class="">Eliminar Registro</h4>
				<div class="alert alert-danger text-center">Estás seguro de que deseas eliminar este registro?!</div>
				
				<div class="mb-3 col-md-6">
					<label for="role" class="form-label">Rol</label>
					<div class="form-control"><?= esc($row->role) ?></div>
				</div>
				
				<div class="mb-3 col-md-6">
					<label for="email" class="form-label">Activo</label>
					<div class="form-control"><?= esc($row->disabled ? 'No' : 'Si') ?></div>
				</div>
				
				<div class="d-flex justify-content-between">
					<a href="<?= ROOT ?>/<?= $admin_route ?>/<?= $plugin_route ?>">
						<button type="button" class="btn btn-primary">
							<i class="fa-solid fa-chevron-left"></i> Atrás
						</button>
					</a>
					<button class="btn btn-danger">
						<i class="fa-solid fa-trash"></i> Eliminar
					</button>
				</div>
			</div>
		</form>
	
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
