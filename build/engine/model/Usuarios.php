<?php
    namespace engine\model;
   		
    class Usuarios implements \JsonSerializable {

		private $id;
		private $aprovado;
		private $date_create;
		private $date_update;
		private $nome;
		private $password;
		private $password_fist_access;
		private $root_user;
		private $token_ativacao;
		private $token_send;
		private $usuario;
		private $fk_condominio_id;
		private $fk_perfis_id;
		private $roles;

		public function getKeys() {
			return [
				'id' =>$this->getId()
			];
		}

		public function jsonSerialize() {
			return [
				'id' =>$this->getId(),
				'aprovado' =>$this->getAprovado(),
				'date_create' =>$this->getDate_create(),
				'date_update' =>$this->getDate_update(),
				'nome' =>$this->getNome(),
				'password' =>$this->getPassword(),
				'password_fist_access' =>$this->getPassword_fist_access(),
				'root_user' =>$this->getRoot_user(),
				'token_ativacao' =>$this->getToken_ativacao(),
				'token_send' =>$this->getToken_send(),
				'usuario' =>$this->getUsuario(),
				'fk_condominio_id' =>$this->getFk_condominio_id(),
				'fk_perfis_id' =>$this->getFk_perfis_id(),
				'roles' =>$this->getRoles()
			];
		}
			
		//ID
		function getId() {
			return $this->id;
		}
		function setId($id) {
			return $this->id = $id;
		}
		
		//APROVADO
		function getAprovado() {
			return $this->aprovado;
		}
		function setAprovado($aprovado) {
			return $this->aprovado = $aprovado;
		}
		
		//DATE_CREATE
		function getDate_create() {
			return $this->date_create;
		}
		function setDate_create($date_create) {
			return $this->date_create = $date_create;
		}
		
		//DATE_UPDATE
		function getDate_update() {
			return $this->date_update;
		}
		function setDate_update($date_update) {
			return $this->date_update = $date_update;
		}
		
		//NOME
		function getNome() {
			return $this->nome;
		}
		function setNome($nome) {
			return $this->nome = $nome;
		}
		
		//PASSWORD
		function getPassword() {
			return $this->password;
		}
		function setPassword($password) {
			return $this->password = $password;
		}
		
		//PASSWORD_FIST_ACCESS
		function getPassword_fist_access() {
			return $this->password_fist_access;
		}
		function setPassword_fist_access($password_fist_access) {
			return $this->password_fist_access = $password_fist_access;
		}
		
		//ROOT_USER
		function getRoot_user() {
			return $this->root_user;
		}
		function setRoot_user($root_user) {
			return $this->root_user = $root_user;
		}
		
		//TOKEN_ATIVACAO
		function getToken_ativacao() {
			return $this->token_ativacao;
		}
		function setToken_ativacao($token_ativacao) {
			return $this->token_ativacao = $token_ativacao;
		}
		
		//TOKEN_SEND
		function getToken_send() {
			return $this->token_send;
		}
		function setToken_send($token_send) {
			return $this->token_send = $token_send;
		}
		
		//USUARIO
		function getUsuario() {
			return $this->usuario;
		}
		function setUsuario($usuario) {
			return $this->usuario = $usuario;
		}
		
		//FK_CONDOMINIO_ID
		function getFk_condominio_id() {
			return $this->fk_condominio_id;
		}
		function setFk_condominio_id($fk_condominio_id) {
			return $this->fk_condominio_id = $fk_condominio_id;
		}
		
		//FK_PERFIS_ID
		function getFk_perfis_id() {
			return $this->fk_perfis_id;
		}
		function setFk_perfis_id($fk_perfis_id) {
			return $this->fk_perfis_id = $fk_perfis_id;
		}
		
		//ROLES
		function getRoles() {
			return $this->roles;
		}
		function setRoles($roles) {
			return $this->roles = $roles;
		}
		
	}
?>