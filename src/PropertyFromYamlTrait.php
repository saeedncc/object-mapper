<?php
namespace saeedncc\ObjectMapper;

use \saeedncc\ObjectMapper\Property\IntegerProperty;
use \saeedncc\ObjectMapper\Property\StringProperty;

use \saeedncc\ObjectMapper\Exceptions\NotfFoundPropertyClassException;

trait PropertyFromYamlTrait
{
	/**
	* get instance from property class
	* @return array
	*/
	public function getProperty():array
	{
		$properties=array();
		foreach($this->data as $field){
			
			if($field['type']=='integer'){
				
				$properties[]=new IntegerProperty($field['name'],$field['map']);
				
			}else if($field['type']=='string'){
				
				$properties[]=new StringProperty($field['name'],$field['map']);
			
			}else{
				throw new NotfFoundPropertyClassException($field['type']);
			}
			
		}
		
		return $properties;
		
	}
	
}




