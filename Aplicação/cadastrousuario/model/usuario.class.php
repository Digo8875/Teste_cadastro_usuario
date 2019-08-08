<?php

class Usuario
{
	private $id;
	private $nome;
	private $email;
	private $telefone;
	private $sexo;
	private $ativo;
	private $created_at;
	private $updated_at;

	//Construtor
	public function __construct($id)
	{
		$this->id = $id;
	}

	//Getters
	public function get_id()
	{
		return $this->id;
	}

	public function get_nome()
	{
		return $this->nome;
	}

	public function get_email()
	{
		return $this->email;
	}

	public function get_telefone()
	{
		return $this->telefone;
	}

	public function get_sexo()
	{
		return $this->sexo;
	}

	public function get_ativo()
	{
		return $this->ativo;
	}

	public function get_created_at()
	{
		return $this->created_at;
	}

	public function get_updated_at()
	{
		return $this->updated_at;
	}

	//Setters
	public function set_nome($nome)
	{
		$this->nome = $nome;
	}

	public function set_email($email)
	{
		$this->email = $email;
	}

	public function set_telefone($telefone)
	{
		$this->telefone = $telefone;
	}

	public function set_sexo($sexo)
	{
		$this->sexo = $sexo;
	}

	public function set_ativo($ativo)
	{
		$this->ativo = $ativo;
	}

	public function set_created_at($created_at)
	{
		$this->created_at = $created_at;
	}

	public function set_updated_at($updated_at)
	{
		$this->updated_at = $updated_at;
	}
}
?>