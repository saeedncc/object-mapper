<?php 

namespace saeedncc\ObjectMapper\Exceptions;

use \saeedncc\ObjectMapper\Exceptions\ObjectMapperException;

class NotfFoundPropertyClassException extends ObjectMapperException
{
	
	public function __construct(string $message='', int $code = 0, ObjectMapperException $previous = null) 
	{
		$message='there is not this class: '.$message;
		parent::__construct($message, $code, $previous);
	}
}
