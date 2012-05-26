<?php

namespace NajiDev\XbmcApi\Service;

use \NajiDev\XbmcApi\DataType\Application\Version,
    \NajiDev\XbmcApi\Exception\NotImplementedException;


class Application extends AbstractService
{
	/**
	 * Quit application
	 *
	 * @return void
	 */
	public function quit()
	{
		$this->callXbmc('Quit');
	}

	/**
	 * Mutes the application
	 *
	 * @return void
	 */
	public function mute()
	{
		$this->setMute(true);
	}

	/**
	 * Unmutes the application
	 *
	 * @return void
	 */
	public function unmute()
	{
		$this->setMute(false);
	}

	/**
	 * @param int $volume The volume. Has to be between 0 and 100.
	 * @throws \InvalidArgumentException
	 * @return void
	 */
	public function setVolume($volume)
	{
		if (0 > $volume || 100 < $volume)
			throw new \InvalidArgumentException('$volume has to be between 0 and 100');

		$this->callXbmc('SetVolume', array(
			'volume' => $volume
		));
	}

	/**
	 * Whether the application is muted or not
	 *
	 * @return boolean
	 */
	public function isMuted()
	{
		return $this->getProperty('muted');
	}

	/**
	 * @return int Volume of the application. Is between 0 and 100
	 */
	public function getVolume()
	{
		return $this->getProperty('volume');
	}

	/**
	 * Get the version of the application
	 *
	 * @return \NajiDev\XbmcApi\DataType\Application\Version
	 */
	public function getVersion()
	{
		return new Version($this->getProperty('Version'));
	}

	/**
	 * Not really sure, what this returns... The method calls Application.GetProperties with "name" as param
	 *
	 * @return mixed
	 */
	public function getName()
	{
		return $this->getProperty('name');
	}

	/**
	 * Sets muted true or false
	 *
	 * @param boolean $mute
	 * @return void
	 */
	protected function setMute($mute)
	{
		$this->callXbmc('SetMute', array(
			'mute' => $mute
		));
	}
}