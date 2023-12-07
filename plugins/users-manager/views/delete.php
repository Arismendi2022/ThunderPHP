<?php if(user_can('delete_user')): ?>
	
	<?php if(!empty($row)): ?>
		
		<form method="post" enctype="multipart/form-data">
			
			<div class="row g-3 col-md-6 mx-auto shadow p-4 rounded">
				
				<?= csrf() ?>
				
				<h4 class="">Eliminar Registro</h4>
				<div class="alert alert-danger text-center">Estás seguro de que deseas eliminar este registro?!</div>
				<label class="text-center">
					<img src="<?= get_image($row->image) ?>" class="img-thumbnail" style="width:100%;max-width:200px;max-height: 200px;object-fit: cover;">
				</label>
				
				<div class="mb-3 col-md-6">
					<label for="first_name" class="form-label">Nombre</label>
					<div class="form-control"><?= esc($row->first_name) ?></div>
				</div>
				
				<div class="mb-3 col-md-6">
					<label for="last_name" class="form-label">Apellidos</label>
					<div class="form-control"><?= esc($row->last_name) ?></div>
				</div>
				
				<div class="mb-3 col-md-6">
					<label for="email" class="form-label">Email</label>
					<div class="form-control"><?= esc($row->email) ?></div>
				</div>
				
				<div class="mb-3 col-md-6">
					<label for="gender" class="form-label">Genero</label>
					<div class="form-control"><?= esc('gender','masculino',$row->gender) ?></div>
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
