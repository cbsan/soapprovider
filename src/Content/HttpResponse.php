<?php

namespace SoapProvider\Content;

/**
 * HttpResponse.php
 * 
 * Contexto de Resposta do Client
 * 
 * @author Cristian B. dos Santos <cristian.deveng@gmail.com>
 * @copyright 2015
 * @version 1.0v
*/

class HttpResponse extends \UtilityCommon\ObjectFactory
{
	

	protected $status = 200;
	protected $contentType = "Content-type: application/json";
	protected $headers = null;
	protected $body = null;
}
