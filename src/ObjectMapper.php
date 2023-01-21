<?php
namespace saeedncc\ObjectMapper;

use \saeedncc\ObjectMapper\PropertyFromYaml;
use \saeedncc\ObjectMapper\Property\ObjectProperty;

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
			
			$data=$this->xml2array($data);
			
			return $this->mapData($data);
		}
		
		
		throw new UnknownResponseTypeException();
			
	}
	


	/**
	* convert nested xml object to array
	* @param object $xmlObject
	* @return array
	*/
	protected function xml2array ( object $xmlObject):array
	{
		$out=array();
		foreach ( (array) $xmlObject as $index => $node )
			$out[$index] = ( is_object ( $node ) ) ? $this->xml2array( $node ) : $node;

		return $out;
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
			
			
			if($property instanceof ObjectProperty) {
				
				$object->{$property->name}=self::submap($property->subproperty,$data[$property->mapname]);
				continue;
			}
			
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
		$property=new PropertyFromYaml();
		
		$property->loadData($path);

		$objectMapper=new ObjectMapper($property);

		return $objectMapper->mapFromResponse($response);
	}
	
	
	public static function submap(array $dataYmal,array $dataResponse):object
	{
		$property=new PropertyFromYaml();
		
		$property->setData($dataYmal);

		$objectMapper=new ObjectMapper($property);

		return $objectMapper->mapData($dataResponse);
	}
	
}





