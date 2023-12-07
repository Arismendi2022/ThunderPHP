<?php if(user_can('view_users')): ?>
	
	<div class="table-responsive">
		<table class="table table-striped table-bordered">
			<tr>
				<th>#</th>
				<th>Nombres</th>
				<th>Apellidos</th>
				<th>Imagen</th>
				<th>Genero</th>
				<th>Roles</th>
				<th>Fecha Creado</th>
				<th>Fecha Actualizado</th>
				<th>
					<?php if(user_can('add_user')): ?>
						<a href="<?= ROOT ?>/<?= $admin_route ?>/<?= $plugin_route ?>/add">
							<button class="btn btn-bd-primary btn-sm"><i class="fa-solid fa-circle-plus"></i> Nuevo</button>
						</a>
					<?php endif ?>
				</th>
			</tr>
			
			<?php if(!empty($rows)): ?>
				<?php foreach($rows as $row): ?>
					<tr>
						<td><?= $row->id ?></td>
						<td>
							<a href="<?= ROOT ?>/<?= $admin_route ?>/<?= $plugin_route ?>/view/<?= $row->id ?>">
								<?= esc($row->first_name) ?>
							</a>
						</td>
						<td>
							<a href="<?= ROOT ?>/<?= $admin_route ?>/<?= $plugin_route ?>/view/<?= $row->id ?>">
								<?= esc($row->last_name) ?>
							</a>
						</td>
						<td>
							<img src="<?= get_image($row->image) ?>" class="img-thumbnail" style="width:80px;height:80px;object-fit: cover;"/>
						</td>
						<td><?= esc(ucfirst($row->gender)) ?></td>
						<td>
						
						</td>
						<td><?= get_date($row->date_created) ?></td>
						<td><?= get_date($row->date_updated) ?></td>
						<td>
							<?php if(user_can('view_user_details')): ?>
								<a href="<?= ROOT ?>/<?= $admin_route ?>/<?= $plugin_route ?>/view/<?= $row->id ?>">
									<button class="btn btn-primary btn-sm">
										<i class="fa-solid fa-eye"></i> Ver
									</button>
								</a>
							<?php endif ?>
							
							<?php if(user_can('edit_user')): ?>
								<a href="<?= ROOT ?>/<?= $admin_route ?>/<?= $plugin_route ?>/edit/<?= $row->id ?>">
									<button class="btn btn-warning btn-sm">
										<i class="fa-solid fa-pen-to-square"></i> Editar
									</button>
								</a>
							<?php endif ?>
							
							<?php if(user_can('delete_user')): ?>
								<a href="<?= ROOT ?>/<?= $admin_route ?>/<?= $plugin_route ?>/delete/<?= $row->id ?>">
									<button class="btn btn-danger btn-sm">
										<i class="fa-solid fa-trash"></i> eliminar
									</button>
								</a>
							<?php endif ?>
						</td>
					</tr>
				<?php endforeach ?>
			<?php endif ?>
		</table>
	</div>
<?php else: ?>
	<div class="alert alert-danger text-center">
		Acceso denegado. No tienes permiso para esta acción.
	</div>
<?php endif ?>