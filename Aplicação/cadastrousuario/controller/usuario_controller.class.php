<?php
class Usuario_controller
{
	private $connection;
	
	public function __construct()
	{
		require_once(dirname(__FILE__)."/../restrict/connect.php");
		$this->connection = connect();
	}
	

	public function lista_usuario($id)
	{
		if($id == 0)
		{
			$usr_q = $this->connection->prepare("SELECT * FROM usuario WHERE ativo=TRUE");
			$usr_q->execute();

			$u = $usr_q->fetchAll();

			return $u;
		}

		$usr_q = $this->connection->prepare("SELECT * FROM usuario WHERE id=?");
		$usr_q->bindParam(1, $id);
		$usr_q->execute();

		$u = $usr_q->fetch();
		return $u;
	}

	public function lista_usuario_busca($busca)
	{
		$usr_q = $this->connection->prepare("SELECT * FROM usuario WHERE ativo=TRUE AND nome LIKE '%".$busca."%'");
		$usr_q->execute();

		$u = $usr_q->fetchAll();

		return $u;
	}

	public function valida_usuario($usuario)
	{
		if(empty($usuario->get_nome()))
			return "Informe o nome do usuário";
		else if(mb_strlen($usuario->get_nome()) > 100)
			return "Máximo 100 caracteres para o nome do usuário";
		else if(empty($usuario->get_email()))
			return "Informe o email";
		else if(mb_strlen($usuario->get_email()) > 100)
			return "Máximo 100 caracteres para o email";
		else if(empty($usuario->get_telefone()))
			return "Informe o telefone";
		else if(mb_strlen($usuario->get_telefone()) > 20)
			return "Máximo 20 caracteres para o telefone";
		else if(empty($usuario->get_sexo()))
			return "Informe o sexo";
		else if(mb_strlen($usuario->get_sexo()) > 1)
			return "Máximo 1 caractere para o sexo";
		else if($usuario->get_sexo() != 'f' && $usuario->get_sexo() != 'F' && $usuario->get_sexo() != 'm' && $usuario->get_sexo() != 'M')
			return "Sexo inválido";
		else
			return 1;
	}

	public function lista_usuario_desativado()
	{
		$usr_q = $this->connection->prepare("SELECT * FROM usuario WHERE ativo=FALSE");
		$usr_q->execute();

		$u = $usr_q->fetchAll();

		return $u;
	}

	public function create_edit_usuario($usuario)
	{
		if($this->valida_usuario($usuario) != 1)
			return "Dados inválidos!";

		$id = $usuario->get_id();
		$nome = $usuario->get_nome();
		$email = $usuario->get_email();
		$telefone = $usuario->get_telefone();
		$sexo = $usuario->get_sexo();
		$ativo = $usuario->get_ativo();
		$created_at = $usuario->get_created_at();
		$updated_at = $usuario->get_updated_at();

		if($id == 0)
		{
			$ativo = true;
			date_default_timezone_set('America/Sao_Paulo');
			$created_at = date("Y-m-d h:i:sa");
			$updated_at = date("Y-m-d h:i:sa");

			$ins = $this->connection->prepare("INSERT INTO usuario VALUES(?,?,?,?,?,?,?,?)");
			$ins->bindParam(1, $id);
			$ins->bindParam(2, $nome);
			$ins->bindParam(3, $email);
			$ins->bindParam(4, $telefone);
			$ins->bindParam(5, $sexo);
			$ins->bindParam(6, $ativo);
			$ins->bindParam(7, $created_at);
			$ins->bindParam(8, $updated_at);
			if(!$ins->execute())
				return "Falha ao cadastrar Usuario!";
			else
				return "Usuário cadastrado.";
		}
		else
		{
			date_default_timezone_set('America/Sao_Paulo');
			$updated_at = date("Y-m-d h:i:sa");

			$up = $this->connection->prepare("UPDATE usuario SET nome=?,email=?,telefone=?,sexo=?,ativo=?,created_at=?,updated_at=? WHERE id=?");
			print_r($nome, $id);
			$up->bindParam(1, $nome);
			$up->bindParam(2, $email);
			$up->bindParam(3, $telefone);
			$up->bindParam(4, $sexo);
			$up->bindParam(5, $ativo);
			$up->bindParam(6, $created_at);
			$up->bindParam(7, $updated_at);
			$up->bindParam(8, $id);
			if(!$up->execute())
				return "Falha ao editar Usuario!";
			else
				return "Usuário editado.";
		}
	}

	/*DELETE COMPLETO, excluindo permanentemente o dado do sistema
	public function deleta_usuario($usuario)
	{
		$id = $usuario->get_id();
		$del = $this->connection->prepare("DELETE FROM usuario WHERE id=?");
		$del->bindParam(1, $id);
		if($del->execute())
		{
			return "Usuário deletado";
		}
		else
			return "Não foi possível deletar o usuario!";
	}
	*/

	//DESATIVAÇÃO do dado, permitindo análises e reativação do mesmo no sistema
	public function deleta_usuario($usuario)
	{
		date_default_timezone_set('America/Sao_Paulo');
		$updated_at = date("Y-m-d h:i:sa");

		$id = $usuario->get_id();
		$del = $this->connection->prepare("UPDATE usuario SET ativo=FALSE,updated_at=? WHERE id=?");
		$del->bindParam(1, $updated_at);
		$del->bindParam(2, $id);
		if($del->execute())
		{
			return "Usuário desativado";
		}
		else
			return "Não foi possível desativar o usuario!";
	}

	public function reativar_usuario($usuario)
	{
		date_default_timezone_set('America/Sao_Paulo');
		$updated_at = date("Y-m-d h:i:sa");
		
		$id = $usuario->get_id();
		$reat = $this->connection->prepare("UPDATE usuario SET ativo=TRUE,updated_at=? WHERE id=?");
		$reat->bindParam(1, $updated_at);
		$reat->bindParam(2, $id);
		if($reat->execute())
		{
			return "Usuário reativado";
		}
		else
			return "Não foi possível reativar o usuario!";
	}
}

?>