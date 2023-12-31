<?php if(user_can('view_users')): ?>
	
	<div class="table-responsive">
		
		<label><i>Page: <?=$pager->page_number?></i></label>
		
		<form class="input-group my-3 mx-auto" style="max-width: 500px">
			<input placeholder="Buscar por nombre" type="text" class="form-control" value="<?= old_value('find','','get') ?>" name="find" autofocus="true">
			<button class="input-group-text bg-primary text-white" id="basic-addon1">
				Search
			</button>
		</form>
		
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
							<img src="<?= get_image($row->image) ?>" class="img-thumbnail" style="width:70px;height:70px;object-fit: cover;"/>
						</td>
						<td><?= esc(ucfirst($row->gender)) ?></td>
						<td>
							<?php if(!empty($row->roles)): ?>
								<?php foreach($row->roles as $role): ?>
									<div><i><?= esc($role) ?></i></div>
								<?php endforeach ?>
							<?php endif ?>
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
		
		<?=$pager->display()?>
	
	</div>
<?php else: ?>
	<div class="alert alert-danger text-center">
		Acceso denegado. No tienes permiso para esta acción.
	</div>
<?php endif ?>