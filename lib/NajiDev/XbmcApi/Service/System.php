<?php

namespace NajiDev\XbmcApi\Service;


class System extends AbstractService
{
	public function suspend()
	{
		$this->callXbmc('Suspend');
	}

	public function getProperty($key)
	{
		throw new \Exception;
	}
}