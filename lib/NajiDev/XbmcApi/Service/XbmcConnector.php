<?php

namespace NajiDev\XbmcApi\Service;

use	\NajiDev\XbmcApi\Transport\HttpTransport;


class XbmcConnector
{
	const TRANSPORT_HTTP = 0;

	/**
	 * @var Transport
	 */
	protected $transport;

	public function __construct($host, $port = 80, $user = null, $password = null, $transport = self::TRANSPORT_HTTP)
	{
		if (self::TRANSPORT_HTTP === $transport)
			$this->transport = new HttpTransport($host, $port, $user, $password);
		else
			throw new \InvalidArgumentException('Choose one of XbmcManager::TRANSPORT_* as $transport');
	}

	public function call($command, array $params = array())
	{
		return $this->transport->request(json_encode(array(
				'jsonrpc' => '2.0',
				'method'  => $command,
				'params'  => $params,
				'id'      => uniqid()
		)));
	}
}