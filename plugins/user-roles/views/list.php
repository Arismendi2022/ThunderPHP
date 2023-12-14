<?php if(user_can('view_users')): ?>
	
	<div class="table-responsive">
		<table class="table table-striped table-bordered">
			<tr>
				<th>#</th>
				<th>Rol</th>
				<th>Activo</th>
				<th>
					<div class="d-flex justify-content-between">
						Permisos
						<button class="btn btn-bd-primary btn-sm">
							<i class="fa-solid fa-save"></i> Guardar Permisos
						</button>
					</div>
				</th>
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
							<?= esc($row->role) ?>
						</td>
						<td>
							<?= esc($row->disabled ? 'No' : "Si") ?>
						</td>
						<td style="max-width: 200px">
							<div class="row g-2">
								<?php $perms = array_unique(APP('permissions')); ?>
								
								<?php if(!empty($perms)): $num = 0 ?>
									<?php foreach($perms as $perm): $num++ ?>
										<div class="form-check col-md-6">
											<input name="checkbox_<?= $row->id ?>_<?= $num ?>" class="form-check-input" type="checkbox" value="<?= $perm ?>" id="check<?= $num ?>">
											<label class="form-check-label" for="check<?= $num ?>" style="cursor: pointer;">
												<?= esc(str_replace("_"," ",$perm)) ?>
											</label>
										</div>
									<?php endforeach ?>
								<?php endif ?>
							</div>
						</td>
						<td>
							
							<?php if(user_can('edit_role')): ?>
								<a href="<?= ROOT ?>/<?= $admin_route ?>/<?= $plugin_route ?>/edit/<?= $row->id ?>">
									<button class="btn btn-warning btn-sm">
										<i class="fa-solid fa-pen-to-square"></i> Editar
									</button>
								</a>
							<?php endif ?>
							
							<?php if(user_can('delete_role')): ?>
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