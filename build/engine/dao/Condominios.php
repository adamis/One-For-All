<?php
    namespace engine\dao;
   		
    class Condominios implements \JsonSerializable {

		private $id;
		private $bairro;
		private $celular;
		private $cep;
		private $cidade;
		private $cnpj;
		private $complemento;
		private $date_create;
		private $date_update;
		private $email;
		private $estado;
		private $inscricao_municipal;
		private $logradouro;
		private $numero;
		private $razao_social;
		private $telefone;
		private $tipo_logradouro;
		private $ad_hostname;
		private $ad_last_seen;
		private $ad_status;

		public function getKeys() {
			return [
				'id' =>$this->getId()
			];
		}

		public function jsonSerialize(): mixed {
			return [
				'id' =>$this->getId(),
				'bairro' =>$this->getBairro(),
				'celular' =>$this->getCelular(),
				'cep' =>$this->getCep(),
				'cidade' =>$this->getCidade(),
				'cnpj' =>$this->getCnpj(),
				'complemento' =>$this->getComplemento(),
				'date_create' =>$this->getDate_create(),
				'date_update' =>$this->getDate_update(),
				'email' =>$this->getEmail(),
				'estado' =>$this->getEstado(),
				'inscricao_municipal' =>$this->getInscricao_municipal(),
				'logradouro' =>$this->getLogradouro(),
				'numero' =>$this->getNumero(),
				'razao_social' =>$this->getRazao_social(),
				'telefone' =>$this->getTelefone(),
				'tipo_logradouro' =>$this->getTipo_logradouro(),
				'ad_hostname' =>$this->getAd_hostname(),
				'ad_last_seen' =>$this->getAd_last_seen(),
				'ad_status' =>$this->getAd_status()
			];
		}
			
		//ID
		function getId() {
			return $this->id;
		}
		function setId($id) {
			return $this->id = $id;
		}
		
		//BAIRRO
		function getBairro() {
			return $this->bairro;
		}
		function setBairro($bairro) {
			return $this->bairro = $bairro;
		}
		
		//CELULAR
		function getCelular() {
			return $this->celular;
		}
		function setCelular($celular) {
			return $this->celular = $celular;
		}
		
		//CEP
		function getCep() {
			return $this->cep;
		}
		function setCep($cep) {
			return $this->cep = $cep;
		}
		
		//CIDADE
		function getCidade() {
			return $this->cidade;
		}
		function setCidade($cidade) {
			return $this->cidade = $cidade;
		}
		
		//CNPJ
		function getCnpj() {
			return $this->cnpj;
		}
		function setCnpj($cnpj) {
			return $this->cnpj = $cnpj;
		}
		
		//COMPLEMENTO
		function getComplemento() {
			return $this->complemento;
		}
		function setComplemento($complemento) {
			return $this->complemento = $complemento;
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
		
		//EMAIL
		function getEmail() {
			return $this->email;
		}
		function setEmail($email) {
			return $this->email = $email;
		}
		
		//ESTADO
		function getEstado() {
			return $this->estado;
		}
		function setEstado($estado) {
			return $this->estado = $estado;
		}
		
		//INSCRICAO_MUNICIPAL
		function getInscricao_municipal() {
			return $this->inscricao_municipal;
		}
		function setInscricao_municipal($inscricao_municipal) {
			return $this->inscricao_municipal = $inscricao_municipal;
		}
		
		//LOGRADOURO
		function getLogradouro() {
			return $this->logradouro;
		}
		function setLogradouro($logradouro) {
			return $this->logradouro = $logradouro;
		}
		
		//NUMERO
		function getNumero() {
			return $this->numero;
		}
		function setNumero($numero) {
			return $this->numero = $numero;
		}
		
		//RAZAO_SOCIAL
		function getRazao_social() {
			return $this->razao_social;
		}
		function setRazao_social($razao_social) {
			return $this->razao_social = $razao_social;
		}
		
		//TELEFONE
		function getTelefone() {
			return $this->telefone;
		}
		function setTelefone($telefone) {
			return $this->telefone = $telefone;
		}
		
		//TIPO_LOGRADOURO
		function getTipo_logradouro() {
			return $this->tipo_logradouro;
		}
		function setTipo_logradouro($tipo_logradouro) {
			return $this->tipo_logradouro = $tipo_logradouro;
		}
		
		//AD_HOSTNAME
		function getAd_hostname() {
			return $this->ad_hostname;
		}
		function setAd_hostname($ad_hostname) {
			return $this->ad_hostname = $ad_hostname;
		}
		
		//AD_LAST_SEEN
		function getAd_last_seen() {
			return $this->ad_last_seen;
		}
		function setAd_last_seen($ad_last_seen) {
			return $this->ad_last_seen = $ad_last_seen;
		}
		
		//AD_STATUS
		function getAd_status() {
			return $this->ad_status;
		}
		function setAd_status($ad_status) {
			return $this->ad_status = $ad_status;
		}
		
	}
?>