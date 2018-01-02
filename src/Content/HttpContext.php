<?php

namespace SoapProvider\Content;

/**
 * HttpContextTrait.php
 * 
 * Contexto de dados do Request
 * 
 * @author Cristian B. dos Santos <cristian.deveng@gmail.com>
 * @copyright 2015
 * @version 1.0v
*/

abstract class HttpContext
{
	protected $service = null;
	private $body = array();

	public function body($key, $value)
	{
		$this->body[$key] = $value;

		return $this;
	}

	public function any($value)
	{
		return array('any'=>$value);
	}

	public function getParams()
	{
		$params  = array();
		$params['parameters'] = $this->body;

		return $params;
	}
}