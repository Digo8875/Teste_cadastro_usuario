<!DOCTYPE html>
<html>
	<head>
		<meta charset='utf-8'>

		<link rel='stylesheet' type='text/css' href='../../content/css/bootstrap.min.css'>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel='stylesheet' type='text/css' href='../../content/css/style.css'>
		<link rel='stylesheet' type='text/css' href='//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css'>
		<link rel="stylesheet" type='text/css' href="../../content/css/font-awesome.min.css">

		<script  type='text/javascript' src='../../content/js/jquery.js'></script>
		<script  type='text/javascript' src='../../content/js/Main.js'></script>
		<script  type='text/javascript' src='../../content/js/Init.js'></script>
		<script  type='text/javascript' src='//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js'></script>
		<script  type='text/javascript' src='../../content/js/validator.min.js'></script>

		<title>Cadastro Usuário</title>
	</head>
	<body>
		<div class='div-mestre container-fluid'>
			<header>
				<div class='row'>
					<?php
						require_once(dirname(__FILE__)."/../header.class.php");
						$header = new Header();
						$header->view();
					?>
				</div>
			</header>

			<div class='corpo' id='corpo'>
				<div class='row'>
					<?php
						require_once(dirname(__FILE__)."/../menu.class.php");
						$menu = new Menu();
						$menu->view();

						require_once(dirname(__FILE__)."/lista_usuario.class.php");
						$lista_usuario = new Lista_usuario();
						$lista_usuario->view();
					?>
				</div>
			</div>

			<footer>
				<div class='row'>
					<?php
						require_once(dirname(__FILE__)."/../footer.class.php");
						$footer = new Footer();
						$footer->view();
					?>
				</div>
			</footer>
		</div>
	</body>
</html>