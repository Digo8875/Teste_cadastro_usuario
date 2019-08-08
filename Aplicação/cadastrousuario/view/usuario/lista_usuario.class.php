<?php

class Lista_usuario
{
	private $lista_usuario;
	private $lista_usuario_desativado;

	public function __construct()
	{
		require_once(dirname(__FILE__)."/../../controller/usuario_controller.class.php");
		require_once(dirname(__FILE__)."/../../model/usuario.class.php");

		$usr_controller = new Usuario_controller();
		$this->lista_usuario = $usr_controller->lista_usuario(0);
		$this->lista_usuario_desativado = $usr_controller->lista_usuario_desativado();
	}

	public function view()
	{
		echo"<div class='conteudo rounded offset-sm-1 col-sm-8' id='div_conteudo'>";
			echo"<div class='table-responsive'>";
				echo"<div class='row col-sm-12'>";
					echo"<div class='titulo_table col-sm-4'><span class='glyphicon glyphicon-user'></span> Lista de Usuarios</div>";
					/*---------- ATIVE O CÓDIGO PARA ADICIONAR O CAMPO DE BUSCA DO AJAX, AO INVÉS DO DATATABLE ----------
					echo"<form class='col-sm-8' id='form_busca' method='post' action='#'>";
					  	echo"<div class='form-group col-sm-6'>";
					  		echo"<input type='text' class='form-control col-sm-12 busca' id='busca' name='busca' placeholder='Pesquisar Usuário'>";
					  	echo"</div>";
					  	echo"<button type='submit' class='btn btn-primary btn-busca'>Pesquisar</button>";
				  	echo"</form>";
				  	*/
				echo"</div>";
				if(empty($this->lista_usuario))
	  			{
	  				echo"<div class='row col-sm-12'>";
	  				echo"Não há registros no sistema.";
	  				echo"</div>";
	  			}
	  			else
	  			{
					echo"<table class='table rounded table-striped table-hover' id='dtBasicExample'>";
					  echo"<thead>";
					    echo"<tr>";
					    	echo"<th>#</th>";
					      	echo"<th>Id</th>";
					      	echo"<th>Nome</th>";
					      	echo"<th>Email</th>";
					      	echo"<th>Telefone</th>";
					      	echo"<th>Sexo</th>";
					      	echo"<th>Registro Criado em</th>";
					      	echo"<th>Registro Alterado em</th>";
					      	echo"<th>Ações</th>";
					    echo"</tr>";
					  echo"</thead>";
					  echo"<tbody>";
					  	$i = 1;
				  		foreach($this->lista_usuario as $obj)
				  		{
				  			echo"<tr>";
				  				echo"<td>".$i."</td>";
				  				echo"<td>".$obj['Id']."</td>";
				  				echo"<td id='nome'>".$obj['Nome']."</td>";
				  				echo"<td id='email'>".$obj['Email']."</td>";
				  				echo"<td id='telefone'>".$obj['Telefone']."</td>";
				  				echo"<td id='sexo'>".$obj['Sexo']."</td>";
				  				echo"<td id='created_at'>".$obj['Created_at']."</td>";
				  				echo"<td id='updated_at'>".$obj['Updated_at']."</td>";
				  				echo"<td>";?>
				  					<span onclick="Main.load_form_usuario(<?php echo"{$obj['Id']}"?>);" title='Editar' style='cursor: pointer;' class='glyphicon glyphicon-edit text-secondary'></span> | 
				  					<span onclick="Main.deleta_usuario(<?php echo"{$obj['Id']}"?>);" title='Apagar' style='cursor: pointer;' class='glyphicon glyphicon-trash text-danger'></span>
				  					<?php
				  				echo"</td>";
				  			echo"</tr>";
				  			$i++;
				  		}
					  echo"</tbody>";
					echo"</table>";
				}
			echo"</div>";
		echo"</div>";
	}

	public function view_desativados()
	{
		echo"<div class='conteudo rounded offset-sm-1 col-sm-8' id='div_conteudo'>";
			echo"<div class='table-responsive'>";
				echo"<div class='row col-sm-12'>";
					echo"<div class='titulo_table col-sm-4'><span class='glyphicon glyphicon-user text-danger'></span> Usuários Desativados</div>";
					/*---------- ATIVE O CÓDIGO PARA ADICIONAR O CAMPO DE BUSCA DO AJAX, AO INVÉS DO DATATABLE ----------
					echo"<form class='col-sm-8' id='form_busca' method='post' action='#'>";
					  	echo"<div class='form-group col-sm-6'>";
					  		echo"<input type='text' class='form-control col-sm-12 busca' id='busca' name='busca' placeholder='Pesquisar Usuário'>";
					  	echo"</div>";
					  	echo"<button type='submit' class='btn btn-primary btn-busca'>Pesquisar</button>";
				  	echo"</form>";
				  	*/
				echo"</div>";
				if(empty($this->lista_usuario_desativado))
	  			{
	  				echo"<div class='row col-sm-12'>";
	  				echo"Não há usuários desativados no sistema.";
	  				echo"</div>";
	  			}
	  			else
	  			{
					echo"<table class='table rounded table-striped table-hover' id='dtBasicExample'>";
					  echo"<thead>";
					    echo"<tr>";
					    	echo"<th>#</th>";
					      	echo"<th>Id</th>";
					      	echo"<th>Nome</th>";
					      	echo"<th>Email</th>";
					      	echo"<th>Telefone</th>";
					      	echo"<th>Sexo</th>";
					      	echo"<th>Registro Criado em</th>";
					      	echo"<th>Registro Alterado em</th>";
					      	echo"<th>Ações</th>";
					    echo"</tr>";
					  echo"</thead>";
					  echo"<tbody>";
					  	$i = 1;
				  		foreach($this->lista_usuario_desativado as $obj)
				  		{
				  			echo"<tr>";
				  				echo"<td>".$i."</td>";
				  				echo"<td>".$obj['Id']."</td>";
				  				echo"<td id='nome'>".$obj['Nome']."</td>";
				  				echo"<td id='email'>".$obj['Email']."</td>";
				  				echo"<td id='telefone'>".$obj['Telefone']."</td>";
				  				echo"<td id='sexo'>".$obj['Sexo']."</td>";
				  				echo"<td id='created_at'>".$obj['Created_at']."</td>";
				  				echo"<td id='updated_at'>".$obj['Updated_at']."</td>";
				  				echo"<td>";?>
				  					<span onclick="Main.reativar_usuario(<?php echo"{$obj['Id']}"?>);" title='Reativar' style='cursor: pointer;' class='fa fa-refresh text-success'></span>
				  					<?php
				  				echo"</td>";
				  			echo"</tr>";
				  			$i++;
				  		}
					  echo"</tbody>";
					echo"</table>";
				}
			echo"</div>";
		echo"</div>";
	}
}
?>