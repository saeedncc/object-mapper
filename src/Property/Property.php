<?php

namespace saeedncc\ObjectMapper\Property;


abstract class Property
{
	public $name;
	public $mapname;
	
	public function __construct($name,$mapname){
		$this->name=$name;
		$this->mapname=$mapname;
	}

	abstract public function getDefault();
	
	abstract public function convert($value);
	
}

