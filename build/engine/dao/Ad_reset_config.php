<?php
    namespace engine\dao;
   		
    class Ad_reset_config implements \JsonSerializable {

		private $id;
		private $date_create;
		private $date_update;
		private $script_consulta;
		private $script_reset;
		private $shell;
		private $script_autorizacao;
		private $script_criar_usuario;
		private $script_listar_ou;

		public function getKeys() {
			return [
				'id' =>$this->getId()
			];
		}

		public function jsonSerialize(): mixed {
			return [
				'id' =>$this->getId(),
				'date_create' =>$this->getDate_create(),
				'date_update' =>$this->getDate_update(),
				'script_consulta' =>$this->getScript_consulta(),
				'script_reset' =>$this->getScript_reset(),
				'shell' =>$this->getShell(),
				'script_autorizacao' =>$this->getScript_autorizacao(),
				'script_criar_usuario' =>$this->getScript_criar_usuario(),
				'script_listar_ou' =>$this->getScript_listar_ou()
			];
		}
			
		//ID
		function getId() {
			return $this->id;
		}
		function setId($id) {
			return $this->id = $id;
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
		
		//SCRIPT_CONSULTA
		function getScript_consulta() {
			return $this->script_consulta;
		}
		function setScript_consulta($script_consulta) {
			return $this->script_consulta = $script_consulta;
		}
		
		//SCRIPT_RESET
		function getScript_reset() {
			return $this->script_reset;
		}
		function setScript_reset($script_reset) {
			return $this->script_reset = $script_reset;
		}
		
		//SHELL
		function getShell() {
			return $this->shell;
		}
		function setShell($shell) {
			return $this->shell = $shell;
		}
		
		//SCRIPT_AUTORIZACAO
		function getScript_autorizacao() {
			return $this->script_autorizacao;
		}
		function setScript_autorizacao($script_autorizacao) {
			return $this->script_autorizacao = $script_autorizacao;
		}
		
		//SCRIPT_CRIAR_USUARIO
		function getScript_criar_usuario() {
			return $this->script_criar_usuario;
		}
		function setScript_criar_usuario($script_criar_usuario) {
			return $this->script_criar_usuario = $script_criar_usuario;
		}
		
		//SCRIPT_LISTAR_OU
		function getScript_listar_ou() {
			return $this->script_listar_ou;
		}
		function setScript_listar_ou($script_listar_ou) {
			return $this->script_listar_ou = $script_listar_ou;
		}
		
	}
?>