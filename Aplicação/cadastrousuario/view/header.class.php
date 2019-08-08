<?php

class Header
{

	public function __construct()
	{


	}

	public function view()
	{
		echo"<div class='header rounded text-center offset-sm-1 col-sm-10' id='div_header'>";
			echo"<div>";
				echo"<h1>Cadastro de Usuários</h1>";
			echo"</div>";
		echo"</div>";
	}
}
?>