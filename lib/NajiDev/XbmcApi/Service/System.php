<?php

namespace NajiDev\XbmcApi\Service;


class System extends AbstractService
{
	/**
	 * Puts the system running XBMC into hibernate mode
	 */
	public function hibernate()
	{
		$this->callXbmc('Hibernate');
	}

	/**
	 * Reboots the system running XBMC
	 */
	public function reboot()
	{
		$this->callXbmc('Reboot');
	}

	/**
	 * Shuts the system running XBMC down
	 */
	public function shutdown()
	{
		$this->callXbmc('Shutdown');
	}

	/**
	 * Suspends the system running XBMC
	 */
	public function suspend()
	{
		$this->callXbmc('Suspend');
	}

	/**
	 * @return boolean whether the system can be rebooted or not
	 */
	public function isRebootable()
	{
		return $this->getProperty('canreboot');
	}


	/**
	 * @return boolean whether the system can be suspended or not
	 */
	public function isSuspendable()
	{
		return $this->getProperty('cansuspend');
	}

	/**
	 * @return boolean whether the system can be set to hibernate or not
	 */
	public function isHibernateable()
	{
		return $this->getProperty('canhibernate');
	}

	/**
	 * @return boolean whether the system can be shut down or not
	 */
	public function isShutdownable()
	{
		return $this->getProperty('canshutdown');
	}
}