<?php

namespace NajiDev\XbmcApi\Service;

use \NajiDev\XbmcApi\Utils\IdentityMap;


abstract class AbstractService
{
	private $xbmcConnector;

	protected $identityMap;

	public function __construct(XbmcConnector $xbmcConnector)
	{
		$this->xbmcConnector = $xbmcConnector;
		$this->identityMap   = new IdentityMap();
	}

	protected function callXbmc($method, array $parameters = array())
	{
		return $this->xbmcConnector->call($this->getNamespace() . '.' . $method, $parameters);
	}

	private function getNamespace()
	{
		return str_replace(__NAMESPACE__ . '\\', '', get_class($this));
	}

	protected function getProperty($key)
	{
		$response = $this->callXbmc('GetProperties', array(
				'properties' => array($key)
			));

		return $response->$key;
	}
}
