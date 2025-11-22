<?php
namespace engine\utils;

class FilterWhere{
	private $collum    = "";
	private $condition = "=";
	private $value     = "";
	
	function getCollum()
	{
		return $this->collum;		
	}
	
	function getCondition()
	{
		return $this->condition;		
	}
	
	function getValue()
	{
		return $this->value;		
	}
		
	function setCollum($collum)
	{
		$this->collum = $collum;
	}
	
	function setCondition($condition)
	{
		$this->condition = $condition;
	}
	
	function setValue($value)
	{		
		$this->value = $value;
	}
	
}

?>