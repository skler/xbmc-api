<?php

namespace NajiDev\XbmcApi\Service;


abstract class AbstractService
{
	const NS = null;

	protected $xbmcConnector;

	public function __construct(XbmcConnector $xbmcConnector)
	{
		$this->xbmcConnector = $xbmcConnector;
	}

	protected function callXbmc($method, array $parameters = array())
	{
		return $this->xbmcConnector->call($this->getNamespace() . '.' . $method, $parameters);
	}

	abstract public function getNamespace();
}
