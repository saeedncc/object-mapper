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
	
	public function __construct(string $path)
	{
		$this->load($path);
		
	}
	
	/**
	* load data from yaml file 
	* @param string $path
	*/
	protected function load(string $path):void
	{
		$data=Spyc::YAMLLoad($path);
		
		if(!isset($data['property'])){
			
			throw new NotfFoundYamlFileException($path);
		}
		
		$this->data=$data['property'];
	}
	

	
}




