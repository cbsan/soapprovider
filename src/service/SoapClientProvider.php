<?php

namespace SoapProvider\Service;

/**
 * SoapClientProvider.php
 * 
 * Servico de comunicação WSDL com SoapClient
 * 
 * @author Cristian B. dos Santos <cristian.deveng@gmail.com>
 * @copyright 2015
 * @version 1.0v
*/

use \SoapProvider\Config\SoapClientOptions;
use \SoapProvider\Dto\SoapClientDTO;
use \SoapProvider\Factory\SoapBodyFactory;
use \SoapProvider\Content\HttpResponse;

abstract class SoapClientProvider extends \SoapProvider\Content\HttpContext implements \SoapProvider\Service\SoapClientProviderInterface
{

	protected $soapClient = null;
	protected $wsdl = null;
	protected $host = null;

	public function __construct(SoapClientDTO $dto = null)
	{
		if (!empty($dto))
		{
	
			if (isset($dto->host) && !empty($dto->host))
				$this->host = $dto->host;

			if (isset($dto->wsdl) && !empty($dto->wsdl))
				$this->wsdl = $dto->wsdl;
		}
		
	}

	public function init()
	{

		$options = new SoapClientOptions;
		
		$soapClient = new \SoapClient(
									$this->host.$this->wsdl,
									$options->toArray()
									);

		return $soapClient;
	}


	public function getSoapClient()
	{
		
		$response = new HttpResponse;
		
		try 
		{
			$soap = $this->init()->__soapCall($this->service, $this->getParams(), null, null);

		
			$response->headers = new \SoapHeader($this->host.$this->wsdl, $this->service);

			if (empty($response->headers) || empty($soap))
				$response->status = 204;
			
			$response->body = json_encode(new SoapBodyFactory($soap), true);
			
		} catch (\Exception $e) 
		{
			$response->status = 500;
			$response->body = json_encode(new SoapBodyFactory(array('errorSoap'=>'Opsss!!! Failiure Request... '.$e->getMessage())), true);
		}
		
		return $response;
	}
}