<?php 

namespace saeedncc\ObjectMapper\Exceptions;

use \saeedncc\ObjectMapper\Exceptions\ObjectMapperException;

class UnknownResponseTypeException extends ObjectMapperException
{
	
	public function __construct(string $message='', int $code = 0, ObjectMapperException $previous = null) 
	{
		$message='response must be json or xml format';
		parent::__construct($message, $code, $previous);
	}
}
