<?php

namespace SoapProvider\Factory;


/**
 * SoapBodyFactory.php
 * 
 * Manipuação do Corpo de resposta do Client
 * 
 * @author Cristian B. dos Santos <cristian.deveng@gmail.com>
 * @copyright 2015
 * @version 1.0v
*/

class SoapBodyFactory
{
	
	public function __construct($soap)
	{
		$this->toObject($soap);
	}

	private function toObject($object)
	{		
		return $this->__toObject($object);
	}

	private function __toObject($object)
	{
		foreach ($object as $key => $value) 
		{
			
			if (is_object($value)) 
				$this->$key = $this->toObject($value);
			
			else if($this->is_xml($value))
				$this->$key = $this->XmlToObject($value);
			else
				$this->$key = $value;
			
		}
	}

	private function is_xml($value)
	{
		libxml_use_internal_errors(true);
		$xml = simplexml_load_string($value);

		return $xml ? TRUE : FALSE;
	}

	private static function XmlToObject($value)
	{
		libxml_use_internal_errors(true);
		$objectXml = simplexml_load_string($value);

		return empty($objectXml)? new stdClass : $objectXml;
	}


}