<?php
    namespace engine\dao;
   		
    class Notas_fiscais implements \JsonSerializable {

		private $id;
		private $anexo;
		private $date_create;
		private $date_update;
		private $numero_nota_fiscal;
		private $valor;
		private $fk_condominio_id;

		public function getKeys() {
			return [
				'id' =>$this->getId()
			];
		}

		public function jsonSerialize(): mixed {
			return [
				'id' =>$this->getId(),
				'anexo' =>$this->getAnexo(),
				'date_create' =>$this->getDate_create(),
				'date_update' =>$this->getDate_update(),
				'numero_nota_fiscal' =>$this->getNumero_nota_fiscal(),
				'valor' =>$this->getValor(),
				'fk_condominio_id' =>$this->getFk_condominio_id()
			];
		}
			
		//ID
		function getId() {
			return $this->id;
		}
		function setId($id) {
			return $this->id = $id;
		}
		
		//ANEXO
		function getAnexo() {
			return $this->anexo;
		}
		function setAnexo($anexo) {
			return $this->anexo = $anexo;
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
		
		//NUMERO_NOTA_FISCAL
		function getNumero_nota_fiscal() {
			return $this->numero_nota_fiscal;
		}
		function setNumero_nota_fiscal($numero_nota_fiscal) {
			return $this->numero_nota_fiscal = $numero_nota_fiscal;
		}
		
		//VALOR
		function getValor() {
			return $this->valor;
		}
		function setValor($valor) {
			return $this->valor = $valor;
		}
		
		//FK_CONDOMINIO_ID
		function getFk_condominio_id() {
			return $this->fk_condominio_id;
		}
		function setFk_condominio_id($fk_condominio_id) {
			return $this->fk_condominio_id = $fk_condominio_id;
		}
		
	}
?>