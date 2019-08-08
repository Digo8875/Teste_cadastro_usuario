<?php

$action = $_POST["action"];
$data = $_POST["data"];

switch ($action)
{
	case 'load_form_usuario':
		if($data['id'] == 0)
		{
			echo"<div class='container col-sm-12'>";
				echo"<form id='form_usuario' data-toggle='validator' method='post' action='#'>";
					echo"<div class='row'>";
					  	echo"<div class='offset-sm-2 col-sm-6'>";
						echo"<h3>Cadastrar Usuário</h3>";
					  	echo"<div class='form-group'>";
					  		echo"<input type='hidden' id='id' name='id' value='".$data['id']."'>";
					  	echo"</div>";
					  	echo"</div>";
				  	echo"</div>";
				  	echo"<div class='row'>";
					  	echo"<div class='form-group offset-sm-2 col-sm-6'>";
					    	echo"<label for='nome'>Nome</label>";
					    	echo"<input type='text' class='form-control' id='nome' name='nome' placeholder='Digite o nome' maxlength='100' type='text' title='Máximo 100 caracteres.' required >";
					  	echo"</div>";
				  	echo"</div>";
				  	echo"<div class='row'>";
					  	echo"<div class='form-group offset-sm-2 col-sm-6'>";
					    	echo"<label for='email'>E-mail</label>";
					    	echo"<input type='text' class='form-control' id='email' name='email' placeholder='Digite o email' maxlength='100' type='email' pattern='^[\w][\w\.]+@\w+\.{1}[\w+\.?]*[\w]+$' title='exemplo@exemplo.com' required>";
					  	echo"</div>";
				  	echo"</div>";
				  	echo"<div class='row'>";
					  	echo"<div class='form-group offset-sm-2 col-sm-6'>";
					    	echo"<label for='telefone'>Telefone</label>";
					    	echo"<input type='text' class='form-control' id='telefone' pattern='[0-9]+$' name='telefone' placeholder='Digite o telefone' maxlength='20' title='Apenas números.' required >";
					  	echo"</div>";
				  	echo"</div>";
				  	echo"<div class='row'>";
					  	echo"<div class='form-group offset-sm-2 col-sm-6'>";
					    	echo"<label for='sexo'>Sexo</label>";
					    	echo"<input type='text' class='form-control' id='sexo' pattern='(F|M)' name='sexo' placeholder='Digite o sexo' maxlength='1' title='Feminino: F | Masculino: M' required>";
					  	echo"</div>";
				  	echo"</div>";
				  	echo"<div class='form-group'>";
				  		echo"<input type='hidden' id='ativo' name='ativo' value='".$data['ativo']."'>";
				  	echo"</div>";
				  	echo"<div class='form-group'>";
				  		echo"<input type='hidden' id='created_at' name='created_at' value='".$data['created_at']."'>";
				  	echo"</div>";
				  	echo"<div class='form-group'>";
				  		echo"<input type='hidden' id='updated_at' name='updated_at' value='".$data['updated_at']."'>";
				  	echo"</div>";
				  	echo"<div class='row'>";
					  	echo"<div class='offset-sm-2 col-sm-6'>";
					 		echo"<button type='submit' class='btn btn-primary'>Cadastrar</button>";
					 	echo"</div>";
				 	echo"</div>";
				echo"</form>";
			echo"</div>";
		}
		else
		{
			require_once(dirname(__FILE__)."/../../controller/usuario_controller.class.php");
			require_once(dirname(__FILE__)."/../../model/usuario.class.php");
			$usr_controller = new Usuario_controller();
			$usr = $usr_controller->lista_usuario($data['id']);

			echo"<div class='container col-sm-12'>";
				echo"<form id='form_usuario' data-toggle='validator' method='post' action='#'>";
					echo"<div class='row'>";
					  	echo"<div class='offset-sm-2 col-sm-6'>";
						echo"<h3>Cadastrar Usuário</h3>";
					  	echo"<div class='form-group'>";
					  		echo"<input type='hidden' id='id' name='id' value='".$usr['Id']."'>";
					  	echo"</div>";
					  	echo"</div>";
				  	echo"</div>";
				  	echo"<div class='row'>";
					  	echo"<div class='form-group offset-sm-2 col-sm-6'>";
					    	echo"<label for='nome'>Nome</label>";
					    	echo"<input type='text' class='form-control' id='nome' name='nome' value='".$usr['Nome']."' placeholder='Digite o nome' maxlength='100' type='text' title='Máximo 100 caracteres.' required >";
					  	echo"</div>";
				  	echo"</div>";
				  	echo"<div class='row'>";
					  	echo"<div class='form-group offset-sm-2 col-sm-6'>";
					    	echo"<label for='email'>E-mail</label>";
					    	echo"<input type='text' class='form-control' id='email' name='email' value='".$usr['Email']."' placeholder='Digite o email' maxlength='100' type='email' pattern='^[\w][\w\.]+@\w+\.{1}[\w+\.?]*[\w]+$' title='exemplo@exemplo.com' required>";
					  	echo"</div>";
				  	echo"</div>";
				  	echo"<div class='row'>";
					  	echo"<div class='form-group offset-sm-2 col-sm-6'>";
					    	echo"<label for='telefone'>Telefone</label>";
					    	echo"<input type='text' class='form-control' id='telefone' pattern='[0-9]+$' name='telefone' value='".$usr['Telefone']."' placeholder='Digite o telefone' maxlength='20' title='Apenas números.' required >";
					  	echo"</div>";
				  	echo"</div>";
				  	echo"<div class='row'>";
					  	echo"<div class='form-group offset-sm-2 col-sm-6'>";
					    	echo"<label for='sexo'>Sexo</label>";
					    	echo"<input type='text' class='form-control' id='sexo' pattern='(F|M)' name='sexo' value='".$usr['Sexo']."' placeholder='Digite o sexo' maxlength='1' title='Feminino: F | Masculino: M' required>";
					  	echo"</div>";
				  	echo"</div>";
				  	echo"<div class='form-group'>";
				  		echo"<input type='hidden' id='ativo' name='ativo' value='".$usr['Ativo']."'>";
				  	echo"</div>";
				  	echo"<div class='form-group'>";
				  		echo"<input type='hidden' id='created_at' name='created_at' value='".$usr['Created_at']."'>";
				  	echo"</div>";
				  	echo"<div class='form-group'>";
				  		echo"<input type='hidden' id='updated_at' name='updated_at' value='".$usr['Updated_at']."'>";
				  	echo"</div>";
				  	echo"<div class='row'>";
					  	echo"<div class='offset-sm-2 col-sm-6'>";
					 		echo"<button type='submit' class='btn btn-primary'>Cadastrar</button>";
					 	echo"</div>";
				 	echo"</div>";
				echo"</form>";
			echo"</div>";
		}

		break;

	case 'create_edit_usuario':
		require_once(dirname(__FILE__)."/../../controller/usuario_controller.class.php");
		require_once(dirname(__FILE__)."/../../model/usuario.class.php");

		$usr_controller = new Usuario_controller();
		$usr = new Usuario($data['id']);
		$usr->set_nome($data['nome']);
		$usr->set_email($data['email']);
		$usr->set_telefone($data['telefone']);
		$usr->set_sexo($data['sexo']);
		$usr->set_ativo($data['ativo']);
		$usr->set_created_at($data['created_at']);
		$usr_controller->create_edit_usuario($usr);
		
		break;

	case 'deleta_usuario':
		require_once(dirname(__FILE__)."/../../controller/usuario_controller.class.php");
		require_once(dirname(__FILE__)."/../../model/usuario.class.php");
		
		$usr_controller = new Usuario_controller();
		$usr = new Usuario($data['id']);
		$usr_controller->deleta_usuario($usr);
		
		break;

	case 'reload_lista_usuario':
		require_once(dirname(__FILE__)."/../../controller/usuario_controller.class.php");
		require_once(dirname(__FILE__)."/../../model/usuario.class.php");

		$usr_controller = new Usuario_controller();
		$lista_usuario = $usr_controller->lista_usuario_busca($data['busca']);

		echo"<div class='table-responsive table-wrapper-scroll-y table-scrollbar'>";
			echo"<div class='row col-sm-12'>";
				echo"<div class='titulo_table col-sm-4'><span class='glyphicon glyphicon-user'></span> Lista de Usuarios</div>";
					echo"<form class='col-sm-8' id='form_busca' method='post' action='#'>";
					  	echo"<div class='form-group col-sm-6'>";
					  		echo"<input type='text' class='form-control col-sm-12 busca' id='busca' name='busca' placeholder='Pesquisar Usuário'>";
					  	echo"</div>";
					  	echo"<button type='submit' class='btn btn-primary btn-busca'>Pesquisar</button>";
				  	echo"</form>";
			echo"</div>";
			if(empty($lista_usuario))
  			{
  				echo"<div class='row col-sm-12'>";
  				echo"Não há registros no sistema.";
  				echo"</div>";
  			}
  			else
  			{
				echo"<table class='table table-striped table-hover'>";
				  echo"<thead>";
				    echo"<tr>";
				      echo"<th>Id</th>";
				      echo"<th>Nome</th>";
				      echo"<th>Email</th>";
				      echo"<th>Telefone</th>";
				      echo"<th>Sexo</th>";
				      echo"<th>Registro Criado em</th>";
				      echo"<th>Ações</th>";
				    echo"</tr>";
				  echo"</thead>";
				  echo"<tbody>";
			  		foreach($lista_usuario as $obj)
			  		{
			  			echo"<tr>";
			  				echo"<td>".$obj['Id']."</td>";
			  				echo"<td id='nome'>".$obj['Nome']."</td>";
			  				echo"<td id='email'>".$obj['Email']."</td>";
			  				echo"<td id='telefone'>".$obj['Telefone']."</td>";
			  				echo"<td id='sexo'>".$obj['Sexo']."</td>";
			  				echo"<td id='created_at'>".$obj['Created_at']."</td>";
			  				echo"<td>";?>
			  					<span onclick="Main.load_form_usuario(<?php echo"{$obj['Id']}"?>);" title='Editar' style='cursor: pointer;' class='glyphicon glyphicon-edit text-secondary'></span> | 
			  					<span onclick="Main.deleta_usuario(<?php echo"{$obj['Id']}"?>);" title='Apagar' style='cursor: pointer;' class='glyphicon glyphicon-trash text-danger'></span>
			  					<?php
			  				echo"</td>";
			  			echo"</tr>";
			  		}
				  echo"</tbody>";
				echo"</table>";
			}
		echo"</div>";
		
		break;

	case 'lista_usuario_desativado':
		require_once(dirname(__FILE__)."/../../controller/usuario_controller.class.php");
		require_once(dirname(__FILE__)."/../../model/usuario.class.php");

		$usr_controller = new Usuario_controller();
		$lista_usuario_desativado = $usr_controller->lista_usuario_desativado();
		
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
				if(empty($lista_usuario_desativado))
	  			{
	  				echo"<div class='row col-sm-12'>";
	  				echo"Não há usuário desativado no sistema.";
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
					      	echo"<th>Ações</th>";
					    echo"</tr>";
					  echo"</thead>";
					  echo"<tbody>";
					  	$i = 1;
				  		foreach($lista_usuario_desativado as $obj)
				  		{
				  			echo"<tr>";
				  				echo"<td>".$i."</td>";
				  				echo"<td>".$obj['Id']."</td>";
				  				echo"<td id='nome'>".$obj['Nome']."</td>";
				  				echo"<td id='email'>".$obj['Email']."</td>";
				  				echo"<td id='telefone'>".$obj['Telefone']."</td>";
				  				echo"<td id='sexo'>".$obj['Sexo']."</td>";
				  				echo"<td id='created_at'>".$obj['Created_at']."</td>";
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

		break;

	case 'reativar_usuario':
		require_once(dirname(__FILE__)."/../../controller/usuario_controller.class.php");
		require_once(dirname(__FILE__)."/../../model/usuario.class.php");
		
		$usr_controller = new Usuario_controller();
		$usr = new Usuario($data['id']);
		$usr_controller->reativar_usuario($usr);
		
		break;
	
	default:
		# code...
		break;
}
?>