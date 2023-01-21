<?php
namespace saeedncc\ObjectMapper;

use \saeedncc\ObjectMapper\Spyc;

use \saeedncc\ObjectMapper\Exceptions\NotfFoundYamlFileException;

use \saeedncc\ObjectMapper\PropertyFromYamlTrait;

class PropertyFromYaml
{
	use PropertyFromYamlTrait;
	
	/**
	* contain data from yaml file
	* @var array
	*/
	public $data;
	
	/**
	* load data from yaml file 
	* @param string $path
	*/
	public function loadData(string $path):void
	{
		$data=Spyc::YAMLLoad($path);
		
		if(!isset($data['property'])){
			
			throw new NotfFoundYamlFileException($path);
		}
		
		$this->setData($data['property']);
	}
	
    /**
	* set data 
	* @param array $data
	*/
	public function setData(array $data):void
	{
		$this->data=$data;
	}
	

	
}




