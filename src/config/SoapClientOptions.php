<?php

namespace SoapProvider\Config;

/**
 * SoapClientOptions.php
 * 
 * Configuração do Soap Client
 * 
 * @author Cristian B. dos Santos <cristian.deveng@gmail.com>
 * @copyright 2015
 * @version 1.0v
*/

use \UtilityCommon\ObjectFactory;

class SoapClientOptions
{
	use ObjectFactory;

	protected $connection_timeout = 60;
	protected $uri                = null;
	protected $encoding           = 'UTF-8';
	protected $soap_version       = SOAP_1_2;
}