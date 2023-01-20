<?php
namespace saeedncc\ObjectMapper;

use \saeedncc\ObjectMapper\PropertyFromYaml;


use \saeedncc\ObjectMapper\Exceptions\UnknownResponseTypeException;


class ObjectMapper
{
	/**
	* @var instance of PropertyFromYaml
	*/
	public $dataYmal;
	
	
	public function __construct(PropertyFromYaml $dataYmal)
	{
		$this->dataYmal=$dataYmal;
	}
	
	
	/**
	* convert response json or xml  to object 
	* @param string $response
	* @return object
	*/
	public function mapFromResponse(string $response):object
	{
		$data=json_decode($response,true);
		
        if (json_last_error() == JSON_ERROR_NONE) {
			
			return $this->mapData($data);
		}
		
		
		$data=simplexml_load_string($response);
		
		if($data){
			
			return $this->mapData((array)$data);
		}
		
		
		throw new UnknownResponseTypeException();
			
	}
	
	
	
	/**
	* map response object to custom object
	* @param array $data
	*
	* @return object
	*/
	protected function mapData(array $data):object
	{
		$object=new \stdClass();
		foreach($this->getProperty() as $property){
			
			if(isset($data[$property->mapname])){
				
				$object->{$property->name}=$property->convert($data[$property->mapname]);
			}else{
				
				$object->{$property->name}=$property->getDefault();
			}
			
		}
		
		
		return $object;
		
	}
	
	/**
	* get list object property
	* @return array
	*/
	protected function getProperty()
	{
		return $this->dataYmal->getProperty();
	}
	
	/**
	* @param string $path yaml  string $response from api
	* @return object
	*/
	public static function map(string $path,string $response):object
	{
		$dataYaml=new PropertyFromYaml($path);

		$objectMapper=new ObjectMapper($dataYaml);

		return $objectMapper->mapFromResponse($response);
	}
	
}





