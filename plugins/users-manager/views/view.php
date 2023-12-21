<?php if(user_can('view_user_details')): ?>
	<?php if(!empty($row)): ?>
		
		<div class="row g-3 col-md-6 mx-auto shadow p-4 rounded">
			
			
			<h4 class="text-center">Ver Registro</h4>
			
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
			
			<div class="mb-3 col-md-12">
				<label for="email" class="form-label">Roles:</label>
				<div class="form-control">
					<?php if(!empty($row->roles)):?>
						<?php foreach($row->roles as $role):?>
							<div><i><?=esc($role)?></i></div>
						<?php endforeach?>
					<?php endif?>
				</div>
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
