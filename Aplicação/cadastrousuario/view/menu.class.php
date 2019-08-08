<?php

class Menu
{

	public function __construct()
	{


	}

	public function view()
	{
		echo"<div class='menu rounded offset-sm-1 col-sm-1' id='div_menu'>";
			    echo"<ul class='navbar-nav row'>";
			      echo"<li class='nav-item'>";
			        echo"<a class='btn btn-sm btn-primary d-block' href='/cadastrousuario/index.php' role='button'>Início</a>";
			      echo"</li>";
			      echo"<li class='nav-item'>";
			        echo"<a id='create_usuario' class='btn btn-sm btn-primary d-block' href='#' role='button'>Cadastro</a>";
			      echo"</li>";
			      echo"<li class='nav-item'>";
			        echo"<a class='btn btn-sm btn-primary d-block' href='/cadastrousuario/view/usuario/index.php' role='button'>Listar Usuários</a>";
			      echo"</li>";
			      echo"<li class='nav-item'>";
			        echo"<a class='btn btn-sm btn-primary d-block' href='/cadastrousuario/view/usuario/lista_usuario_desativado.php' role='button'>Reativar Usuário</a>";
			      echo"</li>";
			    echo"</ul>";
		echo"</div>";
	}
}
?>