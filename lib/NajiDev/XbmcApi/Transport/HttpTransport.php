<?php

namespace NajiDev\XbmcApi\Transport;

use \InvalidArgumentException;

use \NajiDev\XbmcApi\Exception\UnauthorizedException;


class HttpTransport implements Transport
{
	protected $user;
	protected $password;

	public $timeout = 15;

	public function __construct($host, $port = 80, $user = null, $password = null)
	{
		$this->dsn = $host . ':' . $port . '/jsonrpc';

		$this->user     = $user;
		$this->password = $password;
	}

	public function request($data)
	{
		$handle = curl_init();

		curl_setopt($handle, CURLOPT_URL, 'http://' . $this->dsn);
		curl_setopt($handle,CURLOPT_USERPWD, $this->user . ':' . $this->password);
		curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($handle, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($handle, CURLOPT_CONNECTTIMEOUT, $this->timeout);
		curl_setopt($handle, CURLOPT_TIMEOUT, $this->timeout);

		curl_setopt($handle, CURLOPT_POST, true);
		curl_setopt($handle, CURLOPT_POSTFIELDS, $data);

		$response = curl_exec($handle);
		$httpCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);

		if (403 === $httpCode)
			throw new UnauthorizedException();

		$response = json_decode($response);
		if (isset($response->error))
		{
			$stackException = null;
			if (isset($response->error->data))
			{
				$stackException = new InvalidArgumentException(
					'In ' . $response->error->data->method . ': ' . $response->error->data->stack->message
				);
			}

			throw new InvalidArgumentException(
				$response->error->message,
				$response->error->code,
				$stackException
			);
		}

		return $response->result;
	}
}