<?php

namespace SoapProvider\Dto;

/**
 * SoapClientDTO.php
 * 
 * Parametros de configuração do Client
 * 
 * @author Cristian B. dos Santos <cristian.deveng@gmail.com>
 * @copyright 2015
 * @version 1.0v
*/


class SoapClientDTO
{
	use \UtilityCommon\ObjectFactory;

	protected $wsdl    = null;
	protected $host    = null;
	protected $service = null;
	protected $server  = null;

}