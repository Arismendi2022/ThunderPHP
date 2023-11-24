<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="<?= ROOT ?>/assets/css/bootstrap.min.css">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title><?= ucfirst(page()) ?> | <?= APP_NAME ?></title>
</head>
<body>

<div class="col-md-10 mx-auto p-4">
	
	<?php if(!empty($links)): ?>
		<?php foreach($links as $link): ?>
			<?php if(user_can($link->permission)): ?>
				<a href="<?= ROOT ?>/<?= $link->slug ?>"><?= $link->title ?></a>
			<?php endif ?>
		<?php endforeach ?>
	<?php endif ?>

</div>
