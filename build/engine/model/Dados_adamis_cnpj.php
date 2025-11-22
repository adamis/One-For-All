<?php
    namespace engine\model;
   		
    class Dados_adamis_cnpj implements \JsonSerializable {

		private $id;
		private $bairro;
		private $cep;
		private $cidade;
		private $cnpj;
		private $date_create;
		private $date_update;
		private $logradouro;
		private $nome;
		private $numero;
		private $tecnico;
		private $url_fig;
		private $tipo_logradouro;

		public function getKeys() {
			return [
				'id' =>$this->getId()
			];
		}

		public function jsonSerialize() {
			return [
				'id' =>$this->getId(),
				'bairro' =>$this->getBairro(),
				'cep' =>$this->getCep(),
				'cidade' =>$this->getCidade(),
				'cnpj' =>$this->getCnpj(),
				'date_create' =>$this->getDate_create(),
				'date_update' =>$this->getDate_update(),
				'logradouro' =>$this->getLogradouro(),
				'nome' =>$this->getNome(),
				'numero' =>$this->getNumero(),
				'tecnico' =>$this->getTecnico(),
				'url_fig' =>$this->getUrl_fig(),
				'tipo_logradouro' =>$this->getTipo_logradouro()
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
		
		//LOGRADOURO
		function getLogradouro() {
			return $this->logradouro;
		}
		function setLogradouro($logradouro) {
			return $this->logradouro = $logradouro;
		}
		
		//NOME
		function getNome() {
			return $this->nome;
		}
		function setNome($nome) {
			return $this->nome = $nome;
		}
		
		//NUMERO
		function getNumero() {
			return $this->numero;
		}
		function setNumero($numero) {
			return $this->numero = $numero;
		}
		
		//TECNICO
		function getTecnico() {
			return $this->tecnico;
		}
		function setTecnico($tecnico) {
			return $this->tecnico = $tecnico;
		}
		
		//URL_FIG
		function getUrl_fig() {
			return $this->url_fig;
		}
		function setUrl_fig($url_fig) {
			return $this->url_fig = $url_fig;
		}
		
		//TIPO_LOGRADOURO
		function getTipo_logradouro() {
			return $this->tipo_logradouro;
		}
		function setTipo_logradouro($tipo_logradouro) {
			return $this->tipo_logradouro = $tipo_logradouro;
		}
		
	}
?>