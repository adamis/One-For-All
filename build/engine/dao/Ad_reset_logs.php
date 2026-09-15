<?php
    namespace engine\dao;
   		
    class Ad_reset_logs implements \JsonSerializable {

		private $id;
		private $ad_hostname;
		private $fk_condominio_id;
		private $condominio_nome;
		private $date_create;
		private $resultado;
		private $sucesso;
		private $usuario_ad;
		private $usuario_autorizador_ad;
		private $usuario_logado;
		private $fk_usuario_logado_id;
		private $usuario_logado_nome;

		public function getKeys() {
			return [
				'id' =>$this->getId()
			];
		}

		public function jsonSerialize(): mixed {
			return [
				'id' =>$this->getId(),
				'ad_hostname' =>$this->getAd_hostname(),
				'fk_condominio_id' =>$this->getFk_condominio_id(),
				'condominio_nome' =>$this->getCondominio_nome(),
				'date_create' =>$this->getDate_create(),
				'resultado' =>$this->getResultado(),
				'sucesso' =>$this->getSucesso(),
				'usuario_ad' =>$this->getUsuario_ad(),
				'usuario_autorizador_ad' =>$this->getUsuario_autorizador_ad(),
				'usuario_logado' =>$this->getUsuario_logado(),
				'fk_usuario_logado_id' =>$this->getFk_usuario_logado_id(),
				'usuario_logado_nome' =>$this->getUsuario_logado_nome()
			];
		}
			
		//ID
		function getId() {
			return $this->id;
		}
		function setId($id) {
			return $this->id = $id;
		}
		
		//AD_HOSTNAME
		function getAd_hostname() {
			return $this->ad_hostname;
		}
		function setAd_hostname($ad_hostname) {
			return $this->ad_hostname = $ad_hostname;
		}
		
		//FK_CONDOMINIO_ID
		function getFk_condominio_id() {
			return $this->fk_condominio_id;
		}
		function setFk_condominio_id($fk_condominio_id) {
			return $this->fk_condominio_id = $fk_condominio_id;
		}
		
		//CONDOMINIO_NOME
		function getCondominio_nome() {
			return $this->condominio_nome;
		}
		function setCondominio_nome($condominio_nome) {
			return $this->condominio_nome = $condominio_nome;
		}
		
		//DATE_CREATE
		function getDate_create() {
			return $this->date_create;
		}
		function setDate_create($date_create) {
			return $this->date_create = $date_create;
		}
		
		//RESULTADO
		function getResultado() {
			return $this->resultado;
		}
		function setResultado($resultado) {
			return $this->resultado = $resultado;
		}
		
		//SUCESSO
		function getSucesso() {
			return $this->sucesso;
		}
		function setSucesso($sucesso) {
			return $this->sucesso = $sucesso;
		}
		
		//USUARIO_AD
		function getUsuario_ad() {
			return $this->usuario_ad;
		}
		function setUsuario_ad($usuario_ad) {
			return $this->usuario_ad = $usuario_ad;
		}
		
		//USUARIO_AUTORIZADOR_AD
		function getUsuario_autorizador_ad() {
			return $this->usuario_autorizador_ad;
		}
		function setUsuario_autorizador_ad($usuario_autorizador_ad) {
			return $this->usuario_autorizador_ad = $usuario_autorizador_ad;
		}
		
		//USUARIO_LOGADO
		function getUsuario_logado() {
			return $this->usuario_logado;
		}
		function setUsuario_logado($usuario_logado) {
			return $this->usuario_logado = $usuario_logado;
		}
		
		//FK_USUARIO_LOGADO_ID
		function getFk_usuario_logado_id() {
			return $this->fk_usuario_logado_id;
		}
		function setFk_usuario_logado_id($fk_usuario_logado_id) {
			return $this->fk_usuario_logado_id = $fk_usuario_logado_id;
		}
		
		//USUARIO_LOGADO_NOME
		function getUsuario_logado_nome() {
			return $this->usuario_logado_nome;
		}
		function setUsuario_logado_nome($usuario_logado_nome) {
			return $this->usuario_logado_nome = $usuario_logado_nome;
		}
		
	}
?>