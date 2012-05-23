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
		$response = $this->callXbmc('GetProperties', array(
			'properties' => array($key)
		));

		var_dump($response);
		die;
	}

	public function getNamespace()
	{
		return 'System';
	}
}